<?php

/**
*   Plugin Name: Hearty Promote Light
*   Plugin URI: http://www.heartyplugins.com/hearty-promote-light
*   Description: Hearty Promote Light is a free responsive WordPress plugin that lets you upload any image and assign it a short description and a title with a Font Awesome icon
*   Version: 1.1
*   Author: Hearty Plugins
*   Author URI: http://www.heartyplugins.com
*   License: http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
*/

// no direct access

if (!defined('ABSPATH')) { die; }

function heartypromotelight_add_css() {

	//------

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');

	wp_register_style('heartypromotelight-css', plugins_url('/theme/css/frontend.css', __FILE__));

	//------

	wp_enqueue_style('hrty-bootstrap-css');
	wp_enqueue_style('hrty-fontawesome-css');

  wp_enqueue_style('heartypromotelight-css');

}

function heartypromotelight_add_admin_css() {

	wp_register_style('hrty-bootstrap-css', plugins_url('/theme/bootstrap/hrty-bootstrap.css', __FILE__));
	wp_register_style('hrty-fontawesome-css', '//use.fontawesome.com/releases/v5.0.13/css/all.css');
	wp_register_style('heartypromotelight-admin-css', plugins_url('/theme/css/admin.css', __FILE__));

  wp_enqueue_style('hrty-bootstrap-css');
  wp_enqueue_style('hrty-fontawesome-css');
	wp_enqueue_style('heartypromotelight-admin-css');

	// Add the color picker css file
  wp_enqueue_style( 'wp-color-picker' );

}

function heartypromotelight_add_js() {

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));
	wp_register_script('hrty-viewportchecker-js', plugins_url('/theme/js/viewportchecker/viewportchecker.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');
	wp_enqueue_script('hrty-viewportchecker-js');

}

function heartypromotelight_add_admin_js() {

	wp_enqueue_media();

	wp_register_script('hrty-bootstrap-js', plugins_url('/theme/bootstrap/hrty-bootstrap.js', __FILE__), array('jquery'));
	wp_register_script('heartycolorpicker-js', plugins_url('/theme/js/colorpicker.js', __FILE__), array('wp-color-picker'), false, true);
	wp_register_script('heartypromotelight-admin-js', plugins_url('/theme/js/admin.js', __FILE__), array('jquery'));

	wp_enqueue_script('hrty-bootstrap-js');
	wp_enqueue_script('heartycolorpicker-js');
	wp_enqueue_script('heartypromotelight-admin-js');

}

function heartypromotelight($atts) {

	require_once('inc/view.php');

	$atts = shortcode_atts(array('settings_instance' => 1), $atts, 'heartypromotelight');
	$settings_instance = $atts['settings_instance'];
	$output = HeartyPromoteLightView::generate_view($settings_instance);

	return $output;

}

function heartypromotelight_widget() {

	require_once('inc/widget.php');

	register_widget('HeartyPromoteLightWidget');

}

if (is_admin()) {

	require_once('inc/options.php');
	$heartypromotelight_settings_page = new HeartyPromoteLightSettingsPage();

	if (isset($_GET['page']) && $_GET['page'] == 'heartypromotelight-setting-admin') {

		add_action('admin_enqueue_scripts', 'heartypromotelight_add_admin_css');
		add_action('admin_enqueue_scripts', 'heartypromotelight_add_admin_js');

	} else {

		add_action('widgets_init', 'heartypromotelight_widget');

	}

} else {

	add_action('wp_enqueue_scripts', 'heartypromotelight_add_css');
	add_action('wp_enqueue_scripts', 'heartypromotelight_add_js');

	add_action('widgets_init', 'heartypromotelight_widget');
	add_shortcode('heartypromotelight', 'heartypromotelight');

}

