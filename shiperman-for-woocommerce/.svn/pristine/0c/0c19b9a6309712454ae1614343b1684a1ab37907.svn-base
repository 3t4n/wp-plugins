<?php


namespace SMFWC\Shiperman\API;

use SMFWC\Shiperman\Admin\SMFWC_Shiperman_Settings;

if (!defined('ABSPATH')) exit;

class SMFWC_Shiperman_API
{
    private static $instance = null;

    private $api_url;
    private $api_key;

    private function __construct()
    {
        $this->api_url = SMFWC_Shiperman_Settings::get_api_base_url();
        $this->api_key = SMFWC_Shiperman_Settings::get_api_key();
    }

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get_shipping_rate($weight, $dimensions, $destination)
    {
        $response = wp_remote_post($this->api_url, [
            'body' => wp_json_encode([
                'weight' => $weight,
                'dimensions' => $dimensions,
                'country' => $destination['country'],
                'city' => $destination['city'],
                'address' => $destination['address'],
            ]),
            'headers' => [
                'Authorization' => 'Bearer ' . $this->api_key,
                'Content-Type' => 'application/json',
            ],
        ]);

        if (is_wp_error($response)) return false;

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
        return $data['shipping_rate'] ?? false;
    }

    public function get_access_token($email, $password)
    {

        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'X-API-KEY' => $this->api_key
        ];

        $body = [
            'grant_type' => 'password',
            'username' => $email,
            'password' => $password
        ];

        $response = wp_remote_post($this->api_url . '/login', [
            'headers' => $headers,
            'body' => http_build_query($body)
        ]);

        if (is_wp_error($response)) {
            return $response->get_error_message();
        }

        return json_decode(wp_remote_retrieve_body($response), true);
    }

    public function make_authenticated_request($endpoint, $method = 'GET', $body = [])
    {
        // Ensure session is started and token is set
        if (!session_id()) {
            session_start();
        }

        $headers = [
            'Content-Type' => 'application/json',
            'X-API-KEY' => $this->api_key
        ];

        // if ( 'parcel/check-price' === $endpoint || 'parcel/check-price/' === $endpoint ) {

        // } 
        if (isset($_SESSION['shiperman_jwt_token'])) {
            $token = sanitize_text_field($_SESSION['shiperman_jwt_token']);

            // Optional: Validate the token if you know its format
            if (preg_match('/^[A-Za-z0-9\-\._~\+\/]+=*$/', $token)) { // Example for JWT-like tokens
                $headers['Authorization'] = 'Bearer ' . $token;
            } else {
                // Log or handle invalid token format
                error_log('Invalid JWT token in session.');
            }
        }


        $args = [
            'method'  => $method,
            'headers' => $headers,
            'timeout' => 10,
        ];

        if (!empty($body)) {
            $args['body'] = wp_json_encode($body);
        }

        $endpoint_url = $this->api_url . $endpoint;

        // Send the request
        $response = wp_remote_request($endpoint_url, $args);

        // Handle errors
        if (is_wp_error($response)) {
            return $response->get_error_message();
        }

        // Return response body
        return json_decode(wp_remote_retrieve_body($response), true);
    }
}
