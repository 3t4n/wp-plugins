<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['api_key'])){

        $server_prefix = "forminix-dummy";
        $api_key = sanitize_text_field($_REQUEST['api_key']);

        /* Extract server prefix */
        if (($pos = strpos($api_key, "-")) !== FALSE) {
            $server_prefix = substr($api_key, $pos+1);
        }

        $listMailchimpList = array();
        $url = sprintf("https://%s.api.mailchimp.com/3.0/lists?fields=lists.id,lists.name&apikey=%s", $server_prefix, $api_key);
        $response = wp_remote_get($url);

        if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            $jsonResponse = json_decode($response['body'], true);
            if($jsonResponse != Null){
                foreach ($jsonResponse['lists'] as $single_list){
                    $listMailchimpList[] = array(
                        "id" => $single_list['id'],
                        "text" => $single_list['name'],
                    );
                }
            }
        }

        $result = array("status" => "true", "lists" => $listMailchimpList);

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);