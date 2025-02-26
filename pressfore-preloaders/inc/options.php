<?php

function pf_preloaders_customize_register( $wp_customize ) {

	// Register the image select field
	$wp_customize->register_control_type( 'PF_Preloaders_Radio_Image' );
	$wp_customize->register_control_type( 'PF_Preloaders_Button' );

	// Begin options

	$wp_customize->add_section( 'pf_loaders' , array(
			'title'       => esc_html__( 'Pressfore Preloaders', 'pf_preloaders' ),
			'priority'    => 20,
			'description' => 'Choose preloader type',
	) );

	$wp_customize->add_setting( 'pf_loaders[display]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'transport'  => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
			'default'  => 'show'
	) );

	$wp_customize->add_control( 'display', array(
			'label'    => esc_html__('Display Preloader:', 'green-ink'),
			'section'  => 'pf_loaders',
			'settings' => 'pf_loaders[display]',
			'type'     => 'select',
			'choices'  => array(
					'show' => esc_html__('Show', 'green-ink'),
					'hide' => esc_html__('Hide', 'green-ink')
			)
	) );

	$wp_customize->add_setting( 'pf_loaders[type]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'default'    => 'default',
			'transport'  => 'postMessage',
	) );

	$wp_customize->add_control( new PF_Preloaders_Radio_Image( $wp_customize, 'type',
			array(
				'label'    => esc_html__( 'Choose Preloader', 'pf_preloaders' ),
				'section'  => 'pf_loaders',
				'settings' => 'pf_loaders[type]',
				'choices'  => array(
					'default' => array(
						'url'   => '%simg/layout.jpg'
					),
					'cube' => array(
						'url'   => '%simg/layout.jpg'
					),
					'squares' => array(
						'url'   => '%simg/layout.jpg',
						'size'  => 'pf-long'
					),
					'equalizers' => array(
						'url'   => '%simg/layout.jpg'
					),
					'loading' => array(
						'url'   => '%simg/layout.jpg'
					)
				)
			)
		)
	);

	$wp_customize->add_setting( 'pf_loaders[preview]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'default'    => 'all',
			'transport'  => 'postMessage',
	) );

	$wp_customize->add_control( new PF_Preloaders_Button( $wp_customize, 'preview',
			array(
				'label'    => esc_html__( 'Preview', 'pf_preloaders' ),
				'section'  => 'pf_loaders',
				'settings' => 'pf_loaders[preview]',
				'button_text'  => esc_html__( 'Click To Preview Preloader', 'pf_preloaders' )
			)
		)
	);

	$wp_customize->add_setting( 'pf_loaders[bg]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'default'    => '#fff',
			'transport'  => 'postMessage'
	) );

	$wp_customize->add_control( 'bg', array(
			'label'    => esc_html__( 'Preloader Page Background Color', 'pf_preloaders' ),
			'section'  => 'pf_loaders',
			'settings' => 'pf_loaders[bg]',
			'type'     => 'color'
		)
	);

	$wp_customize->add_setting( 'pf_loaders[clr]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'default'    => '#333',
			'transport'  => 'postMessage'
	) );

	$wp_customize->add_control(  'clr',	array(
			'label'    => esc_html__( 'Preloader Parts Color', 'pf_preloaders' ),
			'section'  => 'pf_loaders',
			'settings' => 'pf_loaders[clr]',
			'type'     => 'color'
		)
	);

	$wp_customize->add_setting( 'pf_loaders[show_on]', array(
			'type'       => 'option',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'default'    => 'all',
			'transport'  => 'postMessage',
	) );

	$wp_customize->add_control( 'show_on', array(
			'label'    => esc_html__( 'Show Preloader:', 'pf_preloaders' ),
			'section'  => 'pf_loaders',
			'settings' => 'pf_loaders[show_on]',
			'type'     => 'select',
			'choices'  => array(
				'all' => esc_html__('Everywhere', 'green-ink'),
				'home' => esc_html__('On Homepage', 'green-ink'),
				'pages' => esc_html__('On Pages', 'green-ink'),
				'posts' => esc_html__('On Posts', 'green-ink')
			)
		)
	);
}

add_action( 'customize_register', 'pf_preloaders_customize_register' );