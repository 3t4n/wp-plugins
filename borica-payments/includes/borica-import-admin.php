<?php
	/**
	 * Save BORICA payment module parameters.
	 *
	 * This script checks if certain parameters are passed via the POST request and then
	 * saves those parameters as options in the WordPress database. If the parameters are not
	 * passed, default values are used. This script also handles the display of a success message
	 * if the parameters are successfully saved.
	 *
	 * Parameters handled:
	 * - borica_hidden: A hidden field to check if the form was submitted.
	 * - borica_status: Enable/Disable BORICA payment method.
	 * - borica_testmode: Set mode of operation (Test/Production).
	 * - borica_debug: Enable/Disable debug mode.
	 * - borica_direct: Enable/Disable direct payment mode.
	 * - borica_mname: Merchant name.
	 * - borica_unsuccess_message: Message displayed on payment failure.
	 * - borica_success_message: Message displayed on payment success.
	 * - borica_email: Merchant email for notifications.
	 * - borica_mid_bgn: Merchant Identifier (MID) for BGN.
	 * - borica_tid_bgn: Terminal Identifier (TID) for BGN.
	 * - borica_test_key_bgn: Private key for test environment (BGN).
	 * - borica_test_password_bgn: Password for the private key (BGN).
	 * - borica_production_key_bgn: Private key for production environment (BGN).
	 * - borica_production_password_bgn: Password for the private key (BGN).
	 * - borica_mid_eur: Merchant Identifier (MID) for EUR.
	 * - borica_tid_eur: Terminal Identifier (TID) for EUR.
	 * - borica_test_key_eur: Private key for test environment (EUR).
	 * - borica_test_password_eur: Password for the private key (EUR).
	 * - borica_production_key_eur: Private key for production environment (EUR).
	 * - borica_production_password_eur: Password for the private key (EUR).
	 * - borica_payment_response: Show payment response: with order details / without order details.
	 *
	 * @package Borica_Woo_Payment_Gateway
	 */

