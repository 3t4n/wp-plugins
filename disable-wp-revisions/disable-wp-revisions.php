<?php
/**
* Plugin Name: Disable WP Revisions
* Plugin URI: https://carlosmr.com/disable-wp-revisions
* Description: This plugin removes the revision functionality from WordPress so that any content is deleted permanently.
* Version: 1.0.0
* Author: Carlos Mart&iacute;nez Romero
* Author URI: https://carlosmr.com
* License: GPL+2
* Text Domain: disable-wp-revisions
* Domain Path: /languages
*/
// Starts the plugin
add_action( 'plugins_loaded', 'cmr_drev_execute' );
function cmr_drev_execute(){
	if ( !defined( 'WP_POST_REVISIONS' ) ){
	  // Definition of value
	  define( 'WP_POST_REVISIONS', 0 );
	}
	else{
	}
}