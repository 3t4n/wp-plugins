<?php

/*
Widget Name: Aazeen Pricing Table
Description: Simple responsive pricing tables.
Author: Themez WP
*/

class aazeen_extension_Table_SO_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'aazeen_pricing_table',
			__( 'Aazeen - Pricing Table', 'aazeen-extension' ),
			array(
				'description' => __( 'Simple responsive pricing tables.', 'aazeen-extension' ),
				'help'        => 'http://widgets-docs.wpinked.com/article/18-pricing-table-widget'
			),
			array(
			),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form() {
		return array(

			'title'              => array(
				'type'              => 'text',
				'label'             => __( 'Admin Label', 'aazeen-extension' ),
			),

			'plans'              => array(
				'type'              => 'repeater',
				'label'             => __( 'Pricing Plans' , 'aazeen-extension' ),
				'item_name'         => __( 'Plan', 'aazeen-extension' ),
				'item_label'        => array(
					'selector'         => "[id*='title']",
					'update_event'     => 'change',
					'value_method'     => 'val'
				),
				'fields'            => array(

					'title'            => array(
						'type'            => 'text',
						'label'           => __( 'Title', 'aazeen-extension' ),
					),

					'title-tag'        => array(
						'type'            => 'text',
						'label'           => __( 'Title Tagline', 'aazeen-extension' ),
					),

					'price'            => array(
						'type'            => 'text',
						'label'           => __( 'Price', 'aazeen-extension' ),
					),

					'price-prefix'     => array(
						'type'            => 'text',
						'label'           => __( 'Price Prefix', 'aazeen-extension' ),
					),

					'price-suffix'     => array(
						'type'            => 'text',
						'label'           => __( 'Price Suffix', 'aazeen-extension' ),
					),

					'price-tag'        => array(
						'type'            => 'text',
						'label'           => __( 'Pricing Tagline', 'aazeen-extension' ),
					),

					'points' => array(
						'type'       => 'repeater',
						'label'      => __( 'Features' , 'aazeen-extension' ),
						'item_name'  => __( 'Feature', 'aazeen-extension' ),
						'item_label' => array(
							'selector'     => "[id*='text']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => array(

							'text' => array(
								'type'    => 'text',
								'label'   => __( 'Text', 'aazeen-extension' ),
								'default' => '',
							),

						)
					),

					'btn'              => array(
						'type'            => 'text',
						'label'           => __( 'Button text', 'aazeen-extension' ),
					),

					'btn-url'          => array(
						'type'            => 'link',
						'label'           => __( 'Destination URL', 'aazeen-extension' ),
					),

					'btn-window'       => array(
						'type'            => 'checkbox',
						'default'         => false,
						'label'           => __( 'Open in a new window', 'aazeen-extension' ),
					),

					'btn-id'           => array(
						'type'            => 'text',
						'label'           => __( 'Button ID', 'aazeen-extension' ),
						'description'     => __( 'An ID attribute allows you to target this button in Javascript.', 'aazeen-extension' ),
					),

					'btn-title'        => array(
						'type'            => 'text',
						'label'           => __( 'Button Title attribute', 'aazeen-extension' ),
						'description'     => __( 'Adds a title attribute to the button link.', 'aazeen-extension' ),
					),

					'btn-onclick'      => array(
						'type'            => 'text',
						'label'           => __( 'Button Onclick', 'aazeen-extension' ),
						'description'     => __( 'Run this Javascript when the button is clicked. Ideal for tracking.', 'aazeen-extension' ),
					),

					'featured'         => array(
						'type'            => 'checkbox',
						'default'         => false,
						'label'           => __( 'Featured Plan', 'aazeen-extension' ),
					),
				)
			),
			// styling
			'styling'            => array(
				'type'              => 'section',
				'label'             => __( 'Styling' , 'aazeen-extension' ),
				'hide'              => true,
				'fields'            => array(

					'background'       => array(
						'type'            => 'color',
						'label'           => __( 'Background Color', 'aazeen-extension' ),
						'default'         => ''
					),
					'background-table'       => array(
						'type'            => 'color',
						'label'           => __( 'Background Color table', 'aazeen-extension' ),
						'default'         => ''
					),
					'border'           => array(
						'type'            => 'color',
						'label'           => __( 'Border Color', 'aazeen-extension' ),
						'default'         => ''
					),
					'title-size'  => array(
						'type'        => 'measurement',
						'label'       => __( 'Title font Size', 'aazeen-extension' ),
						'default'     => '1rem',
					),
					'title'            => array(
						'type'            => 'color',
						'label'           => __( 'Title Color', 'aazeen-extension' ),
						'default'         => '#333333'
					),

					'title-tag'        => array(
						'type'            => 'color',
						'label'           => __( 'Title tagline Color', 'aazeen-extension' ),
						'default'         => '#666666'
					),
					'price'            => array(
						'type'            => 'color',
						'label'           => __( 'Pricing Color', 'aazeen-extension' ),
						'default'         => '#333333'
					),

					'price-tag'        => array(
						'type'            => 'color',
						'label'           => __( 'Pricing Tagline Color', 'aazeen-extension' ),
						'default'         => '#666666'
					),
					'features'         => array(
						'type'            => 'color',
						'label'           => __( 'Features Color', 'aazeen-extension' ),
						'default'         => '#666666'
					),
					'btn-clr'          => array(
						'type'            => 'color',
						'label'           => __( 'Button Highlight Color', 'aazeen-extension' ),
						'description'     => __( 'Typically used as button background.', 'aazeen-extension' ),
						'default'         => '#1abc9c'

					),

					'btn-base'         => array(
						'type'            => 'color',
						'label'           => __( 'Button Base Color', 'aazeen-extension' ),
						'description'     => __( 'Typically used as text color.', 'aazeen-extension' ),
						'default'         => '#fff'

					),
					// fea

			)
			),

			'featured'           => array(
				'type'              => 'section',
				'label'             => __( 'Featured Styling' , 'aazeen-extension' ),
				'hide'              => true,
				'fields'            => array(

					'background'       => array(
						'type'            => 'color',
						'label'           => __( 'Background Color', 'aazeen-extension' ),
						'default'         => ''
					),

					'border'           => array(
						'type'            => 'color',
						'label'           => __( 'Border Color', 'aazeen-extension' ),
						'default'         => ''
					),

					'title'            => array(
						'type'            => 'color',
						'label'           => __( 'Title Color', 'aazeen-extension' ),
						'default'         => '#333333'
					),

					'title-tag'        => array(
						'type'            => 'color',
						'label'           => __( 'Title tagline Color', 'aazeen-extension' ),
						'default'         => '#666666'
					),

					'price'            => array(
						'type'            => 'color',
						'label'           => __( 'Pricing Color', 'aazeen-extension' ),
						'default'         => '#333333'
					),

					'price-tag'        => array(
						'type'            => 'color',
						'label'           => __( 'Pricing Tagline Color', 'aazeen-extension' ),
						'default'         => '#666666'
					),

					'features'         => array(
						'type'            => 'color',
						'label'           => __( 'Features Color', 'aazeen-extension' ),
						'default'         => '#666666'
					),

					'btn-clr'          => array(
						'type'            => 'color',
						'label'           => __( 'Button Highlight Color', 'aazeen-extension' ),
						'description'     => __( 'Typically used as button background.', 'aazeen-extension' ),
					),

					'btn-base'         => array(
						'type'            => 'color',
						'label'           => __( 'Button Base Color', 'aazeen-extension' ),
						'description'     => __( 'Typically used as text color.', 'aazeen-extension' ),
					),

				)
			),


	);
	}

	function get_template_name( $instance ) {
		return 'pricing-table';
	}

	function get_style_name( $instance ) {
		return 'pricing-table';
	}

