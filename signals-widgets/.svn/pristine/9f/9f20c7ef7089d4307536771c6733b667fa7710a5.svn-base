<?php

/**
 * Plugin Name: Social Widget
 * Description: Widget for showing Social Media profile links with icons.
 *
 * @link 			http://www.69signals.com
 * @since 			0.1
 * @package 		Signals_Framework
 * @subpackage 		Widgets
 */

class Signals_Social_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct( 'widget_signals_social', __( 'Social', 'signals' ), array(
			'classname'   => 'widget_signals_social',
			'description' => __( 'Widget for showing Social Media profile links with icons.', 'signals' ),
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
		$text 			= $instance['text'];
		$facebook 		= $instance['facebook'];
		$twitter 		= $instance['twitter'];
		$google 		= $instance['google'];
		$pinterest 		= $instance['pinterest'];
		$feedburner 	= $instance['feedburner'];
		$linkedin 		= $instance['linkedin'];
		$youtube 		= $instance['youtube'];
		$flickr 		= $instance['flickr'];
		$deviantart 	= $instance['deviantart'];
		$github 		= $instance['github'];
		$dribbble 		= $instance['dribbble'];
		$behance 		= $instance['behance'];

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// We are using \r\n for new lines
		echo '<div class="signals-social">' . "\r\n";

		/* Facebook */ 		if ( ! empty( $facebook ) ) 	: 	echo '<a href="' . esc_url( $facebook ) . '"><i class="fa fa-facebook"></i></a>' . "\r\n"; 		endif;
		/* Twitter */		if ( ! empty( $twitter ) ) 		: 	echo '<a href="' . esc_url( $twitter ) . '"><i class="fa fa-twitter"></i></a>' . "\r\n"; 		endif;
		/* Google+ */		if ( ! empty( $google ) ) 		: 	echo '<a href="' . esc_url( $google ) . '"><i class="fa fa-google-plus"></i></a>' . "\r\n"; 	endif;
		/* Pinterest */		if ( ! empty( $pinterest ) ) 	:	echo '<a href="' . esc_url( $pinterest ) . '"><i class="fa fa-pinterest"></i></a>' . "\r\n"; 	endif;
		/* FeedBurner */	if ( ! empty( $feedburner ) ) 	:	echo '<a href="' . esc_url( $feedburner ) . '"><i class="fa fa-rss"></i></a>' . "\r\n"; 		endif;
		/* LinkedIn */		if ( ! empty( $linkedin ) ) 	:	echo '<a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i></a>' . "\r\n"; 		endif;
		/* YouTube */		if ( ! empty( $youtube ) ) 		:	echo '<a href="' . esc_url( $youtube ) . '"><i class="fa fa-youtube"></i></a>' . "\r\n"; 		endif;
		/* Flickr */		if ( ! empty( $flickr ) ) 		:	echo '<a href="' . esc_url( $flickr ) . '"><i class="fa fa-flickr"></i></a>' . "\r\n"; 			endif;
		/* DeviantArt */	if ( ! empty( $deviantart ) ) 	:	echo '<a href="' . esc_url( $deviantart ) . '"><i class="fa fa-pinterest"></i></a>' . "\r\n"; 	endif;
		/* GitHub */		if ( ! empty( $github ) ) 		:	echo '<a href="' . esc_url( $github ) . '"><i class="fa fa-github"></i></a>' . "\r\n"; 			endif;
		/* Dribbble */		if ( ! empty( $dribbble ) ) 	:	echo '<a href="' . esc_url( $dribbble ) . '"><i class="fa fa-dribbble"></i></a>' . "\r\n"; 		endif;
		/* Behance */		if ( ! empty( $behance ) ) 		:	echo '<a href="' . esc_url( $behance ) . '"><i class="fa fa-behance"></i></a>' . "\r\n"; 		endif;

		echo '</div>' . "\r\n";

		// For the text below the social icons
		if ( ! empty( $text ) ) {
			echo '<p class="signals-social-text">' . $text . '</p>' . "\r\n";
		}

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
		$instance['text'] 		= strip_tags( $new_instance['text'] );
		$instance['facebook'] 	= stripslashes( $new_instance['facebook'] );
		$instance['twitter'] 	= stripslashes( $new_instance['twitter'] );
		$instance['google'] 	= stripslashes( $new_instance['google'] );
		$instance['pinterest'] 	= stripslashes( $new_instance['pinterest'] );
		$instance['feedburner'] = stripslashes( $new_instance['feedburner'] );
		$instance['linkedin'] 	= stripslashes( $new_instance['linkedin'] );
		$instance['flickr'] 	= stripslashes( $new_instance['flickr'] );
		$instance['youtube'] 	= stripslashes( $new_instance['youtube'] );
		$instance['deviantart'] = stripslashes( $new_instance['deviantart'] );
		$instance['github'] 	= stripslashes( $new_instance['github'] );
		$instance['dribbble'] 	= stripslashes( $new_instance['dribbble'] );
		$instance['behance'] 	= stripslashes( $new_instance['behance'] );

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

		/* Default options for the widget. */
		$defaults = self::defaults();

		// Displaying the fields over here
		foreach ( $defaults as $key => $value ) {
			echo '<p>' . "\r\n";
			echo '<label for="' . esc_attr( $this->get_field_id( $key ) ) . '">' . sprintf( _x( '%1$s', 'title', 'signals' ), ucfirst( $key ) ) . '</label>' . "\r\n";

			if ( 'text' == $key ) {
				echo '<textarea class="widefat" id="' . esc_attr( $this->get_field_id( $key ) ) . '" name="' . esc_attr( $this->get_field_name( $key ) ) . '">' . esc_textarea( $instance[$key] ) . '</textarea>' . "\r\n";
			} else {
				echo '<input class="widefat" id="' . esc_attr( $this->get_field_id( $key ) ) . '" name="' . esc_attr( $this->get_field_name( $key ) ) . '" type="text" value="' . esc_attr( $instance[$key] ) . '" />' . "\r\n";
			}

			echo '</p>' . "\r\n";
		}

	}



	/**
	 * Returns default options for the widget.
	 * @access private
	 */

	private static function defaults() {

		$defaults = array(
			'title' 		=> 'Social',
			'text'			=> '',
			'facebook' 		=> '',
			'twitter'		=> '',
			'google'		=> '',
			'pinterest'		=> '',
			'feedburner' 	=> '',
			'linkedin'		=> '',
			'youtube'		=> '',
			'flickr'		=> '',
			'deviantart'	=> '',
			'github'		=> '',
			'dribbble'		=> '',
			'behance'		=> ''
		);

		return $defaults;

	}

} // class Signals_Social_Widget

// Registering the widget
register_widget( 'Signals_Social_Widget' );