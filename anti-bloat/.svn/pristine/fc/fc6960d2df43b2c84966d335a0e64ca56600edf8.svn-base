<?php
class AntiBloatPlugin {
    public function __construct() {
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_bar_menu', array($this, 'add_admin_bar_menu'), 999);
        add_action('admin_head', array($this, 'custom_css'));
    }

    public function register_settings() {
        register_setting('anti-bloat-settings', 'anti_bloat_options', array($this, 'sanitize_options'));
        add_settings_section('anti-bloat-disable-section', '', array($this, 'disable_section_callback'), 'anti-bloat');
        add_settings_field('disable-all-bloat', 'Disable All Bloats in WordPress', array($this, 'render_checkbox'), 'anti-bloat', 'anti-bloat-disable-section', array('disable-all-bloat', 'Enable'));
    }

    public function render_checkbox($args) {
        $options = get_option('anti_bloat_options');
        $key = $args[0];
        $label = $args[1];
        $checked = isset($options[$key]) && $options[$key] == 1 ? 'checked' : '';
        echo '<label><input type="checkbox" name="anti_bloat_options[' . esc_attr($key) . ']" value="1" ' . $checked . '> ' . esc_html($label) . '</label>';
    }

    public function add_admin_menu() {
        add_menu_page(
            'Anti-Bloat Settings',
            'Anti-Bloat',
            'manage_options',
            'anti-bloat-settings',
            array($this, 'settings_page'),
            'dashicons-shield'
        );
    }

    public function settings_page() {
        include(plugin_dir_path(__FILE__) . 'class-anti-bloat-settings.php');
    }

    public function sanitize_options($input) {
        return $input;
    }

    public function disable_section_callback() {
        echo '<p>Here you can Disable all the bloats including warnings, errors, notices, WooCommerce messages, and others once! Specifically Intended for Developers &#128526;</p>';
    }

    public function add_admin_bar_menu($wp_admin_bar) {
        $options = get_option('anti_bloat_options');
        $disableAllBloat = isset($options['disable-all-bloat']) && $options['disable-all-bloat'] == 1;
    
        if ($disableAllBloat) {
            // Change the background color to red
            $wp_admin_bar->add_menu(array(
                'id' => 'anti-bloat-settings',
                'title' => 'Anti-Bloat',
                'parent' => 'top-secondary',
                'meta' => array('class' => 'anti-bloat-top-menu'),
                'href' => admin_url('options-general.php?page=anti-bloat-settings'),
            ));
        } else {
            // Hide the admin top bar menu
            $wp_admin_bar->remove_menu('anti-bloat-settings');
        }
    }
    

    public function custom_css() {
        $options = get_option('anti_bloat_options');
        if (isset($options['disable-all-bloat']) && $options['disable-all-bloat'] == 1) {
            echo '<style>.woocommerce-message,.notice-success,.updated,.notice-error,.error,.notice-warning,.update-nag,.notice-info,.notice,.info{display:none!important;}</style>';
            remove_all_actions('user_admin_notices');
            remove_all_actions('admin_notices');
        }
    }
}
