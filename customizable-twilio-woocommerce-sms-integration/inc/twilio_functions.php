<?php
function send_twilio_text_msg($id, $token, $from, $to, $body)
{

$url = "https://api.twilio.com/2010-04-01/Accounts/".$id."/SMS/Messages";
$data = array (
    'From' => $from,
    'To' => $to,
    'Body' => $body,
);

  $auth = base64_encode( $id.':'.$token );
 
   $args = array(
    'headers' => [
        'Authorization' => "Basic $auth"
    ],

    'body' => $data,
    'timeout' => '45',
    'redirection' => '5',
    'httpversion' => '1.0',
    'sslverify' => false,
    'blocking' => true
    );
   $response = wp_remote_post( $url, $args );

}
?>