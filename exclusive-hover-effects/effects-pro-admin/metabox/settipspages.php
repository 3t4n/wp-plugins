<?php



return array(
	array(
		'type'      => 'group',
		'repeating' => false,
		'sortable'  => true,
		'name'      => 'effects',
		'priority'  => 'high',
		'title'     => __('Hover Effects Setting', 'vp_textdomain'),
		
		'fields' => array(				

		array(
			'type' => 'notebox',
			'name' => 'notebox',
			'label' => __('Author Comment', 'vp_textdomain'),
			'description' => __('to get this option for control your image and effects <a href="http://tricorewebapps.com/exclusive-hover-effects-pro/">purchase premium and get more support </a>', 'vp_textdomain'),
			'status' => 'normal',
		),
		
		
		
		/*
				array(
					'type' => 'select',
					'name' => 'style',
					'label' => __('Select Style', 'vp_textdomain'),
					'default' => array(
								'{{first}}',
								),
					'items' => array(
						array(
							'value' => 'circle',
							'label' => 'Circle',
						),
						array(
							'value' => 'square',
							'label' => 'Square',
						),	
						array(
							'value' => 'caption',
							'label' => 'Caption',
						),		
	
				),	),
				
				*/

				
					/*
				array(
					'type' => 'select',
					'name' => 'effect',
					'label' => __('Effect', 'vp_textdomain'),
					'default' => array(
								'{{first}}',
								),
					'items' => array(
						array(
							'value' => 'effect1',
							'label' => 'effect1',
						),
						array(
							'value' => 'effect2',
							'label' => 'effect2',
						),		
						array(
							'value' => 'effect3',
							'label' => 'effect3',
						),
						array(
							'value' => 'effect4',
							'label' => 'effect4',
						),	
						array(
							'value' => 'effect5',
							'label' => 'effect5',
						),
						array(
							'value' => 'effect6',
							'label' => 'effect6',
						),		
						array(
							'value' => 'effect7',
							'label' => 'effect7',
						),
						array(
							'value' => 'effect8',
							'label' => 'effect8',
						),		
						array(
							'value' => 'effect9',
							'label' => 'effect9',
						),
						array(
							'value' => 'effect10',
							'label' => 'effect10',
						),
						array(
							'value' => 'effect11',
							'label' => 'effect11',
						),
						array(
							'value' => 'effect12',
							'label' => 'effect12',
						),
						array(
							'value' => 'effect13',
							'label' => 'effect13',
						),
						array(
							'value' => 'effect14',
							'label' => 'effect14',
						),
						array(
							'value' => 'effect15',
							'label' => 'effect15',
						),
						array(
							'value' => 'effect16',
							'label' => 'effect16',
						),
						array(
							'value' => 'effect17',
							'label' => 'effect17',
						),
						array(
							'value' => 'effect18',
							'label' => 'effect18',
						),
						array(
							'value' => 'effect19',
							'label' => 'effect19',
						),	
						array(
							'value' => 'effect20',
							'label' => 'effect20',
						),

					),
				),
					
						*/
						
						
							/*
				array(
					'type' => 'select',
					'name' => 'animation',
					'label' => __('Animation Direction', 'vp_textdomain'),
					'default' => array(
								'{{first}}',
								),
					'items' => array(
						array(
							'value' => 'left_to_right',
							'label' => 'Left To Right',
						),
						array(
							'value' => 'right_to_left',
							'label' => 'Right To Left',
						),	
						array(
							'value' => 'top_to_bottom',
							'label' => 'Top To Bottom',
						),	
						array(
							'value' => 'bottom_to_top',
							'label' => 'Bottom To Top',
						),

					),
				),	
				
					*/
					/*
				
				array(
					'type' => 'radiobutton',
					'name' => 'colored',
					'label' => __('Colored?', 'vp_textdomain'),
					'items' => array(
						array(
							'value' => 'colored',
							'label' => __('Yes', 'vp_textdomain'),
						),
						array(
								'value' => '',
								'label' => __('No', 'vp_textdomain'),
				),
					),
				),
				
					*/
			
				array(
					'type' => 'slider',
					'name' => 'width',
					'label' => __('Image Width <p style="color:red;">for pro version only</p>', 'vp_textdomain'),
					'description' => __('You can change image width in pixel formate without (px)', 'vp_textdomain'),
					'min' => '200',
					'max' => '400',
					'step' => '1',
					'default' => '220',
				),	

				array(
					'type' => 'slider',
					'name' => 'height',
					'label' => __('Image Height <p style="color:red;">for pro version only</p>', 'vp_textdomain'),
					'description' => __('You can change image height in pixel formate without (px)', 'vp_textdomain'),
					'min' => '200',
					'max' => '400',
					'step' => '1',
					'default' => '220',
				),	


		array(
					'type' => 'slider',
					'name' => 'letf_right_each',
					'label' => __('Move each Image space Left Right <p style="font-color:red;">for pro version only</p>', 'vp_textdomain'),
					'description' => __('You can move image left and right in pixel formate without (px)', 'vp_textdomain'),
					'min' => '-200',
					'max' => '300',
					'step' => '1',
					'default' => '12',
				),
			

		array(
					'type' => 'slider',
					'name' => 'font_size_title',
					'label' => __('font size for title <p style="color:red;">for pro version only</p>', 'vp_textdomain'),
					'description' => __('set your font size for your title on (px)', 'vp_textdomain'),
					'min' => '10',
					'max' => '60',
					'step' => '1',
					'default' => '23',
				),
					

		array(
					'type' => 'slider',
					'name' => 'font_size_para',
					'label' => __('font size for paragraph or exceprts <p style="color:red;">for pro version only</p>', 'vp_textdomain'),
					'description' => __('set your font size for your excerpts or text on (px)', 'vp_textdomain'),
					'min' => '10',
					'max' => '60',
					'step' => '1',
					'default' => '16',
				),
					

						

		array(
					'type' => 'slider',
					'name' => 'font_size_button',
					'label' => __('font size for button texts <p style="color:red;">for pro version only</p>', 'vp_textdomain'),
					'description' => __('set your font size for your button texts on (px)', 'vp_textdomain'),
					'min' => '10',
					'max' => '60',
					'step' => '1',
					'default' => '17',
				),
					
	
						

	
		
			/*	array(
					'type' => 'notebox',
					'name' => 'nb_11',
					'label' => __('Info Announcement', 'vp_textdomain'),
					'description' => __('<a href="#">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</a>', 'vp_textdomain'),
					'status' => 'info',
					),
			*/
		),
	),
);
		
		
?>