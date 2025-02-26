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
class AjaxInstall {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}
		
		$response = array();

		$step = isset( $_POST['step'] ) ? wp_unslash( sanitize_text_field( $_POST['step'] ) ) : '';

		switch ($step) {
			case 'instal-tables':
				$data = self::create_tables();
				update_option( 'profitblue_install_step', 'create-periods' );
				break;
			case 'create-periods':
				$data = self::create_periods();
				update_option( 'profitblue_install_step', 'create-cogs' );
				break;
			case 'create-cogs':
				$data = self::create_cogs();				
				break;
			case 'create-products':
				$data = self::create_products();
				break;
			case 'create-orders':
				$data = self::create_orders();
				break;
			
		}
		
		$response['html']   = $data['html'];
		$response['step']   = $data['step'];
		$response['status'] = $data['status'];
		echo wp_json_encode( $response );
		exit();
		
	}

	public static function create_tables() {

		CreateTables::create_cogs_tables();
		CreateTables::create_tables();
		$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Database tables was created, creating periods.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

		$data = array(
			'html' => $html,
			'status' => 'continue',
			'step' => 'create-periods'
		);

		return $data;

	}

	public static function create_periods() {

		CreatePeriods::create_periods();
		$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Periods data was created, creating COGS data.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

		$data = array(
			'html' => $html,
			'status' => 'continue',
			'step' => 'create-cogs'
		);

		return $data;

	}

	public static function create_cogs() {

		$productsController = new ProductsController();		
		$periodsController = new ProductsPeriodsController();
		$periods = $periodsController->get_periods();
		$products = $productsController->get_not_imported_products();				
		global $wpdb;

		if ( empty( $products ) ) {
			update_option( 'profitblue_cogs_tables_created', 'yes' );
			$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'COGS data was created. Creating products data.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			$data = array(
				'html' => $html,
				'status' => 'continue',
				'step' => 'create-products'
			);

			update_option( 'profitblue_install_step', 'create-products' );

		} else {
			
			foreach( $products as $item ) {
				$data = array();
				$ProductsController = new ProductsController();
				$ProductsController->set_product_id( $item->ID );
				//$product = $ProductsController->get_product();
				$product = wc_get_product( $item->ID  );
				if ( !empty( $product ) ) {
					$data['sku'] = $product->get_sku();
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

			$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Creating COGS data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $count_products_without_meta ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			$data = array(
				'html' => $html,
				'status' => 'continue',
				'step' => 'create-cogs'
			);
			update_option( 'profitblue_install_step', 'create-cogs' );					

		}

		return $data;

	}

	public static function create_products() {

		global $wpdb;
		$productController = new ProductsController();
		$response = array();
		$post_table_name = $wpdb->prefix . 'posts';
		$products_table_name = $wpdb->prefix . 'profitblue_products';
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT ap.ID 
				FROM %i ap
				LEFT JOIN %i app ON ap.ID = app.product_id
				WHERE (ap.post_type = 'product' OR ap.post_type = 'product_variation')
				AND app.product_id IS NULL LIMIT 10;",
				array(
					$post_table_name,
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

			$remains = $productController->get_not_exists_products();

			if ( $remains > 0 ) {

				$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Creating products data.', 'profitblue-financial-reporting-for-woocommerce' ) . ' ' . esc_html( $remains ) . ' ' . esc_html__( 'remains.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';

				$data = array(
					'html' => $html,
					'status' => 'continue',
					'step' => 'create-products'
				);

			} else {
				$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Products data was created, creating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
				$data = array(
					'html' => $html,
					'status' => 'continue',
					'step' => 'create-orders'
				);
			}

		} else {

			$html = '<h2 class="are-you-sure">' . esc_html__( 'Creating ProfitBlue data', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2><p class="are-you-sure">' . esc_html__( 'Products data was created, creating orders data.', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
			$data = array(
				'html' => $html,
				'status' => 'continue',
				'step' => 'create-orders'
			);
			
		}

		return $data;

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
