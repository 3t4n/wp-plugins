<?php

function tarot_dedagkaartvoorspellingen(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        34, 
        'dedagkaartvoorspellingen', 
        'De Dagkaart (Gratis)',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_daycard', 'tarot_dedagkaartvoorspellingen');
?>