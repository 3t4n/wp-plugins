<?php

    $getSettings = get_option('alojapro_settings');
    $propertyId = $getSettings['propertyId'];
    $numberOfComments = $getSettings['numberOfComments'];

    $language = get_avaliable_language();
        
    $response = wp_remote_retrieve_body(wp_remote_get("https://admin.alojapro.com/api/ws/getCommentsHtml?propertyId=".$propertyId."&allComments=false&comments=".$numberOfComments."&lang=".$language));
 
    echo wp_kses_post($response);

?>