<?php

add_action('init', function() {
    //we need to check location id inside a loop.
    global $wpdb;
    $table_name = $wpdb->base_prefix . "ghlex_subaccount";
    $location_ids=	$wpdb->get_results("SELECT Location_id, Location_name , Location_tok_expire,Location_ref_tok FROM $table_name");
    foreach ($location_ids as $option_name) {
        // Extract location ID from option name
          $current_time = time();
          $location_id = $option_name->Location_id;
          $expire_time =  $option_name->Location_tok_expire;
          if (!isset($expire_time) || empty($expire_time)) {
            continue;
          }
          $client_id = get_option("ghl_clnt_id");
          $client_secret = get_option("ghl_clnt_scrt");
          $refresh_token =  $option_name->Location_ref_tok;
          $body = array(
            'client_id' 	=> $client_id,
            'client_secret' =>  $client_secret,
            'grant_type' 	=> 'refresh_token',
            'refresh_token' => $refresh_token
        );
        if ($client_id && $client_secret && $refresh_token) {
            if ($current_time > $expire_time) {
                $endpoint = GET_TOKEN_API_FOR_GHL;
                $request_args = array(
                    'body' 		=> $body,
                    'headers' 	=> array(
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ),
                );
            
                $response = wp_remote_post( $endpoint, $request_args );
                $http_code = wp_remote_retrieve_response_code( $response );
            
                if ( 200 === $http_code ) {
            
                    $body = json_decode( wp_remote_retrieve_body( $response ) );
                    $new_ghl_access_token = $body->access_token;
                    $new_ghl_refresh_token = $body->refresh_token;
                    $hours = 20 * 60 * 60; 
           
                    $ghl_token_expire = time() + $hours;
                 
                    $existing_row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE Location_id = %s", $location_id));

                    if ($existing_row) {
                        // Update the existing record
                        $result = $wpdb->update(
                            $table_name,
                            array(
                                'Location_acc_tok' =>$new_ghl_access_token,
                                'Location_ref_tok' => $new_ghl_refresh_token,
                                'Location_tok_expire'=>$ghl_token_expire
                            ),
                            array('id' => $existing_row->id), // Update based on the existing row's id
                            array('%s','%s', '%s'),
                            array('%d') // Where clause data format
                        );

                    } 
                }
            }
        }
    }
});