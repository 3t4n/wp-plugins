<?php
/**
 * Plugin Name: Advanced Videobox
 * Plugin URI: http://wptom.com/wordpress/plugins/advanced-videobox/
 * Description: Add beautiful Web 2.0, XHTML valid videobox anywhere on your site. Check for more on <a href="http://wptom.com/wordpress/plugins/advanced-videobox/">the plugin's page</a>.
 * Tags: youtube, video, videobox, embed, xhtml valid
 * Version: 1.0.2
 * Author: Tom
 * Author URI: http://wptom.com
 */

/**
 * Add jquery to <HEAD></HEAD>
 * @since 1.0
 */

wp_enqueue_script('jquery');

/**
 * Add style.css and other scripts to <HEAD></HEAD>
 * @since 1.0
 */

function add_script() {
    $plugin = WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__));
    echo "<link rel='stylesheet' href='$plugin/style.css' type='text/css' media='all' />\n";    
    
    echo "<script type='text/javascript' src='$plugin/js/jquery-1.3.2.min.js' ></script>\n";
    echo "<script type='text/javascript' src='$plugin/js/jquery.idtabs.min.js' ></script>\n"; 
}

add_action( 'wp_head', 'add_script' );



/**
 * Add function to widgets_init that'll load our widget.
 * @since 1.0
 */
add_action( 'widgets_init', 'av_load_widgets' );

/**
 * Register our widget.
 * 'Advanced_Videobox_Widget' is the widget class used below.
 *
 * @since 1.0
 */
function av_load_widgets() {
	register_widget( 'Advanced_Videobox_Widget' );
}

/** * 
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 *
 * @since 1.0
 */
class Advanced_Videobox_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function Advanced_Videobox_Widget() {
		/* Widget settings. */
		$widget_ops = array(
         'classname' => 'av_class',
         'description' => __('Display your videos easily', 'av_class') );

		/* Widget control settings. */
		$control_ops = array(
         'width' => 400,
         'height' => 350,
         'id_base' => 'av_class-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'av_class-widget', __('Advanced Videobox', 'av_class'), $widget_ops, $control_ops );
	}

     
	function widget( $args, $instance ) {
		
		
		extract( $args );        
        $number = apply_filters('widget_title', $instance['number'] );
		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
        $width = apply_filters('widget_title', $instance['width'] );
        $height = apply_filters('widget_title', $instance['height'] );        
        $enable_params = $instance['enable_params'] ? '1' : '0';        
		$display_credits = $instance['display_credits'] ? '1' : '0';
		/* Before widget (defined by themes). */  
        
		echo $before_widget;
		
		/* Display the widget title if one was input (before and after defined by themes). */
		    if ( $title ) echo $before_title . $title . $after_title; 
      
  
/**
* call videos
*/
include(dirname(__FILE__).'/video.php');  
    

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title, width and height to remove HTML (important for text inputs). */
        $instance['number'] = strip_tags( $new_instance['number'] );
		$instance['title'] = strip_tags( $new_instance['title'] );
        for ($inst=1;$inst<=$instance['number'];$inst++) {
        $instance['titles'.$inst] = strip_tags( $new_instance['titles'.$inst] );
		$instance['video'.$inst] =  $new_instance['video'.$inst];
        }	
        $instance['width'] = strip_tags( $new_instance['width'] );
        $instance['height'] = strip_tags( $new_instance['height'] );	
        
		/* No need to strip tags video and enable_params */	
		
        
		
        $instance['enable_params'] = $new_instance['enable_params'] ? 1 : 0;
        $instance['display_credits'] = $new_instance['display_credits'] ? 1 : 0;
        
        $instance['filter'] = isset($new_instance['filter']);

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
         'number' => __('3', 'av_class'),
         'width' => __('200', 'av_class'),
         'height' => __('100', 'av_class'),
         'title' => __('Advanced Videobox title', 'av_class'),          
         'titles1' => __('Video title1', 'av_class'),
         'titles2' => __('Video title2', 'av_class'),
         'titles3' => __('Video title3', 'av_class'),  
         'titles4' => __('Video title4', 'av_class'),
         'titles5' => __('Video title5', 'av_class'),
         'titles6' => __('Video title6', 'av_class'),
         'titles7' => __('Video title7', 'av_class'),
         'titles8' => __('Video title8', 'av_class'),
         'titles9' => __('Video title9', 'av_class'),
         'titles10' => __('Video title10', 'av_class'),
         'titles11' => __('Video title11', 'av_class'),
         'titles12' => __('Video title12', 'av_class'),
         'titles13' => __('Video title13', 'av_class'),
         'titles14' => __('Video title14', 'av_class'),
         'titles15' => __('Video title15', 'av_class'),
         'titles16' => __('Video title16', 'av_class'),
         'titles17' => __('Video title17', 'av_class'),
         'titles18' => __('Video title18', 'av_class'),
         'titles19' => __('Video title19', 'av_class'),
         'titles20' => __('Video title20', 'av_class'),           
         'video1' => __('Here comes video embed code 1', 'av_class'),
		 'video2' => __('Here comes video embed code 2', 'av_class'),
		 'video3' => __('Here comes video embed code 3', 'av_class'),
         'video4' => __('Here comes video embed code 4', 'av_class'),
		 'video5' => __('Here comes video embed code 5', 'av_class'),
		 'video6' => __('Here comes video embed code 6', 'av_class'),
         'video7' => __('Here comes video embed code 7', 'av_class'),
		 'video8' => __('Here comes video embed code 8', 'av_class'),
		 'video9' => __('Here comes video embed code 9', 'av_class'),
         'video10' => __('Here comes video embed code 10', 'av_class'),
		 'video11' => __('Here comes video embed code 11', 'av_class'),
		 'video12' => __('Here comes video embed code 12', 'av_class'),
         'video13' => __('Here comes video embed code 13', 'av_class'),
		 'video14' => __('Here comes video embed code 14', 'av_class'),
		 'video15' => __('Here comes video embed code 15', 'av_class'),
         'video16' => __('Here comes video embed code 16', 'av_class'),
		 'video17' => __('Here comes video embed code 17', 'av_class'),
		 'video18' => __('Here comes video embed code 18', 'av_class'),
         'video19' => __('Here comes video embed code 19', 'av_class'),
		 'video20' => __('Here comes video embed code 20', 'av_class'));
		$instance = wp_parse_args( (array) $instance, $defaults );      
        
