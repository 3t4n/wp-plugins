<?php
if ( ! defined( 'ABSPATH' ) ) { die; } 


add_action('as_metabox_init', function (){

	$asmeta = new As_metabox(array(
			'title' 		=> __('Meta box demo 1', 'asm'),
			'id'			=> 'demo-id-1',
			'screen'		=> array('post'),
			'context'		=> 'advanced',
			'priority'		=> 'low'
		));

	$asmeta->add_section(array(
			'title' 	=> 	__('Group Diled', 'asm'),
			'id' 		=> 	'section-1',
			'icon' 		=> 	'fa-object-group',
			'fields'	=> 	array(	
					array(
						'id'    				=> 'group-demo-1',
						'type'  				=> 'group',
						'title' 				=> __('Group Demo', 'asm'),
						'desc' 					=> __('Group Demo For Slider', 'asm'),
						'tabs_title_field'		=> 'slider_title', // Return a field id for tab title text (note) support only text, url, email like text field
						'tabs_title'			=> __('Slider Item', 'asm'), // You may change default tab title text
						'button_text'			=> __('Add Slider', 'asm'), // You may change default add new button text
						'remove_text'			=> __('Remove Slider', 'asm'), // You may change default Remove button text
						'group_fields' 			=> array(
										array(
											'id'    			=> 'slider_title',
											'type'  			=> 'text',
											'default' 			=> 'text',
											'title' 			=> __('Slider Title', 'asm'),
											'desc' 				=> __('Add Slider Title', 'asm')
										),
										array(
											'id'    			=> 'slider_url',
											'type'  			=> 'url',
											'title' 			=> __('Slider Url', 'asm'),
											'desc' 				=> __('Add Slider Url', 'asm')
										),
										array(
											'id'    			=> 'slider_image',
											'type'  			=> 'upload',
											'title' 			=> __('Slider Image', 'asm'),
											'desc' 				=> __('Add Slider Image', 'asm')
										)
									)

					),	
					array(
						'id'    				=> 'info-box-demo-1',
						'type'  				=> 'group',
						'title' 				=> __('Group Info Box Demo', 'asm'),
						'desc' 					=> __('Group Demo For Info Box', 'asm'),
						'tabs_title_field'		=> 'box_title', // Return a field id for tab title text (note) support only text, url, email like text field
						'tabs_title'			=> __('Info Box Item', 'asm'), // You may change default tab title text
						'button_text'			=> __('Add Box', 'asm'), // You may change default add new button text
						'remove_text'			=> __('Remove Box', 'asm'), // You may change default Remove button text
						'group_fields' 			=> array(
										array(
											'id'    			=> 'box_title',
											'type'  			=> 'text',
											'title' 			=> __('Info Box Title', 'asm'),
											'desc' 				=> __('Add Info Box Title', 'asm')
										),
										array(
											'id'    			=> 'box_url',
											'type'  			=> 'url',
											'title' 			=> __('Info Box Url', 'asm'),
											'desc' 				=> __('Add Info Box Url', 'asm')
										),
										array(
											'id'    			=> 'slider_textarea',
											'type'  			=> 'textarea',
											'title' 			=> __('Slider Info Box Textarea', 'asm'),
											'desc' 				=> __('Add Info Box Textarea', 'asm')
										)
									)

					),	
				)
			)
	);

$asmeta->add_section(array(
			'title' 	=> 	__('Text fields', 'asm'),
			'id' 		=> 	'section-2',
			'icon' 		=> 	'fa-text-width',
			'fields'	=> 	array(
								array(
									'id'    			=> 'text-field',
									'type'  			=> 'text',
									'default' 			=> 'text',
									'title' 			=> __('Text Field', 'asm'),
									'desc' 				=> __('Text Field Demo', 'asm')
								),
								array(
									'id'    			=> 'url-field',
									'type'  			=> 'url',
									'title' 			=> __('url Field', 'asm'),
									'desc' 				=> __('url Field Demo', 'asm')
								),
								array(
									'id'    			=> 'email-field',
									'type'  			=> 'email',
									'title' 			=> __('email Field', 'asm'),
									'desc' 				=> __('email Field Demo', 'asm')
								),
								array(
									'id'    			=> 'number-field',
									'type'  			=> 'number',
									'title' 			=> __('number Field', 'asm'),
									'desc' 				=> __('number Field Demo', 'asm')
								),
								array(
									'id'    			=> 'datepicker-field',
									'type'  			=> 'datepicker',
									'title' 			=> __('DatePicker Field', 'asm'),
									'desc' 				=> __('DatePicker Field Demo', 'asm'),
									'data-format' 		=> 'dd-mm-yy'
								)
							)
			)
		);



$asmeta->add_section(array(
			'title' 	=> 	__('Textarea fields', 'asm'),
			'id' 		=> 	'section-3',
			'icon' 		=> 	'fa-file-text',
			'fields'	=> 	array(
								array(
									'id'    			=> 'textarea',
									'type'  			=> 'textarea',
									'title' 			=> __('textarea Field', 'asm'),
									'desc' 				=> __('textarea Field Demo', 'asm'),
									'cols' 				=> 40,
									'rows' 				=> 10,
								),
								array(
									'id'    			=> 'wp-editor-field',
									'type'  			=> 'wp_editor',
									'title' 			=> __('Wp Editor Field', 'asm'),
									'desc' 				=> __('Wp Editor Field Demo', 'asm'),
								),
							)
			)
		);

$asmeta->add_section(array(
			'title' 	=> 	__('Checkbox fields', 'asm'),
			'id' 		=> 	'section-4',
			'icon' 		=> 	'fa-circle',
			'fields'	=> 	array(
								array(
									'id'    			=> 'checkbox-1',
									'type'  			=> 'checkbox',
									'title' 			=> __('Checkbox Field with Options', 'asm'),
									'desc' 				=> __('Checkbox Field Demo Options', 'asm'),
									'options' 			=> array(
											'lionelmessi' 	=> 'LIONEL MESSI',
											'neymar' 		=> 'NEYMAR',
											'luissuarez' 	=> 'LUIS SUAREZ',
											'garethbale' 	=> 'GARETH BALE',
										),
								),
								array(
									'id'    			=> 'checkbox-2',
									'type'  			=> 'checkbox',
									'title' 			=> __('Checkbox Field with Wp Post', 'asm'),
									'desc' 				=> __('Checkbox Field Demo Options', 'asm'),
									'options' 			=> 'wp_post_type_data',
									'query' 			=> array( 
									  'post_type'       => 'post', 
									  'posts_per_page'  => 10,
									),
								),
								array(
									'id'    			=> 'checkbox-3',
									'type'  			=> 'checkbox',
									'title' 			=> __('Checkbox Field with Wp Tarms', 'asm'),
									'desc' 				=> __('Checkbox Field Demo Options', 'asm'),
									'options' 			=> 'wp_tarm_data',
									'query' 			=> array( 
									  	'taxonomy' => 'category',
							    		'hide_empty' => false,
									),
								),
							)
			)
		);


$asmeta->add_section(array(
			'title' 	=> 	__('Radio fields', 'asm'),
			'id' 		=> 	'section-5',
			'icon' 		=> 	'fa-circle',
			'fields'	=> 	array(
								array(
									'id'    			=> 'radio-1',
									'type'  			=> 'radio',
									'title' 			=> __('Radio Field with Options', 'asm'),
									'desc' 				=> __('Radio Field Demo Options', 'asm'),
									'options' 			=> array(
											'lionelmessi' 	=> 'LIONEL MESSI',
											'neymar' 		=> 'NEYMAR',
											'luissuarez' 	=> 'LUIS SUAREZ',
											'garethbale' 	=> 'GARETH BALE',
										),
								),
								array(
									'id'    			=> 'radio-2',
									'type'  			=> 'radio',
									'title' 			=> __('Radio Field with Wp Post', 'asm'),
									'desc' 				=> __('Radio Field Demo Options', 'asm'),
									'options' 			=> 'wp_post_type_data',
									'query' 			=> array( 
									  'post_type'       => 'post', 
									  'posts_per_page'  => 10,
									),
								),
								array(
									'id'    			=> 'radio-3',
									'type'  			=> 'radio',
									'title' 			=> __('Radio Field with Wp Tarms', 'asm'),
									'desc' 				=> __('Radio Field Demo Options', 'asm'),
									'options' 			=> 'wp_tarm_data',
									'query' 			=> array( 
									  	'taxonomy' => 'category',
							    		'hide_empty' => false,
									),
								),
							)
			)
		);


$asmeta->add_section(array(
			'title' 	=> 	__('Extra fields', 'asm'),
			'id' 		=> 	'extra-6',
			'icon' 		=> 	'fa-external-link',
			'fields'	=> 	array(
								array(
									'id'    			=> 'extra-1',
									'type'  			=> 'icon',
									'title' 			=> __('Icon Field', 'asm'),
									'desc' 				=> __('Icon Field Demo Options', 'asm'),
								),
								array(
									'id'    		=> 'extra-2',
									'type'  		=> 'range',
									'title' 		=> __('Range Field Option', 'asm'),
									'placeholder' 	=> __('Range Field Demo Options', 'asm'),
									'attirbutes' 	=> array(
											    'data-min'  => '100',
											    'data-max'  => '10000',
											    'data-step' => '10',
											),
								),
								array(
									'id'    		=> 'extra-3',
									'type'  		=> 'range',
									'title' 		=> __('Range Field Option', 'asm'),
									'placeholder' 	=> __('Range Field Demo Options', 'asm'),
									'attirbutes' 	=> array(
											    'data-min'  => '0',
											    'data-max'  => '500',
											    'data-step' => '2',
											),
								),
								array(
									'id'    		=> 'extra-3',
									'type'  		=> 'color_picker',
									'title' 		=> __('Color Picker Field Option', 'asm'),
									'placeholder' 	=> __('Color Picker Field Demo Options', 'asm'),
								//	'default' 		=> '#ff0000',
								),
								array(
									'id'    		=> 'extra-4',
									'type'  		=> 'select',
									'title' 		=> __('Select Field Option', 'asm'),
									'placeholder' 	=> __('Select Field Demo Options', 'asm'),
									'default_option' => 'Select A Footballer',
									//'default' 		=> 'luissuarez',
									'options' 			=> array(
											'lionelmessi' 	=> 'LIONEL MESSI',
											'neymar' 		=> 'NEYMAR',
											'luissuarez' 	=> 'LUIS SUAREZ',
											'garethbale' 	=> 'GARETH BALE',
										),
								),
								array(
									'id'    		=> 'extra-5',
									'type'  		=> 'wp_select',
									'title' 		=> __('Wp Select Field Option With multiple', 'asm'),
									'placeholder' 	=> __('Wp Select Field Demo Options', 'asm'),
									'options' 			=> 'wp_post_type_data',
									'multiple' 			=> true,
									'query' 			=> array( 
									  'post_type'       => 'post', 
									),
								),
								array(
									'id'    		=> 'extra-6',
									'type'  		=> 'wp_select',
									'title' 		=> __('Wp Select Field Option WithOut multiple', 'asm'),
									'placeholder' 	=> __('Wp Select Field Demo Options', 'asm'),
									'options' 			=> 'wp_post_type_data',
									'multiple' 			=> false,
									'query' 			=> array( 
									  'post_type'       => 'post', 
									),
								),
							)
			)
		);


});


