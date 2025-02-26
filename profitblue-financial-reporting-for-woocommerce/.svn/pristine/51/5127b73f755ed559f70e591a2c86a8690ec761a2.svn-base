<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Helpers\Helper;
use ProfitBlue\Controllers\OverviewController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\OrdersPaginationControler;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Controllers\AdsController;
use ProfitBlue\Controllers\OverviewCcaiData;
use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Enums\FixedCostTypes;
use ProfitBlue\Enums\VariableCostTypes;
use ProfitBlue\Enums\ColorTints;
use ProfitBlue\Blocks\OverwievNetProfitBlock;
use ProfitBlue\Blocks\OverwievCustomCostBlock;
use ProfitBlue\Blocks\BatchUpdateBlock;
use ProfitBlue\Blocks\MainGraphSelectBlock;
use ProfitBlue\Models\OrderShippingModel;
use ProfitBlue\Models\OrderPaymentModel;

echo '<div class="page-notice" style="margin-bottom:30px;">';
echo '</div>';

// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['mode'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
} else {
	$mode = 'revenue';
}

$ordersController 	= new OrdersController();
$overview 			= new OverviewController();
$year 				= $overview->year; 
$start_date 		= $overview->start_date;
$end_date 			= $overview->end_date;
$mode 				= $overview->mode;
$current_url 		= admin_url() . 'admin.php?page=profitblue-financial-reporting-for-woocommerce';
$ads 				= new AdsController( $start_date, $end_date );
$ads_data 			= $ads->get_data_by_date();

$orderby = 'desc';
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['orderby'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$orderby = isset( $_GET['orderby'] ) ? wp_unslash( sanitize_text_field( $_GET['orderby'] ) ) : '';
}

$orders_count = $overview->get_orders_count();

$red_colors = ColorTints::getRed();
$blue_colors = ColorTints::getBlue();

$get_current_year = $year;
$get_last_year = $year - 1;

