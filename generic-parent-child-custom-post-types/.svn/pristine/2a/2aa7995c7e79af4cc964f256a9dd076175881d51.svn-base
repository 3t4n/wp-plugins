<?php
/**
 * The Template for displaying custom post type parents.
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'twentyeleven' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content', 'single' ); ?>

<?php
    $my_wp_query = new WP_Query();
    $all_wp_children = $my_wp_query->query(array('post_type' => 'gpc_children'));
    $children = get_page_children(get_the_ID(), $all_wp_children);
    echo '<ul>'."\n";
    foreach($children as $child) {
      echo '<li>'."\n";
      echo '  <h3>'. $child->post_title .'</h3>'."\n";
      echo '  <div class="entry">'."\n";
      echo $child->post_content."\n";
      echo '  </div>'."\n";
      echo '</li>'."\n";
    }
    echo '</ul>'."\n";
?>
          
					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>