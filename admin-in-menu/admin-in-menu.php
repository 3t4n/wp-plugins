<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://vk.com/npa98
 * @since             1.3.2
 * @package           Admin_In_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       admin-in-menu
 * Plugin URI:        https://wordpress.org/plugins/admin-in-menu/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.3.2
 * Author:            Nikita Pavlov
 * Author URI:        https://vk.com/npa98
 * Text Domain:       admin-in-menu
 * Domain Path:       /languages
 */

/*  Copyright 2018  Admin_in_menu  (email: nikosriwan@yandex.ru)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*function admin_in_menu_load_scripts(){
        wp_enqueue_style( 'edit_form', plugin_dir_path( dirname( __FILE__ ) ) . "public/css/edit_form.css");
    }

add_action("wp_enqueue_scripts", "admin_in_menu_load_scripts");
*/


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admin-in-menu-activator.php
 */
function activate_admin_in_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-in-menu-activator.php';
	Admin_In_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admin-in-menu-deactivator.php
 */
function deactivate_admin_in_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin-in-menu-deactivator.php';
	Admin_In_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_admin_in_menu' );
register_deactivation_hook( __FILE__, 'deactivate_admin_in_menu' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-admin-in-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_admin_in_menu() {

	$plugin = new Admin_In_Menu();
	$plugin->run();

}
run_admin_in_menu();
