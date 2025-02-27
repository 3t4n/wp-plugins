<?php
/**
 * Generates Dashboard Page
 *
 * @package     EDD_Enhanced_Sales_Reports\ByProduct
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;
require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/filtering-fields.php';

$lookup_table = $wpdb->prefix . 'enhanced_sales_report';
$total_sales  = $wpdb->get_var(
	// $lookup_table is excluded from PHPCS due to false flag
	$wpdb->prepare(
		"SELECT count(order_id)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$total_earnings = $wpdb->get_var(
	// $lookup_table is excluded from PHPCS due to false flag
	$wpdb->prepare(
		"SELECT SUM(product_total)
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$unique_customers = $wpdb->get_var(
	// $lookup_table is excluded from PHPCS due to false flag
	$wpdb->prepare(
		"SELECT COUNT( DISTINCT customer_id )
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	)
);

$average_order_amount = 0;
if ( $total_sales > 0 ) {
	$average_order_amount = $total_earnings / $total_sales;
}

require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/kpis/general-kpi-data.php';
?>

	<div class="edd-enhanced-sales-reports-kpis">
		<?php require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/kpis/general-kpis.php'; ?>
	</div>

<?php
$query =
	// $lookup_table is excluded from PHPCS due to false flag.
	$wpdb->prepare(
		"SELECT product_id, product_name, SUM(product_total) AS total_amount, COUNT(order_id) as total_sales
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s GROUP BY product_id ORDER BY total_amount DESC LIMIT 10", //phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	);

// phpcs disabled as the $query is already passed from $wpdb::prepare above.
$top_items = $wpdb->get_results( $query ); // phpcs:ignore

$query =
	// $lookup_table is excluded from PHPCS due to false flag.
	$wpdb->prepare(
		"SELECT customer_id, SUM(product_total) AS total_amount, COUNT(order_id) as total_sales
		FROM {$lookup_table} WHERE order_date BETWEEN %s AND %s GROUP BY customer_id ORDER BY total_amount DESC LIMIT 10", // phpcs:ignore
		$start_date,
		$end_date . ' 23:59:59'
	);

// phpcs disabled as the $query is already passed from $wpdb::prepare above.
$top_customers = $wpdb->get_results( $query ); // phpcs:ignore

$admin_url = admin_url( '/' );

$all_countries = edd_enhances_sales_reports__get_countries();
?>

	<div class="edd-enhanced-sales-reports-top-charts">
		<div class="edd-enhanced-sales-reports-top-chart">
			<div class="edd-enhanced-sales-reports-top-chart-header">
				<h3><?php esc_html_e( 'Top Products', 'edd-enhanced-sales-reports' ); ?></h3>
				<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-product"
				   class="button"><?php esc_html_e( 'View All', 'edd-enhanced-sales-reports' ); ?></a>
			</div>
			<table>
				<thead>
				<tr>
					<th class="edd-esr-align-right"><?php esc_html_e( 'ID', 'edd-enhanced-sales-reports' ); ?></th>
					<th><?php esc_html_e( 'Name', 'edd-enhanced-sales-reports' ); ?></th>
					<th class="edd-esr-align-right"><?php esc_html_e( 'Sales', 'edd-enhanced-sales-reports' ); ?></th>
					<th class="edd-esr-align-right"><?php esc_html_e( 'Earnings', 'edd-enhanced-sales-reports' ); ?></th>
				</tr>
				</thead>
				<tbody>
				<?php if ( count( $top_items ) > 0 ) : ?>
					<?php foreach ( $top_items as $index => $item ) : ?>
						<tr class="<?php echo( 0 === $index % 2 ? 'even' : 'odd' ); ?>">
							<td class="edd-esr-align-right"><a
										href="<?php echo esc_url( $admin_url . 'post.php?post=' . $item->product_id . '&action=edit' ); ?>"><?php echo esc_html( $item->product_id ); ?></a>
							</td>
							<td>
								<a href="<?php echo esc_url( get_permalink( $item->product_id ) ); ?>"><?php echo esc_html( edd_enhanced_sales_reports_strip_product_option( $item->product_name ) ); ?></a>
							</td>
							<td class="edd-esr-align-right"><?php echo esc_html( number_format( $item->total_sales, 0 ) ); ?></td>
							<td class="edd-esr-align-right"><?php echo esc_html( $currency . number_format( $item->total_amount, 2 ) ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="4"><?php esc_html_e( 'No data found', 'edd-enhanced-sales-reports' ); ?></td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>

		<div class="edd-enhanced-sales-reports-top-chart">
			<div class="edd-enhanced-sales-reports-top-chart-header">
				<h3><?php esc_html_e( 'Top Customers', 'edd-enhanced-sales-reports' ); ?></h3>
				<a href="edit.php?post_type=download&page=edd-enhanced-sales-reports&sub-page=by-customer"
				   class="button"><?php esc_html_e( 'View All', 'edd-enhanced-sales-reports' ); ?></a>
			</div>
			<table>
				<thead>
				<tr>
					<th class="edd-esr-align-right">ID</th>
					<th>Name</th>
					<th class="edd-esr-align-right">Sales</th>
					<th class="edd-esr-align-right">Earnings</th>
				</tr>
				</thead>
				<tbody>
				<?php if ( count( $top_customers ) > 0 ) : ?>
					<?php
					$customer_ids = array();
					foreach ( $top_customers as $customer ) {
						$customer_ids[] = intval( $customer->customer_id );
					}

					// $customer_ids is sanitized by typecasting to integers above already.
					$customers_query = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}edd_customers WHERE id IN (" . implode( ',', $customer_ids ) . ')' ); // phpcs:ignore

					$customers_ids_map = array();
					foreach ( $customers_query as $customer ) {
						$customers_ids_map[ $customer->id ] = $customer->name;
					}
					?>
					<?php foreach ( $top_customers as $index => $item ) : ?>
						<?php
						$customer_url = $admin_url . 'edit.php?post_type=download&page=edd-customers&view=overview&id=' . $item->customer_id;
						?>
						<tr class="<?php echo( 0 === $index % 2 ? 'even' : 'odd' ); ?>">
							<td class="edd-esr-align-right"><a
										href="<?php echo esc_url( $customer_url ); ?>"><?php echo esc_html( $item->customer_id ); ?></a></td>
							<td>
								<a href="<?php echo esc_url( $customer_url ); ?>"><?php echo isset( $customers_ids_map[ $item->customer_id ] ) ? esc_html( $customers_ids_map[ $item->customer_id ] ) : esc_html__( '(Unknown)', 'edd-enhanced-sales-reports' ); ?></a>
							</td>
							<td class="edd-esr-align-right"><?php echo esc_html( number_format( $item->total_sales, 0 ) ); ?></td>
							<td class="edd-esr-align-right"><?php echo esc_html( $currency . number_format( $item->total_amount, 2 ) ); ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="4"><?php esc_html_e( 'No data found', 'edd-enhanced-sales-reports' ); ?></td>
					</tr>
				<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>

<?php
// $lookup_table is false flagged by PHPCS
$total_sales = $wpdb->get_var(
	"SELECT count(order_id) FROM {$lookup_table}" // phpcs:ignore
);

// $lookup_table is false flagged by PHPCS
$total_earnings = $wpdb->get_var(
	"SELECT SUM(product_total) FROM {$lookup_table}" // phpcs:ignore
);

// $lookup_table is false flagged by PHPCS
$unique_customers = $wpdb->get_var(
	"SELECT COUNT( DISTINCT customer_id ) FROM {$lookup_table}" // phpcs:ignore
);

$average_order_amount = 0;
if ( $total_sales > 0 ) {
	$average_order_amount = $total_earnings / $total_sales;
}
?>
