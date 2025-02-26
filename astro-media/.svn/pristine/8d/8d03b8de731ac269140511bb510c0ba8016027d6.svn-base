<?php

function tarot_dedagkaartliefde(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        65, 
        'dedagkaartliefde', 
        'De Dagkaart Liefde (Gratis)',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_daycard_love', 'tarot_dedagkaartliefde');
?>