<?php
  /**
   * Anka Pay API class to handle API requests.
   *
   * @package Anka_Commerce
   * @since 1.0.0
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit;
  }

  class Anka_Pay_API {
    private $api_url = 'https://api.anka.africa/v1/payment';
    private $api_token;
    const CENTLESS_CURRENCIES = array( 'XOF', 'XAF', 'RWF' );

    public function __construct( $api_token ) {
      $this->api_token = sanitize_text_field($api_token);
    }

    /**
     * Enable webhook for the ANKA Pay API.
     *
     * @return void
     */
    public function enable_webhook() {
      $webhook_url = esc_url(rest_url('anka-pay/v1/webhook'));

      $data = array(
        'type' => 'payment_webhooks',
        'attributes' => array(
          'webhook_url' => $webhook_url,
          'webhook_enabled' => true
        )
      );

      $body = wp_json_encode(array(
        'data' => $data
      ));

      $response = $this->send_post_request($this->api_url . '/webhook', $body);

      if (is_wp_error($response)) {
        error_log('ANKA Pay API Error (enable_webhook): ' . print_r($response, true), 0);
      } else {
        $body = wp_remote_retrieve_body($response);
      }
    }

    /**
     * Create a payment link for the order.
     *
     * @param array $data
     * @return string|boolean
     */
    public function create_payment_link($data) {
      $body = wp_json_encode(array(
        'data' => $data
      ));

      $response = $this->send_post_request($this->api_url . '/links', $body);

      return $this->handle_payment_link_response($response);
    }

    /**
     * Handle the payment link response.
     *
     * @param WP_Error|WP_REST_Response $response
     * @return string|boolean
     */
    private function handle_payment_link_response($response) {
      if (is_wp_error($response)) {
        error_log('ANKA Pay API Error (handle_payment_link_response -> is_wp_error): ' . print_r($response, true), 0);
        return array( 'success' => false );
      }

      $body = json_decode(wp_remote_retrieve_body($response));

      $status_code = wp_remote_retrieve_response_code($response);

      if ($status_code === 201) {
        return array(
          'success' => true,
          'redirect_url' => $body->redirect_url
        );
      } else {
        error_log('ANKA Pay API Error (handle_payment_link_response): ' . print_r($body, true), 0);

        $response = array('success' => false);

        if (isset($body->errors)) {
          $response['errors'] = $this->get_errors($body->errors);
        }

        return $response;
      }
    }

    /**
     * Get the order from the ANKA Pay API.
     *
     * @param string $order_id
     * @return object|boolean
     */
    public function get_order( $order_id ) {
      $response = $this->send_get_request( $this->api_url . '/orders/' . $order_id );

      if ( is_wp_error( $response ) ) {
        error_log( 'ANKA Pay API Error (get_order) -> is_wp_error: ' . print_r( $response, true ), 0 );
        return false;
      }

      $body = json_decode( wp_remote_retrieve_body( $response ) );

      $status_code = wp_remote_retrieve_response_code( $response );

      if ( $status_code === 200 ) {
        return $body->data;
      } else {
        error_log( 'ANKA Pay API Error (get_order): ' . print_r( $body, true ), 0 );
        return false;
      }
    }

    /**
     * Send a POST request to the ANKA Pay API.
     *
     * @param string $url
     * @param string $body
     * @return WP_Error|WP_REST_Response
     */
    private function send_post_request( $url, $body ) {
      return wp_remote_post( $url, array(
        'body'    => $body,
        'headers' => array(
          'Content-Type'  => 'application/json',
          'Authorization' => 'Token ' . $this->api_token,
          'Accept'        => 'application/vnd.api+json',
          'charset'       => 'utf-8',
        ),
      ) );
    }

    /**
     * Send a GET request to the ANKA Pay API.
     *
     * @param string $url
     * @return WP_Error|WP_REST_Response
     */
    private function send_get_request( $url ) {
      return wp_remote_get( $url, array(
        'headers' => array(
          'Authorization' => 'Token ' . $this->api_token,
        ),
      ) );
    }

    /**
     * Get the errors from the API response.
     *
     * @param array $errors
     * @return string
     */
    private function get_errors( $errors ) {
      $error_messages = array();
      if ( is_array( $errors ) ) {
        foreach ( $errors as $error ) {
          $error_messages[] = $this->get_error_message( $error );
        }
      } else {
        $error_messages[] = $this->get_error_message( $errors );
      }

      return implode( ', ', $error_messages );
    }

    /**
     * Extract single error message from the API response.
     *
     * @param array $error
     * @return string
     */
    private function get_error_message( $error ) {
      $status = isset( $error->status ) ? $error->status : 'Unknown status';
      $pointer = isset( $error->source->pointer ) ? $error->source->pointer : 'Unknown source';
      $detail = isset( $error->detail ) ? $error->detail : 'No detail provided';

      return sprintf(
        /* translators: %1$s is the error status, %2$s is the error detail, %3$s is the error source pointer */
        __( 'Error %1$s: %2$s (%3$s)', 'anka-commerce' ),
        sanitize_text_field( $status ),
        sanitize_text_field( $detail ),
        sanitize_text_field( $pointer )
      );
    }
  }
?>
