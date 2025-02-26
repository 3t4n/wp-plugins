
<?php

function tarot_hetliefdesinzicht(){

    require_once('tarot_base.php');

    ob_start();

    echo tarot_base(
        8, 
        'hetliefdesinzicht', 
        'Het Liefdesinzicht',
    );

    // return the buffer contents and delete
    return ob_get_clean();

    }    

    add_shortcode('astro_tarot_liefdesinzicht', 'tarot_hetliefdesinzicht');
?>