<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use Automattic\WooCommerce\Admin\Overrides\OrderRefund;

/**
 * WC_Gateway_Acima_Credit_Refund_Handler class.
 *
 * Handles order cancellations and refunds by interacting with the Acima Credit API.
 */
class WC_Gateway_Acima_Credit_Refund_Handler {
	/**
	 * @var mixed|WC_Acima_API
	 */
	private $api;

	public function __construct( $api = null ) {
		add_action( 'woocommerce_admin_order_data_after_order_details', array( $this, 'add_cancel_button' ) );
		add_action( 'woocommerce_order_refunded', array( $this, 'handle_refund' ), 10, 2 );
		add_action( 'wp_ajax_acima_cancel_order', array( $this, 'ajax_cancel_order' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_cancel_scripts' ) );
		$this->api = $api ?: new WC_Acima_API();
	}

	public function enqueue_cancel_scripts() {
		wp_register_script(
			'acima-cancel-order',
			plugins_url( '/public/js/admin-cancel-order.js', ACIMA_CREDIT_MAIN_FILE ),
			array( 'jquery' ),
			WC_ACIMA_VERSION,
			true
		);

		wp_localize_script(
			'acima-cancel-order',
			'acimaRefund',
			array(
				'errorMessage' => __( 'Failed to cancel Acima order.', 'acima-leasing-payment-gateway' ),
			)
		);
	}

	public function add_cancel_button( $order ) {
		$payment_method = $order->get_payment_method();
		if ( $payment_method === WC_Gateway_Acima_Credit::PAYMENT_METHOD_CODE ) {
			$order_id = (int) $order->get_id();

			wp_localize_script(
				'acima-cancel-order',
				'acimaRefund',
				array(
					'orderId'      => $order_id,
					'nonce'        => wp_create_nonce( 'acima_cancel_order' ),
					'errorMessage' => esc_html__( 'Failed to cancel Acima order.', 'acima-leasing-payment-gateway' ),
				)
			);

			wp_enqueue_script( 'acima-cancel-order' );
			?>
			<button style="margin-top: 1rem;" id="acima_cancel_order" class="button button-primary">
				<?php esc_html_e( 'Cancel Acima Order', 'acima-leasing-payment-gateway' ); ?>
			</button>
			<?php
		} else {
			WC_Gateway_Acima_Credit_Logger::debug( 'Could not add cancel button for payment method ' . $payment_method );
		}
	}

	private function get_lease_id( $order_id ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'acima_checkout';

		// Try to get from cache first
		$cache_key = 'acima_lease_id_' . $order_id;
		$lease_id  = wp_cache_get( $cache_key );

		if ( false === $lease_id ) {
            // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
			$lease_id = $wpdb->get_var(
				$wpdb->prepare( 'SELECT lease_id FROM ' . esc_sql( $table_name ) . ' WHERE order_id = %d', $order_id )
			);
            // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery

			if ( $lease_id ) {
				wp_cache_set( $cache_key, $lease_id );
			}
		}

		return $lease_id;
	}

	private function process_order_adjustment( $order_id, $context, $refund_id = null ) {
		WC_Gateway_Acima_Credit_Logger::debug( "Processing $context for Order ID: $order_id" );

		$order  = wc_get_order( $order_id );
		$refund = wc_get_order( $refund_id );

		if ( ! $order ) {
			wp_send_json_error( array( 'message' => __( 'Invalid order or refund.', 'acima-leasing-payment-gateway' ) ) );
		}

		$payment_method = wc_get_payment_gateway_by_order( $order )->id;

		if ( $payment_method !== WC_Gateway_Acima_Credit::PAYMENT_METHOD_CODE ) {
			wp_send_json_error(
				array(
					'message' => sprintf(
						// translators: %s is the payment method name (e.g., "paypal", "stripe", etc.)
						__( 'Order payment method is not Acima Credit. Payment method is %s', 'acima-leasing-payment-gateway' ),
						esc_html( $payment_method )
					),
				)
			);
		}

		$contract_guid = $this->get_lease_id( $order_id );

		if ( ! $contract_guid ) {
			wp_send_json_error( array( 'message' => __( 'No Acima contract GUID found.', 'acima-leasing-payment-gateway' ) ) );
		}

		try {
			$adjustment_data = $this->build_adjustment_payload( $order, $refund );
			WC_Gateway_Acima_Credit_Logger::debug( 'Adjustment Request Data: ' . wp_json_encode( $adjustment_data ) );

			$response = $this->api->adjustment( $contract_guid, $adjustment_data );
			WC_Gateway_Acima_Credit_Logger::debug( 'Adjustment Response: ' . wp_json_encode( $response ) );

			// Handle the case where response includes a 'raw_body' (plain text response)
			if ( isset( $response['raw_body'] ) ) {
				$raw_response = $response['raw_body'];
				WC_Gateway_Acima_Credit_Logger::debug( "Raw Response: {$raw_response}" );

				// Check if the response indicates success
				if ( stripos( $raw_response, 'submitted' ) !== false ) {
					$order->update_status( 'cancelled' );
					$order->add_order_note( __( 'Acima order cancelled successfully.', 'acima-leasing-payment-gateway' ) );

					wp_send_json_success( array( 'message' => __( 'Acima order cancelled successfully.', 'acima-leasing-payment-gateway' ) ) );
				} else {
					throw new Exception(
						sprintf(
							// translators: %s is the raw response returned by the Acima API
							__( 'Unexpected response: %s', 'acima-leasing-payment-gateway' ),
							$raw_response
						)
					);
				}
			}

			// Handle JSON responses (fallback)
			if ( $response && $response['response']['code'] == 200 ) {
				$order->update_status( 'cancelled' );
				$order->add_order_note( __( 'Acima order cancelled successfully.', 'acima-leasing-payment-gateway' ) );

				wp_send_json_success( array( 'message' => __( 'Acima order cancelled successfully.', 'acima-leasing-payment-gateway' ) ) );
			} else {
				throw new Exception( __( 'Failed to cancel Acima order.', 'acima-leasing-payment-gateway' ) );
			}
		} catch ( Exception $e ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Adjustment Exception: ' . $e->getMessage() );

			$user_friendly_message = sprintf(
				// translators: %s is the error message from the caught exception
				__( 'Error cancelling Acima order: %s', 'acima-leasing-payment-gateway' ),
				$e->getMessage()
			);

			wp_send_json_error(
				array(
					'message' => $user_friendly_message,
				)
			);
		}
	}

	/**
	 * @return void
	 */
	public function ajax_cancel_order() {
		check_ajax_referer( 'acima_cancel_order', 'nonce' );

		if ( ! isset( $_POST['order_id'] ) ) {
			wp_send_json_error( array( 'message' => __( 'Order ID is required', 'acima-leasing-payment-gateway' ) ) );
		}

		$order_id = (int) $_POST['order_id'];
		$this->process_order_adjustment( $order_id, 'full cancellation' );
	}

	/**
	 * Handle order status change for cancellations and refunds.
	 *
	 * @param int $order_id The order ID.
	 * @param int $refund_id The refund ID.
	 */
	public function handle_refund( $order_id, $refund_id ) {
		$this->process_order_adjustment( $order_id, 'refund', $refund_id );
	}

	public function build_adjustment_payload( $order, $refund ): array {
		$items_description = array();

		// Calculate current refund amount (positive value)
		$refund_amount = $refund ? abs( $refund->get_amount() ) : $order->get_total();

		// Get all previous refunds and sum their amounts
		$previous_refund_total = 0;
		if ( $refund ) {
			$all_refunds = $order->get_refunds();
			foreach ( $all_refunds as $existing_refund ) {
				// Skip the current refund to only sum historical refunds
				if ( $existing_refund->get_id() !== $refund->get_id() ) {
					$previous_refund_total += abs( $existing_refund->get_amount() );
				}
			}
		}

		// Calculate the new merchandise total after all refunds (including current one)
		$original_total = $order->get_total();
		$total_refunded = $previous_refund_total + $refund_amount;

		// Check if this is effectively a full refund
		$is_full_refund = abs( $original_total - $total_refunded ) < 0.01;

		// Calculate remaining merchandise total
		$new_merchandise_total = $is_full_refund ? 0 : number_format( $original_total - $total_refunded, 2, '.', '' );

		// Format refund amount
		$refund_amount = number_format( $refund_amount, 2, '.', '' );

		$items_for_refund = $this->items_for_refund( $refund );

		foreach ( $items_for_refund as $item ) {
			$qty = (int) $item['quantity'];
			if ( $qty > 0 ) {
				$items_description[] = "{$item['display_name']} ({$qty})";
			}
		}

		WC_Gateway_Acima_Credit_Logger::debug(
			sprintf(
				'Building adjustment payload - Original: %.2f, Previous Refunds: %.2f, Current Refund: %.2f, New Total: %s',
				$original_total,
				$previous_refund_total,
				$refund_amount,
				$new_merchandise_total
			)
		);

		return array(
			'type'                    => 'downwards',
			'amount'                  => $refund_amount,
			'merchandise_description' => empty( $items_description ) ? 'refund' : implode( ', ', $items_description ),
			'merchandise_total'       => $new_merchandise_total, // This now accounts for ALL historical refunds
			'merchandise_condition'   => 'new',
			'damaged'                 => false,
			'damaged_description'     => null,
		);
	}

	/**
	 * Get items for refund.
	 *
	 * @param WC_Order|OrderRefund $refund The refund object.
	 *
	 * @return array The items to refund.
	 */
	private function items_for_refund( $refund ): array {
		if ( ! $refund ) {
			return array();
		}

		$refund_items     = $refund->get_items();
		$items_for_refund = array();

		foreach ( $refund_items as $item_id => $item ) {
			$items_for_refund[] = array(
				'sku'          => (string) $item->get_product_id(),
				'display_name' => $item->get_name(),
				'unit_price'   => abs( $item->get_subtotal() ),
				'quantity'     => (int) abs( $item->get_quantity() ),
			);
		}

		return $items_for_refund;
	}
}