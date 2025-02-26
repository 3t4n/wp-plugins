<?php

function aude_page_metaboxes( $page_meta_boxes ) {
    $prefix = '_'; // Prefix for all fields
    $page_meta_boxes['aude_page_meta_box'] = array(
        'id' => 'aude_page_meta_box',
        'title' => 'Page Options',
        'pages' => array('page'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
		    
			array(
				'name'    => __( 'Page Headline', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'page_headline',
				'sanitization_cb' => false,
				'type'    => 'textarea_small',
			),
          
            array(
				'name'    => __( 'Page Subtitle', 'cmb' ),
				'desc'    => __( '', 'cmb' ),
				'id'      => $prefix . 'page_subtitle',
				'sanitization_cb' => false,
				'type'    => 'textarea_small',
			),
          		
        ),
    );

    return $page_meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'aude_page_metaboxes' );