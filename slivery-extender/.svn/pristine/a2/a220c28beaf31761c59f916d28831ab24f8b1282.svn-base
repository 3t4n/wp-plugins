<?php
global $themetype;
// Breadcrumb Section
		new \Kirki\Section(
			'breadcrumb_section',
			[
				'title'       => esc_html__( 'Breadcrumb Section', 'kirki' ),
				'panel'       => 'globly_theme_option',
				'priority'    => 160,
			]
		);

		new \Kirki\Field\Checkbox_Switch(
			[
				'settings'    => $themetype['plugiformname'].'_display_breadcrumb_section',
				'label'       => esc_html__( 'Display Breadcrumb Section', 'kirki' ),
				'section'     => 'breadcrumb_section',
				'default'     => true,
				'priority'	  => 5,
			]
		);

		if(isset($themetype['silvary_breadcrumb_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvary_breadcrumb_bg_color',
					'label'       => __( 'Background Color', 'kirki' ),
					'section'     => 'breadcrumb_section',
					'default'     => $themetype['silvary_breadcrumb_bg_color'],
					// 'default'     => '#c8c9cb',
					'priority'	  => 15,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvary_breadcrumb_bg_color_element'],
							// 'element'  => '.breadcrumb_info',
							'property' => 'background-color',
						),
					),
				]
			);
		}

		if(isset($themetype['silvary_breadcrumb_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvary_breadcrumb_text_color',
					'label'       => __( 'Text Color', 'kirki' ),
					'section'     => 'breadcrumb_section',
					'default'     => $themetype['silvary_breadcrumb_text_color'],
					// 'default'     => '#333333',
					'priority'	  => 20,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvary_breadcrumb_text_color_element'],
							// 'element'  => '.breadcrumb_info',
							'property' => 'color',
						),
					),
				]
			);
		}

		if(isset($themetype['silvary_breadcrumb_link_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvary_breadcrumb_link_color',
					'label'       => __( 'Link Color', 'kirki' ),
					'section'     => 'breadcrumb_section',
					'default'     => $themetype['silvary_breadcrumb_link_color'],
					// 'default'     => '#273641',
					'priority'	  => 25,
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => $themetype['silvary_breadcrumb_link_color_element'],
							// 'element'  => 'section#breadcrumb-section a',
							'property' => 'color',
						),
					),
				]
			);
		}

		new \Kirki\Field\Image(
			[
				'settings'    => $themetype['plugiformname'].'_breadcrumb_bg_image',
				'label'       => esc_html__( 'Backgroung Image', 'kirki' ),
				'section'     => 'breadcrumb_section',
				'default'	  => '',
				'priority'	  => 35,
			]
		);

		new \Kirki\Field\Select(
			[
				'settings'    => 'silvary_breadcrumb_background_position',
				'label'       => esc_html__( 'Background Position', 'kirki' ),
				'section'     => 'breadcrumb_section',
				'default'     => 'center center',
				'priority'	  => 40,
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
						'element'  => '.breadcrumb_info',
						'property' => 'background-position',
					),
				),
			]
		);

		new \Kirki\Field\Select(
			[
				'settings'    => 'breadcrumb_background_attachment',
				'label'       => esc_html__( 'Background Attachment', 'kirki' ),
				'section'     => 'breadcrumb_section',
				'default'     => 'scroll',
				'priority'	  => 45,
				'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
				'choices'     => [
					'scroll' => esc_html__( 'Scroll', 'kirki' ),
					'fixed' => esc_html__( 'Fixed', 'kirki' ),
				],
				'output' => array(
					array(
						'element'  => '.breadcrumb_info',
						'property' => 'background-attachment',
					),
				),
			]
		);

		new \Kirki\Field\Select(
			[
				'settings'    => 'breadcrumb_background_size',
				'label'       => esc_html__( 'Background Size', 'kirki' ),
				'section'     => 'breadcrumb_section',
				'default'     => 'cover',
				'priority'	  => 50,
				'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
				'choices'     => [
					'auto' => esc_html__( 'Auto', 'kirki' ),
					'cover' => esc_html__( 'Cover', 'kirki' ),
					'contain' => esc_html__( 'Contain', 'kirki' ),
				],
				'output' => array(
					array(
						'element'  => '.breadcrumb_info',
						'property' => 'background-size',
					),
				),
			]
		);
?>