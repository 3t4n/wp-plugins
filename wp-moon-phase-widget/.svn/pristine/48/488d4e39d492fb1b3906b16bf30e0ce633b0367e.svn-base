<?php

class MoonPhaseWidget extends WP_Widget {

    /**
     * Initializes the plugin by setting its properties and calling the parent class with the description.
     */
    public function __construct() {
        parent::__construct(
            MPH__PLUGIN_SLUG,
            __( 'WP Moon Phase Widget', MPH__PLUGIN_SLUG ),
            array(
                'customize_selective_refresh' => true,
            )
        );
    }

    /**
     * Displays the administrative view of the form and includes the options
     * for the instance of the widget as arguments passed into the function.
     *
     * @param array $instance the options for the instance of this widget
     */
    public function form( $instance ) {

        // Set widget defaults
        $defaults = array(
            'title'    => '',
            'color'    => '#ffffff' // default white color
        );
        
        // Parse current settings with defaults
        extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

        <?php // Widget Title ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', MPH__PLUGIN_SLUG ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <?php // Widget backgorund color ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>"><?php _e( 'Background color:', MPH__PLUGIN_SLUG ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>" type="color" value="<?php echo esc_attr( $color ); ?>" />
        </p>

    <?php }

    /**
     * Updates the values of the widget. Uses the serialization class to sanitize the
     * information before saving it.
     *
     * @param array $newInstance the values to be sanitized and saved
     * @param array $oldInstance the values that were originally saved
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
        $instance['color']   = isset( $new_instance['color'] ) ? wp_strip_all_tags( $new_instance['color'] ) : '';
        return $instance;
    }

    /**
     * Displays the widget based on the contents of the included template.
     *
     * @param array $args     argument provided by WordPress that may be useful in rendering the widget
     * @param array $instance the values of the widget
     */
    public function widget( $args, $instance ) {

        extract( $args );

        // Check the widget options
        $title = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
        $color = isset( $instance['color'] ) ? $instance['color'] : '';

        // WordPress core before_widget hook (always include )
        echo $before_widget;

        // Display the widget
        echo '<div class="widget-text wp_widget_plugin_box">';

            // Display widget title if defined
            if ( $title ) {
                echo $before_title . $title . $after_title;
            }
            
            echo "<div id='moon-phase-widget' data-color='$color'></div>";

        echo '</div>';

        // WordPress core after_widget hook (always include )
        echo $after_widget;

    }
}