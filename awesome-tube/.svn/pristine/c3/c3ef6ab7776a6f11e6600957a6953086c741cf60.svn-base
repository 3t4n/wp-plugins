<?php

/*=====================================================================================================*/
// Set Panel ID
/*=====================================================================================================*/
$panel_id_3 = 'awetube_archive_section';

/* BODY CONTENT STYLING
================================================== */
$wp_customize->add_section(
	'arsip_default_styling',
	array(
		'title'    => esc_html__( 'Archive Video', 'awetube' ),
		'priority' => 200,
		'panel'    => $panel_id_2,
	)
);

$wp_customize->add_setting(
	'category_page_title',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'category_page_desc',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'category_post_title',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'category_post_author',
	array(
		'default'           => '#a9a9a9',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'category_post_meta',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'category_widget_title',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'author_text_detail',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'already_login_title',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

///////////////////////////////////////////////////////////////////////////////////////////

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'category_page_title',
		array(
			'label'    => esc_html__( 'Category Page Title', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'category_page_title',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'category_page_desc',
		array(
			'label'    => esc_html__( 'Category Page Description', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'category_page_desc',
			'priority' => 2,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'category_post_title',
		array(
			'label'    => esc_html__( 'Category Post Title', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'category_post_title',
			'priority' => 3,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'category_post_author',
		array(
			'label'    => esc_html__( 'Category Post Author', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'category_post_author',
			'priority' => 4,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'category_post_meta',
		array(
			'label'    => esc_html__( 'Category Post Meta', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'category_post_meta',
			'priority' => 5,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'category_widget_title',
		array(
			'label'    => esc_html__( 'Category Widget Title', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'category_widget_title',
			'priority' => 6,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'author_text_detail',
		array(
			'label'    => esc_html__( 'Author Text Detail', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'author_text_detail',
			'priority' => 7,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'already_login_title',
		array(
			'label'    => esc_html__( 'Already Login Title', 'awetube' ),
			'section'  => 'arsip_default_styling',
			'settings' => 'already_login_title',
			'priority' => 8,
		)
	)
);
