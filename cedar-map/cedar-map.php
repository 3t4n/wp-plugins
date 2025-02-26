<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/plugins/cedar-map
 * @since             1.0.0
 * @package           Cedar_Map
 *
 * @wordpress-plugin
 * Plugin Name:       Cedar Maps
 * Plugin URI:        https://www.cedarmaps.com/
 * Description:       A mapping service and highly detailed and spatially accurate GIS vector data application that covers the whole country of Iran.
 * Version:           1.0.7
 * Author:            CedarMaps
 * Author URI:        https://profiles.wordpress.org/cedarmaps
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cedar-map
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('CEDAR_MAP_VERSION', '1.0.7');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cedar-map-activator.php
 */
function activate_cedar_map()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-cedar-map-activator.php';
    Cedar_Map_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cedar-map-deactivator.php
 */
function deactivate_cedar_map()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-cedar-map-deactivator.php';
    Cedar_Map_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_cedar_map');
register_deactivation_hook(__FILE__, 'deactivate_cedar_map');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-cedar-map.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cedar_map()
{

    $plugin = new Cedar_Map();
    $plugin->run();

}

run_cedar_map();
