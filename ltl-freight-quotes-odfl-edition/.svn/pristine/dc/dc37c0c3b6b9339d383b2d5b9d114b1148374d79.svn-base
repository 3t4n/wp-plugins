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
 * Get Shipping Package Class
 */
class ODFL_Shipping_Get_Package
{

    /**
     * LTL has shipment
     * @var int
     */
    public $hasLTLShipment = 0;

    /**
     * Display error message
     * @var varchar
     */
    public $errors = [];
    public $ValidShipments = 0;
    public $ValidShipmentsArrOdfl = [];
    // Images for FDO
    public $en_fdo_image_urls = [];
    // Micro Warehouse
    public $products = [];
    public $dropship_location_array = [];
    public $warehouse_products = [];
    public $destination_Address_odfl;
    public $origin = [];

    /**
     * Grouping For Shipments
     * @param $package
     * @param $odfl_res_inst
     * @param $odfl_freight_zipcode
     * @return Shipment Grouped Array
     */
    function group_odfl_shipment($package, $odfl_res_inst, $odfl_freight_zipcode)
    {
        global $wpdb;
        $weight = 0;
        $dimensions = 0;
        $odfl_freight_class = "";
        $odfl_enable = false;
        $odfl_woo_obj = new ODFL_Woo_Update_Changes();
        $odfl_zipcode = $odfl_woo_obj->odfl_postcode();
        $validShipmentForLtl = 0;

        if (empty($odfl_freight_zipcode)) {
            return [];
        }

        $wc_settings_wwe_ignore_items = get_option("en_ignore_items_through_freight_classification");
        $en_get_current_classes = strlen($wc_settings_wwe_ignore_items) > 0 ? trim(strtolower($wc_settings_wwe_ignore_items)) : '';
        $en_get_current_classes_arr = strlen($en_get_current_classes) > 0 ? array_map('trim', explode(',', $en_get_current_classes)) : [];

        // Micro Warehouse
        $smallPluginExist = 0;
        $odfl_package = $items = $items_shipment = [];
        $odfl_get_shipping_quotes = new ODFL_Get_Shipping_Quotes();
        $this->destination_Address_odfl = $odfl_get_shipping_quotes->destinationAddressOdfl();

        $weight_threshold = get_option('en_weight_threshold_lfq');
        $weight_threshold = isset($weight_threshold) && $weight_threshold > 0 ? $weight_threshold : 150;

        // Standard Packaging
        $en_ppp_pallet_product = apply_filters('en_ppp_existence', false);

        $flat_rate_shipping_addon = apply_filters('en_add_flat_rate_shipping_addon', false);
        $en_restrict_to_address_type = apply_filters('en_restrict_to_address_type_existence', false);
        $counter = 0;
        foreach ($package['contents'] as $item_id => $values) {
            $_product = $values['data'];

            // Images for FDO
            $this->en_fdo_image_urls($values, $_product);

            // Flat rate pricing
            $product_id = (isset($values['variation_id']) && $values['variation_id'] > 0) ? $values['variation_id'] : $_product->get_id();
            $parent_id = $product_id;
            if(isset($values['variation_id']) && $values['variation_id'] > 0){
                $variation = wc_get_product($values['variation_id']);
                $parent_id = $variation->get_parent_id();
            }
            $en_flat_rate_price = $this->en_get_flat_rate_price($values, $_product);
            if ($flat_rate_shipping_addon && isset($en_flat_rate_price) && strlen($en_flat_rate_price) > 0) {
                continue;
            }

            // Get product shipping class
            $en_ship_class = strtolower($values['data']->get_shipping_class());
            if (in_array($en_ship_class, $en_get_current_classes_arr)) {
                continue;
            }

            // Shippable handling units
            $values = apply_filters('en_shippable_handling_units_request', $values, $values, $_product);
            $shippable = [];
            if (isset($values['shippable']) && !empty($values['shippable'])) {
                $shippable = $values['shippable'];
            }

            // Standard Packaging
            $ppp_product_pallet = [];
            $values = apply_filters('en_ppp_request', $values, $values, $_product);
            if (isset($values['ppp']) && !empty($values['ppp'])) {
                $ppp_product_pallet = $values['ppp'];
            }

            $ship_as_own_pallet = $vertical_rotation_for_pallet = 'no';
            if (!$en_ppp_pallet_product) {
                $ppp_product_pallet = [];
            }

            extract($ppp_product_pallet);

            // Restrict To Address Type
            $values = apply_filters('en_restrict_to_address_type_request', $values, $values, $_product);
            $restrict_to_address_type = [];
            if (isset($values['restrict_to_address_type']) && !empty($values['restrict_to_address_type'])) {
                $restrict_to_address_type = $values['restrict_to_address_type'];
            }

            // Nesting start
            $nestedPercentage = 0;
            $nestedDimension = "";
            $nestedItems = "";
            $StakingProperty = "";

            $dimension_unit = get_option('woocommerce_dimension_unit');
            // Convert product dimensions in feet ,centimeter,miles,kilometer into Inches
            if ($dimension_unit == 'ft' || $dimension_unit == 'cm' || $dimension_unit == 'mi' || $dimension_unit == 'km') {

                $dimensions = $this->dimensions_conversion($_product);
                $height = $dimensions['height'];
                $width = $dimensions['width'];
                $length = $dimensions['length'];
            } else {
                $height = wc_get_dimension($_product->get_height(), 'in');
                $width = wc_get_dimension($_product->get_width(), 'in');
                $length = wc_get_dimension($_product->get_length(), 'in');
            }

            $height = ($height == '') ? 0 : $height;
            $width = ($width == '') ? 0 : $width;
            $length = ($length == '') ? 0 : $length;

            $product_weight = wc_get_weight($_product->get_weight(), 'lbs');
            $weight = ($values['quantity'] == 1) ? $product_weight : $product_weight * $values['quantity'];
            $freightClass = $_product->get_shipping_class(); // it define either product marked as ltl or not

            // warehouse appliance
            (isset($values['variation_id']) && $values['variation_id'] > 0) ? $post_id = $values['variation_id'] : $post_id = $_product->get_id();
            $locations_list = $this->odfl_get_locations_list($post_id);
            $origin_address = $odfl_res_inst->odfl_multi_warehouse($locations_list, $odfl_zipcode);
            $getFreightClassAndHazardous = $this->odfl_get_freight_class_hazardous($_product, $values['variation_id'], $values['product_id']);
            ($getFreightClassAndHazardous["freightClass_ltl_gross"] == 'Null') ? $getFreightClassAndHazardous["freightClass_ltl_gross"] = "" : "";

            $locationId = (isset($origin_address['id'])) ? $origin_address['id'] : $origin_address['locationId'];

            // Micro Warehouse
            (isset($values['variation_id']) && $values['variation_id'] > 0) ? $post_id = $values['variation_id'] : $post_id = $_product->get_id();
            $this->products[] = $post_id;

            $odfl_package[$locationId]['origin'] = $origin_address;

            // Hazardous material
            $hm_plan = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'hazardous_material');
            $hm_status = (!is_array($hm_plan) && $getFreightClassAndHazardous['hazardous_material'] == 'yes') ? TRUE : FALSE;

            $odfl_enable = $this->get_odfl_enable($_product);

            $product_markup = $this->odfl_get_product_level_markup($_product, $values['variation_id'], $values['product_id'], $values['quantity']);

            if (!$_product->is_virtual()) {

                $nested_material = $this->en_nested_material($values, $_product);
                if ($nested_material == "yes") {
                    $post_id = (isset($values['variation_id']) && $values['variation_id'] > 0) ? $values['variation_id'] : $_product->get_id();
                    $nestedPercentage = get_post_meta($post_id, '_nestedPercentage', true);
                    $nestedDimension = get_post_meta($post_id, '_nestedDimension', true);
                    $nestedItems = get_post_meta($post_id, '_maxNestedItems', true);
                    $StakingProperty = get_post_meta($post_id, '_nestedStakingProperty', true);
                }

                // Shippable handling units
                $lineItemPalletFlag = $lineItemPackageCode = $lineItemPackageType = '0';
                extract($shippable);

                $product_title = str_replace(array("'", '"'), '', $_product->get_title());
                $en_items = array(
                    'productId' => $parent_id,
                    'productName' => str_replace(array("'", '"'), '', $_product->get_name()),
                    'productQty' => $values['quantity'],
                    'product_name' => $values['quantity'] . " x " . str_replace(array("'", '"'), '', $_product->get_name()),
                    'productPrice' => $_product->get_price(),
                    'productWeight' => $product_weight,
                    'productLength' => $length,
                    'productWidth' => $width,
                    'productHeight' => $height,
                    'productClass' => $getFreightClassAndHazardous["freightClass_ltl_gross"],
                    'ptype' => $odfl_enable,
                    'freightClass' => $freightClass,
                    'hazardousMaterial' => $hm_status,
                    'hazardous_material' => $hm_status,
                    'hazmat' => $hm_status,
                    'productType' => ($_product->get_type() == 'variation') ? 'variant' : 'simple',
                    'productSku' => $_product->get_sku(),
                    'actualProductPrice' => $_product->get_price(),
                    'attributes' => $_product->get_attributes(),
                    'variantId' => ($_product->get_type() == 'variation') ? $_product->get_id() : '',

                    // Nesting start
                    'nestedMaterial' => $nested_material,
                    'nestedPercentage' => $nestedPercentage,
                    'nestedDimension' => $nestedDimension,
                    'nestedItems' => $nestedItems,
                    'stakingProperty' => $StakingProperty,

                    // Shippable handling units
                    'lineItemPalletFlag' => $lineItemPalletFlag,
                    'lineItemPackageCode' => $lineItemPackageCode,
                    'lineItemPackageType' => $lineItemPackageType,

                    // Standard Packaging
                    'ship_as_own_pallet' => $ship_as_own_pallet,
                    'vertical_rotation_for_pallet' => $vertical_rotation_for_pallet,
                    'markup' => $product_markup
                );

                // Hook for flexibility adding to package
                $en_items = apply_filters('en_group_package', $en_items, $values, $_product);
                // NMFC Number things
                $en_items = $this->en_group_package($en_items, $values, $_product);
                // warehouse appliance
                $en_items = apply_filters('get_warehouse_appliance_handling_fee', $en_items, $post_id);

                // Micro Warehouse
                $items[$post_id] = $en_items;

                $odfl_package[$locationId]['items'][$counter] = $en_items;

                // Restrict To Address Type
                $ship_to_commercial_residnetial = $ship_to_commercial = 'no';
                extract($restrict_to_address_type);
                if ($en_restrict_to_address_type && $ship_to_commercial == 'yes') {
                    $odfl_package[$locationId]['ship_to_commercial'] = true;
                }

                $validateProductParamsRtrn = $this->validateProductParams($odfl_package[$locationId]['items'][$counter]);
                (isset($validateProductParamsRtrn) && ($validateProductParamsRtrn === 1)) ? $validShipmentForLtl = 1 : "";
                $odfl_package[$locationId]['items'][$counter]['validForLtl'] = $validateProductParamsRtrn;

                // Product tags
                $product_tags = get_the_terms($product_id, 'product_tag');
                $product_tags = empty($product_tags) ? get_the_terms($parent_id, 'product_tag') : $product_tags;
                if (!empty($product_tags)) {
                    $product_tag_names = array_map(function($tag) { return $tag->term_id; }, $product_tags);

                    if (isset($odfl_package[$locationId]['product_tags'])) {
                        $odfl_package[$locationId]['product_tags'] = array_merge($odfl_package[$locationId]['product_tags'], $product_tag_names);
                    } else {
                        $odfl_package[$locationId]['product_tags'] = $product_tag_names;
                    }
                } else {
                    $odfl_package[$locationId]['product_tags'] = [];
                }

                // Product quantity
                if (isset($odfl_package[$locationId]['product_quantities'])) {
                    $odfl_package[$locationId]['product_quantities'] += floatval($values['quantity']);
                } else {
                    $odfl_package[$locationId]['product_quantities'] = floatval($values['quantity']);
                }

                // Product price
                if (isset($odfl_package[$locationId]['product_prices'])) {
                    $odfl_package[$locationId]['product_prices'] += (floatval($_product->get_price()) * floatval($values['quantity']));
                } else {
                    $odfl_package[$locationId]['product_prices'] = (floatval($_product->get_price()) * floatval($values['quantity']));
                }
            }

            $exceedWeight = get_option('en_plugins_return_LTL_quotes');
            $odfl_package[$locationId]['shipment_weight'] = isset($odfl_package[$locationId]['shipment_weight']) ? $odfl_package[$locationId]['shipment_weight'] + $weight : $weight;
            $odfl_package[$locationId]['hazardousMaterial'] = isset($odfl_package[$locationId]['hazardousMaterial']) && $odfl_package[$locationId]['hazardousMaterial'] == 'yes' ? $odfl_package[$locationId]['hazardousMaterial'] : $getFreightClassAndHazardous["hazardous_material"];
            // validShipmentForLtl odfl
            $odfl_package[$locationId]['validShipmentForLtl'] = $validShipmentForLtl;
            (isset($validShipmentForLtl) && ($validShipmentForLtl === 1)) ? $this->ValidShipments = 1 : "";

            // Micro Warehouse
            $items_shipment[$post_id] = $odfl_enable;

            $smallPluginExist = 0;
            $calledMethod = [];
            $eniturePluigns = json_decode(get_option('EN_Plugins'));

            if (!empty($eniturePluigns)) {
                foreach ($eniturePluigns as $enIndex => $enPlugin) {
                    $freightSmallClassName = 'WC_' . $enPlugin;
                    if (!in_array($freightSmallClassName, $calledMethod)) {
                        if (class_exists($freightSmallClassName)) {
                            $smallPluginExist = 1;
                        }
                        $calledMethod[] = $freightSmallClassName;
                    }
                }
            }
            if ($odfl_enable == true || ($odfl_package[$locationId]['shipment_weight'] > $weight_threshold && $exceedWeight == 'yes')) {
                $odfl_package[$locationId]['odfl'] = 1;
                $this->hasLTLShipment = 1;
                $this->ValidShipmentsArrOdfl[] = "ltl_freight"; //$freightClass;
            } elseif (isset($odfl_package[$locationId]['odfl'])) {
                $odfl_package[$locationId]['odfl'] = 1;
                $this->hasLTLShipment = 1;
                $this->ValidShipmentsArrOdfl[] = "ltl_freight"; //$freightClass;
            } elseif ($smallPluginExist == 1) {
                $odfl_package[$locationId]['small'] = 1;
                $this->ValidShipmentsArrOdfl[] = "small_shipment";
            } else {
                $this->ValidShipmentsArrOdfl[] = "no_shipment";
            }

            $counter++;
        }

