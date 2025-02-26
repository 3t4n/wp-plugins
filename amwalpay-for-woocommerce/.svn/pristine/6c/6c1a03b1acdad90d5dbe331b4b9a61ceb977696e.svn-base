<?php
class AmwalPayWcPayment extends WC_Payment_Gateway
{
    public $medthod_title;
    public $merchant_id;
    public $live;
    public $complete_paid_order;
    public $secret_key;
    public $terminal_id;
    public $form_submission_method;
    public $msg;
    public $liveurl;
    public $debug;
    public $log_file;

    public function __construct()
    {
        $this->id = 'amwal';
        $this->method_title = esc_html__('Amwal Pay', 'amwalpay-for-woocommerce');
        $this->method_description = esc_html__('Amwal Payment Gateway for Oman  and supports all card and wallet payment', 'amwalpay-for-woocommerce');
        $this->has_fields = false;
        $this->init_settings();
        $this->init_form_fields();

        //fetch data from admin setting
        $this->title = $this->get_option('title');
        $this->description = $this->get_option('description');
        $this->logo = $this->get_option('logo');
        $this->live = $this->get_option('live');
        $this->complete_paid_order = $this->get_option('complete_paid_order');
        $this->secret_key = $this->get_option('secret_key');
        $this->merchant_id = $this->get_option('merchant_id');
        $this->terminal_id = $this->get_option('terminal_id');
        $this->debug = $this->get_option('debug') ? '1' : '0';
        $this->log_file = WC_LOG_DIR . 'amwalpay.log';
        //live payment url
        $this->form_submission_method = $this->get_option('form_submission_method') == 'yes' ? true : false;
        $this->msg['message'] = "";
        $this->msg['class'] = "";

        if (version_compare(WOOCOMMERCE_VERSION, '3.0.0', '>=')) {
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
        } else {
            add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
        }
        add_action('wp_enqueue_scripts', array($this, 'amwal_scripts'));
        add_action(
            'template_redirect',
            function () {
                if (is_cart() && AmwalPay::sanitizeVar('smartbox') && AmwalPay::sanitizeVar('smartbox') === 'true') {
                    wp_safe_redirect(wc_get_checkout_url() . '?smartbox=true');
                    exit;
                }
            }
        );
        add_action('woocommerce_api_amwalpay_callback', array($this, 'callback'));
    }

    public function is_available()
    {
        $available = parent::is_available() && $this->enabled === 'yes';
        error_log('Amwal Payment Gateway is_available: ' . ($available ? 'yes' : 'no'));
        return $available;
    }
    /**
     * Return the gateway's title.
     *
     * @return string
     */
    public function get_title()
    {
        return apply_filters('woocommerce_gateway_title', $this->title, $this->id);
    }
    /**
     * Return the gateway's icon.
     *
     * @return string
     */
    public function get_icon()
    {
        $icon = '<img id="amwal-logo" src="' . $this->logo . '"/>';
        return apply_filters('woocommerce_gateway_icon', $icon, $this->id);
    }

    //admin form fields or setting on wocommerce
    public function init_form_fields()
    {
        $this->form_fields = include AMPR_PLUGIN_PATH . 'includes/admin/settings.php';
    }

    /**
     *  There are no payment fields for amwal, but we want to show the description if set.
     **/
    public function payment_fields()
    {
        if ($this->description) {
            echo wp_kses_post(wpautop(esc_html($this->description)));
        }
    }

    /**
     * Process the payment and return the result
     **/
    public function process_payment($order_id)
    {
        $order = new WC_Order($order_id);
        $currentDate = new DateTime();
        $datetime = $currentDate->format('ymds');
        if (!$this->form_submission_method) {
            WC()->session->set('amount', $order->get_total());
            WC()->session->set('ref_number', $order->get_id() . '_' . $datetime);

            $checkout_page_url = wc_get_checkout_url();
            $redirect_url = add_query_arg('smartbox', 'true', $checkout_page_url);
            if (AmwalPay::sanitizeVar('pay_for_order') === 'true') {
                $order_key = AmwalPay::sanitizeVar('key');
                if ($order && $order->get_order_key() === $order_key) {
                    $redirect_url = add_query_arg('smartbox', 'true', $order->get_checkout_payment_url());
                } else {
                    wc_add_notice(esc_html__('Sorry, this order is invalid and cannot be paid for.', 'amwalpay-for-woocommerce'), 'error');
                    return array(
                        'result' => 'failure',
                    );
                }
            }

            return array(
                'result' => 'success',
                'redirect' => $redirect_url,
            );

        } else {
            wc_add_notice('<strong>Error:</strong> ' . esc_html__('Transaction declined.', 'amwalpay-for-woocommerce'), 'error');

            return array(
                'result' => 'success',
                'redirect' => $order->get_checkout_payment_url(true)
            );
        }
    }

    public function get_cancel_endpoint()
    {

        $cancel_endpoint = wc_get_page_permalink('cart');
        if (!$cancel_endpoint) {
            $cancel_endpoint = home_url();
        }

        if (false === strpos($cancel_endpoint, '?')) {
            $cancel_endpoint = trailingslashit($cancel_endpoint);
        }
        return $cancel_endpoint;
    }


