<?php
/**
 * MoMO ACG WC - Insights Customer
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.5
 */

global $momoacgwc;
$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );
$time_filter                  = isset( $momo_acgwc_insights_settings['time_filter'] ) ? $momo_acgwc_insights_settings['time_filter'] : 'monthly';
?>
<div class="momo-admin-content-box">
	<div class="momo-be-table-header">
		<h3><?php esc_html_e( 'WooAI Insights : Customer', 'momoacgwc' ); ?></h3>
	</div>
	<div class="momo-ms-admin-content-main momoacgwc-insights-customer" id="momoacgwc-insights-customer">
		<div class="momo-be-msg-block"></div>
		<section class="momo-dashboard-customers momo-dashboard-section">
			<!-- Customer Insights -->

			<!-- Top Customers by Spending -->
			<div class="momo-customer-card momo-dashboard-card" id="top-customers-spending">
				<div class="card-icon"><i class="bx bx-wallet"></i></div>
				<h2><?php esc_html_e( 'Top Customers by Spending', 'momoacgwc' ); ?></h2>
				<ul class="top-products-list">
					<?php
					$top_customers = $momoacgwc->instfn->get_top_customers_by_spending();
					foreach ( $top_customers as $customer ) {
						echo '<li>' . esc_html( $customer['name'] ) . ' - ' . wc_price( $customer['total_spent'] ) . '</li>';
					}
					?>
				</ul>
			</div>

			<!-- Most Frequent Customers -->
			<div class="momo-customer-card momo-dashboard-card" id="frequent-customers">
				<div class="card-icon"><i class="bx bx-repeat"></i></div>
				<h2><?php esc_html_e( 'Most Frequent Customers', 'momoacgwc' ); ?></h2>
				<ul class="top-products-list">
					<?php
					$frequent_customers = $momoacgwc->instfn->get_most_frequent_customers();
					foreach ( $frequent_customers as $customer ) {
						echo '<li>' . esc_html( $customer['name'] ) . ' - ' . esc_html( $customer['order_count'] ) . ' orders</li>';
					}
					?>
				</ul>
			</div>

			<!-- Recent Customer Activity -->
			<div class="momo-customer-card momo-dashboard-card" id="recent-customer-activity">
				<div class="card-icon"><i class="bx bx-calendar"></i></div>
				<h2><?php esc_html_e( 'Recent Customer Activity', 'momoacgwc' ); ?></h2>
				<ul class="top-products-list">
					<?php
					$recent_activity = $momoacgwc->instfn->get_recent_customer_activity();
					foreach ( $recent_activity as $activity ) {
						echo '<li>' . esc_html( $activity['name'] ) . ' - ' . esc_html( $activity['order_date'] ) . ' - ' . wc_price( $activity['total'] ) . '</li>';
					}
					?>
				</ul>
			</div>
		</section>
		<section  class="momo-dashboard-reports momo-dashboard-section">
			<div  class="momo-report-card momo-dashboard-card">
				<div class="card-icon"><i class="bx bx-pie-chart-alt"></i></div>
				<h2><?php esc_html_e( 'Customer Analysis', 'momoacgwc' ); ?></h2>
				<h4><?php echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) ); ?></h4>
				<?php
				$cohort_data = $momoacgwc->instfn->momo_get_customer_cohort_data_woocommerce( $time_filter);

				$labels              = $cohort_data['period'];
				$revenue_data        = $cohort_data['revenue'];
				$customer_count_data = $cohort_data['customer_count'];
				?>
				<canvas id="customerCohortChart"></canvas>
			</div>
		</section>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var ctx = document.getElementById("customerCohortChart").getContext("2d");
		ctx.width = 100; // Set width in pixels
		ctx.height = 200;
		var customerCohortChart = new Chart(ctx, {
			type: "line", // Line chart for cumulative revenue over time
			data: {
				labels: <?php echo json_encode( $labels ); ?>,
				datasets: [{
					label: "Cumulative Revenue",
					data: <?php echo wp_json_encode( $revenue_data ); ?>,
					borderColor: "rgba(75, 192, 192, 1)",
					fill: false,
				},
				{
					label: "Customer Count",
					data: <?php echo wp_json_encode( $customer_count_data ); ?>,
					borderColor: "rgba(153, 102, 255, 1)",
					fill: false,
					borderDash: [5, 5]
				}]
			},
			options: {
				responsive: true,
				scales: {
					x: {
						title: {
							display: true,
							text: "Signup Month"
						}
					},
					y: {
						title: {
							display: true,
							text: "Revenue / Customer Count"
						},
						ticks: {
							beginAtZero: true
						}
					}
				}
			}
		});
	});
</script>