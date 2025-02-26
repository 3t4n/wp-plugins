<?PHP

// Creating the widget 
class grabar_widget extends WP_Widget {
  
	function __construct() {
		parent::__construct(
		  
		// Base ID of your widget
		'grabar_widget', 
		  
		// Widget name will appear in UI
		__('GRAB AR Widget', 'grabar'), 
		  
		// Widget description
		array( 'description' => __( 'GRAB AR Button Widget', 'grabar' ), ) 
		);
	}
  
	// Creating widget front-end
	  
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		  
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		  
		//GET BUTTON CODE WITH SETTINGS AND OUTPUT
		echo grabar_build_button();
		//echo __( '<div id="GrabAR_Btn" data-img_width="150"></div>', 'grabar' );
		echo $args['after_widget'];
	}
	          
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'GRAB AR BUTTON', 'grabar' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	      
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
 
// Class wpb_widget ends here
} 
 
 
// Register and load the widget
function grabar_load_widget() {
    register_widget( 'grabar_widget' );
}
add_action( 'widgets_init', 'grabar_load_widget' );