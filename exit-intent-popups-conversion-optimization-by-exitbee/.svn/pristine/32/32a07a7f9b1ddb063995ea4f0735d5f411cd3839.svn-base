<?php
/**
 * Fired during plugin activation
 *
 * @since      1.6.0
 *
 * @package    Exit_Bee
 * @subpackage Exit_Bee/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.6.0
 * @package    Exit_Bee
 * @subpackage Exit_Bee/includes
 * @author     Foteini Giannaropoulou <foteini.giannaropoulou@exitbee.com>
 */
class Exit_Bee_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.6.0
	 */
	public static function activate() {
		$rc = self::check_requirements_exit_bee();
		if ( $rc->passes() ) {
			return;
		}

		$error_msg = '';

		if ( ! $rc->php_passes() ) {
			$error_msg .= 'The Exit Bee plugin cannot run on PHP versions older than ' .
				EXIT_BEE__REQUIRED_PHP_VERSION . '. Please contact your host and ask them to upgrade.';
		}

		if ( ! $rc->wp_passes() ) {
			$error_msg .= 'The Exit Bee plugin cannot run on WordPress versions older than ' .
				EXIT_BEE__REQUIRED_WP_VERSION . '. Please update your WordPress.';
		}

		wp_die( esc_html( $error_msg, 'exit-bee' ) );
	}

	/**
	 * The code that runs before plugin activation to check that the plugin
	 * requirements are met.
	 * This action is documented in includes/class-exit-bee-requirements-check.php
	 */
	private static function check_requirements_exit_bee() {
		require_once EXIT_BEE__PLUGIN_DIR . 'includes/class-exit-bee-requirements-check.php';
		$rc = new Exit_Bee_Requirements_Check( EXIT_BEE__REQUIRED_PHP_VERSION, EXIT_BEE__REQUIRED_WP_VERSION );

		return $rc;
	}
}
