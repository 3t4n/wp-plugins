<?php
if (! defined('ABSPATH')) {
    die;
}
class aiogsc_Frame_Controller
{
    public function __construct()
    {
    }

    public function frame_request_order($order_id,$item_get_name,$item_get_quantity,$item_get_total,$product_price)
    {
        $google_order_mapping = get_option('aiogsc_google_order_mapping');
        $google_mapping_array = json_decode($google_order_mapping, true);
        $order = wc_get_order($order_id);
        $order_data = $order->get_data();
        $mapping = array();
        foreach ($google_mapping_array as $key=>$value) {
            if ($key == 'order_id') {
                $mapping[$value] = $order->get_id();
            }
            if ($key == 'order_total') {
                $mapping[$value] = $order->get_total();
            }
            if ($key == 'billing_first_name') {
                $mapping[$value] = $order->get_billing_first_name();
            }
            if ($key == 'billing_last_name') {
                $mapping[$value] = $order->get_billing_last_name();
            }
            if ($key == 'billing_company') {
                $mapping[$value] = $order->get_billing_company();
            }
            if ($key == 'billing_phone') {
                $mapping[$value] = $order->get_billing_phone();
            }
            if ($key == 'billing_address_1') {
                $mapping[$value] = $order->get_billing_address_1();
            }
            if ($key == 'billing_address_2') {
                $mapping[$value] = $order->get_billing_address_2();
            }
            if ($key == 'billing_postcode') {
                $mapping[$value] = $order->get_billing_postcode();
            }
            if ($key == 'billing_city') {
                $mapping[$value] = $order->get_billing_city();
            }
            if ($key == 'billing_state') {
                $mapping[$value] = $order->get_billing_state();
            }
            if ($key == 'billing_country') {
                $mapping[$value] = $order->get_billing_country();
            }
            if ($key == 'shipping_first_name') {
                $mapping[$value] = $order->get_shipping_first_name();
            }
            if ($key == 'shipping_last_name') {
                $mapping[$value] = $order->get_shipping_last_name();
            }
            if ($key == 'shipping_company') {
                $mapping[$value] = $order->get_shipping_company();
            }
            if ($key == 'shipping_phone') {
                $mapping[$value] = $order->get_shipping_phone();
            }
            if ($key == 'shipping_address_1') {
                $mapping[$value] = $order->get_shipping_address_1();
            }
            if ($key == 'shipping_address_2') {
                $mapping[$value] = $order->get_shipping_address_2();
            }
            if ($key == 'shipping_postcode') {
                $mapping[$value] = $order->get_shipping_postcode();
            }
            if ($key == 'shipping_city') {
                $mapping[$value] = $order->get_shipping_city();
            }
            if ($key == 'shipping_state') {
                $mapping[$value] = $order->get_shipping_state();
            }
            if ($key == 'shipping_country') {
                $mapping[$value] = $order->get_shipping_country();
            }
            if ($key == 'product_name') {
	            $mapping[$value] = $item_get_name;                      
             }
             if($key == 'quantity' ){
                $mapping[$value] = $item_get_quantity;
             }
             if($key == 'product_price'){
                $mapping[$value] = $product_price;
             }
           if ($key == 'shipment_method') {
                $mapping[$value] = $order->get_shipping_method();
            }
            if ($key == 'order_total') {
                $mapping[$value] = $order->get_total();
            }
            if ($key == 'sub_total') {
                $mapping[$value] = $order->get_subtotal();
            }
            if ($key == 'customer_name') {
                $mapping[$value] = $order->get_billing_first_name().' '.$order->get_billing_last_name();
            }
            if ($key == 'customer_email') {
                $mapping[$value] = $order->get_billing_email();
            }
            if ($key == 'payment_method') {
                $mapping[$value] = $order->get_payment_method();
            }
            if ($key == 'order_date') {
                $mapping[$value] = $order->get_date_created();
            }
            if ($key == 'status') {
                $mapping[$value] = $order->get_status();
            }
        }       
        return $mapping;
    }

