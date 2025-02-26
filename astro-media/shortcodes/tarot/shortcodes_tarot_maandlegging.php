<?php

function tarot_maandlegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        38, 
        'demaandlegging', 
        'De Maandlegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_month', 'tarot_maandlegging');
?>