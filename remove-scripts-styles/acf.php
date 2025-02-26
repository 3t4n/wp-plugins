<?php
if ( ! defined( 'ABSPATH' ) ) { exit; // Exit if accessed directly.
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5b84927150207',
	'title' => 'Remove Scripts & Styles',
	'fields' => array(
		array(
			'key' => 'field_5b84929a42c94',
			'label' => 'Dequeue Scripts',
			'name' => 'dequeue_scripts',
			'type' => 'textarea',
			'instructions' => 'Enter the handle of the scripts here to dequeue in this page, one per line.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_5b8494271c62a',
			'label' => 'Dequeue Styles',
			'name' => 'dequeue_styles',
			'type' => 'textarea',
			'instructions' => 'Enter the handle of the styles here to dequeue in this page, one per line.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;