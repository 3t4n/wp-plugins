<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://www.restaumatic.com
 * @since      1.0.0
 *
 * @package    WP_Restaumatic
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) || ! current_user_can( 'activate_plugins' ) || ( dirname( plugin_basename( __FILE__ ) ) !== dirname( WP_UNINSTALL_PLUGIN ) ) ) {
	exit;
}

// Delete admin options.
if ( get_option( 'wp_restaumatic' ) !== false ) {
	delete_option( 'wp_restaumatic' );
}
