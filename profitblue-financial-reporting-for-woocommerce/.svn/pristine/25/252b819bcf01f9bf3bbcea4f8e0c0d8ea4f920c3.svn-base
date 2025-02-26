<?php

namespace ProfitBlue\Controllers;

use ProfitBlue\Controllers\OrdersController;

/**
 * OrderUpdateController
 */
class OrderExport {

	public $wpdb = null;
	public $ordersController = null;
	
	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {

		global $wpdb;
		$this->wpdb = $wpdb;

		$this->ordersController = new OrdersController();
	
	}

	/**
	 * Get orders
	 *
	 * @return array|false
	 */
	public function get_orders() {

		$this->ordersController->set_limit( 1000000 );
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( !empty( $_GET['period'] ) ) {
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
			$parts = explode( ' - ', $period );
			$start_date = $parts[0];
			$end_date = $parts[1];
		} else {
			$year = gmdate( 'Y' );
			$start_date = $year . '-01-01';
			$end_date = $year . '-12-31';
		}

		$orders = $this->ordersController->get_orders( $start_date, $end_date );

		if ( empty( $orders ) ) {
			return false;
		} else {
			return $orders;
		}

	}

	/**
	 * Get line
	 *
	 * @return array
	 */
	public function get_line( $item ) {

		$order = wc_get_order( $item->order_id );

		if ( !empty( $order ) ) {
		
			$order_items = $order->get_items();
			$order_shipping_items = $order->get_items( 'shipping' );
			$order_fee_items = $order->get_items( 'fee' );
			$items = $this->ordersController->get_order_items( $item->order_id );
			$pcs = $item->pcs;
			$cogs = $item->cogs;
			if ( empty( $cogs ) ) {
				$cogs = 0;
			}
			$percent = 0;
			$revenue = 0;
			
			if ( !empty( $order_items ) ) {
				foreach( $order_items as $order_item ) {
					if ( !empty( $items ) ) {
						foreach( $items as $o_item ) {

							if ( $o_item->order_item_id == $order_item->get_id() ) {

								$product_id = $order_item->get_variation_id();
								if ( empty( $product_id ) ) {
									$product_id = $order_item->get_product_id();
								}
								if ( empty( $o_item->sku ) ) {
									$ProductsController = new ProductsController();
									$ProductsController->set_product_id( $product_id );
									$product = $ProductsController->get_product();
									if ( empty( $product ) ) {
										$sku = '';
									} else {
										$sku = $product->sku;
									}
								} else {
									$sku = $o_item->sku;
								}
								

								$item_sum = (float)$o_item->item_total;
								if ( $item_sum > 0 ) {
									$item_subtotal = $item_sum;
									if ( empty( $o_item->item_cogs ) ) {
										$item_cogs = $item_subtotal;
									} else {
										$item_cogs = (float)$o_item->item_cogs;
									}
									$item_margin = $item_subtotal - $item_cogs;
									if ( 0 == $item_margin ) {
										$item_percent = '0';
									} else {
										$item_percent = $item_margin / ( $item_subtotal / 100 );
									}
								} else {
									$item_subtotal = 0;
									$item_cogs = 0;
									$item_margin = 0;
									$item_percent = 0;
								}

								$revenue = $revenue + $item_subtotal;
								
							}
						}
					}
				}
			}

			//Shipping items
			if ( !empty( $order_shipping_items ) ) {
				foreach( $order_shipping_items as $order_item ) {
					if ( !empty( $items ) ) {
						foreach( $items as $o_item ) {
							if ( $o_item->order_item_id == $order_item->get_id() ) {

								$item_sum = (float)$o_item->item_total;
								if ( $item_sum > 0 ) {
									$item_subtotal = $item_sum;
									$order_shipping_income = $this->ordersController->get_order_shipping_income( $item );
									if ( !empty( $order_shipping_income['shipping_cost'] ) ) {
										$item_cogs = $order_shipping_income['shipping_cost'];
									} else {
										$item_cogs = 0;
									}
									
									if ( !empty( $order_shipping_income['cod_id'] ) ) {
										$cod_id = $order_shipping_income['cod_id'];
									}
									if ( !empty( $order_shipping_income['cod_price'] ) ) {
										$cod_price = $order_shipping_income['cod_price'];
									}
									if ( '0' === $item_cogs || empty( $item_cogs ) ) {
										$item_cogs = '0';
									} else {
										$item_cogs = (float)$item_cogs;
									}
									$item_margin = $item_subtotal - $item_cogs;
									if ( 0 == $item_margin ) {
										$item_percent = '0';
									} else {
										$item_percent = $item_margin / ( $item_subtotal / 100 );
									}
								} else {

									$order_shipping_income = $this->ordersController->get_order_shipping_income( $item );
									$item_subtotal = 0;
									
									if ( !empty( $order_shipping_income['shipping_cost'] ) ) {
										$item_cogs = $order_shipping_income['shipping_cost'];
									} else {
										$item_cogs = 0;
									}
									
									$item_margin = 0 - $item_cogs;
									if ( $item_cogs > 0 ) {
										$item_percent = '-100';
									} else {
										$item_percent = '0';
									}

								}

								$revenue = $revenue + $item_subtotal;
								$cogs = $cogs + $item_cogs;									
							
							}
						}
					}
				}
			}

			$is_cod = false;
			if ( !empty( $cod_id ) && $item->order_payment_id == $cod_id ) {
				$is_cod = true;
			}

			//Fee items
			if ( !empty( $order_fee_items ) ) {
				foreach( $order_fee_items as $order_item ) {
					if ( !empty( $items ) ) {
						foreach( $items as $o_item ) {
							if ( $o_item->order_item_id == $order_item->get_id() ) {
									
								$item_sum = (float)$o_item->item_total;
								if ( $item_sum > 0 ) {
									
									$item_cogs = $this->ordersController->get_order_payment_income( $item );

									$item_subtotal = $item_sum;
									if ( 0 === $item_cogs ) {
										$item_cogs = 0;
									} elseif ( empty( $item_cogs ) ) {
										$item_cogs = $item_subtotal;
									} else {
										$item_cogs = (float)$item_cogs;
									}
									$item_margin = $item_subtotal - $item_cogs;
									if ( 0 == $item_margin ) {
										$item_percent = '0';
									} else {
										$item_percent = $item_margin / ( $item_subtotal / 100 );
									}
								} else {
									$item_subtotal = 0;
									$item_cogs = 0;
									$item_margin = 0;
									$item_percent = 0;
								}									

								$revenue = $revenue + $item_subtotal;
								$cogs = $cogs + $item_cogs;									
							
							}
						}
					}
				}
			}

			$margin = $revenue - $cogs;
			if ( 0 == $margin ) {
				$percent = '0';
			} else {
				if ( empty( $revenue ) ) {
					$percent = '0';
				} else {
					$percent = $margin / ( $revenue / 100 );
				}
			}
			
			

			$line = array();
			$line[] = $item->order_id;
			$line[] = gmdate( 'm/d/Y', $item->order_date );
			$line[] = $item->customer_name;
			$line[] = $item->order_status;
			$line[] = $item->country;
			$line[] = $item->pcs;
			$line[] = $revenue;
			$line[] = $cogs;
			$line[] = $margin;
			$line[] = $percent;

			return $line;
		} else {
			return false;
		}

	}

	/**
	 * Get first line of xlxs
	 *
	 * @return array
	 */
	public function get_first_line() {
		$first_line = array(
			'id',
			'date',
			'name',
			'order_status',
			'country',
			'pcs',
			'revenue',
			'cost',
			'order_profit',
			'percent'
		);
		return $first_line;
	}

	

}
