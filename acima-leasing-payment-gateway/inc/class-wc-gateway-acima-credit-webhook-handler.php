<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class WC_Gateway_Acima_Credit_Webhook_Handler {
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_webhook' ) );
	}

	public function register_webhook() {
		register_rest_route(
			'acima/v1',
			'/payment/webhook',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'handle_acima_webhook' ),
				'permission_callback' => array( $this, 'check_webhook_permissions' ),
			)
		);
	}

	/**
	 * Handle the incoming webhook data.
	 *
	 * @param WP_REST_Request $request WordPress REST request object.
	 * @return WP_REST_Response Returns a REST response.
	 */
	function handle_acima_webhook( WP_REST_Request $request ): WP_REST_Response {
		$data           = json_decode( $request->get_body(), true );
		$apiKey         = $request->get_header( 'X-Api-Key' );
		$acima_settings = get_option( 'woocommerce_acima_credit_settings', array() );
		$sharedApiKey   = $acima_settings['acima_webhook_secret'] ?? '';
		$enabled        = $acima_settings['acima_webhook_enable'] ?? false;

		try {
			$event     = new WC_Gateway_Acima_Credit_Event( $data, $apiKey, $sharedApiKey, $enabled );
			$factory   = new WC_Gateway_Acima_Credit_Processor_Factory();
			$processor = $factory->create( $event );
			$processor->process();

			return new WP_REST_Response( array( 'message' => 'Webhook processed successfully' ), 200 );
		} catch ( WC_Gateway_Acima_Credit_Exception $e ) {
			WC_Gateway_Acima_Credit_Logger::debug( $e->getMessage(), array( 'lease_id' => $data['contract_id'] ?? null ) );
			return new WP_REST_Response(
				array(
					'message' => 'Failed to process webhook',
					'error'   => $e->getLocalizedMessage(),
				),
				500
			);
		} catch ( Exception $e ) {
			// Fallback for any other exceptions not specifically handled
			WC_Gateway_Acima_Credit_Logger::debug( $e->getMessage() );
			return new WP_REST_Response(
				array(
					'message' => 'An error occurred',
					'error'   => $e->getMessage(),
				),
				500
			);
		}
	}

	public function check_webhook_permissions( $request ): bool {
		$provided_key   = $request->get_header( 'X-Api-Key' );
		$acima_settings = get_option( 'woocommerce_acima_credit_settings' );
		$expected_key   = $acima_settings['acima_webhook_secret'];
		return $provided_key === $expected_key;
	}
}
