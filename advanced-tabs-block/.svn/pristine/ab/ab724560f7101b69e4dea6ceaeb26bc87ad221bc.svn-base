<?php
/**
 * Register All Blocks 
 * @package AdvancedTabBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'ATBS_Register_Blocks' ) ) {

    class ATBS_Register_Blocks {

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

            $blocksFolder = ATBS_DIR . '/build/blocks';
    
            if ( is_dir( $blocksFolder ) ) {
    
                $contents = scandir( $blocksFolder );
    
                $blocks = array_filter( $contents, function( $item ) use ( $blocksFolder ) {
                    $itemPath = $blocksFolder . DIRECTORY_SEPARATOR . $item;
                    return is_dir($itemPath) && !in_array($item, ['.', '..']);
                });
            
                foreach ( $blocks as $block ) {
                    register_block_type( ATBS_DIR . '/build/blocks/' . $block  );
                }
    
            } 
    
         }

    }

}

new ATBS_Register_Blocks(); // initialize the class 
