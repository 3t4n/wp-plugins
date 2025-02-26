<?php
/**
 * Plugin Name: Advanced Bootstrap Blocks
 * Plugin URI: https://www.wordpress.org/plugins/advanced-bootstrap-blocks/
 * Description: Flexible Bootstrap 4 blocks for building custom page layouts in the WordPress editor.
 * Version: 1.8
 * License: GPL3+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package advanced-bootstrap-blocks
 */

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
// function create_block_advanced_bootstrap_blocks_block_init() {
// 	register_block_type( __DIR__ . '/build' );
// }
// add_action( 'init', 'create_block_advanced_bootstrap_blocks_block_init' );
