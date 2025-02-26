<?php
/**
* Plugin Name: Success Fail Popup Message For Contact Form 7
* Description: This plugin allows create Success Fail Popup Message For Contact Form 7 plugin.
* Version: 1.0
* Copyright: 2023
* Text Domain: success-fail-popup-message-for-contact-form-7
* Domain Path: /languages 
*/


if (!defined('ABSPATH')) {
    die('-1');
}

// define for plugin file
define('SFPMCF7_PLUGIN_FILE', __FILE__);

// define for base name
define('SFPMCF7_BASE_NAME', plugin_basename( SFPMCF7_PLUGIN_FILE ));

// define for plugin dir path
define('SFPMCF7_PLUGIN_DIR', plugins_url('', __FILE__));

// Include function files
include_once('main/backend/success_fail_popup_options.php');
include_once('main/frontend/success_fail_submit_popup_settings.php');
include_once('main/resources/success-fail-popup-installation-require.php');
include_once('main/resources/success-fail-popup-language.php');
include_once('main/resources/success-fail-popup-load-js-css.php');

function SFPMCF7_support_and_rating_links( $links_array, $plugin_file_name, $plugin_data, $status ) {
    if ($plugin_file_name !== plugin_basename(__FILE__)) {
      return $links_array;
    }

    $links_array[] = '<a href="https://www.plugin999.com/support/">'. __('Support', 'success-fail-popup-message-for-contact-form-7') .'</a>';
    $links_array[] = '<a href="https://wordpress.org/support/plugin/success-fail-popup-message-for-contact-form-7/reviews/?filter=5">'. __('Rate the plugin ★★★★★', 'success-fail-popup-message-for-contact-form-7') .'</a>';

    return $links_array;

}
add_filter( 'plugin_row_meta', 'SFPMCF7_support_and_rating_links', 10, 4 );