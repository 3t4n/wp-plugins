<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class GMACAW_API {
    
    public function __construct() {
        // Register the REST API route on plugin activation
        add_action('rest_api_init', array($this, 'GMACAW_rest_api_init'));
    }

    public function GMACAW_rest_api_init() {
        // Register a custom route for saving settings
        register_rest_route('gmacaw/v1', '/save-settings', array(
            'methods' => 'POST',
            'callback' => array($this, 'GMACAW_save_multiple_settings'),
            'permission_callback' => array($this, 'GMACAW_permission_callback'),
        ));

        // Register a custom route for fetching settings (GET)
        register_rest_route('gmacaw/v1', '/get-settings', array(
            'methods' => 'GET',
            'callback' => array($this, 'GMACAW_get_settings'),
            'permission_callback' => array($this, 'GMACAW_permission_callback'),
        ));
    }

    // Save multiple settings
    public function GMACAW_save_multiple_settings($request) {
         // Get nonce from request headers
        $nonce = $request->get_header('X-WP-Nonce');

        // Verify nonce
        if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
            return new WP_REST_Response(array(
            'success' => false,
            'message' => 'Invalid nonce',
        ), 403); // Invalid nonce error
        }
        // Retrieve the settings array from the request body
        $settings = $request->get_param('settings');

        if (!is_array($settings)) {
            return new WP_Error('invalid_settings', 'Settings must be an array', array('status' => 400));
        }

        $response = array();

        // Loop through each setting and save it
        foreach ($settings as $option_name => $option_value) {
            // Sanitize the option name
            $option_name = sanitize_key($option_name);

            // Sanitize the option value based on your use case. Example:
            if (is_array($option_value)) {
                $option_value = array_map('sanitize_text_field', $option_value); // Sanitize array values
            } else {
                $option_value = sanitize_text_field($option_value); // Sanitize single value
            }

            // Save the option
            $result = update_option($option_name, $option_value);

            // Add the result to the response
            $response[$option_name] = $result ? 'saved' : 'failed';
        }

        return rest_ensure_response(array(
            'success' => true,
            'message' => 'Settings processed',
            'results' => $response,
        ));
    }

    // Retrieve settings
    public function GMACAW_get_settings($request) {
         // Get nonce from request headers
        $nonce = $request->get_header('X-WP-Nonce');

        // Verify nonce
        if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
            return new WP_REST_Response(array(
            'success' => false,
            'message' => 'Invalid nonce',
        ), 403); // Invalid nonce error
        }
        // Define the options to retrieve
        $options = array(
            'gmacaw_enabled',
            'gmacaw_google_places_api_key',
            'gmacaw_specific_country',
            'gmacaw_address_options',
            'gmacaw_place_types',
        );

        $response = array();

        // Retrieve each option and add it to the response array
        foreach ($options as $option) {
            $response[$option] = get_option($option);
        }

        return rest_ensure_response($response);
    }

    // Permission callback: only allow admins
    public function GMACAW_permission_callback($request) {
        return current_user_can('manage_options'); // Allow only admins
    }
}

// Initialize the API class
new GMACAW_API();
