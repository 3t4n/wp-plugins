<?php
/**
 * Plugin Name: SMS8.io
 * Description: Integrate FREE SMS capabilities into your E-commerce website and foster customer loyalty, Send Notifications, Scheduling, Reminders, Confirmations, Reply Automatic, Bulk SMS. Free SMS Gateway using own mobile and SIM card.
 * Version: 3.0.2
 * Author: SMS8.io
 * Author URI: https://sms8.io
 * Plugin URI: https://app.sms8.io
 * License: GPLv2 or later
 * Requires at least: 5.8 
 * Requires PHP: 7.2
 * Text Domain: sms8-io
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

require_once plugin_dir_path(__FILE__) . 'class-sms8-io.php';

// Instantiate the plugin class.
$SMS8_IO = new SMS8_IO();
$SMS8_IO->init();


add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'sms8_io_settings_link' );
function sms8_io_settings_link( array $links ) {
    $url = get_admin_url() . "admin.php?page=sms8_io_settings_page";
    $settings_link = $links;
    $settings_link[] = '<a href="' . $url . '">' . __('Settings', 'sms8-io') . '</a>';
    $settings_link[] = '<a style="color:#6d00e7;font-weight:bold" href="https://app.sms8.io/" target="_blank">' . __('Create account (FREE)', 'sms8-io') . '</a>';
    $settings_link[] = '<a href="https://sms8.io/tutorials" target="_blank">' . __('Videos tutorials', 'sms8-io') . '</a>';
	
      $links = $settings_link;
    return $links;
}