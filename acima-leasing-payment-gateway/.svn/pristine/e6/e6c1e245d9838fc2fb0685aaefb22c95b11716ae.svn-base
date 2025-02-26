<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Class WC_Gateway_Acima_Credit_Delivery_Pending_Processor
 *
 * Handles processing of delivery pending events for Acima webhooks.
 * Note: Direct database queries are necessary as we're working with a custom plugin table.
 */
class WC_Gateway_Acima_Credit_Delivery_Pending_Processor extends WC_Gateway_Acima_Credit_Processor implements WC_Gateway_Acima_Credit_Processor_Interface {
	protected $event;
	protected $error_reporter;

	public function __construct( $event ) {
		parent::__construct( $event );
		$this->error_reporter = new WC_Gateway_Acima_Credit_Error_Reporter();
	}

	/**
	 * Process the delivery pending webhook event
	 *
	 * @return void
	 */
	public function process() {
		global $wpdb;
		$lease_id = $this->event->getLeaseId();

		try {
			// Try to get from cache first
			$cache_key         = 'acima_order_' . md5( $lease_id );
			$existing_order_id = wp_cache_get( $cache_key, 'acima_orders' );

			if ( false === $existing_order_id ) {
				// phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
				// phpcs:disable WordPress.DB.DirectDatabaseQuery.NoCaching
				$existing_order_id = $wpdb->get_var(
					$wpdb->prepare(
						"SELECT order_id FROM {$wpdb->prefix}acima_checkout WHERE lease_id = %s",
						$lease_id
					)
				);
				// phpcs:enable WordPress.DB.DirectDatabaseQuery.NoCaching
				// phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery

				if ( $existing_order_id ) {
					wp_cache_set( $cache_key, $existing_order_id, 'acima_orders', HOUR_IN_SECONDS );
				}
			}

			if ( ! $existing_order_id ) {
				throw new Exception( sprintf( 'No order found for Lease ID: %s', esc_html( $lease_id ) ) );
			}

			$order = wc_get_order( $existing_order_id );
			if ( ! $order ) {
				throw new Exception( sprintf( 'Order object not found for Order ID: %s', esc_html( $existing_order_id ) ) );
			}

			switch ( $order->get_status() ) {
				case 'pending':
					// Simulate the completion process as if the user finished the iframe successfully
					$order->payment_complete();
					$order->add_order_note( sprintf( 'Acima Credit payment completed via webhook for Lease ID: %s.', esc_html( $lease_id ) ) );
					WC_Gateway_Acima_Credit_Logger::debug(
						sprintf( 'Order moved to completed for Lease ID: %s. Order ID: %s', esc_html( $lease_id ), esc_html( $existing_order_id ) ),
						array( 'lease_id' => $lease_id )
					);
					break;

				case 'completed':
					// Log that no action is necessary
					WC_Gateway_Acima_Credit_Logger::debug(
						sprintf( 'Order already completed for Lease ID: %s. Order ID: %s', esc_html( $lease_id ), esc_html( $existing_order_id ) ),
						array( 'lease_id' => $lease_id )
					);
					break;

				default:
					// Log unexpected order status
					WC_Gateway_Acima_Credit_Logger::debug(
						sprintf(
							'Unexpected order status: %s for Lease ID: %s. Order ID: %s',
							esc_html( $order->get_status() ),
							esc_html( $lease_id ),
							esc_html( $existing_order_id )
						),
						array( 'lease_id' => $lease_id )
					);
					break;
			}
		} catch ( Exception $e ) {
			WC_Gateway_Acima_Credit_Logger::error(
				sprintf( 'Error processing delivery pending event: %s', $e->getMessage() ),
				array( 'lease_id' => $lease_id )
			);
		}
	}
}
