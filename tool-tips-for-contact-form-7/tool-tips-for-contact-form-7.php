<?php 
/**
* Plugin Name: Tool Tips For Contact Form 7
* Description: WooCommerce Tool Tips.
* Version: 1.0
* Copyright: 2023
* Text Domain: tool-tips-for-contact-form-7
*/


if (!defined('ABSPATH')) {
    die('-1');
}


// define for base name
if (!defined('TTFCF7_BASE_NAME')) {
    define('TTFCF7_BASE_NAME', plugin_basename(__FILE__));
}

// define for plugin file
if (!defined('ttfcf7_plugin_file')) {
    define('ttfcf7_plugin_file', __FILE__);
}

if (!defined('TTFCF7_PLUGIN_DIR')) {
    define('TTFCF7_PLUGIN_DIR', plugin_dir_path(__FILE__));
}
if (!defined('TTFCF7_PLUGIN_URL')) {
  define('TTFCF7_PLUGIN_URL',plugins_url('', __FILE__));
}



// Include function files
include_once(TTFCF7_PLUGIN_DIR.'includes/frontend.php');
include_once(TTFCF7_PLUGIN_DIR.'includes/admin.php');

function TTFCF7_load_script_style(){
    wp_enqueue_script( 'jquery-tooltip', TTFCF7_PLUGIN_URL . '/public/js/popper.min.js', array('jquery'), '2.0');
    wp_enqueue_script( 'jquery-tooltips', TTFCF7_PLUGIN_URL . '/public/js/tippy-bundle.umd.js', array('jquery'), '2.0');
    wp_enqueue_script( 'jquery-tooltipss', TTFCF7_PLUGIN_URL. '/public/js/design.js', array('jquery'), '1.0');
}
add_action( 'wp_enqueue_scripts', 'TTFCF7_load_script_style' );

function TTFCF7_load_admin_script(){
    if ( isset($_GET['page']) && $_GET['page'] === 'ttfcf7_tooltip_generator') {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker-alpha', TTFCF7_PLUGIN_URL . '/admin/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '3.0.2', true );
        wp_add_inline_script(
            'wp-color-picker-alpha',
            'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );'
        );
        wp_enqueue_style( 'jquery-admin-style', TTFCF7_PLUGIN_URL. '/admin/css/design.css', '', '1.0' );
    }
}
add_action( 'admin_enqueue_scripts', 'TTFCF7_load_admin_script' );
?>