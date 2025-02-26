<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ACFC
 * @copyright  Copyright (c) 2025, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.0
 */

namespace DEVRY\ACFC;

! defined( ABSPATH ) || exit; // Exit if accessed directly.

/**
 * Display the setting.
 */
function acfc_display_types_supported() {
	$acf_copilot = new ACF_Copilot();

	$types_supported = get_option( 'acfc_types_supported', $acf_copilot->types_supported );

	$options_html = '';

	$types_available = array(
		'post',
		'page',
	);

	foreach ( $types_available as $type ) {
		$type_text = ucwords( str_replace( array( '-', '_' ), ' ', $type ) );
		$selected  = '';

		if ( is_array( $types_supported ) && in_array( $type, $types_supported, true ) ) {
			$selected = 'selected';
		}

		$options_html .= "<option value=\"{$type}\" {$selected}>{$type_text}</option>";
	}
	?>
		<select id="acfc-types-supported" name="acfc_types_supported[]" multiple>
			<?php echo wp_kses( $options_html, json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true ) ); ?>
		</select>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Choose the post types supported by the plugin.', 'acf-copilot' ); ?>
			</small>
		</p>
	<?php
}

/**
 * Sanitize and update the setting.
 */
function acfc_sanitize_types_supported( $types_supported ) {
	// Verify the nonce.
	$_wpnonce = ( isset( $_REQUEST['acfc_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['acfc_wpnonce'] ) ) : '';

	if ( empty( $_wpnonce ) || ! wp_verify_nonce( $_wpnonce, 'acfc_settings_nonce' ) ) {
		return;
	}

	// Nothing selected.
	if ( empty( $types_supported ) ) {
		return;
	}

	// Option changed and updated.
	if ( ! get_transient( 'acfc_settings_types_supported' )
		&& get_option( 'acfc_types_supported', '' ) != $types_supported ) { // Don't use strict comparsions to check that arrays are equal.
		add_settings_error(
			'acfc_settings_errors',
			'acfc_settings_types_supported',
			esc_html__( 'Supported post types option was updated successfully.', 'acf-copilot' ),
			'updated'
		);

		// Add transient to avoid double notice on initial Save when using settings_errors().
		set_transient( 'acfc_settings_types_supported', true, 5 );
	}

	return array_map( 'sanitize_text_field', $types_supported );
}
