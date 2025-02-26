<?php

namespace DavidWenner\ATestimonialBuilder;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly

/**
 * Class ATBS_ApiClient
 *
 * A simple client for interacting with the VocalReferences API.
 */
class ATBS_ApiClient {

    /**
     * The base URL for the VocalReferences API.
     * @var string
     */
    private $api_base_url;

    /**
     * The API key to use for authentication.
     * @var string
     */
    private $oauth_token;

    /**
     * ATBS_Api_Client constructor.
     * @param string $oauth_token The API key to use for authentication.
     * @param string $api_url The api url
     */
    public function __construct($oauth_token, $api_url)
    {
        $this->oauth_token = $oauth_token;
        $this->api_base_url = $api_url;
    }

    /**
     * getHeaders
     * @return array
     */
    protected function getHeaders()
    {
        return [
            'headers' => [
                'Content-Type' => 'application/json; charset=utf-8',
                'Authorization' => 'Bearer ' . $this->oauth_token,
            ],
            'timeout' => 5,
            'sslverify' => false,
            'blocking' => true,
        ];
    }

    /**
     * Makes a GET request to the specified API endpoint.
     * @param string $endpoint The API endpoint to request.
     * @param array $params The parameters to include in the request.
     * @return array|WP_Error The response from the API, or a WP_Error object if the request fails.
     */
    public function get($endpoint, $params = array())
    {

        // Build the URL for the request
        $url = $this->api_base_url . $endpoint . '?' . http_build_query($params);

        // Make the request
        $response = wp_remote_get($url, $this->getHeaders());

        // Check if the request was successful
        if (is_wp_error($response)) {
            return $response;
        }

        // Parse the response JSON
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // Check if the response was valid JSON
        if ($data === null || !is_array($data)) {
            return new WP_Error('invalid_response', 'The API response was not valid JSON.');
        }

        // Check if the response indicates an error
        if (isset($data['error'])) {
            return new WP_Error('api_error', $data['error']);
        }

        // Return the response data
        return $data;
    }

    /**
     * Makes a POST request to the specified API endpoint.
     * @param string $endpoint The API endpoint to request.
     * @param array $params The parameters to include in the request.
     * @return array|WP_Error The response from the API, or a WP_Error object if the request fails.
     */
    public function post($endpoint, $params = array())
    {
        // Add the API key and secret to the request parameters
        // Build the URL for the request
        $url = $this->api_base_url . $endpoint;

        // Set up the request arguments
        $args = array_merge([
            'body' => $params,
                ], $this->getHeaders());

        // Make the request
        $response = wp_remote_post($url, $args);

        // Check if the request was successful
        if (is_wp_error($response)) {
            return $response;
        }

        // Parse the response JSON
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        // Check if the response was valid JSON
        if ($data === null || !is_array($data)) {
            return new WP_Error('invalid_response', 'The API response was not valid JSON.');
        }

        // Check if the response indicates an error
        if (isset($data['error'])) {
            return new WP_Error('api_error', $data['error']);
        }

        // Return the response data
        return $data;
    }
}
