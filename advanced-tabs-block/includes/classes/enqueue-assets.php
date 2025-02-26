<?php
/**
 * Enqueue Assets
 * @package AdvancedTabBlocks
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'ATBS_Enqueue_Assets' ) ) {

    class ATBS_Enqueue_Assets {

        /**
         * Constructor
         * @return void
         */
        public function __construct() {
            // generate dynaamic style
            add_filter( 'render_block', [ $this, 'generate_dynamic_style' ], 10, 2 );
            // enqueue editor assets
            add_action( 'enqueue_block_editor_assets', [ $this, 'enqueue_editor_assets' ] );
            // block frontend assets
            add_action( 'enqueue_block_assets', [ $this, 'enqueue_block_assets' ] );
        }

        /**
         * Enqueue Block Assets
         * @return void
         */
        public function enqueue_block_assets(){
            // bootstrap icons 
            wp_enqueue_style(
                'atbs-blocks-bootstrap-icons',
                ATBS_URL . './assets/css/bootstrap-icons.min.css',
                [],
                ATBS_VERSION
            );
        }

        /**
         * Enqueue Editor Assets
         * @return void
         */
        public function enqueue_editor_assets(){
            $atbs_dependency_file = include_once ATBS_DIR_PATH . './build/global/global.asset.php';
            wp_enqueue_script(
                'atbs-blocks-global-js',
                ATBS_URL . './build/global/global.js',
                $atbs_dependency_file['dependencies'],
                $atbs_dependency_file['version'],
                true
            );

            wp_enqueue_style(
                'atbs-blocks-controls-css',
                ATBS_URL . './build/global/global.css',
                [],
                ATBS_VERSION
            );
        }

        /**
         * Register Dynamic Style
         */
        function generate_dynamic_style($block_content, $block) {
            if (isset($block['blockName']) && str_contains($block['blockName'], 'atbs/')) {
                do_action( 'atbs_render_block', $block );
                if (isset($block['attrs']['blockStyle'])) {
                    $style = $block['attrs']['blockStyle'];
                    $handle = isset( $block['attrs']['uniqueId'] ) ? $block['attrs']['uniqueId'] : 'atbs';
                    // convert style array to string
                    if ( is_array($style) ) {
                        $style = implode(' ', $style);
                    }
                    // minify style to remove extra space
                    $style = preg_replace( '/\s+/', ' ', $style );
                    wp_register_style(
                        $handle,
                        false
                    );
                    wp_enqueue_style( $handle );
                    wp_add_inline_style( $handle, $style );
                }
            }
            return $block_content;
        }

    }

}

new ATBS_Enqueue_Assets(); // initialize the class