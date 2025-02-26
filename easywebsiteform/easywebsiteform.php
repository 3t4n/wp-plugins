<?php
/**
 * Plugin Name:       Easy Website Form
 * Plugin URI:        https://www.easywebsiteform.com/
 * Description:       Integrate forms created with "Easy Website Form" Builder seamlessly into your WordPress site using the "Easy Website Form"    plugin.
 * Version:           1.2.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Easy Website Form
 * Author URI:        https://www.easywebsiteform.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       easywebsiteform
 * Domain Path:       /languages
 */

/**
 * Exit if accessed directly
 */

if ( !defined( 'ABSPATH' ) ) {die( "Don't try this" );}
;

if ( !class_exists( "Ewform_Form" ) ) {
    class Ewform_Form {
        private static $instance = null;
        function __construct() {
            add_action( "plugin_loaded", [$this, "init"] );
            add_action( "admin_enqueue_scripts", [$this, "ewfoptions_admin_assets"] );
            add_action( "wp_enqueue_scripts", [$this, "ewfoptions_frontend_assets"] );
            if ( !get_transient( 'ewform_api_notice_show' ) ) {
                add_action( "ewform_notice_api", "ewform_api_key_not_set", 9999 );
            }
        }
        /**
         * Singleton Instance
         * @return $instance
         */
        public static function Instance() {
            if ( self::$instance == null ) {
                self::$instance = new Ewform_Form();
            }
            return self::$instance;
        }

        /**
         * Initialization
         * @return void
         */
        function init() {
            // Fire on plugins load and ready the textdomain for the plugin.
            $this->ewform_load_textdomain();
            $this->defineConstants();

            // Included Required Files
            require_once "admin/ewf-optionpanel.php";
            require_once "includes/ewform-shortcode.php";
            require_once "includes/ewform-functions.php";
            require_once "includes/forms-tables.php";
            require_once "includes/elementor/ewf-elementor.php";
        }

        /**
         * Define Constant
         * @return void
         */
        public function defineConstants() {
            if ( !defined( "EWFORM_URL" ) ) {
                define( "EWFORM_URL", plugin_dir_url( __FILE__ ) );
            }
            if ( !defined( "EWFORM_PATH" ) ) {
                define( "EWFORM_PATH", plugin_dir_path( __FILE__ ) );
            }
            if ( !defined( "EWFORM_API_URL" ) ) {
                define( "EWFORM_API_URL", 'https://api.easywebsiteform.com/wp' );
            }
            if ( !defined( "EWFORM_FRONTEND_URL" ) ) {
                define( "EWFORM_FRONTEND_URL", 'https://www.easywebsiteform.com' );
            }
            if ( !defined( "EWFORM_APPS_URL" ) ) {
                define( "EWFORM_APPS_URL", 'https://apps.easywebsiteform.com' );
            }
        }

        /**
         * Plugin Language file
         * @return void
         */
        function ewform_load_textdomain() {
            load_plugin_textdomain( "easywebsiteform", false, dirname( __FILE__ ) . "/languages" );
        }

        /**
         * Admin Assets Enquque
         * @param $screen
         * @return void
         */
        function ewfoptions_admin_assets( $screen ) {
            if ( "toplevel_page_ew_forms" == $screen || "easy-website-form_page_ewfoption" == $screen ) {
                wp_enqueue_style( "ewfoptions_style", EWFORM_URL . "assets/css/options-style.css", [], '1.0.0', "all" );

                /* Admin Script */
                wp_enqueue_script( "ewfoptions_script", EWFORM_URL . "assets/js/admin-js.js", ['jquery'], '1.0.0', true );
                $api_key = get_option( 'ewform_key' ) ? get_option( 'ewform_key' ) : '';
                $datas = [
                    'ajaxurl'        => admin_url( "admin-ajax.php" ),
                    'api_key'        => $api_key,
                    "security_nonce" => wp_create_nonce( "security_nonce" ),
                ];
                wp_localize_script( "ewfoptions_script", "obj", $datas );
            }
        }

        function ewfoptions_frontend_assets() {
            wp_enqueue_script( "ewfoptions_script", EWFORM_URL . "assets/js/main-script.js", ['jquery'], '1.0.0', true );

        }
    }
}
// Instantiate Class
$Ewform_Form = Ewform_Form::Instance();