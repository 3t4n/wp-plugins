<?php
/**
 * Subscription Popup
 *
 * @package     EDD_Enhanced_Sales_Reports
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="edd-enhanced-sales-reports-subscription-modal-wrapper">
	<div class="edd-enhanced-sales-reports-subscription-modal-overlay"></div>
	<div class="edd-enhanced-sales-reports-subscription-modal">
		<div class="edd-enhanced-sales-reports-subscription-modal-main">
			<h3><?php esc_html_e( 'Receive PRO Tips on how best to use Sales Reporting Features in Easy Digital Downloads', 'edd-enhanced-sales-reports' ); ?></h3>
			<p>
				<?php
				echo sprintf(
					/* translators: %1$s b tag (bold text), %2$s anchor tag, %3$s br tag (line break), %4$s b tag (bold text) */
					esc_html__( 'Receive %1$s on where to find the relevant information to better understand your sales in Easy Digital Downloads and how to best work with the Enhanced Sales Reporting Plugin by signing up for our newsletter from %2$s.%3$sLearn also how to better understand the %4$s, conversion from FREE to Paid products, and other important metrics driving sales and profits of your EDD store.', 'edd-enhanced-sales-reports' ),
					'<b>PRO tips</b>',
					'<a href="https://www.pluginsandsnippets.com" target="_blank">Plugins & Snippets</a>',
					'<br />',
					'<b>Average Order Value (AOV)</b>'
				);
				?>
			</p>

			<div class="edd-enhanced-sales-reports-subscription-error" style="display: none;"><?php esc_html_e( 'There was an error in processing your request, please try again.', 'edd-enhanced-sales-reports' ); ?></div>

			<form method="POST" class="edd-enhanced-sales-reports-subscription-form">
				<input type="email" required value="<?php echo esc_attr( get_option( 'admin_email' ) ); ?>">

				<?php wp_nonce_field( 'edd_enhanced_sales_reports_subscribe' ); ?>

				<div class="edd-enhanced-sales-reports-subscription-actions">
					<a href="#" class="edd-enhanced-sales-reports-subscription-skip"><?php esc_html_e( 'Cancel', 'edd-enhanced-sales-reports' ); ?></a>
					<button class="button-primary"><?php esc_html_e( 'Subscribe', 'edd-enhanced-sales-reports' ); ?></button>
				</div>
			</form>
		</div>

		<div class="edd-enhanced-sales-reports-subscription-modal-thanks" style="display: none;">
			<h3><?php esc_html_e( 'Thank you for signing up to our Newsletter!', 'edd-enhanced-sales-reports' ); ?></h3>
			<a href="#" class="edd-enhanced-sales-reports-subscription-skip button"><?php esc_html_e( 'Close', 'edd-enhanced-sales-reports' ); ?></a>
		</div>

	</div>
</div>
