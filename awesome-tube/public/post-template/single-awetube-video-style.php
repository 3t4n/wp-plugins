<?php get_header();

while ( have_posts() ) : the_post();

	awetube_post_view_count( get_the_ID() );
?>

<section id="content" class="single-video-wrap blog-single style-1 clearfix">
	<div class="awesome-tube-container">
		<div class="grid grid-cols-12 gap-12">
			<div class="inner-content-single col-span-8 sm:col-span-12">

				<?php
					$video_url   = carbon_get_post_meta( get_the_ID(), 'awetube_video_url' );
					$video_embed = '';
					$video_file  = carbon_get_post_meta( get_the_ID(), 'awetube_video_file' );

					$video_file_url = $video_file;

					if ( !empty( $video_file_url ) ) {
						$video_attr = array(
							'src' => $video_file_url,
						);
					}

					$extFile = wp_check_filetype($video_file_url);

					$lastmodified = get_the_modified_time( 'U' );
					$posted       = get_the_time( 'U' );

					$view_asli = '';

					$published = strtotime(get_the_date('d/m/Y'));
					$curdatest = date('d/m/Y', time());
					$curdate = strtotime($curdatest);

					$start = get_the_date('d/m/Y');
					$more_ten_day = strtotime("$start +10 days");

					$post_date = get_the_date('j');
					$curdatesthar = date('j', time());

					$post_meta_view = get_post_meta( get_the_ID(), '_awetube_view_count', true );
					$post_meta_fakeview = get_post_meta( get_the_ID(), 'video_view_count', true );
					$stop_counting_view = get_post_meta( get_the_ID(), 'stop_counting_view', true );
					if(empty($post_meta_fakeview)) {
						$post_meta_fakeview = 0;
					}
					else {
						$post_meta_fakeview = $post_meta_fakeview;
					}
				?>
				<div class="meta-wrapper-single">
					<div class="tag-wrapper meta-top">
						<?php the_terms( get_the_ID(), 'video-category', '', ' '); ?>
					</div>
				</div>
				<div class="video-category-inner">
					<div class="video-wrap">
						<?php
						if ( ! empty( $video_url ) ) {
							echo wp_oembed_get( esc_url( $video_url ) );
						} elseif ( ! empty( $video_embed ) ) {
							echo esc_html( $video_embed );
						} elseif ( ! empty( $video_file_url ) ) {

							if($extFile['ext'] != 'mov') {
								echo do_shortcode( '[video src=' . esc_url( $video_file_url ) . ']' );
							} else { ?>
							<video controls controlsList="nodownload" src="<?php echo esc_url( $video_file_url ); ?>"></video>
						<?php }
						}
						?>
					</div>
					<div class="video-meta">
						<h4 class="title">
							<a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>
						</h4>

						<div class="video-content-bottom">
							<?php if ( function_exists( 'the_ratings' ) ) { ?>
								<div class="rating">
									<div class="rating-wrap">
										<div class="see-rate">
											<?php if ( function_exists( 'the_ratings' ) ) { echo do_shortcode( '[ratings id="' . get_the_ID() . '" results="true"]' ); } ?>
										</div>
										<?php if( check_rated( get_the_ID()) === 0 ) { ?>
											<div class="give-rating">
												<span class="title"><?php esc_html_e( 'Please Rate this video', 'awetube' ); ?></span>
												<?php if ( function_exists( 'the_ratings' ) ) { echo do_shortcode( '[ratings]' ); } ?>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>

							<?php awetube_social_sharer(); ?>
						
							<?php if( class_exists('Awetube_Pro') ) { ?>
							<div class="single-video-metas">
								<div class="video-view-table">
									<i class="fa fa-eye"></i>
									<span>
										<?php
										$awetube_fake_count = 0;
										$post_views_count = get_post_meta( get_the_ID(), 'post_views_count', true );
										$use_fake_count = carbon_get_theme_option( 'awetube_use_fake_count' );
										if( true === $use_fake_count ) {
											$awetube_fake_count = carbon_get_theme_option( 'awetube_fake_count' );
										}
										// Check if the custom field has a value.
										if ( ! empty( $post_views_count ) ) {
											echo esc_html(  number_format($post_views_count + $awetube_fake_count, 0, '.', '.') );
										} ?>
									</span>
								</div>
								<div class="meta-separator"></div>
								<div class="love-count">
									<?php echo awetube_love_it_link(); ?>
								</div>
							</div>
							<?php } ?>
						</div>

						<div class="video-author-info">
							<figure class="author-ava">
								<?php 
								$user_img = wp_get_attachment_image_src( get_user_meta( get_the_author_meta( 'ID' ),'_user_img', array( '60', '60' ), true, true ) );
								if(!empty($user_img)) { ?>
									<img src="<?php echo esc_url( $user_img[0] ); ?>" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" data-no-retina>
								<?php } else { ?>
									<?php echo get_avatar( get_the_author_meta('ID'), '60' ); ?>
								<?php } ?>
							</figure>
							<div class="author-wrap">
								<span class="vcard"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></a></span>
								<span class="date-post time"><?php the_time( get_option( 'date_format' ) ); ?></span>
							</div>
						</div>

						<div class="the-content">
							<div class="inner-content-video">
								<?php the_content(); ?>
								<div class="cat-wrapper">
									<?php esc_html_e( 'Tags : ', 'awetube' ); ?><?php the_terms( get_the_ID(), 'video-tags', '', ' ' ); ?>
								</div>
							</div>
						</div>

						<div class="related-video-wrapper">
							<div class="vidio-style2-wrap ele grid grid-cols-12 gap-12">
						<?php
						$orig_post = $post;
						$output_categories2 = array();
						$category_terms = get_terms('video-tags');
						if(!empty($category_terms)) {
							foreach($category_terms as $category) {
								$output_categories2[] = $category->term_id;
							}
						}
						$post_masonry1_args = array(
							'posts_per_page'      => 6,
							'ignore_sticky_posts' => true,
							'post_type'           => 'awetube-video',
							'post_status'    => 'publish',
							'post__not_in'        => array($post->ID),
							'tax_query'      => array(
								array(
									'taxonomy' => 'video-tags',
									'field'    => 'term_id',
									'terms'    => $output_categories2,
								),
							),
						);

						$post_masonry1_loop = new WP_Query( $post_masonry1_args );
						if ($post_masonry1_loop->have_posts()) : while($post_masonry1_loop->have_posts()) : $post_masonry1_loop->the_post();

						$video_url   = carbon_get_post_meta( get_the_ID(), 'video_url' );
						$video_embed = '';
						$video_file  = carbon_get_post_meta( get_the_ID(), 'video_file' );

						if( has_post_thumbnail() ) {
							$video_poster = get_the_post_thumbnail_url( get_the_ID() );
						} else {
							$video_poster = '';
						}

						?>
						<div class="vidio-style2 col-span-6 sm:col-span-12">
							<?php if(!empty($video_poster)) { ?>
							<div class="vidio-thumb">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url( $video_poster ); ?>" alt="<?php the_title_attribute(); ?>" data-no-retina>
									<div class="button-hover">
										<i class="fa fa-play play-button"></i>
									</div>
									<div class="overlay-vidio-style2"></div>
								</a>
							</div>
							<?php } ?>

							<div class="bottom-item <?php if(empty($video_poster)) { ?>no-thumb<?php } ?>">
								<div class="author-wrap">
									<figure class="author-ava">
										<?php 
										$user_img = wp_get_attachment_image_src( get_user_meta( get_the_author_meta( 'ID' ), '_user_img', 'awetube-author50-thumb' ) );
										if(!empty($user_img)) { ?>
											<img src="<?php echo esc_url( $user_img[0] ); ?>" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" data-no-retina />
										<?php } else { ?>
											<?php echo get_avatar( get_the_author_meta('ID'), '50' ); ?>
										<?php } ?>
									</figure>
								</div>
								<div class="item-wrap">
									<h4 class="video-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>
									<span class="vcard">
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
										</a>
									</span>
									<div class="views-video">
										<span>
											<p><?php echo esc_html( human_time_diff( $posted, current_time( 'U' ) ) . esc_html__( ' ago', 'awetube' ) ); ?></p>	
										</span>
									</div>
								</div>
								
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); endif; ?>
						</div>
						</div>

					</div>
				</div>
			</div>

			<div class="sidebar single-blog wrap col-span-4 sm:col-span-12">
				<div class="related-video-wrapper">
					<div class="vidio-style2-wrap ele grid grid-cols-12">
						<?php
						$orig_post = $post;
						$output_categories2 = array();
						$category_terms = get_terms('video-tags');
						if(!empty($category_terms)) {
							foreach($category_terms as $category) {
								$output_categories2[] = $category->term_id;
							}
						}
						$post_masonry1_args = array(
							'posts_per_page'      => 6,
							'ignore_sticky_posts' => true,
							'post_type'           => 'awetube-video',
							'post_status'    => 'publish',
							'post__not_in'        => array($post->ID),
							'tax_query'      => array(
								array(
									'taxonomy' => 'video-tags',
									'field'    => 'term_id',
									'terms'    => $output_categories2,
								),
							),
						);

						$post_masonry1_loop = new WP_Query( $post_masonry1_args );
						if ($post_masonry1_loop->have_posts()) : while($post_masonry1_loop->have_posts()) : $post_masonry1_loop->the_post();

						$video_url   = carbon_get_post_meta( get_the_ID(), 'video_url' );
						$video_embed = '';
						$video_file  = carbon_get_post_meta( get_the_ID(), 'video_file' );

						if( has_post_thumbnail() ) {
							$video_poster = get_the_post_thumbnail_url( get_the_ID() );
						} else {
							$video_poster = '';
						}

						?>
						<div class="vidio-style2 col-span-12 sm:col-span-12">
							<?php if(!empty($video_poster)) { ?>
							<div class="vidio-thumb">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo esc_url( $video_poster ); ?>" alt="<?php the_title_attribute(); ?>" data-no-retina>
									<div class="button-hover">
										<i class="fa fa-play play-button"></i>
									</div>
									<div class="overlay-vidio-style2"></div>
								</a>
							</div>
							<?php } ?>

							<div class="bottom-item">
								<div class="author-wrap">
									<figure class="author-ava">
										<?php 
										$user_img = wp_get_attachment_image_src( get_user_meta( get_the_author_meta( 'ID' ), '_user_img', 'awetube-author50-thumb' ) );
										if(!empty($user_img)) { ?>
											<img src="<?php echo esc_url( $user_img[0] ); ?>" alt="<?php echo esc_attr( get_the_author_meta( 'display_name' ) ); ?>" data-no-retina />
										<?php } else { ?>
											<?php echo get_avatar( get_the_author_meta('ID'), '50' ); ?>
										<?php } ?>
									</figure>
								</div>
								<div class="item-wrap">
									<h4 class="video-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h4>
									<span class="vcard">
										<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"> <?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
										</a>
									</span>
									<div class="views-video">
										<span>
											<p><?php echo esc_html( human_time_diff( $posted, current_time( 'U' ) ) . esc_html__( ' ago', 'awetube' ) ); ?></p>	
										</span>
									</div>
								</div>
							</div>

						</div>
						<?php endwhile; wp_reset_postdata(); endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<?php endwhile; wp_reset_postdata(); ?>
<?php get_footer();
