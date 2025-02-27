<?php
/**
 * Helper class which manages texts and plugin and shop versions.
 *
 * @package GiroCheckout
 */
define('__GIROCHECKOUT_TRANTYP_AUTH', 'AUTH');
define('__GIROCHECKOUT_TRANTYP_SALE', 'SALE');

class GiroCheckout_Utility {

  /**
   * Returns plugin version.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @return string
   */
  public static function getVersion() {
    return '4.1.9';
  }

  /**
   * Returns plugin and shop version.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2015, GiroSolution AG
   * @return string
   */
  public static function getGcSource() {
    return "WooCommerce " . WOOCOMMERCE_VERSION . ";WooCommerce Plugin " . self::getVersion();
  }
  
  

  /**
   * Get the payment purpose.
   *
   * @author GiroSolution AG
   * @package GiroCheckout
   * @copyright Copyright (c) 2014, GiroSolution AG
   * @return string
   */
  public static function getPurpose($p_strPurpose,$p_oOrder) {
    if( empty($p_strPurpose) ) {
      $strPurpose = "Best. {ORDERID}, {CUSTOMERNAME}";
    }
    else {
      $strPurpose = $p_strPurpose;
    }
    $strName = "";
    $strLastName = "";
    $strFirstName = "";  
    $strShopName = get_bloginfo('name');

    // For registered user
    if( is_user_logged_in() ) {
      $user_info = get_userdata( get_current_user_id() );
      $strName = $user_info->user_login;
      $strFirstName = $user_info->first_name;
      $strLastName = $user_info->last_name;
    }
    else {
      // For visitor
      $strFirstName = $p_oOrder->get_billing_first_name();
      $strLastName = $p_oOrder->get_billing_last_name();
      $strName = $strFirstName . " " .$strLastName;
    }

    if( method_exists($p_oOrder, 'get_id')) {
      $iOrderId = $p_oOrder->get_id();
    }
    else {
      $iOrderId = $p_oOrder->id;
    }

    $transaction_id = (string) apply_filters( 'woocommerce_order_number', $iOrderId, $p_oOrder );
    if( !empty($transaction_id) ) {
      $iOrderId = $transaction_id;
    }

    $strPurpose = str_replace( "{ORDERID}", $iOrderId, $strPurpose );
    $strPurpose = str_replace( "{CUSTOMERID}", get_current_user_id(), $strPurpose );
    $strPurpose = str_replace( "{SHOPNAME}", $strShopName, $strPurpose );
    $strPurpose = str_replace( "{CUSTOMERNAME}", $strName, $strPurpose );
    $strPurpose = str_replace( "{CUSTOMERFIRSTNAME}", $strFirstName, $strPurpose );
    $strPurpose = str_replace( "{CUSTOMERLASTNAME}", $strLastName, $strPurpose );

    $strPurposeNorm = Normalizer::normalize($strPurpose, Normalizer::FORM_C);
    $strPurposeNorm = mb_substr( $strPurposeNorm, 0, 27 );

    return $strPurposeNorm;
  }  

  public static function formatText($p_strText) {
    return mb_convert_encoding( $p_strText, "UTF-8" );
  }

  /**
   * Get order ID from custom order number.
   *
   * @param string $order_number Order number to search for
   * @return bool|integer Internal order ID or FALSE if not found.
   */
  public static function get_order_id_by_order_number( $order_number ) {

    if( ($order = wc_get_order($order_number)) != NULL ) {
      // Order_number is already valid internal id
      return $order_number;
    }

    $aOrders = wc_get_orders( array( 'limit' => -1 ) );
    foreach ( $aOrders as $order ) {
      if ( $order->get_order_number() == $order_number ) {
        return $order->get_id();
      }
    }
    return false;
  }

  public static function getOrderStatusInitial()
  {
    return 1;
  }

  public static function getOrderStatusRedirect()
  {
    return 2;
  }

  public static function getOrderStatusNotify()
  {
    return 3;
  }

  public static function getOrderStatusZero()
  {
    return 0;
  }

  public static function registerOrderStatus($orderId, $status)
  {
    global $wpdb;
    $table_name = $wpdb->prefix . 'girocheckout_orders_status';

    // save data to order notification status table
    $wpdb->query($wpdb->prepare('INSERT INTO '.$table_name.' (orderid, time, status) VALUES (%s,%s,%s)',
      array(
        $orderId,
        date('Y-m-d H:i:s', time()),
        $status
      )));
  }

  public static function updateOrderStatus($orderId, $status)
  {
    global $wpdb;
    $table_name = $wpdb->prefix . 'girocheckout_orders_status';

    $wpdb->query($wpdb->prepare('UPDATE '.$table_name.' SET status="%s"	WHERE orderid="%s"',
      array(
        $status,
        $orderId
      )));
  }

  public static function readOrderStatus($orderId)
  {
    global $wpdb;
    $table_name = $wpdb->prefix . 'girocheckout_orders_status';

    $orderStatus = $wpdb->get_results($wpdb->prepare('SELECT status FROM '.$table_name.' WHERE orderid="%s"',
      array(
        $orderId
      )),ARRAY_A);

    if (isset($orderStatus[0]['status'])) {
      return $orderStatus[0]['status'];
    } else {
      return self::getOrderStatusZero();
    }
  }
}