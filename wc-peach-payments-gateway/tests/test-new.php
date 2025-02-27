<?php
 //include 'classes/class-wc-peach-payments.php';
 //include '/var/www/html/peach-wp-plugins/wp-content/plugins/woocommerce/includes/abstracts/abstract-wc-payment-gateway.php';
/**
 * Class SampleTest
 *
 * @package Wc_Peach_Payments_Gateway
 */

/**
 * Sample test case.
 */

class PeachPaymentCard extends WP_UnitTestCase {
	
	public function test_all_construct() {
		$this->class_instance = new WC_Peach_Payments();
		//echo "Nitin".$this->class_instance->id;

		$isRegisteredPluginId=$this->class_instance->id;
		$this->assertEquals('peach-payments',$isRegisteredPluginId);
		
		//Note:[$this->class_instance,'process_admin_options'] OR array( $this, 'process_admin_options' ) are same, diff only php7 version
		///Note: has_action return priorites
		$onlyTestProcessAdmin=has_action( 'woocommerce_update_options_payment_gateways_' . $this->class_instance->id, [$this->class_instance,'process_admin_options']);
		//echo "NItin".$onlyTestProcessAdmin;
		$onlyTestProcessAdmin = (10=== $onlyTestProcessAdmin);
		$this->assertTrue($onlyTestProcessAdmin);
		

	}
	public function test_all_constants() {		

		$this->class_instance = new WC_Peach_Payments();
		global $woocommerce;

			//print_r(PEACHPAYMENT_PAYMENT_GATEWAY_URL);
			//$this->assertTrue( true );
		$this->assertEquals('https://test.oppwa.com/',PEACHPAYMENT_PAYMENT_GATEWAY_URL);
		$this->assertEquals('100.150.200',PEACHPAYMENT_REGISTRATION_NOT_EXISTS);
		$this->assertEquals('100.150.201',PEACHPAYMENT_REGISTRATION_NOT_CONFIRMED);
		$this->assertEquals('100.150.203',PEACHPAYMENT_REGISTRATION_NOT_VALID);
		$this->assertEquals('100.150.202',PEACHPAYMENT_REGISTRATION_DEREGISTERED);
		$this->assertEquals('/^(000\.400\.0[^3]|000\.400\.100)/',PEACHPAYMENT_REQUEST_SUCCESSFULLY_PROCESSED);			
		$this->assertEquals('/^(000\.000\.|000\.100\.1|000\.[36])/',PEACHPAYMENT_TRANSACTION_SUCCEEDED);
		$this->assertEquals('200.300.404',PEACHPAYMENT_NO_PAYMENT_SESSION_FOUND);

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


	/**
	 * A single example test.
	 */
	/*public function test1_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}

	function test_sample_string() {

		$string = 'Unit tests are sweet';

		$this->assertEquals( 'Unit tests are sweet', $string );
		$this->assertNotEquals( 'Unit tests suck', $string );
	}

	function test_sample_number() {

		$string = 'Unit tests are sweet';

		$this->assertEquals( 'Unit tests are sweet', $string );
		$this->assertNotEquals( 'Unit tests suck', $string );
	}*/

/*	public function WC_Peach_Payments()
    {

    	include 'classes/class-wc-peach-payments.php';
        //parent::WC_Peach_Payments();

        $this->class_instance = new WC_Peach_Payments();
    }*/

	/*function test_get_default_status() {
		//parent::WC_Peach_Payments();
		include 'classes/class-wc-peach-payments.php';

        $this->class_instance = new WC_Peach_Payments();

		//$callnew= new WC_Peach_Payments();
		$status =  $this->class_instance->rcp_get_status();
		$this->assertEquals( 'free', $status );
	}*/
}

