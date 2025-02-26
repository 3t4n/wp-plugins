<?php

namespace ProfitBlue\Controllers;

use ProfitBlue\Controllers\OrdersController;

/**
 * OrderUpdateController
 */
class OrderUpdateController {
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;
	
	}

	/**
	 * set_batch
	 *
	 * @param  array $products_ids
	 * @return void
	 */
	public function set_batch( $products_ids ) {

		global $wpdb;
		$result = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT order_id FROM %i",
				array(
					$wpdb->prefix . 'profitblue_orders'
				)
			)
		);		
		if ( !empty( $result ) ) {
			update_option( 'profitblue_batch', $result );
		}

	}

	/**
	 * set_specific_batch
	 *
	 * @param  array $products_ids
	 * @return void
	 */
	public function set_specific_batch( $products_orders ) {
		
		update_option( 'profitblue_batch', $products_orders );		

	}

	/**
	 * Update single order
	 *
	 * @param  int $order_id
	 * @return void
	 */
	public function update_single_order( $order_id = false ) {

		$orderController = new OrdersController();

		if ( false !== $order_id ) {

			$orderController->calculate_order_data( $order_id );

		}

	}
	
	/**
	 * Update order
	 *
	 * @param  int $order_id
	 * @return string|false
	 */
	public function update_order( $order_id = false ) {

		$orderController = new OrdersController();

		if ( false !== $order_id ) {

			$orderController->calculate_order_data( $order_id );

		} else {

			$batch = get_option( 'profitblue_batch' );
			if ( !empty( $batch ) ) {

				$i = 1;
				foreach( $batch as $key => $item ) {
					
					unset( $batch[$key] );
					$order_id = $item->order_id;
					
					$orderController->calculate_order_data( $order_id );

					if ( $i > 10 ){
						update_option( 'profitblue_batch', $batch );				
						return count( $batch );
					}

					$i++;

				}

				if ( $i < 11 ) {
					update_option( 'profitblue_batch', $batch );
					return 0;
				}

			} else {

				return 0;

			}
						
		}

		return false;

	}

	/**
	 * Proccess batch
	 *
	 * @return string|false
	 */
	public function proccess_batch() {

		$orderController = new OrdersController();

		$batch = get_option( 'profitblue_batch' );
		
		if ( !empty( $batch ) ) {

			$i = 1;
			foreach( $batch as $key => $item ) {

				$order_id = $item->order_id;
				
				$orderController->calculate_order_data( $item->order_id );

				unset( $batch[$key] );
				
				if ( $i > 30 ){
					update_option( 'profitblue_batch', $batch );
					return count( $batch );
				}
				
				$i++;

			}

			if ( $i <= 31 ) {
				delete_option( 'profitblue_batch' );
				return 'all';
			}

		} else {

			return 'all';

		}

		return false;

	}

}
