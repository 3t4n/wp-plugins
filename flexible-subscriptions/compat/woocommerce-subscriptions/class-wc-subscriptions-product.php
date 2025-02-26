<?php

use WPDesk\FlexibleSubscriptions\Product\SubscriptionProduct;
use WPDesk\FlexibleSubscriptions\Product\SubscriptionProductWrapper;
use WPDesk\FlexibleSubscriptions\Subscription\SubscriptionFinder;

if ( class_exists( 'WC_Subscriptions_Product' ) ) {
	return;
}

class WC_Subscriptions_Product {

	private static ?SubscriptionFinder $finder = null;

	private static bool $initialized = false;

	/**
	 * Checks a given product to determine if it is a subscription.
	 * When the received arg is a product object, make sure it is passed into the filter intact in order to retain any properties added on the fly.
	 *
	 * @param int|\WC_Product $product Either a product object or product's post ID.
	 */
	public static function is_subscription( $product ) {
		if ( is_numeric( $product ) ) {
			if ( ! self::$initialized ) {
				self::initialize();
			}

			$product = self::$finder->find($product);
		}

		return $product instanceof SubscriptionProduct;
	}

	/**
	 * Returns the trial length of a subscription product, if it is a subscription.
	 *
	 * @param mixed $product A WC_Product object or product ID
	 * @return int An integer representing the length of the subscription trial, or 0 if the product is not a subscription or there is no trial
	 */
	public static function get_trial_length( $product ) {
		$product = self::get_product_instance( $product );
		if ( ! $product instanceof SubscriptionProduct ) {
			return 0;
		}

		return (new SubscriptionProductWrapper($product))->get_trial_length();
	}

	/**
	 * Returns the sign-up fee for a subscription, if it is a subscription.
	 *
	 * @param mixed $product A WC_Product object or product ID
	 * @return int|string The value of the sign-up fee, or 0 if the product is not a subscription or the subscription has no sign-up fee
	 */
	public static function get_sign_up_fee( $product ) {
		$product = self::get_product_instance( $product );
		if ( ! $product instanceof SubscriptionProduct ) {
			return 0;
		}

		return (new SubscriptionProductWrapper($product))->get_signup_fee();
	}

	private static function get_product_instance( $product ): ?SubscriptionProduct {
		if ( $product instanceof SubscriptionProduct ) {
			return $product;
		}

		if ( is_numeric( $product ) ) {
			if ( ! self::$initialized ) {
				self::initialize();
			}
			return self::$finder->find($product);
		}

		return null;
	}

	private static function initialize(): void {
		self::$finder = new SubscriptionFinder();
		self::$initialized = true;
	}
}
