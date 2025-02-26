<div class="dwkb-index">
	<?php
	if ( DWKB_SEARCH == 'on' ) {
		?>
		<div class="dwkb-search-form">
			<?php dwkb_search_form(); ?>
		</div>
		<?php
	}
	if ( DWKB_BREACUMBS == 'on' ) {
		echo dwkb_breadcrumbs();
	}
	?>
	<div class="dw-grid layout-default">
		<?php 
		$cat_args = array(
			'orderby'       => 'terms_order', 
			'order'         => 'ASC',
			'hide_empty'    => true,
			'parent'        => 0
			);
		$terms = get_terms( 'dwkb_category', $cat_args );
		if ( ! empty( $terms ) ) {
			foreach ( $terms as $taxonomy ) {
				?>
				<div class="dw-col dw-one-half-col">
					<div class="dwkb-category-box">
						<?php
						$term_id = $taxonomy->term_id;
						$term_slug = $taxonomy->slug;
						$term_name = $taxonomy->name;
						$term_count = $taxonomy->count;
						$term_link = get_term_link( $term_slug, 'dwkb_category' );
						?>
						<div class="box-header">
							<span class="category-title"><a href="<?php echo $term_link; ?>"><?php echo $term_name; ?></a></span>
							<span class="category-count">(<?php echo $term_count; ?>)</span>
						</div>
						<?php
						$tax_post_args = array(
							'post_type' => 'dwkb',
							'posts_per_page' => 5,
							'no_found_rows' => true,
							'post_status' => 'publish',
							'tax_query' => array(
								array(
									'taxonomy' => 'dwkb_category',
									'field' => 'slug',
									'terms' => $taxonomy->slug
									)
								)
							);

						$query = new WP_Query( $tax_post_args );
						?>
						<div class="box-content">
							<?php
							if( $query->have_posts() ) :
								?>
							<ul class="dwkb-list">
								<?php
								while( $query->have_posts() ) :
									$query->the_post();
								?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php
								endwhile;
								?>
							</ul>
							<?php
							else :
								echo _e("No post found.");
							endif;
							?>
						</div>
						<div class="box-footer">
							<a href="<?php echo $term_link; ?>"><?php _e('View all &rarr;'); ?></a>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
</div>