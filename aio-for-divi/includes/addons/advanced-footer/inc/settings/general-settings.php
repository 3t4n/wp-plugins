<?php 
// Sticky footer
$wp_customize->add_setting( DIVI_AIO_PLUGIN_SETTINGS . '[daio-sticky-footer]', array(
	'type'          		=> 'option',
	'capability'    		=> 'edit_theme_options',
	'transport'     		=> 'postMessage',
	'sanitize_callback' => 'wp_validate_boolean',
) );

$wp_customize->add_control( DIVI_AIO_PLUGIN_SETTINGS . '[daio-sticky-footer]', array(
	'default' 		=> '',
	'type'     		=> 'control',
  'section' 		=> 'section-footer-adv',
	'label'				=> esc_html__( 'Footer Sticky', 'daio' ),
	'priority' 		=> 10,
  'type' 				=> 'checkbox',
) );

// Hide footer widgets
$wp_customize->add_setting( DIVI_AIO_PLUGIN_SETTINGS . '[daio-hide-footer-widgets]', array(
	'type'          		=> 'option',
	'capability'    		=> 'edit_theme_options',
	'transport'     		=> 'postMessage',
	'sanitize_callback' => 'wp_validate_boolean',
) );

$wp_customize->add_control( DIVI_AIO_PLUGIN_SETTINGS . '[daio-hide-footer-widgets]', array(
	'default' 		=> '',
	'type'     		=> 'control',
  'section' 		=> 'section-footer-adv',
	'label'				=> esc_html__( 'Hide Footer Widgets', 'daio' ),
	'priority' 		=> 10,
  'type' 				=> 'checkbox',
) );

// Hide footer bottom bar
$wp_customize->add_setting( DIVI_AIO_PLUGIN_SETTINGS . '[daio-hide-footer-bottom-bar]', array(
	'type'          		=> 'option',
	'capability'    		=> 'edit_theme_options',
	'transport'     		=> 'postMessage',
	'sanitize_callback' => 'wp_validate_boolean',
) );

$wp_customize->add_control( DIVI_AIO_PLUGIN_SETTINGS . '[daio-hide-footer-bottom-bar]', array(
	'default' 		=> '',
	'type'     		=> 'control',
  'section' 		=> 'section-footer-adv',
	'label'				=> esc_html__( 'Hide Footer Bottom Bar', 'daio' ),
	'priority' 		=> 10,
  'type' 				=> 'checkbox',
) );

// Remove Widget Bullet Points
$wp_customize->add_setting( DIVI_AIO_PLUGIN_SETTINGS . '[daio-hide-footer-widget-bullets]', array(
	'type'          		=> 'option',
	'capability'    		=> 'edit_theme_options',
	'transport'     		=> 'postMessage',
	'sanitize_callback' => 'wp_validate_boolean',
) );

$wp_customize->add_control( DIVI_AIO_PLUGIN_SETTINGS . '[daio-hide-footer-widget-bullets]', array(
	'default' 		=> '',
	'type'     		=> 'control',
  'section' 		=> 'section-footer-adv',
	'label'				=> esc_html__( 'Remove Widget Bullet Points', 'daio' ),
	'priority' 		=> 10,
  'type' 				=> 'checkbox',
) );