<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.leadnow.pl
 * @since             1.0.0
 * @package           Leadnow_Fastpay
 *
 * @wordpress-plugin
 * Plugin Name:       Leadnow.pl - fastpay widget
 * Plugin URI:        fastpay.pl
 * Description:       Wtyczka z przydatnymi funkcjonalnościami dla Twojej strony w WordPressie. Musisz mieć konto w serwisie leadnow.pl
 * Version:           1.1.3
 * Author:            Leadnow.pl
 * Author URI:        http://www.leadnow.pl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       leadnow-fastpay
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-leadnow-fastpay-activator.php
 */
function activate_leadnow_fastpay()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-leadnow-fastpay-activator.php';
    Leadnow_Fastpay_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-leadnow-fastpay-deactivator.php
 */
function deactivate_leadnow_fastpay()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-leadnow-fastpay-deactivator.php';
    Leadnow_Fastpay_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_leadnow_fastpay');
register_deactivation_hook(__FILE__, 'deactivate_leadnow_fastpay');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-leadnow-fastpay.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_leadnow_fastpay()
{

    $plugin = new Leadnow_Fastpay();
    $plugin->run();

}

run_leadnow_fastpay();

if (!function_exists('fastpay_widget')) :

    /**
     * @param $id
     * @param array $parameters Array containing optional params.
     */
    function fastpay_widget($id, $parameters = array())
    {
        $attributes = array_merge(array('id' => $id), $parameters);

        $shortCode = sprintf('[widget %s ]', http_build_query($attributes, '', ' '));
        $html = do_shortcode($shortCode);

        echo $html;
    }

endif;


if (!function_exists('leadnow_url')) :

    /**
     * @param $url
     * @return string
     */
    function leadnow_url($url)
    {
        return file_get_contents('http://leadnow.pl/url/' . $url);
    }

endif;
