<?php

namespace AutocompleteOrdersForWooCommerce;

defined( 'ABSPATH' ) || exit;

/**
 * Orders class.
 *
 * Handles checkout functionality.
 *
 * @since 1.0.0
 * @package AutocompleteOrdersForWooCommerce
 */
class Orders {
	/**
	 * Orders Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		if ( 'upon_payment_complete' === get_option( 'aofw_auto_complete_order_for', 'upon_payment_complete' ) ) {
			add_action( 'woocommerce_payment_complete', array( $this, 'handle_order_status' ) );
		} else {
			add_filter( 'woocommerce_thankyou', array( $this, 'handle_order_status' ), - 1, 2 );
		}
	}

	/**
	 * Handle order status.
	 *
	 * @param int $order_id The order ID.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function handle_order_status( $order_id ) {
		if ( ! $order_id ) {
			return;
		}
		$autocomplete_status = get_option( 'aofw_autocomplete_order_status', '' );
		if ( empty( $autocomplete_status ) ) {
			return;
		}

		$order        = wc_get_order( $order_id );
		$order_status = $order->get_status();

		switch ( $autocomplete_status ) {
			case 'none':
				$order_status = 'processing';
				break;

			case 'all':
				$order_status = 'completed';
				break;

			case 'virtual':
				$is_virtual  = false;
				$order_items = $order->get_items();

				if ( count( $order_items ) > 0 ) {
					foreach ( $order_items as $item ) {

						if ( is_callable( array( $item, 'get_product' ) ) ) {
							$product = $item->get_product();
						} elseif ( $item['product_id'] ) {
							$product = wc_get_product( $item['product_id'] );
						} else {
							$product = null;
						}

						if ( ! $product || ! is_callable( array( $product, 'is_virtual' ) ) ) {
							$order->add_order_note( __( 'Order auto-completion skipped: deleted or non-existent product found.', 'autocomplete-orders-for-woocommerce' ) );
							break;
						}

						if ( $product->is_virtual() ) {
							$is_virtual = true;
							break;
						}
					}
				}

				if ( $is_virtual ) {
					$order_status = 'completed';
				}
				break;

			case 'virtual_downloadable':
				$is_virtual_downloadable = false;
				$order_items             = $order->get_items();

				if ( count( $order_items ) > 0 ) {
					foreach ( $order_items as $item ) {

						if ( is_callable( array( $item, 'get_product' ) ) ) {
							$product = $item->get_product();
						} elseif ( $item['product_id'] ) {
							$product = wc_get_product( $item['product_id'] );
						} else {
							$product = null;
						}

						if ( ! $product || ( ! is_callable( array( $product, 'is_virtual' ) ) && ! is_callable( array( $product, 'is_downloadable' ) ) ) ) {
							$order->add_order_note( __( 'Order auto-completion skipped: deleted or non-existent product found.', 'autocomplete-orders-for-woocommerce' ) );
							break;
						}

						if ( $product->is_virtual() && $product->is_downloadable() ) {
							$is_virtual_downloadable = true;
							break;
						}
					}
				}

				// Virtual downloadable order, mark as completed.
				if ( $is_virtual_downloadable ) {
					$order_status = 'completed';
				}
				break;
		}
		// Updating the order status.
		$order->update_status( $order_status );
	}
}
