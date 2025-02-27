<?php
global $themetype;
// Featured Section
	new \Kirki\Section(
		'featured_section',
		[
			'title'       => esc_html__( 'Featured Section', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_featured_section_main_title',
			'label'    => esc_html__( 'Featured Section Title', 'kirki' ),
			'section'  => 'featured_section',
			'default'  => esc_html__( 'Featured Section', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				$themetype['plugiformname'].'_featured_section_main_title' => [
					'selector'        => '.featured-section_data',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_featured_section_description',
			'label'    => esc_html__( 'Featured Section Discription', 'kirki' ),
			'section'  => 'featured_section',
			'default'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'kirki' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => $themetype['plugiformname'].'_featured_section_content',
			'label'    => esc_html__( 'featured Items Content', 'kirki' ),
			'row_label' => array( 'value' => 'Info item' ),
			'section'  => 'featured_section',
			'priority' => 15,
			'default'  => [
				[
					'icon_value'    => 'fa-cloud',
					'title'    => 'Featured title 1',
					'text'    => 'this is featured.',
					'link_url'    => '#',	
				],
				[
					'icon_value'    => 'fa-facebook',
					'title'    => 'Featured title 2',
					'text'    => 'this is featured.',
					'link_url'    => '#',	
				],
				[
					'icon_value'    => 'fa-twitter',
					'title'    => 'Featured title 3',
					'text'    => 'this is featured.',
					'link_url'    => '#',	
				],
			],
			'fields'   => [
				'icon_value'    => [
					'type'		  => 'text',
					'label'       => esc_html__( 'Icon:', 'kirki' ),
					'description' => sprintf(esc_html__( 'Note: Some icons may not be displayed here. You can see the full list of icons at %1$s.', 'kirki' ),
						sprintf( '<a href="https://fontawesome.com/v4/icons/" rel="nofollow">%s</a>', esc_html__( 'http://fontawesome.io/icons/', 'kirki' ) )
					),
				],
				'title'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Title', 'kirki' ),
				],
				'text'    => [
					'type'        => 'textarea',
					'label'       => esc_html__( 'Text', 'kirki' ),
				],
				'link_url'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link URL:', 'kirki' ),
				],
			],
			// 'partial_refresh'    => [
			// 	$themetype['plugiformname'].'_featured_section_content' => [
			// 		'selector'        => '.theme_section_info',
			// 		// 'render_callback' => $themetype['plugiformname'].'_featured_section_content',
			// 	],
			// ],
			'choices' => [
				'limit' => ($themetype['themtypeis']=='normal') ? 3 : 100,
			]
		]
	);

	if(isset($themetype['featured_section_icon_size'])){
		new \Kirki\Field\Text(
			[
				'settings' => 'featured_section_icon_size',
				'label'    => esc_html__( 'Icon Size', 'kirki' ),
				'description' => esc_html__( 'in px', 'kirki' ),
				'section'  => 'featured_section',
				'priority'    => 20,
				'default'  => $themetype['featured_section_icon_size'],
				'output' => array(
					array(
						'element'  => '.featured_section_info .featured_content .featured-thumbnail i',
						'property' => 'font-size'
					),
					array(
						'element'  => '.featured_section_info .featured_content .featured-thumbnail i',
						'property' => 'width'
					),
					array(
						'element'  => '.featured_section_info .featured_content .featured-thumbnail i',
						'property' => 'height'
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_item_limit'])){
		new \Kirki\Field\Text(
			[
				'settings'    => 'featured_section_item_limit',
				'label'       => esc_html__( 'Item Limit', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_item_limit'],
				'priority'    => 25,
			]
		);
	}

	new \Kirki\Field\Image(
		[
			'settings'    => 'featured_section_bg_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'featured_section',
			'default'     => '',
			'priority'    => 25,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'featured_section_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'featured_section',
			'default'     => 'center center',
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'priority'    => 30,
			'choices'     => [
				'left top' => esc_html__( 'Left Top', 'kirki' ),
				'left center' => esc_html__( 'Left Center', 'kirki' ),
				'left bottom' => esc_html__( 'Left Bottom', 'kirki' ),
				'right top' => esc_html__( 'Right Top', 'kirki' ),
				'right center' => esc_html__( 'Right Center', 'kirki' ),
				'right bottom' => esc_html__( 'Right Bottom', 'kirki' ),
				'center top' => esc_html__( 'Center Top', 'kirki' ),
				'center center' => esc_html__( 'Center Center', 'kirki' ),
				'center bottom' => esc_html__( 'Center Bottom', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.featured-section_data',
					'property' => 'background-position',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'featured_section_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'featured_section',
			'default'     => 'scroll',
			'priority'    => 35,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.featured-section_data',
					'property' => 'background-attachment',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'featured_section_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'featured_section',
			'default'     => 'cover',
			'priority'    => 40,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'auto' => esc_html__( 'Auto', 'kirki' ),
				'cover' => esc_html__( 'Cover', 'kirki' ),
				'contain' => esc_html__( 'Contain', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.featured-section_data',
					'property' => 'background-size',
				),
			),
		]
	);

	if(isset($themetype['featured_section_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_bg_color'],
				// 'default'     => '#ffffff',
				'priority'    => 45,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.featured-section_data',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_text_color',
				'label'       => __( 'Text Color', 'goldy-mex' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_text_color'],
				// 'default'     => '#333333',
				'priority'    => 50,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.featured-section_data',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_contain_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_contain_bg_color',
				'label'       => __( 'Contain Background Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_contain_bg_color'],
				'priority'    => 55,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_contain_bg_color_element'],
						// 'element'  => '.section-featured-wrep',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_bg_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_bg_hover_color',
				'label'       => __( 'Contain Background Hover Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_bg_hover_color'],
				'priority'    => 60,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_bg_hover_color_element'],
						// 'element'  => '.section-featured-wrep:hover',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_contain_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_contain_text_color',
				'label'       => __( 'Contain Text Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_contain_text_color'],
				// 'default'     => '#273641',
				'priority'    => 65,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_contain_text_color_element'],
						// 'element'  => '.section-featured-wrep, .section-featured-wrep:hover',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_icon_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_icon_color',
				'label'       => __( 'Icon Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_icon_color'],
				'priority'    => 75,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_icon_color_element'],
						// 'element'  => '.featured-section_data .featured_content .featured-icon',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_icon_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_icon_bg_color',
				'label'       => __( 'Icon Background Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_icon_bg_color'],
				'priority'    => 80,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_icon_bg_color_element'],
						// 'element'  => '.featured-section_data .featured_content .featured-icon',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_icon_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_icon_hover_color',
				'label'       => __( 'Icon Hover Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_icon_hover_color'],
				// 'default'     => '#273641',
				'priority'    => 85,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_icon_hover_color_element'],
						// 'element'  => '.featured-section_data .section-featured-wrep:hover i',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_icon_bg_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_icon_bg_hover_color',
				'label'       => __( 'Icon Background Hover Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_icon_bg_hover_color'],
				// 'default'     => '#fcf5f4',
				'priority'    => 90,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_icon_bg_hover_color_element'],
						// 'element'  => '.section-featured-wrep:hover .featured-icon',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['featured_section_border_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'featured_section_border_color',
				'label'       => __( 'Border Color', 'kirki' ),
				'section'     => 'featured_section',
				'default'     => $themetype['featured_section_border_color'],
				'priority'    => 95,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['featured_section_border_color_background_element'],
						// 'element'  => '.featured-section_data .featured_content .featured-thumbnail:after',
						'property' => 'background-color',
					),
					array(
						'element'  => $themetype['featured_section_border_color_border_element'],
						// 'element'  => '.section-featured-wrep .fea-brd',
						'property' => 'border-color',
					),
				),
			]
		);
	}

	new \Kirki\Field\Text(
		[
			'settings' => 'featured_section_Margin',
			'label'    => esc_html__( 'Margin', 'kirki' ),
			'description' => esc_html__( 'in px', 'kirki' ),
			'section'     => 'featured_section',
			'default'  => esc_html__( '0px 0px 0px 0px', 'kirki' ),
			'priority' => 100,
			'output' => array(
				array(
					'element'  => '.featured-section_data',
					'property' => 'margin',
				),
			),
		]
	);
?>