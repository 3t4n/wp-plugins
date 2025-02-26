<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://munishdhiman.vercel.app/
 * @since             1.1.10
 * @package           Auto_Slug_Translate
 *
 * @wordpress-plugin
 * Plugin Name:       Auto Slug Translate
 * Plugin URI:        https://auto-slug-translate
 * Description:       WP Slug Translate will automatically generate the English slug based on the translation.
 * Version:           1.1.10
 * Author:            Munish Dhiman
 * Author URI:        https://munishdhiman.vercel.app/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       auto-slug-translate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.1.10 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('AUTO_SLUG_TRANSLATE_VERSION', '1.1.10');

function auto_slug_translate_add_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=slug-translate">' . __('Settings') . '</a>';
    array_push($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'auto_slug_translate_add_settings_link');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-auto-slug-translate-activator.php
 */
function activate_auto_slug_translate() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-auto-slug-translate-activator.php';
    Auto_Slug_Translate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-auto-slug-translate-deactivator.php
 */
function deactivate_auto_slug_translate() {
    require_once plugin_dir_path(__FILE__) . 'includes/class-auto-slug-translate-deactivator.php';
    Auto_Slug_Translate_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_auto_slug_translate');
register_deactivation_hook(__FILE__, 'deactivate_auto_slug_translate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path(__FILE__) . 'includes/class-auto-slug-translate.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.1.10
 */
function run_auto_slug_translate() {
    $plugin = new Auto_Slug_Translate();
    $plugin->run();
}
run_auto_slug_translate();
