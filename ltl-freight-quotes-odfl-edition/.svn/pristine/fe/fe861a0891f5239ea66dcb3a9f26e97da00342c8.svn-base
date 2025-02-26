<?php
/**
 * Plugin Name: LTL Freight Quotes - ODFL Edition
 * Plugin URI: https://eniture.com/products/
 * Description: Dynamically retrieves your negotiated shipping rates from ODFL Freight and displays the results in the WooCommerce shopping cart.
 * Version: 4.2.11
 * Author: Eniture Technology
 * Author URI: https://eniture.com/
 * Text Domain: eniture-technology
 * License: GPL version 2 or later - http://www.eniture.com/
 * WC requires at least: 6.4
 * WC tested up to: 9.6.2
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('ODFL_FREIGHT_DOMAIN_HITTING_URL', 'https://ws033.eniture.com');
define('ODFL_FREIGHT_FDO_HITTING_URL', 'https://freightdesk.online/api/updatedWoocomData');

add_action('before_woocommerce_init', function () {
    if (class_exists(\Automattic\WooCommerce\Utilities\FeaturesUtil::class)) {
        \Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility('custom_order_tables', __FILE__, true);
    }
});

// Define reference
function en_odfl_freight_plugin($plugins)
{
    $plugins['lfq'] = (isset($plugins['lfq'])) ? array_merge($plugins['lfq'], ['odfl' => 'ODFL_Freight_Shipping_Class']) : ['odfl' => 'ODFL_Freight_Shipping_Class'];
    return $plugins;
}

add_filter('en_plugins', 'en_odfl_freight_plugin');

if (!function_exists('en_woo_plans_notification_PD')) {

    function en_woo_plans_notification_PD($product_detail_options)
    {
        $eniture_plugins_id = 'eniture_plugin_';

        for ($e = 1; $e <= 25; $e++) {
            $settings = get_option($eniture_plugins_id . $e);
            if (isset($settings) && (!empty($settings)) && (is_array($settings))) {
                $plugin_detail = current($settings);
                $plugin_name = (isset($plugin_detail['plugin_name'])) ? $plugin_detail['plugin_name'] : "";

                foreach ($plugin_detail as $key => $value) {
                    if ($key != 'plugin_name') {
                        $action = $value === 1 ? 'enable_plugins' : 'disable_plugins';
                        $product_detail_options[$key][$action] = (isset($product_detail_options[$key][$action]) && strlen($product_detail_options[$key][$action]) > 0) ? ", $plugin_name" : "$plugin_name";
                    }
                }
            }
        }

        return $product_detail_options;
    }

    add_filter('en_woo_plans_notification_action', 'en_woo_plans_notification_PD', 10, 1);
}

if (!function_exists('en_woo_plans_notification_message')) {

    function en_woo_plans_notification_message($enable_plugins, $disable_plugins)
    {
        $enable_plugins = (strlen($enable_plugins) > 0) ? "$enable_plugins: <b> Enabled</b>. " : "";
        $disable_plugins = (strlen($disable_plugins) > 0) ? " $disable_plugins: Upgrade to <b>Standard Plan to enable</b>." : "";
        return $enable_plugins . "<br>" . $disable_plugins;
    }

    add_filter('en_woo_plans_notification_message_action', 'en_woo_plans_notification_message', 10, 2);
}

//Product detail set plans notification message for nested checkbox
if (!function_exists('en_woo_plans_nested_notification_message')) {

    function en_woo_plans_nested_notification_message($enable_plugins, $disable_plugins, $feature)
    {
        $enable_plugins = (strlen($enable_plugins) > 0) ? "$enable_plugins: <b> Enabled</b>. " : "";
        $disable_plugins = (strlen($disable_plugins) > 0 && $feature == 'nested_material') ? " $disable_plugins: Upgrade to <b>Advance Plan to enable</b>." : "";
        return $enable_plugins . "<br>" . $disable_plugins;
    }

    add_filter('en_woo_plans_nested_notification_message_action', 'en_woo_plans_nested_notification_message', 10, 3);
}

if (!function_exists('is_plugin_active')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}

/**
 * Load scripts for ODFL Freight json tree view
 */
