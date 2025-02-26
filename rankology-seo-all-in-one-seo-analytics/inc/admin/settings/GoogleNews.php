<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Google News SECTION======================================================================
add_settings_section(
    'rankology_setting_section_news', // ID
    '',
    //__("Google News","wp-rankology"), // Title
    'rkseo_print_section_info_news', // Callback
    'rankology-settings-admin-news' // Page
);

add_settings_field(
    'rankology_news_enable', // ID
    __('Enable Google News Sitemap', 'wp-rankology'), // Title
    'rankology_news_enable_callback', // Callback
    'rankology-settings-admin-news', // Page
    'rankology_setting_section_news' // Section
);

add_settings_field(
    'rankology_news_name', // ID
    __('Publication Name', 'wp-rankology'), // Title
    'rankology_news_name_callback', // Callback
    'rankology-settings-admin-news', // Page
    'rankology_setting_section_news' // Section
);

add_settings_field(
    'rankology_news_name_post_types_list', // ID
    __('Select your Custom Post Type to include in your Google News Sitemap', 'wp-rankology'), // Title
    'rankology_news_name_post_types_list_callback', // Callback
    'rankology-settings-admin-news', // Page
    'rankology_setting_section_news' // Section
);
