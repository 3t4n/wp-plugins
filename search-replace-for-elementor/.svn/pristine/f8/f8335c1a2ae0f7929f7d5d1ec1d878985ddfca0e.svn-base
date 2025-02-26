<?php
/**
 * [Short description]
 *
 * @package    DEVRY\ELEMSNR
 * @copyright  Copyright (c) 2024, Developry Ltd.
 * @license    https://www.gnu.org/licenses/gpl-3.0.html GNU Public License
 * @since      1.3
 */

namespace DEVRY\ELEMSNR;

! defined( ABSPATH ) || exit; // Exit if accessed directly

/**
 * Stop plugin activation if minimum requirement aren't met & display error notice.
 */
function elemsnr_check_requirements() {
	require_once ABSPATH . 'wp-admin/includes/plugin.php';

	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action(
			'admin_notices',
			__NAMESPACE__ . '\elemsnr_elementor_missing'
		);

		deactivate_plugins( ELEMSNR_PLUGIN_BASENAME );
		return;
	}

	if ( ! version_compare( ELEMENTOR_VERSION, ELEMSNR_MIN_ELEMENTOR_VERSION, '>=' ) ) {
		add_action(
			'admin_notices',
			__NAMESPACE__ . '\elemsnr_elementor_min_version'
		);

		deactivate_plugins( ELEMSNR_PLUGIN_BASENAME );
		return;
	}

	if ( version_compare( PHP_VERSION, ELEMSNR_MIN_PHP_VERSION ) >= 0
		&& version_compare( $GLOBALS['wp_version'], ELEMSNR_MIN_WP_VERSION ) >= 0 ) {
		load_plugin_textdomain( ELEMSNR_PLUGIN_TEXTDOMAIN, false, ELEMSNR_PLUGIN_BASENAME . 'lang' );

		add_action(
			'plugin_action_links',
			__NAMESPACE__ . '\elemsnr_add_action_links',
			10,
			2
		);

		add_action(
			'elementor/editor/after_enqueue_scripts',
			__NAMESPACE__ . '\elemsnr_enqueue_elementor_assets'
		);

		add_action(
			'admin_enqueue_scripts',
			__NAMESPACE__ . '\elemsnr_enqueue_admin_assets'
		);

		add_action(
			'admin_notices',
			__NAMESPACE__ . '\elemsnr_display_rating_notice'
		);

		add_action(
			'admin_notices',
			__NAMESPACE__ . '\elemsnr_display_upgrade_notice'
		);
	} else {
		$message = sprintf(
			/* translators: %1$s is replaced with "Plugin Name" */
			/* translators: %2$s is replaced with "Min PHP Version" */
			/* translators: %3$s is replaced with "Min WP Version" */
			wp_kses( esc_html__( '%1$s requires a minimum of PHP %2$s and WordPress %3$s', 'search-replace-for-elementor' ), json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) ),
			'<strong>' . ELEMSNR_PLUGIN_NAME . '</strong>',
			'<em>' . ELEMSNR_MIN_PHP_VERSION . '</em>',
			'<em>' . ELEMSNR_MIN_WP_VERSION . '</em>.<br />'
		);

		$message .= sprintf(
			/* translators: %1$s is replaced with "PHP Version" */
			/* translators: %2$s is replaced with "WordPress Version" */
			wp_kses( esc_html__( 'You are currently running PHP %1$s and WordPress %2$s.', 'search-replace-for-elementor' ), json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) ),
			'<strong>' . PHP_VERSION . '</strong>',
			'<strong>' . $GLOBALS['wp_version'] . '</strong>'
		);

		printf(
			/* translators: %1$s is replaced with PHP and WordPress message check */
			'<div class="notice notice-error is-dismissible"><p>%1$s</p></div>',
			wp_kses( $message, json_decode( ELEMSNR_PLUGIN_ALLOWED_HTML_ARR, true ) )
		);

		deactivate_plugins( ELEMSNR_PLUGIN_BASENAME );
	}
}

add_action( 'admin_init', __NAMESPACE__ . '\elemsnr_check_requirements' );
