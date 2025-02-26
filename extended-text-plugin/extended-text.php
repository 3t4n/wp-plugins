<?php
/*
Plugin Name: Extended Text Widget
Plugin URI: http://hughwillfayle.de/wordpress/extended-text
Description: This plugin provides an extended text widget. It is able to exclude its display on defined pages.
Author: Hugh Will Fayle
Version: 0.3
Author URI: http://hughwillfayle.de/
*/

/**
 * This is the widget itself.
 * @author Thomas Herzog
 * @version 0.3
 */
class extended_text_widget extends WP_Widget {
	/**
	 * Init the class and parse the widget title to Wordpress Widget Page
	 */
    function extended_text_widget() {
    	load_plugin_textdomain( 'th_etw', false, 'extended-text/i18n' );

    	// Set options
    	$widget_name    = 'Extended Text';
    	$widget_width   = 500;
    	$widget_options = array( 'description' => __( 'An extended text-widget which is able to exclude its display on defined pages.', 'th_etw'),
    							 'width' => $widget_width );
        parent::WP_Widget( false, $widget_name, $widget_width, $widget_options );
    }

    /**
     * Displays the widget in the frontend
     * @param array $args comes from wordpress itself and give the befor & after Strings
     * @param array $instance contains the widget data
     */
    function widget( $args, $instance ) {
    	// Build the variables	
    	extract($args);
    	$title = $instance['title'];
    	$text  = $instance['text'];
    	$list  = $instance['listtype'];
    	$pages = explode(",",$instance['pages']);

    	if ( ('whitelist' == $list && in_array( get_the_ID(), $pages ) ) || ( 'blacklist' == $list && !in_array( get_the_ID(), $pages ) ) ) {
    		// echo the widget
    		echo $before_widget;
    			if ( "" != trim( $title ) ) {
    				echo $before_title.$title.$after_title;
    			}
    			echo $text;
    		echo $after_widget;
    	}
    }
    
	/**
	 * Updates the current instance
	 * @param array $new_instance The values of the new instance
	 * @param array $old_instance The values of the old instance
	 * @return array $instance The values of the old instance
	 */
    function update( $new_instance, $old_instance ) {				
		$instance             = $old_instance;
		$instance['title']    = strip_tags($new_instance['title']);
		$instance['text']     = $new_instance['text'];
		$instance['pages']    = $new_instance['pages'];
		$instance['listtype'] = $new_instance['listtype'];
        return $instance;
    }

    /**
     * Provides the form for the widget-backend
     * @param array $instance the values of this instance
     */
    function form($instance) {
    	$title = esc_attr($instance['title']);
        $text  = esc_attr($instance['text']);
        $pages = esc_attr($instance['pages']);
        $list  = esc_attr($instance['listtype']);
        
        ?>
        	<p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title '); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content' ); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" rows="13"><?php echo $text; ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'listtype' ); ?>"><?php _e( 'Appereance', 'th_etw' )?><br /></label>
                <input type="radio" id="<?php echo $this->get_field_id( 'listtype' ); ?>" name="<?php echo $this->get_field_name( 'listtype' ); ?>" value="blacklist" <?php echo ('blacklist' == $list ? ' checked="checked"' : '') ?> /> <?php _e( 'Pages should be excluded', 'th_etw' ); ?><br />
                <input type="radio" id="<?php echo $this->get_field_id( 'listtype' ); ?>" name="<?php echo $this->get_field_name( 'listtype' ); ?>" value="whitelist" <?php echo ('whitelist' == $list ? ' checked="checked"' : '') ?> /> <?php _e( 'Widget only appears on this pages', 'th_etw' ); ?>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'pages' ); ?>"><?php _e( 'Page-IDs', 'th_etw' ); ?>: <small><?php echo _e( 'comma sperated', 'th_etw' ); ?></small></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pages' ); ?>" name="<?php echo $this->get_field_name( 'pages' ); ?>" value="<?php echo $pages; ?>" />
            </p>
        <?php 
    }
}

if ( function_exists( 'register_widget' ) ) {
	function extended_text_widget_start () {
		return register_widget( 'extended_text_widget' );
	}
}

// Inits the widget
add_action( 'widgets_init', 'extended_text_widget_start' );
?>