<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Models\CustomCostsAndIncomeModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveLastYearCcaiData {
	
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
		if ( empty( $_POST['year'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Year missing!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}

		$year = isset( $_POST['year'] ) ? wp_unslash( sanitize_text_field( $_POST['year'] ) ) : '';
		$last_year = $year - 1;
		
		$ccai_model = new CustomCostsAndIncomeModel();
		$ccai_data = $ccai_model->get_ccai_by_year( $last_year );
		if ( empty( $ccai_data ) ) {

			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'There is no data for last year!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();

		}

		$ccai_model->clear( $year );

		$array = array(
			'label',
			'name',
			'amount',
			'date_start',
			'date_end',
			'year',
			'month-1',
			'month-2',
			'month-3',
			'month-4',
			'month-5',
			'month-6',
			'month-7',
			'month-8',
			'month-9',
			'month-10',
			'month-11',
			'month-12',
			'type',
			'manually',
			'amount-type'
		);

		foreach( $ccai_data as $item ) {

			$new_data = array();

			foreach( $array as $key ) {
				if ( 'year' == $key ) {
					continue;
				}
				if ( !empty( $item[$key] ) ) {
					if ( 'date_start' == $key ) {
						$value = str_replace( $last_year, $year, $item['date_start'] );
						$new_data['date_start'] = $value;							
					} elseif ( 'date_end' == $key ) {
						$value = str_replace( $last_year, $year, $item['date_end'] );
						$new_data['date_end'] = $value;
					} else {
						$new_data[$key] = $item[$key];
					}
				}
			}

			$new_data['year'] = $year;

			$ccai_model->insert_ccai( $new_data );			

		}

		$response['status'] = 'succes';
		$response['url'] = esc_url( admin_url() . 'admin.php?page=data-settings&subpage=custom-cost-and-income&year=' . esc_html( $year ) );
		echo wp_json_encode( $response );
		exit();

	}
}
