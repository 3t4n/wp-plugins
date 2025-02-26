<?php
/**
 * Register Dynamic Styles for Blocks
 * @package Boilerplate
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists( 'Wtrb_BoxSlogan_Blocks_Dynamic_Style' ) ) {

    class Wtrb_BoxSlogan_Blocks_Dynamic_Style {
        
        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            add_filter( 'render_block', [ $this, 'dynamic_style' ], 10, 2 );
        }

        /**
         * Generate Dynamic Style
         * @return string
         */
        function dynamic_style( $block_content, $block ) {

            // echo '<pre>' . var_dump($block) . '</pre>';

            if ( isset( $block[ 'blockName' ] ) && 
            str_contains( $block[ 'blockName' ], 'boxslogan' ) ) {

                if ( isset( $block[ 'attrs' ][ 'blockStyle' ] ) ) {
                    $style = $block[ 'attrs' ][ 'blockStyle' ];
                    $handle = isset( $block[ 'attrs' ][ 'uniqueId' ] ) 
                        ? $block[ 'attrs' ][ 'uniqueId' ] 
                        : 'wtrbmr-blocks';
    
                    // convert style array to string
                    if ( is_array( $style ) ) {
                        $style = implode( ' ', $style );
                    }
    
                    // minify style to remove extra space
                    $style = preg_replace( '/\s+/', ' ', $style );
                    
                    wp_register_style(
                        $handle,
                        false,
                        [],
                        filemtime( get_stylesheet_directory() . '/index.css' )
                    );
                    wp_enqueue_style( $handle );
                    wp_add_inline_style( $handle, $style );
    
                }
            }
            return $block_content;
        }
    }
}

// Initialize the class instance
new Wtrb_BoxSlogan_Blocks_Dynamic_Style();