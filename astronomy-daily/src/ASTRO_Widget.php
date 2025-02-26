<?php
/**
* Create Astronomy Daily widget
*/
add_action( 'widgets_init', function(){
    register_widget( 'ASTRO_Widget' );
});

class ASTRO_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'astro_widget',
            'description' => 'Displays a image from NASA Astronomy Picture of the Day',
        );

        parent::__construct( 'astro_widget', 'Astronomy Daily', $widget_ops );
    }


    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $count = $instance['count'];
        $size = $instance['size'];
        $args = array(
            'posts_per_page'   => $count,
            'post_type'        => 'astro',
            'orderby'          => 'date'
        );
        $astro = get_posts( $args );
        foreach ($astro as $post) { ?>
            <a href="<?= the_permalink($post->ID); ?>">
                <?= get_the_post_thumbnail( $post->ID, $size ); ?>
                <h4 class="astro-title"><?= $post->post_title; ?></h4>
            </a>
        <?php }

        echo $args['after_widget'];
    }


    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
        $count = ! empty( $instance['count'] ) ? $instance['count'] : __( 1, 'text_domain' );
        $size = ! empty( $instance['size'] ) ? $instance['size'] : __( array(100, 100), 'text_domain' );
        ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
            <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Count:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="number" value="<?php echo esc_attr( $count ); ?>">
            </p>
            <p>
            <label for="<?php echo $this->get_field_id( 'size' ); ?>"><?php _e( 'Image size:' ); ?></label>
            <br>
                <select id="<?php echo $this->get_field_id( 'size' ); ?>" name="<?php echo $this->get_field_name( 'size' ); ?>"  style="width: 100%;" value="<?php echo esc_attr( $size ); ?>" >
                    <?php
                        $sizes = get_intermediate_image_sizes();
                        for ($i=0; $i < count($sizes); $i++) {
                            if ( $size == $sizes[$i] )
                                echo '<option value="' . $sizes[$i] . '" selected>' . $sizes[$i] . '</option>';
                            else
                                echo '<option value="' . $sizes[$i] . '" >' . $sizes[$i] . '</option>';
                        }
                    ?>
                </select>
                <span style="margin-top: 10px; display: block;">How to register new image size? Visit this <a href="https://developer.wordpress.org/reference/functions/add_image_size/" target="_blank">link</a></span>
            </p>
        <?php
    }


    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        foreach( $new_instance as $key => $value )
        {
            $updated_instance[$key] = sanitize_text_field($value);
        }

        return $updated_instance;
    }
}