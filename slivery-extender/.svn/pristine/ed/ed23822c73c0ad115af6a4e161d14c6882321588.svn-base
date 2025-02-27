<?php
global $themetype;
// Global Section
	new \Kirki\Panel(
		'global_option',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Global', 'kirki' ),
			
		]
	);

	// Body Fonts & Typography Section
		new \Kirki\Section(
			'body_font_typography_section',
			[
				'title'       => esc_html__( 'Body Fonts & Typography', 'kirki' ),
				'panel'       => 'global_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Typography(
			[
				'settings'    => 'silver_body_fontfamily',
				'label'       => esc_html__( 'Body Font Family', 'kirki' ),
				'section'     => 'body_font_typography_section',
				'priority'    => 160,
				'default'     => [
					'font-family'     => 'Roboto',
					'font-size'       => '15px',
					'variant'         => 'regular',
					'text-transform'  => 'none',
				],
				'output'      => [
					[
						'element' => 'body',
					],
				],
			]
		);

	    new \Kirki\Field\Typography(
			[
				'settings'    => 'silver_body_mobile_font_size',
				'label'       => esc_html__( 'Mobile Font Size', 'kirki' ),
				'section'     => 'body_font_typography_section',
				'priority'    => 160,
				'default'     => [
					'font-size'       => '14px',
				],
				'output'      => [
					[
						'media_query' => '@media only screen and (max-width: 768px)',
						'element' => 'body',
					],
				],
			]
		);


	// Heading Fonts & Typography Section
		Kirki::add_config( 'heading_font_section' );

		new \Kirki\Section(
			'heading_font_section',
			[
				'title'       => esc_html__( 'Heading Fonts & Typography', 'kirki' ),
				'panel'       => 'global_option',
				'priority'    => 160,
			]
		);

		// Heading 1 Font Family
		    new \Kirki\Field\Typography(
				[
					'settings'    => 'typography_setting',
					'label'       => esc_html__( 'Heading 1 (h1)Font Family', 'kirki' ),
					'section'     => 'heading_font_section',
					'priority'    => 20,
					'transport'   => 'auto',
					'default'     => [
						'font-family'     => 'Monda',
						'variant'         => 'regular',
						'font-style'      => 'normal',
						'font-size'       => '35px',
						'text-transform'  => 'none',
					],
					'output'      => [
						[
							'element' => 'h1',
						],
					],
				]
			);

		    Kirki::add_field( 'heading_font_section', array(
		        'type'     => 'typography',
		        'settings' => 'silvery_Heading1_mobile_font_size',
		        'label'    => esc_html__( 'Mobile Font Size', 'kirki' ),
		        'section'  => 'heading_font_section',
		        'default'     => [
					'font-size'       => '20px',
				],
		        'priority' => 30,
		        'output'   => array(
		            array(
		                'media_query' => '@media only screen and (max-width: 767px)',
						'element' => 'h1',
						'suffix'  => ' !important'
		            ),
		        ),
		    ) );

		// Heading 2 Font Family
		    new \Kirki\Field\Typography(
				[
					'settings'    => 'silvery_Heading2_font_typography_setting',
					'label'       => esc_html__( 'Heading 2 (h2)Font Family', 'kirki' ),
					'section'     => 'heading_font_section',
					'priority'    => 40,
					'transport'   => 'auto',
					'default'     => [
						'font-family'     => 'Monda',
						'variant'         => 'regular',
						'font-style'      => 'normal',
						'font-size'       => '28px',
						'text-transform'  => 'none',
					],
					'output'      => [
						[
							'element' => 'h2',
						],
					],
				]
			);

			Kirki::add_field( 'heading_font_section', array(
		        'type'     => 'typography',
		        'settings' => 'silvery_Heading2_mobile_font_size',
		        'section'  => 'heading_font_section',
		        'label'       => esc_html__( 'Mobile Font Size', 'kirki' ),
		        'default'     => [
					'font-size'       => '22px',
				],
		        'priority' => 50,
		        'output'   => array(
		            array(
		            	'media_query' => '@media only screen and (max-width: 767px)',
		                'element'  => 'h2',
		            ),
		        ),
		    ) );

		// Heading 3 Font Family
		    new \Kirki\Field\Typography(
				[
					'settings'    => 'silvery_Heading3_font_typography_setting',
					'label'       => esc_html__( 'Heading 3 (h3)Font Family', 'kirki' ),
					'section'     => 'heading_font_section',
					'priority'    => 60,
					'transport'   => 'auto',
					'default'     => [
						'font-family'     => 'Monda',
						'variant'         => 'regular',
						'font-style'      => 'normal',
						'font-size'       => '25px',
						'text-transform'  => 'none',
					],
					'output'      => [
						[
							'element' => 'h3',
						],
					],
				]
			);

			Kirki::add_field( 'heading_font_section', array(
		        'type'     => 'typography',
		        'settings' => 'silvery_Heading3_mobile_font_size',
		        'section'  => 'heading_font_section',
		        'label'       => esc_html__( 'Mobile Font Size', 'kirki' ),
		        'default'     => [
					'font-size'       => '20px',
				],
		        'priority' => 70,
		        'output'   => array(
		            array(
		            	'media_query' => '@media only screen and (max-width: 767px)',
		                'element'  => 'h3',
		            ),
		        ),
		    ) );

		// Heading 4 Font Family
		    new \Kirki\Field\Typography(
				[
					'settings'    => 'silvery_Heading4_font_typography_setting',
					'label'       => esc_html__( 'Heading 4 (h4)Font Family', 'kirki' ),
					'section'     => 'heading_font_section',
					'priority'    => 80,
					'transport'   => 'auto',
					'default'     => [
						'font-family'     => 'Monda',
						'variant'         => 'regular',
						'font-style'      => 'normal',
						'font-size'       => '22px',
						'text-transform'  => 'none',
					],
					'output'      => [
						[
							'element' => 'h4',
						],
					],
				]
			);

			Kirki::add_field( 'heading_font_section', array(
		        'type'     => 'typography',
		        'settings' => 'silvery_Heading4_mobile_font_size',
		        'section'  => 'heading_font_section',
		        'label'       => esc_html__( 'Mobile Font Size', 'kirki' ),
		        'default'     => [
					'font-size'       => '18px',
				],
		        'priority' => 90,
		        'output'   => array(
		            array(
		            	'media_query' => '@media only screen and (max-width: 767px)',
		                'element'  => 'h4',
		            ),
		        ),
		    ) );

		// Heading 5 Font Family
		    new \Kirki\Field\Typography(
				[
					'settings'    => 'silvery_Heading5_font_typography_setting',
					'label'       => esc_html__( 'Heading 5 (h5)Font Family', 'kirki' ),
					'section'     => 'heading_font_section',
					'priority'    => 90,
					'transport'   => 'auto',
					'default'     => [
						'font-family'     => 'Monda',
						'variant'         => 'regular',
						'font-style'      => 'normal',
						'font-size'       => '20px',
						'text-transform'  => 'none',
					],
					'output'      => [
						[
							'element' => 'h4',
						],
					],
				]
			);

			Kirki::add_field( 'heading_font_section', array(
		        'type'     => 'typography',
		        'settings' => 'silvery_Heading5_mobile_font_size',
		        'section'  => 'heading_font_section',
		        'label'       => esc_html__( 'Mobile Font Size', 'kirki' ),
		        'default'     => [
					'font-size'       => '16px',
				],
		        'priority' => 100,
		        'output'   => array(
		            array(
		            	'media_query' => '@media only screen and (max-width: 767px)',
		                'element'  => 'h5',
		            ),
		        ),
		    ) );

		// Heading 6 Font Family
		    new \Kirki\Field\Typography(
				[
					'settings'    => 'silvery_Heading6_font_typography_setting',
					'label'       => esc_html__( 'Heading 6 (h6)Font Family', 'kirki' ),
					'section'     => 'heading_font_section',
					'priority'    => 110,
					'transport'   => 'auto',
					'default'     => [
						'font-family'     => 'Monda',
						'variant'         => 'regular',
						'font-style'      => 'normal',
						'font-size'       => '18px',
						'text-transform'  => 'none',
					],
					'output'      => [
						[
							'element' => 'h6',
						],
					],
				]
			);

			Kirki::add_field( 'heading_font_section', array(
		        'type'     => 'typography',
		        'settings' => 'silvery_Heading6_mobile_font_size',
		        'section'  => 'heading_font_section',
		        'label'       => esc_html__( 'Mobile Font Size', 'kirki' ),
		        'default'     => [
					'font-size'       => '16px',
				],
		        'priority' => 120,
		        'output'   => array(
		            array(
		            	'media_query' => '@media only screen and (max-width: 767px)',
		                'element'  => 'h6',
		            ),
		        ),
		    ) );
		    

		

	// Container Section
		new \Kirki\Section(
			'container_section',
			[
				'title'       => esc_html__( 'Container', 'kirki' ),
				'panel'       => 'global_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_blog_title',
				'label'    => esc_html__( 'Blog Title', 'kirki' ),
				'section'  => 'container_section',
				'default'  => esc_html__( 'Blog', 'kirki' ),
				'priority' => 10,
			]
		);

		if(isset($themetype['container_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'container_bg_color',
					'label'       => __( 'Container Background Color', 'kirki' ),
					'section'     => 'container_section',
					'default'     => $themetype['container_bg_color'],
					// 'default'     => '#f9f3f2',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.'.$themetype['plugiformname'].'_container_data',
							'property' => 'background',
						),
					),
				]
			);
		}
		
		if(isset($themetype['container_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'container_text_color',
					'label'       => __( 'Container Text Color', 'kirki' ),
					'section'     => 'container_section',
					'default'     => $themetype['container_text_color'],
					// 'default'     => '#000000',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.'.$themetype['plugiformname'].'_container_data',
							'property' => 'color',
						),
					),
				]
			);
		}

		new \Kirki\Field\Select(
			[
				'settings'    => $themetype['plugiformname'].'_container_page_layout',
				'label'       => esc_html__( 'Page Layouts', 'kirki' ),
				'section'     => 'container_section',
				'default'     => 'content_boxed',
				'choices'     => [
					'full_width' => esc_html__( 'Full Width / Contained', 'kirki' ),
					'boxed_layout' => esc_html__( 'Boxed Layout', 'kirki' ),
					'content_boxed' => esc_html__( 'Content Boxed', 'kirki' ),
				],
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_container_width',
				'label'    => esc_html__( 'Container Width', 'kirki' ),
				'section'  => 'container_section',
				'default'  => esc_html__( '1100', 'kirki' ),
				'priority' => 10,
			]
		);

		if(isset($themetype['_boxed_layout_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_boxed_layout_bg_color',
					'label'       => __( 'Boxed Layout Background Color', 'kirki' ),
					'section'     => 'container_section',
					'default'     => $themetype['_boxed_layout_bg_color'],
					// 'default'     => '#ffffff',
					'choices'     => [
						'alpha' => true,
					],
					'active_callback'  => [
						[
							'setting'  => $themetype['plugiformname'].'_container_page_layout',
							'operator' => '===',
							'value'    => 'boxed_layout',
						],
					],
					'output' => array(
						array(
							'element'  => '.'.$themetype['plugiformname'].'_container_info',
							'property' => 'background',
						),
					),
				]
			);
		}

		new \Kirki\Field\Select(
			[
				'settings'    => $themetype['plugiformname'].'_container_blog_layout',
				'label'       => esc_html__( 'Blogs Layouts', 'kirki' ),
				'section'     => 'container_section',
				'default'     => 'grid_view',
				'choices'     => [
					'list_view' => esc_html__( 'List View', 'kirki' ),
					'list_view1' => esc_html__( 'List View1', 'kirki' ),
					'grid_view' => esc_html__( 'Grid View', 'kirki' ),
				],
			]
		);

		if(isset($themetype['_content_boxed_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_content_boxed_bg_color',
					'label'       => __( 'Content Boxed Background Color', 'kirki' ),
					'section'     => 'container_section',
					'default'     => $themetype['_content_boxed_bg_color'],
					'choices'     => [
						'alpha' => true,
					],
					'active_callback'  => [
						[
							'setting'  => $themetype['plugiformname'].'_container_page_layout',
							'operator' => '===',
							'value'    => 'content_boxed',
						],
					],
					'output' => array(
						array(
							'element'  => 'main#primary, aside#secondary .widget',
							'property' => 'background',
						),
					),
				]
			);
		}

	// Grid View
		new \Kirki\Field\Select(
			[
				'settings'    => $themetype['plugiformname'].'_container_grid_view_col',
				'label'       => esc_html__( 'Grid View Columns', 'kirki' ),
				'section'     => 'container_section',
				'default'     => '3',
				'choices'     => [
					'1' => esc_html__( '1', 'kirki' ),
					'2' => esc_html__( '2', 'kirki' ),
					'3' => esc_html__( '3', 'kirki' ),
				],
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => $themetype['plugiformname'].'_container_grid_view_col_gap',
				'label'    => esc_html__( 'Columns Gap', 'kirki' ),
				'description' => esc_html__( 'in px', 'kirki' ),
				'section'  => 'container_section',
				'default'  => 20,
			]
		);

	// Display Container
		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_containe',
				'label'       => esc_html__( 'Display Blog Containe', 'kirki' ),
				'section'     => 'container_section',
				'default'     => true,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_description',
				'label'       => esc_html__( 'Display Container Description', 'kirki' ),
				'section'     => 'container_section',
				'default'     => true,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_date',
				'label'       => esc_html__( 'Display Container Date', 'kirki' ),
				'section'     => 'container_section',
				'default'     => true,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_authore',
				'label'       => esc_html__( 'Display Container Authore', 'kirki' ),
				'section'     => 'container_section',
				'default'     => false,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_category',
				'label'       => esc_html__( 'Display Container Category', 'kirki' ),
				'section'     => 'container_section',
				'default'     => true,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_comments',
				'label'       => esc_html__( 'Display Container Comments', 'kirki' ),
				'section'     => 'container_section',
				'default'     => false,
			]
		);

	// Buttons
		new \Kirki\Section(
			'button_section',
			[
				'title'       => esc_html__( 'Buttons', 'kirki' ),
				'panel'       => 'global_option',
				'priority'    => 160,
			]
		);

		if(isset($themetype['button_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_button_bg_color',
					'label'       => __( 'Button Background Color', 'kirki' ),
					'section'     => 'button_section',
					'default'     => $themetype['button_bg_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['button_bg_color_element'],
							// 'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
							'property' => 'background-color',
						),
					),
				]
			);
		}

		if(isset($themetype['_button_bg_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_button_bg_hover_color',
					'label'       => __( 'Background Hover Color', 'kirki' ),
					'section'     => 'button_section',
					'default'     => $themetype['_button_bg_hover_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['_button_bg_hover_color_element'],
							// 'element'  => 'button::before, input[type="button"]::before, input[type="reset"]::before, input[type="submit"]::before, input[type="submit"]::after, .wp-block-search .wp-block-search__button::before, .wp-block-search .wp-block-search__button::after, .nav-previous a::before, .nav-previous a::after, .nav-next a::before, .nav-next a::after, .buttons::before, .buttons::after ,.woocommerce a.button::before, .woocommerce button::before, .woocommerce .single-product button::before, .woocommerce button.button.alt::before, .woocommerce a.button.alt::before,.woocommerce button.button.alt.disabled::before',
							'property' => 'background-color',
						),
					),
				]
			);
		}

		if(isset($themetype['_button_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_button_text_color',
					'label'       => __( 'Button Text Color', 'kirki' ),
					'section'     => 'button_section',
					'default'     => $themetype['_button_text_color'],
					// 'default'     => '#ffffff',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['_button_text_color_element'],
							// 'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
							'property' => 'color',
						),
					),
				]
			);
		}

		if(isset($themetype['_button_texthover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_button_texthover_color',
					'label'       => __( 'Button Text Hover Color', 'kirki' ),
					'section'     => 'button_section',
					'default'     => $themetype['_button_texthover_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['_button_texthover_color_element'],
							// 'element'  => 'button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt.disabled:hover',
							'property' => 'color',
						),
					),
				]
			);
		}

		if(isset($themetype['_button_border_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_button_border_color',
					'label'       => __( 'Border Color', 'kirki' ),
					'section'     => 'button_section',
					'default'     => $themetype['_button_border_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['_button_border_color_element'],
							// 'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
							'property' => 'border-color',
							'suffix'  => ' !important'
						),
					),
				]
			);
		}

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_borderwidth',$themetype['plugiformname'].'_button_border_color',
				'label'    => esc_html__( 'Border Width', 'kirki' ),
				'description' => esc_html__( 'in px', 'kirki' ),
				'section'     => 'button_section',
				'default'  => '1px solid',
				'output' => array(
					array(
						'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
						'property' => 'border',
					),
				),
			]
		);

		if(isset($themetype['_button_border_radius'])){
			new \Kirki\Field\Dimension(
				[
					'settings'    => $themetype['plugiformname'].'_button_border_radius',
					'label'       => esc_html__( 'Border Radius', 'kirki' ),
					'description' => esc_html__( 'in px', 'kirki' ),
					'section'     => 'button_section',
					'default'     => $themetype['_button_border_radius'],
					'choices'     => [
						'accept_unitless' => true,
					],
					'output' => array(
						array(
							'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
							'property' => 'border-radius',
						),
					),
				]
			);
		}

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_button_padding',
				'label'    => esc_html__( 'Button Padding', 'kirki' ),
				'description' => esc_html__( '8px 15px', 'kirki' ),
				'section'     => 'button_section',
				'default'  => esc_html__( '8px 15px', 'kirki' ),
				'output' => array(
					array(
						'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
						'property' => 'padding',
					),
				),
			]
		);

	// Excerpt Options Section
		new \Kirki\Section(
			'expert_option_section',
			[
				'title'       => esc_html__( 'Excerpt Options', 'kirki' ),
				'panel'       => 'global_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => $themetype['plugiformname'].'_excerpt_length',
				'label'    => esc_html__( 'Excerpt Length (Words)', 'kirki' ),
				'section'  => 'expert_option_section',
				'default'  => '',
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_container_read_more_btn',
				'label'       => esc_html__( 'Display Read More Button', 'kirki' ),
				'section'     => 'expert_option_section',
				'default'     => false,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_read_more_btn',
				'label'    => esc_html__( 'Read More Text', 'kirki' ),
				'section'  => 'expert_option_section',
				'default'  => esc_html__( 'Continue reading', 'kirki' ),
				'priority' => 10,
			]
		);

	// Scroll Button Section
		new \Kirki\Section(
			'scroll_btn_section',
			[
				'title'       => esc_html__( 'Scroll Button', 'kirki' ),
				'panel'       => 'global_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => 'display_scroll_button',
				'label'       => esc_html__( 'Display Scroll Button', 'kirki' ),
				'section'     => 'scroll_btn_section',
				'default'     => true,
			]
		);

		if(isset($themetype['_scroll_button_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_scroll_button_bg_color',
					'label'       => __( 'Background Color', 'kirki' ),
					'section'     => 'scroll_btn_section',
					'default'     => $themetype['_scroll_button_bg_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.scrolling-btn',
							'property' => 'background-color',
							'suffix' => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['_scroll_button_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_scroll_button_color',
					'label'       => __( 'Scroll Icon Color', 'kirki' ),
					'section'     => 'scroll_btn_section',
					'default'     => $themetype['_scroll_button_color'],
					// 'default'     => '#ffffff',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.scrolling-btn',
							'property' => 'color',
						),
					),
				]
			);
		}

		if(isset($themetype['_scroll_button_bg_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_scroll_button_bg_hover_color',
					'label'       => __( 'Background Hover Color', 'kirki' ),
					'section'     => 'scroll_btn_section',
					'default'     =>  $themetype['_scroll_button_bg_hover_color'],
					// 'default'     => '#774079',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.scrolling-btn:hover',
							'property' => 'background-color',
							'suffix'   => ' !important',
						),
					),
				]
			);
		}

		if(isset($themetype['_scroll_button_text_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_scroll_button_text_hover_color',
					'label'       => __( 'Icon Hover Color', 'kirki' ),
					'section'     => 'scroll_btn_section',
					'default'     => $themetype['_scroll_button_text_hover_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.scrolling-btn:hover',
							'property' => 'color',
						),
					),
				]
			);
		}
?>