<?php
/*
Plugin Name: Appointment-Plus Online Appointment Scheduling Widget
Plugin URI: http://www.appointment-plus.com/?m_id=wp100
Version: 1.0
Description: Let your customers book their appointments online directly from your WordPress Web site or blog. The plug-in allows you to quickly drop in an Appointment-Plus “Book Now” or “Schedule Now” button, which links directly to an Appointment-Plus online scheduling account.
Author: Appointment-Plus
Author URI: http://www.appointment-plus.com/?m_id=wp100
*/

class AP_Widget_BookNow extends WP_Widget
{
    function __construct() {
        $widget_ops = array('classname' => 'AP_Widget_BookNow', 'description' => __('This widget allows you to quickly drop in an Appointment-Plus “Book Now” or “Schedule Now” button, which links directly to an Appointment-Plus online scheduling account.'));
        $control_ops = array('width' => 300, 'height' => 250);
        parent::__construct('text', __('Appointment-Plus Scheduling'), $widget_ops, $control_ops);
    }

    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);
        $text = empty($instance['text']) ? '' : apply_filters('widget_text', $instance['text']);

        if (!empty($title))
            echo $before_title . $title . $after_title;;

        ?>
         <div><?php echo $text; ?></div>
        <?php
        echo $after_widget;
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['text'] =  $new_instance['text'];
        return $instance;
    }

    function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => 'Book Now', 'text' => '' ) );
        $title = strip_tags($instance['title']);
        $text = esc_textarea($instance['text']);
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
        <?php
    }

}
add_action( 'widgets_init', create_function('', 'return register_widget("AP_Widget_BookNow");') );
?>