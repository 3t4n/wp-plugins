<?php
/**
 * The Static Maps Editor - the settings page.
 *
 * @since   1.0.0
 * @package Static_Maps_Editor
 * @author  Printmaps
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

?>
<div class="wrap">
	<?php
		settings_errors();
	?>
	<form name="static_maps_editor_settings" method="POST" action="options.php">
		<?php
			settings_fields( 'static_maps_editor-settings' );
			do_settings_sections( 'static_maps_editor-settings' );
			do_settings_sections( 'static_maps_editor-settings-privacy' );
			submit_button();
		?>
	</form>
</div>
