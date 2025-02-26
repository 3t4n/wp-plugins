<?php

use WPDesk\FlexibleSubscriptions\Compatibility\CastingSubscriptionFinder;
use WPDesk\FlexibleSubscriptions\Subscription\Subscription;
use WPDesk\FlexibleSubscriptions\Subscription\SubscriptionFinder;

if ( ! function_exists( 'wcs_is_subscription' ) ) {
	/**
	 * Check if a given object is a WC_Subscription (or child class of WC_Subscription), or if a given ID
	 * belongs to a post or order with type ('shop_subscription').
	 *
	 * @since  1.0.0 - Migrated from WooCommerce Subscriptions v2.0
	 *
	 * @param mixed $subscription A WC_Subscription object or an ID.
	 * @return boolean true if anything is found
	 */
	function wcs_is_subscription( $subscription ) {
		if ( $subscription instanceof Subscription ) {
			return true;
		}

		if ( ! is_numeric( $subscription ) ) {
			return false;
		}

		$finder = new CastingSubscriptionFinder(new SubscriptionFinder(), \WC_Subscription::class);

		$subscription_object = $finder->find( $subscription );

		return $subscription_object instanceof Subscription;
	}
}
