<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/*
  Plugin name: AP Pricing Tables Lite
  Plugin URI: https://accesspressthemes.com/wordpress-plugins/ap-pricing-tables-lite/
  Description: A plugin to add various pricing tables to posts/pages content using shortcodes.
  version: 1.1.6
  Author: AccessPress Themes
  Author URI: https://accesspressthemes.com/
  Text Domain: ap-pricing-tables-lite
  Domain Path: /languages/
  License: GPLv2 or later
 */

//Declearation of the necessary constants for plugin
defined( 'APPTS_VERSION' ) or define( 'APPTS_VERSION', '1.1.6' ); //plugin version

defined( 'APPTS_IMAGE_DIR' ) or define( 'APPTS_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images' );

defined( 'APPTS_JS_DIR' ) or define( 'APPTS_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );

defined( 'APPTS_CSS_DIR' ) or define( 'APPTS_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );

defined( 'APPTS_ASSETS_DIR' ) or define( 'APPTS_ASSETS_DIR', plugin_dir_url( __FILE__ ) . 'assets' );

defined( 'APPTS_LANG_DIR' ) or define( 'APPTS_LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages/' );

defined( 'APPTS_TEXT_DOMAIN' ) or define( 'APPTS_TEXT_DOMAIN', 'ap-pricing-tables-lite' );

defined( 'APPTS_SETTINGS' ) or define( 'APPTS_SETTINGS', 'appts_settings' );

defined( 'APPTS_PLUGIN_DIR' ) or define( 'APPTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

defined( 'APPTS_PLUGIN_DIR_URL' ) or define( 'APPTS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) ); //plugin directory url

/**
 * Decleration of the plugin's main class
 *
 */
if ( ! class_exists( 'APPTS_Class' ) ) {

    class APPTS_Class{

        /**
         * Constructor of the main class
         * @param doesnot have any param
         * @since 1.0.0
         * @return Null
         */
        function __construct(){
            add_action( 'init', array( $this, 'plugin_variables' ) ); // Register globals
            register_activation_hook( __FILE__, array( $this, 'plugin_activation' ) );
            add_action( 'init', array( $this, 'plugin_text_domain' ) );

            add_action( 'admin_menu', array( $this, 'add_appts_menu' ) );

            //register the plugin menu in backend
            add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ) );

            //registers all the assets required for wp-admin
            add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) );

            // ajax call for backend
            add_action( 'wp_ajax_backend_ajax', array( $this, 'appts_backend_ajax' ) );
            add_action( 'wp_ajax_nopriv_backend_ajax', array( $this, 'appts_backend_ajax' ) );

            // action to save the form data
            add_action( 'admin_post_save_settings', array( $this, 'appts_save_settings' ) );
            add_action( 'admin_post_appts_save_form_data', array( $this, 'appts_save_form_data' ) );

            //define and add the shortcodes
            add_shortcode( 'appts_pricing_table', array( $this, 'appts_pricing_table_shortcode' ) ); // shortcode to show the pricing table
            // Table Preview
            add_action( 'template_redirect', array( $this, 'preview_table' ) );
            add_filter( 'admin_footer_text', array( $this, 'appts_admin_footer_text' ) );
            add_filter( 'plugin_row_meta', array( $this, 'appts_plugin_row_meta' ), 10, 2 );
            add_action( 'admin_init', array( $this, 'appts_redirect_to_site' ), 1 );
        }

        /**
         * Make plugin's variables available all around
         * @return NULL
         */
        public function plugin_variables(){
            global $appts_pricing;
            include_once( APPTS_PLUGIN_DIR . 'inc/plugin_variables.php' );
        }

        /**
         * Initilize the required settings by plugin
         * @return void
         * @since 1.0.0
         */
        function plugin_activation(){
            global $wpdb;
            if ( is_multisite() ) {
                $current_blog = $wpdb -> blogid;
                // Get all blogs in the network and activate plugin on each one
                $blog_ids = $wpdb -> get_col( "SELECT blog_id FROM $wpdb -> blogs" );
                foreach ( $blog_ids as $blog_id ) {
                    switch_to_blog( $blog_id );
                    if ( ! get_option( APPTS_SETTINGS ) ) {
                        include( 'inc/backend/activation.php' );
                    }
                }
            } else {
                if ( ! get_option( APPTS_SETTINGS ) ) {
                    include( 'inc/backend/activation.php' );
                }
            }

            // install database
            include('inc/backend/db_install.php');
        }

        /**
         * Function to load the plugin text domain for plugin translation
         * @return type
         */
        function plugin_text_domain(){
            load_plugin_textdomain( APPTS_TEXT_DOMAIN, false, APPTS_LANG_DIR );
        }

        /**
         * Add the plugin's main menu to wordpress backend menu
         * @return null
         */
        function add_appts_menu(){
            add_menu_page( "AP Pricing Tables Lite", "AP Pricing Tables Lite", 'manage_options', 'ap-pricing-tables-lite', array( $this, 'main_page' ), APPTS_IMAGE_DIR . '/icon.png' );
            add_submenu_page( 'ap-pricing-tables-lite', 'Add New Table', 'Add New Table', 'manage_options', 'ap-pricing-tables-lite' . '-add-new', array( $this, 'add_new_table' ) );
            add_submenu_page( 'ap-pricing-tables-lite', 'Plugin Settings', 'Plugin Settings', 'manage_options', 'ap-pricing-tables-lite' . '-settings', array( $this, 'plugin_settings' ) );
            add_submenu_page( 'ap-pricing-tables-lite', 'How to Use', 'How to Use', 'manage_options', 'ap-pricing-tables-lite' . '-how-to-use', array( $this, 'appts_how_to_use' ) );
            add_submenu_page( 'ap-pricing-tables-lite', 'About', 'About', 'manage_options', 'ap-pricing-tables-lite' . '-about', array( $this, 'appts_about' ) );
            add_submenu_page( 'ap-pricing-tables-lite', __( 'Documentation', 'ap-pricing-tables-lite' ), __( 'Documentation', 'ap-pricing-tables-lite' ), 'manage_options', 'appts-doc', '__return_false', null, 9 );
            add_submenu_page( 'ap-pricing-tables-lite', __( 'Check Premium Version', 'ap-pricing-tables-lite' ), __( 'Check Premium Version', 'ap-pricing-tables-lite' ), 'manage_options', 'appts-premium', '__return_false', null, 9 );
        }

        function main_page(){
            include('inc/backend/main_page.php');
        }

        function add_new_table(){
            include('inc/backend/pricing_table_editor.php');
        }

        function plugin_settings(){
            include('inc/backend/plugin_settings.php');
        }

        function appts_how_to_use(){
            include('inc/backend/how_to_use.php');
        }

        function appts_about(){
            include('inc/backend/about.php');
        }

        function appts_stuff(){
            include('inc/backend/stuff.php');
        }

        function register_admin_assets(){
            if ( isset( $_GET[ 'page' ] ) && ($_GET[ 'page' ] == 'ap-pricing-tables-lite' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-add-new' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-how-to-use' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-about' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-settings' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-export-import' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-stuff') ) {

                wp_enqueue_style( 'fontawsome-css', APPTS_ASSETS_DIR . '/font-awesome-4.7.0/css/font-awesome.min.css', '', APPTS_VERSION );
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_style( 'appts_admin_css', APPTS_CSS_DIR . '/backend/backend.css', array(), APPTS_VERSION );
                wp_enqueue_style( 'appts_jquery_ui_css', APPTS_CSS_DIR . '/backend/jquery-ui.css', array(), APPTS_VERSION );
                wp_enqueue_style( 'appts_codemirror_css', APPTS_CSS_DIR . '/backend/codemirror.css', array(), APPTS_VERSION );
                wp_enqueue_style( 'appts_codemirror_theme_eclipse_css', APPTS_CSS_DIR . '/backend/eclipse.css', array(), APPTS_VERSION );

                wp_register_script( 'appts_codemirror', APPTS_JS_DIR . '/backend/codemirror.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'wp-color-picker' ), APPTS_VERSION );
                wp_register_script( 'appts_codemirror-dynamic-css', APPTS_JS_DIR . '/backend/codemirror-css.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'wp-color-picker', 'appts_codemirror' ), APPTS_VERSION );

                wp_enqueue_script( 'wp-color-picker-alpha', APPTS_JS_DIR . '/backend/wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), APPTS_VERSION );
                wp_enqueue_script( 'jquery-ui-sortable' );
                wp_enqueue_script( 'jquery-ui-slider' );
                wp_enqueue_media();
                wp_enqueue_script( 'jquery-ui-draggable' );

                wp_enqueue_script( 'appts_admin_js', APPTS_JS_DIR . '/backend.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-ui-datepicker', 'wp-color-picker', 'appts_codemirror', 'appts_codemirror-dynamic-css' ), APPTS_VERSION );

                //for the backend ajax call
                $ajax_nonce = wp_create_nonce( 'appts-backend-ajax-nonce' );
                wp_localize_script( 'appts_admin_js', 'appts_backend_ajax', array( 'ajax_url' => admin_url() . 'admin-ajax.php', 'ajax_nonce' => $ajax_nonce ) );
            }
        }

        /**
         * Enqueue frontend assets required by plugin
         * @return NULL
         */
        function register_frontend_assets(){

            $plugin_settings = get_option( 'appts_settings' );

            //enqueue the plugin's backend css
            wp_enqueue_style( 'animate_css', APPTS_CSS_DIR . '/frontend/animate.css', array(), APPTS_VERSION );
            wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Raleway|ABeeZee|Aguafina+Script|Open+Sans|Roboto|Roboto+Slab|Lato|Titillium+Web|Playfair+Display|Montserrat|Khand|Oswald|Ek+Mukta|PT+Sans+Narrow|Poppins|Oxygen:300,400,700', array(), APPTS_VERSION );
            wp_enqueue_style( 'appts_frontend_css', APPTS_CSS_DIR . '/frontend/frontend.css', array(), APPTS_VERSION );


            $font_disable_options = $plugin_settings[ 'disable_font' ];
            if ( ! isset( $font_disable_options[ 'fa' ] ) ) {
                wp_enqueue_style( 'font-awesome', APPTS_ASSETS_DIR . '/font-awesome-4.7.0/css/font-awesome.min.css', array(), APPTS_VERSION );
            }

            wp_enqueue_script( 'appts_frontend_js', APPTS_JS_DIR . '/frontend.js', array( 'jquery' ), APPTS_VERSION, true );

            //for the frontend ajax call for load more option
            $ajax_nonce = wp_create_nonce( 'appts-ajax-nonce' );
            wp_localize_script( 'appts_frontend_js', 'frontend_ajax_object', array( 'ajax_url' => admin_url() . 'admin-ajax.php', 'ajax_nonce' => $ajax_nonce ) );
        }

        /**
         * Check if shortcode id already exist
         * @param  [type] $sid  shortcode id
         * @return boolean      TRUE/FALSE
         */
        public static function sid_exist( $sid ){
            global $wpdb;
            $table_name = $wpdb -> prefix . 'appts_tables_data';
            $wpdb -> get_results( "SELECT * FROM $table_name where sid ='$sid'" );
            if ( $wpdb -> num_rows == 1 ) {
                return true;
            }
            return false;
        }

        /**
         * Check and generate the new sid if needed
         * @param  mixed $old_sid  shortcode id
         * @return mixed          Returns the new shortcode id
         */
        public static function get_new_sid( $old_sid ){
            $sid = $old_sid;
            $i = 1;
            while ( self:: sid_exist( $sid ) ) {
                $sid = $sid . '_' . $i;
                $i ++;
            }
            return $sid;
        }

        /**
         * Function to perform backend ajax
         * @return Null
         */
        public static function appts_backend_ajax(){
            $nonce = $_POST[ '_wpnonce' ];
            $created_nonce = 'appts-backend-ajax-nonce';
            if ( ! wp_verify_nonce( $nonce, $created_nonce ) ) {
                die( __( 'Security check', 'ap-pricing-tables-lite' ) );
            }

            if ( $_POST[ '_action' ] == 'copy_table' ) {
                global $wpdb;
                $table_name = $wpdb -> prefix . 'appts_tables_data';

                $postid = $_POST[ 'table_id' ];

                $table_datas = $wpdb -> get_results( "SELECT * FROM $table_name where id =$postid" );
                $table_data = $table_datas[ 0 ];
                $unserialized_table_columns_data = maybe_unserialize( $table_data -> table_data );
                $serialized_table_columns_data = maybe_serialize( $unserialized_table_columns_data );
                $name = $table_data -> name;
                $old_sid = $table_data -> sid;
                $current_time = current_time( 'mysql' );
                $new_sid = self:: get_new_sid( $old_sid );
                $insert_id = $wpdb -> insert( $table_name, array(
                    'name' => $name,
                    'sid' => $new_sid,
                    'table_data' => $serialized_table_columns_data,
                    'created_date' => $current_time
                        ) );
                if ( isset( $insert_id ) ) {
                    $redirect_url = admin_url( 'admin.php?page=ap-pricing-tables-lite&message=3' );
                    echo $redirect_url;
                } else {
                    $redirect_url = admin_url( 'admin.php?page=ap-pricing-tables-lite&message=4' );
                    echo $redirect_url;
                }
                wp_die();
            }

            if ( $_POST[ '_action' ] == 'delete_table' ) {
                global $wpdb;
                $table_name = $wpdb -> prefix . 'appts_tables_data';
                $postid = $_POST[ 'table_id' ];
                if ( $postid == '' ) {
                    $redirect_url = admin_url( 'admin.php?page=ap-pricing-tables-lite&message=2' );
                    die();
                } else {
                    $affected_row = $wpdb -> query( $wpdb -> prepare( "DELETE FROM $table_name WHERE  id = %d", $postid ) );
                    if ( isset( $affected_row ) && $affected_row == '1' ) {
                        $redirect_url = admin_url( 'admin.php?page=ap-pricing-tables-lite&message=1' );
                        echo $redirect_url;
                    } else {
                        $redirect_url = admin_url( 'admin.php?page=ap-pricing-tables-lite&message=2' );
                        echo $redirect_url;
                    }
                }
                wp_die();
            }

            if ( $_POST[ '_action' ] == 'add_row' ) {
                include('inc/backend/add_row.php');
                wp_die();
            }

            if ( $_POST[ '_action' ] == 'add_footer_row' ) {
                include('inc/backend/add_footer_row.php');
                wp_die();
            }

            if ( $_POST[ '_action' ] == 'font_icons' ) {
                include('inc/backend/popup.php');
                wp_die();
            }

            if ( $_POST[ '_action' ] == 'add_column' ) {
                include('inc/backend/column.php');
                wp_die();
            } else {
                echo "<div class='no-columns'>no row to add</div>";
                wp_die();
            }
        }

        /**
         * Function to save the form datas
         * @return null
         * @since 1.0.0
         */
        public static function appts_save_form_data(){
            if ( isset( $_POST[ 'appts-nonce' ] ) && wp_verify_nonce( $_POST[ 'appts-nonce' ], 'appts-nonce' ) ) {
                include('inc/backend/save_form_data.php');
            } else {
                echo "Something went wrong. Please try again by going back";
                die();
            }
        }

        /**
         * Function to save the plugin's settings
         * @return  null Redirect according to the operation
         */
        function appts_save_settings(){
            if ( isset( $_POST[ 'reset_settings' ] ) && wp_verify_nonce( $_POST[ '_wpnonce_restore' ], 'appts-restore-default-settings-nonce' ) ) {
                include('inc/backend/activation.php');
                wp_redirect( admin_url() . 'admin.php?page=ap-pricing-tables-lite-settings&message=3' );
                exit;
            } elseif ( isset( $_POST[ 'save_settings' ] ) && wp_verify_nonce( $_POST[ '_wpnonce_check' ], 'appts-save-settings-nonce' ) ) {
                include('inc/backend/save_settings.php');
            }
            die();
        }

        /**
         * print_r function to print the array
         * @param type $data
         * @return type
         * @since 1.0.0
         */
        function print_array( $data ){
            echo "<pre>";
            print_r( $data );
            echo "<pre>";
        }

        /**
         * Function to import the pricing table data using provided table data
         * @param  [type] $table_row  Table data to be imported
         * @return Boolean            Returns true or false based on import of table data
         */
        function appts_import_table_data( $table_row ){
            $table_row = ( array ) $table_row;
            global $wpdb;
            $table_name = $wpdb -> prefix . 'appts_tables_data';
            $name = $table_row[ 'name' ];
            $sid = $table_row[ 'sid' ];
            $table_data = $table_row[ 'table_data' ];
            $created_date = $table_row[ 'created_date' ];
            $last_modified_date = $table_row[ 'last_modified_date' ];

            $row = $wpdb -> get_var( "SELECT count(*) FROM $table_name WHERE sid ='$sid'" );

            if ( $row == '0' && $sid != '' ) {
                $sid = $sid;

                $result = $wpdb -> insert( $table_name, array(
                    'name' => $name,
                    'sid' => $sid,
                    'table_data' => $table_data,
                    'created_date' => $created_date,
                    'last_modified_date' => $last_modified_date
                        )
                );
            } else {
                //sid is empty or already exist so need to generate new one
                $sid = self:: generateRandomString();
                $result = $wpdb -> insert( $table_name, array(
                    'name' => $name,
                    'sid' => $sid,
                    'table_data' => $table_data,
                    'created_date' => $created_date,
                    'last_modified_date' => $last_modified_date
                        )
                );
            }
            return $result;
        }

        /**
         * Function to generate the random string using number and lowercase english alphabets
         * @param  integer $length Length of the random strings to be generated
         * @return mixed           Returns the mixed value (number and lowercase english alphabets) of length 10
         */
        public static function generateRandomString( $length = 10 ){
            return substr( str_shuffle( str_repeat( $x = '0123456789abcdefghijklmnopqrstuvwxyz-_', ceil( $length / strlen( $x ) ) ) ), 1, $length );
        }

        /**
         * Function to generate random number
         * @param  integer $length Length of the random number to be generated
         * @return mixed           Returns the mixed value of number and alphabets
         */
        public static function generateRandomIndex( $length = 10 ){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen( $characters );
            $randomString = '';
            for ( $i = 0; $i < $length; $i ++ ) {
                $randomString .= $characters[ rand( 0, $charactersLength - 1 ) ];
            }
            return $randomString;
        }

        /**
         * Function to get the table using table id
         * @param  mixed $sid shortcode id of the table
         * @return array      Returns multidimensional array of the table
         */
        public static function get_table( $sid ){
            global $wpdb;
            $table_name = $wpdb -> prefix . 'appts_tables_data';
            $query = "SELECT * FROM $table_name WHERE sid = '$sid'";
            $row = $wpdb -> get_row( $query );
            $table_data = array();
            if ( ! empty( $row ) ) {
                foreach ( $row as $key => $value ) {
                    if ( $key == 'table_data' ) {
                        $table_data[ $key ] = maybe_unserialize( $value );
                    } else {
                        $table_data[ $key ] = $value;
                    }
                }
            } else {
                echo "<div classs='appts-empty-table'>Empty Data received. Please check if you have kept the correct shortcode.</div>";
            }
            return $table_data;
        }

        /**
         * This is the main shortcode to display the pricing tables to the wordpress frontend
         * @param  array $atts Attributes to display the pricing table in frontend
         * @return html        Outputs the pricing table as per shortcode id
         */
        function appts_pricing_table_shortcode( $atts ){
            global $content;
            ob_start();
            include('inc/frontend/shortcode.php');
            $output = ob_get_clean();
            return $output;
        }

        /**
         * Function to do the preview of the pricing table from backend.
         * @return html returns the html output for table preview
         */
        public function preview_table(){
            if ( isset( $_GET[ 'appts_form_preview' ], $_GET[ 'appts_sid' ] ) && is_user_logged_in() ) {
                include( 'inc/frontend/preview-table.php' );
                exit();
            }
        }

        /**
         * Function to format the price
         * @param  float $price                       get the value of the price float value
         * @param  char $currency_thousand_separator  get the currency thousand separator value
         * @param  char $currency_decimal_separator   get the currency decimal separator value
         * @param  int $currency_decimal_no          get the currency decimal number to be diplayed
         * @return html                              formatted number
         */
        public static function format_price( $price, $currency_thousand_separator, $currency_decimal_separator, $currency_decimal_no ){
            $formatted_number = number_format( $price, $currency_decimal_no, $currency_decimal_separator, $currency_thousand_separator );
            return $formatted_number;
        }

        function appts_admin_footer_text( $text ){
            if ( isset( $_GET[ 'page' ] ) ) {
                if ( $_GET[ 'page' ] == 'ap-pricing-tables-lite-add-new' || $_GET[ 'page' ] == 'ap-pricing-tables-lite' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-how-to-use' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-about' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-stuff' || $_GET[ 'page' ] == 'ap-pricing-tables-lite-settings' ) {
                    $link = 'https://wordpress.org/plugins/ap-pricing-tables-lite/reviews/#new-post';
                    $pro_link = 'https://accesspressthemes.com/wordpress-plugins/ap-pricing-tables/';
                    $text = 'Enjoyed AP Pricing Tables Lite? <a href="' . $link . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version of <a href="' . $pro_link . '" target="_blank">AP Pricing Tables</a> - more features, more power!';
                    return $text;
                }
            } else {
                return $text;
            }
        }

        function appts_plugin_row_meta( $links, $file ){

            if ( strpos( $file, 'ap-pricing-tables-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="http://demo.accesspressthemes.com/wordpress-plugins/ap-pricing-tables-lite/" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="https://accesspressthemes.com/documentation/ap-pricing-tables-lite/" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="https://accesspressthemes.com/wordpress-plugins/ap-pricing-tables/" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }

            return $links;
        }

        function appts_redirect_to_site(){
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'appts-doc' ) {
                wp_redirect( 'https://accesspressthemes.com/documentation/ap-pricing-tables-lite/' );
                exit();
            }
            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'appts-premium' ) {
                wp_redirect( 'https://accesspressthemes.com/wordpress-plugins/ap-pricing-tables/' );
                exit();
            }
        }

    }

    //end of the class
} // end of the if class exist function

$pricing_table = new APPTS_Class();
