<?php

/* copy of the built-in WP Text Widget - but with a css class added */

class asfp_Text_Widget extends WP_Widget {

	function asfp_Text_Widget() {
		$widget_ops = array('classname' => 'asfp_widget_text', 'description' => 'Arbitrary text or HTML (with an optional custom class)');
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('asfp_text', 'Text with Class - ASFP', $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$text = apply_filters( 'asfp_widget_text', $instance['text'], $instance );
		$before_widget = preg_replace('/asfp_widget_text/','asfp_widget_text '.$instance['cssclass'],$before_widget);
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="asfptextwidget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cssclass'] = strip_tags($new_instance['cssclass']);
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','cssclass' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$cssclass = strip_tags($instance['cssclass']);
		$text = esc_textarea($instance['text']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('cssclass'); ?>"><?php _e('Class:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('cssclass'); ?>" name="<?php echo $this->get_field_name('cssclass'); ?>" type="text" value="<?php echo esc_attr($cssclass); ?>" /></p>

		<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>

		<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
<?php
	}
}


function asfp_load_widgets() {
	register_widget('asfp_Text_Widget');
}

add_action('widgets_init', 'asfp_load_widgets');
add_filter('asfp_widget_text', 'do_shortcode');

?>