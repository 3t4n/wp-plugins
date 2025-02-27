<?php
    $apiKey = get_option('es_config_apikey');
    
    //data profile
    $dataProfile = [];
    if(!empty($apiKey)) {
        $response = getDataProfile($apiKey);
        if($response->data->status == 'ok') {
            $dataProfile = $response->data;
        } else {
            $error = true;
        }
    }

    //form html
    include(dirname(__FILE__).'/html.php');
?>
