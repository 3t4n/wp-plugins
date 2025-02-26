<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 *
 */
class WC_Gateway_Acima_Credit_Nonce_Handler {
	const NONCE_ACTION_PREFIX = 'acima-credit-checkout-';

	/**
	 * @param $order_id
	 *
	 * @return string
	 */
	public static function generate_nonce( $order_id ): string {
		return wp_create_nonce( self::NONCE_ACTION_PREFIX . $order_id );
	}

	public static function verify_nonce( ?string $nonce, $order_id, $is_block_checkout = false ): bool {
		if ( empty( $nonce ) ) {
			WC_Gateway_Acima_Credit_Logger::log( 'Empty nonce provided' );
			return false;
		}

		// For block checkout, verify REST nonce
		if ( $is_block_checkout ) {
			return wp_verify_nonce( $nonce, 'wp_rest' );
		}

		// For traditional checkout, verify order-specific nonce
		return wp_verify_nonce( $nonce, self::NONCE_ACTION_PREFIX . $order_id );
	}
}
