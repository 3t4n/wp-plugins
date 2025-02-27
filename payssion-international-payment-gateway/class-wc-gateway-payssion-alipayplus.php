<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( 'class-wc-gateway-payssion.php' );

/**
 * Payssion 
 *
 * @class 		WC_Gateway_Payssion_Alipayplus
 * @extends		WC_Payment_Gateway
 * @author 		Payssion
 */
class WC_Gateway_Payssion_Alipayplus extends WC_Gateway_Payssion {
	protected $pm_id = 'alipayplus';
	
	/**
	 * get_icon function.
	 *
	 * @return string
	 */
	public function get_icon() {
		return apply_filters('woocommerce_payssion_icon',  '<img src="https://cdn.marmot-cloud.com/storage/aplus-checkout-prod/icon/prod/A111249900000000/2102fb27020cae8bc3915cf114d7a35d31460b5413059852224f4158ac707a17/P1-WEB-01-CNY.png" style="height: 40px !important;" alt="Alipay+">');
	}
		
	protected function getMethodTitle() {
	    return 'Alipay+';
	}
}