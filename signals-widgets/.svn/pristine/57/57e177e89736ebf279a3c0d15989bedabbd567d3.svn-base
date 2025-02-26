<?php

/**
 * Plugin Name: Flickr Widget
 * Description: Widget for Flickr photos.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Flickr_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_flickr', __( 'Flickr', 'signals' ), array(
			'classname'   => 'widget_signals_flickr',
			'description' => __( 'Widget that displays your Flickr photos.', 'signals' ),
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

		$instance 	= wp_parse_args( (array) $instance, self::defaults() );
		$title 		= apply_filters( 'widget_title', $instance['title'] );
		$id 		= $instance['id'];
		$count 		= $instance['count'];

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines.
		echo '<div class="signals-flickr">' . "\r\n";
		echo '<div class="signals-carousel owl-carousel owl-theme">' . "\r\n";

		// If the user's set their flickr id, grab their latest pics
		if ( '' != $id ) {
			$images 	= array();
			$regx 		= "/<img(.+)\/>/";

			// Set up the flickr feed URL and retrieve it
			$rss_url 	= 'http://api.flickr.com/services/feeds/photos_public.gne?id=' . $id . '&lang=en-us&format=rss_200';
			$feed 		= simplexml_load_file( $rss_url );

			// Store images from the feed in an array
			foreach( $feed->channel->item as $item ) {
				preg_match( $regx, $item->description, $matches );

				$images[] = array(
					'link'  => $item->link,
					'thumb' => $matches[ 0 ]
				);
			}

			// Loop through the images and display the number they wish to show
			$image_count = 0;

			if ( '' == $count ) {
				$count = 5;
			}

			foreach( $images as $img ) {
				if ( $image_count < $count ) {
					$img_tag = str_replace( "_m", "_b", $img[ 'thumb' ] );
					echo '<div class="item"><a href="' . $img[ 'link' ] . '">' . $img_tag . '</a></div>' . "\r\n";
					$image_count++;
				}
			}

		} // endif ($id)

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
		$instance['id'] 	= strip_tags( $new_instance['id'] );
		$instance['count'] 	= strip_tags( $new_instance['count'] );

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'embed' ) ); ?>"><?php _e( 'Flickr ID', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'id' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'id' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['id'] ); ?>" />
			<small><?php _e( 'Don\'t know your ID? Head on over to <a href="http://idgettr.com">idgettr</a> to find it.', 'signals' ); ?></small>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php _e( 'Photos to Display', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['count'] ); ?>" />
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 	=> 'Photos',
			'id' 		=> '',
			'count' 	=> '8'
		);

		return $defaults;

	}

} // class Signals_Flickr_Widget

// Registering the widget
register_widget( 'Signals_Flickr_Widget' );