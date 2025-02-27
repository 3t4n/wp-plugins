<?php
defined( 'ABSPATH' ) || exit;
global $post;
if( ! $post || ! is_object( $post ) ){
    $post = get_post( absint( $_REQUEST['cncpid'] ) );
}
if( is_object( $post ) && isset( $post->post_status ) && ( 'publish' === $post->post_status || current_user_can('edit_post', $post->ID ) ) ) {
    echo do_shortcode( apply_filters( 'the_content', $post->post_content ) );
}
else{
    /* translators: output when the content of the post is not public. */
    esc_html_e( 'Private content', 'content-no-cache' );
}
