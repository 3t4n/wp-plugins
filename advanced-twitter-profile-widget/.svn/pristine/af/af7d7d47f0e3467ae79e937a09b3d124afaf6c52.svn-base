<?php
/*
Plugin Name: Advanced Twitter Profile Widget
Plugin URI: http://selenagomez.com.pl/inne/twitter-profile-widget/
Description: Adds a sidebar widget to display Twitter updates (using the Javascript). 
Version: 1.0.7
Author: Krystian 'simivar' Marcisz
Author URI: http://simivar.net

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
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110, USA
*/

// Take the plugin dir
$plugin_dir = basename( dirname( __FILE__ ) );

// Take a URL to plugin dir
$plugin_url = WP_PLUGIN_URL . '/' . $plugin_dir . '/';

function widget_Twitter($args) {

	// "$args is an array of strings that help widgets to conform to
	// the active theme: before_widget, before_title, after_widget,
	// and after_title are the array keys." - These are set up by the theme
	extract($args);
 
	// These are our own options
	$options = get_option("widget_Twitter");
	$title = $options['title'];
	$user = $options['user'];
	$number = $options['number'];
	$height = $options['height'];
	$width = $options['width'];
	$shellbg = $options['shellbg'];
	$shellcol = $options['shellcol'];
	$tweetbg = $options['tweetbg'];
	$tweetcol = $options['tweetcol'];
	$tweetlink = $options['tweetlink'];
	$scrollbar = $options['scrollbar'];	
	$live = $options['live'];
	$hashtags = $options['hashtags'];
	$timestamp = $options['timestamp'];
	$avatars = $options['avatars'];
	$behavior = $options['behavior'];
	$loop = $options['loop'];
	$twitterlogo = $options['twitterlogo'];
	
	if (!is_array( $options ))
		$options = array(
			'title' => 'Twitter Profile',
			'user' => 'twitter',
			'number' => '4',
			'height' => '300',
			'width' => '230',
			'shellbg' => 'fbfaf2',
			'shellcol' => 'b3b3b3',
			'tweetbg' => 'fbfaf2',
			'tweetcol' => 'b3b3b3',
			'tweetlink' => '8a8a8a',
			'scrollbar' => 'false',
			'live' => 'false',
			'hashtags' => 'false',
			'timestamp' => 'true',
			'avatars' => 'false',
			'behavior' => 'all',
			'loop' => 'false',
			'twitterlogo' => 'true'
		);
		
	if ($width == 'auto') {
		$width = "'auto'";
	} 

	// Our Widget Title
	echo $before_widget;
		echo $before_title;
			echo $title;
	echo $after_title;
 
	//Our Widget Content
	echo "<script src=\"http://widgets.twimg.com/j/2/widget.js\" language=\"Javascript\" type=\"text/javascript\"></script>
                    <script language=\"Javascript\" type=\"text/javascript\">
                    new TWTR.Widget({
                      version: 2,
                      type: 'profile',
                      rpp: " . $number . ",
                      interval: 6000,
                      width: " . $width . ",
                      height: " . $height . ",
                      theme: {
                        shell: {
                          background: '#" . $shellbg . "',
                          color: '#" . $shellcol . "'
                        },
                        tweets: {
                          background: '#" . $tweetbg . "',
                          color: '#" . $tweetcol . "',
                          links: '#" . $tweetlink . "'
                        }
                      },
                      features: {
                        scrollbar: " . $scrollbar . ",
                        loop: " . $loop . ",
                        live: " . $live . ", 
                        hashtags: " . $hashtags . ",
                        timestamp: " . $timestamp . ",
                       avatars: " . $avatars . ",
                       behavior: '" . $behavior . "'
                      }
                    }).render().setUser('" . $user . "').start();
                    </script>";
	echo $after_widget;
}
 
