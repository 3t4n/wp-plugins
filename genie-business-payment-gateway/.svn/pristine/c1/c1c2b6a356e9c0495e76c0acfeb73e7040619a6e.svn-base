<?php

if (!class_exists('WC_Payment_Gateway')) {
    return;
}

class WC_Gateway_GenieBusiness extends WC_Payment_Gateway {

    public function __construct() {
        $this->id = 'geniebiz';
        $this->has_fields = false;
        $this->order_button_text = __('Proceed to payment', 'geniebiz');
        $this->method_title = __('Secure Online Payment Gateway', 'geniebiz');
        /* translators: %s: Link to WC system status page */
        $this->method_description = __('Secure online payments powered by Genie Business', 'geniebiz');
        $this->supports = array(
            'products',
        );

        $this->title = __('Visa / Master / Amex ( Powered by genie business )', 'geniebiz');
        $this->description = __('Pay securely by Credit or Debit card through genie business.', 'geniebiz');

        // Load the settings.
        $this->init_form_fields();
        $this->init_settings();

        // update settings
        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    }

    public static function logger_context() {
        return array('source' => 'geniebiz-payment-gateway');
    }

    public function process_payment($order_id) {
        global $woocommerce;
        $order = new WC_Order($order_id);

        $transaction = GenieBusiness_API::get_instance()->create_transaction($order);

        if ($this->is_debug()) {
            $logger = wc_get_logger();
            if ($logger instanceof WC_Logger) {
                if (is_wp_error($transaction)) {
                    $message = sprintf('PROCESS_PAYMENT_ERROR: $order_id = %s; $message = ', $order_id) . $transaction->get_error_message();
                    $logger->error($message, self::logger_context());
                } else {
                    $message = sprintf('PROCESS_PAYMENT: $order_id = %s; $transaction = %s', $order_id, json_encode($transaction));
                    $logger->info($message, self::logger_context());
                }
            }
        }

        // error
        if (is_wp_error($transaction)) {
            wc_add_notice(__('Payment error:', 'geniebiz') . $transaction->get_error_message(), 'error');
            return array(
                'result' => 'failure',
                'message' => $transaction->get_error_message(),
            );
        }

        // Mark as on-hold (we're awaiting the cheque)
        $order->update_status('on-hold', __('Awaiting payment status', 'geniebiz'));

        // Remove cart
        $woocommerce->cart->empty_cart();

        // success - return redirect to the geniebiz payment page
        return array(
            'result' => 'success',
            'redirect' => $transaction->url,
        );
    }

    public function is_debug() {
        return $this->settings['debug'] == 'yes';
    }

    public function is_webhook_enabled() {
        return $this->settings['webhook'] == 'yes';
    }

    public function get_destination_page() {
        if(array_key_exists('destination', $this->settings)) {
            return $this->settings['destination'];
        } else {
            return 'get_view_order_url';
        }
    }

    /**
     * Init settings for gateways.
     */
    public function init_settings() {
        parent::init_settings();
        $this->enabled = !empty($this->settings['enabled']) && 'yes' === $this->settings['enabled'] ? 'yes' : 'no';
    }

    /**
     * @return int validity in hours
     */
    public function get_validity() {
        return is_numeric($this->settings['validity']) ? intval($this->settings['validity']) : 0;
    }

