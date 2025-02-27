<?php
/**
 * Funding summary related functions.
 *
 * @package super-payments
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Store funding summary and apply rewards to order
 *
 * @param WC_Order $order The order object.
 * @param array    $funding_summary The funding summary from Super Payments.
 * @param string   $update_total_setting How to apply the cash rewards ('order_total' or 'coupon').
 * @param string   $transaction_id The Super payment or refund ID  (required for coupon mode).
 * @return string Optional note about what was applied.
 */
function wcsp_process_funding_summary( $order, $funding_summary, $update_total_setting, $transaction_id ) {
	if ( ! isset( $funding_summary ) ) {
		return '';
	}

	// Amounts in minor units.
	$merchant_funded_amount_minor_units   = $funding_summary['merchantFundedAmount']['amount']; //phpcs:ignore WordPress.NamingConventions
	$customer_funded_amount_minor_units   = $funding_summary['customerFundedAmount']['amount']; //phpcs:ignore WordPress.NamingConventions
	$super_funded_amount_minor_units      = $funding_summary['superFundedAmount']['amount']; //phpcs:ignore WordPress.NamingConventions
	$cash_payable_to_merchant_minor_units = $funding_summary['cashPayableToMerchant']['amount']; //phpcs:ignore WordPress.NamingConventions

	// Amounts in major units. We no longer use `amountMultiplier`, the B2B API omits it on the basis that all practical currencies are decimal.
	$merchant_funded_amount_major_units   = $merchant_funded_amount_minor_units / 100;
	$customer_funded_amount_major_units   = $customer_funded_amount_minor_units / 100;
	$super_funded_amount_major_units      = $super_funded_amount_minor_units / 100;
	$cash_payable_to_merchant_major_units = $cash_payable_to_merchant_minor_units / 100;

	// Store the funding summary in the order meta data.
	$order->update_meta_data( 'wcsp_customer_funded_amount_major_units', esc_attr( $customer_funded_amount_major_units ) );
	$order->update_meta_data( 'wcsp_merchant_funded_amount_major_units', esc_attr( $merchant_funded_amount_major_units ) );
	$order->update_meta_data( 'wcsp_super_funded_amount_major_units', esc_attr( $super_funded_amount_major_units ) );
	$order->update_meta_data( 'wcsp_cash_payable_to_merchant_major_units', esc_attr( $cash_payable_to_merchant_major_units ) );

	// Store the update total setting in the order meta data.
	$order->update_meta_data( 'wcsp_update_total_setting', esc_attr( $update_total_setting ) );

	// Remove any coupons that start with 'super_rewards_'.
	foreach ( $order->get_coupon_codes() as $coupon_code ) {
		if ( strpos( $coupon_code, 'super_rewards_' ) === 0 ) {
			$order->remove_coupon( $coupon_code );
		}
	}

	// Reset the order total to the original order total.
	$order->calculate_totals();

	$note = '';

	if ( 'no' === $update_total_setting ) {
		return; // If the update total setting is not to update the order total, don't show the cash reward.
	} elseif ( 'order_total' === $update_total_setting ) {
		// If the update total setting is to update the order total, set the order total to the cash payable to merchant plus the refunded amount.
		$order->set_total( $cash_payable_to_merchant_major_units + $order->get_total_refunded() );

		// If the updated total will be lower due to the merchant funded amount, add a note about it.
		if ( $merchant_funded_amount_major_units > 0 ) {
			// translators: %1$s: Formatted cash amount payable to merchant.
			$note .= sprintf( __( ' Super Payments updated the order total to %1$s due to the apply cash rewards setting.', 'super-payments' ), $order->get_formatted_order_total() );
		}
	} elseif ( 'coupon' === $update_total_setting && $merchant_funded_amount_major_units > 0 ) {
		// Create new coupon, if the merchant cash reward is greater than 0.
		$coupon      = new WC_Coupon();
		$coupon_code = 'super_rewards_' . $transaction_id;
		$coupon->set_code( $coupon_code );
		$coupon->set_description( 'Super Payments Cash Rewards: £' . $merchant_funded_amount_major_units );
		$coupon->set_amount( $merchant_funded_amount_major_units );
		$coupon->set_discount_type( 'fixed_cart' );
		$coupon->set_usage_limit( 1 );
		$coupon->save();

		// Apply the new coupon.
		$order->apply_coupon( $coupon );

		// translators: %1$s: Formatted cash amount payable to merchant.
		$note .= sprintf( __( ' Super Payments applied a coupon for £%1$s due to the apply cash rewards setting.', 'super-payments' ), $merchant_funded_amount_major_units );
	}

	// Add note about Super funded amount if present.
	if ( $super_funded_amount_major_units > 0 ) {
		// translators: %1$s: Cash amount payable to merchant, %2$s: Cash amount funded by Super.
		$note .= sprintf( __( ' Please note that your customer only paid £%1$s as they received a £%2$s bonus from Super. This will not affect the net amount you will receive.', 'super-payments' ), $customer_funded_amount_major_units, $super_funded_amount_major_units );
	}

	return $note;
}
