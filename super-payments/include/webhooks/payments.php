<?php
/**
 * Payments webhook registration and handling.
 *
 * @package super-payments
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once WC_Super_Payments::plugin_abspath() . 'include/webhooks/utils.php';

/**
 * Handle payment status webhook events.
 */
function payments_webhook() {
	header( 'x-super-platform-type: woo-commerce' );
	header( 'x-super-platform-version: ' . WC_VERSION );
	header( 'x-super-plugin-version: ' . PLUGIN_VERSION );
	$request_body = file_get_contents( 'php://input' );
	$parsed_json  = json_decode( $request_body, true );

	$order_id              = filter_var( $parsed_json['externalReference'], FILTER_SANITIZE_NUMBER_INT );
	$transaction_id        = htmlspecialchars( $parsed_json['transactionId'] );
	$transaction_reference = htmlspecialchars( $parsed_json['transactionReference'] );

	if ( ! $order_id ) {
		header( 'HTTP/1.1 400 Bad Request' );
		echo esc_html__( 'Invalid value for property "order_id"', 'super-payments' );
		exit;
	}

	$order = wc_get_order( $order_id );

	if ( ! $order ) {
		header( 'HTTP/1.1 404 Not Found' );
		echo esc_html__( 'Order ', 'super-payments' ) . esc_attr( $order_id ) . esc_html__( ' not found', 'super-payments' );
		exit;
	}

	$super_payments = new WC_Super_Payments_Gateway();

	$signature_header       = filter_var( $_SERVER['HTTP_SUPER_SIGNATURE'] ); //phpcs:ignore WordPress.Security
	$signature_header_parts = explode( ',', $signature_header );
	$timestamp_parts        = explode( ':', $signature_header_parts[0] );
	$signature_parts        = explode( ':', $signature_header_parts[1] );
	$generated_signature    = wcsp_generate_webhook_signature( $request_body, $timestamp_parts[1], $super_payments->get_option( 'signing_key' ) );

	if ( $generated_signature !== $signature_parts[1] ) {
		// translators: %1$s: Super transaction reference.
		$order->add_order_note( sprintf( __( 'Super Payments tried to update the order with payment status information for %1$s but the confirmation ID was incorrect.', 'super-payments' ), $transaction_reference ) );
		header( 'HTTP/1.1 401 Unauthorized' );
		exit;
	}

	$payment_status = strval( $parsed_json['transactionStatus'] );

	switch ( $payment_status ) {
		case 'PaymentSuccess':
			if ( ! in_array( $order->get_status(), [ 'processing', 'completed', 'refunded' ], true ) ) {
				// translators: %1$s: Super transaction reference.
				$payment_success_order_note = sprintf( __( 'Payment %1$s completed with Super Payments.', 'super-payments' ), $transaction_reference );
				$update_total_setting       = $super_payments->get_option( 'update_total' );

				$funding_summary = $parsed_json['fundingSummary'];

				if ( ! empty( $funding_summary ) ) {
					$process_funding_summary_note = wcsp_process_funding_summary(
						$order,
						$funding_summary,
						$update_total_setting,
						$transaction_id
					);

					$payment_success_order_note .= $process_funding_summary_note;
				}

				$order->update_meta_data( 'super_transaction_id', esc_attr( $transaction_id ) );
				$order->update_meta_data( 'super_transaction_reference', esc_attr( $transaction_reference ) );
				$order->save();

				$order->payment_complete();
				WC()->cart->empty_cart();
				$order->add_order_note( $payment_success_order_note );
			} elseif ( $order->get_payment_method() !== 'superpayments' ) {
				$order->add_order_note( __( 'Super Payments tried to update the order after a successful payment but the payment method has changed. This customer may have accidentally paid twice.', 'super-payments' ) );
			}
			break;
		case 'PaymentCancelled':
		case 'PaymentFailed':
		case 'PaymentAbandoned':
			break;
		case 'PaymentDelayed':
			// translators: %1$s: Super transaction reference.
			$order->add_order_note( sprintf( __( 'Super Payments is awaiting payment for transaction %1$s.', 'super-payments' ), $transaction_reference ) );
			$order->update_status( 'on-hold' );

			WC()->cart->empty_cart();
			break;
		case 'PaymentRefunded':
			$order->update_status( 'refunded' );
			break;
		default:
			// translators: %1$s: Payment status.
			$order->add_order_note( sprintf( __( 'Super Payments tried to update with an unrecognised status of %1$s.', 'super-payments' ), $payment_status ) );

			header( 'HTTP/1.1 400 Bad Request' );
			echo esc_html__( 'Invalid value for property "payment_status"', 'super-payments' );
			exit;
	}
}

add_action( 'woocommerce_api_' . WC_Super_Payments::plugin_base_id(), 'payments_webhook' );
