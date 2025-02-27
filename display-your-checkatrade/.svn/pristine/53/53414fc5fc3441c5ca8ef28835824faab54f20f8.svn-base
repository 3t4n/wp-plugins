<?php
/*
Plugin Name: Display your Checkatrade
Plugin URI:  http://www.barrywebber.co.uk/blog/display-your-checkatrade-ratings/
Description: Adds your checkatrade ratings to a sidebar widget
Version: 0.1.1
Author: Barry Webber
Author URI: http://www.barrywebber.co.uk
Text Domain: health-check
Domain Path: /languages
*/

/* ---------------- checkatrade widget ----------------- */

// Creating the widget 
class ecpt_cat_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'ecpt_cat_widget', 

// Widget name will appear in UI
__('CheckaTrade Widget', 'cat_widget_domain'), 

// Widget description
array( 'description' => __( 'To add a checkatrade panel in the sidebar', 'cat_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );


// This is where you run the code and display the output
echo $args['after_widget'];
echo '<div class="checkatrade-widget"><a href="https://www.checkatrade.com/' . $title . '" target="_blank"><img src="https://www.checkatrade.com/Reputation/APIChart/' . $title . '.png" alt="Checkatrade information for ' . $title . '"/></a></div>';
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'cat_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'checkatrade company name' ); ?></label> 
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
} // Class ecpt_cat_widget ends here

// Register and load the widget
function cat_load_widget() {
	register_widget( 'ecpt_cat_widget' );
}
add_action( 'widgets_init', 'cat_load_widget' );
 

?>
