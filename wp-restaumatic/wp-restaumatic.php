<?php
/**
 * The main WP Restaumatic plugin file.
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.restaumatic.com
 * @since             1.0.0
 * @package           WP_Restaumatic
 *
 * @wordpress-plugin
 * Plugin Name:       WP Restaumatic
 * Plugin URI:        https://www.restaumatic.com/en/ordering-system/
 * Description:       Restaumatic Active Menu integration. Fully featured food ordering system for your WordPress website.
 * Version:           1.0.3
 * Author:            Restaumatic
 * Author URI:        https://www.restaumatic.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-restaumatic
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Update it as you release new versions.
 */
define( 'WP_RESTAUMATIC_VERSION', '1.0.3' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-restaumatic.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function wp_restaumatic_run() {

	$plugin = new WP_Restaumatic();
	$plugin->run();

}

wp_restaumatic_run();
