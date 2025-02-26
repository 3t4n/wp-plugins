<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly      
/*
* HA - Theme Background Color Customizer
*/

function habc_bg_color_customize_register( $wp_customize ) {
	
// =============================================================================================== Background Colors Section ============>
	
			$wp_customize->add_section( 'habc_bg_colors_section', array(
				'title' => 'HA Background Colors',
				'panel' => '',
				'priority' => '30'
			));

// // ===================================================================== Body Background Color ==========>

// // // ======== Body Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_body_bg_color_1', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_body_bg_color_1', array(
							'label' => 'Body BG',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );

// // // ======== Body Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_body_bg_color_1_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						$wp_customize->add_control('habc_body_bg_color_1_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ===================================================================== Header Background Color ==========>

// // // ======== Header Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_header_bg_color_2', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_header_bg_color_2', array(
							'label' => 'Header BG',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );

// // // ======== Header Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_header_bg_color_2_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_header_bg_color_2_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ===================================================================== Footer Background Color ==========>

// // // ======== Footer Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_footer_bg_color_3', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_footer_bg_color_3', array(
							'label' => 'Footer BG',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						
// // // ======== Footer Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_footer_bg_color_3_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_footer_bg_color_3_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ===================================================================== Nav Background Color ==========>

// // // ======== NAv Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_nav_bg_color_4', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							) );

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_nav_bg_color_4', array(
							'label' => 'Main Menu BG',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						
// // // ========  NAv Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_nav_bg_color_4_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_nav_bg_color_4_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ===================================================================== Nav li:hover Background Color ==========>

// // // ======== Nav li:hover Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_nav_li_hover_bg_color_5', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_nav_li_hover_bg_color_5', array(
							'label' => 'Main Nav li:hover',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						
// // // ========  Nav li:hover Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_nav_li_hover_bg_color_5_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_nav_li_hover_bg_color_5_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ===================================================================== Nav Dropdown Background Color ==========>

// // // ======== NAv Dropdown Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_nav_dropdown_bg_color_6', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_nav_dropdown_bg_color_6', array(
							'label' => 'Menu Dropdown',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						
// // // ========  NAv Dropdown Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_nav_dropdown_bg_color_6_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_nav_dropdown_bg_color_6_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                


// // ===================================================================== Nav Dropdown li:hover Background Color ==========>

// // // ======== NAv Dropdown li:hover Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_dd_li_hover_bg_color_7', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_dd_li_hover_bg_color_7', array(
							'label' => 'Dropdown Hover',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						
// // // ========  NAv Dropdown li:hover Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_dd_li_hover_bg_color_7_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_dd_li_hover_bg_color_7_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                



// // ===================================================================== Button Background Color ==========>

// // // ======== Button Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_btn_bg_color_8', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_btn_bg_color_8', array(
							'label' => 'Button BG',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						

// // // ========  Button Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_btn_bg_color_8_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_btn_bg_color_8_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ===================================================================== Button:hover Background Color ==========>

// // // ======== Button:hover Background - Setting and Control ==========>
	
						$wp_customize->add_setting('habc_btn_bg_color_9', array(	
							'type' => 'theme_mod', // or 'theme_option'
							'capability' => 'edit_theme_options',
							'default' => '#FFF',
							'transport' => 'refresh', // or postMessage
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'habc_btn_bg_color_9', array(
							'label' => 'Button Hover',
							'type' => 'color',
							'section' => 'habc_bg_colors_section'
						) ) );
						

// // // ========  Button:hover Background Color -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('habc_btn_bg_color_9_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('habc_btn_bg_color_9_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'habc_bg_colors_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                


// =============================================== End Customizer Function ========================================>
// ***************************************************************************************************************** //

}

// =========================================== Custom CSS for the Admin Panel ===================================== //

// ======================================== Register Customization Function ======================================>
// ************************************************************************************************************* //

	add_action( 'customize_register', 'habc_bg_color_customize_register' );

	?>