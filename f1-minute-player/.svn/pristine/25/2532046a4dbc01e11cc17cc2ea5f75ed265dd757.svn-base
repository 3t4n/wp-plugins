<?php
/*
Plugin Name: F1 Minute Player
Description: Adds the F1 Minute Player to a 'widget-enabled' WordPress theme.
Version: 1.0.0.0
Author: f1minute.com
Author URI: http://www.f1minute.com/
Plugin URI: http://www.f1minute.com/share/widget/
*/

/*  © Copyright 2007-2008 Christine Blachford.  (christine@f1minute.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function widget_f1minute_player_init() {

	// see if widgets are enabled
  	if (!function_exists('register_sidebar_widget'))
  		return;

	// output player to page
	function widget_f1minute_player($args) {
	
		// conform
		extract($args);
		// get options
		$options = get_option('widget_f1minute_player');
		// get title
		$title = htmlspecialchars(stripcslashes($options['title']), ENT_QUOTES);
		// get properties
		$width = $options['width'];
		$height = $options['height'];
		$displaySlug = $options['displaySlug'];

		// set default options (if none set)
		if($width.length == 0)
			$width = "160";
		if($height.length == 0)
			$height = "180";
		if($displaySlug.length == 0)
			$displaySlug = true;
		
		// display
		echo $before_widget;
		echo $before_title;
		echo $title;
		echo $after_title;
		echo '<ul><li><embed src="http://www.f1minute.com/mp3player.swf" width="' . $width . '" height="' . $height . '" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="&file=http://www.f1minute.com/f1minutepodcast.rss&width=' . $width . '&height=' . $height . '&shuffle=false&autostart=false" /></li><li><a href="http://www.f1minute.com/share/" title="Share F1 Minute">add F1 Minute to your site</a></li></ul>';
		echo $after_widget;
		
	}
	
	// widget options
	function widget_f1minute_player_control() {
	
		// get options
		$options = get_option('widget_f1minute_player');
		// set defaults, if none
		if (!is_array($options))
			$options = array('title'=>'', 'width'=>'160', 'height'=>'180', 'displaySlug'=>'true');
			
		// update if posted
		if ($_POST['f1minute-player-submit']) {
			$options['title'] = $_POST['f1minute-player-title'];
			$options['width'] = $_POST['f1minute-player-width'];
			$options['height'] = $_POST['f1minute-player-height'];
			$options['displaySlug'] = $_POST['f1minute-player-displaySlug'];
			// update
			update_option('widget_f1minute_player', $options);
			// get options
			$options = get_option('widget_f1minute_player');
		}
		
		// read options
		$title = htmlspecialchars(stripcslashes($options['title']), ENT_QUOTES);
		$width = $options['width'];
		$height = $options['height'];
		$displaySlug = $options['displaySlug'];
		// write out options
		echo '<p style="text-align:right;"><label for="f1minute-player-title">' . ('Change widget title:') . ' <input style="width: 200px;" id="f1minute-player-title" name="f1minute-player-title" type="text" value="'.$title.'" /></label></p>';
		echo '<p style="text-align:right;"><label for="f1minute-player-width">' . ('Change widget width:') . ' <input style="width: 200px;" id="f1minute-player-width" name="f1minute-player-width" type="text" value="'.$width.'" /></label></p>';
		echo '<p style="text-align:right;"><label for="f1minute-player-height">' . ('Change widget height:') . ' <input style="width: 200px;" id="f1minute-player-height" name="f1minute-player-height" type="text" value="'.$height.'" /></label></p>';		
		// write submit
		echo '<input type="hidden" id="f1minute-player-submit" name="f1minute-player-submit" value="1"/>';

	}
	
	// register for drag / drop
	register_sidebar_widget(array('F1 Minute Player', 'widgets'), 'widget_f1minute_player');

  	// register options
	register_widget_control(array('F1 Minute Player', 'widgets'), 'widget_f1minute_player_control', 380, 180);
	
}

// initialise
add_action('widgets_init', 'widget_f1minute_player_init');
?>