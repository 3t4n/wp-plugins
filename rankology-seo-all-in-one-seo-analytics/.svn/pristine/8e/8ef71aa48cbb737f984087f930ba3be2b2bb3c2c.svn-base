<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Dublin Core SECTION======================================================================
add_settings_section(
    'rankology_setting_section_dublin_core', // ID
    '',
    //__("Dublin Core","wp-rankology"), // Title
    'rkseo_print_section_info_dublin_core', // Callback
    'rankology-settings-admin-dublin-core' // Page
);

add_settings_field(
    'rankology_dublin_core_enable', // ID
    __('Enable Dublin Core', 'wp-rankology'), // Title
    'rankology_dublin_core_enable_callback', // Callback
    'rankology-settings-admin-dublin-core', // Page
    'rankology_setting_section_dublin_core' // Section
);
