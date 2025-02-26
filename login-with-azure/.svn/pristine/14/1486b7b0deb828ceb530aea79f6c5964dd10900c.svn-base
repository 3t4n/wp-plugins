<?php
/**
 * Mail Integration config file
 *
 * @package    mail
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

/**
 * Class for handling the Mail Integration configurations and setup.
 */
class MOAzure_Mail_Config {

	/**
	 * Object variable
	 *
	 * @var object variable to instantiate the class.
	 */
	private static $instance;

	/**
	 * Function to get the object of the class
	 *
	 * @return object
	 */
	public static function get_mail_config_obj() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to display the initial Power BI page
	 *
	 * @return void
	 */
	public function moazure_mail_initial_page() {
		$entra_app    = MOAzure_Admin_Utils::moazure_get_azure_app_config();
		$is_entra_app = ! empty( $entra_app['config'] ) && 'entra-id' === $entra_app['config']['apptype'];
		?>
		<div class="">
			<h3 class='mo_app_heading moazure_configure_heading' style='font-size:20px'>
				Please connect Azure app to send mails using Microsoft Graph
			</h3>
			<hr class='mo-divider'></br>
			<div class="no-app moazure_outer_div">
				<div class="moazure-flex" style="justify-content: space-between;">
					<h3 class='mo_app_heading moazure_configure_heading' style='font-size:20px'>
						Microsoft Graph Mail Connection
					</h3>
					<a href="https://plugins.miniorange.com/configure-wordpress-azure-sso?setup_guide=msemail&utm_source=WordPress%20plugin&utm_medium=organic&utm_campaign=traffic" target="_blank" rel="noopener" class="moazure-setup-guide-button moazure-rad" style="text-decoration: none;" > Setup Guide </a>
				</div>
				<p class="moazure_app_desc">Integrate Microsoft Graph Mailer to send emails from your Microsoft 365 Exchange account using <b>Microsoft Graph API</b>.</p>
					<?php
					if ( ! $is_entra_app ) {
						?>
						<p class="moazure_app_desc">Configure an Azure application and provide the "Mail.Send" permission to integrate Microsoft Graph Mailer on your WordPress site.<br />Click on the below button to go to the Entra ID App configuration.</p>
						<div class="moazure-flex" style="justify-content: center; padding: 2% 5%;">
							<a id="mail_connect" href="
							<?php
							echo ! empty( $_SERVER['REQUEST_URI'] ) ? esc_url_raw(
								add_query_arg(
									array(
										'tab' => 'moazure_config',
										'app' => 'entra-id',
									),
									sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) )
								)
							) : '';
							?>
							" class="button button-large moazure_configure_btn moazure-rad">
								<?php esc_html_e( 'Configure Entra ID App', 'login-with-azure' ); ?>
							</a>
						</div>
						<?php
					} else {
						?>
						<p class="moazure_app_desc">Configure an Azure application and provide the "Mail.Send" permission to integrate Microsoft Graph Mailer on your WordPress site.<br />Click on the below button to use the configured Entra ID application for Mail Connection</p>
						<div class="moazure-flex" id="moazure_mail_initial" style="justify-content: center; gap: 2rem; padding: 2% 5%;">
							<form method="post" action="" name="moazure_use_entra">
								<?php wp_nonce_field( 'moazure_use_entra_form', 'moazure_use_entra_form_field' ); ?>
								<input type="hidden" name="option" value="moazure_use_entra" />
								<input type="hidden" name="ms_app" value="mail" />
								<input type="submit" name="submit_use_entra" value="<?php esc_html_e( 'Use configured Entra ID App', 'login-with-azure' ); ?>" class="button button-large moazure_configure_btn moazure-rad" />
							</form>

							<button class="button button-primary button-large mo_disabled_btn" >Add New Entra ID App
								<span>
									<img class="moazure_premium-label" src="<?php echo esc_url( plugins_url( '/../../apps/images/moazure_premium-label.png', __FILE__ ) ); ?>" alt="miniOrange Standard Plans Logo">
								</span>								
							</button>
						</div>
						<?php
					}
					?>
			</div>
		</div>
		<?php
	}

	/**
	 * Function to display the Power BI page after Entra ID app setup
	 *
	 * @return void
	 */
	public function moazure_mail_app_page() {
		$mail_config = ! empty( MOAzure_Admin_Utils::moazure_get_option( 'moazure_mail_config' ) ) ? MOAzure_Admin_Utils::moazure_get_option( 'moazure_mail_config' ) : array();

		$mail_from                  = ! empty( $mail_config['mail_from'] ) ? sanitize_text_field( wp_unslash( $mail_config['mail_from'] ) ) : '';
		$is_save_to_outlook_sentbox = isset( $mail_config['save_to_outlook_sentbox'] ) ? (int) filter_var( sanitize_text_field( wp_unslash( $mail_config['save_to_outlook_sentbox'] ) ) ) : 1;
		$is_send_to_new_user        = ! empty( $mail_config['send_to_new_user'] ) ? (int) filter_var( sanitize_text_field( wp_unslash( $mail_config['send_to_new_user'] ) ) ) : 0;

		$prem_img_url = plugins_url( '/admin/partials/apps/images/moazure_premium-label.png', MAIN_PLUGIN_FILE );

		?>
		<div class="moazure_table_layout moazure_outer_div">
			<div id="toggle2" class="moazure_configure_header">
				<div>
					<h3 class="moazure_configure_heading">
						<?php
						esc_html_e( 'Configure Microsoft Graph Mail', 'login-with-azure' );
						?>
					</h3>
					<p class="moazure_desc" style="font-style: normal;">
						Integrate Microsoft Graph Mailer to send emails from your Microsoft 365 Exchange account using <b>Microsoft Graph API</b>.
					</p>
				</div>
			</div>
			<div id="moazure_mail_config">
				<form id="form-common" name="moazure_mail_form" method="post" action="">
					<?php wp_nonce_field( 'moazure_mail_send_form', 'moazure_mail_send_form_field' ); ?>
					<input type="hidden" name="option" value="moazure_mail_send_config" />

					<table class="mo_settings_table moazure_configure_table">
						<tr class="moazure_configure_table_rows" id="moazure_display_app_name_div">
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong" class="moazure_position"><?php esc_html_e( 'From', 'login-with-azure' ); ?><font style="color: red;">*</font> :</strong>
								<p class="moazure_desc">UPN from which you would like to send email,<br/>This will be used to send the email manually as well</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox" type="email" required id="moazure_mail_from" name="moazure_mail_from" placeholder="Enter UserPrincipalName e.g. user@example.onmicrosoft.com" value="<?php echo esc_attr( $mail_from ); ?>" />
							</td>
						</tr>
						<tr>
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong"><?php esc_html_e( 'Save Emails to sent items', 'login-with-azure' ); ?> :</strong>
								<p class="moazure_desc">This will save the emails sent to outlook sentbox</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<label class="moazure_switch" style="float: left;">
									<input class="mo_input_checkbox" id="toggleSwitch" type="checkbox" name="moazure_save_to_outlook_sentbox" value="1" <?php checked( $is_save_to_outlook_sentbox, 1 ); ?> />
									<span class="moazure_slider round"></span>
								</label>
							</td>
						</tr>
						<tr>
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong"><?php esc_html_e( 'Send Welcome Email to new users', 'login-with-azure' ); ?> :</strong>
								<p class="moazure_desc">This allows you to send email to users newly registered on your site</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<label class="moazure_switch" style="float: left;">
									<input class="mo_input_checkbox" id="toggleSwitch" type="checkbox" name="moazure_send_to_new_user" value="1" <?php checked( $is_send_to_new_user, 1 ); ?> />
									<span class="moazure_slider round"></span>
								</label>
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading">
								<strong class="mo_strong"><?php esc_html_e( 'Email Subject', 'login-with-azure' ); ?> :</strong>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox moazure_input_disabled" type="text" placeholder="WordPress Registration Successful" />
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading">
								<strong class="mo_strong"><?php esc_html_e( 'Content', 'login-with-azure' ); ?> :</strong>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<textarea class="mo_table_textbox moazure_input_disabled" type="text" placeholder="<?php echo "Hi there,\r\n\nWelcome to " . esc_html( get_option( 'blogname' ) ) . "!\nIn case of any concerns, please contact us at " . esc_html( get_option( 'admin_email' ) ) . '.'; ?>" rows="6" ></textarea>
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
						<tr></tr>
						<tr></tr>
						<tr>
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong"><?php esc_html_e( 'Send Email to users on Role/ Membership change', 'login-with-azure' ); ?> :</strong>
								<p class="moazure_desc">This allows you to send an email to the users when there occurs any change in their Role or Membership</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<label class="moazure_switch" style="float: left;">
									<input class="mo_input_checkbox" disabled type="checkbox" />
									<span class="moazure_slider round"></span>
								</label>
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading">
								<strong class="mo_strong"><?php esc_html_e( 'Email Subject', 'login-with-azure' ); ?> :</strong>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox moazure_input_disabled" type="text" placeholder="Role Change Successful" />
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading">
								<strong class="mo_strong"><?php esc_html_e( 'Content', 'login-with-azure' ); ?> :</strong>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<textarea class="mo_table_textbox moazure_input_disabled" type="text" placeholder="<?php echo "Hi there,\r\n\nYour role has been changed recently.\nIn case of any concerns, please contact us at " . esc_html( get_option( 'admin_email' ) ) . '.'; ?>" rows="6" ></textarea>
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
					</table>
					<div class="moazure-flex" style="justify-content: space-between;">
						<div class="moazure-flex moazure-app-submit">
							<input type="submit" name="submit" value="<?php esc_html_e( 'Save settings', 'login-with-azure' ); ?>" class="button button-large moazure_configure_btn moazure-rad" />
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php
	}
}