if (!function_exists('en_odfl_jtv_script')) {
    function en_odfl_jtv_script()
    {
        wp_register_style('en_odfl_json_tree_view_style', plugin_dir_url(__FILE__) . 'logs/en-json-tree-view/en-jtv-style.css');
        wp_register_script('en_odfl_json_tree_view_script', plugin_dir_url(__FILE__) . 'logs/en-json-tree-view/en-jtv-script.js', ['jquery'], '1.0.0');

        wp_enqueue_style('en_odfl_json_tree_view_style');
        wp_enqueue_script('en_odfl_json_tree_view_script', [
            'en_tree_view_url' => plugins_url(),
        ]);

        // Shipping rules script and styles
        wp_enqueue_script('en_odfl_sr_script', plugin_dir_url(__FILE__) . '/shipping-rules/assets/js/shipping_rules.js', array(), '1.0.2');
        wp_localize_script('en_odfl_sr_script', 'script', array(
            'pluginsUrl' => plugins_url(),
        ));
        wp_register_style('en_odfl_shipping_rules_section', plugin_dir_url(__FILE__) . '/shipping-rules/assets/css/shipping_rules.css', false, '1.0.0');
        wp_enqueue_style('en_odfl_shipping_rules_section');
    }

    add_action('admin_init', 'en_odfl_jtv_script');
}

if (!is_plugin_active('woocommerce/woocommerce.php')) {
    add_action('admin_notices', 'odfl_wc_avaibility_error');
}

/**
 * Check WooCommerce installlation
 */
function odfl_wc_avaibility_error()
{
    $class = "error";
    $message = "LTL Freight Quotes - ODFL Edition is enabled, but not effective. It requires WooCommerce in order to work, please <a target='_blank' href='https://wordpress.org/plugins/woocommerce/installation/'>Install</a> WooCommerce Plugin. Reactivate LTL Freight Quotes - ODFL Edition plugin to create LTL shipping class.";
    echo "<div class=\"$class\"> <p>$message</p></div>";
}

add_action('admin_init', 'odfl_check_wc_version');

/**
 * Check WooCommerce version compatibility
 */
function odfl_check_wc_version()
{
    $woo_version = odfl_wc_version_number();
    $version = '2.6';
    if (!version_compare($woo_version, $version, ">=")) {
        add_action('admin_notices', 'wc_version_incompatibility_odfl');
    }
}

/**
 * WooCommerce version incompatibility check
 */
function wc_version_incompatibility_odfl()
{
    ?>
    <div class="notice notice-error">
        <p>
            <?php
            _e('LTL Freight Quotes - ODFL Edition plugin requires WooCommerce version 2.6 or higher to work. Functionality may not work properly.', 'wwe-woo-version-failure');
            ?>
        </p>
    </div>
    <?php
}

/**
 * ODFL version number
 * @return WooCommerce version
 */
