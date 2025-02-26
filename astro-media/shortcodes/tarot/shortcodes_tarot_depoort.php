<?php

function tarot_depoort(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        41, 
        'poort', 
        'De Poort',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_port', 'tarot_depoort');
?>