<?php
global $themetype;
//header section
	new \Kirki\Panel(
		'header_option',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Header', 'kirki' ),
			
		]
	);

	new \Kirki\Section(
		'header_section',
		[
			'title'       => esc_html__( 'Header Option', 'kirki' ),
			'panel'       => 'header_option',
			'priority'    => 160,
		]
	);

	if(isset($themetype['header_top_bar_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'header_top_bar_bg_color',
				'label'       => __( 'Top Bar Background Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['header_top_bar_bg_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['header_top_bar_bg_color_element'],
						// 'element'  => '.top_bar_info',
						'property' => 'background-color',
					),
				),
			],
		);
	}

	if(isset($themetype['header_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'header_bg_color',
				'label'       => __( 'Background Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['header_bg_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['header_bg_color_element'],
						// 'element'  => '.main_site_header',
						'property' => 'background-color',
						'suffix' => '!important',
					),
				),
			]
		);
	}

	if(isset($themetype['header_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'header_text_color',
				'label'       => __( 'Text Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['header_text_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['header_text_color_element'],
						// 'element'  => '.main_site_header, header#masthead p.site-description',
						'property' => 'color',
					),
				),
			]
		);
	}
	
	if(isset($themetype['link_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'link_color',
				'label'       => __( 'Link Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['link_color'],
				// 'default'     => '#ffffff',
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['link_color_element'],
						// 'element'  => '.main_site_header a',
						'property' => 'color',
						'suffix' => '!important',
					),
				),
			]
		);
	}

	if(isset($themetype['link_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'link_hover_color',
				'label'       => __( 'Link Hover Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['link_hover_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['link_hover_color_element'],
						// 'element'  => '#masthead .main_site_header a:hover',
						'property' => 'color',
						'suffix' => '!important',
					),
				),
			]
		);
	}



	//Manu Link Active Color
	if(isset($themetype['_menu_active_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => $themetype['plugiformname'].'_menu_active_color',
				'label'       => __( 'Menu Active Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['_menu_active_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['_menu_active_color_element'],
						// 'element'  => 'header#masthead.site-header .current-menu-ancestor > a, header#masthead.site-header .current-menu-item > a, header#masthead.site-header .current_page_item > a, footer#colophon .current-menu-item > a, .current_page_item > a',
						'property' => 'color',
						'suffix' => '!important',
					),
				),
			]
		);
	}

	if(isset($themetype['desk_submenu_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'desk_submenu_bg_color',
				'label'       => __( 'Desktop Submenu Background Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['desk_submenu_bg_color'],
				// 'default'     => '#ffffff',
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['desk_submenu_bg_color_element'],
						// 'element'  => '.main-navigation .nav-menu ul.sub-menu, .main-navigation .nav-menu ul.children',
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($themetype['mob_nav_menu_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'mob_nav_menu_bg_color',
				'label'       => __( 'Mobile Nav Menu Background Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['mob_nav_menu_bg_color'],
				// 'default'     => '#273641',
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $themetype['mob_nav_menu_bg_color_element'],
						// 'element'  => '.mobile_menu',
						'property' => 'background-color',
						'suffix' => '!important',
					),
				),
			]
		);
	}

	if(isset($themetype['mob_sub_menu_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'mob_sub_menu_bg_color',
				'label'       => __( 'Mobile Submenu Background Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['mob_sub_menu_bg_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'media_query' => '@media only screen and (max-width: 768px)',
						'element'  => $themetype['mob_sub_menu_bg_color_element'],
						// 'element'  => '.main-navigation .sub-menu li, .main-navigation ul ul ul.toggled-on li',
						'property' => 'background-color',
						'suffix'   => '!important',
					),
				),
			]
		);
	}

	if(isset($themetype['mob_nav_menu_activ_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'mob_nav_menu_activ_color',
				'label'       => __( 'Mobile Nav Menu Active Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['mob_nav_menu_activ_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'media_query' => '@media only screen and (max-width: 768px)',
						'element'  => $themetype['mob_nav_menu_activ_color_element'],
						// 'element'  => 'header#masthead.site-header .current-menu-ancestor > a, header#masthead.site-header .current-menu-item > a, header#masthead.site-header .current_page_item > a',
						'property' => 'color',
						'suffix'   => '!important',
					),
				),
			]
		);
	}

	if(isset($themetype['mob_menu_link_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'mob_menu_link_color',
				'label'       => __( 'Mobile Menu Link Color', 'kirki' ),
				'section'     => 'header_section',
				'default'     => $themetype['mob_menu_link_color'],
				// 'default'     => '#ffffff',
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'media_query' => '@media only screen and (max-width: 768px)',
						'element'  => $themetype['mob_menu_link_color_element'],
						// 'element'  => '.mobile_menu #primary-menu li a',
						'property' => 'color',
						'suffix'   => '!important',
					),
				),
			]
		);
	}


	// Header Width
		new \Kirki\Section(
			'header_width_section',
			[
				'title'       => esc_html__( 'Header Width', 'kirki' ),
				'panel'       => 'header_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Select(
			[
				'settings'    => $themetype['plugiformname'].'_header_width_layout',
				'label'       => esc_html__( 'Header Width Layouts', 'kirki' ),
				'section'     => 'header_width_section',
				'default'     => 'content_width',
				'choices'     => [
					'full_width' => esc_html__( 'Full Width', 'kirki' ),
					'content_width' => esc_html__( 'Content Width', 'kirki' ),
				],
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => $themetype['plugiformname'].'_header_container_width',
				'label'    => esc_html__( 'Header Content Width', 'kirki' ),
				'description' => esc_html__( 'in px', 'kirki' ),
				'section'  => 'header_width_section',
				'default'  => 1100,
			]
		);
		
	if($themetype['themtypeis']=='pro'){
	// Sticky Header Section
		new \Kirki\Section(
			$themetype['plugiformname'].'_sticky_header',
			[
				'title'       => esc_html__( 'Sticky Header', 'kirki' ),
				'panel'       => 'header_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => 'display_sticky_header',
				'label'       => esc_html__( 'Sticky Header', 'kirki' ),
				'section'     => $themetype['plugiformname'].'_sticky_header',
				'default'     => true,
				'priority'    => 10,
			]
		);

		if(isset($themetype['_sticky_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_sticky_bg_color',
					'label'       => __( 'Sticky Background Color', 'kirki' ),
					'section'     => $themetype['plugiformname'].'_sticky_header',
					'default'     => $themetype['_sticky_bg_color'],
					'priority'    => 20,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['_sticky_bg_color_element'],
							// 'element'  => '.main_site_header.is-sticky-menu',
							'property' => 'background-color',
							'suffix' => '!important',
						),
					),
				]
			);
		}
	}
?>