<?php
global $themetype;
//sidebar 
	new \Kirki\Panel(
		'sidebar_section',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Sidebar', 'kirki' ),
		]
	);
	// Post Sidebar Section
		$post_types = get_post_types(array('public' => true), 'names', 'and');
		foreach ($post_types  as $post_type) {
				new \Kirki\Section(
				'post_sidebar_section_' .$post_type,
					[
						'title'       =>  $post_type." Sidebar", 
						'panel'       => 'sidebar_section',
						'priority'    => 160,
					]
				);

				$layout_label= $post_type . ' Layout:';
				new \Kirki\Field\Radio_Image(
					[
						'settings'    => 'sidebar_post_layout' .$post_type,
						'label'       => $layout_label,
						'section'     => 'post_sidebar_section_' .$post_type,
						'default'     => 'right_sidebar',
						'choices'     => array(
							'no_sidebar'	=> get_template_directory_uri() . '/assets/images/full.png',
							'left_sidebar'	=> get_template_directory_uri() . '/assets/images/left.png',
							'right_sidebar'	=> get_template_directory_uri() . '/assets/images/right.png',
						),
					]
				);
			

			new \Kirki\Field\Number(
				[
					'settings' => 'silvery_sidebar_post_width' . $post_type,
					'label'    => $post_type . ' Sidebar Width:',
					'section'  => 'post_sidebar_section_' .$post_type,
					'default'  => 30,
				]
			);
		}

	// Design Section
		new \Kirki\Section(
		'sidebar_deaign_section',
			[
				'title'       => esc_html__( 'Design', 'kirki' ),
				'panel'       => 'sidebar_section',
				'priority'    => 160,
			]
		);

		if(isset($themetype['_sidebar_heading_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_sidebar_heading_bg_color',
					'label'       => __( 'Heading Background Color', 'kirki' ),
					'section'     => 'sidebar_deaign_section',
					'default'     => $themetype['_sidebar_heading_bg_color'],
					// 'default'     => '#273641',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => 'aside.widget-area section h2, aside.widget-area section h1, aside.widget-area section h3, label.wp-block-search__label',
							'property' => 'background-color',
							'suffix' => '!important',
						),
					),
				]
			);
		}

		if(isset($themetype['_sidebar_heading_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => $themetype['plugiformname'].'_sidebar_heading_text_color',
					'label'       => __( 'Heading Text Color', 'kirki' ),
					'section'     => 'sidebar_deaign_section',
					'default'     => $themetype['_sidebar_heading_text_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => 'aside.widget-area section h2, aside.widget-area section h1, aside.widget-area section h3, label.wp-block-search__label',
							'property' => 'color',
							'suffix' => '!important',
						),
					),
				]
			);
		}
?>
