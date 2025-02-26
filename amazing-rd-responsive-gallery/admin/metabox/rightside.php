<?php

return array(
	array(
		'type'      => 'group',
		'name'      => 'shortcode_info',
		'fields'    => array(			

			array(
				'type'  => 'textbox',
				'name'  => 'category',
				'label' => __('Amazing RD Gallery Category Name', 'vp_textdomain'),
				'description' => __('must contain category name, this is case sensitive', 'vp_textdomain'),
			),
			
			
			array(
					'type' => 'textbox',
					'name' => 'shortcode',
					'label' => __('Amazing RD Gallery Shortcode', 'vp_textdomain'),
					'description' => __('copy & paste this shortcode where you want ', 'vp_textdomain'),
					'binding' => array(
						'field' => 'category',
						'function' => 'rd_gallery_shortcode'
					)
				),

		),
	),
);

/**
 * EOF
 */