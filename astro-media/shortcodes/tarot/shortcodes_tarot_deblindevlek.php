<?php

function tarot_deblindevlek(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        40, 
        'blindevlek', 
        'De Blinde vlek',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_blind_spot', 'tarot_deblindevlek');
?>