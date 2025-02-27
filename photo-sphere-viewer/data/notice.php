<?php

/**
 * Insights Notice File
 */

if (! defined('ABSPATH')) {
	exit;
}

if (! function_exists('xero_insights_popup_notice')) {
	function xero_insights_popup_notice($data) {

?>
		<div class="xero-notice">
			<div class="xero-notice-wrapper">
				<div class="xero-header">
					<!-- <div class="xero-logo">
				<img src="plugins_url( 'assets/images/logo.png', __FILE__ );" alt="logo">
						</div> -->
					<h2 class="xero-title">
						<?php esc_html_e('Never miss an important update.', 'data-collector-insights'); ?>
					</h2>
					<p class="xero-desc">
						<?php esc_html_e('Get notified when there are new updates available for your plugins and themes. In the current version of this message it is clear that you are being sent a confirmation email to confirm your opt-in.', 'data-collector-insights'); ?>
					</p>
				</div>
				<div class="xero-actions">
					<?php
					$xero_name               = isset($data['name']) ? $data['name'] : '';
					$xero_insights_date_name = isset($data['date_name']) ? $data['date_name'] : '';
					$xero_allow_name         = isset($data['allow_name']) ? $data['allow_name'] : '';
					$nonce                  = isset($data['nonce']) ? $data['nonce'] : '';
					?>
					<form method="get" class="xero-notice-data">
						<input type="hidden" name="xero_name" value="<?php echo esc_html($xero_name); ?>">
						<input type="hidden" name="xero_date_name" value="<?php echo esc_html($xero_insights_date_name); ?>">
						<input type="hidden" name="xero_allow_name" value="<?php echo esc_html($xero_allow_name); ?>">
						<input type="hidden" name="nonce" value="<?php echo esc_html($nonce); ?>">

						<button id="xero_allow_yes" name="xero_allow_status" value="yes" type="button"
							class="xero-button-allow button button-primary">
							<?php esc_html_e('Allow & Continue', 'data-collector-insights'); ?>
						</button>
						<button id="xero_allow_skip" name="xero_allow_status" value="skip" type="button"
							class="xero-button-skip button button-secondary">
							<?php esc_html_e('Skip', 'data-collector-insights'); ?>
						</button>
					</form>
				</div>
				<div class="xero-permission">
					<p>
						<?php esc_html_e('Which permission are being granted?', 'data-collector-insights'); ?>
					</p>
				</div>
				<div class="xero-data-list">
					<ul>
						<li>
							<div class="xero-permission-item">
								<div class="xero-icon">
									<span class="dashicons dashicons-admin-users"></span>
								</div>
								<div class="xero-desc">
									<h3>
										<?php esc_html_e('View Basic Profile Info.', 'data-collector-insights'); ?>
									</h3>
									<p>
										<?php esc_html_e('Your WordPress user\'s first & last name, and email address.', 'data-collector-insights'); ?>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="xero-permission-item">
								<div class="xero-icon">
									<span class="dashicons dashicons-admin-links"></span>
								</div>
								<div class="xero-desc">
									<h3>
										<?php esc_html_e('View Basic Website Info.', 'data-collector-insights'); ?>
									</h3>
									<p>
										<?php esc_html_e('Homepage URL & title, WP & PHP versions, and site language.', 'data-collector-insights'); ?>
									</p>
								</div>
							</div>
						</li>
						<li>
							<div class="xero-permission-item">
								<div class="xero-icon">
									<span class="dashicons dashicons-admin-plugins"></span>
								</div>
								<div class="xero-desc">
									<h3>
										<?php esc_html_e('View Basic Plugin Info.', 'data-collector-insights'); ?>
									</h3>
									<p>
										<?php esc_html_e('Current Plugin & SDK versions, and if active or uninstalled.', 'data-collector-insights'); ?>
									</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
<?php
	}

	// add_action( 'in_admin_header', 'xero_insights_popup_notice', 99999 );
}
