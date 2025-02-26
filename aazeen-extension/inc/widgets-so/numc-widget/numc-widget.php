<?php

/*
Widget Name: Number Counter
Description: Animated numbers to display your stats.
Author: themez wp
Author URI:
*/

class aazeen_extension_Counter_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'aazeen_num_count',
			__( 'Aazeen - Number Counter', 'aazeen-extension' ),
			array(
				'description' => __( 'Animated numbers to display your stats.', 'aazeen-extension' ),
				'help'        => 'http://widgets-docs.wpinked.com/article/26-number-counter-widget'
			),
			array(
			),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(

			'admin'          => array(
				'type'          => 'text',
				'label'         => __( 'Admin Label', 'aazeen-extension' ),
				'default'       => ''
			),
			'counter'           => array(
				'type'            => 'repeater',
				'label'           => __( 'Counter' , 'aazeen-extension' ),
				'item_name'       => __( 'Counter', 'aazeen-extension' ),
				'item_label'      => array(
					'selector'       => "[id*='name']",
					'update_event'   => 'change',
					'value_method'   => 'val'
				),
				'fields'          => array(


										'start'        => array(
											'type'        => 'text',
											'label'       => __( 'Start', 'aazeen-extension' ),
											'default'     => '0'
										),

										'end'          => array(
											'type'        => 'text',
											'label'       => __( 'End', 'aazeen-extension' ),
											'default'     => '300'
										),

										'speed'        => array(
											'type'        => 'text',
											'label'       => __( 'Speed', 'aazeen-extension' ),
											'default'     => '1000',
											'description' => __( 'Number in milliseconds', 'aazeen-extension' ),
										),

										'prefix'       => array(
											'type'        => 'text',
											'label'       => __( 'Number Prefix', 'aazeen-extension' ),
											'default'     => ''
										),

										'suffix'       => array(
											'type'        => 'text',
											'label'       => __( 'Number Suffix', 'aazeen-extension' ),
											'default'     => '+'
										),

										'title'        => array(
											'type'        => 'text',
											'label'       => __( 'Title', 'aazeen-extension' ),
											'default'     => 'Projects Done'
										),
										'icon'     => array(
											'type'          => 'icon',
											'label'         => __( 'Select Icon', 'aazeen-extension' ),
										),



				)
			),

			'styling'        => array(
				'type'          => 'section',
				'label'         => __( 'Styling' , 'aazeen-extension' ),
				'hide'          => true,
				'fields'        => array(

					'title'        => array(
						'type'        => 'color',
						'label'       => __( 'Title Color', 'aazeen-extension' ),
						'default'     => '#ffffff'
					),

					'number'       => array(
						'type'        => 'color',
						'label'       => __( 'Number Color', 'aazeen-extension' ),
						'default'     => '#ffffff'
					),

					'background_color'       => array(
						'type'        => 'color',
						'label'       => __( 'Background Color', 'aazeen-extension' ),
						'default'     => '#222328'
					),
					'icon-size'  => array(
						'type'        => 'measurement',
						'label'       => __( 'Icon Size', 'aazeen-extension' ),
						'default'     => '48px',
					),
					'icon-color'       => array(
						'type'        => 'color',
						'label'       => __( 'Icon Color', 'aazeen-extension' ),
						'default'     => '#ffffff'
					),

					'number-size'  => array(
						'type'        => 'measurement',
						'label'       => __( 'Number Size', 'aazeen-extension' ),
						'default'     => '48px',
					),
					'title-pos'    => array(
						'type'        => 'select',
						'label'       => __( 'Title Position', 'aazeen-extension' ),
						'default'     => 'above',
						'options'     => array(
							'above'      => __( 'Above', 'aazeen-extension' ),
							'below'      => __( 'Below', 'aazeen-extension' )
						),
						),
			),

			),
		);
	}

	function get_template_name( $instance ) {
		return 'number';
	}

	function get_style_name( $instance ) {
		return 'number';
	}

	function get_less_variables( $instance ) {

		if( empty( $instance ) ) return array();

		return array(
			'title'    => $instance['styling']['title'],
			't-pos'    => $instance['styling']['title-pos'],
			'num'      => $instance['styling']['number'],
			'num-size' => $instance['styling']['number-size'],
			'background_color' => $instance['styling']['background_color'],

		);

	}

}

siteorigin_widget_register( 'aazeen_num_count', __FILE__, 'aazeen_extension_Counter_SO_Widget' );
