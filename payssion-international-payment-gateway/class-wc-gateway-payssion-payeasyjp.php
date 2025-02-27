<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Payeasyjp
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Payeasyjp extends WC_Gateway_Payssion {
    public $title = 'Pay-easy';
	protected $pm_id = 'payeasy_jp';
}