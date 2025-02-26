<?php 
/**
 * Register Blocks
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists( 'Dewb_Register_Blocks' ) ) {

    class Dewb_Register_Blocks {

        /**
         * Constructor 
         * @return void
         */
         public function __construct() {
            add_action( 'init', [ $this, 'register_blocks' ] );
         }

        /**
        * Register Blocks
        * @return void
        */
        public function register_blocks() {
            $blocks = [
                'map'
            ];

            if( is_array( $blocks ) && ! empty( $blocks ) ) {
                foreach ( $blocks as $block ) {
                    $blockType = trailingslashit( DEWB_DIR ) . 'build/blocks/' . $block;
                    register_block_type( trailingslashit( DEWB_DIR ) . 'build/blocks/' . $block  );
                }
            }
        }
    }
}

new Dewb_Register_Blocks(); // Initialize the class instance