<?php

/**
 * Plugin Name: Video Widget
 * Description: Widget for YouTube / Vimeo video.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Video_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_video', __( 'Video', 'signals' ), array(
			'classname'   => 'widget_signals_video',
			'description' => __( 'Widget that displays your YouTube or Vimeo video.', 'signals' ),
		) );

	}



	/**
	 * Output the HTML for this widget.
	 *
	 * @access public
	 *
	 * @param array $args     An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 * @return void Echoes its output.
	 */

	public function widget( $args, $instance ) {

		$instance 		= wp_parse_args( (array) $instance, self::defaults() );
		$title 			= apply_filters( 'widget_title', $instance['title'] );
		$embed 			= $instance['embed'];
		$description 	= $instance['description'];

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines.
		echo '<div class="signals-video">' . "\r\n";

		// If the embed code is not empty.
		if ( !empty( $embed ) ) {
			echo $embed . "\r\n";
		}

		// If the description text is not empty, show it.
		if ( !empty( $description ) ) {
			echo '<p>' . $description . '</p>' . "\r\n";
		}

		echo '</div>' . "\r\n";
		echo $args['after_widget'];

	}



	/**
	 * Deal with the settings when they are saved by the admin.
	 * Here is where any validation should happen.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $instance     Original widget instance.
	 * @return array Updated widget instance.
	 */

	function update( $new_instance, $instance ) {

		$new_instance 				= wp_parse_args( (array) $new_instance, self::defaults() );
		$instance['title'] 			= strip_tags( $new_instance['title'] );
		$instance['description'] 	= stripslashes( $new_instance['description'] );
		$instance['embed'] 			= stripslashes( $new_instance['embed'] );

		return $instance;

	}



	/**
	 * Display the form for this widget on the Widgets page of the Admin area.
	 *
	 * @param array $instance
	 * @return void
	 */

	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, self::defaults() );

	?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>"><?php _e( 'Embed Code', 'signals' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'embed' ) ); ?>"><?php echo esc_textarea( $instance['embed'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php _e( 'Description', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['description'] ); ?>" />
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 		=> 'Video',
			'embed' 		=> '',
			'description' 	=> 'Here is the latest video. Have fun!'
		);

		return $defaults;

	}

} // class Signals_Video_Widget

// Registering the widget
register_widget( 'Signals_Video_Widget' );