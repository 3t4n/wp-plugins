<?php
/**
 * Clients Widget
 * Class onepage_clients
 */
if ( !class_exists( 'onepage_clients' ) ) {

	class onepage_clients extends WP_Widget {

		/**
		 * onepage_clients constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_clients-widget',
				__( 'OnePage Lite - Clients Section', 'mythemeshop-theme-customizer' ),
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

			<?php if( !empty($instance['img1']) || !empty($instance['img2']) || !empty($instance['img3']) || !empty($instance['img4']) || !empty($instance['img5']) ) : ?>
				<section class="clients-section">
					<div class="container">
						<div class="clients clearfix">
							<?php if ( !empty( $instance['title'] ) ) { ?>
								<h2 class="page-title"><?php echo $instance['title']; ?></h2>
							<?php } ?>
							<?php if ( !empty( $instance['subtext'] ) ) { ?>
								<h3 class="page-subtitle"><?php echo $instance['subtext']; ?></h3>
							<?php } ?>
							<div class="clients-container">
								<ul class="client-list">
									<?php if( !empty($instance['img1']) ) : ?>
										<li><div class="client-logo"><img src="<?php echo $instance['img1']; ?>" alt=""></div></li>
									<?php endif; ?>

									<?php if( !empty($instance['img2']) ) : ?>
										<li><div class="client-logo"><img src="<?php echo $instance['img2']; ?>" alt=""></div></li>
									<?php endif; ?>

									<?php if( !empty($instance['img3']) ) : ?>
										<li><div class="client-logo"><img src="<?php echo $instance['img3']; ?>" alt=""></div></li>
									<?php endif; ?>

									<?php if( !empty($instance['img4']) ) : ?>
										<li><div class="client-logo"><img src="<?php echo $instance['img4']; ?>" alt=""></div></li>
									<?php endif; ?>

									<?php if( !empty($instance['img5']) ) : ?>
										<li><div class="client-logo"><img src="<?php echo $instance['img5']; ?>" alt=""></div></li>
									<?php endif; ?>
								</ul>
							</div>
						</div><!-- .services -->
					</div>
				</section>
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

			$instance                  = $old_instance;
			$instance['title']         = strip_tags( $new_instance['title'] );
			$instance['subtext']       = strip_tags( $new_instance['subtext'] );

			$instance['img1']          = strip_tags( $new_instance['img1'] );
			$instance['img2']      	   = strip_tags( $new_instance['img2'] );
			$instance['img3']      	   = strip_tags( $new_instance['img3'] );
			$instance['img4']      	   = strip_tags( $new_instance['img4'] );
			$instance['img5']      	   = strip_tags( $new_instance['img5'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Clients';
			$subtext = isset( $instance[ 'subtext' ] ) ? $instance[ 'subtext' ] : 'Lorem ipsum dolor sit amet consectetur adipiscing elit';

			$img1 = isset( $instance[ 'img1' ] ) ? $instance[ 'img1' ] : get_template_directory_uri() . "/images/brand1.png";
			$img2 = isset( $instance[ 'img2' ] ) ? $instance[ 'img2' ] : get_template_directory_uri() . "/images/brand2.png";
			$img3 = isset( $instance[ 'img3' ] ) ? $instance[ 'img3' ] : get_template_directory_uri() . "/images/brand3.png";
			$img4 = isset( $instance[ 'img4' ] ) ? $instance[ 'img4' ] : get_template_directory_uri() . "/images/brand4.png";
			$img5 = isset( $instance[ 'img5' ] ) ? $instance[ 'img5' ] : get_template_directory_uri() . "/images/brand5.png";
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

			<!-- Images -->
			<p>
				<label for="<?php echo $this->get_field_id( 'img1' ); ?>"><?php _e( 'Image 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img1' ); ?>"
				       id="<?php echo $this->get_field_id( 'img1' ); ?>"
				       value="<?php if ( ! empty( $img1 ) ): echo $img1; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'img2' ); ?>"><?php _e( 'Image 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img2' ); ?>"
				       id="<?php echo $this->get_field_id( 'img2' ); ?>"
				       value="<?php if ( ! empty( $img2 ) ): echo $img2; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'img3' ); ?>"><?php _e( 'Image 3', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img3' ); ?>"
				       id="<?php echo $this->get_field_id( 'img3' ); ?>"
				       value="<?php if ( ! empty( $img3 ) ): echo $img3; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'img4' ); ?>"><?php _e( 'Image 4', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img4' ); ?>"
				       id="<?php echo $this->get_field_id( 'img4' ); ?>"
				       value="<?php if ( ! empty( $img4 ) ): echo $img4; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'img5' ); ?>"><?php _e( 'Image 5', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'img5' ); ?>"
				       id="<?php echo $this->get_field_id( 'img5' ); ?>"
				       value="<?php if ( ! empty( $img5 ) ): echo $img5; endif; ?>"
				       class="widefat">
			</p>

			<?php

		}

	}
}