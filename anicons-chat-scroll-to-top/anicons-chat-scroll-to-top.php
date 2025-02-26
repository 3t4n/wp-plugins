<?php

/*
 * Plugin Name: Anicons - Chat & Scroll to Top
 * Description: Adds Animated Floating Icon Buttons for the footer, WhatsApp Icon Button & Scroll-to-Top Icon Button.
 * Version: 1.1.0
 * Author: Farith Adhil
 * License: GPLv2
 * Text Domain: anicons-chat-scroll-to-top
 * 
 */


 // Exit if accessed directly for security
if (!defined('ABSPATH')) {
    exit;
}

function anicons_activate() {
    // Set default values if they don't exist
    add_option('anicons_whatsapp_bottom', '20');
    add_option('anicons_whatsapp_left', '20');
    add_option('anicons_scroll_bottom', '20');
    add_option('anicons_scroll_right', '20');
    
    // Other default options
    add_option('anicons_whatsapp_enabled', 'yes');
    add_option('anicons_scroll_enabled', 'yes');
    add_option('anicons_whatsapp_icon', 'icon-whatsapp-01.png');
    add_option('anicons_scroll_icon', 'icon-scroll-to-top-01.png');
}

// Add activation hook
register_activation_hook(__FILE__, 'anicons_activate');


// Enqueue styles and scripts
function anicons_enqueue_scripts() {
    wp_enqueue_style('anicons-styles', esc_url(plugin_dir_url(__FILE__) . 'css/styles.css'),  array(), '1.0', 'all');
    
    wp_enqueue_script('anicons-script', esc_url(plugin_dir_url(__FILE__) . 'js/scroll-script.js'), array('jquery'), '1.0', true);
    
}
add_action('wp_enqueue_scripts', 'anicons_enqueue_scripts');

// Add admin menu
function anicons_admin_menu() {
    add_menu_page(
        'Anicons Settings',
        'Anicons',
        'manage_options',
        'anicons-settings',
        'anicons_settings_page_content',
        'dashicons-arrow-up-alt2',
        30
    );
}
add_action('admin_menu', 'anicons_admin_menu');

include( plugin_dir_path( __FILE__ ) . 'includes/anicons-settings-page.php' );
include( plugin_dir_path( __FILE__ ) . 'includes/anicons-display-icons.php' );

// Add settings link on the plugin page
function anicons_add_settings_link($links) {
    $settings_link = '<a href="admin.php?page=anicons-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'anicons_add_settings_link');







