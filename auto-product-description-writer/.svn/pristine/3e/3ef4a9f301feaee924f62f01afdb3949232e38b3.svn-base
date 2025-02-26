<?php

/**
 * MoMO ACG WC - Insights Dashboard
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.5
 */
global $momoacgwc;
$momo_acgwc_insights_settings = get_option( 'momo_acgwc_insights_settings' );
$time_filter = ( isset( $momo_acgwc_insights_settings['time_filter'] ) ? $momo_acgwc_insights_settings['time_filter'] : 'monthly' );
?>
<div class="momo-admin-content-box">
	<div class="momo-be-table-header">
		<h3><?php 
esc_html_e( 'WooAI Insights : Overview', 'momoacgwc' );
?></h3>
	</div>
	<div class="momo-ms-admin-content-main momoacgwc-insights-dashboard" id="momoacgwc-insights-dashboard">
		<div class="momo-be-msg-block"></div>
		<div class="momo-be-block-section">
			<!-- Metrics Overview Cards -->
			<section class="momo-dashboard-metrics momo-dashboard-section">
				<!-- Total Revenue Card -->
				<div class="momo-dashboard-card" id="total-revenue-card">
					<i class="bx bx-money" aria-hidden="true"></i>
					<h2><?php 
esc_html_e( 'Total Revenue', 'momoacgwc' );
?></h2>
					<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
					<span class="revenue-amount" style="margin-bottom:12px;"><?php 
echo wp_kses_post( wc_price( $momoacgwc->instfn->get_total_revenue( $time_filter ) ) );
?></span>
					<?php 
$message = esc_html__( 'AI insights are available in the Pro version.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>

				<!-- Total Orders Card -->
				<div class="momo-dashboard-card" id="total-orders-card">
					<i class="bx bx-cart" aria-hidden="true"></i>
					<h2><?php 
esc_html_e( 'Total Orders', 'momoacgwc' );
?></h2>
					<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
					<span class="order-count" style="margin-bottom:12px;"><?php 
echo wp_kses_post( $momoacgwc->instfn->get_total_orders( $time_filter ) );
?></span>
					<?php 
$message = esc_html__( 'AI insights are available in the Pro version.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>

				<!-- Average Order Value -->
				<div class="momo-dashboard-card" id="active-products-card">
					<i class="bx bx-wallet" aria-hidden="true"></i>
					<h2><?php 
esc_html_e( 'Average Order Value', 'momoacgwc' );
?></h2>
					<h4><?php 
echo esc_html( $momoacgwc->instfn->momo_get_date_range_text( $time_filter ) );
?></h4>
					<span class="average-order" style="margin-bottom:12px;"><?php 
echo wp_kses_post( wc_price( $momoacgwc->instfn->get_average_order_value( $time_filter ) ) );
?></span>
					<?php 
$message = esc_html__( 'AI insights are available in the Pro version.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>

			</section>
			<section class="momo-dashboard-metrics momo-dashboard-section">
				<div class="momo-dashboard-card" id="total-revenue-card-prediction">
					<h2><?php 
esc_html_e( 'Predicted Revenue(s)', 'momoacgwc' );
?> </h2>
					<?php 
$message = esc_html__( 'Predicted revenue chart.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>
				<div class="momo-dashboard-card" id="total-order-card-prediction">
					<h2><?php 
esc_html_e( 'Predicted Order(s)', 'momoacgwc' );
?></h2>
					<?php 
$message = esc_html__( 'Predicted order chart.', 'momoacgwc' );
$momoacgwc->instfn->momo_display_pro_notice( $message );
?>
				</div>
			</section>
			<!-- Metrics Prediction Cards -->
			
		</div>
		<?php 
?>
	</div>
</div>
