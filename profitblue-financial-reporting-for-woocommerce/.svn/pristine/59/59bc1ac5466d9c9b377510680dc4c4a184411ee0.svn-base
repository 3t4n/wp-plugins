<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\PaymentsPeriodsController;
use ProfitBlue\Blocks\PaymentsPeriodsFilterBlock;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxSavePaymentsCustomPeriod {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['period'] ) ) {
			
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
			$periodsController = new PaymentsPeriodsController();
			$check = $periodsController->check_period( $date_start, $date_end );
			if ( false == $check ) {
				
				$response['status'] = 'error';
				$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Your custom period have date conflict with existing period. Please select correct period, or delete existing period.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				echo wp_json_encode( $response );
				exit();

			} else {

				$periodsController->create_custom_periods( $date_start, $date_end, $year );
				$periods = $periodsController->get_custom_periods();
				$html = '<h3>' . esc_html__( 'Custom periods', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				$html .= PaymentsPeriodsFilterBlock::render_custom_periods( $periods );
				$response['html'] = $html;
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
