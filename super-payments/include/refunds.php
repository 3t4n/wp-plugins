<?php
/**
 * Refunds related functions.
 *
 * @package super-payments
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Super refund id to WooCommerce refund.
 *
 * @param int   $refund_id refund id.
 * @param array $refund_details refund details.
 */
function wcsp_refund_created( $refund_id, $refund_details ) {
	$order_id      = $refund_details['order_id'];
	$order         = wc_get_order( $order_id );
	$super_refunds = $order->get_meta( 'super_refunds', true );

	if ( is_array( $super_refunds ) ) {
		$index = count( $super_refunds );
		while ( $index ) {
			$super_refund = $super_refunds[ --$index ];

			if ( ! $super_refund['matched_to_woo_refund'] ) {
				$refund = wc_get_order( $refund_id );
				$refund->update_meta_data( 'super_refund_id', $super_refund['refund_id'] );
				$refund->update_meta_data( 'super_refund_reference', $super_refund['refund_reference'] );
				$refund->save();

				$super_refunds[ $index ]['matched_to_woo_refund'] = true;
				$order->update_meta_data( 'super_refunds', $super_refunds );
				$order->save();

				break;
			}
		}
	}
}

add_action( 'woocommerce_refund_created', 'wcsp_refund_created', 10, 2 );

/**
 * Get Super Cash Rewards amount from order
 *
 * @param WC_Order $order The order object.
 * @return float The cash rewards amount
 */
function wcsp_get_merchant_cash_rewards_amount( $order ) {
	// First check if it's stored with the new meta key.
	$merchant_funded_amount = floatval( $order->get_meta( 'wcsp_merchant_funded_amount_major_units', true ) );
	if ( $merchant_funded_amount > 0 ) {
		return $merchant_funded_amount;
	}

	// Then check if it's stored with the old meta key.
	$merchant_funded_amount = floatval( $order->get_meta( 'super_merchant_funded_amount', true ) );
	if ( $merchant_funded_amount > 0 ) {
		return $merchant_funded_amount;
	}

	// If not, check for Super coupon.
	$transaction_id = $order->get_meta( 'super_transaction_id', true );
	if ( $transaction_id ) {
		foreach ( $order->get_coupons() as $coupon_item ) {
			if ( $coupon_item->get_code() === 'super_rewards_' . $transaction_id ) {
				return floatval( $coupon_item->get_discount() );
			}
		}
	}

	return 0;
}

/**
 * Enqueue refund table scripts
 */
function wcsp_enqueue_refund_table_scripts() {
	if ( ! is_admin() ) {
		return;
	}

	wp_enqueue_script(
		'wcsp-refund-table',
		WC_Super_Payments::plugin_url() . 'assets/js/refund-table.js',
		[ 'jquery' ],
		PLUGIN_VERSION,
		true
	);

	// Get order ID from URL.
	$order_id = isset( $_GET['post'] ) ? absint( $_GET['post'] ) : ( isset( $_GET['id'] ) ? absint( $_GET['id'] ) : 0 ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	if ( ! $order_id ) {
		return;
	}

	$order = wc_get_order( $order_id );
	if ( ! $order ) {
		return;
	}

	$update_total_setting = $order->get_meta( 'wcsp_update_total_setting' );
	if ( 'no' === $update_total_setting ) {
		return;
	}

	$cash_rewards_amount   = wcsp_get_merchant_cash_rewards_amount( $order );
	$regular_refund_amount = $order->get_total() - $order->get_total_refunded();
	$super_refund_amount   = $regular_refund_amount + $cash_rewards_amount;

	wp_localize_script(
		'wcsp-refund-table',
		'wcspRefundData',
		[
			'cashRewardsAmount' => $cash_rewards_amount > 0 ? wc_price( $cash_rewards_amount, [ 'currency' => $order->get_currency() ] ) : null,
			'superRefundAmount' => $cash_rewards_amount > 0 ? wc_price( $super_refund_amount, [ 'currency' => $order->get_currency() ] ) : null,
			'label'             => __( 'Super Cash Rewards used', 'super-payments' ),
			'superRefundLabel'  => __( 'Total available to refund via Super Payments', 'super-payments' ),
		]
	);
}

add_action( 'admin_enqueue_scripts', 'wcsp_enqueue_refund_table_scripts' );

/**
 * Include cash rewards in order total for refunds
 *
 * @param float    $total Order total.
 * @param WC_Order $order Order object.
 * @return float Modified total
 */
function wcsp_modify_order_total_for_refunds( $total, $order ) {
	// Only modify total when processing refunds in admin.
	if ( ! is_admin() || ! isset( $_POST['refund_amount'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return $total;
	}

	// Only modify total for Super Payments orders.
	if ( 'superpayments' !== $order->get_payment_method() || ( isset( $_POST['api_refund'] ) && 'false' === $_POST['api_refund'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Missing
		return $total;
	}

	$update_total_setting = $order->get_meta( 'wcsp_update_total_setting' );
	if ( 'no' === $update_total_setting ) {
		return $total;
	}

	$cash_rewards_amount = wcsp_get_merchant_cash_rewards_amount( $order );

	return $total + $cash_rewards_amount;
}

add_filter( 'woocommerce_order_get_total', 'wcsp_modify_order_total_for_refunds', 10, 2 );

/**
 * Modify the partially refunded status for Super Payments orders
 * to account for full cash reward payments.
 *
 * @param bool $is_partially_refunded Whether the order is partially refunded.
 * @param int  $order_id The order id.
 * @param int  $refund_id The refund id.
 * @return bool Modified partially refunded status
 */
function wcsp_modify_partially_refunded_status( $is_partially_refunded, $order_id, $refund_id ) {
	$order = wc_get_order( $order_id );

	if ( ! $order || 'superpayments' !== $order->get_payment_method() ) {
		return $is_partially_refunded;
	}

	$update_total_setting = $order->get_meta( 'wcsp_update_total_setting' );
	if ( 'no' === $update_total_setting ) {
		return $is_partially_refunded;
	}

	// Get the cash rewards amount.
	$cash_rewards_amount = wcsp_get_merchant_cash_rewards_amount( $order );

	// Get the refund.
	$refund = wc_get_order( $refund_id );
	if ( ! $refund ) {
		return $is_partially_refunded;
	}

	// Calculate remaining refund amount including cash rewards.
	$order_total_with_cash_rewards = $order->get_total() + $cash_rewards_amount;
	$remaining_refund_amount       = $order_total_with_cash_rewards - $order->get_total_refunded();

	// Check if there's any amount left to refund after this refund.
	return $remaining_refund_amount > 0;
}
add_filter( 'woocommerce_order_is_partially_refunded', 'wcsp_modify_partially_refunded_status', 10, 3 );
