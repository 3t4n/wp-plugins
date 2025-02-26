<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Duplicate_Settings {

    public function __construct() {
        add_action('admin_init', array($this, 'register_duplicate_settings'));
    }

    // Register settings for what fields to duplicate
    public function register_duplicate_settings() {
        register_setting('DCPDUP_settings_group', 'DCPDUP_duplicate_content', 'sanitize_text_field');
        register_setting('DCPDUP_settings_group', 'DCPDUP_duplicate_custom_fields', 'sanitize_text_field');
        register_setting('DCPDUP_settings_group', 'DCPDUP_duplicate_meta', 'sanitize_text_field');

        add_settings_section('DCPDUP_settings_section', 'Duplicate Settings', array($this, 'settings_section_callback'), 'duplicate-settings');
        add_settings_field('DCPDUP_duplicate_content', 'Duplicate Content', array($this, 'content_field_callback'), 'duplicate-settings', 'DCPDUP_settings_section');
        add_settings_field('DCPDUP_duplicate_meta', 'Duplicate Meta Data', array($this, 'meta_field_callback'), 'duplicate-settings', 'DCPDUP_settings_section');
        add_settings_field('DCPDUP_duplicate_custom_fields', 'Duplicate Custom Fields', array($this, 'custom_fields_callback'), 'duplicate-settings', 'DCPDUP_settings_section');
    }

    public function settings_section_callback() {
        echo 'Choose what should be duplicated when you copy a post.';
    }

    public function content_field_callback() {
        $option = get_option('DCPDUP_duplicate_content');
        echo '<input type="checkbox" name="DCPDUP_duplicate_content" value="1"' . checked(1, $option, false) . '> Duplicate Post Content';
    }

    public function meta_field_callback() {
        $option = get_option('DCPDUP_duplicate_meta');
        echo '<input type="checkbox" name="DCPDUP_duplicate_meta" value="1"' . checked(1, $option, false) . '> Duplicate Meta Data';
    }

    public function custom_fields_callback() {
        $option = get_option('DCPDUP_duplicate_custom_fields');
        echo '<input type="checkbox" name="DCPDUP_duplicate_custom_fields" value="1"' . checked(1, $option, false) . '> Duplicate Custom Fields';
    }
}

new DCPDUP_Duplicate_Settings();
