<?php
/*
Plugin Name: Archisketch - 3D Interior Design Solution
Description: Archisketch is a 3D interior CRM solution that uses AR/VR item viewers, 3D floor plans, and rendered images to attract website visitors and support online business.
Version: 1.1.0
Author: Archisketch Team
Author URI: https://www.archisketch.com
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

define('ARCHISKETCH_VERSION', '0.1');
define('ARCHISKETCH_API_URL', 'https://api.archisketch.com/');
define('ARCHISKETCH_RESOURCES_URL', 'https://resources.archisketch.com/');
define('ARCHISKETCH_API_KEY', 'b98e8317eb4312ebb0190423ee4539fe');

// === Plugin Hooks ===
register_activation_hook(__FILE__, 'archisketch_get_uuid');
register_uninstall_hook(__FILE__, 'archisketch_uninstall');

// === Actions & Filters ===
add_action('admin_menu', 'archisketch_add_admin_menu');
add_action('admin_init', 'archisketch_register_settings');
add_action('admin_head', 'archisketch_add_inline_styles');
add_action('wp_enqueue_scripts', 'archisketch_enqueue_scripts');
add_action('admin_enqueue_scripts', 'archisketch_enqueue_scripts');

// === Helper Functions ===

function archisketch_get_uuid() {
    $plugin_id = 'archisketch_plugin_uuid';
    wp_cache_delete($plugin_id, 'options');

    $uuid = get_option($plugin_id);
    if (empty($uuid)) {
        $uuid = wp_generate_uuid4();
        update_option($plugin_id, $uuid);
    }

    return $uuid;
}

function archisketch_encp_aes($data) {
    $encryptedData = openssl_encrypt($data, 'AES-256-ECB', ARCHISKETCH_API_KEY, OPENSSL_RAW_DATA, '');
    return base64_encode($encryptedData);
}

function archisketch_add_admin_menu() {
    $base64_icon_path = plugin_dir_path(__FILE__) . 'assets/archisketch-logo-base64.txt';

    if (file_exists($base64_icon_path)) {
        $icon = trim(implode('', file($base64_icon_path)));
    } else {
        $icon = 'dashicons-admin-plugins';
    }

    add_menu_page(
        __('Archisketch Plugin Settings', 'archisketch-3d-interior-design-solution'),
        __('Archisketch', 'archisketch-3d-interior-design-solution'),
        'administrator',
        'archisketch-plugin-settings',
        'archisketch_render_settings_page',
        $icon,
        80
    );
}

function archisketch_register_settings() {
    register_setting(
        'archisketch-settings-group',
        'archisketch_plugin_login_url',
        array(
            'type'              => 'string',
            'sanitize_callback' => 'esc_url_raw',
            'default'           => '',
        )
    );
}

function archisketch_render_settings_page() {
    include plugin_dir_path(__FILE__) . 'templates/page-settings.php';
}

function archisketch_add_inline_styles() {
    $css_content = file_get_contents(plugin_dir_path(__FILE__) . 'assets/asp-setting-styles.css');
    
    if ($css_content !== false) {
        $css_version = filemtime(plugin_dir_path(__FILE__) . 'assets/asp-setting-styles.css');
        $escaped_css_content = wp_kses_post($css_content);

        wp_register_style('archisketch-plugin-style', false, array(), $css_version);
        wp_enqueue_style('archisketch-plugin-style');
        wp_add_inline_style('archisketch-plugin-style', $escaped_css_content);
    }
}

function archisketch_enqueue_scripts($hook) {
    $is_admin_page = is_admin() && $hook === 'toplevel_page_archisketch-plugin-settings';

    if ($is_admin_page) {
        $plugin_data_string = 'wordpress:' . round(microtime(true) * 1000);
        $plugin_encrypted_key = archisketch_encp_aes($plugin_data_string);

        wp_register_script('asp-setting-script', plugin_dir_url(__FILE__) . 'assets/asp-setting-script.js', array(), '1.0.0', true);
        wp_localize_script('asp-setting-script', 'common_asp_data', array(
            'wuid' => esc_js(get_option('archisketch_plugin_uuid')),
            'apiUrl' => esc_js(ARCHISKETCH_API_URL),
            'encryptedKey' => $plugin_encrypted_key,
        ));
        wp_enqueue_script('asp-setting-script');
    }

    if (!is_admin()) {
        wp_register_script('module-script', ARCHISKETCH_RESOURCES_URL . 'connect/wordpress-plugin.min.js?ver=' . time(), array(), '1.0.0', true);
        wp_localize_script('module-script', 'currentUser', array(
            'user_id' => wp_get_current_user()->user_login,
            'user_email' => wp_get_current_user()->user_email,
            'user_nickname' => wp_get_current_user()->display_name,
            'admin' => current_user_can('administrator'),
            'identifier' => wp_kses_post(get_option('archisketch_plugin_uuid')),
            'login_url' => wp_kses_post(get_option('archisketch_plugin_login_url')),
        ));
        wp_enqueue_script('module-script');
    }
}

function archisketch_uninstall() {
    $identifier = get_option('archisketch_plugin_uuid');

    if ($identifier) {
        $get_plugin_url = ARCHISKETCH_API_URL . "v1/connect/plugins?identifier={$identifier}";
        $plugin_data_string = 'wordpress:' . round(microtime(true) * 1000);
        $plugin_encrypted_data = archisketch_encp_aes($plugin_data_string);
        $get_response = wp_remote_get($get_plugin_url, array(
            'headers' => array(
                'Content-Type' => 'application/json',
                'X-CONNECT-CHECK' => $plugin_encrypted_data,
            ),
        ));

        $plugin_data = wp_remote_retrieve_body($get_response);
        function formatPluginData($plugin_data) {
            $plugin_data = json_decode($plugin_data, true);
            return $plugin_data['channel']['secret'] . ':' . $plugin_data['plugin']['key'] . ':' . round(microtime(true) * 1000);
        }

        $formatted_string = formatPluginData($plugin_data);
        $channel_encrypted_data = archisketch_encp_aes($formatted_string);
        $delete_url = ARCHISKETCH_API_URL . "v1/connect/channels/{$identifier}?type=wordpress";
        $delete_response = wp_remote_request($delete_url, array(
            'method' => 'DELETE',
            'headers' => array(
                'Content-Type' => 'application/json',
                'X-CONNECT-CHECK' => $channel_encrypted_data,
            ),
        ));
    }

    delete_option('archisketch_plugin_uuid');
    delete_option('archisketch_plugin_login_url');
}
