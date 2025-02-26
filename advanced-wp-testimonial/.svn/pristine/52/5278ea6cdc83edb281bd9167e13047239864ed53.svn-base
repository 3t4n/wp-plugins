<?php
get_header();
?>
<style type="text/css">
    .awt_client_thumb {
        float:left;
        margin:10px;
        clear:both; 
    }
</style>
<div id="primary">
    <div id="content" role="main">

<?php while ( have_posts() ) : the_post(); ?>

    <nav id="nav-single">
            <h3 class="assistive-text"><?php _e( 'Post Testimonial', 'awt' ); ?></h3>
            <span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'awt' ) ); ?></span>
            <span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'awt' ) ); ?></span>
    </nav><!-- #nav-single -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
            <div class="entry-meta">
                <span class="sep"><?PHP echo __('submitted  on','awt'); ?></span>
                <a href="<?PHP echo esc_url(get_permalink()); ?>"  rel="bookmark">
                    <time class="entry-date" datetime="<?PHP echo esc_attr(get_the_date('c'));?>" pubdate>
                        <?PHP echo esc_html( get_the_date()); ?>
                    </time>
                </a>
                <?PHP
                $client     = get_post_meta(get_the_ID(),'awt_client_name',TRUE);
                $client_url = get_post_meta(get_the_ID(),'awt_client_siteurl',TRUE);
                if(!empty($client)){
                    ?>
                    <span class="sep"><?PHP echo __('By','awt'); ?></span>
                    <?PHP
                    if(!empty($client_url))
                        $client = '<a href="'. $client_url . '" target="_blank">' . $client .  '</a>';
                    echo $client;
                }
                ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
        <div class="entry-content">
            <?PHP
                    $img_src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),array(100,100));
                    if(is_array($img_src)){
                    ?>
                    <div class="awt_client_thumb">
                        <img src="<?PHP echo $img_src[0]; ?>"  /><br/>
                        <?PHP
                        if(!empty($client)){
                            ?>
                            <span class="sep"><?PHP echo __('By','awt'); ?></span>
                            <?PHP
                            if(!empty($client_url))
                                $client = '<a href="'. $client_url . '" target="_blank">' . $client .  '</a>';
                            echo $client;
                        }
                        ?>
                    </div>
                    <?PHP
                    }
              ?>
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'awt' ) . '</span>', 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
        <footer class="entry-meta">
                <?php edit_post_link( __( 'Edit', 'awt' ), '<span class="edit-link">', '</span>' ); ?>
        </footer><!-- .entry-meta -->
    </article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; // end of the loop. ?>

    </div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>