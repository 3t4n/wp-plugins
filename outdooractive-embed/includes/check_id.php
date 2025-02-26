<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

function oaembed_get_frontend( $url ) {
	//get correct Frontend
	$frontendUrl = parse_url ("$url");
	if(isset($frontendUrl['host'])){
		return $frontendUrl['host'];
	} else {
		return null;
	}
}

function oaembed_get_id( $url ) {
	//get ID from URL
	$urlpart = parse_url ("$url");
	$searchpattern = '/([0-9]{6,})/';
	preg_match( $searchpattern, $urlpart['path'], $hit );
	
	return $hit[1];
}

function oaembed_check_id( $url, $shortcodeType ) {
	$id = oaembed_get_id( $url );
	
	$testurl = 'https://www.outdooractive.com/de/r/'.$id.'?page='.$shortcodeType.'2go';

	$response = wp_remote_get( $testurl );
	
	$response_body = wp_remote_retrieve_body( $response );
	
	//Check if id matches to shortcode
	if (strpos( $response_body, 'Iframe' ) === false ) {
		return false;
	} else {
		return true;
	}
}

function oaembed_check_published( $url ) {
	$id = oaembed_get_id( $url );
	
	$testurl = 'https://www.outdooractive.com/de/embed/'.$id;
	
	$response = wp_remote_get( $testurl );
	$response_body = wp_remote_retrieve_body( $response );
	
	return true;
}
?>