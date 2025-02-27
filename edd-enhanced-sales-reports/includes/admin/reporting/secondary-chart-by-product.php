<?php
/**
 * Generates Chart
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$chart_data = $wpdb->get_results(
	$wpdb->prepare(
		"SELECT product_id, product_name, SUM(product_sub_total + product_tax) as earnings
		FROM {$wpdb->prefix}enhanced_sales_report
		WHERE order_date >= %s AND order_date <= %s
		GROUP BY product_id
		ORDER BY earnings DESC
		LIMIT 10
		",
		$start_date,
		$end_date . ' 23:59:59'
	)
);
?>
<div class="edd-enhanced-sales-reports-secondary-chart">
	<canvas id="edd-enhanced-sales-reports-secondary-chart"></canvas>
</div>
<script>
	<?php
	$chart_labels = array();
	$chart_earnings = array();

	$all_dates = array();
	$all_sales = array();

	foreach ( $chart_data as $chart_row ) {
		$all_dates[ $chart_row->product_id ] = edd_enhanced_sales_reports_strip_product_option( $chart_row->product_name );
		$all_sales[ $chart_row->product_id ] = str_replace( ',', '', number_format( $chart_row->earnings, 2 ) );
	}

	foreach ( $all_dates as $product_id => $row ) {
		$chart_labels[]   = $row;
		$chart_earnings[] = $all_sales[ $product_id ];
	}
	?>
	var edd_enhanced_sales_reports_secondary_chart_data = {
		labels: <?php echo json_encode( $chart_labels ); ?>,
		datasets: [
			{
				label: '<?php esc_html_e( 'Top Products', 'edd-enhanced-sales-reports' ); ?>',
				data: <?php echo json_encode( $chart_earnings ); ?>,
				fill: false
			}
		]
	};
</script>
