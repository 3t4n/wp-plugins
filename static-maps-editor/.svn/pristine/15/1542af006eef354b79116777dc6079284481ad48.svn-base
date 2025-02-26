<?php
/**
 * The Static Maps Editor - privacy settings partial.
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
	<label for="static_maps_editor_privacy_policy_accepted">
	<input name="static_maps_editor_privacy_policy_accepted" type="checkbox" id="static_maps_editor_privacy_policy_accepted" value="1" <?php checked( 1, get_option( 'static_maps_editor_privacy_policy_accepted', false ) ); ?>>
		<i>
		<?php
		printf(
			/* translators: %s here is the i18n-ed privacy policy url */
			wp_kses( __( 'I agree to the <a href="%s" target="_blank">privacy policy</a>', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
			esc_url( __( 'https://www.printmaps.net/data-protection-policy/#plugin', 'static-maps-editor' ) )
		);
		?>
		</i>
	</label>
</fieldset>
<fieldset>
	<label for="static_maps_editor_tos_accepted">
		<input name="static_maps_editor_tos_accepted" type="checkbox" id="static_maps_editor_tos_accepted" value="1" <?php checked( 1, get_option( 'static_maps_editor_tos_accepted', false ) ); ?>>
		<i>
		<?php
		printf(
			/* translators: %s here is the i18n-ed ToS url */
			wp_kses( __( 'I agree to the <a href="%s" target="_blank">terms of use</a>', 'static-maps-editor' ), Static_Maps_Editor::static_maps_editor_allowed_html() ),
			esc_url( __( 'https://www.printmaps.net/terms-of-use/#plugin', 'static-maps-editor' ) )
		);
		?>
		</i>
	</label>
</fieldset>
