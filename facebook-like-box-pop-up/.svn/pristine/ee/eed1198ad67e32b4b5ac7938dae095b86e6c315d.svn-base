<?php
/**
 * Adds Foo_Widget widget.
 */
class FacebookLikeBoxPopUpWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'facebook_like_box_widget',
			__( 'Facebook like box widget', 'facebook_like_box_widget' ),
			array( 'description' => __( 'Add facebook like box fixed as widget. Requires to use [facebook_like_box_fixed] shortcode. Can set shortcode values.', 'facebook_like_box_widget' ), )
		);
	}

	/**
	 * Front-end display of widget.
	 * @see WP_Widget::widget()
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		if (strpos($instance["shortcode"],'[facebook_like_box_fixed') !== false) {
			echo do_shortcode($instance["shortcode"]);
		} else {
			echo __( 'Bad shortcode value', 'facebook_like_box_widget' );
		}		
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'facebook_like_box_widget' );
		$shortcode = ! empty( $instance['shortcode'] ) ? $instance['shortcode'] : "";
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		<label for="<?php echo $this->get_field_id( 'shortcode' ); ?>"><?php echo __( 'Shortcode: [facebook_like_box_fixed]', 'facebook_like_box_widget' ); ?></label> 
		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'shortcode' ); ?>" name="<?php echo $this->get_field_name( 'shortcode' ); ?>"><?php echo esc_attr( $shortcode ); ?></textarea>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['shortcode'] = ( ! empty( $new_instance['shortcode'] ) ) ? strip_tags( $new_instance['shortcode'] ) : '';
		return $instance;
	}

}
?>