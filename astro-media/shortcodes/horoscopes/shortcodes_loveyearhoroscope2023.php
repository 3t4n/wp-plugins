
<?php

function loveyearhoroscope2023(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        6, 
        'liefdesjaarhoroscoop2023', 
        'notfree'
    );

    return ob_get_clean();
} 

add_shortcode('astro_loveyear_horoscope2023', 'loveyearhoroscope2023');
?>