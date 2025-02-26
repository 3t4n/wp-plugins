<?php
/**
 * ODFL wooCommerce Quote settings html form template
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ODFL Quote Settings Class
 */
class ODFL_Quote_Settings
{
    /**
     * ODFL Quote Settings
     * @return array
     */
    function odfl_quote_settings_tab()
    {
        $disable_hold_at_terminal = "";
        $hold_at_terminal_package_required = "";
        $action_hold_at_terminal = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'odfl_freight_hold_at_terminal');
        if (is_array($action_hold_at_terminal)) {
            $disable_hold_at_terminal = "disabled_me";
            $hold_at_terminal_package_required = apply_filters('odfl_quotes_plans_notification_link', $action_hold_at_terminal);
        }

        // Error management
        if (empty(get_option('error_management_settings_odfl_ltl'))) {
            update_option('error_management_settings_odfl_ltl', 'quote_shipping');
        }

        // Backup rates
        if (empty(get_option('odfl_backup_rates_category'))) {
            update_option('odfl_backup_rates_category', 'fixed_rate');
        }

        if (empty(get_option('odfl_backup_rates_display'))) {
            update_option('odfl_backup_rates_display', 'no_other_rates');
        }

        // Cuttoff Time
        $odfl_disable_cutt_off_time_ship_date_offset = "";
        $odfl_cutt_off_time_package_required = "";

        //  Check the cutt of time & offset days plans for disable input fields
        $odfl_action_cutOffTime_shipDateOffset = apply_filters('odfl_quotes_quotes_plans_suscription_and_features', 'odfl_cutt_off_time');
        if (is_array($odfl_action_cutOffTime_shipDateOffset)) {
            $odfl_disable_cutt_off_time_ship_date_offset = "disabled_me";
            $odfl_cutt_off_time_package_required = apply_filters('odfl_quotes_plans_notification_link', $odfl_action_cutOffTime_shipDateOffset);
        }

        $ltl_enable = get_option('en_plugins_return_LTL_quotes');
        $weight_threshold_class = $ltl_enable == 'yes' ? 'show_en_weight_threshold_lfq' : 'hide_en_weight_threshold_lfq';
        $weight_threshold = get_option('en_weight_threshold_lfq');
        $weight_threshold = isset($weight_threshold) && $weight_threshold > 0 ? $weight_threshold : 150;

