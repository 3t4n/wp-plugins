<?php
/**
 * The Template for initializing plugin with action, filter hook.
 *
 * @package Newsletter using Sendy
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WP_Sendy_Settings' ) ) {

    /**
     * WP_Sendy_Settings class.
     */
    class WP_Sendy_Settings {
        /**
         * Hook in constructor
         */
        public function __construct() {
            add_action( 'admin_menu', array( $this, 'wp_sendy_newsletter_add_menu_page' ) );
            add_action( 'admin_init', array( $this, 'register_sendy_settings' ) );
        }

        /**
         * Add setting page
         */
        public function wp_sendy_newsletter_add_menu_page() {
            add_submenu_page( 'options-general.php', esc_html__( 'Newsletter Settings', 'ajax-sendy-newsletter' ), esc_html__( 'Newsletter Settings', 'ajax-sendy-newsletter' ), 'manage_options', 'newsletter-sendy-settings', array( $this, 'sendy_settings_callback' ) );
        }

        /**
         * Add setting file for admin
         */
        public function sendy_settings_callback() {
            include_once plugin_dir_path( __FILE__ ) . 'wp-sendy-settings.php';
        }

        /**
         * Register setting for option table
         */
        public function register_sendy_settings() {
            register_setting( 'ajax-sendy-settings', 'ajax_sendy_setting' );
        }

    }//end class
}//end if
