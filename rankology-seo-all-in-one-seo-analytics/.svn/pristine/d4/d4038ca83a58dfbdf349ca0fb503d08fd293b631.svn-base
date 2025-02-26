<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//PageSpeed Insights SECTION=======================================================================
add_settings_section(
    'rankology_setting_section_page_speed', // ID
    '',
    //__("PageSpeed Insights","wp-rankology"), // Title
    'rkseo_print_section_info_page_speed', // Callback
    'rankology-settings-admin-page-speed' // Page
);

add_settings_field(
    'rankology_ps_url', // ID
    __('Enter a URL to check', 'wp-rankology'), // Title
    'rankology_ps_url_callback', // Callback
    'rankology-settings-admin-page-speed', // Page
    'rankology_setting_section_page_speed' // Section
);

add_settings_field(
    'rankology_ps_api_key', // ID
    __('Enter your own Google Page Speed API key', 'wp-rankology'), // Title
    'rankology_ps_api_key_callback', // Callback
    'rankology-settings-admin-page-speed', // Page
    'rankology_setting_section_page_speed' // Section
);
