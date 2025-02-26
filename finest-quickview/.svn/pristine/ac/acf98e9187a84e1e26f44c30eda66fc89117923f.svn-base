<?php
	Kirki::add_section( 'finest_styles', array(
		'title'          => esc_html__( 'Style Options', 'finest-quickview' ),
		'panel'          => 'finest_panel',
		'priority'       => 160,
	) );


	// mmodal content
	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'modal_background_color',
		'label'       => __( 'Modal Background Color', 'finest-quickview' ),
		'description' => esc_html__( 'This is a color control - with alpha channel.', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0088CC',
		'choices'     => [
			'alpha' => true,
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimensions',
		'settings'    => 'modal_margin',
		'description' => esc_html__( 'Apply Modal Padding', 'finest-quickview' ),
		'label'       => esc_html__( 'Modal Padding', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => [
			'padding-top'    => '35px',
			'padding-right' => '35px',
			'padding-bottom'   => '35px',
			'padding-left'  => '35px',
		],
		
	] );


	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'button_normal_hover',
		'label'       => esc_html__( 'Control Content', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'button_normal',
		'priority'    => 10,
		'choices'     => [
			'button_normal'   => esc_html__( 'Normal', 'finest-quickview' ),
			'button_hover' => esc_html__( 'Hover', 'finest-quickview' ),
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'btn_text_color',
		'label'       => __( 'Button Text Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#fff',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			]
		],
	] );

	
	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'btn_bg_color',
		'label'       => __( 'Button Background Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0170B9',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'btn_border_property',
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
				'setting'  => 'button_normal_hover',
				'operator' => '==',
				'value'    => 'button_normal',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'btn_border',
		'label'       => esc_html__( 'Button Border', 'finest-quickview' ),
		'description' => esc_html__( 'Apply Button Border.', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			],
			[
				'setting'  => 'btn_border_property',
				'operator' => '===',
				'value'    => 'border',
			],
		],
	] );
	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'btn_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'solid',
		'placeholder' => esc_html__( 'Select an option...', 'finest-quickview' ),
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
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			],
			[
				'setting'  => 'btn_border_property',
				'operator' => '===',
				'value'    => 'style',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'btn_border_color',
		'label'       => __( 'Color Control (with alpha channel)', 'finest-quickview' ),
		'description' => esc_html__( 'This is a color control - with alpha channel.', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0088CC',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			],
			[
				'setting'  => 'btn_border_property',
				'operator' => '===',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimensions',
		'settings'    => 'btn_margin',
		'description' => esc_html__( 'Apply Button Margin', 'finest-quickview' ),
		'label'       => esc_html__( 'Button Margin', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => [
			'margin-top'    => '0px',
			'margin-right' => '0px',
			'margin-bottom'   => '0px',
			'margin-left'  => '0px',
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimensions',
		'settings'    => 'btn_padding',
		'description' => esc_html__( 'Apply Button Padding', 'finest-quickview' ),
		'label'       => esc_html__( 'Button Padding', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => [
			'padding-top'    => '14px',
			'padding-right' => '15px',
			'padding-bottom'   => '14px',
			'padding-left'  => '15px',
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'btn_border_radius',
		'label'       => esc_html__( 'Button Radius', 'finest-quickview' ),
		'description' => esc_html__( 'Apply Button Radius', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_normal',
			]
		],
	] );

	// hover

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'btn_text_color_hover',
		'label'       => __( 'Button Hover Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#ffffff',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_hover',
			]
		],
	] );
	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'hover_btn_bg_color',
		'label'       => __( 'Button Background Color', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0170B9',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_hover',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'radio-buttonset',
		'settings'    => 'btn_hover_border_property',
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
				'setting'  => 'button_normal_hover',
				'operator' => '==',
				'value'    => 'button_hover',
			]
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'hover_btn_border',
		'label'       => esc_html__( 'Button Border', 'finest-quickview' ),
		'description' => esc_html__( 'Apply Button Border.', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'0px',
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_hover',
			],
			[
				'setting'  => 'btn_hover_border_property',
				'operator' => '===',
				'value'    => 'border',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'select',
		'settings'    => 'btn_hover_border_style',
		'label'       => esc_html__( 'Border Style', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => 'solid',
		'placeholder' => esc_html__( 'Select an option...', 'finest-quickview' ),
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
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_hover',
			],
			[
				'setting'  => 'btn_hover_border_property',
				'operator' => '===',
				'value'    => 'style',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'color',
		'settings'    => 'btn_hover_border_color',
		'label'       => __( 'Color Control (with alpha channel)', 'finest-quickview' ),
		'description' => esc_html__( 'This is a color control - with alpha channel.', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '#0088CC',
		'choices'     => [
			'alpha' => true,
		],
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '==',
				'value'    => 'button_hover',
			],
			[
				'setting'  => 'btn_hover_border_property',
				'operator' => '==',
				'value'    => 'color',
			],
		],
	] );

	Kirki::add_field( 'finest_panel', [
		'type'        => 'dimension',
		'settings'    => 'hover_btn_border_radius',
		'label'       => esc_html__( 'Button Radius', 'finest-quickview' ),
		'description' => esc_html__( 'Apply Button Radius', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     =>'5px',
		'active_callback' => [
			[
				'setting'  => 'button_normal_hover',
				'operator' => '===',
				'value'    => 'button_hover',
			]
		],
	] );

	// custom css
	Kirki::add_field( 'finest_panel', [
		'type'        => 'code',
		'settings'    => 'code_setting',
		'label'       => esc_html__( 'Custom CSS Use important', 'finest-quickview' ),
		'description' => esc_html__( 'Use important every css', 'finest-quickview' ),
		'section'     => 'finest_styles',
		'default'     => '',
		'choices'     => [
			'language' => 'css',
		],
	] );

