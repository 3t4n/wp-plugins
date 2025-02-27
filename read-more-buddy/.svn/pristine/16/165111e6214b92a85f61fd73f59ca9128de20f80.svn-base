<?php

/**
 *
 * @link              https://www.linkedin.com/in/stevestewart84/
 * @since             1.0.0
 * @package           Read_mb
 *
 * @wordpress-plugin
 * Plugin Name:       Read More Buddy
 * Plugin URI:        temple.co.za
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Steve Stewart
 * Author URI:        https://www.linkedin.com/in/stevestewart84/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       read_mb
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
define( 'READ_MB_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-read_mb-activator.php
 */
function activate_read_mb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-read_mb-activator.php';
	Read_mb_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-read_mb-deactivator.php
 */
function deactivate_read_mb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-read_mb-deactivator.php';
	Read_mb_Deactivator::deactivate();
}


register_activation_hook( __FILE__, 'activate_read_mb' );
register_deactivation_hook( __FILE__, 'deactivate_read_mb' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-read_mb.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_read_mb() {

	$plugin = new Read_mb();
	$plugin->run();

}
run_read_mb();
