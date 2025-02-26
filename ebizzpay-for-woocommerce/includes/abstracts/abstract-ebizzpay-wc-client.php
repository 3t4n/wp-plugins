<?php
if ( !defined( 'ABSPATH' ) ) exit;

abstract class EbizzPay_WC_Client {

    const PRODUCTION_API_URL = 'https://ebizzpay.com/api/';
    const SANDBOX_API_URL    = 'https://stg-api.ebizzpay.com/api/';

    protected $access_token;
    protected $signature_key;
    protected $sandbox = true;
    protected $debug = false;

    // HTTP request URL
    private function get_url( $route = null ) {

        if ( $this->sandbox ) {
            return self::SANDBOX_API_URL . $route;
        } else {
            return self::PRODUCTION_API_URL . $route;
        }

    }

    // HTTP request headers
    private function get_headers() {

        if ( !$this->access_token ) {
            throw new Exception( __( 'Missing access token', 'ebizzpay-wc' ) );
        }

        return array(
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json',
            'Authorization' => 'Bearer ' . $this->access_token,
        );

    }

    // HTTP GET request
    protected function get( $route, $params = array() ) {
        return $this->request( $route, $params, 'GET' );
    }

    // HTTP POST request
    protected function post( $route, $params = array() ) {
        return $this->request( $route, $params );
    }

    // HTTP request
    protected function request( $route, $params = array(), $method = 'POST' ) {

        $url = $this->get_url( $route );

        $args['headers'] = $this->get_headers();
        $args['body'] = $params;

        if ( $method == 'POST' ) {
            $args['body'] = wp_json_encode( $params );
        }

        $this->log( sprintf( __( 'URL: %s', 'ebizzpay-wc' ), $url ) );
        $this->log( sprintf( __( 'Headers: %s', 'ebizzpay-wc' ), wp_json_encode( $args['headers'] ) ) );
        $this->log( sprintf( __( 'Body: %s', 'ebizzpay-wc' ), wp_json_encode( $params ) ) );

        // Set request timeout to 30 seconds
        $args['timeout'] = 30;

        switch ( $method ) {
            case 'GET':
                $response = wp_remote_get( $url, $args );
                break;

            case 'POST':
                $response = wp_remote_post( $url, $args );
                break;

            default:
                $args['method'] = $method;
                $response = wp_remote_request( $url, $args );
        }

        if ( is_wp_error( $response ) ) {
            throw new Exception( $response->get_error_message() );
        }

        $code = wp_remote_retrieve_response_code( $response );
        $body = json_decode( wp_remote_retrieve_body( $response ), true );

        $this->log( sprintf( __( 'Response: %s', 'ebizzpay-wc' ), wp_json_encode( $body ) ) );

        // Check if there is a single error. A single error means the error is not due to input data.
        if ( isset( $body['errors'] ) && is_string( $body['errors'] ) ) {
            $error = sanitize_text_field( $body['errors'] );

            $this->log( sprintf( __( 'Response Error: %s', 'ebizzpay-wc' ), $error ) );
            throw new Exception( $error );
        }

        return array( $code, $body );

    }

    // Get IPN response data
    public function get_ipn_response() {

        if ( !in_array( $_SERVER['REQUEST_METHOD'], array( 'GET', 'POST' ) ) ) {
            return false;
        }

        return $this->get_valid_ipn_response( $_REQUEST );

    }

    // Get valid IPN response data and sanitize it
    private function get_valid_ipn_response( array $data = array() ) {

        $params = $this->get_ipn_params();

        $allowed_data = array();

        foreach ( $params as $param ) {
            // Return false if required parameters is not passed to the URL
            if ( !isset( $data[ $param ] ) ) {
                return false;
            }

            $allowed_data[ $param ] = $this->sanitize_ipn_response( $data[ $param ] );
        }

        return $allowed_data;

    }

    // Get list of parameters that will be passed in IPN response
    private function get_ipn_params() {

        return array(
            'amount',
            'bill_id',
            'bill_no',
            'currency',
            'paid',
            'payment_method',
            'ref1',
            'ref2',
            'ref_id',
            'status',
            'signature',
        );

    }

    // Sanitize IPN response data
    private function sanitize_ipn_response( $value ) {

        if ( is_array( $value ) ) {
            foreach ( $value as $v ) {
                return $this->sanitize_ipn_response( $v );
            }
        } else {
            $value = trim( sanitize_text_field( $value ) );
        }

        return $value;

    }

    // Validate IPN response data
    public function validate_ipn_response( $response ) {

        if ( !$this->verify_signature( $response ) ) {
            throw new Exception( __( 'Signature mismatch', 'ebizzpay-wc' ) );
        }

        return true;

    }

    // Verify signature parameter value received from IPN response data
    private function verify_signature( $response ) {

        if ( !$this->signature_key ) {
            throw new Exception( __( 'Missing signature key', 'ebizzpay-wc' ) );
        }

        $signature = isset( $response['signature'] ) ? sanitize_text_field( $response['signature'] ) : false;

        if ( !$signature ) {
            throw new Exception( __( 'Missing IPN signature value', 'ebizzpay-wc' ) );
        }

        ksort( $response );
        unset( $response['signature'] );

        $encoded_data = array_map( function( $key, $value ) {
            return "$key:$value";
        }, array_keys( $response ), $response );

        $encoded_data = implode( '|', $encoded_data );

        $generated_signature = hash_hmac( 'sha256', $encoded_data, $this->signature_key );

        return $signature == $generated_signature;

    }

    // Debug logging
    private function log( $message ) {

        if ( $this->debug ) {
            ebizzpay_wc_logger( $message );
        }

    }

}
