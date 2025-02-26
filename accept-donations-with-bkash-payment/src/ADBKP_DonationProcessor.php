<?php
namespace AcceptDonationBKash;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ADBKP_DonationProcessor {
    private $api_handler;

    public function __construct( $api_handler ) {
        $this->api_handler = $api_handler;

        // Hook into WordPress template_redirect to handle payment callbacks
        add_action( 'template_redirect', [ $this, 'handle_callback' ] );
    }

    /**
     * Handles the callback from bKash after payment execution.
     */
    public function handle_callback() {
        // Ensure this callback is only processed on the 'thank-you' page.
        if ( ! is_page( 'thank-you' ) ) {
            return;
        }

        // Check if payment ID is present and sanitize the input
        $payment_id = isset( $_GET['paymentID'] ) ? sanitize_text_field( wp_unslash( $_GET['paymentID'] ) ) : '';

        if ( empty( $payment_id ) ) {
            $this->redirect_with_status( 'missing_payment_id' );
            return;
        }

        // Optional nonce validation for additional security
        $nonce = isset( $_GET['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_GET['_wpnonce'] ) ) : '';
        if ( $nonce && ! wp_verify_nonce( $nonce, 'bkash_payment_callback' ) ) {
            $this->redirect_with_status( 'invalid_nonce' );
            return;
        }

        // Execute the payment with sanitized payment ID
        $result = $this->execute_payment( $payment_id );

        if ( $result['success'] ) {
            $this->redirect_with_status( 'success' );
        } else {
            $this->redirect_with_status( 'failed' );
        }
    }

    /**
     * Executes the payment using the provided payment ID.
     *
     * @param string $payment_id The payment ID to execute.
     * @return array The result of the payment execution.
     */
    public function execute_payment( $payment_id ) {
        $url = $this->get_agreement_execution_url();

        $headers = [
            'Content-Type'  => 'application/json',
            'Authorization' => $this->api_handler->get_token(),
            'X-APP-Key'     => $this->api_handler->get_app_key(),
        ];

        $body = wp_json_encode( [ 'paymentID' => $payment_id ] );

        $response = wp_remote_post( $url, [
            'headers' => $headers,
            'body'    => $body,
            'timeout' => 60,
        ] );

        if ( is_wp_error( $response ) ) {
            return [
                'success' => false,
                'message' => esc_html__( 'Network error occurred. Please try again later.', 'accept-donations-with-bkash-payment' ),
            ];
        }

        $response_body = json_decode( wp_remote_retrieve_body( $response ), true );

        if ( isset( $response_body['transactionStatus'] ) && strtolower( $response_body['transactionStatus'] ) === 'completed' ) {
            return [ 'success' => true ];
        }

        return [
            'success' => false,
            'message' => esc_html__( 'Payment execution failed. Please contact support.', 'accept-donations-with-bkash-payment' ),
        ];
    }

    /**
     * Redirects to the thank-you page with a specific status.
     *
     * @param string $status The status to append to the redirect URL.
     */
    private function redirect_with_status( $status ) {
        $redirect_url = add_query_arg( 'status', $status, home_url( '/thank-you/' ) );
        wp_safe_redirect( $redirect_url );
        exit;
    }

    /**
     * Returns the appropriate agreement execution URL based on sandbox mode.
     *
     * @return string The agreement execution URL.
     */
    private function get_agreement_execution_url() {
        $url = $this->api_handler->get_sandbox_mode()
            ? 'https://tokenized.sandbox.bka.sh/v1.2.0-beta/tokenized/checkout/execute/'
            : 'https://tokenized.pay.bka.sh/v1.2.0-beta/tokenized/checkout/execute/';

        /**
         * Filter to customize the agreement execution URL.
         *
         * @param string $url The default agreement execution URL.
         */
        return apply_filters( 'adbkp_agreement_execution_url', $url );
    }
}