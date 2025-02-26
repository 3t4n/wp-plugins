<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//Breadcrumbs SECTION======================================================================
add_settings_section(
    'rankology_setting_section_breadcrumbs', // ID
    '',
    //__("Breadcrumbs","wp-rankology"), // Title
    'rkseo_print_section_info_breadcrumbs', // Callback
    'rankology-settings-admin-breadcrumbs' // Page
);

add_settings_field(
    'rankology_breadcrumbs_enable', // ID
    __('Enable Breadcrumbs', 'wp-rankology'), // Title
    'rankology_breadcrumbs_enable_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'rankology_breadcrumbs_enable_json', // ID
    __('Enable JSON-LD Breadcrumbs', 'wp-rankology'), // Title
    'rankology_breadcrumbs_enable_json_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'rankology_breadcrumbs_separator', // ID
    __('Breadcrumbs Separator', 'wp-rankology'), // Title
    'rankology_breadcrumbs_separator_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'rankology_breadcrumbs_cpt', // ID
    __('Post type to show in Breadcrumbs for taxonomies (archive)', 'wp-rankology'), // Title
    'rankology_breadcrumbs_cpt_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'rankology_breadcrumbs_tax', // ID
    __('Taxonomy to show in Breadcrumbs for post types (singular)', 'wp-rankology'), // Title
    'rankology_breadcrumbs_tax_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'rankology_breadcrumbs_remove_blog_page', // ID
    __('Remove Posts page', 'wp-rankology'), // Title
    'rankology_breadcrumbs_remove_blog_page_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_field(
    'rankology_breadcrumbs_remove_shop_page', // ID
    __('Remove Shop page', 'wp-rankology'), // Title
    'rankology_breadcrumbs_remove_shop_page_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs' // Section
);

add_settings_section(
    'rankology_setting_section_breadcrumbs_i18n', // ID
    '',
    //__("i18n","wp-rankology"), // Title
    'rkseo_print_section_info_breadcrumbs_i18n', // Callback
    'rankology-settings-admin-breadcrumbs' // Page
);

add_settings_field(
    'rankology_breadcrumbs_i18n_here', // ID
    __('Display a text before the breadcrumbs', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_here_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'rankology_breadcrumbs_i18n_home', // ID
    __('Translation for homepage', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_home_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'rankology_breadcrumbs_i18n_author', // ID
    __('Translation for "Author:"', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_author_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'rankology_breadcrumbs_i18n_404', // ID
    __('Translation for "Error 404"', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_404_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'rankology_breadcrumbs_i18n_search', // ID
    __('Translation for "Search results for"', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_search_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);

add_settings_field(
    'rankology_breadcrumbs_i18n_no_results', // ID
    __('Translation for "No results"', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_no_results_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);
add_settings_field(
    'rankology_breadcrumbs_i18n_attachments', // ID
    __('Translation for "Attachments"', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_attachments_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);
add_settings_field(
    'rankology_breadcrumbs_i18n_paged', // ID
    __('Translation for "Page "', 'wp-rankology'), // Title
    'rankology_breadcrumbs_i18n_paged_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_i18n' // Section
);

add_settings_section(
    'rankology_setting_section_breadcrumbs_misc', // ID
    '',
    //__("Misc","wp-rankology"), // Title
    'rkseo_print_section_info_breadcrumbs_misc', // Callback
    'rankology-settings-admin-breadcrumbs' // Page
);

add_settings_field(
    'rankology_breadcrumbs_separator_disable', // ID
    __('Disable default breadcrumbs separator', 'wp-rankology'), // Title
    'rankology_breadcrumbs_separator_disable_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_misc' // Section
);

add_settings_field(
    'rankology_breadcrumbs_storefront', // ID
    __('Storefront compatibility', 'wp-rankology'), // Title
    'rankology_breadcrumbs_storefront_callback', // Callback
    'rankology-settings-admin-breadcrumbs', // Page
    'rankology_setting_section_breadcrumbs_misc' // Section
);
