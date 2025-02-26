<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://jase.io/
 * @since             1.0.0
 * @package           Social_Icons_Obvs
 *
 * @wordpress-plugin
 * Plugin Name:       Social Icons Obvs
 * Plugin URI:        http://jase.io/archive/development/social-icons-obvs/
 * Description:       Direct users to your various social accounts using customisable SVG icons.
 * Version:           1.1.9
 * Author:            Jase Warner
 * Author URI:        https://jase.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       social-icons-obvs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Pull in plugin basename.
if ( ! defined( 'SOCIAL_ICONS_OBVS_BASENAME' ) ) {
	define( 'SOCIAL_ICONS_OBVS_BASENAME', plugin_basename( __FILE__ ) );
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-social-icons-obvs-activator.php
 */
function activate_social_icons_obvs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-icons-obvs-activator.php';
	Social_Icons_Obvs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-social-icons-obvs-deactivator.php
 */
function deactivate_social_icons_obvs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-icons-obvs-deactivator.php';
	Social_Icons_Obvs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_social_icons_obvs' );
register_deactivation_hook( __FILE__, 'deactivate_social_icons_obvs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-social-icons-obvs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_social_icons_obvs() {

	$plugin = new Social_Icons_Obvs();
	$plugin->run();

}
run_social_icons_obvs();
