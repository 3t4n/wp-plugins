<?php
return array(					
						
// Tougle Menu

	array(
		'type' => 'toggle',
		'name' => 'style1',
		'label' => __('Style 1', 'vp_textdomain'),
	),
/*
	array(
		'type' => 'toggle',
		'name' => 'style2',
		'label' => __('Style 2 (<strong style="color:red;">Pro Only</strong>)', 'vp_textdomain'),
	),
*/


	//Style 1 Group Field Section
	array(
		'type'      => 'group',
		'repeating' => true,
		'sortable'  => true,
		'name'      => 'style1_option',
		'priority'  => 'high',
		'title'     => __('All In One Responsive TAB', 'vp_textdomain'),
			'dependency' => array(
				'field'    => 'style1',
				'function' => 'vp_dep_boolean',
				),

				
		'fields'    => array(
		
		
				// NoteBox Code
				/*
					array(
						'type' => 'notebox',
						'name' => 'nb_1',
						'label' => __('Author Comment', 'vp_textdomain'),
						'description' => __('<p style="color: #000000;">To get all features working, please buy the pro version here <a target="_blank" href="http://codecans.com/items/original-css3-image-hover-effects-pro/">Royal Image Hover Effects </a> only for $12 <p>', 'vp_textdomain'),
						'status' => 'warning',
					), 
					*/
					
								// Title								
			array(
				'type'  => 'textbox',
				'name'  => 'tab_id',
				'label' => __('ID', 'vp_textdomain'),
				'default' => '',
				'validation' => 'numeric',
				
			),
			
			
			
			     array(
        'type' => 'select',
        'name' => 'highlight_first',
        'label' => __('Highlight Item', 'vp_textdomain'),
        'items' => array(
            array(
                'value' => 'checked',
                'label' => __('Yes', 'vp_textdomain'),
            ),
            array(
                'value' => 'No',
                'label' => __('No', 'vp_textdomain'),
            ),

        ),
        'default' => array(
            'No',
        ),
    ),
					
	// Menu Name
			array(
				'type'  => 'textbox',
				'name'  => 'menuname_title',
				'label' => __('Menu Name', 'vp_textdomain'),
				'default' => 'Home',
				
			),	
			
			//  Fourth Icon Choser
				    array(
						'type' => 'fontawesome',
						'name' => 'menu_icon',
						'label' => __('Select Menu Icon', 'vp_textdomain'),
						'default' => array(
								'{{first}}',
							),
				),
				
			// Title	
			array(
				'type'  => 'textbox',
				'name'  => 'tab_title',
				'label' => __('Title', 'vp_textdomain'),
				'default' => 'Title Here',
				
			),
			// Desctiption	
			array(
				'type'  => 'wpeditor',
				'name'  => 'tab_description',
				'label' => __('TAB Content', 'vp_textdomain'),
				'default' => 'TAB Content Goes Here',
				
			),	
			
			
				
			
		),
	),
	
		//Group Field Section
	array(
		'type'      => 'group',
		'repeating' => false,
		'sortable'  => true,
		'name'      => 'style1_tab_settings',
		'priority'  => 'high',
		'title'     => __('Style 1 TAB Settings panel', 'vp_textdomain'),

					'dependency' => array(
				'field'    => 'style1',
				'function' => 'vp_dep_boolean',
			),

		'fields' => array(				




	// TAB Layout
				array(
					'type' => 'select',
					'name' => 'tab_layout',
					'label' => __('TAB Layout', 'vp_textdomain'),
					'items' => array(
						array(
							'value' => 'top-left',
							'label' => 'Top left',
						),
						array(
							'value' => 'top-right',
							'label' => 'Top Right',
						),	
						array(
							'value' => 'top-center',
							'label' => 'Top center',
						),	

					),
					        'default' => array(
								'top-left',
							),
				),
				
				
				

	// TAB Anomation
				array(
					'type' => 'select',
					'name' => 'tab_animation',
					'label' => __('TAB Animation', 'vp_textdomain'),
					'items' => array(
						array(
							'value' => 'flip',
							'label' => 'Flip',
						),
						array(
							'value' => 'scale',
							'label' => 'Scale',
						),			
						array(
							'value' => 'rotate',
							'label' => 'Rotate',
						),


					),
					        'default' => array(
							'flip',
						),
				),				
				

	// TAB Anomation
				array(
					'type' => 'select',
					'name' => 'tab_style',
					'label' => __('TAB Style', 'vp_textdomain'),
					'items' => array(
						array(
							'value' => '#28b463',
							'label' => 'Tab Style 1',
						),
						array(
							'value' => '#16a085',
							'label' => 'Tab Style 2',
						),		
						array(
							'value' => '#2c3e50',
							'label' => 'Tab Style 3',
						),
						array(
							'value' => '#d35400',
							'label' => 'Tab Style 4',
						),	
						array(
							'value' => '#8e44ad',
							'label' => 'Tab Style 5',
						),		

					),
					        'default' => array(
							'#28b463',
						),
				),				
								
			// Custom CSS Code Editor
	
						array(
						'type'  => 'codeeditor',
						'name'  => 'style1_css',
						'label' => __('Custom CSS ', 'vp_textdomain'),
						'description'=> __('Write your custom css here.','vp_textdomain'),
						'mode' => 'css',
						),
		),
	),

	
	
);