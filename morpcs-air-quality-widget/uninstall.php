<?php

/**
 * @link       http://www.morpc.org/program-service/air-quality-program/
 * @since      1.0.0
 *
 * @package    Aqi_Widget
 */

// If uninstall is not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

// Finds all of the plugins options and removes them
$plugin_options = $wpdb->get_results(
	"SELECT option_name
		FROM $wpdb->options
		WHERE option_name
		LIKE 'aqi_%'"
);

foreach( $plugin_options as $option ) {
    delete_option( $option->option_name );
}
