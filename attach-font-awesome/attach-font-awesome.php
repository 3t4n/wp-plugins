<?php
/**
 * @package Attach Font-Awesome
 * @version 0.1
 */
/*
Plugin Name: Attach Font Awesome
Plugin URI: 
Description: add font awesome library to front of site
Author: Afshin Talebi
Version: 0.1
Author URI: http://afshintalebi.com/
Text Domain: attach-font-awesome
Domain Path: /locale
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
//load localization files
load_plugin_textdomain('attach-font-awesome', false, basename( dirname( __FILE__ ) ) . '/locale' );
//config data
require(plugin_dir_path(__FILE__).'/inc/data.php');
//admin functions
require(plugin_dir_path(__FILE__).'/admin.php');
//front functions
require(plugin_dir_path(__FILE__).'/front.php');

if ( is_admin() ){
  // admin actions
  add_action( 'admin_init', 'atchfa_register_options');
  add_action( 'admin_menu', 'atchfa_plugin_options');
  add_action('admin_enqueue_scripts','atchfa_admin_js_files');
} else {
  // front actions
  add_action('wp_head','atchfa_front_css_files'); 
}
?>