<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){
    if(isset($_REQUEST['api_key']) && isset($_REQUEST['list_id'])){

        $server_prefix = "forminix-dummy";
        $api_key = sanitize_text_field($_REQUEST['api_key']);
        $list_id = sanitize_text_field($_REQUEST['list_id']);

        /* Extract server prefix */
        if (($pos = strpos($api_key, "-")) !== FALSE) {
            $server_prefix = substr($api_key, $pos+1);
        }

        $fieldsList = array();
        $url = sprintf("https://%s.api.mailchimp.com/3.0/lists/%s/merge-fields?fields=merge_fields.tag,merge_fields.name&apikey=%s", $server_prefix, $list_id, $api_key);
        $response = wp_remote_get($url);
        if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            $jsonResponse = json_decode($response['body'], true);
            if($jsonResponse != Null){
                $fieldsList[] = array("tag" => "EMAIL",
                    "name" => "Email Address (Required)"
                );
                foreach ($jsonResponse['merge_fields'] as $single_field){
                    $fieldsList[] = array(
                        "tag" => $single_field['tag'],
                        "name" => $single_field['name']
                    );
                }
            }
        }

        $result = array("status" => "true", "fields" => $fieldsList);

    }else{
        $result = array("status" => 'false');
    }
}else{
    $result = array("status" => 'false');
}

echo json_encode($result,  JSON_UNESCAPED_UNICODE);