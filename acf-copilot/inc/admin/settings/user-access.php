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
function acfc_display_user_access() {
	$acf_copilot = new ACF_Copilot();

	$user_access = get_option( 'acfc_user_access', $acf_copilot->user_access );

	$options_html = '';

	$roles_available = array_keys( get_editable_roles() );

	foreach ( $roles_available as $role ) {
		$role_text = ucwords( $role );
		$selected  = '';

		if ( is_array( $user_access ) && in_array( $role, $user_access, true ) ) {
			$selected = 'selected';
		}

		$options_html .= "<option value=\"{$role}\" {$selected}>{$role_text}</option>";
	}
	?>
		<select id="acfc-user-access" name="acfc_user_access[]" multiple>
			<?php echo wp_kses( $options_html, json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR, true ) ); ?>
		</select>
		<p class="description">
			<small>
				<?php echo esc_html__( 'Choose the user access capabilities.', 'acf-copilot' ); ?>
			</small>
		</p>
	<?php
}

/**
 * Sanitize and update the setting.
 */
function acfc_sanitize_user_access( $user_access ) {
	// Verify the nonce.
	$_wpnonce = ( isset( $_REQUEST['acfc_wpnonce'] ) ) ? sanitize_text_field( wp_unslash( $_REQUEST['acfc_wpnonce'] ) ) : '';

	if ( empty( $_wpnonce ) || ! wp_verify_nonce( $_wpnonce, 'acfc_settings_nonce' ) ) {
		return;
	}

	// Nothing selected.
	if ( empty( $user_access ) ) {
		return;
	}

	// Option changed and updated.
	if ( ! get_transient( 'acfc_settings_user_access' )
		&& get_option( 'acfc_user_access' ) != $user_access ) {
		add_settings_error(
			'acfc_settings_errors',
			'acfc_settings_user_access',
			esc_html__( 'User access option was updated successfully.', 'acf-copilot' ),
			'updated'
		);

		// Add transient to avoid double notice on initial Save when using settings_errors().
		set_transient( 'acfc_settings_user_access', true, 5 );
	}

	return array_map( 'sanitize_text_field', $user_access );
}
