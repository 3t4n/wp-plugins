<?php
/**
 * The template for displaying a single Advent calendar entry
 * Customize it to your own needs, a good starting point is to copy yur whole "single" template from the theme
 * directory here. Make sure lines 32 - 36 from this template are still included, they output the featured image.
 *
 * @package    Advent_Calendar
 *
 * @since      1.0.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">

							<?php if ( is_single() ) : ?>
								<h1 class="entry-title">
									<?php the_title(); ?> </h1>
							<?php else : ?>
								<h1 class="entry-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h1>
							<?php endif; // is_single() ?>

							<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
								<div class="entry-thumbnail">
									<?php the_post_thumbnail( 'advent-calendar-full-image' ); ?>
								</div>
							<?php endif; ?>

						</header>
						<!-- .entry-header -->

						<?php if ( is_search() ) : // Only display Excerpts for Search ?>
							<div class="entry-summary">
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->
						<?php else : ?>
							<div class="entry-content">
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
							</div><!-- .entry-content -->
						<?php endif; ?>

						<footer class="entry-meta">
							<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
								<?php get_template_part( 'author-bio' ); ?>
							<?php endif; ?>
						</footer>
						<!-- .entry-meta -->
					</article>
					<!-- #post -->
				</div>

				<?php comments_template(); ?>

			<?php endwhile; ?>

		</div>
		<!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>