    public function frame_request_customer($customer_id)
    {        
        $google_customer_mapping = get_option('aiogsc_google_customer_mapping');
        $google_mapping_array = json_decode($google_customer_mapping, true);
        $user = new WP_User($customer_id);
        $new_user = get_userdata($customer_id);
        $customer = new WC_Customer( $customer_id );
        $first_name = $customer->get_first_name();
        $mapping = array();        
       
        global $wpdb;
        foreach ($google_mapping_array as $key=>$value) {
            if ($key == 'user_name') {
                $mapping[$value] = $new_user->user_login;
            }
            if ($key == 'email') {
                $mapping[$value] = $new_user->user_email;
            }
            if ($key == 'first_name') {
                $mapping[$value] = get_user_meta($customer_id, 'first_name', true);               
            }
            if ($key == 'last_name') {
                $mapping[$value] = get_user_meta($customer_id, 'last_name', true);               
            }
            if ($key == 'display_name') {
                $mapping[$value] = $new_user->display_name;
            }
            if ($key == 'billing_first_name') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_first_name', true);
            }
            if ($key == 'billing_last_name') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_last_name', true);
            }
            if ($key == 'billing_company') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_company', true);
            }
            if ($key == 'billing_phone') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_phone', true);
            }
            if ($key == 'billing_address_1') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_address_1', true);
            }
            if ($key == 'billing_address_2') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_address_2', true);
            }
            if ($key == 'billing_postcode') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_postcode', true);
            }
            if ($key == 'billing_city') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_city', true);
            }
            if ($key == 'billing_state') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_state', true);
            }
            if ($key == 'billing_country') {
                $mapping[$value] = get_user_meta($customer_id, 'billing_country', true);
            }
            if ($key == 'shipping_first_name') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_first_name', true);
            }
            if ($key == 'shipping_last_name') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_last_name', true);
            }
            if ($key == 'shipping_company') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_company', true);
            }
            if ($key == 'shipping_phone') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_phone', true);
            }
            if ($key == 'shipping_address_1') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_address_1', true);
            }
            if ($key == 'shipping_address_2') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_address_2', true);
            }
            if ($key == 'shipping_postcode') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_postcode', true);
            }
            if ($key == 'shipping_city') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_city', true);
            }
            if ($key == 'shipping_state') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_state', true);
            }
            if ($key == 'shipping_country') {
                $mapping[$value] = get_user_meta($customer_id, 'shipping_country', true);
            }
        }
      
        return $mapping;
    }

    public function frame_request_order_notes($order_id)
    {
        $orderNotes =  wc_get_order_notes([
            'order_id' => $order_id,
            'type' => 'order',
        ]);
        $noteJson =array();
        foreach ($orderNotes as $orderNote) {
            $note = $orderNote->content;
            if (strpos($note, 'aiogsc_notes=') !== false) {
                $noteJson[] = $note;
            }
        }
        $data = array(
        'success' => false,
    );
        $notesCount = count($noteJson);
        if ($notesCount != 0) {
            $order_note = $noteJson[0];
            $removeNote = str_replace("aiogsc_notes=", "", $order_note);
            $decodeNote =  json_decode($removeNote, true);
            $data = array(
            'success' => true,
            'notes'   => $decodeNote,
        );
        }
        return $data;
    }

    public function frame_request_order_status()
    {
        $google_order_mapping = get_option('aiogsc_google_order_mapping');
        $google_mapping_array = json_decode($google_order_mapping, true);
        $data = array(
            'success' => false,
        );
        foreach ($google_mapping_array as $key=>$value) {
            if ($key == 'status') {
                $data = array(
                        'success' => true,
                );
            }
        }
        return $data;
    }

    public function syncOrderItemsBased($order_id,$google_order_sheetid)
    {
        $api = new aiogsc_Api_Controller();
	$order = wc_get_order($order_id);
	$api_insert = '';
	    foreach ($order->get_items() as $item_id => $item) {
	    	    $item_get_name = $item->get_name();
	    	    $item_get_quantity = $item->get_quantity();
	    	    $item_get_total = $item->get_total();
		    $frame_request = $this->frame_request_order($order_id,$item_get_name,$item_get_quantity,$item_get_total,$product_price);
	    	    $api_insert = $api->insert_order($frame_request, $google_order_sheetid);
	    }
	return $api_insert;
    }
}
