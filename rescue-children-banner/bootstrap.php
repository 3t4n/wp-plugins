<?php
/*
Plugin Name: Rescue Children Banner
Plugin URI:  http://wordpress.org/plugins/rescue-children-banner/
Description: Adds a "Rescue Children" banner to the top left or top right corner of your site, which links to Destiny Rescue's website.
Version:     1.0
Author:      Destiny Rescue
Author URI:  http://destinyrescue.org
License:     GPLv2 or Later
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( __( 'Access denied.', 'rescue-children-banner' ) );
}

define( 'RCB_REQUIRED_PHP_VERSION', '5' );      // Because of various OOP features, pass by reference, etc
define( 'RCB_REQUIRED_WP_VERSION',  '2.8' );    // Because of esc_url(), esc_attr(), etc

/**
 * Checks if the system requirements are met
 *
 * @return bool True if system requirements are met, false if not
 */
function rcb_requirements_met() {
	global $wp_version;

	if ( version_compare( PHP_VERSION, RCB_REQUIRED_PHP_VERSION, '<' ) )
		return false;

	if ( version_compare( $wp_version, RCB_REQUIRED_WP_VERSION, '<' ) )
		return false;

	return true;
}

/**
 * Prints an error that the system requirements weren't met.
 */
function rcb_requirements_not_met() {
	global $wp_version;

	require_once( dirname( __FILE__ ) . '/views/requirements-not-met.php' );
}

// Check requirements and instantiate
if ( rcb_requirements_met() ) {
	require_once( dirname( __FILE__ ) . '/classes/rescue-children-banner.php' );
	require_once( dirname( __FILE__ ) . '/classes/rcb-settings.php' );
	
	$GLOBALS['Rescue_Children_Banner'] = new Rescue_Children_Banner();
	$GLOBALS['RCB_Settings']           = new RCB_Settings();
} else {
	add_action( 'admin_notices', 'rcb_requirements_not_met' );
}
