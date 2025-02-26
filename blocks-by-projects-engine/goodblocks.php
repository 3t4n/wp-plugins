<?php
/**
 * Plugin Name: GoodBlocks by Projects Engine
 * Plugin URI: https://projectsengine.com/plugin/blocks-by-projects-engine/
 * Description: GoodBlocks is a powerful plugin designed to enhance your Gutenberg editor experience with a wide variety of customizable and versatile blocks.
 * Version: 1.1.2
 * Author: Projects Engine
 * Author URI: https://projectsengine.com
 * Text Domain: goodblocks
 * Requires at least: 6.5
 * Requires PHP: 7.4
 *
 * @package GoodBlocks
 */

defined( 'ABSPATH' ) || exit;

define( 'GBPE_PLUGIN_DOMAIN', 'goodblocks' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . '/core/goodblocks.php';
new goodblocks\GoodBlocks;