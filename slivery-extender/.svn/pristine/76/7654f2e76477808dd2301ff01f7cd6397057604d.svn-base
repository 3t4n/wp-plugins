<?php
global $themetype;
// Our Sponsors Section
	new \Kirki\Section(
		'our_sponsors_section',
		[
			'title'       => esc_html__( 'Our Sponsors', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_sponsors_main_title',
			'label'    => esc_html__( 'Our Sponsors Title', 'kirki' ),
			'section'  => 'our_sponsors_section',
			'default'  => esc_html__( 'Our Sponsors', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				$themetype['plugiformname'].'_our_sponsors_main_title' => [
					'selector'        => '.our_sponsors_section',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => $themetype['plugiformname'].'_our_sponsors_section_content',
			'label'    => esc_html__( 'Our Sponsors Items Content', 'kirki' ),
			'row_label' => array( 'value' => 'Sponsors item' ),
			'section'  => 'our_sponsors_section',
			'priority' => 10,
			'default'  => [
				[
					'link_url'    => '#',
					'image'    => '',
				],
				[
					'link_url'    => '#',
					'image'    => '',
				],
				[
					'link_url'    => '#',
					'image'    => '',
				],
			],
			'fields'   => [
				'image'    => [
					'type'		  => 'image',
					'label'       => esc_html__( 'Image:', 'kirki' ),
				],
				'link_url'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link URL:', 'kirki' ),
				],
			],
			'choices' => [
				'limit' => ($themetype['themtypeis']=='normal') ? 5 : 100,
			]
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => $themetype['plugiformname'].'_our_sponsors_background_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => '',
			'priority'    => 15,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_sponsors_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => 'center center',
			'priority'    => 20,
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
					'element'  => '.our_sponsors_section',
					'property' => 'background-position',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_sponsors_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => 'scroll',
			'priority'    => 25,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_sponsors_section',
					'property' => 'background-attachment',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_sponsors_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'default'     => 'cover',
			'priority'    => 30,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'auto' => esc_html__( 'Auto', 'kirki' ),
				'cover' => esc_html__( 'Cover', 'kirki' ),
				'contain' => esc_html__( 'Contain', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_sponsors_section',
					'property' => 'background-size',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	if(isset($themetype['our_sponsors_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_sponsors_text_color',
				'label'       => __( 'Text Color', 'kirki' ),
				'section'     => 'our_sponsors_section',
				'default'     => $themetype['our_sponsors_text_color'],
				// 'default'     => '#000000',
				'priority'    => 35,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_sponsors_text_color_element'],
						// 'element'  => '.our_sponsors_section',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_sponsors_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_sponsors_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'our_sponsors_section',
				'default'     => $themetype['our_sponsors_bg_color'],
				// 'default'     => '#f0f9fb',
				'priority'    => 40,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_sponsors_bg_color_element'],
						// 'element'  => '.our_sponsors_section',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_sponsors_arrow_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_sponsors_arrow_color',
				'label'       => __( 'Arrow Color', 'kirki' ),
				'section'     => 'our_sponsors_section',
				'default'     => $themetype['our_sponsors_arrow_color'],
				// 'default'     => '#ffffff',
				'priority'    => 45,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_sponsors_arrow_color_element'],
						// 'element'  => '.our_sponsors_section .our_sponsors_contain .owl-nav button',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_sponsors_arrow_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_sponsors_arrow_bg_color',
				'label'       => __( 'Arrow Background Color', 'kirki' ),
				'section'     => 'our_sponsors_section',
				'default'     => $themetype['our_sponsors_arrow_bg_color'],
				// 'default'     => '#273641',
				'priority'    => 50,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_sponsors_arrow_bg_color_element'],
						// 'element'  => '.our_sponsors_section .our_sponsors_contain .owl-nav button',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_sponsors_arrow_text_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_sponsors_arrow_text_hover_color',
				'label'       => __( 'Arrow Text Hover Color', 'kirki' ),
				'section'     => 'our_sponsors_section',
				'default'     => $themetype['our_sponsors_arrow_text_hover_color'],
				// 'default'     => '#ffffff',
				'priority'    => 55,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_sponsors_arrow_text_hover_color_element'],
						// 'element'  => '.our_sponsors_section .our_sponsors_contain button.owl-prev:hover,
						// 				.our_sponsors_section .our_sponsors_contain button.owl-next:hover',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_sponsors_arrow_bghover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_sponsors_arrow_bghover_color',
				'label'       => __( 'Arrow Background Hover Color', 'kirki' ),
				'section'     => 'our_sponsors_section',
				'default'     => $themetype['our_sponsors_arrow_bghover_color'],
				// 'default'     => '#4f2d4f',
				'priority'    => 60,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_sponsors_arrow_bghover_color_element'],
						// 'element'  => '.our_sponsors_section .our_sponsors_contain button.owl-prev:hover,
						// 				.our_sponsors_section .our_sponsors_contain button.owl-next:hover',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_sponsors_slider_autoplay',
			'label'       => esc_html__( 'Autoplay', 'kirki' ),
			'section'     => 'our_sponsors_section',
			'priority' 	  => 65,
			'default'     => 'true',
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'true' => esc_html__( 'True', 'kirki' ),
				'false' => esc_html__( 'False', 'kirki' ),
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_sponsors_slider_autoplay_speed',
			'label'    => esc_html__( 'AutoplaySpeed', 'kirki' ),
			'section'  => 'our_sponsors_section',
			'default'  => esc_html__( '1000', 'kirki' ),
			'priority' => 70,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_sponsors_autoplay_timeout',
			'label'    => esc_html__( 'AutoplayTimeout', 'kirki' ),
			'section'  => 'our_sponsors_section',
			'default'  => esc_html__( '5000', 'kirki' ),
			'priority' => 75,
		]
	);
?>