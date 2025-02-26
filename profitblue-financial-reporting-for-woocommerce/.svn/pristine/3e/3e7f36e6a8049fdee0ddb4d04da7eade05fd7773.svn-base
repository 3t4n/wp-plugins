<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxOrdersGetModal {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();

		$period = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : '';
		$download_url = admin_url() . 'admin.php?page=orders&download-csv=orders&period=' . esc_html( $period );
		$hiddens = '';
		
		$html = '';
		$html .= '<div class="bulk-cogs-header">';
			$html .= '<h3>' . esc_html__( 'Download Orders export', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
		$html .= '</div>';
		$html .= '<div class="bulk-cogs-body">';
			$html .= '<div class="bulk-cogs-body-item" style="grid-template-columns:1fr;">';
				$html .= '<div class="bulk-cogs-body-label">';
					$html .= '<span>' . esc_html__( 'Download the orders list', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
					$html .= '<a href="' . esc_url( $download_url ) . '" class="slim-button cogs-download">' . esc_html__( 'Download', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
				$html .= '</div>';
			$html .= '</div>';			
		$html .= '</div>';
		
		$response['target'] = 'modal';
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
		
	}

}
