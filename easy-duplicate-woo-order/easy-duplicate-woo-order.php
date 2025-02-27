<?php
/*
Plugin Name: Easy Duplicate Woo Order
Description: Adds a custom action to duplicate WooCommerce orders easily.
Version: 2.5.0
Plugin URI: https://www.wizbeeit.com/easy-duplicate-woo-order
Author: wizbee IT
Author URI: https://www.wizbeeit.com/
Text Domain: easy-duplicate-woo-order
License: GPLv2 or later
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function wb_edwo_check_woocommerce_active() {
    if (!class_exists('WooCommerce')) {
        add_action('admin_notices', 'wb_edwo_woocommerce_inactive_notice');
        deactivate_plugins(plugin_basename(__FILE__));
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}
add_action('admin_init', 'wb_edwo_check_woocommerce_active');
function wb_edwo_woocommerce_inactive_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php esc_html_e('Easy Duplicate Woo Order requires WooCommerce to be installed and active. The plugin has been deactivated.', 'easy-duplicate-woo-order'); ?></p>
    </div>
    <?php
}
function wb_edwo_woocommerce_plugin_deactivated($plugin, $network_deactivating) {
    if ($plugin === 'woocommerce/woocommerce.php') {
        // Deactivate this plugin
        deactivate_plugins(plugin_basename(__FILE__));
        add_action('admin_notices', 'wb_edwo_woocommerce_inactive_notice');
    }
}
add_action('deactivated_plugin', 'wb_edwo_woocommerce_plugin_deactivated', 10, 2);



function wizbee_add_settings_link($links) {
    $settings_link = '<a href="admin.php?page=wc-settings&tab=wizbee_duplicate_order">' . __('Settings', 'easy-duplicate-woo-order') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wizbee_add_settings_link');

require_once plugin_dir_path(__FILE__) . 'includes/wb-duplicate-order-function.php';
require_once plugin_dir_path(__FILE__) . 'includes/show-wb-duplicate-order-option.php';
require_once plugin_dir_path(__FILE__) . 'includes/wb-duplicate-order-admin-option.php';

// Enqueue the script for redirection
function wizbee_enqueue_duplicate_order_script() {
    if (is_admin()) {
        wp_enqueue_script('wizbee-duplicate-order-script', plugin_dir_url(__FILE__) . 'assets/js/easy-duplicate-order-redirect-script.js', array('jquery'), '1.1', true);
        $redirect_order_id = get_transient('wizbee_duplicate_order_redirect');
        wp_localize_script('wizbee-duplicate-order-script', 'wizbeeOrderData', array(
            'redirectOrderId' => $redirect_order_id,
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'adminUrl' => admin_url('post.php?post='),
        ));
    }
}
add_action('admin_enqueue_scripts', 'wizbee_enqueue_duplicate_order_script');

if (isset($_GET['page']) && $_GET['page'] === 'wc-settings' && isset($_GET['tab']) && $_GET['tab'] === 'wizbee_duplicate_order') {
        // Enqueue your JavaScript file
        wp_enqueue_script('wizbee-admin-script', plugin_dir_url(__FILE__) . 'assets/js/admin-settings.js', array('jquery'), '1.1', true);
    }