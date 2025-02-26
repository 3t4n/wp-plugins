<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => __( 'Image', 'namaste-lite' ),
		'desc'  => __( 'Either upload a new, or choose an existing image from your media library.', 'namaste-lite' )
	),
	'link_type'   => array(
		'type'  => 'select',
		'label' => __( 'Link type', 'namaste-lite' ),
		'desc'  => __( 'Select the link type.', 'namaste-lite' ),
		'value' => 'normal',
		'choices' => array(
			'normal' => __('Normal', 'namaste-lite'),
			'lightbox' => __('Lightbox', 'namaste-lite'),
		),
	),
	'link'       => array(
		'type'  => 'text',
		'label' => __( 'Link', 'namaste-lite' ),
		'desc'  => __( 'Link for the image.', 'namaste-lite' )
	),
	'name'       => array(
		'type'  => 'text',
		'label' => __( 'Title', 'namaste-lite' ),
		'desc'  => __( 'Add the content.', 'namaste-lite' )
	),
	'content'       => array(
		'type'  => 'textarea',
		'label' => __( 'Description', 'namaste-lite' ),
		'desc'  => __( 'Add the content.', 'namaste-lite' )
	),
);