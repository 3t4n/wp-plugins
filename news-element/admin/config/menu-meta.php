<?php if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( class_exists( 'CSF' ) ) {

	$prefix = '_nwmenu';
	CSF::createNavMenuOptions( $prefix, array(
		'data_type' => 'unserialize',
	) );

	CSF::createSection( $prefix, array(
		'fields' => array(

			array(
				'id'    => 'nwmega',
				'type'  => 'switcher',
				'title' => 'Enable mega menu',
			),

			array(
				'id'         => 'mwtmpl',
				'type'       => 'select',
				'title'      => 'Template',
			    'chosen'      => true,
			    'ajax'        => true,
			    'options'     => 'posts',
			    'query_args'  => array(
			      'post_type' => 'elementor_library'
			    ),
				'dependency' => array( 'nwmega', '==', 'true' ),
			),

		)
	) );

}