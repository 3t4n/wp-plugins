<?php
/*
Plugin Name: Admin Menu Width
Plugin URI: http://www.molina34.com
Description: This plugin allows you to scale width of admin menu
Version: 1.0
Author: Danilo Molina
Author URI: http://molina34.com/  
*/

if ( !function_exists('base_admin_css') ) {
	function base_admin_css()
	{
		wp_enqueue_style('base-admin-css', plugins_url( 'css/admin.css' , __FILE__ ) , false, '1.0', 'all');
	}
	add_action('admin_print_styles', 'base_admin_css');
}
?>
