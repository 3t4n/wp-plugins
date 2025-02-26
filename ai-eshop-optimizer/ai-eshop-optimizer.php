<?php
/*
Plugin Name: AI eshop Optimizer
Plugin URI: https://eshop-optimizer.com/plugin  
Description: Boost sales with AI-powered product recommendations. Effortlessly optimize upsells and cross-sells for store success!
Version: 1.0
Requires at least: 5.7
Tested up to: 6.5.2
Requires PHP: 7.4
Author: Oxford Metadata Ltd
Author URI: https://oxfordmetadata.co.uk
License: GPL3

*/

// Ensure the plugin is only loaded within WordPress and WooCommerce
if (!defined('ABSPATH')) {
    exit;
}

define('AIEO_VERSION', '0.357');
define('AIEO_FILE', __FILE__);
define('AIEO_BASE', trailingslashit(plugin_basename(AIEO_FILE)));
define('AIEO_DIR', plugin_dir_path(__FILE__));
define('AIEO_URI', plugin_dir_url(__FILE__));
define('AIEO_orders_upload_endpoint', 'https://uploads.eshop-optimizer.com/wp-json/aieo/v1/order_uploads');

add_action('before_woocommerce_init', function () {
    if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
    }
});


// Load the plugin class
require_once plugin_dir_path(__FILE__) . '/includes/class-eshop-optimizer.php';
require_once plugin_dir_path(__FILE__) . '/includes/sql/sprocs.php';

// Initialize the plugin
function AIEO_init()
{
    new AIEO();
}
add_action('plugins_loaded', 'AIEO_init');


