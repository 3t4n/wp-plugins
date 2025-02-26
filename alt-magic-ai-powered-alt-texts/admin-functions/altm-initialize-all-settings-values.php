<?php  

// Ensure this file is not accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add plugin settings
function alt_magic_add_settings() {
    $settings = [
        'alt_magic_account_active' => 0,
        'alt_magic_api_key' => '',
        'alt_magic_user_id' => '',
        'alt_magic_language' => 'en',
        'alt_magic_use_for_title' => 0,
        'alt_magic_use_for_caption' => 0,
        'alt_magic_use_for_description' => 0,
        'alt_magic_prepend_string' => '',
        'alt_magic_append_string' => '',
        'alt_magic_auto_generate' => 1,
        'alt_magic_use_seo_keywords' => 1,
        'alt_magic_use_post_title' => 1,
        'alt_magic_refresh_alt_text' => 'empty',
        'alt_magic_private_site' => 0,
        'alt_magic_woocommerce_use_product_name' => 0
    ];

    foreach ($settings as $key => $default_value) {
        $option_name = $key;
        if (get_option($option_name) === false) {
            add_option($option_name, $default_value);
        }
        register_setting('alt_magic_options', $option_name);
    }

}

add_action('admin_init', 'alt_magic_add_settings');