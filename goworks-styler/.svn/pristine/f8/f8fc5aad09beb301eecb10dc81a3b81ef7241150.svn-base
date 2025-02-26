<?php

/**
 * Plugin Name:       GoWorks Styler
 * Plugin URI:        https://goworks-goworks.rhcloud.com/wordpress/plugins/styler/
 * Description:       Adds new buttons to the WordPress visual editor, allowing you to enhance your posts and pages with custom colors, opacity, borders, padding, and more.
 * Version:           1.2.0
 * Author:            GoWorks
 * Author URI:        https://goworks-goworks.rhcloud.com/wordpress/plugins/styler/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       goworks-styler
 * Domain Path:       /languages/
 */

defined('ABSPATH') or die();

include('admin/settings-page.php');

/***
 * Enqueue the scripts and style sheets
 */
function goworks_styler_enqueue_scripts($hook) {
	if ('post.php' == $hook) {
		wp_enqueue_style('go.styler.css', plugins_url('/public/css/go.styler.css', __FILE__));
	}
}
add_action('admin_enqueue_scripts', 'goworks_styler_enqueue_scripts');

/**
 * Initialize the plugin
 */
function goworks_styler_init() {
	$plugin_dir = dirname(plugin_basename(__FILE__));
	load_plugin_textdomain('goworks_styler', false, $plugin_dir . '/languages/');
}
add_action('plugins_loaded', 'goworks_styler_init');

/**
 * Create new buttons for the TinyMCE editor
 */
function goworks_styler_tinymce_buttons() {
	if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
		add_option('goworks_styler_settings', array('textColor' => '1', 'bgColor' => '1', 'border' => '1', 'spacing' => '1'));
		// Remove the standard Text color and Background color buttons
		add_filter( 'tiny_mce_before_init', function($init) {
			$options = get_option('goworks_styler_settings');
			for ($i = 1; $i <= 4; $i++) {
				if ($options && $options['textColor'])$init['toolbar' . $i] = str_replace(',forecolor', '', $init['toolbar' . $i]);
				if ($options && $options['bgColor'])$init['toolbar' . $i] = str_replace(',backcolor', '', $init['toolbar' . $i]);
			}
			return $init;
		});
		// Load the GoWorks Styler button plugins
		add_filter('mce_external_plugins', function($plugin_array) {
			$options = get_option('goworks_styler_settings');
			if ($options && ($options['textColor'] || $options['bgColor'])) $plugin_array['goworks_styler_textcolor'] = plugins_url('/public/js/go.styler.js', __FILE__ ) ;
			if ($options && $options['border']) $plugin_array['goworks_styler_border'] = plugins_url('/public/js/go.styler.js', __FILE__ ) ;
			if ($options && $options['spacing']) $plugin_array['goworks_styler_spacing'] = plugins_url('/public/js/go.styler.js', __FILE__ ) ;
			return $plugin_array;
		});
		// Add the new buttons to the second toolbar
		add_filter('mce_buttons_2', function($buttons) {
			$options = get_option('goworks_styler_settings');
			if ($options && $options['textColor']) array_push($buttons, 'goworks_styler_forecolor');
			if ($options && $options['bgColor']) array_push($buttons, 'goworks_styler_backcolor');
			if ($options && $options['border']) array_push($buttons, 'goworks_styler_border');
			if ($options && $options['spacing']) array_push($buttons, 'goworks_styler_spacing');
			return $buttons;
		});
	}
}
add_action('admin_init', 'goworks_styler_tinymce_buttons');