function aieo_is_index_wp_mysql_for_speed_active()
{
    if (!function_exists('is_plugin_active')) {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    return is_plugin_active('index-wp-mysql-for-speed/index-wp-mysql-for-speed.php');
}


function aieo_set_default_options()
{
    global $wpdb;

    // Check if the option already exists. If not, add it.
    if (get_option('aieo_site_prefix') === false) {
        // Set the value for 'aieo_temp_orders_table' option
        $prefix_name = $wpdb->prefix;
        update_option('aieo_site_prefix', $prefix_name);
    }

    if (get_option('aieo_site_orders_table') === false) {
        // Set the value for 'aieo_temp_orders_table' option
        $table_name = $wpdb->prefix . 'aieo_temp_orders_table';
        update_option('aieo_site_orders_table', $table_name);
    }

    if (get_option('aieo_site_products_table') === false) {
        // Set the value for 'aieo_temp_orders_table' option
        $table_name = $wpdb->prefix . 'aieo_temp_product_catalogue_table';
        update_option('aieo_site_products_table', $table_name);
    }

    if (get_option('aieo_order_id') === false) {
        update_option('aieo_order_id', '1');
    }

    if (get_option('aieo_max_records') === false) {
        update_option('aieo_max_records', '1000');
    }

    if (get_option('aieo_batch_size') === false) {
        update_option('aieo_batch_size', '100');
    }

    if (get_option('aieo_batch_sleep') === false) {
        update_option('aieo_batch_sleep', '0');
    }

    if (get_option('aieo_include_text') === false) {
        update_option('aieo_include_text', '1');
    }

    if (get_option('aieo_include_aggregate_stats') === false) {
        update_option('aieo_include_aggregate_stats', '1');
    }

    if (get_option('aieo_include_aggregate_cust_std_stats') === false) {
        update_option('aieo_include_aggregate_cust_std_stats', '1');
    }

    if (get_option('aieo_include_aggregate_cust_adv_stats') === false) {
        update_option('aieo_include_aggregate_cust_adv_stats', '1');
    }

    if (get_option('aieo_include_full_text') === false) {
        update_option('aieo_include_full_text', '0');
    }

    if (get_option('aieo_activate_utm_stats') === false) {
        update_option('aieo_activate_utm_stats', '0');
    }

    if (get_option('aieo_google_ga4') === false) {
        update_option('aieo_google_ga4', '0');
    }

    if (get_option('aieo_display_upsells') === false) {
        update_option('aieo_display_upsells', '0');
    }

    if (get_option('aieo_display_cross_sells') === false) {
        update_option('aieo_display_cross_sells', '0');
    }

    if (get_option('aieo_display_related') === false) {
        update_option('aieo_display_related', '0');
    }

    if (get_option('aieo_display_recently_viewed_products') === false) {
        update_option('aieo_display_recently_viewed_products', '0');
    }
}

register_activation_hook(__FILE__, 'aieo_set_default_options');

// Inside your plugin's main file or in a file that gets loaded during plugin activation

// Register a hook to execute your table creation function during plugin activation
register_activation_hook(__FILE__, 'aieo_create_temp_tables_activation_hook');

// Define the activation hook function
function aieo_create_temp_tables_activation_hook() {
    // Load WordPress database manipulation functions
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    
    // Get table names from options
    $temp_orders_table_name = get_option('aieo_site_orders_table');
    $temp_products_table_name = get_option('aieo_site_products_table');

    // Call table creation functions
    aieo_create_temp_orders_table($temp_orders_table_name);
    aieo_create_temp_products_table($temp_products_table_name);
}


function aieo_create_stored_procedures()
{

    $sp_prefix = get_option('aieo_site_prefix');
    $sp_orders_table = get_option('aieo_site_orders_table');
    $sp_products_table = get_option('aieo_site_products_table');


    aieo_create_sp_AIEO_UpdateOrdersWithUnsold($sp_prefix, $sp_orders_table, $sp_products_table);
    aieo_create_sp_AIEO_FindDifferences($sp_prefix);
    aieo_create_sp_AIEO_Create_Product_Catalogue_HPOS($sp_prefix, $sp_products_table);
    aieo_create_sp_AIEO_Export_Orders_HPOS($sp_prefix, $sp_orders_table);
    aieo_create_sp_AIEO_Export_Orders_non_HPOS($sp_prefix, $sp_orders_table);
    aieo_create_sp_AIEO_StripHTMLAndReplicateContentIntro($sp_prefix, $sp_orders_table);
    aieo_create_sp_AIEO_RenameTable($sp_prefix);
    aieo_create_sp_AIEO_UpdateContentWordCount($sp_prefix);
    aieo_create_sp_AIEO_UpdateContentOutgoingLinks($sp_prefix);
    aieo_create_sp_AIEO_UpdateContentIntroPlain($sp_prefix);
    aieo_create_sp_UpdateProductCentricStats($sp_prefix);
    aieo_create_sp_AIEO_UpdateCustomerCentricStdStats($sp_prefix, $sp_orders_table);
    aieo_create_sp_AIEO_UpdateCustomerCentricAdvStats($sp_prefix, $sp_orders_table);
    aieo_create_sp_AIEO_GenerateGraphDBUUIDs($sp_prefix);
    aieo_create_sp_AIEO_GenerateGraphDBUUIDFreqs($sp_prefix);
    aieo_create_sp_AIEO_Orchestrate_all_non_HPOS_SPs($sp_prefix);

    aieo_create_function_AIEO_StripHTML();
    aieo_create_function_AIEO_CountWords();
    aieo_create_function_AIEO_CountLinks();

}

function aieo_drop_stored_procedures()
{
    $sp_prefix = get_option('aieo_site_prefix');
    $sp_temp_products_table_name = get_option('aieo_site_products_table');
    $sp_temp_orders_table_name = get_option('aieo_site_orders_table');

    aieo_drop_temp_products_table($sp_temp_products_table_name);
    aieo_drop_temp_orders_table($sp_temp_orders_table_name);
    aieo_drop_sp_AIEO_UpdateOrdersWithUnsold($sp_prefix);
    aieo_drop_sp_AIEO_FindDifferences($sp_prefix);
    aieo_drop_sp_AIEO_Create_Product_Catalogue_HPOS($sp_prefix);
    aieo_drop_sp_AIEO_Export_Orders_HPOS($sp_prefix);
    aieo_drop_sp_AIEO_Export_Orders_non_HPOS($sp_prefix);
    aieo_drop_sp_AIEO_StripHTMLAndReplicateContentIntro($sp_prefix);
    aieo_drop_sp_AIEO_RenameTable($sp_prefix);
    aieo_drop_sp_AIEO_UpdateContentWordCount($sp_prefix);
    aieo_drop_sp_AIEO_UpdateContentOutgoingLinks($sp_prefix);
    aieo_drop_sp_AIEO_UpdateContentIntroPlain($sp_prefix);
    aieo_drop_sp_AIEO_UpdateProductCentricStats($sp_prefix);
    aieo_drop_sp_AIEO_UpdateCustomerCentricAdvStats($sp_prefix);
    aieo_drop_sp_GenerateGraphDBUUIDs($sp_prefix);
    aieo_drop_sp_GenerateGraphDBUUIDFreqs($sp_prefix);
    aieo_drop_sp_AIEO_Orchestrate_all_non_HPOS_SPs($sp_prefix);
    aieo_drop_sp_AIEO_UpdateCustomerCentricStdStats($sp_prefix);

    aieo_drop_function_AIEO_StripHTML();
    aieo_drop_function_AIEO_CountWords();
    aieo_drop_function_AIEO_CountLinks();
}

register_deactivation_hook(__FILE__, 'aieo_drop_stored_procedures');
register_activation_hook(__FILE__, 'aieo_create_stored_procedures');


function aieo_check_for_plugin_update()
{
    $stored_version = get_option('aieo_version', '1.0.0');  // default to 1.0.0 or another default

    if (version_compare(AIEO_VERSION, $stored_version, '>')) {
        // Drop and Create Stored Procedures
        aieo_drop_stored_procedures();
        aieo_create_stored_procedures();
        // Then update the version value in the database
        update_option('aieo_version', AIEO_VERSION);
    }
}
add_action('plugins_loaded', 'aieo_check_for_plugin_update');


function aieo_load_textdomain()
{
    load_plugin_textdomain('ai-eshop-optimizer', false, basename(dirname(__FILE__)) . '/languages/');
}
add_action('plugins_loaded', 'aieo_load_textdomain');



function aieo_initialize_aieo_recommendations()
{
    new aieo_display_recommendations();
}
add_action('plugins_loaded', 'aieo_initialize_aieo_recommendations');
