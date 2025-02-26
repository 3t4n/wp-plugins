<?php
/*
Plugin Name: SimpleBannerWidget
Plugin URI: 
Description: バナーのためのウィジットを有効にするプラグイン
Version: 1.0
Author: Takuya Takahashi
Author URI: 
License: GPL2
*/

add_action('widgets_init', function () {
  register_widget('SimpleBannerWidget');
});

add_action('admin_enqueue_scripts', function () {
  wp_register_script('simple-banner-widget_script', plugins_url('/js/script.js', __FILE__));
  wp_register_script('simple-banner-widget_main-class', plugins_url('/js/SimpleBannerWidget.js', __FILE__));
  wp_enqueue_script('simple-banner-widget_script');
  wp_enqueue_script('simple-banner-widget_main-class');
  wp_enqueue_style('simple-banner-widget_admin-css', plugins_url('css/admin.css', __FILE__), array());
});

if (!class_exists("SimpleBannerWidget")) {
  require_once(plugin_dir_path(__FILE__) . 'classs/simple-banner-widget.php');
}

add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('simple-banner-widget_style-css', plugins_url('css/style.css', __FILE__), array());
});
