<?php
/**
 * Fired during plugin deactivation
 *
 * @link    https://personalizewp.com
 * @since   1.0.0
 *
 * @package PersonalizeWP
 */

namespace PersonalizeWP;

defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 */
class Deactivator {

	/**
	 * Clean up during de-activation
	 */
	public static function deactivate() {

		// Un-autoload options
		if ( function_exists( 'wp_set_option_autoload_values' ) ) {
			wp_set_options_autoload(
				[
					'_pwp_db_version',
					'personalizewp',
					'pwp_admin_onboarding_dismissed',
					'pwp_pending_onboarding',
				],
				false
			);
		}
	}
}
