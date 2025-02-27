<?php
/**
 * Table of contents
 * 
 * fancy_coming_soon_customizer ( Add options )
 * fancy_coming_soon_sanitize_text ( Santitize data )
 */

 /* Theme Customizer Panel */
 function fancy_coming_soon_customizer( $wp_customize ) {
	 
	// Main panel

	$wp_customize->add_panel( 'fancy_coming_soon_general_panel', array(
 		'priority'    => 1,
 		'title'       => esc_html__( 'Fancy Coming Soon Settings', 'fancy-coming-soon'),
	));
	
	// Section - General
	
	$wp_customize->add_section( 'fancy_coming_soon_section_general', array(
		'title'          => esc_html__( 'General', 'fancy-coming-soon' ),
		'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
		'priority'       => 5,
	));
	
		// General - Enable/Disable
		
		$wp_customize->add_setting( 'fancy_coming_soon_preview' ,array(
			'type' => 'option',
			'default' => '1',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_preview', array(
				'label'          => esc_html__( 'Preview Coming Soon Page?', 'fancy-coming-soon' ),
				'description'          => esc_html__( 'Refresh this page page after saving in order to see the change.  This is used to preview your coming soon page in the theme customizer.', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_general',
				'type' => 'checkbox',
				'priority'   => 10,
			));
		
		// General - Custom CSS

		$wp_customize->add_setting( 'fancy_coming_soon_page_custom_css' ,array(
			'type' => 'option',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_page_custom_css', array(
				'label'          => esc_html__( 'Custom CSS on Coming Soon Page', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_general',
				'type' => 'textarea',
				'priority'   => 20,
			));
	
	// Section - Background
	
	$wp_customize->add_section( 'fancy_coming_soon_section_background', array(
		'title'          => esc_html__( 'Background', 'fancy-coming-soon' ),
		'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
		'priority'       => 10,
	));
	
		// Background - Color

		$wp_customize->add_setting( 'fancy_coming_soon_background_color', array(
			'type' => 'option',
			'default' => '#f5f5f5',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fancy_coming_soon_background_color', array(
				'label'    => esc_html__( 'Background Color', 'fancy-coming-soon' ),
				'section'  => 'fancy_coming_soon_section_background',
				'priority'   => 10,
			)));
		
		// Background - Image
		
		$wp_customize->add_setting( 'fancy_coming_soon_background_image' ,array(
			'type' => 'option',
			'default' => plugin_dir_url( __FILE__ ) .'../assets/images/bg.jpg',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'fancy_coming_soon_background_image', array(
				'label'    => esc_html__( 'Background Image', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_background',
				'priority'   => 20,
			)));
		
		// Background - Repeat
		
		$wp_customize->add_setting( 'fancy_coming_soon_background_repeat' ,array(
			'type' => 'option',
			'default' =>  'no-repeat',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_background_repeat', array(
				'label'          => esc_html__( 'Background Repeat', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_background',
				'type' => 'radio',
				'priority'   => 30,
				'choices' => array(
					'no-repeat' => esc_html__( 'No repeat', 'fancy-coming-soon' ),
					'repeat-all' => esc_html__( 'Tile', 'fancy-coming-soon' ),
					'repeat-x' => esc_html__( 'Tile Horizontally', 'fancy-coming-soon' ),
					'repeat-y' => esc_html__( 'Tile Vertically', 'fancy-coming-soon' ),
				),
			));
		
		// Background - Position
		
		$wp_customize->add_setting( 'fancy_coming_soon_background_position' ,array(
			'type' => 'option',
			'default' =>  'center',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_background_position', array(
				'label'          => esc_html__( 'Background Position', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_background',
				'type' => 'radio',
				'priority'   => 40,
				'choices' => array(
					'left' => esc_html__( 'Left', 'fancy-coming-soon' ),
					'center' => esc_html__( 'Center', 'fancy-coming-soon' ),
					'right' => esc_html__( 'Right', 'fancy-coming-soon' ),
				),	
			));
		
		// Background - Cover
		
		$wp_customize->add_setting( 'fancy_coming_soon_background_cover' ,array(
			'type' => 'option',
			'default' =>  'cover',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_background_cover', array(
				'label'          => esc_html__( 'Background Cover', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_background',
				'type' => 'radio',
				'priority'   => 50,
				'choices' => array(
					'cover' => esc_html__( 'Cover', 'fancy-coming-soon' ),
					'auto' => esc_html__( 'Auto', 'fancy-coming-soon' ),
				),	
			));
	
	// Section - Logo

	$wp_customize->add_section( 'fancy_coming_soon_section_logo', array(
		'title'          => esc_html__( 'Site Logo', 'fancy-coming-soon' ),
		'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
		'priority'       => 20,
	));
	
		// Logo - Image

		$wp_customize->add_setting( 'fancy_coming_soon_plugin_logo' ,array(
			'type' => 'option',
			'default' => plugin_dir_url( __FILE__ ) .'../assets/images/logo.png',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'fancy_coming_soon_plugin_logo', array(
				'label'    => esc_html__( 'Logo Image', 'fancy-coming-soon' ),
				'description'    => esc_html__( 'Recommended size: 80px by 80px', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_logo',
				'priority'   => 10,
				))
			);

		// Logo - Force HTTPS

		$wp_customize->add_setting( 'fancy_coming_soon_plugin_logo_force_https' ,array(
			'type' => 'option',
			'default' => 'no',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_plugin_logo_force_https', array(
				'label'    => esc_html__( 'Force HTTPS', 'fancy-coming-soon' ),
				'description'    => esc_html__( 'In case your site is HTTPS but the image loads over HTTP, enable this to force it to load through HTTPS.', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_logo',
				'type' => 'select',
				'priority'   => 10,
				'choices' => array(
					'no' => __( 'No', 'fancy-coming-soon' ),
					'yes' => __( 'Yes', 'fancy-coming-soon' ),
				),
			));
	
	// Section - Content
	$wp_customize->add_section( 'fancy_coming_soon_section_page_settings', array(
		'title'          => esc_html__( 'Page Content', 'fancy-coming-soon' ),
		'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
		'priority'       => 30,
		) 
	);
	
		// Content - Color

		$wp_customize->add_setting( 'fancy_coming_soon_content_color' ,array(
			'type' => 'option',
			'default' =>  'light',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_content_color', array(
				'label'          => esc_html__( 'Text Color', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_page_settings',
				'type' => 'select',
				'priority'   => 10,
				'choices' => array(
					'light' => __( 'Light', 'fancy-coming-soon' ),
					'dark' => __( 'Dark', 'fancy-coming-soon' ),
				),
			));

		// Content - Percentage
		
		$wp_customize->add_setting( 'fancy_coming_soon_percentage_completed' ,array(
			'type' => 'option',
			'default' =>  '75',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_percentage_completed', array(
				'label'          => esc_html__( 'Percentage Completed', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_page_settings',
				'type' => 'text',
				'priority'   => 10,
			));
		
		// Content - Heading

		$wp_customize->add_setting( 'fancy_coming_soon_page_heading' ,array(
			'type' => 'option',
			'default' =>  '<h1>Something <strong>really good</strong> is coming <strong>very soon</strong>.</h1>',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_page_heading', array(
				'label'          => esc_html__( 'Heading', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_page_settings',
				'type' => 'textarea',
				'priority'   => 20,
			));
		
		// Content - Text
		
		$wp_customize->add_setting( 'fancy_coming_soon_page_content' ,array(
			'type' => 'option',
			'default' =>  'If you have something new you’re looking to launch, you’re going to want to start building a community of people interested in what you’re launching. The Launch template by is the best way to do just that.',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_page_content', array(
				'label'          => esc_html__( 'Main Content', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_page_settings',
				'type' => 'textarea',
				'priority'   => 30,
			));
		
		// Content - Footer

		$wp_customize->add_setting( 'fancy_coming_soon_page_footer' ,array(
			'type' => 'option',
			'default' =>  'Designed by <a href="http://www.leeflets.com" rel="nofollow" target="_blank">Jason Schuller</a> & Developed by <a href="http://www.wpkube.com/" rel="nofollow" target="_blank">WP Kube</a>',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_page_footer', array(
				'label'          => esc_html__( 'Footer Text', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_page_settings',
				'type' => 'textarea',
				'priority'   => 40,
			));

		// Section - MailChimp
		$wp_customize->add_section( 'fancy_coming_soon_mailchimp_key', array(
			'title'          => esc_html__( 'MailChimp Form', 'fancy-coming-soon' ),
			'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
			'priority'       => 40,
			) 
		);
		
			// MailChimp - Enable/Disable

			$wp_customize->add_setting( 'fancy_coming_soon_mailchimp_form' ,array(
				'type' => 'option',
				'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
			) );
			
				$wp_customize->add_control( 'fancy_coming_soon_mailchimp_form', array(
					'label'          => esc_html__( 'Disable MailChimp Form', 'fancy-coming-soon' ),
					'section' => 'fancy_coming_soon_mailchimp_key',
					'type' => 'checkbox',
					'priority'   => 10,
				));
			
			// MailChimp - Form URL
			
			$wp_customize->add_setting( 'fancy_coming_soon_mailchimp_form_url' ,array(
				'type' => 'option',
				'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
			) );
		
				$wp_customize->add_control( 'fancy_coming_soon_mailchimp_form_url', array(
					'label'          => esc_html__( 'MailChimp Form Action URL', 'fancy-coming-soon' ),
					'description'	  => __( 'If you aren\'t sure how to get the action URL, check <a href="https://wordpress.org/support/topic/how-to-set-up-mailchimp-form/" target="_blank">this step by step guide</a>. ', 'fancy-coming-soon'),
					'section' => 'fancy_coming_soon_mailchimp_key',
					'type' => 'text',
					'priority'   => 10,
				));
	
	// Section - Social Links
	
	$wp_customize->add_section( 'fancy_coming_soon_section_social_settings', array(
		'title'          => esc_html__( 'Social Links', 'fancy-coming-soon' ),
		'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
		'priority'       => 50,
		) 
	);
	
		// Social Link - Twitter

		$wp_customize->add_setting( 'fancy_coming_soon_social_twitter' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );
		
			$wp_customize->add_control( 'fancy_coming_soon_social_twitter', array(
				'label'          => esc_html__( 'Twitter', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_social_settings',
				'type' => 'text',
				'priority'   => 10,
			));
		
		// Social link - Facebook
		
		$wp_customize->add_setting( 'fancy_coming_soon_social_facebook' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_social_facebook', array(
				'label'          => esc_html__( 'Facebook', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_social_settings',
				'type' => 'text',
				'priority'   => 20,
			));

		// Social link - Instagram
		
		$wp_customize->add_setting( 'fancy_coming_soon_social_instagram' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_social_instagram', array(
				'label'          => esc_html__( 'Instagram', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_social_settings',
				'type' => 'text',
				'priority'   => 21,
			));

		// Social link - Whatsapp
		
		$wp_customize->add_setting( 'fancy_coming_soon_social_whatsapp' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_social_whatsapp', array(
				'label'          => esc_html__( 'Whatsapp', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_social_settings',
				'type' => 'text',
				'priority'   => 22,
			));
		
		// Social link - Email

		$wp_customize->add_setting( 'fancy_coming_soon_social_email' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => 'fancy_coming_soon_sanitize_text',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_social_email', array(
				'label'          => esc_html__( 'Email', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_social_settings',
				'type' => 'text',
				'priority'   => 30,
			));

	// Section - Custom Code
	
	$wp_customize->add_section( 'fancy_coming_soon_section_custom_code_settings', array(
		'title'          => esc_html__( 'Custom Code', 'fancy-coming-soon' ),
		'description'    => esc_html__( 'Can be used for additional CSS, JavaScript and HTML in general.', 'fancy-coming-soon' ),
		'panel'          => 'fancy_coming_soon_general_panel', // Not typically needed.
		'priority'       => 60,
		) 
	);

		$wp_customize->add_setting( 'fancy_coming_soon_custom_code_header' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => '',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_custom_code_header', array(
				'label'          => esc_html__( 'Custom HTML code before </head>', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_custom_code_settings',
				'type' => 'textarea',
				'priority'   => 30,
			));

		$wp_customize->add_setting( 'fancy_coming_soon_custom_code_footer' ,array(
			'type' => 'option',
			'default' =>  '',
			'sanitize_callback' => '',
		) );

			$wp_customize->add_control( 'fancy_coming_soon_custom_code_footer', array(
				'label'          => esc_html__( 'Custom HTML code before </body>', 'fancy-coming-soon' ),
				'section' => 'fancy_coming_soon_section_custom_code_settings',
				'type' => 'textarea',
				'priority'   => 30,
			));
	
} add_action( 'customize_register', 'fancy_coming_soon_customizer' );

/**
 * Sanitize data
 * 
 * @since 1.0.0
 */
function fancy_coming_soon_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
