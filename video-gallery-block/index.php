<?php
/**
 * Plugin Name: Video Gallery Block
 * Description: Display your videos as gallery in a professional way.
 * Version: 1.1.0
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: video-gallery
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'VGB_PLUGIN_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.1.0' );
define( 'VGB_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'VGB_PUBLIC_DIR', VGB_DIR_URL . 'public/' );
define( 'VGB_DIR_PATH', plugin_dir_path( __FILE__ ) );

if( !class_exists( 'VGBPlugin' ) ) {
	class VGBPlugin{
		function __construct(){
			add_action( 'enqueue_block_assets', [$this, 'enqueueBlockAssets'] );
			add_action( 'wp_enqueue_scripts', [$this, 'wpEnqueueScripts'] );
			add_action( 'init', [$this, 'onInit'] );
		}
	
		function enqueueBlockAssets(){
			wp_register_script( 'isotope', VGB_PUBLIC_DIR . 'js/isotope.pkgd.min.js', [], '3.0.6', true );
		}
	
		function wpEnqueueScripts(){
			wp_register_script( 'plyr', VGB_PUBLIC_DIR . 'js/plyr.js', [], '3.7.2', true );
			wp_register_style( 'plyr', VGB_PUBLIC_DIR . 'css/plyr.css', [], '3.7.2' );
		}
	
		function onInit() {
			register_block_type( __DIR__ . '/build' );
		}
	}
	new VGBPlugin();
}