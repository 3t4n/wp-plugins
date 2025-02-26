<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;
use ProfitBlue\Helpers\Helper;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxGetBestSeller {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		$html = '';
		
		$start_date = isset( $_POST['start'] ) ? strtotime( wp_unslash( sanitize_text_field( $_POST['start'] ) ) ) : false;
		$end_date   = isset( $_POST['end'] ) ? strtotime( wp_unslash( sanitize_text_field( $_POST['end'] ) ) ) : false;
		$term_id    = isset( $_POST['term'] ) ? wp_unslash( sanitize_text_field( $_POST['term'] ) ) : '';

		global $wpdb;

		$order_items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$product_data = array();
		
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT	items.item_qty AS qty, items.product_id AS product_id
      			FROM %i AS items
      			LEFT JOIN %i AS orders ON orders.order_id = items.order_id 
				WHERE orders.order_date BETWEEN %s AND %s AND items.item_type = 'line_item'",
				array(
					$order_items_table_name,
					$orders_table_name,
					$start_date,
					$end_date
				) 
			)
		);
		if ( !empty( $result ) ) {
			foreach( $result as $item ) {
				if ( empty( $product_data[$item->product_id] ) ) {
					$product_data[$item->product_id] = $item->qty;
				} else {
					$product_data[$item->product_id] += $item->qty;
				}
			}
		}
		
		foreach( $product_data as $product_id => $qty ) {
			if ( !has_term( $term_id, 'product_cat', $product_id ) ) {
				unset( $product_data[$product_id] );
			}
		}
		arsort( $product_data );
		
		if ( !empty( $product_data ) ) {
			$product_id = array_key_first( $product_data );
			$data = self::get_product_data( $product_id, $start_date, $end_date );
			if ( false == $data ) {
				$html .= '<p>' . esc_html__( 'No product data found', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			} else {

				$html .= '<div class="overview-category-item-header">';
					$html .= get_the_post_thumbnail( $product_id );
					$html .= '<h3>' . get_the_title( $product_id ) . '</h3>';
				$html .= '</div>';
				$html .= '<div class="overview-category-item-content">';
					$html .= '<p>' . esc_html__( 'Sales:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $data[0]->qty ) . '</span></p>';
					$html .= '<p>' . esc_html__( 'Revenue:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $data[0]->total ) ) . ',-</span></p>';
					$html .= '<p>' . esc_html__( 'COGS:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $data[0]->cogs ) ) . '</span></p>';
					$html .= '<p>' . esc_html__( 'Gross margin:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $data[0]->profit ) ) . '</span></p>';
					if ( 0 == $data[0]->profit ) {
						$percent = '0';
					} else {
						$percent = Helper::formated_price( $data[0]->profit / ( $data[0]->total / 100 ) );
					}
					$html .= '<p>' . esc_html__( 'Gross margin (%):', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $percent ) . '%</span></p>';
				$html .= '</div>';

			}
		
		} else {
			$html .= '<p>' . esc_html__( 'No products found', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
		}
		
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
		
	}

	
	/**
	 * Get product_data
	 *
	 */
	public static function get_product_data( $product_id, $start_date, $end_date ) {	

		global $wpdb;
		$order_items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$product_data = array();
		
		if ( false != $start_date && false != $end_date ) {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					LEFT JOIN %i AS orders ON orders.order_id = order_items.order_id 
					WHERE orders.order_date BETWEEN %s AND %s AND order_items.product_id = %d",
					array(
						$order_items_table_name,
						$orders_table_name,
						$start_date,
						$end_date,
						$product_id
					) 
				)
			);
		} else {
			$result = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT SUM(order_items.item_qty) as qty, SUM(order_items.profit) as profit, SUM(order_items.item_cogs) as cogs, SUM(order_items.item_total) as total
					FROM %i AS order_items
					LEFT JOIN %i AS orders ON orders.order_id = order_items.order_id 
					WHERE order_items.product_id = %d",
					array(
						$order_items_table_name,
						$orders_table_name,
						$product_id
					) 
				)
			);
		}
		
		if ( empty( $result ) ) {
			return false;
		}
		return $result;

	}

}
