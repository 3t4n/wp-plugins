<?php
class FreightPop_API_Request {

    private $access_token;

    public function __construct() {
        global $wpdb;
        $results = $wpdb->get_results("SELECT * FROM `settings`", ARRAY_A);
        $this->access_token = isset($results[0]['accessToken']) ? $results[0]['accessToken'] : null; 
    }

    public function get_shipment_details($cart_data) {
        $api_url = "https://enterprise.freightpop.com/product/AutoCalculateShipmentDetails";
        $data = [
            "ListOfItems" => $cart_data
        ];
        $response = $this->make_request($api_url, $data);
        return json_decode($response, true);
    }

    public function get_shipping_rates($items_response, $product_details, $store_data, $shipping_data) {
        $api_url = "https://enterprise.freightpop.com/rate/getRates/v4";
        $date = new DateTime("now", new DateTimeZone("UTC"));
        $date = $date->format("Y-m-d");
        $get_rate_data = [
            'ShipDate' => $date,
            'ShipperAddress' => $store_data,
            'ConsigneeAddress' => $shipping_data,
            'Items' => $items_response,
            'ProductDetails' => $product_details
        ];
        
        $response = $this->make_request($api_url, $get_rate_data);
        return json_decode($response, true);
    }

    private function make_request($url, $data) {
        $args = [
            'method'    => 'POST',
            'body'      => wp_json_encode($data),
            'headers'   => [
                'Authorization' => 'Bearer ' . $this->access_token,
                'Content-Type'  => 'application/json',
            ],
            'timeout'   => 45, // Optional: adjust timeout as needed
        ];

        $response = wp_remote_post($url, $args);

        if (is_wp_error($response)) {
            // Handle error
            $error_msg = $response->get_error_message();
            echo esc_attr("HTTP API error: " . $error_msg);
            return null; // Return null on error
        }

        return wp_remote_retrieve_body($response);
    }
}

?>