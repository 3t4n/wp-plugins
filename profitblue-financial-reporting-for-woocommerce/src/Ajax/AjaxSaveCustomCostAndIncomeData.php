<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Models\CustomCostsAndIncomeModel;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSaveCustomCostAndIncomeData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
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
		$year = isset( $_POST['year'] ) ? wp_unslash( sanitize_text_field( $_POST['year'] ) ) : '';

		if ( is_array( $data_array ) ) {

			$ccai_model = new CustomCostsAndIncomeModel();
			$ccai_model->clear( $year );

			foreach( $data_array as $item ) {

				if ( !empty( $item['date'] ) ) {
					$date = $item['date'];
					unset( $item['date'] );
					$parts = explode( ' - ', $date );
					$item['date_start'] = $parts[0];
					$item['date_end'] = $parts[1];
				}
				$item['year'] = $year;

				$ccai_model->insert_ccai( $item );

				

			}

			$response['status'] = 'succes';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Data was saved.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();

		}
		

		exit();
		
	}
}
