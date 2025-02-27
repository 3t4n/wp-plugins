<?php
/**
 * Report By Ordered Products
 *
 * @package     EDD_Enhanced_Sales_Reports\ByOrderedProducts
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;
require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/filtering-fields.php';

$reports_data    = EDD_Enhanced_Sales_Reports_Admin::get_report_data( $start_date, $end_date );
$report_array    = array();
$vendor_ids      = array();
$product_ids_map = array();
$countries       = array();
$paid_orders     = array();

// get all customers for order result.
$customer_ids = array();
$user_ids     = array();

foreach ( $reports_data as $report_row ) {
	if ( ! empty( $report_row->customer_id ) && ! isset( $customer_ids[ $report_row->customer_id ] ) ) {
		$customer_ids[ $report_row->customer_id ] = intval( $report_row->customer_id );
	}
	if ( ! empty( $report_row->user_id ) && ! isset( $user_ids[ $report_row->user_id ] ) ) {
		$user_ids[ $report_row->user_id ] = intval( $report_row->user_id );
	}
}

$customers_ids_map = array();
$users_ids_map     = array();

if ( ! empty( $customer_ids ) ) {
	// Sanitization of $customer_ids is already done via typecasting to integers.
	$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore
	foreach ( $customers_query as $customer ) {
		$customers_ids_map[ $customer->id ] = $customer;
	}
}

if ( ! empty( $user_ids ) ) {
	// $user_ids is already sanitized by typecasting to integers.
	$users_query     = $wpdb->get_results( "SELECT * FROM {$wpdb->users} WHERE id IN (" . implode( ',', $user_ids ) . ')' ); // phpcs:ignore

	foreach ( $users_query as $user ) {
		$users_ids_map[ $user->ID ] = $user;
	}
}

foreach ( $reports_data as $report_row ) {
	if ( ! isset( $report_array[ $report_row->id ] ) ) {
		$report_array[ $report_row->id ] = array(
			'total_amount' => 0,
			'vendor'       => $report_row->author_id,
			'countries'    => array(),
			'sales'        => array(),
			'paid_orders'  => array(),
			'customers'    => array(),
			'new_existing' => 0 == $report_row->is_existing_customer ? __( 'New', 'edd-enhanced-sales-reports' ) : __( 'Existing', 'edd-enhanced-sales-reports' ),
			'product_name' => edd_enhanced_sales_reports_strip_product_option( $report_row->product_name ),
			'tax'          => 0,
			'discount'     => 0,
			'order_date'   => $report_row->order_date,
			'order_id'     => $report_row->order_id,
			'commissions'  => 0,
			'profit'       => 0,
			'arpu'         => 0,
			'quantity'     => 0,
			'product_id'   => $report_row->product_id,
			'gateway'      => edd_enhanced_sales_reports_get_gateway_name( $report_row->gateway ),
			'customer_id'  => $report_row->customer_id,
			'user_id'      => $report_row->user_id,
			'country'      => $report_row->billing_country,
		);
	}

	$report_array[ $report_row->id ]['total_amount'] += $report_row->product_sub_total + $report_row->product_tax;
	$report_array[ $report_row->id ]['tax']          += $report_row->product_tax;
	$report_array[ $report_row->id ]['discount']     += $report_row->product_discount;
	$report_array[ $report_row->id ]['commissions']  += $report_row->commission;
	$report_array[ $report_row->id ]['sales'][]      = array(
		'order_id'  => $report_row->order_id,
		'order_row' => $report_row,
	);

	if ( 0 < $report_row->total ) {
		$report_array[ $report_row->id ]['paid_orders'][ $report_row->order_id ] = $report_row->order_id;
		$paid_orders[ $report_row->order_id ]                                             = $report_row->order_id;
	}

	$report_array[ $report_row->id ]['quantity'] += $report_row->product_quantity;

	$report_array[ $report_row->id ]['customers'][] = $report_row->customer_id;
	$report_array[ $report_row->id ]['countries'][] = $report_row->billing_country;

	$vendor_ids[] = $report_row->author_id;

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

$all_rows = array();
foreach ( $report_array as $row_id => $report_row ) :
	// check if range filter is set.
	if ( isset( $GLOBALS['edd_enhanced_sales_reports_earnings_range'] ) ) {
		if ( $report_row['total_amount'] < $GLOBALS['edd_enhanced_sales_reports_earnings_range'][0] || $report_row['total_amount'] > $GLOBALS['edd_enhanced_sales_reports_earnings_range'][1] ) {
			continue;
		}
	}

	$product_id = $report_row['product_id'];

	if ( isset( $product_ids_map[ $product_id ] ) ) {
		$product_name = $product_ids_map[ $product_id ];
	}

	$countries    = array_unique( $report_row['countries'] );
	$customers    = array_unique( $report_row['customers'] );
	$product_name = $report_row['product_name'];

	$total_amount      += $report_row['total_amount'];
	$total_tax         += $report_row['tax'];
	$total_discount    += $report_row['discount'];
	$total_commissions += $report_row['commissions'];
	$total_earnings    += $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'] - $report_row['commissions'];
	$total_quantity    += $report_row['quantity'];

	if ( isset( $vendors_mapping[ $report_row['vendor'] ] ) ) {
		$report_row['vendor_name'] = $vendors_mapping[ $report_row['vendor'] ];
	} else {
		$report_row['vendor_name'] = esc_html__( '(Unknown)', 'edd-enhanced-sales-reports' );
	}

	$customer_name  = '';
	$customer_email = '';
	$customer       = false;
	$user           = false;
	if ( ! empty( $report_row['customer_id'] ) ) {
		$customer_name = __( 'ID#', 'edd-enhanced-sales-reports' ) . $report_row['customer_id'];

		if ( isset( $customers_ids_map[ $report_row['customer_id'] ] ) ) {
			$customer       = $customers_ids_map[ $report_row['customer_id'] ];
			$customer_name  = $customer->name;
			$customer_email = $customer->email;
		}
		if ( isset( $users_ids_map[ $report_row['user_id'] ] ) ) {
			$user = $users_ids_map[ $report_row['user_id'] ];
		}
	}

	$report_row['customer_name']  = $customer_name;
	$report_row['customer']       = $customer;
	$report_row['user']           = $user;
	$report_row['customer_email'] = $customer_email;

	$all_rows[ $row_id ] = $report_row;
endforeach;

$totals_row = array(
	'total_quantity' => $total_quantity,
	'paid_orders'    => count( $paid_orders ),
	'gross_earnings' => $total_amount,
	'discount'       => $total_discount,
	'tax'            => $total_tax,
	'net_earnings'   => $total_amount - $total_tax - $total_discount,
	'commissions'    => $total_commissions,
	'profit'         => $total_amount - $total_discount - $total_tax - $total_commissions,
);

EDD_Enhanced_Sales_Reports_Filtering::find_or_create_cache_directory();
$cache_file = EDD_ENHANCED_SALES_REPORTS_CACHE . md5( serialize( $_GET ) ) . '.cache';
file_put_contents( $cache_file, serialize( $all_rows ) );
file_put_contents( $cache_file . '-totals', serialize( $totals_row ) );

$distinct_customers = array();

?>
<div class="edd-enhanced-sales-reports-result" data-type="by-ordered-products"
	 data-result="<?php echo esc_attr( basename( $cache_file ) ); ?>">
	<table>
		<thead>
		<tr>
			<th><?php esc_html_e( 'Order#', 'edd-enhanced-sales-reports' ); ?></th>
			<th data-sortby><?php esc_html_e( 'Date', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Product', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Authors', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Customer', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Gateway', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Type', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Quantity', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Gross Earnings', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Tax', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Discount', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Net Earnings', 'edd-enhanced-sales-reports' ); ?></th>
			<?php if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) : ?>
				<th><?php esc_html_e( 'Commissions', 'edd-enhanced-sales-reports' ); ?></th>
			<?php endif; ?>
			<th title="<?php esc_html_e( 'Net Earning / Total Products Sold', 'edd-enhanced-sales-reports' ); ?>"><?php esc_html_e( 'AOV', 'edd-enhanced-sales-reports' ); ?></th>
		</tr>
		</thead>
		<tbody class="edd-esr-bold-last"></tbody>
	</table>
</div>
