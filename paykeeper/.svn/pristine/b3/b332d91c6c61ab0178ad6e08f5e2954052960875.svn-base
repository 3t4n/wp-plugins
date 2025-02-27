<?php

/**
 * WC_PK_Gateway class
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * PayKeeper Gateway.
 * @class WC_PK_Gateway
 */
class WC_PK_Gateway extends WC_Payment_Gateway
{
    public $id = 'paykeeper';
    public $title;
    public $description;
    public $method_title;
    public $method_description;
    public $has_fields;
    public $icon;
    public $supports;

    public $force_discounts_check;
    public $back_to_order_view;
    public $redirect_to_pay_enable;
    public $ajax_checkout_support;
    public $redirect_to_pay_text;
    public $cart_enable;
    public $vat_default;
    public $trucode_enable;
    public $trucode_name;
    public $receipt_enable;
    public $receipt_status;

    protected $server;
    protected $secret;
    protected $login;
    protected $password;
    protected $token;

    /**
     * Initialize the gateway. Constructor for the PayKeeper payment gateway class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->title = $this->get_option( 'title' );
        $this->description = $this->get_option('description' );
        $this->method_title = $this->get_option( 'title' );
        $this->method_description = $this->get_option('description' );
        $this->has_fields = true;
        $this->icon = $this->get_option( 'icon' );
        $this->supports = array(
            'products',
            'refunds'
        );

        $this->init_form_fields();
        $this->init_settings();

        $this->force_discounts_check = $this->get_option( 'force_discounts_check' );
        $this->back_to_order_view = $this->get_option( 'back_to_order_view' );
        $this->redirect_to_pay_enable = $this->get_option( 'redirect_to_pay_enable' );
        $this->ajax_checkout_support = $this->get_option( 'ajax_checkout_support' );
        $this->cart_enable = $this->get_option( 'cart_enable' );
        $this->vat_default = $this->get_option( 'vat_default' );
        $this->trucode_enable = $this->get_option( 'trucode_enable' );
        $this->trucode_name = $this->get_option( 'trucode_name' );
        $this->receipt_enable = $this->get_option( 'receipt_enable' );
        $this->receipt_status = $this->get_option( 'receipt_status' );

        $this->server = $this->get_option( 'paykeeperserver' );
        $this->secret = $this->get_option( 'paykeepersecret' );
        $this->login = $this->get_option( 'login' );
        $this->password = $this->get_option( 'password' );
        $this->token = $this->get_option( 'token' );

        if ($this->redirect_to_pay_enable == 'yes') {
            $this->redirect_to_pay_text = __('You will now be redirected to the banks page', $this->id);
        } else {
            $this->redirect_to_pay_text = __('Click the Pay button to proceed to payment', $this->id);
        }

        add_action('woocommerce_update_options_payment_gateways_' . $this->id, array( &$this, 'process_admin_options' ));
        add_action('woocommerce_receipt_' . $this->id, array( $this, 'pk_receipt_page' ) );
        add_action('woocommerce_api_wc_pk_gateway', array( $this, 'pk_handler' ) );
        add_action('woocommerce_order_status_changed', array( $this, 'pk_order_status_changed' ), 10, 4 );
    }

    /**
     * Processes the admin options for the PayKeeper payment gateway settings.
     *
     * @return void
     */
    public function process_admin_options()
    {
        // Сохраняем настройки
        parent::process_admin_options();

        // Логика замены логина и пароля на токен
        $settings = get_option('woocommerce_' . $this->id . '_settings');
        $login = isset($settings['login']) ? $settings['login'] : '';
        $password = isset($settings['password']) ? $settings['password'] : '';
        $token = isset($settings['token']) ? $settings['token'] : '';

        // Генерация токена при наличии логина и пароля
        if (!empty($login) && !empty($password)) {
            $settings['token'] = base64_encode($login . ':' . $password);
            unset($settings['login']);
            unset($settings['password']);
        } elseif (empty($token)) {
            // Если токен очищен, возвращаем поля логина и пароля
            unset($settings['token']);
        }

        // Сохраняем обновленные настройки
        update_option('woocommerce_' . $this->id . '_settings', $settings);
    }

