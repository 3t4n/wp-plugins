<?php


namespace Ambikly\Gateways\PayPal;

use Ambikly\RestApi\BaseRestApi;

class PayPalApi extends BaseRestApi
{
    public function __construct()
    {
        include_once AMBIKLY_ABSPATH . 'src/Gateways/PayPal/functions.php';

        parent::__construct();
    }

    public function register_routes()
    {
        $this->register_route('/paypal/ipn', 'POST');
    }

    protected function handle(\WP_REST_Request $request)
    {
        return [$this, 'handle_ipn'];
    }

    protected function get_permission_callback(\WP_REST_Request $request)
    {
        return '__return_true'; // Adjust this as needed for permission checks
    }

    public function handle_ipn(\WP_REST_Request $request)
    {
        $body = $request->get_body();
        // Parse the IPN message
        parse_str($body, $ipn_data);

        // Validate the IPN message
        if ($this->validate_ipn($ipn_data)) {
            // Handle the IPN data (e.g., update order status)
            return $this->send_response(['message' => 'IPN processed successfully']);
        } else {
            return $this->send_error('Invalid IPN data', 400);
        }
    }

    private function validate_ipn($ipn_data)
    {
        // Add your IPN validation logic here
        // For example, verify with PayPal's server

        return true; // Change this to actual validation logic
    }

    public function ipn_process()
    {
        /*1. Check that $_POST['payment_status'] is "Completed"
        2. Check that $_POST['txn_id'] has not been previously processed
        3. Check that $_POST['receiver_email'] is your Primary PayPal email
        4. Check that $_POST['payment_amount'] and $_POST['payment_currency'] are correct
        /**
         * Instantiate the IPNListener class
         */
        include_once dirname(__FILE__) . '/php-paypal-ipn/IPNListener.php';

        $listener = new \IPNListener();

        $custom = isset($_POST['custom']) ? sanitize_text_field($_POST['custom']) : "{}";

        $custom_array = json_decode($custom, true);

        $order_id = isset($custom_array['order_id']) ? absint($custom_array['order_id']) : 0;

        $order_code = isset($custom_array['order_code']) ? sanitize_text_field($custom_array['order_code']) : "";

        $payment_id = isset($custom_array['payment_id']) ? absint($custom_array['payment_id']) : "";


        if ($order_id < 1 || $order_code != '' || $payment_id < 1) {

            return;
        }

        $message = '';

        /**
         * Set to PayPal sandbox or live mode
         */
        $listener->use_sandbox = ambikly_paypal_is_test_mode();

        /**
         * Check if IPN was successfully processed
         */
        if ($verified = $listener->processIpn()) {

            /**
             * Log successful purchases
             */
            $transactionData = $listener->getPostData(); // POST data array


            $message = json_encode($transactionData);
            /**
             * Verify seller PayPal email with PayPal email in settings
             *
             * Check if the seller email that was processed by the IPN matches what is saved as
             * the seller email in our DB
             */
            if ($_POST['receiver_email'] != ambikly_get_option('paypal_email')) {
                $message .= "\nEmail seller email does not match email in settings\n";
            }

            /**
             * Verify currency
             *
             * Check if the currency that was processed by the IPN matches what is saved as
             * the currency setting
             */
            if (trim($_POST['mc_currency']) != trim(ambikly_currency())) {
                $message .= "\nCurrency does not match those assigned in settings\n";
            }

            /**
             * Check if this payment was already processed
             *
             * PayPal transaction id (txn_id) is stored in the database, we check
             * that against the txn_id returned.
             */
            /**
             *
             */
            $payment = ambikly()->getClass('Controllers.PaymentController');

            $is_proceed = $payment->isPaymentProceed($payment_id);

            if ($is_proceed) {

                $message .= "\nThis payment was already processed\n";
            }

            /**
             * Verify the payment is set to "Completed".
             *
             * Create a new payment, send customer an email and empty the cart
             */

            if (!empty($_POST['payment_status']) && $_POST['payment_status'] == 'Completed') {
                // Update booking status and Payment args.

                $payment->update(
                    array('status' => 'completed', 'payment_note' => $message),
                    $payment_id
                );


            } else {

                $message .= "\nPayment status not set to Completed\n";

            }

        } else {

            $message = $listener->getErrors();

        }
    }
}