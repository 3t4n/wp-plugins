<?php
/**
 * Social Media Widget
 */

class vv_social_media_widget extends WP_Widget {


    function vv_social_media_widget() {
        parent::__construct(false, $name = 'ViewVox Social Media Widget');
    }

    function widget($args, $instance) {

        //global $before_widget;
        global $social;

        include_once ('display-functions.php');

        $extra_content = '<div ID="smfbvv" class="smfbvv-message' .'">' .media() . $social . '</div> ';

        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);

        ?>
        <?php echo $before_widget; ?>
        <?php if ( $title )
            echo $before_title . $title . $after_title; ?>

        <?php echo $extra_content; ?>

        <?php echo $after_widget; ?>
    <?php
    }

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        return $instance;
    }

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {



        if( isset($title) == true ) {
            $title 		= esc_attr($instance['title']);
        }   else {
            $title = '';
        }


        ?>

        <h4><?php _e('Edit settings for this Widget in Wordpress Admin under Settings - ViewVox Social Media', 'smfbvv_domain'); ?></h4>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

    <?php
    }


} // end class vv_social_media_widget
add_action('widgets_init', create_function('', 'return register_widget("vv_social_media_widget");'));
