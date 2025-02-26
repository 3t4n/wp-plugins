<?php
//REGISTER SETTINGS WP-OPTIONS FIELDS
function alwk_plugin_settings() {
	register_setting( 'alerter-settings-group', 'alwk_options' );
}
add_action( 'admin_init' , 'alwk_plugin_settings' );

// CALLBACK -> CHECK IF TEXTBOX IS EMPTY
/*function alwk_error_empty_textbox($input) {
	if (empty($input)) { // IF TRUE -> ERROR NOTICE
        $type = 'error';
        $message = __( 'Textbox is empty!', 'alerter');
        add_settings_error('alwk_options[alert]', esc_attr( 'settings-updated' ), $message, $type );
	}
	return $input;
}
add_action( 'admin_notices' , 'alwk_error_empty_textbox' );*/

/*The options page*/
function alwk_setting_page() {
?>

	<div class="wrap">
		<!--<div class="alerter-panel">-->
		<h2><?php _e('Alert Settings', 'alerter'); ?></h2>

		<div class="updated notice is-dismissible">
			<p>
				<?php _e('Do you like this plugin, buy me a coffee!', 'alerter'); ?>
			</p>
			<!--PAYPAL-->
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
				<input type="image" src="https://www.paypalobjects.com/nl_NL/BE/i/btn/btn_donateCC_LG.gif"
				border="0" name="submit" alt="PayPal, de veilige en complete manier van online betalen.">
				<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif"
				width="1" height="1">
			</form>
			<!--.PAYPAL-->
		</div>

		<?php settings_errors(); // Admin notices ?>

		<form method="post" action="options.php">
			<?php
		    /*Init settings options group*/
		    settings_fields( 'alerter-settings-group' );

			/*Load options array*/
			$alwk_options = get_option( 'alwk_options' );
		?>

			<table class="form-table">
				<tr valign="top">
					<th scope="row">
						<?php _e('Type your alert', 'alerter'); ?>
					</th>
					<td>
						<?
						$args = array(
													'textarea_name' => 'alwk_options[alert]',
													'textarea_rows'=> '10',
													);
							wp_editor( $alwk_options[ 'alert' ], 'alwk_options[alert]', $args );
							?>
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<?php _e('Text color', 'alerter'); ?>
					</th>
					<td>
						<input type="text" name="alwk_options[text_color]" class="color-picker" data-alpha="true"
						value="<?php echo esc_attr( $alwk_options[ 'text_color' ]); ?>" />
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<?php _e('Border color', 'alerter'); ?>
					</th>
					<td>
						<input type="text" name="alwk_options[border_color]" class="color-picker" data-alpha="true"
						value="<?php echo esc_attr( $alwk_options[ 'border_color' ]); ?>" />
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<?php _e('Background color', 'alerter'); ?>
					</th>
					<td>
						<input type="text" name="alwk_options[background_color]" class="color-picker" data-alpha="true"
						value="<?php echo esc_attr( $alwk_options[ 'background_color' ]); ?>" />
					</td>
				</tr>

				<tr valign="top">
					<th scope="row">
						<?php echo _e('Show alert?', 'alerter'); ?>
					</th>
					<td>
						<input type="checkbox" name="alwk_options[show_alert]" value="1" <?php checked( 1,
						$alwk_options[ 'show_alert' ], true ); ?>" />
					</td>
				</tr>
			</table>

				<?php submit_button(); ?>

		</form>
		<p>
			<?php echo _e('Put the shortcode <span style="background-color: #CCC;">[alerter]</span> in a post or page.', 'alerter'); ?></p>
	</div>

	<?php
	/*DEBUG*/
		// print_r($alwk_options);
}
?>