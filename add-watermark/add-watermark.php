<?php
/*
Plugin Name: Add Watermarks
Plugin URI: 
Description: Adds watermarks to selected images without changing the original image.
Author: Michael Zangl
Author URI: 
Text Domain: add-watermark
Domain Path: /languages/
Version: 2.0.2
*/

// Build time: 2018-10-26T19:19:32.167225Z

if (!defined('ABSPATH')) die();

// PHP:add-watermark.php@ALL
require dirname(__FILE__) . '/php/add-watermark.php';

// SCRIPT:settings.js@ADMIN
if (is_admin()) {
add_action('admin_enqueue_scripts', function() {
  wp_register_script('add-watermark_settings.js', plugins_url('assets/settings.js', __FILE__), ['jquery'], '2.0.2', true);
  wp_enqueue_script('add-watermark_settings.js');
});
}

// STYLE:settings.scss@ADMIN
if (is_admin()) {
add_action('admin_enqueue_scripts', function() {
  wp_enqueue_style('add-watermark_settings.css', plugins_url('assets/settings.css', __FILE__), '2.0.2');
});
}


call_user_func(function($action) {
  add_action('wp_head', $action, 8);
  add_action('admin_head', $action, 8);
  add_action('login_head', $action, 8);
}, function() {
  echo '<script type="text/plain" id="wpp-add-watermark">' . esc_html(plugins_url('assets/', __FILE__)) . '</script>';
});
