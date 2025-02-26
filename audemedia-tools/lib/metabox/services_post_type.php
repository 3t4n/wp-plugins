<?php

function aude_services_metaboxes( $services_meta_boxes ) {
    $prefix = '_'; // Prefix for all fields
    $services_meta_boxes['aude_services_meta_box'] = array(
        'id' => 'aude_services_meta_box',
        'title' => 'Service Options',
        'pages' => array('services'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
				'name' => 'Font-Awesome Icon',
				'desc' => '',
				'type' => 'title',
				'id' => $prefix . 'font_awesome_title'
			),
           array(
				'name'    => __( 'Font Awesome Icon Code', 'cmb' ),
				'desc'    => __( 'Example: fa-adjust <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Choose Font Awesome Icon</a>', 'cmb' ),
				'id'      => $prefix . 'fa_icon',
				'type'    => 'text_medium',
			),
        ),
    );

    return $services_meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'aude_services_metaboxes' );