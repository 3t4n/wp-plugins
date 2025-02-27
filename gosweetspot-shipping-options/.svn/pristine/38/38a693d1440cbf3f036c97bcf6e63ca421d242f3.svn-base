<?php
namespace GSS\Shipping_Options;

use GSS\Shipping;
use GSS\Checkout;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Gss_Shipping_Options' ) ):
    /**
     * Gss Shipping Options core class
     */
    class Gss_Shipping_Options {

        /**
         * The single instance of the class.
         */
        protected static $_instance = null;

        /**
         * Constructor.
         */
        protected function __construct() {
            $this->includes();
            $this->init();
        }

        /**
         * Main Extension Instance.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Cloning is forbidden.
         */
        public function __clone() {
            // Override this PHP function to prevent unwanted copies of your instance.
        }

        /**
         * Unserializing instances of this class is forbidden.
         */
        public function __wakeup() {
            // Override this PHP function to prevent unwanted copies of your instance.
        }

        /**
         * Function for loading dependencies.
         */
        private function includes() {
        }

        /**
         * Function for getting everything set up and ready to run.
         */
        private function init() {

            // init shipping method
            Shipping\init_gss_shiping_method();

        }
        
    }
endif;
