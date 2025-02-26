<?php
/*
Plugin Name: Freecharge
Plugin URI: https://www.freechargepg.in
Description: The Freecharge Payment Gateway is a powerful solution for seamless payment processing. Pay securely by Credit or Debit card or Internet Banking through Freecharge Secure Servers.By integrating this plugin into your WooCommerce store, you enable customers to make secure transactions with ease. It adds a new payment option at checkout, guiding users to the Freecharge website for payment completion.
Version: 1.0.0
Author: Freecharge
Text Domain: freecharge-pay-woo
Author URI: https://www.freecharge.in
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

/**
 * Plugin Details and Legal Information
 *
 * This plugin relies on third-party services provided by Freecharge. By using this plugin, you agree to the terms and privacy policies of Freecharge. Please review these documents for information on how your data is managed:
 * 
 * - Privacy Policy: https://www.freechargepg.in/privacy-policy
 * - Terms and Conditions: https://www.freechargepg.in/term-and-condition
 *
 * @package Freecharge_Payment_Gateway
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
include_once "include/menu.inc.php";
include_once "include/adminFunc.inc.php";
include_once "include/fcdatabase.inc.php";
include_once "include/signature.inc.php";

add_action('admin_menu', 'fcpgz_menu_on_admin'); //allows you to run a function when a particular hook occurs
add_action('plugins_loaded', 'fcpgz_woocommerce_freecharge_init', 0);

register_activation_hook(__FILE__, 'fcpgz_table_creator');
function fcpgz_woocommerce_freecharge_init()
{
    define("FCPGZ_PROD", "https://secure-axispg.freecharge.in");
    define("FCPGZ_SANDBOX", "https://sandbox-axispg.freecharge.in");
    define("FCPGZ_CHECKOUT", "/payment/v1/checkout");
    define("FCPGZ_STATUS", "/payment/v1/txn/status");
    define("FCPGZ_REFUND", "/payment/v1/refund");

    if (!class_exists('WC_Payment_Gateway'))
        return;


    add_filter(
        'plugin_action_links_' . plugin_basename(__FILE__),
        /**
         * Add "Settings" link to Plugins screen.
         *
         * @param array $links
         * @return array
         */
        function (array $links) {
            if (!is_woocommerce_activated()) {
                return $links;
            }

            array_unshift(
                $links,
                sprintf(
                    '<a href="%1$s">%2$s</a>',
                    admin_url('admin.php?page=wc-settings&tab=checkout&section=freecharge'),
                    __('Settings', 'freecharge-pay-woo')
                )
            );

            return $links;
        }
    );
    add_filter(
        'plugin_row_meta',
        /**
         * Add links below the description on the Plugins page.
         *
         * @param array $links
         * @param string $file
         * @return array|string[]
         * @retun array
         */
        function (array $links, string $file) {
            if (plugin_basename(__FILE__) !== $file) {
                return $links;
            }

            return array_merge(
                $links,
                array(
                    sprintf(
                        '<a target="_blank" href="%1$s">%2$s</a>',
                        'https://www.freechargepg.in/',
                        __('Documentation', 'freecharge-pay-woo')
                    ),
                    sprintf(
                        '<a target="_blank" href="%1$s">%2$s</a>',
                        'https://www.freechargepg.in/',
                        __('Get help', 'freecharge-pay-woo')
                    ),
                    sprintf(
                        '<a target="_blank" href="%1$s">%2$s</a>',
                        'https://www.freechargepg.in/',
                        __('Request a feature', 'freecharge-pay-woo')
                    ),
                    sprintf(
                        '<a target="_blank" href="%1$s">%2$s</a>',
                        'https://www.freechargepg.in/',
                        __('Submit a bug', 'freecharge-pay-woo')
                    ),
                    sprintf(
                        '<a target="_blank" href="%1$s">%2$s</a>',
                        'https://www.freechargepg.in/faq',
                        __('FAQs', 'freecharge-pay-woo')
                    ),
                )
            );
        },
        10,
        2
    );
    function id_fc_rest_available($is_rest_api_request)
    {
        if (empty($_SERVER['REQUEST_URI'])) {
            return $is_rest_api_request;
        }

        if (strpos($_SERVER['REQUEST_URI'], '/index.php/wp-json/' . 'wp-freecharge/v1/order/status') !== false) {
            return false;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/index.php/wp-json/' . 'wp-freecharge/v1/payment/update') !== false) {
            return false;
        }
        if (strpos($_SERVER['REQUEST_URI'], '/index.php/wp-json/' . 'wp-freecharge/v1/refund/update') !== false) {
            return false;
        }

        return $is_rest_api_request;
    }

    add_filter('woocommerce_is_rest_api_request', 'id_fc_rest_available');
    function register_fc_routes(): void
    {
        register_rest_route(
            'wp-freecharge/v1',
            'order/status',
            array(
                'methods' => 'POST',
                'callback' => 'fc_check_status',
                'args' => array(
                    "statusType" => array(
                        "type" => "string"
                    )
                ),
                'permission_callback' => '__return_true',
            )
        );
        register_rest_route(
            'wp-freecharge/v1',
            'payment/update',
            array(
                'methods' => 'POST',
                'callback' => 'check_pay_status',
                'permission_callback' => '__return_true',
            )
        );
        register_rest_route(
            'wp-freecharge/v1',
            'refund/update',
            array(
                'methods' => 'POST',
                'callback' => 'check_refund_pay_status',
                'permission_callback' => '__return_true',
            )
        );
    }



    add_action('rest_api_init', 'register_fc_routes');

    require_once plugin_dir_path(__FILE__) . '/signature.php';

    /**
     * Gateway class
     */
    class FCPGZ_WC_Gateway_Freecharge extends WC_Payment_Gateway
    {
        protected $msg = array();
        protected $logs;
        protected $gateway_module = '';
        protected $redirect_page_id = '';
        protected $secret_key = '';
        protected $merchant_id = '';

        public function __construct()
        {
            /**
             * @global string $wp_version The WordPress version string.
             */
            global $wp_version;
            $this->setup_properties();
            $this->init_form_fields();
            $this->init_settings();
            $this->title = 'FreechargePayment';
            $this->description = sanitize_text_field($this->settings['description']);
            $this->gateway_module = isset($this->settings['gateway_module']) ? sanitize_text_field($this->settings['gateway_module']) : '';
            $this->redirect_page_id = isset($this->settings['redirect_page_id']) ? sanitize_text_field($this->settings['redirect_page_id']) : '';
            $this->secret_key = isset($this->settings['secret_key']) ? sanitize_text_field($this->settings['secret_key']) : '';
            $this->merchant_id = isset($this->settings['merchant_id']) ? sanitize_text_field($this->settings['merchant_id']) : '';
            $this->order_button_text = __('Place Order', 'freecharge-pay-woo');
            $this->msg = array('message' => '', 'class' => '');
            $this->supports = array(
                'products',
                'refunds',
            );
            // add_action('valid-freecharge-request', array(&$this, 'SUCCESS'));
            add_action('woocommerce_receipt_freecharge', array(&$this, 'receipt_page'));
            //add_action('woocommerce_thankyou_freecharge',array($this, 'thankyou'));
            if (version_compare($wp_version, '2.0.0', '>=')) {
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
            } else {
                add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
            }
            // $this->loadHooks();
            $this->logs = wc_get_logger();
        }

        public function initializeHooks()
        {
            $this->loadHooks();
        }
        /**
         * loadHooks function
         */
        protected function loadHooks()
        {
            add_action('init', array(&$this, 'check_freecharge_response'));
            add_action('woocommerce_api_' . strtolower(get_class($this)), array($this, 'check_freecharge_response'));
        }
        /**
         * Setup general properties for the gateway.
         */
        protected function setup_properties()
        {
            $this->id = 'freecharge';
            $this->icon = apply_filters('fcpgz_woocommerce_freecharge_icon', plugins_url('./assets/FCi.png', __FILE__));
            $this->method_title = __('FreechargePayment', 'freecharge-pay-woo');
            $this->method_description = __('Pay Securely using UPI, Cards, or NetBanking.', 'freecharge-pay-woo');
            $this->has_fields = false;
        }
        /**
         * Init form Fields
         **/
        function init_form_fields()
        {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => __('Enable/Disable', 'freecharge-pay-woo'),
                    'type' => 'checkbox',
                    'label' => __('Enable or Disable Freecharge Payments', 'freecharge-pay-woo'),
                    'default' => 'no'
                ),
                'title' => array(
                    'title' => __('Freecharge Payment Gateway', 'freecharge-pay-woo'),
                    'type' => 'text',
                    'default' => __('Freecharge Payment Gateway', 'freecharge-pay-woo'),
                    'desc_tip' => true,
                    'description' => __('Add a new title for the Freecharge Payment Gateway that customers will see when they are in the checkout page.', 'freecharge-pay-woo')
                ),
                'description' => array(
                    'title' => __('Freecharge Payment Gateway Description', 'freecharge-pay-woo'),
                    'type' => 'textarea',
                    'default' => __('Pay securely by Credit or Debit card or Internet Banking or UPI through Freecharge.', 'freecharge-pay-woo'),
                    'desc_tip' => true,
                    'description' => __('Add a new title for the Freecharge Payment Gateway that customers will see when they are in the checkout page.', 'freecharge-pay-woo')
                ),
                'merchant_id' => array(
                    'title' => __('Merchant ID', 'freecharge-pay-woo'),
                    'type' => 'text',
                    'description' => __('Enter Merchant ID that is provided by Freecharge', 'freecharge-pay-woo')
                ),
                'secret_key' => array(
                    'title' => __('Merchant Key', 'freecharge-pay-woo'),
                    'type' => 'text',
                    'description' => __('Enter your Merchant secret key provided by Freecharge.', 'freecharge-pay-woo'),
                ),
                'gateway_module' => array(
                    'title' => __('Gateway Mode', 'freecharge-pay-woo'),
                    'type' => 'select',
                    'options' => array("0" => "Select", "sandbox" => "Sandbox", "production" => "Production"),
                    'description' => __('Mode of payment gateway.', 'freecharge-pay-woo')
                ),
                'redirect_page_id' => array(
                    'title' => __('Return Page', 'freecharge-pay-woo'),
                    'type' => 'select',
                    'options' => $this->get_pages(__('Select Page', 'freecharge-pay-woo')),
                    'description' => __('Post payment redirect URL. By default, it is the WooCommerce order placed URL: ', 'freecharge-pay-woo') . esc_html(home_url('/checkout/order-received/'))
                )
            );
        }
        function get_freecharge_log_file_path()
        {
            $upload_dir = wp_upload_dir();
            $log_dir = $upload_dir['basedir'] . '/freecharge-pay-woo/';
            if (!file_exists($log_dir)) {
                wp_mkdir_p($log_dir);
            }

            return $log_dir . 'debug.log';
        }

        function custom_error_log($message)
        {
            $log_file = $this->get_freecharge_log_file_path();
            error_log(date('[Y-m-d H:i:s]') . " " . $message . "\n", 3, $log_file);
        }

        /**
         * Admin Panel Options
         **/
        public function admin_options()
        {
            ?>
            <div class="wrap">
                <h3>
                    <?php echo esc_html__('Freecharge payment', 'freecharge-pay-woo'); ?>
                </h3>
                <p>
                    <?php esc_html_e('FreechargePayment is one of the most popular payment gateways for online shopping.', 'freecharge-pay-woo');
                    $freecharge_pg_url = 'https://www.freechargepg.in/';
                    ?>
                    <input type="button" class="button-primary"
                        value="<?php esc_attr_e('Visit Freecharge PG', 'freecharge-pay-woo'); ?>" style="float:right"
                        onclick="window.open('<?php echo esc_url($freecharge_pg_url); ?>', '_blank')">
                </p>
                <?php
                if (PHP_VERSION_ID < 70300) {
                    echo "<h1 style=\"color:red;\">" . esc_html__('**Notice: FreechargePayment payment plugin requires PHP v7.3 or higher.<br />  Plugin will not work properly below PHP v7.3 due to SameSite cookie restriction.', 'freecharge-pay-woo') . "</h1>";
                }
                ?>
                <table class="form-table">
                    <?php $this->generate_settings_html(); ?>
                </table>
            </div>
            <?php
        }

        /**
         * Receipt Page
         **/
        function receipt_page($order)
        {
            echo '<p>' . esc_html__('Thank you for your order, please wait as you will be automatically redirected to Freecharge Payment Gateway.', 'freecharge-pay-woo') . '</p>';
            echo $this->generate_freecharge_form($order); //TODO: myTodo  we cannot use escape here 
        }

        /**
         * Process standard payments.
         * Process the payment and return the result
         *
         * @param WC_Order $order
         *
         * @return array
         */
        protected function process_payments(WC_Order $order)
        {
            return array(
                'result' => 'success',
                'redirect' => add_query_arg(
                    'order',
                    $order->get_id(),
                    add_query_arg('key', $order->get_order_key(), $order->get_checkout_payment_url(true))
                )
            );

        }

        /**
         * Process the payment.
         *
         * @param int $order_id
         *
         * @return array
         */
        public function process_payment($order_id)
        {
            return $this->process_payments(wc_get_order($order_id));
        }

        function check_freecharge_response()
        {
            if (sanitize_text_field(isset($_REQUEST['merchantTxnId'])) && sanitize_text_field(isset($_REQUEST['signature']))) {
                $signature = sanitize_textarea_field($_REQUEST['signature']);
                unset($_REQUEST['signature']);
                foreach (['amount', 'handlingFee', 'taxAmount'] as $field) {
                    if (sanitize_textarea_field(isset($_REQUEST[$field])) && sanitize_textarea_field(is_numeric($_REQUEST[$field])) && sanitize_textarea_field($_REQUEST[$field]) == sanitize_textarea_field((int) $_REQUEST[$field])) {
                        $_REQUEST[$field] = sanitize_textarea_field((string) $_REQUEST[$field] . ".0");
                    }
                }
                $new_array = array();
                $new_array['amount'] = sanitize_text_field(isset($_REQUEST['amount'])) ? sanitize_text_field($_REQUEST['amount']) : '';
                $new_array['currency'] = sanitize_text_field(isset($_REQUEST['currency'])) ? sanitize_text_field($_REQUEST['currency']) : '';
                $new_array['handlingFee'] = sanitize_text_field(isset($_REQUEST['handlingFee'])) ? sanitize_text_field($_REQUEST['handlingFee']) : '';
                $new_array['merchantTxnId'] = sanitize_text_field(isset($_REQUEST['merchantTxnId'])) ? sanitize_text_field($_REQUEST['merchantTxnId']) : '';
                $new_array['mode'] = sanitize_text_field(isset($_REQUEST['mode'])) ? sanitize_text_field($_REQUEST['mode']) : '';
                $new_array['statusCode'] = sanitize_text_field(isset($_REQUEST['statusCode'])) ? sanitize_text_field($_REQUEST['statusCode']) : '';
                $new_array['statusMessage'] = sanitize_text_field(isset($_REQUEST['statusMessage'])) ? sanitize_text_field($_REQUEST['statusMessage']) : '';
                $new_array['subMode'] = sanitize_text_field(isset($_REQUEST['subMode'])) ? sanitize_text_field($_REQUEST['subMode']) : '';
                $new_array['taxAmount'] = sanitize_text_field(isset($_REQUEST['taxAmount'])) ? sanitize_text_field($_REQUEST['taxAmount']) : '';
                $new_array['txnReferenceId'] = sanitize_text_field(isset($_REQUEST['txnReferenceId'])) ? sanitize_text_field($_REQUEST['txnReferenceId']) : '';
                $generator = new FcpgzSignatureGenerator($this->secret_key);
                $mysig = $generator->generateSignature($new_array);
                if ($mysig == $signature) {
                    $this->custom_error_log("Signature matched successfully. \n");
                    $merchantTxnId = sanitize_text_field(isset($_REQUEST['merchantTxnId'])) ? sanitize_text_field(wp_unslash($_REQUEST['merchantTxnId'])) : '';
                    $explodedMerchantTxnId = explode('_', $merchantTxnId);
                    $order_id = isset($explodedMerchantTxnId[0]) ? absint($explodedMerchantTxnId[0]) : 0;
                    $order_id = sanitize_text_field($order_id);
                    if ($order_id != '') {
                        try {
                            global $woocommerce;
                            global $wpdb;
                            include_once 'status.php';
                            $this->custom_error_log("FINAL order_id : \n" . print_r($order_id, true));
                            $orders_query = $wpdb->get_results(
                                $wpdb->prepare(
                                    "SELECT * FROM {$wpdb->prefix}fcpgz_orders WHERE ORDER_ID = %d",
                                    $order_id
                                )
                            );
                            $MTID = sanitize_text_field($orders_query[0]->merchantTxnID);
                            $orderStatus = sanitize_text_field($orders_query[0]->orderStatus);
                            $order = wc_get_order($order_id);
                            $isSandbox = ($this->gateway_module === "sandbox");
                            FCPGZ_WC_Gateway_Freecharge_Status::$merchantId = $this->merchant_id;
                            FCPGZ_WC_Gateway_Freecharge_Status::$secertkey = $this->secret_key;
                            $result = FCPGZ_WC_Gateway_Freecharge_Status::check_status_order_pay($order, $MTID, $isSandbox);
                            $this->custom_error_log("FINAL STATUS RESULT: \n" . print_r($result, true));
                            if (is_wp_error($result)) {
                                $error_message = sprintf(__('Error while getting status. Reason: %s', 'freecharge-pay-woo'), esc_html($result->get_error_message()));
                                wc_add_notice($error_message, 'error');
                                return;
                            }
                            $message = '';
                            $order_status = '';
                            $statusMessage = $result['statusMessage'];
                            $statusCode = $result['statusCode'];
                            if (isset($result['data']) && is_array($result['data'])) {
                                $transaction_id = wc_clean($result['data']['txnReferenceId']);
                            }
                            if (!isset($statusCode)) {
                                throw new Exception('Internal Error ' . $order);
                            } elseif ($orderStatus !== 'refunded') {
                                $this->handleOrderStatus($order, $statusMessage, $statusCode, $transaction_id, $MTID);
                            }
                        } catch (Exception $e) {
                            throw new Exception('Error:' . $e);
                        }
                    }
                } else {
                    $this->custom_error_log(" ERROR: Signature Mismatch : \n");
                    throw new Exception('Error: Signature Mismatch');
                }
            }
        }

        /**
         * Show template while response
         */
        private function setStatusMessage($order, $msg = ''): void
        {
            $this->msg['class'] = 'error';
            $this->msg['message'] = $msg;
            if (!empty($order)) {
                $order->add_order_note($this->msg['message']);
            }
        }

        /**
         * Generate FreechargePayment button link
         **/
        public function generate_freecharge_form($order_id)
        {
            $order = wc_get_order($order_id);
            $redirect_url = ($this->redirect_page_id == '' || $this->redirect_page_id == 0) ? $this->get_return_url($order) : get_permalink($this->redirect_page_id);
            WC()->session->set('orderid_awaiting_fc', $order_id);
            $merchantTxnId = time();
            $order_id = wc_sanitize_order_id($order->get_id()) . '_' . $merchantTxnId;
            $amount = sanitize_text_field($order->get_total());
            $currency = sanitize_text_field($order->get_currency());
            $billing_address = sanitize_text_field($order->get_billing_address_1());
            $billing_address2 = sanitize_text_field($order->get_billing_address_2());
            $address1 = sanitize_text_field($order->get_shipping_address_1());
            $address2 = sanitize_text_field($order->get_shipping_address_2());
            $address = $address1;
            if ($address2 != "")
                $address = $address1 . ' ' . $address2;
            $firstname = sanitize_text_field($order->get_billing_first_name());
            $lastname = sanitize_text_field($order->get_billing_last_name());
            $fullName = $firstname . ' ' . $lastname;
            if (is_email(sanitize_email($order->get_billing_email()))) {
                $email = is_email(sanitize_email($order->get_billing_email()));
            } else {
                wp_die(__('Invalid Email Format.', 'freecharge-pay-woo'), 'title', 404);
            }
            if (preg_match('/^[6-9]\d{9}$/', $order->get_billing_phone())) {
                $phone = $order->get_billing_phone();
            } else {
                wp_die(__('Invalid mobile number.', 'freecharge-pay-woo'), 'title', 404);
            }
            $city = sanitize_text_field($order->get_billing_city());
            $state = sanitize_text_field($order->get_billing_state());
            $zipcode = sanitize_text_field($order->get_billing_postcode());
            $country = sanitize_text_field($order->get_billing_country());
            $timeStamp = time();
            $subMerchantPayInfo = "";
            $udf1 = $order->get_id();
            $udf2 = "";
            $udf3 = "";
            $udf4 = "";
            $udf5 = "";

            $fcpgz_merchantCheckoutPayRequest = new FCPGZ_MerchantCheckoutPayRequest(
                $this->merchant_id,
                $redirect_url,
                $order_id,
                $amount,
                $currency,
                "",
                //Tags
                "",
                //customer ID
                $fullName,
                $email,
                $phone,
                $address,
                $city,
                $state,
                $zipcode,
                $country,
                $timeStamp,
                $subMerchantPayInfo,
                $udf1,
                $udf2,
                $udf3,
                $udf4,
                $udf5
            );
            $merchant_key = $this->secret_key;
            $merchant_id = $fcpgz_merchantCheckoutPayRequest->getMerchantId();
            $callbackUrl = $fcpgz_merchantCheckoutPayRequest->getCallbackUrl();
            $merchantTxnId = $fcpgz_merchantCheckoutPayRequest->getMerchantTxnId();
            $merchantTxnAmount = $fcpgz_merchantCheckoutPayRequest->getMerchantTxnAmount();
            $currency = $fcpgz_merchantCheckoutPayRequest->getCurrency();
            $tags = $fcpgz_merchantCheckoutPayRequest->getTags();
            $customerId = $fcpgz_merchantCheckoutPayRequest->getCustomerId();
            $customerName = $fcpgz_merchantCheckoutPayRequest->getCustomerName();
            $customerEmailId = $fcpgz_merchantCheckoutPayRequest->getCustomerEmaild();
            $customerMobileNo = $fcpgz_merchantCheckoutPayRequest->getCustomerMobilNo();
            $customerStreetAddress = $fcpgz_merchantCheckoutPayRequest->getCustomerStreetAddress();
            $customerCity = $fcpgz_merchantCheckoutPayRequest->getCustomerCity();
            $customerState = $fcpgz_merchantCheckoutPayRequest->getCustomerState();
            $customerPIN = $fcpgz_merchantCheckoutPayRequest->getCustomerPIN();
            $customerCountry = $fcpgz_merchantCheckoutPayRequest->getCustomerCountry();
            $timeStamp = $fcpgz_merchantCheckoutPayRequest->getTimeStamp();
            $signature = sanitize_key($fcpgz_merchantCheckoutPayRequest->generateSignature($merchant_key));
            $subMerchantPayInfo = $fcpgz_merchantCheckoutPayRequest->getSubMerchantPayInfo();
            $udf1 = $fcpgz_merchantCheckoutPayRequest->getUdf1();
            $udf2 = $fcpgz_merchantCheckoutPayRequest->getUdf2();
            $udf3 = $fcpgz_merchantCheckoutPayRequest->getUdf3();
            $udf4 = $fcpgz_merchantCheckoutPayRequest->getUdf4();
            $udf5 = $fcpgz_merchantCheckoutPayRequest->getUdf5();
            $wp_order_id = (int) explode('_', $order_id)[0];
            fcpgz_insert_data($wp_order_id, null, $order_id, $order->get_status(), $amount);
            $action = esc_url(FCPGZ_PROD . FCPGZ_CHECKOUT);
            $allowed_tags = array(
                'form' => array(
                    'action' => true,
                    'method' => true,
                    'id' => true,
                    'name' => true
                ),
                'input' => array(
                    'type' => true,
                    'name' => true,
                    'value' => true
                ),
                'button' => array(
                    'style' => true,
                    'id' => true,
                    'name' => true
                ),
                'script' => array(
                    'type' => true
                )
            );

            if ("sandbox" == $this->gateway_module)
                $action = esc_url(FCPGZ_SANDBOX . FCPGZ_CHECKOUT);
            $html = '<form action="' . $action . '" method="post" id="freecharge_form" name="freecharge_form">' .
                '<input type="hidden" name="merchantId" value="' . esc_attr($merchant_id) . '" />' .
                '<input type="hidden" name="callbackUrl" value="' . esc_url($callbackUrl) . '" />' .
                '<input type="hidden" name="merchantTxnId" value="' . esc_attr($order_id) . '" />' .
                '<input type="hidden" name="merchantTxnAmount" value="' . esc_attr($merchantTxnAmount) . '" />' .
                '<input type="hidden" name="currency" value="' . esc_attr($currency) . '" />' .
                '<input type="hidden" name="tags" value="' . esc_attr($tags) . '" />' .
                '<input type="hidden" name="customerId" value="' . esc_attr($customerId) . '" />' .
                '<input type="hidden" name="customerName" value="' . esc_attr($customerName) . '" />' .
                '<input type="hidden" name="customerEmailId" value="' . esc_attr($customerEmailId) . '" />' .
                '<input type="hidden" name="customerMobileNo" value="' . esc_attr($customerMobileNo) . '" />' .
                '<input type="hidden" name="customerStreetAddress" value="' . esc_attr($customerStreetAddress) . '" />' .
                '<input type="hidden" name="customerCity" value="' . esc_attr($customerCity) . '" />' .
                '<input type="hidden" name="customerState" value="' . esc_attr($customerState) . '" />' .
                '<input type="hidden" name="customerPIN" value="' . esc_attr($customerPIN) . '" />' .
                '<input type="hidden" name="customerCountry" value="' . esc_attr($customerCountry) . '" />' .
                '<input type="hidden" name="timestamp" value="' . esc_attr($timeStamp) . '" />' .
                '<input type="hidden" name="signature" value="' . esc_attr($signature) . '" />' .
                '<input type="hidden" name="subMerchantPayInfo" value="' . esc_attr($subMerchantPayInfo) . '" />' .
                '<input type="hidden" name="udf1" value="' . esc_attr($udf1) . '" />' .
                '<input type="hidden" name="udf2" value="' . esc_attr($udf2) . '" />' .
                '<input type="hidden" name="udf3" value="' . esc_attr($udf3) . '" />' .
                '<input type="hidden" name="udf4" value="' . esc_attr($udf4) . '" />' .
                '<input type="hidden" name="udf5" value="' . esc_attr($udf5) . '" />' .
                '<button style="display:none" id="submit_freecharge_payment_form" name="submit_freecharge_payment_form">' . esc_html__('Pay Now', 'freecharge-pay-woo') . '</button>' .
                '</form>' .
                '<script type="text/javascript">document.getElementById("freecharge_form").submit();</script>';
            $sanitized_html = wp_kses($html, $allowed_tags);
            return $sanitized_html;
        }


        function get_pages($title = false, $indent = true)
        {
            $wp_pages = get_pages('sort_column=menu_order');
            $page_list = array();
            if ($title)
                $page_list[] = $title;
            foreach ($wp_pages as $page) {
                $prefix = '';
                // show indented child pages?
                if ($indent) {
                    $has_parent = $page->post_parent;
                    while ($has_parent) {
                        $prefix .= ' - ';
                        $next_page = get_post($has_parent);
                        $has_parent = $next_page->post_parent;
                    }
                }
                // add to page list array
                $page_list[$page->ID] = $prefix . $page->post_title;
            }
            return $page_list;
        }
        //REFUND FUNCTIONALITY

        /**
         * Can the order be refunded via Freecharge?
         * @param WC_Order $order
         * @return bool
         */
        public function can_refund_order($order)
        {
            return $order && $order->get_transaction_id();
        }

        /**
         * Process a refund if supported.
         * @param int $order_id
         * @param float $amount
         * @param string $reason
         * @return WP_Error|bool True or false based on success, or a WP_Error object
         */

        public function process_refund($order_id, $amount = null, $reason = ''): WP_Error|bool
        {
            try {
                $order = wc_get_order($order_id);
                if (!$this->can_refund_order($order)) {
                    throw new Exception('Refund Failed: No transaction ID ' . $order);
                }
                include_once 'refund.php';
                FCPGZ_WC_Gateway_Freecharge_Refund::$merchantId = $this->merchant_id;
                FCPGZ_WC_Gateway_Freecharge_Refund::$secertkey = $this->secret_key;
                $isSandbox = ($this->gateway_module === "sandbox");
                $result = FCPGZ_WC_Gateway_Freecharge_Refund::refund_order($order, $amount, $isSandbox);
                $this->custom_error_log(" REFUND : \n" . print_r($result, true));
                $refundTxnReferenceId = $result['data']['txnReferenceId'];

                switch ($result['statusCode']) {
                    case 'SPG-0000':
                        $order->add_order_note(sprintf(__('Refund Initiated. Amount: %s - Refund txnReferenceId: %s', 'freecharge-pay-woo'), $result['data']['refundAmount'], $result['data']['txnReferenceId']));
                        $order->update_status('wc-partial-refunded');
                        break;
                    case 'SPG-0002':
                    case 'SPG-0228':
                        $order->add_order_note(sprintf(__('Refund Pending. Amount: %s - Refund txnReferenceId: %s  - Reason: %s', 'freecharge-pay-woo'), $result['data']['refundAmount'], $result['data']['txnReferenceId'], $result['statusMessage']));
                        $order->update_status('wc-refund-pending');
                        return false;
                    case 'SPG-0001':
                    case 'SPG-0027':
                    case 'SPG-0028':
                    case 'SPG-0029':
                    case 'SPG-0042':
                    case 'SPG-0047':
                    case 'SPG-0048':
                    case 'SPG-0242':
                    case 'SPG-0275':
                        $order->add_order_note(sprintf(__('Refund Failed. Amount: %s - Refund txnReferenceId: %s - Reason: %s', 'freecharge-pay-woo'), $result['data']['refundAmount'], $result['data']['txnReferenceId'], $result['statusMessage']));
                        $order->update_status('wc-refund-failed');
                        return false;
                    default:
                        return false;
                }
                fcpgz_update_refund_reference($order_id, $refundTxnReferenceId, $order->get_status());
                return true;
            } catch (Exception $e) {
                return isset($result['errorCode']) ? new WP_Error('error', $result['errorMessage']) : false;
            }
        }

        //STATUS FUNCTIONALITY


        /**
         * @param WC_Order $order
         * @return bool
         */
        public function can_check_status($order)
        {
            return $order && $order->get_transaction_id();
        }

        /**
         * Process a refund if supported.
         * @param $parameters
         * @param $id
         * @return WP_Error|bool True or false based on success, or a WP_Error object
         */

        public function update_status_of_order($parameters, $id): WP_Error|bool
        {

            try {
                global $wpdb;
                include_once 'status.php';
                $orders_query = $wpdb->get_results(
                    $wpdb->prepare(
                        "SELECT * FROM {$wpdb->prefix}fcpgz_orders WHERE ORDER_ID = %d",
                        $id
                    )
                );
                if ($parameters == "refund") {
                    $txnID = sanitize_text_field($orders_query[0]->refundTxnReferenceId);
                    $MTID = sanitize_text_field($orders_query[0]->merchantRefundTxnId);
                } else {
                    $txnID = sanitize_text_field($orders_query[0]->txnReferenceId);
                    $MTID = sanitize_text_field($orders_query[0]->merchantTxnID);
                }
                $order = wc_get_order($orders_query[0]->ORDER_ID);
                $isSandbox = ($this->gateway_module === "sandbox");
                FCPGZ_WC_Gateway_Freecharge_Status::$merchantId = $this->merchant_id;
                FCPGZ_WC_Gateway_Freecharge_Status::$secertkey = $this->secret_key;
                $result = FCPGZ_WC_Gateway_Freecharge_Status::check_status_order($order, $txnID, $MTID, $isSandbox);

                if (is_wp_error($result)) {
                    $error_message = sprintf(__('Error while getting status. Reason: %s', 'freecharge-pay-woo'), esc_html($result->get_error_message()));
                    wc_add_notice($error_message, 'error');
                }
                $this->custom_error_log(" FINAL RESULT: \n" . print_r($result, true));
                switch ($result['statusCode']) {
                    case 'SPG-0000':
                        if ($result['data']['txnType'] == 'PAY') {
                            $order_status = 'completed';
                            $order->update_status('completed');
                        } else if ($result['data']['txnType'] == 'REFUND') {
                            if ($result['data']['amount'] == $order->get_total_refunded() && $order->get_total_refunded() < $order->get_total()) {
                                $order_status = 'partial-refunded';
                                $order->update_status('partial-refunded');
                            } else {
                                $order_status = 'refunded';
                                $order->update_status('refunded');
                            }
                        }
                        break;
                    case 'SPG-0050':
                        $order_status = 'Cancelled';
                        break;
                    case 'SPG-0002':
                        $order_status = 'Pending payment';
                        break;
                    case 'SPG-0025':
                    case 'SPG-0001':
                        $order_status = 'failed';
                        break;
                    default:
                        return false;
                }
                $order->update_status($order_status);
                return true;
            } catch (Exception $e) {
                return isset($result['errorCode']) ? new WP_Error('error', $result['errorMessage']) : false;
            }
        }

        public function get_update_status($parameters, $id): WP_Error|bool
        {
            return $this->update_status_of_order($parameters, $id);
        }
        public function webhook_check_refund_pay_status($data)
        {
            try {
                global $woocommerce;
                global $wpdb;
                if (sanitize_textarea_field(isset($data['signature'])) && !empty(sanitize_textarea_field($data['signature']))) {
                    $signature = sanitize_textarea_field($data['signature']);
                    unset($data['signature']);
                }
                // if (sanitize_textarea_field(isset($data['refundAmount'])) && sanitize_textarea_field(is_numeric($data['refundAmount'])) && sanitize_textarea_field($data['refundAmount']) == sanitize_textarea_field((int) $data['refundAmount'])) {
                //     $data['refundAmount'] = sanitize_textarea_field((string) $data['refundAmount'] . ".0");
                // }
                $generator = new FcpgzSignatureGenerator($this->secret_key);
                $mysig = $generator->generateSignature($data);
                if ($mysig == $signature) {
                    $this->custom_error_log("Signature matched successfully : \n");
                    $order_id = (int) explode('_', $data['merchantTxnId'])[0];
                    $refundTransaction_id = wc_clean($data['txnReferenceId']);
                    $order = wc_get_order($order_id);
                    if (!isset($data['statusCode'])) {
                        throw new Exception('Internal Error ' . $order);
                    } else {
                        switch ($data['statusCode']) {
                            case 'SPG-0000':
                                if ($data['refundAmount'] == $order->get_total_refunded() && $order->get_total_refunded() < $order->get_total()) {
                                    $order_status = 'partial-refunded';
                                    $order->update_status('partial-refunded');
                                } else {
                                    $order_status = 'refunded';
                                    $order->update_status('refunded');
                                }
                                $order->add_order_note(sprintf(__('Refund Initiated. Amount: %s - Refund txnReferenceId: %s', 'freecharge-pay-woo'), $data['data']['refundAmount'], $data['data']['txnReferenceId']));
                                $order->update_status($order_status);
                                break;
                            case 'SPG-0002':
                            case 'SPG-0228':
                                $order->add_order_note(sprintf(__('Refund Pending. Amount: %s - Refund txnReferenceId: %s  - Reason: %s', 'freecharge-pay-woo'), $data['data']['refundAmount'], $data['data']['txnReferenceId'], $data['statusMessage']));
                                $order->update_status('wc-refund-pending');
                                return false;
                            case 'SPG-0001':
                            case 'SPG-0027':
                            case 'SPG-0028':
                            case 'SPG-0029':
                            case 'SPG-0042':
                            case 'SPG-0047':
                            case 'SPG-0048':
                            case 'SPG-0242':
                            case 'SPG-0275':
                                $order->add_order_note(sprintf(__('Refund Failed. Amount: %s - Refund txnReferenceId: %s - Reason: %s', 'freecharge-pay-woo'), $data['data']['refundAmount'], $data['data']['txnReferenceId'], $data['statusMessage']));
                                $order->update_status('wc-refund-failed');
                                return false;
                            default:
                                return false;
                        }
                        fcpgz_update_refund_reference($order_id, $refundTransaction_id, $order->get_status());
                    }
                } else {
                    $this->custom_error_log(" ERROR: Signature Mismatch \n");
                    throw new Exception('Error: Signature Mismatch');
                }
            } catch (Exception $e) {
                throw new Exception('Error: ' . $e);
            }
        }

        public function webhook_check_pay_status($data)
        {
            try {
                global $woocommerce;
                global $wpdb;
                if (sanitize_textarea_field(isset($data['signature'])) && !empty(sanitize_textarea_field($data['signature']))) {
                    $signature = sanitize_textarea_field($data['signature']);
                    unset($data['signature']);
                }
                $generator = new FcpgzSignatureGenerator($this->secret_key);
                $mysig = $generator->generateSignature($data);
                if ($mysig == $signature) {
                    $this->custom_error_log("Signature matched successfully. \n");
                    $order_id = (int) explode('_', $data['merchantTxnId'])[0];
                    $transaction_id = wc_clean($data['txnReferenceId']);
                    $merchantTxnId = wc_clean($data['merchantTxnId']);
                    $orders_query = $wpdb->get_results(
                        $wpdb->prepare(
                            "SELECT * FROM {$wpdb->prefix}fcpgz_orders WHERE ORDER_ID = %d",
                            $order_id
                        )
                    );
                    $orderStatus = sanitize_text_field($orders_query[0]->orderStatus);
                    $order = wc_get_order($order_id);
                    if (!isset($data['statusCode'])) {
                        throw new Exception('Internal Error ' . $order);
                    } elseif ($orderStatus !== 'refunded') {
                        $this->handleOrderStatus($order, $data['statusMessage'], $data['statusCode'], $transaction_id, $merchantTxnId);
                    }
                } else {
                    $this->custom_error_log(" ERROR: Signature Mismatch : \n");
                    throw new Exception('Error: Signature Mismatch');
                }
            } catch (Exception $e) {
                throw new Exception('Error: ' . $e);
            }
        }
        /**
         * Handle order status based on the payment result
         *
         * @param WC_Order $order
         * @param string $statusMessage
         * @param string $statusCode
         * @param string $transaction_id
         * @param string $merchantTxnId
         */
        private function handleOrderStatus(WC_Order $order, $statusMessage, $statusCode, $transaction_id, $merchantTxnId)
        {
            $message = '';
            $order_status = '';
            switch ($statusCode) {
                case 'SPG-0000':
                    if ($order->get_status() !== 'completed') {
                        $this->msg['message'] = 'Thank you for your order. Your payment has been successfully received.';
                        $this->msg['class'] = 'success';
                        if ($order->get_status() !== 'processing') {
                            $order->payment_complete($transaction_id); //processing
                            $order->add_order_note(sprintf(esc_html__('Freecharge has processed the payment. Txn ID: ', 'freecharge-pay-woo'), esc_html($merchantTxnId)));
                            $order->add_order_note($this->msg['message']);
                            $order->add_order_note('Paid by Freecharge');
                            $order_status = 'completed';
                            global $woocommerce;
                            $woocommerce->cart->empty_cart();
                        }
                    }
                    break;
                case 'SPG-0050':
                    $message = 'Payment is canceled!';
                    $order_status = 'Cancelled';
                    break;
                case 'SPG-0002':
                    $message = 'Your payment is pending!';
                    $order_status = 'Pending payment';
                    break;
                case 'SPG-0001':
                    $message = 'Your payment has been failed!';
                    $order_status = 'failed';
                    break;
                default:
                    $message = 'Something went wrong. Please try again later';
                    break;
            }

            if (!empty($statusMessage)) {
                $message .= sprintf(' Reason: ' . $statusMessage);
            }

            $order->update_status($order_status);
            fcpgz_update_fcpgz_orders($order->get_id(), $transaction_id, $merchantTxnId, $order_status);
            $this->setStatusMessage($order, $message);
        }



    }

    $plugin_instance = new FCPGZ_WC_Gateway_Freecharge();

    // Call the loadHooks method
    $plugin_instance->initializeHooks();
    // /**
    //  * Can the order be refunded via Freecharge?
    //  * @param  WC_Order $order
    //  * @return bool
    //  */
    function fc_check_status(WP_REST_Request $request)
    {
        $parameters = $request->get_param("statusType");
        $json_body = $request->get_body();

        // Decode the JSON body into an associative array
        $data = json_decode($json_body, true);

        // Extract the "id" value
        $id = $data['id'];
        // $id = $request->get_body();
        $wc_freecharge_status = new FCPGZ_WC_Gateway_Freecharge();
        return $wc_freecharge_status->get_update_status($parameters, $id);
    }
    function check_pay_status(WP_REST_Request $request)
    {
        if (!empty($request->get_body())) {
            $data = json_decode(sanitize_textarea_field($request->get_body()), true);
            $wc_freecharge_status = new FCPGZ_WC_Gateway_Freecharge();
            return $wc_freecharge_status->webhook_check_pay_status($data);
        }
    }
    function check_refund_pay_status(WP_REST_Request $request)
    {
        if (!empty($request->get_body())) {
            $data = json_decode(sanitize_textarea_field($request->get_body()), true);
            $wc_freecharge_status = new FCPGZ_WC_Gateway_Freecharge();
            return $wc_freecharge_status->webhook_check_refund_pay_status($data);
        }
    }


    // legacy – for CPT-based orders
    add_filter('manage_edit-shop_order_columns', 'create_column_title');
    // for HPOS-based orders
    add_filter('manage_woocommerce_page_wc-orders_columns', 'create_column_title');
    function create_column_title($columns)
    {
        $columns = array_slice($columns, 0, 4, true)
            + array('status_column' => 'Transition Status')
            + array_slice($columns, 4, NULL, true);

        return $columns;
    }

    // legacy – for CPT-based orders
    add_action('manage_shop_order_posts_custom_column', 'create_column_data', 25, 2);
    // for HPOS-based orders
    add_action('manage_woocommerce_page_wc-orders_custom_column', 'create_column_data', 25, 2);
    function create_column_data($column_name, $order_or_order_id)
    {
        $url = null;
        // legacy CPT-based order compatibility
        $the_order = $order_or_order_id instanceof WC_Order ? $order_or_order_id : wc_get_order($order_or_order_id);
        if ('status_column' === $column_name && $the_order->get_payment_method() === 'freecharge') {
            $button_id = 'fc_check_status_' . $the_order->get_id();
            if (
                $the_order->get_total_refunded() == 0
                && ($the_order->get_status() === 'completed'
                    || $the_order->get_status() === 'failed'
                    || $the_order->get_status() === 'processing'
                    || $the_order->get_status() === 'pending'
                    || $the_order->get_status() === 'on-hold'
                    || $the_order->get_status() === 'cancelled')
            ) {
                $url = esc_url(site_url()) . '/index.php/wp-json/wp-freecharge/v1/order/status?statusType=pay';
            } else if (
                ($the_order->get_total_refunded() != 0 && $the_order->get_status() === 'completed')
                || $the_order->get_status() === 'refunded'
                || $the_order->get_status() === 'failed'
                || $the_order->get_status() === 'partial-refunded'
                || $the_order->get_status() === 'refund-pending'
                || $the_order->get_status() === 'refund-failed'
            ) {
                $url = esc_url(site_url()) . '/index.php/wp-json/wp-freecharge/v1/order/status?statusType=refund';
            }
            if ($url) {
                ?>
                <p class="button fc_dashboard_check_status" id="<?php echo esc_attr($button_id); ?>">Check Status </p>
                <script>
                    jQuery('#<?php echo esc_js($button_id); ?>').click(function () {
                        let phpecho = JSON.stringify({ "id": <?php echo esc_attr($the_order->get_id()); ?> });
                        jQuery.ajax({
                            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                            data: phpecho,
                            enctype: 'multipart/form-data',
                            type: 'POST',
                            url: "<?php echo esc_js($url); ?>",
                            // success: function (result) {
                            //     window.location.reload();
                            // },
                            // error: function (error) {
                            //     window.location.reload();
                            // }
                        });
                    })
                </script>
                <?php
            }
        }
    }

    add_action('init', 'register_my_new_order_statuses');

    function register_my_new_order_statuses()
    {
        register_post_status(
            'wc-partial-refunded',
            array(
                'label' => _x('Partial Refunded', 'Order status', 'freecharge-pay-woo'),
                'public' => true,
                'exclude_from_search' => false,
                'show_in_admin_all_list' => true,
                'show_in_admin_status_list' => true,
                'label_count' => _n_noop('Partial Refunded <span class="count">(%s)</span>', 'Partial Refunded<span class="count">(%s)</span>', 'freecharge-pay-woo')
            )
        );
        register_post_status(
            'wc-refund-pending',
            array(
                'label' => _x('Refund Pending', 'Order status', 'freecharge-pay-woo'),
                'public' => true,
                'exclude_from_search' => false,
                'show_in_admin_all_list' => true,
                'show_in_admin_status_list' => true,
                'label_count' => _n_noop('Refund Pending <span class="count">(%s)</span>', 'Refund Pending<span class="count">(%s)</span>', 'freecharge-pay-woo')
            )
        );
        register_post_status(
            'wc-refund-failed',
            array(
                'label' => _x('Refund Failed', 'Order status', 'freecharge-pay-woo'),
                'public' => true,
                'exclude_from_search' => false,
                'show_in_admin_all_list' => true,
                'show_in_admin_status_list' => true,
                'label_count' => _n_noop('Refund Failed <span class="count">(%s)</span>', 'Refund Failed<span class="count">(%s)</span>', 'freecharge-pay-woo')
            )
        );
    }

    add_filter('wc_order_statuses', 'my_new_wc_order_statuses');

    // Register in wc_order_statuses.
    function my_new_wc_order_statuses($order_statuses)
    {
        $order_statuses['wc-partial-refunded'] = _x('Partial Refunded', 'Order status', 'freecharge-pay-woo');
        $order_statuses['wc-refund-pending'] = _x('Refund Pending', 'Order status', 'freecharge-pay-woo');
        $order_statuses['wc-refund-failed'] = _x('Refund Failed', 'Order status', 'freecharge-pay-woo');
        return $order_statuses;
    }

    /**
     * Add the Gateway to WooCommerce
     **/
    function fcpgz_woocommerce_add_freecharge_gateway($methods)
    {
        $methods[] = 'FCPGZ_WC_Gateway_Freecharge';
        return $methods;
    }

    add_filter('woocommerce_payment_gateways', 'fcpgz_woocommerce_add_freecharge_gateway');
    function is_woocommerce_activated(): bool
    {
        return class_exists('woocommerce');
    }
}


?>