<?php
/**
 * Contains the default wallet topup form.
 *
 */

defined( 'ABSPATH' ) || exit;

return array(

    array(

        'placeholder'        => 'jon@snow.com',
        'value'              => '',
        'label'              => __( 'Billing Email', 'getpaid-wallet' ),
        'description'        => '',
        'required'           => true,
        'id'                 => 'mmdwallet_email',
        'name'               => 'mmdwallet_email',
        'type'               => 'billing_email',
        'premade'            => true,
        'hide_billing_email' => true,

    ),

    array(

        'placeholder'        => wpinv_format_amount( 10 ),
        'value'              => wpinv_format_amount( 10 ),
        'label'              => __( 'Topup Amount', 'getpaid-wallet' ),
        'description'        => __( 'How much money do you want to topup?', 'getpaid-wallet' ),
        'required'           => true,
        'id'                 => 'mmdwallet_price',
        'name'               => 'mmdwallet_price',
        'type'               => 'price_input',

    ),

    array(

        'value'              => '',
        'items_type'         => 'total',
        'description'        => '',
        'id'                 => 'mmdwallet_items',
        'name'               => 'mmdwallet_items',
        'type'               => 'items',
        'premade'            => true,
        'hide_cart'          => true,

    ),

    array(
        'text'               => __( 'Select Topup Method', 'getpaid-wallet' ),
        'id'                 => 'mmdwallet_gateway',
        'name'               => 'mmdwallet_gateway',
        'type'               => 'gateway_select',
        'premade'            => true

    ),

    array(

        'value'              =>'',
        'class'              => 'btn-primary',
        'label'              => __( 'Topup %price% »', 'getpaid-wallet' ),
        'description'        => __( 'By continuing with your payment, you are agreeing to our privacy policy and terms of service.', 'getpaid-wallet' ),
        'id'                 => 'mmdwallet_pay',
        'name'               => 'mmdwallet_pay',
        'type'               => 'pay_button',
        'premade'            => true,
    )

);
