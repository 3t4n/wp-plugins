<?php
/**
 * Settings Page
 *
 * @package     EDD_Enhanced_Sales_Reports\Settings
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wpdb;

if ( isset( $_POST['edd_enhanced_sales_reports_save_settings'] ) && check_admin_referer( 'edd_enhanced_sales_reports_settings' ) ) {

	if ( isset( $_POST['edd_enhanced_sales_reports'] ) ) {
		update_option( 'edd_enhanced_sales_reports_settings', map_deep( wp_unslash( $_POST['edd_enhanced_sales_reports'] ), 'sanitize_text_field' ), false );
	}

	$message = __( 'Settings have been successfully updated.', 'edd-enhanced-sales-reports' );
	edd_enhanced_sales_reports_show_message( $message );
}

$settings      = edd_enhanced_sales_reports_get_settings();
$oldest_record = edd_enhances_sales_reports__get_oldest_import_record();

if ( is_null( $oldest_record ) ) {
	$oldest_record = array(
		'order_date' => gmdate( '2010-01-01' ),
	);
}

?>
	<form method="post" action="">
		<div id="edd_enhanced_sales_reports_settings_tabs">
			<h2 style="margin:0;"><?php esc_html_e( 'Migration', 'edd-enhanced-sales-reports' ); ?></h2>
			<hr/>
			<p><?php esc_html_e( 'Click on the button below to update lookup table for all existing orders.', 'edd-enhanced-sales-reports' ); ?></p>

			<p>
				<strong>
					<?php
					esc_html_e( 'Date of first sales record in database: ', 'edd-enhanced-sales-reports' );
					echo esc_html( gmdate( 'd-m-Y', strtotime( $oldest_record['order_date'] ) ) );
					?>
				</strong>
			</p>

			<a href="#"
			   class="edd-enhanced-sales-reports-update-lookup button"><?php esc_html_e( 'Update Lookup Table', 'edd-enhanced-sales-reports' ); ?></a>

			<br><br>

			<h2 style="margin:0;"><?php esc_html_e( 'Settings', 'edd-enhanced-sales-reports' ); ?></h2>
			<hr/>
			<table class="form-table">
				<tbody>
				<tr valign="top">
					<th scope="row">
						<label for="show_products_in_payments"><?php esc_html_e( 'Show Ordered Products in Purchase History Table', 'edd-enhanced-sales-reports' ); ?></label>
					</th>
					<td>
						<input type="hidden" name="edd_enhanced_sales_reports[show_products_in_payments]" value="0"/>
						<input type="checkbox" id="show_products_in_payments"
							   name="edd_enhanced_sales_reports[show_products_in_payments]"
							   value="1" <?php checked( $settings['show_products_in_payments'], '1' ); ?> />
						<p class="description"><?php esc_html_e( 'If checked, then list of products will be shown in the Payments Table.', 'edd-enhanced-sales-reports' ); ?></p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="remove_data"><?php esc_html_e( 'Remove Plugin Data on Uninstall', 'edd-enhanced-sales-reports' ); ?></label>
					</th>
					<td>
						<input type="checkbox" id="remove_data" name="edd_enhanced_sales_reports[remove_data]"
							   value="1" <?php checked( $settings['remove_data'], '1' ); ?> />
						<p class="description"><?php esc_html_e( 'If checked then on plugin uninstallation plugin data will not be removed from database.', 'edd-enhanced-sales-reports' ); ?></p>
					</td>
				</tr>

				</tbody>
			</table>
		</div>
		<div style="display: flex; margin-top: 1.5em; height: 2em; align-items: center;">
			<input type="submit" name="edd_enhanced_sales_reports_save_settings" id="submit"
				   class="button button-primary" value="Save Changes">

			<?php wp_nonce_field( 'edd_enhanced_sales_reports_settings' ); ?>
		</div>
	</form>

<?php if ( isset( $promos ) && ! empty( $promos ) ) : ?>
	<div class="edd-enhanced-sales-reports-other-plugins">
		<?php foreach ( $promos as $promo ) : ?>
			<div class="edd-enhanced-sales-reports-other-plugin">
				<div class="edd-enhanced-sales-reports-other-plugin-title">
					<a href="<?php echo esc_url( $promo['url'] ); ?>" target="_blank"><?php echo esc_html( $promo['title'] ); ?></a>
				</div>
				<div class="edd-enhanced-sales-reports-other-plugin-links">
					<div><a href="<?php echo esc_url( $promo['url'] ); ?>"
							target="_blank"><?php esc_html_e( 'View', 'edd-enhanced-sales-reports' ); ?></a></div>
					<?php if ( isset( $promo['documentation'] ) ) : ?>
						<div><a href="<?php echo esc_url( $promo['documentation'] ); ?>"
								target="_blank"><?php esc_html_e( 'Documentation', 'edd-enhanced-sales-reports' ); ?></a></div>
					<?php endif; ?>
					<?php if ( isset( $promo['support'] ) ) : ?>
						<div><a href="<?php echo esc_url( $promo['support'] ); ?>"
								target="_blank"><?php esc_html_e( 'Support', 'edd-enhanced-sales-reports' ); ?></a></div>
					<?php endif; ?>
				</div>
				<div class="edd-enhanced-sales-reports-other-plugin-image"><a
							href="<?php echo esc_url( $promo['url'] ); ?>" target="_blank"><img
								src="<?php echo esc_url( $promo['image'] ); ?>"/></a></div>
				<div class="edd-enhanced-sales-reports-other-plugin-desc">
					<?php if ( $promo['initial_link'] ) : ?>
						<a href="<?php echo esc_url( $promo['url'] ); ?>"
						   target="_blank"><?php echo esc_html( $promo['title'] ); ?></a>
					<?php endif; ?>

					<?php echo wp_kses( $promo['description'], array( 'a', 'p', 'br', 'strong' ) ); ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
