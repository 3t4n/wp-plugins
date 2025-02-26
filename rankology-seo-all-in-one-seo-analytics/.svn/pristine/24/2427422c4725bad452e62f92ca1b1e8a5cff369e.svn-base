<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Robots SECTION===========================================================================
if (is_network_admin() && is_multisite()) {
    add_settings_section(
        'rankology_mu_setting_section_robots', // ID
        '',
        //__("Robots","wp-rankology"), // Title
        'rkseo_print_section_info_robots', // Callback
        'rankology-mu-settings-admin-robots' // Page
    );
    add_settings_field(
        'rankology_mu_robots_enable', // ID
        __('Enable Robots', 'wp-rankology'), // Title
        'rankology_robots_enable_callback', // Callback
        'rankology-mu-settings-admin-robots', // Page
        'rankology_mu_setting_section_robots' // Section
    );
    add_settings_field(
        'rankology_mu_robots_file', // ID
        __('Virtual Robots.txt file', 'wp-rankology'), // Title
        'rankology_robots_file_callback', // Callback
        'rankology-mu-settings-admin-robots', // Page
        'rankology_mu_setting_section_robots' // Section
    );
} else {
    add_settings_section(
        'rankology_setting_section_robots', // ID
        '',
        //__("Robots","wp-rankology"), // Title
        'rkseo_print_section_info_robots', // Callback
        'rankology-settings-admin-robots' // Page
    );
    add_settings_field(
        'rankology_robots_enable', // ID
        __('Enable Robots', 'wp-rankology'), // Title
        'rankology_robots_enable_callback', // Callback
        'rankology-settings-admin-robots', // Page
        'rankology_setting_section_robots' // Section
    );
    add_settings_field(
        'rankology_robots_file', // ID
        __('Virtual Robots.txt file', 'wp-rankology'), // Title
        'rankology_robots_file_callback', // Callback
        'rankology-settings-admin-robots', // Page
        'rankology_setting_section_robots' // Section
    );
}
