<?php

/**
 * Define the API 
 *
 * Class to connect with backend APIs for credits, key activations
 * and alt text generation
 *
 * @link       https://alttextgo.com
 * @since      1.0.0
 *
 * @package    ALTGOO
 * @subpackage ALTGOO/includes
 * 
 * @author     ALtTextGo <support@alttextgo.com>
 */

class ALTGOO_API {
  /**
	 * The API key of the user.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $api_key    The API key for backend connection.
	 */
	private $api_key;

  /**
	 * The API URL.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $base_url    The base URL of the backend API.
	 */
	private $base_url;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $api_key ) {
    $this->api_key = $api_key;
    $this->base_url = 'https://alt-text-go-server-030aeb819718.herokuapp.com/api/v1';
	}

    /**
     * Fetch user credits, returns a number on success, a WP_Error object on failure.
     *
     * @since 1.0.0
     * @access public
     */
    public function get_credits() {
        $response = wp_remote_get(
            $this->base_url . '/credits',
            array(
                'headers' => array(
                    'Content-Type'  => 'application/json',
                    'Authorization'   => 'ApiKey ' . $this->api_key,
                ),
            )
        );
      
        // Check if the request resulted in an error
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            return new WP_Error( 'api_request_failed', 'API request failed: ' . $error_message );
        }
  
        // Get the HTTP response code
        $response_code = wp_remote_retrieve_response_code( $response );
        $body = wp_remote_retrieve_body( $response );
      
        // Handle different response codes
        switch ( $response_code ) {
            case 200:
            // Successful response
            $data = json_decode( $body, true );
            if ( isset( $data['allocated_credits'] ) && isset( $data['used_credits'] ) ) {
                return $data['allocated_credits'] - $data['used_credits'];
            } else {
                return new WP_Error( 'invalid_response', 'Invalid response structure from API' );
            }
  
            case 401:
            // Invalid authentication
            return new WP_Error( 'authentication_failed', 'Invalid API Key provided' );
  
            case 422:
            // Validation error
            $data = json_decode( $body, true );
            if ( isset( $data['detail'] ) ) {
                return new WP_Error( 'validation_error', 'Validation error');
            } else {
                return new WP_Error( 'validation_error', 'Unknown validation error' );
            }
  
            case 500:
            // Server error
            return new WP_Error( 'server_error', 'Server error occurred while fetching credits' );
  
            default:
            // Other unexpected status codes
            return new WP_Error( 'unexpected_error', 'Unexpected response code: ' . $response_code );
      }
    }

    /**
     * Activate API key.
     *
     * @since 1.0.0
     * @access public
     */
    public function activate_api_key() {
        // Prepare the request body with platform and site_id
        $body = wp_json_encode( array(
            'platform' => 'wordpress',
            'site_id'  => 'wp-test-a',
        ) );

        $response = wp_remote_post(
            $this->base_url . '/api-keys/api-key-activations',
            array(
                'headers' => array(
                    'Content-Type'  => 'application/json',
                    'Authorization'   => 'ApiKey ' . $this->api_key,
                ),
                'body'    => $body,
            )
        );

        // Check if the request resulted in an error
        if ( is_wp_error( $response ) ) {
            $error_message = $response->get_error_message();
            return new WP_Error( 'api_request_failed', 'API request failed: ' . $error_message );
        }

        // Get the HTTP response code
        $response_code = wp_remote_retrieve_response_code( $response );
        $body = wp_remote_retrieve_body( $response );

        // Handle different response codes
        switch ( $response_code ) {
            case 200:
                // Successful response
                $data = json_decode( $body, true );
                if ( isset( $data['activation_status'] )) {
                    return true;
                } else {
                    return new WP_Error( 'invalid_response', 'Invalid response structure from API, no activation_status found' );
                }

            case 400:
                // Activation limit reached
                return new WP_Error( 'activation_limit_reached', 'API key activation limit reached' );
    
            case 401:
                // Invalid authentication
                return new WP_Error( 'authentication_failed', 'Invalid API Key provided' );

            case 409:
                // Mismatched platform
                return new WP_Error( 'mismatched_api_key_platform', 'API key mismatched platform' );
    
            case 422:
                // Validation error
                $data = json_decode( $body, true );
                if ( isset( $data['detail'] ) ) {
                    return new WP_Error( 'validation_error', 'Validation error');
                } else {
                    return new WP_Error( 'validation_error', 'Unknown validation error' );
                }

            case 500:
                // Server error
                return new WP_Error( 'server_error', 'Server error occurred while fetching credits' );

            default:
                // Other unexpected status codes
                return new WP_Error( 'unexpected_error', 'Unexpected response code: ' . $response_code );
        }        

    }    

    /**
     * Generate alt text from image.
     *
     * @since 1.0.0
     * @access public
	 * @param      string    $image_id     id of the image 
     * @param      string    $image_url    source url of the image 
     * @param      string    $keywords     SEO keywords
     */
    public function generate_alt_text($image_id, $image_url, $keywords) {
        if (str_starts_with($image_url, 'http://localhost:')) {
            // image is hosted in local
            $extention = pathinfo($image_url, PATHINFO_EXTENSION);
            $file_path = get_attached_file($image_id);
            $base64_encode = base64_encode(file_get_contents($file_path));
            $encoded_image = ("data:image/" . $extention . ";base64," . $base64_encode);
            $request_body = array(
                'encoded_image' => $encoded_image,
                'generation_requirements' => array (
                    'seo_keywords' => $keywords
                )
            );
        } else {
            // image is in public
            $request_body = array(
                'image_url' => $image_url,
                'generation_requirements' => array (
                    'seo_keywords' => $keywords
                )
            );
        }
        $response = wp_remote_post(
            $this->base_url . '/generate-alt-text',
            array(
                'headers' => array(
                    'Content-Type'  => 'application/json',
                    'Authorization'     => "ApiKey " . $this->api_key
                ),
                'body' => wp_json_encode( $request_body )
            )
        );
        if (is_wp_error( $response )) {
            return new WP_Error( 'api_request_failed');
        }
        $response_code = wp_remote_retrieve_response_code( $response );
        if ($response_code === 200) {
            return json_decode( wp_remote_retrieve_body( $response ), true );
        } else {
            return new WP_Error($response_code);
        }  
    } 
}