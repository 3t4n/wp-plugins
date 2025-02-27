<?php
class gc_bluecode extends WC_Payment_Gateway {

  /** @var string  */
  public $merchantid;

  /** @var string  */
  public $projectid;

  /** @var string  */
  public $password;

  /** @var string  */
  public $lang;

  /** @var string  */
  public $purpose;

  /** @var string  */
  public $branch;

  /** @var string */
  public $alternativenumorders;

	/**
   * Constructor for the gateway.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   * @return void
   */
  public function __construct() {
    global $woocommerce;

    // Set language
    $this->setLanguage();

    // Set core gateway settings
    $this->id = 'gc_bluecode';
    $this->method_title = __('Bluecode', 'girocheckout');
    $this->icon = plugins_url('img/gc_bluecode.png', dirname(__FILE__));
    $this->title = __('Bluecode', 'girocheckout');
    $this->has_fields = false;

    // Load the settings
    $this->init_form_fields();
    $this->init_settings();

    // Define user set variables
    $this->title = $this->get_option('title');
    $this->description = __('Bluecode works like cash — just on your smartphone . Download the App now and do cashless payments at over 4500 partners. Fast. Secure. Simple.', 'girocheckout');
    $this->merchantid = $this->get_option('merchantid');
    $this->projectid = $this->get_option('projectid');
    $this->password = $this->get_option('password');
    $this->purpose = $this->get_option('purpose');
    $this->branch = $this->get_option('branch');
    $this->alternativenumorders = 'yes' === $this->get_option('alternativenumorders', 'no');

    // Hooks
    add_action('woocommerce_api_' . $this->id, array($this, 'check_response'));
    add_action('valid_redirect_' . $this->id, array($this, 'do_gc_redirect'));
    add_action('valid_notify_' . $this->id, array($this, 'do_gc_notify'));
    add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    add_filter('woocommerce_payment_gateways', array($this, 'addGateway'));
  }

  /**
   * Set language code for get text functions.
   *
   * Allowed values: de, en
   * default: de
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @param string $language
   */
  public function setLanguage($language = 'de') {
    $strLang = substr(get_bloginfo("language"), 0, 2);

    if ($strLang == 'de' || $strLang == 'en')
      $this->lang = $strLang;
    else
      $this->lang = $language;
  }

  /**
   * Initialize gateway settings form fields.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   * @return void
   */
  public function init_form_fields() {
    $this->form_fields = array(
        'configuration' => array(
            'title' => __('Set-up configuration', 'girocheckout'),
            'type' => 'title'
        ),
        'enabled' => array(
            'title' => __('Enable/Disable', 'girocheckout'),
            'type' => 'checkbox',
            'label' => __('Enable Bluecode', 'girocheckout'),
            'default' => 'no',
        ),
        'title' => array(
            'title' => __('Title', 'girocheckout'),
            'type' => 'text',
            'description' => __('Bluecode works like cash — just on your smartphone .', 'girocheckout'),
            'default' => __('Bluecode', 'girocheckout'),
            'desc_tip' => true,
        ),
        'merchantid' => array(
            'title' => __('Merchant ID', 'girocheckout'),
            'type' => 'text',
            'description' => __('Merchant ID from GiroCockpit', 'girocheckout'),
            'default' => '',
            'desc_tip' => true,
        ),
        'projectid' => array(
            'title' => __('Project ID', 'girocheckout'),
            'type' => 'text',
            'description' => __('Project ID from GiroCockpit', 'girocheckout'),
            'default' => '',
            'desc_tip' => true,
        ),
        'password' => array(
            'title' => __('Project password', 'girocheckout'),
            'type' => 'text',
            'description' => __('Project password from GiroCockpit', 'girocheckout'),
            'default' => '',
            'desc_tip' => true,
        ),
        'purpose' => array(
            'title' => __('Purpose', 'girocheckout'),
            'type' => 'text',
            'description' => __("You can define your own purpose using these placeholders:\n".
                                  "{ORDERID}: Bestellnummer\n".
                                  "{CUSTOMERID}: Kundennummer\n".
                                  "{SHOPNAME}: Shop Name\n".
                                  "{CUSTOMERNAME}: Kundenname\n".
                                  "{CUSTOMERFIRSTNAME}: Kunde Vorname\n".
                                  "{CUSTOMERLASTNAME}: Kunde Nachname\n".
                                  "For example: If your purpose is \"Best. {ORDERID}, {SHOPNAME}\" then the submitted purpose must be \"Best. 55342, TestShop\"\n".
                                  "The maximum length of the purpose is 27 characters.", 'girocheckout'),
            'default' => 'Best. {ORDERID}, {SHOPNAME}',
            'desc_tip' => true,
        ),
        'alternativenumorders' => array(
        'title' => __('Enable/Disable', 'girocheckout'),
        'type' => 'checkbox',
        'label' => __('Support alternative order numbers', 'girocheckout'),
        'default' => 'no',
        )
    );
  }

