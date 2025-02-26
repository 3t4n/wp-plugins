<?php

/**
 * MoMO ACG WC - Insights Sales
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.5
 */
$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );
$time_filter = ( isset( $momo_acgwc_insights_settings['time_filter'] ) ? $momo_acgwc_insights_settings['time_filter'] : 'monthly' );
global $momoacgwc;
$sales_data = $momoacgwc->instfn->get_sales_trends_data( $time_filter );
?>
<div class="momo-admin-content-box">
	<div class="momo-be-table-header">
		<h3><?php 
esc_html_e( 'WooAI Insights : Sales', 'momoacgwc' );
?></h3>
	</div>
	<div class="momo-ms-admin-content-main momoacgwc-insights-dashboard" id="momoacgwc-insights-dashboard">
		<div class="momo-be-msg-block"></div>
		<div class="momo-be-block-section">
			<section class="momo-dashboard-sales momo-dashboard-section">
				<!-- Sales Insights: Trends, Top Products -->

				<!-- Recent Sales -->
				<div class="momo-sales-card momo-dashboard-card" id="recent-sales">
					<i class="bx bx-time"></i>
					<h2><?php 
esc_html_e( 'Recent Sales', 'momoacgwc' );
?></h2>
					<table class="recent-sales-table">
						<thead>
							<tr>
								<th><?php 
esc_html_e( 'Date', 'momoacgwc' );
?></th>
								<th><?php 
esc_html_e( 'Total', 'momoacgwc' );
?></th>
								<th><?php 
esc_html_e( 'Customer', 'momoacgwc' );
?></th>
							</tr>
						</thead>
						<tbody>
							<?php 
$recent_sales = $momoacgwc->instfn->get_recent_sales( 5, $time_filter );
foreach ( $recent_sales as $sale ) {
    echo '<tr><td>' . esc_html( $sale['date'] ) . '</td><td>' . wc_price( $sale['total'] ) . '</td><td>' . esc_html( $sale['customer'] ) . '</td></tr>';
}
?>
						</tbody>
					</table>
				</div>

				<!-- Top-Selling Products -->
				<div class="momo-sales-card momo-dashboard-card" id="top-products">
					<i class="bx bx-star"></i>
					<h2><?php 
esc_html_e( 'Top-Selling Products', 'momoacgwc' );
?></h2>
					<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
					<ul class="top-products-list">
						<?php 
$top_products = $momoacgwc->instfn->get_top_selling_products( 5, $time_filter );
foreach ( $top_products as $product ) {
    ?>
							<li>
								<i class="bx bx-check-circle"></i> <?php 
    echo esc_html( $product['name'] );
    ?> - <?php 
    echo wc_price( $product['price'] );
    ?> - <span class="highlight-count"><?php 
    echo esc_html( $product['total_sales'] );
    ?></span>
							</li>
							<?php 
}
?>
					</ul>
				</div>

				<!-- Sales Trends -->
				<div class="momo-sales-card momo-dashboard-card" id="sales-trends">
					<i class="bx bx-line-chart"></i>
					<h2><?php 
esc_html_e( 'Sales Trends', 'momoacgwc' );
?></h2>
					<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
					<canvas id="sales-trends-chart"></canvas>
				</div>
			</section>
			<section class="momo-sales-metrics momo-dashboard-section">
				<div class="momo-dashboard-card" id="daily-sales-prediction">
					<h2><?php 
esc_html_e( 'Predicted Daily Sale(s)', 'momoacgwc' );
?></h2>
					<?php 
$message = esc_html__( 'Future daily sales prediction based on your historical data.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>
				<div class="momo-dashboard-card" id="monthly-sales-prediction">
					<h2><?php 
esc_html_e( 'Predicted Monthly Sale(s)', 'momoacgwc' );
?></h2>
					<?php 
$message = esc_html__( 'Future monthly sales prediction based on your historical data.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>
			</section>
		</div>
		<?php 
?>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const ctx = document.getElementById('sales-trends-chart').getContext('2d');
		const salesTrendsData = {
			labels: <?php 
echo wp_json_encode( $sales_data['labels'] );
?>,
			datasets: [{
				label: 'Sales Trends',
				data: <?php 
echo wp_json_encode( $sales_data['data'] );
?>,
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}]
		};

		new Chart(ctx, {
			type: 'line',
			data: salesTrendsData,
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	});
</script>
