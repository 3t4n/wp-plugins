<?php

/**
 * Build the widget
 *
 * @link       https://autovisie.nl
 * @since      1.0.0
 *
 * @package    Mobile_Viewer_Widget
 * @subpackage Mobile_Viewer/includes
 */


class  Mobile_Viewer_Widget extends WP_Widget {

	/**
	 * Mobile_Viewer_Widget constructor.
	 */
	public function __construct() {
		$widget_ops = array(
		    'classname' => 'mobile_viewer',
		    'description' => 'Creates a widget for direct viewing of a mobile page',
		);
		parent::__construct( 'mobile_viewer', 'Mobile Viewer', $widget_ops );

	}
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		if ( current_user_can('edit_post') ) {

			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			}
			$mobile_viewer_public = new Mobile_Viewer_Public;
			echo $mobile_viewer_public->html_blocks( $_SERVER['REQUEST_URI'] );
			echo $args['after_widget'];

		}
	}


	/**
	 * Regster the widget
	 */
	static function register_widget() {

		if (
		    ( ( mobile_viewer_user_allowed() == true ) && ( mobile_viewer_open() == false ) )
		    || is_admin()
		)
		{
			register_widget( 'Mobile_Viewer_Widget' );
		}
	}
}