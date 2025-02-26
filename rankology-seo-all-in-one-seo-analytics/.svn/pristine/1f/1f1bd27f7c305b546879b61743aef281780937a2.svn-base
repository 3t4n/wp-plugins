<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Easy Digital Downloads SECTION======================================================================
add_settings_section(
    'rankology_setting_section_edd', // ID
    '',
    //__("Easy Digital Downloads","wp-rankology"), // Title
    'rkseo_print_section_info_edd', // Callback
    'rankology-settings-admin-edd' // Page
);

add_settings_field(
    'rankology_edd_product_og_price', // ID
    __('OG Price', 'wp-rankology'), // Title
    'rankology_edd_product_og_price_callback', // Callback
    'rankology-settings-admin-edd', // Page
    'rankology_setting_section_edd' // Section
);

add_settings_field(
    'rankology_edd_product_og_currency', // ID
    __('OG Currency', 'wp-rankology'), // Title
    'rankology_edd_product_og_currency_callback', // Callback
    'rankology-settings-admin-edd', // Page
    'rankology_setting_section_edd' // Section
);

add_settings_field(
    'rankology_edd_meta_generator', // ID
    __('Remove Easy Digital Downloads generator tag in your head', 'wp-rankology'), // Title
    'rankology_edd_meta_generator_callback', // Callback
    'rankology-settings-admin-edd', // Page
    'rankology_setting_section_edd' // Section
);
