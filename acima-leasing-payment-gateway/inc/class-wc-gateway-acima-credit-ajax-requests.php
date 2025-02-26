<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/class-wc-gateway-acima-credit-order-parser.php';

/**
 * Acima Digital Payment Gateway Checkout Successful
 *
 * Process Ajax Requests
 *
 * @class   WC_Gateway_Acima_Credit_Checkout_Successful
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
function acima_leasing_ajax_checkout_successful() {
	if ( ! class_exists( WC_Gateway_Acima_Credit_Checkout_Successful::class ) ) {
		class WC_Gateway_Acima_Credit_Checkout_Successful {
			private $order_id;
			private $lease_id;

			private $nonce;

			private $checkout_token;

			private $current_time;

			private $test_salt;

			/**
			 * @var bool
			 */
			private $is_block_checkout;

			public function __construct( $current_time = null, $test_salt = null ) {
				$this->current_time = $current_time;
				$this->test_salt    = $test_salt;
			}

			public function init() {
				WC_Gateway_Acima_Credit_Logger::debug( 'Init method called' );

				// phpcs:disable WordPress.Security.NonceVerification.Missing
				$this->order_id          = isset( $_POST['order'] ) ? sanitize_text_field( wp_unslash( $_POST['order'] ) ) : '';
				$this->nonce             = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
				$this->lease_id          = isset( $_POST['lease_id'] ) ? sanitize_text_field( wp_unslash( $_POST['lease_id'] ) ) : '';
				$this->checkout_token    = isset( $_POST['checkout_token'] ) ? sanitize_text_field( wp_unslash( $_POST['checkout_token'] ) ) : '';
				$this->is_block_checkout = isset( $_POST['is_block_checkout'] ) && (bool) sanitize_text_field( wp_unslash( $_POST['is_block_checkout'] ) );
                // phpcs:enable WordPress.Security.NonceVerification.Missing

				WC_Gateway_Acima_Credit_Logger::debug(
					'Sanitized data: ' . wp_json_encode(
						array(
							'order_id'          => $this->order_id,
							'nonce'             => $this->nonce,
							'lease_id'          => $this->lease_id,
							'checkout_token'    => $this->checkout_token,
							'is_block_checkout' => $this->is_block_checkout,
						),
						JSON_THROW_ON_ERROR
					)
				);

				if ( empty( $this->order_id ) || empty( $this->nonce ) ) {
					wp_die(
						wp_json_encode(
							array(
								'success' => false,
								'message' => esc_html__( 'Required parameters missing.', 'acima-leasing-payment-gateway' ),
							)
						)
					);
				}

				$this->check_nonce();
			}

			/**
			 * Verify nonce sent is correct
			 */
			public function check_nonce() {
				WC_Gateway_Acima_Credit_Logger::debug( 'Checking nonce for order ID: ' . $this->order_id );
				WC_Gateway_Acima_Credit_Logger::debug( 'Nonce value: ' . $this->nonce );

				$verify_result = WC_Gateway_Acima_Credit_Nonce_Handler::verify_nonce(
					$this->nonce,
					$this->order_id,
					$this->is_block_checkout
				);
				WC_Gateway_Acima_Credit_Logger::debug( 'Nonce verification result: ' . ( $verify_result ? 'success' : 'failure' ) );

				$success = false;

				if ( $verify_result ) {
					WC_Gateway_Acima_Credit_Logger::debug( 'Nonce verification successful' );
					try {
						$this->close_order();
						$success = true;
					} catch ( Exception $e ) {
						WC_Gateway_Acima_Credit_Logger::error( 'Error closing order: ' . $e->getMessage() );
					}
				} else {
					WC_Gateway_Acima_Credit_Logger::error( 'Nonce verification failed' );
				}

				WC_Gateway_Acima_Credit_Logger::debug( 'Sending response: ' . wp_json_encode( array( 'success' => $success ) ) );
				wp_die(
					wp_json_encode(
						array(
							'success' => $success,
						)
					)
				);
			}

			/**
			 * Close order on WooCommerce and set payment as complete
			 */
			public function close_order() {
				WC_Gateway_Acima_Credit_Logger::debug( 'Attempting to close order: ' . $this->order_id );

				$order = wc_get_order( $this->order_id );
				if ( ! $order ) {
					$error = sprintf(
						// Translators: %s is the order ID.
						esc_html__( 'Order not found: %s', 'acima-leasing-payment-gateway' ),
						esc_html( $this->order_id )
					);
					WC_Gateway_Acima_Credit_Logger::debug(
						$error,
						array(
							'lease_id' => $this->lease_id,
							'order_id' => $this->order_id,
						)
					);
					// phpcs:ignore WordPress.Security.EscapeOutput.ExceptionNotEscaped -- Error is already escaped.
					throw new Exception( $error );
				}

				$order->payment_complete();

				$logContext = array(
					'lease_id' => $this->lease_id,
					'order_id' => $this->order_id,
				);
				WC_Gateway_Acima_Credit_Logger::debug( 'Order found, current status: ' . $order->get_status(), $logContext );
				WC_Gateway_Acima_Credit_Logger::debug( 'Payment marked as complete', $logContext );

				$order->add_order_note( esc_html__( 'Acima Digital payment completed.', 'acima-leasing-payment-gateway' ) );
				$order->add_order_note(
					sprintf(
						// Translators: %s is the Lease ID.
						esc_html__( 'Acima Digital - Lease ID: %s', 'acima-leasing-payment-gateway' ),
						esc_html( $this->lease_id )
					)
				);
				$order->add_order_note(
					sprintf(
						// Translators: %s is the Checkout Token.
						esc_html__( 'Acima Digital - Checkout Token: %s', 'acima-leasing-payment-gateway' ),
						esc_html( $this->checkout_token )
					)
				);
				WC_Gateway_Acima_Credit_Logger::debug( 'Order notes added', $logContext );

				update_post_meta( $this->order_id, '_acima_credit_lease_id', $this->lease_id );
				update_post_meta( $this->order_id, '_acima_credit_checkout_token', $this->checkout_token );
				WC_Gateway_Acima_Credit_Logger::debug( 'Post meta updated, $logContext' );

				$failure_handler = new WC_Gateway_Acima_Credit_Failure_Handler();
				$failure_handler->update_checkout_record( $this->order_id, $this->lease_id, $this->order_id, $this->checkout_token );
				WC_Gateway_Acima_Credit_Logger::debug( 'Checkout record updated', $logContext );

				WC_Gateway_Acima_Credit_Logger::debug( "Order {$this->order_id} closed successfully", $logContext );

				if ( $order->get_status() == 'processing' || $order->get_status() == 'completed' ) {
					WC()->cart->empty_cart();
					WC_Gateway_Acima_Credit_Logger::debug( "Cart for order id {$this->order_id} cleared successfully", $logContext );
				}
			}
		}
	}

	$acima_credit_checkout_successful = new WC_Gateway_Acima_Credit_Checkout_Successful();
	$acima_credit_checkout_successful->init();
}
add_action( 'wp_ajax_acima_leasing_checkout_successful', 'acima_leasing_ajax_checkout_successful' );
add_action( 'wp_ajax_nopriv_acima_leasing_checkout_successful', 'acima_leasing_ajax_checkout_successful' );

