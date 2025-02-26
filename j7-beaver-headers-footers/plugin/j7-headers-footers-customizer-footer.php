<?php


// Add the Section to the Customizer.
	$wp_customize->add_section( 'bbp_hftcustom-footers', array(
		'title'=> __( 'Footer', 'j7digital' ),
		'description' => __( '<h3 style="text-align: center;">&lt;Footer&gt; Settings</h3><p style="text-align: center;">CSS ID of &lt;footer id="djcustom-footer" ...&gt;</p>', 'j7digital'),
		'priority'=> 131,
		'panel' => 'bbp_hftcustom-media',
		) );

//The Settings:
	$wp_customize->add_setting('bbp_hftcustom_footer_template', array(
		)
	);

	$wp_customize->add_control('bbp_hftcustom_footer_template', array(
		'label' => __('Footer Template','j7digital'),
		'section' => 'bbp_hftcustom-footers',
		'type' => 'select',
		'default' => 'footer_none',
		'choices' => j7hft_get_bb_templates()
		)
	);


	$wp_customize->add_setting('bbp_hftcustom_footer_location', array(
		'default' => 'footer_none',
		)
	);

	$wp_customize->add_control('bbp_hftcustom_footer_location', array(
		'label' => __('Footer Location','j7digital'),
		'section' => 'bbp_hftcustom-footers',
		'type' => 'select',
		'default' => 'footer_none',
		'choices' => array(
			'footer_none' => __('Choose A Location (Off)','j7digital'),
			'footer_above_default' => __('Above the Default Footer (and widgets)','j7digital'), //(also above widgets)
			'footer_below_default' => __('Below the Default Footer','j7digital'),
			'footer_below_page' => __('Just before the closing \'body\' tag (Independent Width)','j7digital')

			)
		)
	);
