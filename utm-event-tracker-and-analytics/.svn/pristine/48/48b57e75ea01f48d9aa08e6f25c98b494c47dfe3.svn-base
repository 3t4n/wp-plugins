<?php

namespace UTM_Event_Tracker;

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Add description for event
 * 
 * @since 1.0.6
 * @return string
 */
function edd_event_descriptions($descriptions, $event) {
	if ('edd_purcahse' === $event->type) {
		$user = get_user_by('id', $event->customer_id);
		if (is_a($user, '\WP_User')) {
			$descriptions[100] = sprintf(esc_html__('Customer: %s.', 'utm-event-tracker'), $user->display_name);
		}

		$descriptions[] = sprintf(esc_html__('Amount: %s', 'utm-event-tracker'), $event->amount);
		$descriptions[] = sprintf(esc_html__('Currency: %s', 'utm-event-tracker'), $event->currency);
		$descriptions[] = sprintf(esc_html__('Order ID: %s', 'utm-event-tracker'), $event->order_id);
	}

	if ('edd_add_to_cart' === $event->type) {
		$descriptions[] = sprintf(esc_html__('ID: %d', 'utm-event-tracker'), $event->download_id);
		$descriptions[] = sprintf(esc_html__('Name: %s', 'utm-event-tracker'), $event->download_name);
		$descriptions[] = sprintf(esc_html__('Amount: %s', 'utm-event-tracker'), $event->amount);
		$descriptions[] = sprintf(esc_html__('Currency: %s', 'utm-event-tracker'), $event->currency);
	}

	return $descriptions;
}
add_filter('utm_event_tracker/event_descriptions', '\UTM_Event_Tracker\edd_event_descriptions', 10, 2);

/**
 * Handle purchase event 
 * 
 * @since 1.0.6
 * @return void
 */
function edd_complete_purchase($order_id) {
	$order = edd_get_order($order_id);
	utm_event_tracker_add_event('edd_purcahse', array(
		'amount' => $order->total,
		'currency' => $order->currency,
		'title' => esc_html__('EDD Purchase', 'utm-event-tracker'),
		'meta_data' => array(
			'order_id' => $order_id,
			'customer_id' => $order->customer_id,
		)
	));
}
add_action('edd_complete_purchase', '\UTM_Event_Tracker\edd_complete_purchase', 100);

/**
 * Handle event after added to cart
 * 
 * @since 1.0.6
 * @return void
 */
function add_to_cart($download_id) {
	$_product = edd_get_download($download_id);
	utm_event_tracker_add_event('edd_add_to_cart', array(
		'amount' => $_product->get_price(),
		'currency' => edd_get_currency(),
		'title' => esc_html__('EDD added to cart', 'utm-event-tracker'),
		'meta_data' => array(
			'download_id' => $download_id,
			'download_name' => $_product->get_name(),
		)
	));
}
add_action('edd_post_add_to_cart', '\UTM_Event_Tracker\add_to_cart', 100);
