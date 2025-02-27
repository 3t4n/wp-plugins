<?php
/*
Plugin Name: No Title Tooltips
Plugin URI: http://www.irydian.com/shop/wordpress/plugins/no-title-tooltips/
Description: Removes title tooltips
Author: Keef
Version: 1.1.4

This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/
function add_no_tttips() {
wp_enqueue_script('notttips', plugins_url( 'notttips.js' , __FILE__ ),'','1.0.0',true);
}
add_action('wp_enqueue_scripts', 'add_no_tttips');
function no_title_tooltips_options()  {
	require_once('ntttips_options.php');
}
function no_title_tooltips_init() {
   add_options_page('No Title Tooltips', 'No Title Tooltips', 'manage_options','no-title-tooltips','no_title_tooltips_options');
}
add_action('admin_menu', 'no_title_tooltips_init');
?>

