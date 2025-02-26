<?php
/**
* Start Meta fields
*/
add_filter( 'cmb2_init', 'htservice_metaboxes' );
function htservice_metaboxes() {
	$prefix = '_htservice_';


	//===================================
	//Service Metaboxes
	//===================================
	$service = new_cmb2_box( array(
		'id'            => $prefix . 'htservice',
		'title'         => esc_html__( 'Service Option', 'htservice' ),
		'object_types'  => array( 'htservice'), // Post type
		'priority'   => 'high',
		) );

	$service->add_field( array(
		'name'       => esc_html__( 'Short Description', 'htservice' ),
		'desc'       => esc_html__( 'Insert Description Here', 'htservice' ),
		'id'         => $prefix . 'service_short_des',
		'type'       => 'textarea_small',
		'default' 		=> ''
		) );

	$service->add_field( array(
			'id'      		=> $prefix.'service_icon_type',
			'name'    		=> esc_html__( 'Slect Icon Type', 'htservice' ),
			'desc'    		=> esc_html__( 'Select Icon  Or Image for Service', 'htservice' ),
			'type'    		=> 'radio_inline',
			'default'		=>'icon',
			'options' 		=> array(
				'icon' 		=> esc_html__( 'Icon', 'htservice' ),
				'image' 		=> esc_html__( 'Image', 'htservice' ),
			),

		)
		 );

	$service->add_field( array(
		'name'       => esc_html__( 'Icon', 'htservice' ),
		'desc'       => esc_html__( 'Insert Icon Name Here', 'htservice' ),
		'id'         => $prefix . 'service_icon',
		'type'       => 'text',
		'default' 		=> 'fa fa-tree',

	    'attributes' => array(
			'data-conditional-id'    => $prefix . 'service_icon_type',
			'data-conditional-value' => 'icon',
		),
		) );


	$service->add_field( array(
		'name'       => esc_html__( 'Icon Image', 'htservice' ),
		'desc'       => esc_html__( 'Upload Icon Image Here', 'htservice' ),
		'id'         => $prefix . 'service_icon_img',
		'type'       => 'file',

	    'attributes' => array(
			'data-conditional-id'    => $prefix . 'service_icon_type',
			'data-conditional-value' => 'image',
		),
		) );
}