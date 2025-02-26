<?php 

	// add action by register 'get_masjid' to wp_options in database
	// then store values into it 
	add_action( 'wp_ajax_get_masjid', 'get_masjid' );

	// this function retrive JSON from specific URL with specific variable
	function get_masjid() {
		if( !empty( $_POST['location'] ) ) {
			$location = $_POST['location'];
			$api_response = trim( file_get_contents( 'http://iqamah.org/api/locator.php?address='. str_replace( ' ', '+', $location ) ) );
			exit( $api_response );
		}
	} 

?>