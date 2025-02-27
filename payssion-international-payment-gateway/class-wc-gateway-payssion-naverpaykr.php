<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Naverpaykr
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Naverpaykr extends WC_Gateway_Payssion {
	public $title = 'Naver Pay';
	protected $pm_id = 'naverpay_kr';
}