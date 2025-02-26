<?php

function tarot_jaarlegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        39, 
        'dejaarlegging', 
        'De Jaarlegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_year', 'tarot_jaarlegging');
?>