<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php ob_start(); ?>

<?php if( isset( $_REQUEST['nonce'] ) ) : ?>

	<?php if( wp_verify_nonce( sanitize_text_field( wp_unslash( $_REQUEST['nonce'] ) ), 'setup' ) ) : ?>

    <?php
    
    update_option( 'amazingaffiliates_api_test_successful', 0, true );

    $country		=  json_decode( sanitize_text_field( get_option('amazingaffiliates_settings_api_country') ) );
    $partner_tag 	= sanitize_text_field( get_option('amazingaffiliates_settings_api_partner_tag') );
    $partner_type 	= "Associates";
    $marketplace	= $country->amazon_domain;
    
    $serviceName="ProductAdvertisingAPI";
    $region     = $country->region;
    $accessKey  = sanitize_text_field( get_option('amazingaffiliates_settings_api_accessKey') );
    $secretKey  = sanitize_text_field( get_option('amazingaffiliates_settings_api_secretKey') );
    $payload="{"
            ." \"Keywords\": \"test\","
            ." \"PartnerTag\": \"" . $partner_tag  . "\","
                ." \"PartnerType\": \"" . $partner_type  . "\","
                ." \"Marketplace\": \"" . $marketplace  . "\""
            ."}";
    $host       = $country->pa_endpoint; 
    $uriPath="/paapi5/searchitems";
    
    // initializing class AwsV4
    require_once( AMAZINGAFFILIATES_PLUGIN_URI . '/admin/partials/PAAPI5_class_AwsV4.php' );
    
    $awsv4 = new AmazingAffiliates_custom_AwsV4 ($accessKey, $secretKey);  
    $awsv4->setRegionName($region);
    $awsv4->setServiceName($serviceName);
    $awsv4->setPath ($uriPath);
    $awsv4->setPayload ($payload);
    $awsv4->setRequestMethod ("POST");
    $awsv4->addHeader ('content-encoding', 'amz-1.0');
    $awsv4->addHeader ('content-type', 'application/json; charset=utf-8');
    $awsv4->addHeader ('host', $host);
    $awsv4->addHeader ('x-amz-target', 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.SearchItems');
    $headers = $awsv4->getHeaders();
    $headerString = "";
    foreach ( $headers as $key => $value ) {
        $headerString .= $key . ': ' . $value . "\r\n";
    }
    $params = array (
            'http' => array (
                'header' => $headerString,
                'method' => 'POST',
                'content' => $payload
            )
        );
    $stream = @stream_context_create ( $params );

	// original amazon code that uses fopen() to access the external resources on the amazon server but with this you get:
	// WordPress.WP.AlternativeFunctions.file_system_operations_fopen	"File operations should use WP_Filesystem methods instead of direct PHP filesystem calls. Found: fopen()."
	/*
	$fp = fopen( 'https://'.$host.$uriPath, 'rb', false, $stream );

	if 	(! $fp) { 
	//  @throw new Exception ( "Exception Occured" );
		$update_msg =  'ERROR, Failed to fopen the api URL';    
	}

	// calling the API 
	if($fp === false) 	{
		$update_msg =  'ERROR, Failed to get a response from the PAAPI5'; 
		return;
	}

	$response = @stream_get_contents ( $fp );
	*/

	$full_response = wp_remote_post(
		'https://'.$host.$uriPath, array(
			'headers' => $headers,
			'method' => 'POST',
			'body' => $payload
	));
	$http_response =  (array) $full_response['http_response'];
	$prefix = chr( 0 ) . '*' . chr( 0 );
	$response = $http_response[ $prefix . 'response' ]->body;

    if ($response === false) {
//        throw new Exception ( "Exception Occured" );
    }
    
    if( ! str_contains( $response , "Errors" ) ) {
        echo esc_html( __("Hooray! APIs Setup Complete and Working!", "amazingaffiliates") );
        update_option( 'amazingaffiliates_api_test_successful', 1, true );
    } else {
        echo esc_html( __("Meh! Failed to connect to the Amazon APIs with these credentials! (check for any typos)", "amazingaffiliates") );
    }

    ?>

	<?php endif; ?>

<?php endif; ?>

<?php 

$response = ob_get_clean();

echo wp_json_encode($response);