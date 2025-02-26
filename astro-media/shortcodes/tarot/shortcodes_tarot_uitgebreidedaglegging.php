<?php

function tarot_uitgebreidedaglegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        36, 
        'uitgebreidedaglegging', 
        'De Uitgebreide Daglegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_extended_daycard', 'tarot_uitgebreidedaglegging');
?>