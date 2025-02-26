<?php
/**
* Create Astro shortcode
*/
class ASTRO_Shortcode {
    function __construct() {
        $this->make_shortcode();
    }

    function build_shortcode($atts) {
        $atts = shortcode_atts(
            array(
                'title' => 'Astronomy Daily',
                'count' => '1',
                'size' => 'post-thumbnail',
            ),
            $atts
        );

        $all_sizes = get_intermediate_image_sizes();
        for ( $i=0; $i < count($all_sizes); $i++ ) { 
            if ( $atts['size'] == $all_sizes[$i]) {
                $size = $all_sizes[$i];
                break;
            }
        }
        if ( is_null($size) ) $size = 'post-thumbnail';

        $args = array(
            'posts_per_page'   => $atts['count'],
            'post_type'        => 'astro',
            'orderby'          => 'date'
        );
        $astro = get_posts( $args ); ?>

        <div>
            <h2 class="widget-title"><?= $atts['title']; ?></h2>
            <?php foreach ($astro as $post) { ?>
                <a href="<?= the_permalink($post->ID); ?>">
                    <?= get_the_post_thumbnail( $post->ID, $size ); ?>
                    <h4><?= $post->post_title; ?></h4>
                </a>
            <?php } ?>
        </div>
    <?php
    }

    function make_shortcode() {
        add_shortcode('astro', array( $this, 'build_shortcode') );
    }

}