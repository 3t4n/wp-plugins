<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
|--------------------------------------------------------------------------
| Plugin activation
|--------------------------------------------------------------------------
|
| This file is included when the plugin is activated the first time.
| Usually you will use this file to register your custom post types or
| to perform some db delta process.
|
*/

if (!function_exists('ai_review_scanner_activation')) {
    function ai_review_scanner_activation()
    {
        if (!class_exists('woocommerce')) {
            deactivate_plugins(plugin_basename(__FILE__));
            wp_die(esc_html__('Please install and activate WooCommerce first. Click the Back button in your browser to continue.', 'ai-review-scanner'));
        }
    }
}

ai_review_scanner_activation();
