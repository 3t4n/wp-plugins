<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}
// Add plugin settings page
function altm_add_admin_menu() {
    $icon_url = plugin_dir_url(__FILE__) . '../assets/altm-main-logo.png';
    
    add_menu_page(
        'Alt Magic Settings',  // Page title
        'Alt Magic: AI Powered Alt Texts',       // Menu title
        'manage_options',      // Capability required to access the page
        'alt-magic',           // Menu slug
        'alt_magic_render_settings_page',  // Callback function to render the page content
        $icon_url,             // Icon URL
        80                     // Position in the menu order
    );

    add_submenu_page(
        'alt-magic',           // Parent menu slug
        'Account Settings',    // Page title
        'Account Settings',    // Menu title
        'manage_options',      // Capability required to access the page
        'alt-magic',           // Menu slug
        'alt_magic_render_settings_page'  // Callback function to render the page content
    );

    add_submenu_page(
        'alt-magic',           // Parent menu slug
        'AI Settings',         // Page title
        'AI Settings',         // Menu title
        'manage_options',      // Capability required to access the page
        'alt-magic-ai-settings', // Menu slug
        'alt_magic_render_ai_settings_page'  // Callback function to render the page content
    );

    add_submenu_page(
        'alt-magic',           // Parent menu slug
        'Bulk Generation',     // Page title
        'Bulk Generation',     // Menu title
        'manage_options',      // Capability required to access the page
        'alt-magic-bulk-generation',  // Menu slug
        'alt_magic_render_bulk_generation_page'  // Callback function to render the page content
    );

    add_submenu_page(
        'alt-magic',
        'Alt Magic Help',
        'Alt Magic Help',
        'manage_options',
        'alt-magic-help',
        'alt_magic_render_help_page'
    );
}
add_action( 'admin_menu', 'altm_add_admin_menu' );
