<?php
/**
 * @package cMaintenanceMode
 * @version 0.1
 */
/*
Plugin Name: cMaintenanceMode
Plugin URI:
Description: Very simple and free Maintenance Mode for Wordpress.
Version: 0.1
Author: Krzysztof 'cys_ek' Mehl
Author URI: http://www.cys-ek.info/
License: X11
License URI: http://opensource.org/licenses/mit-license.php
Text Domain: cMaintenanceMode
Domain Path: /languages
*/


function cMaintenanceMode() {
	if( !is_user_logged_in() ){
		require_once( 'cMaintenanceMode-Page.php' );
		exit();
	}else{
		add_action( 'wp_footer', 'cMaintenanceMode_PageNotice' );
	}
}
add_action( 'template_redirect', 'cMaintenanceMode' );


function cMaintenanceMode_AdminNotice() {
	require_once( 'cMaintenanceMode-AdminNotice.php' );
}
add_action( 'admin_notices', 'cMaintenanceMode_AdminNotice' );


function cMaintenanceMode_PageNotice() {
	require_once( 'cMaintenanceMode-PageNotice.php' );
}


function cMaintenanceMode_load_textdomain() {
	load_plugin_textdomain( 'cMaintenanceMode', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'cMaintenanceMode_load_textdomain' );
?>
