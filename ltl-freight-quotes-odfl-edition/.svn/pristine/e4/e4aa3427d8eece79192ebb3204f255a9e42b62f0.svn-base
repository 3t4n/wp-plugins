<?php

/**
 * Get Shipping Package Class
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ODFL Initialize
 * @return Shipping carriers
 */
function odfl_logistics_init()
{
    if (!class_exists('ODFL_Freight_Shipping_Class')) {

        /**
         * ODFL Shipping Calculation Class
         */
        class ODFL_Freight_Shipping_Class extends WC_Shipping_Method
        {

            public $forceAllowShipMethod = [];
            public $getPkgObj;
            public $Odfl_Liftgate_As_Option;
            public $instore_pickup_and_local_delivery;
            public $package_plugin;
            public $InstorPickupLocalDelivery;
            public $woocommerce_package_rates;
            public $quote_settings;
            public $web_service_inst;
            public $shipment_type;
            public $accessorials;
            // warehouse appliance
            public $min_prices = [];
            public $minPrices;

            // FDO
            public $en_fdo_meta_data = [];
            public $en_fdo_meta_data_third_party = [];

            /**
             * Woocommerce Shipping Field Attributes
             * @param $instance_id
             */
            public function __construct($instance_id = 0)
            {
                $this->id = 'odfl';
                $this->instance_id = absint($instance_id);
                $this->method_title = __('ODFL Freight');
                $this->method_description = __('Shipping rates from ODFL Freight.');
                $this->supports = array(
                    'shipping-zones',
                    'instance-settings',
                    'instance-settings-modal',
                );
                $this->enabled = "yes";
                $this->title = 'LTL Freight Quotes - ODFL Edition';
                $this->init();
                $this->Odfl_Liftgate_As_Option = new Odfl_Liftgate_As_Option();
            }

            /**
             * Init
             */
            function init()
            {
                $this->init_form_fields();
                $this->init_settings();
                add_action('woocommerce_update_options_shipping_' . $this->id, array($this, 'process_admin_options'));
            }

            /**
             * Enable Woocommerce Shipping For ODFL
             */
            function init_form_fields()
            {
                $this->instance_form_fields = array(
                    'enabled' => array(
                        'title' => __('Enable / Disable', 'odfl'),
                        'type' => 'checkbox',
                        'label' => __('Enable This Shipping Service', 'odfl'),
                        'default' => 'no',
                        'id' => 'odfl_enable_disable_shipping'
                    )
                );
            }

            public function forceAllowShipMethod($forceShowMethods)
            {
                if (!empty($this->getPkgObj->ValidShipmentsArrOdfl) && (!in_array("ltl_freight", $this->getPkgObj->ValidShipmentsArrOdfl))) {
                    $this->forceAllowShipMethod[] = "free_shipping";
                    $this->forceAllowShipMethod[] = "valid_third_party";
                } else {
                    $this->forceAllowShipMethod[] = "ltl_shipment";
                }

                $forceShowMethods = array_merge($forceShowMethods, $this->forceAllowShipMethod);
                return $forceShowMethods;
            }

            /**
             * Virtual Products
             */
            public function en_virtual_products()
            {
                global $woocommerce;
                $products = $woocommerce->cart->get_cart();
                $items = $product_name = [];
                foreach ($products as $key => $product_obj) {
                    $product = $product_obj['data'];
                    $is_virtual = $product->get_virtual();

                    if ($is_virtual == 'yes') {
                        $attributes = $product->get_attributes();
                        $product_qty = $product_obj['quantity'];
                        $product_title = str_replace(array("'", '"'), '', $product->get_title());
                        $product_name[] = $product_qty . " x " . $product_title;

                        $meta_data = [];
                        if (!empty($attributes)) {
                            foreach ($attributes as $attr_key => $attr_value) {
                                $meta_data[] = [
                                    'key' => $attr_key,
                                    'value' => $attr_value,
                                ];
                            }
                        }

                        $items[] = [
                            'id' => $product_obj['product_id'],
                            'name' => $product_title,
                            'quantity' => $product_qty,
                            'price' => $product->get_price(),
                            'weight' => 0,
                            'length' => 0,
                            'width' => 0,
                            'height' => 0,
                            'type' => 'virtual',
                            'product' => 'virtual',
                            'sku' => $product->get_sku(),
                            'attributes' => $attributes,
                            'variant_id' => 0,
                            'meta_data' => $meta_data,
                        ];
                    }
                }

                $virtual_rate = [];

                if (!empty($items)) {
                    $virtual_rate = [
                        'id' => 'en_virtual_rate',
                        'label' => 'Virtual Quote',
                        'cost' => 0,
                    ];

                    $virtual_fdo = [
                        'plugin_type' => 'ltl',
                        'plugin_name' => 'odfl4me',
                        'accessorials' => '',
                        'items' => $items,
                        'address' => '',
                        'handling_unit_details' => '',
                        'rate' => $virtual_rate,
                    ];

                    $meta_data = [
                        'sender_origin' => 'Virtual Product',
                        'product_name' => wp_json_encode($product_name),
                        'en_fdo_meta_data' => $virtual_fdo,
                    ];

                    $virtual_rate['meta_data'] = $meta_data;

                }

                return $virtual_rate;
            }

            /**
             * Calculate Shipping Rates For ODFL
             * @param string $package
             * @return boolean|string
             */
            public function calculate_shipping($package = [], $eniture_admin_order_action = false)
            {
                if (is_admin() && !wp_doing_ajax() && !$eniture_admin_order_action) {
                    return [];
                }

                $coupn = WC()->cart->get_coupons();
                if (isset($coupn) && !empty($coupn)) {
                    $freeShipping = $this->odfl_freight_free_shipping($coupn);
                    if ($freeShipping == 'y')
                        return FALSE;
                }

                $this->package_plugin = get_option('odfl_quotes_package');

                $this->instore_pickup_and_local_delivery = FALSE;

                $odfl_woo_obj = new ODFL_Woo_Update_Changes();
                $freight_zipcode = "";
                (strlen(WC()->customer->get_shipping_postcode()) > 0) ? $freight_zipcode = WC()->customer->get_shipping_postcode() : $freight_zipcode = $odfl_woo_obj->odfl_postcode();
                $obj = new ODFL_Shipping_Get_Package();
                $this->getPkgObj = $obj;

                $odfl_res_inst = new ODFL_Get_Shipping_Quotes();
                $this->web_service_inst = $odfl_res_inst;

                $this->odfl_ltl_shipping_quote_settings();

                 // -100% Handling Fee
                 if (isset($this->web_service_inst->quote_settings['handling_fee']) &&
                 ($this->web_service_inst->quote_settings['handling_fee'] == "-100%")) {
                        $rates = array(
                            'id' => $this->id . ':' . 'free',
                            'label' => 'Free Shipping',
                            'cost' => 0,
                            'plugin_name' => 'odfl4me',
                            'plugin_type' => 'ltl',
                            'owned_by' => 'eniture'
                        );
                        $this->add_rate($rates);
                        
                        return [];
                }

                $odfl_package = $obj->group_odfl_shipment($package, $odfl_res_inst, $freight_zipcode);
                $shipping_rule_obj = new EnOdflShippingRulesAjaxReq();
                $shipping_rules_applied = $shipping_rule_obj->apply_shipping_rules($odfl_package);
                if ($shipping_rules_applied) {
                    return [];
                }
                $handlng_fee = get_option('odfl_handling_fee');
                $quotes = [];
                $rate = [];

                add_filter('force_show_methods', array($this, 'forceAllowShipMethod'));

                if (isset($odfl_package['error'])) {
                    return 'error';
                }

                $eniturePluigns = json_decode(get_option('EN_Plugins'));
                $calledMethod = [];
                $smallPluginExist = 0;
                $smallQuotes = [];
                $ltl_products = $small_products = [];

                if (isset($odfl_package) && !empty($odfl_package)) {
                    $test_connection_zipcode = get_option('billing_zip_code_key_odfl');
                    foreach ($odfl_package as $locId => $sPackage) {
                        if (array_key_exists('odfl', $sPackage)) {
                            $ltl_products[] = $sPackage;
                            $origin_specific_account = isset($sPackage['origin']['odfl_account']) ? $sPackage['origin']['odfl_account'] : '';
                            $origin_zip = isset($sPackage['origin']['zip']) ? $sPackage['origin']['zip'] : '';
                            $web_service_arr = $odfl_res_inst->odfl_shipping_array($sPackage, $this->package_plugin);
                            $response = $odfl_res_inst->odfl_get_web_quotes($web_service_arr, $odfl_package, $locId);

                            // Add backup rates in the shipping rates
                            if ((empty($response) && get_option('odfl_backup_rates_carrier_returns_error') == 'yes') || (is_array($response) && isset($response['error']) && $response['error'] == 'backup_rate' && get_option('odfl_backup_rates_carrier_fails_to_return_response') == 'yes')) {
                                $this->odfl_backup_rates();
                                return [];
                            }

                            if (empty($response)) {
                                return [];
                            }

                            $quotes[] = $response;
                            continue;
                        } elseif (array_key_exists('small', $sPackage)) {
                            $small_products[] = $sPackage;
                        }
                    }

                    if (isset($small_products) && !empty($small_products) && !empty($ltl_products)) {
                        foreach ($eniturePluigns as $enIndex => $enPlugin) {
                            $freightSmallClassName = 'WC_' . $enPlugin;
                            if (!in_array($freightSmallClassName, $calledMethod)) {
                                if (class_exists($freightSmallClassName)) {
                                    $smallPluginExist = 1;
                                    $SmallClassNameObj = new $freightSmallClassName();
                                    $package['itemType'] = 'ltl';
                                    $package['sPackage'] = $small_products;

                                    $smallQuotesResponse = $SmallClassNameObj->calculate_shipping($package, true);
                                    $smallQuotes[] = $smallQuotesResponse;
                                }
                                $calledMethod[] = $freightSmallClassName;
                            }
                        }
                    }
                }

                $smallQuotes = (is_array($smallQuotes) && (!empty($smallQuotes))) ? reset($smallQuotes) : $smallQuotes;
                $smallMinRate = (is_array($smallQuotes) && (!empty($smallQuotes))) ? current($smallQuotes) : $smallQuotes;
                // Virtual products
                $virtual_rate = $this->en_virtual_products();
                // FDO
                if (isset($smallMinRate['meta_data']['en_fdo_meta_data'])) {

                    if (!empty($smallMinRate['meta_data']['en_fdo_meta_data']) && !is_array($smallMinRate['meta_data']['en_fdo_meta_data'])) {
                        $en_third_party_fdo_meta_data = json_decode($smallMinRate['meta_data']['en_fdo_meta_data'], true);
                        isset($en_third_party_fdo_meta_data['data']) ? $smallMinRate['meta_data']['en_fdo_meta_data'] = $en_third_party_fdo_meta_data['data'] : '';
                    }
                    $this->en_fdo_meta_data_third_party = (isset($smallMinRate['meta_data']['en_fdo_meta_data']['address'])) ? [$smallMinRate['meta_data']['en_fdo_meta_data']] : $smallMinRate['meta_data']['en_fdo_meta_data'];
                }

                $smpkgCost = (isset($smallMinRate['cost'])) ? $smallMinRate['cost'] : 0;

                if (isset($smallMinRate) && (!empty($smallMinRate))) {
                    switch (TRUE) {
                        case (isset($smallMinRate['minPrices'])):
                            $small_quotes = $smallMinRate['minPrices'];
                            break;
                        default :
                            $shipment_zipcode = key($smallQuotes);
                            $small_quotes = array($shipment_zipcode => $smallMinRate);
                            break;
                    }
                }

                $this->quote_settings = $this->web_service_inst->quote_settings;
                $handling_fee = $this->quote_settings['handling_fee'];
                $this->accessorials = [];

                ($this->quote_settings['liftgate_delivery'] == "yes") ? $this->accessorials[] = "L" : "";
                ($this->quote_settings['residential_delivery'] == "yes") ? $this->accessorials[] = "R" : "";
                $rates = [];
                if (count($quotes) > 1 || $smpkgCost > 0 || !empty($virtual_rate)) {

                    $multi_cost = 0;
                    $s_multi_cost = 0;
                    $inside_multi_cost = 0;
                    $lfg_ins_multi_cost = 0;
                    $hold_at_terminal_fee = 0;
                    $_label = "";
                    $this->minPrices = [];

                    $this->quote_settings['shipment'] = "multi_shipment";
                    $shipment_numbers = 0;

                    (isset($small_quotes) && count($small_quotes) > 0) ? $this->minPrices['EN_ODFL_LIFT'] = $small_quotes : "";
                    (isset($small_quotes) && count($small_quotes) > 0) ? $this->minPrices['EN_ODFL_NOTLIFT'] = $small_quotes : "";
                    (isset($small_quotes) && count($small_quotes) > 0) ? $this->minPrices['EN_ODFL_HAT'] = $small_quotes : "";
                    (isset($small_quotes) && count($small_quotes) > 0) ? $this->minPrices['EN_ODFL_INSIDE'] = $small_quotes : "";
                    (isset($small_quotes) && count($small_quotes) > 0) ? $this->minPrices['EN_ODFL_LIFT_INSIDE'] = $small_quotes : "";

                    // Virtual products
                    if (!empty($virtual_rate)) {
                        $en_virtual_fdo_meta_data[] = $virtual_rate['meta_data']['en_fdo_meta_data'];
                        $virtual_meta_rate['virtual_rate'] = $virtual_rate;
                        $this->minPrices['EN_ODFL_LIFT'] = isset($this->minPrices['EN_ODFL_LIFT']) && !empty($this->minPrices['EN_ODFL_LIFT']) ? array_merge($this->minPrices['EN_ODFL_LIFT'], $virtual_meta_rate) : $virtual_meta_rate;
                        $this->minPrices['EN_ODFL_NOTLIFT'] = isset($this->minPrices['EN_ODFL_NOTLIFT']) && !empty($this->minPrices['EN_ODFL_NOTLIFT']) ? array_merge($this->minPrices['EN_ODFL_NOTLIFT'], $virtual_meta_rate) : $virtual_meta_rate;
                        // inside delivery
                        $this->minPrices['EN_ODFL_INSIDE'] = isset($this->minPrices['EN_ODFL_INSIDE']) && !empty($this->minPrices['EN_ODFL_INSIDE']) ? array_merge($this->minPrices['EN_ODFL_INSIDE'], $virtual_meta_rate) : $virtual_meta_rate;
                        $this->minPrices['EN_ODFL_LIFT_INSIDE'] = isset($this->minPrices['EN_ODFL_LIFT_INSIDE']) && !empty($this->minPrices['EN_ODFL_LIFT_INSIDE']) ? array_merge($this->minPrices['EN_ODFL_LIFT_INSIDE'], $virtual_meta_rate) : $virtual_meta_rate;

                        $this->en_fdo_meta_data_third_party = !empty($this->en_fdo_meta_data_third_party) ? array_merge($this->en_fdo_meta_data_third_party, $en_virtual_fdo_meta_data) : $en_virtual_fdo_meta_data;
                        if ($this->quote_settings['HAT_status'] == 'yes') {
                            $this->minPrices['EN_ODFL_HAT'] = isset($this->minPrices['EN_ODFL_HAT']) && !empty($this->minPrices['EN_ODFL_HAT']) ? array_merge($this->minPrices['EN_ODFL_HAT'], $virtual_meta_rate) : $virtual_meta_rate;
                        }
                    }
                    foreach ($quotes as $key => $quote) {
                        if (!empty($quote)) {

                            $key = "LTL_" . $key;

                            if (isset($quote['hold_at_terminal_quotes'])) {
                                $hold_at_terminal_quotes = $quote['hold_at_terminal_quotes'];

                                $this->minPrices['EN_ODFL_HAT'][$key] = $hold_at_terminal_quotes;

                                // product level markup
                                if(!empty($hold_at_terminal_quotes['product_level_markup']) && !empty($hold_at_terminal_quotes['cost'])){
                                    $hold_at_terminal_quotes['cost'] = $this->web_service_inst->add_handling_fee($hold_at_terminal_quotes['cost'], $hold_at_terminal_quotes['product_level_markup']);
                                }

                                // origin level markup
                                if(!empty($hold_at_terminal_quotes['origin_markup']) && !empty($hold_at_terminal_quotes['cost'])){
                                    $hold_at_terminal_quotes['cost'] = $this->web_service_inst->add_handling_fee($hold_at_terminal_quotes['cost'], $hold_at_terminal_quotes['origin_markup']);
                                }

                                $hold_at_terminal_quotes['meta_data']['en_fdo_meta_data']['rate']['cost'] = $hold_at_terminal_quotes['cost'];
                                // FDO
                                $this->en_fdo_meta_data['EN_ODFL_HAT'][$key] = (isset($hold_at_terminal_quotes['meta_data']['en_fdo_meta_data'])) ? $hold_at_terminal_quotes['meta_data']['en_fdo_meta_data'] : [];

                                $hold_at_terminal_fee += (isset($hold_at_terminal_quotes['cost'])) ? $hold_at_terminal_quotes['cost'] : 0;

                                unset($quote['hold_at_terminal_quotes']);
                                $append_hat_label = (isset($hold_at_terminal_quotes['hat_append_label'])) ? $hold_at_terminal_quotes['hat_append_label'] : "";
                                $append_hat_label = (isset($hold_at_terminal_quotes['_hat_append_label']) && (strlen($append_hat_label) > 0)) ? $append_hat_label . $hold_at_terminal_quotes['_hat_append_label'] : $append_hat_label;
                                $hat_label = [];
                            }

                            $simple_quotes = (isset($quote['simple_quotes'])) ? $quote['simple_quotes'] : [];
                            $quote = $this->remove_array($quote, 'simple_quotes');
                            $inside_quotes = (isset($quote['inside_delivery_quotes'])) ? $quote['inside_delivery_quotes'] : [];
                            $quote = $this->remove_array($quote, 'inside_delivery_quotes');
                            $lfg_ins_quotes = (isset($quote['lift_and_ins_quotes'])) ? $quote['lift_and_ins_quotes'] : [];
                            $quote = $this->remove_array($quote, 'lift_and_ins_quotes');

                            $rates = (is_array($quote) && (!empty($quote))) ? $quote : [];

                            $this->minPrices['EN_ODFL_LIFT'][$key] = $rates;

                            // FDO
                            $this->en_fdo_meta_data['EN_ODFL_LIFT'][$key] = (isset($rates['meta_data']['en_fdo_meta_data'])) ? $rates['meta_data']['en_fdo_meta_data'] : [];

                            $_cost = (isset($rates['cost'])) ? $rates['cost'] : 0;

                            $_label = (isset($rates['label_sufex'])) ? $rates['label_sufex'] : [];
                            $append_label = (isset($rates['append_label'])) ? $rates['append_label'] : "";
                            $handling_fee = (isset($rates['markup']) && (strlen($rates['markup']) > 0)) ? $rates['markup'] : $handling_fee;

                            // Offer lift gate delivery as an option is enabled
                            if (isset($this->quote_settings['liftgate_delivery_option']) &&
                                ($this->quote_settings['liftgate_delivery_option'] == "yes") &&
                                (!empty($simple_quotes))) {

                                $s_rates = $simple_quotes;
                                $this->minPrices['EN_ODFL_NOTLIFT'][$key] = $s_rates;

                                $this->en_fdo_meta_data['EN_ODFL_NOTLIFT'][$key] = (isset($s_rates['meta_data']['en_fdo_meta_data'])) ? $s_rates['meta_data']['en_fdo_meta_data'] : [];

                                $s_cost = (isset($s_rates['cost'])) ? $s_rates['cost'] : 0;
                                $s_label = (isset($s_rates['label_sufex'])) ? $s_rates['label_sufex'] : [];
                                $s_append_label = (isset($s_rates['append_label'])) ? $s_rates['append_label'] : "";

                                // product level markup
                                if(!empty($s_rates['product_level_markup'])){
                                    $s_cost = $this->web_service_inst->add_handling_fee($s_cost, $s_rates['product_level_markup']);
                                }

                                // origin level markup
                                if(!empty($s_rates['origin_markup'])){
                                    $s_cost = $this->web_service_inst->add_handling_fee($s_cost, $s_rates['origin_markup']);
                                }

                                $s_multi_cost += $this->web_service_inst->add_handling_fee($s_cost, $handling_fee);
                                $this->minPrices['EN_ODFL_NOTLIFT'][$key]['cost'] = $this->web_service_inst->add_handling_fee($s_cost, $handling_fee);
                                $this->minPrices['EN_ODFL_NOTLIFT'][$key]['meta_data']['en_fdo_meta_data']['rate']['cost'] = $this->en_fdo_meta_data['EN_ODFL_NOTLIFT'][$key]['rate']['cost'] = $this->minPrices['EN_ODFL_NOTLIFT'][$key]['cost'];
                            }

                            // Offer inside delivery as an option is enabled
                            if (isset($this->quote_settings['inside_delivery_option']) &&
                                ($this->quote_settings['inside_delivery_option'] == "yes") &&
                                (!empty($inside_quotes))) {

                                $i_rates = $inside_quotes;
                                $this->minPrices['EN_ODFL_INSIDE'][$key] = $i_rates;

                                $this->en_fdo_meta_data['EN_ODFL_INSIDE'][$key] = (isset($i_rates['meta_data']['en_fdo_meta_data'])) ? $i_rates['meta_data']['en_fdo_meta_data'] : [];

                                $i_cost = (isset($i_rates['cost'])) ? $i_rates['cost'] : 0;
                                $i_label = (isset($i_rates['label_sufex'])) ? $i_rates['label_sufex'] : [];
                                $i_append_label = (isset($i_rates['append_label'])) ? $i_rates['append_label'] : "";

                                // product level markup
                                if (!empty($i_rates['product_level_markup'])) {
                                    $i_cost = $this->web_service_inst->add_handling_fee($i_cost, $i_rates['product_level_markup']);
                                }

                                // origin level markup
                                if (!empty($i_rates['origin_markup'])) {
                                    $i_cost = $this->web_service_inst->add_handling_fee($i_cost, $i_rates['origin_markup']);
                                }

                                $inside_multi_cost += $this->web_service_inst->add_handling_fee($i_cost, $handling_fee);
                                $this->minPrices['EN_ODFL_INSIDE'][$key]['cost'] = $this->web_service_inst->add_handling_fee($i_cost, $handling_fee);
                                $this->minPrices['EN_ODFL_INSIDE'][$key]['meta_data']['en_fdo_meta_data']['rate']['cost'] = $this->en_fdo_meta_data['EN_ODFL_INSIDE'][$key]['rate']['cost'] = $this->minPrices['EN_ODFL_INSIDE'][$key]['cost'];
                            }

                            // Offer liftgate and inside delivery as an option is enabled
                            if (isset($this->quote_settings['liftgate_delivery_option']) &&
                                ($this->quote_settings['liftgate_delivery_option'] == "yes") &&
                                (isset($this->quote_settings['inside_delivery_option']) && ($this->quote_settings['inside_delivery_option'] == "yes")) &&
                                (!empty($lfg_ins_quotes))) {

                                $lfg_ins_rates = $lfg_ins_quotes;
                                $this->minPrices['EN_ODFL_LIFT_INSIDE'][$key] = $lfg_ins_rates;

                                $this->en_fdo_meta_data['EN_ODFL_LIFT_INSIDE'][$key] = (isset($lfg_ins_rates['meta_data']['en_fdo_meta_data'])) ? $lfg_ins_rates['meta_data']['en_fdo_meta_data'] : [];

                                $lfg_ins_cost = (isset($lfg_ins_rates['cost'])) ? $lfg_ins_rates['cost'] : 0;
                                $lfg_ins_label = (isset($lfg_ins_rates['label_sufex'])) ? $lfg_ins_rates['label_sufex'] : [];
                                $lfg_ins_append_label = (isset($lfg_ins_rates['append_label'])) ? $lfg_ins_rates['append_label'] : "";

                                // product level markup
                                if (!empty($lfg_ins_rates['product_level_markup'])) {
                                    $lfg_ins_cost = $this->web_service_inst->add_handling_fee($lfg_ins_cost, $lfg_ins_rates['product_level_markup']);
                                }

                                // origin level markup
                                if (!empty($lfg_ins_rates['origin_markup'])) {
                                    $lfg_ins_cost = $this->web_service_inst->add_handling_fee($lfg_ins_cost, $lfg_ins_rates['origin_markup']);
                                }

                                $lfg_ins_multi_cost += $this->web_service_inst->add_handling_fee($lfg_ins_cost, $handling_fee);
                                $this->minPrices['EN_ODFL_LIFT_INSIDE'][$key]['cost'] = $this->web_service_inst->add_handling_fee($lfg_ins_cost, $handling_fee);
                                $this->minPrices['EN_ODFL_LIFT_INSIDE'][$key]['meta_data']['en_fdo_meta_data']['rate']['cost'] = $this->en_fdo_meta_data['EN_ODFL_LIFT_INSIDE'][$key]['rate']['cost'] = $this->minPrices['EN_ODFL_LIFT_INSIDE'][$key]['cost'];
                            }

                            // product level markup
                            if(!empty($rates['product_level_markup'])){
                                $_cost = $this->web_service_inst->add_handling_fee($_cost, $rates['product_level_markup']);
                            }

                            // origin level markup
                            if(!empty($rates['origin_markup'])){
                                $_cost = $this->web_service_inst->add_handling_fee($_cost, $rates['origin_markup']);
                            }

                            $multi_cost += $this->web_service_inst->add_handling_fee($_cost, $handling_fee);

                            $this->minPrices['EN_ODFL_LIFT'][$key]['cost'] = $this->web_service_inst->add_handling_fee($_cost, $handling_fee);
                            $this->minPrices['EN_ODFL_LIFT'][$key]['meta_data']['en_fdo_meta_data']['rate']['cost'] = $this->en_fdo_meta_data['EN_ODFL_LIFT'][$key]['rate']['cost'] = $this->minPrices['EN_ODFL_LIFT'][$key]['cost'];
                            $shipment_numbers++;
                        }
                    }

                    $this->quote_settings['shipment_numbers'] = $shipment_numbers;

                    ($s_multi_cost > 0) ? $rate[] = $this->arrange_multiship_freight(($s_multi_cost + $smpkgCost), 'EN_ODFL_NOTLIFT', $s_label, $s_append_label) : "";

                    // Excluded accessorials
                    $en_accessorial_excluded = apply_filters('en_odfl_accessorial_excluded', []);
                    if ($s_multi_cost > 0 && !empty($en_accessorial_excluded) && in_array('liftgateResidentialExcluded', $en_accessorial_excluded)) {
                        $multi_cost = 0;
                    }

                    ($multi_cost > 0 || $smpkgCost > 0) ? $rate[] = $this->arrange_multiship_freight(($multi_cost + $smpkgCost), 'EN_ODFL_LIFT', $_label, $append_label) : "";
                    ($hold_at_terminal_fee > 0) ? $rate[] = $this->arrange_multiship_freight(($hold_at_terminal_fee + $smpkgCost), 'EN_ODFL_HAT', $hat_label, $append_hat_label) : "";
                    $rates = $rate;
                    // inside delivery quotes
                    ($inside_multi_cost > 0) ? $rates[] = $this->arrange_multiship_freight(($inside_multi_cost + $smpkgCost), 'EN_ODFL_INSIDE', $i_label, $i_append_label) : "";
                    ($lfg_ins_multi_cost > 0 && $multi_cost > 0) ? $rates[] = $this->arrange_multiship_freight(($lfg_ins_multi_cost + $smpkgCost), 'EN_ODFL_LIFT_INSIDE', $lfg_ins_label, $lfg_ins_append_label) : "";

                    $this->shipment_type = 'multiple';
                } else {

                    $quote = (is_array($quotes) && (!empty($quotes))) ? reset($quotes) : [];

                    if (!empty($quote)) {
                        $rates = [];
                        $simple_quotes = (isset($quote['simple_quotes'])) ? $quote['simple_quotes'] : [];
                        $rates[] = $this->remove_array($quote, 'simple_quotes');
                        $inside_delivery_quotes = (isset($quote['inside_delivery_quotes'])) ? $quote['inside_delivery_quotes'] : [];
                        $rates[] = $this->remove_array($quote, 'inside_delivery_quotes');
                        $lfg_ins_quotes = (isset($quote['lift_and_ins_quotes'])) ? $quote['lift_and_ins_quotes'] : [];
                        $rates[] = $this->remove_array($quote, 'lift_and_ins_quotes');

                        // Offer lift gate delivery as an option is enabled
                        if (isset($this->quote_settings['liftgate_delivery_option']) &&
                            ($this->quote_settings['liftgate_delivery_option'] == "yes") &&
                            (!empty($simple_quotes))) {
                            $rates[] = $simple_quotes;

                            // Offer lift and inside delivery as an option is enabled
                            if (isset($this->quote_settings['inside_delivery_option']) &&
                                ($this->quote_settings['inside_delivery_option'] == "yes") &&
                                (!empty($lfg_ins_quotes))) {
                                $rates[] = $lfg_ins_quotes;
                            }
                        }

                        // Offer inside delivery as an option is enabled
                        if (isset($this->quote_settings['inside_delivery_option']) &&
                            ($this->quote_settings['inside_delivery_option'] == "yes") &&
                            (!empty($inside_delivery_quotes))) {
                            $rates[] = $inside_delivery_quotes;
                        }

                        if (isset($quote['hold_at_terminal_quotes'])) {
                            $rates[] = $quote['hold_at_terminal_quotes'];
                            unset($quote['hold_at_terminal_quotes']);
                        }

                        $cost_sorted_key = [];

                        $this->quote_settings['shipment'] = "single_shipment";
                        $this->quote_settings['shipment_numbers'] = "1";

                        if (is_array($rates) && (!empty($rates))) {
                            foreach ($rates as $key => $quote) {
                                $handling_fee = (isset($rates['markup']) && (strlen($rates['markup']) > 0)) ? $rates['markup'] : $handling_fee;
                                $_cost = (isset($quote['cost'])) ? $quote['cost'] : 0;

                                // product level markup
                                if(!empty($quote['product_level_markup'])){
                                    $_cost = $this->web_service_inst->add_handling_fee($_cost, $quote['product_level_markup']);
                                }
                                
                                // origin level markup
                                if(!empty($quote['origin_markup'])){
                                    $_cost = $this->web_service_inst->add_handling_fee($_cost, $quote['origin_markup']);
                                }

                                if (isset($quote['hat_append_label'])) {
                                    $rates[$key]['cost'] = $_cost;
                                    $rates[$key]['meta_data']['en_fdo_meta_data']['rate']['cost'] = $_cost;
                                }else{
                                    $rates[$key]['cost'] = $this->web_service_inst->add_handling_fee($_cost, $handling_fee);
                                    $rates[$key]['meta_data']['en_fdo_meta_data']['rate']['cost'] = $rates[$key]['cost'];
                                }
                                $cost_sorted_key[$key] = (isset($quote['cost'])) ? $quote['cost'] : 0;
                                (isset($rates[$key]['shipment'])) ? $rates[$key]['shipment'] = "single_shipment" : "";
                            }

                            // Array_multisort
                            array_multisort($cost_sorted_key, SORT_ASC, $rates);

                        }
                    }


                    $this->shipment_type = 'single';
                }

                if (isset($rates) && !empty($rates)) {
                    $rates = $this->sort_asec_order_arr($rates);
                }

                if (isset($rates)) {
                    $this->InstorPickupLocalDelivery = $this->web_service_inst->odfl_quotes_return_local_delivery_store_pickup();
                    $rates = $this->odfl_add_rate_arr($rates);
                    // Origin terminal address
                    if ($this->shipment_type == 'single') {
                        (isset($this->InstorPickupLocalDelivery->localDelivery) && ($this->InstorPickupLocalDelivery->localDelivery->status == 1)) ? $this->local_delivery($this->web_service_inst->en_wd_origin_array['fee_local_delivery'], $this->web_service_inst->en_wd_origin_array['checkout_desc_local_delivery'], $this->web_service_inst->en_wd_origin_array) : "";
                        (isset($this->InstorPickupLocalDelivery->inStorePickup) && ($this->InstorPickupLocalDelivery->inStorePickup->status == 1)) ? $this->pickup_delivery($this->web_service_inst->en_wd_origin_array['checkout_desc_store_pickup'], $this->web_service_inst->en_wd_origin_array, $this->InstorPickupLocalDelivery->totalDistance) : "";
                    }
                }

                return $rates;
            }

            /**
             * Multishipment
             * @return array
             */
            function arrange_multiship_freight($cost, $id, $label_sufex, $append_label)
            {
                $multiship = array(
                    'id' => $id,
                    'label' => "Freight",
                    'cost' => $cost,
                    'label_sufex' => $label_sufex,
                    'plugin_name' => 'odfl4me',
                    'plugin_type' => 'ltl',
                    'owned_by' => 'eniture'
                );
                ($id == 'EN_ODFL_HAT') ? $multiship['hat_append_label'] = $append_label : $multiship['append_label'] = $append_label;
                return $multiship;
            }

            /**
             * Remove array
             * @return array
             */
            public function remove_array($quote, $remove_index)
            {
                unset($quote[$remove_index]);

                return $quote;
            }

            /**
             * quote settings array
             * @global $wpdb $wpdb
             */
            function odfl_ltl_shipping_quote_settings()
            {
                $this->web_service_inst->quote_settings['label_as'] = get_option('odfl_label_as');
                $this->web_service_inst->quote_settings['handling_fee'] = get_option('odfl_handling_fee');
                $this->web_service_inst->quote_settings['liftgate_delivery'] = get_option('odfl_liftgate');
                $this->web_service_inst->quote_settings['liftgate_delivery_option'] = get_option('odfl_quotes_liftgate_delivery_as_option');
                $this->web_service_inst->quote_settings['residential_delivery'] = get_option('odfl_residential');
                $this->web_service_inst->quote_settings['liftgate_resid_delivery'] = get_option('en_woo_addons_liftgate_with_auto_residential');
                // $this->web_service_inst->quote_settings['delivery_estimates'] = get_option('odfl_delivey_estimate');
                // Inside delivery
                $this->web_service_inst->quote_settings['inside_delivery'] = get_option('odfl_accessorial_inside_delivery');
                $this->web_service_inst->quote_settings['inside_delivery_option'] = get_option('odfl_inside_delivery_as_option');
                // Cuttoff Time
                $this->web_service_inst->quote_settings['delivery_estimates'] = get_option('odfl_delivery_estimates');
                $this->web_service_inst->quote_settings['orderCutoffTime'] = get_option('odfl_freight_order_cut_off_time');
                $this->web_service_inst->quote_settings['shipmentOffsetDays'] = get_option('odfl_freight_shipment_offset_days');

                $this->web_service_inst->quote_settings['HAT_status'] = get_option('odfl_freight_hold_at_terminal_checkbox_status');
                $this->web_service_inst->quote_settings['HAT_fee'] = get_option('odfl_freight_hold_at_terminal_fee');
                $this->web_service_inst->quote_settings['handling_weight'] = get_option('handling_weight_odfl');
                $this->web_service_inst->quote_settings['maximum_handling_weight'] = get_option('maximum_handling_weight_odfl');
            }

            /**
             * sort array
             * @param array type $rate
             * @return array type
             */
            public function sort_asec_order_arr($rate)
            {
                $price_sorted_key = [];
                foreach ($rate as $key => $cost_carrier) {
                    $price_sorted_key[$key] = (isset($cost_carrier['cost'])) ? $cost_carrier['cost'] : 0;
                }
                array_multisort($price_sorted_key, SORT_ASC, $rate);

                return $rate;
            }

            /**
             * rates to add_rate woocommerce
             * @param array type $add_rate_arr
             */
            public function odfl_add_rate_arr($add_rate_arr)
            {
                if (isset($add_rate_arr) && (!empty($add_rate_arr)) && (is_array($add_rate_arr))) {

                    // Images for FDO
                    $image_urls = apply_filters('en_fdo_image_urls_merge', []);

                    $en_check_action_warehouse_appliance = apply_filters('en_check_action_warehouse_appliance', FALSE);
                    // In-store pickup and local delivery
                    add_filter('woocommerce_package_rates', array($this, 'en_sort_woocommerce_available_shipping_methods'), 10, 2);
                    $instore_pickup_local_devlivery_action = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'instore_pickup_local_devlivery');

                    foreach ($add_rate_arr as $key => $rate) {

                        $rate['label'] = $this->set_label_in_quote($rate);
                        if (isset($rate['meta_data']['en_fdo_meta_data']['rate']['label']) || empty($rate['meta_data']['en_fdo_meta_data']['rate']['label'])) {
                            $rate['meta_data']['en_fdo_meta_data']['rate']['label'] = $rate['label'];
                        }

                        if (isset($rate['meta_data'])) {
                            $rate['meta_data']['label_sufex'] = (isset($rate['label_sufex'])) ? json_encode($rate['label_sufex']) : [];
                        }

                        // warehouse appliance
                        $en_check_action_warehouse_appliance = apply_filters('en_check_action_warehouse_appliance', FALSE);
                        if ($this->shipment_type == 'multiple' && $en_check_action_warehouse_appliance && !empty($this->min_prices)) {
                            $rate['meta_data']['min_quotes'] = $this->min_prices;
                        }

                        if (isset($rate['id'], $this->minPrices[$rate['id']])) {
                            $rate['meta_data']['min_prices'] = json_encode($this->minPrices[$rate['id']]);
                            $rate['meta_data']['en_fdo_meta_data']['data'] = array_values($this->en_fdo_meta_data[$rate['id']]);
                            (!empty($this->en_fdo_meta_data_third_party)) ? $rate['meta_data']['en_fdo_meta_data']['data'] = array_merge($rate['meta_data']['en_fdo_meta_data']['data'], $this->en_fdo_meta_data_third_party) : '';
                            $rate['meta_data']['en_fdo_meta_data']['shipment'] = 'multiple';
                            $rate['meta_data']['en_fdo_meta_data'] = wp_json_encode($rate['meta_data']['en_fdo_meta_data']);
                        } else {
                            $en_set_fdo_meta_data['data'] = isset($rate['meta_data'], $rate['meta_data']['en_fdo_meta_data']) ? [$rate['meta_data']['en_fdo_meta_data']] : [];
                            $en_set_fdo_meta_data['shipment'] = 'sinlge';
                            $rate['meta_data']['en_fdo_meta_data'] = json_encode($en_set_fdo_meta_data);
                        }

                        // Images for FDO
                        $rate['meta_data']['en_fdo_image_urls'] = wp_json_encode($image_urls);
                        $override_rates = isset($rate['override_rates']) ? $rate['override_rates'] : false;
                        $rate['id'] = isset($rate['id']) && is_string($rate['id']) ? $this->id . ':' . $rate['id'] : '';

                        if (!$en_check_action_warehouse_appliance && $this->web_service_inst->en_wd_origin_array['suppress_local_delivery'] == "1" && (!is_array($instore_pickup_local_devlivery_action)) && ($this->shipment_type != 'multiple')) {
                            $rate = apply_filters('suppress_local_delivery', $rate, $this->web_service_inst->en_wd_origin_array, $this->package_plugin, $this->InstorPickupLocalDelivery);

                            if (!empty($rate)) {
                                if ((isset($rate['cost']) && $rate['cost'] > 0) || $override_rates) {
                                    $this->add_rate($rate);
                                    $add_rate_arr[$key] = $rate;
                                    $this->woocommerce_package_rates = 1;
                                }
                            }
                        } else {
                            if ((isset($rate['cost']) && $rate['cost'] > 0) || $override_rates) {
                                $this->add_rate($rate);
                                $add_rate_arr[$key] = $rate;
                            }
                        }
                    }
                }

                return $add_rate_arr;
            }

            /**
             * Label from quote settings tab
             * @return string type
             */
            public function odfl_label_as()
            {
                return (strlen($this->quote_settings['label_as']) > 0) ? $this->quote_settings['label_as'] : "Freight";
            }

            /**
             * Append label in quote
             * @param array type $rate
             * @return string type
             */
            public function set_label_in_quote($rate)
            {
                $rate_label = "";
                $label_sufex = (isset($rate['label_sufex']) && (!empty($rate['label_sufex']))) ? array_unique($rate['label_sufex']) : [];
                $rate_label = ($this->quote_settings['shipment'] == "single_shipment") ? $this->odfl_label_as() : 'Freight';

                $rate_label .= $this->odfl_filter_from_label_sufex($label_sufex);
                $rate_label .= (isset($rate['hat_append_label'])) ? $rate['hat_append_label'] : "";
                $rate_label .= (isset($rate['_hat_append_label'])) ? $rate['_hat_append_label'] : "";

                // Cuttoff Time
                $delivery_estimate_ = isset($rate['delivery_estimates']) ? $rate['delivery_estimates'] : '';
                $shipment_type = isset($this->quote_settings['shipment']) && !empty($this->quote_settings['shipment']) ? $this->quote_settings['shipment'] : '';
                if (isset($this->quote_settings['delivery_estimates']) && !empty($this->quote_settings['delivery_estimates'])
                    && $this->quote_settings['delivery_estimates'] != 'dont_show_estimates' && $shipment_type != 'multi_shipment') {
                    if ($this->quote_settings['delivery_estimates'] == 'delivery_date') {
                        isset($rate['delivery_time_stamp']) && is_string($rate['delivery_time_stamp']) && strlen($rate['delivery_time_stamp']) > 0 ? $rate_label .= ' (Expected delivery by ' . date('m-d-Y', strtotime($rate['delivery_time_stamp'])) . ')' : '';
                    } else if ($this->quote_settings['delivery_estimates'] == 'delivery_days') {
                        $correct_word = ($delivery_estimate_ == 1) ? 'is' : 'are';
                        isset($rate['delivery_estimates']) && is_string($rate['delivery_estimates']) && strlen($rate['delivery_estimates']) > 0 ? $rate_label .= ' (Intransit days: ' . $rate['delivery_estimates'] . ')' : '';
                    }
                }

                return $rate_label;
            }

            public function odfl_filter_from_label_sufex($label_sufex)
            {
                $append_label = "";
                $rad_status = true;
                $all_plugins = apply_filters('active_plugins', get_option('active_plugins'));
                if (stripos(implode($all_plugins), 'residential-address-detection.php') || is_plugin_active_for_network('residential-address-detection/residential-address-detection.php')) {
                    if(get_option('suspend_automatic_detection_of_residential_addresses') != 'yes') {
                        $rad_status = get_option('residential_delivery_options_disclosure_types_to') != 'not_show_r_checkout';
                    }
                }
                switch (TRUE) {
                    case(count($label_sufex) == 1):
                        (in_array('L', $label_sufex)) ? $append_label = " with lift gate delivery " : "";
                        (in_array('R', $label_sufex) && $rad_status == true) ? $append_label = " with residential delivery " : "";
                        (in_array('HAT', $label_sufex)) ? $append_label = " with hold at terminal" : "";
                        // inside delivery
                        (in_array('I', $label_sufex)) ? $append_label = " with inside delivery " : "";
                        break;
                    case(count($label_sufex) > 1):
                        (in_array('L', $label_sufex)) ? $append_label = " with lift gate delivery" : "";

                        // residential delivery
                        if (in_array('R', $label_sufex) && $rad_status == true) {
                            (strlen($append_label) > 0) ? ($append_label .= (!in_array('I', $label_sufex) ? ' and' : ',') . ' residential delivery') : ($append_label .= ' with residential delivery');
                        }

                        // inside delivery
                        if (in_array('I', $label_sufex)) {
                            $append_label .= (strlen($append_label) > 0 ? ' and' : ' with') . ' inside delivery';
                        }
                        break;
                }

                return $append_label;
            }

            /**
             * final rates sorting
             * @param array type $rates
             * @param array type $package
             * @return array type
             */
            function en_sort_woocommerce_available_shipping_methods($rates, $package)
            {
//              if there are no rates don't do anything

                if (!$rates) {
                    return [];
                }

//              check the option to sort shipping methods by price on quote settings 
                if (get_option('shipping_methods_do_not_sort_by_price') != 'yes') {

                    $local_delivery = isset($rates['local-delivery']) ? $rates['local-delivery'] : '';
                    $in_store_pick_up = isset($rates['in-store-pick-up']) ? $rates['in-store-pick-up'] : '';
//                  get an array of prices
                    $prices = [];
                    foreach ($rates as $rate) {
                        $prices[] = $rate->cost;
                    }

//                  use the prices to sort the rates
                    array_multisort($prices, $rates);
                }
//              return the rates
                return $rates;
            }

            /**
             * Pickup delivery quote
             * @return array type
             */
            function pickup_delivery($label, $en_wd_origin_array, $total_distance)
            {
                $this->woocommerce_package_rates = 1;
                $this->instore_pickup_and_local_delivery = TRUE;

                $label = (isset($label) && (strlen($label) > 0)) ? $label : 'In-store pick up';
                // Origin terminal address
                $address = (isset($en_wd_origin_array['address'])) ? $en_wd_origin_array['address'] : '';
                $city = (isset($en_wd_origin_array['city'])) ? $en_wd_origin_array['city'] : '';
                $state = (isset($en_wd_origin_array['state'])) ? $en_wd_origin_array['state'] : '';
                $zip = (isset($en_wd_origin_array['zip'])) ? $en_wd_origin_array['zip'] : '';
                $phone_instore = (isset($en_wd_origin_array['phone_instore'])) ? $en_wd_origin_array['phone_instore'] : '';
                strlen($total_distance) > 0 ? $label .= ': Free | ' . str_replace("mi", "miles", $total_distance) . ' away' : '';
                strlen($address) > 0 ? $label .= ' | ' . $address : '';
                strlen($city) > 0 ? $label .= ', ' . $city : '';
                strlen($state) > 0 ? $label .= ' ' . $state : '';
                strlen($zip) > 0 ? $label .= ' ' . $zip : '';
                strlen($phone_instore) > 0 ? $label .= ' | ' . $phone_instore : '';

                $pickup_delivery = array(
                    'id' => $this->id . ':' . 'in-store-pick-up',
                    'cost' => 0,
                    'label' => $label,
                    'plugin_name' => 'odfl4me',
                    'plugin_type' => 'ltl',
                    'owned_by' => 'eniture'
                );

                add_filter('woocommerce_package_rates', array($this, 'en_sort_woocommerce_available_shipping_methods'), 10, 2);
                $this->add_rate($pickup_delivery);
            }

            /**
             * Local delivery quote
             * @param string type $cost
             * @return array type
             */
            function local_delivery($cost, $label, $en_wd_origin_array)
            {
                $this->woocommerce_package_rates = 1;
                $this->instore_pickup_and_local_delivery = TRUE;
                $label = (isset($label) && (strlen($label) > 0)) ? $label : 'Local Delivery';
                $local_delivery = array(
                    'id' => $this->id . ':' . 'local-delivery',
                    'cost' => $cost,
                    'label' => $label,
                    'plugin_name' => 'odfl4me',
                    'plugin_type' => 'ltl',
                    'owned_by' => 'eniture'
                );

                add_filter('woocommerce_package_rates', array($this, 'en_sort_woocommerce_available_shipping_methods'), 10, 2);
                $this->add_rate($local_delivery);
            }

            /**
             * ODFL Coupon for free shipping
             * @param $coupon
             * @return string
             */
            function odfl_freight_free_shipping($coupon)
            {
                foreach ($coupon as $key => $value) {
                    if ($value->get_free_shipping() == 1) {
                        $rates = array(
                            'id' => 'free',
                            'label' => 'Free Shipping',
                            'cost' => 0,
                            'plugin_name' => 'odfl4me',
                            'plugin_type' => 'ltl',
                            'owned_by' => 'eniture'
                        );
                        $this->add_rate($rates);
                        return 'y';
                    }
                }
                return 'n';
            }

            /**
            * Adds backup rates in the shipping rates
            * @return void
            * */
            function odfl_backup_rates()
            {
                if (get_option('enable_backup_rates_odfl') != 'yes' || (get_option('odfl_backup_rates_carrier_fails_to_return_response') != 'yes' && get_option('odfl_backup_rates_carrier_returns_error') != 'yes')) return;

                $backup_rates_type = get_option('odfl_backup_rates_category');
                $backup_rates_cost = 0;

                if ($backup_rates_type == 'fixed_rate' && !empty(get_option('odfl_backup_rates_fixed_rate'))) {
                    $backup_rates_cost = get_option('odfl_backup_rates_fixed_rate');
                } elseif ($backup_rates_type == 'percentage_of_cart_price' && !empty(get_option('odfl_backup_rates_cart_price_percentage'))) {
                    $cart_price_percentage = floatval(str_replace('%', '', get_option('odfl_backup_rates_cart_price_percentage')));
                    $backup_rates_cost = ($cart_price_percentage * WC()->cart->get_subtotal()) / 100;
                } elseif ($backup_rates_type == 'function_of_weight' && !empty(get_option('odfl_backup_rates_weight_function'))) {
                    $cart_weight = wc_get_weight(WC()->cart->get_cart_contents_weight(), 'lbs');
                    $backup_rates_cost = get_option('odfl_backup_rates_weight_function') * $cart_weight;
                }

                if ($backup_rates_cost > 0) {
                    $backup_rates = array(
                        'id' => $this->id . ':' . 'backup_rates',
                        'label' => get_option('odfl_backup_rates_label'),
                        'cost' => $backup_rates_cost,
                        'plugin_name' => 'odfl4me',
                        'plugin_type' => 'ltl',
                        'owned_by' => 'eniture'
                    );

                    $this->add_rate($backup_rates);
                }
            }

        }

    }
}
