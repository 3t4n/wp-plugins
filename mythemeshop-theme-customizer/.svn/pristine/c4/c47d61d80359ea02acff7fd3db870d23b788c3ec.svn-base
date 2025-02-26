<?php
/**
 * Blog Widget
 * Class onepage_blog
 */
if ( !class_exists( 'onepage_blog' ) ) {

	class onepage_blog extends WP_Widget {

		/**
		 * onepage_blog constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_blog-widget',
				__( 'OnePage Lite - Blog Section', 'mythemeshop-theme-customizer' ),
				array(
					'customize_selective_refresh' => true,
				)
			);
		}

		/**
		 * Display Widget
		 *
		 * @param $args
		 * @param $instance
		 */
		function widget( $args, $instance ) {

			extract( $args );

			echo $before_widget;

			?>

			<?php
				$posts = new WP_Query( array(
					'post_type' => 'post',
					'orderby' => 'date',
					'posts_per_page' => isset( $instance['num_post'] ) ? $instance['num_post'] : 4,
					'post_status' => 'publish'
				) );
			?>

			<section class="blog-section">
				<div class="container">
					<?php if ( !empty( $instance['title'] ) ) { ?>
						<h2 class="page-title"><?php echo $instance['title']; ?></h2>
					<?php } ?>
					<?php if ( !empty( $instance['subtext'] ) ) { ?>
						<h3 class="page-subtitle"><?php echo $instance['subtext']; ?></h3>
					<?php } ?>
					<div class="blog-container clearfix">
						<?php if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('g post latestPost'); ?>>
								<div class="post-img">
									<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>">
										<?php if ( has_post_thumbnail() ) { ?>
											<?php the_post_thumbnail( 'onepage-lite-featured', array( 'title' => '' ) ); ?>
										<?php } else { ?>
											<img class="wp-post-image" src="<?php echo get_template_directory_uri() . '/images/nothumb-onepage-lite-featured.png'; ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"/>
										<?php } ?>
									</a>
								</div>
								<div class="post-data">
									<div class="post-data-container">
										<div class="post-title">
											<a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
										</div>
										<div class="post-info">
											<span class="theauthor"><span><?php _e('By', 'mythemeshop-theme-customizer'); ?> <?php the_author_posts_link(); ?></span></span>
											<span class="thetime updated"><?php _e('Posted on', 'mythemeshop-theme-customizer'); ?> <?php the_time( get_option( 'date_format' ) ); ?></span>
											<span class="thecategory"><?php mts_the_category(' '); ?></span>
											<span class="thecomment"><a rel="nofollow" href="<?php comments_link(); ?>"><?php echo comments_number();?></a></span>
										</div> <!--.post-info-->
										<div class="front-view-content">
											<?php echo mts_excerpt(16); ?>
										</div>
										<?php mts_readmore(); ?>
									</div>
								</div>
							</article>
						<?php endwhile; endif;
						wp_reset_postdata(); ?>
						<?php if ( !empty( $instance['button_url'] ) ) { ?>
							<div class="view-more">
								<a href="<?php echo $instance['button_url']; ?>" class="homepage-button"><?php _e('View More', 'mythemeshop-theme-customizer'); ?></a>
							</div>
						<?php } ?>
					</div><!--End blog-container-->
				</div><!--End container-->
			</section>

			<?php

			echo $after_widget;

		}

		/**
		 * Update Widget
		 *
		 * @param $new_instance
		 * @param $old_instance
		 *
		 * @return mixed
		 */
		function update( $new_instance, $old_instance ) {

			$instance                  = $old_instance;
			$instance['title']         = strip_tags( $new_instance['title'] );
			$instance['subtext']       = strip_tags( $new_instance['subtext'] );

			$instance['num_post']      = strip_tags( $new_instance['num_post'] );
			$instance['button_url']    = strip_tags( $new_instance['button_url'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Blog';
			$subtext = isset( $instance[ 'subtext' ] ) ? $instance[ 'subtext' ] : 'Lorem ipsum dolor sit amet consectetur';
			$num_post = isset( $instance[ 'num_post' ] ) ? $instance[ 'num_post' ] : '4';
			$button_url = isset( $instance[ 'button_url' ] ) ? $instance[ 'button_url' ] : get_home_url() . "/blog/";
			?>

			<!-- Main Title and Text -->
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'title' ); ?>"
				       id="<?php echo $this->get_field_id( 'title' ); ?>"
				       value="<?php if ( ! empty( $title ) ): echo $title; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtext' ); ?>"><?php _e( 'Sub Text', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'subtext' ); ?>"
				       id="<?php echo $this->get_field_id( 'subtext' ); ?>"
				       value="<?php if ( ! empty( $subtext ) ): echo $subtext; endif; ?>"
				       class="widefat">
			</p>

			<!-- Blog Posts -->
			<p>
				<label for="<?php echo $this->get_field_id( 'num_post' ); ?>"><?php _e( 'Number of Posts', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="number" name="<?php echo $this->get_field_name( 'num_post' ); ?>"
				       id="<?php echo $this->get_field_id( 'num_post' ); ?>"
				       value="<?php if ( ! empty( $num_post ) ): echo $num_post; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e( 'Button URL', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'button_url' ); ?>"
				       id="<?php echo $this->get_field_id( 'button_url' ); ?>"
				       value="<?php if ( ! empty( $button_url ) ): echo $button_url; endif; ?>"
				       class="widefat">
			</p>

			<?php

		}

	}
}