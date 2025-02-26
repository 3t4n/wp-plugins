<?php
/*
 *Plugin Name: ARViewz
 *Description: The ARViewz plugin enhances product pages by enabling the display of 3D models using iframes. With this plugin, website owners can effortlessly integrate immersive 3D models into their product pages, providing visitors with an engaging and interactive shopping experience.
 *Version: 1.1.2
 *Author: arviewz
 *Author URI: https://arviewz.com/
 *License:GPL2
 *License URI:https://www.gnu.org/licenses/gpl-2.0.html
 *Text Domain:arviewz
 * Requires PHP:7.4
 *Requires at least: 6.0
 *Tested up to: 6.6
 * Requires Plugins: woocommerce
*/

//if file is accessed directly it aborts.
if (!defined('WPINC')) {
    die("You are not allowed to access this page.");
}
if (!defined('ARVIEWZ_PLUGIN_VERSION')) {
    define('ARVIEWZ_PLUGIN_VERSION', '1.1.2');
}

if (!defined('ARVIEWZ_PLUGIN_DIR')) {
    define('ARVIEWZ_PLUGIN_DIR', plugin_dir_path(__FILE__));
}
if (!defined('ARVIEWZ_PLUGIN_URL')) {
    define('ARVIEWZ_PLUGIN_URL', plugin_dir_url(__FILE__));
}
if (!defined('ARVIEWZ_URL')) {
    define('ARVIEWZ_URL', 'https://portal.arviewz.com/');
}
if (!defined('ARVIEWZ_GET_PRODUCTS_URL')) {
    define('ARVIEWZ_GET_PRODUCTS_URL', 'https://portal.arviewz.com/api/admin/get-arviewz-products/');
}

if (!function_exists('arviewz_woocommerce_active')) {
    function arviewz_woocommerce_active()
    {
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        return is_plugin_active('woocommerce/woocommerce.php');
    }
}

if (!function_exists('arviewz_woocommerce_inactive_notice')) {
    function arviewz_woocommerce_inactive_notice()
    {
        if (!arviewz_woocommerce_active()) {
            ?>
            <div class="error">
                <p><?php esc_html_e('ARViewz requires WooCommerce plugin to be installed and active.', 'arviewz'); ?></p>
            </div>
            <?php
        }
    }
    add_action('admin_notices', 'arviewz_woocommerce_inactive_notice');
}

if (!function_exists('arviewz_check_woocommerce_dependency')) {
    function arviewz_check_woocommerce_dependency()
    {
        if (!arviewz_woocommerce_active()) {
            deactivate_plugins(plugin_basename(__FILE__));
            add_action('admin_notices', 'arviewz_woocommerce_inactive_notice');
            if (isset($_GET['activate'])) {
                unset($_GET['activate']); 
            }
        }
    }
    add_action('admin_init', 'arviewz_check_woocommerce_dependency');
}
// add  css file
if (!function_exists('arviewz_plugin_styles')) {
    function arviewz_plugin_styles()
    {
        wp_enqueue_style('plugin-style', ARVIEWZ_PLUGIN_URL . 'assets/css/style.css', array(), ARVIEWZ_PLUGIN_VERSION);
    }
    add_action('admin_enqueue_scripts', 'arviewz_plugin_styles', 999);
}
// Register and enqueue front-end styles and scripts
if (!function_exists('arviewz_plugin_scripts')) {
    function arviewz_plugin_scripts()
    {
        if (class_exists('WooCommerce') && (is_product() || is_shop())) {
            // Register and enqueue front-end styles
            wp_register_style('arviewz-front-style', ARVIEWZ_PLUGIN_URL . 'assets/css/styles.css', array(), ARVIEWZ_PLUGIN_VERSION);
            wp_enqueue_style('arviewz-front-style');
            
            // Register and enqueue front-end script
            wp_register_script('arviewz-front-script', ARVIEWZ_PLUGIN_URL . 'assets/js/modelapi.js', array('jquery'), ARVIEWZ_PLUGIN_VERSION, true);
            wp_enqueue_script('arviewz-front-script');
            
            // Localize front-end script
            wp_localize_script('arviewz-front-script', 'pluginData', array(
                'baseUrl' => ARVIEWZ_PLUGIN_URL,
            ));
        }
    }
    add_action('wp_enqueue_scripts', 'arviewz_plugin_scripts');
}

// Register and enqueue admin styles and scripts
if (!function_exists('arviewz_admin_scripts')) {
    function arviewz_admin_scripts()
    {
        // Register and enqueue admin-specific styles
        wp_register_style('arviewz-admin-style', ARVIEWZ_PLUGIN_URL . 'assets/css/admin-styles.css', array(), ARVIEWZ_PLUGIN_VERSION);
        wp_enqueue_style('arviewz-admin-style');

        // Register and enqueue Select2 styles and script
        wp_register_style('arviewz-select2-css', ARVIEWZ_PLUGIN_URL . 'assets/css/select.full.css', array(), ARVIEWZ_PLUGIN_VERSION);
        wp_enqueue_style('arviewz-select2-css');
        
        wp_register_script('arviewz-select2-js', ARVIEWZ_PLUGIN_URL . 'assets/js/select.full.js', array('jquery'), ARVIEWZ_PLUGIN_VERSION, true);
        wp_enqueue_script('arviewz-select2-js');
        
        // Initialize Select2 inline script
        wp_add_inline_script('arviewz-select2-js', 'jQuery(document).ready(function($) { $(".arviewz-select2").select2(); });');
        
        // Localize Select2 script
        wp_localize_script('arviewz-select2-js', 'pluginData', array(
            'baseUrl' => ARVIEWZ_PLUGIN_URL,
        ));
    }
    add_action('admin_enqueue_scripts', 'arviewz_admin_scripts');
}

require_once(ARVIEWZ_PLUGIN_DIR . 'inc/functions.php');
