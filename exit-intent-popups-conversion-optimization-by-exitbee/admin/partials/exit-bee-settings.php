<?php
/**
 * Exit Bee Settings page
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @since      1.6.0
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/admin/partials
 */

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h1><?php esc_html_e( 'Exit Bee Settings', 'exit-bee' ); ?></h1>
	<form method="post" action="options.php">
		<?php
		// Output security fields for the registered setting "exitbee_settings".
		settings_fields( 'exitbee_settings' );
		// Output setting sections and their fields (sections are registered for "exitbee", each field is registered to a specific section).
		do_settings_sections( 'exitbee_settings' );
		// Output save settings button.
		submit_button( 'Save Settings' );
		?>
	</form>
</div>
