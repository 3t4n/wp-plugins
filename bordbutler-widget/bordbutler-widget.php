<?php
/**
 * Plugin Name: BordButler Widget
 * Description: Bruges til at tilføje BordButlers reservationswidget til din hjemmeside. Brug shortcoden <pre>[bordbutler_widget token="{TOKEN}"]</pre>. Kontakt venligst kundeservice, hvis du ikke kender din token.
 * Author: BordButler
 * Author URI: https://bordbutler.dk
 * Version: 1.0
 * License: GPL v2
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: bordbutler-widget
 */

defined('ABSPATH') or die('No script kiddies please!');

function bordbutler_widget_load_textdomain() {
    load_plugin_textdomain('bordbutler_widget', false, basename(dirname(__FILE__)) . '/languages/');
}

add_action('plugins_loaded', 'bordbutler_widget_load_textdomain');

function bordbutler_widget_enqueue_scripts() {
	wp_enqueue_style('bordbutler-widget-styles', plugin_dir_url(__FILE__) . 'style.css');

	wp_enqueue_script('jquery');
	wp_enqueue_script('bordbutler-widget-iframe-resizer', plugin_dir_url(__FILE__) . '/thirdparty/iframe-resizer.min.js');
	wp_enqueue_script('bordbutler-widget-script', plugin_dir_url(__FILE__) . 'script.js');
}

add_action('wp_enqueue_scripts', 'bordbutler_widget_enqueue_scripts');

function bordbutler_widget_shortcode($atts) {
	$attributes = shortcode_atts(array(
		'token' => null
	), $atts);

	if($attributes['token'] === null) {
		return '<pre>' . __('Please enter a valid BordButler token', 'bordbutler-widget') . '</pre>';
	}

	$id = base64_decode($attributes['token']);

	return "<iframe class='bordbutler-widget-iframe' src='https://widget.bordbutler.dk/u/$id'></iframe>";
}

add_shortcode('bordbutler_widget', 'bordbutler_widget_shortcode');