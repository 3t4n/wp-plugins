<?php

/**
 * Plugin Name: Hide Category by User Role for WooCommerce
 * Plugin URI: https://themesupport.com/
 * Description: This plugin allows you to easily hide WooCommerce product categories based on user roles.
 * Author: ThemeSupport
 * Author URI: https://themesupport.com
 * Version: 2.2.1
 * Requires at least: 6.5
 * Tested up to: 6.7.1
 * Requires PHP: 8.2
 * Text Domain: ts-wchc
 * Domain Path: /languages
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * ~ Directory Structure ~
 *
 * /admin/										- Plugin backend stuff.
 * /functions/									- Functions and plugin operations.
 * /includes/									- External third party classes and libraries.
 * /languages/									- Translation files.
 * /public/										- Front end files and functions that matter on the front end go here.
 * index.php									- Dummy file.
 * license.txt									- GPL v2
 * ts-wchc.php									- Main plugin file containing plugin name and other version info for WordPress.
 * readme.txt									- Readme for WordPress plugin repository. https://wordpress.org/plugins/files/2018/01/readme.txt
 * uninstall.php								- Fired when the plugin is uninstalled.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Define constants
 *
 * @since 1.0
 */
if (!defined('TSWCHC_VERSION_NUM')) 		define('TSWCHC_VERSION_NUM', '2.1.1'); // Plugin version constant
if (!defined('TSWCHC_STARTER_PLUGIN'))		define('TSWCHC_STARTER_PLUGIN', trim(dirname(plugin_basename(__FILE__)), '/')); // Name of the plugin folder eg - 'ts-wchc'
if (!defined('TSWCHC_STARTER_PLUGIN_DIR'))	define('TSWCHC_STARTER_PLUGIN_DIR', plugin_dir_path(__FILE__)); // Plugin directory absolute path with the trailing slash. Useful for using with includes eg - /var/www/html/wp-content/plugins/ts-wchc/
if (!defined('TSWCHC_PLUGIN_URL'))	define('TSWCHC_PLUGIN_URL', plugin_dir_url(__FILE__)); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/ts-wchc/

/**
 * Load Text Domain
 * @since 1.0
 */
function tswchc_load_textdomain() {
	load_plugin_textdomain('ts-wchc', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'tswchc_load_textdomain');

/**
 * Database upgrade
 * @since 1.0
 */
function tswchc_upgrader() {
	// Get the current version of the plugin stored in the database.
	$current_ver = get_option('tswchc_version', '0.0');
	// Return if we are already on updated version.
	if (version_compare($current_ver, TSWCHC_VERSION_NUM, '==')) {
		return;
	}
	// This part will only be excuted once when a user upgrades from an older version to a newer version.
	// Finally add the current version to the database. Upgrade todo complete.
	update_option('tswchc_version', TSWCHC_VERSION_NUM);
}
add_action('admin_init', 'tswchc_upgrader');

// Load everything
require_once(TSWCHC_STARTER_PLUGIN_DIR . 'loader.php');

// Register activation hook (this has to be in the main plugin file or refer bit.ly/2qMbn2O)
register_activation_hook(__FILE__, 'tswchc_activate_plugin');

/**
 * Add admin menu pages
 *
 * @since 1.0
 * @refer https://developer.wordpress.org/plugins/administration-menus/
 */
function tswchc_add_menu_links() {
	add_menu_page(__('Hide Category by User Role', 'ts-wchc'), __('Hide Category by User Role', 'ts-wchc'), 'update_core', 'ts-wchc', 'tswchc_admin_interface_render', 'dashicons-hidden');
}

add_action('admin_menu', 'tswchc_add_menu_links');
