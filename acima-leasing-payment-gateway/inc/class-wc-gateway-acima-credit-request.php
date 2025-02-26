<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( WC_Gateway_Acima_Credit_Request::class ) ) {
	/**
	 * Acima Digital Payment Gateway Request
	 *
	 * Provides the Acima Payment Gateway Request
	 *
	 * @class   WC_Gateway_Acima_Credit_Request
	 * @package WooCommerce/Classes/Payment
	 * @author  Acima Digital, Inc
	 */
	class WC_Gateway_Acima_Credit_Request {

		public function __construct() {
		}

		/**
		 * Return the checkout url containing the query strings for the purchased order
		 *
		 * @since  2.0.0
		 * @param  number $order_id
		 * @return string
		 */
		public function get_checkout_url( $order_id, $thank_you_url ) {
			$encoded_thank_you_url = urlencode( $thank_you_url );

			return add_query_arg(
				array(
					'acima-credit' => '1',
					'order'        => $order_id,
					'nonce'        => wp_create_nonce( 'acima-credit-checkout-' . $order_id ),
					'redirect'     => $encoded_thank_you_url,
				),
				wc_get_checkout_url()
			);
		}
	}
}
