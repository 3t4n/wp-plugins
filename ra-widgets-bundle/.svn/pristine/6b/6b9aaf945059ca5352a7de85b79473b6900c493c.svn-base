<?php
/*
Widget Name: RA Headline
Description: A simple headline widget.
Author: Rotsen Mark Acob
Author URI: http://rotsenacob.com
*/

class RAWB_Headline_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'rawb-headline',
			__( 'RA Headline', 'ra-widgets-bundle' ),
			array(
				'description' => __( 'A simple headline widget.', 'ra-widgets-bundle' ),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => __( 'Title', 'ra-widgets-bundle' )
				),
				'subtitle' => array(
					'type' => 'text',
					'label' => __( 'Subtitle', 'ra-widgets-bundle' )
				),
				'class' => array(
					'type' => 'text',
					'label' => __( 'Class', 'ra-widgets-bundle' )
				),
				'template' => array(
					'type' => 'select',
					'label' => __( 'Headline Template', 'ra-widgets-bundle' ),
					'options' => array(
						'default' => 'Default',
					),
					'default' => 'default'
				)
			),
			plugin_dir_path( __FILE__ ) . 'widgets/'

		);
	}

	function get_template_name( $instance ) {
		switch ( $instance['template'] ) {
            case 'default':
            default:
                return 'default';
                break;
        }
	}

	function get_style_name( $instance ) {
		return false;
	}

	function get_template_variables( $instance, $args ) {
		return array(
			'class' => $instance['class'],
			'title' => $instance['title'],
			'subtitle' => $instance['subtitle']
		);
	}
}

siteorigin_widget_register( 'rawb-headline', __FILE__, 'RAWB_Headline_Widget' );
