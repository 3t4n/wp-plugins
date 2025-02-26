<?php

/**
 * Class tpw_widget - prepares the sidebar widget
 *
 * @autor Weblab.nl - Maarten Kooiker
 */
class tpwWidget extends WP_Widget {

    /**
     * tpwWidget constructor.
     */
    public function __construct() {
        parent::__construct(
            'tpw_rating', __('ThePerfectWedding.nl Widget', 'tpwratingwidget'),
            array('description' => __('With this widget you’re able to share the reviews you gathered on 
            your own Wordpress website - The widget contains the right mark-up to display “review stars” 
            in the Google search result.', 'tpwratingwidget'))
        );
    }

    /**
     * Function to create the frontend widget code
     *
     * @param array|string                  $args
     * @param array|string                  $instance
     */
    public function widget($args, $instance) {
        // set the title of the widget
        $title = apply_filters('widget_title', $instance['title']);

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        // if the title is not empty
        if(!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

            // get the ratings data
            $ratings = new tpwRatings();

            // render the widget
            $ratings->renderRatings();

        // output the after-widget code
        echo $args['after_widget'];
    }

    /**
     * Function to generate the code for the backend of the widget, allowing the owner to setup the widget
     *
     * @param array             Current settings.
     */
    public function form($instance) {
        // if the title settings are given, set the title, else use the
        if ( isset( $instance['title'] ) ) {
            $title = $instance['title'];
        } else {
            $title = __('ThePerfectWedding.nl Widget', 'tpwratingwidget');
        }

        // Include the admin form for the tpw widget
        include('tpwWidgetAdminFormTemplate.php');
    }

    /**
     * Function to update the widget options on save
     *
     * @param array         New settings for this instance, $new_instance
     * @param array         Old settings for this instance, $old_instance
     * @return array
     */
    public function update($newInstance, $oldInstance) {
        // initiate the instance array
        $instance = array();

        // set the instance title
        $instance['title'] = (!empty($newInstance['title'])) ? strip_tags($newInstance['title']) : '';

        // done, return the new instance
        return $instance;
    }
}
