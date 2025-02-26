<?php
/**
 * Plugin Name: Notice Box Block
 * Description: Simple notice block for Gutenberg editor.
 * Version: 1.0.0
 * Author: Lucid Gen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function notice_box_block_register_block() {
    // Register the block editor script.
    wp_register_script(
        'notice-box-block-editor-script',
        plugins_url( 'block.js', __FILE__ ),
        array( 'wp-blocks', 'wp-element', 'wp-editor' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'block.js' ),
        true // Load script in footer
    );

    // Register the block styles.
    wp_register_style(
        'notice-box-block-style',
        plugins_url( 'style.min.css', __FILE__ ),
        array(),
        filemtime( plugin_dir_path( __FILE__ ) . 'style.min.css' )
    );

    // Register the block.
    register_block_type( 'lucidgen/notice-box', array( // namespace is required
        'editor_script' => 'notice-box-block-editor-script',
        'style' => 'notice-box-block-style',
        'editor_style' => 'notice-box-block-style',
    ) );
}
add_action( 'init', 'notice_box_block_register_block' );