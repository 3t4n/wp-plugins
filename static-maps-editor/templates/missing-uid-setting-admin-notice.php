<?php
/**
 * The Static Maps Editor - notification panel for missing UID partial.
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
<div class="notice notice-error">
	<p>
		<?php
		printf(
			/* translators: %s here is the admin URL to the Static Maps Editor settings page */
			wp_kses( __( 'API Key missing. Go to <a href="%s">Settings</a> and get yours.', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
			esc_attr( menu_page_url( 'static_maps_editor-settings', false ) )
		);
		?>
	</p>
</div>
