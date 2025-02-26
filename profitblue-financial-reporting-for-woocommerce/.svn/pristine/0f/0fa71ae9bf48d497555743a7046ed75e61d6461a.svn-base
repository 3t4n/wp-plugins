<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;
use ProfitBlue\Helpers\CreateTables;
use ProfitBlue\Helpers\CreatePeriods;

/**
 * Class Settings
 * 
 */
class AjaxCreateMissingOrders {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();

		$orders_batch = maybe_unserialize( get_option( 'profitblue_notsaved_orders' ) );

		if ( !empty( $orders_batch ) ) {
			$ordersControler = new OrdersController();
			$i = 1;

			foreach( $orders_batch as $key => $order_id ) {
				$ordersControler->calculate_order_data( $order_id );
				unset( $orders_batch[$key] );
				$i++;
				if ( $i > 10 ) {
					continue;
				}
			}

			if ( !empty( $orders_batch ) ) {
				$count = count( $orders_batch );
				$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue missing orders', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Creating missing database tables and necessary data. This operation may take some time, please do not close the window until the data update is complete.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p><p class="are-you-sure">' . esc_html( $count ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				$response['html']   = $html;
				$response['status'] = 'continue';
			} else {
				$response['status'] = 'finish';	
				$html = '<h2 class="are-you-sure">' . esc_html__( 'All missing orders was saved', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'You can close modal and continue work.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			}

		} else {
			$response['status'] = 'finish';
		}

		if ( empty( $orders_batch ) ) {
			delete_option( 'profitblue_notsaved_orders' );
		} else {
			update_option( 'profitblue_notsaved_orders', $orders_batch );
		}
		
		
		echo wp_json_encode( $response );
		exit();
		
	}

	public static function create_orders() {

		$batch = get_option( 'profitblue_batch' );
		if ( !empty( $batch ) ) {

			//Batch exists update orders
			$batch = new OrderUpdateController();
			$count = $batch->update_order();

			$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Creating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $count ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			$data = array(
				'html' => $html,
				'status' => 'continue',
				'step' => 'create-orders'
			);

			update_option( 'profitblue_install_step', 'create-orders' );

		} else {

			//Batch not exists, create batch and update orders
			$orderController = new OrdersController();
			$count = $orderController->get_not_saved_oder_id_count();

			if ( $count > 0 ) {
				$orders = $orderController->get_not_saved_order_id_batch();
				if (  false != $orders ) {
					foreach( $orders as $order ) {
						$orderController->calculate_order_data( $order->id );
					}
					$result_count = $count - 10;
					if ( $result_count < 0 ) {
						$result_count == '0';
					}
					$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Creating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $result_count ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
					$data = array(
						'html' => $html,
						'status' => 'continue',
						'step' => 'create-orders'
					);
				}
				update_option( 'profitblue_install_step', 'create-orders' );
			} else {
				$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Orders data was created. Now you can start.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p><p class="are-you-sure"><a href="' . admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&wizard=profitblue&wizard-step=cogs&step=1" class="run-wizzard btn">' . esc_html__( 'Run wizzard', 'profitblue-financial-reporting-for-woocommerce' ) . '</a> <a href="#" class="close-install-modal btn">' . esc_html__( 'Close modal', 'profitblue-financial-reporting-for-woocommerce' ) . '</a></p>';
				$data = array(
					'html' => $html,
					'status' => 'finnish',
					'step' => 'create-orders'
				);
				update_option( 'profitblue_install_step', 'installed' );
			}

		}

		return $data;

	}

}
