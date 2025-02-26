<?php
/*
  Help text for custom post types.
*/

add_filter( 'enter_title_here', 'acfl_title_message' );

function acfl_title_message( $title ){
    $screen = get_current_screen();
    if ( 'answer' == $screen->post_type ){
        $title = 'Enter question here';
    }
    return $title;
}

add_filter( 'default_content', 'acfl_editor_message', 10, 2 );

function acfl_editor_message( $content, WP_Post $post ) {
    $count_posts = wp_count_posts( 'answer' )->publish;
	
	if ( $count_posts == 0 and $post->post_type == 'answer' ) {
        $content = 'Enter answer here';
    }
    return $content;
}
?>