<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Rabbitlinepayth
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Rabbitlinepayth extends WC_Gateway_Payssion {
	public $title = 'Rabbit LINE Pay';
	protected $pm_id = 'rabbitlinepay_th';
}