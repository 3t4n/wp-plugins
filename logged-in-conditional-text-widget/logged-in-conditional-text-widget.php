<?php
/* 
Plugin Name: Logged In Conditional Text Widget
Plugin URI: http://paulgregory.org.uk/wp-plugin/logged-in-conditional-text-widget
Description: Trio of text widgets - one only shows if user is logged in, one only shows if a user is not logged in, other shows regardless. All have list modes.
Version: 0.9.2
Author: Paul Gregory
Author URI: http://paulgregory.org.uk/
*/ 

global $wp_version;
if (version_compare($wp_version, "2.8", "<")) {
	wp_die("This plugin requires WordPress version 2.8 or higher.");
}

class PGLoggedInTextWidget extends WP_Widget { 
	
	public function __construct() {
		parent::__construct(
	 		'pgloggedintext', // Base ID
			__('Text/List (If Logged In)', 'pgloggedintext'), // Name
			array( 'description' => __('Arbitrary text, shown in chosen format if user is logged in.', 'pgloggedintext') ) // Args
		);
		add_filter( 'content', 'do_shortcode', 11);
	}
	
	function widget($args, $instance) {
		if (is_user_logged_in()) {
			PGTextListWidget::widget($args, $instance);
		}
	}

	function update($new_instance, $old_instance) { 
		return PGTextListWidget::update($new_instance, $old_instance);
	} 

	function form($instance) {
		PGTextListWidget::form($instance);
	}
}

class PGLoggedOutTextWidget extends WP_Widget { 
		
	public function __construct() {
		parent::__construct(
	 		'pgloggedouttext', // Base ID
			__('Text/List (If Logged Out)', 'pgloggedintext'), // Name
			array( 'description' => __('Arbitrary text, shown in chosen format if user is logged out.', 'pgloggedintext') ) // Args
		);
		add_filter( 'content', 'do_shortcode', 11);
	}
	
	
	function widget($args, $instance) {
		if ( !is_user_logged_in() ) {
			PGTextListWidget::widget($args, $instance);
		}
	}

	function update($new_instance, $old_instance) {
		return PGTextListWidget::update($new_instance, $old_instance);
	} 

	function form($instance) {
		PGTextListWidget::form($instance);
	}
}

class PGTextListWidget extends WP_Widget { 
	
	public function __construct() {
		parent::__construct(
	 		'pgtextlist', // Base ID
			__('Text/List', 'pgloggedintext'), // Name
			array( 'description' => __('Arbitrary text, shown in chosen format.', 'pgloggedintext') ) // Args
		);
		add_filter( 'content', 'do_shortcode', 11);
	}
		
	function widget( $args, $instance ) {
		if ( ! empty( $instance['content'] ) ) {
			extract($args);
			echo $before_widget;
			$title = empty($instance['title']) ? ' ' : apply_filters( 'widget_title', $instance['title'] );
			if ( $title ) {
				echo $before_title . $title . $after_title;
			}
			if ( $instance['displaytype'] == '1' ) {
				// Paragraphs
				echo wpautop( $instance['content'] );
			} elseif ($instance['displaytype'] == '2' || $instance['displaytype'] == '3') {
				// Bullet or Numbered List
				echo $instance['displaytype'] == '2' ? '<ul class="textlistconditional">' : '<ol class="textlistconditional">';
				echo '<li>';
				echo str_replace( "\n", '</li><li>', $instance['content']) ;
				echo '</li>';
				echo $instance['displaytype'] == '2' ? '</ul>' : '</ol>';
			} else {
				// Plain
				echo $instance['content'];
			}
			echo $after_widget; 
		}
	}

	function update( $new_instance, $old_instance ) { 
		$instance = $old_instance; 
		$instance['title'] = trim( $new_instance['title'] );
		$instance['content'] = trim( $new_instance['content'] );
		$instance['displaytype'] = $new_instance['displaytype'];
		return $instance; 
	} 

	function form( $instance ) {
		$defaults = array( 
			'title'       => '',
			'content'     => '', 
			'displaytype' => '0', 
		); 
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$content = esc_attr( $instance['content'] ); 
		$title = esc_attr( $instance['title'] ); 
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'pgloggedintext'); ?>:</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" type="text" class="widefat" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('content'); ?>"><?php _e('Content', 'pgloggedintext'); ?>:</label>
			<textarea  id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" class="widefat" rows="8"><?php echo $content; ?></textarea>
		</p>
		<p>
			<label><input type="radio" name="<?php echo $this->get_field_name('displaytype'); ?>" value="0" <?php 
			if ($instance['displaytype']=='0') echo 'checked="checked"';?> /> <?php _e('No formatting', 'pgloggedintext'); ?></label><br />
			<label><input type="radio" name="<?php echo $this->get_field_name('displaytype'); ?>" value="1" <?php 
			if ($instance['displaytype']=='1') echo 'checked="checked"';?> /> <?php _e('Add paragraphs', 'pgloggedintext'); ?></label><br />
			<label><input type="radio" name="<?php echo $this->get_field_name('displaytype'); ?>" value="2" <?php
			if ($instance['displaytype']=='2') echo 'checked="checked"';?> /> <?php _e('Bullet list', 'pgloggedintext'); ?></label><br />
			<label><input type="radio" name="<?php echo $this->get_field_name('displaytype'); ?>" value="3" <?php 
			if ($instance['displaytype']=='3') echo 'checked="checked"';?> /> <?php _e('Numbered list', 'pgloggedintext'); ?></label>
		</p>
		<?php 
	}
}

class PGLoggedInText {
	
	function PGLoggedInText(){
		add_action( 'widgets_init', array(&$this, 'widgets_init') ); 
	}
	
	function widgets_init() { 
		register_widget( 'PGLoggedInTextWidget' ); 
		register_widget( 'PGLoggedOutTextWidget' );
		register_widget( 'PGTextListWidget' ); 
	}
}

new PGLoggedInText();
