<?php
global $themetype;
// Our Services Section
	new \Kirki\Section(
		'our_services_section',
		[
			'title'       => esc_html__( 'Our Services', 'kirki' ),
			'panel'       => 'globly_theme_option',
			// 'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_main_title',
			'label'    => esc_html__( 'Our Services Title', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'Our Services', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				$themetype['plugiformname'].'_our_services_main_title' => [
					'selector'        => '.our_services_title',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => $themetype['plugiformname'].'_our_services_background_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'our_services_section',
			'default'     => '',
			'priority'    => 15,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_services_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'our_services_section',
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
					'element'  => '.services_section',
					'property' => 'background-position',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_services_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'our_services_section',
			'default'     => 'scroll',
			'priority'    => 25,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.services_section',
					'property' => 'background-attachment',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => $themetype['plugiformname'].'_our_services_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'our_services_section',
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
					'element'  => '.services_section',
					'property' => 'background-size',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_first_widget_title',
			'label'    => esc_html__( 'Services First Widget Title', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'New Skills', 'kirki' ),
			'priority' => 35,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_first_widget_desc',
			'label'    => esc_html__( 'Services First Widget Description', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.', 'kirki' ),
			'priority' => 40,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_second_widget_title',
			'label'    => esc_html__( 'Services Second Widget Title', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( '23 Hours Services', 'kirki' ),
			'priority' => 45,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_second_widget_desc',
			'label'    => esc_html__( 'Services Second Widget Description', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'kirki' ),
			'priority' => 50,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_title',
			'label'    => esc_html__( 'Services Third Widget Title', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'opening Hours', 'kirki' ),
			'priority' => 55,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_desc1',
			'label'    => esc_html__( 'Services Days', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'Monday-Friday', 'kirki' ),
			'priority' => 60,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_desc2',
			'label'    => esc_html__( 'Services Open/Close Time', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( '9:00AM To 11:00PM', 'kirki' ),
			'priority' => 65,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_desc3',
			'label'    => esc_html__( 'Services Days', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'Saturday', 'kirki' ),
			'priority' => 70,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_desc4',
			'label'    => esc_html__( 'Services Open/Close Time', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( '10:00AM To 9:00PM', 'kirki' ),
			'priority' => 75,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_desc5',
			'label'    => esc_html__( 'Services Days', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( 'Sunday', 'kirki' ),
			'priority' => 80,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_services_third_widget_desc6',
			'label'    => esc_html__( 'Services Open/Close Time', 'kirki' ),
			'section'  => 'our_services_section',
			'default'  => esc_html__( '10:00AM To 5:00PM', 'kirki' ),
			'priority' => 85,
		]
	);

	if(isset($themetype['our_services_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_bg_color'],
				'priority' => 90,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_bg_color_element'],
						// 'element'  => '.services_section',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_services_first_widget_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_first_widget_bg_color',
				'label'       => __( 'First Widget Background Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_first_widget_bg_color'],
				'priority' 	  => 100,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_first_widget_bg_color_element'],
						// 'element'  => '.widget_section_one',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_services_first_widget_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_first_widget_text_color',
				'label'       => __( 'Widget Text Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_first_widget_text_color'],
				'priority' 	  => 110,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_first_widget_text_color_element'],
						// 'element'  => '.widget_section_one',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_services_second_widget_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_second_widget_bg_color',
				'label'       => __( 'Second Widget Background Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_second_widget_bg_color'],
				'priority' 	  => 120,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_second_widget_bg_color_element'],
						// 'element'  => '.widget_section_two',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_services_second_widget_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_second_widget_text_color',
				'label'       => __( 'Widget Text Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_second_widget_text_color'],
				'priority' 	  => 125,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_second_widget_text_color_element'],
						// 'element'  => '.widget_section_two',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_services_third_widget_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_third_widget_bg_color',
				'label'       => __( 'Third Widget Background Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_third_widget_bg_color'],
				'priority' 	  => 135,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_third_widget_bg_color_element'],
						// 'element'  => '.widget_section_three',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_services_third_widget_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_services_third_widget_text_color',
				'label'       => __( 'Widget Text Color', 'kirki' ),
				'section'     => 'our_services_section',
				'default'     => $themetype['our_services_third_widget_text_color'],
				'priority' 	  => 140,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_services_third_widget_text_color_element'],
						// 'element'  => '.widget_section_three',
						'property' => 'color',
					),
				),
			]
		);
	}

?>