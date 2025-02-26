<?php
/*
Plugin Name: Random Business Quotes
Plugin URI: http://www.mentorbit.com/site/wordpress-plugin
Description: Display random startup and buiness quotes from Mentorbit.com.
Version: 1.0
Author: MentorBit
Author URI: http://www.mentorbit.com/
License: GPL2
*/

class business_quotes extends WP_Widget {

	// constructor
	function business_quotes() {
		parent::WP_Widget(false, $name = __('Random Business Quotes', 'business_quotes') );
	}

	// widget form creation
	function form($instance) {	
		// Check values
		if( $instance) {
			$title = esc_attr($instance['title']);
		} else {
			$title = 'Mentor Bit';
		}
		?>

		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'wp_widget_plugin'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		
		<?php
	}

	// widget update
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	// widget display
	function widget($args, $instance) {
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);
		$text = $instance['text'];
		$textarea = $instance['textarea'];
		echo $before_widget;
		// Display the widget
		echo '<div class="widget-text business_quotes_box">';

		// Check if title is set
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		$quote = wp_remote_fopen('http://www.mentorbit.com/widget-quote.php');
		echo $quote;
		echo '</div>';
		echo $after_widget;
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("business_quotes");'));

?>