<?php

//require __DIR__ . '../../inc/twilio-php-master/Twilio/autoload.php';
//use Twilio\Rest\Client;
function cspd_wc_msg_order_processing( $order_id ){
   $order = new WC_Order($order_id);
   $order_phone = $order->get_billing_phone();
   $total_order = $order->get_total();
   $order_currency = $order->get_currency();
   $order_country_code = $order->get_billing_country();
   include 'phone_code.php';
   
   $site_name = get_bloginfo( 'name' );
   
   $checkadminsms = get_option('process_sendadmin_check');
   $checkcustsms = get_option('process_sendcust_check');
   
   	//Message to Customer
	if ($checkcustsms == "checked") {
    //$msgtocustomer = str_replace("ORDER_ID",$order_id,get_option('sms_to_cust'));
	 $orderid_rep_cust = str_replace("ORDER_ID",$order_id,get_option('process_msgtxt_cust', 'You have just order on SITE_NAME of ORDER_TOTAL ORDER_CURRENCY. Your Order ID ORDER_ID.'));
	 $ordertotal_rep_cust = str_replace("ORDER_TOTAL",$total_order,$orderid_rep_cust);
	 $sitename_rep_cust = str_replace("SITE_NAME",$site_name,$ordertotal_rep_cust);
	 $msgtocustomer = str_replace("ORDER_CURRENCY",$order_currency,$sitename_rep_cust);
	 
                
                $sid = get_option('msg_api_key');
                $token = get_option('msg_token');
                send_twilio_text_msg(
                     $sid,
                     $token,
                     get_option('sender_phone_no'),
                     $phone_code.$order_phone,
                     $msgtocustomer
                  );

	}
   
   //Message to admin
   if ($checkadminsms == "checked") {
	 $orderid_rep_admin = str_replace("ORDER_ID",$order_id,get_option('process_msgtxt_admin', 'You have got an order of ORDER_TOTAL ORDER_CURRENCY is under processing on SITE_NAME. Order ID ORDER_ID.'));
	 $ordertotal_rep_admin = str_replace("ORDER_TOTAL",$total_order,$orderid_rep_admin);
	 $sitename_rep_admin = str_replace("SITE_NAME",$site_name,$ordertotal_rep_admin);
	 $msgtoadmin = str_replace("ORDER_CURRENCY",$order_currency,$sitename_rep_admin);
	
                $sid = get_option('msg_api_key');
                $token = get_option('msg_token');
                send_twilio_text_msg(
                     $sid,
                     $token,
                     get_option('sender_phone_no'),
                     get_option('admin_phone_number'),
                     $msgtoadmin
                  );

   }

   }
?>