<?php
/**
 * Example Widget Class
 */
class Author_Facebook_Page_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'Author_Facebook_Page_Widget', 

        // Widget name will appear in UI
        __('Facebook Page Widget', AFPW_FACEBOOK_PAGE_FEED_I18N), 

        // Widget description
        array( 'description' => __( 'It displays facebook page widget in the sidebar.', AFPW_FACEBOOK_PAGE_FEED_I18N ), ) 
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        //* Apply any styles before the widget.
        if ( array_key_exists( 'before_widget', $args ) ) {
            echo $args['before_widget'];
        }

        //* Apply any styles before & after widget title.
        if ( !empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        $tab_output = array();
        if ( $instance['timeline_tab'] )
            array_push( $tab_output, 'timeline' );

        if ( $instance['events_tab'] )
            array_push( $tab_output, 'events' );

        if ( $instance['messages_tab'] )
            array_push( $tab_output, 'messages' );
        $href = $instance['href'];
        if(is_single() && $instance['enable_author_facebook_feed'] && get_option('afpw_enable_authors_fb_page'))
            if($fb_page_url=get_the_author_meta('fb_page_url', get_the_author_meta('ID')))
                $href = strip_tags( $fb_page_url );

        $output = '';

        //* Comment for tracking/debugging
        $output = '<!-- This Facebook Page Feed was generated with Facebook Author Page Feed Widget & plugin v' . AFPW_PLUGIN_VERSION . ' - https://www.psdtohtmlcloud.com/author-facebook-page-widget/ -->';

        //* Wrapper for alignment
        $output .= '<div id="simple-facebook-widget">'; 

        $show_cover=($instance['show_cover'])? '0' : '1';
        $show_facepile=($instance['show_facepile'])? '1' : '0';
        $show_cta=($instance['show_cta'])? '1' : '0';
        $small_header=($instance['small_header'])? '1' : '0';
        $adapt_container_width=($instance['adapt_container_width'])? '1' : '0';

        //* Main Facebook Feed
        $output .= '<div class="fb-page" ';
        $output .= 'data-href="' . esc_attr( $href ) . '" ';
        $output .= 'data-width="' . esc_attr( $instance['width'] ) . '" ';
        $output .= 'data-height="' . esc_attr( $instance['height'] ) . '" ';
        $output .= 'data-tabs="' . implode( ', ', $tab_output ) . '" ';
        $output .= 'data-hide-cover="' . $show_cover . '" ';
        $output .= 'data-show-facepile="' . $show_facepile . '" ';
        $output .= 'data-hide-cta="' . $show_cta . '" ';
        $output .= 'data-small-header="' . $small_header . '" ';
        $output .= 'data-adapt-container-width="' . $adapt_container_width . '">';
        $output .= '</div>';

        // end wrapper
        $output .= '</div>';

        // end comment
        $output .= '<!-- End Simple Facebook Page Plugin (Widget) -->';

        echo $output;

        if ( array_key_exists( 'after_widget', $args ) ) {
            echo $args['after_widget'];
        }

    }

    /**
     * Back-end widget form.
     *
     * Borrowed heavily from something that I don't remember with love.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     *
     * @return string|void
     */
    public function form( $instance ) {

        /**
         * Set up the default form values.
         *
         * @var $defaults
         */
        $defaults = $this->afpw_defaults();

        /**
         * Merge the user-selected arguments with the defaults.
         *
         * @var $instance
         */
        $instance = wp_parse_args( (array) $instance, $defaults );

        
        $title = strip_tags( $instance['title'] );
        $href = strip_tags( $instance['href'] );
        $width = strip_tags( $instance['width'] );
        $height = strip_tags( $instance['height'] );
        $align = array( 'initial' => 'None', 'left' => 'Left', 'center' => 'Center', 'right' => 'Right' );
        $reverse_boolean = array( 0 => 'Yes', 1 => 'No' );
        $boolean = array( 1 => 'Yes', 0 => 'No' );


        ?>

        <p>
            <label
                for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
                   name="<?php echo $this->get_field_name( 'title' ); ?>"
                   value="<?php echo esc_attr( $instance['title'] ); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id( 'href' ); ?>"><?php _e( 'Facebook Page URL:', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'href' ); ?>"
                   name="<?php echo $this->get_field_name( 'href' ); ?>"
                   value="<?php echo esc_attr( $instance['href'] ); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e( 'Width:', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'width' ); ?>"
                   name="<?php echo $this->get_field_name( 'width' ); ?>"
                   value="<?php echo esc_attr( $instance['width'] ); ?>"/>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e( 'Height:', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'height' ); ?>"
                   name="<?php echo $this->get_field_name( 'height' ); ?>"
                   value="<?php echo esc_attr( $instance['height'] ); ?>"/>
        </p>
<!--         <p>
            <label
                for="<?php echo $this->get_field_id( 'align' ); ?>"><?php _e( 'Alignment:', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id( 'align' ); ?>"
                    name="<?php echo $this->get_field_name( 'align' ); ?>">
                <?php foreach ( $align as $key => $val ): ?>
                    <option
                        value="<?php echo esc_attr( $key ); ?>" <?php selected( $instance['align'], $key ); ?>><?php echo esc_html( $val ); ?></option>
                <?php endforeach; ?>
            </select>
        </p> -->
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_cover' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_cover' ); ?>" name="<?php echo $this->get_field_name( 'show_cover' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'show_cover' ); ?>"><?php _e( 'Show Cover Photo?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_facepile' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_facepile' ); ?>" name="<?php echo $this->get_field_name( 'show_facepile' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'show_facepile' ); ?>"><?php _e( 'Show Facepile?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_cta' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_cta' ); ?>" name="<?php echo $this->get_field_name( 'show_cta' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'show_cta' ); ?>"><?php _e( 'Show Call to Action button?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'small_header' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'small_header' ); ?>" name="<?php echo $this->get_field_name( 'small_header' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'small_header' ); ?>"><?php _e( 'Small Header?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'timeline_tab' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'timeline_tab' ); ?>" name="<?php echo $this->get_field_name( 'timeline_tab' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'timeline_tab' ); ?>"><?php _e( 'Show Timeline Tab?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'events_tab' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'events_tab' ); ?>" name="<?php echo $this->get_field_name( 'events_tab' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'events_tab' ); ?>"><?php _e( 'Show Events Tab?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'messages_tab' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'messages_tab' ); ?>" name="<?php echo $this->get_field_name( 'messages_tab' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'messages_tab' ); ?>"><?php _e( 'Show Messages Tab?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p>

<!--         <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'adapt_container_width' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>" name="<?php echo $this->get_field_name( 'adapt_container_width' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'adapt_container_width' ); ?>"><?php _e( 'Auto-responsive?', AFPW_FACEBOOK_PAGE_FEED_I18N ); ?></label>
        </p> -->

        <?php if(get_option('afpw_enable_authors_fb_page')){ ?>
        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'enable_author_facebook_feed' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'enable_author_facebook_feed' ); ?>" name="<?php echo $this->get_field_name( 'enable_author_facebook_feed' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'enable_author_facebook_feed' ); ?>">Enable Author's Facebook Widget</label>
        </p>
        <p>Note: Author's Facebook Page Feed will be shown only if the author has added their facebook page url in the profile.</p>
        <?php } ?>

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
        $defaults = $this->afpw_defaults();

        $instance = $old_instance;
        foreach ( $defaults as $key => $val ) {
            $instance[ $key ] = strip_tags( $new_instance[ $key ] );
        }

        return $instance;
    }

    function afpw_defaults() {

        $defaults = array(
            'title'                 => esc_attr__( 'LIKE US', AFPW_FACEBOOK_PAGE_FEED_I18N ),
            'href'                  => 'https://www.facebook.com/facebook',
            'width'                 => '285',
            'height'                => '500',
            'show_cover'            => 'on',
            'show_facepile'         => '0',
            'align'                 => 'initial',
            'timeline_tab'          => '0',
            'events_tab'            => '0',
            'messages_tab'          => '0',
            'show_cta'              => '0',
            'small_header'          => '0',
            'adapt_container_width' => '1',
            'enable_author_facebook_feed' => '',
        );

        return $defaults;
    }

}

// register Foo_Widget widget
function register_Author_Facebook_Page_Widget() {
    register_widget( 'Author_Facebook_Page_Widget' );
}
add_action( 'widgets_init', 'register_Author_Facebook_Page_Widget' );