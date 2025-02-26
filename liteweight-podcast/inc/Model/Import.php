<?php
namespace PDP\Model;

class Import {

    public static function isGutenberg(){
        $query = new \WP_Query(array(
            'post_type' => 'podcast',
            'post_status' => 'any',
            'posts_per_page' => -1
        ));

        while($query->have_posts()): $query->the_post();
            if(get_the_content() != ''){
                update_post_meta(\get_the_ID(), 'isGutenberg', true);
            }
        endwhile;
    }
}
