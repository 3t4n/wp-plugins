<?php 

/**
 * Adds Foo_Widget widget.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
class WDButton_widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wd_button_widget', // Base ID
			__( 'Button Widget'), // Name
			array( 'description' => __( 'Display Custom Button in widget area.' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$Title    	=   apply_filters( 'button_widget_title', $instance['Title'] );
		$buttonId	=   apply_filters( 'button_widget_shortcode', $instance['Shortcode'] ); 

		echo wp_kses_post($args['before_widget']);

		if(!empty($buttonId)){
			if ( !empty( $instance['Title'] ) ) {
				echo esc_attr($args['before_title'] . apply_filters( 'widget_title', $instance['Title'] ). $args['after_title']);
			}

			echo do_shortcode( '[WD_Button id='.$buttonId.']' );		
		}else{
			?>
			<p><?php esc_html_e('No Button Shortcode Found !!!!.') ?></p>
			<?php
		}

		echo wp_kses_post($args['after_widget']);
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'Title' ] ) ) {
			$Title = $instance[ 'Title' ];
		} else {
			$Title = "Button";
		}
		if ( isset( $instance[ 'Shortcode' ] ) ) {            

			$Shortcode = explode(",", $instance[ 'Shortcode' ]);            
		} else {
			$Shortcode = array("--Select--");
		}
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'Title' ) ); ?>"><?php esc_html_e( 'Title:','button' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'Title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'Title' ) ); ?>" type="text" value="<?php echo esc_attr( $Title ); ?>">
		</p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'Shortcode' ) ); ?>"><?php esc_html_e( 'Select','button' ); ?> <?php echo esc_html( __( '(Required)', 'button' ) ); ?></label>
		<?php 

		$ITPL_CPT_NAME="wd_button";
		$ITPL_ALL_POSTS=wp_count_posts($ITPL_CPT_NAME)->publish;
		global $all_button;
		$all_button=array('post_type'=>$ITPL_CPT_NAME, 'orderby'=>'ASC', 'posts_per_page'=>$ITPL_ALL_POSTS);
		$all_button=new wp_query($all_button);
		?>
		<select id="<?php echo esc_attr( $this->get_field_id( 'Shortcode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'Shortcode' ) ); ?>[]" style="width: 100%;" multiple="multiple">
			<option value="<?php echo esc_html( __( '--Select--', 'button' ) ); ?>" <?php if($Shortcode=='--Select--'){ echo esc_html( __( 'selected="selected"', 'button' ) );} ?>><?php echo esc_html( __( '--Select--', 'button' ) ); ?></option>
			<?php 
			if($all_button->have_posts())                                     
			{
				while($all_button->have_posts()): $all_button->the_post();        
					$Pid=get_the_ID();
					$P_title=get_the_title($Pid);
					?>
					<option value="<?php echo esc_attr( $Pid ); ?>" <?php if(in_array($Pid, $Shortcode))  echo esc_html( __( 'selected="selected"', 'button' ) ); ?>><?php if($P_title) echo esc_html($P_title); else echo esc_html( __( 'No Title', 'button' ) ); ?></option>
					<?php
				endwhile;
			}else  { 
				echo esc_html( '<option>Sorry! No Button Shortcode Found.</option>', 'button' ) ;
			}

			?>
		</select>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		if(!empty($new_instance['Shortcode'])){       

			$val= implode(',', array_values($new_instance['Shortcode']));       
			
			$instance['Title'] = ( ! empty( $new_instance['Title'] ) ) ? wp_strip_all_tags( $new_instance['Title'] ) : '';
			$instance['Shortcode'] = ( ! empty( $val ) ) ? wp_strip_all_tags( $val ) : 'Select Any Button';

		}
		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function register_WDBUTTON_WIDGET() {
	register_widget( 'WDButton_widget' );
}
add_action( 'widgets_init', 'register_WDBUTTON_WIDGET' );
?>