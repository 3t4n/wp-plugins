<?php

class Strong_Password_Generator_Widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'strong_password_generator_widget',
            __('Strong Password Generator', 'strong-password-generator-wp'),
            array('customize_selective_refresh' => true,)

        );
    }

    public function widget($args, $instance)
    {

        echo $args['before_widget'];

        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        echo do_shortcode('[strong-password-generator]');

        echo $args['after_widget'];
    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : '';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'strong-password-generator-wp'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>

<?php

    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}
?>