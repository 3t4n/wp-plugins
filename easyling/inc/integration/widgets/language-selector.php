<?php

/**
 *  Language selector widget class
 */
class easyling_language_selector extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID
			'easyling_language_selector',
			 
			// Widget name
			__('Easyling Language Selector', 'easyling'),
			
			// Options
			array(
				'description' => __( 'Display language selector', 'easyling' ),
			)
		);
	}

	public function widget( $args, $instance ) {
    ob_start();
		echo $args['before_widget'];
		echo do_shortcode('[easyling_language_selector]');
		echo $args['after_widget'];
		$html = ob_get_clean();

	  // Allow 3rd parties to adjust
		$html = apply_filters( 'easyling_language_selector_widget_html', $html, compact( 'args', 'instance' ) );

		echo $html;
	}
	 
	public function form( $instance ) {}
	 
	public function update( $new_instance, $old_instance ) {
		return $new_instance;
	}
}
