<?php
/**
 * @package Aurora-borealis
 * @version 1.0
 */
/*
Plugin Name: Aurora Borealis
Plugin URI: https://wordpress.org/plugins/aurora-borealis
Description: A delightfully devilish wordpress plugin forked from "Hello Dolly". When activated you will randomly see a line of dialog from Seymour Skinners unforgettable luncheon in the upper right of your admin screen on every page.
Author: Matthew Daryl Gregory
Version: 1.0
Author URI: http://matthewdarylgregory.com/
*/

function steamed_hams_get_lyric() {
	/** This is the dialog to steamed hams */
	$dialog = "Well, Seymour, I made it- despite your directions.
	Ah. Superintendent Chalmers. Welcome.
	I hope you're prepared for an unforgettable luncheon.
	Yeah. Oh, egads! My roast is ruined.
	But what if I were to purchase fast food and disguise it as my own cooking?
	Delightfully devilish, Seymour.
	Ah- Skinner with his crazy explanations The superintendent's gonna need his medication When he hears Skinner's lame exaggerations There'll be trouble in town tonight
	Seymour! Superintendent, I was just- uh, just stretching my calves on the windowsill.
	Isometric exercise. Care to join me?
	Why is there smoke coming out of your oven, Seymour?
	Uh- Oh. That isn't smoke. It's steam. Steam from the steamed clams we're having.
	Mmm. Steamed clams. Whew.
	Superintendent, I hope you're ready for mouthwatering hamburgers.
	I thought we were having steamed clams.
	D'oh, no. I said steamed hams. That's what I call hamburgers.
	You call hamburgers steamed hams?
	Yes. It's a regional dialect.
	Uh-huh. Uh, what region?
	Uh, upstate New York.
	Really. Well, I'm from Utica, and I've never heard anyone use the phrase 'steamed hams. '
	Oh, not in Utica. No. It's an Albany expression.
	I see. You know, these hamburgers are quite similar to the ones they have at Krusty Burger.
	Oh, no. Patented Skinner burgers. Old family recipe. - For steamed hams. - Yes.
	Yes. And you call them steamed hams despite the fact that they are obviously grilled.
	Ye- You know, the- One thing I should- - Excuse me for one second.
	Of course. Well, that was wonderful. A good time was had by all. I'm pooped.
	Yes. I should be- Good Lord! What is happening in there?
	Aurora borealis.
	Uh- Aurora borealis at this time of year at this time of day in this part of the country localized entirely within your kitchen?
	Yes. - May I see it? No.
	Seymour. ! The house is on fire. !
	No, Mother. It's just the northern lights.
	Well, Seymour, you are an odd fellow but I must say you steam a good ham.";

	// Here we split it into lines
	$dialog = explode( "\n", $dialog );

	// And then randomly choose a line
	return wptexturize( $dialog[ mt_rand( 0, count( $dialog ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function aurora_borealis() {
	$chosen = steamed_hams_get_lyric();
	echo "<p id='seymour'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'aurora_borealis' );

// We need some CSS to position the paragraph
function borealis_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#seymour {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'borealis_css' );

?>
