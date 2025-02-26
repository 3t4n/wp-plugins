<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.ivisa.com/
 * @since             1.0.0
 * @package           Ivisa
 *
 * @wordpress-plugin
 * Plugin Name:       iVisa Travel
 * Plugin URI:        https://www.ivisa.com/
 * Description:       Used by many travelers worldwide, iVisa Travel is the best tool to know which countries need a travel visa to enter. In addition, iVisa Travel is able to process visas for many of those countries using a 100% online and simplified application process. If you are a travel related blogger you can also use this plugin to earn monthly recurring revenue through iVisa's affiliate program (more information at https://www.ivisa.com/affiliates). To get started: activate the iVisa Travel plugin and then go to your iVisa Travel Settings page to set up the plugin.
 * Version:           1.0.1
 * Author:            iVisa.com
 * Author URI:        https://www.ivisa.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ivisa
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ivisa-activator.php
 */
function activate_ivisa() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ivisa-activator.php';
	Ivisa_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ivisa-deactivator.php
 */
function deactivate_ivisa() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ivisa-deactivator.php';
	Ivisa_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ivisa' );
register_deactivation_hook( __FILE__, 'deactivate_ivisa' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ivisa.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ivisa() {

	$plugin = new Ivisa();
	$plugin->run();

}
run_ivisa();
