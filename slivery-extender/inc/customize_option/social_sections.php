<?php
global $themetype;

	// animation
	new \Kirki\Section(
		'animation_option',
		[
			'title'       => esc_html__( 'Theme Animation', 'kirki' ),
			'priority'    => 5,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'goldy_enable_animation',
			'label'       => esc_html__( 'Enable Animation', 'kirki' ),
			'section'     => 'animation_option',
			'default'     => true,
		]
	);

	// Loader Section
	new \Kirki\Section(
		'loader_section',
		[
			'title'       => esc_html__( 'Theme Loader', 'kirki' ),
			'priority'    => 5,
		]
	);

	new \Kirki\Field\Checkbox_Switch(
		[
			'settings'    => 'goldy_enable_loader_option',
			'label'       => esc_html__( 'Enable Loader', 'kirki' ),
			'section'     => 'loader_section',
			'default'     => false,
			'priority' => 5,
		]
	);

	if(isset($themetype['goldy_loader_image'])){
		new \Kirki\Field\Image(
			[
				'settings'    => 'goldy_loader_image',
				'label'       => esc_html__( 'Loader Image', 'kirki' ),
				'section'     => 'loader_section',
				'default'     => $themetype['goldy_loader_image'],
				// 'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				'priority' => 10,
			]
		);
	}

	if(isset($themetype['goldy_loader_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_loader_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'loader_section',
				'default'     => $themetype['goldy_loader_bg_color'],
				// 'default'     => 'rgba(0, 0, 0, 0.8)',
				'priority' => 15,
				'choices'     => [
					'alpha' => false,
				],
				'output' => array(
					array(
						'element'  => '.goldy-reload-content',
						'property' => 'background-color',
					),
				),
			]
		);
	}


