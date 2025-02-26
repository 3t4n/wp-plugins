
<?php

function kindersterrenbeeldenhoroscope(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        29, 
        'kindersterrenbeelden', 
        'free'
    );

    // return the buffer contents and delete
    return ob_get_clean();
    }    

    add_shortcode('astro_childstarsigns_horoscope', 'kindersterrenbeeldenhoroscope');
?>