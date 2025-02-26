<?php
/*
Plugin Name: Accessibility Widget by Adally
Description: A simple plugin to append Adally's Accessibility Widget script on your website without having you to modify your frontend code.
Version: 1.0.0
Author: Adally Team
Author URI: https://adally.com/
*/

$awba_plugin_url = plugin_dir_url( __FILE__ );

// Script to be enqueued
function enqueue_awba_widget_script() {
  global $awba_plugin_url;
  
  wp_enqueue_script( 'awba-widget-script', $awba_plugin_url.'scripts/adally.js', false, false, true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_awba_widget_script' );