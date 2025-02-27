<?php get_header(); ?>
    <main id="site-content" role="main">
        <div id="content" class="clearfix">
			<?php
			global $post;
			if ( ! empty( $post->ID ) ) {
				echo do_shortcode( '[ovic_pinmap id="' . $post->ID . '"]' );
			}
			?>
        </div><!-- #content -->
    </main><!-- #main -->
<?php get_footer(); ?>