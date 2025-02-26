<?php

/**
 * The WordPress plugin for the AddTruly Digital Collection Box (https://addtruly.com/)
 *
 * @wordpress-plugin
 * Plugin Name:       AddTruly Digital Collection Box
 * Description:       The WordPress plugin for the AddTruly Digital Collection Box (https://addtruly.com/)
 * Version:           1.0
 * Author:            AddTruly
 * Author URI:        https://addtruly.com/
 * License:           MIT
 * Text Domain:       addtruly-widget-plugin
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Returns the AddTruly widget for the given widget id
 *
 * @param string|int $widget_id the widget id for the widget to load
 * @return string code that loads the widget in-place
 */
function addtruly_widget($widget_id) {
	$widget_container = "<div class=\"at-widgetcontainer\" data-widget-id=\"{$widget_id}\"></div>";
	$loader_script = "<script async src=\"https://widget.addtruly.com/atwidgetloader.min.js\"></script>";
	return $widget_container . $loader_script;
}

/**
 * Init the shortcodes for the widget
 *
 * Available shortcodes:
 *   [addtruly-widget id="<ID>"]
 * , where <ID> is your given AddTruly widget ID
 */
function addtruly_widget_init_shortcodes() {
	function addtruly_widget_from_shortcode($atts = [], $content = null) {
		$validated_atts = shortcode_atts(array('id' => '-1'), $atts);
		$widget_id = $validated_atts['id'];
		return addtruly_widget($widget_id);
	}
	add_shortcode('addtruly-widget', addtruly_widget_from_shortcode);
}
add_action('init', 'addtruly_widget_init_shortcodes');