if ( array_key_exists( 'borica_hidden', $_POST ) && 'Y' === $_POST['borica_hidden'] ) {
	$nonce = isset( $_POST['borica_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['borica_nonce'] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'borica_save_settings' ) ) {
		die( esc_html( __( 'Security check failed.', 'borica' ) ) );
	}

	if ( array_key_exists( 'borica_status', $_POST ) ) {
		$borica_status = (int) filter_var( wp_unslash( $_POST['borica_status'] ), FILTER_SANITIZE_NUMBER_INT );
	} else {
		$borica_status = 1;
	}
	update_option( 'borica_status', $borica_status );

	if ( array_key_exists( 'borica_testmode', $_POST ) ) {
		$borica_testmode = (int) filter_var( wp_unslash( $_POST['borica_testmode'] ), FILTER_SANITIZE_NUMBER_INT );
	} else {
		$borica_testmode = 1;
	}
	update_option( 'borica_testmode', $borica_testmode );

	if ( array_key_exists( 'borica_debug', $_POST ) ) {
		$borica_debug = (int) filter_var( wp_unslash( $_POST['borica_debug'] ), FILTER_SANITIZE_NUMBER_INT );
	} else {
		$borica_debug = 0;
	}
	update_option( 'borica_debug', $borica_debug );

	if ( array_key_exists( 'borica_direct', $_POST ) ) {
		$borica_direct = (int) filter_var( wp_unslash( $_POST['borica_direct'] ), FILTER_SANITIZE_NUMBER_INT );
	} else {
		$borica_direct = 0;
	}
	update_option( 'borica_direct', $borica_direct );

	if ( array_key_exists( 'borica_mname', $_POST ) ) {
		$borica_mname = (string) filter_var( wp_unslash( $_POST['borica_mname'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_mname = '';
	}
	update_option( 'borica_mname', $borica_mname );

	if ( array_key_exists( 'borica_unsuccess_message', $_POST ) ) {
		$borica_unsuccess_message = (string) filter_var( wp_unslash( $_POST['borica_unsuccess_message'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_unsuccess_message = '';
	}
	update_option( 'borica_unsuccess_message', $borica_unsuccess_message );

	if ( array_key_exists( 'borica_success_message', $_POST ) ) {
		$borica_success_message = (string) filter_var( wp_unslash( $_POST['borica_success_message'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_success_message = '';
	}
	update_option( 'borica_success_message', $borica_success_message );

	if ( array_key_exists( 'borica_email', $_POST ) ) {
		$borica_email = (string) filter_var( wp_unslash( $_POST['borica_email'] ), FILTER_SANITIZE_EMAIL );
	} else {
		$borica_email = '';
	}
	update_option( 'borica_email', $borica_email );

	if ( array_key_exists( 'borica_text_color', $_POST ) ) {
		$borica_text_color = (string) filter_var( wp_unslash( $_POST['borica_text_color'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_text_color = '#1E1E1E';
	}
	update_option( 'borica_text_color', $borica_text_color );

	if ( array_key_exists( 'borica_mid_bgn', $_POST ) ) {
		$borica_mid_bgn = (string) filter_var( wp_unslash( $_POST['borica_mid_bgn'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_mid_bgn = '';
	}
	update_option( 'borica_mid_bgn', $borica_mid_bgn );

	if ( array_key_exists( 'borica_tid_bgn', $_POST ) ) {
		$borica_tid_bgn = (string) filter_var( wp_unslash( $_POST['borica_tid_bgn'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_tid_bgn = '';
	}
	update_option( 'borica_tid_bgn', $borica_tid_bgn );

	if ( array_key_exists( 'borica_test_key_bgn', $_POST ) ) {
		$borica_test_key_bgn = (string) htmlspecialchars( wp_unslash( $_POST['borica_test_key_bgn'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_test_key_bgn = '';
	}
	update_option( 'borica_test_key_bgn', $borica_test_key_bgn );

	if ( array_key_exists( 'borica_test_password_bgn', $_POST ) ) {
		$borica_test_password_bgn = (string) htmlspecialchars( wp_unslash( $_POST['borica_test_password_bgn'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_test_password_bgn = '';
	}
	update_option( 'borica_test_password_bgn', $borica_test_password_bgn );

	if ( array_key_exists( 'borica_production_key_bgn', $_POST ) ) {
		$borica_production_key_bgn = (string) htmlspecialchars( wp_unslash( $_POST['borica_production_key_bgn'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_production_key_bgn = '';
	}
	update_option( 'borica_production_key_bgn', $borica_production_key_bgn );

	if ( array_key_exists( 'borica_production_password_bgn', $_POST ) ) {
		$borica_production_password_bgn = (string) htmlspecialchars( wp_unslash( $_POST['borica_production_password_bgn'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_production_password_bgn = '';
	}
	update_option( 'borica_production_password_bgn', $borica_production_password_bgn );

	if ( array_key_exists( 'borica_mid_eur', $_POST ) ) {
		$borica_mid_eur = (string) filter_var( wp_unslash( $_POST['borica_mid_eur'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_mid_eur = '';
	}
	update_option( 'borica_mid_eur', $borica_mid_eur );

	if ( array_key_exists( 'borica_tid_eur', $_POST ) ) {
		$borica_tid_eur = (string) filter_var( wp_unslash( $_POST['borica_tid_eur'] ), FILTER_SANITIZE_SPECIAL_CHARS );
	} else {
		$borica_tid_eur = '';
	}
	update_option( 'borica_tid_eur', $borica_tid_eur );

	if ( array_key_exists( 'borica_test_key_eur', $_POST ) ) {
		$borica_test_key_eur = (string) htmlspecialchars( wp_unslash( $_POST['borica_test_key_eur'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_test_key_eur = '';
	}
	update_option( 'borica_test_key_eur', $borica_test_key_eur );

	if ( array_key_exists( 'borica_test_password_eur', $_POST ) ) {
		$borica_test_password_eur = (string) htmlspecialchars( wp_unslash( $_POST['borica_test_password_eur'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_test_password_eur = '';
	}
	update_option( 'borica_test_password_eur', $borica_test_password_eur );

	if ( array_key_exists( 'borica_production_key_eur', $_POST ) ) {
		$borica_production_key_eur = (string) htmlspecialchars( wp_unslash( $_POST['borica_production_key_eur'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_production_key_eur = '';
	}
	update_option( 'borica_production_key_eur', $borica_production_key_eur );

	if ( array_key_exists( 'borica_production_password_eur', $_POST ) ) {
		$borica_production_password_eur = (string) htmlspecialchars( wp_unslash( $_POST['borica_production_password_eur'] ), ENT_QUOTES, 'UTF-8' );
	} else {
		$borica_production_password_eur = '';
	}
	update_option( 'borica_production_password_eur', $borica_production_password_eur );

	if ( array_key_exists( 'borica_payment_response', $_POST ) ) {
		$borica_payment_response = (int) filter_var( wp_unslash( $_POST['borica_payment_response'] ), FILTER_SANITIZE_NUMBER_INT );
	} else {
		$borica_payment_response = 1;
	}
	update_option( 'borica_payment_response', $borica_payment_response );
	?>
	<div class="updated"><p><strong><?php echo esc_html( __( 'Settings saved successfully.', 'borica' ) ); ?></strong></p></div>
	<?php
	$borica_saved = 1;
} else {
	$borica_status                  = '' === (string) get_option( 'borica_status' ) ? 1 : (int) get_option( 'borica_status' );
	$borica_testmode                = '' === (string) get_option( 'borica_testmode' ) ? 1 : (int) get_option( 'borica_testmode' );
	$borica_debug                   = '' === (string) get_option( 'borica_debug' ) ? 0 : (int) get_option( 'borica_debug' );
	$borica_direct                  = '' === (string) get_option( 'borica_direct' ) ? 0 : (int) get_option( 'borica_direct' );
	$borica_mname                   = (string) get_option( 'borica_mname' );
	$borica_unsuccess_message       = '' === (string) get_option( 'borica_unsuccess_message' ) ? esc_html( __( 'Payment failed', 'borica' ) ) : (string) get_option( 'borica_unsuccess_message' );
	$borica_success_message         = '' === (string) get_option( 'borica_success_message' ) ? esc_html( __( 'Payment is successful', 'borica' ) ) : (string) get_option( 'borica_success_message' );
	$borica_email                   = (string) get_option( 'borica_email' );
	$borica_text_color              = '' === (string) get_option( 'borica_text_color' ) ? '#1E1E1E' : (string) get_option( 'borica_text_color' );
	$borica_mid_bgn                 = (string) get_option( 'borica_mid_bgn' );
	$borica_tid_bgn                 = (string) get_option( 'borica_tid_bgn' );
	$borica_test_key_bgn            = (string) get_option( 'borica_test_key_bgn' );
	$borica_test_password_bgn       = (string) get_option( 'borica_test_password_bgn' );
	$borica_production_key_bgn      = (string) get_option( 'borica_production_key_bgn' );
	$borica_production_password_bgn = (string) get_option( 'borica_production_password_bgn' );
	$borica_mid_eur                 = (string) get_option( 'borica_mid_eur' );
	$borica_tid_eur                 = (string) get_option( 'borica_tid_eur' );
	$borica_test_key_eur            = (string) get_option( 'borica_test_key_eur' );
	$borica_test_password_eur       = (string) get_option( 'borica_test_password_eur' );
	$borica_production_key_eur      = (string) get_option( 'borica_production_key_eur' );
	$borica_production_password_eur = (string) get_option( 'borica_production_password_eur' );
	$borica_payment_response        = '' === (string) get_option( 'borica_payment_response' ) ? 1 : (int) get_option( 'borica_payment_response' );
	$borica_saved                   = 0;
}
?>
<form name="borica_form" id="borica_form" method="post" enctype="multipart/form-data" action="<?php echo isset( $_SERVER['REQUEST_URI'] ) ? esc_url( str_replace( '%7E', '~', esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) ) ) : ''; ?>">
	<?php wp_nonce_field( 'borica_save_settings', 'borica_nonce' ); ?>
	<div class="borica_container">
		<input type="hidden" name="borica_hidden" value="Y">
		<input type="hidden" id="borica_saved" value="<?php echo esc_attr( $borica_saved ); ?>">
		<input type="hidden" id="borica_error_text" value="<?php echo esc_attr( __( 'You have filled in the wrong fields!', 'borica' ) ); ?>">
		<input type="hidden" id="borica_mandatory_error_text" value="<?php echo esc_attr( __( 'The field is mandatory!', 'borica' ) ); ?>">
		<input type="hidden" id="borica_incorrect_error_text" value="<?php echo esc_attr( __( 'The field is filled in incorrectly!', 'borica' ) ); ?>">
		<div class="borica_page_header">
			<?php echo esc_html( __( 'BORICA - Payment by Credit/Debit Card', 'borica' ) ); ?>
			<span id="borica_error" class="borica_error"></span>
			<input type="submit" name="Submit" class="button-primary" value="<?php echo esc_attr( __( 'Save', 'borica' ) ); ?>" />
		</div>
		<div class="borica_row">

			<div class="borica_panel">
				<div class="borica_panel_heading">
					<?php echo esc_html( __( 'BORICA - Payment by Credit/Debit Card', 'borica' ) ); ?>
				</div>
				<div class="borica_panel_body">
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Enable', 'borica' ) ); ?></div>
						<div class="borica_control">
							<select name="borica_status" class="borica_form_control">
								<option value=1
									<?php
									if ( 1 === $borica_status ) {
										echo 'selected';
									}
									?>
								>
								<?php echo esc_html( __( 'Yes', 'borica' ) ); ?></option>
								<option value=0
									<?php
									if ( 0 === $borica_status ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'No', 'borica' ) ); ?></option>
							</select>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enable/Disable BORICA - Credit/Debit Card Payment', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Mode of operation', 'borica' ) ); ?></div>
						<div class="borica_control">
							<select name="borica_testmode" class="borica_form_control">
								<option value=1
									<?php
									if ( 1 === $borica_testmode ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'Test', 'borica' ) ); ?></option>
								<option value=0
									<?php
									if ( 0 === $borica_testmode ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'Production', 'borica' ) ); ?></option>
							</select>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Changes Test/Production Mode to BORICA - Payment by Credit/Debit Card', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Debug mode', 'borica' ) ); ?></div>
						<div class="borica_control">
							<select name="borica_debug" class="borica_form_control">
								<option value=0
									<?php
									if ( 0 === $borica_debug ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'No', 'borica' ) ); ?></option>
								<option value=1
									<?php
									if ( 1 === $borica_debug ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'Yes', 'borica' ) ); ?></option>
							</select>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enable/Disable debug mode in BORICA - Payment by Credit/Debit Card', 'borica' ) ); ?></span>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="borica_row">

			<div class="borica_panel">
				<div id="borica_basic_setting_title" class="borica_panel_heading">
					<?php echo esc_html( __( 'Basic settings', 'borica' ) ); ?>
				</div>
				<div id="borica_basic_setting_body" class="borica_panel_body" style="display:none;">
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Return URL (BackRef)', 'borica' ) ); ?></div>
						<div class="borica_control">
							<div class="borica_h4 borica_text_info"><?php echo esc_url( home_url() . '/?wc-api=borica_woo_payment_gateway_impl' ); ?></div>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Send this URL to your bank/BORICA', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Merchant Name', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_mname" value="<?php echo esc_attr( $borica_mname ); ?>" id="borica_mname" class="borica_form_control" />
							<span id="borica_mname_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Merchant Name. Your customers will see this on their statement to identify the payment', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Payment failed', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_unsuccess_message" value="<?php echo esc_attr( $borica_unsuccess_message ); ?>" id="borica_unsuccess_message" class="borica_form_control" />
							<span id="borica_unsuccess_message_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'You can change this message to what you want your customers to see when a payment fails.', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Payment is successful', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_success_message" value="<?php echo esc_attr( $borica_success_message ); ?>" id="borica_success_message" class="borica_form_control" />
							<span id="borica_success_message_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'You can change this message with what you want your customers to see upon successful payment.', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Merchant email', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="email" name="borica_email" value="<?php echo esc_attr( $borica_email ); ?>" id="borica_email" class="borica_form_control" />
							<span id="borica_email_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Merchant email. E-mail address for notifications', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Text color', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="color" name="borica_text_color" value="<?php echo esc_attr( $borica_text_color ); ?>" id="borica_text_color" class="borica_form_control" />
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Payment method text color on order page', 'borica' ) ); ?></span>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="borica_row">

			<div class="borica_panel">
				<div id="borica_bgn_title" class="borica_panel_heading">
					<?php echo esc_html( __( 'Terminal BGN', 'borica' ) ); ?>
				</div>
				<div id="borica_bgn_body" class="borica_panel_body" style="display:none;">
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Merchant Identifier (MID)', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_mid_bgn" value="<?php echo esc_attr( $borica_mid_bgn ); ?>" id="borica_mid_bgn" class="borica_form_control" />
							<span id="borica_mid_bgn_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Merchant ID provided by your bank/BORICA', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Terminal Identifier (TID)', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_tid_bgn" value="<?php echo esc_attr( $borica_tid_bgn ); ?>" id="borica_tid_bgn" class="borica_form_control" />
							<span id="borica_tid_bgn_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Terminal ID provided by your bank/BORICA', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_panel inline">
						<div class="borica_panel_heading">
							<?php echo esc_html( __( 'Test environment settings', 'borica' ) ); ?>
						</div>
						<div class="borica_panel_body">
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key', 'borica' ) ); ?></div>
								<div class="borica_control">
									<textarea name="borica_test_key_bgn" id="borica_test_key_bgn" rows="5" class="borica_form_control"><?php echo esc_html( $borica_test_key_bgn ); ?></textarea>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enter your private key in this field. You can use the tool provided by BORICA to generate a private key. You can access the tool from the link provided just below in help section (Generate Private Key and CSR)', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key password', 'borica' ) ); ?></div>
								<div class="borica_control">
									<input type="password" name="borica_test_password_bgn" value="<?php echo esc_attr( $borica_test_password_bgn ); ?>" id="borica_test_password_bgn" class="borica_form_control" />
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'The password for your private key. You can leave it blank if there is none.', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Compliance check', 'borica' ) ); ?></div>
								<div class="borica_control">
									<button id="borica_button_bgn_test" type="button" class="button-primary"><?php echo esc_html( __( 'Check', 'borica' ) ); ?></button>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Check for correspondence between private key and issued certificate', 'borica' ) ); ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="borica_panel inlinelast">
						<div class="borica_panel_heading">
							<?php echo esc_html( __( 'Production environment settings', 'borica' ) ); ?>
						</div>
						<div class="borica_panel_body">
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key', 'borica' ) ); ?></div>
								<div class="borica_control">
									<textarea name="borica_production_key_bgn" id="borica_production_key_bgn" rows="5" class="borica_form_control"><?php echo esc_html( $borica_production_key_bgn ); ?></textarea>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enter your private key in this field. You can use the tool provided by BORICA to generate a private key. You can access the tool from the link provided just below in help section (Generate Private Key and CSR)', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key password', 'borica' ) ); ?></div>
								<div class="borica_control">
									<input type="password" name="borica_production_password_bgn" value="<?php echo esc_attr( $borica_production_password_bgn ); ?>" id="borica_production_password_bgn" class="borica_form_control" />
									<span id="borica_production_password_bgn_error" class="borica_error"></span>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'The password for your private key.', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Compliance check', 'borica' ) ); ?></div>
								<div class="borica_control">
									<button id="borica_button_bgn_production" type="button" class="button-primary"><?php echo esc_html( __( 'Check', 'borica' ) ); ?></button>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Check for correspondence between private key and issued certificate', 'borica' ) ); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="borica_panel">
				<div id="borica_eur_title" class="borica_panel_heading">
					<?php echo esc_html( __( 'Terminal EUR', 'borica' ) ); ?>
				</div>
				<div id="borica_eur_body" class="borica_panel_body" style="display:none;">
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Merchant Identifier (MID)', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_mid_eur" value="<?php echo esc_attr( $borica_mid_eur ); ?>" id="borica_mid_eur" class="borica_form_control" />
							<span id="borica_mid_eur_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Merchant ID provided by your bank/BORICA', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Terminal Identifier (TID)', 'borica' ) ); ?></div>
						<div class="borica_control">
							<input type="text" name="borica_tid_eur" value="<?php echo esc_attr( $borica_tid_eur ); ?>" id="borica_tid_eur" class="borica_form_control" />
							<span id="borica_tid_eur_error" class="borica_error"></span>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Terminal ID provided by your bank/BORICA', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_panel inline">
						<div class="borica_panel_heading">
							<?php echo esc_html( __( 'Test environment settings', 'borica' ) ); ?>
						</div>
						<div class="borica_panel_body">
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key', 'borica' ) ); ?></div>
								<div class="borica_control">
									<textarea name="borica_test_key_eur" id="borica_test_key_eur" rows="5" class="borica_form_control"><?php echo esc_html( $borica_test_key_eur ); ?></textarea>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enter your private key in this field. You can use the tool provided by BORICA to generate a private key. You can access the tool from the link provided just below in help section (Generate Private Key and CSR)', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key password', 'borica' ) ); ?></div>
								<div class="borica_control">
									<input type="password" name="borica_test_password_eur" value="<?php echo esc_attr( $borica_test_password_eur ); ?>" id="borica_test_password_eur" class="borica_form_control" />
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'The password for your private key. You can leave it blank if there is none.', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Compliance check', 'borica' ) ); ?></div>
								<div class="borica_control">
									<button id="borica_button_eur_test" type="button" class="button-primary"><?php echo esc_html( __( 'Check', 'borica' ) ); ?></button>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Check for correspondence between private key and issued certificate', 'borica' ) ); ?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="borica_panel inlinelast">
						<div class="borica_panel_heading">
							<?php echo esc_html( __( 'Production environment settings', 'borica' ) ); ?>
						</div>
						<div class="borica_panel_body">
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key', 'borica' ) ); ?></div>
								<div class="borica_control">
									<textarea name="borica_production_key_eur" id="borica_production_key_eur" rows="5" class="borica_form_control"><?php echo esc_html( $borica_production_key_eur ); ?></textarea>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enter your private key in this field. You can use the tool provided by BORICA to generate a private key. You can access the tool from the link provided just below in help section (Generate Private Key and CSR)', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Private key password', 'borica' ) ); ?></div>
								<div class="borica_control">
									<input type="password" name="borica_production_password_eur" value="<?php echo esc_attr( $borica_production_password_eur ); ?>" id="borica_production_password_eur" class="borica_form_control" />
									<span id="borica_production_password_eur_error" class="borica_error"></span>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'The password for your private key.', 'borica' ) ); ?></span>
								</div>
							</div>
							<div class="borica_form_group">
								<div class="borica_control_label"><?php echo esc_html( __( 'Compliance check', 'borica' ) ); ?></div>
								<div class="borica_control">
									<button id="borica_button_eur_production" type="button" class="button-primary"><?php echo esc_html( __( 'Check', 'borica' ) ); ?></button>
									<span class="borica_form_controll_text"><?php echo esc_html( __( 'Check for correspondence between private key and issued certificate', 'borica' ) ); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="borica_row">

			<div class="borica_panel">
				<div id="borica_additional_setting_title" class="borica_panel_heading">
					<?php echo esc_html( __( 'Additional settings', 'borica' ) ); ?>
				</div>
				<div id="borica_additional_setting_body" class="borica_panel_body" style="display:none;">
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Direct payment', 'borica' ) ); ?></div>
						<div class="borica_control">
							<select name="borica_direct" class="borica_form_control">
								<option value=0
									<?php
									if ( 0 === $borica_direct ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'No', 'borica' ) ); ?></option>
								<option value=1
									<?php
									if ( 1 === $borica_direct ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'Yes', 'borica' ) ); ?></option>
							</select>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Enable/Disable direct payment mode in BORICA - Payment by Credit/Debit Card', 'borica' ) ); ?></span>
						</div>
					</div>
					<div class="borica_form_group">
						<div class="borica_control_label"><?php echo esc_html( __( 'Show payment response', 'borica' ) ); ?></div>
						<div class="borica_control">
							<select name="borica_payment_response" class="borica_form_control">
								<option value=1
									<?php
									if ( 1 === $borica_payment_response ) {
										echo 'selected';
									}
									?>
								>
								<?php echo esc_html( __( 'with order details', 'borica' ) ); ?></option>
								<option value=0
									<?php
									if ( 0 === $borica_payment_response ) {
										echo 'selected';
									}
									?>
								><?php echo esc_html( __( 'without order details', 'borica' ) ); ?></option>
							</select>
							<span class="borica_form_controll_text"><?php echo esc_html( __( 'Show payment response: with order details / without order details', 'borica' ) ); ?></span>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<div class="borica_row">
		
			<div class="borica_panel">
				<div id="borica_help_title" class="borica_panel_heading">
					<?php echo esc_html( __( 'Help', 'borica' ) ); ?>
				</div>
				<div id="borica_help_body" class="borica_panel_body" style="display:none;">
					<div class="borica_help">
						<p><?php echo esc_html( __( 'Help', 'borica' ) ); ?>: <a href="https://3dsgate-dev.borica.bg/generateCSR" target="_blank" rel="noopener"><?php echo esc_html( __( 'Generate private key and CSR', 'borica' ) ); ?></a></p>
						<p><?php echo esc_html( __( 'Help', 'borica' ) ); ?>: <a href="https://3dsgate-dev.borica.bg/wordpressplugin" target="_blank" rel="noopener"><?php echo esc_html( __( 'More information about the plugin', 'borica' ) ); ?></a></p>
						<button id="borica_button_log" type="button" class="button-secondary"><?php echo esc_html( __( 'Download the debug log information', 'borica' ) ); ?></button>
					</div>
				</div>
			</div>
			
		</div>
	
	</div>
</form>
