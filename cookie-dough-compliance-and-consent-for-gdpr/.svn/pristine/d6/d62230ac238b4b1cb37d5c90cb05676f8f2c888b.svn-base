<?php
/**
 * The class responsible for rendring the popup cookie in the admin area
 *
 * @link       https://webdeclic.com/
 * @since      1.0.0
 *
 * @package    Cookie_Dough_Consent
 * @subpackage Cookie_Dough_Consent/public
 */
class Cookie_Dough_Consent_Render {

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

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
     * Enqueue scripts and styles
     */
    public function enqueue_scripts_styles() {

		if ( cdc_is_pagebuilder_preview() ) return;

        $settings_array         		= get_option( 'cookie-dough-consent-settings', array() );
		$delay_opening					= isset($settings_array['advanced-delay-opening']) ? $settings_array['advanced-delay-opening'] : cdc_cookie_default_values('advanced-delay-opening');
		$disappears_accepted			= isset($settings_array['advanced-disappears-accepted']) ? $settings_array['advanced-disappears-accepted'] : cdc_cookie_default_values('advanced-disappears-accepted');
		$cookie_duration_acceptall		= isset($settings_array['advanced-cookie-duration-acceptall']) ? $settings_array['advanced-cookie-duration-acceptall'] : cdc_cookie_default_values('advanced-cookie-duration-acceptall');
		$cookie_duration_notacceptall	= isset($settings_array['advanced-cookie-duration-notacceptall']) ? $settings_array['advanced-cookie-duration-notacceptall'] : cdc_cookie_default_values('advanced-cookie-duration-notacceptall');
		$settings_value					= isset($settings_array['cookie-settings-main']) ? $settings_array['cookie-settings-main'] : cdc_cookie_default_values('cookie-settings-main');

		wp_enqueue_style( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-front-style', COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'public/css/front.min.css', array(), COOKIE_DOUGH_CONSENT_VERSION, 'all' );
		wp_enqueue_script( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-front-script', COOKIE_DOUGH_CONSENT_PLUGIN_URL . 'public/js/front.min.js', array(), COOKIE_DOUGH_CONSENT_VERSION, true );

		wp_localize_script( COOKIE_DOUGH_CONSENT_TEXT_DOMAIN . '-front-script', 'CDC_PUBLIC_PHP_DATA', array(
			'delay_opening'					=> $delay_opening,
			'disappears_accepted'			=> $disappears_accepted,
			'cookie_duration_acceptall'		=> $cookie_duration_acceptall,
			'cookie_duration_notacceptall'	=> $cookie_duration_notacceptall
		));

		$this->save_public_scripts_in_transient();
		$this->dequeue_optional_scripts( $settings_value );
    }

	/**
     * Render the popup in the footer
     */
    public function render_the_popup () {

		if ( cdc_is_pagebuilder_preview() ) return;

		$settings_array = get_option( 'cookie-dough-consent-settings', array() );

        require_once COOKIE_DOUGH_CONSENT_PLUGIN_PATH . 'public/templates/cookie-page.php';
    }

	/**
	 * Add scripts in the head
	 */
	public function add_scripts_in_head() {

		if ( cdc_is_pagebuilder_preview() ) return;

		$this->add_inline_scripts( 'head' );
	}
	
	/**
	 * Add scripts in the body
	 */
	public function add_scripts_in_body() {

		if ( cdc_is_pagebuilder_preview() ) return;

		$this->add_inline_scripts( 'body' );
	}
	
	/**
	 * Add scripts in the footer
	 */
	public function add_scripts_in_footer() {

		if ( cdc_is_pagebuilder_preview() ) return;

		$this->add_inline_scripts( 'footer' );
	}

	/**
	 * Inject inline scripts
	 */
	public function add_inline_scripts( $position ) {

		if ( cdc_is_pagebuilder_preview() ) return;

        $settings_array	= get_option( 'cookie-dough-consent-settings', array() );
		$settings_value	= isset($settings_array['cookie-settings-main']) ? $settings_array['cookie-settings-main'] : cdc_cookie_default_values('cookie-settings-main');
		$handle_cache	= isset($settings_array['advanced-handle-cache']) ? $settings_array['advanced-handle-cache'] : cdc_cookie_default_values('advanced-handle-cache');

		if ( isset( $_COOKIE['cdc-cookies'] ) && $handle_cache == 'no' ) {

			$cdc_cookies 	= json_decode( stripslashes( $_COOKIE['cdc-cookies'] ), true );
			$cdc_cookies 	= array_map( 'sanitize_text_field', $cdc_cookies );

			foreach ( $settings_value as $setting_value ) {

				$id					= $setting_value['id'];
				$mandatory			= $setting_value['mandatory'];
				$script_radio 		= $setting_value['scriptRadio'];
				$script_select		= $setting_value['scriptSelect'];
				$script_textarea	= $setting_value['scriptTextarea'];

				if ( $mandatory == 'yes' ) {

					if ( $script_radio == '1' && !empty( $script_textarea ) && $script_select == $position ) {
						echo wp_kses( $script_textarea, array('script'=>array()) );
					}

				} else {

					if ( isset( $cdc_cookies[$id] ) && $cdc_cookies[$id] ) {

						if ( $script_radio == '1' && !empty( $script_textarea ) && $script_select == $position ) {

							if ( $handle_cache == 'yes' ) {
								$script_textarea = cdc_add_data( $script_textarea, 'script', 'cdc-id', $id );
							}
		
							echo wp_kses( $script_textarea, array('script'=>array('data-cdc-id' => array())) );
						}
					}
				}
			}

		} else {

			foreach ( $settings_value as $setting_value ) {

				$id					= $setting_value['id'];
				$script_radio 		= $setting_value['scriptRadio'];
				$script_select		= $setting_value['scriptSelect'];
				$script_textarea	= $setting_value['scriptTextarea'];

				if ( $script_radio == '1' && !empty( $script_textarea ) && $script_select == $position ) {

					if ( $handle_cache == 'yes' ) {
						$script_textarea = cdc_add_data( $script_textarea, 'script', 'cdc-id', $id );
					}

					echo wp_kses( $script_textarea, array('script'=>array('data-cdc-id' => array())) );
				}
			}
		}
	}

	/**
	 * Save all handles of public scripts in a transient
	 */
	public function save_public_scripts_in_transient() {
		global $wp_scripts;

		if ( cdc_is_pagebuilder_preview() ) return;

		$transient_name		= '_cdc_scripts_handles';
		$transient_value	= get_site_transient( $transient_name );

		if ( !is_array($transient_value) ) {
			$transient_value = array();
		}

		if ( count($transient_value) != count( $wp_scripts->queue ) ) {

			$transient_array = array();
			foreach( $wp_scripts->queue as $handle ) {
				array_push( $transient_array, $handle.'-js' );
			}
			set_site_transient( $transient_name, $transient_array );
		}
	}

	/**
	 * Dequeue optional scripts by handle
	 */
	public function dequeue_optional_scripts( $settings_value ) {

		if ( cdc_is_pagebuilder_preview() ) return;

        $settings_array	= get_option( 'cookie-dough-consent-settings', array() );
		$handle_cache	= isset($settings_array['advanced-handle-cache']) ? $settings_array['advanced-handle-cache'] : cdc_cookie_default_values('advanced-handle-cache');

		if ( ! isset( $_COOKIE['cdc-cookies'] ) || $handle_cache == 'yes' ) {
			return;
		}

		$cdc_cookies = json_decode( stripslashes( $_COOKIE['cdc-cookies'] ), true );
		$cdc_cookies = array_map( 'sanitize_text_field', $cdc_cookies );

		foreach ( $cdc_cookies as $cookie_id => $cookie_status ) {
			
			if ( !$cookie_status ) {

				if ( isset( $settings_value[$cookie_id] ) ) {

					$script_radio	= $settings_value[$cookie_id]['scriptRadio'];
					$script_input	= $settings_value[$cookie_id]['scriptInput'];

					if ( $script_radio == '0' && !empty($script_input) ) {

						$script_length	= strlen($script_input);
						$script_input	= substr($script_input, 0, $script_length - 3);
						
						wp_dequeue_script( $script_input );
					}
				}	
			}
		}
	}

}