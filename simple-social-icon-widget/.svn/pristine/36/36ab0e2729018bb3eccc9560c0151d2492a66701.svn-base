<?php 
/*
* Plugin Name: Simple Social Icon Widget
* Plugin URI: http://www.shafiqul.info
* Description: This is a Simple Wordpress Social Icon Widget.
* Author: Md. Shafiqul Islam
* Author URI: http://www.facebook.com
* Version: 1.0
*/


function gcz_social_widget_css() {
	wp_enqueue_style( 'gcz-social-style', plugins_url('/assets/css/social-style.css', __FILE__) );
	wp_enqueue_style( 'gcz-social-font', plugins_url('/assets/css/social-font.css', __FILE__) );
}
add_action( 'wp_enqueue_scripts', 'gcz_social_widget_css' );


if(file_exists(dirname( __FILE__ ) . '/inc/Class-social-widget.php')){
	require_once dirname( __FILE__ ) . '/inc/Class-social-widget.php';
};


function gcz_social_widget_register() {

    register_widget( 'gcz_simple_social_widget' );
 
}
add_action( 'widgets_init', 'gcz_social_widget_register' );