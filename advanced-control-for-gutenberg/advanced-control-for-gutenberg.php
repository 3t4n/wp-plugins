<?php

/**
 * Plugin Name:       Advanced Control for Gutenberg
 * Plugin URI:        https://refact.co/
 * Description:       Customize Gutenberg block and features conditionally
 * Version:           1.0.0
 * Author:            Refact
 * Author URI:        https://refact.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advanced-control-for-gutenberg
 * Domain Path:       /languages
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Tested up to:      6.7
 * Stable tag:        1.0.0
 * Tags:              gutenberg, block

 * Plugin Name Description
 * php version 7.4+
 *
 * @category Plugin
 * @package  ACFG
 * @author   Refact <dev@refact.co>
 * @license  GPL-2.0+ http://www.gnu.org/licenses/gpl-2.0.txt
 * @link     https://refact.co/
 **/

use Refact\ACFG\ACFG;
use Refact\ACFG\ACFG_Activator;
use Refact\ACFG\ACFG_Deactivator;

// phpcs:disable

// If this file is called directly, abort.
if (! defined('ABSPATH')) exit;

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
if (! defined('ACFG_VERSION')) {
    define('ACFG_VERSION', '1.0.0');
}

if (! defined('ACFG_PATH')) {
    define('ACFG_PATH', plugin_dir_path(__FILE__));
}

if (! defined('ACFG_URL')) {
    define('ACFG_URL', plugin_dir_url(__FILE__));
}

if (! defined('ACFG_SETTINGS')) {
    define('ACFG_SETTINGS', 'acfg_settings');
}

if (! defined('ACFG_RULE_OPTION_NAME')) {
    define('ACFG_RULE_OPTION_NAME', 'acfg_rules');
}

if (! defined('ACFG_GLOBAL')) {
    define('ACFG_GLOBAL', 'acfg_global');
}

/**
 * Load Plugin File autoload.
 */
require_once ACFG_PATH . '/vendor/autoload.php';

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require ACFG_PATH . 'includes/class-acfg.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acfg-activator.php
 *
 * @return void
 */
function acfg_activate()
{
    include_once ACFG_PATH . 'includes/class-acfg-activator.php';
    ACFG_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 *
 * @see includes/class-acfg-deactivator.php
 *
 * @return void
 */
function acfg_deactivate()
{
    include_once ACFG_PATH . 'includes/class-acfg-deactivator.php';
    ACFG_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'acfg_activate');
register_deactivation_hook(__FILE__, 'acfg_deactivate');

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since  1.0.0
 * @return void
 */
function acfg()
{

    $plugin = new ACFG();
    $plugin->run();
}

acfg();
