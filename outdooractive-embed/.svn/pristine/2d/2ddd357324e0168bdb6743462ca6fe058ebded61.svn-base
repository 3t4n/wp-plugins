<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

//Check if outdooractive.com supports the configured language
function oaembed_check_language() {
	
	$locale = get_locale();
	$language = substr($locale, 0, 2);

	$testurl = 'https://www.outdooractive.com/'.$language;

	$response = wp_remote_get( $testurl );
	$httpcode = wp_remote_retrieve_response_code( $response);
	
	if ($httpcode == '404') {
		$language = 'en';
	}
	
	return $language;
}

?>