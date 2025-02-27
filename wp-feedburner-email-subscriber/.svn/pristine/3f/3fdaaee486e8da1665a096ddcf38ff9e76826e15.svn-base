<?php 
/*
Plugin Name: WP Feedburner Email Subscriber
Plugin URI: http://codingbank.com/plugins/wp-feedburner-email-subscriber
Description: Just use Feedburner Email Subscriber service on your website sitebar widget.
Version: 1.1.1
Author: Md Abul Bashar
Author URI: http://www.codingbank.com/
*/




// Email Subscriber Widget Development

class cb_email_subscribes extends WP_Widget {
	public function __construct() {
		parent::__construct('cb_email_subscribes', 'Email Subscriber', array(
			'description'		=> 'This is Email Subscriber Widget for google feedburner service',			
		));
		
	}
	public function widget($args, $instance){
		if($instance['title']) {
			$title 			= $instance['title'];
		}
		else {
			$title 			= 'Email Subscribe';			
		}
		if($instance['email_sub_url']){
			$email_sub_url 	= $instance['email_sub_url'];
		}
		else {
			$email_sub_url 	= 'wp-tutorials';
			
		}
		$email_sub_form		= '<div class="sidebar-email-subscribe-area">									
								<form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(\'https://feedburner.google.com/fb/a/mailverify?uri='.$email_sub_url.'\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true">
									<p>
										<input class="email-subscribe" placeholder="Enter your email address:" type="email" name="email"/>
										<input type="hidden" value="'.$email_sub_url.'" name="uri"/><input type="hidden" name="loc" value="en_US"/><input class="email-subscribe-submit" type="submit" value="Subscribe" />
									</p>
								</form>
								<p class="sidebar-email-sub-total">
									<a href="http://feeds.feedburner.com/'.$email_sub_url.'"><img src="http://feeds.feedburner.com/~fc/'.$email_sub_url.'?bg=99CCFF&amp;fg=444444&amp;anim=1" height="26" width="88" style="border:0" alt="" /></a>
								</p>
							</div>';
		$cb_email_widget_content 	= $args['before_title'].$title.$args['after_title'];		
		$cb_email_widget_content 	.= $email_sub_form;
		
		echo $args['before_widget'].$cb_email_widget_content.$args['after_widget'];
		
	}
	public function form($instance){
		if($instance['title']) {
			$title 			= $instance['title'];
		}
		else {
			$title 			= 'Email Subscribe';			
		}
		if($instance['email_sub_url']){
			$email_sub_url 	= $instance['email_sub_url'];
		}
		else {
			$email_sub_url 	= 'wp-tutorials';
			
		}
		
		?>	
			<p>
				<label for="<?php echo $this->get_field_id('title');?>">Title:</label> 
				<input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo $title; ?>"/>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('email_sub_url');?>">Feed Address:</label> 
				<br/>
				<span class="cb_feed_sub_text">Copy and paste your Feedburner feed here.</span>				
				<input class="widefat" id="<?php echo $this->get_field_id('email_sub_url');?>" name="<?php echo $this->get_field_name('email_sub_url');?>" type="text" value="<?php echo $email_sub_url; ?>"/>	
				<p></p>	
				<span class="cb_feed_sub_text">Example: <strong>onlinesolve</strong> <br/> for <a target="_blank" href="http://feeds.feedburner.com/onlinesolve">http://feeds.feedburner.com/onlinesolve</a> feed address.<br/>If you don't have feed url then go to <a href="http://feeds.feedburner.com/" target="_blank">Feedburner</a> and signup</span>	
			</p>
		<?php
	}
	
	public function update($new_instance, $old_instance ){
		$instance = $old_instance;
		
		
		$instance['title'] 			= $new_instance['title'];
		$instance['email_sub_url']	= $new_instance['email_sub_url'];
		return $instance;
		
	}
	
}
function cb_email_sub_function() {
	register_widget('cb_email_subscribes');	
}

add_action('widgets_init', 'cb_email_sub_function');



function cb_email_sub_function_style(){
	
	wp_enqueue_style( 'wp-email-sub-style',  plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0' );
	
}
add_action('wp_enqueue_scripts', 'cb_email_sub_function_style');




?>