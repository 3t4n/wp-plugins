<?php

namespace GS_BOOKS;

defined( 'ABSPATH' ) || exit;

get_header();

?>

	<div class="archive-title-header">

		<h2>
			<?php the_archive_title(); ?>
		</h2>

	</div>

	<div class="gs-containeer gsb-archive-content-wrapper">

		<div class="gs-roow">
			<?php

			$taxonomies = array( 'bookshowcase_group', 'gsb_tag', 'gsb_genre', 'gsb_series', 'gsb_publishers', 'gsb_languages', 'gsb_countries' );

			foreach ( $taxonomies as $taxonomy ) {
				if ( is_tax( $taxonomy ) ) {

					$current_term    = get_queried_object();
					$current_term_id = $current_term->term_id;

					$args = array(
						'post_type' => 'gs_bookshowcase',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => $taxonomy,
								'field'    => 'term_id',
                				'terms'    => $current_term_id,
								// 'operator' => 'EXISTS'
							),
						),
					);

					$query = new \WP_Query( $args );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							?>

							<div class="gs-col-lg-3 gs-col-md-4 gs-col-sm-6 gs-col-xs-12">

								<div class="gsb-archive-single-item">

									<div class="gsb-cover-wrapper">

										<div class="gsbooks--book-thumb">

											<?php 
												if ( has_post_thumbnail() ) {
													echo get_the_post_thumbnail( get_the_ID(), 'full' );
												}                
											?>

										</div>


									</div>

									<div class="gsb-archive-single-content">

										<div class="gsb-archive-book-name">

											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

										</div>

										<?php if( is_pro_active() ): ?>				
											<div class="gsb-archive-book-author">
												<?php 
													$terms = get_the_terms( get_the_ID(), 'gsb_author' );												
													if ( $terms ) {
														foreach ( $terms as $term ) {
															if ( ! is_wp_error( $term ) || ! empty( $term ) ) {
																echo $term->name . ' ';
															}
														}
													}
												?>

											</div>
										<?php endif; ?>

									</div>

								</div>

							</div>
						

							<?php
						}
						wp_reset_postdata();
					} else {
						echo 'No posts found.';
					}
				}
			}
			?>
		</div>

	</div>
<?php

get_footer();
