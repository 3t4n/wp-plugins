<?php
/*
Plugin Name: All in One Social Lite
Plugin URI: http://cube3x.com/all-in-one-social
Description: Innovative plugin for social sharing and generating traffic
Version: 1.0
Author: cube3x
Author URI: http://cube3x.com
License: GPLv2 or later
*/
?>
<?php
include_once('cube3x-social-settings.php');
include_once('cube3x-social-widget-class.php');
include_once('cube3x-social-general-page.php');
/* Add our function to the widgets_init hook. */
add_action( 'widgets_init', 'load_cube3x_social' );

/* Function that registers our widget. */
function load_cube3x_social() {
	register_widget( 'Cube3x_Social_Lite' );
}

//Adding CSS for the widget
function add_cube3x_social_scripts(){
wp_enqueue_style( 'cube3x-social-css', plugins_url( 'css/cube3x-social-style.css' , __FILE__ ), array(), '1.0' );
wp_enqueue_script( 'all-in-one-social-js', plugins_url( 'js/all-in-one-social.js' , __FILE__ ), array('jquery'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'add_cube3x_social_scripts' );

//Add Menu Page
add_action('admin_menu', 'cube3x_social_menu_page');

function cube3x_social_menu_page() {
   add_options_page( 'All in One Social Lite', 'All in One Social Lite', 'manage_options', 'all-in-one-social-lite', 'all_in_one_social_general_callback');
}
?>