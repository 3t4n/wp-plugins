<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.aod-tech.com/wordpress/plugins/admin-menu-position-expander/
 * @since             1.0.0
 * @package           Admin_Menu_Position_Expander
 *
 * @wordpress-plugin
 * Plugin Name:       Admin Menu Position Expander
 * Plugin URI:        https://wordpress.org/plugins/admin-menu-position-expander/
 * Description:       Adds 1,000x the menu positions between admin menu entries, to allow fine-grain control of the position of your additional admin menu items.
 * Version:           1.0.0
 * Author:            AoD Technologies LLC
 * Author URI:        http://www.aod-tech.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admin-menu-position-expander
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_admin_menu_position_expander() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-menu-position-expander-activator.php';
	Admin_Menu_Position_Expander_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-name-deactivator.php
 */
function deactivate_admin_menu_position_expander() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-menu-position-expander-deactivator.php';
	Admin_Menu_Position_Expander_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_admin_menu_position_expander' );
register_deactivation_hook( __FILE__, 'deactivate_admin_menu_position_expander' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-admin-menu-position-expander.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_admin_menu_position_expander() {

	$plugin = new Admin_Menu_Position_Expander();
	$plugin->run();

}
run_admin_menu_position_expander();
