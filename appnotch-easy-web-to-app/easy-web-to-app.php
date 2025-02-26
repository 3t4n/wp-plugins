<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://easywebtoapp.com/
 * @since             1.0.0
 * @package           Easy_Web_To_App
 *
 * @wordpress-plugin
 * Plugin Name:       Easy Web to App
 * Plugin URI:        http://www.appnotch.com
 * Description:       Upgrade Your Wix Website into Android App and Get Published in App Store.
 * Version:           1.0.0
 * Author:            AppNotch
 * Author URI:        http://www.appnotch.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       easy-web-to-app
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-easy-web-to-app-activator.php
 */
function activate_easy_web_to_app()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-easy-web-to-app-activator.php';
    Easy_Web_To_App_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-easy-web-to-app-deactivator.php
 */
function deactivate_easy_web_to_app()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-easy-web-to-app-deactivator.php';
    Easy_Web_To_App_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_easy_web_to_app');
register_deactivation_hook(__FILE__, 'deactivate_easy_web_to_app');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-easy-web-to-app.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_easy_web_to_app()
{

    $plugin = new Easy_Web_To_App();
    $plugin->run();

}
run_easy_web_to_app();
