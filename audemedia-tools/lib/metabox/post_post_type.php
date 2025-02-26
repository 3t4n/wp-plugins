<?php

function aude_post_metaboxes( $post_meta_boxes ) {
    $prefix = '_'; // Prefix for all fields
    $post_meta_boxes['aude_services_meta_box'] = array(
        'id' => 'aude_post_meta_box',
        'title' => 'Post Options',
        'pages' => array('post'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
           array(
				'name'    => __( 'Display Single Post', 'cmb' ),
				'desc'    => __( 'Choose the layout of the single post', 'cmb' ),
				'id'      => $prefix . 'page_display',
				'type'    => 'select',
				'options' => array(
        array('name' => 'Right Sidebar', 'value' => 'right-sidebar'),
        array('name' => 'Left Sidebar', 'value' => 'left-sidebar'),
        array('name' => 'Full Width', 'value' => 'full-width')
    )
				
			),
        ),
    );


    return $post_meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'aude_post_metaboxes' );