<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Controllers\ProductsPaginationControler;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Blocks\ProductOverviewOrdersBlock;
use ProfitBlue\Blocks\MainGraphSelectBlock;


$productsController = new ProductsController();
$ordersController = new OrdersController();
$not_exists_products = $productsController->get_not_exists_products();

echo '<div class="page-notice">';
echo '</div>';

$orderby = 'ASC';
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['product_detail'] ) ) {

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$product_id = isset( $_GET['product_detail'] ) ? wp_unslash( sanitize_text_field( $_GET['product_detail'] ) ) : '';
	$current_url = admin_url() . 'admin.php?page=products&product_detail=' . $product_id;

	$get_current_year = gmdate( 'Y' );
	$get_last_year = gmdate( 'Y', strtotime( '-1 year', time() ) );

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['period'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$dates = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
		$parts = explode( ' - ', $dates );
		$start_date = $parts[0];
		$end_date = $parts[1];
	} else {
		$year = gmdate( 'Y' ); 
		$start_date = $year . '-01-01';
		$end_date = $year . '-12-31';
	}

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['mode'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
	} else {
		$mode = 'revenue';
	}

	$ly_start_day = gmdate( 'Y-m-d', strtotime( '-1 year', strtotime( $start_date ) ) );
	$ly_end_day = gmdate( 'Y-m-d', strtotime( '-1 year', strtotime( $end_date ) ) );	
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['mode'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$mode = isset( $_GET['mode'] ) ? wp_unslash( sanitize_text_field( $_GET['mode'] ) ) : '';
	} else {
		$mode = 'revenue';
	}

	$product_orders = $productsController->get_product_orders( $product_id );
	$product_orders_count = $productsController->get_product_orders_count( $product_id );

	if ( empty( $product_orders ) ) {
		echo '<div id="product-overwiev" class="product-overwiev" data-url="' . esc_url( $current_url ) . '">';
			echo '<h2>' . esc_html__( 'No data available for this period.', 'profitblue-financial-reporting-for-woocommerce' ) . '</h2>';
		echo '<div>';
		return;
	}

	/**
	 * Create orders ids string 
	 * 
	 */	
	$orders_by_date = $ordersController->get_orders_by_date_for_product( $product_id, $start_date, $end_date, $mode );

	$product_data = $productsController->get_product_data( $product_id );
	if ( false == $product_data ) {
		$revenue 	= '0';
		$cogs 		= '0';
		$margin 	= '0';
		$qty		= '0';
		$link 		= admin_url() . 'admin.php?page=products&product_detail=' . $product_id;
		$percent = '0';
		$avg_sale_per_pc = '0';
		$avg_cogs_per_pc = '0';
		$avg_smargin_per_pc = '0';
	} else {
		$revenue 	= $product_data[0]->total;
		$cogs 		= $product_data[0]->cogs;
		//$margin 	= $product_data[0]->profit;
		$margin 	= $revenue - $cogs;
		$qty		= $product_data[0]->qty;
		$link 		= admin_url() . 'admin.php?page=products&product_detail=' . $product_id;
		if ( $product_data[0]->profit > 0 ) {
			$percent 	= $product_data[0]->profit / ( $product_data[0]->total / 100 );
		} else { 
			$minus = $product_data[0]->cogs - $product_data[0]->total;
			$percent 	= $minus / ( $product_data[0]->total / 100 ) * -1;
			$percent = $percent;
		}
		$avg_sale_per_pc = $product_data[0]->total / $qty;
		$avg_cogs_per_pc = $product_data[0]->cogs / $qty;
		$avg_smargin_per_pc = $product_data[0]->profit / $qty;
	}

	
	$last_year_product_data = $productsController->get_last_year_product_data( $product_id, $ly_start_day, $ly_end_day );
	if ( false == $last_year_product_data ) {
		$last_year_revenue 			= '0';
		$last_year_cogs 			= '0';
		$last_year_margin 			= '0';
		$last_year_percent 			= '0';
		$last_year_qty 				= '0';
		$last_year_average_orders 	= '0';
		$last_year_net_profit 		= '0';
	} else {
		$last_year_revenue 			= $last_year_product_data[0]->total;
		$last_year_cogs 			= $last_year_product_data[0]->cogs;
		$last_year_margin 			= $last_year_product_data[0]->profit;
		if ( $last_year_product_data[0]->profit > 0 ) {
			$last_year_percent 		= $last_year_product_data[0]->profit / ( $last_year_product_data[0]->total / 100 );
		} else {
			$last_year_percent 		= '0';
		}
		$last_year_qty				= $last_year_product_data[0]->qty;		
		$last_year_average_orders 	= 1;
		$last_year_net_profit 		= 1;
	} 
	
	echo '<div id="product-overwiev" class="product-overwiev" data-url="' . esc_url( $current_url ) . '">';
		echo '<div id="overview-header" class="overview-header">';
			
		//Overwiev

			echo '<div class="overview-header-item">';
				echo '<div class="overview-header-item-content">';
					echo '<h3 class="overview-header-item-label">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
					echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $revenue ) ) . ',-<p>';
				echo '</div>';
			echo '</div>';

			echo '<div class="overview-header-item">';
				echo '<div class="overview-header-item-content">';
					echo '<h3 class="overview-header-item-label">' . esc_html__( 'Sold pcs', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
					echo '<p class="overview-header-item-value">' . esc_html( $qty ) . '<p>';
				echo '</div>';
			echo '</div>';

			echo '<div class="overview-header-item">';
				echo '<div class="overview-header-item-content">';
					echo '<h3 class="overview-header-item-label">' . esc_html__( 'COGS', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
					echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $cogs ) ) . ',-<p>';
				echo '</div>';
			echo '</div>';
			
			echo '<div class="overview-header-item">';
				echo '<div class="overview-header-item-content">';
					echo '<h3 class="overview-header-item-label">' . esc_html__( 'Gross profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
					echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $margin ) ) . ',-<p>';
				echo '</div>';
			echo '</div>';

			echo '<div class="overview-header-item">';
				echo '<div class="overview-header-item-content">';
					echo '<h3 class="overview-header-item-label">' . esc_html__( 'Gross margin (%)', 'profitblue-financial-reporting-for-woocommerce' ) . '</h3>';
					echo '<p class="overview-header-item-value">' . esc_html( Helper::formated_price( $percent ) ) . ' %<p>';
				echo '</div>';
			echo '</div>';
			
			echo '<div class="overview-header-item small-item"></div>';
			echo '<div class="overview-header-item small-item">';
				echo '<span>' . esc_html__( 'Avg. sale price per PC', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
				echo '<span>' . esc_html( Helper::formated_price( $avg_sale_per_pc ) ) . ',-</span>';
			echo '</div>';
			echo '<div class="overview-header-item small-item">';
				echo '<span>' . esc_html__( 'Avg. COGS per PC', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
				echo '<span>' . esc_html( Helper::formated_price( $avg_cogs_per_pc ) ) . '</span>';
			echo '</div>';

			echo '<div class="overview-header-item small-item">';
				echo '<span>' . esc_html__( 'Avg. Margin per PC', 'profitblue-financial-reporting-for-woocommerce' ) . '</span>';
				echo '<span>' . esc_html( Helper::formated_price( $avg_smargin_per_pc ) ) . '</span>';
			echo '</div>';
			echo '<div class="overview-header-item small-item"></div>';

		echo '</div>';
				
	if ( false != $orders_by_date ) {

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

			echo '<div id="overview-main-graph" class="overview-main-graph">';
				echo wp_kses( MainGraphSelectBlock::render_block( $mode ), Helper::get_allowed_tags() );
				echo '<div id="overview-main-graph-inner" class="overview-main-graph-inner" style="height:500px;"></div>';		
			echo '</div>';
			
	}
	echo '</div>';

	//Orders
	echo '<div id="overview-latest-orders" class="overview-latest-orders">';

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
			echo '<div class="orders-overwiev-header-cogs">' . esc_html__( 'Cost', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-margin">' . esc_html__( 'Order profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="orders-overwiev-header-percent">' . esc_html__( 'Order margin', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '</div>';

		//Latest product orders
		if ( !empty( $product_orders ) ) {
			
			echo wp_kses( ProductOverviewOrdersBlock::get_block( $product_orders, $ordersController ), Helper::get_allowed_tags() );
			if ( $product_orders_count > 0 ) {
				echo '<div id="order-pagination-container">';
					echo '<div class="products-pagination">';
						echo '<div class="pagination-more">';
							echo '<a class="btn product-orders" href="#" data-orders="' . esc_html( $product_orders_count ) . '" data-productid="' . esc_html( $product_id ) . '" data-start-date="' . esc_html( $start_date ) . '" data-end-date="' . esc_html( $end_date ) . '">' . esc_html__( 'Show more', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
			
		}		

	echo '</div>';

} else {

	//Product overwiev

	$current_url = admin_url() . 'admin.php?page=products';

	echo '<div class="products-filter">';
		echo '<div class="products-filter-search">';
			echo '<form method="get">';
				echo '<input type="text" name="product-search" class="product-search" id="product-search" placeholder="' . esc_html__( 'Search product, SKU,...', 'profitblue-financial-reporting-for-woocommerce' ) . '" />';
				echo '<input type="hidden" name="page" value="products" />';
				echo '<input type="submit" name="search" class="button button-primary product-search-button" value="' . esc_html__( 'Search', 'profitblue-financial-reporting-for-woocommerce' ) . '" />';
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['period'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$form_period = isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '';
				} else {
					$current_year = gmdate( 'Y' );
					$form_period = $current_year . '-01-01 - ' . $current_year . '-12-31';
				}
				echo '<input type="hidden" name="period" value="' . esc_html( $form_period ) . '" />';
			echo '</form>';
		echo '</div>';	
	echo '</div>';

	echo '<div id="product-overwiev" class="product-overwiev" data-url="' . esc_url( $current_url ) . '" data-notexists="' . esc_html( $not_exists_products ) . '">';

		echo '<div class="product-overwiev-header" id="product-overwiev-header">';
			echo '<div class="product-overwiev-header-image">' . esc_html__( 'Image', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-sku">' . esc_html__( 'Sku', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-name">' . esc_html__( 'Name', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-type">' . esc_html__( 'Type', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-status">' . esc_html__( 'Status', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-sales">' . esc_html__( 'Sales', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-price">' . esc_html__( 'Selling price', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-revenue">' . esc_html__( 'Revenue', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-cogs">' . esc_html__( 'COGS', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-margin">' . esc_html__( 'Gross profit', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-percent">' . esc_html__( 'Gross margin', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
			echo '<div class="product-overwiev-header-detail">' . esc_html__( 'Detail', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '</div>';

		$products = $productsController->get_products();
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
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				if ( !empty( $_GET['period'] ) ) {
					// phpcs:ignore WordPress.Security.NonceVerification.Recommended
					$link .= '&period=' . ( isset( $_GET['period'] ) ? wp_unslash( sanitize_text_field( $_GET['period'] ) ) : '' );
				} else {
					$year = gmdate( 'Y' ); 
					$start_date = $year . '-01-01';
					$end_date = $year . '-12-31';
					$link .= '&period=' . $start_date . ' - ' . $end_date;
				}
							
				if ( !empty( $product_data ) ) {
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
				} else {
					$percent = '0';
				}

				$link_icon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>';
				
				echo '<div class="product-overwiev-item">';
					echo '<div class="product-overwiev-item-image">' . wp_kses( $item->image, Helper::get_allowed_tags() ) . '</div>';
					echo '<div class="product-overwiev-item-sku">' . esc_html( $item->sku ) . '</div>';
					echo '<div class="product-overwiev-item-name">' . esc_html( $item->name ) . '</div>';
					echo '<div class="product-overwiev-item-type">' . esc_html( $item->type ) . '</div>';
					echo '<div class="product-overwiev-item-status">' . esc_html( $item->stock_status ) . '</div>';
					echo '<div class="product-overwiev-item-sales">' . esc_html( $qty ) . '</div>';
					echo '<div class="product-overwiev-item-price">' . wp_kses( wc_price( $item->price ), Helper::get_allowed_tags() ) . '</div>';
					echo '<div class="product-overwiev-item-revenue">' . wp_kses( Helper::formated_price( $revenue ), Helper::get_allowed_tags() ) . '</div>';
					echo '<div class="product-overwiev-item-cogs">' . wp_kses( Helper::formated_price( $cogs ), Helper::get_allowed_tags() ) . '</div>';
					echo '<div class="product-overwiev-item-margin">' . wp_kses( Helper::formated_price( $margin ), Helper::get_allowed_tags() ) . '</div>';
					echo '<div class="product-overwiev-item-percent"><span>' . wp_kses( Helper::formated_price( $percent ), Helper::get_allowed_tags() ) . '%</span></div>';
					echo '<div class="product-overwiev-item-detail"><a href="' . esc_url( $link ) . '">' . wp_kses( $link_icon, Helper::get_allowed_tags() ) . '</a></div>';
				echo '</div>';

			}
			
		}

	echo '</div>';
	echo '<div id="product-pagination-container">';
	if ( false != $products ) {
		$products_count = $productsController->get_products_count();
		$pagination = new ProductsPaginationControler( $products_count, 'products' );
		$pagination->set_limit( 20 );
		$period_data = $productsController->get_period_data();
		$pagination->set_period_data( $period_data );
		echo wp_kses( $pagination->render(), Helper::get_allowed_tags() );
	}
	echo '</div>';

}
