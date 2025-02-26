<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\ProductsPaginationControler;
use ProfitBlue\Helpers\Helper;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxLoadMoreCogs {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}

        global $wpdb;
		
		$response = array();
		
        if ( !empty( $_POST['offset'] ) ) {
			$offset = isset( $_POST['offset'] ) ? wp_unslash( sanitize_text_field( $_POST['offset'] ) ) : '';
		}
		if ( !empty( $_POST['urlstring'] ) ) {
			$urlstring = isset( $_POST['urlstring'] ) ? wp_unslash( sanitize_text_field( $_POST['urlstring'] ) ) : '';
			$query_string = str_replace( ';', '&', $urlstring );
			$query_string = str_replace( ',', '=', $query_string );
		}

		if ( isset( $_POST['search'] ) && 'empty' !== wp_unslash( sanitize_text_field( $_POST['search'] ) ) ) {
			$text = wp_unslash( sanitize_text_field( $_POST['search'] ) );
			$escaped_text = esc_sql( $text );
			$search = " AND ( c.product_name LIKE '%" . $escaped_text . "%' OR c.sku LIKE '%" . $escaped_text . "%' )";
		} else {
			$search = "";
		}
		
        $period_data = array();
        if ( !empty( $_POST['period-id'] ) ) {
			$period_id = isset( $_POST['period-id'] ) ? wp_unslash( sanitize_text_field( $_POST['period-id'] ) ) : '';
			$period_data['period_type'] = 'id';
            $period_data['period_id'] = $period_id;
		} else {
            $period_year = isset( $_POST['period-year'] ) ? wp_unslash( sanitize_text_field( $_POST['period-year'] ) ) : '';
            $period_data['period_type'] = 'year';
            $period_data['period_year'] = $period_year;
        }

		$show_empty_cogs = '';
		if ( !empty( $_POST['show'] ) ) {
			$show_empty_cogs = " AND c.cogs = '0'";
		}
		
		$products_data = array();
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$cogs_table_name = $wpdb->prefix . 'profitblue_cogs';

		if ( !empty( $period_id ) ) {
			//use period id
			$sql = "SELECT p.product_id, c.cogs 
			FROM " . $wpdb->prefix . "profitblue_products p 
			LEFT JOIN " . $wpdb->prefix . "profitblue_cogs c ON p.product_id = c.product_id 
			WHERE c.period ='" . $period_id . "' " . $show_empty_cogs . $search . "
			LIMIT 20";

			if ( null != $offset ) {
				$sql_offset = $offset * 20;
				$sql .= " OFFSET " . $sql_offset;
			}

			$count_sql = "SELECT COUNT(*) AS total_records 
			FROM " . $wpdb->prefix . "profitblue_products p 
			LEFT JOIN " . $wpdb->prefix . "profitblue_cogs c ON p.product_id = c.product_id 
			WHERE c.period ='" . $period_id . "' " . $show_empty_cogs . $search . ";";

		} else {

			//Use year
			$sql = "SELECT p.product_id, c.cogs 
			FROM " . $wpdb->prefix . "profitblue_products p 
			LEFT JOIN " . $wpdb->prefix . "profitblue_cogs c ON p.product_id = c.product_id 
			WHERE c.year ='" . $period_year . "' " . $show_empty_cogs . $search . "
			LIMIT 20";

			if ( null != $offset ) {
				$sql_offset = $offset * 20;
				$sql .= " OFFSET " . $sql_offset;
			}

			$count_sql = "SELECT COUNT(*) AS total_records 
			FROM " . $wpdb->prefix . "profitblue_products p 
			LEFT JOIN " . $wpdb->prefix . "profitblue_cogs c ON p.product_id = c.product_id 
			WHERE c.year ='" . $period_year . "' " . $show_empty_cogs . $search . ";";
		
		} 

		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$result_cogs = $wpdb->get_results( $sql );
		// phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$result_cogs_count = $wpdb->get_results( $count_sql );
		$html = '';
		
		if ( !empty( $result_cogs ) ) {

			$products_data['query'] = $result_cogs_count;

			foreach( $result_cogs as $item ) {
			
				$ProductsController = new ProductsController();
				$ProductsController->set_product_id( $item->product_id );
				$product = $ProductsController->get_product();
				if( is_object( $product ) ) {
					$item_data = array(
						'id'    => $product->product_id,
						'image' => $product->image,
						'sku'   => $product->sku,
						'name'  => $product->name,
						'price' => wc_price( $product->price )
					);
					
					$html .= '<div class="product-lists-item">';
						$html .= '<div class="product-lists-item-image">' . wp_kses( $item_data['image'], Helper::get_alowed_tags() ) . '</div>';
						$html .= '<div class="product-lists-item-sku">' . esc_html( $item_data['sku'] ) . '</div>';
						$html .= '<div class="product-lists-item-name">' . esc_html( $item_data['name'] ) . '</div>';
						$html .= '<div class="product-lists-item-price">' . esc_html( $item_data['price'] ) . '</div>';
						if ( !empty( $item->cogs ) ) {
							$html .= '<div class="product-lists-item-cogs"><input type="number" min="0" step="' . esc_html( $woocommerce_price_num_decimals ) . '" class="item-cogs" id="item-cogs-' . esc_html( $item_data['id'] ) . '" value="' . esc_html( $item->cogs ) . '" data-product="' . esc_html( $item_data['id'] ) . '" /></div>';
						} else {
							$html .= '<div class="product-lists-item-cogs"><input type="number" min="0" step="' . esc_html( $woocommerce_price_num_decimals ) . '" class="item-cogs no-cogs" id="item-cogs-' . esc_html( $item_data['id'] ) . '" data-product="' . esc_html( $item_data['id'] ) . '" /></div>';
						}
					$html .= '</div>';

					$products_data[] = $item_data;

				}

			}
            $pagination = new ProductsPaginationControler( $result_cogs_count, 'cogs', ( $offset + 1 ) );
			$pagination->set_query_string( $query_string );
			$pagination->set_limit( 20 );
	        $pagination->set_period_data( $period_data );
	        $response['products'] = 'load';
			$response['sql'] = $sql;
            $response['pagination'] = $pagination->render();
		} else {
            $html .= '<p>' . esc_html__( 'No more products found', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
            $response['products'] = 'empty';
			$response['sql'] = $sql;

        }
		$response['count'] = $result_cogs_count[0]->total_records;
        
		$response['status'] = 'succes';
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
			
	}
}
