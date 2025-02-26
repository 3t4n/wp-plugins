<?php
/**
 * Adds Foo_Widget widget.
 */
class Aptmi_Widget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'aptmi_widget', // Base ID
      __( 'APTMI Widget', 'text_domain' ), // Name
      array( 'description' => __( 'Widget Pencarian Maskapai', 'text_domain' ), ) // Args
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
    echo $this->renderIframe($instance);
    echo $args['after_widget'];
  }
  public function renderIframe($instance){
      $extra=isset($instance['promocode'])&& strlen($instance['promocode'])?'&promocode='.$instance['promocode']:'';
      $render= '<iframe data-url="'.$instance['b2c_url'].'" height="'.$instance['height'].'px" id="aptmIframe" src="'.$instance['b2c_url'].'/widgetWP/?'.$extra.'"></iframe>';
      return $render;
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['b2c_url'] ) ? $instance['b2c_url'] : __( '', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'b2c_url' ); ?>"><?php _e( 'URL B2C:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'b2c_url' ); ?>" name="<?php echo $this->get_field_name( 'b2c_url' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>

    <p>
    <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height(px):' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" type="text" value="<?php echo esc_attr( $instance['height'] ); ?>" />
    </p>


    <p>
    <label for="<?php echo $this->get_field_id( 'promocode' ); ?>"><?php _e( 'Promo Code:' ); ?></label> 
    <input class="widefat" id="<?php echo $this->get_field_id( 'promocode' ); ?>" 
    name="<?php echo $this->get_field_name( 'promocode' ); ?>" 
    type="text" value="<?php echo esc_attr( $instance['promocode'] ); ?>" />
    </p>
    <p>Anda juga dapat menggunakan shortcode [aptmi_search]
    </p>
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
    $instance['b2c_url'] = ( ! empty( $new_instance['b2c_url'] ) ) ? strip_tags( $new_instance['b2c_url'] ) : '';
    $instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '700';
    $instance['promocode'] = ( ! empty( $new_instance['promocode'] ) ) ? strip_tags( $new_instance['promocode'] ) : '';
    return $instance;
  }

} // class Foo_Widget