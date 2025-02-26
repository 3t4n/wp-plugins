<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/thechetanvaghela
 * @since             1.0.0
 * @package           Manage_Remove_Version_Number_From_Css_Js
 *
 * @wordpress-plugin
 * Plugin Name:       Manage/Remove version number from CSS & JS
 * Plugin URI:        https://github.com/thechetanvaghela/manage-remove-version-number-from-css-js
 * Description:       This plugin provide an option to manage or remove the version number from CSS and JS files.
 * Version:           1.0.1
 * Author:            Chetan Vaghela
 * Author URI:        https://github.com/thechetanvaghela
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       manage-remove-version-number-from-css-js
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
define( 'MANAGE_REMOVE_VERSION_NUMBER_FROM_CSS_JS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-manage-remove-version-number-from-css-js-activator.php
 */
function activate_manage_remove_version_number_from_css_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-manage-remove-version-number-from-css-js-activator.php';
	Manage_Remove_Version_Number_From_Css_Js_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-manage-remove-version-number-from-css-js-deactivator.php
 */
function deactivate_manage_remove_version_number_from_css_js() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-manage-remove-version-number-from-css-js-deactivator.php';
	Manage_Remove_Version_Number_From_Css_Js_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_manage_remove_version_number_from_css_js' );
register_deactivation_hook( __FILE__, 'deactivate_manage_remove_version_number_from_css_js' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-manage-remove-version-number-from-css-js.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_manage_remove_version_number_from_css_js() {

	$plugin = new Manage_Remove_Version_Number_From_Css_Js();
	$plugin->run();

}
run_manage_remove_version_number_from_css_js();
