<?php
/**
 * MoMO ACG WC - Insights Product
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
		<h3><?php esc_html_e( 'WooAI Insights : Product', 'momoacgwc' ); ?></h3>
	</div>
	<div class="momo-ms-admin-content-main momoacgwc-insights-dashboard" id="momoacgwc-insights-dashboard">
		<div class="momo-be-msg-block"></div>
		<div class="momo-be-block-section">
		<section class="momo-dashboard-products momo-dashboard-section">
			<!-- Product Insights -->

			<!-- Top Viewed Products -->
			<div class="momo-product-card momo-dashboard-card" id="top-viewed-products">
				<i class="bx bx-show"></i>
				<h2><?php esc_html_e( 'Top Viewed Products', 'momoacgwc' ); ?></h2>
				<ul class="top-products-list">
					<?php
					$top_viewed_products = $momoacgwc->instfn->get_top_viewed_products( 5, $time_filter );
					foreach ( $top_viewed_products as $product ) {
						echo '<li>
							<span class="product-name">' . esc_html( $product['name'] ) . '</span> - 
							<span class="product-price">' . wc_price( $product['price'] ) . '</span> 
							<span class="product-views"><span class="highlight-count">' . esc_html( $product['views'] ) . '</span> views</span>
						</li>';
					}
					?>
				</ul>
			</div>

			<!-- Low Stock Products -->
			<div class="momo-product-card momo-dashboard-card" id="low-stock-products">
				<i class="bx bx-cube"></i>
				<h2><?php esc_html_e( 'Low Stock Products', 'momoacgwc' ); ?></h2>
				<ul class="top-products-list">
					<?php
					$low_stock_products = $momoacgwc->instfn->get_low_stock_products();
					foreach ( $low_stock_products as $product ) {
						?>
						<li>
							<span class="product-name"><?php echo esc_html( $product['name'] ); ?></span> - 
							<span class="product-price"><?php echo wc_price( $product['price'] ); ?></span> 
							<span class="product-stock">
								<span class="highlight-count <?php echo ( $product['stock'] < 0 ) ? 'minus' : ''; ?>">
									<?php echo esc_html( $product['stock'] ); ?>
								</span>&nbsp;&nbsp;<?php esc_html_e( 'left', 'momoacgwc' ); ?> 
							</span>
						</li>
						<?php
					}
					?>
				</ul>
			</div>

			<!-- Top Rated Products -->
			<div class="momo-product-card momo-dashboard-card" id="top-rated-products">
				<i class="bx bx-star"></i>
				<h2><?php esc_html_e( 'Top Rated Products', 'momoacgwc' ); ?></h2>
				<ul class="top-products-list">
					<?php
					$top_rated_products = $momoacgwc->instfn->get_top_rated_products();
					foreach ( $top_rated_products as $product ) {
						?>
						<li>
							<span class="product-name"><?php echo esc_html( $product['name'] ); ?></span> - 
							<span class="product-price"><?php echo wc_price( $product['price'] ); ?></span> 
							<span class="product-rating">
								<span class="highlight-count ratings">
									<?php echo esc_html( $product['rating'] ); ?>
								</span>&nbsp;&nbsp;<?php esc_html_e( 'stars', 'momoacgwc' ); ?>
							</span>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</section>
		<section  class="momo-dashboard-reports momo-dashboard-section">
			<div  class="momo-report-card momo-dashboard-card">
				<div class="card-icon"><i class="bx bx-receipt"></i></div>
				<h2><?php esc_html_e( 'Refund and Return', 'momoacgwc' ); ?></h2>
				<?php
				$refund_data = $momoacgwc->instfn->momo_get_refund_and_returns_data( $time_filter );

				// Aggregate refunds by month and reason
				$aggregated_data = $momoacgwc->instfn->momo_aggregate_refunds_by_timeframe( $refund_data, $time_filter );

				$refund_labels = $aggregated_data['labels'];
				$refund_data   = $aggregated_data['data'];
				?>
				<canvas id="refundAnalysisChart"></canvas>
			</div>
		</section>
		</div>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		// Use the localized data passed from PHP to JavaScript
		const chartLabels = <?php echo wp_json_encode( $refund_labels ); ?>;
		const chartData = <?php echo wp_json_encode( $refund_data ); ?>

		// Create a new Chart.js chart
		const ctx = document.getElementById('refundAnalysisChart').getContext('2d');
		const refundChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: chartLabels,
				datasets: [{
					label: 'Refund Amount',
					data: chartData,
					borderColor: 'rgba(75, 192, 192, 1)',
					backgroundColor: 'rgba(75, 192, 192, 0.2)',
					fill: true,  // Set to true for filled area under the line
					tension: 0.4, // Line smoothness
				}]
			},
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true,
						title: {
							display: true,
							text: 'Refund Amount'
						}
					},
					x: {
						title: {
							display: true,
							text: 'Time Period'
						}
					}
				},
				plugins: {
					tooltip: {
						callbacks: {
							label: function(tooltipItem) {
								return 'Refund: ' + tooltipItem.raw.toFixed(2);
							}
						}
					}
				}
			}
		});
	});
</script>