<?php

/**
* Plugin Name: SEO that Matters
* Description: As the plugin name says. Optimized your site's SEO in a non-intrusive way.
* Author: Arya Dhiratara
* Author URI: https://dhiratara.me
* Version: 1.0.3
* Requires at least: 5.8
* Requires PHP: 7.4
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: seotm
*/

namespace SeoThatMatters;

if (!defined('ABSPATH')) exit; // Exit if accessed directly


define('SEOTM_NAME', 'SEO that Matters');
define('SEOTM_DESC', 'A lightweight plugin to make your site more SEO Friendly in a non-intrusive way');
define('SEOTM_SLUG', 'seo-that-matters');
define('SEOTM_PREFIX', 'seotm');
define('SEOTM_VERSION', '1.0.3');
define('SEOTM_DIR', plugin_dir_path(__FILE__));
define('SEOTM_URL', plugin_dir_url(__FILE__));
define('SEOTM_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets/admin/');
define('SEOTM_PUBLIC_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets/public/');
define('SEOTM_CLASSES_DIR', SEOTM_DIR . 'includes/classes/');
define('SEOTM_BASENAME', plugin_basename(__FILE__));
define('SEOTM_ASSETS_DIR', SEOTM_DIR . 'assets/');

// include the required plugin files
include_once(SEOTM_CLASSES_DIR . 'Loader.php');
include_once(SEOTM_DIR . 'includes/Functions.php');

global $plugin_instance;

function plugin_instance() {
    global $plugin_instance;
    $plugin_instance = PluginLoader::getInstance();
    return $plugin_instance;
}

plugin_instance();

spl_autoload_register(__NAMESPACE__ . '\\plugin_autoloader');
function plugin_autoloader($class) {
    $class = str_replace(__NAMESPACE__ . '\\', '', $class);
    $file = SEOTM_CLASSES_DIR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

register_activation_hook(__FILE__, __NAMESPACE__ . '\\plugin_activated');
function plugin_activated() {
    add_option('seotm_do_activation_redirect', true);
}

add_action('admin_init', __NAMESPACE__ . '\\plugin_activation_redirect');
function plugin_activation_redirect() {
    // If plugin is activated in network admin options or on a multisite, skip redirect.
    if (is_network_admin() || is_multisite()) {
        return;
    }
    if (get_option('seotm_do_activation_redirect', false)) {
        delete_option('seotm_do_activation_redirect');
        // If plugin is activated using the bulk action, skip redirect.
        if(!isset($_GET['activate-multi'])) {
            exit( wp_redirect( admin_url( '/tools.php?page=' . SEOTM_PREFIX ) ) );
        }       
    }
}

register_uninstall_hook(__FILE__, __NAMESPACE__ . '\\plugin_deleted');
function plugin_deleted() {
    // Delete options from the database (for network admin options or on a multisite)
    if (is_network_admin() || is_multisite()) {
        delete_site_option(SEOTM_PREFIX . '_options');
    } else {
        // Delete options from the database for a single site
        delete_option(SEOTM_PREFIX . '_options');
    }
}