<?php
namespace ProfitBlue\Admin\DataSetting;

use ProfitBlue\Controllers\ProductsController;
use ProfitBlue\Controllers\ProductsPaginationControler;
use ProfitBlue\Controllers\OrderUpdateController;
use ProfitBlue\Controllers\ProductsPeriodsController;
use ProfitBlue\Controllers\OrdersController;
use ProfitBlue\Admin\AdminPage;
use ProfitBlue\Helpers\Helper;
use ProfitBlue\Blocks\BatchUpdateBlock;

echo '<div class="page-notice">';
echo '</div>';

global $wpdb;
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['product-search'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$value = wp_unslash( sanitize_text_field( $_GET['product-search'] ) );
} else {
	$value = "";
}
echo '<div class="products-filter">';
	echo '<div class="products-filter-search">';	
		echo '<form method="get" action="" id="cogs-search-form">';
			echo '<button type="button">';
				echo '<svg class="cogs-search" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>';
			echo '</button>';
			echo '<input type="text" name="product-search" class="product-search" id="product-search" value="' . esc_html( $value ) . '" placeholder="' . esc_html__( 'Search product, SKU,...', 'profitblue-financial-reporting-for-woocommerce' ) . '" />';
			echo '<input type="hidden" name="page" value="data-settings" />';
			echo '<input type="hidden" name="subpage" value="costs-of-goods-sold" />';
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['period'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				echo '<input type="hidden" name="period" value="' . esc_html( wp_unslash( sanitize_text_field( $_GET['period'] ) ) ) . '" />';
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['date_start'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				echo '<input type="hidden" name="date_start" value="' . esc_html( wp_unslash( sanitize_text_field( $_GET['date_start'] ) ) ) . '" />';
			}
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( !empty( $_GET['date_end'] ) ) {
				// phpcs:ignore WordPress.Security.NonceVerification.Recommended
				echo '<input type="hidden" name="date_end" value="' . esc_html( wp_unslash( sanitize_text_field( $_GET['date_end'] ) ) ) . '" />';
			}
		echo '</form>';
	echo '</div>';
	$current_url = esc_url( admin_url() ) . '/admin.php?page=data-settings&subpage=costs-of-goods-sold';
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['period'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$current_url .=	'&period=' . wp_unslash( sanitize_text_field( $_GET['period'] ) );
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['date_start'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$current_url .=	'&date_start=' . wp_unslash( sanitize_text_field( $_GET['date_start'] ) );
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['date_end'] ) ) {
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$current_url .=	'&date_end=' . wp_unslash( sanitize_text_field( $_GET['date_end'] ) );
	}
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['show'] ) && 'cogs' == $_GET['show'] ) {
		echo '<div class="products-filter-show"><span class="product-show-check active" data-url="' . esc_url( $current_url ) . '"></span><span class="product-show-label">' . esc_html__( 'Show only missing COGS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span></div>';
	} else {
		echo '<div class="products-filter-show"><span class="product-show-check" data-url="' . esc_url( $current_url ) . '"></span><span class="product-show-label">' . esc_html__( 'Show only missing COGS', 'profitblue-financial-reporting-for-woocommerce' ) . '</span></div>';
	}
	
echo '</div>';

$productsController = new ProductsController();

echo '<div id="products-list" class="product-list">';

	echo '<div class="product-lists-header" id="product-lists-header">';
		echo '<div class="product-lists-header-image">' . esc_html__( 'Image', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="product-lists-header-sku">' . esc_html__( 'Sku', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="product-lists-header-name">' . esc_html__( 'Name', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="product-lists-header-price">' . esc_html__( 'Selling price', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
		echo '<div class="product-lists-header-cogs">' . esc_html__( 'Cost Of Goods Sold (COGS)', 'profitblue-financial-reporting-for-woocommerce' ) . '</div>';
	echo '</div>';

	$woocommerce_price_num_decimals = Helper::get_price_field_step( get_option( 'woocommerce_price_num_decimals' ) );
	$period_data = $productsController->get_period_data();


	$productsController->get_not_saved_products();

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( !empty( $_GET['show'] ) && 'cogs' == $_GET['show'] ) {
		$products = $productsController->get_products_cogs_data( $period_data, 'cogs' );
	} else {
		$products = $productsController->get_products_cogs_data( $period_data );
	}
	if ( false != $products ) {
		
		foreach( $products as $key => $item ) {

			if ( 'query' == $key ) {
				continue;
			}
			
			echo '<div class="product-lists-item">';
				echo '<div class="product-lists-item-image">' . wp_kses( $item['image'], Helper::get_allowed_tags() ) . '</div>';
				echo '<div class="product-lists-item-sku">' . esc_html( $item['sku'] ) . '</div>';
				echo '<div class="product-lists-item-name">' . esc_html( $item['name'] ) . '</div>';
				echo '<div class="product-lists-item-price">' . wp_kses( $item['price'], Helper::get_allowed_tags() ) . '</div>';
				if ( !empty( $item['cogs'] ) ) {
					echo '<div class="product-lists-item-cogs"><input type="number" min="0" step="' . esc_html( $woocommerce_price_num_decimals ) . '" class="item-cogs" id="item-cogs-' . esc_html( $item['id'] ) . '" value="' . esc_html( $item['cogs'] ) . '" data-product="' . esc_html( $item['id'] ) . '" /></div>';
				} else {
					echo '<div class="product-lists-item-cogs"><input type="number" min="0" step="' . esc_html( $woocommerce_price_num_decimals ) . '" class="item-cogs no-cogs" id="item-cogs-' . esc_html( $item['id'] ) . '" data-product="' . esc_html( $item['id'] ) . '" /></div>';
				}
			echo '</div>';

		}
		
	}

echo '</div>';
echo '<div id="product-pagination-container">';
if ( !empty( $products['query'] ) ) {
	$pagination = new ProductsPaginationControler( $products['query'], 'cogs' );
	$pagination->set_limit( 20 );
	$pagination->set_period_data( $period_data );
	echo wp_kses( $pagination->render(), Helper::get_allowed_tags() );
}
echo '</div>';
$data_attribute = '';

// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['period'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$period = wp_unslash( sanitize_text_field( $_GET['period'] ) );
	$data_attribute .= ' data-period="' . esc_attr( $period ) . '"';
} else {
	$data_attribute .= ' data-period="whole-period"';
}
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['date_start'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$date_start = wp_unslash( sanitize_text_field( $_GET['date_start'] ) );
	$data_attribute .= ' data-start="' . esc_attr( $date_start ) . '"';
}
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['date_end'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$date_end = wp_unslash( sanitize_text_field( $_GET['date_end'] ) );
	$data_attribute .= ' data-end="' . esc_attr( $date_end ) . '"';
}
// phpcs:ignore WordPress.Security.NonceVerification.Recommended
if ( !empty( $_GET['offset'] ) ) {
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$offset = wp_unslash( sanitize_text_field( $_GET['offset'] ) );
	$data_attribute .= ' data-offset="' . esc_attr( $offset ) . '"';
}

echo '<div class="page-save-button">';
	echo '<a href="#" class="btn save-cogs-form" ' . esc_attr( $data_attribute ) . '>' . esc_html__( 'SAVE', 'profitblue-financial-reporting-for-woocommerce' ) . '</a>';
echo '</div>';