  /**
   * Add the payment gateway to wc
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   * @return array
   */
  public function addGateway($methods) {
    if (get_woocommerce_currency() == "EUR") {
      $methods[] = $this->id;
    }

    return $methods;
  }

  /**
   * Admin Panel Options.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   * @return void
   */
  public function admin_options() {
    ?>
    <h3><?php _e('Bluecode', 'girocheckout'); ?></h3>
    <p><?php _e('GiroCheckout Bluecode payment', 'girocheckout'); ?></p>
    <table class="form-table">
      <?php
      // Generate the HTML for the settings form.
      $this->generate_settings_html();
      ?>
    </table><!--/.form-table-->
    <?php
  }

  /**
   * Process the payment and return the result.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   * @param int $order_id
   * @return array
   */
  public function process_payment($order_id) {
    global $woocommerce;

    if (empty($this->merchantid)) {
      wc_add_notice(__('GiroCheckout error: missing Merchant-ID', 'girocheckout'), 'error');
      return;
    }
    if (empty($this->projectid)) {
      wc_add_notice(__('GiroCheckout error: missing Project-ID', 'girocheckout'), 'error');
      return;
    }
    if (empty($this->password)) {
      wc_add_notice(__('GiroCheckout error: missing project passphrase', 'girocheckout'), 'error');
      return;
    }

    $merchantId = $this->get_option('merchantid');
    $projectId = $this->get_option('projectid');
    $password = $this->get_option('password');

    try {
      $order = new WC_Order($order_id);
      $orderID = $order->get_id();
      $amount = $order->get_total();
      $currency = get_woocommerce_currency();

      if ($this->alternativenumorders) {
        $transaction_id = $order->get_order_number();
      } else {
        $transaction_id = $orderID;
      }

      $urlRedirect = add_query_arg('type', 'redirect', add_query_arg('wc-api', $this->id, home_url('/')));
      $urlNotify = add_query_arg('type', 'notify', add_query_arg('wc-api', $this->id, home_url('/')));

      // Sends request to Girocheckout.
      $reqPayment = new GiroCheckout_SDK_Request('blueCodeTransaction');
      $reqPayment->setSecret($password);
      $reqPayment->addParam('merchantId', $merchantId)
                 ->addParam('projectId', $projectId)
                 ->addParam('merchantTxId', $transaction_id)
                 ->addParam('amount', round($amount * 100))
                 ->addParam('currency', $currency)
                 ->addParam('purpose', GiroCheckout_Utility::getPurpose($this->purpose, $order))
                 ->addParam('urlRedirect', $urlRedirect)
                 ->addParam('urlNotify', $urlNotify)
                 ->addParam('sourceId', GiroCheckout_Utility::getGcSource())
                 ->addParam('orderId', $transaction_id)
                 ->addParam('customerId', get_current_user_id());

      $reqPayment->submit();

      if ($reqPayment->requestHasSucceeded()) {
        $statusNotificationOrder = GiroCheckout_Utility::readOrderStatus($transaction_id);

        if ($statusNotificationOrder == GiroCheckout_Utility::getOrderStatusZero()) {
          GiroCheckout_Utility::registerOrderStatus($transaction_id, GiroCheckout_Utility::getOrderStatusInitial());
        } else {
          GiroCheckout_Utility::updateOrderStatus($transaction_id, GiroCheckout_Utility::getOrderStatusInitial());
        }

        // Add the girocheckout transaction Id value to the order
        if (!add_post_meta($orderID, '_girocheckout_reference', $reqPayment->getResponseParam('reference'), true)) {
          update_post_meta($orderID, '_girocheckout_reference', $reqPayment->getResponseParam('reference'));
        }
        $strUrlRedirect = $reqPayment->getResponseParam('redirect');
      } else {
        wc_add_notice(GiroCheckout_SDK_ResponseCode_helper::getMessage($reqPayment->getResponseParam('rc'), $this->lang), 'error');
        return;
      }
    } catch (Exception $e) {
      wc_add_notice(__('The plugin configuration data is incorrect', 'girocheckout'), 'error');
      return;
    }

    return array(
        'result' => 'success',
        'redirect' => $strUrlRedirect,
    );
  }