    /**
     * Admin panel options. Displays the settings page for the PayKeeper payment gateway in the WooCommerce admin panel.
     *
     * @return void
     */
    public function admin_options()
    {
        ?>
        <h3><?php _e('PayKeeper', $this->id); ?></h3>
        <p><?php _e('Allows Payments via the PayKeeper gateway', $this->id); ?></p>
        <table class="form-table">
            <?php $this->generate_settings_html(); ?>
        </table>
        <?php
    }

    /**
     * Initializes the form fields for the PayKeeper payment gateway settings.
     *
     * @return void
     */
    public function init_form_fields() {

        $form_fields = array(
            'enabled' => array(
                'title' => __('Enable/Disable', 'woocommerce'),
                'type' => 'checkbox',
                'label' => __('Enable PayKeeper Gateway', $this->id),
                'default' => 'yes'
            )
        );

        $form_fields_auth = array(
            'paykeeperserver' => array(
                'title' => __('PayKeeper server URL', $this->id),
                'type' => 'text',
                'description' => __('Your PayKeeper server URL', $this->id),
                'default' => ''
            ),
            'paykeepersecret' => array(
                'title' => __('PayKeeper secret word', $this->id),
                'type' => 'text',
                'description' => __('Your PayKeeper secret word', $this->id),
                'default' => ''
            )
        );

        // Получаем текущие настройки
        $settings = get_option('woocommerce_' . $this->id . '_settings');
        $token = isset($settings['token']) ? $settings['token'] : '';

        // Добавляем поля в зависимости от текущих данных
        if (!empty($token)) {
            $form_fields_auth['token'] = array(
                'title' => __('Token', $this->id),
                'type' => 'password',
                'description' => __('Authorization token. Clear and save to make changes.', $this->id),
                'default' => $token
            );
        } else {
            $form_fields_auth['login'] = array(
                'title' => __('PayKeeper login', $this->id),
                'type' => 'text',
                'description' => __('Your PayKeeper login', $this->id),
                'default' => ''
            );
            $form_fields_auth['password'] = array(
                'title' => __('PayKeeper password', $this->id),
                'type' => 'text',
                'description' => __('Your PayKeeper password', $this->id),
                'default' => ''
            );
        }

        $form_fields = array_merge($form_fields, $form_fields_auth);

        $form_fields_gateway = array(
            'force_discounts_check' => array(
                'title' => __('Force discounts check', $this->id),
                'type' => 'checkbox',
                'label' => __('If option is enabled, discounts will be checked anyway. Please, report about this option to support@paykeeper.ru', $this->id),
                'default' => 'no'
            ),
            'redirect_to_pay_enable' => array(
                'title' => __('Automatically redirect to payment', $this->id),
                'type' => 'checkbox',
                'label' => __('If enabled, the customer will be immediately redirected to the payment page after placing the order', $this->id),
                'default' => 'yes'
            ),
            'ajax_checkout_support' => array(
                'title' => __('Ajax checkout support', $this->id),
                'type' => 'checkbox',
                'label' => __('If enabled, the customer will be redirected directly to the payment form, bypassing the payment page.', $this->id),
                'default' => 'no'
            ),
            'autocomplete_order' => array(
                'title' => __('Autocomplete order', $this->id),
                'type' => 'checkbox',
                'label' => __('If this option is enabled, then upon successful payment, the order will be assigned the status completed', $this->id),
                'default' => 'no'
            ),
            'back_to_order_view' => array(
                'title' => __('Back to order view', $this->id),
                'type' => 'checkbox',
                'label' => __('If this option is enabled, after payment, customer will be sent to specific page view-order', $this->id),
                'default' => 'no'
            ),
            'cart_enable' => array(
                'title' => __('Enable cart transmission', $this->id),
                'type' => 'checkbox',
                'label' => __('If enabled, the order cart will be passed in the cart parameter for the checkout form', $this->id),
                'default' => 'yes'
            ),
            'vat_default' => array(
                'title' => __('Default VAT', $this->id),
                'type' => 'select',
                'class' => 'wc-enhanced-select',
                'default' => 'none',
                'options' => array(
                    'none' => __('No VAT', $this->id),
                    'vat0' => __('VAT 0%', $this->id),
                    'vat5' => __('VAT 5%', $this->id),
                    'vat7' => __('VAT 7%', $this->id),
                    'vat10' => __('VAT 10%', $this->id),
                    'vat20' => __('VAT 20%', $this->id),
                    'vat105' => __('VAT 5/105', $this->id),
                    'vat107' => __('VAT 7/107', $this->id),
                    'vat110' => __('VAT 10/110', $this->id),
                    'vat120' => __('VAT 20/120', $this->id),
                ),
            ),
            'trucode_enable' => array(
                'title' => __('Enable transmission of the TRU code', $this->id),
                'type' => 'checkbox',
                'label' => __('If enabled, the tru_code parameter will be passed to the cart', $this->id),
                'default' => 'no'
            ),
            'trucode_name' => array(
                'title' => __('Designation of the TRU code', $this->id),
                'type' => 'text',
                'description' => __('The name of the TRU code parameter for the product (variation) in the cart', $this->id),
                'default' => ''
            ),
            'receipt_enable' => array(
                'title' => __('Enable receipt generation', $this->id),
                'type' => 'checkbox',
                'label' => __('If enabled, a receipt for the final payment will be generated when the order status is changed to the specified one', $this->id),
                'default' => 'no'
            ),
            'receipt_status' => array(
                'title' => __('Order status for receipt generation', $this->id),
                'type' => 'select',
                'class' => 'wc-enhanced-select',
                'default' => 'wc-completed',
                'options' => wc_get_order_statuses(),
            ),
        );

        $form_fields = array_merge($form_fields, $form_fields_gateway);

        $form_fields_view = array(
            'title' => array(
                'title' => __('Title', 'woocommerce'),
                'type' => 'safe_text',
                'description' => __('Name of the payment system when paying', $this->id),
                'default' => __('Payment by Visa/MasterCard online', $this->id),
                'desc_tip' => true
            ),
            'description' => array(
                'title' => __('Description', 'woocommerce'),
                'type' => 'textarea',
                'description' => __('Description of payment system', $this->id),
                'default' => __('Payments via the PayKeeper gateway', $this->id),
                'desc_tip' => true
            ),
            'icon' => array(
                'title' => __('Icon', $this->id),
                'type' => 'text',
                'description' => __('The icon for this checkout option', $this->id),
                'default' => '/wp-content/plugins/paykeeper/visa_mastercard_wordpress.png',
                'desc_tip' => true
            )
        );

        $form_fields = array_merge($form_fields, $form_fields_view);

        $this->form_fields = $form_fields;
    }

