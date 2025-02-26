<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action( 'carbon_fields_register_fields', 'awetube_global_option' );
function awetube_global_option() {

	Container::make( 'theme_options', esc_html__( 'Awetube Options', 'awetube' ) )
	->add_fields( array(
		Field::make( 'select', 'awetube_style_single', esc_html__( 'Select Single Style', 'awetube' ) )
		->add_options( awetube_single_options() ),

		Field::make( 'checkbox', 'awetube_use_fake_count',  esc_html__( 'Use Fake Count', 'awetube' ) )
		->set_option_value( 'yes' ),

		Field::make( 'text', 'awetube_fake_count', esc_html__( 'Fake Count', 'awetube' ) )
		->set_attribute( 'placeholder', '0' )
		->set_attribute( 'type', 'number' )
		->set_conditional_logic( array(
			array(
				'field' => 'awetube_use_fake_count',
				'value' => true,
			)
		) ),

		Field::make( 'text', 'awetube_container_width', esc_html__( 'Author & Category Page Conainter Width', 'awetube' ) )
		->set_attribute( 'placeholder', '0' )
		->set_attribute( 'type', 'number' ),
	) );

}