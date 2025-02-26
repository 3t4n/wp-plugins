<?php
/*
Plugin Name: PGP Key Generator
Plugin URI: https://wp2pgpmail.com
Description: Generates PGP Keys. Runs completely in the browser.
Version: 1.13
Author: wp2pgpmail
Author URI: https://wp2pgpmail.com
License: GPLv2
*/

add_action( 'wp_enqueue_scripts', 'pgp_key_generator_register_scripts' );
function pgp_key_generator_register_scripts(){
	wp_register_script( 'pgp_key_generator_openpgp_script', plugins_url( 'pgp-key-generator' ) . '/lib/openpgp.min.js' );
	wp_register_script( 'pgp_key_generator_jquery_validation_script', plugins_url( 'pgp-key-generator' ) . '/lib/jquery.validate.min.js' );
	wp_register_script( 'pgp_key_generator_script', plugins_url( 'pgp-key-generator' ) . '/pgp-key-generator.js' );
	wp_register_style( 'pgp_key_generator_style', plugins_url( 'pgp-key-generator' ) . '/css/pgp-key-generator.css' );
}

add_shortcode('pgp_key_generator', 'pgp_key_generator_insert');
function pgp_key_generator_insert() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('pgp_key_generator_openpgp_script');
	wp_enqueue_script('pgp_key_generator_jquery_validation_script');
	wp_enqueue_script('pgp_key_generator_script');
	wp_enqueue_style('pgp_key_generator_style');
	load_plugin_textdomain( 'pgp-key-generator', false, basename( dirname( __FILE__ ) ) . '/i18n/' );
	$text_Generate_PGP_Keys = __('Generate PGP Keys', 'pgp-key-generator');
	$text_Your_Name = __('Your name:', 'pgp-key-generator');
	$text_Your_Email = __('Your e-mail address:', 'pgp-key-generator');
	$text_Required = __('required', 'pgp-key-generator');
	$text_Choose_a_Password = __('Choose a password:', 'pgp-key-generator');
	$text_Need_Help_For_Password_First = __( 'Need help to choose a password?', 'pgp-key-generator' );
	$text_Need_Help_For_Password_Second = '<a href="https://passwordgenerator.clicface.com/" target="_blank">' . __( 'Try a nice password generator.', 'pgp-key-generator' ) . '</a>';
	$text_Key_Size = __('Key Size:', 'pgp-key-generator');
	$text_Key_1024 = __('1024 bits - for testing purpose only', 'pgp-key-generator');
	$text_Key_2048 = __('2048 bits - recommended', 'pgp-key-generator');
	$text_Key_4096 = __('4096 bits - more secure', 'pgp-key-generator');
	$text_Your_Browser_May_Not_Respond = __('Your browser may not respond during key generation.', 'pgp-key-generator');
	$text_Public_Key = __('Public Key', 'pgp-key-generator');
	$text_Private_Key = __('Private Key', 'pgp-key-generator');
	$text_Encrypt_a_Message = __('Encrypt a Message', 'pgp-key-generator');
	$text_Your_Message = __('Your message:', 'pgp-key-generator');
	$text_Here_is_my_secret_message = __('Here is my secret message', 'pgp-key-generator');
	$text_Encrypt = __('Encrypt', 'pgp-key-generator');
	$text_Your_Public_Key = __('The public key to encrypt to:', 'pgp-key-generator');
	$text_Decrypt_a_Message = __('Decrypt a Message', 'pgp-key-generator');
	$text_Your_Password = __('Your password:', 'pgp-key-generator');
	$text_Your_Encrypted_Message = __('Your encrypted message:', 'pgp-key-generator');
	$text_Your_Private_Key = __('Your private key:', 'pgp-key-generator');
	$output = <<<EOF
