<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\PaymentsPeriodsController;
use ProfitBlue\Models\PaymentCostsModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSavePaymentsData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		global $wpdb;
		$response = array();
		if ( empty( $_POST['data'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Form data missing!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}

		if ( !empty( $_POST['data'] ) ) {
			$data = isset( $_POST['data'] ) ? wp_unslash( sanitize_text_field( $_POST['data'] ) ) : '';
			$data_array = json_decode( stripslashes( $data ), true );
		}
		
		if ( !empty( $_POST['period'] ) ) {
			$date_period = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : '';
		}

		//Get period 
		$periodsController = new PaymentsPeriodsController();

		if ( 'custom' == $date_period ) {
			$date_start = isset( $_POST['start'] ) ? wp_unslash( sanitize_text_field( $_POST['start'] ) ) : '';
			$date_end   = isset( $_POST['end'] ) ? wp_unslash( sanitize_text_field( $_POST['end'] ) ) : '';
			$period_data = $periodsController->get_period( $date_period, $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
			$year 		 = 'custom';			
		} else {
			$period_data = $periodsController->get_period( $date_period );
			$period_id 	 = $period_data[0]->ID;
			$year 		 = $date_period;			
			$date_start  = $year . '-01-01';
			$date_end    = $year . '-12-31';
		}

		if ( !empty( $_POST['use-this-period'] ) ) {
			$use = isset( $_POST['use-this-period'] ) ? wp_unslash( sanitize_text_field( $_POST['use-this-period'] ) ) : '';
			if ( 'yes' == $use ) {
				update_option( 'profitblue-use-this-payment-period', 'yes' );
			} else {
				delete_option( 'profitblue-use-this-payment-period' );
			}
		}

		if ( is_array( $data_array ) ) {

			$payment_model = new PaymentCostsModel();

			if ( 'whole-period' == $date_period ) {
				$table_name = $wpdb->prefix . 'profitblue_payment_periods';
				$result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM %i", array( $table_name ) ) );
				if ( !empty( $result ) ) {
					foreach( $result as $period_item ) {
						foreach( $data_array as $item ) {

							$label = $item['label'];
							$payment = $item['paymentid'];
							$payment_period_id = $period_item->ID;
							$amount = null;
							if ( !empty( $item['amount'] ) ) {
								$amount = $item['amount'];
							} else {
								$amount = 0;
							}
							$percent = null;
							if ( !empty( $item['percent'] ) ) {
								$percent = $item['percent'];
							} else {
								$percent = 0;
							}
							$payment_model->save_payment( $label, $payment, $payment_period_id, $year, $percent, $amount );				
									
						}
					}
				}
			} else {

				foreach( $data_array as $item ) {

					$label = $item['label'];
					$payment = $item['paymentid'];
					$payment_period_id = $period_id;
					$amount = null;
					if ( !empty( $item['amount'] ) ) {
						$amount = $item['amount'];
					} else {
						$amount = 0;
					}
					$percent = null;
					if ( !empty( $item['percent'] ) ) {
						$percent = $item['percent'];
					} else {
						$percent = 0;
					}
					$payment_model->save_payment( $label, $payment, $payment_period_id, $year, $percent, $amount );				
							
				}

			}

			/**
			 * Update orders, create buffer
			 * 
			 */
			global $wpdb;
			if ( 'whole-period' != $date_period ) {		
				$args = array(
					$table_name,
					strtotime( $date_start),
					strtotime( $date_end )
				);
				$table_name = $wpdb->prefix . 'profitblue_orders';
				$orders = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT * FROM %i WHERE order_date >=%s AND order_date <= %s",
						array(
							$wpdb->prefix . 'profitblue_orders',
							strtotime( $date_start),
							strtotime( $date_end )
						)
					) 
				);
			} else {
				$table_name = $wpdb->prefix . 'profitblue_orders';
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
				update_option( 'profitblue_payment_orders_buffer', serialize( $orders_buffer ) );
			}

			$response['status'] = 'buffer';
			$response['type'] = 'payment';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Data was updated, now recalculate orders data', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();

		}				
	}
}
