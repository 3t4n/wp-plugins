<?php
/*
Plugin Name: Animated Number Counter - Dev Peoples
Description: jQuery Animated Number Counter
Author: Dev Peoples
Author URI: https://devpeoples.github.io/
Version: 1.0.0
*/

define('DP_COUNTER_URI', plugin_dir_url(__FILE__) );

// Add settings page
if (file_exists(plugin_dir_path(__FILE__) . 'src/option-page.php')) {
	require_once(plugin_dir_path(__FILE__) . 'src/option-page.php');
}

// Add ajax handler
if (file_exists(plugin_dir_path(__FILE__) . 'src/ajax.php')) {
	require_once(plugin_dir_path(__FILE__) . 'src/ajax.php');
}

// Add counter shortcode
if (file_exists(plugin_dir_path(__FILE__) . 'src/register-template.php')) {
	require_once(plugin_dir_path(__FILE__) . 'src/register-template.php');
}

