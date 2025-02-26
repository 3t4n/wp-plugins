
<?php

function ascendantenhoroscope(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        30, 
        'ascendanten', 
        'free'
    );

    // return the buffer contents and delete
    return ob_get_clean();
    }    

    add_shortcode('astro_ascendants_horoscope', 'ascendantenhoroscope');
?>