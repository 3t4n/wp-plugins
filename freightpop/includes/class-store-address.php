<?php

class FreightPop_Store_Address {

    public function get_store_address() {
        // Get store address details
        $store_address     = get_option('woocommerce_store_address');
        $store_address_2   = get_option('woocommerce_store_address_2');
        $store_city        = get_option('woocommerce_store_city');
        $store_postcode    = get_option('woocommerce_store_postcode');
        $store_raw_country = get_option('woocommerce_default_country');
        $split_country     = explode(':', $store_raw_country);
        $store_country     = isset($split_country[0]) ? $split_country[0] : '';
        $store_state       = isset($split_country[1]) ? $split_country[1] : '';

        // Create the return array
        $store_info = [
            'Street'     => $store_address,
            'Street2'    => $store_address_2,
            'City'       => $store_city,
            'State'      => $store_state,
            'Country'    => $store_country,
            'Zip'        => $store_postcode
        ];

        return $store_info;
    }
}

?>