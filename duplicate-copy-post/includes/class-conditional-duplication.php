<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Conditional_Duplication {

    public function __construct() {
        add_action('admin_init', array($this, 'register_conditional_settings'));
        add_action('admin_action_duplicate_post_as_draft', array($this, 'check_conditions_before_duplication'));
    }

    // Register the settings for conditional duplication
    public function register_conditional_settings() {
        register_setting('DCPDUP_profile_settings_group', 'DCPDUP_profile_name', 'sanitize_text_field');
        register_setting('DCPDUP_settings_group', 'DCPDUP_duplicate_categories', 'sanitize_text_field');

        add_settings_section('DCPDUP_conditional_section', 'Conditional Duplication Settings', array($this, 'conditional_settings_section'), 'duplicate-settings');
        add_settings_field('DCPDUP_duplicate_user_roles', 'Allowed User Roles', array($this, 'user_roles_field_callback'), 'duplicate-settings', 'DCPDUP_conditional_section');
        add_settings_field('DCPDUP_duplicate_categories', 'Allowed Categories', array($this, 'categories_field_callback'), 'duplicate-settings', 'DCPDUP_conditional_section');
    }

    public function conditional_settings_section() {
        echo 'Set conditions for post duplication, such as limiting by user roles or categories.';
    }

    public function user_roles_field_callback() {
        $allowed_roles = get_option('DCPDUP_duplicate_user_roles', array());
        $roles = wp_roles()->roles;

        foreach ($roles as $role_slug => $role) {
            $checked = in_array($role_slug, $allowed_roles) ? 'checked' : '';
            echo '<label><input type="checkbox" name="DCPDUP_duplicate_user_roles[]" value="' . esc_attr($role_slug) . '" ' . esc_attr($checked) . '> ' . esc_html($role['name']) . '</label><br>';
        }
    }

    public function categories_field_callback() {
        $allowed_categories = get_option('DCPDUP_duplicate_categories', array());
        $categories = get_categories(array('hide_empty' => false));

        foreach ($categories as $category) {
            $checked = in_array($category->term_id, $allowed_categories) ? 'checked' : '';
            echo '<label><input type="checkbox" name="DCPDUP_duplicate_categories[]" value="' . esc_attr($category->term_id) . '" ' . esc_attr($checked) . '> ' . esc_html($category->name) . '</label><br>';
        }
    }

    // Check conditions before allowing duplication
    public function check_conditions_before_duplication() {
        $user = wp_get_current_user();
        $post_id = absint($_GET['post']);
        $post = get_post($post_id);

        // Check user roles
        $allowed_roles = get_option('DCPDUP_duplicate_user_roles', array());
        if (!array_intersect($user->roles, $allowed_roles)) {
            wp_die('You are not allowed to duplicate this post.');
        }

        // Check categories
        $allowed_categories = get_option('DCPDUP_duplicate_categories', array());
        $post_categories = wp_get_post_categories($post_id);
        if (!array_intersect($allowed_categories, $post_categories)) {
            wp_die('This post cannot be duplicated due to category restrictions.');
        }
    }
}

new DCPDUP_Conditional_Duplication();
