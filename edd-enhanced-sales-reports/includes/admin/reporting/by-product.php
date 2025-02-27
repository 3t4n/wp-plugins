<?php
/**
 * Report By Product
 *
 * @package     EDD_Enhanced_Sales_Reports\ByProduct
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;
require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/filtering-fields.php';

$reports_data = EDD_Enhanced_Sales_Reports_Admin::get_report_data( $start_date, $end_date );

$report_array    = array();
$vendor_ids      = array();
$product_ids_map = array();
$customer_ids    = array();
$countries       = array();
$order_ids       = array();
$paid_orders     = array();

foreach ( $reports_data as $report_row ) {
	if ( ! isset( $report_array[ $report_row->product_id ] ) ) {
		$report_array[ $report_row->product_id ] = array(
			'total_amount' => 0,
			'vendor'       => $report_row->author_id,
			'countries'    => array(),
			'sales'        => array(),
			'customers'    => array(),
			'product_name' => edd_enhanced_sales_reports_strip_product_option( $report_row->product_name ),
			'tax'          => 0,
			'discount'     => 0,
			'commissions'  => 0,
			'profit'       => 0,
			'arpu'         => 0,
			'quantity'     => 0,
			'order_ids'    => array(),
			'paid_orders'  => array(),
		);
	}

	$report_array[ $report_row->product_id ]['total_amount'] += $report_row->product_sub_total + $report_row->product_tax;
	$report_array[ $report_row->product_id ]['tax']          += $report_row->product_tax;
	$report_array[ $report_row->product_id ]['discount']     += $report_row->product_discount;
	$report_array[ $report_row->product_id ]['commissions']  += $report_row->commission;
	$report_array[ $report_row->product_id ]['sales'][]      = array(
		'order_id'  => $report_row->order_id,
		'order_row' => $report_row,
	);

	if ( 0 < $report_row->total ) {
		$report_array[ $report_row->product_id ]['paid_orders'][ $report_row->order_id ] = $report_row->order_id;
		$paid_orders[ $report_row->order_id ]                                             = $report_row->order_id;
	}

	$report_array[ $report_row->product_id ]['quantity']    += $report_row->product_quantity;
	$report_array[ $report_row->product_id ]['order_ids'][] = $report_row->order_id;

	$report_array[ $report_row->product_id ]['customers'][] = $report_row->customer_id;
	$report_array[ $report_row->product_id ]['countries'][] = $report_row->billing_country;

	$vendor_ids[]                             = $report_row->author_id;
	$customer_ids[ $report_row->customer_id ] = intval( $report_row->customer_id );
	$order_ids[ $report_row->order_id ]       = $report_row->order_id;

	if ( ! empty( $report_row->billing_country ) ) {
		$countries[ $report_row->billing_country ] = $report_row->billing_country;
	}
}

// get names of all users in vendor_ids.
$vendors_mapping   = EDD_Enhanced_Sales_Reports_Admin::get_vendor_names( array_unique( $vendor_ids ) );
$product_ids_map   = EDD_Enhanced_Sales_Reports_Admin::get_product_names( array_keys( $report_array ) );
$total_quantity    = 0;
$total_sales       = 0;
$total_customers   = 0;
$total_amount      = 0;
$total_tax         = 0;
$total_discount    = 0;
$total_commissions = 0;
$total_earnings    = 0;
$total_arpu        = 0;

$customer_ids    = array_unique( $customer_ids );
$customers_query = array();
if ( ! empty( $customer_ids ) ) {
	// Sanitization of $customer_ids is already done via typecasting to integers.
	$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore
}

$customers_ids_map = array();
foreach ( $customers_query as $customer ) {
	$customers_ids_map[ $customer->id ] = $customer;
}

$totals_row = array(
	'orders'         => 0,
	'customers'      => count( $customer_ids ),
	'countries'      => count( $countries ),
	'paid_orders'    => count( $paid_orders ),
	'gross_earnings' => 0,
	'discount'       => 0,
	'tax'            => 0,
	'net_earnings'   => 0,
	'commissions'    => 0,
	'profit'         => 0,
	'aov'            => 0,
);
$all_rows   = array();
foreach ( $report_array as $product_id => $report_row ) :
	// check if range filter is set.
	if ( isset( $GLOBALS['edd_enhanced_sales_reports_earnings_range'] ) ) {
		if ( $report_row['total_amount'] < $GLOBALS['edd_enhanced_sales_reports_earnings_range'][0] || $report_row['total_amount'] > $GLOBALS['edd_enhanced_sales_reports_earnings_range'][1] ) {
			continue;
		}
	}

	$countries    = array_unique( $report_row['countries'] );
	$customers    = array_unique( $report_row['customers'] );
	$product_name = $report_row['product_name'];
	$total_orders = count( array_unique( $report_row['order_ids'] ) );

	if ( isset( $product_ids_map[ $product_id ] ) ) {
		$product_name = $product_ids_map[ $product_id ];
	}

	$total_sales         += $total_orders;
	$total_amount        += $report_row['total_amount'];
	$total_tax           += $report_row['tax'];
	$total_discount      += $report_row['discount'];
	$total_commissions   += $report_row['commissions'];
	$total_earnings      += $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'] - $report_row['commissions'];
	$total_quantity      += $report_row['quantity'];
	$net_earnings        = $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'];
	$average_order_value = 0;

	if ( $net_earnings > 0 ) {
		$average_order_value = $net_earnings / $report_row['quantity'];
	}

	$total_arpu += $average_order_value;

	if ( isset( $vendors_mapping[ $report_row['vendor'] ] ) ) {
		$report_row['vendor_name'] = $vendors_mapping[ $report_row['vendor'] ];
	} else {
		$report_row['vendor_name'] = esc_html__( '(Unknown)', 'edd-enhanced-sales-reports' );
	}

	$all_rows[ $product_id ] = $report_row;

	$sale_rows = array();
	foreach ( $report_row['sales'] as &$sale ) {
		$sale['customer_name'] = isset( $customers_ids_map[ $sale['order_row']->customer_id ] ) ? $customers_ids_map[ $sale['order_row']->customer_id ]->name : __( '(Unknown)', 'edd-enhanced-sales-reports' );
	}
endforeach;

$totals_row['orders']         = count( $order_ids );
$totals_row['gross_earnings'] = $total_amount;
$totals_row['total_quantity'] = $total_quantity;
$totals_row['discount']       = $total_discount;
$totals_row['tax']            = $total_tax;
$totals_row['net_earnings']   = $total_amount - $total_tax - $total_discount;
$totals_row['commissions']    = $total_commissions;
$totals_row['profit']         = $total_amount - $total_discount - $total_tax - $total_commissions;

EDD_Enhanced_Sales_Reports_Filtering::find_or_create_cache_directory();
$cache_file = EDD_ENHANCED_SALES_REPORTS_CACHE . md5( serialize( $_GET ) ) . '.cache';
file_put_contents( $cache_file, serialize( $all_rows ) );
file_put_contents( $cache_file . '-totals', serialize( $totals_row ) );

$distinct_customers = array();

?>
<div class="edd-enhanced-sales-reports-result" data-type="by-products"
	 data-result="<?php echo esc_attr( basename( $cache_file ) ); ?>">
	<table>
		<thead>
		<tr>
			<th class="edd-esr-align-right"><?php esc_html_e( 'ID', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Product', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Vendor', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Orders', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Customers', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Countries', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"
				data-sortby><?php esc_html_e( 'Gross Earnings', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Discount', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Tax', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Net Earnings', 'edd-enhanced-sales-reports' ); ?></th>
			<?php if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) : ?>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Commissions', 'edd-enhanced-sales-reports' ); ?></th>
			<?php endif; ?>
			<th class="edd-esr-align-right"
				title="<?php esc_html_e( 'Net Earning / Total Products Sold', 'edd-enhanced-sales-reports' ); ?>"><?php esc_html_e( 'AOV', 'edd-enhanced-sales-reports' ); ?></th>
		</tr>
		</thead>
		<tbody class="edd-esr-bold-last"></tbody>
	</table>
</div>
