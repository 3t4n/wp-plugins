<?php
/**
* Shared functions
*
* Various functions shared across the code
*
* @package	Artiss-Vine-Embed
*/

/**
* Get options
*
* Get default options. Set defaults if missing
*
* @since	1.1
*
* @return   string			Options
*/

function ave_get_options() {

	$options = get_option( 'ave_options' );

	// Add defaults to array

	if ( !is_array( $options ) ) {

		$options = array(
						'size' => 600,
						'type' => 'simple'
						);

		update_option( 'ave_options', $options );
	}

	return $options;

}
?>