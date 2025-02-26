<?php
/**
* Plugin Name: FreightPOP
* Plugin URI: https://devproject.udaantechnologies.com/cms/FrieghtPop.zip
* Description: Carrier shipping plugin for WooCommerce.
* Version: 1.0
* Author: FreightPOP
* Author URI: https://freightpop-wp.udaantechnologies.com/
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
**/
if ( ! defined( 'ABSPATH' ) ) exit;

// Plugin activation hook init

register_activation_hook(__FILE__, 'freightpop_generate_store_id_on_activation');

function freightpop_generate_store_id_on_activation() {
    if (!get_option('freightpop_unique_store_id')) {
        $unique_store_id = uniqid('store_', true);
        update_option('freightpop_unique_store_id', $unique_store_id);
    }
}

register_activation_hook( __FILE__, 'freightpop_plugin_create_tables' );

function freightpop_plugin_create_tables() {
    global $wpdb;

    // Get the database charset
    $charset_collate = $wpdb->get_charset_collate();

    // Table names
    $settings_table =  'settings';
    $markups_table =  'markups';
    $discounts_table =  'discounts';

    // SQL for creating the settings table
    $sql_settings = "CREATE TABLE IF NOT EXISTS `$settings_table` (
        `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
        `storeHash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
        `username` varchar(255) NOT NULL,
        `password` varchar(255) NOT NULL,
        `source` varchar(255) NOT NULL,
        `accessToken` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
        `connectionStatus` tinyint(1) DEFAULT '0',
        `productSetting` varchar(255) DEFAULT NULL,
        `ratesToDisplay` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) $charset_collate;";

    // SQL for creating the markups table
    $sql_markups = "CREATE TABLE IF NOT EXISTS `$markups_table` (
        `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
        `storeHash` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
        `type` varchar(255) NOT NULL,
        `value` double DEFAULT '0',
        `applyTo` varchar(255) DEFAULT NULL,
        `status` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`)
    ) $charset_collate;";

    // SQL for creating the discounts table
    $sql_discounts = "CREATE TABLE IF NOT EXISTS `$discounts_table` (
        `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
        `storeHash` varchar(255) NOT NULL,
        `type` varchar(255) NOT NULL,
        `value` double DEFAULT '0',
        `applyTo` varchar(255) DEFAULT NULL,
        `condition` varchar(255) NOT NULL,
        `conditionValue` double DEFAULT '0',
        `status` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`)
    ) $charset_collate;";

    // Execute the SQL
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql_settings );
    dbDelta( $sql_markups );
    dbDelta( $sql_discounts );
}

// Delete plugin hook

register_uninstall_hook(__FILE__, 'freightpop_plugin_uninstall');
function freightpop_plugin_uninstall() {
    global $wpdb;

    // Drop the tables
    $wpdb->query("DROP TABLE IF EXISTS `settings`");
    $wpdb->query("DROP TABLE IF EXISTS  `markups`");
    $wpdb->query("DROP TABLE IF EXISTS `discounts`");
}

// Hook to enqueue scripts in the front end of the site
function enqueue_freightpop_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('my_custom_plugin_bootstrap_js',  plugin_dir_url(__FILE__) . 'assets/js/bootstrap.min.js', '', '1.0.0',true);
    wp_enqueue_script('freightpop-script-custom', plugin_dir_url(__FILE__) . 'assets/js/custom.js', array('jquery'), '1.0.0',true);
    
    // Generate a nonce and localize it
    wp_localize_script('freightpop-script-custom', 'freightpopVars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'freightpopLoggedin' => wp_create_nonce('freightpop_loggedin_nonce')
    ));
}
add_action('admin_enqueue_scripts', 'enqueue_freightpop_scripts');


function  freightpop_plugin_enqueue_styles() {
    wp_enqueue_style('freight_plugin_styles', plugin_dir_url(__FILE__) . 'assets/css/style.css', '', '1.0.0',false);

    wp_enqueue_style('freight_plugin_bootstrap', plugin_dir_url(__FILE__) . 'assets/css/bootstrap.min.css', '', '1.0.0',false);
}
add_action('init', 'freightpop_plugin_enqueue_styles');


add_action('admin_menu', 'freightpop_menu');

function freightpop_menu() {
    add_menu_page(
        'FreightPOP',   // Page title
        'FreightPOP',   // Menu title
        'manage_options',  // Capability required to access the page
        'freigthpop',    // Menu slug
        'freightpop_main_page', // Callback function to render the page
        '', // Icon URL (optional)
        10  // Position (optional)
    );
}

// Callback function to display the content of the page
function freightpop_main_page() {
    include plugin_dir_path(__FILE__) . 'templates/settings.php';
}

// Enqueue scripts only on the FreightPOP page
add_action('admin_enqueue_scripts', 'freightpop_settings_page');

