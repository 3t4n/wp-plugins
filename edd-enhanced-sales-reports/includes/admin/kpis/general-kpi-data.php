<?php
/**
 * Calculates KPIs for All Tabs excluding Subscriptions
 *
 * @package EDD_Enhanced_Sales_Reports
 * @version 1.0.0
 * */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

$lookup_table = $wpdb->prefix . 'enhanced_sales_report';

$query = '';

if ( isset( $_GET['filter_products'] ) && ! empty( $_GET['filter_products'] ) ) {
	$products    = map_deep( wp_unslash( $_GET['filter_products'] ), 'sanitize_text_field' );
	$product_ids = array();
	foreach ( $products as $product_id ) {
		$product_ids[] = intval( $product_id );
	}

	$query .= ' AND product_id IN (' . implode( ',', $product_ids ) . ')';
}

if ( isset( $_GET['filter_vendors'] ) && ! empty( $_GET['filter_vendors'] ) ) {
	$vendors    = map_deep( wp_unslash( $_GET['filter_vendors'] ), 'sanitize_text_field' );
	$vendor_ids = array();
	foreach ( $vendors as $vendor_id ) {
		$vendor_ids[] = intval( $vendor_id );
	}

	$query .= ' AND author_id IN (' . implode( ',', $vendor_ids ) . ')';
}
if ( isset( $_GET['filter_countries'] ) && ! empty( $_GET['filter_countries'] ) ) {
	$countries = map_deep( wp_unslash( $_GET['filter_countries'] ), 'sanitize_text_field' );
	foreach ( $countries as &$country ) {
		$country = "'" . esc_sql( $country ) . "'";
	}
	$query .= ' AND billing_country IN (' . implode( ',', $countries ) . ')';
}

if ( isset( $_GET['sale_type'] ) ) {
	if ( 'free' === $_GET['sale_type'] ) {
		$query .= ' AND product_amount=0';
	} elseif ( 'paid' === $_GET['sale_type'] ) {
		$query .= ' AND product_amount>0';
	}
}

if ( isset( $_GET['gateway'] ) && ! empty( $_GET['gateway'] ) && 'all' !== $_GET['gateway'] ) {
	$gateway_options = self::get_gateways_options();
	if ( array_key_exists( sanitize_text_field( wp_unslash( $_GET['gateway'] ) ), $gateway_options ) ) {
		$query .= " AND gateway='" . esc_sql( sanitize_text_field( wp_unslash( $_GET['gateway'] ) ) ) . "'";
	}
}

if ( isset( $_GET['tax'] ) && ! empty( $_GET['tax'] ) && 'all' !== $_GET['tax'] ) {
	$tax_options = array( 'with_tax', 'no_tax' );
	if ( in_array( $_GET['tax'], $tax_options ) ) {
		if ( 'with_tax' === $_GET['tax'] ) {
			$query .= ' AND tax>0';
		} else {
			$query .= ' AND tax=0';
		}
	}
}

if ( isset( $_GET['customer_id'] ) && ! empty( $_GET['customer_id'] ) ) {
	$query .= ' AND customer_id=' . intval( $_GET['customer_id'] );
}

if ( isset( $_GET['subscriptions'] ) && ! empty( $_GET['subscriptions'] ) && 'all' !== $_GET['subscriptions'] ) {
	$subscription_options = array( 'subscriptions', 'no_subscriptions' );
	if ( in_array( $_GET['subscriptions'], $subscription_options ) ) {
		if ( 'no_subscriptions' === $_GET['subscriptions'] ) {
			$query .= ' AND subscription_id=0';
		} else {
			$query .= ' AND subscription_id=1';
		}
	}
}

if ( isset( $GLOBALS['edd_sales_reports_limit_subscriptions'] ) ) {
	$query .= " AND order_id IN (SELECT DISTINCT subscription_id FROM {$wpdb->prefix}enhanced_sales_report WHERE subscription_id<>0)";
}

if ( isset( $_GET['customer_type'] ) && ! empty( $_GET['customer_type'] ) && 'both' !== $_GET['customer_type'] ) {
	if ( 'new' === $_GET['customer_type'] ) {
		$query .= ' AND is_existing_customer=0';
	} else {
		$query .= ' AND is_existing_customer=1';
	}
}

