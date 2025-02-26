<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              aiaibot
 * @since             1.0.3
 * @package           Aiaibot
 *
 * @wordpress-plugin
 * Plugin Name:       aiaibot
 * Plugin URI:        https://wordpress.org/plugins/aiaibot/
 * Description:       Integrate your aiaibot chatbot.
 * Version:           1.0.3
 * Author:            aiaibot
 * Author URI:        https://app.aiaibot.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       aiaibot
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.3 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'AIAIBOT_VERSION', '1.0.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-aiaibot-activator.php
 */
function activate_aiaibot() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aiaibot-activator.php';
	Aiaibot_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-aiaibot-deactivator.php
 */
function deactivate_aiaibot() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-aiaibot-deactivator.php';
	Aiaibot_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aiaibot' );
register_deactivation_hook( __FILE__, 'deactivate_aiaibot' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-aiaibot.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.3
 */
function run_aiaibot() {

	$plugin = new Aiaibot();
	$plugin->run();

}
run_aiaibot();
