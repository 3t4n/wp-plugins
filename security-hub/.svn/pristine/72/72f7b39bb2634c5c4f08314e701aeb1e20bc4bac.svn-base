<?php
function apiEmail($message, $toEmail){
	$postdata = json_encode(
	    array(
	        'personalizations' => [
	        	[
	        		'to' => [
	        			['email' => $toEmail]
	        		]
	        	]
	        ],
	        'from' => [
	        	'email' => 'info@wp-securityhub.it',
	        ],
	        'subject' => "Comunicazione WP Security Hub",
	        'content' => [ [
	        	'type' => 'text/html',
	        	'value' => $message
	        ] ]
	    )
	);

	$opts = array('http' =>
	    array(
	        'method'  => 'POST',
	        'header'  => 'Content-type: application/json'."\r\n"
	        			.'Authorization: Bearer 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'."\r\n",
	        'content' => $postdata
	    )
	);

    $headers = array(
        'Authorization' => 'Bearer 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',
        'Content-Type' => 'application/json'
    );

	$context  = stream_context_create($opts);

    //metodi WordPress
    $url = 'https://api.sendgrid.com/v3/mail/send';
    
    $response = wp_remote_post( $url, array(
        'method' => 'POST',
        'headers' => $headers,
        'body' => $postdata
        )
    );

    $tweets = json_decode( wp_remote_retrieve_body($response), true );


}

?>