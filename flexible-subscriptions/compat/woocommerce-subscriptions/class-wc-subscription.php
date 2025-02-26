<?php

use WPDesk\FlexibleSubscriptions\Subscription\Payment\PaymentRequestFinder;
use WPDesk\FlexibleSubscriptions\Subscription\Subscription;

if ( class_exists( 'WC_Subscription' ) ) {
	return;
}

class WC_Subscription extends Subscription {

	public function get_payment_method_to_display(): string {
		return apply_filters( 'woocommerce_my_subscriptions_payment_method', parent::get_payment_method_to_display(), $this );
	}

	/**
	 * Get the timestamp for a specific piece of the subscriptions schedule
	 *
	 * @param string $date_type 'date_created', 'trial_end', 'next_payment', 'last_order_date_created', 'end' or 'end_of_prepaid_term'
	 * @param string $timezone The timezone of the $datetime param. Default 'gmt'.
	 */
	public function get_time( $date_type, $timezone = 'gmt' ) {
		if ( $date_type === 'start' ) {
			$date = $this->get_start_date();
			if ( $date instanceof \DateTimeInterface) {
				return $date->format( 'U' );
			}
		}

		return '';
	}

	public function get_billing_period() {
		switch ($this->get_billing_frequency()->unit()) {
			case 'D':
				return 'day';
			case 'W':
				return 'week';
			case 'M':
				return 'month';
			case 'Y':
				return 'year';
			default:
				return 'month';
		}
	}

	public function get_billing_interval() {
		return $this->get_billing_frequency()->length();
	}

	public function payment_failed( $new_status = 'on-hold' ): void {
		$last_order = $this->get_recent_payment_request_id() ? wc_get_order( $this->get_recent_payment_request_id() ) : null;

		if ( $last_order instanceof \WC_Order && $last_order->has_status('failed') ) {
			// remove_filter( 'woocommerce_order_status_changed', 'WC_Subscriptions_Renewal_Order::maybe_record_subscription_payment' );
			$last_order->update_status( 'failed' );
			// add_filter( 'woocommerce_order_status_changed', 'WC_Subscriptions_Renewal_Order::maybe_record_subscription_payment', 10, 3 );
		}

		$this->add_order_note( __( 'Payment failed.', 'flexible-subscriptions' ) );

		// Allow a short circuit for plugins & payment gateways to force max failed payments exceeded
		if ( 'cancelled' == $new_status || apply_filters( 'woocommerce_subscription_max_failed_payments_exceeded', false, $this ) ) {
			if ( $this->can_be_updated_to( 'cancelled' ) ) {
				$this->update_status( 'cancelled', __( 'Subscription Cancelled: maximum number of failed payments reached.', 'flexible-subscriptions' ) );
			}
		} elseif ( $this->can_be_updated_to( $new_status ) ) {
			$this->update_status( $new_status );
		}
	}

	/**
	 * When payment is completed for a related order, reset any renewal related counters and reactive the subscription.
	 *
	 * @param WC_Order $last_order
	 */
	public function payment_complete_for_order( $last_order ): void {
		$user = $this->get_user();
		if ( $user instanceof \WP_User ) {
			$user->add_role( 'subscriber' );
		}

		$this->add_order_note( __( 'Payment status marked complete.', 'flexible-subscriptions' ) );

		if ( ! $this->is_active() ) {
			$this->status->activate();
		} else {
			$this->save();
		}

		do_action( 'woocommerce_subscription_payment_complete', $this );
	}

	/**
	 * Get the related orders for a subscription, including renewal orders and the initial order (if any).
	 *
	 * Contrary to WCS, we do not support custom types and we only support 'parent' and 'renewal'.
	 *
	 * @param string $return_fields The columns to return, either 'all' or 'ids'
	 * @param array|string $order_types Can include 'any', 'parent', 'renewal', 'resubscribe' and/or 'switch'. Custom types possible via the 'woocommerce_subscription_related_orders' filter. Defaults to array( 'parent', 'renewal', 'switch' ).
	 * @return array
	 */
	public function get_related_orders( $return_fields = 'ids', $order_types = [ 'parent', 'renewal', 'switch' ] ) {

		$return_fields = ( 'ids' == $return_fields ) ? $return_fields : 'all';

		$order_types = (array) $order_types;
		if ( ['all'] === $order_types ) {
			$order_types = [ 'parent', 'renewal', 'switch' ];
		}

		$related_orders = [];

		if (in_array('parent', $order_types, true) || in_array('any', $order_types, true)) {
			$related_orders[] = $this->get_parent();
		}

		if (in_array('renewal', $order_types, true) || in_array('any', $order_types, true)) {
			$finder = new PaymentRequestFinder();
			array_push( $related_orders, ...$finder->find_for_subscription( $this ) );
		}

		$related_orders_ids = array_map( fn (\WC_Order $order) => $order->get_id(), $related_orders);
		if ( $return_fields === 'ids' ) {
			$related_orders = array_combine($related_orders_ids, $related_orders_ids);
		} else {
			// Assume 'all'
			$related_orders = array_combine($related_orders_ids, $related_orders);
		}

		arsort( $related_orders );

		return $related_orders;
	}
}
