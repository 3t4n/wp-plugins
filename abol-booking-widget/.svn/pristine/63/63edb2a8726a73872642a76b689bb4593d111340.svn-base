<?php

/**
 * Inherits from WP_Widget so we can have an admin-configurable widget
 * accessible from the admin panel.
 */
class abol_sidebar_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct('abol_sidebar_widget', 'ABOL Widget', array('description' => 'Display seating availability and performance names for your group'));
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);

        echo $args['before_widget'];

        if(!empty($title))
        {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        abolSeatingWidget__renderAbolWidget();

        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if(isset($instance['title']))
        {
            $title = $instance['title'];
        }
        else
        {
            $title = "ABOL Widget";
        }

        ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}