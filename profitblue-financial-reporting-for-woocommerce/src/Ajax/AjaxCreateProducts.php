<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsController;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxCreateProducts {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		global $wpdb;
		$productController = new ProductsController();
		$response = array();

		$posts_table_name = $wpdb->prefix . 'posts';
		$products_table_name = $wpdb->prefix . 'profitblue_products';

		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT ap.ID 
				FROM %i ap
				LEFT JOIN %i app ON ap.ID = app.product_id
				WHERE (ap.post_type = 'product' OR ap.post_type = 'product_variation')
				AND app.product_id IS NULL LIMIT 10;",
				array(
					$posts_table_name,
					$products_table_name
				)
			)
		);
		$response['results'] = $result;

		if ( !empty( $result ) ) {
			foreach( $result as $item ) {
				$data = array();

				$product = wc_get_product( $item->ID );
				if ( empty( $product ) ) {
					continue;
				}

				if ( !empty( $product->get_id() ) ) {
					$data['product_id'] = $product->get_id();
				}
				if ( !empty( $product->get_name() ) ) {
					$data['name'] = $product->get_name();
				}
				if ( !empty( $product->get_type() ) ) {
					$data['type'] = $product->get_type();
				}
				if ( !empty( $product->get_stock_status() ) ) {
					$data['stock_status'] = $product->get_stock_status();
				}
				if ( !empty( $product->get_stock_quantity() ) ) {
					$data['stock_quantity'] = $product->get_stock_quantity();
				}
				if ( !empty( $product->get_sku() ) ) {
					$data['sku'] = $product->get_sku();
				}
				if ( !empty( $product->get_image( 'thumbnail' ) ) ) {
					$data['image'] = $product->get_image( 'thumbnail' );
				}
				if ( !empty( $product->get_price() ) ) {
					$data['price'] = $product->get_price();
				}

				if ( !empty( $data ) ) {
					$table_name = $wpdb->prefix . 'profitblue_products';
					//$sql = $wpdb->prepare( "SELECT * FROM " . $wpdb->prefix . "profitblue_products WHERE product_id='%d'", array( $product->get_id() ) );
					$result = $wpdb->get_results(
						$wpdb->prepare(
							"SELECT * FROM %i WHERE product_id=%d",
							array(
								$table_name,
								$product->get_id()
							)
						)
					);
					if ( empty( $result ) ) {
						$insert = $wpdb->insert( $wpdb->prefix . 'profitblue_products', $data );
					} else {
						$wpdb->update( $wpdb->prefix . 'profitblue_products', $data, array( 'product_id' => $product->get_id() ) );
					}
				}
			}
		}

		$remains = $productController->get_not_exists_products();

		if ( $remains > 0 ) {
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Creating non-existent product data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . $remains . ' ' . esc_html__( 'remaining.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			$response['remains'] = $remains;
		} else {
			$response['remains'] = 'empty';			
		}
		
		
		echo wp_json_encode( $response );
		exit();
		
	}

}
