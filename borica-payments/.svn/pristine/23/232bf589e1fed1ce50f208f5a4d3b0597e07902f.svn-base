<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link      https://borica.bg
 * @since     1.0.0
 *
 * @package   Borica_Woo_Payment_Gateway
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

global $wpdb;

// Remove plugin options.
$options = array(
	'borica_status',
	'borica_testmode',
	'borica_debug',
	'borica_mname',
	'borica_unsuccess_message',
	'borica_success_message',
	'borica_email',
	'borica_order_status',
	'borica_mid_bgn',
	'borica_tid_bgn',
	'borica_test_key_bgn',
	'borica_test_password_bgn',
	'borica_production_key_bgn',
	'borica_production_password_bgn',
	'borica_mid_eur',
	'borica_tid_eur',
	'borica_test_key_eur',
	'borica_test_password_eur',
	'borica_production_key_eur',
	'borica_production_password_eur',
	'borica_payment_response',
);
foreach ( $options as $option ) {
	delete_option( $option );
	delete_site_option( $option );
}

// Clear any cached data that has been removed.
wp_cache_flush();
