<?php
get_header(); ?>
<style type="text/css">
    .awt_client_thumb {
        float:left;
        margin:10px;
        clear:both; 
    }
</style>
<div id="primary">
    <div id="content" role="main">
<?php if ( have_posts() ) : ?>
        <?php 
        if ( $wp_query->max_num_pages > 1 ) :
        ?>
        <nav id="<?php echo $nav_id; ?>">
                <h3 class="assistive-text"><?php _e( 'Post Testimonial', 'awt' ); ?></h3>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts','awt' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>','awt' ) ); ?></div>
        </nav><!-- #nav-above -->
	<?php 
        endif;
            while ( have_posts() ) : the_post(); ?>
           <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><a href="<?PHP echo get_permalink(); ?>"><?php the_title(); ?></a></h1>
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
        <?php endwhile; ?>
        <?php 
        if ( $wp_query->max_num_pages > 1 ) :
        ?>
        <nav id="<?php echo $nav_id; ?>">
                <h3 class="assistive-text"><?php _e( 'Post Testimonial', 'awt' ); ?></h3>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts','awt' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>','awt' ) ); ?></div>
        </nav><!-- #nav-above -->
	<?php 
        endif;
    else : ?>
    <article id="post-0" class="post no-results not-found">
        <header class="entry-header">
                <h1 class="entry-title"><?php _e( 'Nothing Found', 'awt' ); ?></h1>
        </header><!-- .entry-header -->
        <div class="entry-content">
                <p><?php _e( 'No Testimonial Found', 'awt' ); ?></p>
                <?php get_search_form(); ?>
        </div><!-- .entry-content -->
    </article><!-- #post-0 -->
<?php endif; ?>
    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>