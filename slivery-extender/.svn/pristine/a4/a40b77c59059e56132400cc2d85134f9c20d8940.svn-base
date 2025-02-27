<?php
global $themetype;
// Our Portfolio Section
	new \Kirki\Section(
		'our_portfolio_section',
		[
			'title'       => esc_html__( 'Our Portfolio', 'kirki' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_portfolio_main_title',
			'label'    => esc_html__( 'Our Portfolio Title', 'kirki' ),
			'section'  => 'our_portfolio_section',
			'default'  => esc_html__( 'Our Portfolio', 'kirki' ),
			'priority' => 5,
			'partial_refresh'    => [
				$themetype['plugiformname'].'_our_portfolio_main_title' => [
					'selector'        => '.our_portfolio_info',
					'render_callback' => function() {
					    return true;
					}
				],
			],
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_our_portfolio_desc',
			'label'    => esc_html__( 'Our Portfolio Discription', 'kirki' ),
			'section'  => 'our_portfolio_section',
			'default'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'kirki' ),
			'priority' => 10,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => $themetype['plugiformname'].'_our_portfolio_content',
			'label'    => esc_html__( 'Our Portfolio Items Content', 'kirki' ),
			'row_label' => array( 'value' => 'portfolio item' ),
			'section'  => 'our_portfolio_section',
			'priority' => 15,
			'default'  => [
				[
					'image'  => '',
					'title'    => 'Free Consulting',
					'text'    => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sapien, Sit Sed Accumsan.',
					'link_url'    => '#',
				],
				[
					'image'  => '',
					'title'    => 'Best Analysis',
					'text'    => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sapien, Sit Sed Accumsan.',
					'link_url'    => '#',
				],
				[
					'image'  => '',
					'title'    => 'Successes Reports',
					'text'    => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Sapien, Sit Sed Accumsan.',
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
				'text'    => [
					'type'        => 'textarea',
					'label'       => esc_html__( 'Text:', 'kirki' ),
				],
				'link_url'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link URL:', 'kirki' ),
				],
			],
			'choices' => [
				'limit' => ($themetype['themtypeis']=='normal') ? 3 : 100,
			]
		]
	);

	new \Kirki\Field\Image(
		[
			'settings'    => 'our_portfolio_bg_image',
			'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
			'section'     => 'our_portfolio_section',
			'default'     => '',
			'priority'    => 20,
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_portfolio_background_position',
			'label'       => esc_html__( 'Background Position', 'kirki' ),
			'section'     => 'our_portfolio_section',
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
					'element'  => '.our_portfolio_info',
					'property' => 'background-position',
					'suffix'  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_portfolio_background_attachment',
			'label'       => esc_html__( 'Background Attachment', 'kirki' ),
			'section'     => 'our_portfolio_section',
			'default'     => 'scroll',
			'priority'    => 30,
			'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
			'choices'     => [
				'scroll' => esc_html__( 'Scroll', 'kirki' ),
				'fixed' => esc_html__( 'Fixed', 'kirki' ),
			],
			'output' => array(
				array(
					'element'  => '.our_portfolio_info',
					'property' => 'background-attachment',
					'suffix'  => '!important',
				),
			),
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'our_portfolio_background_size',
			'label'       => esc_html__( 'Background Size', 'kirki' ),
			'section'     => 'our_portfolio_section',
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
					'element'  => '.our_portfolio_info',
					'property' => 'background-size',
					'suffix'  => '!important',
				),
			),
		]
	);

	if(isset($themetype['our_portfolio_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_bg_color'],
				'priority'    => 40,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_portfolio_bg_color_element'],
						// 'element'  => '.our_portfolio_info',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_title_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_title_color',
				'label'       => __( 'Title Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_title_color'],
				// 'default'     => '#333333',
				'priority'    => 45,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.'.$themetype['plugiformname'].'_our_portfolio_main_title  h2',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_text_color',
				'label'       => __( 'Text Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_text_color'],
				// 'default'     => '#333',
				'priority'    => 50,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_portfolio_text_color_element'],
						// 'element'  => '.our_portfolio_info',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_container_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_container_text_color',
				'label'       => __( 'Content Text Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_container_text_color'],
				'priority'    => 65,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_portfolio_container_text_color_element'],
						// 'element'  => '.our_portfolio_info .our_portfolio_container',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_icon_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_icon_bg_color',
				'label'       => __( 'Icon Background Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_icon_bg_color'],
				// 'default'     => '#ffffff',
				'priority'    => 70,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_portfolio_icon_bg_color_element'],
						// 'element'  => '.our_portfolio_btn a i',
						'property' => 'background',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_icon_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_icon_color',
				'label'       => __( 'Icon Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_icon_color'],
				'priority'    => 75,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						// 'element'  => '.our_portfolio_btn a i',
						'element'  => $themetype['our_portfolio_icon_color_element'],
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_border_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_border_color',
				'label'       => __( 'Border Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_border_color'],
				'priority'    => 85,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_portfolio_border_color_background_element'],
						// 'element'  => '.our_port_containe .our_portfolio_title i',
						'property' => 'background',
					),
					array(
						'element'  => $themetype['our_portfolio_border_color_color_element'],
						// 'element'  => '.our_port_containe .our_portfolio_title i',
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($themetype['our_portfolio_border_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'our_portfolio_border_hover_color',
				'label'       => __( 'Border Hover Color', 'kirki' ),
				'section'     => 'our_portfolio_section',
				'default'     => $themetype['our_portfolio_border_hover_color'],
				'priority'    => 95,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['our_portfolio_border_hover_color_background_element'],
						// 'element'  => '.our_portfolio_info .our_portfolio_caption .our_portfolio_container:hover .our_portfolio_title i',
						'property' => 'background',
					),
					array(
						'element'  => $themetype['our_portfolio_border_hover_color_color_element'],
						// 'element'  => '.our_portfolio_info .our_portfolio_caption .our_portfolio_container:hover .our_portfolio_title i',
						'property' => 'color',
					),
				),
			]
		);
	}
?>