<?php

namespace AtoaPay;

use Exception;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class API {
	private $api_endpoint;

	private $access_secret;
	
	private $test_mode;

	public function __construct( $access_secret, $test_mode = true ) {
		$this->access_secret = $access_secret;
		$this->test_mode     = $test_mode;

		$this->set_endpoint( $test_mode );
	}

	private function set_endpoint( $test_mode ) {
		$this->api_endpoint = 'https://api.atoa.me/api/';
	}

	public function create_payment_request( $data ) {
		$api_url = $this->api_endpoint . 'payments/process-payment';

		$response = wp_remote_post(
			$api_url,
			[
				'body'    => wp_json_encode( $data ),
				'headers' => $this->get_request_headers(),
			]
		);
		$result   = wp_remote_retrieve_body( $response );
		
		$result = json_decode( $result );
		if ( isset( $result->message ) ) {
			throw new Exception( $result->message );
		}

		if ( isset( $result->paymentRequestId ) ) {
			return $result;
		}

		throw new Exception( 'Something went wrong. Please try again later.' );
	}

	public function get_payment_status( $id ) {
		$endpoint = $this->api_endpoint . "payments/payment-status/{$id}?type=request";
		
		if ( $this->test_mode ) {
			$endpoint .= '&env=sandbox';
		}

		$response = wp_remote_get(
			$endpoint
		);
		$result   = wp_remote_retrieve_body( $response );

		$result = json_decode( $result );
		if ( isset( $result->message ) ) {
			throw new Exception( $result->message );
		}

		if ( isset( $result->paymentIdempotencyId ) ) {
			return $result;
		}

		throw new Exception( 'Something went wrong. Please try again later.' );
	}

	public function register_webhook() {
		$api_url = $this->api_endpoint . 'webhook/merchant';
		$site_url = get_site_url();

		$data = [
			'url' => $site_url."/wp-json/atoa-pay/v1/webhook",
			'event' => "PAYMENTS_STATUS"
		];

		$response = wp_remote_post(
			$api_url,
			[
				'body'    => wp_json_encode( $data ),
				'headers' => $this->get_request_headers(),
			]
		);
		$result   = wp_remote_retrieve_body( $response );
		
		$result = json_decode( $result );
		if ( isset( $result->message ) ) {
			throw new Exception( $result->message );
		}

		if ( isset( $result->webhookId ) ) {
			return $result;
		}

		throw new Exception( 'Something went wrong while registering webhook. Please try again later.' );
	}

	private function get_request_headers() {
		return [
			'Authorization' => 'Bearer ' . $this->access_secret,
			'Content-Type'  => 'application/json',
		];
	}

	public function verify_payment_signature($orderId, $paymentRequestId, $atoaSignatureHash) {
		// Concatenate orderId and paymentRequestId with a pipe separator
		$data = $orderId . "|" . $paymentRequestId;
		
		// Generate HMAC-SHA256 signature
		$generatedSignature = hash_hmac('sha256', $data, $this->access_secret);
		
		// Compare generated signature with received signature
		$hash = hash_equals($generatedSignature, $atoaSignatureHash);

        if ($hash == 1) return 1;
        else return 0;
	}
}
