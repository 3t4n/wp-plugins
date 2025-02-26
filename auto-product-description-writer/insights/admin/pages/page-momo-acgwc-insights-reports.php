<?php

/**
 * MoMO ACG WC - Insights Report
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.5
 */
global $momoacgwc;
$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );
$time_filter = ( isset( $momo_acgwc_insights_settings['time_filter'] ) ? $momo_acgwc_insights_settings['time_filter'] : 'monthly' );
$overall_insights = $momoacgwc->instfn->momo_get_cached_insight(
    'momo_overall_insights_' . $time_filter,
    array($momoacgwc->instapi, 'get_overall_insights_data'),
    DAY_IN_SECONDS,
    $time_filter
);
$insights = ( isset( $overall_insights['insights'] ) ? $overall_insights['insights'] : array() );
$recommendations = ( isset( $overall_insights['recommendation'] ) ? $overall_insights['recommendation'] : array() );
if ( empty( $recommendations ) ) {
    $recommendations = ( isset( $overall_insights['recommendations'] ) ? $overall_insights['recommendations'] : array() );
}
$graph_data = ( isset( $overall_insights['graph_data'] ) ? $overall_insights['graph_data'] : array() );
$ordervsrevenue = $momoacgwc->instfn->momo_get_revenue_vs_orders_data();
?>
<div class="momo-admin-content-box">
	<div class="momo-be-table-header">
		<h3><?php 
esc_html_e( 'WooAI Insights : Report', 'momoacgwc' );
?></h3>
	</div>
	<div class="momo-ms-admin-content-main momoacgwc-insights-customer" id="momoacgwc-insights-customer">
		<div class="momo-be-msg-block"></div>
		<section class="momo-dashboard-reports momo-dashboard-section">

			<div class="momo-report-card momo-dashboard-card" id="revenue-orders-chart">
				<div class="card-icon"><i class="bx bx-bar-chart-alt-2"></i></div>
				<h2><?php 
esc_html_e( 'Order and Revenue Report', 'momoacgwc' );
?></h2>
				<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
				<canvas id="revenueOrdersChart"></canvas>
			</div>
			<!-- Category Performance -->
			<div class="momo-report-card momo-dashboard-card" id="category-performance">
				<div class="card-icon"><i class="bx bx-category"></i></div>
					<h2><?php 
esc_html_e( 'Category Performance', 'momoacgwc' );
?></h2>
					<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
						<?php 
$category_performance = $momoacgwc->instfn->momo_get_category_performance( $time_filter );
$categories = array();
$revenue_data = array();
$order_data = array();
foreach ( $category_performance as $category ) {
    $categories[] = $category['category_name'];
    $revenue_data[] = $category['total_revenue'];
    $order_data[] = $category['total_orders'];
}
?>
					<canvas id="categoryPerformanceChart"></canvas>
				</div>
			</div>
		</section>
		<section class="momo-dashboard-reports momo-dashboard-section">
			<!-- Insights Section -->
			<div class="momo-report-card momo-dashboard-card">
				<div class="card-icon"><i class="bx bx-line-chart"></i></div>
				<h2><?php 
esc_html_e( 'Insights', 'momoacgwc' );
?></h2>
				<?php 
$message = esc_html__( 'Revenue, orders, weekly sales and monthly sales insights for AI.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
			</div>

			<!-- Recommendations Section -->
			<div class="momo-report-card momo-dashboard-card">
				<div class="card-icon"><i class="bx bx-bulb"></i></div>
				<h2><?php 
esc_html_e( 'Recommendations', 'momoacgwc' );
?></h2>
				<?php 
$message = esc_html__( 'AI recommendations of growth and improvements.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
			</div>
		</section>
		<section class="momo-dashboard-reports momo-dashboard-section">
			<div class="momo-report-card momo-dashboard-card">
				<div class="card-icon"><i class="bx bx-line-chart"></i></div>
				<h2><?php 
esc_html_e( 'Revenue vs Orders Forecast', 'momoacgwc' );
?></h2>
				<?php 
$message = esc_html__( 'Forecasted chart for revenue vs orders.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
			</div>
		</section>
	</div>
	<?php 
?>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		// JavaScript (enqueue this in your plugin admin.js)
		const ctx = document.getElementById('revenueOrdersChart').getContext('2d');
		const revenueOrdersData = <?php 
echo json_encode( $ordervsrevenue );
?>;
		console.log(revenueOrdersData);
		const labels = revenueOrdersData.labels;
		const revenue = revenueOrdersData.revenue;
		const orders = revenueOrdersData.orders;
		console.log(labels);
		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: [
					{
						label: 'Revenue',
						data: revenue,
						backgroundColor: 'rgba(75, 192, 192, 0.5)',
						borderColor: 'rgba(75, 192, 192, 1)',
						borderWidth: 1,
					},
					{
						label: 'Orders',
						data: orders,
						backgroundColor: 'rgba(153, 102, 255, 0.5)',
						borderColor: 'rgba(153, 102, 255, 1)',
						borderWidth: 1,
					},
				],
			},
		});

		var ctxs = document.getElementById('categoryPerformanceChart').getContext('2d');
		var categoryPerformanceChart = new Chart(ctxs, {
			type: 'bar', // Type of chart
			data: {
				labels: <?php 
echo json_encode( $categories );
?>, // Category names
				datasets: [
					{
						label: 'Revenue by Category',
						data: <?php 
echo json_encode( $revenue_data );
?>, // Total revenue data
						backgroundColor: 'rgba(54, 162, 235, 0.2)', // Bar color
						borderColor: 'rgba(54, 162, 235, 1)', // Border color
						borderWidth: 1
					},
					{
						label: 'Orders by Category',
						data: <?php 
echo json_encode( $order_data );
?>, // Total orders data
						backgroundColor: 'rgba(255, 159, 64, 0.2)', // Different bar color
						borderColor: 'rgba(255, 159, 64, 1)', // Border color for orders
						borderWidth: 1
					}
				]
			},
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	});
</script>
