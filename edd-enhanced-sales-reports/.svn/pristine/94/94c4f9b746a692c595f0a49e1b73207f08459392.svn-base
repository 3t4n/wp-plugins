<?php
/**
 * Report By Customers
 *
 * @package     EDD_Enhanced_Sales_Reports\ByCustomers
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;
require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/filtering-fields.php';

$reports_data = EDD_Enhanced_Sales_Reports_Admin::get_report_data( $start_date, $end_date );
$report_array = array();
$vendor_ids   = array();
$customer_ids = array();
$countries    = array();
$order_ids    = array();
$paid_orders  = array();
$product_ids  = array();

$countries_map = edd_enhances_sales_reports__get_countries();

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
	// Sanitization of $customer_ids is already done above via passing it through intval.
	$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore
	foreach ( $customers_query as $customer ) {
		$customers_ids_map[ $customer->id ] = $customer;
	}
}

if ( ! empty( $user_ids ) ) {
	// Sanitization of $user_ids is already done above via passing it through intval.
	$users_query     = $wpdb->get_results( "SELECT * FROM {$wpdb->users} WHERE id IN (" . implode( ',', $user_ids ) . ')' ); // phpcs:ignore

	foreach ( $users_query as $user ) {
		$users_ids_map[ $user->ID ] = $user;
	}
}


foreach ( $reports_data as $report_row ) {
	if ( ! isset( $report_array[ $report_row->customer_id ] ) ) {
		$report_array[ $report_row->customer_id ] = array(
			'total_amount'      => 0,
			'customer_name'     => __( '(Unknown)', 'edd-enhanced-sales-reports' ),
			'customer'          => '',
			'registration_date' => 'NA',
			'new_existing'      => 0 == $report_row->is_existing_customer ? __( 'New', 'edd-enhanced-sales-reports' ) : __( 'Existing', 'edd-enhanced-sales-reports' ),
			'user_id'           => $report_row->user_id,
			'user'              => $report_row->user_id,
			'customer_email'    => $report_row->email,
			'country_name'      => ( ! array_key_exists( $report_row->billing_country, $countries_map ) ? __( 'None', 'edd-enhanced-sales-reports' ) : $countries_map[ $report_row->billing_country ] ),
			'vendors'           => array(),
			'vendors_details'   => array(),
			'sales'             => array(),
			'paid_orders'       => array(),
			'products'          => array(),
			'customers'         => array(),
			'tax'               => 0,
			'discount'          => 0,
			'commissions'       => 0,
			'profit'            => 0,
			'arpu'              => 0,
			'quantity'          => 0,
			'order_ids'         => array(),
		);

		if ( isset( $customers_ids_map[ $report_row->customer_id ] ) ) {
			$report_array[ $report_row->customer_id ]['customer_name']     = $customers_ids_map[ $report_row->customer_id ]->name;
			$report_array[ $report_row->customer_id ]['customer']          = $customers_ids_map[ $report_row->customer_id ];
			$report_array[ $report_row->customer_id ]['registration_date'] = strtotime( $customers_ids_map[ $report_row->customer_id ]->date_created );
			$report_array[ $report_row->customer_id ]['registration_date'] = gmdate( 'Y-m-d', $report_array[ $report_row->customer_id ]['registration_date'] );
		}

		if ( isset( $users_ids_map[ $report_row->user_id ] ) ) {
			$report_array[ $report_row->customer_id ]['user'] = $users_ids_map[ $report_row->user_id ];
		}
	}

	if ( ( 'None' === $report_array[ $report_row->customer_id ]['country_name'] || empty( $report_array[ $report_row->customer_id ]['country_name'] ) ) && ! empty( $report_row->billing_country ) ) {
		$report_array[ $report_row->customer_id ]['country_name'] = ( ! array_key_exists( $report_row->billing_country, $countries_map ) ? __( 'None', 'edd-enhanced-sales-reports' ) : $countries_map[ $report_row->billing_country ] );
	}

	if ( empty( $report_array[ $report_row->customer_id ]['customer_name'] ) && ! empty( $report_row->first_name ) ) {
		$report_array[ $report_row->customer_id ]['customer_name'] = trim( $report_row->first_name . ' ' . $report_row->last_name );
	}

	$report_array[ $report_row->customer_id ]['total_amount'] += $report_row->product_sub_total + $report_row->product_tax;
	$report_array[ $report_row->customer_id ]['tax']          += $report_row->product_tax;
	$report_array[ $report_row->customer_id ]['discount']     += $report_row->product_discount;
	$report_array[ $report_row->customer_id ]['commissions']  += $report_row->commission;
	$report_array[ $report_row->customer_id ]['sales'][]      = array(
		'order_id'  => $report_row->order_id,
		'order_row' => $report_row,
	);

	if ( 0 < $report_row->total ) {
		$report_array[ $report_row->customer_id ]['paid_orders'][ $report_row->order_id ] = $report_row->order_id;
		$paid_orders[ $report_row->order_id ]                                              = $report_row->order_id;
	}

	$report_array[ $report_row->customer_id ]['quantity'] += $report_row->product_quantity;

	$report_array[ $report_row->customer_id ]['customers'][]                                 = $report_row->customer_id;
	$report_array[ $report_row->customer_id ]['products'][]                                  = $report_row->product_id;
	$report_array[ $report_row->customer_id ]['vendors'][]                                   = $report_row->author_id;
	$report_array[ $report_row->customer_id ]['order_ids'][]                                 = $report_row->order_id;
	$report_array[ $report_row->customer_id ]['vendors_details'][ $report_row->author_id ][] = $report_row;

	$vendor_ids[]                             = $report_row->author_id;
	$customer_ids[ $report_row->customer_id ] = $report_row->customer_id;
	$order_ids[ $report_row->order_id ]       = $report_row->order_id;
	$product_ids[ $report_row->product_id ]   = $report_row->product_id;

	if ( ! empty( $report_row->billing_country ) ) {
		$countries[ $report_row->billing_country ] = $report_row->billing_country;
	}
}

// get names of all users in $vendor_ids.
$vendors_mapping = EDD_Enhanced_Sales_Reports_Admin::get_vendor_names( array_unique( $vendor_ids ) );
$fes_vendor_ids  = EDD_Enhanced_Sales_Reports_Admin::get_fes_vendor_ids( array_unique( $vendor_ids ) );

$customer_ids    = array_unique( $customer_ids );

foreach ( $customer_ids as &$customer_id ) {
	$customer_id = (int) $customer_id;
}

$customers_query = array();
if ( ! empty( $customer_ids ) ) {
	// $customer_ids is already sanitized above via typecasting to integers.
	$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore
}

$customers_ids_map = array();
foreach ( $customers_query as $customer ) {
	$customers_ids_map[ $customer->id ] = $customer;
}

$admin_url = admin_url( '/' );

$total_products    = 0;
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
foreach ( $report_array as $customer_id => $report_row ) :
	// check if range filter is set.
	if ( isset( $GLOBALS['edd_enhanced_sales_reports_earnings_range'] ) ) {
		if ( $report_row['total_amount'] < $GLOBALS['edd_enhanced_sales_reports_earnings_range'][0] || $report_row['total_amount'] > $GLOBALS['edd_enhanced_sales_reports_earnings_range'][1] ) {
			continue;
		}
	}

	$vendors             = array_unique( $report_row['vendors'] );
	$customers           = array_unique( $report_row['customers'] );
	$products            = array_unique( $report_row['products'] );
	$total_orders        = count( array_unique( $report_row['order_ids'] ) );
	$total_paid_orders   = count( array_unique( $report_row['paid_orders'] ) );
	$customer_url        = $admin_url . 'edit.php?post_type=download&page=edd-customers&view=overview&id=' . $customer_id;
	$average_order_value = 0;

	if ( $total_paid_orders > 0 ) {
		$average_order_value = ( $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'] ) / $total_paid_orders;
	}

	$total_amount      += $report_row['total_amount'];
	$total_tax         += $report_row['tax'];
	$total_discount    += $report_row['discount'];
	$total_commissions += $report_row['commissions'];
	$total_earnings    += $report_row['total_amount'] - $report_row['tax'] - $report_row['discount'] - $report_row['commissions'];
	$total_quantity    += $report_row['quantity'];
	$total_products    += count( $products );

	$report_row['vendors']             = $vendors;
	$report_row['customers']           = $customers;
	$report_row['products']            = $products;
	$report_row['total_orders']        = $total_orders;
	$report_row['customer_url']        = $customer_url;
	$report_row['average_order_value'] = $average_order_value;

	$all_rows[ $customer_id ] = $report_row;
endforeach;

$totals_row = array(
	'orders'         => count( $order_ids ),
	'customers'      => count( $customer_ids ),
	'countries'      => count( $countries ),
	'total_quantity' => $total_quantity,
	'total_vendors'  => count( array_unique( $vendor_ids ) ),
	'total_products' => count( $product_ids ),
	'gross_earnings' => $total_amount,
	'discount'       => $total_discount,
	'paid_orders'    => count( $paid_orders ),
	'tax'            => $total_tax,
	'net_earnings'   => $total_amount - $total_tax - $total_discount,
	'commissions'    => $total_commissions,
	'profit'         => $total_amount - $total_discount - $total_tax - $total_commissions,
);

EDD_Enhanced_Sales_Reports_Filtering::find_or_create_cache_directory();
$cache_file = EDD_ENHANCED_SALES_REPORTS_CACHE . md5( serialize( $_GET ) ) . '.cache';
file_put_contents( $cache_file, serialize( $all_rows ) );
file_put_contents( $cache_file . '-totals', serialize( $totals_row ) );

?>
<div class="edd-enhanced-sales-reports-result" data-type="by-customer"
	 data-result="<?php echo esc_attr( basename( $cache_file ) ); ?>">
	<table>
		<thead>
		<tr>
			<th><?php esc_html_e( 'Customer', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Country', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'Registered On', 'edd-enhanced-sales-reports' ); ?></th>
			<th><?php esc_html_e( 'New/Existing', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Products', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Orders', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Vendors', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"
				data-sortby><?php esc_html_e( 'Gross Earnings', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Tax', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Discount', 'edd-enhanced-sales-reports' ); ?></th>
			<th class="edd-esr-align-right"><?php esc_html_e( 'Net Earnings', 'edd-enhanced-sales-reports' ); ?></th>
			<?php if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) : ?>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Commissions', 'edd-enhanced-sales-reports' ); ?></th>
			<?php endif; ?>
			<th class="edd-esr-align-right"
				title="<?php esc_html_e( 'Net Earning / Total Orders', 'edd-enhanced-sales-reports' ); ?>"><?php esc_html_e( 'AOV', 'edd-enhanced-sales-reports' ); ?></th>
		</tr>
		</thead>
		<tbody class="edd-esr-bold-last"></tbody>
	</table>
</div>
