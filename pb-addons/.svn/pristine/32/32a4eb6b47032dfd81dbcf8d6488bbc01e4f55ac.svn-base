<?php

/**
 * Plugin Name: PB ADDONS 
 * Description: You can create amazing blog layouts by using supported page builder with any theme of your choice. All the widgets are highly customizable with pre-designed layouts. Just drag and drop the widgets and play with the settings and make cool layouts.
 * Plugin URI:  https://wordpress.org/plugins/pb-addons
 * Version:     1.0
 * Author:     Muhammad Asad Mushtaq
 * Author URI:  https://innvosol.com
 * tested up to: 6.5
 * Text Domain: premium-blog
 * keywords: blog layout, blog widgets, Blog widgets , Premium Blog, PBW, Elementor Addons, Elementor , Blog layouts, blog addons, template kit  elementor kit . 
 * 
 * @package Premium BLog Addons
 * @category Core 
 * 
 */

if (!defined('PBW_WIDGETS')) {
    define('PBW_WIDGETS', __FILE__);
}
if (!defined('PBW_VERSION')) {
    define('PBW_VERSION', '1.0');
}
if (!defined('PBW_PLUGIN_PATH')) {
    define("PBW_PLUGIN_PATH", plugin_dir_path(__FILE__));
}
if (!defined('PBW_ASSETS_PATH')) {
    define("PBW_ASSETS_PATH", plugins_url('assets/', __FILE__));
}
if (!defined('PB_WIDGET_ASSETS_PATH')) {
    define("PB_WIDGET_ASSETS_PATH", plugins_url('widgets/', __FILE__));
}


/**
 * Include helper functions class.
 */
require PBW_PLUGIN_PATH . 'include/utilities.php';

/**
 * Include the plugin loader class.
 */
require PBW_PLUGIN_PATH . 'plugin-loader.php';


/**
 * Include Admin helper functions.
 */
include PBW_PLUGIN_PATH . 'admin/helper.php';

/**
 * Include Registered Settings and Sections.
 */
include PBW_PLUGIN_PATH . 'admin/settings.php';

/**
 * Include Fields callback functions.
 */
include PBW_PLUGIN_PATH . 'admin/fields.php';

/**
 * Include Admin menus.
 */
include PBW_PLUGIN_PATH . 'admin/menus.php';

/**
 * Settings Panel HTML
 */
include PBW_PLUGIN_PATH . 'admin/panel-html.php';


/**
 * Register default settings
 */
require PBW_PLUGIN_PATH . 'include/default-settings.php';
register_activation_hook(PBW_WIDGETS, 'premiumblog_set_default_settings');



/**
 * add settings link on plugin page
 */

function premiumblog_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=premiumblog">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}

$plugin = plugin_basename(__FILE__);

add_filter("plugin_action_links_$plugin", 'premiumblog_settings_link');
