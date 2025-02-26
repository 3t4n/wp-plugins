<?php



return array(
	array(
		'type'      => 'group',
		'name'      => 'shortcode_info',
		'fields'    => array(
				
				
			array(
				'type'  => 'select',
				'name'  => 'style',
				'label' => __('Select Style', 'vp_textdomain'),
				'items' => array(
					array(
						'value' => 'style1',
						'label' => '1',
					),			

			),	
					'default' => array(
							'style1',
						),			
				
			),
			array(
				'type'  => 'textbox',
				'name'  => 'category',
				'label' => __('AIO Responsive TAB Category Name', 'vp_textdomain'),
				'description' => __('must contain category name, this is case sensitive', 'vp_textdomain'),
			),
			
			
			array(
					'type' => 'textbox',
					'name' => 'shortcode',
					'label' => __('AIO Responsive Shortcode', 'vp_textdomain'),
					'description' => __('copy & paste this shortcode where you want ', 'vp_textdomain'),
					'binding' => array(
						'field' => 'style, category',
						'function' => 'aio_simple_shortcode'
					)
				),

		),
	),
);

/**
 * EOF
 */