/**
 * Acima Digital Payment Gateway Customer Info
 *
 * Return Customer Info for specified Order
 *
 * @class   WC_Gateway_Acima_Credit_Customer_Info
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
function acima_leasing_ajax_customer_info() {
	if ( ! class_exists( WC_Gateway_Acima_Credit_Customer_Info::class ) ) {
		class WC_Gateway_Acima_Credit_Customer_Info {

			public function __construct() {
			}

			public function init() {

				/**
				 * Save POST variables to local
				 */
				// phpcs:disable WordPress.Security.NonceVerification.Missing
				$this->order_id = isset( $_POST['order'] ) ? sanitize_text_field( wp_unslash( $_POST['order'] ) ) : '';
				$this->nonce    = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
				// phpcs:enable WordPress.Security.NonceVerification.Missing

				if ( empty( $this->order_id ) || empty( $this->nonce ) ) {
					wp_die(
						wp_json_encode(
							array(
								'success' => false,
								'message' => esc_html__( 'Required parameters missing.', 'acima-leasing-payment-gateway' ),
							)
						)
					);
				}

				$this->check_nonce();
			}

			/**
			 * Verify nonce sent is correct
			 */
			public function check_nonce() {
				if ( wp_verify_nonce( $this->nonce, 'acima-credit-checkout-' . $this->order_id ) ) {
					$this->get_customer_info();
				}
			}

			/**
			 * Get customer info by order id
			 */
			public function get_customer_info() {
				$data = array(
					'type'    => 'customer',
					'success' => true,
					'data'    => WC_Gateway_Acima_Credit_Order_Parser::parse_customer( $this->order_id ),
				);
				echo wp_json_encode( $data );
				wp_die();
			}
		}
	}
	$acima_credit_customer_info = new WC_Gateway_Acima_Credit_Customer_Info();
	$acima_credit_customer_info->init();
}
add_action( 'wp_ajax_acima_leasing_customer_info', 'acima_leasing_ajax_customer_info' );
add_action( 'wp_ajax_nopriv_acima_leasing_customer_info', 'acima_leasing_ajax_customer_info' );

