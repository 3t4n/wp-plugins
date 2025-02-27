<?php

/**
 *
 * @link              http://continual.ly/
 * @since             4.3.2
 * @package           Continually
 *
 * @wordpress-plugin
 * Plugin Name:       Continually
 * Plugin URI:        https://github.com/Continually/continually-for-wordpress
 * Description:       Continually makes sure you never miss another lead on your website. This plugin is the simplest way to install Continually on your WordPress site.
 * Version:           4.3.2
 * Author:            Continually
 * Author URI:        http://continual.ly/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       continually
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
define('CONTINUALLY_VERSION', '4.3.2');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-continually-activator.php
 */
function continually_activate()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-continually-activator.php';
	Continually_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-continually-deactivator.php
 */
function continually_deactivate()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-continually-deactivator.php';
	Continually_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'continually_activate');
register_deactivation_hook(__FILE__, 'continually_deactivate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-continually.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function continually_run()
{

	$plugin = new Continually();
	$plugin->run();
}
continually_run();
