<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion
 *
 * @class 		WC_Gateway_Payssion_Creditcardtw
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Creditcardtw extends WC_Gateway_Payssion {
    public $title = 'Taiwan Credit Card';
    protected $pm_id = 'creditcard_tw';
}