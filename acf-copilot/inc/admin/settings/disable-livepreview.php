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
function acfc_display_disable_livepreview() {
	$acf_copilot = new ACF_Copilot();

	$disable_livepreview = get_option( 'acfc_disable_livepreview', $acf_copilot->disable_livepreview );

	// Compact mode option if empty or non-existent then No, otherwise Yes.
	if ( 'yes' === $disable_livepreview ) {
		$disable_livepreview = 'selected';
	}

	printf(
		'<select id="acfc-disable-livepreview" name="acfc_disable_livepreview">
			<option value="">No</option>
			<option value="yes" %1$s>Yes</option>
		</select>',
		esc_attr( $disable_livepreview )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Disable the LivePreview mode feature from your editors.', 'acf-copilot' ); ?>
			</small>
		</p>
	<?php
}

/**
 * Sanitize and update the setting.
 */
function acfc_sanitize_disable_livepreview( $disable_livepreview ) {
	// Verify the nonce.
	$_wpnonce = ( isset( $_REQUEST['acfc_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['acfc_wpnonce'] ) ) : '';

	if ( empty( $_wpnonce ) || ! wp_verify_nonce( $_wpnonce, 'acfc_settings_nonce' ) ) {
		return;
	}

	// Nothing selected.
	if ( empty( $disable_livepreview ) ) {
		return;
	}

	// Option changed and updated.
	if ( ! get_transient( 'acfc_settings_disable_livepreview' )
		&& get_option( 'acfc_disable_livepreview', '' ) !== $disable_livepreview ) {
		add_settings_error(
			'acfc_settings_errors',
			'acfc_settings_disable_livepreview',
			esc_html__( 'Disable live preview option was updated successfully.', 'acf-copilot' ),
			'updated'
		);

		// Add transient to avoid double notice on initial Save when using settings_errors().
		set_transient( 'acfc_settings_disable_livepreview', true, 5 );
	}

	return sanitize_text_field( wp_unslash( $disable_livepreview ) );
}
