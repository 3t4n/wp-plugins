<?php

/**
 * Plugin Name: JetAPI Integration for WooCommerce
 * Plugin URI: https://jetapi.io/integrations/wordpress
 * Description: Integrates JetAPI service with WooCommerce for sending notifications via WhatsApp, Telegram, and SMS.
 * Version: 1.8.1
 * Author: JetAPI
 * Author URI: https://jetapi.io
 * Text Domain: jetapi-integration-for-woocommerce
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * WC requires at least: 3.0
 * WC tested up to: 8.2
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package JetAPI_Integration_For_WooCommerce
 */

defined('ABSPATH') || exit;

// Define plugin constants
define('JETI_PLUGIN_FILE', __FILE__);
define('JETI_ABSPATH', dirname(JETI_PLUGIN_FILE) . '/');
define('JETI_PLUGIN_BASENAME', plugin_basename(JETI_PLUGIN_FILE));
define('JETI_VERSION', '1.8.1');
define('JETI_PLUGIN_URL', plugin_dir_url(JETI_PLUGIN_FILE));
define('JETI_PLUGIN_DIR', plugin_dir_path(JETI_PLUGIN_FILE));

// HPOS compatibility
add_action( 'before_woocommerce_init', function() {
    if ( class_exists( '\Automattic\WooCommerce\Utilities\FeaturesUtil' ) ) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', __FILE__, true );
    }
} );

/**
 * Check if WooCommerce is active
 */
function jeti_is_woocommerce_active() {
    $active_plugins = (array) get_option('active_plugins', array());
    if (is_multisite()) {
        $active_plugins = array_merge($active_plugins, get_site_option('active_sitewide_plugins', array()));
    }
    return in_array('woocommerce/woocommerce.php', $active_plugins) || array_key_exists('woocommerce/woocommerce.php', $active_plugins);
}

/**
 * Initialize the plugin
 */
function jeti_init() {
    // Load plugin textdomain
    load_plugin_textdomain('jetapi-integration-for-woocommerce', false, dirname(plugin_basename(__FILE__)) . '/languages');

    // Check if WooCommerce is active
    if (!jeti_is_woocommerce_active()) {
        add_action('admin_notices', 'jeti_woocommerce_missing_notice');
        return;
    }

    // Include WooCommerce core files
    if (defined('WC_ABSPATH')) {
        include_once WC_ABSPATH . 'includes/wc-core-functions.php';
        include_once WC_ABSPATH . 'includes/class-wc-order.php';
    }

    // Include required files
    require_once JETI_ABSPATH . 'includes/jeti-compatibility-functions.php';
    require_once JETI_ABSPATH . 'includes/class-jeti-integration.php';
    require_once JETI_ABSPATH . 'includes/class-jeti-notification-sender.php';
    require_once JETI_ABSPATH . 'includes/admin/jeti-dashboard-page.php';
    require_once JETI_ABSPATH . 'includes/admin/jeti-messages-page.php';
    require_once JETI_ABSPATH . 'includes/admin/jeti-bulk-messaging-page.php';

    // Initialize the integration
    JETI();

    // Enqueue admin scripts and styles
    add_action('admin_enqueue_scripts', 'jeti_enqueue_admin_scripts');
}
add_action('plugins_loaded', 'jeti_init');

/**
 * Enqueue admin scripts and styles
 */
function jeti_enqueue_admin_scripts($hook) {
    if (strpos($hook, 'jeti') === false) {
        return;
    }

    wp_enqueue_style('jeti-admin-style', JETI_PLUGIN_URL . 'assets/css/admin-style.css', array(), JETI_VERSION);
    wp_enqueue_script('jeti-admin-script', JETI_PLUGIN_URL . 'assets/js/admin-script.js', array('jquery', 'jquery-ui-sortable'), JETI_VERSION, true);
}

/**
 * Display a notice if WooCommerce is missing
 */
function jeti_woocommerce_missing_notice() {
    ?>
    <div class="error">
        <p><?php esc_html_e('JetAPI Integration for WooCommerce requires WooCommerce to be installed and active.', 'jetapi-integration-for-woocommerce'); ?></p>
    </div>
    <?php
}

/**
 * Returns the main instance of JETI_Integration.
 *
 * @return JETI_Integration
 */
function JETI() {
    return JETI_Integration::instance();
}

/**
 * Log errors for debugging
 *
 * @param string $message The error message to log
 */
function jeti_log_error($message) {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        if (class_exists('WooCommerce') && function_exists('wc_get_logger')) {
            $logger = wc_get_logger();
            $logger->error($message, array('source' => 'jetapi-integration'));
        }
    }
}

/**
 * Display admin notice after plugin activation
 */
function jeti_admin_notice() {
    if (get_option('jeti_activation_notice', false)) {
        /* translators: %s: URL to JetAPI Dashboard */
        $notice_text = __('Thank you for installing JetAPI Integration for WooCommerce. Please go to the <a href="%s">JetAPI Dashboard</a> to get started.', 'jetapi-integration-for-woocommerce');
        ?>
        <div class="notice notice-info is-dismissible">
            <p><?php echo wp_kses_post(sprintf($notice_text, admin_url('admin.php?page=jeti-dashboard'))); ?></p>
        </div>
        <?php
        delete_option('jeti_activation_notice');
    }
}
add_action('admin_notices', 'jeti_admin_notice');

/**
 * Set activation notice flag on plugin activation
 */
function jeti_activate() {
    add_option('jeti_activation_notice', true);
}
register_activation_hook(__FILE__, 'jeti_activate');

/**
 * Uninstall function to clean up the plugin data
 * 
 * Note: Direct database operations are necessary here as this is a cleanup operation
 * during plugin uninstallation. WordPress's standard functions are not suitable for
 * dropping custom tables, and caching is not relevant as this is a one-time operation.
 */
function jeti_uninstall() {
    // Only run if WordPress core uninstall function is being executed
    if (!defined('WP_UNINSTALL_PLUGIN')) {
        return;
    }

    global $wpdb;

    // Get tables to drop
    $tables = array(
        $wpdb->prefix . 'jeti_messages',
        $wpdb->prefix . 'jeti_campaigns',
    );

    // Drop custom tables
    // phpcs:disable WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
    // Caching is not needed during plugin uninstallation as this is a one-time cleanup operation
    foreach ($tables as $table) {
        $wpdb->query("DROP TABLE IF EXISTS `" . esc_sql($table) . "`");
    }
    // phpcs:enable
    
    // Delete options using WordPress API
    $options = array(
        'jeti_settings',
        'jeti_activation_notice',
    );

    foreach ($options as $option) {
        delete_option($option);
    }

    // Clear any cached data
    wp_cache_flush();
}
register_uninstall_hook(__FILE__, 'jeti_uninstall');

// HPOS compatibility
function jeti_declare_hpos_compatibility() {
    if (class_exists('\Automattic\WooCommerce\Utilities\FeaturesUtil')) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
    }
}
add_action('before_woocommerce_init', 'jeti_declare_hpos_compatibility');
