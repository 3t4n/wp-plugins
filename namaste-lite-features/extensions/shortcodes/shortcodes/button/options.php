<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'content'  => array(
		'label' => __( 'Button Label', 'namaste-lite' ),
		'desc'  => __( 'This is the text that appears on your button', 'namaste-lite' ),
		'type'  => 'text',
	),
	'link'   => array(
		'label' => __( 'Button Link', 'namaste-lite' ),
		'desc'  => __( 'Where should your button link to', 'namaste-lite' ),
		'type'  => 'text',
		'value' => '#'
	),
	'color'  => array(
		'label'   => __( 'Color type', 'namaste-lite' ),
		'desc'    => __( 'Select the color type.', 'namaste-lite' ),
		'type'    => 'select',
		'choices' => array(
			'basic' => __('basic', 'namaste-lite'),
			'inverse' => __('inverse', 'namaste-lite'),
			'bw' => __('black & white', 'namaste-lite'),
			'custom' => __('custom', 'namaste-lite'),
		)
	),
	'custom_color'              => array(
		'label' => __( 'Custom color', 'namaste-lite' ),
		'type'  => 'color-picker',
		'value' => '',
		'desc'  => __( 'Add a color code for custom button.', 'namaste-lite' ),
	),
	'size'  => array(
		'label'   => __( 'Size', 'namaste-lite' ),
		'desc'    => __( 'Select the size.', 'namaste-lite' ),
		'type'    => 'select',
		'choices' => array(
			'' => '',
			'small' => __('small', 'namaste-lite'),
			'normal' => __('normal', 'namaste-lite'),
			'big' => __('big', 'namaste-lite'),
			'bigger' => __('bigger', 'namaste-lite'),
		)
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => __( 'Open Link in New Window', 'namaste-lite' ),
		'desc'    => __( 'Select here if you want to open the linked page in a new window', 'namaste-lite' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => __('Yes', 'namaste-lite'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => __('No', 'namaste-lite'),
		),
	),
	'icon_position'  => array(
		'label'   => __( 'Enable Icon', 'namaste-lite' ),
		'desc'    => __( 'Left or right.', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => 'none',
		'choices' => array(
			'none' => __('none', 'namaste-lite'),
			'right' => __('right', 'namaste-lite'),
			'left' => __('left', 'namaste-lite'),
		)
	),
	'icon' => array(
		'label' => __('Icon', 'namaste-lite'),
		'type' => 'icon',
		'set' => 'namaste',
		'value' => 'fa fa-1-no-icon',
		'desc' => __('Select the icon.', 'namaste-lite'),
	),
);