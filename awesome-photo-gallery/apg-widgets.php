<?php
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

/**
 * Class APG_Random_Photo
 */
class APG_Random_Photo extends \WP_Widget {

	/**
	 * Construct the widget
	 */
	public function __construct() {
		parent::__construct( false, 'APG - ' . __( 'Random Photo', 'apg' ), array(
			'description' => __( 'Show one random photo on your website with this Awesome Photo Gallery widget.', 'apg' ),
		) );
	}

	/**
	 * Output the widget
	 *
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		echo $this->get_random_photo( $instance['album'] );

		echo $args['after_widget'];
	}

	/**
	 * Update the widget
	 *
	 * @param $new_instance
	 * @param $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['album'] = ( ! empty( $new_instance['album'] ) ) ? strip_tags( $new_instance['album'] ) : 'all';

		return $instance;
	}

	/**
	 * Build an admin form
	 *
	 * @param $instance
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Random photo', 'apg' );
		$album = ! empty( $instance['album'] ) ? $instance['album'] : 'all';

		$apg_albums = new WP_Query();
		$apg_albums->query('post_type=apg_photo_albums&orderby=post_title&order=ASC');
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'album' ); ?>"><?php _e( 'Album:' ); ?></label><br />
			<select id="<?php echo $this->get_field_id( 'album' ); ?>" name="<?php echo $this->get_field_name( 'album' ); ?>">
				<option value="all" <?php selected( $album, 'all' ); ?>><?php _e('Use all published albums', 'apg'); ?></option>
				<?php
				if( $apg_albums->have_posts() ):
					while ( $apg_albums->have_posts() ) :
						$apg_albums->the_post();
						?>
						<option value="<?php echo get_the_id(); ?>" <?php selected( $album, get_the_id() ); ?>><?php echo get_the_title(); ?></option>
						<?php
					endwhile;
				endif; ?>
			</select>
		</p>
	<?php
	}

	/**
	 * Get one random photo of the albums
	 *
	 * @param string $album
	 *
	 * @return null|string
	 */
	private function get_random_photo( $album = 'all' ) {
		$random_album = new WP_Query();

		if( is_numeric( $album ) ) {
			$random_album->query( 'post_type=apg_photo_albums&p=' . $album );
		}
		else {
			$random_album->query( 'post_type=apg_photo_albums&orderby=rand&order=ASC&limit=1' );
		}


		if( $random_album->have_posts() !== true ) {
			return __( 'No photo\'s found.', 'apg' );
		}
		$album     = $random_album->post;
		$viewer    = new \APG\Core\Viewer();
		$photos    = $viewer->get_photos( $album->ID );
		$photo_key = mt_rand(0, ( count( $photos ) - 1 ) );

		if( ! isset( $photos[ $photo_key ] ) ) {
			return __( 'Photo error', 'apg' );
		}
		$html = null;
		$html .= '<a href="' . get_permalink( $album->ID ) . '">';
		$html .= wp_get_attachment_image($photos[ $photo_key ]['ID'], apply_filters( 'apg_widget_photo_size', $this->apg_get_widget_thumb_size() ) );
		$html .= '</a>';

		return $html;
	}

	/**
	 * Get the widget thumbnail size
	 *
	 * @return array
	 */
	private function apg_get_widget_thumb_size() {
		return array(
			150,
			150
		);
	}
}

/**
 * Class APG_Newest_Album
 */
class APG_Newest_Album extends \WP_Widget {

	/**
	 * Construct the widget
	 */
	public function __construct() {
		parent::__construct( false, 'APG - ' . __( 'Newest album', 'apg' ), array(
			'description' => __( 'Show the newest album on your website with this Awesome Photo Gallery widget.', 'apg' ),
		) );
	}

	/**
	 * Output the widget
	 *
	 * @param $args
	 * @param $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		echo $this->get_album( $instance['album'], $instance['show_album_title'] );

		echo $args['after_widget'];
	}

	/**
	 * Update the widget
	 *
	 * @param $new_instance
	 * @param $old_instance
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                     = array();
		$instance['title']            = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['show_album_title'] = ( ! empty( $new_instance['show_album_title'] ) ) ? strip_tags( $new_instance['show_album_title'] ) : '';

		return $instance;
	}

	/**
	 * Build an admin form
	 *
	 * @param $instance
	 */
	public function form( $instance ) {
		$title       = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Newest photo album', 'apg' );
		$album_title = ! empty( $instance['show_album_title'] ) ? $instance['show_album_title'] : 'yes';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label><br />
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($album_title, 'yes'); ?> value="yes" id="<?php echo $this->get_field_id('show_album_title'); ?>" name="<?php echo $this->get_field_name('show_album_title'); ?>" />
			<label for="<?php echo $this->get_field_id('show_album_title'); ?>"><?php _e('Show album title', 'apg'); ?></label>
		</p>
	<?php
	}

	/**
	 * Get the latest album
	 *
	 * @param string $album
	 * @param string $title
	 *
	 * @return null|string
	 */
	private function get_album( $album = 'all', $title = 'yes' ) {
		$random_album = new WP_Query();
		$random_album->query( 'post_type=apg_photo_albums&orderby=date&order=DESC&limit=1' );

		if( $random_album->have_posts() !== true ) {
			return __( 'No album found.', 'apg' );
		}

		$album     = $random_album->post;
		$viewer    = new \APG\Core\Viewer();
		$photos    = $viewer->get_photos( $album->ID );

		if( ! isset( $photos[ 0 ] ) ) {
			return __( 'Photo error', 'apg' );
		}

		$html = null;
		$html .= '<a href="' . get_permalink( $album->ID ) . '">';
		if( $title === 'yes' ) {
			$html .= '<h3 class="apg-album-title">' . get_the_title( $album->ID ) . '</h3>';
		}
		$html .= wp_get_attachment_image($photos[ 0 ]['ID'], apply_filters( 'apg_widget_photo_size', $this->apg_get_widget_thumb_size() ) );
		$html .= '</a>';

		return $html;
	}

	/**
	 * Get the widget thumbnail size
	 *
	 * @return array
	 */
	private function apg_get_widget_thumb_size() {
		return array(
			150,
			150
		);
	}
}