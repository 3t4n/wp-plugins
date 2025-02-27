<?php
    $apiKey = get_option('es_config_apikey');
    
    //form submit
    if(isset($_POST['form_submitted'])) {
        if(esma_check_nounce_and_user()){
            $apiKey = sanitize_text_field($_POST['apikey']);
        }
    }

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
    if(!empty($error)) {
        update_option('es_config_apikey', '');
    } else {
        update_option('es_config_apikey', $apiKey);
    }
    $esma_nonce = wp_create_nonce( 'esma_form_nonce' );
    //form html
    include(dirname(__FILE__).'/html.php');

?>
