<?php

function tarot_deweeklegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        37, 
        'weeklegging', 
        'De weeklegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_week', 'tarot_deweeklegging');
?>