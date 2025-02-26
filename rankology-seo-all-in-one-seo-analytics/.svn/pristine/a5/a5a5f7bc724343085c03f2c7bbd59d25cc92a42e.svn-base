<?php

defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

//WooCommerce SECTION======================================================================
add_settings_section(
    'rankology_setting_section_woocommerce', // ID
    '',
    //__("WooCommerce","wp-rankology"), // Title
    'rkseo_print_section_info_woocommerce', // Callback
    'rankology-settings-admin-woocommerce' // Page
);

add_settings_field(
    'rankology_woocommerce_cart_page_no_index', // ID
    __('Cart page', 'wp-rankology'), // Title
    'rankology_woocommerce_cart_page_no_index_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_checkout_page_no_index', // ID
    __('Checkout page', 'wp-rankology'), // Title
    'rankology_woocommerce_checkout_page_no_index_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_customer_account_page_no_index', // ID
    __('Customer account pages', 'wp-rankology'), // Title
    'rankology_woocommerce_customer_account_page_no_index_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_product_og_price', // ID
    __('OG Price', 'wp-rankology'), // Title
    'rankology_woocommerce_product_og_price_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_product_og_currency', // ID
    __('OG Currency', 'wp-rankology'), // Title
    'rankology_woocommerce_product_og_currency_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_meta_generator', // ID
    __('Remove WooCommerce generator tag in your head', 'wp-rankology'), // Title
    'rankology_woocommerce_meta_generator_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_schema_output', // ID
    __('Remove WooCommerce Schemas', 'wp-rankology'), // Title
    'rankology_woocommerce_schema_output_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);

add_settings_field(
    'rankology_woocommerce_schema_breadcrumbs_output', // ID
    __('Remove WooCommerce breadcrumbs schemas only', 'wp-rankology'), // Title
    'rankology_woocommerce_schema_breadcrumbs_output_callback', // Callback
    'rankology-settings-admin-woocommerce', // Page
    'rankology_setting_section_woocommerce' // Section
);
