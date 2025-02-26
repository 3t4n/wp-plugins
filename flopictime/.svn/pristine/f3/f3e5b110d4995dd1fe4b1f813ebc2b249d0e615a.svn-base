<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://flothemes.com
 * @since             1.0.0
 * @package           Pictimewp
 *
 * @wordpress-plugin
 * Plugin Name:       FloPicTime
 * Plugin URI:        https://flothemes.com/pic-time/
 * Description:       Easily add any Pic-Time project into a blog post or page within your website.
 * Version:           1.0.9
 * Author:            Flothemes
 * Author URI:        https://flothemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pictimewp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

if (!function_exists('flo_maybe_deactivate_flo_pictime')) {
    // deactivate the free version when the Pro version is activated
    function flo_maybe_deactivate_flo_pictime()
    {
        $plugin_dirname = dirname(__FILE__);

        if (is_admin() && strpos($plugin_dirname, 'flopictime-pro') !== false) {
            // we will disable 'flopictime' only if we are installing flopictime-pro

            // this should make the 'is_plugin_active' function available
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');

            if (function_exists('is_plugin_active')) {
                if (is_plugin_active('flopictime/pictimewp.php')) {
                    deactivate_plugins('flopictime/pictimewp.php');

                    // reload the current page to avoid warnings
                    header("Location: ".$_SERVER['REQUEST_URI']);
                }
            }

            if (function_exists('is_plugin_active_for_network')) {
                if (is_plugin_active_for_network('flopictime/pictimewp.php')) {
                    deactivate_plugins('flopictime/pictimewp.php');
                    // reload the current page to avoid warnings
                    header("Location: ".$_SERVER['REQUEST_URI']);
                }
            }
        }
    }
}

add_action('init', 'flo_maybe_deactivate_flo_pictime', 1);



if (!function_exists('get_plugin_data')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}



$plugin_data = get_plugin_data(plugin_dir_path(__FILE__) . 'pictimewp.php');

if (isset($plugin_data['Version'])) {
    $plugin_version = $plugin_data['Version'];
} else {
    $plugin_version = '1.0.0';
}

define('FLOPT_VERSION', $plugin_version);
define('FLOPT_DIR_URL', plugin_dir_url(__FILE__));


global $pta;
$pta = false;

if (is_admin()) {
    if (isset($plugin_data['Name']) && $plugin_data['Name'] == 'FloPicTime Pro' && file_exists(plugin_dir_path(__FILE__) . 'api-manager/am-license-menu.php')) {

        // Load the API Key library if it is not already loaded. Must be placed in the root plugin file.
        if (! class_exists('PT_License_Menu')) {
            // Load WC_AM_Client class if it exists.
            require_once(plugin_dir_path(__FILE__) . 'api-manager/am-license-menu.php');

            /**
             * @param string $file             Must be __FILE__ from the root plugin file, or theme functions file.
             * @param string $software_title   Must be exactly the same as the Software Title in the product.
             * @param string $software_version This product's current software version.
             * @param string $plugin_or_theme  'plugin' or 'theme'
             * @param string $api_url          The URL to the site that is running the API Manager. Example: https://www.toddlahman.com/
             *
             * @return \AM_License_Submenu|null
             */

            PT_License_Menu::instance(__FILE__, 'FloPicTime Pro', $plugin_version, 'plugin', 'https://flothemes.com/');

            if (flo_pta()) {
                $pta = true;
            }
        }
    }
}

if ($plugin_data['Name'] == 'FloPicTime Pro') {
    $is_pro_version = true;
} else {
    $is_pro_version = true;
}
define('FLOPT_IS_PRO', $is_pro_version);


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pictimewp-activator.php
 */
if (!function_exists('flopt_activate')) {
    function flopt_activate()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/class-pictimewp-activator.php';
        Pictimewp_Activator::activate();
    }
}


/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pictimewp-deactivator.php
 */
if (!function_exists('flopt_deactivate')) {
    function flopt_deactivate()
    {
        require_once plugin_dir_path(__FILE__) . 'includes/class-pictimewp-deactivator.php';
        Pictimewp_Deactivator::deactivate();
    }
}
register_activation_hook(__FILE__, 'flopt_activate');
register_deactivation_hook(__FILE__, 'flopt_deactivate');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-pictimewp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if (!function_exists('flopt_run')) {
    function flopt_run()
    {
        $plugin = new Pictimewp();
        $plugin->run();
    }
}
flopt_run();