function freightpop_settings_page($hook) {
    // Ensure you're on the correct admin page
    if ($hook != 'toplevel_page_freigthpop') {
        return;
    }
}



include_once plugin_dir_path(__FILE__) . 'includes/ajax-functions.php';

// Hook into admin notices to display WooCommerce requirement message
add_action('admin_notices', 'freightpop_check_woocommerce_required');

function freightpop_check_woocommerce_required() {
    // Check if WooCommerce is not active
    if (!is_plugin_active('woocommerce/woocommerce.php')) {
        echo '<div class="error"><p><strong>FreightPOP</strong> requires <strong>WooCommerce</strong> to be installed and activated.</p></div>';
    }
}

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    // WooCommerce Shipping option adding code
    include_once plugin_dir_path(__FILE__) . 'includes/class-api-request.php';
    include_once plugin_dir_path(__FILE__) . 'includes/class-shipping-address.php';
    include_once plugin_dir_path(__FILE__) . 'includes/class-store-address.php';
    include_once plugin_dir_path(__FILE__) . 'includes/class-markup-rules.php';
    include_once plugin_dir_path(__FILE__) . 'includes/class-discount-rules.php';

    function freightpop_shipping_method_init() {
        if (!class_exists('freightpop_shipping_method')) {
                
                class freightpop_shipping_method extends WC_Shipping_Method {
                
                    public function __construct() {
                        $this->id                 = 'freightpop_shipping'; // ID for this shipping method
                        $this->method_title       = __('FreightPOP', 'FrieghtPop');
                        $this->method_description = __('FreightPOP Shipping Method Description', 'FrieghtPop');
                        $this->enabled            = "yes"; // Enable or disable
                        $this->title              = __('FreightPOP', 'FrieghtPop'); // Shipping method title
        
                        $this->init();
                    }
        
                    public function init() {
                        // Initialize form fields and settings
                        $this->init_form_fields();
                        $this->init_settings();
                        $this->enabled = $this->get_option( 'enabled' );
                        add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
                    }
                    
                    public function init_form_fields() {
                        // Add a toggle for enabling/disabling the custom shipping
                        $this->form_fields = array(
                            'enabled' => array(
                                'title'   => __( 'Enable/Disable', 'FrieghtPop' ),
                                'type'    => 'checkbox',
                                'label'   => __( 'Enable FreightPop shipping method', 'FrieghtPop' ),
                                'default' => 'yes'
                            ),
                        );
                    }

                    public function convert_dimensions_to_in($dimension, $dimension_unit) {
                        switch ($dimension_unit) {
                            case 'm':
                                return floatval($dimension) * 39.3701; // 1 meter = 39.3701 inches
                            case 'cm':
                                return floatval($dimension) * 0.393701; // 1 cm = 0.393701 inches
                            case 'mm':
                                return floatval($dimension) * 0.0393701; // 1 mm = 0.0393701 inches
                            case 'yd':
                                return floatval($dimension) * 36; // 1 yard = 36 inches
                            default:
                                return $dimension; // Assume already in inches
                        }
                    }
        
                    public function convert_weight_to_lbs($weight, $weight_unit) {
                        switch ($weight_unit) {
                            case 'kg':
                                return floatval($weight) * 2.20462; // 1 kg = 2.20462 lbs
                            case 'g':
                                return floatval($weight) * 0.00220462; // 1 g = 0.00220462 lbs
                            case 'oz':
                                return floatval($weight) * 0.0625; // 1 oz = 0.0625 lbs
                            default:
                                return $weight; // Assume already in lbs
                        }
                    }
                   
                    public function calculate_shipping($package = array()) {  
                        if ($this->enabled !== 'yes') {
                            return;
                        }

                        $api_request = new FreightPop_API_Request();
                        $store_address = new FreightPop_Store_Address();
                        $shipping_address = new FreightPop_Shipping_Address();
                        $markup_rules = new FreightPop_Markup_Rules();
                        $discount_rules = new FreightPop_Discount_Rules();
                    
                        $cart_data = $this->get_cart_data();
                        $product_details = $this->get_product_detail();
                        
                        $shipping_data = $shipping_address->get_shipping_address();                    
                        $current_postcode = $package['destination']['postcode'];
                        
                        // Retrieve stored data from session
                        $stored_postcode = WC()->session->get('custom_shipping_postcode');
                        $stored_rates = WC()->session->get('custom_shipping_rates');
                        $stored_cart_count = WC()->session->get('custom_shipping_cart_count');
                        $current_cart_count = WC()->cart->get_cart_contents_count();
                        
                        if ($shipping_data && !empty($cart_data)) {
                            $markups = $markup_rules->get_markup_rules();
                            $discounts = $discount_rules->get_discount_rules();
                            $store_data = $store_address->get_store_address();
                            // Retrieve settings from the database
                            $ratesToDisplay = $this->get_rates_to_display();
                           
                            $freight_shipping_rates = $this->get_freight_shipping_rates(
                                $current_postcode,
                                $stored_postcode,
                                $stored_rates,
                                $stored_cart_count,
                                $current_cart_count,
                                $cart_data,
                                $product_details,
                                $store_data,
                                $shipping_data
                            );
                            
                            $final_shipping_rate = $this->filter_shipping_rates($freight_shipping_rates, $ratesToDisplay);
                            $this->apply_markup_and_discounts($final_shipping_rate, $markups, $discounts, WC()->cart->get_subtotal());
                        }
                    }
                    
                    private function get_rates_to_display() {
                        global $wpdb;
                        $settings_data = $wpdb->get_results("SELECT * FROM `settings`");
                        foreach ($settings_data as $item) {
                            if (isset($item->ratesToDisplay)) {
                                return $item->ratesToDisplay;
                            }
                        }
                        return '';
                    }
                    
                    private function get_freight_shipping_rates($current_postcode, $stored_postcode, $stored_rates, $stored_cart_count, $current_cart_count, $cart_data, $product_details, $store_data, $shipping_data) {
                        $api_request = new FreightPop_API_Request();
                        $innerPieces = [];
                        if ($current_postcode !== $stored_postcode || !$stored_rates || $current_cart_count !== $stored_cart_count) {
                            $response = $api_request->get_shipment_details($cart_data);
                            foreach ($response['Data'] as $item) {
                                if (isset($item['InnerPieces'])) {
                                    foreach ($item['InnerPieces'] as $innerPiece) {
                                        $innerPieces[] = $innerPiece;
                                    }
                                }
                            }
                            $rate_response = $api_request->get_shipping_rates($innerPieces, $product_details, $store_data, $shipping_data);
                           
                            $freight_shipping_rates = isset($rate_response['Data']['Rates']) ? $rate_response['Data']['Rates'] : [];
                            
                            // Save new rates, postcode, and cart count in session
                            WC()->session->set('custom_shipping_rates', $freight_shipping_rates);
                            WC()->session->set('custom_shipping_postcode', $current_postcode);
                            WC()->session->set('custom_shipping_cart_count', $current_cart_count);
                        } else {
                            $freight_shipping_rates = $stored_rates;
                        }
                    
                        return $freight_shipping_rates;
                    }
                    
                    
                    

                    private function filter_shipping_rates($freight_shipping_rates, $ratesToDisplay) {
                        
                        if ($ratesToDisplay === 'lowest_cost_only') {
                            usort($freight_shipping_rates, fn($a, $b) => $a['BaseRate'] <=> $b['BaseRate']);
                            return array_slice($freight_shipping_rates, 0, 1);
                        } elseif ($ratesToDisplay === 'lowest_cost_per_transit_days') {

                            $lowest_rates_by_days = [];
                            // Loop through the shipping data.
                            foreach ($freight_shipping_rates as $rate) {
                                $delivery_days = $rate['DeliveryDays'];
                                if ($delivery_days < 0) {
                                    continue;
                                }
                                if (!isset($lowest_rates_by_days[$delivery_days]) || $rate['BaseRate'] < $lowest_rates_by_days[$delivery_days]['BaseRate']) {
                                    $lowest_rates_by_days[$delivery_days] = $rate;
                                }
                            }
                            return $lowest_rates_by_days;
                        }
                        return $freight_shipping_rates;
                    }
                    
                    private function apply_markup_and_discounts($shipping_rates, $markups, $discounts, $cart_subtotal_raw) {
                        $index = 0;
                        
                        foreach ($shipping_rates as $data) {
                            $baseAmount = $data['BaseRate'];
                            $baseAmount = $this->apply_markups($baseAmount, $markups);
                            $baseAmount = $this->apply_discounts($baseAmount, $data, $discounts, $cart_subtotal_raw);
                            $deliverydays = $data['DeliveryDays'];
                            if($deliverydays > 0){
                                $days_text = $data['DeliveryDays'] == 1 ? 'Day': 'Days';
                                $label_name = $data['Carrier'] . " (" . $data['Service'] . ") (" . $data['DeliveryDays'] ." ".$days_text.")";
                                $freight_pop_rate = array(
                                    'id'       => $this->id . '_' . $index,
                                    'label'    => $label_name, //$data['Carrier'] . " (" . $data['Service'] . ")",
                                    'cost'     => $baseAmount,
                                    'calc_tax' => 'per_order'
                                );
                                $index++;
                        
                                // Add the rate to WooCommerce
                                $this->add_rate($freight_pop_rate);
                            }
                        }
                    }
                    
                    private function apply_markups($baseAmount, $markups) {
                        foreach ($markups as $markup) {
                            if ($markup->type === 'PERCENTAGE') {
                                $baseAmount += ($baseAmount * $markup->value) / 100;
                            } elseif ($markup->type === 'FIXED_AMOUNT') {
                                $baseAmount += $markup->value;
                            }
                        }
                        return $baseAmount;
                    }
                    
                    private function apply_discounts($baseAmount, $data, $discounts, $cart_subtotal_raw) {
                        foreach ($discounts as $discount) {
                            if ($discount->type === 'PERCENTAGE') {
                                if ($discount->condition === 'No minimum requirements' ||
                                    ($discount->condition === 'Minimum order value' && $cart_subtotal_raw >= $discount->conditionValue) ||
                                    ($discount->condition === 'FreightPOP rate greater than' && $data['BaseRate'] < $discount->conditionValue) ||
                                    ($discount->condition === 'FreightPOP rate less than' && $data['BaseRate'] > $discount->conditionValue)) {
                                    $baseAmount -= ($baseAmount * $discount->value) / 100;
                                }
                            } elseif ($discount->type === 'FIXED_AMOUNT') {
                                if ($discount->condition === 'No minimum requirements' ||
                                    ($discount->condition === 'Minimum order value' && $cart_subtotal_raw >= $discount->conditionValue) ||
                                    ($discount->condition === 'FreightPOP rate greater than' && $data['BaseRate'] < $discount->conditionValue) ||
                                    ($discount->condition === 'FreightPOP rate less than' && $data['BaseRate'] > $discount->conditionValue)) {
                                    $baseAmount -= $discount->value;
                                }
                            }
                        }
                        return $baseAmount;
                    }
                    
                    private function get_cart_data() {
                        global $woocommerce;
                        $cart = WC()->cart->get_cart();
                        $cart_data = [];
                        $weight_unit = get_option('woocommerce_weight_unit', 'kg'); 
                        $dimension_unit = get_option('woocommerce_dimension_unit', 'cm'); 
                        
                        // create cart items as per settings
                        global $wpdb;
                        $settings_data = $wpdb->get_results("SELECT * FROM `settings`", ARRAY_A);
                        $product_settings = $settings_data[0]['productSetting'];


                        foreach ($cart as $cart_item_key => $cart_item) {
                            $product = $cart_item['data'];
                            
                            $convert_weight = $this->convert_weight_to_lbs($product->get_weight(), $weight_unit); 
                            $convert_length = $this->convert_dimensions_to_in($product->get_length(), $dimension_unit);
                            $convert_width = $this->convert_dimensions_to_in($product->get_width(), $dimension_unit);
                            $convert_height = $this->convert_dimensions_to_in($product->get_height(), $dimension_unit);
                            
                            if($product_settings == 'woocommerce_product_settings'){
                                $cart_data[] = array(
                                    "QtyToPack"   => intVal($cart_item['quantity']),
                                    "Item"        => $product->get_name(),
                                    "Description"  => $product->get_name(),
                                    "Length"      => floatval($convert_length),
                                    "Width"       => floatval($convert_width),
                                    "Height"      => floatval($convert_height),
                                    "Weight"      => floatval($convert_weight),
                                    "Unit"        => 2, // kg_cm => 1, lbs_inch => 2
                                    "PackageType" => 2 // Box
                                );
                            }else{
                                $cart_data[] = array(
                                    "QtyToPack" => $cart_item['quantity'],
                                    "Item" => $product->get_name(),
                                    "Description"  => $product->get_name(),
                                    "Sku" => $product->get_sku()
                                );
                            }
                        }
        
                        return $cart_data;
                    }
                    private function get_product_detail() {
                        global $woocommerce;
                        $cart_products = WC()->cart->get_cart();
                        $product_items = [];
                        foreach ($cart_products as $cart_item_key => $cart_item) {
                            $product = $cart_item['data'];
                            $quantity = (int) $cart_item['quantity'];  
                            $price_per_piece = (float) $product->get_price(); 
                            $description = $product->get_short_description(); 
                            $sku = $product->get_sku();  
                            $product_name = $product->get_name();  
                            $product_items[] = array(
                                "Number"        => $product_name,         
                                "SKU"           => $sku,                          
                                "Description"   => $description,          
                                "Quantity"      => $quantity,                              
                                "PricePerPiece" => $price_per_piece,                     
                            );
                        }
        
                        return $product_items;
                    }
                }
        }
    }
    
    function freightpop_add_custom_shipping_method($methods) {
        $methods['freightpop_shipping'] = 'freightpop_shipping_method';
        return $methods;
    }
    
    add_action('woocommerce_shipping_init', 'freightpop_shipping_method_init');
    add_filter('woocommerce_shipping_methods', 'freightpop_add_custom_shipping_method');

    
}

