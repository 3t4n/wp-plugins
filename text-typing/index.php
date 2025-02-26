<?php
/**
 * Plugin Name: Text Typing - Block
 * Description: Make your text in amazing typing effect.
 * Version: 1.0.5
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: text-typing
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'TTB_PLUGIN_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.5' );
define( 'TTB_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'TTB_DIR_PATH', plugin_dir_path( __FILE__ ) );

require_once TTB_DIR_PATH . 'inc/block.php';