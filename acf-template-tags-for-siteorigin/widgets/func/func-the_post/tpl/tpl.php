<?php

global $post;
the_post();

$size = empty( $instance['option']['image_size'] ) ? 'full' : $instance['option']['image_size'];

if (!empty($instance['background_image']['use_post_image'])) {
    $style = 'style="background-image: url('.get_the_post_thumbnail_url('', $size).'); background-size: cover;"';
} else {
    $style = '';
}


?>

<?php if ($post) : ?>
    
    <?php if ($instance['option']['layout'] != 'search_result') : ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo $style; ?>>
            
            <?php echo siteorigin_panels_render( absint($instance['option']['layout']) ); ?>
            
        </article>
        
    <?php else : ?>
        
        <?php
        
        $posts = get_posts(array(
            'numberposts'	=> -1,
            'post_type'		=> 'echelonso_layout',
            'meta_query' => array(
                array(
                    'key'     => 'acftt_post_type',
                    'value'   => get_post_type(),
                ),
                array(
                    'key'     => 'acftt_layout_type',
                    'value'   => 'loop_item',
                ),
            ),
            
        ));
        
        if ( !empty($posts) ) {
            
            echo siteorigin_panels_render( absint($posts[0]->ID) );
            
        }
        
        ?>
        
    <?php endif; ?>
    
<?php endif; ?>
