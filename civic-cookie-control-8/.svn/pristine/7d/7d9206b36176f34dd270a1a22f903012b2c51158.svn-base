<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.civicuk.com/
 * @since      1.0.0
 *
 * @package    Civic_Cookie_Control_8
 * @subpackage Civic_Cookie_Control_8/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Civic_Cookie_Control_8
 * @subpackage Civic_Cookie_Control_8/admin
 * @author     Civic Uk <info@civicuk.com>
 */
class CCC_Cookie_Control_Admin {

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
     * @param      string $plugin_name       The name of this plugin.
     * @param      string $version    The version of this plugin.
     */


    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;

    }

    public function ccc_options_apikey_version(){

        if(get_option( 'civic_cookiecontrol_settings' ) && !get_option( 'civic_cookiecontrol_apikey_version' ) ){

            update_option('civic_cookiecontrol_apikey_version',   'v8' );

        }

        return $ccc_options_apikey_version = get_option('civic_cookiecontrol_apikey_version') ? get_option('civic_cookiecontrol_apikey_version') : 'v9';
    }
    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function ccc_enqueue_styles() {

        /**
         * An instance of this class should be passed to the run() function
         * defined in CCC_Cookie_Control_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The CCC_Cookie_Control_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style( 'cookie-controljquery-ui-css', plugin_dir_url( __FILE__ ) . 'css/cookie-control-jquery-ui.css', array(), $this->version, 'all' );

        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cookie-control-admin.css', array(), $this->version, 'all' );

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function ccc_enqueue_scripts() {

        /**
         * An instance of this class should be passed to the run() function
         * defined in CCC_Cookie_Control_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The CCC_Cookie_Control_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cookie-control-admin.js', array( 'jquery' ), $this->version, false );

        wp_enqueue_style( 'wp-color-picker' );

        wp_enqueue_script( 'custom-script-handle', plugin_dir_url( __FILE__ ) . 'js/cookie-control-admin-color.js', array( 'wp-color-picker' ), false, true );

        wp_enqueue_script( 'jquery-ui-tabs' );

        wp_enqueue_script( 'jquery-ui-datepicker' );

        wp_enqueue_style( 'jquery-ui' );

    }

    public function ccc_update_civic_version() {

        update_option( 'civic_cookie_control_version', CIVIC_COOKIE_CONTROL_VERSION );
        return CIVIC_COOKIE_CONTROL_VERSION;

    }

    public function ccc_is_civic_current_version() {

        $version = get_option( 'civic_cookie_control_version' );
        return version_compare( $version, CIVIC_COOKIE_CONTROL_VERSION, '=' ) ? true : false;

    }
    /**
     * Register the administration menu for this plugin into the WordPress Dashboard menu.
     *
     * @since    1.0.0
     */

    public function ccc_add_plugin_admin_menu() {

        /*
         * Add a settings page for this plugin to the Settings menu.
         */
        add_menu_page(
            'Cookie Control 8.',
            'Cookie Control',
            'manage_options',
            $this->plugin_name,
            array( $this, 'display_plugin_setup_page' )
        );
    }

    /**
     * Add settings action link to the plugins page.
     *
     * @since    1.0.0
     */

    public function ccc_add_action_links( $links ) {
        /*
        *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
        */

        $settings_link = array(
            '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __( 'Settings', $this->plugin_name ) . '</a>',
            '<a href="https://www.civicuk.com/sites/default/files/manuals/Cookie-Control-WP-plugin-Manual-v1.0.pdf" target="_blank">' . __( 'Manual' ) . '</a>',
        );
        return array_merge( $settings_link, $links );
    }



    function get_apivesion_dependencies(){

        $ccc_dependencies_version = $this->ccc_options_apikey_version();

        require_once ('partials/'. $ccc_dependencies_version.'/ccc-cookiecontrol-settings-defaults.php');

        $ccc_name_class_dependencies = 'CCC_Cookie_Control_Admin_Dependencies_'.$ccc_dependencies_version;

        $ccc_cookiecontrol_dependencies_obj = new  $ccc_name_class_dependencies( $this->plugin_name,  $this->version );

        return $ccc_cookiecontrol_dependencies_obj;
    }

    

    function ccc_get_api_civic( $server_url, $api_key ) {
        $ccc_licenses_type = [ 'CookieControl%20Free', 'CookieControl%20Single-Site', 'CookieControl%20Multi-Site', 'CookieControl%20Custom' ];
        $ccc_v = "8";

        foreach ( $ccc_licenses_type as $ccc_license_type ) {
            if($this->ccc_options_apikey_version()=="v9"){
                $ccc_v = "9";
            }
            $ccc_fetchURL = "https://apikeys.civiccomputing.com/c/v?d=$server_url&p=$ccc_license_type&v=$ccc_v&k=$api_key&format=json";

            $ccc_response = wp_remote_get( $ccc_fetchURL );

    
            if ( is_wp_error( $ccc_response ) ) {
                $fail_msg = 'not respond';
                return $fail_msg;
            }
            $ccc_body = wp_remote_retrieve_body( $ccc_response );

            $ccc_json_results = json_decode( $ccc_body, true );

            if ( ! isset( $ccc_json_results['valid'] ) ) {
                $fail_msg = 'not respond';
                return $fail_msg;
            } elseif ( $ccc_json_results['valid'] ) {
                return $ccc_json_results;
            }
        }

    }


    /**
     * Render the settings page for this plugin.
     *
     * @since    1.0.0
     */

    function ccc_cookiecontrol_settings_defaults() {

        $ccc_cookiecontrol_settings = $this->get_apivesion_dependencies()->ccc_cookiecontrol_settings_defaults();
        return $ccc_cookiecontrol_settings;

    }

    function ccc_cookiecontrol_settings_init() {

        $ccc_cookiecontrol_settings = $this->get_apivesion_dependencies()->ccc_cookiecontrol_settings_init();
        return $ccc_cookiecontrol_settings;

    }


    public function display_plugin_setup_page() {

        if(get_option( 'civic_cookiecontrol_settings' ) && !get_option( 'civic_cookiecontrol_apikey_version' ) ){

            update_option('civic_cookiecontrol_apikey_version',   'v8' );

        }elseif(!get_option( 'civic_cookiecontrol_settings' ) && !get_option( 'civic_cookiecontrol_settings_v9' )){

            update_option('civic_cookiecontrol_apikey_version',   'v9' );

        }

        include_once 'partials/cookie-control-admin-display.php';
    }

    function ccc_cookiecontrol_settings_validate() {

        $input = $this->get_apivesion_dependencies()->ccc_cookiecontrol_settings_validate();

        return $input;
    }

    function ccc_cookiecontrol_settings_update_check() {
        $ccc_cookiecontrol_settings = $this->ccc_cookiecontrol_settings_init();

        if ( isset( $ccc_cookiecontrol_settings['update'] ) ) {
            echo '<div class="updated fade" id="message"><p>Cookie Control Settings <strong>' . $ccc_cookiecontrol_settings['update'] . '</strong></p></div>';
            unset( $ccc_cookiecontrol_settings['update'] );
        }

    }


    function ccc_cookiecontrol_args() {

        $this->get_apivesion_dependencies()->ccc_cookiecontrol_args();

    }

    function ccc_unset_fields_v8(){

        $ccc_options = $this->ccc_cookiecontrol_settings_validate();

        include('partials/v8/ccc_unwanted_v8_fields.php');

        if( $ccc_unwanted_fields_for_v8 ) {

            foreach ($ccc_unwanted_fields_for_v8  as $ccc_remove_for_v8){
                if(isset($ccc_options[$ccc_remove_for_v8])){
                    unset($ccc_options[$ccc_remove_for_v8]);
                }
            }
            if ( !empty( $ccc_options['altLanguages'] ) ) :
                foreach ($ccc_options['altLanguages'] as $key => $val ) :
                    unset(  $ccc_options['altLanguagesMode'][$key] );
                endforeach;
            endif;

        }
        return $ccc_options;

    }


    function ccc_unset_fields_v9(){

        $ccc_options = $this->ccc_cookiecontrol_settings_validate();

        include('partials/v9/ccc_unwanted_v9_fields.php');
        if( $ccc_unwanted_fields_for_v9 ) {

            foreach ($ccc_unwanted_fields_for_v9 as $ccc_remove_for_v9) {
                if (isset($ccc_options[$ccc_remove_for_v9])) {
                    unset($ccc_options[$ccc_remove_for_v9]);
                }
            }

        }

        return $ccc_options;

    }

    public function ccc_options_update() {

        if(isset( $_POST['cookiecontrol_settings_api_key_version'] )){

            $ccc_options_apikey_version_update = wp_filter_nohtml_kses( $_POST['cookiecontrol_settings_api_key_version']  );

            update_option('civic_cookiecontrol_apikey_version',   $ccc_options_apikey_version_update  );

        }


        if(  isset($_POST['ccc_form_submit']) ) {

            if ($_POST['ccc_form_submit'] == "v9") {

                register_setting('civic_cookiecontrol_settings', 'civic_cookiecontrol_settings_v9', array($this, 'ccc_unset_fields_v9'));
                
            } elseif ($_POST['ccc_form_submit'] == "v8") {

                register_setting('civic_cookiecontrol_settings', 'civic_cookiecontrol_settings', array($this, 'ccc_unset_fields_v8'));

            }
        }

    }

    public function ccc_return_true() {
        return __return_true();
    }

}