<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://100xwpdev.com
 * @package           Easy_Store_Customizer
 * @category 		  Shop Customizer
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Store Customizer
 * Description:       Easily customize your WooCommerce store with features like "Add to Cart" button labels, product display settings, and quantity controls.
 * Version:           1.1.0
 * Author:            Bheru Lal Gameti 
 * Author URI:        https://100xwpdev.com/?utm_source=wp-plugins&utm_campaign=author-uri&utm_medium=wp-dash
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-store-customizer
 * Requires Plugins:  woocommerce
 * Domain Path:       /languages
 * Requires PHP: 8.0
 * Requires at least: 6.0
 * Tested up to: 6.7
 * 
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('EASY_STORE_CUSTOMIZER_VERSION', '1.1.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-store-customizer-activator.php
 */
function easy_store_plugin_activate()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-easy-store-customizer-activator.php';
	Easy_Store_Customizer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-store-customizer-deactivator.php
 */
function easy_store_plugin_deactivate()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-easy-store-customizer-deactivator.php';
	Easy_Store_Customizer_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'easy_store_plugin_activate');
register_deactivation_hook(__FILE__, 'easy_store_plugin_deactivate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-easy-store-customizer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 
 */
function easy_store_plugin_run()
{

	$plugin = new Easy_Store_Customizer();
	$plugin->run();
}
easy_store_plugin_run();
