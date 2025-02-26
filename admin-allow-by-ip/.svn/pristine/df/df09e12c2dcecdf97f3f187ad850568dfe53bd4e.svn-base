<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link    https://profiles.wordpress.org/apsaraaruna/
 * @since   1.0.1
 * @package Admin_Allow_By_Ip
 *
 * @wordpress-plugin
 * Plugin Name:       Admin Allow by IP
 * Plugin URI:        admin-allow-by-ip
 * Description:       Protect you wp-admin from hackers! You can allow wp-admin for specific IP(s). make sure you have static IP.
 * Version:           1.0.1
 * Author:            Apsara Aruna
 * Author URI:        https://profiles.wordpress.org/apsaraaruna/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       admin-allow-by-ip
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC') ) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('ADMIN_ALLOW_BY_IP_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-admin-allow-by-ip-activator.php
 */
function activate_admin_allow_by_ip()
{
    include_once plugin_dir_path(__FILE__) . 'includes/class-admin-allow-by-ip-activator.php';
    Admin_Allow_By_Ip_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-admin-allow-by-ip-deactivator.php
 */
function deactivate_admin_allow_by_ip()
{
    include_once plugin_dir_path(__FILE__) . 'includes/class-admin-allow-by-ip-deactivator.php';
    Admin_Allow_By_Ip_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_admin_allow_by_ip');
register_deactivation_hook(__FILE__, 'deactivate_admin_allow_by_ip');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-admin-allow-by-ip.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since 1.0.0
 */
function run_admin_allow_by_ip()
{

    $plugin = new Admin_Allow_By_Ip();
    $plugin->run();

}
run_admin_allow_by_ip();
