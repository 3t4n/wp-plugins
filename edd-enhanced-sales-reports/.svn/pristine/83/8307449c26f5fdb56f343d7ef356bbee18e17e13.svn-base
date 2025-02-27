<?php
/**
 * Reporting Page
 *
 * @package     EDD_Enhanced_Sales_Reports\Reporting
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$edd_enhanced_sales_reports_current_page = 'dashboard';

$edd_enhanced_sales_reports_sub_pages = array(
	'dashboard'           => esc_html__( 'Dashboard', 'edd-enhanced-sales-reports' ),
	'by-product'          => esc_html__( 'Products', 'edd-enhanced-sales-reports' ),
	'by-ordered-products' => esc_html__( 'Ordered Products', 'edd-enhanced-sales-reports' ),
	'by-customer'         => esc_html__( 'Customers', 'edd-enhanced-sales-reports' ),
);


$edd_enhanced_sales_reports_sub_pages = array_merge(
	$edd_enhanced_sales_reports_sub_pages,
	array(
		'settings'   => esc_html__( 'Settings', 'edd-enhanced-sales-reports' ),
		'more'       => esc_html__( 'More', 'edd-enhanced-sales-reports' ),
	)
);

if ( isset( $_GET['sub-page'] ) && array_key_exists( sanitize_text_field( wp_unslash( $_GET['sub-page'] ) ), $edd_enhanced_sales_reports_sub_pages ) ) {
	$edd_enhanced_sales_reports_current_page = sanitize_text_field( wp_unslash( $_GET['sub-page'] ) );
}

$start_date = gmdate( 'Y-m-d', strtotime( 'first day of this month' ) );
$end_date   = gmdate( 'Y-m-d' );

if ( isset( $_GET['filter_date_range'] ) ) {
	$filter_date = explode( ' - ', sanitize_text_field( wp_unslash( $_GET['filter_date_range'] ) ) );

	$start_date = DateTime::createFromFormat( 'Y-m-d', $filter_date[0] );
	$end_date   = DateTime::createFromFormat( 'Y-m-d', $filter_date[1] );

	if ( $start_date ) {
		$start_date = $start_date->format( 'Y-m-d' );
	} else {
		$start_date = gmdate( 'Y-m-d', strtotime( $filter_date[0] ) );
	}

	if ( $end_date ) {
		$end_date = $end_date->format( 'Y-m-d' );
	} else {
		$end_date = gmdate( 'Y-m-d', strtotime( $filter_date[1] ) );
	}
}

$currency = edd_currency_symbol();

$edd_enhanced_sales_reports_current_query_string = '&filter_date_range=' . $start_date . ' - ' . $end_date;


?>
<div class="wrap">
	<div class="edd-enhanced-sales-reports-reporting-page">
		<h1><?php esc_html_e( 'Enhanced Sales Reports', 'edd-enhanced-sales-reports' ); ?></h1>

		<?php do_action( 'edd_enhanced_sales_reports_after_settings_title' ); ?>

		<div class="edd-enhanced-sales-reports-tabs">
			<div class="edd-enhanced-sales-reports-tabs-headings">
				<?php foreach ( $edd_enhanced_sales_reports_sub_pages as $sub_page_slug => $sub_page_name ) : ?>
					<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=<?php echo esc_html( $sub_page_slug ); ?><?php echo esc_html( $edd_enhanced_sales_reports_current_query_string ); ?>"
					   class="<?php echo( $sub_page_slug === $edd_enhanced_sales_reports_current_page ? 'active' : '' ); ?>"><?php echo esc_html( $sub_page_name ); ?></a>
				<?php endforeach; ?>
				<a href="https://www.pluginsandsnippets.com/downloads/edd-enhanced-sales-reports-pro/" target="_blank" class="edd-enhanced-sales-reports-tab-pro-heading"><?php esc_html_e( 'Upgrade to Pro', 'edd-enhanced-sales-reports' ); ?></a>
			</div>
			<div class="edd-enhanced-sales-reports-tabs-contents">
				<?php
				$edd_sales_reports_current_report_file = EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/' . $edd_enhanced_sales_reports_current_page . '.php';
				if ( file_exists( $edd_sales_reports_current_report_file ) ) {
					require $edd_sales_reports_current_report_file;
				}
				?>
			</div>
		</div>

	</div>
</div>

<div class="edd-enhanced-sales-reports-reporting-modal-overlay"></div>
<div class="edd-enhanced-sales-reports-reporting-modal">
	<div class="edd-enhanced-sales-reports-reporting-modal-close"><i class="dashicons dashicons-no-alt"></i></div>
	<div class="edd-enhanced-sales-reports-reporting-body">
	</div>
</div>
