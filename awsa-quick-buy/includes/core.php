<?php
/**
 * @package           AWSA_Quick_Buy
 * @author            Sajjad Aslani
 * @copyright         2020 Sajjad Aslani
 * @license           GPL-2.0-or-later
 */

if ( ! function_exists( 'awsa_fa_to_en_number' ) ) {
	/**
	 * Convert fa Numbers to en Numbers
	 *
	 * @param string $string
	 * @return string
	 */
	function awsa_fa_to_en_number( $string ) {
		$persian = array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' );
		$arabic  = array( '٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠' );

		$num              = range( 0, 9 );
		$converted_string = str_replace( $persian, $num, $string );
		$converted_string = str_replace( $arabic, $num, $converted_string );

		return $converted_string;
	}
}
