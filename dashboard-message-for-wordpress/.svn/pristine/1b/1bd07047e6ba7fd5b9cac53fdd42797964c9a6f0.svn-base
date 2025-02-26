<?php
/*
Plugin Name: Dashboard message
Plugin URI: http://nicolasbouliane.com/plugins/dashboard-message
Description: Displays a message from the administrator on the Dashboard.
Version: 1.0
Author: Nicolas Bouliane
Author URI: http://nicolasbouliane.com
License: GPL2
*/

//Display the message
function displayMessageWidget(){
	include('message.php');
}

//Setup the widget
function setupMessageWidget(){
	wp_add_dashboard_widget('dashboard-message', __('Message from the administrator','dashboard-message'), 'displayMessageWidget');
}

//Load the translation files
load_plugin_textdomain('dashboard-message', "/wp-content/plugins/dashboard-message/");

//Hooks
add_action('wp_dashboard_setup', 'setupMessageWidget' );
?>