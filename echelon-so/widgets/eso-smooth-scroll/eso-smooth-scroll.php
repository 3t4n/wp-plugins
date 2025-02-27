<?php

/*
Widget Name: E: Smooth Scroll
Description: Smooth scroll page links to their targets.
Author: Echelon
Author URI: https://echelonso.com
*/

class EchelonSOEsoSmoothScroll extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'echelonso-eso-smooth-scroll',
			__('E: Smooth Scroll', 'echelon-so'),
			array(
				'description' => __('Smooth scroll page links to their targets.', 'echelon-so' ),
				'panels_groups' => array('eso'),
			),
			false,
			array(
				'scroll' => array(
					'type' => 'section',
					'label' => __( 'Settings' , 'echelon-so' ),
					'hide' => true,
					'fields' => array(
						'speed' => array(
							'type' => 'number',
							'autofill' => true,
							'default' => '500',
							'label' => __( 'Speed', 'echelon-so' ),
							'description' => __( 'The speed of the scroll in milliseconds.', 'echelon-so' ),
							'measurements' => array(
								'offset' => array(
									'units' => array( 'px' ),
								)
							),
						),
						'offset' => array(
							'type' => 'multi-measurement',
							'autofill' => true,
							'default' => '100px',
							'label' => __( 'Top Offset', 'echelon-so' ),
							'description' => __( 'Add some distance between the target and the top of the viewport.', 'echelon-so' ),
							'measurements' => array(
								'offset' => array(
									'units' => array( 'px' ),
								)
							),
						),
					)
				)
			),
			plugin_dir_path(__FILE__)
		);
	}

}

siteorigin_widget_register('echelonso-eso-smooth-scroll', __FILE__, 'EchelonSOEsoSmoothScroll');
