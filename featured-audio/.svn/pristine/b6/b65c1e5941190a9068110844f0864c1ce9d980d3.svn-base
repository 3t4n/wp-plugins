<?php
/**
 * Widget that displays a playlist the most recent audio files uploaded.
 *
 * Based on a similar widget in the Sheet Music Library plugin: https://wordpress.org/plugins/sheet-music-library/
*/

// Register 'Recent Featured Audio Playlist' widget.
function featured_audio_recent_widget_init() {
	return register_widget( 'Featured_Audio_Recent_Playlist_Widget' );
}
add_action( 'widgets_init', 'featured_audio_recent_widget_init' );

class Featured_Audio_Recent_Playlist_Widget extends WP_Widget {
	/* Constructor */
	function __construct() {
		parent::__construct( 'Featured_Audio_Recent_Playlist_Widget', __( 'Recent Featured Audio Playlist', 'featured-audio' ), array(
			'description' => __( 'A playlist of your latest featured audio.', 'featured-audio' ),
			'customize_selective_refresh' => false,
		) );
	}

	/* This is the Widget */
	function widget( $args, $instance ) {
		global $post;

		extract( $args );

		if ( ! array_key_exists( 'title', $instance ) ) {
			$instance['title'] = '';
		}
		if ( ! array_key_exists( 'number', $instance ) ) {
			$instance['number'] = 10;
		}
		if ( ! array_key_exists( 'page', $instance ) ) {
			$instance['page'] = 1;
		}

		$playlist = get_the_recent_featured_audio_playlist( $instance['number'], $instance['page'] );
		if ( '' === $playlist ) {
			return;
		}

		// Widget options
		$title = apply_filters( 'widget_title', $instance['title'] ); // Title

		// Output
		echo $before_widget;

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		echo $playlist;

		echo $after_widget;
	}

	/* Widget control update */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );
		$instance['page'] = absint( $new_instance['page'] );
		return $instance;
	}

	/* Widget settings */
	function form( $instance ) {
	    if ( $instance ) {
			$title = $instance['title'];
			$number = $instance['number'];
			$page = $instance['page'];
	    } else {
			$title = '';
			$number = 10;
			$page = 1;
	    }

		$total_pieces = wp_count_posts( 'any' )->publish;

		// The widget form. ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __( 'Title:', 'featured-audio' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php echo __( 'Number of Posts:', 'featured-audio' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" value="<?php echo $number; ?>" min="0" max="<?php echo $total_pieces; ?>" class="widefat" />
		</p>
		<p style="font-style: italic;"><?php _e( 'Note that fewer posts than this will be included in the playlist if some posts do not have audio.', 'featured-audio' ); ?></p>
		<p>
			<label for="<?php echo $this->get_field_id( 'page' ); ?>"><?php echo __( 'Page of Posts:', 'featured-audio' ); ?></label>
			<input id="<?php echo $this->get_field_id( 'page' ); ?>" name="<?php echo $this->get_field_name( 'page' ); ?>" type="number" value="<?php echo $page; ?>" min="0" max="<?php echo $total_pieces; ?>" class="widefat" />
			<?php /** translators: %d is the number of posts on this site */ ?>
			<p style="font-style: italic;"><?php printf( __( 'You have %d total posts.', 'featured-audio' ), $total_pieces ); ?></p>
		</p>
	<?php
	}
}


/**
 * Get the featured audio playlist, if there are multiple posts with featured audio in the selected query.
 *
 * @return string Markup of the recent featured audio playlist, or empty string.
 */
function get_the_recent_featured_audio_playlist( $number = 10, $page = 1 ) {
	$posts = get_posts( array(
		'post_type' => 'any',
		'numberposts' => absint( $number ),
		'offset' => ( absint( $page ) - 1 ) * absint( $number ),
	) );
	$ids = array();
	foreach( $posts as $post ) {
		$audio_id =  get_featured_audio_attachment_id( $post->ID );

		if ( $audio_id ) {
			$ids[] = $audio_id;
		}
	}

	if ( empty( $ids ) ) {
		return '';
	} else {
		return wp_playlist_shortcode( array( 'type' => 'audio', 'ids' => $ids ) );
	}
}