    //Cancel order
    public function get_cancel_order_url($order)
    {
        // Get cancel endpoint
        $cancel_endpoint = $this->get_cancel_endpoint();
        return apply_filters(
            'woocommerce_get_cancel_order_url',
            wp_nonce_url(
                add_query_arg(
                    array(
                        'cancel_order' => true,
                        'order_id' => $order->get_id()
                    ),
                    $cancel_endpoint
                ),
                'woocommerce-cancel_order'
            )
        );
    }

    /*
    When transaction completed it is check the status
    is transaction completed or rejected
    */
    public function callback()
    {

        global $woocommerce;
        $order = new WC_Order(substr(AmwalPay::sanitizeVar('merchantReference'), 0, -9));
        $isPaymentApproved = false;

        $integrityParameters = [
            "amount" => AmwalPay::sanitizeVar('amount'),
            "currencyId" => AmwalPay::sanitizeVar('currencyId'),
            "customerId" => AmwalPay::sanitizeVar('customerId'),
            "customerTokenId" => AmwalPay::sanitizeVar('customerTokenId'),
            "merchantId" => $this->settings['merchant_id'],
            "merchantReference" => AmwalPay::sanitizeVar('merchantReference'),
            "responseCode" => AmwalPay::sanitizeVar('responseCode'),
            "terminalId" => $this->settings['terminal_id'],
            "transactionId" => AmwalPay::sanitizeVar('transactionId'),
            "transactionTime" => AmwalPay::sanitizeVar('transactionTime')
        ];
        AmwalPay::addLogs($this->debug, $this->log_file, esc_html__('Callback Response: ', 'amwalpay-for-woocommerce'), print_r($integrityParameters, 1));
        $secureHashValue = AmwalPay::generateStringForFilter($integrityParameters, $this->settings['secret_key']);
        $integrityParameters['secureHashValue'] = $secureHashValue;
        $integrityParameters['secureHashValueOld'] = AmwalPay::sanitizeVar('secureHashValue');

        if ((AmwalPay::sanitizeVar('responseCode') === '00' || $secureHashValue == AmwalPay::sanitizeVar('secureHashValue')) && AmwalPay::sanitizeVar('merchantReference') == WC()->session->get('ref_number')) {
            $isPaymentApproved = true;
        }

        $info = 'Old Hash -- ' . AmwalPay::sanitizeVar('secureHashValue') . '  New Hash -- ' . $secureHashValue . '  Old Ref -- ' . AmwalPay::sanitizeVar('merchantReference') . '  New Ref -- ' . WC()->session->get('ref_number') . "</br>";
        AmwalPay::addLogs($this->debug, $this->log_file, $info . ' Payment', $isPaymentApproved ? 'Approved' : 'Canceled');

        if ($isPaymentApproved) {
            $payRef = "Payment Reference Number " . AmwalPay::sanitizeVar('transactionId');
            $check = $order->payment_complete($payRef);
            // Reduce stock levels
            $order->reduce_order_stock();
            // Remove cart
            $woocommerce->cart->empty_cart();
            if ($this->complete_paid_order == 'yes') {
                $order->update_status('completed');
            }

            wp_safe_redirect($this->get_return_url($order));
            exit;
        } else {
            // payment declined.
            $order->update_status('failed');
            $order->add_order_note(esc_html__('AmwalPay Payment Failed', 'amwalpay-for-woocommerce'));
            // Add error for the customer when we return back to the cart
            wc_add_notice('<strong></strong> ' . esc_html__('Sorry, Your order has been failed.', 'amwalpay-for-woocommerce'), 'error');
            // Redirect back to the last step in the checkout process
            wp_safe_redirect($this->get_cancel_order_url($order));
            exit;
        }
    }
    public function amwal_scripts()
    {
        if (is_checkout()) {
            if ($this->live == "prod") {
                $this->liveurl = "https://checkout.amwalpg.com/js/SmartBox.js?v=1.1";
            } else if ($this->live == "uat") {
                $this->liveurl =
                    "https://test.amwalpg.com:7443/js/SmartBox.js?v=1.1";
            } else if ($this->live == "sit") {
                $this->liveurl =
                    "https://test.amwalpg.com:19443/js/SmartBox.js?v=1.1";

            }

            wp_enqueue_script('smartbox-url-js', $this->liveurl, array(), AMPR_VERSION, true);

            wp_enqueue_style('amwal-css', plugins_url(AMPR_PLUGIN_NAME) . '/assets/css/amwal.css', array(), AMPR_VERSION);
            if (AmwalPay::sanitizeVar('smartbox') == 'true') {
                wp_enqueue_script('smart-box-js', plugins_url(AMPR_PLUGIN_NAME) . '/assets/js/smart_box.js', array('jquery'), AMPR_VERSION, true);

                wp_localize_script(
                    'smart-box-js',
                    'sm',
                    array(
                        'jsonData' => AmwalPay::excuse_hook_javascript(WC()->session->get('amount'), $this->settings, WC()->session->get('ref_number')),
                        'callback' => add_query_arg(array('wc-api' => 'amwalpay_callback'), home_url())
                    )
                );
            }
        }
    }
}