<?php
/*
Plugin Name: Friendfeed widget
Description:	Adds a sidebar widget to display your personal <a href="http://www.friendfeed.com">friendfeed</a>, so it can show your GReader updates, new RSS Feed items, Youtube actions, and any other kind of activities you have configured into your friendfeed account.<br/> When activated, configure the widget in the <a href="./widgets.php">widgets settings panel</a>.
Author: Adrián Moreno Peña
Version: 0.3
Author URI: http://bloqnum.com

Created based on <a href="http://blue-anvil.com/archives/create-a-wordpress-recent-posts-widget">Blue Anvil example</a>
Very simple plugin and quite a test to play with the FriendFeed API.
Feel free to make suggestions or improve the code as you like, but please credit me.

*/
 
require_once('friendfeed.php');
 
 function addHeaderCode() {
			echo '<link type="text/css" rel="stylesheet" href="' . get_bloginfo('wpurl') . '/wp-content/plugins/friendfeed-widget/friendfeed.css" />' . "\n";
}
 
function widget_friendfeed_init() {

	if ( !function_exists('register_sidebar_widget') )
		return;
		
		function widget_friendfeed($args) {
		addHeaderCode();
		
			extract($args);

			// Options of the widget
			$options = get_option('widget_friendfeed');
			$title = $options['title'];  // Title in sidebar for widget
			$show = $options['show'];  // # of Posts we are showing
			$username = $options['username']; //Username to fetch the feed
			
            	if ($show<1) $show = 1;
			
		// Output
		echo $before_widget . $before_title . $title . $after_title;

		// GET LIFEFEED only if username is not empty
		if ($username != ''){
			
			$FF = new FriendFeed();
			$feed = $FF->fetch_user_feed($username, $num = $show);
				// start list
				echo '<ul>';
				$shown = 0;
				foreach ($feed->entries as $entry){
					if ($shown++ > $show) break;
					echo '<li class="lifefeed-item-'.$entry->service->id.'"><a title="A '.$entry->service->name.' FriendFeed entry" href="'.$entry->link.'">'.$entry->title.'</a></li>';
				}
				echo '</ul>';
		}
		
		// echo widget closing tag
		echo $after_widget;
	}


	// Settings form
	function widget_friendfeed_control() {

		// Get options
		$options = get_option('widget_friendfeed');
		// options exist? if not set defaults
		if ( !is_array($options) )
			$options = array('title'=>'My friendfeed entries', 'show'=>'5', 'username' => '');
		
		// form posted?
		if ( $_POST['friendfeed-submit'] ) {
			// Remember to sanitize and format use input appropriately.
			$options['title'] = strip_tags(stripslashes($_POST['friendfeed-title']));
			$options['username'] = strip_tags(stripslashes($_POST['friendfeed-username']));
			$options['show'] = strip_tags(stripslashes($_POST['friendfeed-show']));
			update_option('widget_friendfeed', $options);
		}

		// Get options for form fields to show
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$show = htmlspecialchars($options['show'], ENT_QUOTES);
		$username = htmlspecialchars($options['username'], ENT_QUOTES);

		
		// The form fields
		echo '<p style="text-align:right;">
				<label for="friendfeed-title">' . __('Title:') . ' 
				<input style="width: 200px;" id="friendfeed-title" name="friendfeed-title" type="text" value="'.$title.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="friendfeed-show">' . __('Show:') . ' 
				<input style="width: 200px;" id="friendfeed-show" name="friendfeed-show" type="text" value="'.$show.'" />
				</label></p>';
		echo '<p style="text-align:right;">
				<label for="friendfeed-username">' . __('Username:') . ' 
				<input style="width: 200px;" id="friendfeed-username" name="friendfeed-username" type="text" value="'.$username.'" />
				</label></p>';
		echo '<p>Press enter to save the settings</p>';
		echo '<input type="hidden" id="friendfeed-submit" name="friendfeed-submit" value="1" />';
	}
	
	// Register widget for use
	register_sidebar_widget(array('Friendfeed widget', 'widgets'), 'widget_friendfeed');

	// Register settings for use, 300x100 pixel form
	register_widget_control(array('Friendfeed widget', 'widgets'), 'widget_friendfeed_control', 300, 150);
}

// Run code and init
add_action('widgets_init', 'widget_friendfeed_init');

?>