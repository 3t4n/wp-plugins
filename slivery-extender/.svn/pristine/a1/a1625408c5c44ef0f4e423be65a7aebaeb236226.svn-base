<?php
global $themetype;
// Theme Option
	new \Kirki\Panel(
		'globly_theme_option',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Theme Option', 'kirki' ),
		]
	);

// Color Section
	Kirki::add_config( 'color_section' );

	Kirki::add_section( 'color_section', [
		'title'    => esc_html__( 'Colors', 'kirki' ),
	    'priority' => 10,
	] );

	Kirki::add_field( 'color_section', [
		'type'      => 'color',
		'settings'  => $themetype['plugiformname'].'_link_color',
		'label'       => __( 'Link Color', 'kirki' ),
		'section'     => 'color_section',
		'default'     => '#000000',
		'priority'  => 40,
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => 'body a, .entry-meta span',
				'property' => 'color',
			),
		),
	] );

	Kirki::add_field( 'color_section', [
		'type'      => 'color',
		'settings'  => $themetype['plugiformname'].'_link_hover_color',
		'label'       => __( 'Link Hover Color', 'kirki' ),
		'section'     => 'color_section',
		'default'     => '#000000',
		'priority'  => 50,
		'choices'     => [
			'alpha' => true,
		],
		'output' => array(
			array(
				'element'  => 'body a:hover',
				'property' => 'color',
			),
		),
	] );


//logo option in image width title_tagline

	new \Kirki\Field\Text(
		[
			'settings' => $themetype['plugiformname'].'_logo_width',
			'label'    => esc_html__( 'Logo Image Width', 'kirki' ),
			'description' => esc_html__( 'in px', 'kirki' ),
			'section'  => 'title_tagline',
			'default'  => '150px',
			'output' => array(
				array(
					'element'  => 'img.custom-logo',
					'property' => 'width',
					'suffix' => ' !important',
				),
			),
		]
	);
?>