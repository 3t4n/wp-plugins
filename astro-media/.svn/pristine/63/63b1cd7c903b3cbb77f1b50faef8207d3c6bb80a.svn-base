<?php

function dayhoroscope(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        1, 
        'daghoroscoop', 
        'free'
    );

    // return the buffer contents and delete
    return ob_get_clean();
}
add_shortcode('astro_daily_horoscope', 'dayhoroscope');

?>