<?php



return array(
	array(
		'type'      => 'group',
		'repeating' => false,
		'sortable'  => true,
		'name'      => 'settings',
		'priority'  => 'high',
		'title'     => __('Team Member Settings', 'vp_textdomain'),
		
		'fields' => array(				


			array(
				'type'  => 'textbox',
				'name'  => 'items',
				'label' => __('Number of Items to Show', 'vp_textdomain'),
				'description' => __('Enter number for member items to show. Default is: 4', 'vp_textdomain'),
				'default' => '4',

			),	
			
			array(
			'type' => 'radiobutton',
			'name' => 'autoplay',
			'label' => __('Carousel Auto Play On/Off', 'vp_textdomain'),
			'description' => __('carousel auto play mode On/Off. Default is: off ', 'vp_textdomain'),
			'items' => array(
				array(
					'value' => 'true',
					'label' => __('ON', 'vp_textdomain'),
				),
				array(
					'value' => 'false',
					'label' => __('Off', 'vp_textdomain'),
				),
			),
			'default' => array(
				'false',
			),
		),
			

			 array(
			'type' => 'color',
			'name' => 'theme_color',
			'label' => __('Carousel Theme Color', 'vp_textdomain'),
			'default' => '#008fd5',
			),

			
		),
	),
);
		
		
?>