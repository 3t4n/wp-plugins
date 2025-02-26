<?php

/**
 * Get Shipping Carriers Class
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get ODFL Shipping Quotes Class
 */
class ODFL_Get_Shipping_Quotes extends Odfl_Liftgate_As_Option
{

    public $en_wd_origin_array;
    public $InstorPickupLocalDelivery;
    public $quote_settings;
    public $en_accessorial_excluded;

    /**
     * Create Shipping Package
     * @param $packages
     * @return array
     */
    function odfl_shipping_array($packages, $package_plugin = "")
    {
        // Cuttoff Time
        $shipment_week_days = "";
        $order_cut_off_time = "";
        $shipment_off_set_days = "";
        $modify_shipment_date_time = "";
        $store_date_time = "";
        $odfl_delivery_estimates = get_option('odfl_delivery_estimates');
        $shipment_week_days = $this->odfl_shipment_week_days();
        if ($odfl_delivery_estimates == 'delivery_days' || $odfl_delivery_estimates == 'delivery_date') {
            $order_cut_off_time = $this->quote_settings['orderCutoffTime'];
            $shipment_off_set_days = $this->quote_settings['shipmentOffsetDays'];
            $modify_shipment_date_time = ($order_cut_off_time != '' || $shipment_off_set_days != '' || (is_array($shipment_week_days) && count($shipment_week_days) > 0)) ? 1 : 0;
            $store_date_time = $today = date('Y-m-d H:i:s', current_time('timestamp'));
        }
        // FDO
        $EnODFLfreightFdo = new EnODFLfreightFdo();
        $en_fdo_meta_data = [];
        $specific_account_enabled = FALSE;
        $odfl_woo_obj = new ODFL_Woo_Update_Changes();
        $destinationAddressOdfl = $this->destinationAddressOdfl();
        $domain = odfl_quotes_get_domain();
        $aPluginVersions = $this->odfl_wc_version_number();
        $residential_detecion_flag = get_option("en_woo_addons_auto_residential_detecion_flag");

        // Check if ODFL Account number is given on warehouse/dropship against each warehouse/dropship
        $account_number = get_option('wc_settings_odfl_account_no');
        $third_party_account_number = get_option('wc_settings_odfl_third_party_acc');
        $test_connection_zipcode = get_option('billing_zip_code_key_odfl');
        $origin_specific_account = isset($packages['origin']['odfl_account']) ? $packages['origin']['odfl_account'] : '';
        $origin_zip = isset($packages['origin']['zip']) ? $packages['origin']['zip'] : '';
        if ($test_connection_zipcode != $origin_zip && strlen($origin_specific_account) > 0) {
            $account_number = $origin_specific_account;
            $specific_account_enabled = TRUE;
        } else if ($test_connection_zipcode != $origin_zip && strlen($third_party_account_number) > 0) {
            $account_number = $third_party_account_number;
        }

        $hazardous = $lineItem = $product_name = $warehouse_appliance_handling_fee = [];

        // check plan for nested material
        $nested_plan = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'nested_material');
        $nestingPercentage = $nestedDimension = $nestedItems = $stakingProperty = [];
        $doNesting = false;

        $product_markup_shipment = 0;
        foreach ($packages['items'] as $item) {
            $iProductClass = "";
            if (isset($item['productClass']) && !empty($item['productClass'])) {
                switch ($item['productClass']) {
                    case "92.5":
                        $iProductClass = 92;
                        break;

                    case "77.5":
                        $iProductClass = 77;
                        break;

                    default :
                        $iProductClass = $item['productClass'];
                        break;
                }
            }

            // Standard Packaging
            $ship_as_own_pallet = isset($item['ship_as_own_pallet']) && $item['ship_as_own_pallet'] == 'yes' ? 1 : 0;
            $vertical_rotation_for_pallet = isset($item['vertical_rotation_for_pallet']) && $item['vertical_rotation_for_pallet'] == 'yes' ? 1 : 0;
            $counter = (isset($item['variantId']) && $item['variantId'] > 0) ? $item['variantId'] : $item['productId'];
            $nmfc_num = (isset($item['nmfc_number'])) ? $item['nmfc_number'] : '';
            $lineItem[$counter] = array(
                'lineItemHeight' => $item['productHeight'],
                'lineItemLength' => $item['productLength'],
                'lineItemWidth' => $item['productWidth'],
                'lineItemClass' => $iProductClass,
                'lineItemWeight' => $item['productWeight'],
                'piecesOfLineItem' => $item['productQty'],
                'lineItemNMFC' => $nmfc_num,

                // Nested indexes
                'nestingPercentage' => $item['nestedPercentage'],
                'nestingDimension' => $item['nestedDimension'],
                'nestedLimit' => $item['nestedItems'],
                'nestedStackProperty' => $item['stakingProperty'],

                // Shippable handling units
                'lineItemPalletFlag' => $item['lineItemPalletFlag'],
                'lineItemPackageType' => $item['lineItemPackageType'],

                // Standard Packaging
                'shipPalletAlone' => $ship_as_own_pallet,
                'vertical_rotation' => $vertical_rotation_for_pallet
            );

            $lineItem[$counter] = apply_filters('en_fdo_carrier_service', $lineItem[$counter], $item);

            $product_name[] = $item['product_name'];

            isset($item['nestedMaterial']) && !empty($item['nestedMaterial']) &&
            $item['nestedMaterial'] == 'yes' && !is_array($nested_plan) ? $doNesting = 1 : "";

            if(!empty($item['markup']) && is_numeric($item['markup'])){
                $product_markup_shipment += $item['markup'];
            }

            $lineItem[$counter] = apply_filters('set_warehouse_appliance_handling_fee', $lineItem[$counter], $item);

            if (isset($lineItem[$counter]['en_warehouse_appliance_handling_fee'])) {
                $warehouse_appliance_handling_fee[] = (float)$lineItem[$counter]['en_warehouse_appliance_handling_fee'] * (float)$lineItem[$counter]['piecesOfLineItem'];
            }
        }

