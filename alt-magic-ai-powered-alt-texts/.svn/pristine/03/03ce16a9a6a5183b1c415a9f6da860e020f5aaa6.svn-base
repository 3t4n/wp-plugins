<?php

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Hook to enqueue admin scripts and styles
add_action('admin_enqueue_scripts', 'altm_custom_media_popup_button_script');

function altm_custom_media_popup_button_script() {
    //altm_log('Media library script added');
    // Only enqueue the script and style on the media popup page
    if (function_exists('get_current_screen')) {
        $screen = get_current_screen();
        if ($screen->base === 'upload' || ($screen->base === 'post' && isset($_GET['post']) && get_post_type($_GET['post']) === 'product')) {
            // Enqueue the JavaScript file
            wp_enqueue_script(
                'alt-magic-media-popup-button',
                plugin_dir_url(__FILE__) . '../scripts/altm-media-popup-button.js',
                array('jquery'),
                '1.0.0', // Specify the version number here
                true
            );

            // Localize the script with AJAX URL and nonce
            wp_localize_script(
                'alt-magic-media-popup-button',
                'ajax_object',
                array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'generate_alt_text_nonce' => wp_create_nonce('generate_alt_text_nonce'),
                )
            );

            // Enqueue the CSS file
            wp_enqueue_style(
                'alt-magic-media-popup-button-css',
                plugin_dir_url(__FILE__) . '../css/altm-media-popup-button.css',
                array(),
                '1.0.0' // Specify the version number here
            );
        }
    }
}
