
<?php

function monthhoroscope(){

    require_once('horoscope-base.php');

    ob_start();

    echo horoscope_base(
        2, 
        'maandhoroscoop', 
        'notfree'
    );

    // return the buffer contents and delete
    return ob_get_clean();
}
add_shortcode('astro_month_horoscope', 'monthhoroscope');
?>