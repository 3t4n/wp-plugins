<?php
/**
 * Mail Integration User Action file
 *
 * @package    mail
 * @author     miniOrange <info@miniorange.com>
 * @license    MIT/Expat
 * @link       https://miniorange.com
 */

/**
 * Class for displaying the manual email view and sending email.
 */
class MOAzure_Manual_Email_Config {

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
	public static function get_manual_email_config_obj() {
		if ( ! isset( self::$instance ) ) {
			$class          = __CLASS__;
			self::$instance = new $class();
		}
		return self::$instance;
	}

	/**
	 * Function to display the view of Manual Email Config page
	 *
	 * @return void
	 */
	public function moazure_send_manual_email_config() {

		$manual_email_config  = ! empty( MOAzure_Admin_Utils::moazure_get_option( 'moazure_manual_email_config' ) ) ? MOAzure_Admin_Utils::moazure_get_option( 'moazure_manual_email_config' ) : array();
		$mail_to              = ! empty( $manual_email_config['mail_to'] ) ? sanitize_text_field( wp_unslash( $manual_email_config['mail_to'] ) ) : '';
		$manual_email_subject = ! empty( $manual_email_config['subject'] ) ? sanitize_text_field( wp_unslash( $manual_email_config['subject'] ) ) : 'Microsoft Graph Mailer';
		$manual_email_content = ! empty( $manual_email_config['content'] ) ? sanitize_textarea_field( wp_unslash( $manual_email_config['content'] ) ) : 'Hi, this is an email sent via Microsoft Graph API.';

		$prem_img_url = plugins_url( '/admin/partials/apps/images/moazure_premium-label.png', MAIN_PLUGIN_FILE );
		?>
		<div class="moazure_table_layout moazure_outer_div">
			<div id="toggle2" class="moazure_configure_header">
				<div>
					<h3 class="moazure_configure_heading">
						<?php
						esc_html_e( 'Send Custom Email', 'login-with-azure' );
						?>
					</h3>
					<p class="moazure_desc" style="font-style: normal;">
						You can send a email using your licensed microsoft office365 exchange account's userprinciplename to any other user email.
					</p>
				</div>
			</div>
			<div id="moazure_mail_user">
				<form id="form-common" name="moazure_manual_email_config_form" method="post" action="">
					<?php wp_nonce_field( 'moazure_manual_email_config_form', 'moazure_manual_email_config_form_field' ); ?>
					<input type="hidden" name="option" value="moazure_manual_email_config" />

					<table class="mo_settings_table moazure_configure_table">
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong"><?php esc_html_e( 'To', 'login-with-azure' ); ?><font style="color: red;">*</font> :</strong>
								<p class="moazure_desc">Email ID of the user to which you are sending the email</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox" required type="email" id="moazure_mail_to" name="moazure_manual_mail_to" placeholder="Enter Any Test User Email e.g. user@example.com" value="<?php echo ( ! empty( $mail_to ) ? esc_attr( $mail_to ) : '' ); ?>" />
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong"><?php esc_html_e( 'CC recipients', 'login-with-azure' ); ?> :</strong>
								<p class="moazure_desc">This includes the provided email IDs in CC of email</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox moazure_input_disabled" type="text" placeholder="Enter semi-colon separated CC recipients' email IDs" />
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading td_entra_app">
								<strong class="mo_strong"><?php esc_html_e( 'BCC recipients', 'login-with-azure' ); ?> :</strong>
								<p class="moazure_desc">This includes the provided email IDs in BCC of email</p>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox moazure_input_disabled" type="text" placeholder="Enter semi-colon separated BCC recipients' email IDs" />
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
								<input class="mo_table_textbox" type="text" placeholder="Enter the Email Subject" name="moazure_manual_mail_subject" value="<?php echo esc_attr( $manual_email_subject ); ?>" />
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading">
								<strong class="mo_strong"><?php esc_html_e( 'Email type (Text / HTML)', 'login-with-azure' ); ?> :</strong>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<select class="moazure_input_disabled" style="width: 20%;">
									<option> Text </option>
								</select>
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
								<textarea class="mo_table_textbox" type="text" placeholder="Enter the Email Content" name="moazure_manual_mail_content" onkeypress="moazure_validate_email_content(this)" onkeyup="moazure_validate_email_content(this)" rows="6" ><?php echo esc_textarea( $manual_email_content ); ?></textarea>
							</td>
						</tr>
						<tr class="moazure_configure_table_rows">
							<td class="moazure_contact_heading">
								<strong class="mo_strong"><?php esc_html_e( 'Attachments', 'login-with-azure' ); ?> :</strong>
							</td>
							<td class="moazure_contact_heading td_entra_app">
								<input class="mo_table_textbox moazure_input_disabled" type="file" />
								<a href="https://plugins.miniorange.com/wordpress-azure-office365-integrations#pricing-plans" target="_blank" rel="noopener noreferrer">
									<span style="border:none">
										<img class="moazure_premium-label" src="<?php echo esc_url( $prem_img_url ); ?>" alt="miniOrange Plans Logo">
									</span>
								</a>
							</td>
						</tr>
					</table>
					<div class="moazure-flex moazure-app-submit">
						<input type="submit" name="submit" value="<?php esc_html_e( 'Save settings', 'login-with-azure' ); ?>" class="button button-large moazure_configure_btn moazure-rad" />
						<input type="button" name="submit" id="send_email_btn" value="<?php esc_html_e( 'Send Email', 'login-with-azure' ); ?>" class="button button-large moazure_configure_btn moazure-rad" />
					</div>
				</form>

				<form id="moazure_send_email_form" method="post">
					<?php wp_nonce_field( 'moazure_send_email_form', 'moazure_send_email_form_field' ); ?>
					<input type="hidden" name="option" value="moazure_send_email" />
				</form>
			</div>
		</div>

		<script>
			const sendMail = document.getElementById('send_email_btn');

			if (sendMail) {
				sendMail.addEventListener('click', function() {
					document.getElementById('moazure_send_email_form').submit();
				});
			}
		</script>
		<?php
	}
}
