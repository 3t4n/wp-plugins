<?php

/**
 *
 * @link              https://webdeclic.com/
 * @since             1.0.0
 * @package           Cookie_Dough_Consent
 *
 * @wordpress-plugin
 * Plugin Name:       Cookie Dough Compliance and Consent for GDPR
 * Plugin URI:        https://webdeclic.com/projets/creation-de-lextension-wordpress-cookies-dough/
 * Description:       Cookie Dough Compliance and Consent for GDPR is a GDPR cookie consent extension. Style your modal cookie.
 * Version:           2.2.3
 * Author:            Webdeclic
 * Author URI:        https://webdeclic.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cookie-dough-consent
 * Domain Path:       /languages
 * 
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Check if your are in local or production environment
 */
$is_local = $_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1';

/**
 * If you are in local environment, you can use the version number as a timestamp for better cache management in your browser
 */
$version  = get_file_data( __FILE__, array( 'Version' => 'Version' ), false )['Version'];

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'COOKIE_DOUGH_CONSENT_VERSION', $version );

/**
 * You can use this const for check if you are in local environment
 */
define( 'COOKIE_DOUGH_CONSENT_DEV_MOD', $is_local );

/**
 * Plugin Name text domain for internationalization.
 */
define( 'COOKIE_DOUGH_CONSENT_TEXT_DOMAIN', 'cookie-dough-consent' );

/**
 * Plugin Name Path for plugin includes.
 */
define( 'COOKIE_DOUGH_CONSENT_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Plugin Name URL for plugin sources (css, js, images etc...).
 */
define( 'COOKIE_DOUGH_CONSENT_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cookie-dough-consent-activator.php
 */
function activate_cookie_dough_consent() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cookie-dough-consent-activator.php';
	Cookie_Dough_Consent_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cookie-dough-consent-deactivator.php
 */
function deactivate_cookie_dough_consent() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cookie-dough-consent-deactivator.php';
	Cookie_Dough_Consent_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cookie_dough_consent' );
register_deactivation_hook( __FILE__, 'deactivate_cookie_dough_consent' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cookie-dough-consent.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cookie_dough_consent() {

	$plugin = new Cookie_Dough_Consent();
	$plugin->run();

}
run_cookie_dough_consent();
