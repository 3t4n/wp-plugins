<?php
/**
 * Regiser Blocks Category
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if( ! class_exists( 'Wtrb_BoxSlogan_Blocks_Category' ) ) {
    
    class Wtrb_BoxSlogan_Blocks_Category {

        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            if( version_compare( $GLOBALS['wp_version'], '5.7', '<' ) ) {
                add_filter( 'block_categories', [ $this, 'register_block_category' ], 10, 2 );
            } else {
                add_filter( 'block_categories_all', [ $this, 'register_block_category' ], 10, 2 );
            }
        }

        /**
         * Register Blocks Category 
         * @return array
         */
        public function register_block_category( $categories, $post ) {
            return array_merge(
                array(
                    array(
                        'slug'  => 'wtrb-boxslogans',
                        'title' => __( 'Box Slogan Block', 'wtrb-boxslogan-block' ),
                    ),
                ),
                $categories,
            );
        }
    }
}

// Initialize the class instance 
new Wtrb_BoxSlogan_Blocks_Category();