<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Yoomoneyru
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Yoomoneyru extends WC_Gateway_Payssion {
    public $title = 'YooMoney';
	protected $pm_id = 'yoomoney_ru';
}