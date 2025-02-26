<?php
/**
 * Plugin Name: Axon Radio Live
 * Plugin URI: http://www.axon-radio.com
 * Description: Axon Radio's live / commercial free music channel. We feature artwork from our listeners while streaming chill music for work and study, 24/7.
 * Version: 1.0
 * Author: Axon Radio
 * Author URI: http://www.axon-radio.com/contact
 */
 

// Create class
class Axon_radio_live extends WP_Widget {

	function __construct() {
		parent::__construct(
		'wpb_widget', 
		__('Axon Radio Live', 'wpb_widget_domain'), // Widget name will appear in UI
		array( 'description' => __( 'Axon Radio Live | 24/7 Music', 'wpb_widget_domain' ), )
		);// Widget description
	}//End function

	// Widget front-end
	public function widget( $args, $instance ) {
	
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
			echo "
			
			<style>
				.iframe-container {
				overflow: hidden;
				padding-top: 56.25%;
				position: relative;
			}
 
			.iframe-container iframe {
				border: 0;
				height: 100%;
				left: 0;
				position: absolute;
				top: 0;
				width: 100%;
			}
			</style>
	
			<div class='iframe-container'>
				<iframe src='https://www.youtube.com/embed/live_stream?channel=UCBoWJExvXPkEJI3tmWSAkwA&autoplay=1&mute=1?autoplay=1&mute=1?autoplay=1&mute=1' allow='accelerometer; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
			</div>
			<div style='font-size: 10px; color: #999999;'>
				<i>Unmute Audio For Chill Music 24/7</i>
			</div>
			";
			
			echo $args['after_widget'];
		}//End if
		
		// Widget Backend 
		public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}else{
			$title = __( 'Axon Radio Live', 'wpb_widget_domain' );
		}//End if
	}//End function
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
	}//End function
} // End class

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'Axon_radio_live' );
}//End function
add_action( 'widgets_init', 'wpb_load_widget' );

?>