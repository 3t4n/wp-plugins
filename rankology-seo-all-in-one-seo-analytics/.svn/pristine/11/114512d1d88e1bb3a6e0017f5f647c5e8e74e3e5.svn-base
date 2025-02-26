<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//404 SECTION=========================================================================
add_settings_section(
    'rankology_setting_section_monitor_404', // ID
    '',
    //__("404","wp-rankology"), // Title
    'rkseo_print_section_info_monitor_404', // Callback
    'rankology-settings-admin-monitor-404' // Page
);

add_settings_field(
    'rankology_404_cleaning', // ID
    __('404 cleaning', 'wp-rankology'), // Title
    'rankology_404_cleaning_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_enable', // ID
    __('404 log', 'wp-rankology'), // Title
    'rankology_404_enable_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_redirect_custom_url', // ID
    __('Redirect to specific URL', 'wp-rankology'), // Title
    'rankology_404_redirect_custom_url_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_redirect_status_code', // ID
    __('Status code of redirections', 'wp-rankology'), // Title
    'rankology_404_redirect_status_code_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_redirect_home', // ID
    __('Redirect 404 to', 'wp-rankology'), // Title
    'rankology_404_redirect_home_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);


add_settings_field(
    'rankology_404_enable_mails', // ID
    __('Email notifications', 'wp-rankology'), // Title
    'rankology_404_enable_mails_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_enable_mails_from', // ID
    __('Send emails to', 'wp-rankology'), // Title
    'rankology_404_enable_mails_from_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_disable_guess_automatic_redirects_404', // ID
    __('Disable guess redirect url for 404', 'wp-rankology'), // Title
    'rankology_404_disable_guess_automatic_redirects_404_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_disable_automatic_redirects', // ID
    __('Disable redirect suggestions', 'wp-rankology'), // Title
    'rankology_404_disable_automatic_redirects_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);

add_settings_field(
    'rankology_404_ip_logging', // ID
    __('Disable IP logging', 'wp-rankology'), // Title
    'rankology_404_ip_logging_callback', // Callback
    'rankology-settings-admin-monitor-404', // Page
    'rankology_setting_section_monitor_404' // Section
);