$total_sales = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT count(DISTINCT order_id)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_products_sold = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT SUM(product_quantity)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_paid_products_sold = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT SUM(product_quantity)
		FROM {$lookup_table} WHERE product_sub_total > 0 AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_countries = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT COUNT(DISTINCT billing_country)
		FROM {$lookup_table} WHERE billing_country <> '' AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_authors = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT COUNT(DISTINCT author_id)
		FROM {$lookup_table} WHERE author_id <> '' AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

if ( is_null( $total_products_sold ) ) {
	$total_products_sold = 0;
}

$total_earnings = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT SUM(product_sub_total + product_tax)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_discounts = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT SUM(product_discount)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_tax = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT SUM(product_tax)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_commissions = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT SUM(commission)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_paid_sales = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT count(DISTINCT order_id)
		FROM {$lookup_table} WHERE total > 0 AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_customers = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT COUNT( DISTINCT customer_id )
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$orders_with_discounts = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT COUNT( DISTINCT order_id )
		FROM {$lookup_table} WHERE discount > 0 AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_new_customers = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT COUNT( DISTINCT customer_id )
		FROM {$lookup_table} WHERE is_existing_customer=0 AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_existing_customers = $wpdb->get_var(
	$wpdb->prepare(
		"SELECT COUNT( DISTINCT customer_id )
		FROM {$lookup_table} WHERE is_existing_customer=1 AND order_date BETWEEN %s AND %s {$query}", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$average_products_per_order = 0;
if ( $total_sales > 0 ) {
	$average_products_per_order = number_format( $total_products_sold / $total_sales, 1 );
}

$average_products_per_author = 0;
if ( $total_authors > 0 ) {
	$average_products_per_author = number_format( $total_products_sold / $total_authors, 1 );
}

$average_paid_products_per_author = 0;
if ( $total_authors > 0 ) {
	$average_paid_products_per_author = number_format( $total_paid_products_sold / $total_authors, 1 );
}

$products_per_country = 0;
if ( $total_countries > 0 ) {
	$products_per_country = ( $total_products_sold / $total_countries );
}

$average_commission_per_product = 0;
if ( $total_commissions > 0 ) {
	$average_commission_per_product = ( $total_paid_products_sold / $total_commissions );
}

$average_order_amount  = 0;
$average_order_arpu    = 0;
$free_vs_paid          = '0% - 0%';
$average_profit        = 0;
$total_paid_percentage = '0%';

$total_profit = $total_earnings - $total_commissions - $total_discounts - $total_tax;

if ( $total_sales > 0 ) {
	$average_order_amount = $total_earnings / $total_sales;
	$free_vs_paid         = '100% - 0%';
}

if ( $total_paid_sales > 0 ) {
	$average_order_apu = $total_earnings / $total_paid_sales;
	$average_profit       = $total_profit / $total_paid_sales;
}

$total_net_earnings = $total_earnings - $total_discounts - $total_tax;

$products_aov = 0;
$orders_aov   = 0;

if ( $total_net_earnings > 0 ) {
	$products_aov = $total_net_earnings / $total_paid_products_sold;
	$orders_aov   = $total_net_earnings / $total_paid_sales;
}

if ( 'by-product-disabled' === $edd_enhanced_sales_reports_current_page || 'by-ordered-products-disabled' === $edd_enhanced_sales_reports_current_page ) {
	$aov_kpi = $products_aov;
} else {
	$aov_kpi = $orders_aov;
}

if ( $total_paid_sales > 0 ) {
	$free_vs_paid          = number_format( ( ( $total_sales - $total_paid_sales ) * 100 ) / $total_sales, 1 ) . '%';
	$free_vs_paid          .= ' - ' . number_format( 100 - ( ( $total_sales - $total_paid_sales ) * 100 ) / $total_sales, 1 ) . '%';
	$total_paid_percentage = number_format( 100 - ( ( $total_sales - $total_paid_sales ) * 100 ) / $total_sales, 1 ) . '%';
}

$free_vs_paid = str_replace( '.0', '', $free_vs_paid );
