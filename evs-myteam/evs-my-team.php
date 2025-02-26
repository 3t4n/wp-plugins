<?php
/**
 * Plugin Name: EVS MyTeam
 * Plugin URI: http://www.elliotvs.co.uk
 * Description: A plugin to display team member details (specifically built for gaming teams), such as name, description, twitter, youtube, twitch and more.
 * Version: 1.0.3
 * Author: Elliot Sowersby
 * Author URI: http://www.elliotvs.co.uk
 * License: GPL2
 */
 
	function evsmt_playerselect( $atts ) {
	
		$thename = $atts['name'];
		$gamertag = $atts['gamertag'];
		$description = $atts['description'];
		$twitter = $atts['twitter'];
		$twitch = $atts['twitch'];
		$youtube = $atts['youtube'];
		$image = $atts['image'];
		$width = $atts['width'];

		if (!$width) {
			$width = "172px";
		}

echo '<form method="post">
<input type="text" name="thename" id="thename" value="'.$thename.'" hidden>
<input type="text" name="gamertag" id="gamertag" value="'.$gamertag.'" hidden>
<input type="text" name="description" id="description" value="'.$description.'" hidden>
<input type="text" name="twitter" id="twitter" value="'.$twitter.'" hidden>
<input type="text" name="twitch" id="twitch" value="'.$twitch.'" hidden>
<input type="text" name="youtube" id="youtube" value="'.$youtube.'" hidden>
<input type="text" name="image" id="image" value="'.$image.'" hidden>';

echo '<div style="float: left; display: inline-block; margin: 7px;"><button type="submit" value="Select" name="select" id="select" style="padding: 0; border: none; background: none; outline: 0 !important; border: none;"><img src="'.$image.'" width="'.$width.'" style="border: 2px solid #000; border-bottom: 0;  border-top-right-radius: 15px; border-top-left-radius: 15px;" alt="Submit"></form><table width="'.$width.'"><tr><tr><td bgcolor="#C8C8C8" style="border: 1px solid #000; font-weight: bold; color: #000;"><center><font size="1">'.$thename.'</font></center></td></tr></table></button><br/></div>';

	}

   add_shortcode('playerselect', 'evsmt_playerselect');
   
   	function evsmt_selectedplayer( $atts ) {
	
		if(isset($_POST['select']))
		{
		
		$thename = sanitize_text_field( $_POST['thename'] );
		update_post_meta( $post->ID, '$thename', $thename );
		$gamertag = sanitize_text_field( $_POST['gamertag'] );
		update_post_meta( $post->ID, '$thename', $thename );
		$description = sanitize_text_field( $_POST['description'] );
		update_post_meta( $post->ID, '$thename', $thename );
		$twitter = sanitize_text_field( $_POST['twitter'] );
		update_post_meta( $post->ID, '$thename', $thename );
		$twitch = sanitize_text_field( $_POST['twitch'] );
		update_post_meta( $post->ID, '$thename', $thename );
		$youtube = sanitize_text_field( $_POST['youtube'] );
		update_post_meta( $post->ID, '$thename', $thename );
		$image = sanitize_text_field( $_POST['image'] );
		
		echo '<div style="clear: left;"></div><div style="position: relative; width: 100%; height: auto"><br/><HR>

		<img src="'.$image.'" width="200px" style="float: left; display: inline-block; margin-right: 16px; margin-bottom: 2px; border: 2px solid #000; border-radius: 25px;">

		<h3>'.stripslashes($thename).'';

if ($twitter) {
echo ' | <a href="http://www.twitter.com/'.$twitter.'" target="_blank">Twitter</a>'; }
if ($youtube) { echo ' | <a href="http://www.youtube.com/'.$youtube.'" target="_blank">YouTube</a>'; }
if ($twitch) { echo ' | <a href="http://www.twitch.tv/'.$twitch.'" target="_blank">Twitch</a>'; }

echo '</h3>';

echo stripslashes($description);

echo '</div>';

			if ($_POST["twitch"]) {
				echo '<HR><div style="margin-top:15px"><h3>'.$twitch.' - Twitch Stream:</h3><center><iframe frameborder="0" height="450px" width="100%" scrolling="no" src="http://www.twitch.tv/'.$twitch.'/embed"></iframe></center><HR>';
			}
		
		}

	}
	

   add_shortcode('selectedplayer', 'evsmt_selectedplayer');