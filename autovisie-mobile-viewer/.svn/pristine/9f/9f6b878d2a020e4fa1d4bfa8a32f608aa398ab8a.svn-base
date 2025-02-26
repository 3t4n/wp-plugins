<?php

/**
 * Class Mobile_Viewer_Widget
 */

class  Mobile_Viewer_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
		    'classname' => 'mobile_viewer',
		    'description' => 'Creates a widget for direct viewing of a mobile page',
		);
		parent::__construct( 'mobile_viewer', 'Mobile Viewer', $widget_ops );
		
		global $mobile_viewer;
		$this->mobile_viewer = $mobile_viewer;
	}
	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( ) {
		if ( current_user_can('edit_post') == true ) {
			echo $this->mobile_viewer->block_iphone6(get_permalink());
			echo $this->mobile_viewer->block_samsung_s7(get_permalink());
		}
	}


	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}