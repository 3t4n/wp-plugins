<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.demotic.co.uk/
 * @since      1.0.0
 *
 * @package    Advanced_Forms_Paypal_Payment_Buttons
 * @subpackage Advanced_Forms_Paypal_Payment_Buttons/admin/partials
 */
?>
<div class="wrap">
	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<?php settings_errors(); ?>
	<?php echo '<p>' . __( 'These are the global Advanced Form PayPal Payment Buttons settings.', $this->plugin_name ) . '</p>'; ?>
	<form action="options.php" method="post">
		<?php
			settings_fields( $this->option_name );
			do_settings_sections( $this->option_name );
			submit_button();
		?>
	</form>
</div>
