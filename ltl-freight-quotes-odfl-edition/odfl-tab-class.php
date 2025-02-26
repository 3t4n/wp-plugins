<?php

/**
 * Woocommerce Settings Tab Class
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Woocommerce Setting Tab Class
 */
class WC_Settings_ODFL_Freight extends WC_Settings_Page {

    /**
     * Woocommerce Setting Tab Class Constructor
     */
    public function __construct() {
        $this->id = 'odfl_quotes';
        add_filter('woocommerce_settings_tabs_array', array($this, 'add_settings_tab'), 50);
        add_action('woocommerce_sections_' . $this->id, array($this, 'output_sections'));
        add_action('woocommerce_settings_' . $this->id, array($this, 'output'));
        add_action('woocommerce_settings_save_' . $this->id, array($this, 'save'));
    }

    /**
     * ODFL Setting Tab For Woocommerce
     * @param $settings_tabs
     * @return string
     */
    public function add_settings_tab($settings_tabs) {
        $settings_tabs[$this->id] = __('ODFL Freight', 'woocommerce_odfl_quote');
        return $settings_tabs;
    }

    /**
     * ODFL Setting Sections
     * @return string
     */
    public function get_sections() {
        $sections = array(
            '' => __('Connection Settings', 'woocommerce_odfl_quote'),
            'section-1' => __('Quote Settings', 'woocommerce_odfl_quote'),
            'section-2' => __('Warehouses', 'woocommerce_odfl_quote'),
            'shipping-rules' => __('Shipping Rules', 'woocommerce_odfl_quote'),
            // fdo va
            'section-4' => __('FreightDesk Online', 'woocommerce_odfl_quote'),
            'section-5' => __('Validate Addresses', 'woocommerce_odfl_quote'),
            'section-3' => __('User Guide', 'woocommerce_odfl_quote'),
        );

         // Logs data
        $enable_logs = get_option('enale_logs_odfl');
        if ($enable_logs == 'yes') {
            $sections['en-logs'] = 'Logs';
        }

        $sections = apply_filters('en_woo_addons_sections', $sections, en_woo_plugin_odfl_quotes);
        // Standard Packaging
        $sections = apply_filters('en_woo_pallet_addons_sections', $sections, en_woo_plugin_odfl_quotes);
        return apply_filters('woocommerce_get_sections_' . $this->id, $sections);
    }

    /**
     * ODFL Warehouse Tab
     * @return string
     */
    public function odfl_warehouse() {
        require_once 'warehouse-dropship/wild/warehouse/odfl_warehouse_template.php';
        require_once 'warehouse-dropship/wild/dropship/odfl_dropship_template.php';
    }

    /**
     * ODFL User Guide Tab
     * @return string
     */
    public function odfl_user_guide() {
        include_once( 'template/guide.php' );
    }

    /**
     * Getting Pages on tab call
     * @param $section
     * @return string/array
     */
    public function get_settings($section = null) {
        ob_start();
        switch ($section) {
            case 'section-0' :
                $settings = ODFL_Connection_Settings::odfl_con_setting();
                break;
            case 'section-1':
                $odfl_quote_Settings = new ODFL_Quote_Settings();
                $settings = $odfl_quote_Settings->odfl_quote_settings_tab();
                break;
            case 'shipping-rules':
                $this->shipping_rules_section();
                $settings = [];
                break;
            case 'section-2' :
                $this->odfl_warehouse();
                $settings = [];
                break;
            case 'section-3' :
                $this->odfl_user_guide();
                $settings = [];
                break;
            // fdo va
            case 'section-4' :
                $this->freightdesk_online_section();
                $settings = [];
                break;

            case 'section-5' :
                $this->validate_addresses_section();
                $settings = [];
                break;

            case 'en-logs' :
                $this->shipping_logs_section();
                $settings = [];
                break;

            default:
                $odfl_con_settings = new ODFL_Connection_Settings();
                $settings = $odfl_con_settings->odfl_con_setting();
                break;
        }

        $settings = apply_filters('en_woo_addons_settings', $settings, $section, en_woo_plugin_odfl_quotes);
        // Standard Packaging
        $settings = apply_filters('en_woo_pallet_addons_settings', $settings, $section, en_woo_plugin_odfl_quotes);
        $settings = $this->avaibility_addon($settings);
        return apply_filters('woocommerce_odfl_quote', $settings, $section);
    }

    /**
     * avaibility_addon 
     * @param array type $settings
     * @return array type
     */
    function avaibility_addon($settings) {
        if (is_plugin_active('residential-address-detection/residential-address-detection.php')) {
            unset($settings['avaibility_lift_gate']);
            unset($settings['avaibility_auto_residential']);
        }

        return $settings;
    }

    /**
     * Out for wooCommerce setting page
     * @global $current_section
     */
    public function output() {
        global $current_section;
        $settings = $this->get_settings($current_section);
        WC_Admin_Settings::output_fields($settings);
    }

    /**
     * ODFL Save Settings
     * @return string
     */
    public function save() {
        global $current_section;
        $settings = $this->get_settings($current_section);
        // Cuttoff Time
        if (isset($_POST['odfl_freight_order_cut_off_time']) && $_POST['odfl_freight_order_cut_off_time'] != '') {
            $time_24_format = $this->odfl_get_time_in_24_hours($_POST['odfl_freight_order_cut_off_time']);
            $_POST['odfl_freight_order_cut_off_time'] = $time_24_format;
        }

        // backup rates
        $backup_rates_fields = ['odfl_backup_rates_fixed_rate', 'odfl_backup_rates_cart_price_percentage', 'odfl_backup_rates_weight_function'];
        foreach ($backup_rates_fields as $field) {
            if (isset($_POST[$field])) update_option($field, $_POST[$field]);
        }

        WC_Admin_Settings::save_fields($settings);
    }

    /**
     * Cuttoff Time
     * @param $timeStr
     * @return false|string
     */
    public function odfl_get_time_in_24_hours($timeStr)
    {
        $cutOffTime = explode(' ', $timeStr);
        $hours = $cutOffTime[0];
        $separator = $cutOffTime[1];
        $minutes = $cutOffTime[2];
        $meridiem = $cutOffTime[3];
        $cutOffTime = "{$hours}{$separator}{$minutes} $meridiem";
        return date("H:i", strtotime($cutOffTime));
    }
    // fdo va
    /**
     * FreightDesk Online section
     */
    public function freightdesk_online_section()
    {
        include_once plugin_dir_path(__FILE__) . 'fdo/freightdesk-online-section.php';
    }

    /**
     * Validate Addresses Section
     */
    public function validate_addresses_section()
    {
        include_once plugin_dir_path(__FILE__) . 'fdo/validate-addresses-section.php';
    }

    /**
     * Shipping Logs Section
    */
    public function shipping_logs_section()
    {
        include_once plugin_dir_path(__FILE__) . 'logs/en-logs.php';
    }

    public function shipping_rules_section() 
    {
        include_once plugin_dir_path(__FILE__) . 'shipping-rules/shipping-rules-template.php';
    }
}

return new WC_Settings_ODFL_Freight();