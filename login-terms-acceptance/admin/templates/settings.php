<?php
/**
 * File Name: settings.php
 *
 * Description: Login Terms Acceptance Settings Page
 *
 * @author XTND.net
 * @package XLTA
 * @since   1.0.0
 * @version 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="xlta-settings-wrapper">
	<div class="xlta-wrap">
		<?php
			$header_text = esc_html__( 'Login Terms Acceptance Settings', 'login-terms-acceptance' );
		require XLTA_PLUGIN_DIR . 'admin/templates/partials/header.php';
		?>
		<div class="xlta-inner-wrap">
			<form method="post" action="options.php">
				<?php settings_fields( 'xlta_settings_group' ); ?>
				<?php do_settings_sections( 'xlta_settings_page' ); ?>

				<h2><?php esc_html_e( 'Terms and Conditions', 'login-terms-acceptance' ); ?></h2>
				<?php
					$content   = get_option( 'xlta_terms', '' );
					$editor_id = 'xlta_terms';
					$settings  = array(
						'textarea_name' => 'xlta_terms',
						'media_buttons' => false,
						'teeny'         => false,
						'textarea_rows' => 10,
					);
					wp_editor( $content, $editor_id, $settings );
					?>

				<h2><?php esc_html_e( 'Email Confirmation', 'login-terms-acceptance' ); ?></h2>
				<label>
					<input type="checkbox"
							name="xlta_send_confirmation_email"
							value="1"
						<?php checked( get_option( 'xlta_send_confirmation_email' ), 1 ); ?> />
					<?php esc_html_e( 'Check this if you want to send a confirmation email after accepting terms', 'login-terms-acceptance' ); ?>
				</label>

				<h2><?php esc_html_e( 'Roles That Must Accept Terms', 'login-terms-acceptance' ); ?></h2>
				<?php

				global $wp_roles;

				if ( ! isset( $wp_roles ) ) {
					return null;
				}

				$roles = $wp_roles->roles;

				foreach ( $roles as $role_name => $role_info ) {
					$assigned_terms = get_option( 'xlta_assigned_terms_' . $role_name );

					?>
					<label>
						<input type="checkbox"
								name="xlta_assigned_terms_<?php echo esc_attr( $role_name ); ?>"
								value="1"
							<?php checked( $assigned_terms, 1 ); ?> />
						<?php echo esc_html( $role_info['name'] ); ?>
					</label>
					<br>
					<?php
				}
				?>
				<?php submit_button(); ?>
			</form>
			<p>
				<?php esc_html_e( '&copy; 2024 All Rights Reserved | Powered by', 'login-terms-acceptance' ); ?>
				<a href="https://xtnd.net" target="_blank" rel="noopener noreferrer"><?php echo esc_html( 'XTND' ); ?></a>
			</p>
		</div>
	</div>
</div>

