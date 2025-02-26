<?php

function tarot_wegnaarjezelf(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        45, 
        'wegnaarjezelf', 
        'De Weg naar Jezelf',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_roadtoyourself', 'tarot_wegnaarjezelf');
?>