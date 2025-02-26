<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://plugin.nl
 * @since             1.0.0
 * @package           Browser_Tab_Title_Reminder
 *
 * @wordpress-plugin
 * Plugin Name:       Change browser tab title when tab is not active
 * Plugin URI:        https://plugin.nl/browser-tab-title-reminder/
 * Description:       With this plugin you can change the title tag in a tab when a user is in another tab / not active.
 * Version:           1.0.1
 * Author:            Tim van Iersel, Plugin.nl
 * Author URI:        https://plugin.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       browser-tab-title-reminder
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
define( 'BROWSER_TAB_TITLE_REMINDER_VERSION', '1.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-browser-tab-title-reminder-activator.php
 */
function activate_browser_tab_title_reminder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-browser-tab-title-reminder-activator.php';
	Browser_Tab_Title_Reminder_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-browser-tab-title-reminder-deactivator.php
 */
function deactivate_browser_tab_title_reminder() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-browser-tab-title-reminder-deactivator.php';
	Browser_Tab_Title_Reminder_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_browser_tab_title_reminder' );
register_deactivation_hook( __FILE__, 'deactivate_browser_tab_title_reminder' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-browser-tab-title-reminder.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_browser_tab_title_reminder() {

	$plugin = new Browser_Tab_Title_Reminder();
	$plugin->run();

}
run_browser_tab_title_reminder();
