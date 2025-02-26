<?php
/**
 * Provide a notice to get the consent from user to send data
 *
 * This file is used to markup the admin-facing aspects of the sdk/plugin.
 *
 * @link
 * @since      1.0.0
 *
 * @package    Hash_Track_Optin
 * @subpackage Hash_Track_Optin/SDK/partials
 */

?>
<div class="hto-global-notice notice notice-success">
	<h3><?php echo esc_html( $notice['title'] ); ?></h3>
	<?php if ( isset( $notice['description'] ) ) : ?>
	<p>
		<?php echo wp_kses( $notice['description'], true ); ?>
	</p>
	<?php endif ?>
	<p>
		<button value="skip" class="hto-button-skip button hto-button-skip button-secondary"><?php echo esc_html( isset( $notice['skip_text'] ) ? $notice['skip_text'] : 'Skip' ); ?></button>
		<button value="yes" class="hto-button-allow button button-primary hto-button-allow"><?php echo esc_html( isset( $notice['accept_text'] ) ? $notice['accept_text'] : 'Allow' ); ?></button>
	</p>
</div>
