<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit; // Exit if accessed directly
}

try {


    global $wpdb;

    // Define the pattern (e.g., options starting with 'wuadblockguard')
    $pattern = '%wuadblockguard%';

    // Fetch all matching options
    $options_to_delete = $wpdb->get_col(
        $wpdb->prepare(
            "SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE %s",
            $pattern
        )
    );


    // Check WordPress version
    $wp_version = get_bloginfo('version');

    if (version_compare($wp_version, '6.0', '>=')) {
        // Use wp_cache_delete_multiple if WP version >= 6.0
        if (!empty($options_to_delete)) {
            wp_cache_delete_multiple($options_to_delete, 'options');
            wp_cache_delete_multiple($options_to_delete, 'transient');
        }
    } else {
        // Fallback for older versions
        if (!empty($options_to_delete)) {
            foreach ($options_to_delete as $option) {
                wp_cache_delete($option, 'options');
                wp_cache_delete($option, 'transient');
            }
        }
    }




    // Explicitly delete known Redis keys
    $redis_keys = [
        'wuadblockguard_version',
        'wuadblockguard_license_last_check',
        'wuadblockguard_product_details',
        'wuadblockguard_latest_version',
        'wuadblockguard_notices',
        'wuadblockguard_version'
    ];

    foreach ($redis_keys as $key) {
        wp_cache_delete($key, 'options');
        delete_transient($key); // Ensure transients are deleted
    }

    
    // Delete from the database
    if (!empty($options_to_delete)) {
        $wpdb->query(
            $wpdb->prepare(
                "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s",
                $pattern
            )
        );
    }

} catch (Exception $e) {
    error_log('Error during plugin uninstall: ' . $e->getMessage());
}