<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

function aws_theme_customizer($options){
	$options      = array(); // remove old options

}
add_filter( 'cs_customize_options', 'aws_theme_customizer' );

function aws_theme_shortcode($options){
	$options      = array(); // remove old options

	$options[]     = array(
	  'title'      => esc_html__('Slide Shortcode', 'aws-toolkit'),
	  'shortcodes' => array(
		    array(
		      'name'      => 'aws_slides',
		      'title'     => esc_html__('Slider Shortcode Options', 'aws-toolkit'),
		      'fields'    => array(
			        array(
						'id'        => 'count',
						'type'      => 'text',
						'title'     => esc_html__('Count' , 'aws-toolkit'),
						'desc'      => esc_html__('If you want to show unlimited project post, Please type -1 from here.', 'aws-toolkit'),
						'default'   => 3,
					),
			        array(
						'id'        => 'order',
						'type'      => 'select',
						'title'     => esc_html__('Slide Order' , 'aws-toolkit'),
						'desc'      => esc_html__('Select slide order from here.', 'aws-toolkit'),
						'options' => array( 
                            'ASC'     =>  esc_html__('Ascending Slide', 'aws-toolkit'),
                            'DESC'    =>  esc_html__('Descending Slide', 'aws-toolkit'),
                        ),
						'default'   => 'ASC',
					),
			        array(
						'id'        => 'loop',
						'type'      => 'select',
						'title'     => esc_html__('Enable Loop?' , 'aws-toolkit'),
						'desc'      => esc_html__('If you want to show loop, Please select yes.', 'aws-toolkit'),
						'options' => array( 
                            'true'     =>  esc_html__('Yes', 'aws-toolkit'),
                            'false'    =>  esc_html__('False', 'aws-toolkit'),
                        ),
						'default'   => 'true',
					),
			        array(
						'id'        => 'dots',
						'type'      => 'select',
						'title'     => esc_html__('Enable Dots?' , 'aws-toolkit'),
						'desc'      => esc_html__('If you want to show dots, Please select yes.', 'aws-toolkit'),
						'options' => array( 
                            'true'     =>  esc_html__('Yes', 'aws-toolkit'),
                            'false'    =>  esc_html__('False', 'aws-toolkit'),
                        ),
						'default'   => 'true',
					),
			        array(
						'id'        => 'nav',
						'type'      => 'select',
						'title'     => esc_html__('Enable Nav?' , 'aws-toolkit'),
						'desc'      => esc_html__('If you want to show nav, Please select yes.', 'aws-toolkit'),
						'options' => array( 
                            'true'     =>  esc_html__('Yes', 'aws-toolkit'),
                            'false'    =>  esc_html__('False', 'aws-toolkit'),
                        ),
						'default'   => 'true',
					),
			        array(
						'id'        => 'autoplay',
						'type'      => 'select',
						'title'     => esc_html__('Enable Autoplay?' , 'aws-toolkit'),
						'desc'      => esc_html__('If you want to show autoplay, Please select yes.', 'aws-toolkit'),
						'options' => array( 
                            'true'     =>  esc_html__('Yes', 'aws-toolkit'),
                            'false'    =>  esc_html__('False', 'aws-toolkit'),
                        ),
						'default'   => 'true',
					),
			        array(
						'id'        => 'autoplayTimeout',
						'type'      => 'select',
						'title'     => esc_html__('Slide Time' , 'aws-toolkit'),
						'desc'      => esc_html__('Select slide time from here.', 'aws-toolkit'),
						'options' => array( 
                            '1000'    =>  esc_html__('1 Second', 'aws-toolkit'),
                            '2000'    =>  esc_html__('2 Seconds', 'aws-toolkit'),
                            '3000'    =>  esc_html__('3 Seconds', 'aws-toolkit'),
                            '4000'    =>  esc_html__('4 Seconds', 'aws-toolkit'),
                            '5000'    =>  esc_html__('5 Seconds', 'aws-toolkit'),
                            '6000'    =>  esc_html__('6 Seconds', 'aws-toolkit'),
                            '7000'    =>  esc_html__('7 Seconds', 'aws-toolkit'),
                            '8000'    =>  esc_html__('8 Seconds', 'aws-toolkit'),
                            '9000'    =>  esc_html__('9 Seconds', 'aws-toolkit'),
                            '10000'    =>  esc_html__('10 Seconds', 'aws-toolkit'),
                            '11000'    =>  esc_html__('11 Seconds', 'aws-toolkit'),
                            '12000'    =>  esc_html__('12 Seconds', 'aws-toolkit'),
                            '13000'    =>  esc_html__('13 Seconds', 'aws-toolkit'),
                            '14000'    =>  esc_html__('14 Seconds', 'aws-toolkit'),
                            '15000'    =>  esc_html__('15 Seconds', 'aws-toolkit'),
                        ),
						'default'   => '5000',
						'dependency'   => array( 'autoplay', '==', 'true' ),
					),
		        ),
		    ),
	    ),
	);
	return $options;
}
add_filter( 'cs_shortcode_options', 'aws_theme_shortcode' );



