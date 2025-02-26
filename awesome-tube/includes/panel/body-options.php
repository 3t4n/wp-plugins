<?php

/*=====================================================================================================*/
// Set Panel ID
/*=====================================================================================================*/
$panel_id_2 = 'awetube_content_section';

$wp_customize->add_panel(
	$panel_id_2,
	array(
		'priority'       => 199,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Awetube Customizer', 'awetube' ),
		'description'    => esc_html__( 'Edit your content color here.', 'awetube' ),
	)
);

/* BODY CONTENT STYLING
================================================== */
$wp_customize->add_section(
	'content_default_styling',
	array(
		'title'    => esc_html__( 'Single Video', 'awetube' ),
		'priority' => 200,
		'panel'    => $panel_id_2,
	)
);

$wp_customize->add_setting(
	'single_video_title',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_border_color',
	array(
		'default'           => '#ffffff',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_share_text',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_share_icon_bg_color',
	array(
		'default'           => '#575757',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_share_icon_color',
	array(
		'default'           => '#ffffff',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_share_icon_bg_color_hover',
	array(
		'default'           => '#595edc',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_share_icon_color_hover',
	array(
		'default'           => '#ffffff',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_name_author',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_date_time',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_content_color',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_tag_color',
	array(
		'default'           => '#595edc',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_tag_color_hover',
	array(
		'default'           => '#4d4ea0',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_video_content_show',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_title',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_title_hover',
	array(
		'default'           => '#595edc',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_author',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_date',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_icon_hover',
	array(
		'default'           => '#000000',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_icon_bg_hover',
	array(
		'default'           => '#4c4fa0b5',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_setting(
	'single_related_overlay_bg_hover',
	array(
		'default'           => '#00000033',
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
		'single_video_title',
		array(
			'label'    => esc_html__( 'Single Video Title Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_title',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_border_color',
		array(
			'label'    => esc_html__( 'Single Border Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_border_color',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_share_text',
		array(
			'label'    => esc_html__( 'Single Video Meta Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_share_text',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_share_icon_bg_color',
		array(
			'label'    => esc_html__( 'Single Video Share Icon Background Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_share_icon_bg_color',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_share_icon_color',
		array(
			'label'    => esc_html__( 'Single Video Share Icon Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_share_icon_color',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_share_icon_bg_color_hover',
		array(
			'label'    => esc_html__( 'Single Video Share Icon Background Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_share_icon_bg_color_hover',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_share_icon_color_hover',
		array(
			'label'    => esc_html__( 'Single Video Share Icon Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_share_icon_color_hover',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_name_author',
		array(
			'label'    => esc_html__( 'Single Video Name Author Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_name_author',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_date_time',
		array(
			'label'    => esc_html__( 'Single Video Date Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_date_time',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_content_color',
		array(
			'label'    => esc_html__( 'Single Video Content Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_content_color',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_tag_color',
		array(
			'label'    => esc_html__( 'Single Video Tag Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_tag_color',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_tag_color_hover',
		array(
			'label'    => esc_html__( 'Single Video Tag Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_tag_color_hover',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_video_content_show',
		array(
			'label'    => esc_html__( 'Single Video Content Show More', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_video_content_show',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_title',
		array(
			'label'    => esc_html__( 'Video Related Title Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_title',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_title_hover',
		array(
			'label'    => esc_html__( 'Video Related Title Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_title_hover',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_author',
		array(
			'label'    => esc_html__( 'Video Related Author Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_author',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_date',
		array(
			'label'    => esc_html__( 'Video Related Date Color', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_date',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_icon_hover',
		array(
			'label'    => esc_html__( 'Video Related Icon Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_icon_hover',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_icon_bg_hover',
		array(
			'label'    => esc_html__( 'Video Related Icon Background Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_icon_bg_hover',
			'priority' => 1,
		)
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'single_related_overlay_bg_hover',
		array(
			'label'    => esc_html__( 'Video Related Overlay Background Color Hover', 'awetube' ),
			'section'  => 'content_default_styling',
			'settings' => 'single_related_overlay_bg_hover',
			'priority' => 1,
		)
	)
);