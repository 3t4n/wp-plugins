<?php
if (!defined('ABSPATH'))
    exit;

class AWECM_Backend
{
    /**
     * @var    object
     * @access  private
     * @since    1.0.0
    */
    private static $_instance = null;

    /**
     * The version number.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $_version;

    /**
     * The token.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $_token;

    /**
     * The main plugin file.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $file;

    /**
     * The main plugin directory.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $dir;

    /**
     * The plugin assets directory.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $assets_dir;

    /**
     * Suffix for Javascripts.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $script_suffix;

    /**
     * The plugin assets URL.
     * @var     string
     * @access  public
     * @since   1.0.0
    */
    public $assets_url;
    public $hook_suffix = array();

    /**
     * Constructor function.
     * @access  public
     * @return  void
     * @since   1.0.0
    */
    public function __construct( $file = '', $version = '1.0.0' )
    {
        $this->_version = $version;
        $this->_token = AWECM_TOKEN;
        $this->file = $file;
        $this->dir = dirname( $this->file );
        $this->assets_dir = trailingslashit( $this->dir ) . 'assets';
        $this->assets_url = esc_url( trailingslashit( plugins_url( '/assets/', $this->file ) ) );
        $this->script_suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
        //reg activation hook
        register_activation_hook( $this->file, array( $this, 'install' ) );
        //reg admin menu
        add_action( 'admin_menu', array( $this, 'register_root_page' ) );
        //enqueue scripts & styles
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ), 10, 1 );
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_styles' ), 10, 1 );
        $plugin = plugin_basename($this->file);
        //add action links to link to link list display on the plugins page
        add_filter( "plugin_action_links_$plugin", array( $this, 'add_settings_link' ) );
        // deactivation form
        add_action( 'admin_footer', array($this, 'aco_deactivation_form') );
    }

    /**
     *
     *
     * Ensures only one instance of APIFw is loaded or can be loaded.
     *
     * @return Main APIFw instance
     * @see WordPress_Plugin_Template()
     * @since 1.0.0
     * @static
    */
    public static function instance($file = '', $version = '1.0.0')
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self($file, $version);
        }
        return self::$_instance;
    }

    /**
     * Installation. Runs on activation.
     * @access  public
     * @return  void
     * @since   1.0.0
    */
    public function install()
    {
        if ( $this->is_woocommerce_activated() === false ) {
			add_action( 'admin_notices', array ( $this, 'notice_need_woocommerce' ) );
			return;
        }

        $this->add_settings_options();
        $this->create_secure_upload_dir();
    }

    /**
	 * Check if woocommerce is activated
     * @access  public
     * @return  boolean woocommerce install status
	*/
    public function is_woocommerce_activated()
    {
		$blog_plugins = get_option( 'active_plugins', array() );
		$site_plugins = is_multisite() ? (array) maybe_unserialize( get_site_option('active_sitewide_plugins' ) ) : array();

		if ( in_array( 'woocommerce/woocommerce.php', $blog_plugins ) || isset( $site_plugins['woocommerce/woocommerce.php'] ) ) {
			return true;
		} else {
			return false;
		}
    }

    /**
	 * WooCommerce not active notice.
     * @access  public
	 * @return string Fallack notice.
	*/
    public function notice_need_woocommerce()
    {
		$error = sprintf( __( '%s requires %sWooCommerce%s to be installed & activated!' , 'email-customizer-and-designer-for-woocommerce' ), AWECM_PLUGIN_NAME, '<a href="http://wordpress.org/extend/plugins/woocommerce/">', '</a>' );
		$message = '<div class="error"><p>' . $error . '</p></div>';
		echo wp_kses_post( $message );
    }

    /**
     * Adding plugin default and required options
     * @access  public
     * @return  void
     * @since   1.0.0
    */
    public function add_settings_options()
    {
        // Log the plugin version number
        if ( false === get_option( $this->_token.'_version' ) ){
            add_option( $this->_token.'_version', $this->_version, '', 'yes' );
        } else {
            update_option( $this->_token . '_version', $this->_version );
        }

        // email mapping array
        $email_mapping = array();
        $email_mapping['new_ord_temp_id'] = -1;
        $email_mapping['cancelled_ord_temp_id'] = -1;
        $email_mapping['failed_ord_temp_id'] = -1;
        $email_mapping['onhold_ord_temp_id'] = -1;
        $email_mapping['processing_ord_temp_id'] = -1;
        $email_mapping['completed_ord_temp_id'] = -1;
        $email_mapping['refunded_ord_temp_id'] = -1;
        $email_mapping['invoice_temp_id'] = -1;
        $email_mapping['customer_note_temp_id'] = -1;
        $email_mapping['reset_password_temp_id'] = -1;
        $email_mapping['new_account_temp_id'] = -1;
        // adding email mapping options
        if ( false === get_option($this->_token.'_email_mapping') ){
            add_option( $this->_token.'_email_mapping', $email_mapping, '', 'yes' );
        }
        
        // global styles
        $global_styles = array();
        $global_styles['bgColor'] = '#EFF3F8';
        $global_styles['bodyBgColor'] = '#ffffff';
        $global_styles['headerBgColor'] = '#96588a';
        $global_styles['headerTextColor'] = '#ffffff';
        $global_styles['headingColor'] = '#96588a';
        $global_styles['textColor'] = '#000000';
        $global_styles['linkColor'] = '#000000';
        $global_styles['tableBorderColor'] = '#636363';
        $global_styles['tableBgColor'] = '#ffffff';
        $global_styles['tableThColor'] = '#000000';
        $global_styles['tableTdColor'] = '#000000';
        $global_styles['buttonBgColor'] = '#96588a';
        $global_styles['buttonTxtColor'] = '#ffffff';
        $global_styles['buttonBorderColor'] = '#96588a';
        // adding global styles option
        if ( false === get_option($this->_token.'_global_styles') ){
            add_option( $this->_token.'_global_styles', $global_styles, '', 'yes' );
        }
    }

    /**
     * Creating upload directory
     * Secure directory with htaccess  
    */
    public function create_secure_upload_dir()
    {
        //creating directory
        if( !is_dir( AWECM_UPLOAD_TEMPLATE_DIR ) )
        {
            @mkdir( AWECM_UPLOAD_TEMPLATE_DIR );
        }
    }

    /**
     * Creating admin pages
     */
    public function register_root_page()
    {
        $this->hook_suffix[] = add_menu_page(
            __( 'Email Customizer For WooCommerce', 'email-customizer-and-designer-for-woocommerce' ),
            __( 'Email Customizer', 'email-customizer-and-designer-for-woocommerce' ),
            'manage_woocommerce',
            AWECM_TOKEN.'_admin_ui',
            array( $this, 'admin_ui' ),
            $this->assets_url.'/images/menu-icon.png',
            25
        );

        $this->hook_suffix[] = add_submenu_page(
            AWECM_TOKEN.'_admin_ui',
            __( 'Global Styles', 'email-customizer-and-designer-for-woocommerce' ),
            __( 'Global Styles', 'email-customizer-and-designer-for-woocommerce' ),
            'manage_woocommerce',
            AWECM_TOKEN.'_global_styles',
            array( $this, 'global_style_ui' )
        );
    }

    /**
     * Calling view function for admin page components
    */
    public function admin_ui()
    {
        AWECM_Backend::view('admin-root', []);
    }

    /**
     * Calling view function for admin style page components
    */
    public function global_style_ui()
    {
        AWECM_Backend::view('admin-global-style', []);
    }

    /**
     * Adding new link(Configure) in plugin listing page section
    */
    public function add_settings_link($links)
    {
        $settings = '<a href="' . admin_url( 'admin.php?page='.AWECM_TOKEN.'_admin_ui#/' ) . '">' . __( 'Configure', 'email-customizer-and-designer-for-woocommerce' ) . '</a>';
        array_push( $links, $settings );
        return $links;
    }

    /**
     * Including View templates
    */
    static function view( $view, $data = array() )
    {
        //extract( $data );
        include( plugin_dir_path(__FILE__) . 'views/' . $view . '.php' );
    }

    /**
     * Load admin CSS.
     * @access  public
     * @return  void
     * @since   1.0.0
     */
    public function admin_enqueue_styles($hook = '')
    {
        wp_register_style($this->_token . '-admin', esc_url($this->assets_url) . 'css/backend.css', array(), $this->_version);
        wp_enqueue_style($this->_token . '-admin');
    }

    /**
     * Load admin Javascript.
     * @access  public
     * @return  void
     * @since   1.0.0
    */
    public function admin_enqueue_scripts($hook = '')
    {
        if (!isset($this->hook_suffix) || empty($this->hook_suffix)) {
            return;
        }

        $screen = get_current_screen();

        wp_enqueue_script('jquery');
        // deactivation form js
        if ( $screen->id == 'plugins' ) {
            wp_enqueue_script( 'wp-deactivation-message', esc_url( $this->assets_url ). 'js/message.js', array() );
        }

        if ( in_array( $screen->id, $this->hook_suffix ) ) {
            wp_enqueue_media();
            //transilation script
            if ( !wp_script_is( 'wp-i18n', 'registered' ) ) {
                wp_register_script( 'wp-i18n', esc_url( $this->assets_url ) . 'js/i18n.min.js', array('jquery'), $this->_version, true );
            }
            //Enqueue custom backend script
            wp_enqueue_script( $this->_token . '-backend', esc_url( $this->assets_url ) . 'js/backend.js', array('wp-i18n'), $this->_version, true );
            //Localize a script.
            wp_localize_script( $this->_token . '-backend', 'awecm_object', array(
                    'api_nonce' => wp_create_nonce('wp_rest'),
                    'root' => rest_url('awecm/v1/'),
                    'text_domain' => 'email-customizer-and-designer-for-woocommerce',
                    'assetsURL' => $this->assets_url,
                    'previewUrl' => admin_url( '?awecm_preview=true' ),
                    'gStyleUrl' => admin_url( 'admin.php?page=awecm_global_styles' ),
                    'emailMappingURL' => admin_url( 'admin.php?page=awecm_admin_ui' ),
                )
            );
            // backend js transilations
            if( AWECM_WP_VERSION >= 5 ) {
                $plugin_lang_path = trailingslashit( $this->dir ) . 'languages';
                wp_set_script_translations( $this->_token . '-backend', 'email-customizer-and-designer-for-woocommerce' );
            }
        }
    }

    /**
     * Deactivation form
    */
    public function aco_deactivation_form()
    {
        $currentScreen = get_current_screen();
        $screenID = $currentScreen->id;
        if ( $screenID == 'plugins' ) {
            $view = '<div id="awecm-survey-form-wrap"><div id="awecm-survey-form">
            <p>If you have a moment, please let us know why you are deactivating this plugin. All submissions are anonymous and we only use this feedback for improving our plugin.</p>
            <form method="POST">
                <input name="Plugin" type="hidden" placeholder="Plugin" value="'.AWECM_TOKEN.'" required>
                <input name="Version" type="hidden" placeholder="Version" value="'.AWECM_VERSION.'" required>
                <input name="Date" type="hidden" placeholder="Date" value="'.date("m/d/Y").'" required>
                <input name="Website" type="hidden" placeholder="Website" value="'.get_site_url().'" required>
                <input name="Title" type="hidden" placeholder="Title" value="'.get_bloginfo( 'name' ).'" required>
                <input type="radio" id="temporarily" name="Reason" value="I\'m only deactivating temporarily">
                <label for="temporarily">I\'m only deactivating temporarily</label><br>
                <input type="radio" id="notneeded" name="Reason" value="I no longer need the plugin">
                <label for="notneeded">I no longer need the plugin</label><br>
                <input type="radio" id="short" name="Reason" value="I only needed the plugin for a short period">
                <label for="short">I only needed the plugin for a short period</label><br>
                <input type="radio" id="better" name="Reason" value="I found a better plugin">
                <label for="better">I found a better plugin</label><br>
                <input type="radio" id="upgrade" name="Reason" value="Upgrading to PRO version">
                <label for="upgrade">Upgrading to PRO version</label><br>
                <input type="radio" id="requirement" name="Reason" value="Plugin doesn\'t meets my requirement">
                <label for="requirement">Plugin doesn\'t meets my requirement</label><br>
                <input type="radio" id="broke" name="Reason" value="Plugin broke my site">
                <label for="broke">Plugin broke my site</label><br>
                <input type="radio" id="stopped" name="Reason" value="Plugin suddenly stopped working">
                <label for="stopped">Plugin suddenly stopped working</label><br>
                <input type="radio" id="bug" name="Reason" value="I found a bug">
                <label for="bug">I found a bug</label><br>
                <input type="radio" id="other" name="Reason" value="Other">
                <label for="other">Other</label><br>
                <p id="aco-error"></p>
                <div class="aco-comments" style="display:none;">
                    <textarea type="text" name="Comments" placeholder="Please specify" rows="2"></textarea>
                    <p>For support queries <a href="https://support.acowebs.com/portal/en/newticket?departmentId=361181000000006907&layoutId=361181000000074011" target="_blank">Submit Ticket</a></p>
                </div>
                <button type="submit" class="aco_button" id="awecm_deactivate">Submit & Deactivate</button>
                <a href="#" class="aco_button" id="aco_cancel">Cancel</button>
                <a href="#" class="aco_button" id="aco_skip">Skip & Deactivate</button>
            </form></div></div>';
            echo $view;
        } ?>
        <style>
            #awecm-survey-form-wrap{ display: none;position: absolute;top: 0px;bottom: 0px;left: 0px;right: 0px;z-index: 10000;background: rgb(0 0 0 / 63%); } #awecm-survey-form{ display:none;margin-top: 15px;position: fixed;text-align: left;width: 40%;max-width: 600px;z-index: 100;top: 50%;left: 50%;transform: translate(-50%, -50%);background: rgba(255,255,255,1);padding: 35px;border-radius: 6px;border: 2px solid #fff;font-size: 14px;line-height: 24px;outline: none;}#awecm-survey-form p{font-size: 14px;line-height: 24px;padding-bottom:20px;margin: 0;} #awecm-survey-form .aco_button { margin: 25px 5px 10px 0px; height: 42px;border-radius: 6px;background-color: #1eb5ff;border: none;padding: 0 36px;color: #fff;outline: none;cursor: pointer;font-size: 15px;font-weight: 600;letter-spacing: 0.1px;color: #ffffff;margin-left: 0 !important;position: relative;display: inline-block;text-decoration: none;line-height: 42px;} #awecm-survey-form .aco_button#awecm_deactivate{background: #fff;border: solid 1px rgba(88,115,149,0.5);color: #a3b2c5;} #awecm-survey-form .aco_button#aco_skip{background: #fff;border: none;color: #a3b2c5;padding: 0px 15px;float:right;}#awecm-survey-form .aco-comments{position: relative;}#awecm-survey-form .aco-comments p{ position: absolute; top: -24px; right: 0px; font-size: 14px; padding: 0px; margin: 0px;} #awecm-survey-form .aco-comments p a{text-decoration:none;}#awecm-survey-form .aco-comments textarea{background: #fff;border: solid 1px rgba(88,115,149,0.5);width: 100%;line-height: 30px;resize:none;margin: 10px 0 0 0;} #awecm-survey-form p#aco-error{margin-top: 10px;padding: 0px;font-size: 13px;color: #ea6464;}button#awecm_deactivate:disabled{pointer-events: none;}
        </style>
    <?php }

    /**
     * Cloning is forbidden.
     *
     * @since 1.0.0
     */
    public function __clone()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), $this->_version);
    }

    /**
     * Unserializing instances of this class is forbidden.
     *
     * @since 1.0.0
     */
    public function __wakeup()
    {
        _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), $this->_version);
    }
}