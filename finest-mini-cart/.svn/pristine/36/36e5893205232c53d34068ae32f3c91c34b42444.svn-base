<?php
	Kirki::add_section( 'finest_styles', array(
		'title'          => esc_html__( 'Cart Style', 'finest-mini-cart' ),
		'panel'          => 'fmc_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'custom',
		'settings'    => 'global_box',
		'section'     => 'finest_styles',
			'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Global', 'finest-mini-cart' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'typography',
		'settings'    => 'global_typography',
		'label'       => esc_html__( 'Global Typography', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => [
			'font-family'    => 'Roboto',
		],
		'priority'    => 10,
		'transport'   => 'postMessage',
		'js_vars'      => [
			[
				'element' => '#finest-area, #finest-total, .product-total-left .product-quenty, .product-total-right #product-show-total, .finest-subtotal-left .product-subtotal, .finest-subtotal-right .subtotal-count, .finest-tax-left .product-tax-left, .finest-tax-right .tax-count, .finest-shipping-left .product-shipping, .finest-total-right .product-shipping-count, .finest-total-left span.finest-total-text, .finest-shipping-right, .finest-action-right, .finest-area-bot .finest-continue span, .finest-area-middle.finest-items .finest-item-title a, .finest-cart-ttile h1, .finest-area-middle.finest-items .finest-item-qty-plus, .finest-area-middle.finest-items .finest-item-qty-minus, .finest-total-right span.total-price, input#finiest_coupon_code:focus, .finest-area-middle.finest-items .finest-item-qty .finest-item-qty-inner input',
				'function' => 'css',
				'property' => 'font-family',
				'suffix' => '!important',
			],
		],
	] );


	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'global_color',
		'label'       => __( 'Global Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finest-area, #finest-total, .product-total-left .product-quenty, .product-total-right #product-show-total, .finest-subtotal-left .product-subtotal, .finest-subtotal-right .subtotal-count, .finest-tax-left .product-tax-left, .finest-tax-right .tax-count, .finest-shipping-left .product-shipping, .finest-total-right .product-shipping-count,.finest-total-left span.finest-total-text, .finest-shipping-right, .finest-action-right, .finest-area-bot .finest-continue span,
				.finest-area-middle.finest-items .finest-item-title a, .finest-cart-ttile h1, .finest-area-middle.finest-items .finest-item-qty-plus, .finest-area-middle.finest-items .finest-item-qty-minus, .finest-total-right span.total-price, input#finiest_coupon_code:focus, .finest-area-middle.finest-items .finest-item-qty .finest-item-qty-inner input ',
				'function' => 'css',
				'property' => 'color',
				'suffix' => '!important',
			],
		]
	] );


	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'mini_cart_box_bg_color',
		'label'       => __( 'Mini Cart Box Background Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finest-area',
				'function' => 'css',
				'property' => 'background-color',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'custom',
		'settings'    => 'coupon_box',
		'section'     => 'finest_styles',
			'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Coupon Box', 'finest-mini-cart' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'coupon_width',
		'label'       => esc_html__( 'Width', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 70,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finiest_coupon_code',
				'function' => 'css',
				'property' => 'width',
				'units'    => '%',
			],
		],
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'coupon_height',
		'label'       => esc_html__( 'Height', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 40,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finiest_coupon_code',
				'function' => 'css',
				'property' => 'height',
				'units'    => 'px',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'cupon_border_property',
		'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'coupon_border',
		'label'       => esc_html__( 'Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'1px',
		'active_callback' => [
			[
				'setting'  => 'cupon_border_property',
				'operator' => '==',
				'value'    => 'border',
			],
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finiest_coupon_code',
				'function' => 'css',
				'property' => 'border',
				'units'    => 'px',
			],
		],
	] );
	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'coupon_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'solid',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finiest_coupon_code',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'cupon_border_property',
				'operator' => '==',
				'value'    => 'style',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'coupon_border_color',
		'label'       => __( 'Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#eaeaea',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finiest_coupon_code',
				'function' => 'css',
				'property' => 'border-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'cupon_border_property',
				'operator' => '==',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'coupon_border_radius',
		'label'       => esc_html__( 'Radius', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '#finiest_coupon_code',
				'function' => 'css',
				'property' => 'border-radius',

			],
		],
	] );


	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'applay_normal_hover',
		'label'       => esc_html__( 'Appaly Button Control Content', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'appaly_normal',
		'priority'    => 10,
		'choices'     => [
			'appaly_normal'   => esc_html__( 'Normal', 'finest-quickview' ),
			'appaly_hover' => esc_html__( 'Hover', 'finest-quickview' ),
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'slider',
		'settings'    => 'apply_width',
		'label'       => esc_html__( 'Width', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 90,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'width',
				'units'    => 'px',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'slider',
		'settings'    => 'apply_height',
		'label'       => esc_html__( 'Height', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 40,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			]
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'height',
				'units'    => 'px',
			],
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'line-height',
				'units'    => 'px',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'applay_background_color',
		'label'       => __( 'Background Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			]
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'background-color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'apply_text_color',
		'label'       => __( 'Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			]
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'aply_border_property',
		'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			]
		],
	] );
	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'apply_border',
		'label'       => esc_html__( 'Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'border',
				'units'    => 'px',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '===',
				'value'    => 'appaly_normal',
			],
			[
				'setting'  => 'aply_border_property',
				'operator' => '===',
				'value'    => 'border',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'apply_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'none',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			],
			[
				'setting'  => 'aply_border_property',
				'operator' => '==',
				'value'    => 'style',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'apply_border_color',
		'label'       => __( 'Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'border-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_normal',
			],
			[
				'setting'  => 'aply_border_property',
				'operator' => '==',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'apply_border_radius',
		'label'       => esc_html__( 'Radius', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'5px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit',
				'function' => 'css',
				'property' => 'border-radius',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '===',
				'value'    => 'appaly_normal',
			]
		],
	] );

	// apply hover

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'apply_text_color_hover',
		'label'       => __( 'Hover Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit:hover',
				'function' => 'css',
				'property' => 'color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_hover',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'apply_hover_bg_color',
		'label'       => __( 'Hover Background Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0170B9',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit:hover',
				'function' => 'css',
				'property' => 'background-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '===',
				'value'    => 'appaly_hover',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'apply_hover_border_property',
		'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_hover',
			]
		],
	] );


	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'apply_hover_btn_border',
		'label'       => esc_html__( 'Button Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit:hover',
				'function' => 'css',
				'property' => 'border',
				'units'    => 'px',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '===',
				'value'    => 'appaly_hover',
			],
			[
				'setting'  => 'apply_hover_border_property',
				'operator' => '==',
				'value'    => 'border',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'apply_hover_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'none',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit:hover',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '===',
				'value'    => 'appaly_hover',
			],
			[
				'setting'  => 'apply_hover_border_property',
				'operator' => '===',
				'value'    => 'style',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'apply_hover_border_color',
		'label'       => __( 'Color ', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit:hover',
				'function' => 'css',
				'property' => 'color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_hover',
			],
			[
				'setting'  => 'apply_hover_border_property',
				'operator' => '==',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'hover_apply_border_radius',
		'label'       => esc_html__( 'Button Radius', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'5px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finiest_coupon_submit:hover',
				'function' => 'css',
				'property' => ' border-radius',

			],
		],
		'active_callback' => [
			[
				'setting'  => 'applay_normal_hover',
				'operator' => '==',
				'value'    => 'appaly_hover',
			]
		],
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'custom',
		'settings'    => 'checkout_box',
		'section'     => 'finest_styles',
			'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Checkout', 'finest-mini-cart' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'checkout_hover_normal_setting',
		'label'       => esc_html__( 'Checkout Button Control', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 'normal',
		'priority'    => 10,
		'choices'     => [
			'normal'   => esc_html__( 'Normal', 'finest-mini-cart' ),
			'hover' => esc_html__( 'Hover', 'finest-mini-cart' ),
		],
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'checkout_bg_color',
		'label'       => __( 'Background Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a',
				'function' => 'css',
				'property' => 'background-color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'color_checkout',
		'label'       => __( 'Color', 'finest-mini-cart' ),
		'description' => esc_html__( 'Checkout Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a',
				'function' => 'css',
				'property' => 'color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'checkout_height',
		'label'       => esc_html__( 'Height', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 55,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a',
				'function' => 'css',
				'property' => 'height',
				'units'    => 'px',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '===',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'dimensions',
		'settings'    => 'checkout_margin',
		'label'       => esc_html__( 'Margin', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => [
			'margin-top'    => '10px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px',
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right',
				'function' => 'css',
				'property' => 'margin',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '===',
				'value'    => 'normal',
			],
		]

	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'check_border_property',
		'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'chck_btn_border',
		'label'       => esc_html__( 'Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right',
				'function' => 'css',
				'property' => 'border',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
			[
				'setting'  => 'check_border_property',
				'operator' => '==',
				'value'    => 'border',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'check_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'none',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
			[
				'setting'  => 'check_border_property',
				'operator' => '==',
				'value'    => 'style',
			],
		],
	] );


	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'check_border_color',
		'label'       => __( 'Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0088CC',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right',
				'function' => 'css',
				'property' => 'border-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
			[
				'setting'  => 'check_border_property',
				'operator' => '===',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'checkout_border_radius',
		'label'       => esc_html__( 'Radius', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a',
				'function' => 'css',
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '===',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'checkout_hover_bg_color',
		'label'       => __( 'Background Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a:hover',
				'function' => 'css',
				'property' => 'background-color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'checkout_hover_color',
		'label'       => __( 'Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a:hover',
				'function' => 'css',
				'property' => 'color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'check_hover_border_property',
		'label'       => esc_html__( 'Hover Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'hover_check_border',
		'label'       => esc_html__( 'Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right:hover',
				'function' => 'css',
				'property' => 'border',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
			[
				'setting'  => 'check_hover_border_property',
				'operator' => '==',
				'value'    => 'border',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'check_hover_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'none',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right:hover',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
			[
				'setting'  => 'check_hover_border_property',
				'operator' => '==',
				'value'    => 'style',
			],
		],
	] );


	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'check_hover_border_color',
		'label'       => __( 'Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0088CC',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right:hover',
				'function' => 'css',
				'property' => 'border-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
			[
				'setting'  => 'check_hover_border_property',
				'operator' => '===',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'checkout_hover_border_radius',
		'label'       => esc_html__( 'Hover Radius', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-action-right a:hover',
				'function' => 'css',
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'checkout_hover_normal_setting',
				'operator' => '===',
				'value'    => 'hover',
			],
		]
	] );



	Kirki::add_field( 'fmc_panel', [
		'type'        => 'custom',
		'settings'    => 'checkout_box_button',
		'section'     => 'finest_styles',
			'default'         => '<h3 style="padding:12px 0px; text-align: center; font-size: 16px; background:#ddd; color:#222; margin:0;">' . __( 'Continue Shopping', 'finest-mini-cart' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'continue_hover_normal_setting',
		'label'       => esc_html__( 'Continue Button', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 'normal',
		'priority'    => 10,
		'choices'     => [
			'normal'   => esc_html__( 'Normal', 'finest-mini-cart' ),
			'hover' => esc_html__( 'Hover', 'finest-mini-cart' ),
		],
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'continue_bg_color',
		'label'       => __( 'Background Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#fff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'background-color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'continue_color',
		'label'       => __( 'Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'continue_height',
		'label'       => esc_html__( 'Height', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 55,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'height',
				'units'    => 'px',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );


	Kirki::add_field( 'fmc_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'continue_border_property',
		'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'dimension',
		'settings'    => 'continue_btn_border',
		'label'       => esc_html__( 'Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'1px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'border',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
			[
				'setting'  => 'continue_border_property',
				'operator' => '==',
				'value'    => 'border',
			],
		],


	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'select',
		'settings'    => 'continue_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'solid',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '===',
				'value'    => 'normal',
			],
			[
				'setting'  => 'continue_border_property',
				'operator' => '===',
				'value'    => 'style',
			],
		],

	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'continue_border_color',
		'label'       => __( 'Border Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'border-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
			[
				'setting'  => 'continue_border_property',
				'operator' => '==',
				'value'    => 'color',
			],
		],

	] );


	Kirki::add_field( 'fmc_panel', [
		'type'        => 'dimensions',
		'settings'    => 'continue_margin',
		'label'       => esc_html__( 'Margin', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => [
			'margin-top'    => '10px',
			'margin-right'  => '0px',
			'margin-bottom' => '0px',
			'margin-left'   => '0px',
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'margin',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]

	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'continue_border_radius',
		'label'       => esc_html__( 'Radius', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span',
				'function' => 'css',
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'normal',
			],
		]
	] );

	// hover property

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'continue_hover_bg_color',
		'label'       => __( 'Hover Background Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span:hover',
				'function' => 'css',
				'property' => 'background-color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'continue_hover_color',
		'label'       => __( 'Color', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span:hover',
				'function' => 'css',
				'property' => 'color',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'continue_hover_border_property',
		'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'border',
		'priority'    => 10,
		'choices'     => [
			'border'   => esc_html__( 'Border', 'finest-quickview' ),
			'style' => esc_html__( 'Style', 'finest-quickview' ),
			'color'  => esc_html__( 'Color', 'finest-quickview' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
		]
	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'dimension',
		'settings'    => 'contine_hover_btn_border',
		'label'       => esc_html__( 'Hover Border', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span:hover',
				'function' => 'css',
				'property' => 'border',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
			[
				'setting'  => 'continue_hover_border_property',
				'operator' => '==',
				'value'    => 'border',
			],
		],


	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'select',
		'settings'    => 'continue_hover_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'none',
		'priority'    => 10,
		'multiple'    => 1,
		'choices'     => [
			'none' => esc_html__( 'None', 'finest-quickview' ),
			'dotted' => esc_html__( 'Dotted', 'finest-quickview' ),
			'dashed' => esc_html__( 'Dashed', 'finest-quickview' ),
			'solid' => esc_html__( 'Solid', 'finest-quickview' ),
			'double' => esc_html__( 'Double', 'finest-quickview' ),
			'groove' => esc_html__( 'Groove', 'finest-quickview' ),
			'ridge' => esc_html__( 'Ridge', 'finest-quickview' ),
			'inset' => esc_html__( 'Inset', 'finest-quickview' ),
			'outset' => esc_html__( 'Outset', 'finest-quickview' ),
			'initial' => esc_html__( 'Initial', 'finest-quickview' ),
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span:hover',
				'function' => 'css',
				'property' => 'border-style',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
			[
				'setting'  => 'continue_hover_border_property',
				'operator' => '==',
				'value'    => 'style',
			],
		],

	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'color',
		'settings'    => 'continue_hover_border_color',
		'label'       => __( 'Border Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#000000',
		'choices'     => [
			'alpha' => true,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span:hover',
				'function' => 'css',
				'property' => 'border-color',
			],
		],
		'active_callback' => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
			[
				'setting'  => 'continue_hover_border_property',
				'operator' => '==',
				'value'    => 'color',
			],
		],

	] );

	Kirki::add_field( 'fmc_panel', [
		'type'        => 'slider',
		'settings'    => 'continue_hover_border_radius',
		'label'       => esc_html__( 'Hover Radius', 'finest-mini-cart' ),
		'section'     => 'finest_styles',
		'default'     => 5,
		'choices'     => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'transport' => 'postMessage',
		'js_vars'   => [
			[
				'element'  => '.finest-area-bot .finest-continue span:hover',
				'function' => 'css',
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
		'active_callback'  => [
			[
				'setting'  => 'continue_hover_normal_setting',
				'operator' => '==',
				'value'    => 'hover',
			],
		]
	] );