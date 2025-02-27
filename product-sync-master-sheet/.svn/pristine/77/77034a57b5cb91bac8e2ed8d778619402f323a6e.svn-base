<?php
if( ! function_exists('sflpricing_codeastrology_get_n_manage_data')){
    function sflpricing_codeastrology_get_n_manage_data($product_id, $transient_name){
        $api_url = 'https://codeastrology.com/edd-api/products/?product=' . $product_id;

    // Perform the GET request
    $response = wp_remote_get($api_url);

    // Check for errors
    if (is_wp_error($response)) {
        echo 'Error: ' . $response->get_error_message();
        return;
    }

    // Retrieve and decode the body of the response
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Check if decoding was successful
    if (null === $data) {
        echo 'Error: Unable to decode JSON.';
        return;
    }

    // Display the data

    $rem_pricing_variable = $data['products'][0]['pricing'] ?? [];
    //


    set_transient($transient_name, $rem_pricing_variable, 60 * 60 * 48);
    return $rem_pricing_variable;
    }
}

if( ! function_exists('sflpricing_codeastrology_checkout_url')){
    function sflpricing_codeastrology_checkout_url($product_id, $price_id = 1){
        //https://codeastrology.com/checkout?edd_action=add_to_cart&download_id=14384&edd_options%5Bprice_id%5D=1

        $checkout_url = 'https://codeastrology.com/checkout?edd_action=add_to_cart&discount=INTROSALE&download_id=' . $product_id . '&edd_options%5Bprice_id%5D=' . $price_id;
        return $checkout_url;
    }
}