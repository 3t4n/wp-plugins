<?php

function tarot_thecross(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        35, 
        'thecross', 
        'Het Kruis',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_cross', 'tarot_thecross');
?>