function get_less_variables( $instance ) {
	if( empty( $instance ) ) return array();

	return array(
		'bg'         => $instance['styling']['background'],
		'bg-table'         => $instance['styling']['background-table'],
		'border'     => $instance['styling']['border'],
		'title'      => $instance['styling']['title'],
		't-size'      => $instance['styling']['title-size'],
		'title-t'    => $instance['styling']['title-tag'],
		'price'      => $instance['styling']['price'],
		'price-t'    => $instance['styling']['price-tag'],
		'feat'       => $instance['styling']['features'],
		'btn-clr'    => $instance['styling']['btn-clr'],
		'btn-base'   => $instance['styling']['btn-base'],
		'f-title'    => $instance['featured']['title'],
		'f-title-t'  => $instance['featured']['title-tag'],
		'f-price'    => $instance['featured']['price'],
		'f-price-t'  => $instance['featured']['price-tag'],
		'f-feat'     => $instance['featured']['features'],
		'f-bg'       => $instance['featured']['background'],
		'f-border'   => $instance['featured']['border'],
		'f-btn-clr'  => $instance['featured']['btn-clr'],
		'f-btn-base' => $instance['featured']['btn-base'],

	);
}

}


siteorigin_widget_register( 'aazeen_pricing_table', __FILE__, 'aazeen_extension_Table_SO_Widget' );
