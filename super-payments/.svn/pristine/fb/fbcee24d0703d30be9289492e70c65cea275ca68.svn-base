<?php
/**
 * Super Payments event calls.
 *
 * @package super-payments
 */

/**
 * Send event API call.
 *
 * @param string $event_name Event name.
 * @param array  $event_data Event data.
 * @param string $api_key API key.
 *
 * @return array|WP_Error
 */
function wcsp_send_event( $event_name, $event_data, $api_key = null ) {
	$super_payments = new WC_Super_Payments_Gateway();

	if ( empty( $api_key ) ) {
		$api_key = $super_payments->get_option( 'api_key' );
	}

	$integration_id = $super_payments->get_option( 'integration_id' );

	$send_event_request = [
		'headers' => wcsp_get_super_headers( $api_key, 'authorization' ),
		'body'    => wp_json_encode(
			[
				'event'    => $event_name,
				'payload'  => $event_data,
				'metadata' => [
					'platform'           => 'woo-commerce',
					'wordpressVersion'   => get_bloginfo( 'version' ),
					'phpVersion'         => phpversion(),
					'pluginVersion'      => PLUGIN_VERSION,
					'woocommerceVersion' => WC_VERSION,
					'siteUrl'            => get_site_url(),
					'integrationId'      => $integration_id,
				],
			]
		),
	];

	$test_mode        = $super_payments->get_option( 'test_mode' );
	$super_events_url = wcsp_get_super_api_url( $test_mode ) . '/custom-events';

	return wp_remote_post( $super_events_url, $send_event_request );
}

// Include the event category files.
require_once dirname( __FILE__ ) . '/events/cart.php';
require_once dirname( __FILE__ ) . '/events/order.php';
require_once dirname( __FILE__ ) . '/events/settings.php';
require_once dirname( __FILE__ ) . '/events/product.php';
require_once dirname( __FILE__ ) . '/events/ingest.php';
