<?php
/**
 * The class responsible for blocking the scripts in the admin area
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public
 */
class Cookie_Dough_Consent_Blocker {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name          = $plugin_name;
		$this->version              = $version;
	}

    /**
     * Enqueue the deblocker script
     * 
     */
    public function enqueue_deblocker_script() {

        // check if cache option activated
        $settings_array = get_option( 'cookie-dough-consent-settings', array() );
        $handle_cache   = isset( $settings_array['advanced-handle-cache'] ) ? $settings_array['advanced-handle-cache'] : cdc_cookie_default_values('advanced-handle-cache');
        
        if ( $handle_cache == 'yes' ) {
            ?><script src="<?php echo esc_url(COOKIE_DOUGH_CONSENT_PLUGIN_URL); ?>public/js/front-run-scripts.min.js?ver=<?php echo esc_attr(COOKIE_DOUGH_CONSENT_VERSION); ?>"></script><?php
        }

    }

    /**
     * Init the scripts blocker
     * 
     * @return void
     */
	public function init_scripts_blocker() {

        // check if cache option activated
        $settings_array = get_option( 'cookie-dough-consent-settings', array() );
        $handle_cache   = isset( $settings_array['advanced-handle-cache'] ) ? $settings_array['advanced-handle-cache'] : cdc_cookie_default_values('advanced-handle-cache');

        if ( $handle_cache == 'no' ) {
            return;
        }

        //only admin when ajax
		if ( !wp_doing_ajax() && is_admin() ) {
			return;
		}

		if ( is_feed() ) {
			return;
		}

		//don't fire on the back-end
		if ( is_preview() || cdc_is_pagebuilder_preview() ) {
			return;
		}

        /* Do not fix mixed content when call is coming from wp_api or from xmlrpc or feed */
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) {
			return;
		}
		if ( defined( 'XMLRPC_REQUEST' ) && XMLRPC_REQUEST ) {
			return;
		}

        if ( wp_doing_ajax() ) {

			add_action( "admin_init", array( $this, "start_buffer" ) );

		} else {

            add_action( "template_redirect", array( $this, "start_buffer" ) );
		}

		add_action( "shutdown", array( $this, "end_buffer" ), 999 );
    }

    /**
     * Start the buffer
     * 
     */
    public function start_buffer() {

        ob_start( array( $this, "filter_buffer" ) );
    }

    /**
     * End the buffer
     * 
     */
    public function end_buffer() {

        if ( ob_get_length() ) {
            ob_end_flush();
        }
    }

    /**
     * Filter the buffer
     * 
     */
    public function filter_buffer( $buffer ) {

        $buffer = $this->replace_tags( $buffer );

        return $buffer;
    }

    /**
     * Just before the page is sent to the visitor's browser, remove all tracked third party scripts
     * 
     */
    public function replace_tags( $output ) {
        
        $blocked_scripts    = $this->blocked_scripts();
        $script_pattern     = '/(<script.*?>)(\X*?)<\/script>/is';
        
        if ( preg_match_all( $script_pattern, $output, $matches, PREG_PATTERN_ORDER ) ) {

            foreach ( $matches[1] as $key => $script_open ) {

                $found = $this->strpos_arr( $script_open, array_keys($blocked_scripts) );
                if ( $found !== false ) {

                    $total_match    = $matches[0][ $key ];
                    $id             = $blocked_scripts[$found];
                    $new            = $total_match;
                    $new            = cdc_add_data( $new, 'script', 'cdc-id', $id );
                    $new            = $this->set_javascript_to_plain( $new );
                    $output         = str_replace( $total_match, $new, $output );
                }
            }
        }

        return $output;
    }

    /**
     * Get array of scripts to block in correct format
     * 
     * @return array
     */
    public function blocked_scripts() {

        $settings_array         = get_option( 'cookie-dough-consent-settings', array() );
        $blocked_scripts        = isset( $settings_array['cookie-settings-main'] ) ? $settings_array['cookie-settings-main'] : cdc_cookie_default_values('cookie-settings-main');
        $blocked_scripts_tags   = array();

        foreach ( $blocked_scripts as $blocked_script ) {

            if ( $blocked_script['mandatory'] == 'yes' ) continue;

            $script_radio   = $blocked_script['scriptRadio'];
            $script_id      = $blocked_script['id'];

            if ( $script_radio == '0' ) {

                $script_input = $blocked_script['scriptInput'];

                if ( !empty($script_input) && !empty($script_id) ) {
                    $blocked_scripts_tags[$script_input] = $script_id;
                }

            } else if ( $script_radio == '1' ) {

                if ( !empty($script_id) ) {
                    $blocked_scripts_tags[$script_id] = $script_id;
                }
            }
        }

        return  $blocked_scripts_tags;
    }

    /**
	 * check if there is a partial match between a key of the array and the haystack
	 * We cannot use array_search, as this would not allow partial matches.
	 *
	 * @return bool|string
	 */
	public function strpos_arr( $haystack, $needle ) {

		if ( empty( $haystack ) ) {
			return false;
		}

		if ( ! is_array( $needle ) ) {
			$needle = array( $needle );
		}

		foreach ( $needle as $key => $value ) {

			if ( strlen($value) === 0 ) continue;

			if ( ( strpos( $haystack, $value ) ) !== false ) {

				return ( is_numeric( $key ) ) ? $value : $key;
			}
		}

		return false;
	}

    /**
     * Set the javascript attribute of a script element to plain
     * 
     * @return string
     */
    public function set_javascript_to_plain( $script ) {

        //check if it's already set to plain
		if ( strpos( $script, 'text/plain' ) !== false ) return $script;

        $pattern = '/<script[^>].*?\K(type=[\'|\"]text\/javascript[\'|\"])(?=.*>)/i';
        preg_match( $pattern, $script, $matches );

        if ( $matches ) {

            $script = preg_replace( $pattern, 'type="text/plain"', $script, 1 );

        } else {

            $pos = strpos( $script, "<script" );

            if ( $pos !== false ) {
                $script = substr_replace( $script, '<script type="text/plain"', $pos, strlen( "<script" ) );
            }
        }

        return $script;
    }

}