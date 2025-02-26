<?php

function tarot_relatielegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        7, 
        'relatielegging', 
        'De Relatielegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_relatielegging', 'tarot_relatielegging');
?>