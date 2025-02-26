<?php

function tarot_hetgevoelsleven(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        44, 
        'gevoelsleven', 
        'Het Gevoelsleven',
    );

    // return the buffer contents and delete
    return ob_get_clean();

}    

    add_shortcode('astro_tarot_feelings', 'tarot_hetgevoelsleven');
?>