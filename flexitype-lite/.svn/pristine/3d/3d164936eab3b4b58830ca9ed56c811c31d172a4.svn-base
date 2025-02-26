<?php

/**
 * Plugin Name:       FlexiType Lite
 * Plugin URI:        http://flexitype.themeori.com
 * Description:       Simple Powerful Tools for Your Next WordPress Project
 * Version:           1.0.5
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            ThemeOri
 * Author URI:        http://themeori.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       flexitype-lite
 * Domain Path:       /languages
 */

// Exit if accessed directly

if (!defined('ABSPATH'))
	exit;

define('FLEXITYPE_LITE_VERSION', '1.0.5');
define('FLEXITYPE_LITE_FILE', __FILE__);
define('FLEXITYPE_LITE_URL', plugin_dir_url(FLEXITYPE_LITE_FILE));
define('FLEXITYPE_LITE_ASSETS', trailingslashit(FLEXITYPE_LITE_URL));
define('FLEXITYPE_LITE_PATH', plugin_dir_path(FLEXITYPE_LITE_FILE));

// Load plugin textdomain.
if (!function_exists('flexitype_lite_init')) {

	function flexitype_lite_init()
	{
		load_plugin_textdomain('flexitype-lite', false, plugin_basename(dirname(__FILE__)) . '/languages');
	}
}
add_action('plugins_loaded', 'flexitype_lite_init');

// Load Main Admin Page of plugin 
require_once ('admin/page.php');
// some custom functions
require_once ('includes/admin-notice.php');
require_once ('includes/functions.php');
require_once ('includes/query-builder.php');
require_once ('includes/builder-hook.php');

// Load Custom functions of Plugin
require_once ('includes/post-type-builder.php');

// Check if elementor plugin has installed and actived
if (!function_exists('flexitype_lite_widgets')) {
	function flexitype_lite_widgets()
	{
		require_once ('controls/init.php');
		require_once ('widgets/flexitype-addons.php');

	}
}
add_action('elementor/init', 'flexitype_lite_widgets');