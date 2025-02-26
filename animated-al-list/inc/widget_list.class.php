<?php
namespace animated_al;

defined('ABSPATH') or die("No script hack please!");

/**
 * Adds AnimatedAl_Widget_List widget.
 */
class AnimatedAl_Widget_List extends \WP_Widget {

  /**
  * Register widget with WordPress.
  */
  function __construct() {
    parent::__construct(
      'animated_al_list_widget', // Base ID
      __( 'Animated AL List', 'text_domain' ), // Name
      array( 'description' => __( 'Adding of Animated AL List', 'text_domain' ), ) // Args
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

    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
    echo do_shortcode("[animated_al_list id=".$instance['list_id']."]");
    echo $args['after_widget'];
  }

  /**
  * Back-end widget form.
  *
  * @see WP_Widget::form()
  *
  * @param array $instance Previously saved values from database.
  */
  public function form( $instance ) {
     	        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( '', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <?php
    $list = new Controller_MainInfo(new Model_MainInfo(new AnimatedAl_Db()));
    list($a, $all_projects, $c) = $list->execute(1001);

    $output = "<select class='widefat'  id='".$this->get_field_id( 'list_id' )."' name='".$this->get_field_name( 'list_id' )."'>";

      foreach ($all_projects as $cur_prj)
      {
      if (isset($instance['list_id'])&&($instance['list_id'] == $cur_prj->list_id))
        $output .= "<option value='".$cur_prj->list_id."' selected='selected'>".$cur_prj->list_name."</option>";
        else
        $output .= "<option value='".$cur_prj->list_id."'>".$cur_prj->list_name."</option>";
      }
    $output .= "</select>";  
    echo $output;
    ?>
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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['list_id'] = $new_instance['list_id'];//intval( $new_instance['slider_id'], 10 );

		return $instance;
	}

} // class AnimatedAl_Widget_List
?>