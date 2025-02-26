<?php

function aude_team_metaboxes( $team_meta_boxes ) {
    $prefix = '_'; // Prefix for all fields
    $team_meta_boxes['aude_team_meta_box'] = array(
        'id' => 'aude_team_meta_box',
        'title' => 'Team Member Extra Fields',
        'pages' => array('team'), // post type
        'context' => 'normal',
        'priority' => 'low',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
				'name' => 'Position',
				'desc' => '',
				'id' => $prefix . 'team_position',
				'type'    => 'text',
			),
			array(
				'name' => 'Facebook URL',
				'desc' => '',
				'id' => $prefix . 'team_facebook',
				'type'    => 'text',
			),
			array(
				'name' => 'Twitter URL',
				'desc' => '',
				'id' => $prefix . 'team_twitter',
				'type'    => 'text',
			),
			array(
				'name' => 'Google+ URL',
				'desc' => '',
				'id' => $prefix . 'team_googleplus',
				'type'    => 'text',
			),
          
        ),
    );

    return $team_meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'aude_team_metaboxes' );