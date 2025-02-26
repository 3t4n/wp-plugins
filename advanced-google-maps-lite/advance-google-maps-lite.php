<?php
/*
Plugin Name: IS-Google Maps Lite
Plugin URI:  https://wordpress.org/plugins/advanced-google-maps-lite/
Description: The easiest plugin to use Google Maps! Create custom Google Maps with high quality and accuracy markers containing locations, descriptions, images and links. Add your customized map to your WordPress posts and/or pages quickly and easily with the supplied shortcode.
Author: vibhorp
Author URI: https://infigosoftware.in/
Version: 1.2.8
Text Domain: WL_AGM_LITE
Domain Path: /lang/
*/

defined('ABSPATH') or die();

if (!defined('WL_AGM_LITE_DOMAIN')) {
    define('WL_AGM_LITE_DOMAIN', 'WL_AGM_LITE');
}

if (!defined('WL_AGM_LITE_PLUGIN_URL')) {
    define('WL_AGM_LITE_PLUGIN_URL', plugin_dir_url(__FILE__));
}

if (!defined('WL_AGM_LITE_PLUGIN_DIR_PATH')) {
    define('WL_AGM_LITE_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
}

if (!defined('WL_AGM_LITE_PLUGIN_BASENAME')) {
    define('WL_AGM_LITE_PLUGIN_BASENAME', plugin_basename(__FILE__));
}

if (!defined('WL_AGM_LITE_PLUGIN_FILE')) {
    define('WL_AGM_LITE_PLUGIN_FILE', __FILE__);
}

final class WL_AGM_Lite_GoogleMaps {
    private static $instance = null;

    private function __construct() {
        $this->initialize_hooks();
        $this->setup_init();
    }

    public static function get_instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function initialize_hooks() {
        if (is_admin()) {
            require_once('admin/admin.php');
        }
        require_once('public/public.php');
    }

    private function setup_init() {
        require_once('admin/WL_AGM_LITE_INIT.php');
        register_activation_hook(__FILE__, array('WL_AGM_LITE_INIT', 'wl_agm_lite_activation_hook'));
    }
}

WL_AGM_Lite_GoogleMaps::get_instance();

add_action("admin_notices", "review_admin_notice_agm_location_free");
function review_admin_notice_agm_location_free() {
    global $pagenow;
    
    $agml_screen = get_current_screen();
    if ($pagenow == 'edit.php' && $agml_screen->post_type == "wl_agm_locations") {
        include('agmap_pro_banner.php');
    }

    $agmm_screen = get_current_screen();
    if ($pagenow == 'edit.php' && $agmm_screen->post_type == "wl_agm_maps") {
        include('agmap_pro_banner.php');
    }
    
    $agmr_screen = get_current_screen();
    if ($pagenow == 'edit.php' && $agmr_screen->post_type == "wl_agm_routes") {
        include('agmap_pro_banner.php');
    }
    
    $agmim_screen = get_current_screen();
    if ($pagenow == 'edit.php' && $agmim_screen->post_type == "wl_agm_inter_maps") {
        include('agmap_pro_banner.php');
    }
}