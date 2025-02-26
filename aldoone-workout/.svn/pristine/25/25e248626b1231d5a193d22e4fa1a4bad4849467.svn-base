<?php

add_action('init', 'post_type_workout');

function post_type_workout(){
	register_post_type(
		'aldo_one_workout',
		
		array(
			'labels' => array(
				'name' => 'Workout',
				'singular_name' => 'Workout',
				'add_new_item' => 'Add new workout'
			),
			
			'taxonomies' => array('category'),
			'public' => true,
			'show_ui' => true,
			
			'supports' => array(
				'title'
			)
		)
	);
}

?>