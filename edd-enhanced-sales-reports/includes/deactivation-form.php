<?php
/**
 * EDD_Enhanced_Sales_Reports deactivation Content.
 *
 * @package EDD_Enhanced_Sales_Reports
 * @version 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$edd_enhanced_sales_reports_deactivation_nonce = wp_create_nonce( 'edd_enhanced_sales_reports_deactivation_nonce' );
?>

<div class="edd-enhanced-sales-reports-popup-overlay">
	<div class="edd-enhanced-sales-reports-serveypanel">
		<form action="#" method="post" id="edd-enhanced-sales-reports-deactivate-form">
			<div class="edd-enhanced-sales-reports-popup-header">
				<h2>
				<?php
					printf(
						/* translators: %s Name of Plugin EDD Enhanced Sales Reports*/
						esc_html__( 'Quick feedback about %s', 'edd-enhanced-sales-reports' ),
						esc_html( EDD_ENHANCED_SALES_REPORTS_NAME )
					);
					?>
				</h2>
			</div>
			<div class="edd-enhanced-sales-reports-popup-body">
				<h3><?php esc_html_e( 'If you have a moment, please let us know why you are deactivating:', 'edd-enhanced-sales-reports' ); ?></h3>
				<input type="hidden" class="edd_enhanced_sales_reports_deactivation_nonce" name="edd_enhanced_sales_reports_deactivation_nonce" value="<?php echo esc_attr( $edd_enhanced_sales_reports_deactivation_nonce ); ?>">
				<ul id="edd-enhanced-sales-reports-reason-list">
					<li class="edd-enhanced-sales-reports-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="1">
							</span>
							<span class="reason_text"><?php esc_html_e( 'I only needed the plugin for a short period', 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
					</li>
					<li class="edd-enhanced-sales-reports-reason has-input" data-input-type="textfield">
						<label>
							<span>
								<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="2">
							</span>
							<span class="reason_text"><?php esc_html_e( 'I found a better plugin', 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
						<div class="edd-enhanced-sales-reports-reason-input">
							<span class="message error-message "><?php esc_html_e( 'Kindly tell us the Plugin name.', 'edd-enhanced-sales-reports' ); ?></span>
							<input type="text" name="better_plugin" placeholder="<?php esc_attr_e( 'What\'s the plugin\'s name?', 'edd-enhanced-sales-reports' ); ?>">
						</div>
					</li>
					<li class="edd-enhanced-sales-reports-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="3">
							</span>
							<span class="reason_text"><?php esc_html_e( 'The plugin broke my site', 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
					</li>
					<li class="edd-enhanced-sales-reports-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="4">
							</span>
							<span class="reason_text"><?php esc_html_e( 'The plugin suddenly stopped working', 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
					</li>
					<li class="edd-enhanced-sales-reports-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
							<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="5">
							</span>
							<span class="reason_text"><?php esc_html_e( 'I no longer need the plugin', 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
					</li>
					<li class="edd-enhanced-sales-reports-reason" data-input-type="" data-input-placeholder="">
						<label>
							<span>
								<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="6">
							</span>
							<span class="reason_text"><?php esc_html_e( "It's a temporary deactivation. I'm just debugging an issue.", 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
					</li>
					<li class="edd-enhanced-sales-reports-reason has-input" data-input-type="textfield">
						<label>
							<span>
								<input type="radio" name="edd-enhanced-sales-reports-selected-reason" value="7">
							</span>
							<span class="reason_text"><?php esc_html_e( 'Other', 'edd-enhanced-sales-reports' ); ?></span>
						</label>
						<div class="edd-enhanced-sales-reports-internal-message"></div>
						<div class="edd-enhanced-sales-reports-reason-input">
							<span class="message error-message "><?php esc_html_e( 'Kindly tell us the reason so we can improve.', 'edd-enhanced-sales-reports' ); ?></span>
							<input type="text" name="other_reason" placeholder="<?php esc_attr_e( 'Kindly tell us the reason so we can improve.', 'edd-enhanced-sales-reports' ); ?>">
						</div>
					</li>
				</ul>
			</div>
			<div class="edd-enhanced-sales-reports-popup-footer">
				<label class="edd-enhanced-sales-reports-anonymous"><input
							type="checkbox"/><?php esc_html_e( 'Anonymous feedback', 'edd-enhanced-sales-reports' ); ?></label>
				<input type="button" class="button button-secondary button-skip edd-enhanced-sales-reports-popup-skip-feedback" value="<?php esc_attr_e( 'Skip & Deactivate', 'edd-enhanced-sales-reports' ); ?>">
				<div class="action-btns">
					<span class="edd-enhanced-sales-reports-spinner"><img src="<?php echo esc_attr( admin_url( '/images/spinner.gif' ) ); ?>" alt=""></span>
					<input type="submit" class="button button-secondary button-deactivate edd-enhanced-sales-reports-popup-allow-deactivate" value="<?php esc_attr_e( 'Submit & Deactivate', 'edd-enhanced-sales-reports' ); ?>" disabled="disabled">
					<a href="#" class="button button-primary edd-enhanced-sales-reports-popup-button-close"><?php esc_attr_e( 'Cancel', 'edd-enhanced-sales-reports' ); ?></a>
				</div>
			</div>
		</form>
	</div>
</div>
