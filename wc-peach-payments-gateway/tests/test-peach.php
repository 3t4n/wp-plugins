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
	public function sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}

	/**
	 * Function : get_order_id_valid() 
	 * @param order array $order	 
	 * @return order id  
	*/
	public function get_order_id_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce, $post;
		$id=7;
		$order = wc_get_order($id);
		$status = $this->class_instance->get_order_id($order);
		$this->assertEquals(5, $status);

	}

	/**
	 * Function : get_order_id_invalid() 
	 * @param order array $order without order id 	 
	 * @return order id balnk 
	*/
	public function get_order_id_invalid() {
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
		$status = $this->class_instance->get_order_id($order);
		$this->assertEquals(1, $status);

	}


	/**
	 * Function : get_customer_id_invalid() 
	 * @param order array $order  
	 * @return customer_id 
	*/
	public function get_customer_id_valid() {
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
	 * Function : get_customer_id_invalid() 
	 * @param order array $order without customer id 
	 * @return through error
	*/
	public function get_customer_id_invalid() {
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
		$this->assertEquals(5, $status);

	}

	/**
	 * Function : get_customer_id_invalid() 
	 * @param $order
	 * @return array of order data 
	*/
	public function get_item_product_valid() {
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
		$order_merge_data = array_merge($order_data, $product_data);
		$order = wc_create_order($order_merge_data);
		$status = $this->class_instance->get_item_product($order);
		$this->assertEquals($order, $status);

	}


	/**
	 * Function : get_customer_id_invalid() 
	 * @param $order(balnk order data)
	 * @return through error
	*/
	public function get_item_product_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = array( );
		$order = wc_create_order($order_data);
		$status = $this->class_instance->get_item_product($order);
		$this->assertEquals(5, $status);

	}

	/**
	 * Function : get_customer_id_invalid() 
	 * @param $order
	 * @return value of $prop
	*/
	public function get_order_prop_valid() {
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
		$order->set_address( $address, 'billing' );
    	$order->set_address( $address, 'shipping' );
		$order->calculate_totals();
		update_post_meta( $order->id, '_payment_method', 'ideal' );
    	update_post_meta( $order->id, '_payment_method_title', 'iDeal' );
		$order = wc_create_order($order_data);
		$prop = 'first_name';
		$status = $this->class_instance->get_item_product($order, $prop);
		$this->assertEquals('Zakup', $status);

	}


	/**
	 * Function : get_customer_id_invalid() 
	 * @param $order(without first name)
	 * @return through error
	*/
	public function get_order_prop_invalid() {
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
	 * Function : generate_token_valid() 
	 * @param $request
	 * @return successfully processed
	*/
	public function generate_token_valid() {
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
	 * Function : generate_token_invalid() 
	 * @param $order(without authentication.entityId)
	 * @return through error
	*/
	public function generate_token_invalid() {
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
	 * Function : generate_token_heade_valid() 
	 * @param $request
	 * @return successfully processed
	*/
	public function generate_token_heade_valid() {
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
		$this->assertEquals('Request successfully processed in Merchant in Integrator Test Mode', $status['desc']);
	}

	/**
	 * Function : generate_token_heade_invalid() 
	 * @param $order(without authentication.entityId)
	 * @return through error
	*/
	public function generate_token_heade_invalid() {
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
	 * Function : generate_token_heade_valid() 
	 * @param $order, $amount, $payment_method_id
	 * @return URL(http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK)
	*/
	public function execute_post_payment_request_valid() {
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
		$status = $this->class_instance->execute_post_payment_request($order, $amount, $payment_method_id);
		$this->assertEquals('http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);
	    }


	/**
	 * Function : generate_token_heade_Invalid() 
	 * @param $order, $amount(without registration ID)
	 * @return URL(http://example.org/?order-received=5&%20key=wc_order_uOBJ7ektGogjJ&%20registered_payment=NOK)
	*/
	public function execute_post_payment_request_invalid() {
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
		$status = $this->class_instance->execute_post_payment_request($order, $amount, $payment_method_id);
		$this->assertEquals('http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);
	    }

	/**
	 * Function : get_token_status_valid() 
	 * @param $checkout_id(with checkout id)
	 * @return status 'transaction pending'
	*/
	public function get_token_status_valid() {
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
	 * Function : get_token_status_invalid() 
	 * @param $checkout_id(without checkout id)
	 * @return through error
	*/
	public function get_token_status_invalid() {
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


	public function pp_remote_post_data_valid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$url = 'https://test.oppwa.com/v1/registrations/8ac7a4a16f3ba39d016f46aaf0551714/payments';
		$request['authentication.entityId'] = '8a8294174e735d0c014e78cf26461790';
		$request['paymentType'] = 5;
		$request['merchantTransactionId'] = 5;
		$request['customer.merchantCustomerId'] = 5;
		$request['merchantInvoiceId'] = 'Order';
		$request['amount'] = 12;
		$request['currency'] = 'GBP';
		$request['shopperResultUrl'] = 'http://example.org/?wc-api=WC_Peach_Payments';
		$request['recurringType'] = 'REPEATED';
		$headers= 'BEARER OGE4Mjk0MTc0ZTczNWQwYzAxNGU3OGNmMjY2YjE3OTR8cXl5ZkhDTjgzZQ==';
		$status = $this->class_instance->pp_remote_post_data($url=$url, $request=$request, $headers=$headers);
		print_r($status);
		$this->assertEquals('Successfully Updated', $status['result'][0]);
	}

	public function pp_remote_post_data_in_invalid() {
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$url = 'https://test.oppwa.com/v1/registrations/8ac7a4a16f3ba39d016f46aaf0551714/payments';
		$request['authentication.entityId'] = '';
		$request['paymentType'] = 5;
		$request['merchantTransactionId'] = 5;
		$request['customer.merchantCustomerId'] = 5;
		$request['merchantInvoiceId'] = 'Order';
		$request['amount'] = 12;
		$request['currency'] = 'GBP';
		$request['shopperResultUrl'] = 'http://example.org/?wc-api=WC_Peach_Payments';
		$request['recurringType'] = 'REPEATED';
		$headers= 'BEARER OGE4Mjk0MTc0ZTczNWQwYzAxNGU3OGNmMjY2YjE3OTR8cXl5ZkhDTjgzZQ==';
		$status = $this->class_instance->pp_remote_post_data($url=$url, $request=$request, $headers=$headers);
		$this->assertEquals('Successfully Updated', $status['result'][0]);
	}

	public function all_constants() {		

		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		//definePeachPaymentConstants

		$this->assertEquals('https://test.oppwa.com/',PEACHPAYMENT_PAYMENT_GATEWAY_URL);
		$this->assertEquals('100.150.200',PEACHPAYMENT_REGISTRATION_NOT_EXISTS);
		$this->assertEquals('100.150.201',PEACHPAYMENT_REGISTRATION_NOT_CONFIRMED);
		$this->assertEquals('100.150.203',PEACHPAYMENT_REGISTRATION_NOT_VALID);
		$this->assertEquals('100.150.202',PEACHPAYMENT_REGISTRATION_DEREGISTERED);
		$this->assertEquals('/^(000\.400\.0[^3]|000\.400\.100)/',PEACHPAYMENT_REQUEST_SUCCESSFULLY_PROCESSED);		
		$this->assertEquals('/^(000\.000\.|000\.100\.1|000\.[36])/',PEACHPAYMENT_TRANSACTION_SUCCEEDED);
		$this->assertEquals('200.300.404',PEACHPAYMENT_NO_PAYMENT_SESSION_FOUND);

		//setup_constants
		$this->assertEquals( 'Amount mismatch',PPAYMENT_ERR_AMOUNT_MISMATCH);
		$this->assertEquals( 'Bad access of page', PPAYMENT_ERR_BAD_ACCESS );
		$this->assertEquals( 'Bad source IP address', PPAYMENT_ERR_BAD_SOURCE_IP );
		$this->assertEquals( 'Failed to connect to peachpayment', PPAYMENT_ERR_CONNECT_FAILED);
		$this->assertEquals( 'Security signature mismatch', PPAYMENT_ERR_INVALID_SIGNATURE);
		$this->assertEquals('Merchant ID mismatch', PPAYMENT_ERR_MERCHANT_ID_MISMATCH);
		$this->assertEquals( 'No saved session found for ITN transaction',PPAYMENT_ERR_NO_SESSION );
		$this->assertEquals('Order ID not present in URL', PPAYMENT_ERR_ORDER_ID_MISSING_URL);
		$this->assertEquals('Order ID mismatch', PPAYMENT_ERR_ORDER_ID_MISMATCH );
		$this->assertEquals( 'This order ID is invalid', PPAYMENT_ERR_ORDER_INVALID);
		$this->assertEquals( 'Order Number mismatch', PPAYMENT_ERR_ORDER_NUMBER_MISMATCH);
		$this->assertEquals( 'This order has already been processed', PPAYMENT_ERR_ORDER_PROCESSED );
		$this->assertEquals( 'PDT query failed', PPAYMENT_ERR_PDT_FAIL);
		$this->assertEquals( 'PDT token not present in URL', PPAYMENT_ERR_PDT_TOKEN_MISSING );
		$this->assertEquals('Session ID mismatch',PPAYMENT_ERR_SESSIONID_MISMATCH );
		$this->assertEquals( 'Unkown error occurred', PPAYMENT_ERR_UNKNOWN);

		// General
		$this->assertEquals('Payment was successful', PPAYMENT_MSG_OK  );
		$this->assertEquals( 'Payment has failed', PPAYMENT_MSG_FAILED );
		$this->assertEquals( 'The payment is pending. Please note, you will receive another Instant Transaction Notification when the payment status changes to "Completed", or "Failed"', PPAYMENT_MSG_PENDING);
		$this->assertEquals( 'nitin+debug@atlogys.com',DEBUG_EMAIL);

	}
	

	public function execute_pre_payment_request_valid() {
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
			$status = $this->class_instance->execute_post_payment_request($order, $amount, $payment_method_id);
			$this->assertEquals('ttp://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);
		    }


		/**
		 * Function : execute_pre_payment_request() 
		 * @param $order, $amount(without registration ID)
		 * @return URL(http://example.org/?order-received=5&%20key=wc_order_uOBJ7ektGogjJ&%20registered_payment=NOK)
		*/
		public function execute_pre_payment_request_invalid() {
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
			$status = $this->class_instance->execute_post_payment_request($order, $amount, $payment_method_id);
			$this->assertEquals('http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);
		    }

		public function process_registered_payment_status(){
		global $woocommerce;
		$order_id =7;
		$status ='NOK';
		$status = $this->class_instance->process_registered_payment_status($order_id, $status);
		print_r($status);
		$this->assertEquals('http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);

		}

		public function test_pp_validate_signature(){
		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;
		$order_data = Array ( 'amount' => 6,
							  'bankAccount_bankCode' => '632005',
							 'bankAccount_bankName' => 'absa',
							 'bankAccount_holder' => '4242424242424242424242',
							 'billing_city' => 'new delhi',
							 'billing_country' => 'IN',
							 'billing_postcode' => 110019,
							 'billing_state' => 'DL',
							 'billing_street1' => 'nehru enclave',
							 'checkoutId' => '89936af9979a44338f442f2ece8e794d',
							 'currency' => 'ZAR',
							 'customer_email' =>' nitin@atlogys.com',
							 'customer_givenName' => 'nitin sharma',
							 'customer_merchantCustomerId' => 1,
							 'id' => '108c6c4f653843158cb0505e7c7ed336',
							 'merchant_name' => 'Atlogys WP Test',
							 'merchantTransactionId' => 2016,
							 'paymentBrand' => 'EFTSecure',
							 'paymentType' => 'DB',
							 'result_code' => '000.100.110',
							 'result_description' => 'Request successfully processed in',
							 'resultDetails_AcquirerResponse' => 1,
							 'resultDetails_ConnectorTxID1' => '6467404',
							 'resultDetails_ExtendedDescription' => 'n/a',
							 'signature' => 'f6411c8a60287d6736b5c70b76378562bf94cf6ef67df24171813ea6dbaef463',
							 'timestamp' => '2020-01-06T08:50:30Z', );

		$status = $this->class_instance->pp_validate_signature($order_data);
		print_r($status);
		$this->assertEquals('http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);

		}

		public function test_pp_validate_signature_invalid(){
			$this->class_instance = new WC_Peach_Payments();
			global $woocommerce;
			$order_data = Array ( 'amount' => 6,
								  'bankAccount_bankCode' => '632005',
								 'bankAccount_bankName' => 'absa',
								 'bankAccount_holder' => '4242424242424242424242',
								 'billing_city' => 'new delhi',
								 'billing_country' => 'IN',
								 'billing_postcode' => 110019,
								 'billing_state' => 'DL',
								 'billing_street1' => 'nehru enclave',
								 'checkoutId' => '89936af9979a44338f442f2ece8e794d',
								 'currency' => 'ZAR',
								 'customer_email' =>' nitin@atlogys.com',
								 'customer_givenName' => 'nitin sharma',
								 'customer_merchantCustomerId' => 1,
								 'id' => '108c6c4f653843158cb0505e7c7ed336',
								 'merchant_name' => 'Atlogys WP Test',
								 'merchantTransactionId' => 2016,
								 'paymentBrand' => 'EFTSecure',
								 'paymentType' => 'DB',
								 'result_code' => '000.100.110',
								 'result_description' => 'Request successfully processed in',
								 'resultDetails_AcquirerResponse' => 1,
								 'resultDetails_ConnectorTxID1' => '6467404',
								 'resultDetails_ExtendedDescription' => 'n/a',
								 'signature' => 'f6411c8a60287d6736b5c70b76378562bf94cf6ef67df24171813ea6dbaef463',
								 'timestamp' => '2020-01-06T08:50:30Z', );

			$status = $this->class_instance->pp_validate_signature($order_data);
			$this->assertEquals('http://example.org?order-received=5&key=wc_order_zozBveVSvuaD5&registered_payment=ACK', $status['desc']);

		}


}

