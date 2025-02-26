<?php

class gifeed_sc_widget extends WP_Widget
{

    // Create Widget
    public function __construct()
    {

        $widget_ops  = array( 'classname' => 'widget_gifeed_sc_widget', 'description' => __( 'Use this widget to display your Instagram Feed in widget area.' ) );
        $control_ops = array( 'width' => 'auto' );

        parent::__construct( 'gifeed-widget', __( IFLITE_ITEM_NAME ), $widget_ops, $control_ops );

    }

    // Widget Content
    public function widget( $args, $instance )
    {

        extract( $args );

        if ( isset( $instance['gifeed_shortcode'] ) && $instance['gifeed_shortcode'] != 'select' ) {

            $gifeed_shortcode = $instance['gifeed_shortcode'];

            $gifeed_do_widget = do_shortcode( '[ghozylab-instagram feed="'.$gifeed_shortcode.'"]' );

        } else {

            $gifeed_do_widget = '<p>'.__( 'No feed selected' );'</p>';

        }

        echo $before_widget;

        echo $gifeed_do_widget;

        echo $after_widget;

    }

    // Update and save the widget
    public function update( $new_instance, $old_instance )
    {

        $instance = $old_instance;

        $instance['gifeed_shortcode'] = $new_instance['gifeed_shortcode'];

        return $new_instance;

    }

    // If widget content needs a form
    public function form( $instance )
    {

        ?>
        <div style="margin: 10px 0 10px 0;display: block"><label for="<?php echo $this->get_field_id( 'gifeed_shortcode' ); ?>"><?php _e( 'Select the Feed name and press save button.' ); ?>
    <select style="margin: 10px 0 10px 0" id="<?php echo $this->get_field_id( 'gifeed_shortcode' ); ?>" name="<?php echo $this->get_field_name( 'gifeed_shortcode' ); ?>" >
    <option value="select">- Select -</option>
	<?php

        global $post;

        $args = array(
            'post_type'      => 'ginstagramfeed',
            'order'          => 'ASC',
            'posts_per_page' => -1,
            'post_status'    => 'publish',

        );

        $iscurr = ( isset( $instance['gifeed_shortcode'] ) ? $instance['gifeed_shortcode'] : 'select' );

        $myposts = get_posts( $args );

        if ( ! empty( $myposts ) ) {

            foreach ( $myposts as $post ): setup_postdata( $post );
                echo '<option value='.$post->ID.''.selected( $iscurr, $post->ID ).'>'.esc_html( esc_js( the_title( null, null, false ) ) ).'</option>';
            endforeach;
        }

        ?>
</select></label></div>
        <?php
}

}

function gifeed_widget_init()
{

    register_widget( 'gifeed_sc_widget' );

}

add_action( 'widgets_init', 'gifeed_widget_init' );