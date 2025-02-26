<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Inspect URL SECTION==============================================================================
add_settings_section(
    'rankology_setting_section_inspect_url', // ID
    '',
    //__("Google Search Console","wp-rankology"), // Title
    'rkseo_print_section_info_inspect_url', // Callback
    'rankology-settings-admin-inspect-url' // Page
);

add_settings_field(
    'rankology_fno_inspect_url_api', // ID
    __('Google Search Console API key', 'wp-rankology'), // Title
    'rankology_fno_inspect_url_api_callback', // Callback
    'rankology-settings-admin-inspect-url', // Page
    'rankology_setting_section_inspect_url' // Section
);

add_settings_field(
    'rankology_gsc_domain_property', // ID
    __('Domain property', 'wp-rankology'), // Title
    'rankology_gsc_domain_property_callback', // Callback
    'rankology-settings-admin-inspect-url', // Page
    'rankology_setting_section_inspect_url' // Section
);

add_settings_field(
    'rankology_gsc_date_range', // ID
    __('Date range', 'wp-rankology'), // Title
    'rankology_gsc_date_range_callback', // Callback
    'rankology-settings-admin-inspect-url', // Page
    'rankology_setting_section_inspect_url' // Section
);
