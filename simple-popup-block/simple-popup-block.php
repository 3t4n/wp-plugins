<?php
/**
 * Plugin Name:       Simple Popup Block
 * Description:       A simple and easy to use popup block plugin for block editor
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           1.2.3
 * Author:            codemanas
 * Author URI: 		  https://www.cmblocks.com/
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       simple-popup-block
 ** Domain Path:      /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

defined( 'SIMPLE_POPUP_BLOCK_DIR_PATH' ) || define( 'SIMPLE_POPUP_BLOCK_DIR_PATH', plugin_dir_path( __FILE__ ) );
defined( 'SIMPLE_POPUP_BLOCK_BASENAME' ) || define( 'SIMPLE_POPUP_BLOCK_BASENAME', plugin_basename(__FILE__) );
defined( 'SIMPLE_POPUP_BLOCK_DIR_URL' ) || define( 'SIMPLE_POPUP_BLOCK_DIR_URL', plugin_dir_url( __FILE__ ) );
defined( 'SIMPLE_POPUP_BLOCK_ASSETS_URL' ) || define( 'SIMPLE_POPUP_BLOCK_ASSETS_URL', plugin_dir_url( __FILE__ ) . 'assets/' );

require_once SIMPLE_POPUP_BLOCK_DIR_PATH . 'includes/Bootstrap.php';

