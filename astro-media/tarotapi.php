<?php

function get_readings(){

    $url = "https://api.astromedia-business.nl/v1/readings/";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    // Check if any error occurred
    if(curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return ['error' => true, 'message' => $error_msg];
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode != 200) {
        curl_close($ch);
        return ['error' => true, 'message' => "HTTP Response Code: " . $httpCode];
    }

    curl_close($ch);

    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => true, 'message' => "JSON Decode Error: " . json_last_error_msg()];
    }

    return ['error' => false, 'data' => $data];
}

function get_reading($id){

    $url = "https://api.astromedia-business.nl/v1/readings/".$id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    // Check if any error occurred
    if(curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return ['error' => true, 'message' => $error_msg];
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($httpCode != 200) {
        curl_close($ch);
        return ['error' => true, 'message' => "HTTP Response Code: " . $httpCode];
    }

    curl_close($ch);

    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['error' => true, 'message' => "JSON Decode Error: " . json_last_error_msg()];
    }

    return ['error' => false, 'data' => $data];
}

function astromedia_horoscopes_nl_functionality_fetch_readings_for_astromedia() {
    
    $reading_id = isset($_POST['reading_id']) ? sanitize_text_field($_POST['reading_id']) : null;
    $url = "https://api.astromedia-business.nl/v1/readings/".$reading_id;
        
    $ch = curl_init($url);

    // Set cURL options for POST
    curl_setopt($ch, CURLOPT_POST, 1); // This will set the request type to POST
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Optionally, if you need to send POST data, add this:
    if ($_POST['useridentifier'] != '') {

        $postData = array(
            'userReadingIdentifier' => $_POST['useridentifier'],
            'zodiacSign' => $_POST['zodiacsign'],
            'date' => $_POST['date'],
        );

        // Convert the array to a JSON string
        $jsonPayload = json_encode($postData);
    
        // Set the content type to "application/json"
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($jsonPayload)));
    
        // Send the JSON payload as POST data
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);
    }    

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);

    echo json_encode($data);

    wp_die();
}

function astromedia_horoscopes_nl_functionality_fetch_results_for_astromedia() {
    
    $reading_id = isset($_POST['reading_id']) ? sanitize_text_field($_POST['reading_id']) : null;
    $useridentifier = isset($_POST['useridentifier']) ? sanitize_text_field($_POST['useridentifier']) : null;

    $url = "https://api.astromedia-business.nl/v1/readings/".$reading_id."/result/".$useridentifier;
       
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($response, true);

    echo json_encode($data);

    wp_die();
}


?>