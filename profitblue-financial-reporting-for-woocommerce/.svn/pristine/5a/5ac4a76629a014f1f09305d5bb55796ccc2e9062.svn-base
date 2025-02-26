<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;
use ProfitBlue\Controllers\OrderUpdateController;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveCogsCustomPeriod {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}

		global $wpdb;

		$response = array();
		if ( ! isset( $_POST['period'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Period is not selected!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();

		}

		$date_start = null;
		$date_end = null;
		if ( !empty( $_POST['period'] ) ) {
			$date_period = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : '';
			$dates = explode( ' - ', $date_period );
			$date_start = $dates[0];
			$date_end = $dates[1];
		}

		if ( !empty( $date_start ) && !empty( $date_end ) ) {

			$y = explode( '-', $date_start );
			$year = $y[0];
			$periodsController = new ProductsPeriodsController();
			$check = $periodsController->check_period( $date_start, $date_end );
			if ( false == $check ) {
				
				$response['status'] = 'error';
				$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Your custom period have date conflict with existing period. Please select correct period, or delete existing period.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				echo wp_json_encode( $response );
				exit();

			} else {
				//Create custom period
				$period_id = $periodsController->create_custom_periods( $date_start, $date_end, $year );
				$periods = $periodsController->get_custom_periods();

				//Save Cogs data - set default from Whole e-shop period
				if ( !empty( $period_id ) && is_integer( $period_id ) ) {
					global $wpdb;
					$table_name = $wpdb->prefix . 'profitblue_products_periods';
					$result = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i WHERE type='whole-period'",
							array(
								$table_name
							)
						)
					);

					if ( !empty( $result ) ) {
						$whole_period_id = $result[0]->ID;
						$table_name = $wpdb->prefix . 'profitblue_cogs';
						$cogs = $wpdb->get_results(
							$wpdb->prepare(
								"SELECT * FROM %i WHERE period=%d",
								array(
									$table_name,
									$whole_period_id
								)
							)
						);
						if ( !empty( $cogs ) ) {
							foreach( $cogs as $item ) {
								$data = array();
								if ( !empty( $item->sku ) ) {
									$data['sku'] = $item->sku; 
								}
								if ( !empty( $item->product_id ) ) {
									$data['product_id'] = $item->product_id; 
								}
								if ( !empty( $item->product_name ) ) {
									$data['product_name'] = $item->product_name; 
								}
								if ( !empty( $item->cogs ) ) {
									$data['cogs'] = $item->cogs;
								} else {
									$data['cogs'] = 0;
								}
								$data['period'] = $period_id; 
								$data['year'] = $year;

								$wpdb->insert( $wpdb->prefix . 'profitblue_cogs', $data );	
							
							}
						}
					}

				}
				//Set order batch a run
				$table_name = $wpdb->prefix . 'profitblue_orders';
				$date_start_strotime = strtotime( $date_start );
				$date_end_strotime   = strtotime( $date_end );				
				$products_orders = $wpdb->get_results(
					$wpdb->prepare(
						"SELECT order_id FROM %i WHERE order_date >=%s AND order_date <= %s",
						array(
							$table_name,
							$date_start_strotime,
							$date_end_strotime
						)
					)
				);

				$batch = new OrderUpdateController();
				$batch->set_specific_batch( $products_orders );		
				$response['count'] = count( $products_orders );	
				$response['period'] = $period_id;
				$response['year'] = $year;
				$response['date_start'] = $date_start;
				$response['date_end'] = $date_end;
				
				$html = '<h3>' . esc_html__( 'Custom periods', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				$html .= ProductsPeriodsFilterBlock::render_custom_periods( $periods );
				$response['html'] = $html;
				$popup = '<h2>' . esc_html__( 'Custom periods was created', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2>';
				$popup .= '<p>' . esc_html__( 'Now we must update all orders with products in this period.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				$popup .= '<p>' . esc_html__( 'This operation may take some time, please do not close the window until the data update is complete. You can see the update process below.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				$response['popup'] = $popup;
				$response['status'] = 'success';

				echo wp_json_encode( $response );
				exit();

			}

		} else {
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Problem with period dates!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}
		
	}
}
