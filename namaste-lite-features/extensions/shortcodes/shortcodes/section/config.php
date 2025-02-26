<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'tab'         => esc_html__( 'Layout Elements', 'namaste-lite' ),
		'title'       => esc_html__( 'Section', 'namaste-lite' ),
		'description' => esc_html__( 'Add a Section', 'namaste-lite' ),
		'type'        => 'section' // WARNING: Do not edit this
	)
);