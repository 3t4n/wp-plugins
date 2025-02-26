<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://elquarto.com
 * @since             1.0.0
 * @package           ElQuarto
 *
 * @wordpress-plugin
 * Plugin Name:       ElQuarto
 * Plugin URI:        plugin.wordpress.org/elquarto
 * Description:       Utilize widgets para possibilitar a consulta de hotéis em nosso site já com seu rastreio de afiliado.
 * Author:            Tango Bravo<pz@tangobravo.com.br>
 * Author URI:        https://elquarto.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       elquarto
 * Domain Path:       /languages
 * Version:           1.0.3
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
define('ELQUARTO_VERSION', '1.0.3');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-elquarto-activator.php
 */
function activate_elquarto()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-elquarto-activator.php';
    ElQuarto_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-elquarto-deactivator.php
 */
function deactivate_elquarto()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-elquarto-deactivator.php';
    ElQuarto_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_elquarto');
register_deactivation_hook(__FILE__, 'deactivate_elquarto');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-elquarto.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_elquarto()
{
    $plugin = new ElQuarto();
    $plugin->run();
}
run_elquarto();
