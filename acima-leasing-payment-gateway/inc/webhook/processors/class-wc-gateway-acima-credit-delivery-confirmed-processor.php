<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class WC_Gateway_Acima_Credit_Delivery_Confirmed_Processor
 *
 * Processes delivery confirmation events for Acima webhooks.
 */
class WC_Gateway_Acima_Credit_Delivery_Confirmed_Processor extends WC_Gateway_Acima_Credit_Processor implements WC_Gateway_Acima_Credit_Processor_Interface {
	/**
	 * The event data associated with the webhook.
	 *
	 * @var object
	 */
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
			// Get order ID directly with prepare statement
            // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery
			$order_id = $wpdb->get_var(
				$wpdb->prepare(
					"SELECT order_id FROM {$wpdb->prefix}acima_checkout WHERE lease_id = %s LIMIT 1",
					$lease_id
				)
			);
            // phpcs:enable WordPress.DB.DirectDatabaseQuery.DirectQuery

			if ( $order_id ) {
				// Cache the result for future use
				wp_cache_set( $cache_key, $order_id, 'acima_orders', HOUR_IN_SECONDS );

				// Log successful cache set
				WC_Gateway_Acima_Credit_Logger::debug(
					sprintf(
						'Cached order ID %d for lease ID %s',
						$order_id,
						esc_html( $lease_id )
					)
				);
			} else {
				WC_Gateway_Acima_Credit_Logger::debug(
					sprintf(
						'No order found for Lease ID: %s in the acima_checkout table.',
						esc_html( $lease_id )
					)
				);
				return null;
			}
		}

		// Return WC_Order object if found
		$order = wc_get_order( $order_id );
		if ( ! $order ) {
			wp_cache_delete( $cache_key, 'acima_orders' );
			return null;
		}

		return $order;
	}

	/**
	 * Processes the webhook event.
	 *
	 * @return void
	 */
	public function process() {
		$lease_id = $this->event->getLeaseId();

		if ( empty( $lease_id ) ) {
			WC_Gateway_Acima_Credit_Logger::debug( 'Empty lease ID received in webhook' );
			return;
		}

		$order = $this->getOrderbyLeaseId( $lease_id );

		if ( $order instanceof WC_Order ) {
			// Add a note to the order
			$order->add_order_note(
				sprintf(
					'Acima Digital - Lease ID: %s Delivery confirmed',
					esc_html( $lease_id )
				)
			);

			try {
				$order->save();

				WC_Gateway_Acima_Credit_Logger::debug(
					sprintf(
						'Acima Digital - Delivery confirmed for Lease ID: %s. Order ID: %s',
						esc_html( $lease_id ),
						esc_html( $order->get_id() )
					)
				);
			} catch ( Exception $e ) {
				WC_Gateway_Acima_Credit_Logger::error(
					sprintf(
						'Failed to save order %s after delivery confirmation: %s',
						esc_html( $order->get_id() ),
						$e->getMessage()
					)
				);
			}
		} else {
			WC_Gateway_Acima_Credit_Logger::debug(
				sprintf(
					'Acima Digital - No WooCommerce order found for Lease ID: %s, unable to confirm order.',
					esc_html( $lease_id )
				)
			);
		}
	}
}
