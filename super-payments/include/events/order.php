<?php
/**
 * Order related events
 *
 * @package super-payments
 */

/**
 * Send order status changed event.
 *
 * @param int    $order_id Order ID.
 * @param string $old_status Old order status.
 * @param string $new_status New order status.
 * @param object $order Order object.
 *
 * @return void.
 */
function wcsp_send_order_status_changed_event( $order_id, $old_status, $new_status, $order ) {
	wcsp_send_event(
		'OrderStatusChanged',
		[
			'orderId'                 => $order_id,
			'oldStatus'               => $old_status,
			'newStatus'               => $new_status,
			'orderAmount'             => $order->get_total(),
			'orderPaymentMethod'      => $order->get_payment_method(),
			'orderPaymentMethodTitle' => $order->get_payment_method_title(),
			'orderBillingPhone'       => $order->get_billing_phone(),
			'orderShippingPhone'      => $order->get_shipping_phone(),
			'orderDateCreated'        => empty( $order->get_date_created() ) ? null : $order->get_date_created()->date( DATE_ISO8601 ),
			'orderDateModified'       => empty( $order->get_date_modified() ) ? null : $order->get_date_modified()->date( DATE_ISO8601 ),
			'orderDatePaid'           => empty( $order->get_date_paid() ) ? null : $order->get_date_paid()->date( DATE_ISO8601 ),
			'orderDateCompleted'      => empty( $order->get_date_completed() ) ? null : $order->get_date_completed()->date( DATE_ISO8601 ),
			'orderMetadata'           => array_reduce(
				$order->get_meta_data(),
				function( $carry, $item ) {
					$carry[ $item->key ] = $item->value;
					return $carry;
				},
				[]
			),
			'superCartId'             => $order->get_meta( 'super_cart_id' ),
			'superTransactionId'      => $order->get_meta( 'super_transaction_id' ),
			'customerEmail'           => $order->get_billing_email(),
		]
	);
}
add_action( 'woocommerce_order_status_changed', 'wcsp_send_order_status_changed_event', 99, 4 );

/**
 * Send order created event.
 *
 * @param object $order Order object.
 *
 * @return void.
 */
function wcsp_send_order_created_event( $order ) {
	wcsp_send_event(
		'OrderCreated',
		[
			'orderId'                 => $order->get_id(),
			'orderAmount'             => $order->get_total(),
			'orderPaymentMethod'      => $order->get_payment_method(),
			'orderPaymentMethodTitle' => $order->get_payment_method_title(),
			'orderBillingPhone'       => $order->get_billing_phone(),
			'orderShippingPhone'      => $order->get_shipping_phone(),
			'orderDateCreated'        => empty( $order->get_date_created() ) ? null : $order->get_date_created()->date( DATE_ISO8601 ),
			'orderDateModified'       => empty( $order->get_date_modified() ) ? null : $order->get_date_modified()->date( DATE_ISO8601 ),
			'orderDatePaid'           => empty( $order->get_date_paid() ) ? null : $order->get_date_paid()->date( DATE_ISO8601 ),
			'orderDateCompleted'      => empty( $order->get_date_completed() ) ? null : $order->get_date_completed()->date( DATE_ISO8601 ),
			'orderMetadata'           => array_reduce(
				$order->get_meta_data(),
				function( $carry, $item ) {
					$carry[ $item->key ] = $item->value;
					return $carry;
				},
				[]
			),
			'orderItems'              => array_reduce(
				$order->get_items(),
				function( $carry, $item ) {
					if ( $item->is_type( 'line_item' ) ) {
						$carry[] = [
							'quantity'           => $item->get_quantity(),
							'price'              => $item->get_total(),
							'name'               => $item->get_name(),
							'productId'          => $item->get_product_id(),
							'productVariationId' => $item->get_variation_id(),
							'productSku'         => $item->get_product()->get_sku(),
							'productDescription' => $item->get_product()->get_description(),
						];
					}

					return $carry;
				},
				[]
			),
			'superCartId'             => $order->get_meta( 'super_cart_id' ),
			'customerEmail'           => $order->get_billing_email(),
		]
	);
}
add_action( 'woocommerce_checkout_order_created', 'wcsp_send_order_created_event', 99, 1 );
