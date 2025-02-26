<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/*
Plugin Name:  Mobile Viewer
Plugin URI:  https://autovisie.nl
Description: Mobile view widget for editors
Version:     1.1.1
Author:      Maarten Soetens
Author URI:  https://woensdag.nl
Text Domain: mobileviewer
*/


$mobile_viewer_plugin_url = plugin_dir_url( __FILE__ );

include plugin_dir_path( __FILE__ ) . 'includes/class-mobile-viewer.php';
include plugin_dir_path( __FILE__ ) . 'public/class-mobile-viewer-public.php';
include plugin_dir_path( __FILE__ ) . 'includes/class-mobile-viewer-widget.php';



/**
 * Check if mobile viewer is open
 *
 * @return bool
 */
function mobile_viewer_open() {

	if ( is_admin() ) {
		return false;
	}
	elseif ( isset ( $_GET ['mobile_viewer_open'] ) && ( $_GET ['mobile_viewer_open'] == "true" ) ) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Check if user is allowed to edit post
 *
 * @return bool
 */
function mobile_viewer_user_allowed() {
	if ( is_admin() ) {
		return false;
	}
	elseif ( current_user_can('edit_posts') ) {
		return true;
	}
	else {
		return false;
	}
}



/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_mobile_viewer() {
	$mobile_viewer = new Mobile_Viewer;
	$mobile_viewer->run();
}
run_mobile_viewer();
