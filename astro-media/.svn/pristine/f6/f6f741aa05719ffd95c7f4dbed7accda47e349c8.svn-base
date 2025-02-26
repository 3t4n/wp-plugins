<?php

function tarot_deprobleemlegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        43, 
        'probleemlegging', 
        'De Probleemlegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_problemreading', 'tarot_deprobleemlegging');
?>