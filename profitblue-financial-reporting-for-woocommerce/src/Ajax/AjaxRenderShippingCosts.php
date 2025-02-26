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
class AjaxRenderShippingCosts {

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
		$period = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : '';

		$shipping_cost = new ShippingCostsModel();
		$data = $shipping_cost->get_shipping_cost( $period );

		if ( 'custom-range' == $data[0]->period_type ) {
			$range = $data[0]->period_start . ' - ' . $data[0]->period_end;
			$response['range'] = $range;
		}
		
		$html = '';
		$html .= '<div class="shipping-costs-wrap">';
			$html .= ShippingCostsBlock::get_shipping_costs_block( $data, $shipping_cost );
		$html .= '</div>';

		$response['status'] = 'success';
		$response['period'] = $period;
		$response['html'] = $html;

		echo wp_json_encode( $response );
		exit();

	}

}
