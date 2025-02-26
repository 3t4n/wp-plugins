<?php

/**
 * Asimov
 *
 * @since             1.0.0
 * @package           asimov-plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Asimov
 * Plugin URI:        https://imasimov.com
 * Description:       Asimov plugin for WordPress CMS
 * Version:           1.1.0
 * Author:            ASC27
 * Author URI:        https://www.asc27.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       asimov-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'ASIMOV_PLUGIN_VERSION', '1.1.0' );

/**
 * Shenanigans to have custom lang as po file and locale filters
 */
include_once(ABSPATH . 'wp-includes/pluggable.php');
function asimov_locale_filter($locale, $domain) {
	if($domain === 'asimov-plugin')
	{
		if ($locale !== 'it_IT')
			return 'en_US';
	}

	return $locale;
}
add_filter('plugin_locale', 'asimov_locale_filter', 10, 2);
load_plugin_textdomain(
	'asimov-plugin',
	false,
	dirname( plugin_basename( __FILE__ ) ) . '/languages/'
);

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-settings-page-activator.php
 */
function activate_asimov() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-asimov-activator.php';
	Asimov_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-settings-page-deactivator.php
 */
function deactivate_asimov() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-asimov-deactivator.php';
	Asimov_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_asimov' );
register_deactivation_hook( __FILE__, 'deactivate_asimov' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-asimov.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_asimov() {

	$plugin = new Asimov();
	$plugin->run();

}
run_asimov();
