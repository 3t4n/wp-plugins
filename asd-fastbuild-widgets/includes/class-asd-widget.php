<?php
/**
 * Defines the ASD_Widget base class
 *
 * @package     WordPress
 * @subpackage  ASD_FastBuild_Widgets
 * Author:      Michael H Fahey
 * Author URI:  https://artisansitedesigns.com/staff/michael-h-fahey
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '' );
}


if ( ! defined( 'ASD_WIDGET' ) ) {
	define( 'ASD_WIDGET', 1 );

	/** ----------------------------------------------------------------------------
	 *   ASD Widget Base Class
	 * ---------------------------------------------------------------------------- */
	class ASD_Widget extends WP_Widget {

		/** ----------------------------------------------------------------------------
		 *   constructor
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $somevar -     passed from WP.
		 *   @param Array $name - passed from WP.
		 */

		/** ----------------------------------------------------------------------------
		 *   function widget_start( $args, $instance )
		 *    required by WP, prints stuff before widget output
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $args -     passed from WP.
		 *   @param Array $instance - passed from WP.
		 */
		protected function widget_start( $args, $instance ) {
			$title         = esc_attr( apply_filters( 'widget_title', $instance['title'] ) );
			$wrapperclass  = esc_attr( $instance['wrapperclass'] );
			$before_widget = $args['before_widget'];
			$before_title  = $args['before_title'];
			$after_title   = $args['after_title'];

			echo wp_kses_post( $before_widget );

			echo '<div class="' . sanitize_html_class( $wrapperclass ) . '">';

			if ( $title ) {
				echo wp_kses_post( $before_title . $title . '<br>' . $after_title );
			}
		}

		/** ----------------------------------------------------------------------------
		 *   function widget_end( $args, $instance )
		 *    required by WP, prints after before widget output
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $args -     passed from WP.
		 *   @param Array $instance - passed from WP.
		 */
		protected function widget_end( $args, $instance ) {
			$after_widget = $args['after_widget'];
			echo '</div>';
			echo wp_kses_post( $after_widget );
		}

		/** ----------------------------------------------------------------------------
		 *   function print_item( $optionname, $suffix )
		 *   shortcut function for printing widget instance get_option data
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $optionname -     option to print.
		 *   @param Array $suffix -  any additional string to append.
		 *   @param Array $hardreturn -  boolean, add a <br> tag, or not.
		 */
		protected function print_item( $optionname, $suffix, $hardreturn = 'false' ) {
			if ( get_option( $optionname )['text_string'] ) {
				echo esc_attr( get_option( $optionname )['text_string'] . $suffix );
				if ( 'true' === $hardreturn ) {
					echo '</br>';
				}
			}
		}

		/** ----------------------------------------------------------------------------
		 *   function form( $instance )
		 *   displays the widget in the Dashboard
		 *  ----------------------------------------------------------------------------
		 *
		 *   @param Array $instance -  called from WP.
		 */
		public function form( $instance ) {
			$title        = ! empty( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$wrapperclass = ! empty( $instance['wrapperclass'] ) ? esc_attr( $instance['wrapperclass'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">Title:</label>
				</br>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'wrapperclass' ) ); ?>">Wrapper Class:</label>
				</br>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'wrapperclass' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wrapperclass' ) ); ?>" value="<?php echo esc_attr( $wrapperclass ); ?>" />
			</p>
			<?php
		}

	}

}

