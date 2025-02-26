<?php

/**
 * @package Konfirmi Plugin
 */

namespace Konfirmi\Base\Forms;

use WC_Order;
use \Konfirmi\Base\FormController;

class WooCommerceFrom extends FormController
{
	public function register(){
		add_action('woocommerce_thankyou', function ($order_id){
			$order = new WC_Order( $order_id ); 

			$email = $order->billing_email;
			$phone = $order->billing_phone;
			$shipping_type = $order->get_shipping_method();
			$shipping_cost = $order->get_total_shipping();

			// set the address fields
			$user_id = $order->user_id;
			$address_fields = array('country',
				'title',
				'first_name',
				'last_name',
				'company',
				'address_1',
				'address_2',
				'address_3',
				'address_4',
				'city',
				'state',
				'postcode');

			$address = array();
			if(is_array($address_fields)){
				foreach($address_fields as $field){
					$address['billing_'.$field] = get_user_meta( $user_id, 'billing_'.$field, true );
					$address['shipping_'.$field] = get_user_meta( $user_id, 'shipping_'.$field, true );
				}
			}

			// get coupon information (if applicable)
			$cps = array();
			$cps = $order->get_items( 'coupon' );
			
			$coupon = array();
			foreach($cps as $cp){
				// get coupon titles (and additional details if accepted by the API)
				$coupon[] = $cp['name'];
			}
			
			// get product details
			$items = $order->get_items();
			
			$item_name = array();
			$item_qty = array();
			$item_price = array();
			$item_sku = array();
				
			foreach( $items as $key => $item){
				$item_name[] = $item['name'];
				$item_qty[] = $item['qty'];
				$item_price[] = $item['line_total'];
				
				$item_id = $item['product_id'];
				$product = new WC_Product($item_id);
				$item_sku[] = $product->get_sku();
			}
			
			/* for online payments, send across the transaction ID/key. If the payment is handled offline, you could send across the order key instead */
			$transaction_key = get_post_meta( $order_id, '_transaction_id', true );
			$transaction_key = empty($transaction_key)
				? sanitize_text_field($_GET['key'])
				: $transaction_key;   
			
			// set the username and password
			$api_username = 'testuser';
			$api_password = 'testpass';

			// to test out the API, set $api_mode as ‘sandbox’
			$api_mode = 'sandbox';
			if($api_mode == 'sandbox'){
				// sandbox URL example
				$endpoint = "http://sandbox.example.com/"; 
			}
			else{
				// production URL example
				$endpoint = "http://example.com/"; 
			}

			// setup the data which has to be sent
			$data = array(
				'apiuser' => $api_username,
				'apipass' => $api_password,
				'customer_email' => $email,
				'customer_phone' => $phone,
				'bill_firstname' => $address['billing_first_name'],
				'bill_surname' => $address['billing_last_name'],
				'bill_address1' => $address['billing_address_1'],
				'bill_address2' => $address['billing_address_2'],
				'bill_city' => $address['billing_city'],
				'bill_state' => $address['billing_state'],
				'bill_zip' => $address['billing_postcode'],
				'ship_firstname' => $address['shipping_first_name'],
				'ship_surname' => $address['shipping_last_name'],
				'ship_address1' => $address['shipping_address_1'],
				'ship_address2' => $address['shipping_address_2'],
				'ship_city' => $address['shipping_city'],
				'ship_state' => $address['shipping_state'],
				'ship_zip' => $address['shipping_postcode'],
				'shipping_type' => $shipping_type,
				'shipping_cost' => $shipping_cost,
				'item_sku' => implode(',', $item_sku), 
				'item_price' => implode(',', $item_price), 
				'quantity' => implode(',', $item_qty), 
				'transaction_key' => $transaction_key,
				'coupon_code' => implode( ",", $coupon )
			);
			var_dump($data);
		});
	}
}