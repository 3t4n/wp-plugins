<?php
/**
 * The Static Maps Editor - map size settings partial
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
	<span><?php esc_html_e( 'Default dimensions', 'static-maps-editor' ); ?></span>
	</legend>
	<label for="static_maps_editor_size_width" style="min-width:8em;vertical-align:baseline"><?php esc_html_e( 'Width', 'static-maps-editor' ); ?></label>
	<input name="static_maps_editor_size_width" type="number" step="1" min="258" max="1024" id="static_maps_editor_size_width" value="<?php echo esc_attr( get_option( 'static_maps_editor_size_width', Static_Maps_Editor::STATIC_MAPS_EDITOR_DEFAULT_SIZE_WIDTH ) ); ?>" class="small-text"> px
	<br>
	<label for="static_maps_editor_size_height" style="min-width:8em;vertical-align:baseline"><?php esc_html_e( 'Height', 'static-maps-editor' ); ?></label>
	<input name="static_maps_editor_size_height" type="number" step="1" min="258" max="1024" id="static_maps_editor_size_height" value="<?php echo esc_attr( get_option( 'static_maps_editor_size_height', Static_Maps_Editor::STATIC_MAPS_EDITOR_DEFAULT_SIZE_HEIGHT ) ); ?>" class="small-text"> px
</fieldset>