if ( $orders_count < 1 ) {
	echo '<div id="overview" class="overview" data-url="' . esc_url( $current_url ) . '">';
		echo '<h2>' . esc_html__( 'No data available for this period.', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2>';
	echo '<div>';
	return;
}

echo '<div id="overview" class="overview" data-url="' . esc_url( $current_url ) . '">';
	echo '<div id="overview-header" class="overview-header">';
		
	//Overwiev

		echo '<div class="overview-header-item overwiev-item overwiev-item-first">';
			echo '<div class="overview-header-item-content">';
				echo '<h3 class="overview-header-item-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $overview->get_revenue() ) ) . ',-<p>';
			echo '</div>';
			echo '<div class="overview-header-item-footer">';
				echo '<p class="overview-header-item-footer-value"><span>' . esc_html__( 'Long tern Avg.', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span>' . esc_html( Helper::formated_price( $overview->get_year_revenue() ) ) . '</span></p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="overview-header-item overwiev-item overwiev-item-first">';
			echo '<div class="overview-header-item-content">';
				echo '<h3 class="overview-header-item-label">' . esc_html__( 'No. of orders', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				echo '<p class="overview-header-item-value">' . esc_html( $orders_count ) . '<p>';
			echo '</div>';
			echo '<div class="overview-header-item-footer">';
				echo '<p class="overview-header-item-footer-value"><span>' . esc_html__( 'Long tern Avg.', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span>' . esc_html( $overview->get_average_orders() ) . '</span></p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="overview-header-item overwiev-item overwiev-item-first">';
			echo '<div class="overview-header-item-content">';
				echo '<h3 class="overview-header-item-label">' . esc_html__( 'COGS', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $overview->get_cogs() ) ) . ',-<p>';
			echo '</div>';
			echo '<div class="overview-header-item-footer">';
				echo '<p class="overview-header-item-footer-value"><span>' . esc_html__( 'Long tern Avg.', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span>' . esc_html( Helper::formated_price( $overview->get_year_cogs() ) ) . '</span></p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="overview-header-item overwiev-item overwiev-item-first">';
			echo '<div class="overview-header-item-content">';
				echo '<h3 class="overview-header-item-label">' . esc_html__( 'Gross profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $overview->get_margin() ) ) . ',-<p>';
			echo '</div>';
			echo '<div class="overview-header-item-footer">';
				echo '<p class="overview-header-item-footer-value"><span>' . esc_html__( 'Long tern Avg.', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span>' . esc_html( Helper::formated_price( $overview->get_year_margin() ) ) . ',-</span></p>';
			echo '</div>';
		echo '</div>';

		echo '<div class="overview-header-item overwiev-item overwiev-item-first">';
			echo '<div class="overview-header-item-content">';
				echo '<h3 class="overview-header-item-label">' . esc_html__( 'Net profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $overview->get_net_profit() ) ) . ',-<p>';
			echo '</div>';
			echo '<div class="overview-header-item-footer">';
				echo '<p class="overview-header-item-footer-value"><span>' . esc_html__( 'Long tern Avg.', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span>' . esc_html( Helper::formated_price( $overview->get_year_net_profit() ) ) . '</span></p>';
			echo '</div>';
		echo '</div>';
		
		if ( empty( $overview->get_revenue() ) ) {
			$number = '0';
		} else {
			$number = Helper::formated_price( $overview->revenue / $orders_count );
		}
		echo '<div class="overview-header-item small-item overwiev-item overwiev-item-second">';
			echo '<span>' . esc_html__( 'Avg. amount on order', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
			echo '<span>' . esc_html( $number ) .  '</span>';
		echo '</div>';
		
		if ( empty( $overview->orders_numbers_of_products() ) ) {
			$number = '0';
		} else {
			$number = Helper::formated_price( $overview->orders_numbers_of_products() / $orders_count );
		}
		echo '<div class="overview-header-item small-item overwiev-item overwiev-item-second">';
			echo '<span>' . esc_html__( 'Avg. items on order', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
			echo '<span>' . esc_html( $number ) . '</span>';
		echo '</div>';

		if ( empty( $overview->revenue ) ) {
			$number = '0';
		} else {
			$number = Helper::formated_price( $overview->revenue / $overview->orders_numbers_of_products() );
		}
		echo '<div class="overview-header-item small-item overwiev-item overwiev-item-second">';
			echo '<span>' . esc_html__( 'Avg. amount on item', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
			echo '<span>' . esc_html( $number ) . ',-</span>';
		echo '</div>';

		if ( empty( $overview->margin ) ) {
			$gross_ammount = '0';
		} else {
			$gross_ammount = Helper::formated_price( ( $overview->margin / ( $overview->get_revenue() / 100 ) ) );
		}
		echo '<div class="overview-header-item small-item overwiev-item overwiev-item-second">';
			echo '<span>' . esc_html__( 'Gross margin %', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
			echo '<span>' . esc_html( $gross_ammount ) . '%</span>';
		echo '</div>';

		$shipping_income = $overview->get_shipping_income();
		if ( empty( $shipping_income ) ) {
			$number = '0';
		} else {
			$number = Helper::formated_price( $shipping_income + $overview->get_payment_income() );
		}
		echo '<div class="overview-header-item small-item overwiev-item overwiev-item-second">';
			echo '<span>' . esc_html__( 'Shipping and fees', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
			echo '<span>' . esc_html( $number ) . '</span>';
		echo '</div>';

	echo '</div>';

	/**
	 * 
	 * 
	 */
	$orders_by_date = $ordersController->get_orders_by_date( $start_date, $end_date, $mode );
	
	if ( 'cogs' == $mode ) {
		$mainGraphActualYearLabel = 'COGS (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'COGS (' . $get_last_year . ')';
	} elseif (  'turnover' == $mode ) {
		$mainGraphActualYearLabel = 'Turnover (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'Turnover (' . $get_last_year . ')';
	} elseif (  'margin-amount' == $mode ) {
		$mainGraphActualYearLabel = 'Margin amount (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'Margin amount (' . $get_last_year . ')';
	} elseif (  'margin-percent' == $mode ) {
		$mainGraphActualYearLabel = 'Margin percent (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'Margin percent (' . $get_last_year . ')';
	} elseif (  'number-orders' == $mode ) {
		$mainGraphActualYearLabel = 'Number orders (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'Number orders (' . $get_last_year . ')';
	} elseif (  'net-profit' == $mode ) {
		$mainGraphActualYearLabel = 'Net profit (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'Net profit (' . $get_last_year . ')';		
	} else {
		$mainGraphActualYearLabel = 'Revenue (' . $get_current_year . ')';
		$mainGraphLastYearLabel = 'Revenue (' . $get_last_year . ')';
	}

	$orders_by_date = str_replace( "'", '"', $orders_by_date );
	if (substr($orders_by_date, -1) === ',') {
		$orders_by_date = substr($orders_by_date, 0, -1);
	}
	echo '<div id="mainGraphData" data-orders-by-date=\'' . esc_html( $orders_by_date ) . '\' data-actual-year="' . esc_html( $mainGraphActualYearLabel ) . '" data-last-year="' . esc_html( $mainGraphLastYearLabel ) . '"></div>';

	echo '<div id="overview-main-graph" class="overview-main-graph overwiev-item">';
		echo wp_kses( MainGraphSelectBlock::render_block( $mode ), Helper::get_allowed_tags() );
		echo '<div id="overview-main-graph-inner" class="overview-main-graph-inner" style="height:500px;"></div>';		
	echo '</div>';

	//Latest orders
	echo '<div id="overview-latest-orders" class="overview-latest-orders overwiev-item">';

		echo '<div class="orders-overwiev-header">';
			echo '<div class="orders-overwiev-header-id">' . esc_html__( 'ID', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-date"><span class="date-label">' . esc_html__( 'Date', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span class="date-order" data-order="' . esc_html( $orderby ) . '"></span></div>';
			echo '<div class="orders-overwiev-header-inner">';	
				echo '<div class="orders-overwiev-header-name">' . esc_html__( 'Name', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
				echo '<div class="orders-overwiev-header-status">' . esc_html__( 'Order status', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
				echo '<div class="orders-overwiev-header-country">' . esc_html__( 'Country', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '</div>';		
			echo '<div class="orders-overwiev-header-pcs">' . esc_html__( 'PCS', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-revenue">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-cogs">' . esc_html__( 'Costs', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-margin">' . esc_html__( 'Order profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-percent">' . esc_html__( 'Order margin', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '</div>';

		$ordersController->set_limit( 3 );

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
	
									$lines_html .= '<div class="orders-overwiev-item-details item-details-' . $order->get_id() . '">';															
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
		echo '<div class="overview-latest-orders-footer">';

			$orders_link = admin_url() . 'admin.php?page=orders';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( empty( $_GET['period'] ) ) {
				$this_year = gmdate( 'Y' );
				$period = $this_year . '-01-01+-+' . esc_html( $this_year ) . '-12-31';
			} else {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				$period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
				$period = str_replace( ' ', '+', $period );
			}
			$orders_link .= '&period=' . esc_html( $period );

			echo '<a href="' . esc_url( $orders_link ) . '">' . esc_html__( 'Show all orders', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
		echo '</div>';

	echo '</div>';

	//Net profit analysis
	echo '<div id="overview-analysis" class="overview-analysis">';

		//Render Net Profit/Loss block
		OverwievNetProfitBlock::render( $overview, $ordersController->all_data );
		
		//Render Custom Cost block
		OverwievCustomCostBlock::render( $overview, $overview->ccai );


	echo '</div>';

	//Ads cost analysis
	if ( empty( $ads_data['data'] ) ) {

		echo '<div id="overview-ads-analysis" class="overview-ads-analysis overwiev-item">';
			echo '<div class="overview-ads-analysis-header">';
				echo '<h3>' . esc_html__( 'Ad cost analysis', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
			echo '</div>';
			echo '<div class="overview-ads-analysis-content">';
				echo '<h3 style="width:100%;text-align:center;">' . esc_html__( 'No data for selected period', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
			echo '</div>';
		echo '</div>';
	} else {

		$result_array = array();
		$ads_total = 0;
		foreach( $ads_data['data'] as $id => $item ) {			
			foreach( $ads_data[$ads->display] as $iterator ) {
				if ( empty( $item['data'][$iterator] ) ) {
					$result_array[$iterator][] = 0;
				} else {
					$result_array[$iterator][] = $item['data'][$iterator]['amount'];
					$ads_total += $item['data'][$iterator]['amount'];
				}
			}
		}

		echo '<div id="overview-ads-analysis" class="overview-ads-analysis overwiev-item">';
			echo '<div class="overview-ads-analysis-header">';
				echo '<h3>' . esc_html__( 'Ad cost analysis', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
				echo '<div class="ads_total-container"><div class="ads_total"><span>' . esc_html__( 'Total ad cost', 'profitblue-financial-reporting-for-woocommerce' ) . '</span><span>' .  esc_html( $ads_total ) . '</span></div></div>';
			echo '</div>';
			echo '<div class="overview-ads-analysis-content">';
				echo '<div class="overview-ad-data" id="overview-ad-data">';
				echo '</div>';
			echo '</div>';
		echo '</div>';

		if ( 'days' == $ads->display ) {
			$label = esc_html__( 'Day', 'profitblue-financial-reporting-for-woocommerce' );		
		} elseif ( 'weeks' == $ads->display ) {
			$label = esc_html__( 'Week', 'profitblue-financial-reporting-for-woocommerce' );
		} elseif ( 'months' == $ads->display ) {
			$label = esc_html__( 'Month', 'profitblue-financial-reporting-for-woocommerce' );
		}

		
		$string_data_array = array();
		foreach( $result_array as $key => $prices ) {
			if ( empty( $key ) ) {
				continue;
			}			
			if ( 'days' == $ads->display ) {
				$key = gmdate( 'd.m.', strtotime( $key ) );
				$new_price_array = array();				
				foreach( $prices as $price ) {
					$new_price_array[] = $price . ",'" . $price . "'"; 
				}
				$string_data_array[] = '["'.$key.'",'.implode( ',', $new_price_array ).']';
			} else {
				$string_data_array[] = '["'.$key.'",'.implode( ',', $prices ).']';
			}
		}
		$string = implode( ',', $string_data_array );
		
		if ( !empty( $ads_data['days'] )  && 1 == count( $ads_data['days'] ) ) {
			$i = 1;
			$data_array = array();
			foreach( $ads_data['data'] as $id => $item ) { 
				$data_array[] = '["' . $item['name'] . ' ' . $i . '", ' . $item['data'][$item['start_date']]['amount'] . ']';											
				$i++;
			}
			$data_string  = implode( ',', $data_array );
			?>
			<div id="drawAdsChart" data-ads-data='<?php echo esc_html( $data_string ); ?>' data-type="days" data-label="<?php echo esc_html( $label ); ?>" data-string='<?php echo esc_html( $data_string ); ?>'></div>			
			<?php
		} else {
			$data_array = array();
			foreach( $ads_data['data'] as $id => $item ) {
				$data_array[] = $item['name'];					
			}
			$data_string  = implode( ',', $data_array );
			?>
			<div id="drawAdsChart" data-ads-data='<?php echo esc_html( $data_string ); ?>' data-type="other" data-label="<?php echo  esc_html( $label ); ?>" data-string='<?php echo esc_html( $data_string ); ?>'></div>			
			<?php
		}
	}
	//Products sold analysis
	echo '<div id="overview-product-sold-analysis" class="overview-product-sold-analysis overwiev-item">';
		echo '<div class="overview-product-sold-analysis-header">';
			echo '<h3>' . esc_html__( 'Product sold analysis', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
		echo '</div>';
		echo '<div class="overview-product-sold-analysis-content">';
			echo '<ul class="product-sold-menu">';
				echo '<li class="products-overwiev-tab active-item" data-tab="overview-product-carousel-bestsellers">' . esc_html__( 'Best sellers', 'profitblue-financial-reporting-for-woocommerce' ) . '</li>';
				echo '<li class="products-overwiev-tab" data-tab="overview-product-carousel-most">' . esc_html__( 'Most profitable', 'profitblue-financial-reporting-for-woocommerce' ) . '</li>';
				echo '<li class="products-overwiev-tab" data-tab="overview-product-carousel-least">' . esc_html__( 'Least profitable', 'profitblue-financial-reporting-for-woocommerce' ) . '</li>';
			echo '</ul>';
			echo '<div class="overview-product-carousel-wrap" id="overview-product-carousel-wrap">';
				
				echo '<div class="products-overwiev-tab-target overview-product-carousel-bestsellers active-tab" id="overview-product-carousel-bestsellers">';
						echo '<div style="width:100%;overflow:hidden;">';
							$best_sellers = $overview->get_bestsellers();
							if ( !empty( $best_sellers ) ) {
								echo '<div class="splide splide-main" id="splide-main">';
									echo '<div class="splide__track">';
										echo '<ul class="sluzby-carousel splide__list">';
										foreach( $best_sellers as $product_item ) {
											echo '<li class="splide__slide">';
												echo '<div class="overview-product-item">';
													echo '<div class="overview-product-item-header">';
													echo get_the_post_thumbnail( $product_item->product_id );
														echo '<h3>' . esc_html( get_the_title( $product_item->product_id ) ) . '</h3>';
													echo '</div>';
													if ( 0 == $product_item->total ) {
														$percent = 0;
														$margin = 0;
													} else {
														$margin = Helper::formated_price( $product_item->total - $product_item->cogs );
														$percent = Helper::formated_price( (float)($product_item->total - $product_item->cogs) / ( (float)$product_item->total / 100 ) );
													}
													echo '<div class="overview-product-item-content">';
														echo '<p>' . esc_html__( 'Sales:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $product_item->qty ) . '</span></p>';
														echo '<p>' . esc_html__( 'Revenue:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_item->total ) ) . ',-</span></p>';
														echo '<p>' . esc_html__( 'COGS:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_item->cogs ) ) . '</span></p>';
														echo '<p>' . esc_html__( 'Gross profit:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $margin ) . '</span></p>';
														
														echo '<p>' . esc_html__( 'Gross margin (%):', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $percent ) . '%</span></p>';
													echo '</div>';
												echo '</div>';
											echo '</li>';
										}
										echo '</ul>';
									echo '</div>';
								echo '</div>';
							}
															
						echo '</div>';
					echo '</div>';
					
					echo '<div class="products-overwiev-tab-target overview-product-carousel-most" id="overview-product-carousel-most">';
						echo '<div style="width:100%;overflow:hidden;">';
							$mostprofitable = $overview->get_most_profitable();
							if ( !empty( $mostprofitable ) ) {
								echo '<div class="splide-most splide" id="splide-most">';
									echo '<div class="splide__track">';
										echo '<ul class="sluzby-carousel splide__list">';
										foreach( $mostprofitable as $product_item ) {
											echo '<li class="splide__slide">';
												echo '<div class="overview-product-item">';
													echo '<div class="overview-product-item-header">';
													echo get_the_post_thumbnail( $product_item->product_id );
														echo '<h3>' . esc_html( get_the_title( $product_item->product_id ) ) . '</h3>';
													echo '</div>';
													if ( 0 == $product_item->total ) {
														$percent = 0;
														$margin = 0;
													} else {
														$margin = Helper::formated_price( $product_item->total - $product_item->cogs );
														$percent = Helper::formated_price( (float)($product_item->total - $product_item->cogs) / ( (float)$product_item->total / 100 ) );
													}
													echo '<div class="overview-product-item-content">';
														echo '<p>' . esc_html__( 'Sales:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $product_item->qty ) . '</span></p>';
														echo '<p>' . esc_html__( 'Revenue:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_item->total ) ) . ',-</span></p>';
														echo '<p>' . esc_html__( 'COGS:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_item->cogs ) ) . '</span></p>';
														echo '<p>' . esc_html__( 'Gross profit:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $margin ) . '</span></p>';
														echo '<p>' . esc_html__( 'Gross margin (%):', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $percent ) . '%</span></p>';
													echo '</div>';
												echo '</div>';
											echo '</li>';
										}
										echo '</ul>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
					
					echo '<div class="products-overwiev-tab-target overview-product-carousel-least" id="overview-product-carousel-least">';
						echo '<div style="width:100%;overflow:hidden;">';
							$laestprofitable = $overview->get_least_profitable();
							if ( !empty( $laestprofitable ) ) {
								echo '<div class="splide-least splide" id="splide-least">';
									echo '<div class="splide__track">';
										echo '<ul class="sluzby-carousel splide__list">';
										foreach( $laestprofitable as $product_item ) {
											echo '<li class="splide__slide">';
												echo '<div class="overview-product-item">';
													echo '<div class="overview-product-item-header">';
													echo get_the_post_thumbnail( $product_item->product_id );
														echo '<h3>' . esc_html( get_the_title( $product_item->product_id ) ) . '</h3>';
													echo '</div>';
													if ( 0 == $product_item->total ) {
														$percent = 0;
														$margin = 0;
													} else {
														$margin = Helper::formated_price( $product_item->total - $product_item->cogs );
														$percent = Helper::formated_price( (float)($product_item->total - $product_item->cogs) / ( (float)$product_item->total / 100 ) );
													}
													echo '<div class="overview-product-item-content">';
														echo '<p>' . esc_html__( 'Sales:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $product_item->qty ) . '</span></p>';
														echo '<p>' . esc_html__( 'Revenue:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html(  Helper::formated_price( $product_item->total ) ) . ',-</span></p>';
														echo '<p>' . esc_html__( 'COGS:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( Helper::formated_price( $product_item->cogs ) ) . '</span></p>';
														echo '<p>' . esc_html__( 'Gross profit:', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $margin ) . '</span></p>';
														echo '<p>' . esc_html__( 'Gross margin (%):', 'profitblue-financial-reporting-for-woocommerce' ) . ' <span>' . esc_html( $percent ) . '%</span></p>';
													echo '</div>';
												echo '</div>';
											echo '</li>';
										}
										echo '</ul>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				
				echo '</div>';
		echo '</div>';
		echo '<div class="product-overwiev-footer">';
			echo '<a class="btn primary" href="' . esc_url( admin_url() ) . '/admin.php?page=products">' . esc_html__( 'Show all products', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
		echo '</div>';
	echo '</div>';

	//Category analysis
	$taxonomy = 'product_cat'; // WooCommerce category taxonomy
	$args = array(
		'taxonomy' => $taxonomy,
		'hide_empty' => false, // Show categories even if they have no products
	);

	$categories = get_terms($args);	

	echo '<div id="overview-category-sold-analysis" class="overview-category-sold-analysis overwiev-item">';
		echo '<div class="overview-category-sold-analysis-header">';
			echo '<h3>' . esc_html__( 'Category analysis', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
		echo '</div>';
		echo '<div class="overview-category-sold-analysis-content">';

			echo '<div class="overview-category-container">';
				
				echo '<div class="overview-category-item">';
					echo '<div class="overview-category-item-select">';
						echo esc_html__( 'Select category', 'profitblue-financial-reporting-for-woocommerce' );
						echo '<div class="category-select-dropdown">';
						if ( !empty( $categories ) ) {
							echo '<select class="category-select" data-id="1" data-start="' . esc_html( $start_date ) . '" data-end="' . esc_html( $end_date ) . '">';
							foreach ( $categories as $category ) {
								echo '<option class="category-select-dropdown-item" value="' . esc_html( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
							}
							echo '</select>';
						}
						echo '</div>';
					echo '</div>';
					echo '<div class="overview-category-item-inner" id="overview-category-item-1"></div>';
				echo '</div>';

				echo '<div class="overview-category-item">';
					echo '<div class="overview-category-item-select">';
						echo esc_html__( 'Select category', 'profitblue-financial-reporting-for-woocommerce' );
						echo '<div class="category-select-dropdown">';
						if ( !empty( $categories ) ) {
							echo '<select class="category-select" data-id="2" data-start="' . esc_html( $start_date ) . '" data-end="' . esc_html( $end_date ) . '">';
							foreach ( $categories as $category ) {
								echo '<option class="category-select-dropdown-item" value="' . esc_html( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
							}
							echo '</select>';
						}
						echo '</div>';
					echo '</div>';
					echo '<div class="overview-category-item-inner" id="overview-category-item-2"></div>';
				echo '</div>';

				echo '<div class="overview-category-item">';
					echo '<div class="overview-category-item-select">';
						echo esc_html__( 'Select category', 'profitblue-financial-reporting-for-woocommerce' );
						echo '<div class="category-select-dropdown">';
						if ( !empty( $categories ) ) {
							echo '<select class="category-select" data-id="3" data-start="' . esc_html( $start_date ) . '" data-end="' . esc_html( $end_date ) . '">';
							foreach ( $categories as $category ) {
								echo '<option class="category-select-dropdown-item" value="' . esc_html( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
							}
							echo '</select>';
						}
						echo '</div>';
					echo '</div>';
					echo '<div class="overview-category-item-inner" id="overview-category-item-3"></div>';
				echo '</div>';

				echo '<div class="overview-category-item">';
					echo '<div class="overview-category-item-select">';
						echo esc_html__( 'Select category', 'profitblue-financial-reporting-for-woocommerce' );
						echo '<div class="category-select-dropdown">';
						if ( !empty( $categories ) ) {
							echo '<select class="category-select" data-id="4" data-start="' . esc_html( $start_date ) . '" data-end="' . esc_html( $end_date ) . '">';
							foreach ( $categories as $category ) {
								echo '<option class="category-select-dropdown-item" value="' . esc_html( $category->term_id ) . '">' . esc_html( $category->name ) . '</option>';
							}
							echo '</select>';
						}
						echo '</div>';
					echo '</div>';
					echo '<div class="overview-category-item-inner" id="overview-category-item-4"></div>';
				echo '</div>';
			
			
			
			echo '</div>';

		echo '</div>';
	echo '</div>';

echo '</div>';


/*
if ( false != $orders ) {
	$pagination = new OrdersPaginationControler( $orders );
	echo $pagination->render();
}
*/
