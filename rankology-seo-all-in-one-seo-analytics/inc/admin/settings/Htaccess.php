<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//htaccess SECTION=========================================================================
add_settings_section(
    'rankology_setting_section_htaccess', // ID
    '',
    //__("htaccess","wp-rankology"), // Title
    'rkseo_print_section_info_htaccess', // Callback
    'rankology-settings-admin-htaccess' // Page
);

add_settings_field(
    'rankology_htaccess_file', // ID
   __('Edit your htaccess file', 'wp-rankology'), // Title
    'rankology_htaccess_file_callback', // Callback
    'rankology-settings-admin-htaccess', // Page
    'rankology_setting_section_htaccess' // Section
);
