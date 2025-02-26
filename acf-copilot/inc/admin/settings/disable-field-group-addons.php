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
function acfc_display_disable_field_group_addons() {
	$acf_copilot = new ACF_Copilot();

	$disable_field_group_addons = get_option( 'acfc_disable_field_group_addons', $acf_copilot->disable_field_group_addons );

	// Compact mode option if empty or non-existent then No, otherwise Yes.
	if ( 'yes' === $disable_field_group_addons ) {
		$disable_field_group_addons = 'selected';
	}

	printf(
		'<select id="acfc-compact-mode" name="acfc_disable_field_group_addons">
			<option value="">No</option>
			<option value="yes" %1$s>Yes</option>
		</select>',
		esc_attr( $disable_field_group_addons )
	);
	?>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Disable the ACF field group addons feature.', 'acf-copilot' ); ?>
			</small>
		</p>
	<?php
}

/**
 * Sanitize and update the setting.
 */
function acfc_sanitize_disable_field_group_addons( $disable_field_group_addons ) {
	// Verify the nonce.
	$_wpnonce = ( isset( $_REQUEST['acfc_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['acfc_wpnonce'] ) ) : '';

	if ( empty( $_wpnonce ) || ! wp_verify_nonce( $_wpnonce, 'acfc_settings_nonce' ) ) {
		return;
	}

	// Nothing selected.
	if ( empty( $disable_field_group_addons ) ) {
		return;
	}

	// Option changed and updated.
	if ( ! get_transient( 'acfc_settings_disable_field_group_addons' )
		&& get_option( 'acfc_disable_field_group_addons', '' ) !== $disable_field_group_addons ) {
		add_settings_error(
			'acfc_settings_errors',
			'acfc_settings_disable_field_group_addons',
			esc_html__( 'Field group addons option was updated successfully.', 'acf-copilot' ),
			'updated'
		);

		// Add transient to avoid double notice on initial Save when using settings_errors().
		set_transient( 'acfc_settings_disable_field_group_addons', true, 5 );
	}

	return sanitize_text_field( wp_unslash( $disable_field_group_addons ) );
}
