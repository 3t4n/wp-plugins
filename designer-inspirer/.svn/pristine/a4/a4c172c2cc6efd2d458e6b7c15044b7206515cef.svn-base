<?php
/**
 * @package Designer, Inspirer
 * @version 1.0
 */
/*
Plugin Name: Designer, Inspirer
Plugin URI: https://wordpress.org/plugins/designer-inspirer/
Description: Instead of the hope of a generation that few developers are alive to remember, we've modified the classic Wordpress plugin to provide some tangible help to Wordpress users the world over: design inspiration. Quotes from famous designers will help you whenever you get stuck, and failing that, will hopefully at least provide a little distraction.
Author: Prime Responsive Websites
Version: 1.0
Author URI: http://primeresponsivewebsites.com/
*/

function designer_get_quotes() {

	$quotes = "It’s through mistakes that you actually can grow.
Never fall in love with an idea.
Digital design is like painting, except the paint never dries.
I want to make beautiful things, even if nobody cares.
Good design is all about making other designers feel like idiots because that idea wasn’t theirs.
I strive for two things in design: simplicity and clarity.
If you can design one thing, you can design everything.
Everything is designed. Few things are designed well.
Design is not for philosophy, it’s for life.
Bad design is smoke, while good design is a mirror.
Thinking about design is hard, but not thinking about it can be disastrous.
Design is the intermediary between information and understanding.
Design is where science and art break even.
Design cannot rescue failed content.
Color does not add a pleasant quality to design - it reinforces it.
Good design is obvious. Great design is transparent.
Technology over technique produces emotionless design.
Design works best when it gets out of the user’s way.
Simplicity, carried to an an extreme, becomes elegance.
Design is intelligence made visible.
The function of design is letting design function.
The essential part of creativity is not being afraid to fail.
Art is the lie that reveals the truth.
You have to be interested in culture to design for it.
The ultimate inspiration is the deadline.
The life of a designer is a life of fight: fight against the ugliness.
Real web designers write code. Always have, always will.
When you are stuck, walk away from the computer and draw. It will teach you how to see.
You can’t depend on your eyes when your imagination is out of focus.
";

	$quotes = explode( "\n", $quotes );

	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

function designer() {
	$chosen = designer_get_quotes();
	echo "<p id='designer'>$chosen</p>";
}

add_action( 'admin_notices', 'designer' );

function designer_css() {
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	#designer {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'designer_css' );

?>
