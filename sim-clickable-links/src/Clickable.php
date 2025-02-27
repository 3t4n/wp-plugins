<?php

namespace ClickableLinks;

final class Clickable
{
    public function clickable(): void
    {
        add_filter( 'the_content', [ $this, 'content' ], 9999 );
    }

    public function content( $content )
    {
        if ( $this->is_single_post() ) {
            $content = make_clickable( $content );
        }

        return $content;
    }

    private function is_single_post()
    {
        global $post;

        $post_id = get_the_ID();

        if ( is_singular() && is_main_query() && 'post' === $post->post_type ) {
            return true;
        }

        return false;
    }
}
