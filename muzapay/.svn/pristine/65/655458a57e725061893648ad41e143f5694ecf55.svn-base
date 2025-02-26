<?php

namespace MuzaPay\Managers;

use MuzaPay\Api\MuzaPayApi;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly


final class ApiManager {
	const PATH = 'woo-muzapay/v1';
	const NONCE_ACTION = 'wp_rest';

	public function __construct(
		MuzaPayApi $muzapay_api
	) {
	}

	public function get_rest_url() {
		return rest_url( $this::PATH );
	}
}
