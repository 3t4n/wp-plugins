<?php

/*
 * Reacho for WooCommerce
 *
 * @package           ReachoWooCommerce
 * @author            Reacho
 * @copyright         2024 Reacho
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Reacho – Free Customer Support Plugin for WooCommerce
 * Requires Plugins: woocommerce
 * Plugin URI:        https://reacho.com/
 * Description:       Boost WooCommerce engagement with Reacho's automation, help desk, and live chat. Manage all interactions in one place—no coding needed.
 * Version:           1.0.4
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'You are not allowed to access this file directly.' );
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'REACHO_WOOCOMMERCE_VERSION', '1.0.0' );

if ( ! function_exists( 'reacho_activate' ) ) {
	function reachowc_activate() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-reacho-woocommerce-activator.php';
		register_uninstall_hook(__FILE__, 'reachowc_uninstall');
		Reacho_WooCommerce_Activator::activate();
	}
}

if ( ! function_exists( 'reacho_deactivate' ) ) {
	function reachowc_deactivate() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-reacho-woocommerce-deactivator.php';
		Reacho_WooCommerce_Deactivator::deactivate();
	}
}

if ( ! function_exists( 'reachowc_uninstall' ) ) {
	function reachowc_uninstall() {
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-reacho-woocommerce-deactivator.php';
		Reacho_WooCommerce_Deactivator::deactivate();
	}
}

/** CONSTANTS */
if ( ! defined( 'REACHO_URL' ) ) {
	define( 'REACHO_URL', plugin_dir_url( __FILE__ ) );
}
if ( ! defined( 'REACHO_PATH' ) ) {
	define( 'REACHO_PATH', __DIR__ . '/' );
}
if ( ! defined( 'REACHO_BASENAME' ) ) {
	define( 'REACHO_BASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'REACHO_ADMIN' ) ) {
	define( 'REACHO_ADMIN', admin_url() );
}
if ( ! defined( 'REACHO_PLUGIN_VERSION' ) ) {
	define( 'REACHO_PLUGIN_VERSION', '1.0' );
}

if ( ! function_exists( 'ReachoWC' ) ) {
	/**
	 * Returns the main instance of Reacho_Woocommerce to prevent the need to use globals.
	 *
	 * @return Reacho_WooCommerce
	 * @since  1.0
	 */
	function ReachoWC() {
		return Reacho_WooCommerce::instance();
	}
}

register_activation_hook( __FILE__, 'reachowc_activate' );
register_deactivation_hook( __FILE__, 'reachowc_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-reacho-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function reachofwc_run() {

	$plugin = new Reacho_WooCommerce();
	$plugin->run();

}

reachofwc_run();

