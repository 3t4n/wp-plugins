<?php

include_once plugin_dir_path( __FILE__ ) . 'class-ampsy-widget-model.php';

class Ampsy_Widget extends WP_Widget {
	function __construct() {
		parent::__construct( 'ampsy_widget', 'Ampsy widget', '' );
	}

	public function widget( $args, $instance ) {
		$router = new Ampsy_Router();

		if ( isset( $instance['ampsy_widget_id'] ) ) {
			$instance['url'] = $router->widget_url( $instance['ampsy_widget_id'] );
			$widget = new Ampsy_Widget_Model( $instance );
			include( plugin_dir_path( __FILE__ ) . '../templates/widgets/show.php' );
		}
	}

	public function form( $instance ) {
		$options = new Ampsy_Options;
		$key = $options->key();
		$router = new Ampsy_Router();
		$widgets_url = $router->widgets_json_url( $key );
		$settings_url = $router->settings_url();

		$ampsy_widget_id = ! empty( $instance['ampsy_widget_id'] ) ? $instance['ampsy_widget_id'] : '';
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$width = ! empty( $instance['width'] ) ? $instance['width'] : '';
		$height = ! empty( $instance['height'] ) ? $instance['height'] : '';
		$class = ! empty( $instance['class'] ) ? $instance['class'] : 'ampsy-iframe';
		include( plugin_dir_path( __FILE__ ) . '../templates/widgets/admin-widget-form.php' );
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['ampsy_widget_id'] = $new_instance['ampsy_widget_id'];
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['class'] = ( ! empty( $new_instance['class'] ) ) ? strip_tags( $new_instance['class'] ) : '';
		$instance['width'] = ( ! empty( $new_instance['width'] ) ) ? strip_tags( $new_instance['width'] ) : '';
		$instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

		return $instance;
	}
}

?>
