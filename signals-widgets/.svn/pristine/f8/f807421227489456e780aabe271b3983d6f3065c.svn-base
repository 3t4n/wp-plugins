<?php

/**
 * Plugin Name: Subscribe Widget
 * Description: Widget for subscription form utilising the MailChimp API.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Subscribe_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_subscribe', __( 'Subscribe', 'signals' ), array(
			'classname'   => 'widget_signals_subscribe',
			'description' => __( 'Widget for subscription form utilising the MailChimp API', 'signals' ),
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
		$widget_text 	= $instance['widget-text'];
		$API_key 		= $instance['API-key'];
		$list_ID 		= $instance['list-ID'];

		// If the form is submitted, doing the processing over here.
		if ( ! empty( $instance['API-key'] ) && ! empty( $instance['list-ID'] ) ) {
			// Checking if the form is submitted or not.
			if ( isset( $_POST['signals-subscribe-email'] ) ) {
				// Do the processing over here.
				$email =  sanitize_text_field( $_POST['signals-subscribe-email'] );

				if ( '' === $email ) {
					$response['code'] 	= 'error';
					$response['text'] 	= __( 'Please provide your email address.', 'signals' );
				} else {
					$email = filter_var( strtolower( trim( $email ) ), FILTER_SANITIZE_EMAIL );

					if ( strpos( $email, '@' ) ) {
						require SIGNALS_WIDGETS_PATH . '/framework/admin/include/mailchimp.php';

						// Making an API call to MailChimp using WP_HTTP class.
						$connect = signals_mailchimp_call( 'lists/subscribe', array(
							'apikey'		=> $instance['API-key'],
							'id'            => $instance['list-ID'],
							'email'         => array( 'email' => $email ),
							'double_optin'  => false,
							'send_welcome'  => true
						) );

						// Showing message as per the response from the MailChimp server.
						if ( isset( $connect['code'] ) && 214 !== $connect['code'] ) {
							$response['code'] 	= 'error';
							$response['text'] 	= __( 'Oops! Something went wrong.', 'signals' );
						} elseif ( isset( $connect['code'] ) && 214 === $connect['code'] ) {
							$response['code'] 	= 'success';
							$response['text'] 	= __( 'You are already subscribed!', 'signals' );
						} else {
							$response['code'] 	= 'success';
							$response['text'] 	= __( 'Thank you! We\'ll be in touch!', 'signals' );
						}
					} else {
						$response['code'] 	= 'error';
						$response['text'] 	= __( 'Please provide a valid email address.', 'signals' );
					}
				}
			}
		} // Form processing

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines
		echo '<div class="signals-subscribe">' . "\r\n";

		// If the widget text is not empty, show it
		if ( ! empty( $widget_text ) ) {
			echo '<p>' . $widget_text . '</p>' . "\r\n";
		}

		// Now showing the form over here
		echo '<form role="form" method="post">' . "\r\n";

		// If the form is submitted and response field is set
		if ( isset( $response ) ) {
			echo '<div class="signals-subscribe-response ' . $response['code'] . '">' . $response['text'] . '</div>' . "\r\n";
		}

		echo '<div class="signals-form-group">' . "\r\n";
		echo '<input type="text" name="signals-subscribe-email" class="signals-form-control" placeholder="' . __( 'Enter your email address..', 'signals' ) . '" />' . "\r\n";
		echo '</div>' . "\r\n";

		echo '<input type="submit" value="' . __( 'Subscribe', 'signals' ) . '" class="signals-subscribe-button">' . "\r\n";
		echo '</form>' . "\r\n";

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
		$instance['widget-text'] 	= stripslashes( $new_instance['widget-text'] );
		$instance['API-key'] 		= stripslashes( $new_instance['API-key'] );
		$instance['list-ID'] 		= stripslashes( $new_instance['list-ID'] );

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
			<label for="<?php echo esc_attr( $this->get_field_id( 'widget-text' ) ); ?>"><?php _e( 'Text', 'signals' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'widget-text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'widget-text' ) ); ?>"><?php echo esc_attr( $instance['widget-text'] ); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'API-key' ) ); ?>"><?php _e( 'API Key', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'API-key' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'API-key' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['API-key'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'list-ID' ) ); ?>"><?php _e( 'List ID', 'signals' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'list-ID' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'list-ID' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['list-ID'] ); ?>" />
		</p>

	<?php

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 		=> 'Subscribe',
			'widget-text' 	=> 'We will reach your mailbox twice a month only. Don\'t worry, we hate spam too!',
			'API-key' 		=> '',
			'list-ID' 		=> ''
		);

		return $defaults;

	}

} // class Signals_Subscribe_Widget

// Registering the widget
register_widget( 'Signals_Subscribe_Widget' );