    /**
     * Outputs the payment fields (description) on the checkout page.
     *
     * @return void
     */
    public function payment_fields()
    {
        if ($this->description) {
            echo wpautop(wptexturize($this->description));
        }
    }

    /**
     * Process the payment and return the result.
     *
     * @param int $order_id
     * @return array
     */
    public function process_payment($order_id)
    {
        $order = new WC_Order($order_id);

        $pay_now_url = $order->get_checkout_payment_url(true);
        $pay_now_url = add_query_arg('order', $order->get_id(), $pay_now_url);

        if ($this->ajax_checkout_support == 'yes') {
            $pay_now_url = get_option('siteurl') . '?wc-api=wc_pk_gateway&action=form';
            $pay_now_url = add_query_arg('order', $order->get_id(), $pay_now_url);
        }

        return array(
            'result' => 'success',
            'redirect' => $pay_now_url
        );
    }

    /**
     * Handle PayKeeper response. Handles the PayKeeper payment response and updates the WooCommerce order status.
     *
     * @return void
     */
    public function pk_handler()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!isset($_POST['id']) || !isset($_POST['sum']) || !isset($_POST['clientid'])
                || !isset($_POST['orderid']) || !isset($_POST['key']))
            {
                echo 'Error! Parameters are missing';
                exit;
            }

            $order_id = $_POST['orderid'];
            if ($order_id == ''){
                echo 'Error! Order id is empty';
                exit;
            }

            $id = $_POST['id'];
            $sum = $_POST['sum'];
            $clientid = $_POST['clientid'];
            $key = $_POST['key'];

            //проверка цифровой подписи
            if ($key != md5($id . $sum . $clientid . $order_id . $this->secret)){
                echo 'Error! Hash mismatch';
                exit;
            }

            $order = new WC_Order($order_id);

            if ($order->get_total() != $sum) {
                echo 'Error! Incorrect order sum!';
            }

            /* если заказ уже оплачен, то уведомляем, что все хорошо */
            if ($order->has_status('completed')) {
                try {
                    wc_reduce_stock_levels($order_id);
                } catch (Exception $e) { }

                // убираем всё лишнее до вывода
                if (ob_get_level() > 0) {
                    ob_end_flush();
                }

                echo 'OK ' . md5($id . $this->secret);
                exit;
            }

            /* платеж успешно совершен */
            $transaction_id = sanitize_text_field($id);
            $order->set_transaction_id($transaction_id);
            $order->add_order_note("PayKeeper payment completed #$transaction_id");

            try {
                wc_reduce_stock_levels($order_id);
            } catch (Exception $e) { }

            if ($this->get_option('autocomplete_order') == 'yes') {
                $order->update_status('completed');
            }

            $order->payment_complete();

            /* удадяем из сессии ожидающий оплату ордер */
            try {
                WC()->session->__unset( 'order_awaiting_payment' );
            } catch (Exception $e) {
                unset($_SESSION['order_awaiting_payment']);
            }

            // убираем всё лишнее до вывода
            if (ob_get_level() > 0) {
                ob_end_clean();
            }

            echo 'OK ' . md5($id . $this->secret);
            exit;
        }

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action === 'form') {
                $order_id = $_GET['order'];
                $order = wc_get_order($order_id);
                $order->update_status('wc-pending', "PayKeeper: " . __('Payment pending', $this->id));
                $this->pk_form($order_id);
                exit;
            }
        }

        if (isset($_REQUEST['failed'])) {
            self::pk_failed();
        } else {
            self::pk_success();
        }
    }

    /**
     * Handle payment failure. Redirects to the cart page when the payment fails.
     *
     * @return void
     */
    public function pk_failed()
    {
        wp_redirect(get_permalink(wc_get_page_id('cart')));
        exit;
    }

    /**
     * Handle successful payment. Redirects the user to the return URL after a successful transaction.
     *
     * @return void
     */
    public function pk_success()
    {
        wp_redirect($this->get_return_url());
        exit;
    }

    /**
     * Displays the receipt page for a specific order.
     *
     * @param int $order_id The ID of the order for which the receipt page is displayed.
     *
     * @return void
     */
    public function pk_receipt_page($order_id)
    {
        $this->pk_form($order_id);
        if ($this->ajax_checkout_support == 'yes') {
            exit;
        }
    }

    /**
     * Generates a payment form with order data for integration with PayKeeper.
     *
     * This method collects order information, including items, shipping, discounts, and taxes,
     * and generates a payment form with the data signed for submission to the PayKeeper server.
     *
     * @param int $order_id The ID of the order for which the payment form is generated.
     *
     * @return void
     */
    public function pk_form($order_id)
    {
        $order = new WC_Order($order_id);
        $pk_obj = new PaykeeperPayment();

        //set order parameters
        $pk_obj->setOrderParams(
                $order->get_total(),              //sum
                trim($order->get_billing_first_name() . ' ' . $order->get_billing_last_name()),  //clientid
                $order->get_id(),                 //orderid
                $order->get_billing_email(),      //client_email
                $order->get_billing_phone(),      //client_phone
                '',                               //service_name
                $this->server,                    //payment form url
                $this->secret                    //secret key
        );

        if ($this->back_to_order_view == 'yes') {
            $pk_obj->order_params['user_result_callback'] = esc_url($order->get_view_order_url());
        }

        //GENERATE FZ54 CART
        if ($this->cart_enable == 'yes') {
            $last_index = 0;

            foreach ($order->get_items() as $order_items) {
                $item = $order_items->get_data();
                if ((float) $item['total'] <= 0){
                    continue;
                }

                $name = $item['name'];
                $qty = (float) $item['quantity'];

                if ($qty == 1 && $pk_obj->single_item_index < 0) {
                    $pk_obj->single_item_index = $last_index;
                }

                if ($qty > 1 && $pk_obj->more_then_one_item_index < 0){
                    $pk_obj->more_then_one_item_index = $last_index;
                }

                $item_total = (float) $item['total'];
                $item_total_tax = (float) $item['total_tax'];
                $sum = $item_total_tax + $item_total;
                $price = $sum / $qty;

                if ($item['variation_id']) {
                    $product = new WC_Product_Variation($item['variation_id']);
                } else {
                    $product = new WC_Product($item['product_id']);
                }
                $vat = $this->pk_get_vat($product);

                $pk_obj->updateFiscalCart(
                    $pk_obj->getPaymentFormType(),
                    $name,
                    $price,
                    $qty,
                    0,
                    $vat
                );

                // TRU CODE
                if ($this->trucode_enable == 'yes' && $this->trucode_name) {
                    $tru_code = '';
                    if (isset($item['product_id'])) {
                        $tru_code = get_post_meta($item['product_id'], $this->trucode_name, true);
                    }
                    if (empty($tru_code) && !empty($item[$this->trucode_name])) {
                        $tru_code = $item[$this->trucode_name];
                    }
                    if (!empty($tru_code)) {
                        $pk_obj->fiscal_cart[$last_index]['tru_code'] = $tru_code;
                    }
                }

                $last_index++;
            }

            // Add shipping parameters to cart
            $shipping_total = (float) $order->get_shipping_total();
            $shipping_tax = (float) $order->get_shipping_tax();
            if ($shipping_total > 0) {
                $pk_obj->setShippingPrice($shipping_total + $shipping_tax);
                $shipping_name = $order->get_shipping_method();
                // Check if delivery already in cart
                if (!$pk_obj->checkDeliveryIncluded($pk_obj->getShippingPrice(), $shipping_name)) {
                    $shipping_tax_rate = $shipping_tax / ($shipping_total / 100);
                    $shipping_tax_class = get_option("woocommerce_shipping_tax_class");
                    if ($shipping_tax_class != 'inherit') {
                        $product = new WC_Order_Item_Shipping();
                        $vat = $this->pk_get_vat($product);
                    } else {
                        $shipping_taxes = $pk_obj->setTaxes($shipping_tax_rate);
                        $vat = $shipping_taxes['tax'];
                    }
                    $pk_obj->setUseDelivery(); // For precision correct check
                    $pk_obj->updateFiscalCart(
                        $pk_obj->getPaymentFormType(),
                        $shipping_name,
                        $pk_obj->getShippingPrice(),
                        1,
                        0,
                        $vat == 'none' ? $this->vat_default : $vat
                    );
                    $pk_obj->fiscal_cart[$last_index]['item_type'] = 'service';
                    $pk_obj->delivery_index = $last_index;
                }
            }

            // Set discounts
            $pk_obj->setDiscounts(floatval($order->get_discount_total()) > 0 || $this->force_discounts_check == 'yes');

            // Handle possible precision problem
            $pk_obj->correctPrecision();
        }

        // Generate payment form
        $to_hash = number_format($pk_obj->getOrderTotal(), 2, '.', '') .
            $pk_obj->getOrderParams('clientid')     .
            $pk_obj->getOrderParams('orderid')      .
            $pk_obj->getOrderParams('service_name') .
            $pk_obj->getOrderParams('client_email') .
            $pk_obj->getOrderParams('client_phone') .
            $pk_obj->getOrderParams('secret_key');
        $sign = hash ('sha256' , $to_hash);

        echo $this->pk_get_payment_form($pk_obj, $sign);

    }

    /**
     * Generates the payment form for the PayKeeper payment system.
     *
     * @param object $pk_obj           Instance of the payment object containing order data and parameters.
     * @param string $payment_form_sign A signature hash for validating the payment form.
     * @param bool $no_delay           If true, disables the delay for auto-submitting the form.
     *
     * @return string The generated HTML payment form or error message in case of failure.
     */
    private function pk_get_payment_form($pk_obj, $payment_form_sign, $no_delay=false)
    {
        $form = "";
        if ($pk_obj->getPaymentFormType() == "create") { //create form
            $form = '
                <h3>' . $this->redirect_to_pay_text . '</h3>
                <form name="pk_pay_form" id="pk_pay_form" action="'.$pk_obj->getOrderParams("form_url").'" accept-charset="utf-8" method="post">
                <input type="hidden" name="sum" value = "'.$pk_obj->getOrderTotal().'"/>
                <input type="hidden" name="orderid" value = "'.$pk_obj->getOrderParams("orderid").'"/>
                <input type="hidden" name="clientid" value = "'.$pk_obj->getOrderParams("clientid").'"/>
                <input type="hidden" name="client_email" value = "'.$pk_obj->getOrderParams("client_email").'"/>
                <input type="hidden" name="client_phone" value = "'.$pk_obj->getOrderParams("client_phone").'"/>
                <input type="hidden" name="service_name" value = "'.$pk_obj->getOrderParams("service_name").'"/>'.
                ($pk_obj->getOrderParams("user_result_callback")
                    ? '
                    <input type="hidden" name="user_result_callback" value = "'.$pk_obj->getOrderParams("user_result_callback").'"/>'
                    : '') .
                '
                <input type="hidden" name="cart" value = \''.htmlentities($pk_obj->getFiscalCartEncoded(),ENT_QUOTES).'\' />
                <input type="hidden" name="sign" value = "'.$payment_form_sign.'"/>
                <input type="hidden" name="lang" value = "'.$pk_obj->getCurrentLang().'"/>
                <input type="submit" class="btn btn-default" value="Оплатить"/>
                </form>';

            if ($this->redirect_to_pay_enable == 'yes') {
                $delay = ($no_delay) ? 0 : 2000;
                $form .= '
                <script type="text/javascript">
                window.addEventListener("load", submitPayForm);
                function submitPayForm() {
                    setTimeout(function() {
                        document.forms["pk_pay_form"].submit();
                    }, '.$delay.');
                }
                </script>';
            } else if ($this->ajax_checkout_support == 'yes') {
                $form .= '
                <script type="text/javascript">
                document.forms["pk_pay_form"].submit();
                </script>';
            }
        }
        else { //order form
            $payment_parameters = array(
                "clientid"=>$pk_obj->getOrderParams("clientid"),
                "orderid"=>$pk_obj->getOrderParams('orderid'),
                "sum"=>$pk_obj->getOrderTotal(),
                "client_phone"=>$pk_obj->getOrderParams("phone"),
                "phone"=>$pk_obj->getOrderParams("phone"),
                "client_email"=>$pk_obj->getOrderParams("client_email"),
                "cart"=>$pk_obj->getFiscalCartEncoded());
            $query = http_build_query($payment_parameters);
            if( function_exists( "curl_init" )) { //using curl
                $CR = curl_init();
                curl_setopt($CR, CURLOPT_URL, $pk_obj->getOrderParams("form_url"));
                curl_setopt($CR, CURLOPT_POST, 1);
                curl_setopt($CR, CURLOPT_FAILONERROR, true);
                curl_setopt($CR, CURLOPT_POSTFIELDS, $query);
                curl_setopt($CR, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($CR, CURLOPT_SSL_VERIFYPEER, 0);
                $result = curl_exec( $CR );
                $error = curl_error( $CR );
                if( !empty( $error )) {
                    $form = "<br/><span class=message>"."INTERNAL ERROR:".$error."</span>";
                }
                else {
                    $form = $result;
                }
                curl_close($CR);
            }
            else { //using file_get_contents
                if (!ini_get('allow_url_fopen')) {
                    $form = "<br/><span class=message>"."INTERNAL ERROR: Option allow_url_fopen is not set in php.ini"."</span>";
                }
                else {
                    $query_options = array("https"=>array(
                        "method"=>"POST",
                        "header"=>
                            "Content-type: application/x-www-form-urlencoded",
                        "content"=>$query
                    ));
                    $context = stream_context_create($query_options);
                    $form = file_get_contents($pk_obj->getOrderParams("form_url"), false, $context);
                }
            }
        }
        if ($form  == "") {
            $form = '<h3>Произошла ошибка при инциализации платежа</h3>';
        }

        return $form;
    }

    /**
     * Process a refund for a given order, including partial refunds and tax calculations.
     *
     * @param int    $order_id The order ID.
     * @param float  $amount   The refund amount.
     * @param string $reason   The reason for the refund.
     *
     * @return bool|WP_Error True on success, WP_Error on failure.
     */
    public function process_refund($order_id, $amount = null, $reason = '')
    {
        $order = wc_get_order($order_id);

        $data = array(
            'id'      => $order->get_transaction_id(),
            'amount'  => $amount,
            'partial' => 'false'
        );

        $refunds = $order->get_refunds();
        $current_refund = reset($refunds);

        if (!$current_refund || (float) $amount == 0) {
            return new WP_Error($this->id . '_refund_failed', __('No refund data found.', $this->id));
        }

        if ($order->get_total() != $amount) {
            $data['partial'] = 'true';

            $pk_obj = new PaykeeperPayment();
            // Перебираем позиции возврата (по умолчанию $item_type = 'line_item')
            $last_index = 0;
            foreach ($current_refund->get_items() as $item) {
                $name = $item['name'];
                $item_total = (float) $item['total'];
                $item_total_tax = (float) $item['total_tax'];
                $qty = (float) $item['quantity'];
                $sum = $item_total_tax + $item_total;
                $price = $sum/$qty;

                if ($item['variation_id']) {
                    $product = new WC_Product_Variation($item['variation_id']);
                } else {
                    $product = new WC_Product($item['product_id']);
                }
                $vat = $this->pk_get_vat($product);

                $pk_obj->updateFiscalCart(
                    '',
                    $name,
                    abs($price),
                    abs($qty),
                    0,
                    $vat
                );
                $last_index++;
            }

            foreach ($current_refund->get_items('shipping') as $shipping) {
                $shipping_total = (float) $shipping['total'];
                $shipping_tax = (float) $shipping['total_tax'];
                $shipping_price = $shipping_tax + $shipping_total;
                $shipping_name = $shipping['name'];
                $shipping_tax_rate = $shipping_tax / ($shipping_total / 100);
                $shipping_tax_class = get_option("woocommerce_shipping_tax_class");
                if ($shipping_tax_class != 'inherit') {
                    $product = new WC_Order_Item_Shipping();
                    $vat = $this->pk_get_vat($product);
                } else {
                    $shipping_taxes = $pk_obj->setTaxes($shipping_tax_rate);
                    $vat = $shipping_taxes['tax'];
                }
                $pk_obj->updateFiscalCart(
                    '',
                    $shipping_name,
                    abs($shipping_price),
                    1,
                    0,
                    $vat == 'none' ? $this->vat_default : $vat
                );
                $pk_obj->fiscal_cart[$last_index]['item_type'] = 'service';
            }

            $data['refund_cart'] = $pk_obj->getFiscalCartEncoded();
        }
        $response = $this->pk_send_curl_api($this->server, '/change/payment/reverse/', $data);

        $response = json_decode($response, true);
        if (isset($response['result']) && $response['result'] == 'success') {
            $order->add_order_note("PayKeeper reverse completed sum $amount");
            return true;
        }
        if (isset($response['msg'])) {
            return new WP_Error($this->id . '_refund_failed', __($response['msg'], $this->id));
        }

        return new WP_Error($this->id . '_refund_failed', sprintf(__('Order ID (%s) failed to be refunded.', $this->id), $order_id));
    }

    /**
     * Retrieves the VAT rate for a given WooCommerce product.
     *
     * @param object $product The WooCommerce product object for which to determine the VAT rate.
     *
     * @return string The VAT rate formatted as "vat{rate}" (e.g., "vat20"), or the default VAT rate.
     */
    private function pk_get_vat($product)
    {
        $tax = new WC_Tax();
        $tax_status = $product->get_tax_status();
        if (get_option("woocommerce_calc_taxes") == "no" || in_array( $tax_status, [ 'shipping', 'none' ] )) {
            return $this->vat_default;
        }
        if ($product instanceof WC_Product || $product instanceof WC_Product_Variation) {
            $tax_class = $product->get_tax_class();
        } else if ($product instanceof WC_Order_Item_Shipping) {
            $tax_class = $product->get_tax_class();
        } else {
            return $this->vat_default;
        }
        $base_tax_rates = $tax->get_base_tax_rates($tax_class);
        if (empty($base_tax_rates)) {
            return $this->vat_default;
        }
        $rates = $tax->get_rates($tax_class);
        $rates = array_shift($rates);
        $item_rate = round(array_shift($rates));

        return "vat$item_rate";
    }

    /**
     * Handles the change in order status and sends the receipt if conditions are met.
     *
     * @param int    $order_id   The order ID.
     * @param string $old_status The previous status of the order.
     * @param string $new_status The new status of the order.
     * @param WC_Order $order      The WooCommerce order object.
     *
     * @return int The order ID.
     */
    public function pk_order_status_changed($order_id, $old_status, $new_status, $order)
    {
        if ($this->receipt_enable == 'yes' && $this->receipt_status == 'wc-' . $new_status) {
            $data = array(
                'id' => $order->get_transaction_id()
            );
            $response = $this->pk_send_curl_api($this->server, '/change/payment/post-sale-receipt/', $data);
            $response = json_decode($response, true);
            if (isset($response[0])) {
                $response = $response[0];
            }
            if (isset($response['result']) && $response['result'] == 'success') {
                $order->add_order_note("PayKeeper final receipt #{$response['receipt_id']}");
                return $order_id;
            }
            if (isset($response['msg'])) {
                $order->add_order_note('PayKeeper error receipt: ' . __($response['msg'], $this->id));
                return $order_id;
            }
        }
        return $order_id;
    }

    /**
     * Sends a cURL request to a specified API endpoint with optional data.
     *
     * @param string $url The base URL of the API server.
     * @param string $uri The specific URI to append to the base URL.
     * @param array  $data Optional associative array of data to send with the request.
     *
     * @return string The response from the API server.
     */
    private function pk_send_curl_api($url, $uri, $data = array())
    {
        $parsedUrl = parse_url($url);
        if ($parsedUrl !== false && isset($parsedUrl['host'])) {
            $url = 'https://' . $parsedUrl['host'];
        }

        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $this->token
        );

        $curl_opt = array(
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_VERBOSE => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => false
        );
        if ($data) {
            $ch = curl_init($url . '/info/settings/token/');
            curl_setopt_array($ch, $curl_opt);
            $response = curl_exec($ch);
            curl_close($ch);
            $token = '';
            if ($response) {
                $response = json_decode($response, true);
                $token = isset($response['token']) ? $response['token'] : '';
            }
            $data['token'] = $token;
        }
        $ch = curl_init($url . $uri);
        if (!empty($data)) {
            $curl_opt[CURLOPT_POST] = true;
            $curl_opt[CURLOPT_POSTFIELDS] = http_build_query($data, '', '&');
        }
        curl_setopt_array($ch, $curl_opt);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /**
     * Writes log data to a file with PayKeeper, WordPress, and WooCommerce version details.
     *
     * @param array $log_params Associative array of log parameters to be recorded.
     * @return void
     */
    private function pk_write_log($log_params)
    {
        $logText = str_repeat('-', 14) . 'START ' . date("d-m-Y H:i:s") . str_repeat('-', 14) . "\n";
        $logText .= 'PAYKEEPER ' . WC_PK_ADDON_VERSION
            . ' | WP ' . get_bloginfo('version')
            . ' | WC ' . get_woo_version_number() . "\n";
        foreach ($log_params as $key => $value) {
            $logText .= "$key: " . print_r($value,true) . "\n";
        }
        $logText .= "\n\n";
        $path = WC_PK_ADDON_PATH . '/logs/paykeeper_' . date('Y-m') . '.log';
        error_log($logText, 3, $path);
    }
}

if (!function_exists('get_woo_version_number')) {
    /**
     * Retrieves the installed WooCommerce version number.
     *
     * @return string WooCommerce version number or "x.x.x" if not found.
     */
    function get_woo_version_number() {
        // Ensure the get_plugins() function is available
        if (!function_exists('get_plugins')) {
            require_once( ABSPATH . 'wp-admin/includes/plugin.php');
        }
        // Access WooCommerce plugin directory and file
        $plugin_folder = get_plugins('/' . 'woocommerce');
        $plugin_file = 'woocommerce.php';

        // Return version if found in plugin metadata
        if (isset($plugin_folder[$plugin_file]['Version'])) {
            return $plugin_folder[$plugin_file]['Version'];
        } else {
            // Fallback: Check if WooCommerce is loaded and get version from class
            if ( class_exists( 'WooCommerce' ) ) {
                global $woocommerce;
                if (isset($woocommerce->version)) {
                    return $woocommerce->version;
                }
            }
            // Return default if version is not found
            return "x.x.x";
        }
    }
}
