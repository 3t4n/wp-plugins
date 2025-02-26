<?php

/**
 * Plugin Name: Instagram Widget
 * Description: Widget for your Instagram photos.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Instagram_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_instagram', __( 'Instagram', 'signals' ), array(
			'classname'   => 'widget_signals_instagram',
			'description' => __( 'Widget that displays your latest Instagram photos.', 'signals' ),
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
		$title 		= empty( $instance['title'] ) ? '' : apply_filters('widget_title', $instance['title']);
		$username 	= empty( $instance['username'] ) ? '' : $instance['username'];
		$limit 		= empty( $instance['number'] ) ? 9 : $instance['number'];
		$size 		= empty( $instance['size'] ) ? 'thumbnail' : $instance['size'];
		$target 	= empty( $instance['target'] ) ? '_self' : $instance['target'];
		$link 		= empty( $instance['link'] ) ? '' : $instance['link'];

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines.
		echo '<div class="signals-instagram">' . "\r\n";

		// Checking if the username is not empty
		if ( '' != $username ) {
			$media = $this->instagram_feed( $username, $limit );

			// If the scraping process contained errors
			if ( is_wp_error( $media ) ) {
			   echo $media->get_error_message();
			} else {
				// We will display images only
				$media = array_filter( $media, array( $this, 'filter_images' ) );
				echo '<div class="signals-carousel owl-carousel owl-theme">' . "\r\n";

				foreach ( $media as $item ) {
					echo '<div class="item"><a href="' . esc_url( $item['link'] ) . '" target="' . esc_attr( $target ) . '"><img src="' . esc_url( $item[$size]['url'] ) . '"  alt="' . esc_attr( $item['description'] ) . '" title="' . esc_attr( $item['description'] ) . '"/></a></div>' . "\r\n";
				}

				echo '</div>' . "\r\n";
			}
		}

		if ( '' != $link ) {
			echo '<p><a href="//instagram.com/' . trim( $username ) . '" rel="me" target="' . esc_attr( $target ) . '">' . $link . '</a></p>' . "\r\n";
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

		$new_instance 			= wp_parse_args( (array) $new_instance, self::defaults() );
		$instance['title'] 		= strip_tags( $new_instance['title'] );
		$instance['username'] 	= trim( strip_tags( $new_instance['username'] ) );
		$instance['number'] 	= ! absint( $new_instance['number'] ) ? '9' : $new_instance['number'];
		$instance['size'] 		= ( ( $new_instance['size'] == 'thumbnail' || $new_instance['size'] == 'large' ) ? $new_instance['size'] : 'thumbnail' );
		$instance['target'] 	= ( ( $new_instance['target'] == '_self' || $new_instance['target'] == '_blank' ) ? $new_instance['target'] : '_self' );
		$instance['link'] 		= strip_tags( $new_instance['link'] );

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php _e( 'Username', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['username'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of Photos', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php _e( 'Photo Size', 'signals' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>">
				<option value="<?php esc_attr_e( 'thumbnail', 'signals' ); ?>"<?php selected( __( 'thumbnail', 'signals' ), $instance['size'] ); ?>><?php esc_attr_e( 'Thumbnail', 'signals' ); ?></option>
				<option value="<?php esc_attr_e( 'large', 'signals' ); ?>"<?php selected( __( 'large', 'signals' ), $instance['size'] ); ?>><?php esc_attr_e( 'Large', 'signals' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>"><?php _e( 'Link Target', 'signals' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target' ) ); ?>">
				<option value="<?php esc_attr_e( '_self', 'signals' ); ?>"<?php selected( __( '_self', 'signals' ), $instance['target'] ); ?>><?php esc_attr_e( 'Current Window', 'signals' ); ?></option>
				<option value="<?php esc_attr_e( '_blank', 'signals' ); ?>"<?php selected( __( '_blank', 'signals' ), $instance['target'] ); ?>><?php esc_attr_e( 'New Window', 'signals' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>"><?php _e( 'Link Text', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['link'] ); ?>" />
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 	=> __( 'Instagram', 'signals' ),
			'username' 	=> '',
			'number' 	=> '9',
			'size' 		=> 'thumbnail',
			'target' 	=> '_self',
			'link' 		=> ''
		);

		return $defaults;

	}



	/**
	 * For scraping the instagram feed
	 * @link https://gist.github.com/cosmocatalano/4544576
	 */

	function instagram_feed( $username, $slice = '9' ) {

		$username = strtolower( $username );

		if ( false === ( $instagram = get_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ) ) ) ) {
			$remote = wp_remote_get( 'http://instagram.com/' . trim( $username ) );

			if ( is_wp_error( $remote ) ) {
	  			return new WP_Error( 'site_down', __( 'Unable to communicate with Instagram.', 'signals' ) );
			}

  			if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
  				return new WP_Error( 'invalid_response', __( 'Instagram did not return a 200.', 'signals' ) );
  			}

			$shards 		= explode( 'window._sharedData = ', $remote['body'] );
			$insta_json 	= explode( ';</script>', $shards[1] );
			$insta_array 	= json_decode( $insta_json[0], true );

			if ( ! $insta_array ) {
	  			return new WP_Error( 'bad_json', __( 'Instagram has returned invalid data.', 'signals' ) );
			}

			$images 	= $insta_array['entry_data']['UserProfile'][0]['userMedia'];
			$instagram 	= array();

			foreach ( $images as $image ) {
				if ( $image['user']['username'] == $username ) {

					$image['link']                          = preg_replace( "/^http:/i", "", $image['link'] );
					$image['images']['thumbnail']           = preg_replace( "/^http:/i", "", $image['images']['thumbnail'] );
					$image['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $image['images']['standard_resolution'] );

					$instagram[] = array(
						'description'   => $image['caption']['text'],
						'link'          => $image['link'],
						'time'          => $image['created_time'],
						'comments'      => $image['comments']['count'],
						'likes'         => $image['likes']['count'],
						'thumbnail'     => $image['images']['thumbnail'],
						'large'         => $image['images']['standard_resolution'],
						'type'          => $image['type']
					);
				}
			}

			$instagram = base64_encode( serialize( $instagram ) );
			set_transient( 'instagram-media-' . sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
		}

		$instagram = unserialize( base64_decode( $instagram ) );
		return array_slice( $instagram, 0, $slice );

	}



	/* We are only filtering images. */
	function filter_images( $media_item ) {

		if ( 'image' == $media_item['type'] ) {
			return true;
		}

		return false;
	}

}

// Registering the widget
register_widget( 'Signals_Instagram_Widget' );