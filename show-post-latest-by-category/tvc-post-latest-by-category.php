<?php
/*
Plugin Name: Show Post Latest By Category
Plugin URI: https://thaivietcan.com
Description: Show Post Latest By Category
Version: 1.0.0
Author: Thai Viet Can
Author URI: https://www.thaivietcan.com
Text Domain: show-post-latest
*/

if ( !function_exists( 'add_action' ) ) {
  echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
  exit;
}

define('TVC_SPLC_PLUGIN_URL', plugin_dir_url(__FILE__));
define('TVC_SPLC_PLUGIN_RIR', plugin_dir_path(__FILE__));

require_once(TVC_SPLC_PLUGIN_RIR . 'inc/show-post-latest-script.php');
require_once(TVC_SPLC_PLUGIN_RIR . 'inc/show-post-latest-class.php');

function tvc_splc_save_widget() {
    register_widget( 'ShowPostLatestByCategory_Widget' );
}
add_action( 'widgets_init', 'tvc_splc_save_widget' );

