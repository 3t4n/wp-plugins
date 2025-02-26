<?php
/**
 * Featured Widget
 *
 */

/**
 * Class onepage_featured
 */
if ( !class_exists( 'onepage_featured' ) ) {

	class onepage_featured extends WP_Widget {

		/**
		 * onepage_featured constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_featured-widget',
				__( 'OnePage Lite - Featured Section', 'mythemeshop-theme-customizer' ),
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

			<?php if( !empty($instance['featuredimg']) || !empty($instance['featuredtitle']) || !empty($instance['featuredtext']) ) : ?>
				<section class="featured">
					<?php if( !empty($instance['featuredimg']) ) : ?>
						<img src="<?php echo $instance['featuredimg']; ?>" alt="">
					<?php endif; ?>
					<div class="featured-overlay"></div>
					<?php if( !empty($instance['featuredtitle']) || !empty($instance['featuredtext']) ) : ?>
						<div class="featured-caption">
							<?php if( !empty($instance['featuredtitle']) ) : ?>
								<h2><?php echo $instance['featuredtitle']; ?></h2>
							<?php endif; ?>
							<?php if( !empty($instance['featuredtext']) ) : ?>
								<p><?php echo $instance['featuredtext']; ?></p>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</section><!-- .featured -->
			<?php endif; ?>

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

			$instance                       = $old_instance;
			$instance['featuredimg']   		= strip_tags( $new_instance['featuredimg'] );
			$instance['featuredtitle']		= strip_tags( $new_instance['featuredtitle'] );
			$instance['featuredtext']		= strip_tags( $new_instance['featuredtext'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$featuredimg = isset( $instance[ 'featuredimg' ] ) ? $instance[ 'featuredimg' ] : get_template_directory_uri() . "/images/featured.jpg";
			$featuredtitle = isset( $instance[ 'featuredtitle' ] ) ? $instance[ 'featuredtitle' ] : 'Creative OnePage Theme';
			$featuredtext = isset( $instance[ 'featuredtext' ] ) ? $instance[ 'featuredtext' ] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet tincidunt orci. Curabitur hendrerit lacinia vestibulum. Pellentesque lacus dui, rutrum quis nunc sit amet, laoreet convallis leo.';
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'featuredimg' ); ?>"><?php _e( 'Featured image URL', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'featuredimg' ); ?>"
				       id="<?php echo $this->get_field_id( 'featuredimg' ); ?>"
				       value="<?php if ( ! empty( $featuredimg ) ): echo $featuredimg; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'featuredtitle' ); ?>"><?php _e( 'Featured Title', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'featuredtitle' ); ?>"
				       id="<?php echo $this->get_field_id( 'featuredtitle' ); ?>"
				       value="<?php if ( ! empty( $featuredtitle ) ): echo $featuredtitle; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'featuredtext' ); ?>"><?php _e( 'Featured Text', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'featuredtext' ); ?>" id="<?php echo $this->get_field_id( 'featuredtext' ); ?>"><?php if ( ! empty( $featuredtext ) ): echo htmlspecialchars_decode( $featuredtext ); endif; ?></textarea>
			</p>

			<?php

		}

	}
}