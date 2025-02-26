<?php

function tarot_inzichtevenwichtharmonie(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        46, 
        'inzichtevenwichtharmonie', 
        'Inzicht, evenwicht en harmonie',
    );

    // return the buffer contents and delete
    return ob_get_clean();
}

    add_shortcode('astro_tarot_insight_balance_harmony', 'tarot_inzichtevenwichtharmonie');
?>