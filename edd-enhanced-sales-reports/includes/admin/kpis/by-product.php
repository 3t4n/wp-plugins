<?php
/**
 * Generates KPIs on Products Report
 *
 * @package EDD_Enhanced_Sales_Reports
 * @version 1.0.0
 * */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/kpis/general-kpi-data.php';
?>

<div class="edd-enhanced-sales-reports-kpis">
	<?php require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/kpis/general-kpis.php'; ?>
	<div class="edd-enhanced-sales-reports-kpi">
		<strong><?php echo number_format( $total_paid_sales, 0 ); ?></strong>
		<span><?php esc_html_e( 'Paid Orders', 'edd-enhanced-sales-reports' ); ?></span>
	</div>
	<div class="edd-enhanced-sales-reports-kpi">
		<strong><?php echo number_format( $total_sales - $total_paid_sales, 0 ); ?></strong>
		<span><?php esc_html_e( 'Free Orders', 'edd-enhanced-sales-reports' ); ?></span>
	</div>
	<div class="edd-enhanced-sales-reports-kpi">
		<strong><?php echo number_format( $total_existing_customers, 0 ); ?></strong>
		<span><?php esc_html_e( 'Existing Customers', 'edd-enhanced-sales-reports' ); ?></span>
	</div>
	<?php
	$total_new_percentage      = 0;
	$total_existing_percentage = 0;
	if ( $total_customers > 0 ) {
		$total_new_percentage      = round( ( $total_new_customers * 100 ) / $total_customers );
		$total_existing_percentage = round( ( $total_existing_customers * 100 ) / $total_customers );
	}
	?>
	<div class="edd-enhanced-sales-reports-kpi">
		<strong><?php echo number_format( $total_new_percentage, 0 ); ?>%</strong>
		<span><?php esc_html_e( 'New Customers', 'edd-enhanced-sales-reports' ); ?></span>
	</div>
</div>
