<?php
/**
 * Plugin Name: Shping Reviews Widget
 * Plugin URI: https://github.com/shping/shping-reviews-widget
 * Description: Generic Shping Reviews widget for WordPress
 * Version: 1.0.0
 * Author: Shping
 * Author URI: https://www.shping.com
 */

function shping_load_style()
{
    wp_enqueue_style('shping_reviews', 'https://code.shping.com/widgets/reviews-1.0.1.css');
}

function shping_load_script()
{
    wp_enqueue_script('shping_reviews', 'https://code.shping.com/widgets/reviews-1.0.1.js');
}

function shping_reviews_widget()
{
    register_widget('ShpingReviewsWidget');
}

add_action('widgets_init', 'shping_reviews_widget');
add_action('wp_enqueue_scripts', 'shping_load_style');
add_action('wp_enqueue_scripts', 'shping_load_script');

class ShpingReviewsWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            // widget ID
            'shping_reviews_widget',
            // widget name
            __('Shping Reviews Widget', 'shping_reviews_widget_domain'),
            // widget description
            array('description' => __('Generic Shping Reviews widget for WordPress', 'shping_reviews_widget_domain'))
        );
    }

    public function widget($args, $instance)
    {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $api_key = (!empty($instance['api_key'])) ? esc_attr($instance['api_key']) : '';
        $css_class_name = (!empty($instance['css_class_name'])) ? esc_attr($instance['css_class_name']) : '';
        $target = (!empty($instance['target'])) ? esc_attr($instance['target']) : '';
        $tag = (!empty($instance['tag'])) ? esc_attr($instance['tag']) : '';
        $limit = (!empty($instance['limit'])) ? esc_attr($instance['limit']) : '';

        echo "<script>Shping.widgets.reviews.create({ css: '{$css_class_name}', apikey: '{$api_key}', target: '{$target}', tag:'{$tag}', limit: '{$limit}'});</script>";
    }

    public function form($instance)
    {
        $api_key = isset($instance['api_key']) ? esc_attr($instance['api_key']) : '';
        $css_class_name = isset($instance['css_class_name']) ? esc_attr($instance['css_class_name']) : '';
        $target = isset($instance['target']) ? esc_attr($instance['target']) : '';
        $limit = isset($instance['limit']) ? esc_attr($instance['limit']) : '';
        $tag = isset($instance['tag']) ? esc_attr($instance['tag']) : '';

        ?>
    <p>
      <label for="<?php echo $this->get_field_id('api_key'); ?>"><?php _e('api_key:');?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('api_key')); ?>" name="<?php echo esc_attr($this->get_field_name('api_key')); ?>" type="text" value="<?php echo esc_attr($api_key); ?>"/>
    </p>
    <p>
      <label for="<?php echo $this->get_field_id('css_class_name'); ?>"><?php _e('css_class_name:');?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('css_class_name')); ?>" name="<?php echo esc_attr($this->get_field_name('css_class_name')); ?>" type="text" value="<?php echo esc_attr($css_class_name); ?>"/>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('target')); ?>"><?php _e('target:');?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('target')); ?>" name="<?php echo esc_attr($this->get_field_name('target')); ?>" type="text" value="<?php echo esc_attr($target); ?>"/>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php _e('limit:');?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="text" value="<?php echo esc_attr($limit); ?>"/>
    </p>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id('tag')); ?>"><?php _e('tag:');?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tag')); ?>" name="<?php echo esc_attr($this->get_field_name('tag')); ?>" type="text" value="<?php echo esc_attr($tag); ?>"/>
    </p>

    <?php
}

    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['api_key'] = sanitize_text_field($new_instance['api_key']);
        $instance['css_class_name'] = sanitize_text_field($new_instance['css_class_name']);
        $instance['target'] = sanitize_text_field($new_instance['target']);
        $instance['tag'] = sanitize_text_field($new_instance['tag']);
        $instance['limit'] = sanitize_text_field($new_instance['limit']);

        return $instance;
    }
}
?>