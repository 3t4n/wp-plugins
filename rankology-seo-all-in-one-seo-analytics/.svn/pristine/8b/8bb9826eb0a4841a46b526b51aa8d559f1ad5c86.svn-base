<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Instant Indexing SECTION=========================================================================
add_settings_section(
    'rankology_setting_section_instant_indexing', // ID
    '',
    //__("Instant Indexing","wp-rankology"), // Title
    'rkseo_print_section_instant_indexing_general', // Callback
    'rankology-settings-admin-instant-indexing' // Page
);

add_settings_field(
    'rankology_instant_indexing_google_action', // ID
    __('Choose action you want to perform', 'wp-rankology'), // Title
    'rankology_instant_indexing_google_action_callback', // Callback
    'rankology-settings-admin-instant-indexing', // Page
    'rankology_setting_section_instant_indexing' // Section
);

add_settings_field(
    'rankology_instant_indexing_google_engine', // ID
    __('Choose engines', 'wp-rankology'), // Title
    'rankology_instant_indexing_google_engine_callback', // Callback
    'rankology-settings-admin-instant-indexing', // Page
    'rankology_setting_section_instant_indexing' // Section
);

add_settings_field(
    'rankology_instant_indexing_manual_batch', // ID
    __('Add URLs for indexing', 'wp-rankology'), // Title
    'rankology_instant_indexing_manual_batch_callback', // Callback
    'rankology-settings-admin-instant-indexing', // Page
    'rankology_setting_section_instant_indexing' // Section
);

add_settings_section(
    'rankology_setting_section_instant_indexing_settings', // ID
    '',
    //__("Settings","wp-rankology"), // Title
    'rkseo_print_section_instant_indexing_settings', // Callback
    'rankology-settings-admin-instant-indexing-settings' // Page
);

add_settings_field(
    'rankology_instant_indexing_google_api_key', // ID
    __('Google Indexing API key', 'wp-rankology'), // Title
    'rankology_instant_indexing_google_api_key_callback', // Callback
    'rankology-settings-admin-instant-indexing-settings', // Page
    'rankology_setting_section_instant_indexing_settings' // Section
);

add_settings_field(
    'rankology_instant_indexing_bing_api_key', // ID
    __('Bing Indexing API key', 'wp-rankology'), // Title
    'rankology_instant_indexing_bing_api_key_callback', // Callback
    'rankology-settings-admin-instant-indexing-settings', // Page
    'rankology_setting_section_instant_indexing_settings' // Section
);

add_settings_field(
    'rankology_instant_indexing_automate_submission', // ID
    __('Automatically notify search engines', 'wp-rankology'), // Title
    'rankology_instant_indexing_automate_submission_callback', // Callback
    'rankology-settings-admin-instant-indexing-settings', // Page
    'rankology_setting_section_instant_indexing_settings' // Section
);