<div>
	<div class="accordion" id="accordion-pgp-key-generator">
		<div class="accordion-group">
			<div class="accordion-heading pgp-key-generator-form1">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-pgp-key-generator" href="#collapseOne">$text_Generate_PGP_Keys</a>
			</div>
			<div id="collapseOne" class="accordion-body collapse in">
				<div class="accordion-inner">
					<div class="block">
						<form method="post" name="pgp_key_generator_form1" id="pgp_key_generator_form1">
							<label for="pgp_key_generator_username">$text_Your_Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-style: italic;">$text_Required</span></label><br />
							<input type="text" name="pgp_key_generator_username" id="pgp_key_generator_username" />
							<br />
							<label for="pgp_key_generator_mail_address">$text_Your_Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-style: italic;">$text_Required</span></label><br />
							<input type="text" name="pgp_key_generator_mail_address" id="pgp_key_generator_mail_address" />
							<br />
							<label for="pgp_key_generator_key_password">$text_Choose_a_Password</label><br />
							<input type="password" name="pgp_key_generator_key_password" id="pgp_key_generator_key_password" />
							<div>$text_Need_Help_For_Password_First $text_Need_Help_For_Password_Second</div>
							<br />
							<label for="pgp_key_generator_key_length">$text_Key_Size</label><br />
							<select name="pgp_key_generator_key_length" id="pgp_key_generator_key_length">
								<option value="1024">$text_Key_1024</option>
								<option value="2048" selected="selected">$text_Key_2048</option>
								<option value="4096">$text_Key_4096</option>
							</select>
							<br />
							$text_Your_Browser_May_Not_Respond<br />
							<input type="button" class="btn btn-primary" value="$text_Generate_PGP_Keys" name="pgp_key_generator_form1_button" id="pgp_key_generator_form1_button" />
						</form>
					</div>
					<br />
					<div class="block">
						<label for="pgp_key_generator_pubgenkey">$text_Public_Key</label><br />
						<textarea id="pgp_key_generator_pubgenkey"></textarea>
						<br /><br />
						<label for="pgp_key_generator_privgenkey">$text_Private_Key</label><br />
						<textarea id="pgp_key_generator_privgenkey"></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="accordion-group">
			<div class="accordion-heading pgp-key-generator-form2">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-pgp-key-generator" href="#collapseTwo">$text_Encrypt_a_Message</a>
			</div>
			<div id="collapseTwo" class="accordion-body collapse">
				<div class="accordion-inner">
					<div class="block">
						<form method="post" name="pgp_key_generator_form2" id="pgp_key_generator_form2">
							<label for="pgp_key_generator_message_encrypt">$text_Your_Message</label><br />
							<textarea name="pgp_key_generator_message_encrypt" id="pgp_key_generator_message_encrypt">$text_Here_is_my_secret_message</textarea>
							<br />
							<input type="button" class="btn btn-primary" value="$text_Encrypt" name="pgp_key_generator_form2_button" id="pgp_key_generator_form2_button" />
							<br />&nbsp;<br />
							<label for="pgp_key_generator_pubkey">$text_Your_Public_Key</label><br />
							<textarea name="pgp_key_generator_pubkey" id="pgp_key_generator_pubkey"></textarea>
						</form>
					</div>
				</div>
			</div>
		</div>

		<div class="accordion-group">
			<div class="accordion-heading pgp-key-generator-form3">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-pgp-key-generator" href="#collapseThree">$text_Decrypt_a_Message</a>
			</div>
			<div id="collapseThree" class="accordion-body collapse">
				<div class="accordion-inner">
					<div class="block">
						<form method="post" name="pgp_key_generator_form3" id="pgp_key_generator_form3">
							<label for="pgp_key_generator_key_password_decrypt">$text_Your_Password</label><br />
							<input type="password" name="pgp_key_generator_key_password_decrypt" id="pgp_key_generator_key_password_decrypt" /><br />
							<label for="pgp_key_generator_message_decrypt">$text_Your_Encrypted_Message</label><br />
							<textarea name="pgp_key_generator_message_decrypt" id="pgp_key_generator_message_decrypt"></textarea>
							<br />
							<input type="button" class="btn btn-primary" value="$text_Decrypt_a_Message" name="pgp_key_generator_form3_button" id="pgp_key_generator_form3_button" />
							<br />&nbsp;<br />
							<label for="pgp_key_generator_privkey">$text_Your_Private_Key</label><br />
							<textarea name="pgp_key_generator_privkey" id="pgp_key_generator_privkey"></textarea>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
EOF;
	return $output;
}