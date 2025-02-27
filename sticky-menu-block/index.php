<?php
/**
 * Plugin Name: Sticky Content Block
 * Description: Stick element to top when reached at top.
 * Version: 1.0.2
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: sticky-menu
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'SMB_PLUGIN_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.2' );
define( 'SMB_DIR_URL', plugin_dir_url( __FILE__ ) );

if(!class_exists( 'SMBPlugin' ) ){
	class SMBPlugin{
		function __construct(){
			add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
			add_action( 'init', [$this, 'onInit'] );
		}

		function enqueueBlockAssets(){
			wp_register_script( 'stickyAnything', SMB_DIR_URL . 'public/js/jq-sticky-anything.min.js', [ 'jquery' ], '2.0.1' );
		}

		function onInit() {
			register_block_type( __DIR__ . '/build' );
		}
	}
	new SMBPlugin;
}