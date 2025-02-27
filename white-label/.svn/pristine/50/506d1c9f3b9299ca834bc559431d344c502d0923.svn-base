<?php
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$white_label_general = get_option('white_label_general');

if (isset($white_label_general['delete_settings']) && $white_label_general['delete_settings'] == 'on') {
    $options = [
        'white_label_cached_admin_bar_nodes',
        'white_label_cached_dashboard_widgets',
        'white_label_cached_frontend_admin_bar_nodes',
        'white_label_dashboard',
        'white_label_front_end',
        'white_label_general',
        'white_label_import_export',
        'white_label_login',
        'white_label_menus',
        'white_label_menus_plugins',
        'white_label_misc',
        'white_label_plugins',
        'white_label_plugins_elementor',
        'white_label_pro_license',
        'white_label_pro_license_status',
        'white_label_themes',
        'white_label_upgrade',
        'white_label_visual_tweaks',
        'white_label_admin',
        'white_label_multisite',
    ];

    foreach ($options as $option) {
        delete_option($option);
    }

    if (is_multisite()) {
        global $wpdb;

        $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
        $original_blog_id = get_current_blog_id();
    
        foreach ($blog_ids as $blog_id) {
            switch_to_blog( $blog_id );

            foreach ($options as $option) {
                delete_option($option);
            }
        }
    
        switch_to_blog($original_blog_id);
    }
}