<?php
Kirki::add_section( 'product_settings', array(
    'title'          => esc_html__( 'Product', 'finest-mini-cart' ),
    'panel'          => 'fmc_panel',
    'priority'       => 160,
) );


Kirki::add_field( 'fmc_panel', [
    'type'        => 'color',
    'settings'    => 'pro_bg_color',
    'label'       => __( 'Background Color', 'finest-mini-cart' ),
    'section'     => 'product_settings',
    'default'     => '#ffffff',
    'choices'     => [
        'alpha' => true,
    ],
    'priority'    => 10,
    'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.finest-area-middle .finest-item .finest-item-inner',
            'function' => 'css',
            'property' => 'background-color',
        ],
    ]

] );

Kirki::add_field( 'fmc_panel', [
    'type'        => 'radio-buttonset',
    'settings'    => 'product_border_property',
    'label'       => esc_html__( 'Border Property', 'finest-quickview' ),
    'section'     => 'product_settings',
    'default'     => 'border',
    'priority'    => 10,
    'choices'     => [
        'border'   => esc_html__( 'Border', 'finest-quickview' ),
        'style' => esc_html__( 'Style', 'finest-quickview' ),
        'color'  => esc_html__( 'Color', 'finest-quickview' ),
    ],
] );

Kirki::add_field( 'fmc_panel', [
    'type'        => 'dimension',
    'settings'    => 'pro_border',
    'label'       => esc_html__( 'Botton Border', 'finest-quickview' ),
    'section'     => 'product_settings',
    'priority'    => 10,
    'default'     =>'1px',
    'active_callback' => [
        [
            'setting'  => 'product_border_property',
            'operator' => '===',
            'value'    => 'border',
        ],
    ],
] );

Kirki::add_field( 'fmc_panel', [
    'type'        => 'select',
    'settings'    => 'pro_border_style',
    'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
    'section'     => 'product_settings',
    'default'     => 'dashed',
    'priority'    => 10,
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
    'active_callback' => [
        [
            'setting'  => 'product_border_property',
            'operator' => '==',
            'value'    => 'style',
        ],
    ],
] );

Kirki::add_field( 'fmc_panel', [
    'type'        => 'color',
    'settings'    => 'pro_border_color',
    'label'       => __( 'Color', 'finest-quickview' ),
    'section'     => 'product_settings',
    'default'     => '#E9E9E9',
    'choices'     => [
        'alpha' => true,
    ],
    'active_callback' => [
        [
            'setting'  => 'product_border_property',
            'operator' => '==',
            'value'    => 'color',
        ],
    ],
] );

Kirki::add_field( 'fmc_panel', [
    'type'        => 'dimensions',
    'settings'    => 'pro_padding',
    'label'       => esc_html__( 'Padding', 'finest-quickview' ),
    'section'     => 'product_settings',
    'priority'    => 10,
    'default'     => [
        'padding-top'    => '0px',
        'padding-right' => '0px',
        'padding-bottom'   => '15px',
        'padding-left'  => '0px',
    ],
] );

Kirki::add_field( 'fmc_panel', [
    'type'        => 'dimension',
    'settings'    => 'pro_border_radius',
    'label'       => esc_html__( 'Radius', 'finest-quickview' ),
    'section'     => 'product_settings',
    'priority'    => 10,
    'default'     =>'0px',
    'transport' => 'postMessage',
	'js_vars'   => [
		[
			'element'  => '.finest-area-middle .finest-item .finest-item-inner',
			'function' => 'css',
			'property' => 'border-radius',
		],
	]
] );

