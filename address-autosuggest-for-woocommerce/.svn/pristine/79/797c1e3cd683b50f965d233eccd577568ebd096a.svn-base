<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Address_AutoSuggest_Settings {
    public static function init() {
        add_filter( 'woocommerce_settings_tabs_array', [ __CLASS__, 'add_settings_tab' ], 50 );
        add_action( 'woocommerce_settings_tabs_address_autosuggest', [ __CLASS__, 'settings_tab_content' ] );
        add_action( 'woocommerce_update_options_address_autosuggest', [ __CLASS__, 'update_settings' ] );

        add_filter( 'plugin_action_links_' . plugin_basename( ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_PLUGIN_DIR . 'address-autosuggest-for-woocommerce.php' ), [ __CLASS__, 'add_settings_link' ] );
    }

    public static function add_settings_tab( $tabs ) {
        $tabs['address_autosuggest'] = __( 'Address AutoSuggest', 'address-autosuggest-for-woocommerce' );
        return $tabs;
    }

    public static function settings_tab_content() {
        woocommerce_admin_fields( self::get_settings() );
    }

    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }

    public static function add_settings_link( $links ) {
        $settings_link = '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=address_autosuggest' ) . '">' . __( 'Settings', 'address-autosuggest-for-woocommerce' ) . '</a>';
        array_unshift( $links, $settings_link );
        return $links;
    }

    public static function get_settings() {
        $countries = self::get_country_list();
        $selected_countries = get_option( 'address_autosuggest_countries', [] );

        return [
            'section_title' => [
                'name' => __( 'Address AutoSuggest Settings', 'address-autosuggest-for-woocommerce' ),
                'type' => 'title',
                'desc' => __( 'To enable address autocomplete on the WooCommerce checkout page, enter your Google API key below. Follow these steps to obtain your API key:', 'address-autosuggest-for-woocommerce' )
                    . '<ol>'
                    . '<li>' . __( 'Go to the <a href="https://console.cloud.google.com/google/maps-apis/home;onboard=true" target="_blank">Google Cloud Console</a>.', 'address-autosuggest-for-woocommerce' ) . '</li>'
                    . '<li>' . __( 'Create or select a project.', 'address-autosuggest-for-woocommerce' ) . '</li>'
                    . '<li>' . __( 'Enable the "Places API".', 'address-autosuggest-for-woocommerce' ) . '</li>'
                    . '<li>' . __( 'Generate an API key under "Credentials".', 'address-autosuggest-for-woocommerce' ) . '</li>'
                    . '<li>' . __( 'Restrict the API key to prevent unauthorized use.', 'address-autosuggest-for-woocommerce' ) . '</li>'
                    . '<li>' . __( 'Support us by choosing <a href="https://webv8.net" target="_blank">Web V8 Web Hosting</a> for fast, secure, and performance-driven hosting.', 'address-autosuggest-for-woocommerce' ) . '</li>'
                    . '</ol>',
                'id'   => 'address_autosuggest_section_title',
            ],
            'api_key' => [
                'name'     => __( 'Google API Key', 'address-autosuggest-for-woocommerce' ),
                'type'     => 'text',
                'desc'     => __( 'Enter your Google API key. If left blank, the plugin will not enable the autocomplete functionality.', 'address-autosuggest-for-woocommerce' ),
                'id'       => ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_SETTINGS_OPTION,
            ],
            'countries' => [
                'name'     => __( 'Allowed Countries', 'address-autosuggest-for-woocommerce' ),
                'type'     => 'multiselect',
                'desc'     => __( 'Select one or more countries to restrict autocomplete. Leave empty to allow all countries.', 'address-autosuggest-for-woocommerce' ),
                'id'       => 'address_autosuggest_countries',
                'options'  => $countries,
                'default'  => [],
                'class'    => 'wc-enhanced-select',
                'custom_attributes' => [
                    'multiple' => 'multiple',
                    'style' => 'width: 100%;',
                ],
            ],
            'section_end' => [
                'type' => 'sectionend',
                'id'   => 'address_autosuggest_section_end',
            ],
        ];
    }

    public static function get_country_list() {
        if ( function_exists( 'WC' ) && WC()->countries ) {
            return WC()->countries->get_countries(); // Uses the full WooCommerce country list
        }
        return [];
    }
}

Address_AutoSuggest_Settings::init();
