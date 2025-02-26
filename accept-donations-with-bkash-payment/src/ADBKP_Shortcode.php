<?php
namespace AcceptDonationBKash;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class ADBKP_Shortcode {
    private $api_handler;

    public function __construct( $api_handler ) {
        $this->api_handler = $api_handler;

        // Register shortcode and AJAX actions
        add_shortcode( 'adbkp_donation_form', [ $this, 'render_donation_form' ] );
        add_action( 'wp_ajax_adbkp_process_donation', [ $this, 'process_donation' ] );
        add_action( 'wp_ajax_nopriv_adbkp_process_donation', [ $this, 'process_donation' ] );
    }

    /**
     * Renders the donation form using a template file.
     *
     * @return string The donation form HTML.
     */
    public function render_donation_form() {
        ob_start();

        $template_path = plugin_dir_path( __FILE__ ) . 'templates/donation-form-template.php';

        if ( file_exists( $template_path ) ) {
            include $template_path;
        } else {
            echo '<p>' . esc_html__( 'Error: Donation form template not found.', 'accept-donations-with-bkash-payment' ) . '</p>';
        }

        return ob_get_clean();
    }

    /**
     * Processes the donation via AJAX.
     */
    public function process_donation() {
        // Verify nonce for security
        $nonce = isset( $_POST['donation_nonce'] ) ? sanitize_text_field( wp_unslash( $_POST['donation_nonce'] ) ) : '';

        if ( ! wp_verify_nonce( $nonce, 'adbkp_process_donation_nonce' ) ) {
            wp_send_json_error( [ 'message' => esc_html__( 'Invalid nonce. Please refresh the page and try again.', 'accept-donations-with-bkash-payment' ) ] );
        }

        // Sanitize and validate the donation amount
        $amount = isset( $_POST['amount'] ) ? floatval( sanitize_text_field( wp_unslash( $_POST['amount'] ) ) ) : 0;

        if ( $amount <= 0 ) {
            wp_send_json_error( [ 'message' => esc_html__( 'Invalid donation amount.', 'accept-donations-with-bkash-payment' ) ] );
        }

        // Initiate the payment through the API handler
        $result = $this->api_handler->initiate_payment( $amount );

        if ( $result['success'] ) {
            wp_send_json_success( $result['data'] );
        } else {
            wp_send_json_error( [ 'message' => esc_html( $result['message'] ) ] );
        }
    }
}
