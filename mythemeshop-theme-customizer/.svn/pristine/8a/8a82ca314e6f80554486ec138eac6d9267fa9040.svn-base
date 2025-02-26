<?php
/**
 * Counter Widget
 * Class onepage_counter
 */
if ( !class_exists( 'onepage_counter' ) ) {

	class onepage_counter extends WP_Widget {

		/**
		 * onepage_counter constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_counter-widget',
				__( 'OnePage Lite - Counter Section', 'mythemeshop-theme-customizer' ),
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

			<section class="counter">
				<div class="container">
					<?php
						// $counter_items = 5;
						$i=1;
					?>
					<?php if ( !empty( $instance['title'] ) ) { ?>
						<h2 class="page-title"><?php echo $instance['title']; ?></h2>
					<?php } ?>
					<?php if ( !empty( $instance['subtext'] ) ) { ?>
						<h3 class="page-subtitle"><?php echo $instance['subtext']; ?></h3>
					<?php } ?>
					<?php if( !empty($instance['count1']) || !empty($instance['count2']) || !empty($instance['count3']) || !empty($instance['count4']) || !empty($instance['count5']) ) { ?>
						<div class="counter-items clearfix">

						<?php
							for( $i=1; $i<=5; $i++ ) { ?>
								<div class="counter-item">
									<span class="count count-<?php echo $i ?>"><?php echo $instance['count'.$i]; ?></span>
									<span class="sub"><?php echo $instance['subtext'.$i]; ?></span>
								</div>
						<?php } ?>

							
						</div>
					<?php } ?>
				</div>
			</section><!-- .counter -->

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

			$instance['count1']        = strip_tags( $new_instance['count1'] );
			$instance['subtext1']      = strip_tags( $new_instance['subtext1'] );

			$instance['count2']        = strip_tags( $new_instance['count2'] );
			$instance['subtext2']      = strip_tags( $new_instance['subtext2'] );

			$instance['count3']        = strip_tags( $new_instance['count3'] );
			$instance['subtext3']      = strip_tags( $new_instance['subtext3'] );

			$instance['count4']        = strip_tags( $new_instance['count4'] );
			$instance['subtext4']      = strip_tags( $new_instance['subtext4'] );

			$instance['count5']        = strip_tags( $new_instance['count5'] );
			$instance['subtext5']      = strip_tags( $new_instance['subtext5'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Counter';
			$subtext = isset( $instance[ 'subtext' ] ) ? $instance[ 'subtext' ] : 'Lorem ipsum dolor sit amet consectetur';

			$count1 = isset( $instance[ 'count1' ] ) ? $instance[ 'count1' ] : '950';
			$subtext1 = isset( $instance[ 'subtext1' ] ) ? $instance[ 'subtext1' ] : 'Happy Clients';

			$count2 = isset( $instance[ 'count2' ] ) ? $instance[ 'count2' ] : '1,320';
			$subtext2 = isset( $instance[ 'subtext2' ] ) ? $instance[ 'subtext2' ] : 'Projects Completed';

			$count3 = isset( $instance[ 'count3' ] ) ? $instance[ 'count3' ] : '732';
			$subtext3 = isset( $instance[ 'subtext3' ] ) ? $instance[ 'subtext3' ] : 'Support Queries';

			$count4 = isset( $instance[ 'count4' ] ) ? $instance[ 'count4' ] : '98';
			$subtext4 = isset( $instance[ 'subtext4' ] ) ? $instance[ 'subtext4' ] : 'Free Stuff';

			$count5 = isset( $instance[ 'count5' ] ) ? $instance[ 'count5' ] : '4,231';
			$subtext5 = isset( $instance[ 'subtext5' ] ) ? $instance[ 'subtext5' ] : 'Registered Members';
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

			<!-- Count1 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'count1' ); ?>"><?php _e( 'Count 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'count1' ); ?>"
				       id="<?php echo $this->get_field_id( 'count1' ); ?>"
				       value="<?php if ( ! empty( $count1 ) ): echo $count1; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtext1' ); ?>"><?php _e( 'SubText 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'subtext1' ); ?>"
				       id="<?php echo $this->get_field_id( 'subtext1' ); ?>"
				       value="<?php if ( ! empty( $subtext1 ) ): echo $subtext1; endif; ?>"
				       class="widefat">
			</p>

			<!-- Count2 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'count2' ); ?>"><?php _e( 'Count 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'count2' ); ?>"
				       id="<?php echo $this->get_field_id( 'count2' ); ?>"
				       value="<?php if ( ! empty( $count2 ) ): echo $count2; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtext2' ); ?>"><?php _e( 'SubText 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'subtext2' ); ?>"
				       id="<?php echo $this->get_field_id( 'subtext2' ); ?>"
				       value="<?php if ( ! empty( $subtext2 ) ): echo $subtext2; endif; ?>"
				       class="widefat">
			</p>

			<!-- Count3 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'count3' ); ?>"><?php _e( 'Count 3', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'count3' ); ?>"
				       id="<?php echo $this->get_field_id( 'count3' ); ?>"
				       value="<?php if ( ! empty( $count3 ) ): echo $count3; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtext3' ); ?>"><?php _e( 'SubText 3', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'subtext3' ); ?>"
				       id="<?php echo $this->get_field_id( 'subtext3' ); ?>"
				       value="<?php if ( ! empty( $subtext3 ) ): echo $subtext3; endif; ?>"
				       class="widefat">
			</p>

			<!-- Count4 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'count4' ); ?>"><?php _e( 'Count 4', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'count4' ); ?>"
				       id="<?php echo $this->get_field_id( 'count4' ); ?>"
				       value="<?php if ( ! empty( $count4 ) ): echo $count4; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtext4' ); ?>"><?php _e( 'SubText 4', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'subtext4' ); ?>"
				       id="<?php echo $this->get_field_id( 'subtext4' ); ?>"
				       value="<?php if ( ! empty( $subtext4 ) ): echo $subtext4; endif; ?>"
				       class="widefat">
			</p>

			<!-- Count5 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'count5' ); ?>"><?php _e( 'Count 5', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'count5' ); ?>"
				       id="<?php echo $this->get_field_id( 'count5' ); ?>"
				       value="<?php if ( ! empty( $count5 ) ): echo $count5; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'subtext5' ); ?>"><?php _e( 'SubText 5', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'subtext5' ); ?>"
				       id="<?php echo $this->get_field_id( 'subtext5' ); ?>"
				       value="<?php if ( ! empty( $subtext5 ) ): echo $subtext5; endif; ?>"
				       class="widefat">
			</p>

			<?php

		}

	}
}