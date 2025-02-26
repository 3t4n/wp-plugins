<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Blocks\ShippingCostsBlock;
use ProfitBlue\Models\ShippingCostsModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveShippingCosts {
	
	/**
	 * handle
	 *
	 * @return void
	 */
	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['type'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Type is not selected!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );

			exit();
		}

		//whole-period
		global $wpdb;

		$period     = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : '';
		$period_id  = isset( $_POST['periodid'] ) ? wp_unslash( sanitize_text_field( $_POST['periodid'] ) ) : '';
		$type       = isset( $_POST['type'] ) ? wp_unslash( sanitize_text_field( $_POST['type'] ) ) : '';


		//Shipping Costs Model object
		$shippingCosts = new ShippingCostsModel();

		$date_start = null;
		$date_end = null;
		if ( !empty( wp_unslash( sanitize_text_field( $_POST['daterange'] ) ) ) ) {
			$date_period = wp_unslash( sanitize_text_field( $_POST['daterange'] ) );
			$dates = explode( ' - ', $date_period );
			$date_start = $dates[0];
			$date_end = $dates[1];
			$order_date_start = $dates[0];
			$order_date_end = $dates[1];
		} else {
			if ( 'whole-period' != $period ) {
				$date_start  = $period . '-01-01';
				$date_end    = $period . '-12-31';
			}
		}

		$cod_payment = isset( $_POST['codpayment'] ) ? wp_unslash( sanitize_text_field( $_POST['codpayment'] ) ) : '';
		
		if ( 'no-costs' == $type ) {
			$shippingCosts->save_no_cost( $type, $period, $cod_payment, $date_start, $date_end );
		} elseif ( 'same-costs' == $type ) {
			$shippingCosts->save_same_cost( $type, $period, $cod_payment, $date_start, $date_end );
		} elseif ( 'custom-costs' == $type ) {

			$shippingCostsIdResult = $shippingCosts->get_shipping_cost( $period, $date_start, $date_end  );
			if ( false == $shippingCostsIdResult ) {
				$shippingCostsId = $shippingCosts->save_custom_cost( $type, $period, $cod_payment, $date_start, $date_end );
			} else {
				$shippingCosts->save_custom_cost( $type, $period, $cod_payment, $date_start, $date_end  );
				$shippingCostsId = $shippingCostsIdResult[0]->ID;
			}
			//Save shipping cost
			foreach( $_POST['shipping'] as $key => $item ) {

				$item = sanitize_text_field( $item );				
				if ( str_contains( $key, 'zone' ) ) {
					$parts = explode( ' ', trim($item) );
					$shipping_id = sanitize_text_field( $parts[0] );

					$amount = null;
					if ( !empty( $parts[2] ) || '0' === $parts[2] ) {
						$amount = sanitize_text_field( $parts[2] );	
					} else {
						$amount = 0;
					}
					$cod = null;
					if ( !empty( $parts[4] ) || '0' === $parts[4] ) {
						$cod = sanitize_text_field( $parts[4] );	
					} else {
						$cod = 0;
					}
					if ( 'whole-period' == $period ) {
						$shippingCosts->save_shipping_costs( $shipping_id, $amount, $cod );
					} else {
						$shippingCosts->save_shipping_cost( $shippingCostsId, $shipping_id, $amount, $cod );
					}
				}
			}
			

		} elseif ( 'variable-costs' == $type ) {

			$label       = isset( $_POST['label'] ) ? wp_unslash( sanitize_text_field( $_POST['label'] ) ) : '';
			$amount_type = isset( $_POST['amounttype'] ) ? wp_unslash( sanitize_text_field( $_POST['amounttype'] ) ) : '';
			$amount      = isset( $_POST['amount'] ) ? wp_unslash( sanitize_text_field( $_POST['amount'] ) ) : '';
			
			$shippingCosts->save_variable_cost( $type, $period, $label, $amount_type, $amount, $cod_payment, $date_start, $date_end );

		}

		/**
		 * Update orders, create buffer
		 * 
		 */
		global $wpdb;
		$table_name = $wpdb->prefix . 'profitblue_orders';
		if ( 'whole-period' != $period ) {		
			$orders = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT * FROM %i WHERE order_date >=%s AND order_date <= %s", 
					array(
						$wpdb->prefix . 'profitblue_orders',
						strtotime( $date_start ),
						strtotime( $date_end )
					) 
				) 
			);
		} else {
			$orders = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM %i",
					array(
						$wpdb->prefix . 'profitblue_orders'
					)
				) 
			);
		}
		
		if ( !empty( $orders ) ) {
			$orders_buffer = array();
			foreach( $orders as $order ) {
				$orders_buffer[] = $order->ID;
			}
			update_option( 'profitblue_shipping_orders_buffer', serialize( $orders_buffer ) );
		}

		$response['status'] = 'buffer';
		$response['type'] = 'shipping';
		$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Data was updated, now recalculate orders data', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
		echo wp_json_encode( $response );
		exit();
		
	}

}
