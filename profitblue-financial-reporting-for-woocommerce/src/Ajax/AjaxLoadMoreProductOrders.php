<?php

namespace ProfitBlue\Ajax;

use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OrdersPaginationControler;
use ProfitBlue\Helpers\Helper;

/**
 * Class Settings
 *
 * @package  Deps\Settings
 * @property Plugin $plugin
 */
class AjaxLoadMoreProductOrders {

	public static function handle() {

		if ( ! isset( $_POST['nonce'] ) || ! wp_verify_nonce( wp_unslash( sanitize_text_field( $_POST['nonce'] ) ), 'profitblue_ajax_nonce' ) ) {
			wp_send_json_error( 'Invalid nonce' );
			wp_die();
		}

        global $wpdb;

		$ordersController = new OrdersController();
		
		$response = array();
		if ( !empty( $_POST['count'] ) ) {
			$offset = wp_unslash( sanitize_text_field( $_POST['count'] ) );
		}
		if ( !empty( $_POST['items'] ) ) {
			$itemsNumber = wp_unslash( sanitize_text_field( $_POST['items'] ) );
		}
		if ( !empty( $_POST['productid'] ) ) {
			$product_id = wp_unslash( sanitize_text_field( $_POST['productid'] ) );
		}
		if ( !empty( $_POST['startdate'] ) ) {
			$startdate = strtotime( wp_unslash( sanitize_text_field( $_POST['startdate'] ) ) );
		}
		if ( !empty( $_POST['enddate'] ) ) {
			$enddate = strtotime( wp_unslash( sanitize_text_field( $_POST['enddate'] ) ) );
		}		

		$html = '';
		
		global $wpdb;
		$orders_table_name = $wpdb->prefix . 'profitblue_orders';
		$order_items_table_name = $wpdb->prefix . 'profitblue_order_items';

		if ( false != $startdate && false != $enddate ) {
			$orders = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d AND orders.order_date BETWEEN %s AND %s LIMIT %d OFFSET %d",
					array(
						$orders_table_name,
						$order_items_table_name,
						$product_id,
						$startdate,
						$enddate,
						30,
						$itemsNumber
					) 
				)
			);
		} else {
			$orders = $wpdb->get_results(
				$wpdb->prepare( 
					"SELECT orders.*
					FROM %i AS orders
					JOIN %i AS order_items ON orders.order_id = order_items.order_id
					WHERE order_items.product_id = %d LIMIT %d OFFSET %d",
					array(
						$orders_table_name,
						$order_items_table_name,
						$product_id,
						30,
						$itemsNumber
					) 
				)
			);
		}	

		if ( !empty( $orders ) ) {
			
			foreach( $orders as $item ) {

				$revenue = $item->order_subtotal;
				$pcs = $item->pcs;
				$order = wc_get_order( $item->order_id );
				$order_items = $order->get_items();
				$items = $ordersController->get_order_items( $item->order_id );
				$cogs = 0;
				$percent = 0;
				if ( !empty( $items ) ) {
					foreach( $items as $item ) {
						$cogs += (float)$item->item_cogs;
					}
				}
				$margin = $revenue - $cogs;
				if ( 0 == $margin || 0 == $revenue ) {
					$percent = '0';
				} else {
					$percent = $margin / ( $revenue / 100 );
				}
								
				$html .= '<div class="orders-overwiev-item">';
					$html .= '<div class="orders-overwiev-icon" data-id="' . esc_html( $order->get_id()) . '"></div>';
					$html .= '<div class="orders-overwiev-item-id">' .esc_html( $order->get_id()) . '</div>';
					$html .= '<div class="orders-overwiev-item-date">' . esc_html(wc_format_datetime( $order->get_date_created()), 'm/d/Y H:i' ) . '</div>';
					$html .= '<div class="orders-overwiev-item-inner">';					
						$html .= '<div class="orders-overwiev-item-name">' . esc_html($order->get_formatted_billing_full_name()) . '</div>';
						$html .= '<div class="orders-overwiev-item-status">' . esc_html(wc_get_order_status_name( $order->get_status() )) . '</div>';
						$html .= '<div class="orders-overwiev-item-country">' . esc_html($order->get_billing_country()) . '</div>';
					$html .= '</div>';				
					$html .= '<div class="orders-overwiev-item-pcs">' . esc_html($pcs) . '</div>';
					$html .= '<div class="orders-overwiev-item-revenue">' . esc_html(Helper::formated_price( $revenue )) . '</div>';
					$html .= '<div class="orders-overwiev-item-cogs">' . esc_html(Helper::formated_price( $cogs )) . '</div>';
					$html .= '<div class="orders-overwiev-item-margin">' . esc_html(Helper::formated_price( $margin )) . '</div>';
					$html .= '<div class="orders-overwiev-item-percent"><span>' . esc_html( Helper::formated_price( $percent )) . '%</span></div>';
				$html .= '</div>';
				
				if ( !empty( $order_items ) ) {
					foreach( $order_items as $order_item ) {
						if ( !empty( $items ) ) {
							foreach( $items as $o_item ) {

								if ( $o_item->order_item_id == $order_item->get_id() ) {

									$html .= '<div class="orders-overwiev-item-details item-details-' . esc_html( $order->get_id() ) . '">';															
										$product_id = $order_item->get_variation_id();
										if ( empty( $product_id ) ) {
											$product_id = $order_item->get_product_id();
										}

										$item_subtotal = (float)$o_item->item_total;
										if ( empty( $o_item->item_cogs ) ) {
											$item_cogs = $item_subtotal;
										} else {
											$item_cogs = (float)$o_item->item_cogs;
										}
										$item_margin = $item_subtotal - $item_cogs;
										if ( 0 == $item_margin || 0 == $item_subtotal ) {
											$item_percent = '0';
										} else {
											$item_percent = $item_margin / ( $item_subtotal / 100 );
										}

										$html .= '<div class="orders-overwiev-item-details-id">' . esc_html( $product_id ) . '</div>';
										$html .= '<div class="orders-overwiev-item-details-empty"></div>';
										$html .= '<div class="orders-overwiev-item-details-name">' . esc_html( $o_item->item_name ) . '</div>';
										$html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( $o_item->item_qty ) . '</div>';
										$html .= '<div class="orders-overwiev-item-details-qty">' . esc_html( Helper::formated_price( $item_subtotal ) ) . '</div>';
										$html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_cogs ) ) . '</div>';
										$html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_margin ) ) . '</div>';
										$html .= '<div class="orders-overwiev-item-details-COGS">' . esc_html( Helper::formated_price( $item_percent ) ) . '%</div>';
									$html .= '</div>';
								
								}
							}
						}
					}
				}
				

			}
			if ( ( $itemsNumber + 30 ) > $offset ) {
				$response['orders'] = 'empty';
			} else {
				$response['orders'] = 'load';
			}
			
		} else {
				$html .= '<p>' . esc_html__( 'No more orders found', 'profitblue-financial-reporting-for-woocommerce' ) . '</p>';
            $response['orders'] = 'empty';

        }
        
		$response['status'] = 'succes';		
		$response['count'] = $offset;
		$response['itemsNumber'] = $itemsNumber + 30;
		$response['html'] = $html;
		echo wp_json_encode( $response );
		exit();
			
	}
}
