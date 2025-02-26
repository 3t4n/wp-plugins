<?php

/**
 * @link              https://rovidx.com
 * @since             2.0.0
 * @package           Wp_Smart_Tv
 *
 * @wordpress-plugin
 * Plugin Name:       WP Smart TV
 * Plugin URI:        https://rovidx.com/
 * Description:       Toolkit for powering a video streaming service using WordPress
 * Version:           2.1.9
 * Author:            Rovidx Media
 * Author URI:        https://rovidx.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-smart-tv
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

define('WP_SMART_TV_VERSION', '2.1.8');
define('WPSTV_UPDATE_URL', 'https://rovidx.com');


function activate_wp_smart_tv()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-wp-smart-tv-activator.php';
	Wp_Smart_Tv_Activator::activate();
}

function deactivate_wp_smart_tv()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-wp-smart-tv-deactivator.php';
	Wp_Smart_Tv_Deactivator::deactivate();
}
register_activation_hook(__FILE__, 'activate_wp_smart_tv');
register_deactivation_hook(__FILE__, 'deactivate_wp_smart_tv');

if (!function_exists('is_plugin_active')) {
	include_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

require plugin_dir_path(__FILE__) . 'includes/class-wp-smart-tv.php';

/** 
Start WP Smart TV
**/
function run_wp_smart_tv()
{
	$plugin = new Wp_Smart_Tv();
	$plugin->run();
}
run_wp_smart_tv();