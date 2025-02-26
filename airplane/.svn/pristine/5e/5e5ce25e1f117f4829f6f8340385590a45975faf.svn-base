<?php
/*
Plugin Name: Airplane!
Plugin URI: http://wordpress.org/extend/plugins/airplane/
Description: This plugin displays quotes from the classic movie "Airplane!" When activated you will randomly see a quote from <cite>Airplane!</cite> in the upper right of your admin screen on every page.
Author: Eli McMakin
Version: 1.0.1
License: GPL2
Author: www.elimcmakin.com
*/
    
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : PLUGIN AUTHOR EMAIL)

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

// These are quotes from Airplane!
$lyrics = "Joey, do you like movies about gladiators?
Joey, have you ever been in a... in a Turkish prison? 
You ever seen a grown man naked?
Looks like I picked the wrong week to quit drinking.
Looks like I picked the wrong week to quit smoking.
Looks like I picked the wrong week to quit sniffing glue.
Looks like I picked the wrong week to quit amphetamines.
I am serious... and don't call me Shirley.
I just want to tell you both good luck. We're all counting on you. 
Oh stewardess! I speak jive. 
Because of my mistake, six men didn't return from that raid. Seven. Lieutenant Zip died this morning. 
Elaine, you're a member of this crew. Can you face some unpleasant facts? No.
What kind of plane is it? Oh, it's a big pretty white plane with red stripes, curtains in the windows and wheels and it looks like a big Tylenol.
Roger, Roger. What's our vector, Victor? 
That's Clarence Oveur. Over. 
There's no reason to become alarmed, and we hope you'll enjoy the rest of your flight. By the way, is there anyone on board who knows how to fly a plane? 
Can you fly this plane, and land it? Surely you can't be serious. I am serious... and don't call me Shirley. 
Captain, how soon can you land? I can't tell. You can tell me. I'm a doctor. 
Would you like something to read? Do you have anything light? How about this leaflet, Famous Jewish Sports Legends?
What is it, Doctor? What's going on? I'm not sure. I haven't seen anything like this since the Anita Bryant concert. 
[plugging back in the runway lights] Just kidding. 
It was a rough place - the seediest dive on the wharf. Populated with every reject and cutthroat from Bombay to Calcutta. It's worse than Detroit. 
I haven't felt this awful since we saw that Ronald Reagan film";

// Here we split it into lines
$lyrics = explode("\n", $lyrics);
// And then randomly choose a line
$chosen = wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );

// This just echoes the chosen line, we'll position it later
function airplane() {
	global $chosen;
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'airplane');

// We need some CSS to position the paragraph
function airplane_css() {
	echo "
	<style type='text/css'>
	#dolly {
		position: absolute;
		top: 1em;
		margin-right: 13em;
		padding: 0;
		right: 10px;
		font-size: 16px;
		color: #d54e21;
	}
	</style>
	";
}

add_action('admin_head', 'airplane_css');

?>