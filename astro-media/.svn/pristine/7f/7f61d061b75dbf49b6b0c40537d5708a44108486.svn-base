
<?php

function yearhoroscope2024(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        17, 
        'jaarhoroscoop2024', 
        'notfree'
    );

    // return the buffer contents and delete
    return ob_get_clean();
    }    

    add_shortcode('astro_year_horoscope2024', 'yearhoroscope2024');
?>