<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// Creating the widget
class apcf_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
                'apcf_widget',
                // Widget name will appear in UI
                __( 'AP Contact Form Widget', 'ap-contact-form' ),
                // Widget description
                array( 'description' => __( 'Use widget to add contact form in sidebars, footers, etc.', 'ap-contact-form' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if ( !empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        // This is where you run the code and display the output
        //echo __( 'Hello, World!', 'ap-contact-form' );
        ?>
        <div class="apcf-widget-wrap">
            <?php
            echo do_shortcode( '[ap_contact_form]' );
            ?>
        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form($instance) {
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __( 'Contact Form', 'ap-contact-form' );
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php
    }

    // Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }

}

// Class apcf_widget ends here


