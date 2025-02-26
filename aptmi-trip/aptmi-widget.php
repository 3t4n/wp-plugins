<?php


/**
 * @package Aptmi_Widget
 * @version 1.6
 */
/*
Plugin Name: APTMI Trip
Plugin URI: http://wordpress.org/plugins/aptmi-trip/
Description: Widget Pencarian Perjalanan oleh PT Apta Media Indonesia.
Author: PT Apta Media Indonesia
Version: 1.0
Author URI: http://aptmi.com/
*/



function wpb_adding_scripts() {
  wp_register_script('iframeResizer', plugins_url('iframeResizer.min.js', __FILE__), array('jquery'),'1.1', true);
  wp_register_script('aptmiMain', plugins_url('aptmi.js', __FILE__), array('jquery'),'1.1', true);
  wp_enqueue_script('iframeResizer');
  wp_enqueue_script('aptmiMain');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );


include_once('Aptmi_Shortcode.php');
include_once('Aptmi_Widget.php');
function register_aptmi_widget() {
  register_widget( 'Aptmi_Widget' );
}
add_action( 'widgets_init', 'register_aptmi_widget' );