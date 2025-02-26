<?php
/**
 * Aithenticate
 *
 * @package           Aithenticate
 *
 * Plugin Name:       Aithenticate
 * Description:       The #1 plugin to enhance your transparency and compliance towards Artificial Intelligence.
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      7.4
 * Author:            Aithenticate
 * Author URI:        https://aithenticate.org/
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aithenticate
 * Domain Path:       /languages
 */

defined( 'ABSPATH' ) || die;

if ( ! defined( 'AITHENTICATE_PLUGIN_FILE' ) ) {
	define( 'AITHENTICATE_PLUGIN_FILE', __FILE__ );
}

require_once __DIR__ . '/vendor/autoload.php';

if ( ! function_exists( 'aithenticate' ) ) {
	/**
	 * Get the plugin instance.
	 *
	 * @return Aithenticate
	 */
	function aithenticate() {
		return Aithenticate::get_instance();
	}
}

aithenticate();

if (
	Aithenticate_Licenser::check_wp_plugin(
		get_option( 'aithenticate_license_key' ),
		get_option( 'aithenticate_license_email' ),
		$error,
		$response,
		__FILE__
	)
) {
	aithenticate()->license = $response;
}
