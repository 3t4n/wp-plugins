<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OverviewController;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxRecalculateOrdersData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}

		$ordersController = new OrdersController();	
		$overview = new OverviewController();
		
		$order_id = $ordersController->get_not_saved_oder_id();
		if ( false != $order_id ) {
			$ordersController->calculate_order_data( $order_id );
		}
		$orders_count = $overview->get_orders_count();
		$count = $ordersController->get_saved_orders_count();
		$width = ceil( $count / ( $orders_count / 100 ) );

		$response = array();
		if ( $count < $orders_count ) {
			$response['status'] = 'continue';
			$html = '<div class="modal-progress-bar-inner"><div class="modal-progress-value" style="width:' . esc_html( $width ) . '%;"></div></div>';
		} else {
			$response['status'] = 'completed';
			$html = '<h2>All data was recalculated</h2>';
			$html .= '<p>Close to popup and reload page for display new data.</p>';
		
		}

		$response['html'] = $html;
		echo wp_json_encode( $response );

		exit();
		
	}

}
