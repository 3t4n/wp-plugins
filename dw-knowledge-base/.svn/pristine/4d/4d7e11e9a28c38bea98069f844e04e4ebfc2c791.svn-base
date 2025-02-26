<?php 
	while ( have_posts() ) : the_post(); 
	dwkb_set_article_views( get_the_ID() );
?>
<div class="dwkb-article">
	<?php
	if ( DWKB_BREACUMBS == 'on' ) {
		dwkb_breadcrumbs();
	}
	?>
	<div class="dwkb-article-header">
		<?php dwkb_article_meta(); ?>
	</div>
	<div class="dwkb-article-content">
		<?php the_content(); ?>
	</div>
		<div class="dwkb-article-footer">
			<div class="dw-grid">
				<div class="dw-row">
					<div class="left-side dw-hide-xs">
						<?php dwkb_article_tags(); ?>
					</div>
					<div class="right-side">
						<?php dwkb_article_footer(); ?>
					</div>
				</div>
				<div class="dwkb-hr"></div>
				<div class="dw-row">
					<div class="dwkb-update-timestamp"><?php _e( 'Updated on', 'dwkb'); ?> <?php the_modified_date(); ?></div>
				</div>
			</div>
		</div>
	<?php dwkb_article_related(); ?>
</div>
<?php endwhile; ?>