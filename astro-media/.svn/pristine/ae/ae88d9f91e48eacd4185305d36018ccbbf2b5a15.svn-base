
<?php

function yearhoroscope2023(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        5, 
        'jaarhoroscoop2023', 
        'notfree'
    );

    return ob_get_clean();
}    

add_shortcode('astro_year_horoscope2023', 'yearhoroscope2023');
?>