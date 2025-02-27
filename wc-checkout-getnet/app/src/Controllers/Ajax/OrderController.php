<?php
/**
 * WC Order Controller.
 *
 * @package Wc Getnet
 */

namespace WcGetnet\Controllers\Ajax;

use WcGetnet\WooCommerce\GateWays\Pix\WcGetnet_Pix;
use WcGetnet\WooCommerce\WcGetnetProvider;

class OrderController {

	CONST EXPIRED_VALIDATION_STRING = 'O QR Code está expirado';

    /**
	 * Method to return order payment status
	 */
	public static function getPaymentStatusByPayId() {
        $order_id = isset( $_POST['order_id'] ) ? wc_clean( wp_unslash( $_POST['order_id'] ) ) : '';
        $order    = wc_get_order($order_id);

		if ( !$order ) {
			return wp_send_json_error([
                'status'  => 'error',
                'message' => 'Order not found',
            ]);
        }

		$order_status = $order->get_status();
		$webhook      = (new self())->getLastWebhook($order);

		$statusMap = [
			'expired' => [
				'condition' => 'failed' == $order_status && WcGetnetProvider::PAYMENT_STATUS['Denied'] == $webhook->status && false !== strpos($webhook->description_detail, self::EXPIRED_VALIDATION_STRING),
				'message'   => 'Order expired'
			],
			'paid' => [
				'condition' => ('processing' === $order_status || 'completed' === $order_status) && WcGetnetProvider::PAYMENT_STATUS['Approved'] == $webhook->status,
				'message'   => 'Order paid'
			],
			'waiting-payment' => [
				'condition' => 'on-hold' == $order_status,
				'message'   => 'Order on hold'
			],
			'error' => [
				'condition' => true,
				'message'   => 'Order with error'
			]
		];

		foreach ($statusMap as $status => $data) {
			if ( !$data['condition'] ) {
				continue;
			}

			return wp_send_json_success([
				'status' => $status,
				'message' => $data['message']
			]);
		}
    }

	/**
	 * Method to return last webhook of order.
	 */
	private function getLastWebhook($order) {
		$webhook_history = $order->get_meta('_webhook_history');

		if ( !$webhook_history || !sizeof( $webhook_history ) > 0 ) {
			return;
		}

		return end($webhook_history);
	}

	/**
	 * Method to return created payment with pix.
	 */
	public static function createPixPayment() {
        $order_id = isset( $_POST['order_id'] ) ? wc_clean( wp_unslash( $_POST['order_id'] ) ) : '';

		if(get_post_type($order_id) != "shop_order") {
			return wp_send_json_error([
                'status'  => 'not_found',
                'message' => 'Order not found',
            ]);
        }

		$order        = wc_get_order($order_id);
		$order_status = $order->get_status();
		$webhook      = (new self())->getLastWebhook($order);

		if ( ('processing' === $order_status || 'completed' === $order_status) && WcGetnetProvider::PAYMENT_STATUS['Approved'] == $webhook->status) {
			return wp_send_json_error([
                'status'  => 'order_paid',
                'message' => 'Pedido pago.',
            ]);
		}

		$getnet_pix = new WcGetnet_Pix();
		$payment    = $getnet_pix->process_payment($order_id);
		$order->add_order_note(__( 'Getnet: PIX gerado novamente pelo cliente e de forma manual.' ));

		return wp_send_json_success($payment);
    }
}
