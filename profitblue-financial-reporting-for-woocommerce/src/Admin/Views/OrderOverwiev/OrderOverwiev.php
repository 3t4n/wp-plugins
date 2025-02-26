<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OrdersPaginationControler;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;

echo '<div class="page-notice">';
echo '</div>';

$ordersController = new OrdersController();

$current_url = admin_url() . 'admin.php?page=orders';
$current_url_form = admin_url() . 'admin.php?page=orders';
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['period'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
	$period = str_replace( ' ', '+', $period );
	$current_url .= '&period=' . $period;
}
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['order-search'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$value = isset( $_GET['order-search'] ) ? wp_unslash( sanitize_text_field( $_GET['order-search'] ) ) : '';
} else {
	$value = "";
}
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['sortby'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$sortby = isset( $_GET['sortby'] ) ? wp_unslash( sanitize_text_field( $_GET['sortby'] ) ) : '';
} else {
	$sortby = 'date';
}

if ( 'date' == $sortby ) {

	$date_orderby = '<span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=date&sort=asc" class="date-order"></a>';
	$pcs_orderby = '<span class="pcs-label">' . esc_html__( 'PCS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=pcs&sort=asc" class="pcs-order"></a>';
	$revenue_orderby = '<span class="revenue-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=revenue&sort=asc" class="revenue-order"></a>';

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['sort'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$order_value = isset( $_GET['sort'] ) ? wp_unslash( sanitize_text_field( $_GET['sort'] ) ) : '';
		if ( 'asc' == $order_value ) {
			$order_value = 'desc';
		} elseif ( 'desc' == $order_value ) {
			$order_value = 'asc';
		}
		$date_orderby = '<span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=date&sort=' . $order_value . '" class="date-order order-up"></a>';
	}

} elseif ( 'pcs' == $sortby ) {

	$date_orderby = '<span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=date&sort=asc" class="date-order"></a>';
	$pcs_orderby = '<span class="pcs-label">' . esc_html__( 'PCS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=pcs&sort=asc" class="pcs-order"></a>';
	$revenue_orderby = '<span class="revenue-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=revenue&sort=asc" class="revenue-order"></a>';

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['sort'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$order_value = isset( $_GET['sort'] ) ? wp_unslash( sanitize_text_field( $_GET['sort'] ) ) : '';
		if ( 'asc' == $order_value ) {
			$order_value = 'desc';
		} elseif ( 'desc' == $order_value ) {
			$order_value = 'asc';
		}
		$pcs_orderby = '<span class="pcs-label">' . esc_html__( 'PCS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=pcs&sort=' . $order_value . '" class="pcs-order order-up"></a>';
	}

} elseif ( 'revenue' == $sortby ) {

	$date_orderby = '<span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=date&sort=asc" class="date-order"></a>';
	$pcs_orderby = '<span class="pcs-label">' . esc_html__( 'PCS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=pcs&sort=asc" class="pcs-order"></a>';
	$revenue_orderby = '<span class="revenue-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=revenue&sort=asc" class="revenue-order"></a>';

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['sort'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$order_value = isset( $_GET['sort'] ) ? wp_unslash( sanitize_text_field( $_GET['sort'] ) ) : '';
		if ( 'asc' == $order_value ) {
			$order_value = 'desc';
		} elseif ( 'desc' == $order_value ) {
			$order_value = 'asc';
		}
		$revenue_orderby = '<span class="revenue-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=revenue&sort=' . esc_html( $order_value ) . '" class="revenue-order order-up"></a>';
	}

} else {

	$date_orderby = '<span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=date&sort=asc" class="date-order"></a>';
	$pcs_orderby = '<span class="pcs-label">' . esc_html__( 'PCS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=pcs&sort=asc" class="pcs-order"></a>';
	$revenue_orderby = '<span class="revenue-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=revenue&sort=asc" class="revenue-order"></a>';

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['sort'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$order_value = isset( $_GET['sort'] ) ? wp_unslash( sanitize_text_field( $_GET['sort'] ) ) : '';
		if ( 'asc' == $order_value ) {
			$order_value = 'desc';
		} elseif ( 'desc' == $order_value ) {
			$order_value = 'asc';
		}
		$date_orderby = '<span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><a href="' . esc_url( $current_url ) . '&sortby=date&sort=' . esc_html( $order_value ) . '" class="date-order order-up"></a>';
	}

}

echo '<div class="order-filter-search">';	
		
			echo '<form method="get" action="' . esc_url( $current_url_form ) . '" id="order-search-form" class="products-filter">';
				echo '<input type="text" name="order-search" class="order-search" id="order-search" placeholder="' . esc_html__( 'Search by name, order id,...', 'profitblue-financial-reporting-for-woocommerce' ) . '" />';
				echo '<input type="hidden" name="page" value="orders" />';
				echo '<input type="submit" name="search" class="button button-primary order-search-button" value="' . esc_html__( 'Search', 'profitblue-financial-reporting-for-woocommerce' ) . '" />';
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['period'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					echo '<input type="hidden" name="period" value="' . esc_attr( wp_unslash( sanitize_text_field( $_GET['period'] ) ) ) . '" />';
				}
			echo '</form>';
		
	
echo '</div>';

echo '<div id="orders-overwiev" class="orders-overwiev" data-url="' . esc_html( $current_url ) . '">';

	echo '<div class="orders-overwiev-header" id="orders-overwiev-header">';
		echo '<div class="orders-overwiev-header-id">' . esc_html__( 'ID', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="orders-overwiev-header-date">' . wp_kses( $date_orderby, Helper::get_allowed_tags() ) . '</div>';
		echo '<div class="orders-overwiev-header-inner">';	
			echo '<div class="orders-overwiev-header-name">' . esc_html__( 'Name', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-status">' . esc_html__( 'Order status', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-country">' . esc_html__( 'Country', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '</div>';		
		echo '<div class="orders-overwiev-header-pcs">' . wp_kses( $pcs_orderby, Helper::get_allowed_tags() ) . '</div>';
		echo '<div class="orders-overwiev-header-revenue">' .wp_kses( $revenue_orderby, Helper::get_allowed_tags() ) . '</div>';
		echo '<div class="orders-overwiev-header-cogs">' . esc_html__( 'Costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="orders-overwiev-header-margin">' . esc_html__( 'Order profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="orders-overwiev-header-percent">' . esc_html__( 'Order margin', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
	echo '</div>';

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['period'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$dates = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		$parts = explode( ' - ', $dates );
		$start_date = $parts[0];
		$end_date = $parts[1];
		$orders = $ordersController->get_orders( $start_date, $end_date );
	} else {
		$orders = $ordersController->get_orders();
	}
	
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
			if ( empty( $cogs ) ) {
				$cogs = 0;
			}
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

										$order_shipping_income = $ordersController->get_order_shipping_income( $item );
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
			
			echo '<div class="orders-overwiev-item">';
				echo '<div class="orders-overwiev-icon" data-id="' . esc_html( $order->get_id() ) . '"></div>';
				echo '<div class="orders-overwiev-item-id">' . esc_html( $order->get_id() ) . '</div>';
				echo '<div class="orders-overwiev-item-date">' . esc_html( gmdate( 'm/d/Y H:i:s', $item->order_date ) ) . '</div>';
				echo '<div class="orders-overwiev-item-inner">';					
					echo '<div class="orders-overwiev-item-name">' . esc_html( $order->get_formatted_billing_full_name() ) . '</div>';
					echo '<div class="orders-overwiev-item-status">' . esc_html( wc_get_order_status_name( $order->get_status() ) ) . '</div>';
					echo '<div class="orders-overwiev-item-country">' . esc_html( $order->get_billing_country() ) . '</div>';
				echo '</div>';				
				echo '<div class="orders-overwiev-item-pcs">' . esc_html( $pcs ) . '</div>';
				echo '<div class="orders-overwiev-item-revenue">' . esc_html( Helper::formated_price( $revenue ) ) . '</div>';
				echo '<div class="orders-overwiev-item-cogs">' . esc_html( Helper::formated_price( $cogs ) ) . '</div>';
				echo '<div class="orders-overwiev-item-margin">' . esc_html( Helper::formated_price( $margin ) ) . '</div>';
				echo '<div class="orders-overwiev-item-percent"><span>' . esc_html( Helper::formated_price( $percent ) ) . '%</span></div>';
			echo '</div>';

			echo wp_kses( $lines_html, Helper::get_allowed_tags() );
			
		}
		
	}

echo '</div>';

echo '<div id="order-pagination-container">';
if ( false != $orders ) {
	$pagination = new OrdersPaginationControler( $ordersController->count );
	echo wp_kses( $pagination->render(), Helper::get_allowed_tags() );
}
echo '</div>';

