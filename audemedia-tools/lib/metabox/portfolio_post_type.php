<?php

function aude_portfolio_metaboxes( $portfolio_meta_boxes ) {
    $prefix = '_'; // Prefix for all fields
    $portfolio_meta_boxes[] = array(
        'id' => 'aude_portfolio_meta_box',
        'title' => 'Single Page Options',
        'pages' => array('portfolio'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
		   array(
				'name' => 'Extra Fields',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'portfolio_extra_fields'
			),
           array(
				'name'    => __( 'Date', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'portfolio_date',
				'type'    => 'text_medium',
			),
		   array(
				'name'    => __( 'Client', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'portfolio_client',
				'type'    => 'text',
			),
          array(
				'name'    => __( 'Link', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'portfolio_link',
				'type'    => 'text',
			),	
           array(
				'name' => 'Layout',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'portfolio_layout_title'
			),	
            array(
				'name'    => __( 'Display as', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'portfolio_layout',
				'type'    => 'select',
				
				'options' => array(
        array('name' => 'Only the Featured Image', 'value' => 'featured'),
        array('name' => 'Images One Below Each Other', 'value' => 'images'),
        array('name' => 'Images to Slider', 'value' => 'slider'),
        array('name' => 'Video', 'value' => 'video')		
    )
				
		),		
        ),
    );
	
	$portfolio_meta_boxes[] = array(
        'id' => 'portfolio_video',
        'title' => 'Video Embed Code',
        'pages' => array('portfolio'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            array(
                'name' => "Video",
                'id' => $prefix . 'portfolio_item_video',
				'sanitization_cb' => false,
                'type' => 'textarea_small'
                ),
            ),
        );
		
    $portfolio_meta_boxes[] = array(
        'id' => 'portfolio_images_info',
        'title' => 'Info about your selection',
        'pages' => array('portfolio'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => false, // Show field names on the left
        'fields' => array(
            	array(
				'name' => '<h2 style="color:#c00;padding:0;margin:0">Just upload images to the specific post via Add Media Button and sort them.<h2>',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'portfolio_upload_info'
			),
            ),
        );		

    return $portfolio_meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'aude_portfolio_metaboxes' );