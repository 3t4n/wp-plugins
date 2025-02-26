<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
class Address_AutoSuggest {
    public static function init() {
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_scripts' ] );
    }

    public static function enqueue_scripts() {
        if ( class_exists( 'WooCommerce' ) && is_checkout() ) {
            $api_key = get_option( ADDRESS_AUTOSUGGEST_FOR_WOOCOMMERCE_SETTINGS_OPTION, '' );
            $selected_countries = get_option( 'address_autosuggest_countries', [] );
            $plugin_url = plugin_dir_url( __FILE__ );

            // Enqueue your custom script with version
            wp_enqueue_script(
                'address-autosuggest',
                $plugin_url . '../assets/js/address-autosuggest.js',
                [ 'jquery' ],
                filemtime( plugin_dir_path( __FILE__ ) . '../assets/js/address-autosuggest.js' ), // Version based on file modification time
                true
            );

            // Localize data for JavaScript
            wp_localize_script( 'address-autosuggest', 'AddressAutoSuggestData', [
                'selectedCountries' => $selected_countries,
                'apiKey' => $api_key,
            ] );

            // Enqueue Google Maps API script with a fallback version
            if ( ! empty( $api_key ) ) {
                wp_enqueue_script(
                    'google-places-api',
                    'https://maps.googleapis.com/maps/api/js?key=' . esc_attr( $api_key ) . '&libraries=places',
                    [],
                    '1.0', // Use a fixed version since it's a third-party resource
                    true
                );
            }
        }
    }
}

Address_AutoSuggest::init();