  /**
   * Check the API response
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   */
  public function check_response() {
    @ob_clean();

    if (!empty($_GET) && $_GET["type"] == 'redirect') {
      do_action("valid_redirect_" . $this->id);
    } else {
      do_action("valid_notify_" . $this->id);
    }
  }

  /**
   * Place to forward the customer back to the shop after the payment transaction.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   */
  public function do_gc_redirect() {
    global $woocommerce;

    $password = $this->get_option('password');

    try {
      $notify = new GiroCheckout_SDK_Notify('blueCodeTransaction');
      $notify->setSecret(trim((string) $password));
      $notify->parseNotification($_GET);

      if ($this->alternativenumorders) {
        $iOrderId = GiroCheckout_Utility::get_order_id_by_order_number( $notify->getResponseParam('gcMerchantTxId') );
      } else {
        $iOrderId = $notify->getResponseParam('gcMerchantTxId');
      }

      $order = new WC_Order( $iOrderId );
      $bPaymentSuccess = $notify->paymentSuccessful();

      $iReturnCodeTrx = $notify->getResponseParam('gcResultPayment');
      $paymentMsg = GiroCheckout_SDK_ResponseCode_helper::getMessage($iReturnCodeTrx, $this->lang);
      $urlRedirect = $this->get_return_url($order);
      $statusNotificationOrder = GiroCheckout_Utility::readOrderStatus($notify->getResponseParam('gcMerchantTxId'));

      // If the status is initial (1) redirect run first, then set order status to redirect(2)
      // If the status is zero, not record found, then insert the record with order status redirect(2)
      if ($statusNotificationOrder <= GiroCheckout_Utility::getOrderStatusInitial()) {
        if ($statusNotificationOrder == GiroCheckout_Utility::getOrderStatusZero()) {
          GiroCheckout_Utility::registerOrderStatus($notify->getResponseParam('gcMerchantTxId'), GiroCheckout_Utility::getOrderStatusRedirect());
        } else {
          GiroCheckout_Utility::updateOrderStatus($notify->getResponseParam('gcMerchantTxId'), GiroCheckout_Utility::getOrderStatusRedirect());
        }
      }

      if ($order->get_status() != 'completed' && $order->get_status() != 'processing' &&
        $statusNotificationOrder <= GiroCheckout_Utility::getOrderStatusInitial()) {
      
        // Checks if the payment was successful and redirects the user
        $order->add_order_note($paymentMsg);

        if( $bPaymentSuccess ) {
          $order->payment_complete();
          // Remove cart
          $woocommerce->cart->empty_cart();
        }
        else {
          wc_add_notice($paymentMsg, 'error');
          $order->update_status('failed');

          if (method_exists($order,'get_cancel_order_url_raw')) {
            $urlRedirect = esc_url_raw( $order->get_cancel_order_url_raw() );
          }
        }
      } else {
        if (!$bPaymentSuccess) {
          if ($order->get_status() == 'processing') {
            $paymentMsg = __("This order was already closed successfully and cannot be paid again . Please close your session in the shop and create a new order .");
          }

          wc_add_notice($paymentMsg, 'error');

          if (method_exists($order, 'get_cancel_order_url_raw')) {
            $urlRedirect = esc_url_raw($order->get_cancel_order_url_raw());
          }
        }
        // Don't remove cart, because when the order is not payed the shopping cart is missing
        //$woocommerce->cart->empty_cart();
      }
    }
    catch (Exception $e) {
      if( $notify->getResponseParam('gcMerchantTxId') ) {
        $order = new WC_Order($notify->getResponseParam('gcMerchantTxId'));
        $order->add_order_note($e->getMessage());
        $order->update_status('failed');
      }
    }
    
    wp_redirect($urlRedirect);
  }

