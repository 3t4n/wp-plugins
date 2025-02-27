<?php
/*
Plugin Name: WP Unicode
Description:This plugin converts text into Unicode. It only supports Nepali (Indic) Unicode, and the effect can be seen only in Comment box
Plugin URI: http://wordpress.org/plugins/wp-unicode
version:1.0
Author:Abiral Neupane
Author URI:http://abiralneupane.com.np
*/

add_action('wp_enqueue_scripts','wpnu_add_script');

function wpnu_add_script(){
	wp_register_script('unicode-api','https://www.google.com/jsapi',array(),null,true);
	wp_enqueue_script('unicode-api-init', plugins_url('js/unicode-init.js', __FILE__ ),array('unicode-api'),null,true );
}