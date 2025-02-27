<?php
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
* HA Font Color Customizer
*/
function hfc_font_color_customize_register( $wp_customize ) {

// =============================================================================================== Font Colors Section ============>
	
			$wp_customize->add_section( 'hfc_font_color_section', array(
				'title' => 'HA Font Colors',
				'panel' => '',
				'priority' => '30'
			));

// // ===================================================================================== Sitewide Font Color =======>

// // // ======== Sitewide fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_basic_fontcolor_1', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#333333',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_basic_fontcolor_1', array(
							'label' => 'body font',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );


// // // ======== Sitewide fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_basic_fontcolor_1_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'

						));
						$wp_customize->add_control('hfc_basic_fontcolor_1_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for heading tags =====>

// // // ===================================================================== H1 Heading  ==========>

// // // // ======== H1 Heading fontColor - Setting and Control ==========>
	
						$wp_customize->add_setting('hfc_h1_fontcolor_2a', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#222222',
							'transport' => 'refresh',
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_h1_fontcolor_2a', array(
							'label' => 'H1 Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // // ======== H1 Heading fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_h1_fontcolor_2a_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						$wp_customize->add_control('hfc_h1_fontcolor_2a_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // // ===================================================================== H2 Heading  ==========>

// // // // ======== H2 Heading fontColor - Setting and Control ==========>
	
						$wp_customize->add_setting('hfc_h2_fontcolor_2b', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#222222',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_h2_fontcolor_2b', array(
							'label' => 'H2 Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // // ======== H2 Heading fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_h2_fontcolor_2b_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						$wp_customize->add_control('hfc_h2_fontcolor_2b_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // // ===================================================================== H3 Heading  ==========>

// // // // ======== H3 Heading fontColor - Setting and Control ==========>
	
						$wp_customize->add_setting('hfc_h3_fontcolor_2c', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#222222',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_h3_fontcolor_2c', array(
							'label' => 'H3 Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // // ======== H3 Heading fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_h3_fontcolor_2c_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_h3_fontcolor_2c_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // // ===================================================================== H4 Heading  ==========>

// // // // ======== H4 Heading fontColor - Setting and Control ==========>
	
						$wp_customize->add_setting('hfc_h4_fontcolor_2d', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#222222',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_h4_fontcolor_2d', array(
							'label' => 'H4 Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // // ======== H4 Heading fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_h4_fontcolor_2d_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_h4_fontcolor_2d_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // // ===================================================================== H5 Heading  ==========>

// // // // ======== H5 Heading fontColor - Setting and Control ==========>
	
						$wp_customize->add_setting('hfc_h5_fontcolor_2e', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#222222',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_h5_fontcolor_2e', array(
							'label' => 'H5 Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // // ======== H5 Heading fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_h5_fontcolor_2e_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_h5_fontcolor_2e_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // // ===================================================================== H6 Heading  ==========>

// // // // ======== H6 Heading fontColor - Setting and Control ==========>
	
						$wp_customize->add_setting('hfc_h6_fontcolor_2f', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#222222',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_h6_fontcolor_2f', array(
							'label' => 'H6 Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // // ======== H6 Heading fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_h6_fontcolor_2f_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_h6_fontcolor_2f_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for a links =====>

// // // ======== A-Link fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_links_fontcolor_3', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_links_fontcolor_3', array(
							'label' => 'Link color',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A-Link fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_links_fontcolor_3_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_links_fontcolor_3_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for A hover =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_linkhover_fontcolor_4', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_linkhover_fontcolor_4', array(
							'label' => 'Link Hover',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A link HOVER fontColor -  Activate / Deactivate Trigger  ==========>


						$wp_customize->add_setting('hfc_linkhover_fontcolor_4_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_linkhover_fontcolor_4_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Top NAv Menu A hover =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_nav_a_fontcolor_5', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_nav_a_fontcolor_5', array(
							'label' => 'Nav Link',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_nav_a_fontcolor_5_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						$wp_customize->add_control('hfc_nav_a_fontcolor_5_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Top NAv Menu A hover =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_nav_ahover_fontcolor_6', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_nav_ahover_fontcolor_6', array(
							'label' => 'Nav Link Hover',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_nav_ahover_fontcolor_6_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_nav_ahover_fontcolor_6_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Subnav / Drop Down Menu A Link =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_subnav_a_fontcolor_7', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_subnav_a_fontcolor_7', array(
							'label' => 'Dropdown Link',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_subnav_a_fontcolor_7_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_subnav_a_fontcolor_7_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Subnav / Drop Down Menu A hover =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_subnav_ahover_fontcolor_8', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_subnav_ahover_fontcolor_8', array(
							'label' => 'Dropdown Hover',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_subnav_ahover_fontcolor_8_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_subnav_ahover_fontcolor_8_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Subnav / Drop Down Menu A Link =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_btn_fontcolor_9', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_btn_fontcolor_9', array(
							'label' => 'Button font',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_btn_fontcolor_9_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_btn_fontcolor_9_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Subnav / Drop Down Menu A hover =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_btn_hover_fontcolor_10', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_btn_hover_fontcolor_10', array(
							'label' => 'Button Hover',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting('hfc_btn_hover_fontcolor_10_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control('hfc_btn_hover_fontcolor_10_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Font Color for Footer Section =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting('hfc_footer_fontcolor_11', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hfc_footer_fontcolor_11', array(
							'label' => 'Footer Font',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting( 'hfc_footer_fontcolor_11_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control( 'hfc_footer_fontcolor_11_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// // ====================================================================================== Heading Font Color for Footer Section =====>

// // // ======== Link-Hover fontColor - Setting and Control ==========>

						$wp_customize->add_setting( 'hfc_footer_heading_fontcolor_12', array(	
							'type' => 'theme_mod', 
							'capability' => 'edit_theme_options',
							'default' => '#666666',
							'transport' => 'refresh', 
							'sanitize_callback' => 'sanitize_hex_color'
							));

						$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,'hfc_footer_heading_fontcolor_12', array(
							'label' => 'Footer Heading',
							'type' => 'color',
							'section' => 'hfc_font_color_section'
						) ) );

// // // ======== A Nav Menu link HOVER fontColor -  Activate / Deactivate Trigger  ==========>

						$wp_customize->add_setting( 'hfc_footer_heading_fontcolor_12_trigger', array(
								'type' => 'theme_mod',
								'capability' => 'edit_theme_options',
								'default' => 'no',
								'transport' => 'refresh',
								'sanitize_callback' => 'esc_attr'
						));
						
						$wp_customize->add_control( 'hfc_footer_heading_fontcolor_12_trigger', array(
								'label' => 'Activate it?',
								'type' => 'radio',
								'section' => 'hfc_font_color_section',
								'choices' => array( 'yes' => 'Yes', 'no' => 'No' ) 
						));	                

// =============================================== End Customizer Function ========================================> */

}

// ======================================== Register Customization Function ======================================>

    add_action( 'customize_register','hfc_font_color_customize_register' );
?>