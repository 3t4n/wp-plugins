<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Rewrite SECTION==============================================================================
add_settings_section(
    'rankology_setting_section_rewrite', // ID
    '',
    //__("Rewrite","wp-rankology"), // Title
    'rkseo_print_section_info_rewrite', // Callback
    'rankology-settings-admin-rewrite' // Page
);

add_settings_field(
    'rankology_rewrite_search', // ID
    __('Custom URL for search results', 'wp-rankology'), // Title
    'rankology_rewrite_search_callback', // Callback
    'rankology-settings-admin-rewrite', // Page
    'rankology_setting_section_rewrite' // Section
);
