<?php
/*
  Plugin Name: Digital Signature For Gravity Forms
  Description: This plugin allows create digital signature Field For Gravity Forms plugin.
  Version: 1.0
  Copyright: 2023
  Text Domain: digital-signature-for-gravity-forms
*/

if (!defined('ABSPATH')) {
  die('-1');
}


// define for base name
define('GFDS_BASE_NAME', plugin_basename(__FILE__));

// define for plugin file
define('GFDS_plugin_file', __FILE__);

// define for plugin dir path
define('GFDS_PLUGIN_URL',plugins_url('', __FILE__));
define('GFDS_PLUGIN_DIR', plugin_dir_path(__FILE__));

// Include function files
include_once(GFDS_PLUGIN_DIR.'includes/admin.php');


function GFDS_load_admin_script_style() {
  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'wp-color-picker-alpha', GFDS_PLUGIN_URL . '/admin/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts',  'GFDS_load_admin_script_style');


function GFDS_load_script_style(){
    wp_enqueue_script( 'jquery-signature', GFDS_PLUGIN_URL . '/public/js/digital_signature_pad.js', array('jquery'), '2.0');
    wp_enqueue_script( 'jquery-signatures', GFDS_PLUGIN_URL. '/public/js/design.js', array('jquery'), '1.0');
    
    wp_localize_script( 'jquery-signature', 'signature_ajax', array( 'ajax_urla' => GFDS_PLUGIN_URL) );
}
add_action( 'wp_enqueue_scripts', 'GFDS_load_script_style' );
