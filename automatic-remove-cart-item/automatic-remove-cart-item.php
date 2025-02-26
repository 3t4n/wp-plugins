<?php

/* Plugin Name: Automatic Remove Cart Item
* Requires Plugins: woocommerce
 * Description: Automatic Remove Cart Item is a plugin that automatically
 removes cart items after a specified time limit. This plugin requires the WooCommerce plugin to work.
 * Plugin URI: https://wordpress.org/plugins/automatic-remove-cart-item
 * Author: Galaxy Weblinks
 * Author URI: https://www.galaxyweblinks.com
 * Version: 1.1
 * Text Domain: automatic-remove-cart-item
 * License:GPL2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/* Define plugin path and url */
define('Auto_Remove_Cart_Item_URL', plugin_dir_url(__FILE__));
define('Auto_Remove_Cart_Item_PATH', plugin_dir_path(__FILE__));

require_once(ABSPATH . 'wp-admin/includes/plugin.php');

/* Plugin activation hook */
if (! function_exists('auto_remove_cart_item_activate')) {
    function auto_remove_cart_item_activate()
    {
        add_option('auto_remove_cart_item_settings_redirect', true);
        // Require WooCommerce plugin
        if (! is_plugin_active('woocommerce/woocommerce.php') and current_user_can('activate_plugins')) {
            // Stop activation redirect and show error
            wp_die('Sorry, this plugin requires the WooCommerce Plugin to be installed and active. <br><a href="' . esc_url(admin_url('plugins.php')) . '">&laquo; Return to Plugins', 'automatic-remove-cart-item');
        }
    }
}
register_activation_hook(__FILE__, 'auto_remove_cart_item_activate');

/* Plugin redirect page */
if (! function_exists('auto_remove_cart_item_settings_redirect')) {
    function auto_remove_cart_item_settings_redirect()
    {
        if (get_option('auto_remove_cart_item_settings_redirect', false)) {
            delete_option('auto_remove_cart_item_settings_redirect');
            wp_redirect("admin.php?page=wc-settings");
            exit;
        }
    }
}
add_action('admin_init', 'auto_remove_cart_item_settings_redirect');

/* Plugin uninstall hook */
if (! function_exists('auto_remove_cart_item_uninstall')) {
    function auto_remove_cart_item_uninstall()
    {
        if (file_exists(Auto_Remove_Cart_Item_PATH . 'includes/automatic-remove-cart-item-uninstall.php')) {
            require_once(Auto_Remove_Cart_Item_PATH . 'includes/automatic-remove-cart-item-uninstall.php');
        }
    }
}
register_uninstall_hook(__FILE__, 'auto_remove_cart_item_uninstall');

/* Check plugin functions file exists */
if (file_exists(Auto_Remove_Cart_Item_PATH . 'includes/automatic-remove-cart-item-functions.php')) {
    require_once(Auto_Remove_Cart_Item_PATH . 'includes/automatic-remove-cart-item-functions.php');
}

/*  Plugin Setting Link */
if (! function_exists('auto_remove_cart_item_settings_link')) {
    function auto_remove_cart_item_settings_link($links_array, $auto_remove_cart_item_link)
    {
        if (strpos($auto_remove_cart_item_link, basename(__FILE__))) {
            array_unshift($links_array, '<a href="' . esc_url('admin.php?page=wc-settings') . '">' . __("Settings", "automatic-remove-cart-item") . '</a>');
        }
        return $links_array;
    }
}
add_filter('plugin_action_links', 'auto_remove_cart_item_settings_link', 10, 2);

/*
 *  Admin Notice for WooCommerce plugin if not active
 */
if (! function_exists('auto_remove_cart_item_notice_plugin')) {
    function auto_remove_cart_item_notice_plugin()
    {
        if (!is_plugin_active('woocommerce/woocommerce.php')) {
            // Require WooCommerce Plugin
            ?>
        <div class="error"><p><?php esc_html_e("Automatic Remove Cart Item plugin is enabled but not effective. It requires the ", "automatic-remove-cart-item"); ?><strong><a href="https://wordpress.org/plugins/woocommerce/" target="_blank"><?php esc_html_e("WooCommerce plugin", "automatic-remove-cart-item"); ?></a></strong> <?php esc_html_e("to work.", "automatic-remove-cart-item"); ?></p></div>
                    <?php
        }
    }
}
add_action('admin_notices', 'auto_remove_cart_item_notice_plugin');


/* Enqueue JavaScript to handle dropdown change */
if (! function_exists('auto_remove_cart_item_time_interval_script')) {
    function auto_remove_cart_item_time_interval_script()
    {

        /* Retrieve the nonce */
        $auto_remove_cart_item_custom_nonce = sanitize_text_field(wp_unslash(get_option('auto_remove_cart_item_custom_nonce')));
        $nonce = isset($auto_remove_cart_item_custom_nonce) ? $auto_remove_cart_item_custom_nonce : '';

        /*  Ensure the script is only loaded on WooCommerce settings page */
        if (isset($_GET['page']) && wp_verify_nonce(sanitize_text_field(wp_unslash($nonce)), 'save_general_settings_nonce') && $_GET['page'] === 'wc-settings') {
              wp_enqueue_script('auto-remove-cart-item-script', Auto_Remove_Cart_Item_URL . 'assets/js/custom.js', array('jquery'), '1.0', true);
        }
    }
}

add_action('admin_enqueue_scripts', 'auto_remove_cart_item_time_interval_script');

/* Ensure the nonce is created only after the admin environment has loaded. */
function auto_remove_cart_item_create_nonce()
{
    // Generate a custom nonce
    $nonce = wp_create_nonce('save_general_settings_nonce');
    // Store the nonce in the database
    update_option('auto_remove_cart_item_custom_nonce', sanitize_text_field(wp_unslash($nonce)));
}
add_action('admin_init', 'auto_remove_cart_item_create_nonce');

/**
 * You can use these filters to add custom links to your plugin row in the plugin list.
 * @param $links, $file
 * @return $links [array]
 * @since 1.1
 */
if (! function_exists('auto_remove_cart_item_add_custom_plugin_links')) {
    function auto_remove_cart_item_add_custom_plugin_links($links, $file)
    {
        if (!isset($plugin)){
            $plugin = plugin_basename(__FILE__);
        }
  
        if ($plugin == $file) {
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/automatic-remove-cart-item/doc/" target="_blank">Documentation</a>';
            $links[] = '<a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Contact Support</a>';
        }
        return $links;
    }
  }
  add_filter('plugin_row_meta', 'auto_remove_cart_item_add_custom_plugin_links', 10, 2);