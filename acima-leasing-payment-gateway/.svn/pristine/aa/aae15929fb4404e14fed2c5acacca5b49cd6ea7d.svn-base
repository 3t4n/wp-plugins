<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/class-wc-gateway-acima-credit-ajax-requests.php';

/**
 * Acima Digital Payment Gateway iFrame
 *
 * Loads the iframe on checkout page with proper security measures.
 *
 * @class   WC_Gateway_Acima_Credit_IFrame
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
function acima_leasing_init_iframe() {
	if ( ! class_exists( WC_Gateway_Acima_Credit_IFrame::class ) ) {
		class WC_Gateway_Acima_Credit_IFrame {
			/**
			 * Flag indicating if Acima credit is enabled.
			 *
			 * @var string
			 */
			private string $acima_credit = '';

			/**
			 * The order ID being processed.
			 *
			 * @var string
			 */
			private string $order_id = '';

			/**
			 * Security nonce.
			 *
			 * @var string
			 */
			private string $nonce = '';

			/**
			 * WooCommerce settings.
			 *
			 * @var object
			 */
			private object $wc_settings;

			/**
			 * Customer data for the order.
			 *
			 * @var array
			 */
			private array $customer_data = array();

			/**
			 * Transaction data for the order.
			 *
			 * @var array
			 */
			private array $transaction_data = array();

			/**
			 * Initialize the iframe handler.
			 */
			public function init() {
				if ( ! $this->verify_request() ) {
					return;
				}

				$this->wc_settings = (object) get_option( 'woocommerce_acima_credit_settings', array() );

				if ( is_checkout() && ! is_wc_endpoint_url( 'order-received' ) ) {
					if ( ! wp_verify_nonce( $this->nonce, 'acima-credit-checkout-' . $this->order_id ) ) {
						wp_die(
							esc_html__( 'Security check failed.', 'acima-leasing-payment-gateway' ),
							esc_html__( 'Security Error', 'acima-leasing-payment-gateway' ),
							array( 'response' => 403 )
						);
					}

					$this->load_order_data();
					$this->check_is_ajax();
				}
			}

			/**
			 * Verify and validate the incoming request parameters.
			 *
			 * @return bool
			 */
			private function verify_request(): bool {
				// phpcs:disable WordPress.Security.NonceVerification.Recommended
				$this->acima_credit = ! empty( $_GET['acima-credit'] ) ? sanitize_text_field( wp_unslash( $_GET['acima-credit'] ) ) : '';
				$this->order_id     = ! empty( $_GET['order'] ) ? sanitize_text_field( wp_unslash( $_GET['order'] ) ) : '';
				$this->nonce        = ! empty( $_GET['nonce'] ) ? sanitize_text_field( wp_unslash( $_GET['nonce'] ) ) : '';
				// phpcs:enable WordPress.Security.NonceVerification.Recommended

				WC_Gateway_Acima_Credit_Logger::debug(
					'GET params in verify_request: ' . wp_json_encode(
						array(
							'acima_credit' => $this->acima_credit,
							'order_id'     => $this->order_id,
							'nonce'        => $this->nonce,
						)
					)
				);

				if ( $this->acima_credit !== '1' ) {
					return false;
				}

				return true;
			}

			/**
			 * Load order data from the parser.
			 */
			public function load_order_data() {
				if ( empty( $this->order_id ) ) {
					return;
				}

				$this->customer_data    = WC_Gateway_Acima_Credit_Order_Parser::parse_customer( $this->order_id );
				$this->transaction_data = WC_Gateway_Acima_Credit_Order_Parser::parse_order( $this->order_id );
			}

			/**
			 * Check if request is AJAX and render iframe if not.
			 */
			public function check_is_ajax() {
				$can_render_iframe = ! defined( 'DOING_AJAX' ) || ( defined( 'DOING_AJAX' ) && ! DOING_AJAX );
				WC_Gateway_Acima_Credit_Logger::debug(
					'Check Ajax request to render classic checkout iframe: ' . wp_json_encode(
						array(
							'doing_ajax'        => defined( 'DOING_AJAX' ),
							'can_render_iframe' => $can_render_iframe,
						)
					)
				);

				if ( $can_render_iframe ) {
					$this->render_iframe();
				}
			}

			/**
			 * Render the iframe with proper data encoding.
			 */
			public function render_iframe() {
				if ( empty( $this->order_id ) || empty( $this->nonce ) ) {
					WC_Gateway_Acima_Credit_Logger::debug(
						'Missing order_id or nonce: ' . wp_json_encode(
							array(
								'order_id' => $this->order_id,
								'nonce'    => $this->nonce,
							)
						)
					);
					return;
				}

				WC_Gateway_Acima_Credit_Logger::debug(
					'Rendering iframe with data: ' . wp_json_encode(
						array(
							'order_id'         => $this->order_id,
							'nonce'            => $this->nonce,
							'customer_data'    => $this->customer_data,
							'transaction_data' => $this->transaction_data,
						)
					)
				);

				$rest_nonce = wp_create_nonce( 'wp_rest' );

				WC_Gateway_Acima_Credit_Template_Engine::render(
					'checkout-iframe',
					array(
						'CUSTOMER_DATA'    => rawurlencode( wp_json_encode( $this->customer_data ) ),
						'TRANSACTION_DATA' => rawurlencode( wp_json_encode( $this->transaction_data ) ),
						'THANK_YOU_PAGE'   => $this->get_thank_you_page_url( $this->order_id ),
						'ORDER_ID'         => $this->order_id,
						'NONCE'            => $this->nonce,
						'REST_NONCE'       => $rest_nonce,
					)
				);
			}

			/**
			 * Generate and return the "thank you" page URL.
			 *
			 * @param string $order_id The order ID.
			 * @return string
			 */
			public function get_thank_you_page_url( $order_id ) {
				$order = wc_get_order( $order_id );
				if ( ! $order ) {
					return '';
				}
				return $order->get_checkout_order_received_url();
			}
		}
	}

	$acima_credit_iframe = new WC_Gateway_Acima_Credit_IFrame();
	$acima_credit_iframe->init();
}

add_action( 'wp_footer', 'acima_leasing_init_iframe' );
