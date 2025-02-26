<?php

namespace SMFWC\Shiperman\Admin;

if (!defined('ABSPATH')) exit;

class SMFWC_Shiperman_Settings
{
    public function __construct()
    {
        // Add the new tab to WooCommerce settings
        add_filter('woocommerce_settings_tabs_array', [$this, 'add_settings_tab'], 50);
        add_action('woocommerce_settings_tabs_shiperman', [$this, 'add_settings_fields']);
        add_action('woocommerce_update_options_shiperman', [$this, 'update_settings']);
    }

    /**
     * Add a new Shiperman tab to WooCommerce settings.
     *
     * @param array $tabs
     * @return array
     */
    public function add_settings_tab($tabs)
    {
        $tabs['shiperman'] = __('Shiperman', 'shiperman-for-woocommerce');
        return $tabs;
    }

    /**
     * Define settings fields for the Shiperman tab.
     */
    public function add_settings_fields()
    {
        woocommerce_admin_fields($this->get_settings());
    }

    /**
     * Update settings when the save button is clicked.
     */
    public function update_settings()
    {
        woocommerce_update_options($this->get_settings());
    }

    /**
     * Get settings array for the Shiperman tab.
     *
     * @return array
     */
    private function get_settings()
    {
        return [
            [
                'title' => __('Shiperman API Settings', 'shiperman-for-woocommerce'),
                'type'  => 'title',
                'desc'  => __('Enter your Shiperman API details below.', 'shiperman-for-woocommerce'),
                'id'    => 'shiperman_api_settings'
            ],
            [
                'title'    => __('API Base URL', 'shiperman-for-woocommerce'),
                'type'     => 'text',
                'desc'     => __('Enter the base URL for the Shiperman API.', 'shiperman-for-woocommerce'),
                'id'       => 'shiperman_api_base_url',
                'default'  => 'https://api.shiperman.com/api/', // Default URL
                'css'      => 'min-width:300px;',
            ],
            [
                'title'    => __('API Key', 'shiperman-for-woocommerce'),
                'type'     => 'text',
                'desc'     => __('Enter your Shiperman API key.', 'shiperman-for-woocommerce'),
                'id'       => 'shiperman_api_key',
                'default'  => '',
                'css'      => 'min-width:300px;',
            ],
            [
                'type' => 'sectionend',
                'id'   => 'shiperman_api_settings'
            ],
        ];
    }

    /**
     * Retrieve the Shiperman API base URL from settings.
     * 
     * @return string
     */
    public static function get_api_base_url()
    {
        return get_option('shiperman_api_base_url', 'https://api.shiperman.com/api');
    }

    /**
     * Retrieve the Shiperman API key from settings.
     * 
     * @return string
     */
    public static function get_api_key()
    {
        return get_option('shiperman_api_key', '');
    }
}
