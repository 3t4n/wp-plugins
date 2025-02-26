<?php
/**
 * Plugin Name: Frontend Customizer for WooCommerce
 * Description: A Frontend Customizer for WooCommerce plugin which allows you to change the text of WooCommerce and set custom default image.
 * Author: biztechc
 * Author URI: https://www.biztechcs.com/
 * Text Domain: 'wfm-text'
 * Version: 2.0.1
 */
/**
 * To prevent direct access to this file.
 * Only allowed to access when it is included as part of the core system.
 *
 * @since 1.0.0
 *
 */
defined('ABSPATH') or die('No script kiddies please!');

/**
 * Include support files and variables
 *
 * @since 1.0.0
 *
 */
define('WC_WFMTEXT_ASSETS_URL', plugin_dir_url(__FILE__) . 'assets/');
define('WC_WFMTEXT_CSS_URL', plugin_dir_url(__FILE__) . 'assets/css/');
define('WC_WFMTEXT_JS_URL', plugin_dir_url(__FILE__) . 'assets/js/');
define('WC_WFMTEXT_IMAGES_URL', plugin_dir_url(__FILE__) . 'assets/images/');
define('WC_WFMTEXT_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('WC_WFMTEXT_ADMIN_CONFIG', WC_WFMTEXT_PLUGIN_DIR . 'include/admin/');


/**
 * Deactivate Show all review plugin if woocommerce plugin is not active.
 *
 * @since 1.0.0
 *
 */
add_action('init', 'wfm_woocommerce_deactivate', 1);

function wfm_woocommerce_deactivate() {
    global $woocommerce;

    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

    $active_plugins = get_option('active_plugins');

    if (in_array('woocommerce/woocommerce.php', $active_plugins) != TRUE) {

        if (in_array(plugin_basename(__FILE__), $active_plugins)) {

            deactivate_plugins(plugin_basename(__FILE__));
            add_action('admin_notices', 'wfm_notice_when_woocommerce_deactivate');
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
        }
    } else {
        if (isset($woocommerce->version) && version_compare($woocommerce->version, '3.0', ">=") != TRUE) {

            deactivate_plugins(plugin_basename(__FILE__));
            add_action('admin_notices', 'wfm_notice_woocommerce_version_upgrade');
            if (isset($_GET['activate'])) {
                unset($_GET['activate']);
            }
        } else {
            include( WC_WFMTEXT_ADMIN_CONFIG . 'settings.php' ); // Main setting page
        }
    }
}

/**
 * Set admin notice message when woocommerce not installed.
 *
 * @since 1.0.0
 *
 */
function wfm_notice_when_woocommerce_deactivate() {
    ?>
    <div class="error">
        <p><?php _e('You need to install woocommerce or activate woocommerce for active Frontend Customizer for WooCommerce plug-in.', 'wfm-text'); ?></p>
    </div>
    <?php
}

/**
 * Set admin notice message when woocommerce version is lowest than 3.0
 *
 * @since 1.0.0
 *
 */
function wfm_notice_woocommerce_version_upgrade() {
    ?>
    <div class="error">
        <p><?php _e('You need to upgrade woocommerce at least 3.0 or higher for active Frontend Customizer for WooCommerce plug-in.', 'wfm-text'); ?></p>
    </div>
    <?php
}

/**
 * Register activation hook - When user activate plugin run this function.
 * When user activate plugin set default values if not set.
 *
 * @since 1.0.0
 *
 */
if (!function_exists('wfm_register_activation_hook')) {

    register_activation_hook(__FILE__, "wfm_register_activation_hook");

    function wfm_register_activation_hook() {
        
    }

}

/**
 * Register deactivation hook - When user deactivate plugin run this function.
 *
 * @since 1.0.0
 *
 */
if (!function_exists('wfm_register_deactivation_hook')) {

    register_deactivation_hook(__FILE__, "wfm_register_deactivation_hook");

    function wfm_register_deactivation_hook() {
        
    }

}

/**
 * Set styles and scripts at admin side.
 *
 * @since 1.0.0
 *
 */
if (!function_exists('wfm_admin_enqueue_scripts')) {
    add_action('admin_enqueue_scripts', 'wfm_admin_enqueue_scripts');
    add_action('admin_enqueue_scripts', 'wp_enqueue_media');

    function wfm_admin_enqueue_scripts() {

// Register styles
        wp_register_style('wfm-admin-style', WC_WFMTEXT_CSS_URL . 'wfm-custom-admin-style.css');
        wp_enqueue_style('wfm-admin-style');

// Register script
        wp_register_script('wfm-admin-script', WC_WFMTEXT_JS_URL . 'wfm-custom-admin-script.js');
        wp_enqueue_script('wfm-admin-script');
    }

}

/**
 * Set styles and scripts at front side.
 *
 * @since 1.0.0
 *
 */
if (!function_exists('wfm_wp_enqueue_scripts')) {
    add_action('wp_enqueue_scripts', 'wfm_wp_enqueue_scripts');

    function wfm_wp_enqueue_scripts() {

// Register style
        wp_register_style('wfm-custom-style', WC_WFMTEXT_CSS_URL . 'wfm-custom-style.css');
    }

}

