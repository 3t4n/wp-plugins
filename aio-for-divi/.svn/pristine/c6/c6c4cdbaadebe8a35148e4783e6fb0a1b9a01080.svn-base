<?php 
// Remove Main Header Underline
$wp_customize->add_setting( DIVI_AIO_PLUGIN_SETTINGS . '[daio-remove-mh-underline]', array(
	'type'          		=> 'option',
	'capability'    		=> 'edit_theme_options',
	'transport'     		=> 'postMessage',
	'sanitize_callback' => 'wp_validate_boolean',
) );

$wp_customize->add_control( DIVI_AIO_PLUGIN_SETTINGS . '[daio-remove-mh-underline]', array(
	'default' 		=> '',
	'type'     		=> 'control',
  'section' 		=> 'section-headers-adv',
	'label'				=> esc_html__( 'Remove Main Header Underline', 'daio' ),
	'priority' 		=> 10,
  'type' 				=> 'checkbox',
) );
