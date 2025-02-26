<?php
 /**
 * Plugin Name:       Bits CodePen List
 * Plugin URI:        http://themebits.me/plugins/codepen-list
 * Description:       List your pens or post from CodePen in a really simple unordered list way.
 * Version:           1.0.2
 * Author:            themebits
 * Author URI:        http://themebits.me
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       bits-codepen-list
 * Domain Path:       /languages/
 */

if (! defined('WPINC')) {
    wp_die();
}

if (! defined('BITS_CPL_VER')) {
    define('BITS_CPL_VER', '1.0.2');
}

require_once bits_cpl_base_path('includes/misc/autoloader.php');

$plugin = bits_cpl_init();

register_activation_hook(__FILE__, [$plugin, 'activate']);
register_deactivation_hook(__FILE__, [$plugin, 'deactivate']);

/**
 * Initialize a the plugin.
 * 
 * @return Bits\CodePenList\CodePenList
 */
function bits_cpl_init()
{
    return new Bits\CodePenList\CodePenList;
}

/**
 * Get the base path.
 *
 * @param  string  $file
 * @return string
 */
function bits_cpl_base_path($file = '')
{
    return sprintf('%s%s', plugin_dir_path(__FILE__), $file);
}

/**
 * Get the base url.
 *
 * @param  string  $file
 * @return string
 */
function bits_cpl_base_url($file = '')
{
    return sprintf('%s%s', plugin_dir_url(__FILE__), $file);
}