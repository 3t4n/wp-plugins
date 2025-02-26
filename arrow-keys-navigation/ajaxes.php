<?php
/* ***************************** */
/*     HANDLE AJAX requests      */
/* ***************************** */

/*** AJAX for visitors and users ***/
add_action( 'wp_ajax_akeynav_reqs', 'akeynav_reqs_callback' );
add_action( 'wp_ajax_nopriv_akeynav_reqs', 'akeynav_reqs_callback' );

/*** HANDLER function ***/
add_action( 'wp_ajax_akeynav_reqs', 'akeynav_reqs_callback' );
function akeynav_reqs_callback() {

    if (is_custom_post_type()):

    $url = wp_get_referer();
    $post_id = url_to_postid($url);

    //switch ACTIONS
    switch ($_POST['todo']) {
        case 'go_post':
            $kpress = $_POST['kpress'];
            $wildcard = explode(',', $_POST['wildcard']);
            //37 'Left arrow key pressed. GO PREVIOUS post';
            //39 'Right arrow key pressed. GO NEXT post';
            if ($kpress==37)
                $echo = trim($wildcard[0]);
            else
                $echo = trim($wildcard[1]);
        break;
    }

    //return values
    echo $echo;
    wp_die();

    endif;
}

?>
