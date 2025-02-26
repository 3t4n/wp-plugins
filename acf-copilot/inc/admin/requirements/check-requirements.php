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

! defined( ABSPATH ) || exit; // Exit if accessed directly

/**
 * Check the system requirements for the plugin and perform actions accordingly.
 */
function acfc_check_requirements() {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';

	// Display message if ACF or ACF Pro aren't active.
	if ( ! class_exists( 'ACF' ) ) {
		if ( isset( $_REQUEST['activate'] ) ) {
			unset( $_REQUEST['activate'] );
		}

		$message = sprintf(
			/* translators: %1$s is replaced with "ACF Copilot" */
			/* translators: %2$s is replaced with "Advanced Custom Fields" */
			esc_html__( '%1$s requires %2$s to be installed and activated.', 'acf-copilot' ),
			'<strong>' . esc_html__( 'ACF Copilot', 'acf-copilot' ) . '</strong>',
			'<strong>' . esc_html__( 'Advanced Custom Fields', 'acf-copilot' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		deactivate_plugins( ACFC_PLUGIN_BASENAME );
		return;
	}

	// Display message if ACF doesn't meet the minimum required version.
	if ( defined( 'ACF_VERSION' ) && ! version_compare( ACF_VERSION, ACFC_MIN_ACF_VERSION, '>=' ) ) {
		if ( isset( $_REQUEST['activate'] ) ) {
			unset( $_REQUEST['activate'] );
		}

		$message = sprintf(
			/* translators: %1$s is replaced with "ACF Copilot" */
			/* translators: %2$s is replaced with "Advanced Custom Fields" */
			/* translators: %3$s is replaced with "Required ACF Version" */
			esc_html__( '%1$s requires %2$s version %3$s or greater.', 'acf-copilot' ),
			'<strong>' . esc_html__( 'ACF Copilot', 'acf-copilot' ) . '</strong>',
			'<strong>' . esc_html__( 'Advanced Custom Fields', 'acf-copilot' ) . '</strong>',
			ACFC_MIN_ACF_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		deactivate_plugins( ACFC_PLUGIN_BASENAME );
		return;
	}

	if ( version_compare( PHP_VERSION, ACFC_MIN_PHP_VERSION ) >= 0
		&& version_compare( $GLOBALS['wp_version'], ACFC_MIN_WP_VERSION ) >= 0 ) {
		load_plugin_textdomain( ACFC_PLUGIN_TEXTDOMAIN, false, ACFC_PLUGIN_BASENAME . 'lang' );

		add_action(
			'plugin_action_links',
			__NAMESPACE__ . '\acfc_add_action_links',
			10,
			2
		);

		add_action(
			'admin_enqueue_scripts',
			__NAMESPACE__ . '\acfc_enqueue_admin_assets'
		);

		add_action(
			'admin_notices',
			__NAMESPACE__ . '\acfc_display_rating_notice'
		);

		add_action(
			'admin_notices',
			__NAMESPACE__ . '\acfc_display_upgrade_notice'
		);
	} else {
		$message = sprintf(
			wp_kses(
				/* translators: %1$s is replaced with "Plugin Name" */
				/* translators: %2$s is replaced with "Min PHP Version" */
				/* translators: %3$s is replaced with "Min WP Version" */
				__( '%1$s requires a minimum of PHP %2$s and WordPress %3$s', 'acf-copilot' ),
				json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR )
			),
			'<strong>' . ACFC_PLUGIN_NAME . '</strong>',
			'<em>' . ACFC_MIN_PHP_VERSION . '</em>',
			'<em>' . ACFC_MIN_WP_VERSION . '</em>.<br />'
		);

		$message .= sprintf(
			wp_kses(
				/* translators: %1$s is replaced with "PHP Version" */
				/* translators: %2$s is replaced with "WordPress Version" */
				__( 'You are currently running PHP %1$s and WordPress %2$s.', 'acf-copilot' ),
				json_decode( ACFC_PLUGIN_ALLOWED_HTML_ARR )
			),
			'<strong>' . PHP_VERSION . '</strong>',
			'<strong>' . $GLOBALS['wp_version'] . '</strong>'
		);

		printf( '<div class="notice notice-error is-dismissible"><p>%1$s</p></div>', $message ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		deactivate_plugins( ACFC_PLUGIN_BASENAME );
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\acfc_check_requirements' );
