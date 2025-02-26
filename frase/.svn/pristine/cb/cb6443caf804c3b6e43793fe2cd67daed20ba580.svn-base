<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://frase.io
 * @since             1.3.0
 * @package           Frase
 *
 * @wordpress-plugin
 * Plugin Name:       Frase Plugin
 * Plugin URI:        https://frase.io
 * Description:       Frase WordPress plugin.
 * Version:           1.3.6
 * Author:            Frase
 * Author URI:        https://frase.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       frase
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
	die;
}

/**
 * Current plugin path.
 * Current plugin url.
 * Current plugin version.
 * Current plugin name.
 * Current plugin option name.
 */
define('FRASE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('FRASE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FRASE_PLUGIN_VERSION', '1.3.6');
define('FRASE_PLUGIN_PLUGIN_NAME', 'frase');
define('FRASE_PLUGIN_OPTION_NAME', 'frase');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-activator.php
 */
function frase_plugin_activate()
{
	require_once FRASE_PLUGIN_PATH . 'includes/class-activator.php';
	Frase_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deactivator
 */
function frase_plugin_deactivate()
{
	require_once FRASE_PLUGIN_PATH . 'includes/class-deactivator.php';
	Frase_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'frase_plugin_activate');
register_deactivation_hook(__FILE__, 'frase_plugin_deactivate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require FRASE_PLUGIN_PATH . 'includes/main.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.3.0
 */
function run_frase_plugin()
{

	$plugin = new Frase();
	$plugin->run();
}
run_frase_plugin();
