<?php

if (!defined('ABSPATH')) { die(); }

class PageLoaderAdmin {

    public function __construct() {
        add_action('admin_enqueue_scripts', array($this, 'admin_include_files'));
        add_action('admin_menu', array($this, 'page_loader_menu'));
        add_action('admin_init', array($this, 'register_page_loader_settings'));
    }

    // Enqueueing Scripts and Styles for admin
    public function admin_include_files() {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('pl-admin-script', plugins_url('assets/js/admin.js', __FILE__), array('jquery', 'wp-color-picker'), false, true);
        wp_enqueue_style('pl-style', plugins_url('assets/css/style.css', __FILE__));
    }

    // Adding Options Page
    public function page_loader_menu() {
        add_options_page(__('Page Loader', 'page-loader'), __('Page Loader Setting', 'page-loader'), 'manage_options', 'page-loader-setting', array($this, 'page_loader_admin'));
    }
    
    // Options Page Content
    public function page_loader_admin() {
        include(plugin_dir_path(__FILE__) . 'form.php');
    }

    // Registering Settings
    public function register_page_loader_settings() {
        register_setting('page-loader-options', 'icon_color');
        register_setting('page-loader-options', 'background_color');
        register_setting('page-loader-options', 'loader_icon');
    }
}

// Instantiate the admin class
$page_loader_admin = new PageLoaderAdmin();