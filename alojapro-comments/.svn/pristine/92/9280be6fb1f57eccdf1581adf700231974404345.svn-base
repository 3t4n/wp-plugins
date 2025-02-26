<?php
    
    $getSettings = get_option('alojapro_settings');
    $propertyId = $getSettings['propertyId'];

    $language = ICL_LANGUAGE_CODE;

    $response = wp_remote_retrieve_body(wp_remote_get("https://admin.alojapro.com/api/ws/getCommentsHtml?propertyId=".$propertyId."&allComments=true&lang=".$language));
    
    echo wp_kses_post($response);

?>