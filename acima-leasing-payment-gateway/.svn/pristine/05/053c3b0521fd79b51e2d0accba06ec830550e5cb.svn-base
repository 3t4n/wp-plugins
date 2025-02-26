<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Acima Digital Payment Gateway Head
 *
 * Inject Head values
 *
 * @class   WC_Gateway_Acima_Credit_Head
 * @author  Acima Digital, Inc
 */
function acima_leasing_output_frontend_values() {
	global $wpdb;

	$acimaSettings  = get_option( 'woocommerce_acima_credit_settings' );
	$php_version    = phpversion();
	$mysql_version  = $wpdb->db_version();
	$plugin_version = WC_ACIMA_VERSION;

	WC_Gateway_Acima_Credit_Template_Engine::render(
		'merchant-id',
		array(
			'MERCHANT_ID'      => $acimaSettings['merchant_id'] ?? '',
			'PHP_VERSION'      => $php_version,
			'DATABASE_VERSION' => $mysql_version,
			'PLUGIN_VERSION'   => $plugin_version,
		)
	);
}

/**
 * Add action to display the keys
 */
add_action( 'wp_head', 'acima_leasing_output_frontend_values' );
