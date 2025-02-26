<?php
/**
 * Plugin Name: Ambikly
 * Plugin URI: https://wordpress.org/plugins/ambikly/
 * Description: WordPress eCommerce Solution
 * Author: ambikly
 * Author URI: https://profiles.wordpress.org/ambikly
 * Version: 0.0.10
 * License: GPLv3+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Define AMBIKLY_FILE.
if (!defined('AMBIKLY_FILE')) {
    define('AMBIKLY_FILE', __FILE__);
}

// Define AMBIKLY_VERSION.
if (!defined('AMBIKLY_VERSION')) {
    define('AMBIKLY_VERSION', '0.0.9');
}

// Define AMBIKLY_PLUGIN_URI.
if (!defined('AMBIKLY_PLUGIN_URI')) {
    define('AMBIKLY_PLUGIN_URI', plugins_url('/', AMBIKLY_FILE));
}

// Define AMBIKLY_PLUGIN_DIR.
if (!defined('AMBIKLY_PLUGIN_DIR')) {
    define('AMBIKLY_PLUGIN_DIR', plugin_dir_path(AMBIKLY_FILE));
}

if (!function_exists('ambikly')) {
    function ambikly()
    {

        return Ambikly\Ambikly::getInstance();
    }
}

ambikly();
