<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\PaymentsPeriodsController;
use ProfitBlue\Models\PaymentCostsModel;
use ProfitBlue\Models\OrderShippingModel;
use ProfitBlue\Models\OrderPaymentModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxProcessOrdersShippingPayment {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		global $wpdb;

		$response = array();
		$type = 'payment';
		if ( !empty( $_POST['type'] ) ) {
			$type = isset( $_POST['type'] ) ? wp_unslash( sanitize_text_field( $_POST['type'] ) ) : '';
		}
		$orders_json = get_option( 'profitblue_' . $type . '_orders_buffer' );
		if ( !empty( $orders_json ) ) {
			$orders = maybe_unserialize( $orders_json );
			if ( is_array( $orders ) ) {
				$i = 1;
				foreach( $orders as $key => $item_id ) {

					if ( $i > 50 ) {
						$i++;
						continue;
					}
					$table_name = $wpdb->prefix . 'profitblue_orders';
					$order = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i WHERE ID = %d",
							array(
								$table_name,
								$item_id
							)
						)
					);	
					$orderShippingModel = new OrderShippingModel( $order[0] );
					$shippingIncome = $orderShippingModel->get_order_shipping_income();
					$OrderPaymentModel = new OrderPaymentModel( $order[0] );
					$paymentIncome = $OrderPaymentModel->get_payment_income();

					$order_payment_cost = 0;
					$order_shipping_cost = 0;

					//Shipping
					if ( !empty( $shippingIncome['shipping_cost'] ) && $shippingIncome['shipping_cost'] != '0' ) {
						$order_shipping_cost = (float)$shippingIncome['shipping_cost'];
					}

					//COD
					if ( !empty( $shippingIncome['cod_price'] ) && $shippingIncome['cod_price'] != '0' ) {
						$order_payment_cost += (float)$shippingIncome['cod_price'];
					}

					//Payment
					if ( !empty( $paymentIncome ) && $paymentIncome > 0 ) {
						$order_payment_cost += (float)$paymentIncome;
					}
					
					$data = array(
						'order_payment_cost' => $order_payment_cost,
						'order_shipping_cost' => $order_shipping_cost
					);
					$wpdb->update( $wpdb->prefix . 'profitblue_orders', $data, array( 'ID' => $item_id ) );

					unset( $orders[$key] );
					$i++;					
				}

				if ( !empty( $orders ) ) {					
					update_option( 'profitblue_' . $type . '_orders_buffer', serialize( $orders ) );
					$response['status'] = 'buffer';
					$response['type'] = $type;
					$response['orders'] = serialize( $orders );
					// translators: %d: number of orders remaining
					$response['html'] = '<p class="modal-ajax-response">' . sprintf( esc_html__( 'Updating in batches  of 50 orders, %d orders remaining.', 'profitblue-financial-reporting-for-woocommerce' ), count( $orders ) ) . '</p>';
					echo wp_json_encode( $response );
					exit();
				} else {
					delete_option( 'profitblue_' . $type . '_orders_buffer' );
					$response['status'] = 'end';
					$response['type'] = $type;
					$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'All data was updated, you can close modal', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
					echo wp_json_encode( $response );
					exit();
				}

			}
		} else {
			$response['status'] = 'error';
			$response['type'] = 'payment';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Empty buffer', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}
			
		$response['status'] = 'error';
		$response['type'] = 'payment';
		$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Something is wrong', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
		echo wp_json_encode( $response );
		exit();
					
	}
	
}
