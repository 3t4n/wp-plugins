<?php 

class AS_gmap_widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct (
			'AS_gmap_image',
			'AS gMap Widget',
			array(
				'classname' => 'AS_gmap_image', 
				'description' => 'This is a simple widget which will show a nice map to your sidebar or any widget area', 
			)
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// outputs the content of the widget

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . $instance['title'] . $args['after_title'];
		}
		include(plugin_dir_path(__FILE__) . '/view/widget.php');
		echo $args['after_widget'];
		
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin

		$instance = wp_parse_args (
			(array)$instance,
			array(
				'title' => 'My Awesome Map',
				'width' => '300',
				'height' => '300',
				'zoom' => '15',
				'latitude' => '23.900642',
				'longitude'	=> '89.130103'		
			)
		);

		// including widget form markup
		include(plugin_dir_path(__FILE__) . '/view/admin.php');
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved

		$old_instance['title'] = strip_tags(stripcslashes($new_instance['title']));
		$old_instance['width'] = strip_tags(stripcslashes($new_instance['width']));
		$old_instance['height'] = strip_tags(stripcslashes($new_instance['height']));
		$old_instance['zoom'] = strip_tags(stripcslashes($new_instance['zoom']));
		$old_instance['latitude'] = strip_tags(stripcslashes($new_instance['latitude']));
		$old_instance['longitude'] = strip_tags(stripcslashes($new_instance['longitude']));

		return $old_instance;

	}
}

// register AS_gmap_widget
function register_AS_gmap_widget() {
    register_widget( 'AS_gmap_widget' );
}
add_action( 'widgets_init', 'register_AS_gmap_widget' );