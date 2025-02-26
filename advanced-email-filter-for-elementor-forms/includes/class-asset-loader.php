<?php
namespace AEFE;

if (!defined('ABSPATH')) {
    exit;
}

class Asset_Loader {
    public function __construct() {
        // Elementor Editor CSS
        add_action('elementor/editor/after_enqueue_styles', [$this, 'enqueue_editor_styles']);
        
        // Admin CSS/JS (both option page and Elementor editor)
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
    }

    public function enqueue_editor_styles() {
        wp_enqueue_style(
            'aefe-editor-css',
            AEFE_PLUGIN_URL . 'assets/css/admin-styles.css',
            [],
            AEFE_PLUGIN_VERSION
        );
    }

    public function enqueue_admin_assets($hook) {
        // Only load on our option page
        if ($hook === 'toplevel_page_aefe-settings') {
            // CSS
            wp_enqueue_style(
                'aefe-admin-css',
                AEFE_PLUGIN_URL . 'assets/css/admin-styles.css',
                [],
                AEFE_PLUGIN_VERSION
            );
        }
    }
}