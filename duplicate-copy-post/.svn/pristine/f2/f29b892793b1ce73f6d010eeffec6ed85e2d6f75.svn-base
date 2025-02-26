<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Profile_Handler {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_profile_settings_page'));
        add_action('admin_init', array($this, 'register_profile_settings'));
    }

    // Add the profile settings page under the main settings menu
    public function add_profile_settings_page() {
        add_submenu_page(
            'edit.php',  // Parent slug, replace with the main plugin menu slug
            'Duplication Profiles',
            'Duplication Profiles',
            'manage_options',
            'dcp-duplication-profiles',
            array($this, 'render_profile_settings_page')
        );
    }

    // Render the profile settings page
    public function render_profile_settings_page() {
        ?>
        <div class="wrap">
            <h1>Duplication Profiles</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields('DCPDUP_profile_settings_group');
                do_settings_sections('dcp-duplication-profiles');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    // Register the duplication profile settings
    public function register_profile_settings() {
        register_setting('DCPDUP_profile_settings_group', 'DCPDUP_profile_fields', 'sanitize_text_field');
        register_setting('DCPDUP_settings_group', 'DCPDUP_duplicate_user_roles', 'sanitize_text_field');

        add_settings_section('DCPDUP_profile_section', 'Duplication Profiles', null, 'dcp-duplication-profiles');
        add_settings_field('DCPDUP_profile_name', 'Profile Name', array($this, 'profile_name_field_callback'), 'dcp-duplication-profiles', 'DCPDUP_profile_section');
        add_settings_field('DCPDUP_profile_fields', 'Fields to Duplicate', array($this, 'profile_fields_field_callback'), 'dcp-duplication-profiles', 'DCPDUP_profile_section');
    }

    // Profile Name field callback
    public function profile_name_field_callback() {
        $option = get_option('DCPDUP_profile_name');
        echo '<input type="text" name="DCPDUP_profile_name" value="' . esc_attr($option) . '" />';
    }

    // Fields to duplicate field callback
    public function profile_fields_field_callback() {
        $fields = get_option('DCPDUP_profile_fields', array());
        $available_fields = array('Content', 'Meta', 'Custom Fields');
        
        foreach ($available_fields as $field) {
            $checked = in_array($field, $fields) ? 'checked' : '';
            echo '<label><input type="checkbox" name="DCPDUP_profile_fields[]" value="' . esc_attr($field) . '" ' . esc_attr($checked) . '> ' . esc_html($field) . '</label><br>';
        }
    }
}

new DCPDUP_Profile_Handler();
