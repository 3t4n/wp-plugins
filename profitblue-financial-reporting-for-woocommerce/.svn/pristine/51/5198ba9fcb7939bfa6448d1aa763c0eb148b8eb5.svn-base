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
class AjaxCogsGetModal {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();

		$period = isset( $_POST['period'] ) ? wp_unslash( sanitize_text_field( $_POST['period'] ) ) : '';
		$download_url = admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold&download-csv=cogs&period=' . esc_html( $period );
		$hiddens = '';
		if ( 'custom' == $period ) {
			$start = isset( $_POST['start'] ) ? wp_unslash( sanitize_text_field( $_POST['start'] ) ) : '';
			$end   = isset( $_POST['end'] ) ? wp_unslash( sanitize_text_field( $_POST['end'] ) ) : '';
			$download_url .= '&start= ' . esc_html( $start ) . '&end= ' . esc_html( $end );
			$hiddens .= '<input type="hidden"  id="period" name="period" value="' . esc_html( $period ) . '" />';
			$hiddens .= '<input type="hidden"  id="start" name="start" value="' . esc_html( $start ) . '" />';
			$hiddens .= '<input type="hidden"  id="end" name="end" value="' . esc_html( $end ) . '" />';
		} else {
			$hiddens .= '<input type="hidden"  id="period" name="period" value="' . esc_html( $period ) . '" />';
		}
		
		$html = '';
		$html .= '<div class="bulk-cogs-overlay" id="bulk-cogs-overlay"><img src="' . esc_url( PROFITBLUEFURL ) . 'assets/images/icons/spinner-solid.svg" /></div>';
		$html .= '<div class="bulk-cogs-header">';
			$html .= '<h3>' . esc_html__( 'Bulk COGS Export and Import', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
		$html .= '</div>';
		$html .= '<div class="bulk-cogs-body">';
			$html .= '<div class="bulk-cogs-body-item">';
				$html .= '<div class="bulk-cogs-body-step">';
					$html .= '<span>1</span>';
				$html .= '</div>';
				$html .= '<div class="bulk-cogs-body-label">';
					$html .= '<span>' . esc_html__( 'Download the product list', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
					$html .= '<a href="' . esc_url( $download_url ) . '" class="slim-button cogs-download">' . esc_html__( 'Download', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
				$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="bulk-cogs-body-item">';
				$html .= '<div class="bulk-cogs-body-step">';
					$html .= '<span>2</span>';
				$html .= '</div>';
				$html .= '<div class="bulk-cogs-body-label">';
					$html .= '<span>' . esc_html__( 'Upload the product list', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
					$html .= '<form method="post" enctype="multipart/form-data" action="cogs-upload-form" id="">';
					$html .= '<input id="fileupload" type="file" name="fileupload" />';
					$html .= esc_html( $hiddens );
					$html .= '<button  name="cogs-upload" class="slim-button cogs-upload">' . esc_html__( 'Upload', 'profitblue-financial-reporting-for-woocommerce' ) . '</button>';
					$html .= '</form>';
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';
		
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
		
	}

}
