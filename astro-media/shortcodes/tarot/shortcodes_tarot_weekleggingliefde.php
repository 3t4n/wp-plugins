<?php

function tarot_weekleggingliefde(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        10, 
        'weekleggingliefde', 
        'De Weeklegging Liefde',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_weeklegging_liefde', 'tarot_weekleggingliefde');
?>