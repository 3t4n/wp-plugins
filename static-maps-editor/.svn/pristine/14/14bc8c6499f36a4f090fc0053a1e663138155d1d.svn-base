<?php
/**
 * The Static Maps Editor - display API Key / UID partial.
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
<input
	id="static_maps_editor_uid"
	class="regular-text code"
	type="text"
	name="static_maps_editor_uid"
	value="<?php echo esc_attr( get_option( 'static_maps_editor_uid', false ) ); ?>"
	aria-describedby="static_maps_editor_uid_description"
	readonly
/>
<p id="static_maps_editor_uid_description" class="description"><?php esc_html_e( 'API Key for generating static maps on the Printmaps.net server', 'static-maps-editor' ); ?></p>
