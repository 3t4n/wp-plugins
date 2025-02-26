<?php
/**
 * Extend customizer section.
 *
 * @package oneto-companion
 *
 * @see     WP_Customize_Section
 * @access  public
 */
 
function onetocompanion_oneto_frontpage_sections_settings( $wp_customize ){
	
	$active_callback    	= isset( $array['active_callback'] ) ? $array['active_callback'] : null;
	
		// Services
	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->name;	

		$page_editor_path = trailingslashit( oneto_companion_plugin_dir ) . '/inc/oneto/customizer/customizer-page-editor/customizer-page-editor.php';
		if ( file_exists( $page_editor_path ) ) { require_once( $page_editor_path ); }	
			
	/* Register frontpage panel */
	$wp_customize->add_panel( 'oneto_frontpage_settings', array(
		'priority'       => 25,
		'capability'     => 'edit_theme_options',
		'title'      => __('Frontpage Sections', 'oneto-companion'),
	) );
	
	/* Site Top Header */
	$wp_customize->add_section( 'oneto_theme_top_header_area' , array(
		'title'      => __('Site Top Header', 'oneto'),
		'panel'  => 'oneto_frontpage_settings',
		'priority'   => 1,
	) );
	
	
	    if ( class_exists( 'Oneto_Repeater' ) ) {
			$wp_customize->add_setting( 'oneto_top_header_info_content', array( ) );
			$wp_customize->add_control( new Oneto_Repeater( 
			$wp_customize, 'oneto_top_header_info_content', array(
				'label'                             => esc_html__( 'Info Items Content', 'oneto' ),
				'section'                           => 'oneto_theme_top_header_area',
				'add_field_label'                   => esc_html__( 'Add new info', 'oneto' ),
				'item_name'                         => esc_html__( 'Info Item', 'oneto' ),
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_link_control'  => true,
                'customizer_repeater_checkbox_control' => true,
			    ) ) );
		}
	
	
	    if ( class_exists( 'Oneto_Repeater' ) ) {
			$wp_customize->add_setting( 'oneto_top_header_social_content', array( ) );
			$wp_customize->add_control( new Oneto_Repeater( 
			$wp_customize, 'oneto_top_header_social_content', array(
						'label'                            => esc_html__( 'Social Items Content', 'oneto' ),
						'section'                          => 'oneto_theme_top_header_area',
						'add_field_label'                  => esc_html__( 'Add new icon', 'oneto' ),
						'item_name'                        => esc_html__( 'Social Icon', 'oneto' ),
						'customizer_repeater_icon_control'     => true,
						'customizer_repeater_link_control'     => true,
						'customizer_repeater_checkbox_control' => true,
					)
				)
			);
		}
	
	/* Slider */
	$wp_customize->add_section( 'oneto_main_theme_slider' , array(
		'title'      => __('Main Slider', 'oneto-companion'),
		'panel'  => 'oneto_frontpage_settings',
		'priority'   => 2,
   	) ); 
	
	    if ( class_exists( 'Oneto_Repeater' ) ) {
			$wp_customize->add_setting( 'oneto_main_slider_content', array( ) );
            $wp_customize->add_control( new Oneto_Repeater( 
			$wp_customize, 'oneto_main_slider_content', array(
				'label'                             => esc_html__( 'Slider Items Content', 'oneto-companion' ),
				'section'                           => 'oneto_main_theme_slider',
				'add_field_label'                   => esc_html__( 'Add new slide item', 'oneto-companion' ),
				'item_name'                         => esc_html__( 'Slide Item', 'oneto-companion' ),
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_button_text_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_button_text2_control' => true,
				'customizer_repeater_link2_control'  => true,
				'customizer_repeater_image2_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}	
	
	/* Client */
	$wp_customize->add_section( 'oneto_theme_client' , array(
		'title'      => __('Client', 'oneto-companion'),
		'panel'  => 'oneto_frontpage_settings',
		'priority'   => 3,
	) ); 		
			
		if ( class_exists( 'Oneto_Repeater' ) ) {
			$wp_customize->add_setting( 'oneto_clients_content', array( ) );
			$wp_customize->add_control( new Oneto_Repeater( 
			$wp_customize, 'oneto_clients_content', array(
				'label'                             => esc_html__( 'Clients Content', 'oneto-companion' ),
				'section'                           => 'oneto_theme_client',
				'add_field_label'                   => esc_html__( 'Add new client', 'oneto-companion' ),
				'item_name'                         => esc_html__( 'Client', 'oneto-companion' ),
				'customizer_repeater_image_control' => true,
				'customizer_repeater_link_control' => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}


	/* Feature */
	$wp_customize->add_section( 'oneto_theme_feature' , array(
		'title'      => __('Feature', 'oneto-companion'),
		'panel'  => 'oneto_frontpage_settings',
		'priority'   => 4,
   	) );
   	
        if ( class_exists( 'Oneto_Repeater' ) ) {
			$wp_customize->add_setting( 'oneto_theme_feature_content', array( ) );
            $wp_customize->add_control( new Oneto_Repeater( 
			$wp_customize, 'oneto_theme_feature_content', array(
				'label'                             => esc_html__( 'Feature Items Content', 'oneto-companion' ),
				'section'                           => 'oneto_theme_feature',
				'add_field_label'                   => esc_html__( 'Add new feature', 'oneto-companion' ),
				'item_name'                         => esc_html__( 'Feature Item', 'oneto-companion' ),
				'customizer_repeater_icon_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_link_control'  => true,
                'customizer_repeater_checkbox_control' => true,
                'customizer_repeater_button_text_control' => true,
                'customizer_repeater_image_control' => true,
				) ) );
		}
	
	
   /* Testimonial */
	$wp_customize->add_section( 'oneto_theme_testimonial' , array(
		'title'      => __('Testimonial', 'oneto-companion'),
		'panel'  => 'oneto_frontpage_settings',
		'priority'   => 7,
	) ); 
	
	
	    if ( class_exists( 'Oneto_Repeater' ) ) {
			$wp_customize->add_setting( 'oneto_testimonial_content', array( ) );
            $wp_customize->add_control( new Oneto_Repeater( 
			$wp_customize, 'oneto_testimonial_content', array(
				'label'                             => esc_html__( 'Testimonial Items Content', 'oneto-companion' ),
				'section'                           => 'oneto_theme_testimonial',
				'add_field_label'                   => esc_html__( 'Add new testimonial item', 'oneto-companion' ),
				'item_name'                         => esc_html__( 'Testimonial Item', 'oneto-companion' ),
				'customizer_repeater_text_control'  => true,
				'customizer_repeater_number_control'  => true,
				'customizer_repeater_title_control' => true,
				'customizer_repeater_designation_control' => true,
				'customizer_repeater_image_control' => true,
				'customizer_repeater_link_control'  => true,
				'customizer_repeater_checkbox_control' => true,
				) ) );
		}
	
	
    /* Blog */
	$wp_customize->add_section( 'oneto_theme_blog' , array(
		'title'      => __('Blog', 'oneto-companion'),
		'panel'  => 'oneto_frontpage_settings',
		'priority'   => 9,
	) ); 
	
	    $wp_customize->add_setting( 'oneto_theme_blog_category',array('capability'     => 'edit_theme_options',) );	
	    $wp_customize->add_control( new Oneto_Customize_Category_Control( $wp_customize, 'oneto_theme_blog_category', array(
			'label'   => __('Choose Blog Category','oneto-companion'),
			'section' => 'oneto_theme_blog',
			'settings'   => 'oneto_theme_blog_category',
			'sanitize_callback' => 'sanitize_text_field',
		) ) );


	/* Cta */
	$wp_customize->add_section( 'oneto_theme_cta_four' , array(
		'title'    => __('Call to action', 'oneto'),
		'panel'    => 'oneto_frontpage_settings',
		'priority' => 11,
	) ); 
	
	        //Cta Image
			$wp_customize->add_setting( 'oneto_cta_four_image', array(
			  'sanitize_callback' => 'esc_url_raw',
			  'default' => oneto_companion_plugin_url . '/inc/oneto/assets/img/cta-img02.png',
			) );
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'oneto_cta_four_image', array(
			  'label'    => esc_html__( 'Image', 'oneto' ),
			  'section'  => 'oneto_theme_cta_four',
			  'settings' => 'oneto_cta_four_image',
			  'priority' => 15,
			) ) );

}
add_action( 'customize_register', 'onetocompanion_oneto_frontpage_sections_settings' );


function onetocompanion_oneto_customizer_selective_refresh_settings($wp_customize) {
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	

	// Feature
	$activate_theme_data = wp_get_theme(); // getting current theme data
	$activate_theme = $activate_theme_data->name;
	
	if('Oneto' == $activate_theme){
		$ftitle = 'Discover More <span class="line-shape2 pb-1 end-auto position-relative font-weight-800">Features</span>';
		$fdescription = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.';
		$ctitle = 'Grow with Oneto';
		$cdescription = 'Make the most out of your email marketing campaigns with our AI-powered, customizable, and powerful email marketing tool. Get rid of all complications and grow your business with our easy-to-use features.';
		$cdesbottom = 'Already have an account ? <a href="#">Log in</a>';
		$cbuttonone = 'Getting Started';
		$cbuttontwo = 'See pricing';
	}

		$wp_customize->add_setting( 'oneto_feature_area_title',
		array(
            'default'           => __(''.$ftitle.'','oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'oneto_feature_area_title',
		array(
			'label'    => esc_html__( 'Section Title', 'oneto-companion' ),
			'section'  => 'oneto_theme_feature',
			'priority' => 4,
			'type'     => 'text',
		));
		
		$wp_customize->add_setting( 'oneto_feature_area_des',
		array(
            'default'           => __(''.$fdescription.'','oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'oneto_feature_area_des',
		array(
			'label'    => esc_html__( 'Section Description', 'oneto-companion' ),
			'section'  => 'oneto_theme_feature',
			'priority' => 5,
			'type'     => 'textarea',
		));
		

	// Testimonial
		$wp_customize->add_setting( 'oneto_testimonial_area_subtitle',
		array(
            'default' 			=> __('JOIN US', 'oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' 		=> $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_testimonial_area_subtitle',
		array(
			'label'   			=> esc_html__( 'Section Sub Title', 'oneto-companion' ),
			'section' 			=> 'oneto_theme_testimonial',
			'priority'        	=> 4,
			'type' 				=> 'text',
		));
	
		$wp_customize->add_setting( 'oneto_testimonial_area_title',
		array(
            'default' 			=> __('Are You Ready To Get Started With Influence Agents?', 'oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' 		=> $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_testimonial_area_title',
		array(
			'label'   			=> esc_html__( 'Section Title', 'oneto-companion' ),
			'section' 			=> 'oneto_theme_testimonial',
			'priority'       	=> 5,
			'type' 				=> 'text',
		));
		$wp_customize->add_setting( 'oneto_testimonial_button_text',
		array(
            'default' 			=> 'Book Cunsultation',
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport'			=> $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_testimonial_button_text',
		array(
			'label'   			=> esc_html__( 'Button Text', 'oneto-companion' ),
			'section' 			=> 'oneto_theme_testimonial',
			'priority'        	=> 6,
			'type' 				=> 'text',
		));
		
		
	// Blog
	
		$wp_customize->add_setting( 'oneto_blog_area_title',
		array(
            'default' => __('Latest <span class="line-shape2 pb-1 end-auto position-relative font-weight-800">News</span>','oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'oneto_blog_area_title',
		array(
			'label'   => esc_html__( 'Section Title', 'oneto-companion' ),
			'section' => 'oneto_theme_blog',
			'priority'        => 4,
			'type' => 'text',
		));	
		
		$wp_customize->add_setting( 'oneto_blog_area_des',
		array(
            'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.','oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));	
		$wp_customize->add_control( 'oneto_blog_area_des',
		array(
			'label'   => esc_html__( 'Section Description', 'oneto-companion' ),
			'section' => 'oneto_theme_blog',
			'priority'        => 5,
			'type' => 'textarea',
    	));
		
		// Call to action
	
		$wp_customize->add_setting( 'oneto_cta_four_area_title',
		array(
            'default' => __(''.$ctitle.'', 'oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_cta_four_area_title',
		array(
			'label'   => esc_html__( 'Title', 'oneto' ),
			'section' => 'oneto_theme_cta_four',
			'priority' => 3,
			'type' => 'text',
		));
		
		$wp_customize->add_setting( 'oneto_cta_four_area_des',
		array(
            'default' => __(''.$cdescription.'', 'oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_cta_four_area_des',
		array(
			'label'   => esc_html__( 'Description', 'oneto' ),
			'section' => 'oneto_theme_cta_four',
			'priority' => 4,
			'type' => 'textarea',
		));
		
		$wp_customize->add_setting( 'oneto_cta_four_button_text_one',
		array(
            'default' => __(''.$cbuttonone.'','oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_cta_four_button_text_one',
		array(
			'label'   => esc_html__( 'Button One Text', 'oneto' ),
			'section' => 'oneto_theme_cta_four',
			'priority' => 5,
			'type' => 'text',
		));

		$wp_customize->add_setting( 'oneto_cta_four_button_text_two',
		array(
            'default' => __(''.$cbuttontwo.'', 'oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_cta_four_button_text_two',
		array(
			'label'   => esc_html__( 'Button Two Text', 'oneto' ),
			'section' => 'oneto_theme_cta_four',
			'priority' => 7,
			'type' => 'text',
		));

		$wp_customize->add_setting( 'oneto_cta_four_area_desbottom',
		array(
            'default' => __(''.$cdesbottom.'', 'oneto-companion'),
			'sanitize_callback' => 'oneto_sanitize_text',
			'transport' => $selective_refresh,
		));
		$wp_customize->add_control( 'oneto_cta_four_area_desbottom',
		array(
			'label'   => esc_html__( 'Description Bottom', 'oneto' ),
			'section' => 'oneto_theme_cta_four',
			'priority' => 10,
			'type' => 'textarea',
		));
		
}
add_action( 'customize_register', 'onetocompanion_oneto_customizer_selective_refresh_settings' );