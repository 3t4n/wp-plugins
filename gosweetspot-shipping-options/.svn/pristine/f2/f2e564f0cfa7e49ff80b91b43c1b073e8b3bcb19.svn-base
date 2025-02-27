<?php
namespace GSS\Services;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Gss_WC_Log_Service' ) ):
    /**
     * Gss_WC_Log_Service class
     */
    class Gss_WC_Log_Service {

        /**
         * The single instance of the class.
         */
        protected static $_instance = null;

        public $logger = null;

        /**
         * Constructor.
         */
        protected function __construct() {
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
         * Function for getting everything set up and ready to run.
         */
        private function init() {

            $this->logger = new \WC_Logger();
        }
    }
endif;
