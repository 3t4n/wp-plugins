<?php if ( ! defined( 'ABSPATH' ) ) { exit; }
/*
Template Name: Archive Albatross Audio
*/
get_header();
?>
<div class="container">
    <div class="row albatross-content">
        
        <?php 
        // Albatross Loop Begin
        do_action( 'albatross_audio_loop_begin' ); 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post();
                $title = esc_html(ucwords(get_the_title()));
                $permalink = esc_url(get_the_permalink());
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="gallery-col gallery-overlay">
                <?php 
                if (has_post_thumbnail()) {
                    echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', false, array('alt' => esc_attr($title)));
                } else {
                    echo '<img src="' . esc_url(plugin_dir_url(__FILE__) . '../img/placeholder.png') . '" alt="' . esc_attr($title) . '">';
                }
                ?>
                <a rel="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($title); ?>" class="">
                    <span class="maximize-icon"><span class="icon-eye"></span></span>
                </a>
            </div>
        </div>
        <?php 
            endwhile; 
            do_action( 'albatross_audio_loop_end' ); 
        endif; 
        ?>
    
    </div>
    <!-- Pagination -->
    <?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '&#8249;', 'next_text' => '&#8250;' ) ); ?>
</div>
<?php get_footer(); ?>