function odfl_wc_version_number()
{
    $plugin_folder = get_plugins('/' . 'woocommerce');
    $plugin_file = 'woocommerce.php';

    if (isset($plugin_folder[$plugin_file]['Version']))
        return $plugin_folder[$plugin_file]['Version'];
    else
        return NULL;
}

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) || is_plugin_active_for_network('woocommerce/woocommerce.php')) {

    add_action('admin_enqueue_scripts', 'odfl_admin_script');

    /**
     * Load scripts for ODFL
     */
    function odfl_admin_script()
    {
        // Cuttoff Time
        wp_register_style('odfl_wickedpicker_style', plugin_dir_url(__FILE__) . 'css/wickedpicker.min.css', false, '1.0.0');
        wp_register_script('odfl_wickedpicker_script', plugin_dir_url(__FILE__) . 'js/wickedpicker.js', false, '1.0.0');
        wp_enqueue_style('odfl_wickedpicker_style');
        wp_enqueue_script('odfl_wickedpicker_script');
        wp_register_style('odfl-style', plugin_dir_url(__FILE__) . '/css/odfl-style.css', false, '1.1.2');
        wp_enqueue_style('odfl-style');

        if(is_admin() && (!empty( $_GET['page']) && 'wc-orders' == $_GET['page'] ) && (!empty( $_GET['action']) && 'new' == $_GET['action'] ))
        {
            if (!wp_script_is('eniture_calculate_shipping_admin', 'enqueued')) {
                wp_enqueue_script('eniture_calculate_shipping_admin', plugin_dir_url(__FILE__) . 'js/eniture-calculate-shipping-admin.js', array(), '1.0.0' );
            }
        }
    }

    add_action('admin_enqueue_scripts', 'en_odfl_script');

    /**
     * Load Front-end scripts for odfl
     */
    function en_odfl_script()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('en_odfl_script', plugin_dir_url(__FILE__) . 'js/en-odfl.js', [], '1.1.2');
        wp_localize_script('en_odfl_script', 'en_odfl_admin_script', array(
            'plugins_url' => plugins_url(),
            'allow_proceed_checkout_eniture' => trim(get_option("allow_proceed_checkout_eniture")),
            'prevent_proceed_checkout_eniture' => trim(get_option("prevent_proceed_checkout_eniture")),
            // Cuttoff Time
            'odfl_freight_order_cutoff_time' => get_option("odfl_freight_order_cut_off_time"),
            'odfl_backup_rates_fixed_rate' => get_option("odfl_backup_rates_fixed_rate"),
            'odfl_backup_rates_cart_price_percentage' => get_option("odfl_backup_rates_cart_price_percentage"),
            'odfl_backup_rates_weight_function' => get_option("odfl_backup_rates_weight_function"),
        ));
    }

    /**
     * Inlude Plugin Files
     */
    //FDO
    require_once('fdo/en-fdo.php');
    require_once('odfl-liftgate-as-option.php');
    require_once('odfl-test-connection.php');
    require_once('odfl-shipping-class.php');
    require_once('db/odfl-db.php');
    require_once('standard-package-addon/standard-package-addon.php');
    require_once('warehouse-dropship/get-distance-request.php');
    require_once('warehouse-dropship/odfl-wild-delivery.php');
    require_once('update-plan.php');
    require_once('odfl-admin-filter.php');
    require_once('odfl-group-package.php');
    require_once('odfl-carrier-service.php');
    require_once('odfl-wc-update-change.php');
    require_once('template/connection-settings.php');
    require_once('template/quote-settings.php');
    require_once('odfl-curl-class.php');
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    require_once 'template/products-nested-options.php';
    require_once 'template/csv-export.php';

    require_once 'order/en-order-export.php';
    require_once 'order/rates/order-rates.php';
    $en_hide_widget = apply_filters('en_hide_widget_for_this_carrier', false);
    if (!$en_hide_widget) {
        require_once 'order/en-order-widget.php';
    }

    // Origin terminal address
    add_action('admin_init', 'odfl_update_warehouse');
    add_action('admin_init', 'create_odfl_shipping_rules_db');

    require_once('product/en-product-detail.php');
    require_once('shipping-rules/shipping-rules-save.php');

    register_activation_hook(__FILE__, 'create_odfl_ltl_freight_class');
    register_activation_hook(__FILE__, 'create_odfl_wh_db');
    register_activation_hook(__FILE__, 'create_odfl_shipping_rules_db');
    register_activation_hook(__FILE__, 'create_odfl_option');
    register_activation_hook(__FILE__, 'old_store_odfl_ltl_dropship_status');
    register_activation_hook(__FILE__, 'en_odfl_quotes_activate_hit_to_update_plan');
    register_deactivation_hook(__FILE__, 'en_odfl_quotes_deactivate_hit_to_update_plan');
    register_deactivation_hook(__FILE__, 'en_odfl_deactivate_plugin');

    /**
     * Hook to call when plugin update
     */
    function en_odfl_update_now( $upgrader_object, $options ) {
        $en_odfl_path_name = plugin_basename( __FILE__ );

        if ($options['action'] == 'update' && $options['type'] == 'plugin' && isset( $options['plugins'] ) ) {
            foreach($options['plugins'] as $each_plugin) {
                if ($each_plugin == $en_odfl_path_name) {
                    if (!function_exists('en_odfl_quotes_activate_hit_to_update_plan')) {
                        require_once(__DIR__ . '/update-plan.php');
                    }
                    
                    create_odfl_ltl_freight_class();
                    create_odfl_wh_db();
                    create_odfl_option();
                    old_store_odfl_ltl_dropship_status();
                    en_odfl_quotes_activate_hit_to_update_plan();

                    update_option('en_odfl_update_now', $plugin_version);

                }
            }
        }
    }

    add_action( 'upgrader_process_complete', 'en_odfl_update_now',10, 2);


    /*
     * ODFL Action And Filters
     */

    add_action('woocommerce_shipping_init', 'odfl_logistics_init');
    add_filter('woocommerce_shipping_methods', 'add_odfl_logistics');
    add_filter('woocommerce_get_settings_pages', 'odfl_shipping_sections');
    add_filter('woocommerce_package_rates', 'odfl_hide_shipping', 99);
    add_filter('woocommerce_shipping_calculator_enable_city', '__return_true');
    add_filter('plugin_action_links', 'odfl_logistics_add_action_plugin', 10, 5);
    /* Custom Error Message */
    add_filter('woocommerce_cart_no_shipping_available_html', 'odfl_default_error_message', 999, 1);
    add_action('init', 'odfl_no_method_available');

    add_action('init', 'odfl_default_error_message_selection');

    /**
     * Update Default custom error message selection
     */
    function odfl_default_error_message_selection()
    {
        $custom_error_selection = get_option('wc_pervent_proceed_checkout_eniture');
        if (empty($custom_error_selection)) {
            update_option('wc_pervent_proceed_checkout_eniture', 'prevent', true);
            update_option('prevent_proceed_checkout_eniture', 'There are no shipping methods available for the address provided. Please check the address.', true);
        }
    }

    /**
     * @param $message
     * @return string
     */
    if (!function_exists("odfl_default_error_message")) {

        function odfl_default_error_message($message)
        {

            if (get_option('wc_pervent_proceed_checkout_eniture') == 'prevent') {
                remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20, 2);
                return __(get_option('prevent_proceed_checkout_eniture'));
            } else if (get_option('wc_pervent_proceed_checkout_eniture') == 'allow') {
                add_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20, 2);
                return __(get_option('allow_proceed_checkout_eniture'));
            }
        }

    }

    /**
     * ODFL action links
     * @staticvar $plugin
     * @param $actions
     * @param $plugin_file
     * @return arrray
     */
    function odfl_logistics_add_action_plugin($actions, $plugin_file)
    {
        static $plugin;
        if (!isset($plugin))
            $plugin = plugin_basename(__FILE__);
        if ($plugin == $plugin_file) {
            $settings = array('settings' => '<a href="admin.php?page=wc-settings&tab=odfl_quotes">' . __('Settings', 'General') . '</a>');
            $site_link = array('support' => '<a href="https://support.eniture.com" target="_blank">Support</a>');
            $actions = array_merge($settings, $actions);
            $actions = array_merge($site_link, $actions);
        }
        return $actions;
    }

}

