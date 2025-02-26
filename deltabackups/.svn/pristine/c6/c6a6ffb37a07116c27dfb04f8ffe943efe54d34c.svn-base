<?php

function dtbps_cloud_login($username, $password){
    $requestPayload = [
        'request' => 'backup_login',
        'username' => $username,
        'password' => $password,
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_backup_list($size){
    $requestPayload = [
        'request' => 'backup_list',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'clientId' => DTBPS_CLIENT_ID,
    ];
    if ($size !== null) {
        $requestPayload['size'] = $size;
    }
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_backup_create($backupId, $zip_fileNumber){
    $requestPayload = [
        'request' => 'backup_create',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'clientId' => DTBPS_CLIENT_ID,
        'backupId' => $backupId,
        'fileIndex' => $zip_fileNumber,
        'siteUrl' => get_site_url(),
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_backup_delete(){
    $requestPayload = [
        'request' => 'backup_delete',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'clientId' => DTBPS_CLIENT_ID,
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_backup_calculate($backupId){
    $requestPayload = [
        'request' => 'backup_calculate',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'clientId' => DTBPS_CLIENT_ID,
        'backupId' => $backupId
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_client_create($clientName){
    $requestPayload = [
        'request' => 'backup_client_create',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'clientName' => $clientName
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_client_list(){
    $requestPayload = [
        'request' => 'backup_client_list',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
    ];

    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_client_delete($clientId){
    $requestPayload = [
        'request' => 'backup_client_delete',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'clientId' => $clientId,
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_cloud_bucket_fetch($files){
    $requestPayload = [
        'request' => 'backup_fetch',
        'username' => DTBPS_USER_ID,
        'password' => DTBPS_PASSWORD,
        'filePath' => $files,
    ];
    $jsonBody = dtbps_make_request_post_request(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    return $jsonBody;
}

function dtbps_bucket_upload($url, $file) {
    return wp_safe_remote_request(
       $url,
       array(
           'method'  => 'PUT',
           'timeout' => DTBPS_API_TIMEOUT_SEC,
           'body'    => $file,
           'headers' => ['Content-Type' => 'application/octet-stream'],
       ),
   );
}

function dtbps_make_request_post_request($endpoint, $requestPayload){
    $response = dtbps_make_request_post(DTBPS_ENDPOINT_SERVICE, $requestPayload);
    // Check for errors
    if (is_wp_error($response)) {
        throw new Exception($response->get_error_messages());
    } else {
        $body = wp_remote_retrieve_body($response);
        $jsonBody = json_decode($body, true);
        // check if username is confirmed by server
        if ($jsonBody == null || !isset($jsonBody['username']) || !$jsonBody['username'] == $requestPayload['username'] || $jsonBody['message'] == DTBPS_ENDPOINT_RESPONSE_MESSAGE_ERROR) {
            // Delete the option by key
            echo '<div class="error"><p>User ID is not valid or expired!</p></div>';
            delete_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY);
            update_option(DTBPS_DB_SQL_TABLE_OPTIONS_KEY, []);
            if($requestPayload['request'] != 'backup_login')
                throw new Exception('Username password wrong!');
        } else if (isset($jsonBody["response"]) && $jsonBody['response'] == 'used_all_size') {
            $errorMessage = $jsonBody['message'];
            throw new Exception($errorMessage);
         }

        return $jsonBody;
    }
}


function dtbps_make_request_post($url, $payload){
    return wp_safe_remote_post(
        $url,
        array(
            'method'        => 'POST',
            'timeout'       => DTBPS_API_TIMEOUT_SEC,
            'body'          => json_encode($payload),
            'headers'       => ['Content-Type' => 'application/json'],
        )
    );
}

// this is used mostly for file data fetching
function dtbps_make_request_get($url){
    $response =  wp_safe_remote_get(
        $url,
        array(
            'method'        => 'GET',
            'timeout'       => DTBPS_API_TIMEOUT_SEC,
        )
    );

    if (is_wp_error($response)) {
        throw new Exception($response->get_error_messages());
    } else {
        $body = wp_remote_retrieve_body($response);
        if (empty($body)) {
            // Handle empty response
            throw new Exception("Error: Could not fetch file!");
        }
        return $body;
    }
}


function dtbps_cloud_response_check_all_size_used($jsonBody){
    $response = null;
    if ($jsonBody['response'] == 'used_all_size') {
        $message = $jsonBody['message'];
        $response = array('status' => '404', 'message' => $message);
    }
    return $response;
}