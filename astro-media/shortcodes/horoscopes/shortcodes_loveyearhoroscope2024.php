
<?php

function loveyearhoroscope2024(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        19, 
        'liefdesjaarhoroscoop2024', 
        'notfree'
    );

    return ob_get_clean();
    }    

    add_shortcode('astro_loveyear_horoscope2024', 'loveyearhoroscope2024');
?>