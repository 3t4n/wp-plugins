<?php

class WC_Addressers_Tab_Setting {

    /*
     * Bootstraps the class and hooks required actions & filters.
     *
     */
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_addressers_tab', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_addressers_tab', __CLASS__ . '::update_settings' );
    }
    
    
    /*
     * Add a new settings tab to the WooCommerce settings tabs array.
     *
     * @param array $settings_tabs Array of WooCommerce setting tabs & their labels, excluding the Subscription tab.
     * @return array $settings_tabs Array of WooCommerce setting tabs & their labels, including the Subscription tab.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['addressers_tab'] = __( 'Addresser', 'woocommerce-addressers-tab' );
        return $settings_tabs;
    }


    /*
     * Uses the WooCommerce admin fields API to output settings via the @see woocommerce_admin_fields() function.
     *
     * @uses woocommerce_admin_fields()
     * @uses self::get_addressers()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_addressers() );
    }


    /*
     * Uses the WooCommerce options API to save settings via the @see woocommerce_update_options() function.
     *
     * @uses woocommerce_update_options()
     * @uses self::get_addressers()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_addressers() );
    }


    /*
     * Get all the settings for this plugin for @see woocommerce_admin_fields() function.
     *
     * @return array Array of settings for @see woocommerce_admin_fields() function.
     */
    public static function get_addressers() {

        $settings = array(
            'section_title' => array(
                'name'     => __( 'Addresser', 'woocommerce-addressers-tab' ),
                'type'     => 'title',
                'desc'     => '',
                'id'       => 'wc_addressers_tab_section_title'
            ),
            'apikey' => array(
                'name' => __( 'API Key', 'woocommerce-addressers-tab' ),
                'type' => 'text',
                'desc' => __( 'Your API key.You can access API Key after registering for either our 14-day free "Starter" or any other paid plans, via the "My Crendentials" section after logging into the "My Addresser" portal. You can visit the <a href="https://www.portal.addresser.com.au" target="_blank">Pricing section</a> of our home page to select 14-days free "Starter Plan" to register for trial account.', 'woocommerce-addressers-tab' ),
                'id'   => 'wc_addressers_tab_apikey',
                'placeholder' => 'Enter the API key'
            ),
            'checkout_page' => array(
                'name' => __( 'Checkout page', 'woocommerce-addressers-tab' ),
                'type' => 'checkbox',
                'desc' => __( 'Enable' ),
                'id'   => 'wc_addressers_tab_checkout_page'
            ),
            'section_end' => array(
                'type' => 'sectionend',
                'id' => 'wc_addressers_tab_section_end'
            )
        );

        return apply_filters( 'wc_addressers_tab_settings', $settings );
    }

}

WC_Addressers_Tab_Setting::init();