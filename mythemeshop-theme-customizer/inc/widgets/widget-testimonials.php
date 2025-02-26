<?php
/**
 * Testimonials Widget
 *
 */

/**
 * Class onepage_testimonials
 */
if ( !class_exists( 'onepage_testimonials' ) ) {

	class onepage_testimonials extends WP_Widget {

		/**
		 * onepage_testimonials constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_testimonials-widget',
				__( 'OnePage Lite - Testimonials Section', 'mythemeshop-theme-customizer' ),
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

			<?php if( !empty($instance['img1']) || !empty($instance['text1']) || !empty($instance['testifier1']) || !empty($instance['img2']) || !empty($instance['text2']) || !empty($instance['testifier2']) ) : ?>
				<section class="testimonials clearfix">
					<div class="container">
						<?php if ( !empty( $instance['title'] ) ) { ?>
							<h2 class="page-title"><?php echo $instance['title']; ?></h2>
						<?php } ?>
						<?php if ( !empty( $instance['subtext'] ) ) { ?>
							<h3 class="page-subtitle"><?php echo $instance['subtext']; ?></h3>
						<?php } ?>
						<div class="testimonials-container clearfix">
							<ul class="testimonial-list">
								<?php if( !empty($instance['img1']) || !empty($instance['text1']) || !empty($instance['testifier1']) ) : ?>
									<li>
										<?php if ( !empty( $instance['img1'] ) ) { ?>
											<div class="testimonial-img"><img src="<?php echo $instance['img1']; ?>" alt=""></div>
										<?php } ?>
										<?php if ( !empty( $instance['text1'] ) ) { ?>
											<p class="testimonial-text"><?php echo $instance['text1']; ?></p>
										<?php } ?>
										<?php if ( !empty( $instance['testifier1'] ) ) { ?>
											<div class="testifier"><?php echo $instance['testifier1']; ?></div>
										<?php } ?>
									</li>
								<?php endif; ?>

								<?php if( !empty($instance['img2']) || !empty($instance['text2']) || !empty($instance['testifier2']) ) : ?>
									<li>
										<?php if ( !empty( $instance['img2'] ) ) { ?>
											<div class="testimonial-img"><img src="<?php echo $instance['img2']; ?>" alt=""></div>
										<?php } ?>
										<?php if ( !empty( $instance['text2'] ) ) { ?>
											<p class="testimonial-text"><?php echo $instance['text2']; ?></p>
										<?php } ?>
										<?php if ( !empty( $instance['testifier2'] ) ) { ?>
											<div class="testifier"><?php echo $instance['testifier2']; ?></div>
										<?php } ?>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					</div>
				</section><!-- .features -->
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

			$instance                   = $old_instance;
			$instance['title']          = strip_tags( $new_instance['title'] );
			$instance['subtext']        = strip_tags( $new_instance['subtext'] );

			$instance['img1']   		= strip_tags( $new_instance['img1'] );
			$instance['text1']			= strip_tags( $new_instance['text1'] );
			$instance['testifier1']		= strip_tags( $new_instance['testifier1'] );

			$instance['img2']   		= strip_tags( $new_instance['img2'] );
			$instance['text2']			= strip_tags( $new_instance['text2'] );
			$instance['testifier2']		= strip_tags( $new_instance['testifier2'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Testimonials';
			$subtext = isset( $instance[ 'subtext' ] ) ? $instance[ 'subtext' ] : 'Lorem ipsum dolor sit amet consectetur adipiscing elit';

			$img1 = isset( $instance[ 'img1' ] ) ? $instance[ 'img1' ] : get_template_directory_uri() . "/images/testimonial1.jpg";
			$text1 = isset( $instance[ 'text1' ] ) ? $instance[ 'text1' ] : '"Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo"';
			$testifier1 = isset( $instance[ 'testifier1' ] ) ? $instance[ 'testifier1' ] : '- Ann Roberts';

			$img2 = isset( $instance[ 'img2' ] ) ? $instance[ 'img2' ] : get_template_directory_uri() . "/images/testimonial2.jpg";
			$text2 = isset( $instance[ 'text2' ] ) ? $instance[ 'text2' ] : '"Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo"';
			$testifier2 = isset( $instance[ 'testifier2' ] ) ? $instance[ 'testifier2' ] : '- Robert Snyder';
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

			<!-- Testimonial1 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'img1' ); ?>"><?php _e( 'Testimonial image URL 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img1' ); ?>"
				       id="<?php echo $this->get_field_id( 'img1' ); ?>"
				       value="<?php if ( ! empty( $img1 ) ): echo $img1; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'text1' ); ?>"><?php _e( 'Testimonial 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'text1' ); ?>" id="<?php echo $this->get_field_id( 'text1' ); ?>"><?php if ( ! empty( $text1 ) ): echo htmlspecialchars_decode( $text1 ); endif; ?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'testifier1' ); ?>"><?php _e( 'Testifier 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'testifier1' ); ?>"
				       id="<?php echo $this->get_field_id( 'testifier1' ); ?>"
				       value="<?php if ( ! empty( $testifier1 ) ): echo $testifier1; endif; ?>"
				       class="widefat">
			</p>

			<!-- Testimonial2 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'img2' ); ?>"><?php _e( 'Testimonial image URL 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img2' ); ?>"
				       id="<?php echo $this->get_field_id( 'img2' ); ?>"
				       value="<?php if ( ! empty( $img2 ) ): echo $img2; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'text2' ); ?>"><?php _e( 'Testimonial 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'text2' ); ?>" id="<?php echo $this->get_field_id( 'text2' ); ?>"><?php if ( ! empty( $text2 ) ): echo htmlspecialchars_decode( $text2 ); endif; ?></textarea>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'testifier2' ); ?>"><?php _e( 'Testifier 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'testifier2' ); ?>"
				       id="<?php echo $this->get_field_id( 'testifier2' ); ?>"
				       value="<?php if ( ! empty( $testifier2 ) ): echo $testifier2; endif; ?>"
				       class="widefat">
			</p>

			<?php

		}

	}
}