// social Info Section
	new \Kirki\Panel(
		'social_option',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Social Info', 'kirki' ),
			
		]
	);
		

	// Contact Info
		new \Kirki\Section(
			'contact_section',
			[
				'title'       => esc_html__( 'Contact Info', 'kirki' ),
				'panel'       => 'social_option',
				'priority'    => 160,
			]
		);
		
	// Timing Info
		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_opening_time',
				'label'    => esc_html__( 'Opening Time', 'kirki' ),
				'section'  => 'contact_section',
				'default'  => esc_html__( 'Mon - Sat: 8.00 - 18.00', 'kirki' ),
				'priority' => 10,
				'partial_refresh'    => [
					$themetype['plugiformname'].'_opening_time' => [
						'selector'        => '.contact_data',
						'render_callback' => function() {
						    return true;
						}
					],
				],
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_contact_info_number',
				'label'    => esc_html__( 'Contact Info Number', 'kirki' ),
				'section'  => 'contact_section',
				'default'  => esc_html__( '04463235323', 'kirki' ),
				'priority' => 10,
				'partial_refresh'    => [
					$themetype['plugiformname'].'_contact_info_number' => [
						'selector'        => '.contact_data',
						'render_callback' => function() {
						    return true;
						}
					],
				],
			]
		);

	// Email info
		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_email_info_number',
				'label'    => esc_html__( 'Email ID', 'kirki' ),
				'section'  => 'contact_section',
				'goldy_mex_email_info_number'  => 'info@example.com',
				'priority' => 10,
				'partial_refresh'    => [
					$themetype['plugiformname'].'_email_info_number' => [
						'selector'        => '.email_data',
						'render_callback' => function() {
						    return true;
						}
					],
				],
			]
		);

		// new \Kirki\Field\Color(
		// 	[
		// 		'settings'    => 'silvery_social_icon_color',
		// 		'label'       => __( 'Icon Color', 'kirki' ),
		// 		'section'     => 'social_section',
		// 		'default'     => $themetype['silvery_social_icon_color'],
		// 		// 'default'     => '#214462',
		// 		'priority'    => 160,
		// 		'choices'     => [
		// 			'alpha' => true,
		// 		],
		// 		'output' => array(
		// 			array(
		// 				'element'  => 'a.social_icon',
		// 				'property' => 'color',
		// 			),
		// 		),
		// 	]
		// );

	// Social Info Section
		new \Kirki\Section(
			'social_section',
			[
				'title'       => esc_html__( 'Social Info', 'kirki' ),
				'panel'       => 'social_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_display_social_icon',
				'label'       => esc_html__( 'Display Social Icon', 'kirki' ),
				'section'     => 'social_section',
				'default'     => true,
			]
		);

		new \Kirki\Field\Repeater(
			[
				'settings' => $themetype['plugiformname'].'_social_icon_section_content',
				'label'    => esc_html__( 'Info Items Content', 'kirki' ),
				'section'  => 'social_section',
			    'row_label' => array( 'value' => 'Icon item' ),
				'priority' => 10,
				'default'  => [
					[
						'icon_value'    => 'fa-facebook',
						'link_url'    => '#',
					],
					[
						'icon_value'    => 'fa-linkedin',
						'link_url'    => '#',
					],
					[
						'icon_value'    => 'fa-instagram',
						'link_url'    => '#',
					],
					[
						'icon_value'    => 'fa-twitter',
						'link_url'    => '#',
					],
				],
				'fields'   => [
					'icon_value'    => [
						'type'        => 'text',
						'label'       => esc_html__( 'Social Icon:', 'kirki' ),
						'description' => sprintf(esc_html__( 'Note: Some icons may not be displayed here. You can see the full list of icons at %1$s.', 'kirki' ),
						sprintf( '<a href="https://fontawesome.com/v4/icons/" rel="nofollow">%s</a>', esc_html__( 'http://fontawesome.io/icons/', 'kirki' ) )
					),
					],
					'link_url'    => [
						'type'        => 'text',
						'label'       => esc_html__( 'Link:', 'kirki' ),
						'default'     => '#',
					],
				],
				'partial_refresh'    => [
					$themetype['plugiformname'].'_social_icon_section_content' => [
						'selector'        => '.social_data',
						'render_callback' => function() {
						    return true;
						}
					],
				],

				'choices' => [
					'limit' => ($themetype['themtypeis']=='normal') ? 4 : 100,
				]
			]
		);
		// print_r($themetype);
		
		if(isset($themetype['silvery_social_icon_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_social_icon_color',
					'label'       => __( 'Icon Color', 'kirki' ),
					'section'     => 'social_section',
					'default'     => $themetype['silvery_social_icon_color'],
					// 'default'     => '#214462',
					'priority'    => 160,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvery_social_icon_color_element'],
							// 'element'  => 'header#masthead a.social_icon',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_social_icon_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_social_icon_bg_color',
					'label'       => __( 'Icon Background Color', 'kirki' ),
					'section'     => 'social_section',
					'default'     => $themetype['silvery_social_icon_bg_color'],
					'priority'    => 160,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvery_social_icon_bg_color_element'],
							// 'element'  => '.social_icon i',
							'property' => 'background',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_social_icon_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_social_icon_hover_color',
					'label'       => __( 'Icon Hover Color', 'kirki' ),
					'section'     => 'social_section',
					'default'     => $themetype['silvery_social_icon_hover_color'],
					'priority'    => 160,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvery_social_icon_hover_color_element'],
							// 'element'  => 'header#masthead a.social_icon:hover',
							'property' => 'color',
							'suffix'   => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_social_icon_hover_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_social_icon_hover_bg_color',
					'label'       => __( 'Icon Background Hover Color', 'kirki' ),
					'section'     => 'social_section',
					'default'     => $themetype['silvery_social_icon_hover_bg_color'],
					'priority'    => 160,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvery_social_icon_hover_bg_color_element'],
							// 'element'  => '.social_icon i:hover',
							'property' => 'background',
						),
					),
				]
			);
		}

	// Tob Bar Width
		new \Kirki\Section(
			'top_bar_section',
			[
				'title'       => esc_html__( 'Top Bar Width', 'kirki' ),
				'panel'       => 'social_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Select(
			[
				'settings'    => $themetype['plugiformname'].'_top_bar_width_layout',
				'label'       => esc_html__( 'Top Bar Width Layouts', 'kirki' ),
				'section'     => 'top_bar_section',
				'default'     => 'content_width',
				'choices'     => [
					'full_width' => esc_html__( 'Full Width', 'kirki' ),
					'content_width' => esc_html__( 'Content Width', 'kirki' ),
				],
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => $themetype['plugiformname'].'_top_bar_container_width',
				'label'    => esc_html__( 'Top Bar Content Width', 'kirki' ),
				'description' => esc_html__( 'in px', 'kirki' ),
				'section'  => 'top_bar_section',
				'default'  => 1100,
			]
		);
?>