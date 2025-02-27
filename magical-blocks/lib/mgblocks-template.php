<?php
/*
 * Template Name: Magical Blocks
 * Description: A Page Template for magical Blocks
 */

get_header();
?>
	<main id="mgblocks-page" class="site-main magical-blocks-template">

		<?php
			while ( have_posts() ) :
				the_post();
		?>
		<?php if(has_post_thumbnail()): ?>
		<div class="page-featured-image">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?> 
		<div class="container">
			<div class="entry-content">
				<?php
				the_content();

				?>
			</div><!-- .entry-content -->
		</div><!-- .container -->
	<?php
			endwhile; // End of the loop.
		?>

	</main><!-- #main -->


<?php
get_footer();
