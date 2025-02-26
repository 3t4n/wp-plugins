<?php

function tarot_weeklegging(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        37, 
        'deweeklegging', 
        'De Weeklegging',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_week', 'tarot_weeklegging');
?>