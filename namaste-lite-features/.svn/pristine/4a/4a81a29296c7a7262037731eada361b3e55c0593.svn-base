<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'column'  => array(
		'label'   => __( 'Columns', 'namaste-lite' ),
		'desc'    => __( 'Number of columns on big screens.', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => '1',
		'choices' => array(
			'1' => '1',
			'2' => '2',
			'3' => '3'
		)
	),
	'delay'   => array(
		'label' => __( 'Delay', 'namaste-lite' ),
		'desc'  => __( 'The delay for autoplay in sec. (default: false)', 'namaste-lite' ),
		'type'  => 'text',
	),
	'pagination'  => array(
		'label'   => __( 'Pagination', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => 'true',
		'choices' => array(
			'true' => __( 'True', 'namaste-lite' ),
			'false' => __( 'False', 'namaste-lite' ),
		)
	),
	'navigation'  => array(
		'label'   => __( 'Navigation', 'namaste-lite' ),
		'type'    => 'select',
		'value'	  => 'dark',
		'choices' => array(
			'dark' => __( 'Dark', 'namaste-lite' ),
			'light' => __( 'Light', 'namaste-lite' ),
			'burgundy' => __( 'Burgundy', 'namaste-lite' ),
			'big' => __( 'Big', 'namaste-lite' ),
			'false' => __( 'False', 'namaste-lite' ),
		)
	),
	'quotes' => array(
		'type'          => 'addable-popup',
		'label'         => __( 'Quotes', 'namaste-lite' ),
		'popup-title'   => __( 'Add/Edit Quote', 'namaste-lite' ),
		'desc'          => __( 'Create your quotes', 'namaste-lite' ),
		'template'      => '{{=quote_author}}',
		'popup-options' => array(
			'quote_author' => array(
				'type'  => 'text',
				'label' => __('Author', 'namaste-lite'),
				'desc'  => __( 'Add the author.', 'namaste-lite' )
			),
			'quote_author_position' => array(
				'type'  => 'text',
				'label' => __('Author Role', 'namaste-lite'),
				'desc'  => __( 'Add some text.', 'namaste-lite' )
			),
			'quote_image'            => array(
				'type'  => 'upload',
				'label' => __( 'Author image', 'namaste-lite' ),
				'desc'  => __( 'Either upload a new, or choose an existing image from your media library.', 'namaste-lite' )
			),
			'quote_content' => array(
				'type'  => 'textarea',
				'label' => __('Content', 'namaste-lite')
			)
		),
	)
);