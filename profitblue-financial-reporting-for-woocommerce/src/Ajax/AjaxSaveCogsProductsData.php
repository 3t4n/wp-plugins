<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;
use ProfitBlue\Helpers\Helper;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveCogsProductsData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['products'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Period is not selected!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}

		if ( !empty( $_POST['period'] ) ) {
			$date_period = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : 'whole-period';
		} else {
			$date_period = 'whole-period';
		}

		//Delete bestsellers/least profitable/most profitable cache
		//delete_transient( 'bestsellers' );
		//delete_transient( 'most_profitable' );
		//delete_transient( 'least_profitable' );

		global $wpdb;
		$options = $wpdb->get_col("SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '%bestseller%'");
		if (!empty($options)) {
			foreach ($options as $option) {
				delete_option($option);
			}
		}
		global $wpdb;
		$options = $wpdb->get_col("SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '%most_profitable%'");
		if (!empty($options)) {
			foreach ($options as $option) {
				delete_option($option);
			}
		}
		global $wpdb;
		$options = $wpdb->get_col("SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '%least_profitable%'");
		if (!empty($options)) {
			foreach ($options as $option) {
				delete_option($option);
			}
		}

		//Get period 
		$periodsController = new ProductsPeriodsController();
		$productsController = new ProductsController();		
		if ( 'custom' == $date_period ) {
			$date_start = isset( $_POST['start'] ) ? wp_unslash( sanitize_text_field( $_POST['start'] ) ) : '';
			$date_end   = isset( $_POST['end'] ) ? wp_unslash( sanitize_text_field( $_POST['end'] ) ) : '';
			$period_data = $periodsController->get_period( $date_period, $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
			$year 		 = $period_data[0]->year;
		} elseif ( 'whole-period' == $date_period ) {
			$period_data = $periodsController->get_period( 'whole-period', $date_start, $date_end );	
			$period_id 	 = $period_data[0]->ID;
			$year 		 = 'whole-period';
		} else {
			$period_data = $periodsController->get_period( $date_period );
			$period_id 	 = $period_data[0]->ID;
			$year 		 = $date_period;
		}

		$products = isset( $_POST['products'] ) ? wp_unslash( sanitize_text_field( $_POST['products'] ) ) : '';
		$products_array = explode( '-', $products );
		$cogs = array();
		$products_ids = array();
		$i = 1;
		foreach( $products_array as $item ) {
			if ( empty( $item ) ) {
				continue;
			}
			if ( 1 == $i ) {
				$products_ids[] = $item;
				$i = 2;
			} elseif ( 2 == $i ) {
				$cogs[] = $item;
				$i = 1;
			}
		}

		if ( !empty( $products_ids ) ) {
			foreach( $products_ids as $key => $product_id ) {

				if ( !empty( $product_id ) ) {
					$productsController->set_product_id( $product_id );
					$product = $productsController->get_product();
					$cogs_value = $cogs[$key];
					$productsController->save_product_cogs( $product, $cogs_value, $period_id, $year, $date_period );
				}

			}
		}

		$products_array = implode( "','", $products_ids );
		global $wpdb;
		//$sql = "SELECT order_id FROM " . $wpdb->prefix . "profitblue_order_items WHERE product_id IN ('" . $products_array . "')";
		$table_name = $wpdb->prefix . 'profitblue_order_items';
		$products_orders = $wpdb->get_results( 
			$wpdb->prepare( 
				"SELECT order_id FROM %i WHERE product_id IN (%s)",
				array(
					$table_name,
					"'".$products_array."'"
				)
			) 
		);

		$response['sql'] = $sql;
		$response['period_id'] = $period_id;
		$response['period_type'] = $date_period;
		
		if ( count( $products_orders ) < 1 ) {
			$response['status'] = 'all';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'All data has been saved and updated.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		} else {

			$batch = new OrderUpdateController();
			$batch->set_specific_batch( $products_orders );
			
			//Process batch
			$batch_result = $batch->proccess_batch();

			if ( 'all' == $batch_result ) {
				$response['status'] = 'all';
				$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'All data has been saved and updated.', 'profitblue-financial-reporting-for-woocommerce' );
			} else {
				$response['status'] = 'continue';
				$response['batch'] = $batch_result;
				$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Updating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . $batch_result . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

				$count = count( $products_orders );
				$percent = 100 - Helper::formated_price( ( $batch_result / ( $count / 100 ) ) );

				$response['html'] .= '<div class="cogs-batch-progress-bar">';
				$response['html'] .= '<div class="cogs-batch-progress-bar-percent" style="width:' . esc_html( $percent ) . '%;"></div>';
				$response['html'] .= '</div>';
				$response['count'] = $count;
				$response['orders'] = wp_json_encode( $products_orders );
				$response['memory'] = memory_get_usage();
			}

			echo wp_json_encode( $response );
			exit();

		}
		
	}

	public static function batch_html() {

		$html = '';
		$html .= '<p class="modal-ajax-response">' . esc_html__( 'Updating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . $batch_result . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

		return $html;

	}


}