define("en_woo_plugin_odfl_quotes", "odfl_quotes");

add_action('wp_enqueue_scripts', 'en_ltl_odfl_frontend_checkout_script');

/**
 * Load Frontend scripts for ODFL
 */
function en_ltl_odfl_frontend_checkout_script()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('en_ltl_odfl_frontend_checkout_script', plugin_dir_url(__FILE__) . 'front/js/en-odfl-checkout.js', [], '1.0.0');
    wp_localize_script('en_ltl_odfl_frontend_checkout_script', 'frontend_script', array(
        'pluginsUrl' => plugins_url(),
    ));
}

/**
 * Get Host
 * @param type $url
 * @return type
 */
if (!function_exists('getHost')) {

    function getHost($url)
    {
        $parseUrl = parse_url(trim($url));
        if (isset($parseUrl['host'])) {
            $host = $parseUrl['host'];
        } else {
            $path = explode('/', $parseUrl['path']);
            $host = $path[0];
        }
        return trim($host);
    }

}
/**
 * Get Domain Name
 */
if (!function_exists('odfl_quotes_get_domain')) {

    function odfl_quotes_get_domain()
    {
        global $wp;
        $url = home_url($wp->request);
        return getHost($url);
    }
}

/**
 * Plans Common Hooks
 */
