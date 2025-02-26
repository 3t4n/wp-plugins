<?php 
/**
 * Includes all the required files
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 if( ! class_exists( 'Dewb_Blocks_Init' ) ) {

    class Dewb_Blocks_Init {

        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            $this->includes();
        }

        /**
         * Include all the required files
         * @return void
         */
        public function includes() {
            require_once trailingslashit( DEWB_PATH ) . 'inc/classes/blocks-category.php';
            require_once trailingslashit( DEWB_PATH ) . 'inc/classes/blocks-register.php';
            require_once trailingslashit( DEWB_PATH ) . 'inc/classes/dynamic-style.php';
            require_once trailingslashit( DEWB_PATH ) . 'inc/classes/enqueue-assets.php';
            require_once trailingslashit( DEWB_PATH ) . 'inc/classes/fonts-loader.php';
        }

    }

 }

 new Dewb_Blocks_Init(); // Initialize the class instance