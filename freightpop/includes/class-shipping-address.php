<?php

class FreightPop_Shipping_Address {

    public function get_shipping_address() {
        $address_details = [];
        if (is_user_logged_in()) {
            // For logged-in users, use WooCommerce customer object
            $street  = WC()->customer->get_shipping_address_1();
            $street2 = WC()->customer->get_shipping_address_2();
            $city    = WC()->customer->get_shipping_city();
            $state   = WC()->customer->get_shipping_state();
            $country = WC()->customer->get_shipping_country();
            $zip     = WC()->customer->get_shipping_postcode();
            $first_name = WC()->customer->get_shipping_first_name();
            $last_name  = WC()->customer->get_shipping_last_name();
            $email      = WC()->customer->get_email();
            $phone      = WC()->customer->get_shipping_phone();
        } else {
            // For guest users, use WooCommerce checkout fields
            $checkout = WC()->checkout();
            $street  = $checkout->get_value('shipping_address_1');
            $street2 = $checkout->get_value('shipping_address_2');
            $city    = $checkout->get_value('shipping_city');
            $state   = $checkout->get_value('shipping_state');
            $country = $checkout->get_value('shipping_country');
            $zip     = $checkout->get_value('shipping_postcode');
            $first_name = $checkout->get_value('shipping_first_name');
            $last_name  = $checkout->get_value('shipping_last_name');
            $email      = $checkout->get_value('billing_email');  // Email from billing
            $phone      = $checkout->get_value('billing_phone');  // Phone from billing
        }

        // Prepare the response array
        $address_details = [
            'Street'     => $street,
            'Street2'    => $street2,
            'City'       => $city,
            'State'      => $state,
            'Country'    => $country,
            'Zip'        => $zip,
            'Company'    => $first_name . ' ' . $last_name,
            'AttentionTo'=> $first_name . ' ' . $last_name,
        ];

        // Include email if valid
        if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $address_details['Email'] = $email;
        }

        // Include phone if it has 10 or more characters
        if (!empty($phone) && strlen($phone) >= 10) {
            $address_details['Phone'] = $phone;
        }

        // Check if essential shipping address details are available
        if ($street && $city && $country && $zip) {
            return $address_details;
        }

        return false;
    }
}

?>