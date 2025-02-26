<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WC_Gateway_Acima_Credit_Failure_Handler
 *
 * Handles checkout failures and cancellations for Acima Credit.
 * Note: This class uses direct database queries because it manages a custom plugin table
 * that doesn't have an associated WordPress API.
 */
class WC_Gateway_Acima_Credit_Failure_Handler {

	/**
	 * Constructor.
	 */
	public function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_failure_endpoint' ) );
	}

	public function check_cancel_permissions( $request ) {
		$order_id = sanitize_text_field( $request->get_param( 'orderId' ) );
		$nonce    = $request->get_header( 'X-WP-Nonce' );

		if ( ! $nonce || ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
			return new WP_Error(
				'rest_forbidden',
				__( 'Invalid or missing nonce.', 'acima-leasing-payment-gateway' ),
				array( 'status' => 403 )
			);
		}

		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			return new WP_Error(
				'rest_forbidden',
				__( 'Invalid order.', 'acima-leasing-payment-gateway' ),
				array( 'status' => 403 )
			);
		}

		if ( ! current_user_can( 'edit_shop_orders' ) &&
			$order->get_customer_id() !== get_current_user_id() ) {
			return new WP_Error(
				'rest_forbidden',
				__( 'You do not have permission to modify this order.', 'acima-leasing-payment-gateway' ),
				array( 'status' => 403 )
			);
		}

		return true;
	}

	/**
	 * Register the REST API endpoint for handling checkout cancellations.
	 */
	public function register_failure_endpoint() {
		register_rest_route(
			'acima/v1',
			'/cancel-checkout',
			array(
				'methods'             => 'POST',
				'callback'            => array( $this, 'handle_checkout_cancellation' ),
				'permission_callback' => array( $this, 'check_cancel_permissions' ),
			)
		);
	}

	/**
	 * Handle checkout cancellation requests.
	 *
	 * @param WP_REST_Request $request The request object.
	 * @return WP_REST_Response The response object.
	 */
	function handle_checkout_cancellation( WP_REST_Request $request ): WP_REST_Response {
		$order_id     = sanitize_text_field( $request->get_param( 'orderId' ) );
		$lease_id     = sanitize_text_field( $request->get_param( 'leaseId' ) );
		$lease_number = sanitize_text_field( $request->get_param( 'leaseNumber' ) );

		// Retrieve the WooCommerce order
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			return new WP_REST_Response(
				array(
					'error' => sprintf( 'Invalid order %s', esc_html( $order_id ) ),
				),
				400
			);
		}

		// Assume session ID is equivalent to order ID in WooCommerce
		$session_id = $order_id;

		if ( ! $session_id || $session_id <= 0 ) {
			WC_Gateway_Acima_Credit_Logger::debug(
				sprintf( 'Invalid session ID found, could not update checkout record: %s', esc_html( $session_id ) )
			);
			return new WP_REST_Response( array( 'error' => 'Invalid session ID' ), 400 );
		}

		// Proceed to update the checkout record
		try {
			$this->update_checkout_record( $session_id, $lease_id, $order_id, $lease_number );
			return new WP_REST_Response( array( 'success' => true ), 200 );
		} catch ( Exception $e ) {
			return new WP_REST_Response(
				array( 'error' => 'Failed to update checkout record' ),
				500
			);
		}
	}

	/**
	 * Update or create a checkout record in the custom acima_checkout table.
	 *
	 * Note: This method uses direct database queries because it operates on a custom
	 * plugin table that doesn't have an associated WordPress API. All queries are
	 * properly prepared and sanitized.
	 *
	 * @param int    $session_id   The session ID.
	 * @param string $lease_id     The lease ID.
	 * @param int    $order_id     The order ID.
	 * @param string $lease_number The lease number.
	 * @throws Exception If database operation fails.
	 */
	function update_checkout_record( $session_id, $lease_id, $order_id, $lease_number = null ) {
		global $wpdb;

		$table_name = $wpdb->prefix . 'acima_checkout';
		$cache_key  = 'acima_checkout_' . $session_id;

		// Prepare data array with proper sanitization
		$data = array(
			'order_id'     => absint( $order_id ),
			'lease_id'     => sanitize_text_field( $lease_id ),
			'lease_number' => sanitize_text_field( $lease_number ),
		);

		WC_Gateway_Acima_Credit_Logger::debug(
			sprintf( 'Update checkout record order ID %d', $order_id ),
			$data
		);

		// phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
		// Direct database queries are required here as we're working with a custom plugin table

		// Start transaction
		$wpdb->query( 'START TRANSACTION' );

		try {
			// Check cache first
			$existing = wp_cache_get( $cache_key, 'acima_checkout' );

			if ( false === $existing ) {
				// Cache miss, query database
				$existing = $wpdb->get_row(
					$wpdb->prepare(
						"SELECT lease_id, lease_number FROM {$wpdb->prefix}acima_checkout WHERE session_id = %d",
						$session_id
					)
				);

				if ( $existing ) {
					wp_cache_set( $cache_key, $existing, 'acima_checkout', HOUR_IN_SECONDS );
				}
			}

			if ( $existing ) {
				// Update existing record
				$result = $wpdb->update(
					$table_name,
					$data,
					array( 'session_id' => absint( $session_id ) ),
					array( '%s', '%s', '%s' ),
					array( '%d' )
				);

				WC_Gateway_Acima_Credit_Logger::debug(
					sprintf(
						'Checkout record updated: Session ID %d with Lease ID %s',
						$session_id,
						$lease_id
					),
					$data
				);
			} else {
				// Insert new record
				$insert_data = array_merge(
					array( 'session_id' => absint( $session_id ) ),
					$data
				);

				$result = $wpdb->insert(
					$table_name,
					$insert_data,
					array( '%d', '%s', '%s', '%s' )
				);

				WC_Gateway_Acima_Credit_Logger::debug(
					sprintf(
						'New checkout record created: Session ID %d with Lease ID %s',
						$session_id,
						$lease_id
					),
					$data
				);
			}

			if ( false === $result ) {
				throw new Exception( $wpdb->last_error );
			}

			// phpcs:disable WordPress.DB.DirectDatabaseQuery.NoCaching
			$wpdb->query( 'COMMIT' );
			// phpcs:enable WordPress.DB.DirectDatabaseQuery.NoCaching
			// phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery

			// Update cache
			wp_cache_delete( $cache_key, 'acima_checkout' );

		} catch ( Exception $e ) {
            // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
			$wpdb->query( 'START TRANSACTION' );
            // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery
			WC_Gateway_Acima_Credit_Logger::error(
				sprintf( 'Error updating checkout record: %s', $e->getMessage() ),
				$data
			);
			throw $e;
		}
	}
}
