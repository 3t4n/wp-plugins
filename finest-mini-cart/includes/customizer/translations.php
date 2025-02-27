<?php

Kirki::add_section( 'translation_settings', array(
    'title'          => esc_html__( 'Translation', 'finest-mini-cart' ),
    'panel'          => 'fmc_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'quick_cart_text',
	'label'    => esc_html__( 'Quick Cart Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Quick Cart', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'coupon_placeholder_text',
	'label'    => esc_html__( 'Enter your Coupon code', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Enter your Coupon code', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'apply_btn_text',
	'label'    => esc_html__( 'Apply Button Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Apply', 'finest-mini-cart' ),
	'priority' => 10,
] );


Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'coupn_field_empty',
	'label'    => esc_html__( 'Coupon Code Empty Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Coupon Code Field is Empty', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'coupn_code_applied',
	'label'    => esc_html__( 'Coupon Code Applied Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Coupon Code Already Applied!', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'coupn_field_imvaild',
	'label'    => esc_html__( 'Invaild Coupon Code Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Invaild Coupon Code', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'coupn_code_successfully',
	'label'    => esc_html__( 'Coupon Applied Successfully Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Coupon Applied Successfully ', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'product_quantity_text',
	'label'    => esc_html__( 'Products Quantity text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Products', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'product_subtotal',
	'label'    => esc_html__( 'SubTotal Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Subtotal', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'product_tax',
	'label'    => esc_html__( 'Product Taxes Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Taxes', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'product_shipping_text',
	'label'    => esc_html__( 'Shipping Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Shipping', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'product_total_text',
	'label'    => esc_html__( 'Product Total Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Total', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'product_continue_text',
	'label'    => esc_html__( 'Continue Shopping Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Continue Shopping', 'finest-mini-cart' ),
	'priority' => 10,
] );

Kirki::add_field( 'fmc_panel', [
	'type'     => 'text',
	'settings' => 'check_out_text',
	'label'    => esc_html__( 'Checkout Button Text', 'finest-mini-cart' ),
	'section'  => 'translation_settings',
	'default'  => esc_html__( 'Checkout', 'finest-mini-cart' ),
	'priority' => 10,
] );



