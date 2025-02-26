<?php
    /*
     *	Login and Registration Live Customizer
     *  @@author Allan Empalmado
     *  @Since : 1.0.1
    */
if ( ! defined( 'ABSPATH' ) ) exit;

class AE_Admin_Live_Login_Registration_Styling
{
    public function __construct( ){
		
		add_action( 'customize_register', array(__CLASS__, 'ae_live_customizer_register' ),1002);
		//add_action( 'wp_head' , array( __CLASS__ , 'header_output' ),1002 );
		add_action( 'login_head' ,  array(AE_Admin_Login_Registration_Styling::class, 'ae_login_page_implement_customization' ), 1002 );
    }



    public static function ae_live_customizer_register( $wp_customize ) {

    	/*
    		Remove custom theme settings when viewing the login form
    	*/
    	if(isset($_GET["url"]) && $_GET["url"] == wp_login_url() && is_customize_preview()){
		    $reg_sections 	= $wp_customize->sections();
		    $reg_panels 	= $wp_customize->panels();

		    //Remove all customizer section we didn;t need
		    /* @since 1.0.2 */
		    foreach( $reg_sections as $section ) {
		       $wp_customize->remove_section( $section->id );
		    }  

		    foreach( $reg_panels as $panel ) {
		       $wp_customize->remove_panel( $panel->id );
		    }  

		}


		/*
			Basic Styling
		*/
		    $wp_customize->add_section('ae_admin_customizer_logreg_basic_section', array(
		        'priority' => 5,
		        'title' => __('Basic Styling', 'ae-admin-customizer'),
		    ));


		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_bgcolor_picker]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_textcolor_picker]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_linkcolor_picker]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_buttoncolor_picker]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_bgcolor_picker]', 
			         array(
			            'label'      => __( 'Background Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_bgcolor_picker]', 
			            'priority'   => 10, 
			            'section'    => 'ae_admin_customizer_logreg_basic_section', 
			         ) 
			) );


			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_textcolor_picker]', 
			         array(
			            'label'      => __( 'Text Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_textcolor_picker]', 
			            'priority'   => 10, 
			            'section'    => 'ae_admin_customizer_logreg_basic_section', 
			         ) 
			) );


			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_linkcolor_picker]', 
			         array(
			            'label'      => __( 'Link Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_linkcolor_picker]', 
			            'priority'   => 10, 
			            'section'    => 'ae_admin_customizer_logreg_basic_section', 
			         ) 
			) );


			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_buttoncolor_picker]', 
			         array(
			            'label'      => __( 'Button Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_buttoncolor_picker]', 
			            'priority'   => 10, 
			            'section'    => 'ae_admin_customizer_logreg_basic_section', 
			         ) 
			) );






		/*
			Box Styling Settings
		*/
		    $wp_customize->add_section('ae_admin_customizer_logreg_box_section', array(
		        'priority' => 5,
		        'title' => __('Login Box Styling', 'ae-admin-customizer'),
		    ));

		    //Box Styling

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_boxcolor_picker]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_box_rounded_corners]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_box_border_radius]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
				'default'  => "0"
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_box_border_color]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_box_border_thick]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		        'default'  => "0"
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_box_width]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		        'default'  => "320"
		    ));



			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_boxcolor_picker]', 
			         array(
			            'label'      => __( 'Box Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_boxcolor_picker]', 
			            'priority'   => 10, 
			            'section'    => 'ae_admin_customizer_logreg_box_section', 
			         ) 
			) );


			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_box_border_color]', 
			         array(
			            'label'      => __( 'Box Border Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_box_border_color]', 
			            'priority'   => 10, 
			            'section'    => 'ae_admin_customizer_logreg_box_section', 
			         ) 
			) );


			$wp_customize->add_control(
				'ae_admin_customizer_logreg_options[ae_logreg_box_rounded_corners]', 
				array(
					'label'    => __( 'Rounded Corners?', 'ae-admin-customizer' ),
					'section'  => 'ae_admin_customizer_logreg_box_section',
					'settings' => 'ae_admin_customizer_logreg_options[ae_logreg_box_rounded_corners]',
					'type'     => 'checkbox',
				)
			);

			$wp_customize->add_control(
				'ae_admin_customizer_logreg_options[ae_logreg_box_border_radius]', 
				array(
					'label'    => __( 'Border Radius', 'ae-admin-customizer' ),
					'section'  => 'ae_admin_customizer_logreg_box_section',
					'settings' => 'ae_admin_customizer_logreg_options[ae_logreg_box_border_radius]',
					'type'     => 'number'
				)
			);


			$wp_customize->add_control(
				'ae_admin_customizer_logreg_options[ae_logreg_box_border_thick]', 
				array(
					'label'    => __( 'Box Border Thickness', 'ae-admin-customizer' ),
					'section'  => 'ae_admin_customizer_logreg_box_section',
					'settings' => 'ae_admin_customizer_logreg_options[ae_logreg_box_border_thick]',
					'type'     => 'number'
				)
			);


			$wp_customize->add_control(
				'ae_admin_customizer_logreg_options[ae_logreg_box_width]', 
				array(
					'label'    => __( 'Border Width', 'ae-admin-customizer' ),
					'section'  => 'ae_admin_customizer_logreg_box_section',
					'settings' => 'ae_admin_customizer_logreg_options[ae_logreg_box_width]',
					'type'     => 'number'
				)
			);

			/*
				Background Image Styling
			*/
		    $wp_customize->add_section('ae_admin_customizer_logreg_bgimage_section', array(
		        'priority' => 5,
		        'title' => __('Background Image Styling', 'ae-admin-customizer'),
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_use_image_background]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_image_background]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_logreg_options[ae_logreg_image_background_blend_color]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));


			$wp_customize->add_control(
				'ae_admin_customizer_logreg_options[ae_logreg_use_image_background]', 
				array(
					'label'    	=> __( 'Use image as background?', 'ae-admin-customizer' ),
					'section'  	=> 'ae_admin_customizer_logreg_bgimage_section',
					'settings' 	=> 'ae_admin_customizer_logreg_options[ae_logreg_use_image_background]',
					'type'     	=> 'checkbox',
					'priority'	=> 5,
				)
			);

		    $wp_customize->add_control(new WP_Customize_Image_Control(
		    	$wp_customize, 
		    	'ae_admin_customizer_logreg_options[ae_logreg_image_background]', 
			    	array(
				        'label' 	=> __('Background Image', 'ae-admin-customizer'),
				        'section' 	=> 'ae_admin_customizer_logreg_bgimage_section',
				        'priority' 	=> 10,
				        'settings' 	=> 'ae_admin_customizer_logreg_options[ae_logreg_image_background]'
			    	)
		    ));	

			$wp_customize->add_control( new WP_Customize_Color_Control( 
			    $wp_customize, 
			        'ae_admin_customizer_logreg_options[ae_logreg_image_background_blend_color]', 
			         array(
			            'label'      => __( 'Background Blend Color', 'ae-admin-customizer' ), 
			            'settings'   => 'ae_admin_customizer_logreg_options[ae_logreg_image_background_blend_color]', 
			            'priority'   => 15, 
			            'section'    => 'ae_admin_customizer_logreg_bgimage_section', 
			         ) 
			) );


			/*
				Custom CSS
			*/
			$wp_customize->add_section('ae_admin_customizer_logreg_custom_css_section', array(
		        'priority' => 5,
		        'title' => __('Custom CSS', 'ae-admin-customizer'),
		    ));

		    $wp_customize->add_setting('ae_admin_customizer_custom_css[ae_custom_css_logreg]', array(
		        'type' => 'option',
		        'capability' => 'manage_options',
		    ));

			$wp_customize->add_control(
				'ae_admin_customizer_custom_css[ae_custom_css_logreg]', 
				array(
					'label'    	=> __( 'Custom CSS', 'ae-admin-customizer' ),
					'section'  	=> 'ae_admin_customizer_logreg_custom_css_section',
					'settings' 	=> 'ae_admin_customizer_custom_css[ae_custom_css_logreg]',
					'type'     	=> 'textarea',
					'priority'	=> 5,
				)
			);

	}
}

new AE_Admin_Live_Login_Registration_Styling();