        echo '<div class="quote_section_class_odfl">';
        $settings = array(
            'section_title_quote' => array(
                'title' => __('Quote Settings ', 'woocommerce_odfl_quote'),
                'type' => 'title',
                'desc' => '',
                'id' => 'odfl_section_title_quote'
            ),

            'label_as_odfl' => array(
                'name' => __('Label As ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => '<span class="desc_text_style">What the user sees during checkout, e.g. "LTL Freight". If left blank, "Freight" will display as the shipping method.</span>',
                'id' => 'odfl_label_as'
            ),

            'price_sort_odfl' => array(
                'name' => __("Don't sort shipping methods by price  ", 'woocommerce-settings-odfl-quotes'),
                'type' => 'checkbox',
                'desc' => 'By default, the plugin will sort all shipping methods by price in ascending order.',
                'id' => 'shipping_methods_do_not_sort_by_price'
            ),
            //** Start Delivery Estimate Options - Cuttoff Time
            'service_odfl_estimates_title' => array(
                'name' => __('Delivery Estimate Options ', 'woocommerce-settings-en_woo_addons_packages_quotes'),
                'type' => 'text',
                'desc' => '',
                'id' => 'service_odfl_estimates_title'
            ),
            'odfl_show_delivery_estimates_options_radio' => array(
                'name' => __("", 'woocommerce-settings-odfl'),
                'type' => 'radio',
                'default' => 'dont_show_estimates',
                'options' => array(
                    'dont_show_estimates' => __("Don't display delivery estimates.", 'woocommerce'),
                    'delivery_days' => __("Display estimated number of days until delivery.", 'woocommerce'),
                    'delivery_date' => __("Display estimated delivery date.", 'woocommerce'),
                ),
                'id' => 'odfl_delivery_estimates',
                'class' => 'odfl_dont_show_estimate_option',
            ),
            //** End Delivery Estimate Options
            //**Start: Cut Off Time & Ship Date Offset
            'cutOffTime_shipDateOffset_odfl_freight' => array(
                'name' => __('Cut Off Time & Ship Date Offset ', 'woocommerce-settings-en_woo_addons_packages_quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'desc' => $odfl_cutt_off_time_package_required,
                'id' => 'odfl_freight_cutt_off_time_ship_date_offset'
            ),
            'orderCutoffTime_odfl_freight' => array(
                'name' => __('Order Cut Off Time ', 'woocommerce-settings-odfl_freight_freight_orderCutoffTime'),
                'type' => 'text',
                'placeholder' => '-- : -- --',
                'desc' => 'Enter the cut off time (e.g. 2.00) for the orders. Orders placed after this time will be quoted as shipping the next business day.',
                'id' => 'odfl_freight_order_cut_off_time',
                'class' => $odfl_disable_cutt_off_time_ship_date_offset,
            ),
            'shipmentOffsetDays_odfl_freight' => array(
                'name' => __('Fullfillment Offset Days ', 'woocommerce-settings-odfl_freight_shipment_offset_days'),
                'type' => 'text',
                'desc' => 'The number of days the ship date needs to be moved to allow the processing of the order.',
                'placeholder' => 'Fullfillment Offset Days, e.g. 2',
                'id' => 'odfl_freight_shipment_offset_days',
                'class' => $odfl_disable_cutt_off_time_ship_date_offset,
            ),
            'all_shipment_days_odfl' => array(
                'name' => __("What days do you ship orders?", 'woocommerce-settings-odfl_quotes'),
                'type' => 'checkbox',
                'desc' => 'Select All',
                'class' => "all_shipment_days_odfl $odfl_disable_cutt_off_time_ship_date_offset",
                'id' => 'all_shipment_days_odfl'
            ),
            'monday_shipment_day_odfl' => array(
                'name' => __("", 'woocommerce-settings-odfl_quotes'),
                'type' => 'checkbox',
                'desc' => 'Monday',
                'class' => "odfl_shipment_day $odfl_disable_cutt_off_time_ship_date_offset",
                'id' => 'monday_shipment_day_odfl'
            ),
            'tuesday_shipment_day_odfl' => array(
                'name' => __("", 'woocommerce-settings-odfl_quotes'),
                'type' => 'checkbox',
                'desc' => 'Tuesday',
                'class' => "odfl_shipment_day $odfl_disable_cutt_off_time_ship_date_offset",
                'id' => 'tuesday_shipment_day_odfl'
            ),
            'wednesday_shipment_day_odfl' => array(
                'name' => __("", 'woocommerce-settings-odfl_quotes'),
                'type' => 'checkbox',
                'desc' => 'Wednesday',
                'class' => "odfl_shipment_day $odfl_disable_cutt_off_time_ship_date_offset",
                'id' => 'wednesday_shipment_day_odfl'
            ),
            'thursday_shipment_day_odfl' => array(
                'name' => __("", 'woocommerce-settings-odfl_quotes'),
                'type' => 'checkbox',
                'desc' => 'Thursday',
                'class' => "odfl_shipment_day $odfl_disable_cutt_off_time_ship_date_offset",
                'id' => 'thursday_shipment_day_odfl'
            ),
            'friday_shipment_day_odfl' => array(
                'name' => __("", 'woocommerce-settings-odfl_quotes'),
                'type' => 'checkbox',
                'desc' => 'Friday',
                'class' => "odfl_shipment_day $odfl_disable_cutt_off_time_ship_date_offset",
                'id' => 'friday_shipment_day_odfl'
            ),
            'odfl_show_delivery_estimates' => array(
                'title' => __('', 'woocommerce'),
                'name' => __('', 'woocommerce-settings-odfl_quotes'),
                'desc' => '',
                'id' => 'odfl_show_delivery_estimates',
                'css' => '',
                'default' => '',
                'type' => 'title',
            ),
            //**End: Cut Off Time & Ship Date Offset

            'accessorial_quoted_odfl' => array(
                'title' => __('', 'woocommerce'),
                'name' => __('', 'woocommerce_odfl_quote'),
                'desc' => '',
                'id' => 'woocommerce_accessorial_quoted_odfl',
                'css' => '',
                'default' => '',
                'type' => 'title',
            ),

            'accessorial_quoted_odfl' => array(
                'title' => __('', 'woocommerce'),
                'name' => __('', 'woocommerce_odfl_quote'),
                'desc' => '',
                'id' => 'woocommerce_odfl_accessorial_quoted',
                'css' => '',
                'default' => '',
                'type' => 'title',
            ),

            'residential_delivery_options_label' => array(
                'name' => __('Residential Delivery', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'id' => 'residential_delivery_options_label'
            ),

            'accessorial_residential_delivery_odfl' => array(
                'name' => __('Always quote as residential delivery ', 'woocommerce_odfl_quote'),
                'type' => 'checkbox',
                'desc' => __('', 'woocommerce_odfl_quote'),
                'id' => 'odfl_residential',
                'class' => 'accessorial_service odflCheckboxClass',
            ),

//              Auto-detect residential addresses notification
            'avaibility_auto_residential' => array(
                'name' => __('Auto-detect residential addresses', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'desc' => "Click <a target='_blank' href='https://eniture.com/woocommerce-residential-address-detection/'>here</a> to add the Residential Address Detection module. (<a target='_blank' href='https://eniture.com/woocommerce-residential-address-detection/#documentation'>Learn more</a>)",
                'id' => 'avaibility_auto_residential'
            ),

            'liftgate_delivery_options_label' => array(
                'name' => __('Lift Gate Delivery ', 'woocommerce-settings-en_woo_addons_packages_quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'id' => 'liftgate_delivery_options_label'
            ),

            'accessorial_liftgate_delivery_odfl' => array(
                'name' => __('Always quote lift gate delivery ', 'woocommerce_odfl_quote'),
                'type' => 'checkbox',
                'desc' => __('', 'woocommerce_odfl_quote'),
                'id' => 'odfl_liftgate',
                'class' => 'accessorial_service odflCheckboxClass checkbox_fr_add',
            ),

            'odfl_quotes_liftgate_delivery_as_option' => array(
                'name' => __('Offer lift gate delivery as an option ', 'woocommerce-settings-odfl_freight'),
                'type' => 'checkbox',
                'desc' => __('', 'woocommerce-settings-odfl_freight'),
                'id' => 'odfl_quotes_liftgate_delivery_as_option',
                'class' => 'accessorial_service checkbox_fr_add',
            ),

//              Use my liftgate notification
            'avaibility_lift_gate' => array(
                'name' => __('Always include lift gate delivery when a residential address is detected', 'woocommerce-settings-wwe_small_packages_quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'desc' => "Click <a target='_blank' href='https://eniture.com/woocommerce-residential-address-detection/'>here</a> to add the Residential Address Detection module. (<a target='_blank' href='https://eniture.com/woocommerce-residential-address-detection/#documentation'>Learn more</a>)",
                'id' => 'avaibility_lift_gate'
            ),

            // Inside delivery
            'odfl_inside_delivery_options_label' => array(
                'name' => __('Inside Delivery ', 'woocommerce-settings-en_woo_addons_packages_quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'id' => 'odfl_inside_delivery_options_label'
            ),
            'odfl_accessorial_inside_delivery' => array(
                'name' => __('Always quote inside delivery ', 'woocommerce-settings-fedex_freight'),
                'type' => 'checkbox',
                'desc' => __('', 'woocommerce-settings-fedex_freight'),
                'id' => 'odfl_accessorial_inside_delivery',
                'class' => 'accessorial_service odfl_inside_delivery_service',
            ),
            'odfl_inside_delivery_as_option' => array(
                'name' => __('Offer inside delivery as an option', 'woocommerce-settings-fedex_freight'),
                'type' => 'checkbox',
                'desc' => __('', 'woocommerce-settings-fedex_freight'),
                'id' => 'odfl_inside_delivery_as_option',
                'class' => 'accessorial_service odfl_inside_delivery_service',
            ),
            //          Start Hot At Terminal
            'odfl_freight_hold_at_terminal_checkbox_status' => array(
                'name' => __('Hold At Terminal', 'woocommerce-settings-odfl_small'),
                'type' => 'checkbox',
                'desc' => "Offer Hold At Terminal as an option $hold_at_terminal_package_required",
                'class' => $disable_hold_at_terminal,
                'id' => 'odfl_freight_hold_at_terminal_checkbox_status',
            ),
            'odfl_freight_hold_at_terminal_fee' => array(
                'name' => __('', 'ground-transit-settings-ground_transit'),
                'type' => 'text',
                'desc' => 'Adjust the price of the Hold At Terminal option.Enter an amount, e.g. 3.75, or a percentage, e.g. 5%.  Leave blank to use the price returned by the carrier.',
                'class' => $disable_hold_at_terminal,
                'id' => 'odfl_freight_hold_at_terminal_fee'
            ),
            // End Hot At Terminal
            // Handling Weight
            'label_handling_unit_odfl' => array(
                'name' => __('Handling Unit ', 'estes_freight_wc_settings'),
                'type' => 'text',
                'class' => 'hidden',
                'id' => 'label_handling_unit_odfl'
            ),
            'handling_weight_odfl' => array(
                'name' => __('Weight of Handling Unit  ', 'estes_freight_wc_settings'),
                'type' => 'text',
                'desc' => 'Enter in pounds the weight of your pallet, skid, crate or other type of handling unit.',
                'id' => 'handling_weight_odfl'
            ),
            // max Handling Weight
            'maximum_handling_weight_odfl' => array(
                'name' => __('Maximum Weight per Handling Unit  ', 'estes_freight_wc_settings'),
                'type' => 'text',
                'desc' => 'Enter in pounds the maximum weight that can be placed on the handling unit.',
                'id' => 'maximum_handling_weight_odfl'
            ),
            'handing_fee_markup_odfl' => array(
                'name' => __('Handling Fee / Markup ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => '<span class="desc_text_style">Amount excluding tax. Enter an amount, e.g 3.75, or a percentage, e.g, 5%. Leave blank to disable.</span>',
                'id' => 'odfl_handling_fee'
            ),

            // Enale Logs
            'enale_logs_odfl' => array(
                'name' => __("Enable Logs  ", 'woocommerce_odfl_quote'),
                'type' => 'checkbox',
                'desc' => 'When checked, the Logs page will contain up to 25 of the most recent transactions.',
                'id' => 'enale_logs_odfl'
            ),

            //Ignore items with the following Shipping Class(es) By (K)
            'en_ignore_items_through_freight_classification' => array(
                'name' => __('Ignore items with the following Shipping Class(es)', 'woocommerce-settings-wwe_quetes'),
                'type' => 'text',
                'desc' => "Enter the <a target='_blank' href = '" . get_admin_url() . "admin.php?page=wc-settings&tab=shipping&section=classes'>Shipping Slug</a> you'd like the plugin to ignore. Use commas to separate multiple Shipping Slug.",
                'id' => 'en_ignore_items_through_freight_classification'
            ),

            'allow_other_plugins_odfl' => array(
                'name' => __('Show WooCommerce Shipping Options ', 'woocommerce_odfl_quote'),
                'type' => 'select',
                'default' => '3',
                'desc' => __('<span class="desc_text_style">Enabled options on WooCommerce Shipping page are included in quote results.</span>', 'woocommerce_odfl_quote'),
                'id' => 'odfl_allow_other_plugins',
                'options' => array(
                    'yes' => __('YES', 'YES'),
                    'no' => __('NO', 'NO'),
                )
            ),
            'return_ODFL_quotes' => array(
                'name' => __("Return LTL quotes when an order parcel shipment weight exceeds the weight threshold  ", 'woocommerce-settings-odfl_quetes'),
                'type' => 'checkbox',
                'desc' => '<span class="desc_text_style">When checked, the LTL Freight Quote will return quotes when an order’s total weight exceeds the weight threshold (the maximum permitted by WWE and UPS), even if none of the products have settings to indicate that it will ship LTL Freight. To increase the accuracy of the returned quote(s), all products should have accurate weights and dimensions. </span>',
                'id' => 'en_plugins_return_LTL_quotes',
                'class' => 'odflCheckboxClass'
            ),
            // Weight threshold for LTL freight
            'en_weight_threshold_lfq' => [
                'name' => __('Weight threshold for LTL Freight Quotes  ', 'woocommerce-settings-odfl_quetes'),
                'type' => 'text',
                'default' => $weight_threshold,
                'class' => $weight_threshold_class,
                'id' => 'en_weight_threshold_lfq'
            ],
            'en_suppress_parcel_rates' => array(
                'name' => __("", 'woocommerce-settings-odfl_quetes'),
                'type' => 'radio',
                'default' => 'display_parcel_rates',
                'options' => array(
                    'display_parcel_rates' => __("Continue to display parcel rates when the weight threshold is met.", 'woocommerce'),
                    'suppress_parcel_rates' => __("Suppress parcel rates when the weight threshold is met.", 'woocommerce'),
                ),
                'class' => 'en_suppress_parcel_rates',
                'id' => 'en_suppress_parcel_rates',
            ),
            // Error management
            'error_management_odfl_ltl' => array(
                'name' => __('Error management ', 'woocommerce-settings-odfl_quetes'),
                'type' => 'text',
                'id' => 'error_management_odfl_ltl',
                'class' => 'hidden',
            ),
            'error_management_settings_odfl_ltl' => array(
                'name' => __('', 'woocommerce-settings-odfl_quetes'),
                'type' => 'radio',
                'default' => 'quote_shipping',
                'options' => array(
                    'quote_shipping' => __('Quote shipping using known shipping parameters, even if other items are missing shipping parameters.', 'woocommerce'),
                    'dont_quote_shipping' => __('Don\'t quote shipping if one or more items are missing the required shipping parameters.', 'woocommerce'),
                ),
                'id' => 'error_management_settings_odfl_ltl',
            ),
            // Backup Rates
            'backup_rates_odfl' => array(
                'name' => __('Checkout options if the plugin fails to return a rate ', 'woocommerce-settings-odfl-quotes'),
                'type' => 'text',
                'class' => 'hidden',
                'desc' => __('', 'woocommerce-settings-odfl-quotes'),
                'id' => 'backup_rates_odfl'
            ),
            'enable_backup_rates_odfl' => array(
                'name' => __('', 'woocommerce-settings-odfl-quotes'),
                'type' => 'checkbox',
                'desc' => __('Present the user with a backup shipping rate.', 'woocommerce-settings-odfl-quotes'),
                'id' => 'enable_backup_rates_odfl',
            ),
            'odfl_backup_rates_label' => array(
                'name' => __('', 'woocommerce-settings-odfl-quotes'),
                'type' => 'text',
                'desc' => 'Label for backup shipping rate (Maximum of 50 characters).',
                'id' => 'odfl_backup_rates_label'
            ),
            'odfl_backup_rates_category' => array(
                'name' => __('', 'woocommerce-settings-odfl-quotes'),
                'type' => 'radio',
                'default' => 'fixed_rate',
                'options' => array(
                    'fixed_rate' => __('', 'woocommerce'),
                    'percentage_of_cart_price' => __('', 'woocommerce'),
                    'function_of_weight' => __('', 'woocommerce'),
                ),
                'id' => 'odfl_backup_rates_category',
            ),
            'odfl_backup_rates_carrier_fails_to_return_response' => array(
                'name' => __('', 'woocommerce-settings-odfl-quotes'),
                'type' => 'checkbox',
                'desc' => __('Display the backup rate if the carrier fails to return a response.', 'woocommerce-settings-odfl-quotes'),
                'id' => 'odfl_backup_rates_carrier_fails_to_return_response',
            ),
            'odfl_backup_rates_carrier_returns_error' => array(
                'name' => __('', 'woocommerce-settings-odfl-quotes'),
                'type' => 'checkbox',
                'desc' => __('Display the backup rate if the carrier returns an error.', 'woocommerce-settings-odfl-quotes'),
                'id' => 'odfl_backup_rates_carrier_returns_error',
            ),
            'odfl_backup_rates_display' => array(
                'name' => __('', 'woocommerce-settings-odfl-quotes'),
                'type' => 'radio',
                'default' => 'no_other_rates',
                'options' => array(
                    'no_plugin_rates' => __('Display the backup rate if the plugin fails to return a rate.', 'woocommerce'),
                    'no_other_rates' => __('Display the backup rate only if no rates, from any shipping method, are presented.', 'woocommerce'),
                ),
                'id' => 'odfl_backup_rates_display',
            ),

            'section_end_quote' => array(
                'type' => 'sectionend',
                'id' => 'odfl_quote_section_end'
            )
        );
        return $settings;
    }
}
