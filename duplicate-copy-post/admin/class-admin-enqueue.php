<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class DCPDUP_Admin_Enqueue {

    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
    }

    // Enqueue admin CSS and JS only for the plugin's pages
    public function enqueue_admin_assets($hook) {
        // Check if we are on the plugin settings page
        if ($hook != 'toplevel_page_dcp-main-menu') {
            return; // Only enqueue if on the right page
        }

        // Correct path for CSS and JS if assets folder is outside the admin folder
        wp_enqueue_style('dcpdpu-admin-style', plugin_dir_url(__FILE__) . '../assets/css/admin-style.css', array(), DCPDUP_VERSION);
        
        wp_enqueue_script('dcpdpu-admin-script', plugin_dir_url(__FILE__) . '../assets/js/admin-script.js', array('jquery'), DCPDUP_VERSION, true);
    }
}

new DCPDUP_Admin_Enqueue();
