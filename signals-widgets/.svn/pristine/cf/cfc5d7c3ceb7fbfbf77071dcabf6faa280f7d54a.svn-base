<?php

/**
 * Plugin Name: Ads Widget
 * Description: Widget for showing ads in 125 x 125 px format.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Ads_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_ads', __( 'Ads', 'signals' ), array(
			'classname'   => 'widget_signals_ads',
			'description' => __( 'Widget for showing ads in 125 x 125 px format', 'signals' ),
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
		$ads_image 	= $instance['ads-image'];
		$ads_link 	= $instance['ads-link'];
		$ads_target = $instance['ads-target'];
		$ads_text 	= $instance['ads-text'];

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines
		echo '<div class="signals-ads">' . "\r\n";

		// Showing AD
		if ( ! empty( $ads_image ) && ! empty( $ads_link ) && ! empty( $ads_target ) ) {
			echo '<a href="' . $ads_link . '" target="' . $ads_target . '">' . "\r\n";
			echo '<img src="' . $ads_image . '" />' . "\r\n";
			echo '</a>' . "\r\n";
		}

		// If the description text is provided
		if ( ! empty( $ads_text ) ) {
			echo '<p><span>' . $ads_text . '</span></p>' . "\r\n";
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
		$instance['ads-image'] 	= stripslashes( $new_instance['ads-image'] );
		$instance['ads-link'] 	= stripslashes( $new_instance['ads-link'] );
		$instance['ads-target'] = stripslashes( $new_instance['ads-target'] );
		$instance['ads-text'] 	= stripslashes( $new_instance['ads-text'] );

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

		<div class="signals-ads-upload-element">
			<?php if ( ! empty( $instance['ads-image'] ) ) : // If the image url is present, show the image. Else, show the default upload text ?>
				<span class="signals-preview-area"><center><img src="<?php echo esc_attr( $instance['ads-image'] ); ?>" /></center></span>
			<?php else : ?>
				<span class="signals-preview-area"><?php _e( 'AD preview will show over here.', 'signals' ); ?></span>
			<?php endif; ?>

			<input class="signals-ads-image-url" id="<?php echo esc_attr( $this->get_field_id( 'ads-image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads-image' ) ); ?>" type="hidden" value="<?php echo esc_attr( $instance['ads-image'] ); ?>" />
			<button class="button" id="signals-ads-widget-btn"><?php _e( 'Select Image', 'signals' ); ?></button>

			<span class="signals-ads-upload-append">
				<?php if ( ! empty( $instance['ads-image'] ) ) : ?>
					<a href="#" id="signals-ads-remove-image"><?php _e( 'Remove', 'signals' ); ?></a>
				<?php endif; ?>
			</span>
		</div>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ads-link' ) ); ?>"><?php _e( 'Link', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ads-link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads-link' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['ads-link'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ads-target' ) ); ?>"><?php _e( 'Target', 'signals' ); ?></label>
			<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ads-target' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads-target' ) ); ?>">
				<option value="<?php esc_attr_e( '_self', 'signals' ); ?>"<?php selected( __( '_self', 'signals' ), $instance['ads-target'] ); ?>><?php esc_attr_e( 'Self', 'signals' ); ?></option>
				<option value="<?php esc_attr_e( '_blank', 'signals' ); ?>"<?php selected( __( '_blank', 'signals' ), $instance['ads-target'] ); ?>><?php esc_attr_e( 'New Window', 'signals' ); ?></option>
				<option value="<?php esc_attr_e( '_parent', 'signals' ); ?>"<?php selected( __( '_parent', 'signals' ), $instance['ads-target'] ); ?>><?php esc_attr_e( 'Parent', 'signals' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'ads-text' ) ); ?>"><?php _e( 'Text', 'signals' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ads-text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ads-text' ) ); ?>"><?php echo esc_textarea( $instance['ads-text'] ); ?></textarea>
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 		=> 'Sponsored',
			'ads-image' 	=> '',
			'ads-link' 		=> '',
			'ads-target' 	=> '_blank',
			'ads-text' 		=> ''
		);

		return $defaults;

	}

} // class Signals_Ads_Widget

// Registering the widget
register_widget( 'Signals_Ads_Widget' );