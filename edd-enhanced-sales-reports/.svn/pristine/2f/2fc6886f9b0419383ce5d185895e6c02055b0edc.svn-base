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
		"SELECT DATE(order_date) as row_date, SUM(product_sub_total + product_tax) as earnings
		FROM {$wpdb->prefix}enhanced_sales_report
		WHERE order_date >= %s AND order_date <= %s
		GROUP BY DATE(order_date)
		ORDER BY order_date ASC
		",
		$start_date,
		$end_date . ' 23:59:59'
	)
);

?>
<div class="edd-enhanced-sales-reports-chart">
	<canvas id="edd-enhanced-sales-reports-chart"></canvas>
</div>
<script>
	<?php
	$chart_labels = array();
	$chart_earnings = array();

	$all_dates = array();
	$all_sales = array();

	$start_ts = strtotime( $start_date );
	$end_ts = strtotime( $end_date );

	if ( $start_date <= $end_date ) {
		for ( $iteration_ts = $start_ts; $iteration_ts <= $end_ts; $iteration_ts += 86400 ) {
			$all_dates[ gmdate( 'j-M-Y', $iteration_ts ) ] = gmdate( 'j-M-Y', $iteration_ts );
			$all_sales[ gmdate( 'j-M-Y', $iteration_ts ) ] = 0;
		}
	}

	foreach ( $chart_data as $chart_row ) {
		$row_date               = DateTime::createFromFormat( 'Y-m-d', $chart_row->row_date );
		$row_date               = $row_date->format( 'j-M-Y' );

		$all_dates[ $row_date ] = $row_date;
		$all_sales[ $row_date ] = str_replace( ',', '', number_format( $chart_row->earnings, 2 ) );
	}

	foreach ( $all_dates as $row_date ) {
		$chart_labels[]   = $row_date;
		$chart_earnings[] = $all_sales[ $row_date ];
	}
	?>
	var edd_enhanced_sales_reports_chart_data = {
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
