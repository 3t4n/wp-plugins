<?php

/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package BlocksKit
 */
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * `wp-blocks`: includes block type registration and related functions.
 *
 * @since 1.0.0
 * @package BlocksKit
 */
function blocks_kit_assets() {

    $postfix = ( SCRIPT_DEBUG == true ) ? '' : '.min';

    // Styles.
    wp_enqueue_style(
            'blocks-kit-style-css', // Handle.
            plugins_url('dist/blocks.style.build.css', dirname(__FILE__)), // Block style CSS.
            array(), 1.0 // Dependency to include the CSS after it.
    );
    wp_enqueue_style(
            'blocks-kit-all-css', // Handle.
            plugins_url('dist/webfonts/css/all.css', dirname(__FILE__)), // Block editor CSS.
            array(), 1.0// Dependency to include the CSS after it.
    );
}
// Hook: Frontend assets.
add_action('enqueue_block_assets', 'blocks_kit_assets');

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * `wp-blocks`: includes block type registration and related functions.
 * `wp-element`: includes the WordPress Element abstraction for describing the structure of your blocks.
 * `wp-i18n`: To internationalize the block's text.
 *
 * @since 1.0.0
 * @package BlocksKit
 */
function blocks_kit_editor_assets() {

    // Scripts.
    wp_enqueue_script(
            'blocks-kit-block-js', // Handle.
            plugins_url('/dist/blocks.build.js', dirname(__FILE__)), // Block.build.js: We register the block here. Built with Webpack.
            array( 'wp-blocks', 'wp-i18n', 'wp-components', 'wp-element', 'wp-editor', 'wp-api', 'lodash' ), // Dependencies, defined above.
            filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
            true // Enqueue the script in the footer.
    );
    
    // Styles.
    wp_enqueue_style(
            'blocks-kit-editor-css', // Handle.
            plugins_url('dist/blocks.editor.build.css', dirname(__FILE__)), // Block editor CSS.
            array('wp-edit-blocks'), 1.0 // Dependency to include the CSS after it.
    );
    
    if (function_exists('wp_set_script_translations')) {
        wp_add_inline_script(
                'blocks-kit', sprintf(
                        'var blocks_kit = { localeData: %s };', wp_json_encode(wp_set_script_translations('blocks-kit', 'blocks-kit'))
                ), 'before'
        );
    } elseif(function_exists('gutenberg_set_script_translations')) {
        wp_add_inline_script(
                'blocks-kit', sprintf(
                        'var blocks_kit = { localeData: %s };', wp_json_encode(gutenberg_set_script_translations('blocks-kit', 'blocks-kit'))
                ), 'before'
        );
    }
}
add_action('enqueue_block_editor_assets', 'blocks_kit_editor_assets');
// End function blocks_kit_editor_assets().
// Hook: Editor assets.

function blocks_kit_block_assets() {
    // Load the compiled styles
    wp_enqueue_style('plp-block-style-css', plugins_url('dist/blocks.style.build.css', dirname(__FILE__)), 
        array(), 1.0
        // filemtime(plugin_dir_path(__FILE__) . 'blocks.style.build.css')
    );
}
add_action('enqueue_block_assets', 'blocks_kit_block_assets');
/**
 * Load plugin text-domain.
 *
 * @since 1.0.0
 * @package BlocksKit
 */
function blocks_kit_load_textdomain() {
    load_plugin_textdomain( 'blocks-kit', false, basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'blocks_kit_load_textdomain' );

/**
 * Register Gutenberg Block Category
 * 
 * @since 1.0.0
 * @package BlocksKit
 */
add_filter( 'block_categories_all', function( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'bk-blocks',
                'title' => __( 'Blocks Kit - Gutenberg Blocks for Freelancers', 'blocks-kit' ),
            ),
        )
    );
}, 10, 2 );

/**
 * Review After Week
 * 
 * @since 1.0.0
 * @package BlocksKit
 */
if ( is_admin() ) {
    require_once plugin_dir_path( __FILE__ ) . '../includes/feedback.php';
 }  
