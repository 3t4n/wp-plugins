<?php
/**
 * MoMO ACG WC - Insights Emails
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.5
 */

global $momoacgwc;

?>
<div class="momo-admin-content-box">
	<div class="momo-be-table-header">
		<h3><?php esc_html_e( 'WooAI Insights : Emails', 'momoacgwc' ); ?></h3>
	</div>
	<div class="momo-ms-admin-content-main momoacgwc-insights-emails" id="momoacgwc-insights-emails">
		<div class="momo-be-msg-block"></div>
		<!-- <section class="momo-dashboard-emails momo-dashboard-section">
			<div class="momo-dashboard-card">
				<h2><?php esc_html_e( 'Total Emails Sent (Last 30 Days)', 'momoacgwc' ); ?></h2>
				<span class="total-emails"><?php echo esc_html( $momoacgwc->instfn->get_total_emails_sent() ); ?></span>
			</div>

			<div class="momo-dashboard-card">
				<h2><?php esc_html_e( 'Email Open Rate', 'momoacgwc' ); ?></h2>
				<span class="open-rate"><?php echo esc_html( $momoacgwc->instfn->get_email_engagement_rates()['open_rate'] ); ?>%</span>
			</div>

			<div class="momo-dashboard-card">
				<h2><?php esc_html_e( 'Email Click-Through Rate', 'momoacgwc' ); ?></h2>
				<span class="click-rate"><?php echo esc_html( $momoacgwc->instfn->get_email_engagement_rates()['click_rate'] ); ?>%</span>
			</div>
		</section>
		<h3><?php esc_html_e( 'Recent Email Activity', 'momoacgwc' ); ?></h3>
		<table class="momo-email-activity-table">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Subject', 'momoacgwc' ); ?></th>
					<th><?php esc_html_e( 'Date Sent', 'momoacgwc' ); ?></th>
					<th><?php esc_html_e( 'Status', 'momoacgwc' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ( $momoacgwc->instfn->get_recent_email_activity() as $email ) : ?>
					<tr>
						<td><?php echo esc_html( $email['subject'] ); ?></td>
						<td><?php echo esc_html( $email['date_sent'] ); ?></td>
						<td><?php echo esc_html( $email['status'] ); ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table> -->
	
		<section class="momo-email-template-section">
		<h2><?php esc_html_e('AI-Generated Templates', 'momoacgwc'); ?></h2>
			<?php esc_html_e( 'Select saved templates', 'momoacgwc' ); ?>
			<?php $momoacgwc->instcpte->render_template_dropdown(); ?>
			<p><strong>OR</strong></p>
			<p><?php esc_html_e('Generate email templates for specific scenarios using AI.', 'momoacgwc'); ?></p>
			<button id="generate-abandoned-cart-template" class="momo-be-btn momo-be-btn-trinary"><?php esc_html_e('Generate Abandoned Cart Template', 'momoacgwc'); ?></button>
			<button id="generate-follow-up-template" class="momo-be-btn momo-be-btn-trinary"><?php esc_html_e('Generate Post-Purchase Follow-Up Template', 'momoacgwc'); ?></button>
			<button id="generate-recommendation-template" class="momo-be-btn momo-be-btn-trinary"><?php esc_html_e('Generate Product Recommendation Template', 'momoacgwc'); ?></button>
			<div id="template-preview" style="margin-top: 20px;">
				<h3><?php esc_html_e('Preview:', 'momoacgwc'); ?></h3>
			</div>
		</section>
		<!-- Section for Editing Templates -->
		<section class="momo-email-editor-section">
		<div class="template-form">
			<h2><?php esc_html_e('Edit Template', 'momoacgwc'); ?></h2>
			<p>
				<label for="template-name"><?php esc_html_e( 'Template Name:', 'momoacgwc' ); ?></label>
				<input type="text" id="template-name" class="regular-text" placeholder="<?php esc_attr_e( 'Enter template name...', 'momoacgwc' ); ?>" />
			</p>
			<textarea id="email-template-editor" rows="10" style="width: 100%;"></textarea>
			<button id="save-email-template" class="momo-be-btn momo-be-btn-primary"><?php esc_html_e('Save Template', 'momoacgwc'); ?></button>
		</section>

		<!-- Section for Scheduling and Trigger Settings -->
		<!-- <section class="momo-scheduling-section">
			<h2><?php esc_html_e('Notification Settings', 'momoacgwc'); ?></h2>
			<label for="email-schedule"><?php esc_html_e('Send Email', 'momoacgwc'); ?>:</label>
			<select id="email-schedule">
				<option value="instant"><?php esc_html_e('Instantly', 'momoacgwc'); ?></option>
				<option value="daily"><?php esc_html_e('Daily', 'momoacgwc'); ?></option>
				<option value="weekly"><?php esc_html_e('Weekly', 'momoacgwc'); ?></option>
			</select>
			<p><?php esc_html_e('Enable or disable specific notifications based on customer behavior.', 'momoacgwc'); ?></p>
		</section> -->
	</div>
</div>