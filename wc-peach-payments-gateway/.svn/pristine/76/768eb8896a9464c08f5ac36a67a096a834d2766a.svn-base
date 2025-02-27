<?php
/**
 * Class SampleTest
 *
 * @package Wc_Peach_Payments_Gateway
 */

/**
 * Sample test case.
 */

class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	public function test_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}



	/**
	 * Function : peachnew_get_order_id_valid() 
	 * @param order array $order	 
	 * @return order id  
	*/
	public function peachnew_get_order_id_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		 $order_data = array(
		 	   'id' => 1,
				'customer_id' => 5,
				'first_name' => 'Zakup',
				'last_name'  => 'Sklepowy',
				'email'      => 'test@test.pl',
				'phone'      => '123',
				'address_1'  => 'ul. Przykladowa 1',
				'address_2'  => 'm. 2',
				'city'       => 'Wroclaw',
				'postcode'   => '50-123',
				'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$status = $this->class_instance->get_token_status($order);
		$this->assertEquals(1, $status);

	}

	/**
	 * Function : peachnew_get_order_id_invalid() 
	 * @param order array $order without order id 	 
	 * @return order id balnk 
	*/
	public function peachnew_get_order_id_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		 $order_data = array(
		 	  'customer_id' => 5,
		      'first_name' => 'Zakup',
		      'last_name'  => 'Sklepowy',
		      'email'      => 'test@test.pl',
		      'phone'      => '123',
		      'address_1'  => 'ul. Przykladowa 1',
		      'address_2'  => 'm. 2',
		      'city'       => 'Wroclaw',
		      'postcode'   => '50-123',
		      'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$parsed_response = $this->class_instance->get_token_status($order);
		

		$this->assertEquals(1, $parsed_response);

	}


	/**
	 * Function : peachnew_get_customer_id_invalid() 
	 * @param order array $order  
	 * @return customer_id 
	*/
	public function peachnew_get_customer_id_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		 $order_data = array(
		 		'id'=>1,
				'customer_id' => 5,
				'first_name' => 'Zakup',
				'last_name'  => 'Sklepowy',
				'email'      => 'test@test.pl',
				'phone'      => '123',
				'address_1'  => 'ul. Przykladowa 1',
				'address_2'  => 'm. 2',
				'city'       => 'Wroclaw',
				'postcode'   => '50-123',
				'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$status = $this->class_instance->get_customer_id($order);
		$this->assertEquals(5, $status);

	}

	/**
	 * Function : peachnew_get_customer_id_invalid() 
	 * @param order array $order without customer id 
	 * @return through error
	*/
	public function peachnew_get_customer_id_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		 $order_data = array(
		 		'id'=>1,
				'first_name' => 'Zakup',
				'last_name'  => 'Sklepowy',
				'email'      => 'test@test.pl',
				'phone'      => '123',
				'address_1'  => 'ul. Przykladowa 1',
				'address_2'  => 'm. 2',
				'city'       => 'Wroclaw',
				'postcode'   => '50-123',
				'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$status = $this->class_instance->get_customer_id($order);
		$this->assertEquals($order, $status);

	}

	/**
	 * Function : peachnew_get_customer_id_invalid() 
	 * @param $order
	 * @return array of order data 
	*/
	/*public function peachnew_get_item_product_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array(
			'id'=>1,
			'first_name' => 'Zakup',
			'last_name'  => 'Sklepowy',
			'email'      => 'test@test.pl',
			'phone'      => '123',
			'address_1'  => 'ul. Przykladowa 1',
			'address_2'  => 'm. 2',
			'city'       => 'Wroclaw',
			'postcode'   => '50-123',
			'total' =>8,
		  );
		$parent_id = 746; // Or get the variable product id dynamically

			// The variation data
		$variation_data =  array(
			'attributes' => array(
				'size'  => 'M',
				'color' => 'Green',
			    ),
			'sku'           => '',
			'regular_price' => '22.00',
			'sale_price'    => '',
			'stock_qty'     => 10,
			);

		// The function to be run
		$product_data =  create_product_variation( $parent_id, $variation_data );
		$order_merge_data = array_merge($order_data, $product_data)
		$order = wc_create_order($order_merge_data);
		$status = $this->class_instance->get_item_product($order);
		$this->assertEquals($order, $status);

	}*/


	/**
	 * Function : peachnew_get_customer_id_invalid() 
	 * @param $order(balnk order data)
	 * @return through error
	*/
	public function peachnew_get_item_product_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array( );
		$order = wc_create_order($order_data);
		$status = $this->class_instance->get_item_product($order);
		$this->assertEquals(5, $status);

	}

	/**
	 * Function : peachnew_get_customer_id_invalid() 
	 * @param $order
	 * @return value of $prop
	*/
	public function peachnew_get_order_prop_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array(
		 		'id' =>1,
				'customer_id' => 5,
				'first_name' => 'Zakup',
				'last_name'  => 'Sklepowy',
				'email'      => 'test@test.pl',
				'phone'      => '123',
				'address_1'  => 'ul. Przykladowa 1',
				'address_2'  => 'm. 2',
				'city'       => 'Wroclaw',
				'postcode'   => '50-123',
				'total' =>8,
		  );
		/*$order->set_address( $address, 'billing' );
    	$order->set_address( $address, 'shipping' );
		$order->calculate_totals();
*/
		update_post_meta( $order->id, '_payment_method', 'ideal' );
    	update_post_meta( $order->id, '_payment_method_title', 'iDeal' );
		$order = wc_create_order($order_data);
		$prop = 'first_name';
		print_r($order);
		$status = $this->class_instance->get_item_product($order, $prop);
		$this->assertEquals('Zakup', $status);

	}


	/**
	 * Function : peachnew_get_customer_id_invalid() 
	 * @param $order(without first name)
	 * @return through error
	*/
	public function peachnew_get_order_prop_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array(
		 		'id' =>1,
				'customer_id' => 5,
				'last_name'  => 'Sklepowy',
				'email'      => 'test@test.pl',
				'phone'      => '123',
				'address_1'  => 'ul. Przykladowa 1',
				'address_2'  => 'm. 2',
				'city'       => 'Wroclaw',
				'postcode'   => '50-123',
				'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$order->set_address( $address, 'billing' );
    	$order->set_address( $address, 'shipping' );
		$order->calculate_totals();
		update_post_meta( $order->id, '_payment_method', 'ideal' );
    	update_post_meta( $order->id, '_payment_method_title', 'iDeal' );
		$prop = 'first_name';
		$status = $this->class_instance->get_item_product($order, $prop);
		$this->assertEquals('Zakup', $status);

	}
	
	/**
	 * Function : peachnew_generate_token_valid() 
	 * @param $request
	 * @return successfully processed
	*/
	public function peachnew_generate_token_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_request = array(
						'customParameters[PAYMENT_PLUGIN]'	=> 'WORDPRESS',
			     		'merchantTransactionId'				=> 1957,
			     		'customer.merchantCustomerId'		=> 5,
			     		'customer.givenName'				=> 'test',				     	       		
				     	'billing.street1'					=> 'test',        		
				        'billing.postcode'					=> '111111',
				        'billing.city'						=> 'test',        		
				        'billing.state'						=> 'test',
				        'billing.country'					=> 'IN',				        
				        'customer.email'					=> 'test@peachpayments.com',
				        'customer.ip'						=> '122.176.93.157'
			     		);
		$payment_request = array(
						'paymentType'						=> 'DB',
						'merchantInvoiceId'					=> 'Order 4',
			     		'amount'							=> 14,
				      	'currency'							=> get_option( 'woocommerce_currency' ) 
				      	);
		$request = array_merge( $payment_request, $order_request );
		$request['authentication.entityId'] = '8a8294174e735d0c014e78cf26461790';
		$status = $this->class_instance->generate_token_header($request);
		$parsed_response = json_decode( $status['body'] );
		//print_r($parsed_response);
		$this->assertEquals('"Request successfully processed in Merchant in Integrator Test Mode', $status['desc']);
	    }

	/**
	 * Function : peachnew_generate_token_invalid() 
	 * @param $order(without authentication.entityId)
	 * @return through error
	*/
	public function peachnew_generate_token_not_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_request = array(
						'customParameters[PAYMENT_PLUGIN]'	=> 'WORDPRESS',
			     		'merchantTransactionId'				=> 1957,
			     		'customer.merchantCustomerId'		=> 5,
			     		'customer.givenName'				=> 'test',				     	       		
				     	'billing.street1'					=> 'test',        		
				        'billing.postcode'					=> '111111',
				        'billing.city'						=> 'test',        		
				        'billing.state'						=> 'test',
				        'billing.country'					=> 'IN',				        
				        'customer.email'					=> 'test@peachpayments.com',
				        'customer.ip'						=> '122.176.93.157'
			     		);
		$payment_request = array(
						'paymentType'						=> 'DB',
						'merchantInvoiceId'					=> 'Order 4',
			     		'amount'							=> 14,
				      	'currency'							=> get_option( 'woocommerce_currency' ) 
				      	);
		$request = array_merge( $payment_request, $order_request );
		$request['authentication.entityId'] ='';
		$status = $this->class_instance->generate_token_header($request);
		$this->assertEquals('"Request successfully processed in Merchant in Integrator Test Mode', $status['desc']);
	    }


	 /**
	 * Function : peachnew_generate_token_heade_valid() 
	 * @param $request
	 * @return successfully processed
	*/
	public function peachnew_generate_token_heade_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_request = array(
						'customParameters[PAYMENT_PLUGIN]'	=> 'WORDPRESS',
			     		'merchantTransactionId'				=> 1957,
			     		'customer.merchantCustomerId'		=> 5,
			     		'customer.givenName'				=> 'test',				     	       		
				     	'billing.street1'					=> 'test',        		
				        'billing.postcode'					=> '111111',
				        'billing.city'						=> 'test',        		
				        'billing.state'						=> 'test',
				        'billing.country'					=> 'IN',				        
				        'customer.email'					=> 'test@peachpayments.com',
				        'customer.ip'						=> '122.176.93.157'
			     		);
		$payment_request = array(
						'paymentType'						=> 'DB',
						'merchantInvoiceId'					=> 'Order 4',
			     		'amount'							=> 14,
				      	'currency'							=> get_option( 'woocommerce_currency' ) 
				      	);
		$request = array_merge( $payment_request, $order_request );
		$request['authentication.entityId'] = '8a8294174e735d0c014e78cf26461790';
		$status = $this->class_instance->generate_token_header($request);
		$this->assertEquals('"Request successfully processed in Merchant in Integrator Test Mode', $status['desc']);
	}

	/**
	 * Function : peachnew_generate_token_heade_invalid() 
	 * @param $order(without authentication.entityId)
	 * @return through error
	*/
	public function peachnew_generate_token_heade_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_request = array(
						'customParameters[PAYMENT_PLUGIN]'	=> 'WORDPRESS',
			     		'merchantTransactionId'				=> 1957,
			     		'customer.merchantCustomerId'		=> 5,
			     		'customer.givenName'				=> 'test',				     	       		
				     	'billing.street1'					=> 'test',        		
				        'billing.postcode'					=> '111111',
				        'billing.city'						=> 'test',        		
				        'billing.state'						=> 'test',
				        'billing.country'					=> 'IN',				        
				        'customer.email'					=> 'test@peachpayments.com',
				        'customer.ip'						=> '122.176.93.157'
			     		);
		$payment_request = array(
						'paymentType'						=> 'DB',
						'merchantInvoiceId'					=> 'Order 4',
			     		'amount'							=> 14,
				      	'currency'							=> get_option( 'woocommerce_currency' ) 
				      	);
		$request = array_merge( $payment_request, $order_request );
		$request['authentication.entityId'] ='';
		$status = $this->class_instance->generate_token_header($request);
		$this->assertEquals('"Request successfully processed in Merchant in Integrator Test Mode', $status['desc']);
	}


	 /**
	 * Function : peachnew_generate_token_heade_valid() 
	 * @param $order, $amount, $payment_method_id
	 * @return URL(http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK)
	*/
	public function peachnew_execute_post_payment_request_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array(
		 	  'id' =>1,
		 	  'customer_id' => 5,
		      'last_name'  => 'Sklepowy',
		      'email'      => 'test@test.pl',
		      'phone'      => '123',
		      'address_1'  => 'ul. Przykladowa 1',
		      'address_2'  => 'm. 2',
		      'city'       => 'Wroclaw',
		      'postcode'   => '50-123',
		      'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$amount =12;
		$payment_method_id ='8ac7a4a16f3ba39d016f46aaf0551714';
		$parsed_response = $this->class_instance->execute_post_payment_request($order, $amount, $payment_method_id);

		//print_r($status);
		$this->assertEquals('http://example.org?order-received=5&key=wc_order_b5nfQRcePOFvW&registered_payment=NOK', $parsed_response->result->description);
	    }


	/**
	 * Function : peachnew_generate_token_heade_Invalid() 
	 * @param $order, $amount(without registration ID)
	 * @return URL(http://example.org/?order-received=5&%20key=wc_order_uOBJ7ektGogjJ&%20registered_payment=NOK)
	*/
	public function peachnew_execute_post_payment_request_not_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array(
		 	  'id' =>1,
		 	  'customer_id' => 5,
		      'last_name'  => 'Sklepowy',
		      'email'      => 'test@test.pl',
		      'phone'      => '123',
		      'address_1'  => 'ul. Przykladowa 1',
		      'address_2'  => 'm. 2',
		      'city'       => 'Wroclaw',
		      'postcode'   => '50-123',
		      'total' =>8,
		  );
		$order = wc_create_order($order_data);
		$amount =12;
		$payment_method_id ='8ac7a4a16f3ba39d016f46aaf0551714';
		$parsed_response = $this->class_instance->execute_post_payment_request($order, $amount, $payment_method_id);
		$this->assertEquals('invalid authentication information', $parsed_response->result->description);
	    }

	/**
	 * Function : peachnew_get_token_status_valid() 
	 * @param $checkout_id(with checkout id)
	 * @return status 'transaction pending'
	*/
	public function peachnew_get_token_status_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_request = array(
						'customParameters[PAYMENT_PLUGIN]'	=> 'WORDPRESS',
			     		'merchantTransactionId'				=> 1957,
			     		'customer.merchantCustomerId'		=> 5,
			     		'customer.givenName'				=> 'test',				     	       		
				     	'billing.street1'					=> 'test',        		
				        'billing.postcode'					=> '111111',
				        'billing.city'						=> 'test',        		
				        'billing.state'						=> 'test',
				        'billing.country'					=> 'IN',				        
				        'customer.email'					=> 'test@peachpayments.com',
				        'customer.ip'						=> '122.176.93.157'
			     		);
		$payment_request = array(
						'paymentType'						=> 'DB',
						'merchantInvoiceId'					=> 'Order 4',
			     		'amount'							=> 14,
				      	'currency'							=> get_option( 'woocommerce_currency' ) 
				      	);
		$checkout_id = $this->class_instance->generate_token_header($request);
		$status = $this->class_instance->generate_token_header($checkout_id['id']);
		$this->assertEquals('transaction pending', $status['result']['description']);
	}


	/**
	 * Function : peachnew_get_token_status_invalid() 
	 * @param $checkout_id(without checkout id)
	 * @return through error
	*/
	public function peachnew_get_token_status_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_request = array(
						'customParameters[PAYMENT_PLUGIN]'	=> 'WORDPRESS',
			     		'merchantTransactionId'				=> 1957,
			     		'customer.merchantCustomerId'		=> 5,
			     		'customer.givenName'				=> 'test',				     	       		
				     	'billing.street1'					=> 'test',        		
				        'billing.postcode'					=> '111111',
				        'billing.city'						=> 'test',        		
				        'billing.state'						=> 'test',
				        'billing.country'					=> 'IN',				        
				        'customer.email'					=> 'test@peachpayments.com',
				        'customer.ip'						=> '122.176.93.157'
			     		);
		$payment_request = array(
						'paymentType'						=> 'DB',
						'merchantInvoiceId'					=> 'Order 4',
			     		'amount'							=> 14,
				      	'currency'							=> get_option( 'woocommerce_currency' ) 
				      	);
		$checkout_id = $this->class_instance->generate_token_header($request);
		$status = $this->class_instance->generate_token_header($checkout_id['id']);
		$this->assertEquals('transaction pending', $status['result']['description']);
	}

}
