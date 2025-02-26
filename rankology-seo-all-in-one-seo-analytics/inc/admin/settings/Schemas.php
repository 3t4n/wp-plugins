<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Structured Data Types Core SECTION===============================================================
add_settings_section(
    'rankology_setting_section_rich_snippets', // ID
    '',
    //__("Structured Data Types","wp-rankology"), // Title
    'rkseo_print_section_info_rich_snippets', // Callback
    'rankology-settings-admin-rich-snippets' // Page
);

add_settings_field(
    'rankology_rich_snippets_enable', // ID
    __('Enable Structured Data Types', 'wp-rankology'), // Title
    'rankology_rich_snippets_enable_callback', // Callback
    'rankology-settings-admin-rich-snippets', // Page
    'rankology_setting_section_rich_snippets' // Section
);

add_settings_field(
    'rankology_rich_snippets_publisher_logo', // ID
    __('Upload your publisher logo', 'wp-rankology'), // Title
    'rankology_rich_snippets_publisher_logo_callback', // Callback
    'rankology-settings-admin-rich-snippets', // Page
    'rankology_setting_section_rich_snippets' // Section
);

add_settings_field(
    'rankology_rich_snippets_site_nav', // ID
    __('Add SiteNavigationElement schema to your main menu', 'wp-rankology'), // Title
    'rankology_rich_snippets_site_nav_callback', // Callback
    'rankology-settings-admin-rich-snippets', // Page
    'rankology_setting_section_rich_snippets' // Section
);
