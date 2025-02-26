<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'awetube_field_in_post' );
function awetube_field_in_post() {

	Container::make( 'post_meta', 'video_features', esc_html__( 'Video Features', 'awetube' ) )
	->where( 'post_type', '=', 'awetube-video' )
	->set_context( 'side' )
	->set_priority( 'default' )
	->add_fields(
		array(
			Field::make( 'text', 'awetube_video_url', esc_html__( 'Video URL', 'awetube' ) ),
			Field::make( 'file', 'awetube_video_file', esc_html__( 'Video File', 'awetube' ) )
			->set_type( array( 'video' ) )
			->set_value_type( 'url' ),
		)
	);

}