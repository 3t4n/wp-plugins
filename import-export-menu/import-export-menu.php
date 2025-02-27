<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://yukyhendiawan.com
 * @since             1.0.0
 * @package           Import_Export_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       Import Export Menu
 * Plugin URI:        https://yukyhendiawan.com
 * Description:       This plugin allows you to export and import menus in WordPress, making it easier to manage and migrate menu structures between sites.
 * Version:           2.0.1
 * Author:            Yuky Hendiawan
 * Author URI:        https://yukyhendiawan.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       import-export-menu
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
define( 'IMPORT_EXPORT_MENU_PLUGIN_NAME', 'Import Export Menu' );
define( 'IMPORT_EXPORT_MENU_VERSION', '2.0.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-import-export-menu-activator.php
 */
function import_export_menu_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-import-export-menu-activator.php';
	Import_Export_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-import-export-menu-deactivator.php
 */
function import_export_menu_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-import-export-menu-deactivator.php';
	Import_Export_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'import_export_menu_activate' );
register_deactivation_hook( __FILE__, 'import_export_menu_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-import-export-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function import_export_menu_run() {

	$plugin = new Import_Export_Menu();
	$plugin->run();
}
import_export_menu_run();
