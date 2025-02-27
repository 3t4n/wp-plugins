<?php
/*--- endpoints ---*/
//getall
add_action('rest_api_init', function () {
    register_rest_route('envialosimple/v1', '/posts/getall', array(
        'methods' => 'GET',
        'callback' => 'posts_getall',
        'permission_callback' => function () {
            return true;
        }
    ));
});
/*-----------------*/


/*--- functions ---*/
function posts_getall() {
    $string = (!empty(sanitize_text_field($_GET['filter'])))?sanitize_text_field($_GET['filter']):null;
    $response = get_page_by_title_search($string);

    $result = [];
    foreach($response as $post) {
        if($post->post_status == 'publish') {
            $image = 'https://place-hold.it/150x150/78c5d6/fff/';
            if(has_post_thumbnail( $post->ID )) {
                $postImages = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
                $image = $postImages[0];
            }
            $result[] = [
                'id' => $post->ID,
                'title' => $post->post_title,
                'content' => get_excerpt_by_content($post->post_content),
                'image' => $image,
                'url' => get_permalink($post)
            ];
        }
    }
    return new WP_REST_Response($result, 200);
}

function get_page_by_title_search($string){
    global $wpdb;
    $title = esc_sql($string);
    $pages = [];
    if(!$title) {
        $pages = $wpdb->get_results("
            SELECT * 
            FROM $wpdb->posts
            WHERE post_type = 'post' 
            AND post_status = 'publish'
            LIMIT 100
        ");
    } else {
        $pages = $wpdb->get_results("
            SELECT * 
            FROM $wpdb->posts
            WHERE post_title LIKE '%$title%'
            AND post_type = 'post' 
            AND post_status = 'publish'
            LIMIT 100
        ");
    }

    return $pages;
}

function get_excerpt_by_content($post_content){
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($post_content)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = $the_excerpt;

    return $the_excerpt;
}