<?php
/**
 * Dashboard Widget
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

$lookup_table = $wpdb->prefix . 'enhanced_sales_report';
$currency     = edd_currency_symbol();
$admin_url    = admin_url( '/' );

$date_ranges = array(
	array(
		'title'       => __( 'Today', 'edd-enhanced-sales-reports' ),
		'range_start' => gmdate( 'Y-m-d' ),
		'range_end'   => gmdate( 'Y-m-d' ),
		'total_days'  => 1,
	),
	array(
		'title'       => __( 'This Month', 'edd-enhanced-sales-reports' ),
		'range_start' => gmdate( 'Y-m-01' ),
		'range_end'   => gmdate( 'Y-m-t' ),
		'total_days'  => gmdate( 'd' ),
	),
	array(
		'title'       => __( 'Last Month', 'edd-enhanced-sales-reports' ),
		'range_start' => gmdate( 'Y-m-01', strtotime( 'first day of last month' ) ),
		'range_end'   => gmdate( 'Y-m-t', strtotime( 'first day of last month' ) ),
		'total_days'  => gmdate( 't', strtotime( 'first day of last month' ) ),
	),
	array(
		'title'       => __( 'All Time', 'edd-enhanced-sales-reports' ),
		'range_start' => edd_enhanced_sales_reports_get_oldest_order_date(),
		'range_end'   => edd_enhanced_sales_reports_get_latest_order_date(),
		'total_days'  => edd_enhanced_sales_reports_get_oldest_get_days_between_dates( edd_enhanced_sales_reports_get_oldest_order_date(), gmdate( 'Y-m-d' ) ),
	),
);
?>
<div class="edd-enhanced-sales-reports-summary-widget">

	<div class="edd-enhanced-sales-reports-summary-widget-buttons">
		<a href="#" class="button edd-esr-reload-dashboard"><?php esc_html_e( 'Refresh', 'edd-enhanced-sales-reports' ); ?></a>
		<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports"
		   class="button"><?php esc_html_e( 'Dashboard', 'edd-enhanced-sales-reports' ); ?></a>
		<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-ordered-products"
		   class="button"><?php esc_html_e( 'Ordered Products', 'edd-enhanced-sales-reports' ); ?></a>
		<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-customer"
		   class="button"><?php esc_html_e( 'Customers', 'edd-enhanced-sales-reports' ); ?></a>
		<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-product"
		   class="button"><?php esc_html_e( 'Products', 'edd-enhanced-sales-reports' ); ?></a>
	</div>

	<?php foreach ( $date_ranges as $range_index => $range ) : ?>
		<?php
		$date_query_part = '';

		if ( 0 !== $range['range_start'] ) {
			$date_query_part .= " AND DATE(order_date) >='" . esc_sql( $range['range_start'] ) . "' AND DATE(order_date) <= '" . esc_sql( $range['range_end'] ) . "'";
		}

		// $date_query_part is already sanitized above.
		$net_earnings =
			"SELECT SUM( product_sub_total - product_discount )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$net_earnings = $wpdb->get_var( $net_earnings ); // phpcs:ignore

		$net_earnings_per_day = $net_earnings / $range['total_days'];

		// $date_query_part is already sanitized above.
		$gross_earnings =
			"SELECT SUM( product_sub_total + product_tax )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$gross_earnings = $wpdb->get_var( $gross_earnings ); // phpcs:ignore

		// $date_query_part is already sanitized above.
		$orders =
			"SELECT COUNT( DISTINCT order_id )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$orders = $wpdb->get_var( $orders ); // phpcs:ignore

		// $date_query_part is already sanitized above.
		$paid_orders =
			"SELECT COUNT( DISTINCT order_id )
				FROM {$lookup_table} WHERE total > 0 {$date_query_part}";

		$paid_orders = $wpdb->get_var( $paid_orders ); // phpcs:ignore

		// $date_query_part is already sanitized above.
		$total_quantity =
			"SELECT SUM( product_quantity )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$total_quantity = intval( $wpdb->get_var( $total_quantity ) ); // phpcs:ignore

		// $date_query_part is already sanitized above.
		$total_tax =
			"SELECT SUM( product_tax )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$total_tax = intval( $wpdb->get_var( $total_tax ) ); // phpcs:ignore

		// $date_query_part is already sanitized above.
		$total_discounts =
			"SELECT SUM( product_discount )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$total_discounts = intval( $wpdb->get_var( $total_discounts ) ); // phpcs:ignore 

		// $date_query_part is already sanitized above.
		$customers =
			"SELECT COUNT( DISTINCT customer_id )
				FROM {$lookup_table} WHERE 1=1 {$date_query_part}";

		$customers = $wpdb->get_var( $customers ); // phpcs:ignore

		$orders_per_customer = ( $customers > 0 ? number_format( $orders / $customers, 1 ) : 'NA' );
		$products_per_order  = ( $orders > 0 ? number_format( $total_quantity / $orders, 1 ) : 'NA' );
		$value_per_customer  = ( $customers > 0 ? $currency . number_format( $net_earnings / $customers, 1 ) : 'NA' );

		$reports_base_url = 'edit.php?post_type=download&page=edd-enhanced-sales-reports&filter_date_range=' . $range['range_start'] . '+-+' . $range['range_end'];

		$kpi_blocks = array(
			'today' => array(
				'title' => $range['title'],
				'kpis'  => array(
					array(
						__( 'Gross Earnings', 'edd-enhanced-sales-reports' ),
						$currency . number_format( $gross_earnings, 0 ),
					),
					array(
						__( 'Taxes', 'edd-enhanced-sales-reports' ),
						$currency . number_format( $total_tax, 0 ),
					),
					array(
						__( 'Discounts', 'edd-enhanced-sales-reports' ),
						$currency . number_format( $total_discounts, 0 ),
					),
					array(
						__( 'Net Earnings', 'edd-enhanced-sales-reports' ),
						$currency . number_format( $net_earnings, 0 ),
					),
					array(
						__( 'Net Earnings / Day', 'edd-enhanced-sales-reports' ),
						$currency . number_format( $net_earnings_per_day, 0 ),
					),
					array(
						__( 'Average Order Value', 'edd-enhanced-sales-reports' ),
						$currency . number_format( ( $paid_orders > 0 ? $net_earnings / $paid_orders : 0 ), 2 ),
					),
					array(
						__( 'Customers', 'edd-enhanced-sales-reports' ),
						'<a href="' . $reports_base_url . '&sub-page=by-customer">' . number_format( $customers, 0 ) . '</a>',
					),
					array(
						__( 'Products Sold', 'edd-enhanced-sales-reports' ),
						'<a href="' . $reports_base_url . '&sub-page=by-ordered-products">' . number_format( $total_quantity, 0 ) . '</a>',
					),
					array(
						__( 'Value/Customer', 'edd-enhanced-sales-reports' ),
						$value_per_customer,
					),
				),
			),
		);

		$date_ranges[ $range_index ]['kpis'] = $kpi_blocks;
		?>
	<?php endforeach; ?>

	<?php foreach ( $date_ranges as $range ) : ?>
		<?php
		$kpi_blocks = $range['kpis'];
		?>
		<?php foreach ( $kpi_blocks as $kpi_block_index => $kpi_block ) : ?>
			<table>
				<thead>
				<tr>
					<th><?php esc_html_e( 'Sales', 'edd-enhanced-sales-reports' ); ?></th>
					<th class="edd-esr-align-right"><?php echo esc_html( $date_ranges[0]['title'] ); ?></th>
					<th class="edd-esr-align-right"><?php echo esc_html( $date_ranges[1]['title'] ); ?></th>
					<th class="edd-esr-align-right"><?php echo esc_html( $date_ranges[2]['title'] ); ?></th>
					<th class="edd-esr-align-right"><?php echo esc_html( $date_ranges[3]['title'] ); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ( $kpi_block['kpis'] as $kpi_index => $kpi ) : ?>
					<tr>
						<td><?php echo esc_html( $kpi[0] ); ?></td>
						<td class="edd-esr-align-right"><?php echo wp_kses( $kpi[1], 'a' ); ?></td>
						<td class="edd-esr-align-right"><?php echo wp_kses( $date_ranges[1]['kpis']['today']['kpis'][ $kpi_index ][1] , array( 'a' ) ); ?></td>
						<td class="edd-esr-align-right"><?php echo wp_kses( $date_ranges[2]['kpis']['today']['kpis'][ $kpi_index ][1] , array( 'a' ) ); ?></td>
						<td class="edd-esr-align-right"><?php echo wp_kses( $date_ranges[3]['kpis']['today']['kpis'][ $kpi_index ][1] , array( 'a' ) ); ?></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php endforeach; ?>
		<?php break; ?>
	<?php endforeach; ?>

	<div class="edd-enhanced-sales-reports-day-sales" style="width:100%;">
		<h4><strong><?php esc_html_e( 'Last 24 Hours Sale', 'edd-enhanced-sales-reports' ); ?></strong></h4>
		<?php
		$chart_start_date = gmdate( 'Y-m-d H:i:s', strtotime( '-24 hours' ) );
		$chart_end_date   = gmdate( 'Y-m-d H:i:s' );

		$chart_data = $wpdb->get_results(
			$wpdb->prepare(
				"SELECT HOUR(order_date) as row_date, GROUP_CONCAT( DISTINCT order_id ) AS order_ids, SUM(product_sub_total + product_tax) as earnings
				FROM {$wpdb->prefix}enhanced_sales_report
				WHERE order_date >= %s AND order_date <= %s
				GROUP BY HOUR(order_date)
				ORDER BY order_date ASC
				",
				$chart_start_date,
				$chart_end_date
			)
		);

		$chart_order_ids = array();

		foreach ( $chart_data as $chart_row ) {
			$chart_order_ids = array_merge( $chart_order_ids, explode( ',', $chart_row->order_ids ) );
		}

		$chart_order_ids = array_unique( $chart_order_ids );

		$chart_orders_details_mapped = array();

		if ( ! empty( $chart_order_ids ) ) {

			foreach ( $chart_order_ids as &$chart_order_id ) {
				$chart_order_id = (int) $chart_order_id;
			}

			// get order data.
			$chart_orders_details = "SELECT * FROM {$wpdb->prefix}enhanced_sales_report WHERE order_id IN (" . implode( ',', $chart_order_ids ) . ')';

			// $chart_order_ids are all typecasted to integers above.
			$chart_orders_details = $wpdb->get_results( $chart_orders_details ); // phpcs:ignore

			foreach ( $chart_orders_details as $detail_row ) {
				if ( ! isset( $chart_orders_details_mapped[ $detail_row->order_id ] ) ) {
					$chart_orders_details_mapped[ $detail_row->order_id ] = array(
						'gross_total'    => 0,
						'net_total'      => 0,
						'tax_total'      => 0,
						'discount_total' => 0,
						'items'          => array(),
					);
				}

				$chart_orders_details_mapped[ $detail_row->order_id ]['gross_total']    += $detail_row->product_sub_total;
				$chart_orders_details_mapped[ $detail_row->order_id ]['tax_total']      += $detail_row->product_tax;
				$chart_orders_details_mapped[ $detail_row->order_id ]['discount_total'] += $detail_row->product_discount;
				$chart_orders_details_mapped[ $detail_row->order_id ]['net_total']      += ( $detail_row->product_total - $detail_row->product_tax - $detail_row->product_discount );
			}
		}

		$chart_labels   = array();
		$chart_earnings = array();

		$all_dates = array();
		$all_sales = array();

		$start_ts = strtotime( $chart_start_date );
		$end_ts   = strtotime( $chart_end_date );

		for ( $iteration_ts = $end_ts; $iteration_ts >= $start_ts; $iteration_ts -= 3600 ) {
			$all_dates[ gmdate( 'H:00', $iteration_ts ) ] = gmdate( 'H:00', $iteration_ts );
			$all_sales[ gmdate( 'H:00', $iteration_ts ) ] = 0;
		}

		foreach ( $chart_data as $chart_row ) {
			$hour = $chart_row->row_date;
			if ( $hour < 10 ) {
				$hour = '0' . $hour;
			}
			$all_dates[ $hour . ':00' ] = $hour . ':00';
			$all_sales[ $hour . ':00' ] = str_replace( ',', '', number_format( $chart_row->earnings, 2 ) );
		}

		foreach ( $all_dates as $row_date ) {
			$chart_labels[]   = $row_date;
			$chart_earnings[] = $all_sales[ $row_date ];
		}

		$chart_labels   = array_reverse( $chart_labels );
		$chart_earnings = array_reverse( $chart_earnings );
		?>
		<script>
			var edd_enhanced_sales_reports_day_chart_data = {
				labels: <?php echo json_encode( $chart_labels ); ?>,
				datasets: [
					{
						label: '<?php esc_html_e( 'Gross Earnings', 'edd-enhanced-sales-reports' ); ?>',
						data: <?php echo json_encode( $chart_earnings ); ?>,
						fill: false,
						// stepped: true
					}
				]
			};
		</script>
		<canvas class="edd-enhanced-sales-reports-day-sales-chart" id="edd-enhanced-sales-reports-view-chart"
				style="height: 200px;width:100%;"></canvas>
	</div>

	<?php
	$today_date   = gmdate( 'Y-m-d' );

	$top_products = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT product_id, product_name, COUNT(DISTINCT order_id) as total_orders, SUM( product_sub_total ) as total_sales
		FROM {$wpdb->prefix}enhanced_sales_report
		WHERE DATE(order_date)=%s
		GROUP BY product_id
		ORDER BY total_sales DESC
		LIMIT 10",
			$today_date
		)
	);
	?>
	<div class="edd-enhanced-sales-reports-summary-widget-lower edd-esr-widget-top-products" data-nonce="<?php echo esc_attr( wp_create_nonce( 'edd_enhanced_sales_reports_top_products_nonce' ) ); ?>">
		<div class="edd-enhanced-sales-reports-date-switcher">
			<h4>
				<strong><a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-ordered-products"><?php esc_html_e( 'Top Products', 'edd-enhanced-sales-reports' ); ?>
						(<span><?php esc_html_e( 'Today', 'edd-enhanced-sales-reports' ); ?></span>)</a></strong></h4>
			<select id="edd-enhanced-sales-reports-top-products-switcher">
				<option value="today"><?php esc_html_e( 'Today', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="yesterday"><?php esc_html_e( 'Yesterday', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="last_7_days"><?php esc_html_e( 'Last 7 Days', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="last_30_days"><?php esc_html_e( 'Last 30 Days', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="this_month"><?php esc_html_e( 'This Month', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="last_month"><?php esc_html_e( 'Last Month', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="this_year"><?php esc_html_e( 'This Year', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="last_year"><?php esc_html_e( 'Last Year', 'edd-enhanced-sales-reports' ); ?></option>
				<option value="lifetime"><?php esc_html_e( 'Lifetime', 'edd-enhanced-sales-reports' ); ?></option>
			</select>
		</div>
		<table>
			<thead>
			<tr>
				<th><?php esc_html_e( 'ID', 'edd-enhanced-sales-reports' ); ?></th>
				<th><?php esc_html_e( 'Name', 'edd-enhanced-sales-reports' ); ?></th>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Orders', 'edd-enhanced-sales-reports' ); ?></th>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Sales', 'edd-enhanced-sales-reports' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if ( count( $top_products ) > 0 ) : ?>
				<?php foreach ( $top_products as $product ) : ?>
					<tr>
						<td>
							<a href="<?php echo esc_url( admin_url( 'post.php?post=' . $product->product_id . '&action=edit' ) ); ?>"><?php echo esc_html( $product->product_id ); ?></a>
						</td>
						<td>
							<a href="<?php echo esc_url( admin_url( 'post.php?post=' . $product->product_id . '&action=edit' ) ); ?>"><?php echo esc_html( edd_enhanced_sales_reports_strip_product_option( $product->product_name ) ); ?></a>
						</td>
						<td class="edd-esr-align-right"><a
									href="<?php echo esc_url( admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-orders&filter_date_range=2010-01-01+-+' . gmdate( 'Y-m-d' ) . '&filter_products[]=' . $product->product_id ) ); ?>"><?php echo esc_html( number_format( $product->total_orders, 0 ) ); ?></a>
						</td>
						<td class="edd-esr-align-right"><?php echo esc_html( $currency . number_format( $product->total_sales, 0 ) ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="4"><?php esc_html_e( 'Not enough data', 'edd-enhanced-sales-reports' ); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>

	<?php
	$top_customers = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT customer_id, product_name, COUNT(DISTINCT order_id) as total_orders, SUM( product_sub_total ) as total_sales
		FROM {$wpdb->prefix}enhanced_sales_report
		WHERE customer_id <> 0
		AND DATE(order_date)=%s
		GROUP BY customer_id
		ORDER BY total_orders DESC
		LIMIT 10",
			$today_date
		)
	);
	?>
	<div class="edd-enhanced-sales-reports-summary-widget-lower edd-esr-widget-top-customers" data-nonce="<?php echo esc_attr( wp_create_nonce( 'edd_enhanced_sales_reports_top_customers_nonce' ) ); ?>">
		<div class="edd-enhanced-sales-reports-date-switcher">
			<h4>
				<strong><a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-customer"><?php esc_html_e( 'Top Customers', 'edd-enhanced-sales-reports' ); ?>
						(<span><?php esc_html_e( 'Today', 'edd-enhanced-sales-reports' ); ?></span>)</a></strong></h4>
		</div>
		<table>
			<thead>
			<tr>
				<th><?php esc_html_e( 'ID', 'edd-enhanced-sales-reports' ); ?></th>
				<th><?php esc_html_e( 'Name', 'edd-enhanced-sales-reports' ); ?></th>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Orders', 'edd-enhanced-sales-reports' ); ?></th>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Sales', 'edd-enhanced-sales-reports' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if ( count( $top_customers ) > 0 ) : ?>
				<?php
				$customer_ids = array();
				foreach ( $top_customers as $customer ) {
					$customer_ids[] = (int) $customer->customer_id;
				}

				$customers_ids_map = array();

				if ( ! empty( $customer_ids ) ) {
					// $customer_ids are typecasted to integers above.
					$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore
					foreach ( $customers_query as $customer ) {
						$customers_ids_map[ $customer->id ] = $customer->name;
					}
				}
				?>
				<?php foreach ( $top_customers as $customer ) : ?>
					<?php
					$customer_url = $admin_url . 'edit.php?post_type=download&page=edd-customers&view=overview&id=' . $customer->customer_id;
					?>
					<tr>
						<td><a href="<?php echo esc_url( $customer_url ); ?>"><?php echo esc_html( $customer->customer_id ); ?></a></td>
						<td>
							<a href="<?php echo esc_url( $customer_url ); ?>"><?php echo isset( $customers_ids_map[ $customer->customer_id ] ) ? esc_html( $customers_ids_map[ $customer->customer_id ] ) : esc_html__( '(Unknown)', 'edd-enhanced-sales-reports' ); ?></a>
						</td>
						<td class="edd-esr-align-right"><a
									href="<?php echo esc_url( admin_url( 'edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-orders&filter_date_range=2010-01-01+-+' . gmdate( 'Y-m-d' ) . '&customer_id=' . $customer->customer_id ) ); ?>"><?php echo esc_html( number_format( $customer->total_orders, 0 ) ); ?></a>
						</td>
						<td class="edd-esr-align-right"><?php echo esc_html( $currency . number_format( $customer->total_sales, 0 ) ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="4"><?php esc_html_e( 'Not enough data', 'edd-enhanced-sales-reports' ); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>

	<?php

	$recent_orders = $wpdb->get_results(
		"SELECT *
		FROM {$wpdb->prefix}enhanced_sales_report
		ORDER BY order_date DESC
		LIMIT 10"
	);

	$grouped_orders = array();

	$customer_ids = array();

	foreach ( $recent_orders as $recent_order ) {
		if ( ! isset( $grouped_orders[ $recent_order->order_id ] ) ) {
			$grouped_orders[ $recent_order->order_id ] = array(
				'id'          => $recent_order->order_id,
				'customer_id' => $recent_order->customer_id,
				'total'       => $recent_order->total - $recent_order->tax,
				'rows'        => array(),
			);

			$customer_ids[] = (int) $recent_order->customer_id;
		}

		$grouped_orders[ $recent_order->order_id ]['rows'][] = $recent_order;
	}

	// $customer_ids are typecasted to integers above.
	$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore

	$customers_ids_map = array();
	foreach ( $customers_query as $customer ) {
		$customers_ids_map[ $customer->id ] = $customer->name;
	}
	?>

	<div class="edd-enhanced-sales-reports-summary-widget-lower">
		<h4>
			<strong><a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-orders"><?php esc_html_e( 'Recent Orders', 'edd-enhanced-sales-reports' ); ?></a></strong>
		</h4>
		<table>
			<thead>
			<tr>
				<th><?php esc_html_e( 'ID', 'edd-enhanced-sales-reports' ); ?></th>
				<th><?php esc_html_e( 'Customer', 'edd-enhanced-sales-reports' ); ?></th>
				<th colspan="2"><?php esc_html_e( 'Products', 'edd-enhanced-sales-reports' ); ?></th>
				<th class="edd-esr-align-right"></th>
				<th class="edd-esr-align-right"><?php esc_html_e( 'Total', 'edd-enhanced-sales-reports' ); ?></th>
			</tr>
			</thead>
			<tbody>
			<?php if ( count( $recent_orders ) > 0 ) : ?>

				<?php foreach ( $grouped_orders as $grouped_order ) : ?>
					<?php
					$total_rows   = count( $grouped_order['rows'] );
					$order_row    = array_shift( $grouped_order['rows'] );
					$customer_url = $admin_url . 'edit.php?post_type=download&page=edd-customers&view=overview&id=' . $grouped_order['customer_id'];
					?>
					<tr>
						<td rowspan="<?php echo esc_html( $total_rows ); ?>"><a
									href="<?php echo esc_url( admin_url( 'edit.php?post_type=download&page=edd-payment-history&view=view-order-details&id=' . $grouped_order['id'] ) ); ?>"><?php echo esc_html( $grouped_order['id'] ); ?></a>
						</td>
						<td rowspan="<?php echo esc_html( $total_rows ); ?>">
							<a href="<?php echo esc_url( $customer_url ); ?>"><?php echo isset( $customers_ids_map[ $grouped_order['customer_id'] ] ) ? esc_html( $customers_ids_map[ $grouped_order['customer_id'] ] ) : '(ID: ' . esc_html( $grouped_order['customer_id'] ) . ')'; ?></a>
						</td>
						<td>
							<a href="<?php echo esc_url( admin_url( 'post.php?post=' . $order_row->product_id . '&action=edit' ) ); ?>"><?php echo esc_html( $order_row->product_name ); ?></a>
						</td>
						<td class="edd-esr-align-right"><?php echo esc_html( $order_row->product_quantity ); ?></td>
						<td class="edd-esr-align-right"><?php echo esc_html( $currency . number_format( $order_row->product_sub_total, 0 ) ); ?></td>
						<td class="edd-esr-align-right"
							rowspan="<?php echo esc_html( $total_rows ); ?>"><?php echo esc_html( $currency . number_format( $grouped_order['total'], 2 ) ); ?></td>
					</tr>
					<?php foreach ( $grouped_order['rows'] as $order_row ) : ?>
						<tr>
							<td><?php echo esc_html( $order_row->product_name ); ?></td>
							<td class="edd-esr-align-right"><?php echo esc_html( number_format( $order_row->product_quantity, 0 ) ); ?></td>
							<td class="edd-esr-align-right"><?php echo esc_html( $currency . number_format( $order_row->product_sub_total, 0 ) ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="4"><?php esc_html_e( 'Not enough data', 'edd-enhanced-sales-reports' ); ?></td>
				</tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>

</div>
