<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'url'    => array(
		'type'  => 'text',
		'label' => __( 'Insert Video URL', 'namaste-lite' ),
		'desc'  => __( 'Insert Video URL to embed this video', 'namaste-lite' )
	),
	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Image', 'namaste-lite' ),
		'desc'  => __( 'Add a cover image or leave it blank.', 'namaste-lite' )
	),
	'border'       => array(
		'type'  => 'text',
		'label' => __( 'Custom Border', 'namaste-lite' ),
		'desc'  => __( 'Add style or leave it blank.', 'namaste-lite' )
	),
);
