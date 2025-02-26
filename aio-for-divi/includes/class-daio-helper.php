<?php
/**
 * Daio Helper.
 *
 * @package Daio
 */

/**
 * Helper class
 */
class DAIO_Helper {

	/**
	 * Widget list
	 * 
	 * @var module_list
	 */
	private static $module_list = null;
	private static $extensions_list = null;

	static public function get_module_list() {

		if ( null === self::$module_list ) {

			self::$module_list = array(

				'BaSlider'    => array(
					'title'     => __( 'Before After Slider', 'daio' ),
					'default'   => true,
				),

				'CfSlider'    => array(
					'title'     => __( 'Contact Form 7', 'daio' ),
					'default'   => true,
				),

				'GfForms'     => array(
					'title'     => __( 'Gravity Forms', 'daio' ),
					'default'   => true,
				),

				'DualColorHeading' => array(
					'title'     => __( 'Dual Color Heading', 'daio' ),
					'default'   => true,
				),

				'FancyHeading' => array(
					'title'     => __( 'Fancy Heading', 'daio' ),
					'default'   => true,
				),

			);
		}
	}

	static public function get_extensions() {

		self::$extensions_list = [ 
			'svg-support',
			'advanced-footer',
			'advanced-headers',
		];

		return apply_filters( 'daio_get_addons', self::$extensions_list );

	}


	/**
	 * Returns Script array.
	 *
	 * @return array()
	 * @since 0.0.1
	 */
	static public function get_module_scripts() {

		$js_files = array(
	
			'daio-twenty-twenty' => array(
				'path'      => 'assets/js/jquery_twentytwenty.js',
				'dep'       => [ 'jquery' ],
				'in_footer' => true,
			),

			'daio-move'   => array(
				'path'      => 'assets/js/jquery_event_move.js',
				'dep'       => [ 'jquery' ],
				'in_footer' => true,
			),

			'daio-typed'   => array(
				'path'      => 'assets/js/typed.js',
				'dep'       => [ 'jquery' ],
				'in_footer' => true,
			),

			'daio-vticker'   => array(
				'path'      => 'assets/js/aio-vticker.min.js',
				'dep'       => [ 'jquery' ],
				'in_footer' => true,
			),

		);

		return $js_files;

	}

}