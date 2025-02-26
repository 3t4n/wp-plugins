<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'align'   => array(
		'type'  => 'select',
		'label' => __( 'Align', 'namaste-lite' ),
		'desc'  => __( 'Set the align.', 'namaste-lite' ),
		'value' => 'center',
		'choices' => array(
			'center' => __('center', 'namaste-lite'),
			'left' => __('left', 'namaste-lite'),
			'right' => __('right', 'namaste-lite'),
		),
	),
	'color'              => array(
		'label' => __( 'Color', 'namaste-lite' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => __( 'You can add specific color.', 'namaste-lite' ),
	),
	'content'                  => array(
		'label' => __( 'Text', 'namaste-lite' ),
		'type'  => 'textarea',
		'value' => '',
		'desc'  => __( 'Add the content.', 'namaste-lite' ),
	),
);