<?php
/*
Plugin Name: Hide and Show Admin Bar
Plugin URI: http://www.wpcoderr.com
Description: Adds a toggle button to admin bar in the front-end to hide and show the admin bar when required.
Version: 1.0
Author: Kiran Badepalli
Author URI: http://www.wpcoderr.com
License: GPL2
*/

if( !is_admin() ) {

	add_action( 'wp_head', 'kb_hidenshow_adminbar_styles' );
	add_action( 'wp_footer',  'kb_hidenshow_adminbar_scripts' );

}

function kb_hidenshow_adminbar_styles(){
	wp_register_style('kb_hidenshow_adminbar_style', plugins_url( 'assets/css/style.css', __FILE__ ) );
	wp_enqueue_style('kb_hidenshow_adminbar_style');
}

function kb_hidenshow_adminbar_scripts(){
	wp_enqueue_script('jquery');
	wp_register_script('kb_hidenshow_adminbar_script', plugins_url('assets/js/script.js', __FILE__), 'jquery');
	wp_enqueue_script( 'kb_hidenshow_adminbar_script' );

}