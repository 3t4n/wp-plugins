<?php
/**
 * Buttons Widget
 * Class onepage_buttons
 */
if ( !class_exists( 'onepage_buttons' ) ) {

	class onepage_buttons extends WP_Widget {

		/**
		 * onepage_buttons constructor.
		 */
		public function __construct() {
			parent::__construct(
				'onepage_buttons-widget',
				__( 'OnePage Lite - Buttons Section', 'mythemeshop-theme-customizer' ),
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

			<?php if( !empty($instance['button1text']) || !empty($instance['button2text']) ) : ?>
				<div class="container">
					<section class="homepage-buttons">
						<div class="buttons-container">
							<?php if( !empty($instance['button1text']) ) : ?>
								<?php if( !empty($instance['button1url']) ) { ?>
									<a href="<?php echo $instance['button1url']; ?>" class="homepage-button">
								<?php } else { ?>
									<div class="homepage-button">
								<?php } ?>
									<?php if( isset($instance['button1icon']) ) { ?><i class="fa fa-<?php echo $instance['button1icon']; ?>"></i><?php } ?><?php echo $instance['button1text']; ?>
								<?php if( !empty($instance['button1url']) ) { ?>
									</a>
								<?php } else { ?>
									</div>
								<?php } ?>
							<?php endif; ?>

							<?php if( !empty($instance['button2text']) ) : ?>
								<?php if( !empty($instance['button2url']) ) { ?>
									<a href="<?php echo $instance['button2url']; ?>" class="homepage-button">
								<?php } else { ?>
									<div class="homepage-button">
								<?php } ?>
									<?php if( isset($instance['button2icon']) ) { ?><i class="fa fa-<?php echo $instance['button2icon']; ?>"></i><?php } ?><?php echo $instance['button2text']; ?>
								<?php if( !empty($instance['button2url']) ) { ?>
									</a>
								<?php } else { ?>
									</div>
								<?php } ?>
							<?php endif; ?>
						</div>
					</section><!-- .homepage-buttons -->
				</div>
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
			$instance['button1text']    = strip_tags( $new_instance['button1text'] );
			$instance['button1url']     = strip_tags( $new_instance['button1url'] );
			$instance['button1icon']    = strip_tags( $new_instance['button1icon'] );

			$instance['button2text']    = strip_tags( $new_instance['button2text'] );
			$instance['button2url']     = strip_tags( $new_instance['button2url'] );
			$instance['button2icon']    = strip_tags( $new_instance['button2icon'] );

			return $instance;

		}

		/**
		 * Widget controls
		 *
		 * @param $instance
		 */
		function form( $instance ) {
			$button1text = isset( $instance[ 'button1text' ] ) ? $instance[ 'button1text' ] : 'View Services';
			$button1url = isset( $instance[ 'button1url' ] ) ? $instance[ 'button1url' ] : '#';
			$button1icon = isset( $instance[ 'button1icon' ] ) ? $instance[ 'button1icon' ] : 'th-large';

			$button2text = isset( $instance[ 'button2text' ] ) ? $instance[ 'button2text' ] : 'Request Quote';
			$button2url = isset( $instance[ 'button2url' ] ) ? $instance[ 'button2url' ] : '#';
			$button2icon = isset( $instance[ 'button2icon' ] ) ? $instance[ 'button2icon' ] : 'shopping-cart';
			?>

			<!-- Button1 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'button1text' ); ?>"><?php _e( 'Button1 Text', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'button1text' ); ?>"
				       id="<?php echo $this->get_field_id( 'button1text' ); ?>"
				       value="<?php if ( ! empty( $button1text ) ): echo $button1text; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'button1url' ); ?>"><?php _e( 'Button1 URL', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'button1url' ); ?>"
				       id="<?php echo $this->get_field_id( 'button1url' ); ?>"
				       value="<?php if ( ! empty( $button1url ) ): echo $button1url; endif; ?>"
				       class="widefat">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'button1icon' ); ?>"><?php _e( 'Button1 Icon:', 'mythemeshop-theme-customizer' ); ?></label>
				<?php
				$fa_icons = mts_get_icons();
				
				echo '<select class="onepage-lite-iconselect" id="'.$this->get_field_id( 'button1icon' ).'" name="'.$this->get_field_name( 'button1icon' ).'" style="width: 100%;">';
				echo '<option value="" '.selected($button1icon, '', false).'>'.__('No Icon', 'mythemeshop-theme-customizer' ).'</option>';
				foreach ( $fa_icons as $icon_category => $icons ) {
					echo '<optgroup label="'.$icon_category.'">';
					foreach ($icons as $icon) {
						echo '<option value="'.$icon.'" '.selected( $button1icon, $icon, false).'>'.ucwords(str_replace('-', ' ', $icon)).'</option>';
					}
					echo '</optgroup>';
				}

				echo '</select>';
				?>
			</p>

			<!-- Button2 -->
			<p>
				<label for="<?php echo $this->get_field_id( 'button2text' ); ?>"><?php _e( 'Button2 Text', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'button2text' ); ?>"
				       id="<?php echo $this->get_field_id( 'button2text' ); ?>"
				       value="<?php if ( ! empty( $button2text ) ): echo $button2text; endif; ?>"
				       class="widefat">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'button2url' ); ?>"><?php _e( 'Button2 URL', 'mythemeshop-theme-customizer' ); ?></label><br/>
				<input type="text" name="<?php echo $this->get_field_name( 'button2url' ); ?>"
				       id="<?php echo $this->get_field_id( 'button2url' ); ?>"
				       value="<?php if ( ! empty( $button2url ) ): echo $button2url; endif; ?>"
				       class="widefat">
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'button2icon' ); ?>"><?php _e( 'Button1 Icon:', 'mythemeshop-theme-customizer' ); ?></label>
				<?php
				$fa_icons = mts_get_icons();
				
				echo '<select class="onepage-lite-iconselect" id="'.$this->get_field_id( 'button2icon' ).'" name="'.$this->get_field_name( 'button2icon' ).'" style="width: 100%;">';
				echo '<option value="" '.selected($button2icon, '', false).'>'.__('No Icon', 'mythemeshop-theme-customizer' ).'</option>';
				foreach ( $fa_icons as $icon_category => $icons ) {
					echo '<optgroup label="'.$icon_category.'">';
					foreach ($icons as $icon) {
						echo '<option value="'.$icon.'" '.selected( $button2icon, $icon, false).'>'.ucwords(str_replace('-', ' ', $icon)).'</option>';
					}
					echo '</optgroup>';
				}

				echo '</select>';
				?>
			</p>

			<?php

		}

	}
}