<?php

/**
 * Plugin Name: Restaurant Ordering System
 * Plugin URI: https://help.flipdish.com/en/
 * Description: Add ordering service to your Restaurant or Takeaway's website
 * Version: 1.4.16
 * Text Domain: flipdish_ordering
 * Domain Path: /languages
 * Author: Flipdish
 * Author URI: https://www.flipdish.com/
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {

	die;

}

// Define current plugin version
if ( ! defined( 'FLIPDISH_ORDERING_VERSION' ) ) {
	define( 'FLIPDISH_ORDERING_VERSION', '1.4.16' );
}

// load text domain
function flipdish_ordering_load_textdomain() {

	load_plugin_textdomain( 'flipdish_ordering', false, plugin_dir_path( __FILE__ ) . 'languages/' );

}
add_action( 'plugins_loaded', 'flipdish_ordering_load_textdomain' );
function deregister_exact_metrics() {
		
		wp_dequeue_script( 'exactmetrics-frontend-script' );
		wp_deregister_script( 'exactmetrics-frontend-script' );

}
		
// if admin area
if ( is_admin() ) {

	// include dependencies
	require_once plugin_dir_path( __FILE__ ) . 'admin/admin-menu.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-register.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-callbacks.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-validate.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/settings-on-update.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/preview-page.php';
	require_once plugin_dir_path( __FILE__ ) . 'admin/system-info-page.php';

}

// include dependencies: admin and public
require_once plugin_dir_path( __FILE__ ) . 'includes/core-functions.php';

/**
 * default plugin options
 * @since 1.3.0 Added initial screen, mobile full screen and store banner
 * @since 1.4.1 fd_mobile_full_screen is set to false
 */
function flipdish_ordering_options_default() {

	return array(
		//'fd_page_id'				=> 'order',
		//'fd_theme_type'           => 'light',
		'fd_data_offset_value'      => 0,
		'fd_new_web_ordering' 		=> false,
		'fd_apple_pay'              => false,
		'fd_initial_screen'         => 'options',
		'fd_mobile_full_screen'     => false,
		'fd_store_banner'           => 'none',
		'fd_add_css'				=> '',
		
	);

}


/**
 * Run on plugin loaded
 * @since 1.4.0 Added update new values
 */
function flipdish_ordering_check_version() {

	if ( FLIPDISH_ORDERING_VERSION !== get_option( 'FLIPDISH_ORDERING_VERSION' ) ) {

		// Check if user upgrading from pre 1.2.0 - OLD OPTIONS
		if ( get_option( 'FLIPDISH_ORDERING_VERSION' ) < '1.2.0' ) {

			update_to_new_options();
			update_new_values();

		} else {

			update_new_values();

		}

		// Update version number in database
		update_option( 'FLIPDISH_ORDERING_VERSION', FLIPDISH_ORDERING_VERSION );
	}

}
add_action( 'plugins_loaded', 'flipdish_ordering_check_version' );

/**
 * Update new options to default values
 * @since 1.4.0
 */
function update_new_values() {

	$default_options = flipdish_ordering_options_default();
	$current_version = get_option( 'FLIPDISH_ORDERING_VERSION' );

	// Current Options
	$current_options = get_option( 'flipdish_ordering_options', flipdish_ordering_options_default() );

	// Add default values that were not in previous versions
	if ( $current_version <= '1.3.0' ) {

		$current_options['fd_initial_screen']     = $default_options['fd_initial_screen'];
		$current_options['fd_mobile_full_screen'] = $default_options['fd_mobile_full_screen'];
		$current_options['fd_store_banner']       = $default_options['fd_store_banner'];

	}

	// Update options
	update_option( 'flipdish_ordering_options', $current_options );

}

/**
 * Update to new data structure
 * @since 1.2.0
 */
function update_to_new_options() {

	$default_options = flipdish_ordering_options_default();

	// Retrieve options from pre 1.2.0
	// Save options in new format and delete old
	$portal_id           = get_option( 'portal_ID' ) ? get_option( 'portal_ID' ) : '';
	$light_or_dark_theme = get_option( 'light_or_dark_theme' ) ? get_option( 'light_or_dark_theme' ) : $default_options['fd_theme_type'];
	$data_offset_value   = get_option( 'data_offset_value' ) ? get_option( 'data_offset_value' ) : $default_options['fd_data_offset_value'];
	$apple_pay           = get_option( 'apple_pay' ) ? get_option( 'apple_pay' ) : $default_options['fd_apple_pay'];

	// Update options to new way of saving
	$new_options                              = $default_options;
	$new_options['fd_portal_id']              = $portal_id;
	$new_options['fd_theme_type']             = $light_or_dark_theme;
	$new_options['fd_data_offset_value']      = $data_offset_value;
	$new_options['fd_apple_pay']              = $apple_pay;

	update_option( 'flipdish_ordering_options', $new_options );

	// Remove old records from database
	delete_option( 'portal_ID' );
	delete_option( 'light_or_dark_theme' );
	delete_option( 'data_offset_value' );
	delete_option( 'apple_pay' );
}

/*
 * Add columns to restaurants post list
 */

function wpse_(){
	remove_action('wp_head', 'exactmetrics_tracking_script', 1);
}