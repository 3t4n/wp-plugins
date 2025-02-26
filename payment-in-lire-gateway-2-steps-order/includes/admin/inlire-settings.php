<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return apply_filters(
	'wc_inlire_settings',
	array(
		'enabled'                       => array(
			'title'       => __( 'Enable/Disable', 'payment-inlire-gateway2-steps-order' ),
			'label'       => __( 'Enable in-Lire', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'checkbox',
			'description' => '',
			'default'     => 'no',
		),
		'title'                         => array(
			'title'       => __( 'Title', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'text',
			'description' => __( 'This controls the title which the user sees during checkout.', 'payment-inlire-gateway2-steps-order' ),
			'default'     => __( 'in-Lire', 'payment-inlire-gateway2-steps-order' ),
			'desc_tip'    => true,
		),
		'description'                   => array(
			'title'       => __( 'Description', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'text',
			'description' => __( 'This controls the description which the user sees during checkout.', 'payment-inlire-gateway2-steps-order' ),
			'default'     => __( 'Pay through in-Lire.', 'payment-inlire-gateway2-steps-order' ),
			'desc_tip'    => true,
		),
		/*'testmode'                      => array(
			'title'       => __( 'Test mode', 'payment-inlire-gateway2-steps-order' ),
			'label'       => __( 'Enable Test Mode', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'checkbox',
			'description' => __( 'Place the payment gateway in test mode', 'payment-inlire-gateway2-steps-order' ),
			'default'     => 'yes',
			'desc_tip'    => true,
		),*/
		'payment_service_url' => array(
			'title'       => __( 'Payment service url', 'payment-inlire-gateway2-steps-order' ),
			'label'       => __( 'Url', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'text',
			'description' => __( 'Enter the url for the service (prefilled)', 'payment-inlire-gateway2-steps-order' ),
			'default'     => 'https://api.xolimited.com/PaymentAPI/api/v1/Payment',
			'desc_tip'    => true,
		),
		'payment_token_key' => array(
			'title'       => __( 'Payment key token', 'payment-inlire-gateway2-steps-order' ),
			'label'       => __( 'Token key', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'text',
			'description' => __( 'Enter your token key', 'payment-inlire-gateway2-steps-order' ),
			'default'     => '',
			'desc_tip'    => true,
		),
		'order_amout' => array(
			'title'       => __( 'Amount order', 'payment-inlire-gateway2-steps-order' ),
			'label'       => __( 'Amount order', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'text',
			'description' => __( 'Enter your amout order', 'payment-inlire-gateway2-steps-order' ),
			'default'     => '200',
			'desc_tip'    => true,
		)
		,
		'logging'                       => array(
			'title'       => __( 'Logging', 'payment-inlire-gateway2-steps-order' ),
			'label'       => __( 'Log debug messages', 'payment-inlire-gateway2-steps-order' ),
			'type'        => 'checkbox',
			'description' => __( 'Save debug messages to the WooCommerce System Status log.', 'payment-inlire-gateway2-steps-order' ),
			'default'     => 'no',
			'desc_tip'    => true,
		)
	)
);
