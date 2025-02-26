<?php

/**
 * Plugin Name: QS Dark Mode
 * License - GNU/GPL V2 or Later
 * Description: QS Dark Mode Plugin is a simple yet convenient plugin that allows WordPress websites to turn on a dark mode website or theme.
 * Version: 3.0
 * Requires at least: 5.6
 * Tested up to: 6.6.2
 * Requires PHP: 7.4
 * Author: QuomodoSoft
 * Author URI: https://quomodosoft.com
 * License: GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: qs-dark-mode
 * Domain Path: /languages/
 */

// If this file is calledd directly, abort!!!
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (did_action('qs_dark_mode_init')) {
	return;
}

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

do_action('qs_dark_mode_init');

define('QS_DARK_MODE_LITE_VERSION', 3.0);
define('QS_DARK_MODE_FILE_NAME', __FILE__);
define('QS_DARK_MODE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('QS_DARK_MODE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('QS_DARK_MODE_PLUGIN_BASE', plugin_basename(__FILE__));
define('QS_DARK_MODE_PLUGIN', plugin_basename(dirname(__FILE__)) . '/qs-dark-mode.php');
define('QS_DARK_MODE_IMG', plugin_dir_url(__FILE__) . 'assets/img');
define('QS_DARK_MODE_JS', plugin_dir_url(__FILE__) . 'assets/js');
define('QS_DARK_MODE_CSS', plugin_dir_url(__FILE__) . 'assets/css');
define('QS_DARK_MODE_DEMO_URL', 'https://quomodosoft.com/plugins/qs-dark-mode');
define('QS_DARK_MODE_SETTING_PATH', 'qs-dark-mode');

/**
 * The code that runs during plugin activation
 */
function qs_dark_mode_activate_plugin()
{
	QSDarkMode\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'qs_dark_mode_activate_plugin');

/**
 * The code that runs during plugin deactivation
 */
function qs_dark_mode_deactivate_plugin()
{
	QSDarkMode\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'qs_dark_mode_deactivate_plugin');

function qs_dark_mode_text_domain()
{
	load_plugin_textdomain('qs-dark-mode');
}

add_action('plugins_loaded', 'qs_dark_mode_text_domain');

require_once(__DIR__ . '/app/Utilities/inc.php');
require_once(__DIR__ . '/app/Pages/Main_Page.php');
require_once(__DIR__ . '/block/init.php');

/**
 * Initialize all the core classes of the plugin
 */

if (class_exists('QSDarkMode\\Init')) {

	QSDarkMode\Init::register_services();
	QSDarkMode\Init::register_modules();
}
