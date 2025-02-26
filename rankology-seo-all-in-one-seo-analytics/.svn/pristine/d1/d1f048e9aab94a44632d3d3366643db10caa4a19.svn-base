<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Advanced SECTION=========================================================================
add_settings_field(
    'rankology_advanced_appearance_ps_col', // ID
    __('Show Google Page Speed column in post types', 'wp-rankology'), // Title
    'rankology_fno_advanced_appearance_ps_col_callback', // Callback
    'rankology-settings-admin-advanced-appearance', // Page
    'rankology_setting_section_advanced_appearance_col' // Section
);

add_settings_field(
    'rankology_advanced_appearance_search_console', // ID
    __('Show search console data', 'wp-rankology'), // Title
    'rankology_fno_advanced_appearance_search_console_callback', // Callback
    'rankology-settings-admin-advanced-appearance', // Page
    'rankology_setting_section_advanced_appearance_col' // Section
);

add_action('rankology_settings_advanced_after', 'rankology_fno_settings_advanced_after');
function rankology_fno_settings_advanced_after() {
    add_settings_section(
        'rankology_setting_section_advanced_security_ga', // ID
        '',
        __("Security","wp-rankology"), // Title
        'rkseo_print_section_info_advanced_security_ga', // Callback
        'rankology-settings-admin-advanced-security' // Page
    );
}