// Settings form
function Twitter_control()
{
	// Get options
	$options = get_option("widget_Twitter");
	// options exist? if not set defaults
	if ( !is_array( $options ) )
		$options = array(
			'title' => 'Twitter Profile',
			'user' => 'twitter',
			'number' => '4',
			'height' => '300',
			'width' => '230',
			'shellbg' => 'fbfaf2',
			'shellcol' => 'b3b3b3',
			'tweetbg' => 'fbfaf2',
			'tweetcol' => 'b3b3b3',
			'tweetlink' => '8a8a8a',
			'scrollbar' => 'false',
			'live' => 'false',
			'hashtags' => 'false',
			'timestamp' => 'true',
			'avatars' => 'false',
			'behavior' => 'all',
			'loop' => 'false',
			'twitterlogo' => 'true'
		);

 
	 // form posted?
	if ($_POST['Twitter-Submit'])
	{
		// Remember to sanitize and format use input appropriately.
		$options['title'] = strip_tags(stripslashes($_POST['Twitter-Title']));
		$options['user'] = strip_tags(stripslashes($_POST['Twitter-User']));
		$options['number'] = strip_tags(stripslashes($_POST['Twitter-TwittNumber']));
		$options['height'] = strip_tags(stripslashes($_POST['Twitter-Height']));
		$options['width'] = strip_tags(stripslashes($_POST['Twitter-Width']));
		$options['shellbg'] = strip_tags(stripslashes($_POST['Twitter-Shellbg']));
		$options['shellcol'] = strip_tags(stripslashes($_POST['Twitter-Shellcol']));
		$options['tweetbg'] = strip_tags(stripslashes($_POST['Twitter-Tweetbg']));
		$options['tweetcol'] = strip_tags(stripslashes($_POST['Twitter-Tweetcol']));
		$options['tweetlink'] = strip_tags(stripslashes($_POST['Twitter-Tweetlink']));
		$options['scrollbar'] = strip_tags(stripslashes($_POST['Twitter-Scrollbar']));
		$options['live'] = strip_tags(stripslashes($_POST['Twitter-live']));
		$options['hashtags'] = strip_tags(stripslashes($_POST['Twitter-hashtags']));
		$options['timestamp'] = strip_tags(stripslashes($_POST['Twitter-timestamp']));
		$options['avatars'] = strip_tags(stripslashes($_POST['Twitter-avatars']));
		$options['behavior'] = strip_tags(stripslashes($_POST['Twitter-behavior']));
		$options['loop'] = strip_tags(stripslashes($_POST['Twitter-Loop']));
		$options['twitterlogo'] = strip_tags(stripslashes($_POST['Twitter-Logo']));
		// update our options
		update_option("widget_Twitter", $options);
	}
	
	// Get options for form fields to show
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	$user = htmlspecialchars($options['user'], ENT_QUOTES);
	$number = htmlspecialchars($options['number'], ENT_QUOTES);
	$height = htmlspecialchars($options['height'], ENT_QUOTES);
	$width = htmlspecialchars($options['width'], ENT_QUOTES);
	$shellbg = htmlspecialchars($options['shellbg'], ENT_QUOTES);
	$shellcol = htmlspecialchars($options['shellcol'], ENT_QUOTES);
	$tweetbg = htmlspecialchars($options['tweetbg'], ENT_QUOTES);
	$tweetcol = htmlspecialchars($options['tweetcol'], ENT_QUOTES);
	$tweetlink = htmlspecialchars($options['tweetlink'], ENT_QUOTES);
	$scrollbar = htmlspecialchars($options['scrollbar'], ENT_QUOTES);	
	$live = htmlspecialchars($options['live'], ENT_QUOTES);
	$hashtags = htmlspecialchars($options['hashtags'], ENT_QUOTES);
	$timestamp = htmlspecialchars($options['timestamp'], ENT_QUOTES);
	$avatars = htmlspecialchars($options['avatars'], ENT_QUOTES);
	$behavior = htmlspecialchars($options['behavior'], ENT_QUOTES);
	$loop = htmlspecialchars($options['loop'], ENT_QUOTES);
	$twitterlogo = htmlspecialchars($options['twitterlogo'], ENT_QUOTES);
 
// Widget options 
?>
	<p>
		<label for="Twitter-Title"><?php _e('Twitter title:', 'atpw');?></label>
			<input type="text" id="Twitter-Title" name="Twitter-Title" value="<?php echo $title ?>" /><br/><br/>
		<label for="Twitter-User"><?php _e('Twitter user:', 'atpw'); ?></label>
			<input type="text" id="Twitter-User" name="Twitter-User" value="<?php echo $user ?>" /><br/><br/>
		<label for="Twitter-TwittNumber"><?php _e('Number of messages:', 'atpw'); ?></label><br/>
			<input type="text" maxlength="1" size="3" id="Twitter-TwittNumber" name="Twitter-TwittNumber" value="<?php echo $number ?>" />
		<hr />
		<label for="Twitter-Logo"><?php _e('Show Twitter logo?', 'atpw'); ?></label><br />
			<input type="radio" id="Twitter-Logo" name="Twitter-Logo" <?php if($twitterlogo == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-Logo" <?php if($twitterlogo == 'false') echo 'checked="checked"'; ?> name="Twitter-Logo" value="false" /><?php _e('no', 'atpw'); ?><br/>
		<hr />
		<label for="Twitter-Height"><?php _e('Height:', 'atpw'); ?> </label><br/>
			<input type="text" maxlength="3" size="3" id="Twitter-Height" name="Twitter-Height" value="<?php echo $height ?>" />px<br/>
			<small><?php _e('only a number (eg. 300)', 'atpw'); ?></small><br/><br/>
		<label for="Twitter-Width"><?php _e('Width:', 'atpw'); ?> </label><br/>
			<input type="text" maxlength="4" size="3" id="Twitter-Width" name="Twitter-Width" value="<?php echo $width ?>" />px<br/>
			<small><?php _e('number (eg. 230) or auto', 'atpw'); ?></small>
		<hr />
		<label for="Twitter-Shellbg"><?php _e('Shell background:', 'atpw'); ?> </label>
			<input type="text" maxlength="6" id="Twitter-Shellbg" name="Twitter-Shellbg" value="<?php echo $shellbg ?>" /><br/>
			<small><?php _e('hex color (without #)', 'atpw'); ?></small><br/><br/>
		<label for="Twitter-Shellbg"><?php _e('Shell text color:', 'atpw'); ?> </label><br/>
			<input type="text" maxlength="6" id="Twitter-Shellcol" name="Twitter-Shellcol" value="<?php echo $shellcol ?>" /><br/>
			<small><?php _e('hex color (without #)', 'atpw'); ?></small><br/><br/>
		<label for="Twitter-Tweet"><?php _e('Tweet background:', 'atpw'); ?> </label><br/>
			<input type="text" maxlength="6" id="Twitter-Tweetbg" name="Twitter-Tweetbg" value="<?php echo $tweetbg ?>" /><br/>
			<small><?php _e('hex color (without #)', 'atpw'); ?></small><br/><br/>
		<label for="Twitter-Tweet"><?php _e('Tweet text color:', 'atpw'); ?> </label><br/>
			<input type="text" maxlength="6" id="Twitter-Tweetcol" name="Twitter-Tweetcol" value="<?php echo $tweetcol ?>" /><br/>
			<small><?php _e('hex color (without #)', 'atpw'); ?></small><br/><br/>
		<label for="Twitter-Tweet"><?php _e('Tweet link color:', 'atpw'); ?> </label><br/>
			<input type="text" maxlength="6" id="Twitter-Tweetlink" name="Twitter-Tweetlink" value="<?php echo $tweetlink ?>" /><br/>
			<small><?php _e('hex color (without #)', 'atpw'); ?></small>
		<hr />
		<label for="Twitter-Scrollbar"><?php _e('Scrollbar:', 'atpw'); ?> </label><br/>
			<input type="radio" id="Twitter-Scrollbar" name="Twitter-Scrollbar" <?php if($scrollbar == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes ', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-Scrollbar" <?php if($scrollbar == 'false') echo 'checked="checked"'; ?> name="Twitter-Scrollbar" value="false" /><?php _e('no', 'atpw'); ?><br/><br/>
		<label for="Twitter-live"><?php _e('Poll for new results?', 'atpw'); ?></label><br/>
			<input type="radio" id="Twitter-live" name="Twitter-live" <?php if($live == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-live"  name="Twitter-live" <?php if($live == 'false') echo 'checked="checked"'; ?> value="false" /><?php _e('no', 'atpw'); ?><br/><br/>
		<label for="Twitter-hashtags"><?php _e('Show hashtags?', 'atpw'); ?></label><br/>
			<input type="radio" id="Twitter-hashtags" name="Twitter-hashtags" <?php if($hashtags == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-hashtags"  name="Twitter-hashtags" <?php if($hashtags == 'false') echo 'checked="checked"'; ?> value="false" /><?php _e('no', 'atpw'); ?><br/><br/>
		<label for="Twitter-timestamp"><?php _e('Show Timestamps?', 'atpw'); ?></label><br/>
			<input type="radio" id="Twitter-timestamp" name="Twitter-timestamp" <?php if($timestamp == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-timestamp"  name="Twitter-timestamp" <?php if($timestamp == 'false') echo 'checked="checked"'; ?> value="false" /><?php _e('no', 'atpw'); ?><br/><br/>
		<label for="Twitter-avatars"><?php _e('Show Avatars?', 'atpw'); ?></label><br/>
			<input type="radio" id="Twitter-avatars" name="Twitter-avatars" <?php if($avatars == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-avatars"  name="Twitter-avatars" <?php if($avatars == 'false') echo 'checked="checked"'; ?> value="false" /><?php _e('no', 'atpw'); ?><br/><br/>
		<label for="Twitter-behavior"><?php _e('Behavior:', 'atpw'); ?></label><br/>
			<select name="Twitter-behavior" id="Twitter-behavior"><option id="Twitter-behavior" name="Twitter-behavior" <?php if($behavior == 'default') echo 'selected="selected"'; ?>  value="default" ><?php _e('Timed Interval', 'atpw'); ?></option>
			<option id="Twitter-behavior" name="Twitter-behavior" <?php if($behavior == 'all') echo 'selected="selected"'; ?> value="all" ><?php _e('Load all tweets', 'atpw'); ?></option></select><br/><br/>
		<label for="Twitter-Loop"><?php _e('Loop:', 'atpw'); ?> </label><br/>
			<input type="radio" id="Twitter-Loop" name="Twitter-Loop" <?php if($loop == 'true') echo 'checked="checked"'; ?> value="true" /><?php _e('yes', 'atpw'); ?>
			&nbsp;<input type="radio" id="Twitter-Loop" <?php if($loop == 'false') echo 'checked="checked"'; ?> name="Twitter-Loop" value="false" /><?php _e('no', 'atpw'); ?><br/>
			<small><?php _e('Loop works only with Behavior Timed Interval', 'atpw'); ?></small>
		<input type="hidden" id="Twitter-Submit" name="Twitter-Submit" value="1" />
	</p>
<?php
}

// Hide twitter logo - function
function HideLogo(){
	global  $plugin_url;
	echo '<link rel="stylesheet" href="'. $plugin_url .'css/logo.css" type="text/css" media="screen" />';
}

// Register a widget
function Twitter_init(){
	register_sidebar_widget(__('Twitter'), 'widget_Twitter');
	register_widget_control(   'Twitter', 'Twitter_control', 250, 200 );
}

// Hide twitter logo - variables and action
$options = get_option("widget_Twitter");
$twitterlogo = $options['twitterlogo'];

if($twitterlogo == 'false'){
	add_action('wp_head', 'HideLogo');
}

add_action("plugins_loaded", "Twitter_init");

// Load plugin translation 
global $plugin_dir;
load_plugin_textdomain('atpw', null, $plugin_dir . '/languages/');

?>