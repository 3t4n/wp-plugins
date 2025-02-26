<?php
/**
 * Append User ID
 *
 * A plugin which adds some shortcode to append the current user ID to a link (href)
 *
 * @link              mardell.me
 * @since             1.0.0
 * @package           append_id
 *
 * @wordpress-plugin
 * Plugin Name:       Append User ID
 * Description:       Adds shortcode to append the current user ID to a link (href).
 * Version:           1.0.0
 * Author:            Andy Mardell
 * Author URI:        mardell.me
 * Text Domain:       append-id
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'APPEND_ID_VERSION', '1.0.0' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-append-id.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function append_id_run() {

	$plugin = new Append_ID();
	$plugin->run();

}

/**
 * Run the plugin
 */
append_id_run();
