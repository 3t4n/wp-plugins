<?php
/**
 * Services Widget
 * Class onepage_services
 */
if ( !class_exists( 'onepage_services' ) ) {

	class onepage_services extends WP_Widget {

		/**
		 * onepage_services constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_services-widget',
				__( 'OnePage Lite - Services Section', 'mythemeshop-theme-customizer' ),
				array(
					'customize_selective_refresh' => true,
				)
			);
			add_action( 'admin_enqueue_scripts', array( $this, 'widget_scripts' ) );
		}

		/**
		 * Enqueue Widget Scripts
		 *
		 * @param $hook
		 */
		function widget_scripts( $hook ) {
			if ( $hook != 'widgets.php' ) {
				return;
			}
			wp_enqueue_script( 'select2', MTS_CUSTOMIZER_URL . 'assets/js/select2.min.js', false, '4.0.3', true );
			wp_enqueue_script( 'icons_dropdown', MTS_CUSTOMIZER_URL . 'assets/js/icons_dropdown.js', false, '1.0', true );
        	wp_enqueue_style( 'select2', MTS_CUSTOMIZER_URL . 'assets/css/select2.min.css' );
        	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
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

			<section class="service-section">
				<div class="container">
					<div class="services clearfix">
						<?php if ( !empty( $instance['title'] ) ) { ?>
							<h2 class="page-title"><?php echo $instance['title']; ?></h2>
						<?php } ?>
						<?php if ( !empty( $instance['subtext'] ) ) { ?>
							<h3 class="page-subtitle"><?php echo $instance['subtext']; ?></h3>
						<?php } ?>
						<div class="service-container">
							<ul class="service-list">
								<li>
									<div class="service-icon"><i class="fa fa-<?php echo $instance['service_icon1']; ?>"></i></div>
									<?php if ( !empty( $instance['title1'] ) ) { ?>
										<h3 class="service-title"><?php echo $instance['title1']; ?></h3>
									<?php } ?>
									<?php if ( !empty( $instance['text1'] ) ) { ?>
										<p class="service-description"><?php echo $instance['text1']; ?></p>
									<?php } ?>
								</li>

								<li>
									<div class="service-icon"><i class="fa fa-<?php echo $instance['service_icon2']; ?>"></i></div>
									<?php if ( !empty( $instance['title2'] ) ) { ?>
										<h3 class="service-title"><?php echo $instance['title2']; ?></h3>
									<?php } ?>
									<?php if ( !empty( $instance['text2'] ) ) { ?>
										<p class="service-description"><?php echo $instance['text2']; ?></p>
									<?php } ?>
								</li>

								<li>
									<div class="service-icon"><i class="fa fa-<?php echo $instance['service_icon3']; ?>"></i></div>
									<?php if ( !empty( $instance['title3'] ) ) { ?>
										<h3 class="service-title"><?php echo $instance['title3']; ?></h3>
									<?php } ?>
									<?php if ( !empty( $instance['text3'] ) ) { ?>
										<p class="service-description"><?php echo $instance['text3']; ?></p>
									<?php } ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
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

			$instance                        = $old_instance;
			$instance['title']               = strip_tags( $new_instance['title'] );
			$instance['subtext']        	 = strip_tags( $new_instance['subtext'] );

			$instance['service_icon1']       = strip_tags( $new_instance['service_icon1'] );
			$instance['text1']               = strip_tags( $new_instance['text1'] );
			$instance['title1']              = strip_tags( $new_instance['title1'] );

			$instance['service_icon2']       = strip_tags( $new_instance['service_icon2'] );
			$instance['text2']               = strip_tags( $new_instance['text2'] );
			$instance['title2']              = strip_tags( $new_instance['title2'] );

			$instance['service_icon3']       = strip_tags( $new_instance['service_icon3'] );
			$instance['text3']               = strip_tags( $new_instance['text3'] );
			$instance['title3']              = strip_tags( $new_instance['title3'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Services';
			$subtext = isset( $instance[ 'subtext' ] ) ? $instance[ 'subtext' ] : 'Lorem ipsum dolor sit amet consectetur adipiscing elit';

			$service_icon1 = isset( $instance[ 'service_icon1' ] ) ? $instance[ 'service_icon1' ] : 'code';
			$title1 = isset( $instance[ 'title1' ] ) ? $instance[ 'title1' ] : 'Web Design';
			$text1 = isset( $instance[ 'text1' ] ) ? $instance[ 'text1' ] : 'Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo.';

			$service_icon2 = isset( $instance[ 'service_icon2' ] ) ? $instance[ 'service_icon2' ] : 'apple';
			$title2 = isset( $instance[ 'title2' ] ) ? $instance[ 'title2' ] : 'App Development';
			$text2 = isset( $instance[ 'text2' ] ) ? $instance[ 'text2' ] : 'Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo.';

			$service_icon3 = isset( $instance[ 'service_icon3' ] ) ? $instance[ 'service_icon3' ] : 'cloud';
			$title3 = isset( $instance[ 'title3' ] ) ? $instance[ 'title3' ] : 'Cloud Storage';
			$text3 = isset( $instance[ 'text3' ] ) ? $instance[ 'text3' ] : 'Sed vitae aliquet libero. Duis cursus, augue tempus venenatis fermentum, massa tellus posuere augue, sit amet consectetur ante arcu vitae metus. Suspendisse aliquet congue cursus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at nisl lorem, vel porttitor justo.';
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

			<!-- service1 -->
			<p>
			<label for="<?php echo $this->get_field_id( 'service_icon1' ); ?>"><?php _e( 'Icon 1:', 'mythemeshop-theme-customizer' ); ?></label>
				<?php
				$fa_icons = mts_get_icons();
				
				echo '<select class="onepage-lite-iconselect" id="'.$this->get_field_id( 'service_icon1' ).'" name="'.$this->get_field_name( 'service_icon1' ).'" style="width: 100%;">';
				echo '<option value="" '.selected($service_icon1, '', false).'>'.__('No Icon', 'mythemeshop-theme-customizer' ).'</option>';
				foreach ( $fa_icons as $icon_category => $icons ) {
					echo '<optgroup label="'.$icon_category.'">';
					foreach ($icons as $icon) {
						echo '<option value="'.$icon.'" '.selected( $service_icon1, $icon, false).'>'.ucwords(str_replace('-', ' ', $icon)).'</option>';
					}
					echo '</optgroup>';
				}

				echo '</select>';
				?>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e( 'Title 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'title1' ); ?>"
				       id="<?php echo $this->get_field_id( 'title1' ); ?>"
				       value="<?php if ( ! empty( $title1 ) ): echo $title1; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'text1' ); ?>"><?php _e( 'Text 1', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'text1' ); ?>" id="<?php echo $this->get_field_id( 'text1' ); ?>"><?php if ( ! empty( $text1 ) ): echo htmlspecialchars_decode( $text1 ); endif; ?></textarea>
			</p>

			<!-- service2 -->
			<p>
			<label for="<?php echo $this->get_field_id( 'service_icon2' ); ?>"><?php _e( 'Icon 2:', 'mythemeshop-theme-customizer' ); ?></label>
				<?php
				$fa_icons = mts_get_icons();
				
				echo '<select class="onepage-lite-iconselect" id="'.$this->get_field_id( 'service_icon2' ).'" name="'.$this->get_field_name( 'service_icon2' ).'" style="width: 100%;">';
				echo '<option value="" '.selected($service_icon2, '', false).'>'.__('No Icon', 'mythemeshop-theme-customizer' ).'</option>';
				foreach ( $fa_icons as $icon_category => $icons ) {
					echo '<optgroup label="'.$icon_category.'">';
					foreach ($icons as $icon) {
						echo '<option value="'.$icon.'" '.selected( $service_icon2, $icon, false).'>'.ucwords(str_replace('-', ' ', $icon)).'</option>';
					}
					echo '</optgroup>';
				}

				echo '</select>';
				?>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e( 'Title 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'title2' ); ?>"
				       id="<?php echo $this->get_field_id( 'title2' ); ?>"
				       value="<?php if ( ! empty( $title2 ) ): echo $title2; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'text2' ); ?>"><?php _e( 'Text 2', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'text2' ); ?>" id="<?php echo $this->get_field_id( 'text2' ); ?>"><?php if ( ! empty( $text2 ) ): echo htmlspecialchars_decode( $text2 ); endif; ?></textarea>
			</p>

			<!-- service3 -->
			<p>
			<label for="<?php echo $this->get_field_id( 'service_icon3' ); ?>"><?php _e( 'Icon 3:', 'mythemeshop-theme-customizer' ); ?></label>
				<?php
				$fa_icons = mts_get_icons();
				
				echo '<select class="onepage-lite-iconselect" id="'.$this->get_field_id( 'service_icon3' ).'" name="'.$this->get_field_name( 'service_icon3' ).'" style="width: 100%;">';
				echo '<option value="" '.selected($service_icon3, '', false).'>'.__('No Icon', 'mythemeshop-theme-customizer' ).'</option>';
				foreach ( $fa_icons as $icon_category => $icons ) {
					echo '<optgroup label="'.$icon_category.'">';
					foreach ($icons as $icon) {
						echo '<option value="'.$icon.'" '.selected( $service_icon3, $icon, false).'>'.ucwords(str_replace('-', ' ', $icon)).'</option>';
					}
					echo '</optgroup>';
				}

				echo '</select>';
				?>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e( 'Title 3', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'title3' ); ?>"
				       id="<?php echo $this->get_field_id( 'title3' ); ?>"
				       value="<?php if ( ! empty( $title3 ) ): echo $title3; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'text3' ); ?>"><?php _e( 'Text 3', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name( 'text3' ); ?>" id="<?php echo $this->get_field_id( 'text3' ); ?>"><?php if ( ! empty( $text3 ) ): echo htmlspecialchars_decode( $text3 ); endif; ?></textarea>
			</p>

			<?php

		}

	}
}