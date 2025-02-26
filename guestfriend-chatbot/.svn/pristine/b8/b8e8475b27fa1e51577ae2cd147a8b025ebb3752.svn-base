<?php 
//
// guestfriend-chatbot widget
//
if ( ! class_exists( 'Guestfriend_Chat_Widget' ) ):
class Guestfriend_Chat_Widget extends WP_Widget {

	function __construct() {
		$widget_ops = array('description' => '&nbsp;' ); 
		parent::__construct( 'guestfriend-chatbot', $name = esc_html__( 'Guestfriend', 'guestfriend-chatbot' ),$widget_ops);
	}

	function widget($args, $instance){

		echo $args['before_widget'];
		
		echo do_shortcode('[ggf-chatbot]');
		
		echo $args['after_widget'];
	
	}

} // class

function ggfp_widget_function() {
	register_widget( 'Guestfriend_Chat_Widget' );
}

add_action( 'widgets_init', 'ggfp_widget_function' );

endif; //class_exists


