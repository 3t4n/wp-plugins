<?php
/**
 * Color Picker for Contact Form 7
 *
 * @link              https://restezconnectes.fr
 * @since             4.0.0
 * @package           Wpcf7_Color
 *
 * @wordpress-plugin
 * Plugin Name: Color Picker for Contact Form 7
 * Plugin URI: https://fr.wordpress.org/plugins/cf7-color-picker/
 * Description: Easily add a color field to your CF7 forms. This plugin depends on Contact Form 7.
 * Version:     0.1.3
 * Author:      Florent Maillefaud
 * Author URI:  https://restezconnectes.fr
 * License:     GPL3 or later
 * Domain Path: /languages
 * Text Domain: cf7-color-picker
*/

/*  Copyright 2012-2024 Florent Maillefaud (email: contact at restezconnectes.fr)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

define('WPCF7_COLOR_VERSION', '0.1.3');
define('WPCF7_COLOR_PLUGIN_NAME', 'cf7-color-picker');

// If this file is called directly, abort.
if(!defined('WPINC')) {die;}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wpcf7-color.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    4.0.0
 */
function run_wpcf7_color() {

    $plugin = new Wpcf7_Color();
    $plugin->run();

}
run_wpcf7_color();

// Enable localization
add_action('init', '_cf7color_load_translation');
function _cf7color_load_translation() {
    load_plugin_textdomain('cf7-color-picker', false, dirname(plugin_basename( __FILE__ )) . '/languages/');
}