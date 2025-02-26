<?php 

	/*
	*
	*	Theme Customizer Options
	*	------------------------------------------------
	*	Themes Awesome Framework
	* 	Copyright Gemar 2021 - http://www.themesawesome.com
	*
	*	awetube_customize_register()
	*	awetube_customize_preview()
	*
	*/

	if (!function_exists('awetube_customize_register')) {
		function awetube_customize_register($wp_customize) {

			// Color Controls
			require_once plugin_dir_path( __FILE__ ) . '/panel/body-options.php';
			require_once plugin_dir_path( __FILE__ ) . '/panel/archive-options.php';
			require_once plugin_dir_path( __FILE__ ) . '/panel/mytube-options.php';

		}
		add_action( 'customize_register', 'awetube_customize_register' );

	}

/**
 *  Sanitize HTML
 */
if ( ! function_exists( 'awetube_sanitize_html' ) ) {
	function awetube_sanitize_html( $input ) {
		$input = wp_specialchars_decode( $input );

		$allowed_html = array(
			'a'      => array(
				'href'  => array(),
				'title' => array(),
			),
			'br'     => array(),
			'em'     => array(),
			'img'    => array(
				'alt'    => array(),
				'src'    => array(),
				'srcset' => array(),
				'title'  => array(),
			),
			'strong' => array(),
		);
		$output       = wp_kses( $input, $allowed_html );

		return $output;
	}
}

if ( ! function_exists( 'awetube_sanitize_select' ) ) {
	function awetube_sanitize_select( $input, $setting ) {
		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key($input);

		//get the list of possible select options 
		$choices = $setting->manager->get_control( $setting->id )->choices;

		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

if ( ! function_exists( 'awetube_sanitize_float' ) ) {
	function awetube_sanitize_float( $input ) {
		return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
	}
}
