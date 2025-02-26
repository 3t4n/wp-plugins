<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google Analytics Ecommerce SECTION=================================================================
add_settings_section(
    'rankology_setting_section_google_analytics_ecommerce', // ID
    '',
    //__("Analytics","wp-rankology"), // Title
    'rkseo_print_section_info_google_analytics_ecommerce', // Callback
    'rankology-settings-admin-google-analytics-ecommerce' // Page
);
add_settings_field(
    'rankology_google_analytics_purchases', // ID
    __('Measure purchases', 'wp-rankology'), // Title
    'rankology_google_analytics_purchases_callback', // Callback
    'rankology-settings-admin-google-analytics-ecommerce', // Page
    'rankology_setting_section_google_analytics_ecommerce' // Section
);
add_settings_field(
    'rankology_google_analytics_add_to_cart', // ID
    __('Add to cart event', 'wp-rankology'), // Title
    'rankology_google_analytics_add_to_cart_callback', // Callback
    'rankology-settings-admin-google-analytics-ecommerce', // Page
    'rankology_setting_section_google_analytics_ecommerce' // Section
);
add_settings_field(
    'rankology_google_analytics_remove_from_cart', // ID
    __('Remove from cart event', 'wp-rankology'), // Title
    'rankology_google_analytics_remove_from_cart_callback', // Callback
    'rankology-settings-admin-google-analytics-ecommerce', // Page
    'rankology_setting_section_google_analytics_ecommerce' // Section
);
