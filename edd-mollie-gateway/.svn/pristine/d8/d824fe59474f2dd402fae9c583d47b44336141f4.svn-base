<?php

use Mollie\Api\MollieApiClient;

class Mollie_EDD_Helper_Api {
	/**
	 * @var \Mollie\Api\MollieApiClient
	 */
	protected static $api_client;

	public function __construct() {
	}

	/**
	 * @param bool $test_mode
	 *
	 * @return \Mollie\Api\MollieApiClient
	 * @throws \Mollie\Api\Exceptions\ApiException
	 */
	public function getApiClient( $test_mode = false ) {
		global $wp_version;
		$mode = $test_mode === false ? 'live' : 'test';
		$api_key = EDD_Mollie()->settings()->get_api_key( $mode );

		if ( has_filter( 'mollie_api_key_filter' ) ) {
			$api_key = apply_filters( 'mollie_api_key_filter', $api_key );
		}

		if ( empty( $api_key ) ) {
			throw new \Mollie\Api\Exceptions\ApiException( esc_html__( 'No API key provided. Please set you Mollie API keys below.', 'edd-mollie-gateway' ) );
		} elseif ( ! preg_match( '/^(live|test)_\w{30,}$/', $api_key ) ) {
			throw new \Mollie\Api\Exceptions\ApiException( sprintf(
				/* translators: %1$s and %2$s are placeholders for the link to the Mollie dashboard and %3$s and %4$s are placeholders for the test and live API key prefixes */
				esc_html__( 'Invalid API key(s). Get them on the %1$sDevelopers page in the Mollie dashboard%2$s. The API key(s) must start with %3$s or %4$s, be at least 30 characters and can\'t further contain any special characters.', 'edd-mollie-gateway' ),
				'<a href="https://my.mollie.com/dashboard/developers/api-keys" target="_blank">',
				'</a>',
				'live_',
				'test_'
			) );
		}

		if (empty(self::$api_client)) {
			$client = new MollieApiClient();
			$client->setApiKey( $api_key );
			$client->setApiEndpoint( self::getApiEndpoint() );
			$client->addVersionString( 'WordPress/' . ( isset( $wp_version ) ? $wp_version : 'Unknown' ) );
			$client->addVersionString( 'EDD/' . defined( 'EDD_VERSION' ) ? EDD_VERSION : '' );
			if (class_exists('EDD_Recurring')) {
				$client->addVersionString( 'EDD_Recurring/' . defined( 'EDD_RECURRING_VERSION' ) ? EDD_RECURRING_VERSION : '' );
			}
			$client->addVersionString( 'EDD_Mollie/' . EDD_MOLLIE_VERSION );

			self::$api_client = $client;
		}

		return self::$api_client;
	}

	/**
	 * Get API endpoint. Override using filter.
	 * @return string
	 */
	public static function getApiEndpoint() {
		return apply_filters( 'edd_mollie_api_endpoint', \Mollie\Api\MollieApiClient::API_ENDPOINT );
	}

	public function getOrderPayment( $order ) {
		$order     = EDD_Mollie_Helper()->data->getEddOrder( $order );
		$test_mode = EDD_Mollie_Helper()->data->getActiveMolliePaymentMode( $order->ID ) == 'test';

		return $this->getApiClient( $test_mode )->payments->get( $order->transaction_id );
	}

}
