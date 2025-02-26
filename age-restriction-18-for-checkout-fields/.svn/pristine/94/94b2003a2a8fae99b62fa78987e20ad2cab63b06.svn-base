<?php
/*
Plugin Name: Age Restriction 18+ for Checkout Fields
Plugin URI:  https://br.wordpress.org/plugins/age-restriction-18-for-checkout-fields/
Description: O age restriction 18+ for Checkout fields impossibilita o cadastros de usuários menores de 18 anos. Em suas possibilidades de uso estão: loja de bebidas, sex shop, medicamentos ou qualquer outra aplicação que necessite limitar a idade ao cadastrar o usuário para compra.
Version:     1.0.0
Author:      Heitor Pedroso
Author URI:  https://github.com/heitorspedroso
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: age-restriction-18-for-checkout-fields
*/
if(!defined('ABSPATH')){
    exit;
}

if(!class_exists('Age_Restriction_18_for_checkout_fields')):
    class Age_Restriction_18_for_checkout_fields {
        /**
         * Plugin version.
         *
         * @var string
         */
        const VERSION = '1.0.0';
        /**
         * Instance of this class.
         *
         * @var object
         */
        protected static $instance = null;
        /**
         * Initialize the plugin public actions.
         */
        private function __construct() {
            // Load the instalation hook
            register_activation_hook( __FILE__, 'age_restriction_18_for_checkout_fields_install' );
            // Load plugin text domain.
            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
            //Load includes
            $this->includes();
            $this->publicIncludes();
        }
        /**
         * Return an instance of this class.
         *
         * @return object A single instance of this class.
         */
        public static function get_instance() {
            // If the single instance hasn't been set, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         * Get templates path.
         *
         * @return string
         */
        public static function get_templates_path() {
            return plugin_dir_path( __FILE__ ) . 'templates/';
        }

        /**
         * Load the plugin text domain for translation.
         */
        public function load_plugin_textdomain() {
            load_plugin_textdomain( 'age-restriction-18-for-checkout-fields', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        }

        /**
         * Instalation Plugin
         */
        public function age_restriction_18_for_checkout_fields_install() {
            // Trigger our function that registers the custom post type
            pluginprefix_setup_post_types();
            // Clear the permalinks after the post type has been registered
            flush_rewrite_rules();
        }
        /**
         * Includes
         */
        private function includes() {
            include_once 'admin/controllers/controller-register-admin-pages.php';
        }

        /**
         * Includes
         */
        private function publicIncludes() {
            include_once 'public/controllers/controller-validate-fields-checkout.php';
        }
        /**
         * Debug
         */
        public function log_me($message) {
            if (WP_DEBUG === true) {
                if (is_array($message) || is_object($message)) {
                    error_log(print_r($message, true));
                } else {
                    error_log($message);
                }
            }
        }
    }
    add_action( 'plugins_loaded', array( 'Age_Restriction_18_for_checkout_fields', 'get_instance' ) );
endif;
//register_deactivation_hook ( __FILE__ , 'pluginprefix_function_to_run'  );
