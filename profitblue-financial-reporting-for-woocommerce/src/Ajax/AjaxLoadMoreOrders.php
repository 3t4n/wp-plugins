<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OrdersPaginationControler;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Helpers\Helper;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxLoadMoreOrders {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}

        global $wpdb;

		$ordersController = new OrdersController();
		
		$response = array();
		
        $offset = !empty( $_POST['offset'] ) ? wp_unslash( sanitize_text_field( $_POST['offset'] ) ) : false;
		$start = !empty( $_POST['start'] ) ? wp_unslash( sanitize_text_field( $_POST['start'] ) ) : false;
		$end = !empty( $_POST['end'] ) ? wp_unslash( sanitize_text_field( $_POST['end'] ) ) : false;
		$urlstring = !empty( $_POST['urlstring'] ) ? wp_unslash( sanitize_text_field( $_POST['urlstring'] ) ) : false;

		$html = '';
		
		$orders = $ordersController->get_ajax_orders( $offset, $urlstring, $start, $end );

		if ( !empty( $orders ) ) {
			
			foreach( $orders as $item ) {

				$order = wc_get_order( $item->order_id );

			if ( empty( $order ) ) {
				continue;
			}

			$order_items = $order->get_items();
			$order_shipping_items = $order->get_items( 'shipping' );
			$order_fee_items = $order->get_items( 'fee' );
			$items = $ordersController->get_order_items( $item->order_id );
			$pcs = $item->pcs;
			$cogs = $item->cogs;
			$percent = 0;
			$revenue = 0;
			
			$lines_html = '';
			if ( !empty( $order_items ) ) {
				foreach( $order_items as $order_item ) {
					if ( !empty( $items ) ) {
						foreach( $items as $o_item ) {

							if ( $o_item->order_item_id == $order_item->get_id() ) {

								$lines_html .= '<div class="orders-overwiev-item-details item-details-' . esc_html( $order->get_id() ) . '">';															
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
									
									$lines_html .= '<div class="orders-overwiev-item-details-id">' . esc_html( $sku ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-empty"></div>';
									$lines_html .= '<div class="orders-overwiev-item-details-name">' . esc_html( $o_item->item_name ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( $o_item->item_qty ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( Helper::formated_price( $item_subtotal ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_cogs ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_margin ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_percent ) ) . '%</div>';
								$lines_html .= '</div>';
							
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

								$lines_html .= '<div class="orders-overwiev-item-details item-details-' . esc_html( $order->get_id() ) . '">';															
									$item_sum = (float)$o_item->item_total;
									if ( $item_sum > 0 ) {
										$item_subtotal = $item_sum;
										$order_shipping_income = $ordersController->get_order_shipping_income( $item );
										
										$item_cogs = $order_shipping_income['shipping_cost'];
										
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
										$item_subtotal = 0;
										$item_cogs = 0;
										$item_margin = 0;
										$item_percent = 0;
									}

									$revenue = $revenue + $item_subtotal;
									$cogs = $cogs + $item_cogs;

									$lines_html .= '<div class="orders-overwiev-item-details-id"></div>';
									$lines_html .= '<div class="orders-overwiev-item-details-empty"></div>';
									$lines_html .= '<div class="orders-overwiev-item-details-name">' . esc_html( $o_item->item_name ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( $o_item->item_qty ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( Helper::formated_price( $item_subtotal ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_cogs ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_margin ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_percent ) ) . '%</div>';
								$lines_html .= '</div>';
							
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

								$lines_html .= '<div class="orders-overwiev-item-details item-details-' . esc_html( $order->get_id() ) . '">';															
									
									$item_sum = (float)$o_item->item_total;
									if ( $item_sum > 0 ) {
										
										$item_cogs = $ordersController->get_order_payment_income( $item );

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

									$lines_html .= '<div class="orders-overwiev-item-details-id"></div>';
									$lines_html .= '<div class="orders-overwiev-item-details-empty"></div>';
									$lines_html .= '<div class="orders-overwiev-item-details-name">' . esc_html( $o_item->item_name ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( $o_item->item_qty ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( Helper::formated_price( $item_subtotal ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_cogs ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_margin ) ) . '</div>';
									$lines_html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_percent ) ) . '%</div>';
								$lines_html .= '</div>';
							
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
			
			$html .= '<div class="orders-overwiev-item">';
				$html .= '<div class="orders-overwiev-icon" data-id="' . esc_html( $order->get_id() ) . '"></div>';
				$html .= '<div class="orders-overwiev-item-id">' . esc_html( $order->get_id() ) . '</div>';
				$html .= '<div class="orders-overwiev-item-date">' . esc_html( wc_format_datetime( $order->get_date_created(), 'm/d/Y H:i' ) ) . '</div>';
				$html .= '<div class="orders-overwiev-item-inner">';					
					$html .= '<div class="orders-overwiev-item-name">' . esc_html( $order->get_formatted_billing_full_name() ) . '</div>';
					$html .= '<div class="orders-overwiev-item-status">' . esc_html( wc_get_order_status_name( $order->get_status() ) ) . '</div>';
					$html .= '<div class="orders-overwiev-item-country">' . esc_html( $order->get_billing_country() ) . '</div>';
				$html .= '</div>';				
				$html .= '<div class="orders-overwiev-item-pcs">' . esc_html( $pcs ) . '</div>';
				$html .= '<div class="orders-overwiev-item-revenue">' . esc_html( Helper::formated_price( $revenue ) ) . '</div>';
				$html .= '<div class="orders-overwiev-item-cogs">' . esc_html( Helper::formated_price( $cogs ) ) . '</div>';
				$html .= '<div class="orders-overwiev-item-margin">' . esc_html( Helper::formated_price( $margin ) ) . '</div>';
				$html .= '<div class="orders-overwiev-item-percent"><span>' . esc_html( Helper::formated_price( $percent ) ) . '%</span></div>';
			$html .= '</div>';
			
			$html .= $lines_html;
				

			}

			$pagination = new OrdersPaginationControler( $ordersController->count, ( $offset + 1 ) );
			$pagination->set_limit( 20 );
	        $pagination->set_start( $start );
			$pagination->set_end( $end );
			$pagination->set_urlstring( $urlstring );
	        $response['orders'] = 'load';
            $response['pagination'] = $pagination->render();
			
		} else {
				$html .= '<p>' . esc_html__( 'No more orders found', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
            $response['orders'] = 'empty';

        }
        
		$response['status'] = 'succes';
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
			
	}
}
