<?php

// ------------------- add adminz group for all uxbuilder elements
add_filter( 'ux_builder_shortcode_data', function ($data, $tag) {
	$allowed = [ 'section', 'row', 'col', 'banner' ];
	if ( in_array( $tag, $allowed ) ) {
		$group           = [ 
			'adminz' => [ 
				'type'    => 'group',
				'heading' => 'Administrator Z',
				'options' => [ 
					'_id' => [ 
						'type'        => 'textfield',
						'heading'     => 'Fixed ID',
						'placeholder' => 'Enter ID...',
					],
				],
			],
		];
		$data['options'] = array_merge( $data['options'], $group );
	}
	return $data;
}, 10, 2 );


