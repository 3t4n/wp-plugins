<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://abtesting.ai/
 * @since             1.0.0
 * @package           Abtesting_Ai
 *
 * @wordpress-plugin
 * Plugin Name:       ABtesting.ai - Landing Page Optimization
 * Description:       Automate your landing page A/B testing by using AI.
 * Version:           1.0.0
 * Author:            ABtesting.ai
 * Author URI:        https://abtesting.ai/
 * Text Domain:       abtesting-ai
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
define( 'ABTESTING_AI_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-abtesting-ai-activator.php
 */
function activate_abtesting_ai() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-abtesting-ai-activator.php';
	Abtesting_Ai_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-abtesting-ai-deactivator.php
 */
function deactivate_abtesting_ai() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-abtesting-ai-deactivator.php';
	Abtesting_Ai_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_abtesting_ai' );
register_deactivation_hook( __FILE__, 'deactivate_abtesting_ai' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-abtesting-ai.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_abtesting_ai() {

	$plugin = new Abtesting_Ai();
	$plugin->run();

}
run_abtesting_ai();