        $enable_params = isset($instance['enable_params']) ? (bool) $instance['enable_params'] :false;
        $display_credits = isset($instance['display_credits']) ? (bool) $instance['display_credits'] :true; 
         ?>  
		 <!-- Number of videos --> 
		 <?php $nr = $instance['number']; ?>
		 
	   <!-- Widget Title: Text Input -->
		<p style="width:50%; float: left;">
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'av_class'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:95%;" class="widefat"/>
		</p>	 
       
       <!-- Number of videos: Text Input -->
		<p style="width:50%; float: right;">
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number of videos:', 'av_class'); ?></label>
			
            <select id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" class="widefat" style="width:98%;">
            <?php for($nrvid=1; $nrvid<=20; $nrvid++) { ?>
				<option <?php if ( $nrvid == $instance['number'] ) echo 'selected="selected"'; ?>><?php echo $nrvid; ?></option>
            <?php } ?>    	
			</select>
            
		</p>
		
		<!-- Width: Text Input -->
		<p style="width:50%; float: left;"> 
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width:', 'av_class'); ?></label>
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:95%;"  class="widefat"/>
		</p>
        
        <!-- Height: Text Input -->
		<p style="width:50%; float: right;">
		 <label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height:', 'av_class'); ?></label>
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:95%;" class="widefat" />
		</p> 
       
       <!-- Widget Title: Text Input -->
	   <?php for ($inst=1;$inst<=$nr;$inst++) { ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'titles'.$inst ); ?>"><?php _e('Title:<strong>'.$inst.'</strong>', 'av_class'); ?></label>
			<input id="<?php echo $this->get_field_id( 'titles'.$inst ); ?>" name="<?php echo $this->get_field_name( 'titles'.$inst ); ?>" value="<?php echo $instance['titles'.$inst]; ?>" style="width:95%;" class="widefat" />
		</p>        
        

		<!-- Video: Text Input -->	
		<p>
			<label for="<?php echo $this->get_field_id( 'video'.$inst ); ?>"><?php _e('Video:<strong>'.$inst.'</strong>', 'av_class'); ?></label>
			<textarea id="<?php echo $this->get_field_id( 'video'.$inst); ?>" name="<?php echo $this->get_field_name( 'video'.$inst); ?>" style="width:98%; height: 40px;"><?php echo apply_filters('widget_title', $instance['video'.$inst] ); ?></textarea>
		</p>
       <?php } ?>  
		
        <!-- Enable parameters? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['enable_params'], true ); ?> id="<?php echo $this->get_field_id( 'enable_params' ); ?>" name="<?php echo $this->get_field_name( 'enable_params' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'enable_params' ); ?>"><?php _e('Enable parameters (colors, related videos etc.)?  This will result in invalid XHTML code.', 'av_class'); ?></label>
		</p>
        
        <!-- Display Credits? Checkbox -->
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $display_credits ); ?> id="<?php echo $this->get_field_id( 'display_credits' ); ?>" name="<?php echo $this->get_field_name( 'display_credits' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'display_credits' ); ?>"><?php _e('Display credits.<br>Show your \'Thank you\' for this plugin by checking this and saving widget or you can <a href="">donate via Paypal.</a>', 'av_class'); ?></label>
		</p>		
    
	<?php
	}
}

?>
<?php
/**
 * extract url of the video 
 *
 * @since 1.0
 */
function strbet($inputStr, $delimeterLeft, $delimeterRight, $debug=false) {
    $posLeft=strpos($inputStr, $delimeterLeft);
    if ( $posLeft===false ) {
        if ( $debug ) {
            echo "Warning: left delimiter '{$delimeterLeft}' not found";
        }
        return false;
    }
    $posLeft+=strlen($delimeterLeft);
    $posRight=strpos($inputStr, $delimeterRight, $posLeft);
    if ( $posRight===false ) {
        if ( $debug ) {
            echo "Warning: right delimiter '{$delimeterRight}' not found";
        }
        return false;
    }
    return substr($inputStr, $posLeft, $posRight-$posLeft);
}
?>