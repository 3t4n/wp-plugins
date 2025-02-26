<?php
/*
Plugin Name: May The Force Be With You
Plugin URI: http://wordpress.org/extend/plugins
Description: This plugin when activated will display a starwars saying randomly on the admin's dashboard.
Author: Seth Schroeder
Version: 1.0
*/

function mtfbwy_get_quotes() {
	/** These are quotes */
	$quotes = "May the force be with you.
It is the will of the force that you are at my side.
Much to learn, you still have.
Follow the will of the force.
You under estimate the power of the dark side.
Try not! Do or do not... there is no try.
Fear is the path to the dark side. Fear leads to anger. Anger leads to hate. Hate leads to suffering.
Truly wonderful, the mind of a child is.
The Force will be with you, always.
Always two there are, a master and an apprentice.
I find your lack of faith disturbing.
Traveling through hyperspace ain't like dusting crops, boy.
In my experience, there's no such thing as luck.
Mmm. Lost a planet, Master Obi-Wan has. How embarrassing. How embarrassing.
A Jedi uses the Force for knowledge and defense, never for attack.
YAHOOOOO! You're all clear, kid. Now let's blow this thing and go home.
Listen to them, they're dying, R2. Curse my metal body. I wasn't fast enough. It's all my fault. My poor master.
Without The Jedi, There Can Be No Balance In The Force.
The Resistance Will Not Be Intimidated.
Luke Skywalker? I Thought He Was A Myth.
Stop Taking My Hand!
Why Does Everyone Want To Go Back To Jakku?!
Chewie, We're Home.
Is That Possible? I Never Ask That Question Until After We've Done It.
Women Always Figure Out The Truth. Always.
Show Me Again, Grandfather, And I Will Finish What You Started.
Princess — General, Sorry.
If Luke Couldn't Reach Him, How Could I?
You're Afraid You'll Never Be As Strong As Darth Vader.
I Always Hated Watching You Leave.
That's Why I Did It, So You'd Miss Me.
That's Not How The Force Works!
Is There A Garbage Shoot? Trash Compactor?
We'll See Each Other Again. I Believe That.";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function may_the_force_be_with_you() {
	$chosen = mtfbwy_get_quotes();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'may_the_force_be_with_you' );

// We need some CSS to position the paragraph
function mtfbwy_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'mtfbwy_css' );

?>
