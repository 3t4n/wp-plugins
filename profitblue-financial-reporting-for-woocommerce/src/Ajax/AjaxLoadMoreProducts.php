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
class AjaxLoadMoreProducts {

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
			$url_array = array();
			$params = explode( ';', $urlstring );
			if ( !empty( $params ) ) {
				foreach( $params as $item ) {
					$parts = explode( ',', $item );
					if ( !empty( $parts[1] ) ) {
						$url_array[$parts[0]] = $parts[1];
					}
				}
			}
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

		$productsController = new ProductsController();

		if ( empty( $url_array['period'] ) ) {
			$productsController->set_start_date( gmdate( 'Y' ) . '-01-01' );
			$productsController->set_end_date( gmdate( 'Y' ) . '-12-31' );
		} else {
			$dates = explode( ' - ', $url_array['period'] );
			$productsController->set_start_date( $dates[0] );
			$productsController->set_end_date( $dates[1] );
		}

		if ( !empty( $_POST['search'] ) ) {
			$search = isset( $_POST['search'] ) ? wp_unslash( sanitize_text_field( $_POST['search'] ) ) : '';
			$productsController->set_search( $search );
		}

		$products_count = $productsController->get_products_count();
		$productsController->set_offset( $offset );
		$products = $productsController->get_products();
		
		$products_data = array();

		$html = '';
		
		if ( false != $products ) {

			foreach( $products as $item ) {
				
				$product_data = $productsController->get_product_data( $item->product_id );

				if ( empty( $product_data ) ) {
					$qty 		= '0';
					$revenue 	= '0';
					$cogs 		= '0';
					$margin 	= '0';
				} else {
					$qty 		= $product_data[0]->qty;
					$revenue 	= $product_data[0]->total;
					$cogs 		= $product_data[0]->cogs;
					$margin 	= $product_data[0]->profit;
				}
				
				$link = admin_url() . 'admin.php?page=products&product_detail=' . $item->product_id;
				
				if ( $product_data[0]->profit > 0 ) {
					$percent 	= $product_data[0]->profit / ( $product_data[0]->total / 100 );
				} elseif ( $product_data[0]->profit == 0 ) {
					$percent = '0';
				} else { 
					if ( !empty( $product_data[0]->total ) ) {
						$minus = $product_data[0]->cogs - $product_data[0]->total;
						$percent 	= $minus / ( $product_data[0]->total / 100 ) * -1;
						$percent = $percent;
					} else {
						$percent = '0';
					}
				}
	
				$link_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>';
						
				$html .= '<div class="product-overwiev-item">';
					$html .= '<div class="product-overwiev-item-image">' . esc_html( $item->image ) . '</div>';
					$html .= '<div class="product-overwiev-item-sku">' . esc_html( $item->sku ) . '</div>';
					$html .= '<div class="product-overwiev-item-name">' . esc_html( $item->name ) . '</div>';
					$html .= '<div class="product-overwiev-item-type">' . esc_html( $item->type ) . '</div>';
					$html .= '<div class="product-overwiev-item-status">' . esc_html( $item->stock_status ) . '</div>';
					$html .= '<div class="product-overwiev-item-sales">' . esc_html( $qty ) . '</div>';
					$html .= '<div class="product-overwiev-item-price">' . wp_kses( wc_price( $item->price ), Helper::get_allowed_tags() ) . '</div>';
					$html .= '<div class="product-overwiev-item-revenue">' . esc_html( Helper::formated_price( $revenue ) ) . '</div>';
					$html .= '<div class="product-overwiev-item-cogs">' . esc_html( Helper::formated_price( $cogs ) ) . '</div>';
					$html .= '<div class="product-overwiev-item-margin">' . esc_html( Helper::formated_price( $margin ) ) . '</div>';
					$html .= '<div class="product-overwiev-item-percent"><span>' . esc_html( Helper::formated_price( $percent ) ) . '%</span></div>';
					$html .= '<div class="product-overwiev-item-detail"><a href="' . esc_url( $link ) . '">' . esc_html( $link_icon ) . '</a></div>';
				$html .= '</div>';
	
			}
				
			$pagination = new ProductsPaginationControler( $products_count, 'products', ( $offset + 1 ) );
			$pagination->set_query_string( $query_string );
			$pagination->set_limit( 20 );
	        $pagination->set_period_data( $period_data );
	        $response['products'] = 'load';
			$response['start'] = $productsController->start_date;
			$response['end'] = $productsController->end_date;
			$response['offset'] = $offset;
            $response['pagination'] = $pagination->render();
		} else {
            $html .= '<p>' . esc_html__( 'No more products found', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
            $response['products'] = 'empty';

        }
        
		$response['status'] = 'succes';
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
			
	}
}
