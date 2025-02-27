<?php
class gc_creditcard extends WC_Payment_Gateway
{

  /** @var string */
  public $merchantid;

  /** @var string */
  public $projectid;

  /** @var string */
  public $password;

  /** @var string */
  public $lang;

  /** @var string */
  public $UseVisaMaster;

  /** @var string */
  public $UseAMEX;

  /** @var string */
  public $UseJCB;

  /** @var string */
  public $purpose;

  /** @var string */
  public $transactiontype;

  /** @var string */
  public $statuscapture;

  /** @var array */
  public $statusOrders;

  /** @var string */
  public $alternativenumorders;

  /**
   * Constructor for the gateway.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   * @return void
   */
  public function __construct()
  {
    global $woocommerce;

    // Set language
    $this->setLanguage();

    // Set core gateway settings
    $this->id = 'gc_creditcard';
    $this->method_title = __('credit card', 'girocheckout');
    $this->title = __('credit card', 'girocheckout');
    $this->has_fields = FALSE;
    $this->statusOrders = wc_get_order_statuses();

    // Load the settings
    $this->init_form_fields();
    $this->init_settings();

    // Define user set variables
    $this->title = $this->get_option('title');
    $this->description = __('On the following secure website, you are asked to enter your credit card data. If your credit card is enabled for 3D Secure (Verified by Visa or MasterCard Secure Code), additional information will be passed for a security check at your bank.', 'girocheckout');
    $this->merchantid = $this->get_option('merchantid');
    $this->projectid = $this->get_option('projectid');
    $this->password = $this->get_option('password');
    $this->UseVisaMaster = 'yes' === $this->get_option('visa', 'no');
    $this->UseAMEX = 'yes' === $this->get_option('amex', 'no');
    $this->UseJCB = 'yes' === $this->get_option('jcb', 'no');
    $this->purpose = $this->get_option('purpose');
    $this->transactiontype = $this->get_option('transactiontype');
    $this->statuscapture = $this->get_option('statuscapture');
    $this->alternativenumorders = 'yes' === $this->get_option('alternativenumorders', 'no');

    $strLogoName = $this->getExtendedLogo();
    if (strlen($strLogoName) > 0) {
      $this->icon = plugins_url('img/' . $strLogoName, dirname(__FILE__));
    }
    else {
      $this->icon = plugins_url('img/gc_creditcard.jpg', dirname(__FILE__));
    }

    // Hooks
    add_action('woocommerce_api_' . $this->id, array($this, 'check_response'));
    add_action('valid_redirect_' . $this->id, array($this, 'do_gc_redirect'));
    add_action('valid_notify_' . $this->id, array($this, 'do_gc_notify'));
    add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
    add_filter('woocommerce_payment_gateways', array($this, 'addGateway'));
    add_action('woocommerce_order_status_changed', array( $this, 'capture_payment' ) );
    //add_action('woocommerce_order_status_completed', array( $this, 'capture_payment' ) );
    //add_action('woocommerce_order_status_processing', array( $this, 'capture_payment' ) );

    $this->supports = array(
      'products',
      'refunds'
    );
  }

  /**
   * Set language code for get text functions.
   *
   * Allowed values: de, en
   * default: de
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @param string $language
   * @return none
   */
  public function setLanguage($language = 'de')
  {
    $strLang = substr(get_bloginfo("language"), 0, 2);

    if ($strLang == 'de' || $strLang == 'en')
      $this->lang = $strLang;
    else
      $this->lang = $language;
  }

