<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function opi_security_boost_options() {
	$options = array();
	//$parent = SET SOME PAGE;
	/**
	 * main settings
	 */
	$options['index'] = array(
		'version'    => '0.0',
		'page_title' => __( 'Security', 'opi-security-boost' ),
		'menu'       => 'options',
		'use_tabs'   => true,
		'options'    => array(
			array(
				'type'  => 'heading',
				'label' => esc_html__( 'security.txt', 'opi-security-boost' ),
				'since' => '1.0.0',
			),
			array(
				'name'              => 'securitytxt',
				'type'              => 'textarea',
				'th'                => esc_html__( 'File Content', 'opi-security-boost' ),
				'since'             => '1.0.0',
				'sanitize_callback' => 'esc_html',
				'classes'           => array( 'large-text' ),
				'rows'              => 40,
			),
			array(
				'type'  => 'heading',
				'label' => esc_html__( 'pgp-key.txt', 'opi-security-boost' ),
				'since' => '1.0.0',
			),
			array(
				'name'              => 'pgpkeytxt',
				'type'              => 'textarea',
				'th'                => esc_html__( 'File Content', 'opi-security-boost' ),
				'since'             => '1.0.0',
				'sanitize_callback' => 'esc_html',
				'classes'           => array( 'large-text' ),
				'rows'              => 40,
			),
		),
		'metaboxes'  => array(),
		'pages'      => array(),
	);
	return $options;
}

