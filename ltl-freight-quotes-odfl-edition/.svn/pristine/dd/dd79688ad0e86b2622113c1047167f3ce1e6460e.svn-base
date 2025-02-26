<?php

/**
 * ODFL Test connection HTML Form
 * @package     Woocommerce ODFL Edition
 * @author      <https://eniture.com/>
 * @copyright   Copyright (c) 2017, Eniture
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ODFL Test connection HTML Form
 */
class ODFL_Connection_Settings {

    /**
     * ODFL Test connection form function
     * @return array
     */
    public function odfl_con_setting() {
        echo '<div class="connection_section_class_odfl">';
        $settings = array(
            'section_title_odfl' => array(
                'name' => __('', 'woocommerce_odfl_quote'),
                'type' => 'title',
                'desc' => '<br> ',
                'id' => 'wc_settings_odfl_title_section_connection',
            ),
            'account_no_odfl' => array(
                'name' => __('Shipper Account Number ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => __('', 'woocommerce_odfl_quote'),
                'id' => 'wc_settings_odfl_account_no'
            ),
            'third_party_acc_odfl' => array(
                'name' => __('Third Party Account Number ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => __('', 'woocommerce_odfl_quote'),
                'id' => 'wc_settings_odfl_third_party_acc'
            ), 
            'userid_odfl' => array(
                'name' => __('Username ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => __('', 'woocommerce_odfl_quote'),
                'id' => 'wc_settings_odfl_username'
            ),
            'password_odfl' => array(
                'name' => __('Password ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => __('', 'woocommerce_odfl_quote'),
                'id' => 'wc_settings_odfl_password'
            ),
            'billing_zip_code_key_odfl' => array(
                'name' => __('Billing Postal Code ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'id' => 'billing_zip_code_key_odfl'
            ),
            'plugin_licence_key_odfl' => array(
                'name' => __('Eniture API Key ', 'woocommerce_odfl_quote'),
                'type' => 'text',
                'desc' => __('Obtain a Eniture API Key from <a href="https://eniture.com/woocommerce-odfl-ltl-freight/" target="_blank" >eniture.com </a>', 'woocommerce_odfl_quote'),
                'id' => 'wc_settings_odfl_plugin_licence_key'
            ),
            'section_end_odfl' => array(
                'type' => 'sectionend',
                'id' => 'wc_settings_odfl_plugin_licence_key'
            ),
        );
        return $settings;
    }

}