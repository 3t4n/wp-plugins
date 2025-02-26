<?php
/**
* @package Hypercardinator
* @version 0.1
*/
/*
Plugin Name: Hypercardinator
Plugin URI: https://darcynorman.net/projects/wordpress/hypercardinator/
Description: Hypercardifies your site using css and webfont - thanks to Giles Booth for releasing the Chicago-like webfont ChiKareGo via a Creative Commons license at http://www.pentacom.jp/pentacom/bitfontmaker2/gallery/?id=3778
Author: D'Arcy Norman
Version: 0.1
Author URI: https://darcynorman.net/
Text Domain: hypercardinator
*/
function hypercardinator() {
	// 
}

// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

/**
 * Register style sheet.
 */
function register_plugin_styles() {
	wp_register_style( 'hypercardinator', plugins_url( 'style.css', __FILE__ ) );
	wp_enqueue_style( 'hypercardinator' );
}

