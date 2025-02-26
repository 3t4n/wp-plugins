<?php

if( ! function_exists( 'msv_amspstt_get_option' ) ) :
	function ams_get_option( $section, $option, $default = '' ) {
	 
		$options = get_option( $section );
	 
		if ( isset( $options[$option] ) ) {
			return $options[$option];
		}
	 
		return $default;
	}
endif;
?>