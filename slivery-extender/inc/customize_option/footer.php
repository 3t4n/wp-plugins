<?php
global $themetype;
// Footer Section
	Kirki::add_config( 'footer_section' );

	Kirki::add_section( 'footer_section', [
		'title'    => esc_html__( 'Footer', 'kirki' ),
	    'priority' => 10,
	] );

	Kirki::add_field( 'footer_section', [
		'type'      => 'select',
		'settings'  => $themetype['plugiformname'].'_footer_width_layout',
		'label'     => esc_html__( 'Footer Width', 'kirki' ),
		'section'   => 'footer_section',
		'default'     => 'content_width',
		'choices'     => [
			'full_width' => esc_html__( 'Full Width', 'kirki' ),
			'content_width' => esc_html__( 'Content Width', 'kirki' ),
		],
		'priority'  => 10,
	] );

	Kirki::add_field( 'footer_section', [
		'type'      => 'number',
		'settings'  => $themetype['plugiformname'].'_footer_container_width',
		'label'     => esc_html__( 'Footer Contact Width', 'kirki' ),
		'description' => esc_html__( 'in px', 'kirki' ),
		'section'   => 'footer_section',
		'default'   => '1100',
		'priority'  => 20,
	] );

	if(isset($themetype['_footer_bg_color'])){
		Kirki::add_field( 'footer_section', [
			'type'      => 'color',
			'settings'  => $themetype['plugiformname'].'_footer_bg_color',
			'label'       => __( 'Background Color', 'kirki' ),
			'section'     => 'footer_section',
			'default'     => $themetype['_footer_bg_color'],
			'priority'  => 30,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $themetype['_footer_bg_color_element'],
					// 'element'  => 'footer#colophon',
					'property' => 'background',
					'suffix' => '!important',
				),
			),
		] );
	}

	if(isset($themetype['_footer_text_color'])){
		Kirki::add_field( 'footer_section', [
			'type'      => 'color',
			'settings'  => $themetype['plugiformname'].'_footer_text_color',
			'label'       => __( 'Text Color', 'kirki' ),
			'section'     => 'footer_section',
			'default'     => $themetype['_footer_text_color'],
			'priority'  => 40,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $themetype['_footer_text_color_element'],
					// 'element'  => 'footer#colophon',
					'property' => 'color',
					'suffix' => '!important',
				),
			),
		] );
	}

	if(isset($themetype['footer_link_color'])){
		Kirki::add_field( 'footer_section', [
			'type'      => 'color',
			'settings'  => 'footer_link_color',
			'label'       => __( 'Link Color', 'kirki' ),
			'section'     => 'footer_section',
			'default'     => $themetype['footer_link_color'],
			'priority'  => 40,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $themetype['footer_link_color_element'],
					// 'element'  => 'footer#colophon a',
					'property' => 'color',
					'suffix' => '!important',
				),
			),
		] );
	}

	if(isset($themetype['_footer_link_hover_color'])){
		Kirki::add_field( 'footer_section', [
			'type'      => 'color',
			'settings'  => $themetype['plugiformname'].'_footer_link_hover_color',
			'label'       => __( 'Link Hover Color', 'kirki' ),
			'section'     => 'footer_section',
			'default'     => $themetype['_footer_link_hover_color'],
			'priority'  => 50,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $themetype['_footer_link_hover_color_element'],
					// 'element'  => 'footer#colophon a:hover',
					'property' => 'color',
					'suffix' => '!important',
				),
			),
		] );
	}

	Kirki::add_field( 'footer_section', [
		'type'      => 'image',
		'settings'  => 'footer_bg_section',
		'label'       => esc_html__( 'Footer Background Image', 'kirki' ),
		'section'     => 'footer_section',
		'default'     => '',
		'priority'  => 60,
	] );

	Kirki::add_field( 'footer_section', [
		'type'      => 'select',
		'settings'    => $themetype['plugiformname'].'_footer_bg_position',
		'label'       => esc_html__( 'Background Position', 'kirki' ),
		'section'     => 'footer_section',
		'default'     => 'center center',
		'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
		'priority'  => 70,
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
				'element'  => 'footer#colophon.site-footer',
				'property' => 'background-position',
				'suffix' => '!important',
			),
		),
	] );

	Kirki::add_field( 'footer_section', [
		'type'      => 'select',
		'settings'    => 'footer_background_attachment',
		'label'       => esc_html__( 'Background Attachment', 'kirki' ),
		'section'     => 'footer_section',
		'default'     => 'scroll',
		'priority'  => 80,
		'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'kirki' ),
			'fixed' => esc_html__( 'Fixed', 'kirki' ),
		],
		'output' => array(
			array(
				'element'  => 'footer#colophon.site-footer',
				'property' => 'background-attachment',
				'suffix' => '!important',
			),
		),
	] );

	Kirki::add_field( 'footer_section', [
		'type'      => 'select',
		'settings'    => 'footer_background_size',
		'label'       => esc_html__( 'Background Size', 'kirki' ),
		'section'     => 'footer_section',
		'default'     => 'cover',
		'priority'  => 90,
		'placeholder' => esc_html__( 'Choose an option', 'kirki' ),
		'choices'     => [
			'auto' => esc_html__( 'Auto', 'kirki' ),
			'cover' => esc_html__( 'Cover', 'kirki' ),
			'contain' => esc_html__( 'Contain', 'kirki' ),
		],
		'output' => array(
			array(
				'element'  => 'footer#colophon.site-footer',
				'property' => 'background-size',
				'suffix' => '!important',
			),
		),
	] );
?>