<?php

if (function_exists('get_field')) {
    $text = get_field('acftt_layout_type', $post_id);
    if ($text != 'none') {
        if ($text == 'x404') {
            echo '404';
        } else {
            echo ucwords(str_replace('_', ' ', $text));
        }
    }
}
