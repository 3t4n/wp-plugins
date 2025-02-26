<?php

/* BODY CONTENT STYLING
================================================== */
$wp_customize->add_section(
	'mytube_default_styling',
	array(
		'title'    => esc_html__( 'My Tube', 'awetube' ),
		'priority' => 201,
		'panel'    => $panel_id_2,
	)
);

$wp_customize->add_setting(
	'mytube_author_name',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'mytube_table_name',
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
		'mytube_author_name',
		array(
			'label'    => esc_html__( 'Author Name', 'awetube' ),
			'section'  => 'mytube_default_styling',
			'settings' => 'mytube_author_name',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'mytube_table_name',
		array(
			'label'    => esc_html__( 'Table Name', 'awetube' ),
			'section'  => 'mytube_default_styling',
			'settings' => 'mytube_table_name',
			'priority' => 2,
		)
	)
);