        // Restrict To Address Type
        $ship_to_commercial = false;
        if (isset($packages['ship_to_commercial']) && $packages['ship_to_commercial']) {
            $ship_to_commercial = true;
        }

        // FDO
        $en_fdo_meta_data = $EnODFLfreightFdo->en_cart_package($packages);
        $post_data = array(
            'platform' => 'WordPress',
            'plugin_version' => $aPluginVersions["odfl_plugin_version"],
            'wordpress_version' => get_bloginfo('version'),
            'woocommerce_version' => $aPluginVersions["woocommerce_plugin_version"],
            'licence_key' => get_option('wc_settings_odfl_plugin_licence_key'),
            'sever_name' => $this->odfl_parse_url($domain),
            'requestKey' => md5(microtime() . rand()),
            'carrierName' => 'odfl4me',
            'carrier_mode' => 'pro',
            'odflUserName' => get_option('wc_settings_odfl_username'),
            'odflPassword' => get_option('wc_settings_odfl_password'),
            'odflCustomerAccount' => $account_number,
            'suspend_residential' => get_option('suspend_automatic_detection_of_residential_addresses'),
            'residential_detecion_flag' => $residential_detecion_flag,
            'senderZip' => $packages['origin']['zip'],
            'senderCity' => $packages['origin']['city'],
            'senderState' => $packages['origin']['state'],
            'senderCountryCode' => $this->odfl_get_country_code($packages['origin']['country']),
            'receiverZip' => str_replace(" ", "", $destinationAddressOdfl['zip']),
            'receiverCity' => str_replace(" ", "", $destinationAddressOdfl['city']),
            'receiverState' => str_replace(" ", "", $destinationAddressOdfl['state']),
            'receiverCountryCode' => $this->odfl_get_country_code($destinationAddressOdfl['country']),
            'shipType' => 'LTL',
            'accessorial' => array(
                (get_option('odfl_liftgate') == 'yes') ? 'HYD' : '',
                (get_option('odfl_residential') == 'yes') ? 'RDC' : '',
                (get_option('odfl_accessorial_inside_delivery') == 'yes') || (get_option('odfl_inside_delivery_as_option') == 'yes') ? 'IDC' : '',
            ),
            // warehouse appliance
            'specific_account_enabled' => $specific_account_enabled,
            'warehouse_appliance_handling_fee' => $warehouse_appliance_handling_fee,
            'sender_origin' => $packages['origin']['location'] . ": " . $packages['origin']['city'] . ", " . $packages['origin']['state'] . " " . $packages['origin']['zip'],
            'product_name' => $product_name,
            'sender_location' => $packages['origin']['location'],
            'commdityDetails' => array(
                'handlingUnitDetails' => $lineItem,
            ),
            // FDO
            'en_fdo_meta_data' => $en_fdo_meta_data,
            'doNesting' => $doNesting,
            // Cuttoff Time
            'modifyShipmentDateTime' => $modify_shipment_date_time,
            'OrderCutoffTime' => $order_cut_off_time,
            'shipmentOffsetDays' => $shipment_off_set_days,
            'storeDateTime' => $store_date_time,
            'shipmentWeekDays' => $shipment_week_days,
            // Restrict To Address Type
            'ship_to_commercial' => $ship_to_commercial,
            'origin_markup' => (isset($packages['origin']['origin_markup'])) ? $packages['origin']['origin_markup'] : 0,
            'product_level_markup' => $product_markup_shipment,
            'handlingUnitWeight' => get_option('handling_weight_odfl'),
            'maxWeightPerHandlingUnit' => get_option('maximum_handling_weight_odfl'),
        );

        // Liftgate exclude limit based on the liftgate weight restrictions shipping rule
        $shipping_rules_obj = new EnOdflShippingRulesAjaxReq();
        $liftGateExcludeLimit = $shipping_rules_obj->get_liftgate_exclude_limit();
        if (!empty($liftGateExcludeLimit) && $liftGateExcludeLimit > 0) {
            $post_data['liftgateExcludeLimit'] = $liftGateExcludeLimit;
        }

        $post_data = apply_filters('en_request_handler', $post_data, 'odfl');

        $this->en_wd_origin_array = (isset($packages['origin'])) ? $packages['origin'] : [];

