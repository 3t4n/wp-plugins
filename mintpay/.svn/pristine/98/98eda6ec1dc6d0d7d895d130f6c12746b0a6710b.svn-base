<?php
/*
 * Mintpay Gateway Settings
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


return array(
	'enabled'         => array(
		'title'       => __( 'Enable', $this->domain ),
		'type'        => 'checkbox',
		'label'       => __( 'Enable Mintpay gateway', $this->domain ),
		'default'     => 'yes',
		'description' => __( 'Show Mintpay as a payment option at checkout', $this->domain ),
		'desc_tip'    => true
	),
	'test_mode'       => array(
		'title'       => __( 'Test Mode', $this->domain ),
		'type'        => 'checkbox',
		'label'       => __( 'Enable Test Mode', $this->domain ),
		'default'     => 'yes',
		'description' => __( 'Place the payment gateway in test mode using test API keys.', $this->domain ),
	),
	'merchant_id'     => array(
		'title'       => __( 'Merchant ID', $this->domain ),
		'type'        => 'text',
		'placeholder' => 'mp_XXX',
		'description' => __( 'This is the Merchant ID provided by Mintpay when you signed up for an account.', $this->domain ),
		'default'     => '',
		'desc_tip'    => true,
		'css'         => 'min-width:300px; max-width:300px;',
	),
	'merchant_secret' => array(
		'title'       => __( 'Merchant Secret', $this->domain ),
		'type'        => 'text',
		'description' => __( 'This is the Merchant Secret provided by Mintpay when you signed up for an account.', $this->domain ),
		'default'     => '',
		'desc_tip'    => true,
		'css'         => 'min-width:300px; max-width:400px;',
	),
);
