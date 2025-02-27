<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Ssgpaykr
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Ssgpaykr extends WC_Gateway_Payssion {
	public $title = 'SSGPay';
	protected $pm_id = 'ssgpay_kr';
}