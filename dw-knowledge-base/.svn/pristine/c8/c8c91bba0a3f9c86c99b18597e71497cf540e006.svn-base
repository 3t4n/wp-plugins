<div class="dwkb-archive">
	<?php
	if ( DWKB_SEARCH == 'on' ) {
			?>
			<div class="dwkb-search-form">
				<?php dwkb_search_form(); ?>
			</div>
			<?php
		}
	?>
	<?php if( is_tax( 'dwkb_category')  || is_tax( 'dwkb_tag' ) ): ?>
	<?php 
	if ( DWKB_BREACUMBS == 'on' ) {
		dwkb_breadcrumbs();
	}
	?>
	<?php 
	elseif ( is_search() ): 
		?>
		<div class="dwkb-big-header">
			<?php printf( __( 'Search Results for: %s', 'dwkb' ), '<span>' . get_search_query() . '</span>' ); ?>
		</div>
	<?php endif; ?>
	<div class="dwkb-list">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="kb-article">
				<a class="kb-article-title" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
				<?php the_excerpt(); ?>
			</div>
		<?php endwhile; else : ?>
			<p><?php _e('There is no post to display.'); ?></p>
		<?php endif; ?>
	</div>
	<div class="dwkb-navigation">
		<?php the_posts_pagination(); ?>
	</div>
</div>