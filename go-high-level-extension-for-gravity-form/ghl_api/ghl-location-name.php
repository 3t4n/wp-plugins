<?php

if ( ! function_exists( 'ghl_location_name' ) ) {
    
    function ghl_location_name($loc,$loc_acc) {
		
		$endpoint = "https://services.leadconnectorhq.com/locations/{$loc}";
		$ghl_version = '2021-07-28';

		$request_args = array(
			'headers' => array(
				'Authorization' => "Bearer {$loc_acc}",
				'Content-Type' => 'application/json',
				'Version' => $ghl_version,
			),
		);

		$response = wp_remote_get( $endpoint, $request_args );
		$http_code = wp_remote_retrieve_response_code( $response );

		if ( 200 === $http_code ) {

			$body = wp_remote_retrieve_body( $response );
			$name = json_decode( $body )->location;
			return $name;

		}
    }
}