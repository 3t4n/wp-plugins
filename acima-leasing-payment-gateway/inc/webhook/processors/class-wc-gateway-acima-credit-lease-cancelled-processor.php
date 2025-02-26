<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class WC_Gateway_Acima_Credit_Lease_Cancelled_Processor
 *
 * Handles processing of lease cancelled events for Acima webhooks.
 * Note: Direct database queries are necessary as we're working with a custom plugin table.
 */
class WC_Gateway_Acima_Credit_Lease_Cancelled_Processor extends WC_Gateway_Acima_Credit_Processor implements WC_Gateway_Acima_Credit_Processor_Interface {
	protected $event;

	/**
	 * Constructor for the processor.
	 *
	 * @param object $event The event data associated with the webhook.
	 */
	public function __construct( $event ) {
		$this->event = $event;
	}

	/**
	 * Retrieves an order by its associated lease ID.
	 *
	 * @param string $lease_id The lease ID associated with the order.
	 * @return WC_Order|null The order object or null if not found.
	 */
	protected function getOrderbyLeaseId( $lease_id ) {
		global $wpdb;

		// Try to get from cache first
		$cache_key = 'acima_order_' . md5( $lease_id );
		$order_id  = wp_cache_get( $cache_key, 'acima_orders' );

		if ( false === $order_id ) {
			// phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
			// phpcs:disable WordPress.DB.DirectDatabaseQuery.NoCaching
			$order_id = $wpdb->get_var(
				$wpdb->prepare(
					"SELECT order_id FROM {$wpdb->prefix}acima_checkout WHERE lease_id = %s",
					$lease_id
				)
			);
			// phpcs:enable WordPress.DB.DirectDatabaseQuery.NoCaching
			// phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery

			if ( $order_id ) {
				wp_cache_set( $cache_key, $order_id, 'acima_orders', HOUR_IN_SECONDS );
			}
		}

		if ( $order_id ) {
			return wc_get_order( $order_id );
		}

		return null;
	}

	/**
	 * Processes the webhook event.
	 *
	 * @return void
	 */
	public function process() {
		$lease_id = $this->event->getLeaseId();
		$order    = $this->getOrderbyLeaseId( $lease_id );

		if ( $order instanceof WC_Order ) {
			$order->add_order_note(
				sprintf(
					'Order cancelled due to lease cancellation in external system. Lease ID: %s.',
					esc_html( $lease_id )
				)
			);

			$order->update_status(
				'cancelled',
				sprintf( 'Acima Digital - Lease ID: %s Cancelled', esc_html( $lease_id ) )
			);

			WC_Gateway_Acima_Credit_Logger::debug(
				sprintf(
					'Acima Digital - Order cancelled for Lease ID: %s. Order ID: %s',
					esc_html( $lease_id ),
					esc_html( $order->get_id() )
				)
			);
		} else {
			WC_Gateway_Acima_Credit_Logger::debug(
				sprintf(
					'Acima Digital - No WooCommerce order found for Lease ID: %s, unable to cancel order.',
					esc_html( $lease_id )
				)
			);
		}
	}
}
