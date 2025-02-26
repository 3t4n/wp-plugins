<?php

/**
 * The API Wrapper for Reacho
 *
 * @package    ReachoWooCommerce
 * @subpackage ReachoWooCommerce/includes
 * @author     Reacho <support@reacho.com>
 */

class Reacho_WooCommerce_API_Wrapper {

	private $baseApiUrl;

	public function __construct( $reachowc_mode = null ) {

		$reachowc_settings = get_option( Reacho_WooCommerce_Options::REACHO_SETTINGS );
		if ( is_null( $reachowc_mode ) ) {
			$reachowc_mode = 'app';
			if ( $reachowc_settings && isset( $reachowc_settings['reachowc_mode'] ) ) {
				$reachowc_mode = $reachowc_settings['reachowc_mode'];
			}
		}

		$localApiUrl = '';
		if ( $reachowc_settings && $reachowc_mode === 'local' ) {
			$localApiUrl = $reachowc_settings['reachowc_api_url'];
		}

		switch ( $reachowc_mode ) {
			case 'qa':
				$this->baseApiUrl = 'https://qa.reacho.com/api';
				break;
			case 'sandbox':
				$this->baseApiUrl = 'https://sandbox.reacho.com/api';
				break;
			case 'local':
				$this->baseApiUrl = $localApiUrl;
				break;
			default:
				$this->baseApiUrl = 'https://app.reacho.com/api';
				break;
		}
	}

	public function reachowc_lists( $reachowc_private_api_key ) {
		$response = wp_remote_get( $this->baseApiUrl . '/ecommerce/segments/type/LIST', array(
			'headers' => array(
				'X-API-Key'    => $reachowc_private_api_key,
				'Content-Type' => 'application/json',
				'Accept'       => 'application/json',
				'User-Agent'   => 'Reacho-WooCommerce-Webhook/1.0'
			)
		) );

		if ( is_wp_error( $response ) ) {
			return [ 'error' => 'Failed to Connect' ];
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( ! is_null( $data ) ) {
			if ( array_key_exists( 'status', $data ) && $data['status'] === 401 ) {
				return [ 'error' => $data['error'] ];
			}

			return [];

//			if ( count( $data ) > 0 && array_key_exists( 'id', $data[0] ) ) {
//				return $data;
//			}
		}

		return [];
	}

	public function trigger_event( $eventName, $payload = null, $reachoPrivateApiKey = null ) {

		$payload = array_merge( array(
			'eventName' => $eventName
		), $payload );

		if ( is_null( $reachoPrivateApiKey ) ) {
			$reachoPrivateApiKey = ReachoWC()->options->get_reacho_option( 'reachowc_private_api_key' );
		}

		$response = wp_remote_post( $this->baseApiUrl . '/integration/backends/woocommerce/event', array(
			'body'    => wp_json_encode( $payload ),
			'headers' => array(
				'X-API-Key'    => $reachoPrivateApiKey,
				'Content-Type' => 'application/json',
				'Accept'       => 'application/json',
				'User-Agent'   => 'Reacho-WooCommerce-Webhook/1.0'
			)
		) );

		if ( is_wp_error( $response ) ) {
			wp_send_json_error( array( 'message' => 'Failed to fetch response from the API' ) );
		}

		$body = wp_remote_retrieve_body( $response );
		$data = json_decode( $body, true );

		if ( is_array( $data ) && array_key_exists( 'status', $data ) && $data['status'] === 401 ) {
			return [ 'error' => $data['error'] ];
		}

		return $data;
	}

	public function trigger_deactivated_event() {
		$this->trigger_event( 'UNINSTALL', [
			'shopUrl' => site_url()
		] );
	}
}