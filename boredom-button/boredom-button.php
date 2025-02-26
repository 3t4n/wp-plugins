<?php
/*
Plugin Name: Boredom Button
Version: 1.0
Plugin URI: http://www.boredombutton.com/buttons/
Description: Places the Boredom Button on your wordpress blog, giving your users interesting content from the net.
Author: Onoko
Author URI: http://www.onoko.com/
*/


class Boredom_Button extends WP_Widget {
	function Boredom_Button() {
		// widget actual processes
		parent::WP_Widget(false, $name = 'Boredom_Button');	
	}

	function form($instance) {
		// outputs the options form on admin
	}

	function update($new_instance, $old_instance) {
		// processes widget options to be saved
	}

	function widget($args, $instance) {
		// outputs the content of the widget -
		echo '
<div style="font-size:14px;">
<a href="http://www.boredombutton.com/?ref=wp"><img border="0" style="padding-bottom:4px;vertical-align:middle;" src="http://www.boredombutton.com/images/wordpress.png" /></a> <a href="http://www.boredombutton.com/?ref=wp">I\'m Bored</a>
</div>';
	}

}
//register_widget('Boredom_Button');
add_action('widgets_init', create_function('', 'return register_widget("Boredom_Button");'));
?>