        if (get_option('odfl_quotes_store_type') == "1") {
            //             Hazardous Material
            $hazardous_material = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'hazardous_material');
            if (!is_array($hazardous_material)) {
                $post_data['accessorial'][] = (isset($packages['hazardousMaterial']) && $packages['hazardousMaterial'] == 'yes') ? 'HAZ' : '';
                // FDO
                $hazardous[] = 'H';
                $post_data['en_fdo_meta_data'] = array_merge($post_data['en_fdo_meta_data'], $EnODFLfreightFdo->en_package_hazardous($packages, $en_fdo_meta_data));
            }
        } else {
            $post_data['accessorial'][] = ($packages['hazardousMaterial'] == 'yes') ? 'HAZ' : '';
            // FDO
            $hazardous[] = 'H';
            $post_data['en_fdo_meta_data'] = array_merge($post_data['en_fdo_meta_data'], $EnODFLfreightFdo->en_package_hazardous($packages, $en_fdo_meta_data));
        }

        (isset($packages['hazardousMaterial']) && $packages['hazardousMaterial'] == 'yes') ? $post_data['hazardous'] = $hazardous : '';

        // Hold At Terminal
        $hold_at_terminal = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'odfl_freight_hold_at_terminal');
        if (!is_array($hold_at_terminal)) {
            (isset($this->quote_settings['HAT_status']) && ($this->quote_settings['HAT_status'] == 'yes')) ? $post_data['holdAtTerminal'] = '1' : '';
        }

        // In-store pickup and local delivery
        $instore_pickup_local_devlivery_action = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'instore_pickup_local_devlivery');

        if (!is_array($instore_pickup_local_devlivery_action)) {
            $post_data = apply_filters('en_wd_standard_plans', $post_data, $post_data['receiverZip'], $this->en_wd_origin_array, $package_plugin);
        }
        $post_data = $this->odfl_update_carrier_service($post_data);
        $post_data = apply_filters("en_woo_addons_carrier_service_quotes_request", $post_data, en_woo_plugin_odfl_quotes);

        // Standard Packaging
        // Configure standard plugin with pallet packaging addon
        $post_data = apply_filters('en_pallet_identify', $post_data);

        do_action("eniture_debug_mood", "ODFL Features", get_option('eniture_plugin_8'));
        do_action("eniture_debug_mood", "Quotes Request (odfl)", $post_data);
        do_action("eniture_debug_mood", "Build Query (odfl)", http_build_query($post_data));

        // Error management
        $post_data = $this->apply_error_management($post_data);

        return $post_data;
    }

    /**
     * @return shipment days of a week  - Cuttoff time
     */
    public function odfl_shipment_week_days()
    {
        $shipment_days_of_week = [];

        if (get_option('all_shipment_days_odfl') == 'yes') {
            return $shipment_days_of_week;
        }
        if (get_option('monday_shipment_day_odfl') == 'yes') {
            $shipment_days_of_week[] = 1;
        }
        if (get_option('tuesday_shipment_day_odfl') == 'yes') {
            $shipment_days_of_week[] = 2;
        }
        if (get_option('wednesday_shipment_day_odfl') == 'yes') {
            $shipment_days_of_week[] = 3;
        }
        if (get_option('thursday_shipment_day_odfl') == 'yes') {
            $shipment_days_of_week[] = 4;
        }
        if (get_option('friday_shipment_day_odfl') == 'yes') {
            $shipment_days_of_week[] = 5;
        }

        return $shipment_days_of_week;
    }

    /**
     * ODFL Line Items
     * @param $packages
     * @return array
     */
    function odfl_get_line_items($packages)
    {
        $lineItem = [];
        foreach ($packages['items'] as $item) {
            $iProductClass = "";
            if (isset($item['productClass']) && !empty($item['productClass'])) {
                switch ($item['productClass']) {
                    case "92.5":
                        $iProductClass = 92;
                        break;

                    case "77.5":
                        $iProductClass = 77;
                        break;

                    default :
                        $iProductClass = $item['productClass'];
                        break;
                }
            }
            $lineItem[] = array(
                'lineItemHeight' => $item['productHeight'],
                'lineItemLength' => $item['productLength'],
                'lineItemWidth' => $item['productWidth'],
                'lineItemClass' => $iProductClass,
                'lineItemWeight' => $item['productWeight'],
                'piecesOfLineItem' => $item['productQty'],
            );
        }
        return $lineItem;
    }

    /**
     * Get ODFL Country Code
     * @param $sCountryName
     * @return string
     */
    function odfl_get_country_code($sCountryName)
    {
        switch (trim($sCountryName)) {
            case 'CN':
                $sCountryName = "CAN";
                break;
            case 'Canada':
                $sCountryName = "CAN";
                break;
            case 'CA':
                $sCountryName = "CAN";
                break;
            case 'CAN':
                $sCountryName = "CAN";
                break;
            case 'US':
                $sCountryName = "USA";
                break;
            case 'USA':
                $sCountryName = "USA";
                break;
        }
        return $sCountryName;
    }

    function destinationAddressOdfl()
    {
        $en_order_accessories = apply_filters('en_order_accessories', []);
        if (isset($en_order_accessories) && !empty($en_order_accessories)) {
            return $en_order_accessories;
        }

        $odfl_woo_obj = new ODFL_Woo_Update_Changes();
        $freight_zipcode = (strlen(WC()->customer->get_shipping_postcode()) > 0) ? WC()->customer->get_shipping_postcode() : $odfl_woo_obj->odfl_postcode();
        $freight_state = (strlen(WC()->customer->get_shipping_state()) > 0) ? WC()->customer->get_shipping_state() : $odfl_woo_obj->odfl_getState();
        $freight_country = (strlen(WC()->customer->get_shipping_country()) > 0) ? WC()->customer->get_shipping_country() : $odfl_woo_obj->odfl_getCountry();
        $freight_city = (strlen(WC()->customer->get_shipping_city()) > 0) ? WC()->customer->get_shipping_city() : $odfl_woo_obj->odfl_getCity();
        return array(
            'city' => $freight_city,
            'state' => $freight_state,
            'zip' => $freight_zipcode,
            'country' => $freight_country
        );
    }

    /**
     * Get Nearest Address If Multiple Warehouses
     * @param $warehous_list
     * @param $receiverZipCode
     * @return array
     */
    function odfl_multi_warehouse($warehous_list, $receiverZipCode)
    {
        if (count($warehous_list) == 1) {
            $warehous_list = reset($warehous_list);
            return $this->odfl_origin_array($warehous_list);
        }

        $odfl_distance_request = new Get_odfl_quotes_distance();
        $accessLevel = "MultiDistance";
        $response_json = $odfl_distance_request->odfl_quotes_address($warehous_list, $accessLevel, $this->destinationAddressOdfl());
        $response_json = json_decode($response_json);

        return $this->odfl_origin_array($response_json->origin_with_min_dist);
    }

    /**
     * Create Origin Array
     * @param $origin
     * @return string
     */
    function odfl_origin_array($origin)
    {
        // In-store pickup and local delivery
        if (has_filter("en_odfl_wd_origin_array_set")) {
            return apply_filters("en_odfl_wd_origin_array_set", $origin);
        }
        return array('locationId' => $origin->id, 'zip' => $origin->zip, 'city' => $origin->city, 'state' => $origin->state, 'location' => $origin->location, 'country' => $origin->country, 'odfl-account' => $origin->odfl_account);
    }

    /**
     * Refine URL
     * @param $domain
     * @return string
     */
    function odfl_parse_url($domain)
    {
        $domain = trim($domain);
        $parsed = parse_url($domain);

        if (empty($parsed['scheme'])) {
            $domain = 'http://' . ltrim($domain, '/');
        }

        $parse = parse_url($domain);
        $refinded_domain_name = $parse['host'];
        $domain_array = explode('.', $refinded_domain_name);

        if (in_array('www', $domain_array)) {
            $key = array_search('www', $domain_array);
            unset($domain_array[$key]);
            if(phpversion() < 8) {
                $refinded_domain_name = implode($domain_array, '.'); 
            }else {
                $refinded_domain_name = implode('.', $domain_array);
            }
        }
        return $refinded_domain_name;
    }

    /**
     * Curl Request To Get Quotes
     * @param $request_data
     * @return json
     */
    function odfl_get_web_quotes($request_data, $package_plugin = "", $loc_id = "")
    {
        // Check response from session
        $srequest_data = $request_data;
        $srequest_data['requestKey'] = "";
        $currentData = md5(json_encode($srequest_data));
        $requestFromSession = WC()->session->get('previousRequestData');
        $requestFromSession = ((is_array($requestFromSession)) && (!empty($requestFromSession))) ? $requestFromSession : [];

        if (isset($requestFromSession[$currentData]) && (!empty($requestFromSession[$currentData]))) {
            $this->InstorPickupLocalDelivery = isset(json_decode($requestFromSession[$currentData])->InstorPickupLocalDelivery) ? json_decode($requestFromSession[$currentData])->InstorPickupLocalDelivery : '';
            // Eniture debug mood
            do_action("eniture_debug_mood", "Quotes Response (ODFL)", json_decode($requestFromSession[$currentData]));

            return $this->parse_odfl_output($requestFromSession[$currentData], $request_data, $package_plugin, $loc_id);
        }

        if (is_array($request_data) && count($request_data) > 0) {
            $odfl_curl_obj = new ODFL_Curl_Request();
            $output = $odfl_curl_obj->odfl_get_curl_response(ODFL_FREIGHT_DOMAIN_HITTING_URL . '/index.php', $request_data);
            do_action("eniture_debug_mood", "Quotes Response", json_decode($output));

            $this->InstorPickupLocalDelivery = (isset(json_decode($output)->InstorPickupLocalDelivery) ? json_decode($output)->InstorPickupLocalDelivery : NULL);

            // Eniture debug mood
            do_action("eniture_debug_mood", "Quotes Response (ODLF)", json_decode($output));

            // Set response in session
            $response = json_decode($output);

            if (isset($response->soapenvBody->ns2getLTLRateEstimateResponse->return) &&
                ($response->soapenvBody->ns2getLTLRateEstimateResponse->return->success == true) &&
                (empty($response->soapenvBody->ns2getLTLRateEstimateResponse->return->errorMessages)) &&
                (!empty($response->soapenvBody->ns2getLTLRateEstimateResponse->return->rateEstimate->netFreightCharge))) {

                if (isset($response->autoResidentialSubscriptionExpired) &&
                    ($response->autoResidentialSubscriptionExpired == 1)) {
                    $flag_api_response = "no";
                    $srequest_data['residential_detecion_flag'] = $flag_api_response;
                    $currentData = md5(json_encode($srequest_data));
                }

                $requestFromSession[$currentData] = $output;
                WC()->session->set('previousRequestData', $requestFromSession);
            }
            return $this->parse_odfl_output($output, $request_data, $package_plugin, $loc_id);
        }
    }

    /**
     * Get Shipping Array For Single Shipment
     * @param $output
     * @return string
     */
    function parse_odfl_output($output, $request_data, $odfl_package, $loc_id)
    {
        $ship_to_commercial = (isset($request_data['ship_to_commercial'])) ? $request_data['ship_to_commercial'] : false;
        $result = json_decode($output);

        // API time out or empty response
        if (isset($result->backupRate) && $result->backupRate == 1) {
            return ['error' => 'backup_rate'];
        }

        // Odfl override rates shipping rules
        $odfl_shipping_rules = new EnOdflShippingRulesAjaxReq();
        $odfl_shipping_rules->apply_shipping_rules($odfl_package, true, $result, $loc_id);

        // FDO
        $en_fdo_meta_data = (isset($request_data['en_fdo_meta_data'])) ? $request_data['en_fdo_meta_data'] : '';
        if (isset($result->debug)) {
            $en_fdo_meta_data['handling_unit_details'] = $result->debug;
        }

        // Excluded accessoarials
        $excluded = false;
        if (isset($result->liftgateExcluded) && $result->liftgateExcluded == 1) {
            $this->quote_settings['liftgate_delivery'] = 'no';
            $this->quote_settings['liftgate_resid_delivery'] = "no";
            $this->en_accessorial_excluded = ['liftgateResidentialExcluded'];
            add_filter('en_odfl_accessorial_excluded', [$this, 'en_odfl_accessorial_excluded'], 10, 1);
            $en_fdo_meta_data['accessorials']['residential'] = false;
            $en_fdo_meta_data['accessorials']['liftgate'] = false;
            $excluded = true;
        }

        $accessorials = [];
        ($this->quote_settings['liftgate_delivery'] == "yes") ? $accessorials[] = "L" : "";
        ($this->quote_settings['inside_delivery'] == "yes") ? $accessorials[] = "I" : "";
        ($this->quote_settings['residential_delivery'] == "yes") ? $accessorials[] = "R" : "";
        (isset($request_data['hazardous']) && is_array($request_data['hazardous']) && in_array('H', $request_data['hazardous'])) ? $accessorials[] = "H" : "";

        // Standard packaging
        $standard_packaging = isset($result->standardPackagingData) ? $result->standardPackagingData : [];

        // Cuttoff Time
        $delivery_estimates = (isset($result->soapenvBody->ns2getLTLRateEstimateResponse->return->totalTransitTimeInDays)) ? $result->soapenvBody->ns2getLTLRateEstimateResponse->return->totalTransitTimeInDays : '';
        $delivery_time_stamp = (isset($result->soapenvBody->ns2getLTLRateEstimateResponse->return->deliveryDate)) ? $result->soapenvBody->ns2getLTLRateEstimateResponse->return->deliveryDate : '';

        $label_sufex_arr = $this->filter_label_sufex_array_odfl($result);
        $suppress_rates = apply_filters('en_suppress_rates_when_residential_address', false);
        if ($suppress_rates && in_array('R', $label_sufex_arr) && $this->quote_settings['residential_delivery'] != "yes") {
            return [];
        }

        $quotes_not_allowed = false;
        if ($ship_to_commercial && in_array('R', $label_sufex_arr) && $this->quote_settings['residential_delivery'] != "yes") {
            $quotes_not_allowed = true;
        }

        $override_rates = isset($result->soapenvBody->ns2getLTLRateEstimateResponse->return->overrideRates) ? $result->soapenvBody->ns2getLTLRateEstimateResponse->return->overrideRates : false;

        if ((!$quotes_not_allowed && isset($result->soapenvBody->ns2getLTLRateEstimateResponse->return) && $result->soapenvBody->ns2getLTLRateEstimateResponse->return->success == true && empty($result->soapenvBody->ns2getLTLRateEstimateResponse->return->errorMessages) && !empty($result->soapenvBody->ns2getLTLRateEstimateResponse->return->rateEstimate->netFreightCharge)) || (isset($result->soapenvBody->ns2getLTLRateEstimateResponse->return->rateEstimate->netFreightCharge) && $override_rates)) {
            $meta_data = [];
            $meta_data['sender_zip'] = (isset($request_data['senderZip'])) ? $request_data['senderZip'] : '';
            $meta_data['sender_location'] = (isset($request_data['sender_location'])) ? $request_data['sender_location'] : '';
            $meta_data['sender_origin'] = (isset($request_data['sender_origin'])) ? $request_data['sender_origin'] : '';
            $meta_data['product_name'] = (isset($request_data['product_name'])) ? json_encode($request_data['product_name']) : [];
            $meta_data['accessorials'] = json_encode($accessorials);

            // Standard Packaging
            $meta_data['standard_packaging'] = wp_json_encode($standard_packaging);

            $quotes = array(
                'id' => 'odfl',
                'plugin_name' => 'odfl',
                'cost' => $result->soapenvBody->ns2getLTLRateEstimateResponse->return->rateEstimate->netFreightCharge,
                // Cuttoff Time
                'delivery_estimates' => $delivery_estimates,
                'delivery_time_stamp' => $delivery_time_stamp,
                'label_sfx_arr' => $label_sufex_arr,
                'meta_data' => $meta_data,
                'surcharges' => (isset($result->soapenvBody->ns2getLTLRateEstimateResponse->return->surcharges)) ? $this->update_parse_odfl_output($result->soapenvBody->ns2getLTLRateEstimateResponse->return->surcharges) : [],
                'origin_markup' => $request_data['origin_markup'],
                'product_level_markup' => $request_data['product_level_markup'],
                'plugin_name' => 'odfl4me',
                'plugin_type' => 'ltl',
                'owned_by' => 'eniture',
                'override_rates' => $override_rates
            );

            $quotes = array_merge($quotes, $meta_data);


            // warehouse appliance
            $quotes = apply_filters('add_warehouse_appliance_handling_fee', $quotes, $request_data);

            // FDO
            in_array('R', $label_sufex_arr) ? $quotes['meta_data']['en_fdo_meta_data']['accessorials']['residential'] = true : '';
            $en_fdo_meta_data['rate'] = $quotes;
            if (isset($en_fdo_meta_data['rate']['meta_data'])) {
                unset($en_fdo_meta_data['rate']['meta_data']);
            }
            if (isset($en_fdo_meta_data['rate']['product_name'])) {
                unset($en_fdo_meta_data['rate']['product_name']);
            }
            $en_fdo_meta_data['quote_settings'] = $this->quote_settings;
            $quotes['meta_data']['en_fdo_meta_data'] = $en_fdo_meta_data;

            $quotes = apply_filters("en_woo_addons_web_quotes", $quotes, en_woo_plugin_odfl_quotes);

            $label_sufex = (isset($quotes['label_sufex'])) ? $quotes['label_sufex'] : [];
            $label_sufex = $this->label_R_wwe_ltl($label_sufex);
            $quotes['label_sufex'] = $label_sufex;

            in_array('R', $label_sufex_arr) ? $quotes['meta_data']['en_fdo_meta_data']['accessorials']['residential'] = true : '';
            ($this->quote_settings['liftgate_resid_delivery'] == "yes") && (in_array("R", $label_sufex)) && in_array('L', $label_sufex_arr) ? $quotes['meta_data']['en_fdo_meta_data']['accessorials']['liftgate'] = true : '';

            // Lift gate delivery as an option
            if (($this->quote_settings['liftgate_delivery_option'] == "yes") && (!isset($result->liftgateExcluded)) &&
                (($this->quote_settings['liftgate_resid_delivery'] == "yes") && (!in_array("R", $label_sufex)) ||
                    ($this->quote_settings['liftgate_resid_delivery'] != "yes"))) {
                $service = $quotes;
                $quotes['id'] .= "WL";

                (isset($quotes['label_sufex']) &&
                    (!empty($quotes['label_sufex']))) ?
                    array_push($quotes['label_sufex'], "L") : // IF
                    $quotes['label_sufex'] = array("L");       // ELSE

                // FDO
                $quotes['meta_data']['en_fdo_meta_data']['accessorials']['liftgate'] = true;
                $quotes['append_label'] = " with lift gate delivery ";
                $liftgate_charge = (isset($service['surcharges'], $service['surcharges']['liftgateFee'])) ? $service['surcharges']['liftgateFee'] : 0;
                $service['cost'] = (isset($service['cost'])) ? (float)$service['cost'] - (float)$liftgate_charge : 0;
                (!empty($service)) && (in_array("R", $service['label_sufex'])) ? $service['label_sufex'] = array("R") : $service['label_sufex'] = [];

                $simple_quotes = $service;

                // FDO
                if (isset($simple_quotes['meta_data']['en_fdo_meta_data']['rate']['cost'])) {
                    $simple_quotes['meta_data']['en_fdo_meta_data']['rate']['cost'] = $service['cost'];
                }
            } elseif ($excluded) {
                // Excluded accessoarials
                $simple_quotes = $quotes;
            }

        } else {
            return [];
        }

        $hold_at_terminal = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'odfl_freight_hold_at_terminal');
        if (!is_array($hold_at_terminal) && $this->quote_settings['HAT_status'] == 'yes' && isset($result->holdAtTerminalResponse)) {

            $meta_data = [];
            $meta_data['sender_zip'] = (isset($request_data['senderZip'])) ? $request_data['senderZip'] : '';
            $meta_data['sender_location'] = (isset($request_data['sender_location'])) ? $request_data['sender_location'] : '';
            $meta_data['sender_origin'] = (isset($request_data['sender_origin'])) ? $request_data['sender_origin'] : '';
            $meta_data['product_name'] = (isset($request_data['product_name'])) ? json_encode($request_data['product_name']) : [];
            $meta_data['accessorials'] = json_encode($accessorials);
            // Standard packaging
            $meta_data['standard_packaging'] = wp_json_encode($standard_packaging);

            $hold_at_terminal_res = $result->holdAtTerminalResponse;
            $destination_center = isset($hold_at_terminal_res->address) ? $hold_at_terminal_res->address : (object)[];
            $distance = isset($hold_at_terminal_res->distance) ? $hold_at_terminal_res->distance : (object)[];
            $total_net_charge = isset($hold_at_terminal_res->totalNetCharge) ? $hold_at_terminal_res->totalNetCharge : 0;

            $meta_data['address'] = json_encode($destination_center);
            $meta_data['_address'] = (isset($destination_center->address, $destination_center->phone)) ? $this->get_address_terminal($destination_center, $distance) : '';

            $total_net_charge = $this->add_handling_fee($total_net_charge, $this->quote_settings['HAT_fee']);
            $override_rates = isset($hold_at_terminal_res->overrideRates) ? $hold_at_terminal_res->overrideRates : false;

            $hat_quotes = array(
                'id' => 'odfl_hat',
                'plugin_name' => 'odfl',
                'cost' => $total_net_charge,
                // Cuttoff Time
                'delivery_estimates' => $delivery_estimates,
                'delivery_time_stamp' => $delivery_time_stamp,
                'label_sfx_arr' => [],
                'meta_data' => $meta_data,
                'surcharges' => [],
                'address' => $meta_data['address'],
                '_address' => $meta_data['_address'],
                'hat_append_label' => ' with hold at terminal',
                '_hat_append_label' => $meta_data['_address'],
                'origin_markup' => $request_data['origin_markup'],
                'product_level_markup' => $request_data['product_level_markup'],
                'plugin_name' => 'odfl4me',
                'plugin_type' => 'ltl',
                'owned_by' => 'eniture',
                'override_rates' => $override_rates
            );

            $hat_quotes = array_merge($hat_quotes, $meta_data);

            // warehouse appliance
            $hat_quotes = apply_filters('add_warehouse_appliance_handling_fee', $hat_quotes, $request_data);

            // FDO
            in_array('R', $label_sufex_arr) ? $hat_quotes['meta_data']['en_fdo_meta_data']['accessorials']['residential'] = true : '';
            $en_fdo_meta_data['rate'] = $hat_quotes;
            if (isset($en_fdo_meta_data['rate']['meta_data'])) {
                unset($en_fdo_meta_data['rate']['meta_data']);
            }
            if (isset($en_fdo_meta_data['rate']['product_name'])) {
                unset($en_fdo_meta_data['rate']['product_name']);
            }

            $en_fdo_meta_data['holdatterminal'] = $destination_center;
            $en_fdo_meta_data['quote_settings'] = $this->quote_settings;
            $hat_quotes['meta_data']['en_fdo_meta_data'] = $en_fdo_meta_data;

            $hat_quotes = apply_filters("en_woo_addons_web_quotes", $hat_quotes, en_woo_plugin_odfl_quotes);

            $label_sufex = (isset($hat_quotes['label_sufex'])) ? $hat_quotes['label_sufex'] : [];
            $label_sufex = $this->label_R_wwe_ltl($label_sufex);
            $hat_quotes['label_sufex'] = $label_sufex;

            $accessorials_hat = [
                'holdatterminal' => true,
                'residential' => false,
                'liftgate' => false,
            ];
            if (isset($hat_quotes['meta_data']['en_fdo_meta_data']['accessorials'])) {
                $hat_quotes['meta_data']['en_fdo_meta_data']['accessorials'] = array_merge($hat_quotes['meta_data']['en_fdo_meta_data']['accessorials'], $accessorials_hat);
            } else {
                $hat_quotes['meta_data']['en_fdo_meta_data']['accessorials']['holdatterminal'] = true;
            }

            if (isset($this->quote_settings['HAT_fee']) &&
                ($this->quote_settings['HAT_fee'] == "-100%")) {
                unset($hat_quotes);
            }
        } elseif (!is_array($hold_at_terminal) && $this->quote_settings['HAT_status'] == 'yes') {

            $meta_data = [];
            $meta_data['sender_zip'] = (isset($request_data['senderZip'])) ? $request_data['senderZip'] : '';
            $meta_data['sender_location'] = (isset($request_data['sender_location'])) ? $request_data['sender_location'] : '';
            $meta_data['sender_origin'] = (isset($request_data['sender_origin'])) ? $request_data['sender_origin'] : '';
            $meta_data['product_name'] = (isset($request_data['product_name'])) ? json_encode($request_data['product_name']) : [];
            $meta_data['accessorials'] = json_encode($accessorials);
            // Standard packaging
            $meta_data['standard_packaging'] = wp_json_encode($standard_packaging);

            $destination_center = [];

            $meta_data['address'] = json_encode([]);
            $meta_data['_address'] = '';

            $hat_quotes = array(
                'id' => 'no_quotes_odfl_hat',
                'plugin_name' => 'odfl',
                'cost' => 0,
                'meta_data' => $meta_data,
                'surcharges' => [],
                'address' => $meta_data['address'],
                '_address' => $meta_data['_address'],
                'hat_append_label' => ' with hold at terminal',
                '_hat_append_label' => $meta_data['_address'],
                'origin_markup' => $request_data['origin_markup'],
                'product_level_markup' => $request_data['product_level_markup'],
                'plugin_name' => 'odfl4me',
                'plugin_type' => 'ltl',
                'owned_by' => 'eniture'
            );

            $hat_quotes = array_merge($hat_quotes, $meta_data);

            // warehouse appliance
            $hat_quotes = apply_filters('add_warehouse_appliance_handling_fee', $hat_quotes, $request_data);

            // FDO
            in_array('R', $label_sufex_arr) ? $hat_quotes['meta_data']['en_fdo_meta_data']['accessorials']['residential'] = true : '';
            $en_fdo_meta_data['rate'] = $hat_quotes;
            if (isset($en_fdo_meta_data['rate']['meta_data'])) {
                unset($en_fdo_meta_data['rate']['meta_data']);
            }
            if (isset($en_fdo_meta_data['rate']['product_name'])) {
                unset($en_fdo_meta_data['rate']['product_name']);
            }
            $en_fdo_meta_data['quote_settings'] = $this->quote_settings;
            $hat_quotes['meta_data']['en_fdo_meta_data'] = $en_fdo_meta_data;

            $hat_quotes = apply_filters("en_woo_addons_web_quotes", $hat_quotes, en_woo_plugin_odfl_quotes);

            $label_sufex = (isset($hat_quotes['label_sufex'])) ? $hat_quotes['label_sufex'] : [];
            $label_sufex = $this->label_R_wwe_ltl($label_sufex);
            $hat_quotes['label_sufex'] = $label_sufex;

            $accessorials_hat = [
                'holdatterminal' => true,
                'residential' => false,
                'liftgate' => false,
            ];
            if (isset($hat_quotes['meta_data']['en_fdo_meta_data']['accessorials'])) {
                $hat_quotes['meta_data']['en_fdo_meta_data']['accessorials'] = array_merge($hat_quotes['meta_data']['en_fdo_meta_data']['accessorials'], $accessorials_hat);
            } else {
                $hat_quotes['meta_data']['en_fdo_meta_data']['accessorials']['holdatterminal'] = true;
            }

            if (isset($this->quote_settings['HAT_fee']) &&
                ($this->quote_settings['HAT_fee'] == "-100%")) {
                unset($hat_quotes);
            }
        }

        (!empty($simple_quotes)) ? $quotes['simple_quotes'] = $simple_quotes : "";
        (!empty($hat_quotes)) ? $quotes['hold_at_terminal_quotes'] = $hat_quotes : "";

        // Inside delivery quotes
        if (isset($this->quote_settings['inside_delivery_option']) && $this->quote_settings['inside_delivery_option'] == "yes" && isset($result->insideStatus) && $result->insideStatus == "i") {
            $quotes = $this->compile_inside_delivery_quotes($quotes, $result);
        }

        return $quotes;
    }

    /**
     *
     * @param string type $price
     * @param string type $handling_fee
     * @return float type
     */
    function add_handling_fee($price, $handling_fee)
    {
        $handling_fee = $price > 0 ? $handling_fee : 0;
        $handelingFee = 0;
        if ($handling_fee != '' && $handling_fee != 0) {
            if (strrchr($handling_fee, "%")) {

                $prcnt = (float)$handling_fee;
                $handelingFee = (float)$price / 100 * $prcnt;
            } else {
                $handelingFee = (float)$handling_fee;
            }
        }

        $handelingFee = $this->smooth_round($handelingFee);

        $price = (float)$price + $handelingFee;
        return $price;
    }

    /**
     *
     * @param float type $val
     * @param int type $min
     * @param int type $max
     * @return float type
     */
    function smooth_round($val, $min = 2, $max = 4)
    {
        $result = round($val, $min);
        if ($result == 0 && $min < $max) {
            return $this->smooth_round($val, ++$min, $max);
        } else {
            return $result;
        }
    }

    public function get_address_terminal($destination_center, $distance)
    {
        $address_terminal = '';
        $address_terminal .= (isset($distance->text, $distance->value)) ? ' | ' . $distance->text : '';
        $address_terminal .= (isset($destination_center->address)) ? ' | ' . $destination_center->address : '';
        $address_terminal .= (isset($destination_center->cityStateZip)) ? ' ' . $destination_center->cityStateZip : '';
        $address_terminal .= (strlen($destination_center->phone) > 0) ? ' | T: ' . $destination_center->phone : '';

        return $address_terminal;
    }

    /**
     * check "R" in array
     * @param array type $label_sufex
     * @return array type
     */
    public function label_R_wwe_ltl($label_sufex)
    {
        if (get_option('odfl_residential') == 'yes' && (in_array("R", $label_sufex))) {
            $label_sufex = array_flip($label_sufex);
            unset($label_sufex['R']);
            $label_sufex = array_keys($label_sufex);
        }

        return $label_sufex;
    }

    /**
     * Return woocomerce and abf version
     * @return int
     */
    function odfl_wc_version_number()
    {
        if (!function_exists('get_plugins'))
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');

        $plugin_folder = get_plugins('/' . 'woocommerce');
        $plugin_file = 'woocommerce.php';
        $odfl_plugin_folder = get_plugins('/' . 'ltl-freight-quotes-odfl-edition');
        $odfl_plugin_file = 'ltl-freight-quotes-odfl-edition.php';
        $wc_plugin = (isset($plugin_folder[$plugin_file]['Version'])) ? $plugin_folder[$plugin_file]['Version'] : "";
        $odfl_plugin = (isset($odfl_plugin_folder[$odfl_plugin_file]['Version'])) ? $odfl_plugin_folder[$odfl_plugin_file]['Version'] : "";

        $pluginVersions = array(
            "woocommerce_plugin_version" => $wc_plugin,
            "odfl_plugin_version" => $odfl_plugin
        );

        return $pluginVersions;
    }

    /**
     * Return ODFL LTL In-store Pickup Array
     */
    function odfl_quotes_return_local_delivery_store_pickup()
    {
        return $this->InstorPickupLocalDelivery;
    }

    function apply_error_management($quotes_request)
    {
        // error management will be applied only for more than 1 product
        if (empty($quotes_request) || empty($quotes_request['commdityDetails']['handlingUnitDetails']) || (!empty($quotes_request['commdityDetails']['handlingUnitDetails']) && count($quotes_request['commdityDetails']['handlingUnitDetails']) < 2)) return $quotes_request;

        $error_option = !empty(get_option('error_management_settings_odfl_ltl')) ? get_option('error_management_settings_odfl_ltl') : 'quote_shipping';
        $dont_quote_shipping = false;
        $items_ids = [];

        foreach ($quotes_request['commdityDetails']['handlingUnitDetails'] as $key => $product) {
            $empty_dims_check = empty($product['lineItemWidth']) || empty($product['lineItemHeight']) || empty($product['lineItemLength']);
            $empty_shipping_class_check = empty($product['lineItemClass']);
            $weight = $product['lineItemWeight'];

            if (empty($weight) || ($empty_dims_check && $empty_shipping_class_check)) {
                if ($error_option == 'dont_quote_shipping') {
                    $dont_quote_shipping = true;
                    break;
                } else {
                    unset($quotes_request['commdityDetails']['handlingUnitDetails'][$key]);
                    $items_ids[] = $key;
                }
            }
        }

        $quotes_request['error_management'] = $error_option;
        // error management will be applied for all products in case of dont quote shipping option
        if ($dont_quote_shipping) $quotes_request['commdityDetails']['handlingUnitDetails'] = [];

        // set error property for items in fdo meta-data array to hide them on order widget details
        if (!empty($items_ids) && !$dont_quote_shipping && isset($quotes_request['en_fdo_meta_data']['items'])) {
            foreach ($quotes_request['en_fdo_meta_data']['items'] as $key => $item) {
                if (!isset($item['id'])) continue;

                if (in_array($item['id'], $items_ids)) {
                    $quotes_request['en_fdo_meta_data']['items'][$key]['error_management'] = true;
                }
            }
        }

        return $quotes_request;
    }

    /**
     * Accessoarials excluded
     * @param $excluded
     * @return array
    */
    function en_odfl_accessorial_excluded($excluded)
    {
        return array_merge($excluded, $this->en_accessorial_excluded);
    }

    /**
     * compile and return inside delivery quotes
     * @param array $quotes 
     * @return array $quotes
     */
    function compile_inside_delivery_quotes($quotes, $result)
    {
        if (empty($quotes)) return $quotes;

        $simple_quotes_exists = isset($quotes['simple_quotes']) && !empty($quotes['simple_quotes']);
        $simple_quotes[] = $simple_quotes_exists ? $quotes['simple_quotes'] : $quotes;
        if (empty($simple_quotes)) return $quotes;

        $inside_delivery_quotes = $lfg_and_inside_delivery_quotes = [];

        foreach ($simple_quotes as $key => $value) {
            $service = $value;

            // Remove the inside delivery charges from the simple rate
            $inside_charge = (isset($value['surcharges']['insideFee'])) ? $value['surcharges']['insideFee'] : 0;
            $value['cost'] -= $inside_charge;
            isset($value['meta_data']['en_fdo_meta_data']['rate']['cost']) ? $value['meta_data']['en_fdo_meta_data']['rate']['cost'] -= $inside_charge : null;

            $quotes['cost'] -= $inside_charge;
            $quotes['meta_data']['en_fdo_meta_data']['rate']['cost'] -= $inside_charge;
            $simple_quotes_exists && $quotes['simple_quotes'] = $value;

            // liftgate and inside delivery quotes
            if ($this->quote_settings['liftgate_delivery_option'] == "yes" && !isset($result->liftgateExcluded) && $simple_quotes_exists) {
                $combined_service = $service;
                $liftgate_charge = (isset($value['surcharges']['liftgateFee'])) ? $value['surcharges']['liftgateFee'] : 0;

                $combined_service['cost'] += $liftgate_charge;
                $combined_service['id'] .= 'WLWI';

                isset($combined_service['label_sufex']) && !empty($combined_service['label_sufex']) ? array_push($combined_service['label_sufex'], 'L', 'I') : $combined_service['label_sufex'] = ['L', 'I'];
                $combined_service['label_sfx_arr'] = $combined_service['label_sufex'];
                $combined_service['append_label'] = ' with liftgate and inside delivery ';
                $combined_service['meta_data']['en_fdo_meta_data']['accessorials']['liftgate'] = true;
                $combined_service['meta_data']['en_fdo_meta_data']['accessorials']['inside'] = true;
                isset($combined_service['meta_data']['en_fdo_meta_data']['rate']['cost']) ? $combined_service['meta_data']['en_fdo_meta_data']['rate']['cost'] += $liftgate_charge : null;

                $lfg_and_inside_delivery_quotes[$key] = $combined_service;
            }

            $service['id'] .= 'WI';
            isset($service['label_sufex']) && !empty($service['label_sufex']) ? array_push($service['label_sufex'], 'I') : $service['label_sufex'] = ['I'];
            $service['label_sfx_arr'] = $service['label_sufex'];
            $service['append_label'] = ' with inside delivery ';
            $service['meta_data']['en_fdo_meta_data']['accessorials']['inside'] = true;

            $inside_delivery_quotes[$key] = $service;
        }

        !empty($inside_delivery_quotes) && $quotes['inside_delivery_quotes'] = reset($inside_delivery_quotes);
        !empty($lfg_and_inside_delivery_quotes) && $quotes['lift_and_ins_quotes'] = reset($lfg_and_inside_delivery_quotes);

        return $quotes;
    }

}