/**
 * Acima Digital Payment Gateway Order Info
 *
 * Return Order Info for specified Order Id
 *
 * @class   WC_Gateway_Acima_Credit_Order_Info
 * @package WooCommerce/Classes/Payment
 * @author  Acima Digital, Inc
 */
function acima_leasing_ajax_order_info() {
	if ( ! class_exists( WC_Gateway_Acima_Credit_Order_Info::class ) ) {
		class WC_Gateway_Acima_Credit_Order_Info {

			/**
			 * @var string
			 */
			private string $order_id;

			/**
			 * @var string
			 */
			private string $nonce;

			public function __construct() {
			}

			public function init() {

				/**
				 * Save POST variables to local
				 */
				// phpcs:disable WordPress.Security.NonceVerification.Missing
				$this->order_id = isset( $_POST['order'] ) ? sanitize_text_field( wp_unslash( $_POST['order'] ) ) : '';
				$this->nonce    = isset( $_POST['nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['nonce'] ) ) : '';
				// phpcs:enable WordPress.Security.NonceVerification.Missing

				WC_Gateway_Acima_Credit_Logger::debug(
					'Sanitized input data in init function: ' . wp_json_encode(
						array(
							'order_id' => $this->order_id,
							'nonce'    => $this->nonce,
						),
						true
					)
				);

				if ( empty( $this->order_id ) || empty( $this->nonce ) ) {
					wp_die(
						wp_json_encode(
							array(
								'success' => false,
								'message' => esc_html__( 'Required parameters missing.', 'acima-leasing-payment-gateway' ),
							)
						)
					);
				}

				$this->check_nonce();
			}

			/**
			 * Verify nonce sent is correct
			 */
			public function check_nonce() {
				if ( ! wp_verify_nonce( $this->nonce, 'acima-credit-checkout-' . $this->order_id ) ) {
					WC_Gateway_Acima_Credit_Logger::error( 'Invalid nonce for order ID in classic checkout: ' . $this->order_id );
					wp_die(
						wp_json_encode(
							array(
								'success' => false,
								'message' => __( 'Invalid nonce in classic checkout.', 'acima-leasing-payment-gateway' ),
							)
						),
						400
					);
				}

				WC_Gateway_Acima_Credit_Logger::debug( 'Nonce verification passed for order ID classic checkout: ' . $this->order_id );

				$this->get_order_info();
			}

			/**
			 * Get order info
			 */
			public function get_order_info() {
				$data = array(
					'type'    => 'order',
					'success' => true,
					'data'    => WC_Gateway_Acima_Credit_Order_Parser::parse_order( $this->order_id ),
				);
				echo wp_json_encode( $data );
				wp_die();
			}
		}
	}

	$acima_credit_order_info = new WC_Gateway_Acima_Credit_Order_Info();
	$acima_credit_order_info->init();
}

add_action( 'wp_ajax_acima_leasing_order_info', 'acima_leasing_ajax_order_info' );
add_action( 'wp_ajax_nopriv_acima_leasing_order_info', 'acima_leasing_ajax_order_info' );
