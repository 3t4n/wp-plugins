<?php

/**
 * Plugin Name: Personal Widget
 * Description: Widget for showing personal image along with short bio.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Personal_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_personal', __( 'Personal', 'signals' ), array(
			'classname'   => 'widget_signals_personal',
			'description' => __( 'Widget for showing personal image along with short bio', 'signals' ),
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
		$image_url 		= $instance['image-url'];
		$short_bio 		= $instance['short-bio'];

		echo $args['before_widget'];

		// We are using \r\n for new lines
		echo '<div class="signals-personal">' . "\r\n";

		// If the image url is not empty, show it
		if ( ! empty( $image_url ) ) {
			echo '<img src="' . $image_url . '" />' . "\r\n";
		}

		// Short bio
		if ( ! empty( $short_bio ) ) {
			echo '<p>' . $short_bio . '</p>' . "\r\n";
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
		$instance['image-url'] 	= stripslashes( $new_instance['image-url'] );
		$instance['short-bio'] 	= stripslashes( $new_instance['short-bio'] );

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

		<div class="signals-personal-upload-element">
			<?php
				// If the image url is present, show the image. Else, show the default upload text.
				if ( ! empty( $instance['image-url'] ) ) :
			?>
				<span class="signals-preview-area"><center><img src="<?php echo esc_attr( $instance['image-url'] ); ?>" /></center></span>
			<?php else : ?>
				<span class="signals-preview-area"><?php _e( 'Image preview will show over here.', 'signals' ); ?></span>
			<?php endif; ?>

			<input class="signals-personal-image-url" id="<?php echo esc_attr( $this->get_field_id( 'image-url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image-url' ) ); ?>" type="hidden" value="<?php echo esc_attr( $instance['image-url'] ); ?>" />
			<button class="button" id="signals-personal-widget-btn"><?php _e( 'Select Image', 'signals' ); ?></button>

			<span class="signals-personal-upload-append">
				<?php if ( !empty( $instance['image-url'] ) ) : ?>
					<a href="#" id="signals-personal-remove-image"><?php _e( 'Remove', 'signals' ); ?></a>
				<?php endif; ?>
			</span>
		</div>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'short-bio' ) ); ?>"><?php _e( 'Bio', 'signals' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'short-bio' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'short-bio' ) ); ?>"><?php echo esc_textarea( $instance['short-bio'] ); ?></textarea>
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'image-url' 	=> '',
			'short-bio' 	=> ''
		);

		return $defaults;

	}

} // class Signals_Personal_Widget

// Registering the widget
register_widget( 'Signals_Personal_Widget' );