<?php
/**
* Plugin Name: SP Clients Carousel - Client Showcase Slider
* Plugin URI: https://wordpress.org/plugins/sp-clients-carousel/
* Description: SP Clients Carousel allows you to showcase your clients or anyone related to your company.This plugin is made on the top of owl carousel jquery plugin which makes the carousel touch enabled and responsive.
* Author: Sulav Parajuli
* Author URI:  https://www.facebook.com/sulav2059
* Version: 1.0.3
* License: GPLv2 or later
*/

//exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}
//plugin path url
if ( ! defined( 'CCSCCS_PLUGIN_PATH' ) ) {
  define('CCSCCS_PLUGIN_PATH', plugins_url('/', __FILE__));
}
//plugin dir path
if ( ! defined( 'SPSPSP_PLUGIN_DIR' ) ) {
  define( 'SPSPSP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}
require 'inc/spspsp-add-shortcode.php';
require 'inc/spspsp-custom-post-type.php';
require 'inc/spspsp-sub-menu-desc.php';
?>