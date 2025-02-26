<?php


// Add the Section to the Customizer.
	$wp_customize->add_section( 'bbp_hftcustom-contentblock', array(
		'title'=> __( 'Content Block', 'j7digital' ),
		'description' => __('<h3 style="text-align: center;">Content Block Settings</h3><p style="text-align: center;">CSS ID of &lt;div id="djcustom-content"&gt;</p>', 'j7digital'),
		'priority'=> 132,
		'panel' => 'bbp_hftcustom-media',
		) );


//The Settings:
	$wp_customize->add_setting('bbp_hftcustom_content_template', array(
		)
	);

	$wp_customize->add_control('bbp_hftcustom_content_template', array(
		'label' => __('Insert A Content Template or Banner','j7digital'),
		'section' => 'bbp_hftcustom-contentblock',
		'type' => 'select',
		'default' => 'content_none',
		'choices' => j7hft_get_bb_templates()
		)
	);


	$wp_customize->add_setting('bbp_hftcustom_content_location', array(
		'default' => 'content_none',
		)
	);

	$wp_customize->add_control('bbp_hftcustom_content_location', array(
		'label' => __('Content Location','j7digital'),
		'description' => __('Where to insert on every page.<br>NOTE - some hooks will only be visible under certain circumstances (eg. fl_comments_open will only display if comments is enabled on a post. fl_header_content_open will only display with default beaver header layout of Nav Bottom, etc.) ','j7digital'),
		'section' => 'bbp_hftcustom-contentblock',
		'type' => 'select',
		'default' => 'content_none',
		'choices' => array(

			'content_none' => __('Choose A Location (Off)','j7digital'),
			'fl_before_top_bar' => __('fl_before_top_bar','j7digital'),
			'fl_before_header' => __('fl_before_header','j7digital'),
			'fl_header_content_open' => __('fl_header_content_open','j7digital'),
			'fl_header_content_close' => __('fl_header_content_close','j7digital'),
			'fl_content_open' => __('fl_content_open','j7digital'),
			'fl_post_top_meta_open' => __('fl_post_top_meta_open','j7digital'),
			'fl_post_top_meta_close' => __('fl_post_top_meta_close','j7digital'),
			'fl_post_bottom_meta_open' => __('fl_post_bottom_meta_open','j7digital'),
			'fl_post_bottom_meta_close' => __('fl_post_bottom_meta_close','j7digital'),
			'fl_comments_open' => __('fl_comments_open','j7digital'),
			'fl_comments_close' => __('fl_comments_close','j7digital'),
			'fl_sidebar_open' => __('fl_sidebar_open','j7digital'),
			'fl_sidebar_close' => __('fl_sidebar_close','j7digital'),
			'fl_after_content' => __('fl_after_content','j7digital'),
			'fl_before_footer_widgets' => __('fl_before_footer_widgets','j7digital'),
			'fl_after_footer_widgets' => __('fl_after_footer_widgets','j7digital'),
			'fl_before_footer' => __('fl_before_footer','j7digital'),
			'fl_after_footer' => __('fl_after_footer','j7digital'),
			'fl_page_close' => __('fl_page_close','j7digital'),

			)
		)
	);

