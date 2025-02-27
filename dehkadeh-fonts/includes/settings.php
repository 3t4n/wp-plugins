<?php
/**
 * customizer  settings
 */
function dw_customize_register( $wp_customize ) {

    $wp_customize->add_panel( 'dw_fonts_panel', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => esc_html__( 'Persian Fonts', 'dw-fonts' ),
    ) );

    // font family section
	$wp_customize->add_section( 'dw-persian-fonts', array(
		'title'    => esc_html__( 'Font Family', 'dw-fonts' ),
		'priority' => 1,
        'panel'    => 'dw_fonts_panel',
	) );

    $wp_customize->add_setting( 'dw_enable_persian_fonts', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dw_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'enable_persian_fonts', array(
        'label'       => esc_html__( 'Enable Persian Fonts?', 'dw-fonts' ),
        'section'     => 'dw-persian-fonts',
        'settings'    => 'dw_enable_persian_fonts',
        'type'        => 'checkbox',
        'description' => esc_html__( 'To enable persian fonts settings in below, check this box.', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_force_styles', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dw_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'force_styles', array(
        'label'       => esc_html__( 'Force Styles?', 'dw-fonts' ),
        'section'     => 'dw-persian-fonts',
        'settings'    => 'dw_force_styles',
        'type'        => 'checkbox',
        'description' => esc_html__( 'If your choices are not displaying correctly, check this box.', 'dw-fonts' ),
    ) );

	$wp_customize->add_setting( 'dw_body_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'body_font', array(
		'label'    => esc_html__( 'Body Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_body_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_headings_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'headings_font', array(
		'label'    => esc_html__( 'Headings Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_headings_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_inputs_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'inputs_font', array(
		'label'    => esc_html__( 'Buttons and Inputs Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_inputs_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_site_title_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'site_title_font', array(
		'label'    => esc_html__( 'Site Title Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_site_title_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_site_description_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'site_description_font', array(
		'label'    => esc_html__( 'Site Description Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_site_description_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_navigation_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'navigation_font', array(
		'label'    => esc_html__( 'Navigation Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_navigation_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_post_page_headings_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'post_page_headings_font', array(
		'label'    => esc_html__( 'Post/Page Headings Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_post_page_headings_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_post_page_content_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'post_page_content_font', array(
		'label'    => esc_html__( 'Post/Page Content Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_post_page_content_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_sidebar_headings_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'sidebar_headings_font', array(
		'label'    => esc_html__( 'Sidebar Headings Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_sidebar_headings_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_sidebar_content_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'sidebar_content_font', array(
		'label'    => esc_html__( 'Sidebar Content Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_sidebar_content_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_footer_headings_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'footer_headings_font', array(
		'label'    => esc_html__( 'Footer Headings Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_footer_headings_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

	$wp_customize->add_setting( 'dw_footer_content_font', array(
		'default'   => 'default',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'footer_content_font', array(
		'label'    => esc_html__( 'Footer Content Font', 'dw-fonts' ),
		'section'  => 'dw-persian-fonts',
		'settings' => 'dw_footer_content_font',
		'type'     => 'select',
		'choices'  => dw_fonts_families(),
	) );

    $wp_customize->add_setting( 'dw_custom_elements1', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'custom_elements1', array(
        'label'    => esc_html__( 'Custom Elements 1', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts',
        'settings' => 'dw_custom_elements1',
        'type'     => 'text',
        'description' => esc_html__( 'Enter custom elements (id, class, tag name) that you want to set font for them. Separate them by comma. For example p, header, .myClass, #myId', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_custom_elements1_font', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'custom_elements1_font', array(
        'label'    => esc_html__( 'Custom Elements 1 Font', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts',
        'settings' => 'dw_custom_elements1_font',
        'type'     => 'select',
        'choices'  => dw_fonts_families(),
    ) );


    $wp_customize->add_setting( 'dw_custom_elements2', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'custom_elements2', array(
        'label'    => esc_html__( 'Custom Elements 2', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts',
        'settings' => 'dw_custom_elements2',
        'type'     => 'text',
        'description' => esc_html__( 'Enter custom elements (id, class, tag name) that you want to set font for them. Separate them by comma. For example p, header, .myClass, #myId', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_custom_elements2_font', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'custom_elements2_font', array(
        'label'    => esc_html__( 'Custom Elements 2 Font', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts',
        'settings' => 'dw_custom_elements2_font',
        'type'     => 'select',
        'choices'  => dw_fonts_families(),
    ) );


    // add new font section
    $wp_customize->add_section( 'dw-add-new-font', array(
        'title'    => esc_html__( 'Add New Font', 'dw-fonts' ),
        'priority' => 2,
        'panel'    => 'dw_fonts_panel',
    ) );

    $wp_customize->add_setting( 'dw_new_font_family1_name', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'new_font_family1_name', array(
        'label'    => esc_html__( 'New Font Name 1', 'dw-fonts' ),
        'section'  => 'dw-add-new-font',
        'settings' => 'dw_new_font_family1_name',
        'type'     => 'text',
        'description' => esc_html__( 'If you want to add the new font family, enter its name here. Then save settings and refresh the page and select it from font family section.', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_new_font_family1_file_ttf', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family1_file_ttf',
            array(
                'label'      => esc_html__( 'TTF Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family1_file_ttf',
                'description' => esc_html__( 'Upload your font as TTF format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family1_file_woff', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family1_file_woff',
            array(
                'label'      => esc_html__( 'WOFF Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family1_file_woff',
                'description' => esc_html__( 'Upload your font as WOFF format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family1_file_woff2', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family1_file_woff2',
            array(
                'label'      => esc_html__( 'WOFF2 Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family1_file_woff2',
                'description' => esc_html__( 'Upload your font as WOFF2 format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family1_file_eot', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family1_file_eot',
            array(
                'label'      => esc_html__( 'EOT Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family1_file_eot',
                'description' => esc_html__( 'Upload your font as EOT format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family2_name', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'new_font_family2_name', array(
        'label'    => esc_html__( 'New Font Name 2', 'dw-fonts' ),
        'section'  => 'dw-add-new-font',
        'settings' => 'dw_new_font_family2_name',
        'type'     => 'text',
        'description' => esc_html__( 'If you want to add the new font family, enter its name here.', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_new_font_family2_file_ttf', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family2_file_ttf',
            array(
                'label'      => esc_html__( 'TTF Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family2_file_ttf',
                'description' => esc_html__( 'Upload your font as TTF format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family2_file_woff', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family2_file_woff',
            array(
                'label'      => esc_html__( 'WOFF Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family2_file_woff',
                'description' => esc_html__( 'Upload your font as WOFF format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family2_file_woff2', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family2_file_woff2',
            array(
                'label'      => esc_html__( 'WOFF2 Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family2_file_woff2',
                'description' => esc_html__( 'Upload your font as WOFF2 format.', 'dw-fonts' ),
            ) )
    );

    $wp_customize->add_setting( 'dw_new_font_family2_file_eot', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'new_font_family2_file_eot',
            array(
                'label'      => esc_html__( 'EOT Font Format', 'dw-fonts' ),
                'section'    => 'dw-add-new-font',
                'settings'   => 'dw_new_font_family2_file_eot',
                'description' => esc_html__( 'Upload your font as EOT format.', 'dw-fonts' ),
            ) )
    );


    // wp admin font section
    $wp_customize->add_section( 'dw-wp-admin-custom-font', array(
        'title'    => esc_html__( 'Wp Admin Font', 'dw-fonts' ),
        'priority' => 4,
        'panel'    => 'dw_fonts_panel',
    ) );

    $wp_customize->add_setting( 'dw_enable_wp_admin_font', array(
        'default'           => '1',
        'transport'         => '',
        'sanitize_callback' => 'dw_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'enable_wp_admin_font', array(
        'label'       => esc_html__( 'Enable Wp Admin Font?', 'dw-fonts' ),
        'section'     => 'dw-wp-admin-custom-font',
        'settings'    => 'dw_enable_wp_admin_font',
        'type'        => 'checkbox',
        'description' => esc_html__( 'To enable persian font for wp admin, check this box.', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_wp_admin_font', array(
        'default'   => 'default',
        'transport' => '',
    ) );

    $wp_customize->add_control( 'wp_admin_font', array(
        'label'    => esc_html__( 'Wp Admin Font', 'dw-fonts' ),
        'section'  => 'dw-wp-admin-custom-font',
        'settings' => 'dw_wp_admin_font',
        'type'     => 'select',
		'description' => esc_html__( 'If you are using Dehkadeh Wp themes or plugins, it is recommended to set this option to default. Because we set Beautiful IranSans font and some RTL fixes for admin by default.', 'dw-fonts' ),
        'choices'  => dw_fonts_families(),
    ) );


    // font size section
    $wp_customize->add_section( 'dw-persian-fonts-size', array(
        'title'    => esc_html__( 'Font Size', 'dw-fonts' ),
        'priority' => 3,
        'panel'    => 'dw_fonts_panel',
    ) );

    $wp_customize->add_setting( 'dw_enable_font_size', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dw_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'enable_font_size', array(
        'label'       => esc_html__( 'Enable Custom Font Size?', 'dw-fonts' ),
        'section'     => 'dw-persian-fonts-size',
        'settings'    => 'dw_enable_font_size',
        'type'        => 'checkbox',
        'description' => esc_html__( 'To enable custom font size settings in below, check this box.', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_force_styles_size', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'dw_sanitize_checkbox',
    ) );

    $wp_customize->add_control( 'force_styles_size', array(
        'label'       => esc_html__( 'Force Styles?', 'dw-fonts' ),
        'section'     => 'dw-persian-fonts-size',
        'settings'    => 'dw_force_styles_size',
        'type'        => 'checkbox',
        'description' => esc_html__( 'If your choices are not displaying correctly, check this box.', 'dw-fonts' ),
    ) );

    $wp_customize->add_setting( 'dw_body_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'body_font_size', array(
        'label'    => esc_html__( 'Body Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_body_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_h1_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'h1_font_size', array(
        'label'    => esc_html__( 'H1 Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_h1_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_h2_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'h2_font_size', array(
        'label'    => esc_html__( 'H2 Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_h2_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_h3_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'h3_font_size', array(
        'label'    => esc_html__( 'H3 Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_h3_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_h4_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'h4_font_size', array(
        'label'    => esc_html__( 'H4 Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_h4_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_h5_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'h5_font_size', array(
        'label'    => esc_html__( 'H5 Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_h5_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_h6_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'h6_font_size', array(
        'label'    => esc_html__( 'H6 Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_h6_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_site_title_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'site_title_font_size', array(
        'label'    => esc_html__( 'Site Title Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_site_title_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_site_description_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'site_description_font_size', array(
        'label'    => esc_html__( 'Site Description Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_site_description_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_navigation_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'navigation_font_size', array(
        'label'    => esc_html__( 'Navigation Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_navigation_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_post_content_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'post_content_font_size', array(
        'label'    => esc_html__( 'Post/Page Content Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_post_content_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_sidebar_content_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'sidebar_content_font_size', array(
        'label'    => esc_html__( 'Sidebar Content Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_sidebar_content_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

    $wp_customize->add_setting( 'dw_footer_content_font_size', array(
        'default'   => 'default',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( 'footer_content_font_size', array(
        'label'    => esc_html__( 'Footer Content Font Size', 'dw-fonts' ),
        'section'  => 'dw-persian-fonts-size',
        'settings' => 'dw_footer_content_font_size',
        'type'     => 'select',
        'choices'  => dw_fonts_size(),
    ) );

}
add_action( 'customize_register', 'dw_customize_register' );

/**
 * Sanitize the checbox value.
 *
 * @param int $input the input to sanitize.
 * @return int 1 if checked, 0 if not.
 */
function dw_sanitize_checkbox( $input ) {
	if ( true === $input || '1' === $input ) {
		return '1';
	}
	return '0';
}
