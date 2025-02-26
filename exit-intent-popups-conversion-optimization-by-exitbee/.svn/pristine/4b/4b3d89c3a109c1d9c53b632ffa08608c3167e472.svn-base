<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.6.0
 * @package           Exit_Bee
 *
 * @wordpress-plugin
 * Plugin Name:       Exit Bee
 * Plugin URI:        https://wordpress.org/plugins/exit-intent-popups-conversion-optimization-by-exitbee/
 * Description:       Turn lost visitors into customers with the smartest exit intent tool. Increase conversions, sales and engagement.
 * Version:           1.6.1
 * Author:            Exit Bee
 * Author URI:        http://exitbee.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       exit-bee
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
define( 'EXIT_BEE__VERSION', '1.6.1' );

/**
 * Minimum required plugin PHP version.
 */
define( 'EXIT_BEE__REQUIRED_PHP_VERSION', '5.4' );

/**
 * Minimum required plugin WordPress version.
 */
define( 'EXIT_BEE__REQUIRED_WP_VERSION', '4.1' );

/**
 * The plugin base dir.
 */
define( 'EXIT_BEE__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-exit-bee-activator.php
 */
function activate_exit_bee() {
	require_once EXIT_BEE__PLUGIN_DIR . 'includes/class-exit-bee-activator.php';
	Exit_Bee_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-exit-bee-deactivator.php
 */
function deactivate_exit_bee() {
	require_once EXIT_BEE__PLUGIN_DIR . 'includes/class-exit-bee-deactivator.php';
	Exit_Bee_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_exit_bee' );
register_deactivation_hook( __FILE__, 'deactivate_exit_bee' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require EXIT_BEE__PLUGIN_DIR . 'includes/class-exit-bee.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.6.0
 */
function run_exit_bee() {

	$plugin = new Exit_Bee();
	$plugin->run();

}
run_exit_bee();