        // Micro Warehouse
        $eniureLicenceKey = get_option('wc_settings_odfl_plugin_licence_key');
        $odfl_package = apply_filters('en_micro_warehouse', $odfl_package, $this->products, $this->dropship_location_array, $this->destination_Address_odfl, $this->origin, $smallPluginExist, $items, $items_shipment, $this->warehouse_products, $eniureLicenceKey, 'odfl');
        do_action("eniture_debug_mood", "Product Detail (odfl)", $odfl_package);
        return $odfl_package;
    }

    /**
     * Set images urls | Images for FDO
     * @param array type $en_fdo_image_urls
     * @return array type
     */
    public function en_fdo_image_urls_merge($en_fdo_image_urls)
    {
        return array_merge($this->en_fdo_image_urls, $en_fdo_image_urls);
    }

    /**
     * Get images urls | Images for FDO
     * @param array type $values
     * @param array type $_product
     * @return array type
     */
    public function en_fdo_image_urls($values, $_product)
    {
        $product_id = (isset($values['variation_id']) && $values['variation_id'] > 0) ? $values['variation_id'] : $_product->get_id();
        $gallery_image_ids = $_product->get_gallery_image_ids();
        foreach ($gallery_image_ids as $key => $image_id) {
            $gallery_image_ids[$key] = $image_id > 0 ? wp_get_attachment_url($image_id) : '';
        }

        $image_id = $_product->get_image_id();
        $this->en_fdo_image_urls[$product_id] = [
            'product_id' => $product_id,
            'image_id' => $image_id > 0 ? wp_get_attachment_url($image_id) : '',
            'gallery_image_ids' => $gallery_image_ids
        ];

        add_filter('en_fdo_image_urls_merge', [$this, 'en_fdo_image_urls_merge'], 10, 1);
    }

    /**
     * Nested Material
     * @param array type $values
     * @param array type $_product
     * @return string type
     */
    function en_nested_material($values, $_product)
    {
        $post_id = (isset($values['variation_id']) && $values['variation_id'] > 0) ? $values['variation_id'] : $_product->get_id();
        return get_post_meta($post_id, '_nestedMaterials', true);
    }

    /**
     * parameters $_product
     * return $dimensions in inches
     */
    function dimensions_conversion($_product)
    {

        $dimension_unit = get_option('woocommerce_dimension_unit');
        $dimensions = [];
        $height = is_numeric($_product->get_height()) ? $_product->get_height() : 0;
        $width = is_numeric($_product->get_width()) ? $_product->get_width() : 0;
        $length = is_numeric($_product->get_length()) ? $_product->get_length() : 0;
        switch ($dimension_unit) {

            case 'ft':
                $dimensions['height'] = round($height * 12, 2);
                $dimensions['width'] = round($width * 12, 2);
                $dimensions['length'] = round($length * 12, 2);
                break;

            case 'cm':
                $dimensions['height'] = round($height * 0.3937007874, 2);
                $dimensions['width'] = round($width * 0.3937007874, 2);
                $dimensions['length'] = round($length * 0.3937007874, 2);
                break;

            case 'mi':
                $dimensions['height'] = round($height * 63360, 2);
                $dimensions['width'] = round($width * 63360, 2);
                $dimensions['length'] = round($length * 63360, 2);
                break;

            case 'km':
                $dimensions['height'] = round($height * 39370.1, 2);
                $dimensions['width'] = round($width * 39370.1, 2);
                $dimensions['length'] = round($length * 39370.1, 2);
                break;
        }

        return $dimensions;
    }

    /**
     *
     * @param type $productData
     * @return int
     */
    function validateProductParams($productData)
    {

        if ((!isset($productData['freightClass']) || $productData['freightClass'] != "ltl_freight")) {
            return 0;
        }
        return 1;
    }

    /**
     * checks if any of the dimensions is missing
     * @param array $dimen
     * @return array
     */
    function checkMissingDimen($dimen)
    {
        return array_filter($dimen, function ($var) use ($searchword) {
            return empty($var);
        });
    }

    /**
     * Check enable_dropship and get Locations list
     * @param $post_id
     * @return array
     * @global $wpdb
     */
    function odfl_get_locations_list($post_id)
    {
        global $wpdb;

        $locations_list = [];

        (isset($values['variation_id']) && $values['variation_id'] > 0) ? $post_id = $values['variation_id'] : $post_id;
        $enable_dropship = get_post_meta($post_id, '_enable_dropship', true);
        if ($enable_dropship == 'yes') {
            $get_loc = get_post_meta($post_id, '_dropship_location', true);
            if ($get_loc == '') {
                // Micro Warehouse
                $this->warehouse_products[] = $post_id;
                return array('error' => 'odfl dp location not found!');
            }

            //  Multi Dropship
            $multi_dropship = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'multi_dropship');

            if (is_array($multi_dropship)) {
                $locations_list = $wpdb->get_results(
                    "SELECT * FROM " . $wpdb->prefix . "warehouse WHERE location = 'dropship' LIMIT 1"
                );
            } else {
                $get_loc = ($get_loc !== '') ? maybe_unserialize($get_loc) : $get_loc;
                $get_loc = is_array($get_loc) ? implode(" ', '", $get_loc) : $get_loc;
                $locations_list = $wpdb->get_results(
                    "SELECT * FROM " . $wpdb->prefix . "warehouse WHERE id IN ('" . $get_loc . "')"
                );
            }

            // Micro Warehouse
            $this->multiple_dropship_of_prod($locations_list, $post_id);
            $eniture_debug_name = "Dropships";
        }

        if (empty($locations_list)) {

            // Multi Warehouse
            $multi_warehouse = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'multi_warehouse');

            if (is_array($multi_warehouse)) {
                $locations_list = $wpdb->get_results(
                    "SELECT * FROM " . $wpdb->prefix . "warehouse WHERE location = 'warehouse' LIMIT 1"
                );
            } else {
                $locations_list = $wpdb->get_results(
                    "SELECT * FROM " . $wpdb->prefix . "warehouse WHERE location = 'warehouse'"
                );
            }

            // Micro Warehouse
            $this->warehouse_products[] = $post_id;
            $eniture_debug_name = "Warehouses";
        }

        do_action("eniture_debug_mood", "Quotes $eniture_debug_name (s)", $locations_list);
        return $locations_list;
    }

    // Micro Warehouse
    public function multiple_dropship_of_prod($locations_list, $post_id)
    {
        $post_id = (string)$post_id;

        foreach ($locations_list as $key => $value) {
            $dropship_data = $this->address_array($value);

            $this->origin["D" . $dropship_data['zip']] = $dropship_data;
            if (!isset($this->dropship_location_array["D" . $dropship_data['zip']]) || !in_array($post_id, $this->dropship_location_array["D" . $dropship_data['zip']])) {
                $this->dropship_location_array["D" . $dropship_data['zip']][] = $post_id;
            }
        }

    }

    // Micro Warehouse
    public function address_array($value)
    {
        $dropship_data = [];

        $dropship_data['locationId'] = (isset($value->id)) ? $value->id : "";
        $dropship_data['zip'] = (isset($value->zip)) ? $value->zip : "";
        $dropship_data['city'] = (isset($value->city)) ? $value->city : "";
        $dropship_data['state'] = (isset($value->state)) ? $value->state : "";
        // Origin terminal address
        $dropship_data['address'] = (isset($value->address)) ? $value->address : "";
        // Terminal phone number
        $dropship_data['phone_instore'] = (isset($value->phone_instore)) ? $value->phone_instore : "";
        $dropship_data['location'] = (isset($value->location)) ? $value->location : "";
        $dropship_data['country'] = (isset($value->country)) ? $value->country : "";
        $dropship_data['enable_store_pickup'] = (isset($value->enable_store_pickup)) ? $value->enable_store_pickup : "";
        $dropship_data['fee_local_delivery'] = (isset($value->fee_local_delivery)) ? $value->fee_local_delivery : "";
        $dropship_data['suppress_local_delivery'] = (isset($value->suppress_local_delivery)) ? $value->suppress_local_delivery : "";
        $dropship_data['miles_store_pickup'] = (isset($value->miles_store_pickup)) ? $value->miles_store_pickup : "";
        $dropship_data['match_postal_store_pickup'] = (isset($value->match_postal_store_pickup)) ? $value->match_postal_store_pickup : "";
        $dropship_data['checkout_desc_store_pickup'] = (isset($value->checkout_desc_store_pickup)) ? $value->checkout_desc_store_pickup : "";
        $dropship_data['enable_local_delivery'] = (isset($value->enable_local_delivery)) ? $value->enable_local_delivery : "";
        $dropship_data['miles_local_delivery'] = (isset($value->miles_local_delivery)) ? $value->miles_local_delivery : "";
        $dropship_data['match_postal_local_delivery'] = (isset($value->match_postal_local_delivery)) ? $value->match_postal_local_delivery : "";
        $dropship_data['checkout_desc_local_delivery'] = (isset($value->checkout_desc_local_delivery)) ? $value->checkout_desc_local_delivery : "";

        $dropship_data['sender_origin'] = $dropship_data['location'] . ": " . $dropship_data['city'] . ", " . $dropship_data['state'] . " " . $dropship_data['zip'];

        return $dropship_data;
    }

    /**
     * Get Freight Class and Hazardous Material Checkbox
     * @param $_product
     * @param $variation_id
     * @param $product_id
     * @return array
     */
    function odfl_get_freight_class_hazardous($_product, $variation_id, $product_id)
    {
        if ($_product->get_type() == 'variation') {
            $hazardous_material = get_post_meta($variation_id, '_hazardousmaterials', true);
            $variation_class = get_post_meta($variation_id, '_ltl_freight_variation', true);

            if ($variation_class == 'get_parent') {
                $variation_class = get_post_meta($product_id, '_ltl_freight', true);
                $freightClass_ltl_gross = $variation_class;
            } else {
                if ($variation_class > 0) {
                    $freightClass_ltl_gross = get_post_meta($variation_id, '_ltl_freight_variation', true);
                } else {
                    $freightClass_ltl_gross = get_post_meta($_product->get_id(), '_ltl_freight', true);
                }
            }
        } else {
            $hazardous_material = get_post_meta($_product->get_id(), '_hazardousmaterials', true);
            $freightClass_ltl_gross = get_post_meta($_product->get_id(), '_ltl_freight', true);
        }

        $aDataArr = array(
            'freightClass_ltl_gross' => $freightClass_ltl_gross,
            'hazardous_material' => $hazardous_material
        );

        return $aDataArr;
    }

    /**
     * Get ODFL Enable or not
     * @param $_product
     * @return type
     */
    function get_odfl_enable($_product)
    {
        if ($_product->get_type() == 'variation') {
            $ship_class_id = $_product->get_shipping_class_id();
            if ($ship_class_id == 0) {
                $parent_data = $_product->get_parent_data();
                $get_parent_term = get_term_by('id', $parent_data['shipping_class_id'], 'product_shipping_class');
                $get_shipping_result = (isset($get_parent_term->slug)) ? $get_parent_term->slug : '';
            } else {
                $get_shipping_result = $_product->get_shipping_class();
            }

            $odfl_enable = (!empty($get_shipping_result) && ($get_shipping_result == 'ltl_freight' || $get_shipping_result == 'ltl-freight')) ? true : false;
        } else {
            $get_shipping_result = $_product->get_shipping_class();
            $odfl_enable = ($get_shipping_result == 'ltl_freight') ? true : false;
        }

        return $odfl_enable;
    }

    /**
     * Grouping For Shipment Quotes
     * @param $quotes
     * @param $handlng_fee
     * @return array
     */
    function odfl_grouped_quotes($quotes, $handlng_fee)
    {
        $totalPrice = 0;
        $grandTotal = 0;
        $freight = [];
        $grandTotalWdoutLiftGate = 0;
        $label_sfx_arr = "";

        if (count($quotes) > 0 && !empty($quotes)) {
            foreach ($quotes as $multiValues) {
                if (isset($multiValues['cost']) && !empty($multiValues['cost'])) {
                    $priceLiftGate = (isset($multiValues['surcharges']['liftgateFee'])) ? $multiValues['surcharges']['liftgateFee'] : 0;
                    $totalPrice = $multiValues['cost'];
                    $grandTotal += (floatval($handlng_fee) && !empty($handlng_fee)) ? $this->odfl_parse_handeling_fee($handlng_fee, $totalPrice) : $totalPrice;
                    $grandTotalWdoutLiftGate += (floatval($handlng_fee) && !empty($handlng_fee)) ? $this->odfl_parse_handeling_fee($handlng_fee, ($totalPrice - $priceLiftGate)) : $totalPrice - $priceLiftGate;
                    (isset($multiValues['label_sfx_arr'])) ? $label_sfx_arr = $multiValues['label_sfx_arr'] : '';
                } else {
                    $this->errors = 'no quotes return';
                    continue;
                }
            }
        }

        $freight = array(
            'totals' => $grandTotal,
            'label_sfx_arr' => $label_sfx_arr,
            'grandTotalWdoutLiftGate' => $grandTotalWdoutLiftGate,
        );
        return $freight;
    }

    /**
     * Grouping For Small Quotes
     * @param $smallQuotes
     * @return int
     */
    function odfl_get_small_package_cost($smallQuotes)
    {
        $result = [];
        $minCostArr = [];

        if (isset($smallQuotes) && count($smallQuotes) > 0) {
            foreach ($smallQuotes as $smQuotes) {
                $CostArr = [];
                if (!isset($smQuotes['error'])) {
                    foreach ($smQuotes as $smQuote) {
                        $CostArr[] = $smQuote['cost'];
                        $result['error'] = false;
                    }
                    $minCostArr[] = (count($CostArr) > 0) ? min($CostArr) : "";
                } else {
                    $result['error'] = !isset($result['error']) ? true : $result['error'];
                }
            }
            $result['price'] = (isset($minCostArr) && count($minCostArr) > 0) ? min($minCostArr) : "";
        } else {
            $result['error'] = false;
            $result['price'] = 0;
        }
        return $result;
    }

    /**
     * Calculate Handeling Fee
     * @param $handlng_fee
     * @param $cost
     * @return double
     */
    function odfl_parse_handeling_fee($handlng_fee, $cost)
    {
        $pos = strpos($handlng_fee, '%');
        if ($pos > 0) {
            $rest = substr($handlng_fee, $pos);
            $exp = explode($rest, $handlng_fee);
            $get = $exp[0];
            $percnt = $get / 100 * $cost;
            $grandTotal = $cost + $percnt;
        } else {
            $grandTotal = $cost + $handlng_fee;
        }
        return $grandTotal;
    }

    /**
     * Get the product nmfc number
     */
    public function en_group_package($item, $product_object, $product_detail)
    {
        $en_nmfc_number = $this->en_nmfc_number($product_object, $product_detail);
        $item['nmfc_number'] = $en_nmfc_number;
        return $item;
    }

    /**
     * Get product shippable unit enabled
     */
    public function en_nmfc_number($product_object, $product_detail)
    {
        $post_id = (isset($product_object['variation_id']) && $product_object['variation_id'] > 0) ? $product_object['variation_id'] : $product_detail->get_id();
        return get_post_meta($post_id, '_nmfc_number', true);
    }

    /**
     * Returns product level markup
     */
    public function odfl_get_product_level_markup($_product, $variation_id, $product_id, $quantity)
    {
        $product_level_markup = 0;
        if ($_product->get_type() == 'variation') {
            $product_level_markup = get_post_meta($variation_id, '_en_product_markup_variation', true);
            if(empty($product_level_markup) || $product_level_markup == 'get_parent'){
                $product_level_markup = get_post_meta($_product->get_id(), '_en_product_markup', true);
            }
        } else {
            $product_level_markup = get_post_meta($_product->get_id(), '_en_product_markup', true);
        }

        if(empty($product_level_markup)) {
            $product_level_markup = get_post_meta($product_id, '_en_product_markup', true);
        }

        if(!empty($product_level_markup) && strpos($product_level_markup, '%') === false 
        && is_numeric($product_level_markup) && is_numeric($quantity)){
            $product_level_markup *= $quantity;
        }else if(!empty($product_level_markup) && strpos($product_level_markup, '%') > 0 && is_numeric($quantity)){
            $position = strpos($product_level_markup, '%');
            $first_str = substr($product_level_markup, $position);
            $arr = explode($first_str, $product_level_markup);
            $percentage_value = $arr[0];
            $product_price = $_product->get_price();
             if(!empty($product_price)){
                  $product_level_markup = $percentage_value / 100 * ($product_price * $quantity);
                 }else{
                     $product_level_markup = 0;
                 }
            }
        return $product_level_markup;
    }

    /**
     * Returns flat rate price and quantity
     */
    function en_get_flat_rate_price($values, $_product)
    {
        if ($_product->get_type() == 'variation') {
            $flat_rate_price = get_post_meta($values['variation_id'], 'en_flat_rate_price', true);
            if (strlen($flat_rate_price) < 1) {
                $flat_rate_price = get_post_meta($values['product_id'], 'en_flat_rate_price', true);
            }
        } else {
            $flat_rate_price = get_post_meta($_product->get_id(), 'en_flat_rate_price', true);
        }

        return $flat_rate_price;
    }

}
