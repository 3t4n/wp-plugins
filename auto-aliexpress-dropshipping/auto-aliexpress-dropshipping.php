<?php
/**
 * Plugin Name: Auto Aliexpress Dropshipping
 * Plugin URI: http://wphobby.com
 * Description: Auto Aliexpress dropshipping for Woocommerce
 * Version: 1.0.3
 * Author: wphobby
 * Author URI: https://wphobby.com/
 *
 * @package Auto Aliexpress
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

/**
 * Set constants
 */
if ( ! defined( 'AUTO_ALIEXPRESS_DIR' ) ) {
    define( 'AUTO_ALIEXPRESS_DIR', plugin_dir_path(__FILE__) );
}

if ( ! defined( 'AUTO_ALIEXPRESS_URL' ) ) {
    define( 'AUTO_ALIEXPRESS_URL', plugin_dir_url(__FILE__) );
}

if ( ! defined( 'AUTO_ALIEXPRESS_VERSION' ) ) {
    define( 'AUTO_ALIEXPRESS_VERSION', '1.0.3' );
}

if ( ! defined( 'AUTO_ALIEXPRESS_FILE' ) ) {
	define( 'AUTO_ALIEXPRESS_FILE', __FILE__ );
}

/**
 * Class Auto_Aliexpress
 *
 * Main class. Initialize plugin
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Auto_Aliexpress' ) ) {
    /**
     * Auto_Aliexpress
     */
    class Auto_Aliexpress {

        const DOMAIN = 'auto-aliexpress';

        /**
         * Instance of Auto_Aliexpress
         *
         * @since  1.0.0
         * @var (Object) Auto_Aliexpress
         */
        private static $_instance = null;

        /**
         * Get instance of Auto_Aliexpress
         *
         * @since  1.0.0
         *
         * @return object Class object
         */
        public static function get_instance() {
            if ( ! isset( self::$_instance ) ) {
                self::$_instance = new self;
            }
            return self::$_instance;
        }

        /**
         * Constructor
         *
         * @since  1.0.0
         */
        private function __construct() {
            $this->includes();
            $this->init();
        }

        /**
         * Load plugin files
         *
         * @since 1.0
         */
        private function includes() {
            // Core files.
            require_once AUTO_ALIEXPRESS_DIR . '/includes/class-core.php';
            require_once AUTO_ALIEXPRESS_DIR . '/includes/class-addon-loader.php';
        }


        /**
         * Init the plugin
         *
         * @since 1.0.0
         */
        private function init() {
            // Initialize plugin core
            $this->auto_aliexpress = Auto_Aliexpress_Core::get_instance();

            // Create tables
            $this->create_tables();

            // Initial Schedule Class for WP Cron Jobs
            Auto_Aliexpress_Schedule::get_instance();

            add_action( 'admin_init', array( $this, 'welcome' ) );

            /**
             * Triggered when plugin is loaded
             */
            do_action( 'auto_aliexpress_loaded' );

            add_action('current_screen', array( $this, 'current_screen_action') );
        }

        /** Redirect to welcome page when activation */
		public function welcome() {
            $page_url = 'admin.php?page=auto-aliexpress-welcome';
            if ( ! get_transient( '_auto_aliexpress_activation_redirect' ) ) {
                return;
            }
            delete_transient( '_auto_aliexpress_activation_redirect' );
            wp_safe_redirect( admin_url( $page_url ) );
            exit;
		}

        /**
        * Current screen action
        *
        * @since 1.0.2
        * @return void
        */
        public function current_screen_action() {
            $screen = get_current_screen();
            $where = array(
                'toplevel_page_auto-aliexpress',
                'auto-aliexpress_page_auto-aliexpress-campaign',
                'auto-aliexpress_page_auto-aliexpress-integrations',
                'auto-aliexpress_page_auto-aliexpress-wizard',
                'auto-aliexpress_page_auto-aliexpress-campaign-wizard',
                'auto-aliexpress_page_auto-aliexpress-logs',
                'auto-aliexpress_page_auto-aliexpress-settings',
                'auto-aliexpress_page_auto-aliexpress-upgrade',
                'auto-aliexpress_page_auto-aliexpress-welcome'
            );

            $enable_notice = true;
            if ( in_array($screen->base, $where) ) {
                $enable_notice = false;
            };

            if($enable_notice){
                // add_action( 'admin_notices', array( $this, 'display_admin_notice' ) );
                // add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_notice_scripts' ));
            }else{
                wp_enqueue_style( 'auto-aliexpress-hide-style', AUTO_ALIEXPRESS_URL . 'assets/css/hide.css', array(), AUTO_ALIEXPRESS_VERSION, false );
            }
        }

        /**
         * @since 1.0.0
         */
        public static function create_tables() {
            global $wpdb;
            $wpdb->hide_errors();

            $table_schema = [
                "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}auto_aliexpress_logs` (
                `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `camp_id` int(11) DEFAULT NULL,
                `level` ENUM('log','info','warn','error','success') NOT NULL DEFAULT 'log',
                `message` text DEFAULT NULL,
                `created` DECIMAL(16, 6) NOT NULL,
                PRIMARY KEY (`id`)
            )  CHARACTER SET utf8 COLLATE utf8_general_ci;",
            ];
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            foreach ( $table_schema as $table ) {
                dbDelta( $table );
            }
        }




    }
}

if ( ! function_exists( 'auto_aliexpress' ) ) {
    function auto_aliexpress() {
        return Auto_Aliexpress::get_instance();
    }

    /**
     * Init the plugin and load the plugin instance
     *
     * @since 1.0.0
     */
    add_action( 'plugins_loaded', 'auto_aliexpress' );
}

/**
* Plugin install hook
*
* @since 1.8.0
* @return void
*/
if ( ! function_exists( 'auto_aliexpress_install' ) ) {
    function auto_aliexpress_install(){
        // Hook for plugin install.
		do_action( 'auto_aliexpress_install' );

		/*
		* Set current version.
		*/
		update_option( 'auto_aliexpress_version_pro', AUTO_ALIEXPRESS_VERSION );

        set_transient( '_auto_aliexpress_activation_redirect', 1 );
    }
}

// When activated, trigger install method.
register_activation_hook( AUTO_ALIEXPRESS_FILE, 'auto_aliexpress_install' );