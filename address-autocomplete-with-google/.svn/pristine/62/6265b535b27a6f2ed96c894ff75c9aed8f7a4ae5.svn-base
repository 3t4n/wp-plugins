<?php
class Address_Autocomplete {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    public function enqueue_scripts() {
        $api_key = Address_Autocomplete_Settings::get_api_key();
        $target_selectors = Address_Autocomplete_Settings::get_target_selectors();
        $place_type = Address_Autocomplete_Settings::get_place_type();
        $country = Address_Autocomplete_Settings::get_country_restriction();

        if (!empty($api_key)) {
            wp_enqueue_script(
                'address-autocomplete-script', 
                plugin_dir_url(__FILE__) . '../js/address-autocomplete.js', 
                array('jquery'), 
                '1.0.0',  // ✅ Version number added
                true
            );

            wp_localize_script('address-autocomplete-script', 'AddressAutocompleteSettings', array(
                'apiKey' => esc_js($api_key),
                'targetSelectors' => esc_js($target_selectors),
                'placeType' => esc_js($place_type),
                'country' => esc_js($country)
            ));
        }
    }
}
