
<?php

function starsignshoroscope(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        28, 
        'sterrenbeelden', 
        'free'
    );

    return ob_get_clean();
}    

add_shortcode('astro_starsigns_horoscope', 'starsignshoroscope');
?>