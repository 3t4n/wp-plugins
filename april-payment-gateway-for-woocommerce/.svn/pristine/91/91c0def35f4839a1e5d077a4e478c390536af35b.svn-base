<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$april_settings = array(
  'enabled'         => array(
    'title'		      => __( 'Enable / Disable', 'april' ),
    'label'		      => __( 'Enable this payment gateway', 'april' ),
    'type'		      => 'checkbox',
    'default'	      => 'no',
  ),
  'title'           => array(
    'title'		      => __( 'Title', 'april' ),
    'type'		      => 'text',
    'desc_tip'	    => __( 'Payment title the customer will see during the checkout process.', 'april' ),
    'default'	      => __( 'Card Payment or Payment Plan', 'april' ),
  ),
  'description'     => array(
    'title'		      => __( 'Description', 'april' ),
    'type'		      => 'textarea',
    'desc_tip'	    => __( 'Payment description the customer will see during the checkout process.', 'april' ),
    'default'	      => __( 'Credit, debit or Amex card - Full payment or Payment plan.', 'april' ),
    'css'		        => 'max-width:350px;'
  ),
  'publishable_key' => array(
    'title'		      => __( 'Publishable Key', 'april' ),
    'type'		      => 'text',
    'desc_tip'	    => __( 'This key is provided to you by April.', 'april' ),
  ),
  'secret_key'      => array(
    'title'		      => __( 'Secret Key', 'april' ),
    'type'		      => 'text',
    'desc_tip'	    => __( 'This key is provided to you by April.', 'april' ),
  ),
  'payment_option'  => array(
    'title'		      => __( 'Available payment options', 'april' ),
    'type'          => 'select',
    'description'   => __( 'Allows to provide only one payment option at checkout.', 'april' ),
    'default'       => '0',
    'desc_tip'      => true,
    'options'       => array(
        '0'		      => __( 'Full payment & split payment', 'april' ),
        'paycard'   => __( 'Full payment only', 'april' ),
        'payplan'   => __( 'Split payment only', 'april' ),
    ),
  ),
  'hide_icon'     => array(
    'title'		      => __( 'Hide cards image', 'april' ),
    'label'         => ' ',
    'type'          => 'checkbox',
    'default'       => 'no',
    'desc_tip'      => true,
  ),
  'request_3ds'     => array(
    'title'		      => __( 'Request 3DS on payments', 'april' ),
    'label'         => ' ',
    'type'          => 'checkbox',
    'default'       => 'no',
    'desc_tip'      => true,
  ),
  'minimum_amount_3ds'      => array(
    'title'		      => __( 'Minimum Amount for 3DS', 'april' ),
    'type'		      => 'text',
    'desc_tip'	    => __( 'Minimum amount to request 3DS.', 'april' ),
  ),
  'primary_color'      => array(
    'title'		      => __( 'Primary Color (hex code)', 'april' ),
    'type'		      => 'text',
    'desc_tip'	    => __( 'Primary color of checkout.', 'april' ),
  ),
  'wallet_payments_place_order' => array(
    'title'		      => __( 'Allow Wallet payments to place the order', 'april' ),
    'label'         => 'Automatically place the order with Wallet payments',
    'description'   => __( 'Submit orders immediately when a digital wallet payment such as Apple Pay or Google Pay is selected.', 'april' ),
    'type'          => 'checkbox',
    'default'       => 'no',
    'desc_tip'      => true,
  ),
);

return $april_settings;
