<?php
global $themetype;
// Our Team Section
	new \Kirki\Section(
		'our_team_section',
		[
			'title'       => esc_html__( 'Our Team', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_team_main_title',
			'label'    => esc_html__( 'Our Team Title', 'kirki' ),
			'section'  => 'our_team_section',
			'default'  => esc_html__( 'Our Team', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				$themetype['plugiformname'].'_our_team_main_title' => [
					'selector'        => '.our_team_section',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_team_desc',
			'label'    => esc_html__( 'Our Team Discription', 'kirki' ),
			'section'  => 'our_team_section',
			'default'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'kirki' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => $themetype['plugiformname'].'_our_team_content',
			'label'    => esc_html__( 'Our Team Items Content', 'kirki' ),
			'row_label' => array( 'value' => 'Team item' ),
			'section'  => 'our_team_section',
			'priority' => 15,
			'default'  => [
				[
					'image'    => '',
					'title'    => 'Rizon Pet',
					'subtitle'    => 'Project Manager',
					'link_url'    => '#',
				],
				[
					'image'    => '',
					'title'    => 'Glenn Maxwell',
					'subtitle'    => 'Project Manager',
					'link_url'    => '#',
				],
				[
					'image'    => '',
					'title'    => 'Aaron Finch',
					'subtitle'    => 'Project Manager',
					'link_url'    => '#',
				],
				[
					'image'    => '',
					'title'    => 'Christiana Ena',
					'subtitle'    => 'Project Manager',
					'link_url'    => '#',
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
				'link_url'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link URL:', 'kirki' ),
				],
			],
			'choices' => [
				'limit' => ($themetype['themtypeis']=='normal') ? 4 : 100,
			]
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'our_team_bg_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'our_team_section',
			'default'     => '',
			'priority'    => 20,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_team_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'our_team_section',
			'default'     => 'center center',
			'priority'    => 25,
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
					'element'  => '.our_team_section',
					'property' => 'background-position',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_team_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'our_team_section',
			'default'     => 'scroll',
			'priority'    => 30,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_team_section',
					'property' => 'background-attachment',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_team_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'our_team_section',
			'default'     => 'cover',
			'priority'    => 35,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'auto' => esc_html__( 'Auto', 'kirki' ),
				'cover' => esc_html__( 'Cover', 'kirki' ),
				'contain' => esc_html__( 'Contain', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_team_section',
					'property' => 'background-size',
					'suffix' 	  => '!important',
				),
			),
		]
	);

	if(isset($themetype['our_team_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_team_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'our_team_section',
				'default'     => $themetype['our_team_bg_color'],
				// 'default'     => '#f0f9fb',
				'priority'    => 40,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_team_bg_color_element'],
						// 'element'  => '.our_team_section',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_team_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_team_text_color',
				'label'       => __( 'Text Color', 'kirki' ),
				'section'     => 'our_team_section',
				'default'     => $themetype['our_team_text_color'],
				// 'default'     => '#333',
				'priority'    => 45,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_team_text_color_element'],
						// 'element'  => '.our_team_section .our_team_main_title',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_team_container_text_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_team_container_text_hover_color',
				'label'       => __( 'Contain Text Hover Color', 'kirki' ),
				'section'     => 'our_team_section',
				'default'     => $themetype['our_team_container_text_hover_color'],
				'priority'    => 50,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_team_container_text_hover_color_element'],
						// 'element'  => '.our_team_container:hover .our_team_title a, .our_team_container:hover .our_team_headline p',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_team_link_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_team_link_color',
				'label'       => __( 'Link Color', 'kirki' ),
				'section'     => 'our_team_section',
				'default'     => $themetype['our_team_link_color'],
				'priority'    => 55,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_team_link_color_element'],
						// 'element'  => '.our_team_icon_contain a',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_team_link_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_team_link_hover_color',
				'label'       => __( 'Link Hover Color', 'kirki' ),
				'section'     => 'our_team_section',
				'default'     => $themetype['our_team_link_hover_color'],
				'priority'    => 60,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_team_link_hover_color_element'],
						// 'element'  => '.our_team_icon_contain .our_team_title a:hover',
						'property' => 'color',
					),
				),
			]
		);
	}

	// new \Kirki\Field\Color(
	// 	[
	// 		'settings'    => 'our_team_container_hover_color',
	// 		'label'       => __( 'Image Hover Color', 'kirki' ),
	// 		'section'     => 'our_team_section',
	// 		'default'     => '#ae8f8f',
	// 		'priority'    => 160,
	// 		'choices'     => [
	// 			'alpha' => true,
	// 		],
	// 		'output' => array(
	// 			array(
	// 				'element'  => '.our_team_data .out_team_pic:before, .our_team_data .out_team_pic:after',
	// 				'property' => 'background-color',
	// 			),
	// 		),
	// 	]
	// );
?>