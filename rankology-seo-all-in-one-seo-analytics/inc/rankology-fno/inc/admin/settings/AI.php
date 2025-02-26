<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//AI SECTION=======================================================================================
add_settings_section(
    'rankology_setting_section_ai', // ID
    '',
    //__("AI","wp-rankology"), // Title
    'rkseo_print_section_info_ai', // Callback
    'rankology-settings-admin-ai' // Page
);

add_settings_field(
    'rankology_ai_openai_api_key', // ID
    __('OpenAI API key', 'wp-rankology'), // Title
    'rankology_ai_openai_api_key_callback', // Callback
    'rankology-settings-admin-ai', // Page
    'rankology_setting_section_ai' // Section
);

add_settings_field(
    'rankology_ai_openai_model', // ID
    __('OpenAI model', 'wp-rankology'), // Title
    'rankology_ai_openai_model_callback', // Callback
    'rankology-settings-admin-ai', // Page
    'rankology_setting_section_ai' // Section
);
