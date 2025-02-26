<?php
/**
 * Plugin Name: Advanced EDD Reporting – Putler Accurate Analytics and Reports for your EDD store
 * Plugin URI: https://putler.com/connector/edd/
 * Description: Track Easy Digital Downloads transactions data with Putler. Insightful reporting that grows your business.
 * Version: 3.2.0
 * Author: putler, storeapps
 * Author URI: https://putler.com/
 * Text Domain: easy-digital-downloads-putler-connector
 * Domain Path: /languages/
 * Requires at least: 4.8.0
 * Tested up to: 6.4.3
 * Requires PHP: 5.6+
 * Copyright (c) 2006 - 2024 Putler. All rights reserved.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html

 *
 * @package easy-digital-downloads-putler-connector
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'EPC_VERSION' ) ) {
	define( 'EPC_VERSION', '3.2.0' );
}

require_once 'classes/class-putler-edd-connector-db.php';

register_activation_hook( __FILE__, 'eddpc_activate' );
add_action( 'plugins_loaded', 'eddpc_load' );


/**
 * Registers a plugin function to be run when the plugin is activated.
 */
function eddpc_activate() {
	// Redirect to eddpc.
	update_option( '_eddpc_activation_redirect', 'pending' );
}

$eddpc_notice_msg = '';

/**
 * Load the plugin files and necessary hooks
 *
 * @return void
 */
function eddpc_load() {

	global $eddpc_notice_msg;

	$active_plugins = (array) get_option( 'active_plugins', array() );

	if ( is_multisite() ) {
		$active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
	}

	add_action( 'admin_notices', 'eddpc_admin_notices' );

	if ( ( ! in_array( 'woocommerce-putler-connector/woocommerce-putler-connector.php', $active_plugins, true ) && ! array_key_exists( 'woocommerce-putler-connector/woocommerce-putler-connector.php', $active_plugins ) )
		&& ( ! in_array( 'jigoshop-putler-connector/jigoshop-putler-connector.php', $active_plugins, true ) && ! array_key_exists( 'jigoshop-putler-connector/jigoshop-putler-connector.php', $active_plugins ) )
		&& ( ! in_array( 'wp-e-commerce-putler-connector/wpec-putler-connector.php', $active_plugins, true ) && ! array_key_exists( 'wp-e-commerce-putler-connector/wpec-putler-connector.php', $active_plugins ) ) ) {

		$eddpc_notice_msg = '';

		$edd_plugin = 'easy-digital-downloads/easy-digital-downloads.php';
		$edd_pro_plugin = 'easy-digital-downloads-pro/easy-digital-downloads.php';

		if ( in_array( $edd_plugin, $active_plugins, true ) || array_key_exists( $edd_plugin, $active_plugins ) || in_array( $edd_pro_plugin, $active_plugins, true ) || array_key_exists( $edd_pro_plugin, $active_plugins ) ) {

			if ( ! defined( 'PUTLER_GATEWAY' ) ) {
				define( 'PUTLER_GATEWAY', 'EDD' );
			}

			if ( ! defined( 'PUTLER_GATEWAY_PREFIX' ) ) {
				define( 'PUTLER_GATEWAY_PREFIX', 'eddpc' );
			}

			include_once 'classes/class-putler-connector.php';
			$GLOBALS['putler_connector'] = Putler_Connector::get_instance();
			include_once 'classes/class-putler-edd-connector-json.php';
			if ( ! isset( $GLOBALS['edd_putler_connector'] ) ) {
				$GLOBALS['edd_putler_connector'] = new Putler_EDD_Connector_JSON();
			}

			add_action( 'admin_init', 'eddpc_init' );
		} else {
			$eddpc_notice_msg = '<div id="notice" class="error"><p>' .
								'<b>' . __( 'Putler Connector for Easy Digital Downloads', 'putler_connector' ) . '</b> ' . __( 'add-on requires', 'putler_connector' ) . ' <a href="https://wordpress.org/plugins/easy-digital-downloads/">' . __( 'Easy Digital Downloads', 'putler_connector' ) . '</a> ' . __( 'plugin. Please install and activate it.', 'putler_connector' ) .
								'</p></div>';
		}
	} else {
		$eddpc_notice_msg = '<div id="notice" class="error"><p>' .
							__( 'Any one of the Putler Connector\'s can be active at any given time. Please <b>deactivate all the other Putler Connector\'s.</b>', 'putler_connector' ) . '</b> ' .
							'</p></div>';
	}
}

/**
 * Show notices in admin panel, If anything
 *
 * @return void
 */
function eddpc_admin_notices() {
	global $eddpc_notice_msg;

	if ( ! empty( $eddpc_notice_msg ) ) {
		echo wp_kses_post( $eddpc_notice_msg );
	}
}

/**
 * Init the plugin
 *
 * @return void
 */
function eddpc_init() {
	// Init admin menu for settings etc if we are in admin.
	if ( is_admin() ) {

		if ( false === get_option( '_eddpc_update_redirect_253' ) && 'pending' !== get_option( '_eddpc_activation_redirect' ) ) {
			update_option( '_eddpc_update_redirect_253', 1 ); // flag for redirecting on update.
			delete_option( '_eddpc_update_redirect' );
			update_option( '_eddpc_activation_redirect', 'pending' );
		}

		if ( false !== get_option( '_eddpc_activation_redirect' ) && true === ( current_user_can( 'import' ) ) ) {
			// Delete the redirect transient.
			delete_option( '_eddpc_activation_redirect' );
			wp_safe_redirect( admin_url( 'tools.php?page=putler_connector&action=eddpc_activate' ) );
			exit;
		}
	}
}