function aws_theme_options($options){
	$options        = array();
}
add_filter( 'cs_framework_options', 'aws_theme_options' );

function aws_theme_metabox($options){
	$options      = array(); // remove old options

	$options[]    = array(
		'id'      => 'aws_slide_options',
		'title'     => esc_html__('Slide Options' , 'aws'),
		'post_type' => 'slide',
		'icon'      => 'fa fa-heart',
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name' =>'aws_slide_options',
				'fields'    => array(
					array(
						'id'        => 'slide_sub_title',
						'type'      => 'text',
						'title'     => esc_html__('Slide Sub Title' , 'aws'),
						'desc'      => esc_html__('Type your sub title from here.', 'aws'),
						'default'   => esc_html__('Lorem ipsum dolor', 'aws'),
					),
					array(
						'id'        => 'slide_text_width',
						'type'      => 'select',
						'title'     => esc_html__('Slide Text Width' , 'aws'),
						'desc'      => esc_html__('Select slide text width from here.', 'aws'),
						'options'   => array(
							'col-md-4' =>  esc_html__('Col-Md-4', 'aws'),
							'col-md-5' =>  esc_html__('Col-Md-5', 'aws'),
							'col-md-6' =>  esc_html__('Col-Md-6', 'aws'),
							'col-md-7' =>  esc_html__('Col-Md-7', 'aws'),
							'col-md-8' =>  esc_html__('Col-Md-8', 'aws'),
							'col-md-9' =>  esc_html__('Col-Md-9', 'aws'),
							'col-md-10' =>  esc_html__('Col-Md-10', 'aws'),
							'col-md-11' =>  esc_html__('Col-Md-11', 'aws'),
							'col-md-12' =>  esc_html__('Col-Md-12', 'aws'),
						),
						'default'   => 'col-md-12',
					),
					array(
						'id'        => 'slide_text_offset',
						'type'      => 'select',
						'title'     => esc_html__('Slide Text Offset' , 'aws'),
						'desc'      => esc_html__('Select slide text offset from here.', 'aws'),
						'options'   => array(
							'no-offset' =>  esc_html__('No Offset', 'aws'),
							'col-md-offset-1' =>  esc_html__('Col-Md-Offset-1', 'aws'),
							'col-md-offset-2' =>  esc_html__('Col-Md-Offset-2', 'aws'),
							'col-md-offset-3' =>  esc_html__('Col-Md-Offset-3', 'aws'),
							'col-md-offset-4' =>  esc_html__('Col-Md-Offset-4', 'aws'),
							'col-md-offset-5' =>  esc_html__('Col-Md-Offset-5', 'aws'),
							'col-md-offset-6' =>  esc_html__('Col-Md-Offset-6', 'aws'),
							'col-md-offset-7' =>  esc_html__('Col-Md-Offset-7', 'aws'),
							'col-md-offset-8' =>  esc_html__('Col-Md-Offset-8', 'aws'),
						),
						'default'   => 'no-offset',
					),
					array(
						'id'        => 'slide_text_align',
						'type'      => 'select',
						'title'     => esc_html__('Slide Text Align' , 'aws'),
						'desc'      => esc_html__('Select slide text align from here.', 'aws'),
						'options'   => array(
							'left'   =>  esc_html__('Left', 'aws'),
							'center' =>  esc_html__('Center', 'aws'),
							'right'  =>  esc_html__('Right', 'aws'),
						),
						'default'   => 'left',
					),
					array(
						'id'        => 'slide_text_color',
						'type'      => 'color_picker',
						'title'     => esc_html__('Slide Text Color' , 'aws'),
						'desc'      => esc_html__('Select slide text color from here.', 'aws'),
						'default'   => '#fff',
					),
					array(
						'id'    => 'slider_enable_overlay',
						'type'  => 'switcher',
						'default' => true,
						'title' => esc_html__('Enable Slide Overlay?' , 'aws'),
						'desc'   => esc_html__('If you want to enable slider overlay, Select yes', 'aws'),
					),
					array(
						'id'        => 'slide_overlay_percentage',
						'type'      => 'select',
						'title'     => esc_html__('Slide Overlay Percentage' , 'aws'),
						'desc'      => esc_html__('Select slide overlay percentage from here.', 'aws'),
						'options'   => array(
							'0.1' =>  esc_html__('10 Percent', 'aws'),
							'0.2' =>  esc_html__('20 Percent', 'aws'),
							'0.3' =>  esc_html__('30 Percent', 'aws'),
							'0.4' =>  esc_html__('40 Percent', 'aws'),
							'0.5' =>  esc_html__('50 Percent', 'aws'),
							'0.6' =>  esc_html__('60 Percent', 'aws'),
							'0.7' =>  esc_html__('70 Percent', 'aws'),
							'0.8' =>  esc_html__('80 Percent', 'aws'),
							'0.9' =>  esc_html__('90 Percent', 'aws'),
							'1' =>  esc_html__('100 Percent', 'aws'),
						),
						'default'   => '0.6',
						'dependency'   => array( 'slider_enable_overlay', '==', 'true' ),
					),
					array(
						'id'        => 'slide_overlay_color',
						'type'      => 'color_picker',
						'title'     => esc_html__('Slide Overlay Color' , 'aws'),
						'desc'      => esc_html__('Select slide overlay color from here.', 'aws'),
						'default'   => '#000',
						'dependency'   => array( 'slider_enable_overlay', '==', 'true' ),
					),
					array(
						'id'              => 'slider_buttons',
						'type'            => 'group',
						'title'           => esc_html__('Slide buttons' , 'aws'),
						'button_title'    => esc_html__('Add New' , 'aws'),
						'accordion_title' => esc_html__('Add New button' , 'aws'),
						'desc'            => esc_html__('Select slide button from here.', 'aws'),
						'fields'          => array(
							array(
								'id'    => 'type',
								'type'  => 'select',
								'title' => esc_html__('Button Type' , 'aws'),
								'desc'  => esc_html__('Select slide button from here.', 'aws'),
								'options'  => array(
								    'hvr-bounce-to-top'  => esc_html__('Border Button' , 'aws'),
								    'hvr-bounce-to-top primary'  => esc_html__('Filled Button' , 'aws'),
								),
								'default'  => 'hvr-bounce-to-top',
							),
							array(
								'id'    => 'button_text',
								'type'  => 'text',
								'title' =>   esc_html__('Button Text' , 'aws'),
								'desc'  =>   esc_html__('Type button text from here.' , 'aws'),
								'default' => esc_html__('Start Now' , 'aws'),
							),
							array(
								'id'    => 'link_type',
								'type'  => 'select',
								'title' => esc_html__('Link Type' , 'aws'),
								'desc'  => esc_html__('Select button link type from here.' , 'aws'),
								'options'  => array(
								    '1'   =>  esc_html__('Wordpress page' , 'aws'),
								    '2'   =>  esc_html__('External link' , 'aws'),
								),
								'default'  => '1',
							),
							array(
								'id'    => 'link_to_page',
								'type'  => 'select',
								'title' => esc_html__('Select page' , 'aws'),
								'desc'  => esc_html__('Select page from here.' , 'aws'),
								'options'  => 'page',
								'dependency'   => array( 'link_type', '==', '1' ),
							),
							array(
								'id'    => 'link_to_external',
								'type'  => 'text',
								'title' => esc_html__('Type url' , 'aws'),
								'desc'  => esc_html__('Type url from here.' , 'aws'),
								'dependency'   => array( 'link_type', '==', '2' ),
								'default' => esc_html__('https://www.google.com' , 'aws'),
							),

						),
					),
				)
			)
		),
	);

	return $options;

}
add_filter( 'cs_metabox_options', 'aws_theme_metabox' );