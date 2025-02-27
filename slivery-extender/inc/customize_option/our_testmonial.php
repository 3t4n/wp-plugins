<?php
global $themetype;
// Our Testimonial Section
	new \Kirki\Section(
		'our_testimonial_section',
		[
			'title'       => esc_html__( 'Our Testimonial', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'our_testimonial_main_title',
			'label'    => esc_html__( 'Our Testimonial Title', 'kirki' ),
			'section'  => 'our_testimonial_section',
			'default'  => esc_html__( 'Our Testimonial', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				'our_testimonial_main_title' => [
					'selector'        => '.our_testimonial_section',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'our_testimonial_desc',
			'label'    => esc_html__( 'Our Testimonial Discription', 'kirki' ),
			'section'  => 'our_testimonial_section',
			'default'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'kirki' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => 'our_testimonial_content',
			'label'    => esc_html__( 'Our Testimonial Items Content', 'kirki' ),
			'row_label' => array( 'value' => 'Testimonial item' ),
			'section'  => 'our_testimonial_section',
			'priority' => 15,
			'default'  => [
				[

					'image'    => '',
					'title'    => 'Rizon Pet',
					'subtitle'    => 'Project Manager',
					'text'    => 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.',
				],
				[
					'image'    => '',
					'title'    => 'Glenn Maxwell',
					'subtitle'    => 'Project Manager',
					'text'    => 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.',
				],
				[
					'image'    => '',
					'title'    => 'Aaron Finch',
					'subtitle'    => 'Project Manager',
					'text'    => 'Cricket is a bat-and-ball game played between two teams of eleven players each on a field at the centre.',
				],
			],
			'fields'   => [
				'image'    => [
					'type'		  => 'image',
					'label'       => esc_html__( 'Image:', 'kirki' ),
				],
				'title'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Title:', 'kirki' ),
				],
				'subtitle'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Subtitle:', 'kirki' ),
				],
				'text'    => [
					'type'        => 'textarea',
					'label'       => esc_html__( 'Text:', 'kirki' ),
				],
			],
			'choices' => [
				'limit' => ($themetype['themtypeis']=='normal') ? 3 : 100,
			]
		]
	);

	if(isset($themetype['our_testimonial_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_bg_color'],
				// 'default'     => '#f6f6f6',
				'priority'    => 20,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_bg_color_element'],
						// 'element'  => '.our_testimonial_section',
						'property' => 'background',
					),
				),
			]
		);
	}

	new \Kirki\Field\Image(
		[
			'settings'    => 'our_testimonial_background_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'our_testimonial_section',
			'default'     => '',
			'priority'    => 25,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_testimonial_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'our_testimonial_section',
			'default'     => 'center center',
			'priority'    => 30,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
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
					'element'  => '.our_testimonial_section',
					'property' => 'background-position',
					'suffix'   => '!important',	
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_testimonial_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'our_testimonial_section',
			'default'     => 'scroll',
			'priority'    => 35,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_testimonial_section',
					'property' => 'background-attachment',
					'suffix'   => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_testimonial_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'our_testimonial_section',
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
					'element'  => '.our_testimonial_section',
					'property' => 'background-size',
					'suffix'   => '!important',
				),
			),
		]
	);

	if(isset($themetype['our_testimonial_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_text_color',
				'label'       => __( 'Text Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_text_color'],
				// 'default'     => '#333',
				'priority'    => 45,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_text_color_element'],
						// 'element'  => '.our_testimonial_section .testimonial_title h2, .our_testimonial_section .our_testimonial_main_disc p',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_quote_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_quote_color',
				'label'       => __( 'Quote Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_quote_color'],
				// 'default'     => '#dedddd',
				'priority'    => 50,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_quote_color_element'],
						// 'element'  => '.our_testimonial_icon i, .our_testimonial_data_info:before, .our_testimonial_data_info:after',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_quote_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_quote_hover_color',
				'label'       => __( 'Quote Hover Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_quote_hover_color'],
				'priority'    => 55,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_quote_hover_color_element'],
						// 'element'  => '.our_testimonial_icon i:hover, .testimonials_title h3:hover:before',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_contain_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_contain_bg_color',
				'label'       => __( 'Contain Background Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_contain_bg_color'],
				'priority'    => 60,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						// 'element'  => '.our_testimonial_section .our_testimonial_info .testinomial_owl_slider .our_testimonial_data_info',
						'element'  => $themetype['our_testimonial_contain_bg_color_element'],
						'property' => 'background',
					),
					array(
						'element'  => $themetype['our_testimonial_contain_bg_color_border_element'],
						// 'element'  => '.testimonials_data .testinomial_description p:before',
						'property' => 'border-top-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_contain_description_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_contain_description_bg_color',
				'label'       => __( 'Contain Description Background Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_contain_description_bg_color'],
				'priority'    => 65,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_contain_description_bg_color_element'],
						// 'element'  => '.testinomial_description',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_arrow_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_arrow_bg_color',
				'label'       => __( 'Arrow Background Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_arrow_bg_color'],
				'priority'    => 70,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_arrow_bg_color_element'],
						// 'element'  => '.our_testimonial_section .testinomial_owl_slider .owl-nav button',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_arrow_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_arrow_text_color',
				'label'       => __( 'Arrow Text Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_arrow_text_color'],
				// 'default'     => '#ffffff',
				'priority'    => 75,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_arrow_text_color_element'],
						// 'element'  => '.our_testimonial_section .testinomial_owl_slider .owl-nav button',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_arrow_text_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_arrow_text_hover_color',
				'label'       => __( 'Arrow Text Hover Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_arrow_text_hover_color'],
				// 'default'     => '#ffffff',
				'priority'    => 80,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_arrow_text_hover_color_element'],
						// 'element'  => '.our_testimonial_section button.owl-prev:hover,
						// 				.our_testimonial_section button.owl-next:hover',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_arrow_bg_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_arrow_bg_hover_color',
				'label'       => __( 'Arrow Background Hover Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_arrow_bg_hover_color'],
				// 'default'     => '#5c355d',
				'priority'    => 85,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_arrow_bg_hover_color_element'],
						// 'element'  => '.our_testimonial_section button.owl-prev:hover,
						// 				.our_testimonial_section button.owl-next:hover',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_headline_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_headline_text_color',
				'label'       => __( 'Headline Text Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_headline_text_color'],
				'priority'    => 90,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_headline_text_color_element'],
						// 'element'  => '.our_testimonial_section .testinomial_owl_slider .testimonials_title h3',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_subheadline_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_subheadline_text_color',
				'label'       => __( 'SubHeadline Text Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_subheadline_text_color'],
				'priority'    => 95,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_subheadline_text_color_element'],
						// 'element'  => '.our_testimonial_section .testinomial_owl_slider .testimonials_title h4',
						'property' => 'color',
					),
				),
			]
		);
	}
	
	if(isset($themetype['our_testimonial_img_hover_border_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_img_hover_border_color',
				'label'       => __( 'Image Hover Border Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_img_hover_border_color'],
				'priority'    => 100,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_img_hover_border_color_element'],
						'property' => 'border-color',
					),
					array(
						'element'  => $themetype['our_testimonial_img_hover_border_color_element'],
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_testimonial_container_description_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_testimonial_container_description_color',
				'label'       => __( 'Container Description Text Color', 'kirki' ),
				'section'     => 'our_testimonial_section',
				'default'     => $themetype['our_testimonial_container_description_color'],
				'priority'    => 110,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_testimonial_container_description_color_element'],
						// 'element'  => '.testinomial_description p',
						'property' => 'color',
					),
				),
			]
		);
	}

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_testimonial_slider_autoplay',
			'label'       => esc_html__( 'Autoplay', 'kirki' ),
			'section'     => 'our_testimonial_section',
			'priority' 	  => 130,
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
			'settings' => $themetype['plugiformname'].'_our_testimonial_slider_autoplay_speed',
			'label'    => esc_html__( 'AutoplaySpeed', 'kirki' ),
			'section'  => 'our_testimonial_section',
			'default'  => esc_html__( '1000', 'kirki' ),
			'priority' => 140,
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => $themetype['plugiformname'].'_our_testimonial_autoplay_timeout',
			'label'    => esc_html__( 'AutoplayTimeout', 'kirki' ),
			'section'  => 'our_testimonial_section',
			'default'  => esc_html__( '5000', 'kirki' ),
			'priority' => 150,
		]
	);
?>