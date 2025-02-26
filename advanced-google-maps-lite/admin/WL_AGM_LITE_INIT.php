<?php
defined('ABSPATH') or die();
require_once(WL_AGM_LITE_PLUGIN_DIR_PATH . 'admin/inc/helpers/WL_AGM_LITE_Map_Regions.php');

class WL_AGM_LITE_INIT {
    /* Redirect to settings page after activation  */
    public static function wl_agm_lite_activation_hook() {
        add_option('wl_agm_redirect', true);
    }

    public static function wl_agm_lite_activation_redirect() {
        if (get_option('wl_agm_redirect', false)) {
            delete_option('wl_agm_redirect');
            if (!isset($_GET['activate-multi'])) {
                wp_redirect("admin.php?page=advance-google-map-lite-wl-help");
            }
        }
    }

    /* Add settings link on plugin page */
    public static function wl_agm_lite_links($links) {
        $wl_agm_pro_link = '<a href="#" target="_blank" style="font-weight:700; color:#e35400">' . esc_html__('Go Pro', WL_AGM_LITE_DOMAIN) . '</a>';
        $wl_agm_settings_link = '<a href="admin.php?page=advance-google-map-lite-wl-settings">' . esc_html__('Settings', WL_AGM_LITE_DOMAIN) . '</a>';
        array_unshift($links, $wl_agm_pro_link, $wl_agm_settings_link);

        return $links;
    }

    /* action call for Sub-conrinents in wl_agm_region_ajax.js */
    public static function wl_agm_ajax_lite_region_action() {
        check_ajax_referer('region_ajax_nonce', 'nounce');

        if (isset($_POST['val'])) {
            $val      = sanitize_text_field($_POST['val']);
            $data_arr = array();
            $tree     = WL_AGM_LITE_Map_Regions::get_tree();
            foreach ($tree as $row) {
                if ($row[0] == $val) {
                    $data_arr[$row[1]] = $row[2];
                }
            }
            wp_send_json($data_arr);
        }
        wp_die();
    }

    /* action call for Countries in wl_agm_region_ajax.js */
    public static function wl_agm_lite_ajax_country_action() {
        check_ajax_referer('region_ajax_nonce', 'nounce');

        if (isset($_POST['val'])) {
            $val      = sanitize_text_field($_POST['val']);
            $data_arr = array();
            $tree     = WL_AGM_LITE_Map_Regions::get_tree();
            foreach ($tree as $row) {
                if ($row[0] == $val) {
                    $data_arr[$row[1]] = $row[2];
                }
            }
            wp_send_json($data_arr);
        }
        wp_die();
    }
}
