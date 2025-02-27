<?php
/**
 * Generates Filtering Fields on All but Subscription Report
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

$products  = $wpdb->get_results( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type='download' AND post_status='publish'" );
$vendors   = $wpdb->get_col( "SELECT DISTINCT author_id FROM {$wpdb->prefix}enhanced_sales_report" );
$countries = edd_enhances_sales_reports__get_countries();
$vendors   = EDD_Enhanced_Sales_Reports_Admin::get_vendor_names( $vendors );
$gateways  = EDD_Enhanced_Sales_Reports_Admin::get_gateways_options();
?>
	<form method="GET">
		<div class="edd-enhanced-sales-reports-form-row">
			<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
				<label for="edd-enhanced-sales-reports-date-range"><?php esc_html_e( 'Range of Date', 'edd-enhanced-sales-reports' ); ?></label>
				<div class="edd-enhanced-sales-reports-form-field-control">
					<input type="text" id="edd-enhanced-sales-reports-date-range" name="filter_date_range"
						   data-edd-enhanced-sales-reporting-range
						   value="<?php echo esc_attr( $start_date ); ?> - <?php echo esc_attr( $end_date ); ?>">
				</div>
			</div>
		</div>
		<?php if ( 'dashboard' !== $edd_enhanced_sales_reports_current_page ) : ?>

			<div class="edd-enhanced-sales-reports-form-filters-wrap" style="display: none;">
				<div class="edd-enhanced-sales-reports-form-row">
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-form-product"><?php esc_html_e( 'By Product', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select data-edd-enhanced-sales-reporting-selectbox multiple name="filter_products[]"
									id="edd-enhanced-sales-reports-form-product">
								<?php foreach ( $products as $product ) : ?>
									<option value="<?php echo esc_attr( $product->ID ); ?>" <?php echo( isset( $_GET['filter_products'] ) && is_array( $_GET['filter_products'] ) && in_array( $product->ID, $_GET['filter_products'] ) ? 'selected' : '' ); ?>><?php echo esc_html( $product->post_title ); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-form-country"><?php esc_html_e( 'By Country', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select data-edd-enhanced-sales-reporting-selectbox multiple name="filter_countries[]"
									id="edd-enhanced-sales-reports-form-country">
								<?php foreach ( $countries as $country_code => $country_name ) : ?>
									<option value="<?php echo esc_attr( $country_code ); ?>"><?php echo esc_html( $country_name ); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<div class="edd-enhanced-sales-reports-form-row">
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-earnings"><?php esc_html_e( 'Earnings', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<div class="edd-enhanced-sales-reports-earnings-range">
								<input type="number" id="edd-enhanced-sales-reports-earnings"
									   value="<?php echo( isset( $_GET['earnings_from'] ) && ! empty( $_GET['earnings_from'] ) ? floatval( $_GET['earnings_from'] ) : '' ); ?>"
									   name="earnings_from"
									   placeholder="<?php esc_html_e( 'From', 'edd-enhanced-sales-reports' ); ?>">
								<input type="number"
									   value="<?php echo( isset( $_GET['earnings_to'] ) && ! empty( $_GET['earnings_to'] ) ? floatval( $_GET['earnings_to'] ) : '' ); ?>"
									   name="earnings_to"
									   placeholder="<?php esc_html_e( 'To', 'edd-enhanced-sales-reports' ); ?>">
							</div>
						</div>
					</div>
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-form-vendor"><?php esc_html_e( 'By Author', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select data-edd-enhanced-sales-reporting-selectbox multiple name="filter_vendors[]"
									id="edd-enhanced-sales-reports-form-vendor">
								<?php foreach ( $vendors as $vendor_id => $vendor_name ) : ?>
									<?php
									// Skip Unknown names.
									if ( stristr( $vendor_name, 'unknown' ) ) {
										continue;
									}
									?>
									<option value="<?php echo esc_attr( $vendor_id ); ?>" <?php echo( isset( $_GET['filter_vendors'] ) && in_array( $vendor_id, $_GET['filter_vendors'] ) ? 'selected' : '' ); ?>><?php echo esc_html( $vendor_name ); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<div class="edd-enhanced-sales-reports-form-row">
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-order-value"><?php esc_html_e( 'Order Value', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<div class="edd-enhanced-sales-reports-earnings-range">
								<input type="number" id="edd-enhanced-sales-reports-order-value"
									   value="<?php echo ( isset( $_GET['order_value_from'] ) && ! empty( $_GET['order_value_from'] ) ? floatval( $_GET['order_value_from'] ) : '' ); ?>"
									   name="order_value_from"
									   placeholder="<?php esc_html_e( 'From', 'edd-enhanced-sales-reports' ); ?>">
								<input type="number"
									   value="<?php echo( isset( $_GET['order_value_to'] ) && ! empty( $_GET['order_value_to'] ) ? floatval( $_GET['order_value_to'] ) : '' ); ?>"
									   name="order_value_to"
									   placeholder="<?php esc_html_e( 'To', 'edd-enhanced-sales-reports' ); ?>">
							</div>
						</div>
					</div>

					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-tax"><?php esc_html_e( 'Taxes', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select name="tax" id="edd-enhanced-sales-reports-tax">
								<option value="all" <?php echo( isset( $_GET['tax'] ) && 'all' === $_GET['tax'] ? 'selected' : '' ); ?>><?php esc_html_e( 'All', 'edd-enhanced-sales-reports' ); ?></option>
								<option value="with_tax" <?php echo( isset( $_GET['tax'] ) && 'with_tax' === $_GET['tax'] ? 'selected' : '' ); ?>><?php esc_html_e( 'With Tax', 'edd-enhanced-sales-reports' ); ?></option>
								<option value="no_tax" <?php echo( isset( $_GET['tax'] ) && 'no_tax' === $_GET['tax'] ? 'selected' : '' ); ?>><?php esc_html_e( 'No Tax', 'edd-enhanced-sales-reports' ); ?></option>
							</select>
						</div>
					</div>

				</div>

				<div class="edd-enhanced-sales-reports-form-row">
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-sale-type"><?php esc_html_e( 'Sale Type', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select name="sale_type" id="edd-enhanced-sales-reports-sale-type">
								<option value="both" <?php echo( isset( $_GET['sale_type'] ) && 'both' === $_GET['sale_type'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Free and Paid', 'edd-enhanced-sales-reports' ); ?></option>
								<option value="free" <?php echo( isset( $_GET['sale_type'] ) && 'free' === $_GET['sale_type'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Free Only', 'edd-enhanced-sales-reports' ); ?></option>
								<option value="paid" <?php echo( isset( $_GET['sale_type'] ) && 'paid' === $_GET['sale_type'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Paid Only', 'edd-enhanced-sales-reports' ); ?></option>
							</select>
						</div>
					</div>
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-gateway"><?php esc_html_e( 'Payment Gateway', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select name="gateway" id="edd-enhanced-sales-reports-gateway">
								<option value="all"><?php esc_html_e( 'All', 'edd-enhanced-sales-reports' ); ?></option>
								<?php foreach ( $gateways as $gateway_internal_name => $gateway_title ) : ?>
									<option value="<?php echo esc_attr( $gateway_internal_name ); ?>" <?php echo( isset( $_GET['gateway'] ) && $_GET['gateway'] === $gateway_internal_name ? 'selected' : '' ); ?>><?php echo esc_html( $gateway_title ); ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</div>

				<?php if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE || EDD_ENHANCED_SALES_REPORTS_SUBSCRIPTIONS_ACTIVE ) : ?>
					<div class="edd-enhanced-sales-reports-form-row">
						<?php if ( EDD_ENHANCED_SALES_REPORTS_COMMISSIONS_ACTIVE ) : ?>
							<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
								<label for="edd-enhanced-sales-reports-sale-type"><?php esc_html_e( 'Commission', 'edd-enhanced-sales-reports' ); ?></label>
								<div class="edd-enhanced-sales-reports-form-field-control">
									<select name="commission" id="edd-enhanced-sales-reports-sale-type">
										<option value="both" <?php echo( isset( $_GET['commission'] ) && 'both' === $_GET['commission'] ? 'selected' : '' ); ?>><?php esc_html_e( 'With and Without Commissions', 'edd-enhanced-sales-reports' ); ?></option>
										<option value="has_commissions" <?php echo( isset( $_GET['commission'] ) && 'has_commissions' === $_GET['commission'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Has Commissions', 'edd-enhanced-sales-reports' ); ?></option>
										<option value="without_commissions" <?php echo( isset( $_GET['commission'] ) && 'without_commissions' === $_GET['commission'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Without Commissions', 'edd-enhanced-sales-reports' ); ?></option>
									</select>
								</div>
							</div>
						<?php endif; ?>

						<?php if ( ! isset( $GLOBALS['edd_sales_reports_limit_subscriptions'] ) && EDD_ENHANCED_SALES_REPORTS_SUBSCRIPTIONS_ACTIVE ) : ?>
							<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
								<label for="edd-enhanced-sales-reports-subscription"><?php esc_html_e( 'Subscriptions', 'edd-enhanced-sales-reports' ); ?></label>
								<div class="edd-enhanced-sales-reports-form-field-control">
									<select name="subscriptions" id="edd-enhanced-sales-reports-subscription">
										<option value="all" <?php echo( isset( $_GET['subscriptions'] ) && 'all' === $_GET['subscriptions'] ? 'selected' : '' ); ?>><?php esc_html_e( 'All', 'edd-enhanced-sales-reports' ); ?></option>
										<option value="subscriptions" <?php echo( isset( $_GET['subscriptions'] ) && 'subscriptions' === $_GET['subscriptions'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Subscriptions', 'edd-enhanced-sales-reports' ); ?></option>
										<option value="no_subscriptions" <?php echo( isset( $_GET['subscriptions'] ) && 'no_subscriptions' === $_GET['subscriptions'] ? 'selected' : '' ); ?>><?php esc_html_e( 'No Subscriptions', 'edd-enhanced-sales-reports' ); ?></option>
									</select>
								</div>
							</div>
						<?php endif; ?>

					</div>
				<?php endif ?>

				<div class="edd-enhanced-sales-reports-form-row">
					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-customer-type"><?php esc_html_e( 'Customers', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select name="customer_type" id="edd-enhanced-sales-reports-customer-type">
								<option value="both" <?php echo( isset( $_GET['customer_type'] ) && 'both' === $_GET['customer_type'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Both', 'edd-enhanced-sales-reports' ); ?></option>
								<option value="new" <?php echo( isset( $_GET['customer_type'] ) && 'new' === $_GET['customer_type'] ? 'selected' : '' ); ?>><?php esc_html_e( 'New Only', 'edd-enhanced-sales-reports' ); ?></option>
								<option value="existing" <?php echo( isset( $_GET['customer_type'] ) && 'existing' === $_GET['customer_type'] ? 'selected' : '' ); ?>><?php esc_html_e( 'Existing Only', 'edd-enhanced-sales-reports' ); ?></option>
							</select>
						</div>
					</div>

					<div class="edd-enhanced-sales-reports-form-field edd-enhanced-sales-reports-half-field">
						<label for="edd-enhanced-sales-reports-form-customer"><?php esc_html_e( 'By Customer', 'edd-enhanced-sales-reports' ); ?></label>
						<div class="edd-enhanced-sales-reports-form-field-control">
							<select data-edd-enhanced-sales-reporting-selectbox data-edd-enhanced-sales-reporting-ajax="1" data-edd-enhanced-sales-reporting-source="customer" data-nonce="<?php echo esc_attr( wp_create_nonce( 'edd_enhanced_sales_reports_reporting_lookup_nonce' ) ); ?>" name="customer_id"
									id="edd-enhanced-sales-reports-form-customer">
								<option value=""></option>
								<?php if ( isset( $_GET['customer_id'] ) && ! empty( $_GET['customer_id'] ) ) : ?>
									<?php
										$selected_customer_id = intval( $_GET['customer_id'] );

										$selected_customer = EDD_Enhanced_Sales_Reports_Admin::get_customer_names( array( $selected_customer_id ) );
									?>
									<option value="<?php echo esc_attr( $selected_customer_id ); ?>" selected><?php echo esc_html( $selected_customer[ $selected_customer_id ] ); ?></option>
								<?php endif; ?>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="edd-advanced-sales-reports-filters-toggle edd-advanced-sales-reports-filters-hidden">
				<a href="#"
				   class="button edd-advanced-sales-reports-filters-show"><?php esc_html_e( 'Show Advanced Filters', 'edd-enhanced-sales-reports' ); ?></a>
				<a href="#"
				   class="button edd-advanced-sales-reports-filters-hide"><?php esc_html_e( 'Hide Advanced Filters', 'edd-enhanced-sales-reports' ); ?></a>
			</div>

		<?php endif; ?>
		<input type="hidden" name="page" value="edd-enhanced-sales-reports">
		<input type="hidden" name="post_type" value="download">
		<input type="hidden" name="sub-page" value="<?php echo esc_attr( $edd_enhanced_sales_reports_current_page ); ?>">
		<div class="edd-enhanced-sales-reports-form-actions">
			<a href="?post_type=download&page=edd-enhanced-sales-reports&sub-page=<?php echo esc_attr( $edd_enhanced_sales_reports_current_page ); ?>"
			   class="button button-primary edd-enhanced-sales-reports-reset"><?php esc_html_e( 'Reset', 'edd-enhanced-sales-reports' ); ?></a>
			<button type="submit"
					class="button button-primary"><?php esc_html_e( 'Apply', 'edd-enhanced-sales-reports' ); ?></button>
		</div>
	</form>

<?php
if ( 'by-subscriptions' !== $edd_enhanced_sales_reports_current_page ) {

	// add tabs for Products, Customers and Orders Reports.

	$second_chart_available_on = array(
		'by-product'  => esc_html__( 'Top Products', 'edd-enhanced-sales-reports' ),
		'by-customer' => esc_html__( 'Top Customers', 'edd-enhanced-sales-reports' ),
		'by-orders'   => esc_html__( 'Top Orders', 'edd-enhanced-sales-reports' ),
	);

	if ( isset( $second_chart_available_on[ $edd_enhanced_sales_reports_current_page ] ) ) {
		echo '<div class="edd-esr-chart-tabs">';
		echo '<div class="edd-esr-chart-tabs-hds">';
		echo '<a href="#" data-type="sales" class="edd-esr-chart-tab-active">' . esc_html__( 'Sales Chart', 'edd-enhanced-sales-reports' ) . '</a>';
		echo '<a href="#" data-type="secondary-chart">' . esc_html( $second_chart_available_on[ $edd_enhanced_sales_reports_current_page ] ) . '</a>';
		echo '</div>';
	}

	require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/charting.php';

	if ( isset( $second_chart_available_on[ $edd_enhanced_sales_reports_current_page ] ) ) {
		echo '<div class="edd-esr-secondary-chart">';
		require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/reporting/secondary-chart-' . $edd_enhanced_sales_reports_current_page . '.php';
		echo '</div>';
		echo '</div>';
	}
}

if ( file_exists( EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/kpis/' . $edd_enhanced_sales_reports_current_page . '.php' ) ) {
	require EDD_ENHANCED_SALES_REPORTS_DIR . 'includes/admin/kpis/' . $edd_enhanced_sales_reports_current_page . '.php';
}
