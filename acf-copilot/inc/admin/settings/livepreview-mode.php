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
function acfc_display_livepreview_mode() {
	$acf_copilot = new ACF_Copilot();

	$livepreview_mode = get_option( 'acfc_livepreview_mode', $acf_copilot->livepreview_mode );

	// Livepreview option if empty or non-existent then On, otherwise Off.
	if ( 'off' === $livepreview_mode ) {
		$livepreview_mode = 'selected';
	}

	printf(
		'<select id="acfc-livepreview-mode" name="acfc_livepreview_mode">
			<option value="">On</option>
			<option value="off" %1$s>Off</option>
		</select>',
		esc_attr( $livepreview_mode )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Set ACF fields LivePreview mode globally.', 'acf-copilot' ); ?>
			</small>
		</p>
	<?php
}

/**
 * Sanitize and update the setting.
 */
function acfc_sanitize_livepreview_mode( $livepreview_mode ) {
	// Verify the nonce.
	$_wpnonce = ( isset( $_REQUEST['acfc_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['acfc_wpnonce'] ) ) : '';

	if ( empty( $_wpnonce ) || ! wp_verify_nonce( $_wpnonce, 'acfc_settings_nonce' ) ) {
		return;
	}

	// Nothing selected.
	if ( empty( $livepreview_mode ) ) {
		return;
	}

	// Option changed and updated.
	if ( ! get_transient( 'acfc_settings_livepreview_mode' )
		&& get_option( 'acfc_livepreview_mode', '' ) !== $livepreview_mode ) {
		add_settings_error(
			'acfc_settings_errors',
			'acfc_settings_livepreview_mode',
			esc_html__( 'LivePreview option was updated successfully.', 'acf-copilot' ),
			'updated'
		);

		// Add transient to avoid double notice on initial Save when using settings_errors().
		set_transient( 'acfc_settings_livepreview_mode', true, 5 );
	}

	return sanitize_text_field( wp_unslash( $livepreview_mode ) );
}
