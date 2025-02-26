<?php defined('ABSPATH') or die();

class WL_AGM_LITE_Menu {
    /* Add menu */
    public static function create_menu() {
        $dashboard = add_menu_page(esc_html__('IS-Google Maps Lite', WL_AGM_LITE_DOMAIN), esc_html__('IS-Google Maps Lite', WL_AGM_LITE_DOMAIN), 'manage_options', 'advance-google-map-lite-wl', array(
            'WL_AGM_LITE_Menu',
            'dashboard'
        ), 'dashicons-admin-site', 25);
        add_action('admin_print_styles-' . $dashboard, array('WL_AGM_LITE_Menu', 'dashboard_assets'));

        /* Dashboard submenu */
        $dashboard_submenu = add_submenu_page('advance-google-map-lite-wl', esc_html__('IS-Google Maps Lite', WL_AGM_LITE_DOMAIN), esc_html__('Dashboard', WL_AGM_LITE_DOMAIN), 'manage_options', 'advance-google-map-lite-wl', array(
            'WL_AGM_LITE_Menu',
            'dashboard'
        ));
        add_action('admin_print_styles-' . $dashboard_submenu, array('WL_AGM_LITE_Menu', 'dashboard_assets'));

        $add_location = add_submenu_page('advance-google-map-lite-wl', esc_html__('Locations', WL_AGM_LITE_DOMAIN), esc_html__('Location', WL_AGM_LITE_DOMAIN), 'edit_posts', 'edit.php?post_type=wl_agm_locations');
        add_action('admin_print_styles-' . $add_location, array('WL_AGM_LITE_Menu', 'settings_assets'));

        add_submenu_page('advance-google-map-lite-wl', esc_html__('Maps', WL_AGM_LITE_DOMAIN), esc_html__('Map', WL_AGM_LITE_DOMAIN), 'edit_posts', 'edit.php?post_type=wl_agm_maps');

        add_submenu_page('advance-google-map-lite-wl', esc_html__('Routes', WL_AGM_LITE_DOMAIN), esc_html__('Route', WL_AGM_LITE_DOMAIN), 'edit_posts', 'edit.php?post_type=wl_agm_routes');

        add_submenu_page('advance-google-map-lite-wl', esc_html__('Interactive Maps', WL_AGM_LITE_DOMAIN), esc_html__('Interactive Map', WL_AGM_LITE_DOMAIN), 'edit_posts', 'edit.php?post_type=wl_agm_inter_maps');

        /* Settings submenu */
        $settings = add_submenu_page('advance-google-map-lite-wl', esc_html__('Settings', WL_AGM_LITE_DOMAIN), esc_html__('Settings', WL_AGM_LITE_DOMAIN), 'manage_options', 'advance-google-map-lite-wl-settings', array(
            'WL_AGM_LITE_Menu',
            'settings'
        ));
        add_action('admin_print_styles-' . $settings, array('WL_AGM_LITE_Menu', 'settings_assets'));

        /* Help submenu */
        $help = add_submenu_page('advance-google-map-lite-wl', esc_html__('Configure Plugin', WL_AGM_LITE_DOMAIN), esc_html__('Configure Plugin', WL_AGM_LITE_DOMAIN), 'manage_options', 'advance-google-map-lite-wl-help', array(
            'WL_AGM_LITE_Menu',
            'help'
        ));
        add_action('admin_print_styles-' . $help, array('WL_AGM_LITE_Menu', 'help_assets'));

        
    }

    /* Dashboard menu/submenu callback */
    public static function dashboard() {
        require_once('inc/wl_agm_lite_dashboard.php');
    }

    public static function recommendation() {
        wp_enqueue_style('wl-agm-recom', WL_AGM_LITE_PLUGIN_URL . 'admin/css/recom.css');
        //require_once('inc/wl_agm_recommendation.php');
    }

    /* Dashboard menu/submenu assets */
    public static function dashboard_assets() {
        self::enqueue_libraries();
        self::enqueue_custom_assets();
    }

    /* Settings menu callback */
    public static function settings() {
        require_once('inc/wl_agm-lite_settings.php');
    }

    /* Settings menu assets */
    public static function settings_assets() {
        self::enqueue_libraries();
        self::enqueue_custom_assets();
    }

    /* help menu callback */
    public static function help() {
        require_once('inc/wl_agm-lite_help.php');
    }

    /* help menu assets */
    public static function help_assets() {
        self::enqueue_libraries();
        self::enqueue_custom_assets();
    }

    /* Enqueue third party libraties */
    public static function enqueue_libraries() {
        wp_enqueue_script('jquery');
        /* Enqueue styles */
        wp_register_style('bootstrap', WL_AGM_LITE_PLUGIN_URL . 'assets/css/bootstrap.min.css');
        wp_enqueue_style('bootstrap');
        wp_register_style('font-awesome', WL_AGM_LITE_PLUGIN_URL . 'assets/css/all.min.css');
        wp_enqueue_style('font-awesome');
        wp_enqueue_style('bootstrap-select', WL_AGM_LITE_PLUGIN_URL . 'assets/css/bootstrap-select.min.css');
        wp_register_style('toastr', WL_AGM_LITE_PLUGIN_URL . 'assets/css/toastr.min.css');
        wp_enqueue_style('toastr');
        wp_register_style('jquery-confirm', WL_AGM_LITE_PLUGIN_URL . 'admin/css/jquery-confirm.min.css');
        wp_enqueue_style('jquery-confirm');

        /* Enqueue scripts */
        wp_enqueue_script('jquery-form');
        wp_register_script('popper', WL_AGM_LITE_PLUGIN_URL . 'assets/js/popper.min.js', array('jquery'), true, true);
        wp_enqueue_script('popper');
        wp_register_script('bootstrap', WL_AGM_LITE_PLUGIN_URL . 'assets/js/bootstrap.min.js', array('jquery'), true, true);
        wp_enqueue_script('bootstrap');
        wp_register_script('bootstrap-select', WL_AGM_LITE_PLUGIN_URL . 'assets/js/bootstrap-select.min.js', array('bootstrap'), true, true);
        wp_enqueue_script('bootstrap-select');
        wp_register_script('toastr', WL_AGM_LITE_PLUGIN_URL . 'assets/js/toastr.min.js', array('jquery'), true, true);
        wp_enqueue_script('toastr');
        wp_register_script('jquery-confirm', WL_AGM_LITE_PLUGIN_URL . 'admin/js/jquery-confirm.min.js', array('jquery'), true, true);
        wp_enqueue_script('jquery-confirm');
    }

    /* Enqueue custom assets */
    public static function enqueue_custom_assets() {
        wp_enqueue_script('jquery');

        /* Enqueue styles */
        wp_enqueue_style('wl-agm-style', WL_AGM_LITE_PLUGIN_URL . '/admin/css/wl-agm-style.css');

        /* Enqueue scripts */
        wp_enqueue_script('wl-agm-lite-ajax-js', WL_AGM_LITE_PLUGIN_URL . 'admin/js/wl-agm-lite-ajax.js', array('jquery'), true, true);
    }
}
