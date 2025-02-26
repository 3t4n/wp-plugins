<?php

/*

Plugin Name:  Email Validator for Contact Form 7

Plugin URI:   https://developer.wordpress.org/plugins/email-validator-for-contact-form-7

Description:  Enables Contact Form 7 users to validate their client’s email address before accepting their messages for sending using MailboxValidator. <strong>Before get started, install and activate the Contact Form 7 plugin first.</strong>

Version:      1.7.5

Author:       MailboxValidator

Author URI:   https://mailboxvalidator.com

License:      GNU General Public License (GPL) version 3

License URI:  https://www.gnu.org/licenses/gpl-2.0.html

Text Domain: email-validator-for-contact-form-7

*/

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$emailvalidatorforcontactform7 = new EmailValidatorContactForm7();

// Check if Contact Form 7 is been installed or not
add_action('admin_init', [$emailvalidatorforcontactform7, 'mbv_wpcf7_check_wpcf7_installed']);

add_action( 'admin_enqueue_scripts', [$emailvalidatorforcontactform7, 'plugin_enqueues'] );

add_action( 'wp_ajax_email_validator_for_contact_form_7_submit_feedback', [$emailvalidatorforcontactform7, 'submit_feedback'] );
add_action( 'admin_footer_text', [$emailvalidatorforcontactform7, 'admin_footer_text'] );

add_filter( 'wpcf7_validate_email', [$emailvalidatorforcontactform7, 'mbv_wpcf7_custom_email_validator_filter'], 20, 2 ); // Email field

add_filter( 'wpcf7_validate_email*', [$emailvalidatorforcontactform7, 'mbv_wpcf7_custom_email_validator_filter'], 20, 2 ); // Req. Email field

class EmailValidatorContactForm7
{
	protected $global_status = '';
	
	
	public function __construct()
	{
		// add_action ( 'init', 'mbv_localization');
		add_action ( 'admin_init', [$this, 'mbv_localization']);
		add_action( 'admin_notices', [$this, 'mbv_wpcf7_general_admin_notice'] );
		// add the admin options page
		add_action( 'admin_menu', [$this, 'mbv_wpcf7_plugin_admin_add_page'] );
		// add the admin settings and such
		add_action( 'admin_init', [$this, 'mbv_wpcf7_plugin_admin_init'] );
	}
	
	public function mbv_wpcf7_check_wpcf7_installed ()
	{

		if ( is_admin() && current_user_can( "activate_plugins" ) && ! is_plugin_active( "contact-form-7/wp-contact-form-7.php" ) ) {

			add_action( 'admin_notices', [$this, 'mbv_wpcf7_nocf7_notice'] );

			deactivate_plugins( plugin_basename( __FILE__ ) );

			remove_submenu_page( 'options-general.php', 'email-validator-for-contact-form-7' );

			$flag = (int) $_GET['activate'];

			if ( isset( $flag ) ) {

				unset( $_GET['activate'] );

			}

		}

	}
	
	/*
	 * Localization
	 */
	public function mbv_localization()
	{
		// load_plugin_textdomain( 'email-validator-for-contact-form-7', false, dirname( plugin_basename( __FILE__ ) ) . '/langs' );
		load_plugin_textdomain( 'email-validator-for-contact-form-7', false, plugins_url( '/languages' ) );
	}
	
	public function mbv_wpcf7_nocf7_notice ()
	{

		$plugin_url =  esc_url( admin_url( 'plugin-install.php?tab=search&s=contact+form+7' ) );

		echo '<div class="notice notice-warning is-dismissible"><p>';
		printf( __( 'You must <a href="%s">install</a> and activate the Contact Form 7 before using the MailboxValidator plugin.', 'email-validator-for-contact-form-7' ), $plugin_url );
			echo '</p></div>';

	}
	
	// Show notice if the MBV API key not been saved yet
	public function mbv_wpcf7_general_admin_notice()
	{

		global $pagenow;

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		if ( !(isset($options['api_key'])) || $options['api_key'] == '' || $options['api_key'] == ' ' ) {

			 echo '<div class="notice notice-warning is-dismissible"><p>';

			printf( __( 'Please sign up for a <a href="%1$s">free MailboxValidator API key</a> to enable the email blocking.', 'email-validator-for-contact-form-7' ), 'https://www.mailboxvalidator.com/plans#api' );

			 echo '</p></div>';

		} 

		// else if ( $pagenow == 'plugins.php' && ( $options['api_key'] == '' || $options['api_key'] == ' ' ) ) {

			// echo '<div class="notice notice-warning is-dismissible">

				 // <p>Please get your MailboxValidator API key from <a href="https://www.mailboxvalidator.com/plans#api">here</a> and save in <a href="options-general.php?page=email-validator-for-contact-form-7">setting page</a>.</p>

			 // </div>';

		// }

	}
	
