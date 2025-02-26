<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ShopSettingPeriodsController;
use ProfitBlue\Models\ShopSettingCostsModel;
use ProfitBlue\Helpers\Helper;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxOverwievCategoryData {

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
		$args = array();
		$where = '';
		$where .= " WHERE orders.order_date BETWEEN '%s' AND '%s' AND items.item_type = 'line_item'";
		$args[] = $start_date;
		$args[] = $end_date;
		$product_data = array(
			'qty' 			=> 0,
			'revenue' 		=> 0,
			'cogs' 			=> 0,
			'gross-margin' 	=> 0,
			'data'			=> ''
		);
		$order_items_table_name = $wpdb->prefix . 'profitblue_order_items';
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT
					items.item_qty AS qty,
					items.item_total AS total,
					items.item_cogs AS cogs,
					items.profit AS profit,
					items.product_id AS product_id
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

				$product_id = $item->product_id;

				if ( has_term( $term_id, 'product_cat', $product_id ) ) {

					$product_data['qty'] 			+= $item->qty;
					$product_data['revenue'] 		+= $item->total;	
					$product_data['cogs'] 			+= $item->cogs;	
					$product_data['gross-margin'] 	+= $item->profit;	
					$product_data['data'] 			.= $item->product_id . ',';
				}

			}
		}
		
		$term = get_term( $term_id, 'product_cat' );
		$term_image_id = get_term_meta( $term_id, 'thumbnail_id', true );
		
		if ( !empty( $term_image_id ) && $term_image_id == '0' ) {
			$image = wp_get_attachment_image( $term_image_id, 'thumbnail' );
		} else {
			$ids = explode( ',', $product_data['data'] );
			$image = get_the_post_thumbnail( $ids[0] );
		}
		
		$html .= '<div class="overview-category-item-header" data-id="' . esc_html( $term_image_id ) . '" data-product="' . esc_html( $product_id ) . '">';
			$html .= $image;
			$html .= '<h3>' . $term->name . '</h3>';
		$html .= '</div>';
		if ( 0 == $product_data['revenue'] ) {
			$percent = 0;
			$margin = 0;
		} else {
			$margin = Helper::formated_price( $product_data['revenue'] - $product_data['cogs'] );
			$percent = Helper::formated_price( ( $product_data['revenue'] - $product_data['cogs'] ) / ( $product_data['revenue'] / 100 ) );
		}
		$html .= '<div class="overview-category-item-content">';
			$html .= '<p>' . esc_html__( 'Sales:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $product_data['qty'] ) . '</span></p>';
			$html .= '<p>' . esc_html__( 'Revenue:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_data )['revenue'] ) . ',-</span></p>';
			$html .= '<p>' . esc_html__( 'COGS:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_data['cogs'] ) ) . '</span></p>';
			$html .= '<p>' . esc_html__( 'Gross margin:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $margin ) . '</span></p>';
			$html .= '<p>' . esc_html__( 'Gross margin (%):', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $percent ) . '%</span></p>';
		$html .= '</div>';

		
		$response['html'] = $html;
		$response['data'] = $product_data['data'];
		echo wp_json_encode( $response );
		exit();
			
	}

	public static function get_all_subcategories($term_id) {
		$subcategories = get_terms( array(
			'taxonomy'   => 'product_cat',
			'child_of'   => $term_id,
			'hide_empty' => false,
		));
	
		$all_subcategories = array();
		foreach ($subcategories as $subcategory) {
			$all_subcategories[] = $subcategory->term_id;
			$all_subcategories = array_merge($all_subcategories, self::get_all_subcategories($subcategory->term_id));
		}
	
		return $all_subcategories;
	}
	
	public static function product_has_category_or_subcategory($product_id, $term_id) {
		$term_ids = array_merge(array($term_id), self::get_all_subcategories($term_id));
		foreach ($term_ids as $id) {
			if (has_term($id, 'product_cat', $product_id)) {
				return true;
			}
		}
		return false;
	}
}
