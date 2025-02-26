<?php 
if(!isset($wp_post_types)){
    $__pw3_post = new stdClass();
    $__pw3_post->labels = new stdClass();
    $__pw3_post->labels->name = 'Posts';
    $__pw3_post->labels->singular_name = 'Post';

    $__pw3_page = new stdClass();
    $__pw3_page->labels = new stdClass();
    $__pw3_page->labels->name = 'Pages';
    $__pw3_page->labels->singular_name = 'Page';
    
    $wp_post_types = array(
        'post' => $__pw3_post,
        'page' => $__pw3_page,
    );
    unset($__pw3_post, $__pw3_page);
}


if(!function_exists('get_user_meta')){
    function get_user_meta($k,$v,$single){
        return get_usermeta($k, $v);
    }
}

?>