	public function mbv_wpcf7_plugin_admin_add_page()
	{

		add_options_page( 'Email Validator for Contact Form 7', 'Email Validator for Contact Form 7', 'manage_options', 'email-validator-for-contact-form-7', [$this, 'mbv_wpcf7_plugin_options_page'] );
		
		// wp_register_script( 'mailboxvalidator_email_validator_script', plugins_url( '/assets/js/mbv.js', __FILE__ ), array( 'jquery' ), filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/mbv.js' ) , true );
		wp_enqueue_script('mailboxvalidator_email_validator_chart_js', 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js', [], null, true);
		// wp_enqueue_script( 'mailboxvalidator_email_validator_script' );
		
		$this->create_table();

	}
	
	// display the admin options page
	public function mbv_wpcf7_plugin_options_page()
	{
		
		$tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'settings';


		echo '
	<div class="wrap">

		<h2>Email Validator for Contact Form 7 by MailboxValidator</h2>

		<p>This plugin enables Contact Form 7 users to validate their client’s email address before accepting their messages for sending. It uses MailboxValidator service for email validation. Please get your free MailboxValidator API key from <a href="https://www.mailboxvalidator.com/plans#api">here</a>. Once you save the settings by clicking "Save Changes", your settings will be saved and Contact Form 7 will automatically detect the changes.</p>

		<!--<p>At here you can edit your MailboxValidator API key and switch on or off disposable or free email validator.</p>-->' . $this->admin_tabs() . '';
		
		switch ($tab) {
			// Statistic
			case 'statistic':
				global $wpdb;
				
				$table_name = $wpdb->prefix . 'email_validator_for_contact_form_7_log';

				if (isset($_POST['purge'])) {
					$wpdb->query('TRUNCATE TABLE ' . $table_name);
				}

				// Remove logs older than 30 days.
				$wpdb->query('DELETE FROM ' . $table_name . ' WHERE date_created <="' . date('Y-m-d H:i:s', strtotime('-30 days')) . '"');

				// Prepare logs for last 30 days.
				$results = $wpdb->get_results('SELECT DATE_FORMAT(date_created, "%Y-%m-%d") AS date, COUNT(*) AS total FROM ' . $table_name . ' GROUP BY date ORDER BY date', OBJECT);

				$lines = [];
				for ($d = 30; $d > 0; --$d) {
					$lines[date('Y-m-d', strtotime('-' . $d . ' days'))] = 0;
				}

				foreach ($results as $result) {
					$lines[$result->date] = $result->total;
				}

				ksort($lines);

				$labels = [];
				$total_emails_blocked = [];

				foreach ($lines as $date => $value) {
					$labels[] = $date;
					$total_emails_blocked[] = ($value) ? $value : 0;
				}

				// Add index to table id not exist.
				$results = $wpdb->get_results('SELECT COUNT(*) AS total FROM information_schema.statistics WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = "' . $table_name . '" AND INDEX_NAME = "idx_email_address"', OBJECT);

				if ($results[0]->total == 0) {
					$wpdb->query('ALTER TABLE `' . $table_name . '` ADD INDEX `idx_email_address` (`email_address`);');
				}
				echo '<h3>Block Statistics For The Past 30 Days</h3>

					<p>
						<canvas id="line_chart" style="width:100%;height:400px"></canvas>
					</p>

					<div class="clear"></div>

					<p>
						<form id="form-purge" method="post">
							<input type="hidden" name="purge" value="true">
							<input type="submit" name="submit" id="btn-purge" class="button button-primary" value="Purge All Logs" />
						</form>
					</p>

				</div>
				<script>
				jQuery(document).ready(function($){
					function get_color(){
						var r = Math.floor(Math.random() * 200);
						var g = Math.floor(Math.random() * 200);
						var b = Math.floor(Math.random() * 200);

						return \'rgb(\' + r + \', \' + g + \', \' + b + \', 0.4)\';
					}

					var ctx = document.getElementById(\'line_chart\').getContext(\'2d\');
					var line = new Chart(ctx, {
						type: \'line\',
						data: {
							labels: [\'' . implode('\', \'', $labels) . '\'],
							datasets: [{
								label: \'Total Email Blocked\',
								data: [' . implode(', ', $total_emails_blocked) . '],
								backgroundColor: get_color()
							}]
						},
						options: {
							title: {
								display: true,
								text: \'Total Email Blocked\'
							},
							scales: {
								yAxes: [{
									ticks: {
										beginAtZero:true
									}
								}]
							}
						}
					});
				});
				</script>';
				break;
			case 'settings':
			default:
				$mbv_options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );
				$api_key = isset( $mbv_options['api_key'] ) ? $mbv_options['api_key'] : '';
				if ( $api_key != '' ) {
					$url = 'https://api.mailboxvalidator.com/plan?key=' . $api_key;
					$results = wp_remote_get( $url );
					if ( !is_wp_error( $results ) ) {
						$body = wp_remote_retrieve_body( $results );

						// Decode the return json results and return the data.
						$data = json_decode( $body, true );
						
						if ( $data['plan_name'] != '' ) {
							if ( $data['plan_name'] == 'API-FREE' ) {
								$is_low_credit = ( $data['credits_available'] < 100 ) ? true : false ;
							} else {
								$is_low_credit = ( $data['credits_available'] < ( $data['credits_limit'] * 0.1 ) ) ? true : false ;
							}
							// Now print the plan info
							echo '<h2>'. __('Plan Information', 'email-validator-for-contact-form-7' ) . '</h2><table class="form-table">';
							echo '<tr><th scope="row"><label>'. __('Plan Name', 'email-validator-for-contact-form-7' ) . '</label></th><td><p>' . $data['plan_name'] . '</p></td></tr>';
							// echo '<tr><th scope="row"><label>Credits Available</label></th><td><p>' . $data['credits_available'] . '  '  . ( $is_low_credit ? '<button class="button"><a href="https://www.mailboxvalidator.com/plans#api" target="_blank">Get More Credits</a></button>' : '' ) . '</p></td></tr>';
							echo '<tr><th scope="row"><label>'. __('Credits Available', 'email-validator-for-contact-form-7' ) . '</label></th><td><p>' . $data['credits_available'] . '<span style="margin-left: 20px"></span>'  . ( $is_low_credit ? '<a href="https://www.mailboxvalidator.com/plans#api" target="_blank" class="button">Get More Credits</a>' : '' ) . '</p></td></tr>';
							echo '<tr><th scope="row"><label>'. __('Next Renewal Date', 'email-validator-for-contact-form-7' ) . '</label></th><td><p>' . $data['next_renewal_date'] . '</p></td></tr>';
							echo '</table>';
							echo '<a href="https://www.mailboxvalidator.com/login" target="_blank" class="button">Login to Account Area</a>';
						}
					}
				}

				echo '<form action="options.php" method="post">';

				settings_fields( 'mbv_wpcf7_email_validator_for_contact_form_7' );

				do_settings_sections( 'mbv_wpcf7_plugin' );
				echo '<br>
				<hr>
				<br>';
				do_settings_sections( 'mbv_wpcf7_plugin1' );
				echo '<br>
				<hr>
				<br>';
				do_settings_sections( 'mbv_wpcf7_plugin2' );
				echo '<br>
				<hr>
				<br>';
				do_settings_sections( 'mbv_wpcf7_plugin3' );
				echo '<br>
				<hr>
				<br>';
				do_settings_sections( 'mbv_wpcf7_plugin4' );

				echo '<input name="Submit" type="submit" value="' . __( 'Save Changes' ) . '" class="button button-primary" />
				</form>
			</div>';
				break;

		}
	}

	private function admin_tabs()
	{
		$disable_tabs = false;

		$tab = (isset($_GET['tab'])) ? $_GET['tab'] : 'settings';

		return '
		' . $this->global_status . '
		<h2 class="nav-tab-wrapper">
			<a href="' . (($disable_tabs) ? 'javascript:;' : admin_url('options-general.php?page=email-validator-for-contact-form-7&tab=settings')) . '" class="nav-tab' . (($tab == 'settings') ? ' nav-tab-active' : '') . '">Settings</a>
			<a href="' . (($disable_tabs) ? 'javascript:;' : admin_url('options-general.php?page=email-validator-for-contact-form-7&tab=statistic')) . '" class="nav-tab' . (($tab == 'statistic') ? ' nav-tab-active' : '') . '">Statistics</a>
		</h2>';
	}
	
	public function mbv_wpcf7_plugin_admin_init()
	{

		register_setting( 'mbv_wpcf7_email_validator_for_contact_form_7', 'mbv_wpcf7_email_validator_for_contact_form_7', [$this, 'mbv_wpcf7_sanitize_settings_input'] );

		add_settings_section( 'mbv_wpcf7_plugin_main', __('Main Settings', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_plugin_section_text'], 'mbv_wpcf7_plugin' );
		add_settings_section( 'mbv_wpcf7_plugin_main1', __('', 'email-validator-for-contact-form-7' ), '', 'mbv_wpcf7_plugin1' );
		add_settings_section( 'mbv_wpcf7_plugin_main2', __('', 'email-validator-for-contact-form-7' ), '', 'mbv_wpcf7_plugin2' );
		add_settings_section( 'mbv_wpcf7_plugin_main3', __('', 'email-validator-for-contact-form-7' ), '', 'mbv_wpcf7_plugin3' );
		add_settings_section( 'mbv_wpcf7_plugin_main4', __('', 'email-validator-for-contact-form-7' ), '', 'mbv_wpcf7_plugin4' );

		add_settings_field( 'mbv_wpcf7_api_key', __('MailboxValidator API Key', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_api_key_setting'], 'mbv_wpcf7_plugin', 'mbv_wpcf7_plugin_main' );

		add_settings_field( 'mbv_wpcf7_invalid_option', __('Block Invalid Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_invalid_setting_option'], 'mbv_wpcf7_plugin1', 'mbv_wpcf7_plugin_main1' );

		add_settings_field( 'mbv_wpcf7_invalid_error_message', __('Error Message for Invalid Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_invalid_error_message_setting'], 'mbv_wpcf7_plugin1', 'mbv_wpcf7_plugin_main1' );

		add_settings_field( 'mbv_wpcf7_disposable_option', __('Block Disposable Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_disposable_setting_option'], 'mbv_wpcf7_plugin2', 'mbv_wpcf7_plugin_main2' );

		add_settings_field( 'mbv_wpcf7_disposable_error_message', __('Error Message for Disposable Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_disposable_error_message_setting'], 'mbv_wpcf7_plugin2', 'mbv_wpcf7_plugin_main2' );

		add_settings_field( 'mbv_wpcf7_free_option', __('Block Free Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_free_setting_option'], 'mbv_wpcf7_plugin3', 'mbv_wpcf7_plugin_main3' );

		add_settings_field( 'mbv_wpcf7_free_error_message', __('Error Message for Free Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_free_error_message_setting'], 'mbv_wpcf7_plugin3', 'mbv_wpcf7_plugin_main3' );

		add_settings_field( 'mbv_wpcf7_role_option', __('Block Role-Based Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_role_setting_option'], 'mbv_wpcf7_plugin4', 'mbv_wpcf7_plugin_main4' );

		add_settings_field( 'mbv_wpcf7_role_error_message', __('Error Message for Role-based Email', 'email-validator-for-contact-form-7' ), [$this, 'mbv_wpcf7_role_error_message_setting'], 'mbv_wpcf7_plugin4', 'mbv_wpcf7_plugin_main4' );

	}
	
	public function mbv_wpcf7_sanitize_settings_input($input){
		// Check the values of radio buttons
		if (! in_array($input['invalid_on_off'], array('on', 'off'))) {
			add_settings_error(
					'mbv_wpcf7_invalid_error_message',  // setting title
					'mbv_wpcf7_optionerror',            // error ID
					'Invalid option value detected.',   // error message
					'error'                             // type of message
				);
			$input['invalid_on_off'] = 'on';
		}
		if (! in_array($input['disposable_on_off'], array('on', 'off'))) {
			add_settings_error(
					'mbv_wpcf7_disposable_on_off',      // setting title
					'mbv_wpcf7_optionerror',            // error ID
					'Invalid option value detected.',   // error message
					'error'                             // type of message
				);
			$input['disposable_on_off'] = 'on';
		}
		if (! in_array($input['free_on_off'], array('on', 'off'))) {
			add_settings_error(
					'mbv_wpcf7_free_on_off',            // setting title
					'mbv_wpcf7_optionerror',            // error ID
					'Invalid option value detected.',   // error message
					'error'                             // type of message
				);
			$input['free_on_off'] = 'on';
		}
		if (! in_array($input['role_on_off'], array('on', 'off'))) {
			add_settings_error(
					'mbv_wpcf7_role_on_off',            // setting title
					'mbv_wpcf7_optionerror',            // error ID
					'Invalid option value detected.',   // error message
					'error'                             // type of message
				);
			$input['role_on_off'] = 'on';
		}
		// Sanitize inputs
		$input['api_key'] = strip_tags(stripslashes( $input['api_key'] ));
		$input['invalid_on_off'] = strip_tags(stripslashes( $input['invalid_on_off'] ));
		$input['disposable_on_off'] = strip_tags(stripslashes( $input['disposable_on_off'] ));
		$input['free_on_off'] = strip_tags(stripslashes( $input['free_on_off'] ));
		$input['role_on_off'] = strip_tags(stripslashes( $input['role_on_off'] ));
		$input['invalid_error_message'] = strip_tags(stripslashes( $input['invalid_error_message'] ));
		$input['disposable_error_message'] = strip_tags(stripslashes( $input['disposable_error_message'] ));
		$input['free_error_message'] = strip_tags(stripslashes( $input['free_error_message'] ));
		$input['role_error_message'] = strip_tags(stripslashes( $input['role_error_message'] ));
		return $input;
	}
	
	public function mbv_wpcf7_plugin_section_text()
	{

		echo '<p>'. __('Please enter a MailboxValidator API key to enable the email blocking.', 'email-validator-for-contact-form-7' ) . '</p>';

	}
	
	public function mbv_wpcf7_api_key_setting()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$api_key = $options['api_key'] ?? ' ';

		echo '<input id="api_key" name="mbv_wpcf7_email_validator_for_contact_form_7[api_key]" size="40" type="text" value="' . esc_attr( $api_key ). '" />';

	}
	
	public function mbv_wpcf7_invalid_setting_option()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$invalid_on_off = $options['invalid_on_off'] ?? 'on';

		echo '<div id="radio1"><label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[invalid_on_off]" id="invalid_option" value="on"' . ( ( $invalid_on_off == 'on' ) ? ' checked' : '' ) . ' /> '. __('On', 'email-validator-for-contact-form-7' ) . '</label>  
		<label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[invalid_on_off]" id="invalid_option" value="off"' . ( ( $invalid_on_off == 'off' ) ? ' checked' : '' ) . ' /> '. __('Off', 'email-validator-for-contact-form-7' ) . '</label></div><br />';

	}

	public function mbv_wpcf7_disposable_setting_option()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$disposable_on_off = $options['disposable_on_off'] ?? 'on';

		echo '<div id="radio2"><label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[disposable_on_off]" id="disposable_option" value="on"' . ( ( $disposable_on_off == 'on' ) ? ' checked' : '' ) . ' /> '. __('On', 'email-validator-for-contact-form-7' ) . '</label>  
		<label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[disposable_on_off]" id="disposable_option" value="off"' . ( ( $disposable_on_off == 'off' ) ? ' checked' : '' ) . ' /> '. __('Off', 'email-validator-for-contact-form-7' ) . '</label></div><br />';

	}

	public function mbv_wpcf7_free_setting_option()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$free_on_off = $options['free_on_off'] ?? 'on';

		echo '<div id="radio3"><label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[free_on_off]" id="free_option" value="on"' . ( ( $free_on_off == 'on' ) ? ' checked' : '' ) . ' /> '. __('On', 'email-validator-for-contact-form-7' ) . '</label>  
		<label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[free_on_off]" id="free_option" value="off"' . ( ( $free_on_off == 'off' ) ? ' checked' : '' ) . ' /> '. __('Off', 'email-validator-for-contact-form-7' ) . '</label></div><br />';

	}

	public function mbv_wpcf7_role_setting_option()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$role_on_off = $options['role_on_off'] ?? 'on';

		echo '<div id="radio4"><label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[role_on_off]" id="free_option" value="on"' . ( ( $role_on_off == 'on' ) ? ' checked' : '' ) . ' /> '. __('On', 'email-validator-for-contact-form-7' ) . '</label>  
		<label><input type="radio" name="mbv_wpcf7_email_validator_for_contact_form_7[role_on_off]" id="free_option" value="off"' . ( ( $role_on_off == 'off' ) ? ' checked' : '' ) . ' /> '. __('Off', 'email-validator-for-contact-form-7' ) . '</label></div><br />';

	}

	public function mbv_wpcf7_invalid_error_message_setting()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$invalid_error_message = $options['invalid_error_message'] ?? __('Please enter a valid email address.', 'email-validator-for-contact-form-7' );
		
		$invalid_on_off = $options['invalid_on_off'] ?? 'on';

		echo '<input id="invalid_error_message" name="mbv_wpcf7_email_validator_for_contact_form_7[invalid_error_message]" style="width:100%" type="text" value="' . $invalid_error_message . '" aria-describedby="errormessage-hint" max="255" maxlength="255"/>';
		echo '<p id="errormessage-hint" style="color:#666666;font-style: italic;" >Your error message should be not more than 255 characters.</p>';

	}

