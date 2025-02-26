<?php

if ( ! defined('ABSPATH') ) {
	die('Please do not load this file directly!');
}


function gifeed_frontend_script() {
	
	$is_rtl = ( is_rtl() ? '-rtl' : '' );

	// CSS
	wp_register_style( 'gifeed_frontend_main_style', plugins_url( 'css/gifeed-frontend'.$is_rtl.'.css', __FILE__ ), false, IFLITE_VERSION );
	wp_register_style( 'gifeed_lightcase_style', plugins_url( 'css/lightcase.css', __FILE__ ), false, IFLITE_VERSION );
	// JS
	wp_register_script( 'gifeed_frontend_main_script', plugins_url( 'js/gifeed-frontend.js', __FILE__ ), array(), IFLITE_VERSION, true );
	wp_register_script( 'gifeed_lightcase_script', plugins_url( 'js/lightcase.js', __FILE__ ), array(), IFLITE_VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'gifeed_frontend_script' );



