<?php
/**
 * Plugin Name: Auto Expire Text widget
 * Plugin URI: http://www.bicoregroup.org/
 * Description: Widget will expired automatically according to given date.
 * Version: 1.1
 * Author:Nishant Sharma
 * License:GPL2
 */

class wp_autoexpirewidget extends WP_Widget {

	// When the widget is display or changed then following constructor is calling
	function wp_autoexpirewidget() {
		parent::WP_Widget(false, $name = __('Auto Expire Text', 'wp_autoexpirewidget'));
		$text_widgets = get_option( 'widget_wp_autoexpirewidget' );
		if($text_widgets != null){
		$textwidget = array_keys($text_widgets);
		$index = $textwidget[0] ;
		$widgetdate = explode( '/' , $text_widgets[$index]['date']);
		$currentmonth = date("m");
		$currentdate = date("d");
		$currentyear = date("Y");
		if($widgetdate[0] == $currentmonth &&  $widgetdate[1] == $currentdate && $widgetdate[2] == $currentyear){
		delete_option( 'widget_wp_autoexpirewidget' );
}
}

	}
	// Widget form creation
	function form($instance) {

		// Checking the values
		if( $instance) {
     		$title = esc_attr($instance['title']);
     		$textarea = esc_textarea($instance['textarea']);
      		$date = esc_attr($instance['date']);
		} else {
     		$title = '';
     		$textarea = '';
     		$date = '';
		}
		        $tomorrow  = date("m")."/";
			$tomorrow .= (date("d")+1)."/";
			$tomorrow .= date("Y");
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Textarea:', 'wp_widget_plugin'); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
</p>

<p>
<label for="<?php echo $this->get_field_id('date'); ?>"><?php _e('Widget Expire Date', 'wp_widget_plugin'); ?>(mm/dd/yyyy)</label>
<input class="widefat" id="<?php echo $this->get_field_id('date'); ?>" name="<?php echo $this->get_field_name('date'); ?>" type="text" value="<?php if($date)echo $date;else echo $tomorrow ;  ?>" onclick="ValidateDate()" />
</p>


<?php
}
	// Update the widget
	function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['textarea'] = ($new_instance['textarea']);
      $instance['date'] = strip_tags($new_instance['date']);
      return $instance;
}

	// display the widget front end user
	function widget($args, $instance) {
   	extract( $args );
   	$title = apply_filters('widget_title', $instance['title']);
	$text = $instance['text'];
   	$textarea = $instance['textarea'];
	echo $before_widget;
   	// Display the widget
   	echo '<div class="widget-text wp_widget_plugin_box">';
   	// Check if title is set
   	if ( $title ) {
        echo $before_title . $title . $after_title;
   	}
	// Check if text is set
   	if( $text ) {
      	echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
   	}
   	// Check if textarea is set
   	if( $textarea ) {
     	echo '<p class="wp_widget_plugin_textarea">'.$textarea.'</p>';
   	}
   	echo '</div>';
   	echo $after_widget;
	}

}

add_action('widgets_init', create_function('', 'return register_widget("wp_autoexpirewidget");'));

?>