add_filter('odfl_quotes_quotes_plans_suscription_and_features', 'odfl_quotes_quotes_plans_suscription_and_features', 1);

function odfl_quotes_quotes_plans_suscription_and_features($feature)
{
    $package = get_option('odfl_quotes_package');

    $features = array
    (
        'instore_pickup_local_devlivery' => array('3'),
        'nested_material' => array('3'),
        // Cuttoff Time
        'odfl_cutt_off_time' => array('2', '3'),
        'odfl_freight_hold_at_terminal' => array('3'),
        'hazardous_material' => array('2', '3')
    );
    if (get_option('odfl_quotes_store_type') == "1") {
        $features['multi_warehouse'] = array('2', '3');
        $features['multi_dropship'] = array('', '0', '1', '2', '3');
    } else {
        $dropship_status = get_option('en_old_user_dropship_status');
        $warehouse_status = get_option('en_old_user_warehouse_status');

        isset($dropship_status) && ($dropship_status == "0") ? $features['multi_dropship'] = array('', '0', '1', '2', '3') : '';
        isset($warehouse_status) && ($warehouse_status == "0") ? $features['multi_warehouse'] = array('2', '3') : '';
    }

    return (isset($features[$feature]) && (in_array($package, $features[$feature]))) ? TRUE : ((isset($features[$feature])) ? $features[$feature] : '');
}

add_filter('odfl_quotes_plans_notification_link', 'odfl_quotes_plans_notification_link', 1);

function odfl_quotes_plans_notification_link($plans)
{
    $plan = current($plans);
    $plan_to_upgrade = "";
    switch ($plan) {
        case 2:
            $plan_to_upgrade = "<a class='plan_color' href='https://eniture.com/plan/woocommerce-odfl-ltl-freight/' target='_blank'>Standard Plan required</a>";
            break;
        case 3:
            $plan_to_upgrade = "<a href='https://eniture.com/plan/woocommerce-odfl-ltl-freight/' target='_blank'>Advanced Plan required</a>";
            break;
    }

    return $plan_to_upgrade;
}

/**
 *
 * old customer check dropship / warehouse status on plugin update
 */
function old_store_odfl_ltl_dropship_status()
{
    global $wpdb;

//  Check total no. of dropships on plugin updation
    $table_name = $wpdb->prefix . 'warehouse';
    $count_query = "select count(*) from $table_name where location = 'dropship' ";
    $num = $wpdb->get_var($count_query);

    if (get_option('en_old_user_dropship_status') == "0" && get_option('odfl_quotes_store_type') == "0") {
        $dropship_status = ($num > 1) ? 1 : 0;

        update_option('en_old_user_dropship_status', "$dropship_status");
    } elseif (get_option('en_old_user_dropship_status') == "" && get_option('odfl_quotes_store_type') == "0") {
        $dropship_status = ($num == 1) ? 0 : 1;

        update_option('en_old_user_dropship_status', "$dropship_status");
    }

//  Check total no. of warehouses on plugin updation
    $table_name = $wpdb->prefix . 'warehouse';
    $warehouse_count_query = "select count(*) from $table_name where location = 'warehouse' ";
    $warehouse_num = $wpdb->get_var($warehouse_count_query);

    if (get_option('en_old_user_warehouse_status') == "0" && get_option('odfl_quotes_store_type') == "0") {
        $warehouse_status = ($warehouse_num > 1) ? 1 : 0;

        update_option('en_old_user_warehouse_status', "$warehouse_status");
    } elseif (get_option('en_old_user_warehouse_status') == "" && get_option('odfl_quotes_store_type') == "0") {
        $warehouse_status = ($warehouse_num == 1) ? 0 : 1;

        update_option('en_old_user_warehouse_status', "$warehouse_status");
    }
}

