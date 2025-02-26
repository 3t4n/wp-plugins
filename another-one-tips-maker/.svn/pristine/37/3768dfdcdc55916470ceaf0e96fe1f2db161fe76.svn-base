<?php 

class tips_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'tips_widget', // Base ID
			'Tips Widget', // Name
			array( 'description' => __( 'Tips Widget', 'text_domain' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$tip_box = apply_filters( 'widget_title', $instance['tip_box'] );

		echo $before_widget;
		//if ( ! empty( $title ) )
			//echo $before_title . $title . $after_title;
		if( $tip_box != '' ){
		echo do_shortcode('[show_tip id="'.$tip_box.'"]');
		}
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['tip_box'] = strip_tags( $new_instance['tip_box'] );

		return $instance;
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		$tip_box = $instance[ 'tip_box' ];
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'tip_box' ); ?>"><?php _e( 'Choose Tip Box:' ); ?></label> 
		<select class="widefat" name="<?php echo $this->get_field_name( 'tip_box' ); ?>" >
			<?php 
			$args = array(
				'showposts' => -1,
				'post_type' => 'tip'
			);
			$all_posts = get_posts( $args );
			echo '<option value="" >Select Tip';
			foreach( $all_posts as $single_post ){
				
				echo '<option '.( $tip_box == $single_post->ID ? ' selected ' : ''  ).' value="'.$single_post->ID.'" >'.$single_post->post_title;
			}
			?>
		</select>
		
		</p>
		
		<?php 
	}

} // class Foo_Widget
// register Foo_Widget widget
add_action( 'widgets_init', create_function( '', 'register_widget( "tips_widget" );' ) );

?>