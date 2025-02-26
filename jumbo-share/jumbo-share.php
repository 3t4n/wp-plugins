<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.wpmaniax.com
 * @since             1.0.0
 * @package           Jumbo_Share
 *
 * @wordpress-plugin
 * Plugin Name:       Jumbo Share
 * Plugin URI:        http://www.wpmaniax.com
 * Description:       Adds Mashable.com like social share bar to your web site.
 * Version:           1.0.0
 * Author:            WP Maniax
 * Author URI:        http://www.wpmaniax.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       jumbo-share
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-jumbo-share-activator.php
 */
function activate_jumbo_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jumbo-share-activator.php';
	Jumbo_Share_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-jumbo-share-deactivator.php
 */
function deactivate_jumbo_share() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-jumbo-share-deactivator.php';
	Jumbo_Share_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_jumbo_share' );
register_deactivation_hook( __FILE__, 'deactivate_jumbo_share' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-jumbo-share.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_jumbo_share() {

	$plugin = new Jumbo_Share();
	$plugin->run();

}
run_jumbo_share();
