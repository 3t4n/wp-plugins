<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxProcessCogsBatch {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();

		$count = isset( $_POST['count'] ) ? wp_unslash( sanitize_text_field( $_POST['count'] ) ) : '';
		
		$batch = new OrderUpdateController();
		
		//Process batch
		$batch_result = $batch->proccess_batch();

		if ( 'all' == $batch_result ) {
			$response['status'] = 'all';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'All data has been saved and updated.', 'profitblue-financial-reporting-for-woocommerce' );
		} else {
			$response['status'] = 'continue';
			$response['batch'] = esc_html( $batch_result );
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Updating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . $batch_result . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

			$percent = 100 - round( ( $batch_result / ( $count / 100 ) ), 2 );

			$response['html'] .= '<div class="cogs-batch-progress-bar">';
			$response['html'] .= '<div class="cogs-batch-progress-bar-percent" style="width:' . esc_html( $percent ) . '%;"></div>';
			$response['html'] .= '</div>';
			$response['count'] = esc_html( $count );
			$response['memory'] = memory_get_usage();
		}

		echo wp_json_encode( $response );
		exit();
		
	}
}
