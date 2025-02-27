<?php
global $themetype;
// About Section
		new \Kirki\Section(
			'about_section',
			[
				'title'       => esc_html__( 'About Section', 'kirki' ),
				'panel'       => 'globly_theme_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_about_main_title',
				'label'    => esc_html__( 'About Title', 'kirki' ),
				'section'  => 'about_section',
				'default'  => esc_html__( 'About Us', 'kirki' ),
				'priority' => 5,
				'partial_refresh'    => [
					$themetype['plugiformname'].'_about_main_title' => [
						'selector'        => '.about_section_info',
						'render_callback' => function() {
						    return true;
						}
					],
				],
			]
		);

		new \Kirki\Field\Image(
			[
				'settings'    => 'about_section_image',
				'label'       => esc_html__( 'Image', 'kirki' ),
				'section'     => 'about_section',
				'default'     => '',
				'priority' => 10,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_about_section_layout_title',
				'label'    => esc_html__( 'About Title', 'kirki' ),
				'section'  => 'about_section',
				'default'  => esc_html__( 'Hi, I Am Samantha!', 'kirki' ),
				'priority' => 20,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_about_section_layout_subheading',
				'label'    => esc_html__( 'Sub Heading', 'kirki' ),
				'section'  => 'about_section',
				'default'  => esc_html__( 'Owner/Founder, Executive Coach', 'kirki' ),
				'priority' => 25,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_about_section_layout_desc',
				'label'    => esc_html__( 'About Description', 'kirki' ),
				'section'  => 'about_section',
				'default'  => esc_html__( 'Yes, I Know My Stuff! And Throughout Our Coaching Time, You Will Develop The Tools And Confidence To Take Action. My Way Of Coaching Is To Empower You In Becoming The Leader You Want To Be. You Are Unique And So Your Coaching Should Be Too.', 'kirki' ),
				'priority' => 30,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_about_section_layout_btn',
				'label'    => esc_html__( 'Button', 'kirki' ),
				'section'  => 'about_section',
				'default'  => esc_html__( 'Read More', 'kirki' ),
				'priority' => 35,
			]
		);

		new \Kirki\Field\Text(
			[
				'settings' => $themetype['plugiformname'].'_about_section_layout_btn_link',
				'label'    => esc_html__( 'Button Link', 'kirki' ),
				'section'  => 'about_section',
				'default'  => esc_html__( '#', 'kirki' ),
				'priority' => 40,
			]
		);

		if(isset($themetype['about_section_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'about_section_bg_color',
					'label'       => __( 'Background Color', 'kirki' ),
					'section'     => 'about_section',
					'default'     => $themetype['about_section_bg_color'],
					// 'default'     => '#f0f9fb',
					'priority' => 45,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['about_section_bg_color_element'],
							// 'element'  => '.about_section_info',
							'property' => 'background',
						),
					),
				]
			);
		}

		if(isset($themetype['about_section_title_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'about_section_title_text_color',
					'label'       => __( 'Title Text Color', 'kirki' ),
					'section'     => 'about_section',
					'default'     => $themetype['about_section_title_text_color'],
					// 'default'     => '#333333',
					'priority' => 50,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.'.$themetype['plugiformname'].'_about_main_title h2',
							'property' => 'color',
						),
					),
				]
			);
		}


		new \Kirki\Field\Color(
			[
				'settings'    => 'about_section_contain_text_color',
				'label'       => __( 'Contain Text Color', 'kirki' ),
				'section'     => 'about_section',
				'default'     => '#404040',
				'priority' => 55,
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => '.about_container_data .entry-header',
						'property' => 'color',
					),
				),
			]
		);
?>