<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

add_action('rankology_settings_sitemaps_image_after','rankology_fno_settings_sitemaps_image_after');
function rankology_fno_settings_sitemaps_image_after() {
    //Video sitemap
    add_settings_field(
        'rankology_xml_sitemap_video_enable', // ID
        __('Enable XML Video Sitemap', 'wp-rankology'), // Title
        'rankology_fno_xml_sitemap_video_enable_callback', // Callback
        'rankology-settings-admin-xml-sitemap-general', // Page
        'rankology_setting_section_xml_sitemap_general' // Section
    );
}
