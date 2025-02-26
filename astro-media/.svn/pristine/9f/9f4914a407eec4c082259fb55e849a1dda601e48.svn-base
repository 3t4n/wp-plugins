<?php

function tarot_dester(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        42, 
        'ster', 
        'De Ster',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_star', 'tarot_dester');
?>