<?php
/**
* Plugin Name: Range Slider Field for Contact Form 7
* Description: This plugin allows create Range Slider Field for Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2023
* Text Domain: range-slider-field-for-contact-form-7
* Domain Path: /languages 
*/

if (!defined('ABSPATH')) {
    die('-1');
}

if (!defined('RSFFCF7_PLUGIN_DIR')) {
    define('RSFFCF7_PLUGIN_DIR',plugins_url('', __FILE__));
}

include_once('main/backend/rsffcf7-backend.php');
include_once('main/resource/rsffcf7-installation-require.php');
include_once('main/resource/rsffcf7-language.php');
include_once('main/resource/rsffcf7-load-js-css.php');
        
function RSFFCF7_support_and_rating_links( $links_array, $plugin_file_name, $plugin_data, $status ) {
    if ($plugin_file_name !== plugin_basename(__FILE__)) {
      return $links_array;
    }

    $links_array[] = '<a href="https://www.plugin999.com/support/">'. __('Support', 'range-slider-field-for-contact-form-7') .'</a>';
    $links_array[] = '<a href="https://wordpress.org/support/plugin/range-slider-field-for-contact-form-7/reviews/?filter=5">'. __('Rate the plugin ★★★★★', 'range-slider-field-for-contact-form-7') .'</a>';

    return $links_array;

}
add_filter( 'plugin_row_meta', 'RSFFCF7_support_and_rating_links', 10, 4 );