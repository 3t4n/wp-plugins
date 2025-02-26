<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//XML Sitemap SECTION======================================================================
add_settings_section(
    'rankology_setting_section_xml_sitemap_general', // ID
    '',
    //__("General","wp-rankology"), // Title
    'rkseo_print_section_info_xml_sitemap_general', // Callback
    'rankology-settings-admin-xml-sitemap-general' // Page
);

add_settings_field(
    'rankology_xml_sitemap_general_enable', // ID
    __('XML Sitemap', 'wp-rankology'), // Title
    'rankology_xml_sitemap_general_enable_callback', // Callback
    'rankology-settings-admin-xml-sitemap-general', // Page
    'rankology_setting_section_xml_sitemap_general' // Section
);

add_settings_field(
    'rankology_xml_sitemap_img_enable', // ID
    __('XML Image Sitemap', 'wp-rankology'), // Title
    'rankology_xml_sitemap_img_enable_callback', // Callback
    'rankology-settings-admin-xml-sitemap-general', // Page
    'rankology_setting_section_xml_sitemap_general' // Section
);

//do_action('rankology_settings_sitemaps_image_after');
if (function_exists('rankology_fno_setRoles')) {
    add_settings_field(
        'rankology_xml_sitemap_video_enable', // ID
        __('XML Video Sitemap', 'wp-rankology'), // Title
        'rankology_fno_xml_sitemap_video_enable_callback', // Callback
        'rankology-settings-admin-xml-sitemap-general', // Page
        'rankology_setting_section_xml_sitemap_general' // Section
    );
}

add_settings_field(
    'rankology_xml_sitemap_author_enable', // ID
    __('Author Sitemap', 'wp-rankology'), // Title
    'rankology_xml_sitemap_author_enable_callback', // Callback
    'rankology-settings-admin-xml-sitemap-general', // Page
    'rankology_setting_section_xml_sitemap_general' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_enable', // ID
    __('HTML Sitemap', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_enable_callback', // Callback
    'rankology-settings-admin-xml-sitemap-general', // Page
    'rankology_setting_section_xml_sitemap_general' // Section
);

add_settings_section(
    'rankology_setting_section_xml_sitemap_post_types', // ID
    '',
    //__("Post Types","wp-rankology"), // Title
    'rkseo_print_section_info_xml_sitemap_post_types', // Callback
    'rankology-settings-admin-xml-sitemap-post-types' // Page
);

add_settings_field(
    'rankology_xml_sitemap_post_types_list', // ID
    __('Check to INCLUDE Post Types', 'wp-rankology'), // Title
    'rankology_xml_sitemap_post_types_list_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_order', // ID
    __('Sort order', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_order_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_orderby', // ID
    __('Order posts by', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_orderby_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_mapping', // ID
    __('Inlude post, pages ID(s) to sitemap (comma separated)', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_mapping_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_exclude', // ID
    __('Exclude posts, pages ID(s) (comma separated)', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_exclude_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_date', // ID
    __('Disable the display of the publication date', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_date_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_field(
    'rankology_xml_sitemap_html_archive_links', // ID
    __('Remove links from archive pages', 'wp-rankology'), // Title
    'rankology_xml_sitemap_html_archive_links_callback', // Callback
    'rankology-settings-admin-xml-sitemap-post-types', // Page
    'rankology_setting_section_xml_sitemap_post_types' // Section
);

add_settings_section(
    'rankology_setting_section_xml_sitemap_taxonomies', // ID
    '',
    //__("Taxonomies","wp-rankology"), // Title
    'rkseo_print_section_info_xml_sitemap_taxonomies', // Callback
    'rankology-settings-admin-xml-sitemap-taxonomies' // Page
);

add_settings_field(
    'rankology_xml_sitemap_taxonomies_list', // ID
    __('Check to INCLUDE Taxonomies', 'wp-rankology'), // Title
    'rankology_xml_sitemap_taxonomies_list_callback', // Callback
    'rankology-settings-admin-xml-sitemap-taxonomies', // Page
    'rankology_setting_section_xml_sitemap_taxonomies' // Section
);

add_settings_section(
    'rankology_setting_section_html_sitemap', // ID
    '',
    //__("HTML Sitemap","wp-rankology"), // Title
    'rkseo_print_section_info_html_sitemap', // Callback
    'rankology-settings-admin-html-sitemap' // Page
);