	public function mbv_wpcf7_disposable_error_message_setting()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$disposable_error_message = $options['disposable_error_message'] ?? __('Please enter a non-disposable email address.', 'email-validator-for-contact-form-7' );
		
		$disposable_on_off = $options['disposable_on_off'] ?? 'on';

		echo '<input id="disposable_error_message" name="mbv_wpcf7_email_validator_for_contact_form_7[disposable_error_message]" style="width:100%" type="text" value="' . $disposable_error_message . '" aria-describedby="errormessage-hint" max="255" maxlength="255"/>';
		echo '<p id="errormessage-hint" style="color:#666666;font-style: italic;" >Your error message should be not more than 255 characters.</p>';

	}

	public function mbv_wpcf7_free_error_message_setting()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$free_error_message = $options['free_error_message'] ?? __('Please enter a non-free email address.', 'email-validator-for-contact-form-7' );

		$free_on_off = $options['free_on_off'] ?? 'on';

		echo '<input id="free_error_message" name="mbv_wpcf7_email_validator_for_contact_form_7[free_error_message]" style="width:100%" type="text" value="' . $free_error_message . '" aria-describedby="errormessage-hint" max="255" maxlength="255"/>';
		echo '<p id="errormessage-hint" style="color:#666666;font-style: italic;" >Your error message should be not more than 255 characters.</p>';

	}

	public function mbv_wpcf7_role_error_message_setting()
	{

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );

		$role_error_message = $options['role_error_message'] ?? __('Please enter a non-role based email address.', 'email-validator-for-contact-form-7' );

		$role_on_off = $options['role_on_off'] ?? 'on';

		echo '<input id="role_error_message" name="mbv_wpcf7_email_validator_for_contact_form_7[role_error_message]" style="width:100%" type="text" value="' . $role_error_message . '" aria-describedby="errormessage-hint" max="255" maxlength="255"/>';
		echo '<p id="errormessage-hint" style="color:#666666;font-style: italic;" >Your error message should be not more than 255 characters.</p>';

	}

	// function mbv_wpcf7_string_length( $string ){

		// return mb_strlen( $string );

	// }
	
	// Enqueue the script.
	public function plugin_enqueues( $hook )
	{
		
		// if ( $hook == 'options-general.php' ) {
			// wp_enqueue_script( 'email_validator_for_contact_form_7_admin_setting_script', plugins_url( '/assets/js/feedback.js', __FILE__ ), ['jquery'], null, true );
		// }

		if ( $hook == 'plugins.php' ) {
			// Add in required libraries for feedback modal
			wp_enqueue_script( 'jquery-ui-dialog' );
			wp_enqueue_style( 'wp-jquery-ui-dialog' );

			wp_enqueue_script( 'email_validator_for_contact_form_7_admin_script', plugins_url( '/assets/js/feedback.js', __FILE__ ), ['jquery'], null, true );
		}
	}

	public function admin_footer_text( $footer_text )
	{
		// $plugin_name = substr( basename( __FILE__ ), 0, strpos( basename( __FILE__ ), '.' ) );
		$plugin_name = 'email-validator-for-contact-form-7';
		$current_screen = get_current_screen();

		if ( ( $current_screen && strpos( $current_screen->id, $plugin_name ) !== false ) ) {
			$footer_text .= sprintf(
				__( 'Love our plugin? Please leave us a %1$s rating. A huge thanks in advance!', $plugin_name ),
				'<a href="https://wordpress.org/support/plugin/' . $plugin_name . '/reviews/?filter=5/#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>'
			);
		}

		if ( $current_screen->id == 'plugins' ) {
			return $footer_text . '
			<div id="email-validator-for-contact-form-7-feedback-modal" class="hidden" style="max-width:800px">
				<span id="email-validator-for-contact-form-7-feedback-response"></span>
				<p>
					<strong>'. __('Would you mind sharing with us the reason to deactivate the plugin', 'email-validator-for-contact-form-7' ) . '?</strong>
				</p>
				<p>
					<label>
						<input type="radio" name="email-validator-for-contact-form-7-feedback" value="1"> '. __('I no longer need the plugin', 'email-validator-for-contact-form-7' ) . '
					</label>
				</p>
				<p>
					<label>
						<input type="radio" name="email-validator-for-contact-form-7-feedback" value="2"> '. __('I couldn\'t get the plugin to work', 'email-validator-for-contact-form-7' ) . '
					</label>
				</p>
				<p>
					<label>
						<input type="radio" name="email-validator-for-contact-form-7-feedback" value="3"> '. __('The plugin doesn\'t meet my requirements', 'email-validator-for-contact-form-7' ) . '
					</label>
				</p>
				<p>
					<label>
						<input type="radio" name="email-validator-for-contact-form-7-feedback" value="4"> '. __('Other concerns', 'email-validator-for-contact-form-7' ) . '
						<br><br>
						<textarea id="email-validator-for-contact-form-7-feedback-other" style="display:none;width:100%"></textarea>
					</label>
				</p>
				<p>
					<div style="float:left">
						<input type="button" id="email-validator-for-contact-form-7-submit-feedback-button" class="button button-danger" value="'. esc_attr__('Submit & Deactivate', 'email-validator-for-contact-form-7' ) . '" />
					</div>
					<div style="float:right">
						<a href="#">'. __('Skip & Deactivate', 'email-validator-for-contact-form-7' ) . '</a>
					</div>
				</p>
			</div>';
		}

		return $footer_text;
	}

	public function submit_feedback()
	{

		$feedback = ( isset( $_POST['feedback'] ) ) ? $_POST['feedback'] : '';
		$others = sanitize_text_field (( isset( $_POST['others'] ) ) ? $_POST['others'] : '' );

		$options = [
			1 => 'I no longer need the plugin',
			2 => 'I couldn\'t get the plugin to work',
			3 => 'The plugin doesn\'t meet my requirements',
			4 => 'Other concerns' . ( ( $others ) ? ( ' - ' . $others ) : '' ),
		];

		$url = 'https://www.mailboxvalidator.com/wp-plugin-feedback?' . http_build_query( ['name' => 'email-validator-for-contact-form-7', 'message' => $options[$feedback],] );
		// file_put_contents ( __DIR__ . '/mbv_plugin_logs.log' , $url . PHP_EOL, FILE_APPEND );

		if ( isset( $options[$feedback] ) ) {
			if ( !class_exists( 'WP_Http' ) ) {
				include_once ABSPATH . WPINC . '/class-http.php';
			}

			$request = new WP_Http();
			$response = $request->request( 'https://www.mailboxvalidator.com/wp-plugin-feedback?' . http_build_query( [
				'name'    => 'email-validator-for-contact-form-7',
				'message' => $options[$feedback],
			] ), ['timeout' => 5] );
		}
	}
	
	function mbv_wpcf7_single( $emailAddress, $api_key ) {

		try{
			
			$mbv = new \MailboxValidator\EmailValidation ($api_key);
			$results = $mbv->validateEmail(str_replace( ' ', '', $emailAddress ));
			
			if ($results != null) {
				foreach ($results as $key => $value) {
					$data[$key] = $value;
				}
				return $data;
			} else {
				return true;
			}
		}
		catch( Exception $e ) {
			return true;
		}
	}

	private function mbv_wpcf7_is_valid_email( $api_result ) {

		if ( $api_result != '' ) {
			if ( !isset( $api_result['error_code'] ) ) {
				if ( $api_result['status'] ) {
					return true;
				} else {
					return false;
				}
			} else {
				// If error message occured, let it pass first.
				return true;
			}
		} else {
			// If error message occured, let it pass first.
			return true;
		}
	}

	private function mbv_wpcf7_is_role_email( $api_result ) {

		if ( $api_result != '' ) {
			if ( !isset( $api_result['error_code'] ) ) {
				if ( $api_result['is_role'] ) {
					return true;
				} else {
					return false;
				}
			} else {
				// If error message occured, let it pass first.
				return false;
			}
		} else {
			// If error message occured, let it pass first.
			return false;
		}
	}

	private function mbv_wpcf7_validate_email_check_free( $emailAddress, $api_key ) {
		
		$mbv = new \MailboxValidator\EmailValidation ($api_key);
		$results = $mbv->isFreeEmail(str_replace( ' ', '', $emailAddress ));

		// if ( $data['error_message'] == '' ) {
		if ($results != null) {
			if ( !isset( $results->error_code ) ) {

				// if ( $data['is_free'] == 'False' ) {
				if ( $results->is_free ) {

					return true;

				} else {

					return false;

				}

			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	private function mbv_wpcf7_validate_email_check_disposable( $emailAddress, $api_key ) {
		
		$mbv = new \MailboxValidator\EmailValidation ($api_key);
		$results = $mbv->isDisposableEmail(str_replace( ' ', '', $emailAddress ));

		// if ( $data['error_message'] == '' ) {
		if ($results != null) {
			if ( !isset( $results->error_code ) ) {

				// if ( $data['is_disposable'] == 'False' ) {
				if ( $results->is_disposable ) {

					return true;

				} else {

					return false;

				}

			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	public function mbv_wpcf7_custom_email_validator_filter( $result, $tags ) {
		global $wpdb;
		
		$datetime_started = date('Y-m-d H:i:s');

		$table_name = $wpdb->prefix . 'email_validator_for_contact_form_7_log';

		// Get option settings to know which validator is been called

		$options = get_option( 'mbv_wpcf7_email_validator_for_contact_form_7' );
		
		$user_apikey = trim($options['api_key']);

		$tags = new WPCF7_FormTag( $tags );

		$type = $tags->type;

		$name = $tags->name;
		
		$email = $_POST[$name];
		
		
		$email_parts = explode( '@', $email );
		
		// 20240122: Check for email syntax to prevent pen test
		if ( ( 'email' === $type || 'email*' === $type ) && (filter_var(trim($_POST[$name]), FILTER_VALIDATE_EMAIL)) && !( $user_apikey === '' ) && (preg_match('/^[A-Z\d]+$/', $user_apikey)) ) { 

			// do validation for disposable and free

			/*
			if( $options['disposable_on_off'] == 'on' ){

			file_put_contents( __DIR__ . '/mbv_api_logs.log', 'mbv_wpcf7_validate_email_check_disposable result:     ' . mbv_wpcf7_validate_email_check_disposable( sanitize_email ( $_POST[$name] ), $options['api_key'] ) . PHP_EOL, FILE_APPEND );
				if( ( mbv_wpcf7_validate_email_check_disposable( sanitize_email ( $_POST[$name] ), $options['api_key'] ) ) == true){

					$result->invalidate( $tags, __( $options['disposable_error_message'] ?? 'Please enter a non-disposable email address.', 'email-validator-for-contact-form-7' ) );

				}elseif ( $options['free_on_off'] == 'on' ){

					if( ( mbv_wpcf7_validate_email_check_free( sanitize_email ( $_POST[$name] ), $options['api_key'] ) ) == true ){

						$result->invalidate( $tags, __( $options['free_error_message'] ?? 'Please enter a non-free email address.', 'email-validator-for-contact-form-7' ) );

					}

				}

			} elseif ( $options['free_on_off'] == 'on' ){

				if( ( mbv_wpcf7_validate_email_check_free( sanitize_email ( $_POST[$name] ), $options['api_key'] ) ) == true ){

					$result->invalidate( $tags, __( $options['free_error_message'] ?? 'Please enter a non-free email address.', 'email-validator-for-contact-form-7' ) );

				}

			}*/
			$single_result = $options['invalid_on_off'] == 'on' || $options['role_on_off'] == 'on' ? $this->mbv_wpcf7_single( $_POST[$name], $user_apikey ) : '';
			$is_valid_email = $options['invalid_on_off'] == 'on' && $single_result != '' ? $this->mbv_wpcf7_is_valid_email( $single_result ) : true;
			$is_role = $options['role_on_off'] == 'on' && $single_result != '' ? $this->mbv_wpcf7_is_role_email( $single_result ) : false;
			// $is_disposable = $options['disposable_on_off'] == 'on' ? mbv_wpcf7_validate_email_check_disposable( $_POST[$name] , $options['api_key'] ) : false;
			// $is_free = $options['free_on_off'] == 'on' ? mbv_wpcf7_validate_email_check_free( $_POST[$name] , $options['api_key'] ) : false;
			if ($options['disposable_on_off'] === 'on') {
				if ($single_result != '' && !(array_key_exists('error_message', $single_result))) {
					$is_disposable = ($single_result['is_disposable']) ? true : false;
				} else {
					$is_disposable = $this->mbv_wpcf7_validate_email_check_disposable( $_POST[$name] , $user_apikey );
				}
			} else {
				$is_disposable = false;
			}
			if ($options['free_on_off'] === 'on') {
				if ($single_result != '' && !(array_key_exists('error_message', $single_result))) {
					$is_free = ($single_result['is_free']) ? true : false;
				} else {
					$is_free = $this->mbv_wpcf7_validate_email_check_free( $_POST[$name] , $user_apikey );
				}
			} else {
				$is_free = false;
			}
			
			
			if( $is_valid_email === false ){
				if ( ($options['disposable_on_off'] === 'on') && ( $is_disposable === true ) ) {
					$result->invalidate( $tags, __( $options['disposable_error_message'] ?? 'Please enter a non-disposable email address.', 'email-validator-for-contact-form-7' ) );
				} else {
					$result->invalidate( $tags, __( $options['invalid_error_message'] ?? 'Please enter a valid email address.', 'email-validator-for-contact-form-7' ) );
				}
				// if (get_option('ip2location_country_blocker_log_enabled') && $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
					$wpdb->query('INSERT INTO ' . $table_name . ' (email_address, email_domain, status, is_disposable, is_free, is_role, is_blacklisted, date_created) VALUES ("' . $email . '", "' . $email_parts[1] . '", "' .$single_result['status']. '", "' .$single_result['is_disposable']. '", "' .$single_result['is_free']. '", "' .$single_result['is_role']. '", "False", "' . $datetime_started . '")');
				// }
			} elseif( $is_disposable === true ){
				$result->invalidate( $tags, __( $options['disposable_error_message'] ?? 'Please enter a non-disposable email address.', 'email-validator-for-contact-form-7' ) );
				// if (get_option('ip2location_country_blocker_log_enabled') && $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
					$wpdb->query('INSERT INTO ' . $table_name . ' (email_address, email_domain, status, is_disposable, is_free, is_role, is_blacklisted, date_created) VALUES ("' . $email . '", "' . $email_parts[1] . '", "-", "True", "-", "-", "False", "' . $datetime_started . '")');
				// }
			} elseif( $is_free === true ){
				// $mbv_validation_result['status'] = false;
				$result->invalidate( $tags, __( $options['free_error_message'] ?? 'Please enter a non-free email address.', 'email-validator-for-contact-form-7' ) );
				// if (get_option('ip2location_country_blocker_log_enabled') && $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
					$wpdb->query('INSERT INTO ' . $table_name . ' (email_address, email_domain, status, is_disposable, is_free, is_role, is_blacklisted, date_created) VALUES ("' . $email . '", "' . $email_parts[1] . '", "-", "-", "True", "-", "False", "' . $datetime_started . '")');
				// }
			} elseif( $is_role === true ){
				$result->invalidate( $tags, __( $options['role_error_message'] ?? 'Please enter a non-role email address.', 'email-validator-for-contact-form-7' ) );
				// if (get_option('ip2location_country_blocker_log_enabled') && $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) {
					$wpdb->query('INSERT INTO ' . $table_name . ' (email_address, email_domain, status, is_disposable, is_free, is_role, is_blacklisted, date_created) VALUES ("' . $email . '", "' . $email_parts[1] . '", "' .$single_result['status']. '", "' .$single_result['is_disposable']. '", "' .$single_result['is_free']. '", "' .$single_result['is_role']. '", "False", "' . $datetime_started . '")');
				// }
			}

		} 

		return $result;

	}
	
	private function mbv_wpcf7_mailboxvalidator_api_log ( $mode, $api_result1, $api_result2, $api_result3, $api_result4, $api_result5 ) {

		// Log all the MBV api usage to the log file

		file_put_contents( __DIR__ . '/mbv_api_logs.log', 'Email Address:     ' . $api_result1 . PHP_EOL, FILE_APPEND );

	/*
		if ( $mode == 'disposable' ) {
			file_put_contents( __DIR__ . '/mbv_api_logs.log', 'is_disposable:     ' . $api_result2 . PHP_EOL, FILE_APPEND );
		} else {
			file_put_contents( __DIR__ . '/mbv_api_logs.log', 'is_free:     ' . $api_result2 . PHP_EOL, FILE_APPEND );
		}
	*/

		file_put_contents( __DIR__ . '/mbv_api_logs.log', $mode . ':     ' . $api_result2 . PHP_EOL, FILE_APPEND );

		file_put_contents( __DIR__ . '/mbv_api_logs.log', 'Credits Available: ' . $api_result3 . PHP_EOL, FILE_APPEND );

		file_put_contents( __DIR__ . '/mbv_api_logs.log', 'Error Code:        ' . $api_result4 == '' ? $api_result4 : '-' . PHP_EOL, FILE_APPEND );

		file_put_contents( __DIR__ . '/mbv_api_logs.log', 'Error Message:     ' . $api_result5 == '' ? $api_result5 : '-' . PHP_EOL, FILE_APPEND );

		file_put_contents( __DIR__ . '/mbv_api_logs.log', str_repeat( '-', 120 ) . PHP_EOL, FILE_APPEND );

	}
	
	private function create_table()
	{
		$GLOBALS['wpdb']->query('
		CREATE TABLE IF NOT EXISTS ' . $GLOBALS['wpdb']->prefix . 'email_validator_for_contact_form_7_log (
			`log_id` INT(11) NOT NULL AUTO_INCREMENT,
			`email_address` VARCHAR(255) NOT NULL COLLATE \'utf8_bin\',
			`email_domain` VARCHAR(255) NOT NULL COLLATE \'utf8_bin\',
			`status` VARCHAR(10) NOT NULL COLLATE \'utf8_bin\',
			`is_disposable` VARCHAR(10) NOT NULL COLLATE \'utf8_bin\',
			`is_free` VARCHAR(10) NOT NULL COLLATE \'utf8_bin\',
			`is_role` VARCHAR(10) NOT NULL COLLATE \'utf8_bin\',
			`is_blacklisted` VARCHAR(10) NOT NULL COLLATE \'utf8_bin\',
			`date_created` DATETIME NOT NULL,
			PRIMARY KEY (`log_id`),
			INDEX `idx_email_address` (`email_address`),
			INDEX `idx_email_domain` (`email_domain`),
			INDEX `idx_status` (`status`),
			INDEX `idx_is_disposable` (`is_disposable`),
			INDEX `idx_date_created` (`date_created`),
			INDEX `idx_is_free` (`is_free`),
			INDEX `idx_is_role` (`is_role`),
			INDEX `idx_is_blacklisted` (`is_blacklisted`)
		) COLLATE=\'utf8_bin\'');
	}
}