    /**
     * Initialise Gateway Settings Form Fields.
     */
    public function init_form_fields() {
        $validity_options = array(
            '' => __('Use the default payment expiry setting managed on your Genie Business account', 'geniebiz'),
        );
        for ($validity_in_hours = 1; $validity_in_hours <= 48; $validity_in_hours++) {
            $validity_options[$validity_in_hours] = sprintf('%s %s', $validity_in_hours, _n('hour', 'hours', $validity_in_hours, 'geniebiz'));
        }

        $this->form_fields = array(
            'enabled' => array(
                'title' => __('Enable/Disable', 'geniebiz'),
                'type' => 'checkbox',
                'label' => __('Enable Genie Business Payment Gateway', 'geniebiz'),
                'default' => 'yes',
            ),
            'validity' => array(
                'title' => __('Validity', 'geniebiz'),
                'type' => 'select',
                // 'class' => 'wc-enhanced-select',
                'description' => __('Payment validity in hours, payments will automatically expiry after this amount of hours if you specify a value here.', 'geniebiz'),
                'default' => '',
                // 'desc_tip' => true,
                'options' => $validity_options,
            ),
            'destination' => array(
                'title' => 'Destination page after the order has been created',
                'description' => 'Depending on your theme settings you can select to redirect to the thank you page or the account page',
                'type' => 'select',
                'default' => 'get_checkout_order_received_url',
                'options' => array(
                    'get_checkout_order_received_url' => 'Checkout > Order received (thanks)',
                    'get_view_order_url' => 'Account > View order',
                ) // array of options for select/multiselects only
            ),
            'webhook' => array(
                'title' => __('Webhook Usage', 'geniebiz'),
                'type' => 'checkbox',
                'label' => __('Enable webhook', 'geniebiz'),
                // 'default' => 'yes',
                'description' => __('If enabled orders will also be updated if asynchronous events are received form Genie Business such as payment timeouts and confirmation or cancellations.', 'geniebiz'),

            ),
            'debug' => array(
                'title' => __('Debug Logging', 'geniebiz'),
                'type' => 'checkbox',
                'label' => __('Enable debug mode', 'geniebiz'),
                'description' => sprintf(__('If enabled, logs can be viewed <a href="%s" target="_blank">here</a>', 'geniebiz'), admin_url('/admin.php?page=wc-status&tab=logs')),
            ),
            'api_details' => array(
                'title' => __('API credentials', 'geniebiz'),
                'type' => 'title',
                /* translators: %s: URL */
                'description' => sprintf(__('<strong>Note:</strong> Your WooCommerce currency which has been set to %s must match the merchant account currency for your company on Genie Business.', 'geniebiz'), get_woocommerce_currency()),
            ),
            'sandbox' => array(
                'title' => __('Sandbox Mode', 'geniebiz'),
                'type' => 'checkbox',
                'label' => __('Enable sandbox mode', 'geniebiz'),
                'default' => 'yes',
                'description' => __('If enabled the sandbox API keys will be used and payments will be redirected to the sandbox environment at GenieBusiness. Please note that sandbox payments do not involve real transactions so make sure to disable this before going live.', 'geniebiz'),
            ),
            'sandbox_api_id' => array(
                'title' => __('Sandbox API Client ID', 'geniebiz'),
                'type' => 'text',
                'description' => __('Get your Sandbox API Client ID credentials from <a href="https://dashboard.geniebiz.lk/connect/applications" target="_blank">Genie Business</a>.', 'geniebiz'),
                'default' => '',
                // 'desc_tip' => true,
                // 'placeholder' => __('Optional', 'geniebiz'),
            ),
            'sandbox_api_key' => array(
                'title' => __('Sandbox API key', 'geniebiz'),
                'type' => 'text',
                'description' => __('Get your Sandbox API Key credentials from <a href="https://dashboard.geniebiz.lk/connect/applications" target="_blank">Genie Business</a>.', 'geniebiz'),
                'default' => '',
                // 'desc_tip' => true,
                // 'placeholder' => __('Optional', 'geniebiz'),
            ),
            'live_api_id' => array(
                'title' => __('Live API Client ID', 'geniebiz'),
                'type' => 'text',
                'description' => __('Get your Production API credentials from <a href="https://dashboard.geniebiz.lk/connect/applications" target="_blank">Genie Business</a>.', 'geniebiz'),
                'default' => '',
                // 'desc_tip' => true,
                // 'placeholder' => __('Optional', 'geniebiz'),
            ),
            'live_api_key' => array(
                'title' => __('Live API key', 'geniebiz'),
                'type' => 'text',
                'description' => __('Get your Production API credentials from <a href="https://dashboard.geniebiz.lk/connect/applications" target="_blank">Genie Business</a>.', 'geniebiz'),
                'default' => '',
                // 'desc_tip' => true,
                // 'placeholder' => __('Optional', 'geniebiz'),
            ),
        );
    }
}