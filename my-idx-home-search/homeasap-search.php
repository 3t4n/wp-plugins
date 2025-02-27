<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://about.homeasap.com
 * @since             1.0.0
 * @package           Homeasap_Search
 *
 * @wordpress-plugin
 * Plugin Name:       My IDX Home Search
 * Plugin URI:        https://about.homeasap.com/wordpress/idx
 * Description:       Generate new leads by adding a home search to your site.
 * Version:           2.1.2
 * Author:            HomeASAP LLC
 * Author URI:        https://about.homeasap.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       homeasap-search
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'HOMEASAP_SEARCH_VERSION', '2.1.2' );
define( 'HOMEASAP_SEARCH_BASE_NAME', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-homeasap-search-activator.php
 */
function activate_homeasap_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-homeasap-search-activator.php';
	Homeasap_Search_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-homeasap-search-deactivator.php
 */
function deactivate_homeasap_search() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-homeasap-search-deactivator.php';
	Homeasap_Search_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_homeasap_search' );
register_deactivation_hook( __FILE__, 'deactivate_homeasap_search' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-homeasap-search.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_homeasap_search() {

	$plugin = new Homeasap_Search();
	$plugin->run();

}
run_homeasap_search();
