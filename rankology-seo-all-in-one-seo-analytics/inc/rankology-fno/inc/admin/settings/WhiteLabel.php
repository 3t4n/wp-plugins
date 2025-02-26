<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//White Label SECTION==============================================================================
if (is_network_admin() && is_multisite()) {
    add_settings_section(
        'rankology_mu_setting_section_white_label', // ID
        '',
        //__("White Label","wp-rankology"), // Title
        'rkseo_print_section_info_white_label', // Callback
        'rankology-mu-settings-admin-white-label' // Page
    );

    add_settings_field(
        'rankology_mu_white_label_admin_header', // ID
        __('Keep only the SEO settings block from SEO dashboard', 'wp-rankology'), // Title
        'rankology_white_label_admin_header_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_mu_white_label_admin_menu', // ID
        __('Filter SEO admin menu dashicons', 'wp-rankology'), // Title
        'rankology_white_label_admin_menu_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_mu_white_label_admin_bar_icon', // ID
        __('Edit Rankology item in admin bar', 'wp-rankology'), // Title
        'rankology_white_label_admin_bar_icon_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_mu_white_label_admin_title', // ID
        __('Edit Rankology title in main menu', 'wp-rankology'), // Title
        'rankology_white_label_admin_title_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_mu_white_label_help_links', // ID
        __('Hide Rankology links / help icons', 'wp-rankology'), // Title
        'rankology_white_label_help_links_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_mu_white_label_menu_pages', // ID
        __('Remove Rankology menu/submenu pages/dashboard items', 'wp-rankology'), // Title
        'rankology_white_label_menu_pages_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_title', // ID
        __('Change plugin title in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_title_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_title_pro', // ID
        __('Change plugin title in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_title_pro_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_desc', // ID
        __('Change plugin description in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_desc_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_desc_pro', // ID
        __('Change plugin description in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_desc_pro_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_author', // ID
        __('Change plugin author in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_author_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_website', // ID
        __('Change plugin website in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_website_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_mu_white_label_plugin_list_view_details', // ID
        __('Remove View details in plugin list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_view_details_callback', // Callback
        'rankology-mu-settings-admin-white-label', // Page
        'rankology_mu_setting_section_white_label' // Section
    );
} else {
    add_settings_section(
        'rankology_setting_section_white_label', // ID
        '',
        //__("White Label","wp-rankology"), // Title
        'rkseo_print_section_info_white_label', // Callback
        'rankology-settings-admin-white-label' // Page
    );

    add_settings_field(
        'rankology_white_label_admin_header', // ID
        __('Keep only the SEO settings block from SEO dashboard', 'wp-rankology'), // Title
        'rankology_white_label_admin_header_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_white_label_admin_menu', // ID
        __('Filter SEO admin menu dashicons', 'wp-rankology'), // Title
        'rankology_white_label_admin_menu_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_white_label_admin_bar_icon', // ID
        __('Edit Rankology item in admin bar', 'wp-rankology'), // Title
        'rankology_white_label_admin_bar_icon_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_white_label_admin_title', // ID
        __('Edit Rankology title in main menu', 'wp-rankology'), // Title
        'rankology_white_label_admin_title_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );

    add_settings_field(
        'rankology_white_label_help_links', // ID
        __('Hide Rankology links / help icons', 'wp-rankology'), // Title
        'rankology_white_label_help_links_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_title', // ID
        __('Change plugin title in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_title_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_title_pro', // ID
        __('Change plugin title in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_title_pro_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_desc', // ID
        __('Change plugin description in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_desc_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_desc_pro', // ID
        __('Change plugin description in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_desc_pro_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_author', // ID
        __('Change plugin author in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_author_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_website', // ID
        __('Change plugin website in plugins list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_website_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
    add_settings_field(
        'rankology_white_label_plugin_list_view_details', // ID
        __('Remove View details in plugin list', 'wp-rankology'), // Title
        'rankology_white_label_plugin_list_view_details_callback', // Callback
        'rankology-settings-admin-white-label', // Page
        'rankology_setting_section_white_label' // Section
    );
}
