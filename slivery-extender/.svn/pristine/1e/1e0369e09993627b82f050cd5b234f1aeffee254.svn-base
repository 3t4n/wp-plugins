<?php
global $themetype;
// Featured Slider Section
	new \Kirki\Section(
		'featured_slider_section',
		[
			'title'       => esc_html__( 'Featured Slider', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => $themetype['plugiformname'].'_featuredimage_slider',
			'label'    => esc_html__( 'Featured Slider Items Content', 'kirki' ),
			'row_label' => array( 'value' => 'Slider item' ),
			'section'  => 'featured_slider_section',
			'priority' => 10,
			'default'  => [
				[
					'image'    => '',
					'title'    => esc_html__('New Skills', 'kirki' ),
					'text'    => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text.', 'kirki' ),
					'link_url'    => esc_html__('#', 'kirki' ),
					'link_text'   => esc_html__( 'Button', 'kirki' ),
				],
			],
			'fields'   => [
				'image'    => [
					'type'		  => 'image',
					'label'       => esc_html__( 'Image:', 'kirki' ),
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
					'label'       => esc_html__( 'Link URL', 'kirki' ),
				],
				'link_text'   => [
					'type'        => 'text',
					'label'       => esc_html__( 'Button text:', 'kirki' ),
				],
			],
			// 'partial_refresh'    => [
			// 	$themetype['plugiformname'].'_featuredimage_slider' => [
			// 		'selector'        => '.featured_slider_image',
			// 		// 'render_callback' => $themetype['plugiformname'].'_featuredimage_slider',
			// 	],
			// ],
			'choices' => [
				'limit' => ($themetype['themtypeis']=='normal') ? 1 : 100,
			]
		]
	);

	// Slider Design 
		if(isset($themetype['silvery_featured_slider_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_text_color',
					'label'       => __( 'Text Color', 'kirki' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 20,
					'default'     => $themetype['silvery_featured_slider_text_color'],
					// 'default'     => '#ffffff',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_disc, .featured_slider_title h1',
							'property' => 'color',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_featured_slider_arrow_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_text_color',
					'label'       => __( 'Arrow Text Color', 'kirki' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 30,
					'default'     => $themetype['silvery_featured_slider_arrow_text_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image .owl-nav button',
							'property' => 'color',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_featured_slider_arrow_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_bg_color',
					'label'       => __( 'Arrow Background Color', 'kirki' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 40,
					'default'     => $themetype['silvery_featured_slider_arrow_bg_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image .owl-nav button',
							'property' => 'background',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_featured_slider_arrow_text_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_text_hover_color',
					'label'       => __( 'Arrow Text Hover Color', 'kirki' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 50,
					'default'     => $themetype['silvery_featured_slider_arrow_text_hover_color'],
					// 'default'     => '#ffffff',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image button.owl-prev:hover, .featured_slider_image button.owl-next:hover',
							'property' => 'color',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['silvery_featured_slider_arrow_bg_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_bg_hover_color',
					'label'       => __( 'Arrow Background Hover Color', 'kirki' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 60,
					'default'     => $themetype['silvery_featured_slider_arrow_bg_hover_color'],
					// 'default'     => '#4f2d4f',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image button.owl-prev:hover, .featured_slider_image button.owl-next:hover',
							'property' => 'background',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		new \Kirki\Field\Select(
			[
				'settings'    => 'silvery_featured_slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'kirki' ),
				'section'     => 'featured_slider_section',
				'priority' 	  => 70,
				'default'     => 'true',
				'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
				'choices'     => [
					'true' => esc_html__( 'True', 'kirki' ),
					'false' => esc_html__( 'False', 'kirki' ),
				],
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => 'silvery_featured_slider_autoplay_speed',
				'label'    => esc_html__( 'AutoplaySpeed', 'kirki' ),
				'section'  => 'featured_slider_section',
				'default'  => esc_html__( '1000', 'kirki' ),
				'priority' => 80,
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => 'silvery_featured_slider_autoplay_timeout',
				'label'    => esc_html__( 'AutoplayTimeout', 'kirki' ),
				'section'  => 'featured_slider_section',
				'default'  => esc_html__( '5000', 'kirki' ),
				'priority' => 90,
			]
		);
?>