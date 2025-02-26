<?php

function tarot_deliefdeslegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        11, 
        'deliefdeslegging', 
        'De Liefdeslegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_liefdeslegging', 'tarot_deliefdeslegging');
?>