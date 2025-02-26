<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Blocks\ProductsPeriodsFilterBlock;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxCreateCogsProductsData {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();
		
		//Get period 
		$productsController = new ProductsController();		
		$periods = AjaxCreateCogsProductsData::get_periods();
		

		$products = $productsController->get_not_imported_products();
				
		global $wpdb;
		
		if ( empty( $products ) ) {
			update_option( 'profitblue_cogs_tables_created', 'yes' );
			$response['status'] = 'all';
			$response['redirect'] = admin_url() . 'admin.php?page=data-settings&subpage=costs-of-goods-sold';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'All data has been created.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			echo wp_json_encode( $response );
			exit();

		} else {
			
			foreach( $products as $item ) {
				$data = array();
				$ProductsController = new ProductsController();
				$ProductsController->set_product_id( $item->ID );
				$product = $ProductsController->get_product();										
				if ( !empty( $product ) ) {
					$data['sku'] = $product->sku;
				} else {
					$data['sku'] = '';
				}
				$data['product_id'] = $item->ID;
				$data['product_name'] = $item->post_title;
				$data['cogs'] = 0;


				foreach( $periods as $period ) {

					$data['period'] = $period->ID;
					if ( 'whole-period' == $period->type ) {
						$data['year'] = 'whole-period';
					} else {
						$data['year'] = $period->year;
					}
					
					$wpdb->insert( $wpdb->prefix . 'profitblue_cogs', $data );

				}	
				
				update_post_meta( $item->ID, 'cogs_imported', 'yes' );
				
			}

			$args_all = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'fields' => 'ids',
			);

			$query_all = new \WP_Query( $args_all );
			$count_all_products = $query_all->post_count;

			$args_meta_not_exists = array(
				'post_type' => 'product',
				'posts_per_page' => -1,
				'fields' => 'ids',
				'meta_query' => array(
					array(
						'key' => 'cogs_imported',
						'compare' => 'NOT EXISTS',
					),
				),
			);

			$query_meta_not_exists = new \WP_Query($args_meta_not_exists);
			$count_products_without_meta = $query_meta_not_exists->post_count;

			if ($count_all_products > 0) {
				$percentage_without_meta = ($count_products_without_meta / $count_all_products) * 100;
				$percent = 100 - $percentage_without_meta;
			} else {
				$percentage_without_meta = 0;
				$percent = 100;
			}

			$response['status'] = 'continue';
			$response['html'] = '<p class="modal-ajax-response">' . esc_html__( 'Creating COGS data for products.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $count_products_without_meta ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

			$response['html'] .= '<div class="cogs-batch-progress-bar">';
			$response['html'] .= '<div class="cogs-batch-progress-bar-percent" style="width:' . esc_html( $percent ) . '%;"></div>';
			$response['html'] .= '</div>';
			$response['count'] = $count_products_without_meta;
			$response['memory'] = memory_get_usage();
			
			echo wp_json_encode( $response );
			exit();

		}
		
	}

	public static function batch_html() {

		$html = '';
		$html .= '<p class="modal-ajax-response">' . esc_html__( 'Updating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $batch_result ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

		return $html;

	}

	public static function create_periods() {

		$periodsController = new ProductsPeriodsController();
		global $wpdb;
		$current_year = gmdate( 'Y' );
		$past_year = gmdate('Y') - 1;
		$periodsController->create_period( 'Whole e-shop period', 'whole-period', '' );
		$periodsController->create_period( $current_year, 'year', $current_year );
		$periodsController->create_period( $past_year, 'year', $past_year );

		update_option( 'profitblue_cogs_period_created', 'yes' );

		$periods = $periodsController->get_periods();

		return $periods;

	}

	public static function get_periods() {

		$periodsController = new ProductsPeriodsController();
		$periods = $periodsController->get_periods();

		return $periods;

	}


}
