<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google Analytics SECTION=================================================================
add_settings_section(
    'rankology_setting_section_google_analytics_dashboard', // ID
    '',
    //__("Analytics","wp-rankology"), // Title
    'rkseo_print_section_info_google_analytics_dashboard', // Callback
    'rankology-settings-admin-google-analytics-dashboard' // Page
);
add_settings_field(
    'rankology_google_analytics_auth', // ID
    __('Connect with Google Analytics API', 'wp-rankology'), // Title
    'rankology_google_analytics_auth_callback', // Callback
    'rankology-settings-admin-google-analytics-dashboard', // Page
    'rankology_setting_section_google_analytics_dashboard' // Section
);
add_settings_field(
    'rankology_google_analytics_ga4_property_id', // ID
    __('GA4 property ID', 'wp-rankology'), // Title
    'rankology_google_analytics_ga4_property_id_callback', // Callback
    'rankology-settings-admin-google-analytics-dashboard', // Page
    'rankology_setting_section_google_analytics_dashboard' // Section
);
add_settings_field(
    'rankology_google_analytics_auth_client_id', // ID
    __('Google Console Client ID', 'wp-rankology'), // Title
    'rankology_google_analytics_auth_client_id_callback', // Callback
    'rankology-settings-admin-google-analytics-dashboard', // Page
    'rankology_setting_section_google_analytics_dashboard' // Section
);
add_settings_field(
    'rankology_google_analytics_auth_secret_id', // ID
    __('Google Console Secret ID', 'wp-rankology'), // Title
    'rankology_google_analytics_auth_secret_id_callback', // Callback
    'rankology-settings-admin-google-analytics-dashboard', // Page
    'rankology_setting_section_google_analytics_dashboard' // Section
);

add_action('rankology_analytics_settings_section', 'rankology_fno_analytics_settings_section');
function rankology_fno_analytics_settings_section() {
    ?> | <a href="#rankology-analytics-ecommerce"><?php esc_html_e('Ecommerce', 'wp-rankology'); ?></a> | <a href="#rankology-analytics-stats"><?php esc_html_e('Stats in Dashboard', 'wp-rankology'); ?></a><?php
}
