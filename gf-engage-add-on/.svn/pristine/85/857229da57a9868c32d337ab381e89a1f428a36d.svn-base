<?php
/**
Plugin Name: Gravity Forms Engage Add-On
Description: Integrates Gravity Forms with Salsa Labs' Engage CRM, allowing form submissions to automatically create/update Supporters
Version: 1.1.4
Author: Cornershop Creative
Author URI: https://cornershopcreative.com
Text Domain: gfengage
 */

define( 'GF_ENGAGE_VERSION', '1.1.4' );

add_action( 'gform_loaded', array( 'GF_Engage_Bootstrap', 'load' ), 5 );
add_action( 'gform_loaded', array( 'GF_Engage_Bootstrap', 'admin_init' ) );

/**
 * Tells GravityForms to load up the Add-On
 */
class GF_Engage_Bootstrap {

	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gfengage.php' );
		require_once( 'class-gfengage-admin-notice.php' );

		GFAddOn::register( 'GFEngage' );
	}

	/**
	 * Admin init callback.
	 */
	public static function admin_init() {

		// Check for the button nonce/action.
		if ( isset( $_GET['engage_api_clear_cache'] ) && wp_verify_nonce( $_GET['engage_api_clear_cache'], 'engage_api_clearing_cache' ) ) {
			// Clear transients and any other cache data.
			delete_transient( 'gfengage-segments' );

			// Display a notice to the user in the admin.
			new GF_Engage_Admin_Notice(
				__( 'The Engage API cache has been successfully cleared', 'gfengage' ),
				'notice notice-success'
			);
		}
	}
}

function gf_engage() {
	return GFEngage::get_instance();
}
