
<?php

function extendedyearhoroscope2024(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        69, 
        'extendedjaarhoroscoop2024', 
        'notfree'
    );

    // return the buffer contents and delete
    return ob_get_clean();
    }    

    add_shortcode('astro_year_extended_2024', 'extendedyearhoroscope2024');
?>