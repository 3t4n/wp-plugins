<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class WC_Acima_API {
	private string $endpoint;
	private string $client_id;
	private string $client_secret;
	private ?string $audience;

	public function __construct() {
		$options             = get_option( 'woocommerce_acima_credit_settings' );
		$this->endpoint      = rtrim( $options['acima_api_url'] ?? '', '/' ) . '/api/';
		$this->client_id     = $options['acima_client_id'] ?? '';
		$this->client_secret = $options['acima_client_secret'] ?? '';
		$this->audience      = $options['acima_audience'] ?? null;
	}

	/**
	 * Generates the headers to pass to API request.
	 *
	 * @param string $access_token Access token for authentication.
	 *
	 * @return array
	 */
	public function get_headers( string $access_token, string $accept = 'application/vnd.acima-v3+json' ): array {
		return array(
			'Accept'          => $accept,
			'Accept-Encoding' => 'gzip,deflate,br',
			'Authorization'   => 'Bearer ' . $access_token,
			'Connection'      => 'keep-alive',
			'Content-Type'    => 'application/json',
		);
	}

	/**
	 * Send the request to Acima's API.
	 *
	 * @param array       $request
	 * @param string      $api
	 * @param string      $method
	 * @param bool        $with_headers To get the response with headers.
	 * @param string|null $contract_id The contract ID (lease ID) for logging purposes.
	 * @param array       $headers
	 *
	 * @return array
	 * @throws Exception
	 */
	public function request(
		array $request,
		string $api,
		string $method = 'POST',
		bool $with_headers = false,
		?string $contract_id = null,
		array $headers = array()
	): array {
		$logContext = array();
		if ( $contract_id !== null ) {
			$logContext['lease_id'] = $contract_id;
		}
		WC_Gateway_Acima_Credit_Logger::debug( "{$api} request: " . wp_json_encode( $request ), $logContext );

		if ( empty( $headers ) ) {
			$headers = $this->get_headers( $this->get_access_token() );
		}

		$response = wp_safe_remote_post(
			$this->endpoint . $api,
			array(
				'method'  => $method,
				'headers' => $headers,
				'body'    => wp_json_encode( $request ),
				'timeout' => 70,
			)
		);

		$response_code = wp_remote_retrieve_response_code( $response );
		$response_body = wp_remote_retrieve_body( $response );

		// Log and handle errors
		if ( is_wp_error( $response ) || $response_code !== 200 ) {
			$error_data = array(
				'api'     => $api,
				'request' => $request,
			);
			WC_Gateway_Acima_Credit_Logger::debug(
				'Error Response: ' . wp_json_encode( $response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) . PHP_EOL .
				'Failed request: ' . wp_json_encode( $error_data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ),
				$logContext
			);

			$error_message = __( 'There was a problem connecting to the Acima API endpoint.', 'acima-leasing-payment-gateway' );

			if ( ! empty( $response_body ) ) {
				$error_message .= ' ' . $response_body;
			}

			// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped -- Intentional raw message
			throw new Exception( $error_message, $response_code ?: 500 );
		}

		// Try decoding the response body as JSON
		$decoded_body = json_decode( $response_body, true );

		// If JSON decoding fails but the response code is 200, return the raw body
		if ( json_last_error() !== JSON_ERROR_NONE || $decoded_body === null ) {
			WC_Gateway_Acima_Credit_Logger::debug( "Non-JSON response received: {$response_body}", $logContext );
			return array(
				'raw_body' => $response_body, // Include raw response for non-JSON cases
			);
		}

		if ( $with_headers ) {
			return array(
				'headers' => wp_remote_retrieve_headers( $response ),
				'body'    => $decoded_body,
			);
		}

		WC_Gateway_Acima_Credit_Logger::debug( "{$api} response: " . wp_json_encode( $decoded_body ), $logContext );
		return $decoded_body;
	}

	/**
	 * Retrieve API endpoint.
	 *
	 * @param string $api
	 *
	 * @return stdClass|WP_Error
	 * @throws Exception
	 */
	public function retrieve( string $api ) {
		WC_Gateway_Acima_Credit_Logger::debug( $api );

		$access_token = $this->get_access_token();
		$headers      = $this->get_headers( $access_token );

		$response = wp_safe_remote_get(
			$this->endpoint . $api,
			array(
				'headers' => $headers,
				'timeout' => 70,
			)
		);

		if ( is_wp_error( $response ) || empty( $response['body'] ) ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Error Response: ' . wp_json_encode( $response ) );
			return new WP_Error(
				'acima_error',
				esc_html__( 'There was a problem connecting to the Acima API endpoint.', 'acima-leasing-payment-gateway' )
			);
		}

		return json_decode( esc_html( wp_remote_retrieve_body( $response ) ) );
	}

	/**
	 * Get access token from Acima API.
	 *
	 * @return string
	 * @throws Exception
	 */
	public function get_access_token(): string {
		$cached_token = get_transient( 'acima_api_access_token' );
		if ( $cached_token ) {
			return $cached_token;
		}

		$payload = array(
			'client_id'     => $this->client_id,
			'client_secret' => $this->client_secret,
			'grant_type'    => 'client_credentials',
		);

		if ( ! empty( $this->audience ) ) {
			$payload['audience'] = $this->audience;
		}

		$tokenUrl = $this->endpoint . 'oauth/token';
		WC_Gateway_Acima_Credit_Logger::debug( 'Token Request URL: ' . esc_url( $tokenUrl ) );
		WC_Gateway_Acima_Credit_Logger::debug( 'Token Request Payload: ' . wp_json_encode( $payload ) );

		$response = wp_remote_post(
			$tokenUrl,
			array(
				'headers' => array(
					'Content-Type' => 'application/json',
				),
				'body'    => wp_json_encode( $payload ),
			)
		);

		WC_Gateway_Acima_Credit_Logger::debug( 'Token Response: ' . wp_json_encode( $response ) );

		if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) != 200 ) {
			$error_body    = wp_remote_retrieve_body( $response );
			$response_code = wp_remote_retrieve_response_code( $response ) ?: 500;
			WC_Gateway_Acima_Credit_Logger::debug( 'Error retrieving access token: ' . $error_body );

			// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped -- Error is already escaped.
			throw new Exception( sprintf( 'Access token not received. HTTP Status: %d. Error: %s', $response_code, $error_body ), $response_code );
		}

		$body = json_decode( wp_remote_retrieve_body( $response ), true );
		if ( json_last_error() !== JSON_ERROR_NONE ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Invalid JSON in access token response: ' . wp_remote_retrieve_body( $response ) );
			throw new Exception( 'Access token response contains invalid JSON.', 500 );
		}

		if ( ! isset( $body['access_token'] ) ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Access token not received in response: ' . wp_json_encode( $body ) );
			throw new Exception( 'Access token not received.', 500 );
		}

		$expires_in = $body['expires_in'] ?? 3600;
		set_transient( 'acima_api_access_token', $body['access_token'], $expires_in - 300 );

		WC_Gateway_Acima_Credit_Logger::debug( 'New access token retrieved: ' . $body['access_token'] );
		return $body['access_token'];
	}

	/**
	 * Create or update the delivery confirmation on a contract.
	 *
	 * @param string $contract_guid
	 * @param array  $data
	 *
	 * @return stdClass|array
	 * @throws Exception
	 */
	public function create_delivery_confirmation( string $contract_guid, array $data ) {
		$api = "contracts/{$contract_guid}/delivery_confirmation";
		return $this->request( $data, $api, 'PUT', false, $contract_guid );
	}

	/**
	 * Allows for adjusting the invoice on a funded lease to account for returns, exchanges, or other eventualities.
	 *
	 * @param string $contract_guid
	 * @param array  $adjustment_data
	 *
	 * @return stdClass|array
	 * @throws Exception
	 */
	public function adjustment( string $contract_guid, array $adjustment_data ) {
		$api = "contracts/{$contract_guid}/adjustments";

		$default_data = array(
			'type'                    => 'downwards',
			'amount'                  => 0,
			'merchandise_description' => 'n/a',
			'merchandise_total'       => 0,
			'merchandise_condition'   => 'new',
			'damaged'                 => false,
			'damaged_description'     => null,
		);

		$adjustment_data = wp_parse_args( $adjustment_data, $default_data );
		$headers         = $this->get_headers( $this->get_access_token(), 'application/vnd.acima-v1+json' );

		return $this->request( $adjustment_data, $api, 'POST', false, $contract_guid, $headers );
	}
}