  /**
   * Place to notify to the shop of payment of this Bluecode transfer.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2018, GiroSolution AG
   * @access public
   */
  public function do_gc_notify() {
    global $woocommerce;

    // Get the notification
    $password = $this->get_option('password');

    try {
      $notify = new GiroCheckout_SDK_Notify('blueCodeTransaction');
      $notify->setSecret(trim((string) $password));
      $notify->parseNotification($_GET);

      if ($this->alternativenumorders) {
        $iOrderId = GiroCheckout_Utility::get_order_id_by_order_number( $notify->getResponseParam('gcMerchantTxId') );
      } else {
        $iOrderId = $notify->getResponseParam('gcMerchantTxId');
      }

      $order = new WC_Order( $iOrderId );
      $statusNotificationOrder = GiroCheckout_Utility::readOrderStatus($notify->getResponseParam('gcMerchantTxId'));

      // If the status is initial (1) notify run first, then set order status to notify(3)
      // If the status is zero, not record found, then insert the record with order status notify(3)
      if ($statusNotificationOrder <= GiroCheckout_Utility::getOrderStatusInitial()) {
        if ($statusNotificationOrder == GiroCheckout_Utility::getOrderStatusZero()) {
          GiroCheckout_Utility::registerOrderStatus($notify->getResponseParam('gcMerchantTxId'), GiroCheckout_Utility::getOrderStatusNotify());
        } else {
          GiroCheckout_Utility::updateOrderStatus($notify->getResponseParam('gcMerchantTxId'), GiroCheckout_Utility::getOrderStatusNotify());
        }

        $paymentMsg = GiroCheckout_SDK_ResponseCode_helper::getMessage($notify->getResponseParam('gcResultPayment'), $this->lang);
        $order->add_order_note($paymentMsg);
      }

      // Order already processed?
      if (($order->get_status() == 'processing' || $order->get_status() == 'completed') &&
        $statusNotificationOrder <= GiroCheckout_Utility::getOrderStatusInitial()) {
        $notify->sendOkStatus();
        $notify->setNotifyResponseParam('Result', 'ERROR');
        $notify->setNotifyResponseParam('ErrorMessage', "Order $iOrderId already had state=".$order->get_status());
        $notify->setNotifyResponseParam('MailSent', '');
        $notify->setNotifyResponseParam('OrderId', $iOrderId);
        $notify->setNotifyResponseParam('CustomerId', $order->get_user_id());
        echo $notify->getNotifyResponseStringJson();
        exit;
      }

      // Checks if the payment was successful 
      if ($notify->paymentSuccessful()) {
        if ($statusNotificationOrder <= GiroCheckout_Utility::getOrderStatusInitial()) {
          $order->payment_complete();
          // Remove cart
          $woocommerce->cart->empty_cart();
        }

        $notify->sendOkStatus();
        $notify->setNotifyResponseParam('Result', 'OK');
        $notify->setNotifyResponseParam('ErrorMessage', '');
        $notify->setNotifyResponseParam('MailSent', '');
        $notify->setNotifyResponseParam('OrderId', $iOrderId);
        $notify->setNotifyResponseParam('CustomerId', $order->get_user_id());
        echo $notify->getNotifyResponseStringJson();
        exit;
      } else {
        if (($order->get_status() != 'processing' && $order->get_status() != 'completed') &&
          $statusNotificationOrder <= GiroCheckout_Utility::getOrderStatusInitial()) {
          $order->update_status('failed');
        }

        exit;
      }
    }
    catch (Exception $e) {
      $iOrderId = $notify->getResponseParam('gcMerchantTxId');
      $order = new WC_Order($iOrderId);
      $notify->sendBadRequestStatus();
      $notify->setNotifyResponseParam('Result', 'ERROR');
      $notify->setNotifyResponseParam('ErrorMessage', $e->getMessage());
      $notify->setNotifyResponseParam('MailSent', '');
      $notify->setNotifyResponseParam('OrderId', $iOrderId);
      $notify->setNotifyResponseParam('CustomerId', $order->get_user_id());
      echo $notify->getNotifyResponseStringJson();
      exit;
    }
  }
}