<?php

//Plugin add submenu to WC
// exit if file is called directly
if (!defined('ABSPATH')) {

    exit;
}

// add top-level administrative menu
function auto_generate_coupon_add_toplevel_menu() {

    add_submenu_page(
            'woocommerce', 
            esc_html__('Auto generate coupon for Woocommerce', 'auto_generate_coupon'), 
            esc_html__('Auto generate coupon for Woocommerce', 'auto_generate_coupon'), 
            'manage_options', 
            'auto_generate_coupon', 
            'auto_generate_coupon_display_settings_page', 
            'dashicons-admin-generic', 
            null
    );
}

add_action('admin_menu', 'auto_generate_coupon_add_toplevel_menu');


