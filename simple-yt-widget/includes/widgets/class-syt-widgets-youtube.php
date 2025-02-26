<?php

/**
 * The file that defines the Widget Class
 *
 * @link       https://www.youtube.com/channel/UCtfzwnao4xpOg8d9vnZSSpw
 * @since      1.0.0
 *
 * @package    Syt_Widgets
 * @subpackage Syt_Widgets/includes
 */

/**
 * Adds YouTube widget.
 * 
 * @since      1.0.0
 * @package    Syt_Widgets
 * @subpackage Syt_Widgets/includes
 * @author     WP Plugin Boss <dev.bcdestiller@gmail.com>
 */

 // Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Syt_Widget_Youtube extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'syt_widget_generate', // Base ID
			esc_html__( 'Simple YT Widget', 'syt_domain' ), // Name
			array( 'description' => esc_html__( 'Display a customizable and simple YouTube Channel Widget for your website.', 'syt_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		//Widget Content Output
		echo '<div class="g-ytsubscribe" 
			style="display: block;"
			data-channelid="'.$instance['channel-id'].'" 
			data-layout="full"
			data-count="default"></div>';

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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'YouTube Channel', 'syt_domain' );
		
		$channel_id = ! empty( $instance['channel-id'] ) ? $instance['channel-id'] : esc_html__( 'UCtfzwnao4xpOg8d9vnZSSpw', 'syt_domain' );
		
		?>

		<!-- Title -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'syt_domain' ); ?>
			</label> 
			<input
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!-- Channel ID -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'channel-id' ) ); ?>">
				<?php esc_attr_e( 'Channel ID:', 'syt_domain' ); ?>
			</label> 
			<input
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'channel-id' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'channel-id' ) ); ?>" 
				type="text" 
				value="<?php echo esc_attr( $channel_id ); ?>">
			<a href="https://support.google.com/youtube/answer/3250431" target="_blank">Where is my Channel ID?</a>
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
		
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		
		$instance['channel-id'] = ( ! empty( $new_instance['channel-id'] ) ) ? sanitize_text_field( $new_instance['channel-id'] ) : '';
		
		return $instance;
	}

}