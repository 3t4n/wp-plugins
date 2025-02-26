<?php



/*

Plugin Name: PARSI TEXT ADS
Plugin URI: http://www.alivazirinia.ir
Description: با استفاده از این افزونه میتوانید به سایت خود تبلیغات متنی را اضافه کنید
Author: Ali Vaziri
Author URI: http://www.alivazirinia.ir
Version: 2.6
License:GPL 2.0

*/



// Define Plugin Main URL

define ( 'wp_text_ads_URL', plugin_dir_url(__FILE__) );


// add expire date for ads
include ('ads-expiration.php');


// Enqueue Styles

function text_ads_style_enqueue() {

	include ('inc/add-styles.php');

}

add_action( 'init', 'text_ads_style_enqueue');





// Set Custom Post Type For ADs

add_action('init', 'add_ad_custom_posts' );

function add_ad_custom_posts() {

	include ('inc/add-post-type.php');

}





// Set ADs Meta Boxes

include ('inc/add-meta-boxes.php');



// Set Shortcode And Make Them Work In Widget

function display_text_ads_list(){

	include ('inc/add-shortcode.php');

}

add_action( 'init', 'display_text_ads_list');

add_filter('widget_text', 'do_shortcode');



?>
