<?php

function tarot_verledenhedentoekomst(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        47, 
        'verledenhedentoekomst', 
        'Verleden, heden en toekomst',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_past_present_future', 'tarot_verledenhedentoekomst');
?>