/* * *
 * Add account number field on add/edit warehouse/dropship
 */

function odfl_en_append_account_number_multiple_plugins($template)
{
    $template .= '<div class="en_wd_add_warehouse_custom_input en_wd_add_warehouse_input en_wd_odfl_account_label">
                        <label for="en_wd_dropship_odfl_account">ODFL Account Number</label>
                        <input type="text" data-connection_input="odfl_test_connection_zipcode" data-post_input="odfl_account" title="ODFL Account Nmuber" name="en_wd_odfl_account" value="" placeholder="ODFL Account Number" class="en_wd_odfl_account" data-optional="1">
                        <span class="en_wd_err"></span>
                    </div>';
    return $template;
}

add_filter('en_append_account_number_multiple_plugins', 'odfl_en_append_account_number_multiple_plugins', 1, 1);

/*
 * Add account number hidden field on add/edit warehouse/dropship
 */

function odfl_en_append_account_number_hidden_multiple_plugins($template)
{
    $template .= '<div class="en_wd_account_number">
        <input type="hidden" data-account_num_on_warehouse="en_wd_odfl_account_label" value="' . get_option('billing_zip_code_key_odfl') . '" id="odfl_test_connection_zipcode">
    </div>';
    return $template;
}

add_filter('en_append_account_number_hidden_multiple_plugins', 'odfl_en_append_account_number_hidden_multiple_plugins', 1, 1);
// fdo va
add_action('wp_ajax_nopriv_odfl_fd', 'odfl_fd_api');
add_action('wp_ajax_odfl_fd', 'odfl_fd_api');
/**
 * UPS AJAX Request
 */
function odfl_fd_api()
{
    $store_name = odfl_quotes_get_domain();
    $company_id = $_POST['company_id'];
    $data = [
        'plateform'  => 'wp',
        'store_name' => $store_name,
        'company_id' => $company_id,
        'fd_section' => 'tab=odfl_quotes&section=section-4',
    ];
    if (is_array($data) && count($data) > 0) {
        if($_POST['disconnect'] != 'disconnect') {
            $url =  'https://freightdesk.online/validate-company';
        }else {
            $url = 'https://freightdesk.online/disconnect-woo-connection';
        }
        $response = wp_remote_post($url, [
                'method' => 'POST',
                'timeout' => 60,
                'redirection' => 5,
                'blocking' => true,
                'body' => $data,
            ]
        );
        $response = wp_remote_retrieve_body($response);
    }
    if($_POST['disconnect'] == 'disconnect') {
        $result = json_decode($response);
        if ($result->status == 'SUCCESS') {
            update_option('en_fdo_company_id_status', 0);
        }
    }
    echo $response;
    exit();
}
add_action('rest_api_init', 'en_rest_api_init_status_odfl');
function en_rest_api_init_status_odfl()
{
    register_rest_route('fdo-company-id', '/update-status', array(
        'methods' => 'POST',
        'callback' => 'en_odfl_fdo_data_status',
        'permission_callback' => '__return_true'
    ));
}

/**
 * Update FDO coupon data
 * @param array $request
 * @return array|void
 */
function en_odfl_fdo_data_status(WP_REST_Request $request)
{
    $status_data = $request->get_body();
    $status_data_decoded = json_decode($status_data);
    if (isset($status_data_decoded->connection_status)) {
        update_option('en_fdo_company_id_status', $status_data_decoded->connection_status);
        update_option('en_fdo_company_id', $status_data_decoded->fdo_company_id);
    }
    return true;
}

add_filter('en_suppress_parcel_rates_hook', 'supress_parcel_rates');
if (!function_exists('supress_parcel_rates')) {
    function supress_parcel_rates() {
        $exceedWeight = get_option('en_plugins_return_LTL_quotes') == 'yes';
        $supress_parcel_rates = get_option('en_suppress_parcel_rates') == 'suppress_parcel_rates';
        return ($exceedWeight && $supress_parcel_rates);
    }
}