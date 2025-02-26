<?php

function sendSMS($message, $numberPhone){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://smspanel.aruba.it/API/v1.0/REST/login');

    curl_setopt($ch, CURLOPT_USERPWD, 'Sms66203:WPs3cur1tyH0b!?0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    if ($info['http_code'] != 200) {
        echo('Error! http code: ' . $info['http_code'] . ', body message: ' . $response);
    }
    else {
        $values = explode(";", $response);
        $userKey = $values[0];
        $sessionKey = $values[1];
    }

    $payload = array(
        "message_type" => "N",
        "message" => $message,
        "recipient" => array(
            $numberPhone
        ),
        "sender" => "MySender",
        "scheduled_delivery_time" => "",
        "order_id" => "",
        "returnCredits" => TRUE
    );

    $payload = json_encode($payload);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://smspanel.aruba.it/API/v1.0/REST/sms');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-type: application/json',
        'user_key:'.$userKey,
        // Use this when using session key authentication
        'Session_key:'.$sessionKey,
        // When using Access Token authentication, use this instead:
        // 'Access_token: UserParam{access_token}'
    ));
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    $response = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    if ($info['http_code'] != 201) {
        echo('Error! http code: ' . $info['http_code'] . ', body message: ' . $response);
    }
    else {

        $obj = json_decode($response);
        //print_r($obj);
    }
}


?>