  /**
   * Initialise gateway settings form fields.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   * @return void
   */
  public function init_form_fields()
  {
    $this->form_fields = array(
      'configuration' => array(
        'title' => __('Set-up configuration', 'girocheckout'),
        'type' => 'title'
      ),
      'enabled' => array(
        'title' => __('Enable/Disable', 'girocheckout'),
        'type' => 'checkbox',
        'label' => __('Enable credit card', 'girocheckout'),
        'default' => 'no',
      ),
      'title' => array(
        'title' => __('Title', 'girocheckout'),
        'type' => 'text',
        'description' => __('Payment method title that the customer will see on your website.', 'girocheckout'),
        'default' => __('credit card', 'girocheckout'),
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
      'visa' => array(
        'title' => __('Enable/Disable', 'girocheckout'),
        'type' => 'checkbox',
        'label' => __('Enable Visa/Mastercard', 'girocheckout'),
        'default' => 'no',
      ),
      'amex' => array(
        'title' => __('Enable/Disable', 'girocheckout'),
        'type' => 'checkbox',
        'label' => __('Enable AMEX', 'girocheckout'),
        'default' => 'no',
      ),
      'jcb' => array(
        'title' => __('Enable/Disable', 'girocheckout'),
        'type' => 'checkbox',
        'label' => __('Enable JCB', 'girocheckout'),
        'default' => 'no',
      ),
      'transactiontype' => array(
        'title'       => __( 'Transaction type', 'girocheckout' ),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'default'     => 'authorize_sale',
        'options'     => array(
          'authorize'      => __( 'Authorize only', 'girocheckout' ),
          'authorize_sale' => __( 'Authorize and Sale', 'girocheckout' ),
        )
      ),
      'statuscapture' => array(
        'title'       => __( 'Automatically book the reserved amount on status change to:', 'girocheckout' ),
        'type'        => 'select',
        'class'       => 'wc-enhanced-select',
        'default'     => 'wc-completed',
        'options'     => $this->statusOrders
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
   * Add the payment gateway to wc.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   * @return array
   */
  public function addGateway($methods)
  {
    $methods[] = $this->id;
    return $methods;
  }

  /**
   * Admin Panel Options.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   * @return void
   */
  public function admin_options()
  {
    ?>
      <h3><?php _e('credit card', 'girocheckout'); ?></h3>
      <p><?php _e('GiroCheckout Credit Card payment', 'girocheckout'); ?></p>
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
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   * @param int $order_id
   * @return array
   */
  public function process_payment($order_id)
  {

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
    $transactiontype = $this->get_option('transactiontype');

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

      if( $transactiontype == "authorize" ) {
        $strTransType = __GIROCHECKOUT_TRANTYP_AUTH;
      }
      else {
        $strTransType = __GIROCHECKOUT_TRANTYP_SALE;
      }

      // Adding fields for 3-D Secure 2.0
      $aTdsOptionalInfo = new stdClass();
      $tds2Address = "";
      $tds2Postcode = "";
      $tds2City = "";
      $tds2Country = "";
      $shipAddressAddress = "";
      $shipAddressPostcode = "";
      $shipAddressCity = "";
      $shipAddressCountry = "";

      if (method_exists($order, 'get_billing_address_1')) {
        $tds2Address = $order->get_billing_address_1();
      } else {
        $tds2Address = $order->billing_address_1;
      }

      if (method_exists($order, 'get_billing_postcode')) {
        $tds2Postcode = $order->get_billing_postcode();
      } else {
        $tds2Postcode = $order->billing_postcode;
      }

      if (method_exists($order, 'get_billing_city')) {
        $tds2City = $order->get_billing_city();
      } else {
        $tds2City = $order->billing_city;
      }

      if (method_exists($order, 'get_billing_country')) {
        $tds2Country = $order->get_billing_country();
      } else {
        $tds2Country = $order->billing_country;
      }

      if (method_exists($order, 'get_billing_email')) {
        $strEmail = $order->get_billing_email();
      } else {
        $strEmail = $order->billing_email;
      }

      if (method_exists($order, 'get_shipping_address_1')) {
        $shipAddressAddress = $order->get_shipping_address_1();
      } else {
        $shipAddressAddress = $order->shipping_address_1;
      }

      if (method_exists($order, 'get_shipping_postcode')) {
        $shipAddressPostcode = $order->get_shipping_postcode();
      } else {
        $shipAddressPostcode = $order->shipping_postcode;
      }

      if (method_exists($order, 'get_shipping_city')) {
        $shipAddressCity = $order->get_shipping_city();
      } else {
        $shipAddressCity = $order->shipping_city;
      }

      if (method_exists($order, 'get_shipping_country')) {
        $shipAddressCountry = $order->get_shipping_country();
      } else {
        $shipAddressCountry = $order->shipping_country;
      }

      if (!empty($strEmail)) {
        $aTdsOptionalInfo->email = $strEmail; // Optional email address
      }

      if (!empty($shipAddressCountry) && !empty($shipAddressAddress) &&
          !empty($shipAddressCity) && !empty($shipAddressPostcode)) {
        if ($tds2Address != $shipAddressAddress || $tds2City != $shipAddressCity ||
            $tds2Postcode != $shipAddressPostcode || $tds2Country != $shipAddressCountry) {

          $aTdsOptionalInfo->shippingAddress = new stdClass();
          $aTdsOptionalInfo->shippingAddress->country = $shipAddressCountry;
          $aTdsOptionalInfo->shippingAddress->line1 = $shipAddressAddress;
          $aTdsOptionalInfo->shippingAddress->city = $shipAddressCity;
          $aTdsOptionalInfo->shippingAddress->postcode = $shipAddressPostcode;

          // Shipping address matches billing address, array( "true", "false" );
          $aTdsOptionalInfo->addressesMatch = "false";

        } else {
          // Shipping address matches billing address, array( "true", "false" );
          $aTdsOptionalInfo->addressesMatch = "true";
        }
      }

      $request = new GiroCheckout_SDK_Request('creditCardTransaction');
      $request->setSecret($password);
      $request->addParam('merchantId', $merchantId)
              ->addParam('projectId', $projectId)
              ->addParam('merchantTxId', $transaction_id)
              ->addParam('amount', round($amount * 100))
              ->addParam('currency', $currency)
              ->addParam('purpose', GiroCheckout_Utility::getPurpose($this->purpose, $order))
              ->addParam('locale', $this->lang)
              ->addParam('urlRedirect', $urlRedirect)
              ->addParam('urlNotify', $urlNotify)
              ->addParam('sourceId', GiroCheckout_Utility::getGcSource())
              ->addParam('orderId', $transaction_id)
              ->addParam('customerId', get_current_user_id())
              ->addParam('type', $strTransType);

      if (!empty($tds2Address) && !empty($tds2Postcode) && !empty($tds2City) && !empty($tds2Country)) {
        $request->addParam('tds2Address', $tds2Address)
                ->addParam('tds2Postcode',$tds2Postcode)
                ->addParam('tds2City',$tds2City)
                ->addParam('tds2Country',$tds2Country)
                ->addParam('tds2Optional',json_encode($aTdsOptionalInfo));
      }

      $request->submit();

      if ($request->requestHasSucceeded()) {
        $strUrlRedirect = $request->getResponseParam('redirect');

        $statusNotificationOrder = GiroCheckout_Utility::readOrderStatus($transaction_id);

        if ($statusNotificationOrder == GiroCheckout_Utility::getOrderStatusZero()) {
          GiroCheckout_Utility::registerOrderStatus($transaction_id, GiroCheckout_Utility::getOrderStatusInitial());
        } else {
          GiroCheckout_Utility::updateOrderStatus($transaction_id, GiroCheckout_Utility::getOrderStatusInitial());
        }

        // Add the girocheckout transaction Id value to the order
        if (!add_post_meta($orderID, '_girocheckout_reference', $request->getResponseParam('reference'), true)) {
          update_post_meta($orderID, '_girocheckout_reference', $request->getResponseParam('reference'));
        }
      } else {
        wc_add_notice(GiroCheckout_SDK_ResponseCode_helper::getMessage($request->getResponseParam('rc'), $this->lang), 'error');
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
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   * @return none
   */
  public function check_response()
  {
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
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   */
  public function do_gc_redirect()
  {
    global $woocommerce;

    $password = $this->get_option('password');

    try {
      $notify = new GiroCheckout_SDK_Notify('creditCardTransaction');
      $notify->setSecret(trim((string)$password));
      $notify->parseNotification($_GET);

      if ($this->alternativenumorders) {
        $iOrderId = GiroCheckout_Utility::get_order_id_by_order_number( $notify->getResponseParam('gcMerchantTxId') );
      } else {
        $iOrderId = $notify->getResponseParam('gcMerchantTxId');
      }

      $order = new WC_Order( $iOrderId );
      $paymentMsg = GiroCheckout_SDK_ResponseCode_helper::getMessage($notify->getResponseParam('gcResultPayment'), $this->lang);
      $bPaymentSuccess = $notify->paymentSuccessful();
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

        if ($bPaymentSuccess) {
          $order->payment_complete();
          // Remove cart
          $woocommerce->cart->empty_cart();
        } else {
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
    } catch (Exception $e) {
      $order = new WC_Order($notify->getResponseParam('gcMerchantTxId'));
      $order->add_order_note($e->getMessage());
      $order->update_status('failed');
    }

    wp_redirect($urlRedirect);
  }

  /**
   * Place to notify to the shop of payment of this Web Giropay transfer.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @access public
   */
  public function do_gc_notify()
  {
    global $woocommerce;

    $password = $this->get_option('password');

    try {
      $notify = new GiroCheckout_SDK_Notify('creditCardTransaction');
      $notify->setSecret(trim((string)$password));
      $notify->parseNotification($_GET);


      if ($this->alternativenumorders) {
        $iOrderId = GiroCheckout_Utility::get_order_id_by_order_number($notify->getResponseParam('gcMerchantTxId'));
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
        $notify->setNotifyResponseParam('ErrorMessage', "Order $iOrderId already had state=" . $order->get_status());
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
    } catch (Exception $e) {
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

  /**
   * Get the extended logo for creditcards.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2014, GiroSolution AG
   * @return string
   */
  public function getExtendedLogo()
  {
    $visa_msc = $this->UseVisaMaster;
    $amex = $this->UseAMEX;
    $jcb = $this->UseJCB;

    if (!$visa_msc && !$amex && !$jcb)
      $visa_msc = true;

    return GiroCheckout_SDK_Tools::getCreditCardLogoName($visa_msc, $amex, $jcb);
  }

  /**
   * Refund a charge
   * @param  int $order_id
   * @param  float $amount
   * @param  string $reason
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2014, GiroSolution AG
   * @return  boolean True or false based on success, or a WP_Error object
   */

  public function process_refund($order_id, $amount = null, $reason = '')
  {
    $order = new WC_Order($order_id);

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
    $currency = get_woocommerce_currency();

    // Do your refund here. Refund $amount for the order with ID $order_id
    try {
      $strRef = get_post_meta($order_id, '_girocheckout_reference', true);
      $strRefCapture = get_post_meta($order_id, '_girocheckout_reference_capture', true);

      if( isset($strRefCapture) && strlen($strRefCapture) > 0 )
        $strReference = $strRefCapture;
      else
        $strReference = $strRef;

      $request = new GiroCheckout_SDK_Request('creditCardRefund');
      $request->setSecret($password);
      $request->addParam('merchantId', $merchantId)
        ->addParam('projectId', $projectId)
        ->addParam('merchantTxId', $order_id)
        ->addParam('amount', round($amount * 100))
        ->addParam('currency', $currency)
        ->addParam('reference', $strReference)
        ->submit();

      /* if the transaction did not succeed update your local system, get the responsecode and notify the customer */
      if (!$request->requestHasSucceeded()) {
        return false;
      }
    } catch (Exception $e) {
      return false;
    }

    return true;
  }

  /**
   * Capture payment when the order is changed from on-hold to complete or processing
   *
   * @param  int $order_id
   */
  public function capture_payment( $order_id )
  {
    $order = wc_get_order($order_id);
    $transactiontype = $this->get_option('transactiontype');
    $statuscapture = $this->get_option('statuscapture');
    $currency = get_woocommerce_currency();
    $amount = $order->get_total();
    $strReference = get_post_meta($order_id, '_girocheckout_reference', true);
    $statusOrder = "wc-".$order->get_status();

    if (!empty($strReference) && $order->payment_method == 'gc_creditcard' && $transactiontype == 'authorize' &&
        $statuscapture == $statusOrder) {
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
        $request = new GiroCheckout_SDK_Request('creditCardCapture');
        $request->setSecret($password);
        $request->addParam('merchantId', $merchantId)
                ->addParam('projectId', $projectId)
                ->addParam('merchantTxId', $order_id)
                ->addParam('amount', round($amount * 100))
                ->addParam('currency', $currency)
                ->addParam('reference', $strReference)
                ->submit();

        /* if transaction succeeded update your local system and redirect the customer */
        if ($request->requestHasSucceeded()) {
          $order->add_order_note(sprintf(__('Payment of %1$s was captured - Ref. ID: %2$s', 'woocommerce'), $order_id, $strReference));
          // Store the capture payment reference
          // Add the girocheckout transaction Id value to the order
          if (!add_post_meta($order_id, '_girocheckout_reference_capture', $request->getResponseParam('reference'), true)) {
            update_post_meta($order_id, '_girocheckout_reference_capture', $request->getResponseParam('reference'));
          }
        } /* if the transaction did not succeed update your local system, get the response message and notify the customer */
        else {
          $order->add_order_note(sprintf(__('Payment could not captured: %s', 'woocommerce'), $request->getResponseMessage($request->getResponseParam('rc'), 'DE')));
        }
      } catch (Exception $e) {
      }
    }
  }
}
