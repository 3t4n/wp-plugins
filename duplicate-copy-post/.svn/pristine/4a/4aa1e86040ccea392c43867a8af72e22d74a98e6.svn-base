<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Admin_Menu {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_admin_menu'));
    }

    // Create the main menu and submenus
    public function add_admin_menu() {
        add_menu_page(
            'Duplicate Copy Post',        // Page title
            'Duplicate Copy Post',        // Menu title
            'manage_options',             // Capability
            'dcpdup-main-menu',           // Menu slug (updated to dcpdup)
            array($this, 'render_settings_page'), // Function to render page
            'dashicons-admin-page',       // Icon
            5                             // Menu position, top of sidebar
        );
    }

    // Render the settings page with a "Coming Soon" message and tabs
    public function render_settings_page() {
        // Default tab with sanitization
        $current_tab = isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'general';
        ?>
        <div class="wrap dcpdup-settings-page">
            <div class="dcpdup-admin-container">
                <h1><?php esc_html_e('Duplicate Copy Post Settings', 'duplicate-copy-post'); ?></h1>
                
                <!-- Coming Soon Message -->
                <div class="notice notice-warning">
                    <p><?php esc_html_e('The settings for this plugin are coming soon in a future update.', 'duplicate-copy-post'); ?></p>
                </div>

                <h2 class="nav-tab-wrapper">
                    <a href="?page=dcpdup-main-menu&tab=general" class="nav-tab <?php echo esc_attr($this->get_active_tab('general', $current_tab)); ?>">
                        <?php esc_html_e('General Settings', 'duplicate-copy-post'); ?>
                    </a>
                    <a href="?page=dcpdup-main-menu&tab=profiles" class="nav-tab <?php echo esc_attr($this->get_active_tab('profiles', $current_tab)); ?>">
                        <?php esc_html_e('Duplication Profiles', 'duplicate-copy-post'); ?>
                    </a>
                    <a href="?page=dcpdup-main-menu&tab=advanced" class="nav-tab <?php echo esc_attr($this->get_active_tab('advanced', $current_tab)); ?>">
                        <?php esc_html_e('Advanced Settings', 'duplicate-copy-post'); ?>
                    </a>
                </h2>

                <div class="dcpdup-settings-tab-content">
                    <?php $this->render_tab_content($current_tab); ?>
                </div>
            </div>
        </div>
        <?php
    }

    // Get active tab class
    private function get_active_tab($tab, $current_tab) {
        return $tab === $current_tab ? 'nav-tab-active' : '';
    }

    // Render the tab content
    private function render_tab_content($current_tab) {
        switch ($current_tab) {
            case 'profiles':
                echo '<p>' . esc_html__('Profiles feature is coming soon in a future update!', 'duplicate-copy-post') . '</p>';
                break;
            case 'advanced':
                echo '<p>' . esc_html__('Advanced settings are coming soon in a future update!', 'duplicate-copy-post') . '</p>';
                break;
            default:
                include plugin_dir_path(__FILE__) . 'views/general-tab.php';
                break;
        }
    }
}

new DCPDUP_Admin_Menu();
