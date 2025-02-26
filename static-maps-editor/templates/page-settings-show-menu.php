<?php
/**
 * The Static Maps Editor - menu display location settings partial.
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
<fieldset>
	<legend class="screen-reader-text">
	<span><?php esc_html_e( 'Hide from main navigation', 'static-maps-editor' ); ?></span>
	</legend>
	<label for="static_maps_editor_menu">
	<input name="static_maps_editor_menu" type="checkbox" id="static_maps_editor_menu" value="1" <?php checked( 1, get_option( 'static_maps_editor_menu', false ) ); ?>>
		<?php esc_html_e( 'Show "Add Static Map" under "Media" and "Static Maps Editor Settings" under "Settings"', 'static-maps-editor' ); ?>
	</label>
</fieldset>
