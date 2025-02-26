<?php
/**
 * Plugin Name: African Flag Widget
 * Plugin URI: https://wordpress.org/extend/plugins/african-flag-widget/
 * Description: A simple image widget that displays the african flag for a category
 * Version: 1.1
 * Author: iandstanley
 * Author URI: http://graphicsfoundry.co.uk/
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: african-flag-widget
 * Domain Path: /languages/
 *
 * @package AfricanFlagWidget
 * @author Ian Stanley <ian@graphicsfoundry.co.uk>
 * @copyright Copyright (c) 2013, Graphics Foundry ltd.
 * @license GPL-2.0+
 */

class African_Flag_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'african_flag_widget', // Base ID
			'African_Flag_Widget', // Name
			array( 'description' => __( 'African Flag Widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {		
		 	// outputs the content of the widget
		
		if (!is_single()){
		
			$html_before = "<img id=\"africanflagimg\" src=\"" ;
      $imagefile = get_stylesheet_directory_uri() . "/flags/" . get_category(get_query_var('cat'))->slug . ".jpg" ;
      $html_after = "\" width=200  align=\"middle\"/  style=\"display:block; margin-left:auto; margin-right:auto; margin-bottom: 20px;\" >" ;
		
    	echo $html_before . $imagefile . $html_after ;  
   }
	}

	
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

add_action( 'widgets_init', function(){
     register_widget( 'African_Flag_Widget' );
});




?>
