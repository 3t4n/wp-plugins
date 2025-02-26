<?php

/**
 * Plugin Name: Dribbble Widget
 * Description: Widget for Dribbble shots.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Dribbble_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_dribbble', __( 'Dribbble', 'signals' ), array(
			'classname'   => 'widget_signals_dribbble',
			'description' => __( 'Widget that displays your Dribbble shots.', 'signals' ),
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

		// Including the WordPress feed class.
		include_once( ABSPATH . WPINC . '/feed.php' );

		$instance 	= wp_parse_args( (array) $instance, self::defaults() );
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$name 		= $instance['name'];
		$shots 		= $instance['shots'];

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines.
		echo '<div class="signals-dribbble">' . "\r\n";
		echo '<div class="signals-carousel owl-carousel owl-theme">' . "\r\n";

		if( function_exists( 'fetch_feed' ) ) {
			$rss = fetch_feed( "http://dribbble.com/players/$name/shots.rss" );
			add_filter( 'wp_feed_cache_transient_lifetime', create_function( '$a', 'return 1800;' ) );

			if ( ! is_wp_error( $rss ) ) {
				$items = $rss->get_items( 0, $rss->get_item_quantity( $shots ) );

				foreach ( $items as $item ) {
					$title 			= $item->get_title();
					$link 			= $item->get_permalink();
					$date 			= $item->get_date( 'F d, Y' );
					$description 	= $item->get_description();

					preg_match( "/src=\"(http.*(jpg|jpeg|gif|png))/", $description, $image_url );
					$image 			= $image_url[1];

					echo '<div class="item"><a href="' . esc_url( $link ) . '"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $title ) . '"/></a></div>' . "\r\n";
				}
			}
		} // If (fetch_feed)

		echo '</div>' . "\r\n";
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

		$new_instance 		= wp_parse_args( (array) $new_instance, self::defaults() );
		$instance['title'] 	= strip_tags( $new_instance['title'] );
		$instance['name'] 	= strip_tags( $new_instance['name'] );
		$instance['shots'] 	= strip_tags( $new_instance['shots'] );

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>"><?php _e( 'Username', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'name' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'name' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['name'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'shots' ) ); ?>"><?php _e( 'Number of Shots', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'shots' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'shots' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['shots'] ); ?>" />
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 	=> __( 'Dribbble', 'signals' ),
			'name' 		=> '',
			'shots' 	=> '8'
		);

		return $defaults;

	}

} // class Signals_Dribbble_Widget

// Registering the widget
register_widget( 'Signals_Dribbble_Widget' );