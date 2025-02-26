<?php
/*
* Plugin Name: Freetobook Responsive Widget
* Description: Add freetobook responsive widget to your wordpress site.
* Version: 1.1
* Author: freetobook.com
* Author URI: http://www.fretobook.com
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// If this file is called directly, abort.
if (!defined('WPINC')){
	die;
}

require_once plugin_dir_path(__FILE__)  . 'includes/ftb-widget.php';
require_once plugin_dir_path(__FILE__)  . 'includes/ftb-widget-admin-settings.php';

$adminSettings = new FTB_Widget_Admin_Settings();

function register_ftb_widget() {
	return register_widget("FTB_Widget");
}

function enqueue_widget_script() {
	wp_enqueue_script('ftb_responsive_widget_script', 'https://widget.freetobook.com/widget.js');
}

add_action('wp_enqueue_scripts', 'enqueue_widget_script');

/**
* register widget
**/
add_action('widgets_init', 'register_ftb_widget');

/**
 * Add plugin settings to wp admin menu and page
 */
add_action('admin_menu', array($adminSettings, 'add_settings_menu'));
