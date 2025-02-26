<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.indianic.com
 * @since             1.0.0
 * @package           Custom_Table_Csv
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Table CSV Export With Filters
 * Plugin URI:        https://www.indianic.com
 * Description:       Its simple plugin that export custom data in csv format.
 * Version:           1.0.0
 * Author:            MageINIC
 * Author URI:        https://www.indianic.com/enquiry
 * License:           GPL-3.0
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       custom-table-csv
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
define( 'CUSTOM_TABLE_CSV_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-table-csv-activator.php
 */
function activate_custom_table_csv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-table-csv-activator.php';
	Custom_Table_Csv_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-table-csv-deactivator.php
 */
function deactivate_custom_table_csv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-table-csv-deactivator.php';
	Custom_Table_Csv_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_table_csv' );
register_deactivation_hook( __FILE__, 'deactivate_custom_table_csv' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-table-csv.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_table_csv() {

	$plugin = new Custom_Table_Csv();
	$plugin->run();

}
run_custom_table_csv();
