<?php get_header(); ?>
	
		<div id="container">	
			<div id="content">
			<?php the_post(); ?>
            <div id="cool-bg">
            <div class="fbac-post">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					
                
					
					<div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'fbac-wordpress-facebook' ) . '&after=</div>') ?>
					</div><!-- .entry-content -->
					
					<div class="entry-utility">
		<!--			<?php printf( __( 'This entry was posted in %1$s%2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%5$s" title="Comments RSS to %4$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'fbac-wordpress-facebook' ),
						get_the_category_list(', '),
						get_the_tag_list( __( ' and tagged ', 'fbac-wordpress-facebook' ), ', ', '' ),
						get_permalink(),
						the_title_attribute('echo=0'),
						comments_rss() ) ?> -->

<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
						<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'fbac-wordpress-facebook' ), get_trackback_url() ) ?>
<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
						<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'fbac-wordpress-facebook' ), get_trackback_url() ) ?>
<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
						<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'fbac-wordpress-facebook' ) ?>
<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
					<strong>	<?php _e( 'Both comments and trackbacks are currently closed.', 'fbac-wordpress-facebook' ) ?> </strong>
<?php endif; ?>
<?php edit_post_link( __( 'Edit', 'fbac-wordpress-facebook' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>
					</div><!-- .entry-utility -->													
				</div><!-- #post-<?php the_ID(); ?> -->			
                </div> <!-- #fbac-post -->
				</div> <!-- cool-bg -->
				 
<?php comments_template('', true); ?>			
			
			</div><!-- #content -->		
		</div><!-- #container -->
		
 <?php get_footer(); ?>
