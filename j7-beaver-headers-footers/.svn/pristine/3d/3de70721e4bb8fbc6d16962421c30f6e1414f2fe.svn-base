<?php


// Add the Section to the Customizer.
	$wp_customize->add_section( 'bbp_hftcustom-headers', array(
		'title'=> __( 'Header', 'j7digital' ),
		'description' => __( '<h3 style="text-align: center;">	&lt;Header&gt; Settings</h3><p style="text-align: center;">CSS ID of &lt;header id="djcustom-header" ...&gt;</p>', 'j7digital' ),
		'panel' => 'bbp_hftcustom-media',
		'priority'=> 130,
		) );




//The Settings:
	$wp_customize->add_setting('bbp_hftcustom_header_template', array(
		)
	);
	$wp_customize->add_control('bbp_hftcustom_header_template', array(
		'label' => __('Header Template.','j7digital'),
		'section' => 'bbp_hftcustom-headers',
		'type' => 'select',
		'default' => 'Choose A Template (Off)',
		'choices' => j7hft_get_bb_templates()

		)
	);


	$wp_customize->add_setting('bbp_hftcustom_header_location', array(
		'default' => 'header_none',
		)
	);

	$wp_customize->add_control('bbp_hftcustom_header_location', array(
		'label' => __('Header Location','j7digital'),
		'section' => 'bbp_hftcustom-headers',
		'type' => 'select',
		'default' => 'header_none',
		'choices' => array(
			'header_none' => __('Choose A Location (Off)','j7digital'),
			'header_above_top_bar' => __('Above Top Bar','j7digital'),
			'header_above_default_header' => __('Above Default Header','j7digital'),
			'header_above_content' => __('Above Content','j7digital'),
			'header_above_page' => __('Just below the opening \'body\' tag (Independent width)','j7digital')
			)
		)
	);


   $wp_customize->add_setting('bbp_hftcustom_header_absolute', array(
 		'default' => 'insert_all',
        )
   );

	$wp_customize->add_control('bbp_hftcustom_header_absolute', array(
		'label' => __('Header Insert Type','j7digital'),
		'description' => __('Where and how would you like the header added to your content?','j7digital'),
		'section' => 'bbp_hftcustom-headers',
		'default' => 'insert_all',
		'type' => 'select',
		'choices' => array(
			'insert_all' => __('Insert - All Pages','j7digital'),
			'insert_home' => __('Insert - Home Page - (Hide on others)','j7digital'),
			'overlay_all' => __('Overlay - All Pages','j7digital'),
			'overlay_homepage' => __('Overlay - Home Page - (Hide on others)','j7digital'),
			'overlay_homepage_insertrest' => __('Overlay - Home Page - (Insert on others)','j7digital'),
			'fixed_all' => __('Fixed Overlay - All Pages','j7digital'),
			'fixed_homepage' => __('Fixed Overlay - Home Page - (Hide on others)','j7digital'),
			'fixed_homepage_insertrest' => __('Fixed Overlay - Home Page - (Insert on others)','j7digital'),
			),

		)
	);




   $wp_customize->add_setting('bbp_hftcustom_header_opacity', array(
   		'default' => 'false',
        )
   );

	$wp_customize->add_control('bbp_hftcustom_header_opacity', array(
		'label' => __('Header Opacity','j7digital'),
		'description' => __('Force the header background opacity?','j7digital'),
		'section' => 'bbp_hftcustom-headers',
		'default' => 'false',
		'type' => 'select',
		'choices' => array(
			'false' => __('Off','j7digital'),
			'homepage' => __('Force on Home Page Only','j7digital'),
			'true' => __('Force on All Pages','j7digital'),
			),
		)
	);



   $wp_customize->add_setting('bbp_hftcustom_header_opacity_alpha', array(
   		'default' => '0.0',
        )
   );

	$wp_customize->add_control('bbp_hftcustom_header_opacity_alpha', array(
		'label' => __('Header Opacity Amount','j7digital'),
		'section' => 'bbp_hftcustom-headers',
		'default' => '0.0',
		'type' => 'select',
		'choices' => array (
			'0.0' => '0.0',
			'0.1' => '0.1',
			'0.2' => '0.2',
			'0.3' => '0.3',
			'0.4' => '0.4',
			'0.5' => '0.5',
			'0.6' => '0.6',
			'0.7' => '0.7',
			'0.8' => '0.8',
			'0.9' => '0.9',
			'1.0' => '1.0',
			),
		)
	);










 //   $wp_customize->add_setting('bbp_hftcustom_header_scrollbehaviour', array(
 //   		'default' => 'false',
 //        )
 //   );

	// $wp_customize->add_control('bbp_hftcustom_header_scrollbehaviour', array(
	// 	'label' => __('Scroll Behaviour','j7digital'),
	// 	'description' => __('Do This On Scroll','j7digital'),
	// 	'section' => 'bbp_hftcustom-headers',
	// 	'default' => 'Off',
	// 	'type' => 'select',
	// 	'choices' => array(
	// 		'false' => __('Off','j7digital'),
	// 		'slide' => __('Slide Up','j7digital')
	// 		),
	// 	)
	// );
