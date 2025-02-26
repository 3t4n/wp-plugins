<?php
/*
Plugin Name: Awesome Gallery Widget
Plugin URI: https://desirepress.com
Description: Awesome Gallery Widget is a best way to show a sidebar image gallery with lightbox effect.
Author: DesirePress
Version: 1.0.1
Author URI: https://desirepress.com
-------------------------------------------------*/

include_once('agwClass.php');  // include plugin required class file
include_once('agwWidget.php'); // include plugin widget file 

// Declare/Call class object
$agwClassobj = new AGWClass(); 

// Get plugin current version
function agw_plugin_version(){
	if (!function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}
?>