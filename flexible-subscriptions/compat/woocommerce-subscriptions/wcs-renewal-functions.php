<?php

use WPDesk\FlexibleSubscriptions\Compatibility\CastingSubscriptionFinder;
use WPDesk\FlexibleSubscriptions\Subscription\Subscription;
use WPDesk\FlexibleSubscriptions\Subscription\SubscriptionFinder;

if ( ! function_exists('wcs_order_contains_renewal') ) {
/**
 * Check if a given order is a subscription renewal order.
 *
 * @param WC_Order|int $order The WC_Order object or ID of a WC_Order order.
 * @since 1.0.0 - Migrated from WooCommerce Subscriptions v2.0
 */
function wcs_order_contains_renewal( $order ) {
	$order = wc_get_order( $order );
	if ( ! $order instanceof \WC_Order ) {
		return false;
	}

	if ( $order->get_type() === 'shop_order' && $order->get_parent_id() ) {
		$finder = new CastingSubscriptionFinder(new SubscriptionFinder(), \WC_Subscription::class);
		$subscription = $finder->find( $order->get_parent_id() );
		if ( $subscription instanceof Subscription ) {
			return true;
		}
	}

	return false;
}
}

if ( ! function_exists('wcs_cart_contains_renewal') ) {
/**
 * Checks the cart to see if it contains a subscription product renewal.
 *
 * @param  bool | Array The cart item containing the renewal, else false.
 * @return string
 * @since  1.0.0 - Migrated from WooCommerce Subscriptions v2.0
 */
function wcs_cart_contains_renewal() {
	return true;
}
}

if ( ! function_exists('wcs_get_subscriptions_for_renewal_order') ) {
/**
 * Get the subscription/s to which a resubscribe order relates.
 *
 * @param WC_Order|int $order The WC_Order object or ID of a WC_Order order.
 * @since 1.0.0 - Migrated from WooCommerce Subscriptions v2.0
 */
function wcs_get_subscriptions_for_renewal_order( $order ) {
	$order = wc_get_order( $order );
	if ( ! $order instanceof \WC_Order ) {
		return [];
	}

	if ( $order->get_type() === 'shop_order' && $order->get_parent_id() ) {
		$finder = new CastingSubscriptionFinder(new SubscriptionFinder(), \WC_Subscription::class);
		$subscription = $finder->find( $order->get_parent_id() );
		if ( $subscription instanceof Subscription ) {
			return [$subscription];
		}
	}

	return [];
}
}
