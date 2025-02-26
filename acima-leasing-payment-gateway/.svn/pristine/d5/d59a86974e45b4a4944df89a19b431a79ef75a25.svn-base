<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'class-wc-gateway-acima-credit-api.php';

/**
 * Class WC_Gateway_Acima_Credit_Error_Reporter
 *
 * Handles error reporting to Acima's API while preventing recursive logging.
 */
class WC_Gateway_Acima_Credit_Error_Reporter {
	/**
	 * Instance of the Acima API client.
	 *
	 * @var WC_Acima_API
	 */
	private $acima_api;

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->acima_api = new WC_Acima_API();
	}

	/**
	 * Reports an error to the Acima API.
	 *
	 * @param string $location_id The location ID.
	 * @param string $contract_id The contract ID (lease GUID).
	 * @param string $message     The error message.
	 * @param array  $extra_data  Additional data to include in the report.
	 */
	public function report_error( $location_id, $contract_id, $message, $extra_data = array() ) {
		$settings = get_option( 'woocommerce_acima_credit_settings', array() );
		$debug    = isset( $settings['acima_debug'] ) ? $settings['acima_debug'] : false;

		// Skip if there is no contract_id a.k.a lease GUID and debug mode is not enabled
		if ( empty( $contract_id ) && ! $debug ) {
			return;
		}

		$api_url = $this->get_api_url();
		$url     = $api_url . '/api/report/error/' . $location_id;
		$this->log( sprintf( 'Error reporting to Acima URL: %s', $url ) );

		$body = array(
			'errorSource' => 'WooCommerce',
			'logLevel'    => isset( $extra_data['logLevel'] ) ? $extra_data['logLevel'] : 'DEBUG',
			'message'     => $message,
			'contractId'  => $contract_id,
			'extraData'   => $extra_data,
		);

		try {
			$access_token = $this->acima_api->get_access_token();

			$args = array(
				'method'  => 'POST',
				'headers' => array(
					'Content-Type'  => 'application/json',
					'Authorization' => 'Bearer ' . $access_token,
				),
				'body'    => wp_json_encode( $body ),
			);

			$this->log( sprintf( 'Error reporting to Acima Request: %s', wp_json_encode( $args ) ) );

			$response = wp_remote_post( $url, $args );

			if ( is_wp_error( $response ) ) {
				$this->log( sprintf( 'Error reporting to Acima: %s', $response->get_error_message() ) );
			} else {
				$status_code = wp_remote_retrieve_response_code( $response );
				if ( $status_code !== 200 ) {
					$this->log( sprintf( 'Error reporting to Acima. Status code: %d', $status_code ) );
				}
				$this->log( sprintf( 'Error reporting to Acima Response: %s', wp_json_encode( $response ) ) );
			}
		} catch ( Exception $e ) {
			$this->log( sprintf( 'Error getting access token: %s', $e->getMessage() ) );
		}
	}

	/**
	 * Gets the API URL from settings.
	 *
	 * @return string
	 */
	private function get_api_url() {
		$settings = get_option( 'woocommerce_acima_credit_settings', array() );
		return isset( $settings['api_url'] ) ? $settings['api_url'] : '';
	}

	/**
	 * Logs a message using WP's logging functionality instead of error_log.
	 *
	 * Use PHP's error_log instead of the Logger class to prevent recursive logging.
	 *
	 * @param string $message The message to log.
	 *
	 * @return void
	 */
	private function log( $message ) {
		// Only log if WP_DEBUG is enabled
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			// Use WP's debug.log if enabled
			if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
				error_log( // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
					sprintf(
						'[Acima Error Reporter] %s',
						wp_strip_all_tags( $message )
					)
				);
			}
		}
	}
}
