<?php
namespace AcceptDonationBKash;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ADBKP_APIHandler {
    private $sandbox_mode;
    private $username;
    private $password;
    private $app_key;
    private $app_secret;
    private $bkash_token;

    public function __construct() {
        $this->sandbox_mode = get_option( 'adbkp_sandbox_mode', true ); // Default to sandbox mode
        $this->username = get_option( 'adbkp_username', '' );
        $this->password = get_option( 'adbkp_password', '' );
        $this->app_key = get_option( 'adbkp_app_key', '' );
        $this->app_secret = get_option( 'adbkp_app_secret', '' );
        $this->bkash_token = $this->get_bkash_token();

        // Register AJAX actions for donation processing
        add_shortcode( 'adbkp_donation_form', [ $this, 'render_donation_form' ] );
        add_action( 'wp_ajax_adbkp_process_donation', [ $this, 'process_donation' ] );
        add_action( 'wp_ajax_nopriv_adbkp_process_donation', [ $this, 'process_donation' ] );
    }

    /**
     * Getter for sandbox mode.
     *
     * @return bool
     */
    public function get_sandbox_mode() {
        return (bool) $this->sandbox_mode;
    }

    /**
     * Public method to retrieve the bKash token.
     *
     * @return string|false
     */
    public function get_token() {
        return $this->bkash_token;
    }

    /**
     * Public getter for app key.
     *
     * @return string
     */
    public function get_app_key() {
        return $this->app_key;
    }

    /**
     * Generate a bKash token by sending a request to the bKash API.
     *
     * @return string|false
     */
    public function get_bkash_token() {
        $url = $this->get_agreement_tokenized_url();

        $headers = [
            'Content-Type' => 'application/json',
            'username'     => $this->username,
            'password'     => $this->password,
        ];

        $body = wp_json_encode( [
            'app_key'    => $this->app_key,
            'app_secret' => $this->app_secret,
        ] );

        $response = wp_remote_post( $url, [
            'headers' => $headers,
            'body'    => $body,
            'timeout' => 60,
        ] );

        if ( is_wp_error( $response ) ) {
            return false;
        }

        $response_body = json_decode( wp_remote_retrieve_body( $response ), true );

        return isset( $response_body['id_token'] ) ? sanitize_text_field( $response_body['id_token'] ) : false;
    }

    /**
     * Handle the donation process.
     */
    public function process_donation() {
        // Sanitize and verify nonce
        $nonce = isset( $_POST['donation_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['donation_nonce'] ) ) : '';

        if ( ! $nonce || ! wp_verify_nonce( $nonce, 'adbkp_process_donation_nonce' ) ) {
            wp_send_json_error( [ 'message' => esc_html__( 'Security check failed. Please refresh the page and try again.', 'accept-donations-with-bkash-payment' ) ] );
        }

        // Sanitize and process the donation amount
        $amount = isset( $_POST['amount'] ) ? floatval( sanitize_text_field( wp_unslash( $_POST['amount'] ) ) ) : 0;

        if ( $amount <= 0 ) {
            wp_send_json_error( [ 'message' => esc_html__( 'Invalid donation amount.', 'accept-donations-with-bkash-payment' ) ] );
        }

        $payment_url = $this->get_agreement_creation_url();
        $callback_url = home_url( '/thank-you/' );

        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => $this->bkash_token,
            'X-APP-Key'     => $this->app_key,
        ];

        $request_body = [
            'mode'                  => '0011',
            'payerReference'        => 'donor',
            'callbackURL'           => esc_url_raw( $callback_url ),
            'amount'                => (string) $amount,
            'currency'              => 'BDT',
            'intent'                => 'sale',
            'merchantInvoiceNumber' => 'DON' . time(),
        ];

        $response = wp_remote_post( $payment_url, [
            'headers' => $headers,
            'body'    => wp_json_encode( $request_body ),
            'timeout' => 60,
        ] );

        $response_body = json_decode( wp_remote_retrieve_body( $response ), true );

        if ( isset( $response_body['paymentID'] ) ) {
            wp_send_json_success( [
                'message'      => esc_html__( 'Redirecting to bKash...', 'accept-donations-with-bkash-payment' ),
                'redirect_url' => esc_url_raw( $response_body['bkashURL'] ),
                'payment_id'   => sanitize_text_field( $response_body['paymentID'] ),
            ] );
        } else {
            wp_send_json_error( [
                'message' => esc_html__( 'Could not initiate payment. Please try again.', 'accept-donations-with-bkash-payment' ),
                'error'   => $response_body,
            ] );
        }
    }

    /**
     * Get the URL for token generation.
     *
     * @return string
     */
    public function get_agreement_tokenized_url() {
        return $this->sandbox_mode
            ? 'https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant'
            : 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/token/grant';
    }

    /**
     * Get the URL for payment creation.
     *
     * @return string
     */
    public function get_agreement_creation_url() {
        return $this->sandbox_mode
            ? 'https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/create'
            : 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/create';
    }
}
