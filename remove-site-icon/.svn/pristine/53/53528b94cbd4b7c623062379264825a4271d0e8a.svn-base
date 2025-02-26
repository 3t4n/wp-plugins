<?php
/*
Plugin Name: Remove Site Icon
Plugin URI: https://wordpress.org/plugins/remove-site-icon/
Description:  Remove Site Icon
Version: 1
Author: Amit Mittal
Author URI: 
*/

if (!function_exists('remove_site_icon')) {
	function remove_site_icon($wp_customize) {
		$wp_customize->remove_control('site_icon');
	}
}
add_action( 'customize_register', 'remove_site_icon', 20, 1 );  

remove_action( 'wp_head', 'wp_site_icon', 99 );
?>