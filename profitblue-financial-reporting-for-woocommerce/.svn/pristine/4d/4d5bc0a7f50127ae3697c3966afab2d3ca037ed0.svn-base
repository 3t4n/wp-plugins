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
class AjaxDeletePaymentsData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		if ( empty( $_POST['periodid'] ) ) {
			
			$response['status'] = 'error';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Period id missing!', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();
		}

		$period_id = isset( $_POST['periodid'] ) ? wp_unslash( sanitize_text_field( $_POST['periodid'] ) ) : '';
		global $wpdb;
		$wpdb->delete( $wpdb->prefix . 'profitblue_payment_periods', array( 'ID' => $period_id	) );
		
		$table_name = $wpdb->prefix . 'profitblue_payments';
		$result = $wpdb->get_results( 
			$wpdb->prepare( 
				"SELECT * FROM %i WHERE payment_period_id=%d",
				array(
					$table_name,
					$period_id
				)
			)
		);

		if ( empty( $result ) ) {

			foreach( $result as $item )	{
				$wpdb->delete( $wpdb->prefix . 'payment_period_id', array( 'ID' => $item->ID	) );
			}

		}
		
		$response['status'] = 'succes';
		$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Period wes deleted.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
		echo wp_json_encode( $response );
		exit();
						
	}
}
