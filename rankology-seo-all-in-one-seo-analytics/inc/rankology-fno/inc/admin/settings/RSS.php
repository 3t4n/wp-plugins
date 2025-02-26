<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//RSS SECTION==============================================================================
add_settings_section(
    'rankology_setting_section_rss', // ID
    '',
    //__("RSS","wp-rankology"), // Title
    'rkseo_print_section_info_rss', // Callback
    'rankology-settings-admin-rss' // Page
);

add_settings_field(
    'rankology_rss_before_html', // ID
    __('Display content before each post', 'wp-rankology'), // Title
    'rankology_rss_before_html_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);

add_settings_field(
    'rankology_rss_after_html', // ID
    __('Display content after each post', 'wp-rankology'), // Title
    'rankology_rss_after_html_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);

add_settings_field(
    'rankology_rss_post_thumbnail', // ID
    __('Add post thumbnail', 'wp-rankology'), // Title
    'rankology_rss_post_thumbnail_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);

add_settings_field(
    'rankology_rss_disable_comments_feed', // ID
    __('Disable comments RSS feed', 'wp-rankology'), // Title
    'rankology_rss_disable_comments_feed_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);

add_settings_field(
    'rankology_rss_disable_posts_feed', // ID
    __('Disable posts RSS feed', 'wp-rankology'), // Title
    'rankology_rss_disable_posts_feed_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);

add_settings_field(
    'rankology_rss_disable_extra_feed', // ID
    __('Disable extra RSS feed', 'wp-rankology'), // Title
    'rankology_rss_disable_extra_feed_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);

add_settings_field(
    'rankology_rss_disable_all_feeds', // ID
    __('Disable all RSS feeds', 'wp-rankology'), // Title
    'rankology_rss_disable_all_feeds_callback', // Callback
    'rankology-settings-admin-rss', // Page
    'rankology_setting_section_rss' // Section
);
