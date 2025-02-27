<?php
/**
 * Plugin Name: Print Page - Block
 * Description: Print the entire page with single click
 * Version: 1.1.2
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: print-page
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'PPB_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.1.2' );

if( !class_exists( 'PPBPlugin' ) ){
	class PPBPlugin{
		function __construct(){
			add_action( 'init', [$this, 'onInit'] );
		}
	
		function onInit() {
			register_block_type( __DIR__ . '/build' );
		}
	}
	new PPBPlugin();
}