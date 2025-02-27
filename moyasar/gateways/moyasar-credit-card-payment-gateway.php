<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Moyasar_Credit_Card_Payment_Gateway extends WC_Payment_Gateway
{
    use Moyasar_Gateway_Trait;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->id = 'moyasar-credit-card';

        $this->has_fields = true;
        $this->method_title = __('Moyasar Cards', 'moyasar');
        $this->method_description = __('Moyasar Gateway Settings For Credit Card (Mada, Visa, Mastercard, and American Express)', 'moyasar');

        // Feature Support
        $this->supports[] = 'refunds';

        $this->init_form_fields();
        $this->init_settings();
        $this->set_secrets();
        $this->set_title_description_plugin('Online Payments', 'Pay with your credit card.');

        $this->new_order_status = $this->get_option('new_order_status', 'processing');
        $this->schemas = $this->get_option('schemas', []);
        $this->register_actions();

    }


    /**
     * @description Set Up Admin Settings
     * @return void
     */
    public function init_form_fields()
    {
        $shared_fields = require __DIR__ . '/../utils/admin-settings.php';
        $gateway_fields = require __DIR__ . '/../utils/methods/credit-card-admin-settings.php';
        $this->form_fields = array_merge($shared_fields, $gateway_fields);
    }


    /**
     * @description Js Classic Init
     */
    function enqueue_classic_scripts()
    {
        $version = MOYASAR_PAYMENT_VERSION;
        wp_register_script('moyasar-credit-card-js', MOYASAR_PAYMENT_URL . '/assets/classic/src/js/triggers/credit-card-form.js', ['jquery'], $version, true);

        // Localize the script with new data
        $script_data = array(
            'mysrCCPaymentId' => $this->id,
            'mysrCCPublishableKey' => $this->api_pb,
            'mysrCCMoyasarBaseUrl' => $this->api_base_url,
        );
        wp_localize_script('moyasar-credit-card-js', 'moyasar_credit_card', $script_data);
        wp_enqueue_script('moyasar-credit-card-js');

    }

    /**
     * @description Set Up Payment Fields (PHP)
     */
    public function payment_fields()
    {
        $this->enqueue_classic_scripts();
        require __DIR__ . '/../views/credit-card-form.php';
    }

    /**
     * @description Validate Payment Fields (PHP)
     * We validate token, other fields will be validated by JS.
     */
    public function validate_fields()
    {
        if ( ! isset( $_POST['moyasar-cc-nonce-field'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ($_POST['moyasar-cc-nonce-field'] )) , 'moyasar-form' ) ) {
            wc_add_notice(__('Nonce verification failed.', 'moyasar'), 'error');
            return false;
        }

        if (empty(sanitize_text_field( wp_unslash ( $_POST['mysr_token'] ?? '' ) ))) {
            wc_add_notice(__('Something went wrong in the payment process.', 'moyasar'), 'error');
            return false;
        }
        return true;
    }

    /**
     * @description Process Payment
     * @return array
     */
    public function process_payment($order_id)
    {
        if ( ! isset( $_POST['moyasar-cc-nonce-field'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash ($_POST['moyasar-cc-nonce-field'] )) , 'moyasar-form' ) ) {
            return [
                'result' => 'failed',
                'message' => __('Nonce verification failed.', 'moyasar')
            ];
        }

        $is_classic = sanitize_text_field( wp_unslash (($_POST['mysr_form'] ?? 'blocks' ) )) === 'classic';
        $source = [
            'type' => 'token',
            'token' => sanitize_text_field( wp_unslash (isset( $_POST['mysr_token'] ) ? $_POST['mysr_token'] : '' )  ),
            '3ds' => true,
            'manual' => false
        ];

        $response = $this->payment($order_id, $source, true);


        if ($is_classic && $response['result'] === 'success') {
            $response['redirect2'] = $response['redirect'];
            $response['redirect'] = '#'; // To Avoid redirection.

        }

        if ($response['result'] === 'failed') {
            wc_add_notice($response['message'], 'error');
        }

        return $response;
    }
}
