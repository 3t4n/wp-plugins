<?php
/************************
 * Simple Youtube Responsive - Updater
 ************************/

// Prevent accessed directly
if ( !defined('ABSPATH') ){
	die;
}

if( ! function_exists( 'eirudo_ytrp_default_settings' ) ){
	function eirudo_ytrp_default_settings( $what=false ){

		$default = array(
			'ratio'				=> '16:9',
			'maxwidth'			=> '100%',
			'classes'			=> '',
			'id'				=> '',
			'style'				=> '',
			'centered'			=> true,
			'autoplay'			=> false,
			'loop'				=> true,
			'allowfullscreen'	=> true,
			'lazyload'			=> true,
			'thumb'				=> 'hqdefault',
			'js'				=> 'footer',
			'css'				=> 'header',
			'printedscripts'	=> 'embedonly',
		);

		if( $what ){
			return $default[$what];
		}else{
			return $default;
		}
	}
}

// Update from version 2.xx and lower
if( ! function_exists( 'eirudo_ytrp_options_updater' ) ){
	function eirudo_ytrp_options_updater(){
		$erdyt_options = array();
		$defaults = eirudo_ytrp_default_settings();
		
		// Get old options and sanitize
		$erdyt_options['ratio']				= esc_attr( get_option( '_eirudo_ytresponsive_ratio', $defaults['ratio'] ) );
		$erdyt_options['maxwidth']			= esc_attr( get_option( '_eirudo_ytresponsive_maxwidth', $defaults['maxwidth'] ) );
		$erdyt_options['classes']			= esc_attr( get_option( '_eirudo_ytresponsive_classes', $defaults['classes'] ) );
		$erdyt_options['centered']			= eirudo_ytrp_stringtobool( get_option( '_eirudo_ytresponsive_center', $defaults['centered'] ) );
		$erdyt_options['autoplay']			= eirudo_ytrp_stringtobool( get_option( '_eirudo_ytresponsive_autoplay', $defaults['autoplay'] ) );
		$erdyt_options['loop'] 				= eirudo_ytrp_stringtobool( get_option( '_eirudo_ytresponsive_loop', $defaults['loop'] ) );
		$erdyt_options['allowfullscreen']	= eirudo_ytrp_stringtobool( get_option( '_eirudo_ytresponsive_fullscreen', $defaults['allowfullscreen'] ) );
		
		$erdyt_options['lazyload']			= eirudo_ytrp_stringtobool( get_option( '_eirudo_ytresponsive_lazy', $defaults['lazyload'] ) );
		$erdyt_options['thumb']				= esc_attr( get_option( '_eirudo_ytresponsive_thumbsize', $defaults['thumb'] ) );
		
		$erdyt_options['js']				= esc_attr( get_option( '_eirudo_ytresponsive_js', $defaults['js'] ) );
		$erdyt_options['css']				= esc_attr( get_option( '_eirudo_ytresponsive_css', $defaults['css'] ) );
		$erdyt_options['printedscripts']	= esc_attr( get_option( '_eirudo_ytresponsive_printedscripts', $defaults['printedscripts'] ) );
		
		// Save new options 
		
		if( update_option( '_erdyt_options', $erdyt_options ) ){
			// Save new version
			update_option( '_erdyt_ver', EIRUDO_YTRESPONSIVE_VER );
			// Remove old options
			
			$oldOptions = array(
				'ratio',
				'maxwidth',
				'classes',
				'center',
				'autoplay',
				'loop',
				'fullscreen',
				'lazy',
				'thumbsize',
				'js',
				'css',
				'printedscripts',			
			);
			foreach( $oldOptions as $o ){
				delete_option( '_eirudo_ytresponsive_' . $o );
			}
		}
	}
}


// Updater
if( ! function_exists( 'eirudo_ytrp_update' ) ){
	function eirudo_ytrp_update(){
		// Update from version 3.xx and higher
		eirudo_ytrp_options_updater();
	}
}


// Check version 
$erdyt_ver = get_option( '_erdyt_ver', false );
if( ! $erdyt_ver ) {
	// Update from 2.xxx or lower version
	eirudo_ytrp_options_updater();
}else{
	// Check version
	if( version_compare( $erdyt_ver, '3.0', '<' ) ){
		// Update from 2.xxx or lower version
		eirudo_ytrp_options_updater();
	} else if ( version_compare( $erdyt_ver, EIRUDO_YTRESPONSIVE_VER, '<' ) ) {
		// Update from 3.xxx or higher
		eirudo_ytrp_update();
	}
}