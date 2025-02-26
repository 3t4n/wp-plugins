<?php
/**
 * Plugin Name: ACLoginWidget
 * Plugin URI: http://ponderwell.net/2010/05/acloginwidget/
 * Description: Creates a widget to log into ActiveCollab from your Wordpress site.
 * Version: 1.0
 * Author: Michael Tracey
 * Author URI: http://ponderwell.net
 * License: GPL2
 */
/*  Copyright 2010 Michael Tracey (email: michael@ponderwell.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action( 'widgets_init', 'acc_widgets' );

function acc_widgets() {
	register_widget( 'Acc_Widget' );
}

class Acc_Widget extends WP_Widget {
	function Acc_Widget() {
		$widget_ops = array( 'classname' => 'example', 'description' => __('Widget to create an ActiveCollab login', 'acc_widget') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'acc_widget' );
		$this->WP_Widget( 'acc_widget', __('ActiveCollab Widget', 'acc_widget'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$acc_url = $instance['acc_url'];
		$acc_button = $instance['acc_button'];
		$remember_pass = $instance['remember_pass'];
		$show_forgot = $instance['show_forgot'];
		$show_forgot_text = $instance['show_forgot_text'];
		$public_submit = $instance['public_submit'];
		$public_submit_text = $instance['public_submit_text'];

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title )
			echo $before_title . $title . $after_title;

		echo '
		<form method="post" action="'. $acc_url .'/index.php?path_info=login">
  		<label for="login[email]">Email:</label> <input type="text" name="login[email]" />
  		<label for="login[password]">Password:</label> <input type="password" name="login[password]" />
  		<input type="hidden" name="submitted" value="submitted" />
  		';
  		if ($remember_pass == 'y'){
  			echo '<br /><input name="login[remember]" class="inlineInput inline input_checkbox" id="loginFormRemember" tabindex="3" type="checkbox" value="1" /> Remember me for 14 days ';
  		}
  		echo '
  		<br /><button type="submit">'. $acc_button .'</button>
		</form>';
		if ($public_submit == 'y'){
  			echo '<br /><a href="'. $acc_url .'/submit">'. $public_submit_text .'</a>';
  		}
		if ($show_forgot == 'y'){
  			echo '<br /><a href="'. $acc_url .'/lost-password">'. $show_forgot_text .'</a>';
  		}
		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['acc_url'] = strip_tags( $new_instance['acc_url'] );
		$instance['acc_button'] = strip_tags( $new_instance['acc_button'] );
		$instance['show_forgot_text'] = strip_tags( $new_instance['show_forgot_text'] );
		$instance['public_submit_text'] = strip_tags( $new_instance['public_submit_text'] );
		$instance['remember_pass'] = $new_instance['remember_pass'];
		$instance['show_forgot'] = $new_instance['show_forgot'];
		$instance['public_submit'] = $new_instance['public_submit'];
		return $instance;
	}

	function form( $instance ) {
		$defaults = array( 'title' => __('Client Login', 'example'), 'acc_url' => __('http://', 'example'), 'remember_pass' => 'y', 'acc_button' => __('Log In', 'example'), 'show_forgot' => 'n', 'public_submit' => 'n', 'show_forgot_text' => __('Forgot Password?', 'example'), 'public_submit_text' => __('Open a ticket without an account','example'));
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label><br/>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'acc_url' ); ?>"><?php _e('AC Url:', 'example'); ?></label><br/>
			<input id="<?php echo $this->get_field_id( 'acc_url' ); ?>" name="<?php echo $this->get_field_name( 'acc_url' ); ?>" value="<?php echo $instance['acc_url']; ?>" />
			<br /><i>Full path to your AC install w/out ending slash</i>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'acc_button' ); ?>"><?php _e('Submit Text:', 'example'); ?></label><br/>
			<input id="<?php echo $this->get_field_id( 'acc_button' ); ?>" name="<?php echo $this->get_field_name( 'acc_button' ); ?>" value="<?php echo $instance['acc_button']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'remember_pass' ); ?>"><?php _e('Show Remember Password:', 'example'); ?></label><br/>
			<select id="<?php echo $this->get_field_id( 'remember_pass' ); ?>" name="<?php echo $this->get_field_name( 'remember_pass' ); ?>">
				<option value="y" <?php if ( 'y' == $instance['remember_pass'] ) echo 'selected="selected"'; ?>>Yes</option>
				<option value="n" <?php if ( 'n' == $instance['remember_pass'] ) echo 'selected="selected"'; ?>>No</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'public_submit' ); ?>"><?php _e('Public Submit:', 'example'); ?></label><br/>
			<select id="<?php echo $this->get_field_id( 'public_submit' ); ?>" name="<?php echo $this->get_field_name( 'public_submit' ); ?>">
				<option value="y" <?php if ( 'y' == $instance['public_submit'] ) echo 'selected="selected"'; ?>>Yes</option>
				<option value="n" <?php if ( 'n' == $instance['public_submit'] ) echo 'selected="selected"'; ?>>No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'public_submit_text' ); ?>"><?php _e('Public Submit Text:', 'example'); ?></label><br/>
			<input id="<?php echo $this->get_field_id( 'public_submit_text' ); ?>" name="<?php echo $this->get_field_name( 'public_submit_text' ); ?>" value="<?php echo $instance['public_submit_text']; ?>" />
		</p>		
		<p>
			<label for="<?php echo $this->get_field_id( 'show_forgot' ); ?>"><?php _e('Show Forgot Password:', 'example'); ?></label><br/>
			<select id="<?php echo $this->get_field_id( 'show_forgot' ); ?>" name="<?php echo $this->get_field_name( 'show_forgot' ); ?>">
				<option value="y" <?php if ( 'y' == $instance['show_forgot'] ) echo 'selected="selected"'; ?>>Yes</option>
				<option value="n" <?php if ( 'n' == $instance['show_forgot'] ) echo 'selected="selected"'; ?>>No</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'show_forgot_text' ); ?>"><?php _e('Forgot Password Text:', 'example'); ?></label><br/>
			<input id="<?php echo $this->get_field_id( 'show_forgot_text' ); ?>" name="<?php echo $this->get_field_name( 'show_forgot_text' ); ?>" value="<?php echo $instance['show_forgot_text']; ?>" />
		</p>
		<?php
	}
}

?>
